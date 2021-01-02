<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Yajra\Datatables\Datatables;

class InvoiceController extends Controller
{
    protected $base = 'backend.invoice.';

    public function __construct()
    {
        view()->share('base', $this->base);
    }
  
    public function index()
    {
        $invoice=DB::table('invoice')
        ->join('schedule','invoice.kode_schedule','=','schedule.kode_schedule')
        ->join('client','schedule.client_id','=','client.id')
        ->join('package_decoration','schedule.package_decoration_id','=','package_decoration.id')
        ->select('invoice.*','client.nama_client','package_decoration.nama_paket')
        ->where('status_invoice',0)->orderBy('id','DESC')->get();

		$data = array(  
            'indexPage' => "Invoice",
            'invoice' => $invoice
		);
        return view($this->base.'index')->with($data);
    }
    
    public function tambah()
    {
        $schedule=DB::table('schedule')->where('status',0)->orderBy('id','ASC')->get();
        $no_invoice = "BNZ/INV/".date('Y')."/".date('m')."/".$this->quickRandom();

		$data = array(  
            'indexPage' => "Tambah Data Invoice",
            'schedule' => $schedule,
            'no_invoice' => $no_invoice,
		);
        return view($this->base.'tambah')->with($data);
    }
  
    public function add(Request $request)
    {
        $schedule_id=$request->input('schedule_id');
        $no_invoice=$request->input('no_invoice');
        $tanggal_invoice=$request->input('tanggal_invoice');
        $dp=str_replace(".", "",$request->input('dp'));
        $keterangan=$request->input('keterangan');
        
        $schedule=DB::table('schedule')
        ->join('package_decoration','schedule.package_decoration_id','=','package_decoration.id')
        ->select('schedule.*','package_decoration.harga_paket')
        ->where('schedule.id',$schedule_id)->first();
        $kode_schedule=$schedule->kode_schedule;
        $nominal_total=$schedule->harga_paket;

		$insert = DB::table('invoice')->insert(
            [
                'kode_schedule' => $kode_schedule,
                'no_invoice' => $no_invoice,
                'tanggal_invoice' => $tanggal_invoice,
                'dp' => $dp,
                'keterangan' => $keterangan,
                'nominal_total' => $nominal_total,
                'nominal_terbayar' => $dp,
                'status_invoice' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        $updatestatusschedule=DB::table('schedule')->where('id',$schedule_id)->update(
            [
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('invoice')->with(['success' => 'Data invoice ditambahkan.']); 
    }

    public static function quickRandom($length = 5)
    {
        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
  
    public function edit($id)
    {
        $rs=DB::table('invoice')->where('id',$id)->first();

        $schedule=DB::table('schedule')
        ->leftJoin('client','schedule.client_id','=','client.id')
        ->leftJoin('package_decoration','schedule.package_decoration_id','=','package_decoration.id')
        ->select('schedule.*','client.nama_client','package_decoration.nama_paket','package_decoration.harga_paket')
        ->where('schedule.kode_schedule',$rs->kode_schedule)->first();

		$data = array(  
            'indexPage' => "Edit Data Invoice",
            'rs' => $rs,
            'schedule' => $schedule,
		);
        return view($this->base.'edit')->with($data);
    }
  
    public function update(Request $request)
    {
        $id=$request->input('id');
        $tanggal_invoice=$request->input('tanggal_invoice');
        $dp=str_replace(".", "",$request->input('dp'));
        $keterangan=$request->input('keterangan');


		$update = DB::table('invoice')->where('id',$id)->update(
            [
                'tanggal_invoice' => $tanggal_invoice,
                'dp' => $dp,
                'keterangan' => $keterangan,
                'nominal_terbayar' => $dp,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('invoice')->with(['success' => 'Data invoice diupdate.']); 
    }

    public function hapus($id)
    {
        $cek = DB::table('invoice')->where('id',$id)->first();
        $updateschedule=DB::table('schedule')->where('kode_schedule',$cek->kode_schedule)->update(
            [
                'status' => 0,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        $insert = DB::table('invoice')->where('id',$id)->delete();
            
        return redirect()->route('invoice')->with(['success' => 'Data invoice dihapus.']);
    }

    public function detailschedule($id)
    {
        $data=DB::table('schedule')
        ->leftJoin('client','schedule.client_id','=','client.id')
        ->leftJoin('package_decoration','schedule.package_decoration_id','=','package_decoration.id')
        ->select('schedule.*','client.nama_client','package_decoration.nama_paket','package_decoration.harga_paket')
        ->where('schedule.id',$id)->first();

        return response()->json($data);
    }

    public function batal($id)
    {
        $rs=DB::table('invoice')->where('id',$id)->first();

		$data = array(  
            'indexPage' => "Batalkan Invoice",
            'rs' => $rs,
		);
        return view($this->base.'batal')->with($data);
    }

    public function batalkan(Request $request)
    {
        $id=$request->input('id');

        $cek = DB::table('invoice')->where('id',$id)->first();
        $updateschedule=DB::table('schedule')->where('kode_schedule',$cek->kode_schedule)->update(
            [
                'status' => 3,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        $updateinv=DB::table('invoice')->where('id',$id)->update(
            [
                'status_invoice' => 2,
                'tanggal_batal' => date('Y-m-d'),
                'keterangan_batal' => $request->input('keterangan_batal'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
            
        return redirect()->route('invoice')->with(['success' => 'Invoice telah dibatalkan.']);
    }

    public function kwitansi($id)
    {
        $kwitansi=DB::table('kwitansi')
        ->join('invoice','kwitansi.id_invoice','=','invoice.id')
        ->select('kwitansi.*','invoice.no_invoice')
        ->where('id_invoice',$id)->get();

        $inv=DB::table('invoice')->where('id',$id)->first();
        $kode_kwitansi = "BNZ/KWI/".date('Y')."/".date('m')."/".$this->quickRandom();

        $schedule=DB::table('schedule')
        ->leftJoin('package_decoration','schedule.package_decoration_id','=','package_decoration.id')
        ->select('schedule.*',  'package_decoration.harga_paket')
        ->where('schedule.kode_schedule',$inv->kode_schedule)->first();

		$data = array(  
            'indexPage' => "Buat Kwitansi",
            'kwitansi' => $kwitansi,
            'inv' => $inv,
            'kode_kwitansi' => $kode_kwitansi
		);
        return view('backend.kwitansi.index')->with($data);
    }

    public function buatkwitansi(Request $request)
    {
        $id=$request->input('id');
        $kode_kwitansi=$request->input('kode_kwitansi');
        $tanggal_kwitansi=$request->input('tanggal_kwitansi');
        $nominal_pembayaran=str_replace(".", "",$request->input('nominal_pembayaran'));
        $keterangan_pembayaran=$request->input('keterangan_pembayaran');

        $insert=DB::table('kwitansi')->insert(
            [
                'id_invoice' => $id,
                'kode_kwitansi' => $kode_kwitansi,
                'tanggal_kwitansi' => $tanggal_kwitansi,
                'nominal_pembayaran' => $nominal_pembayaran,
                'keterangan_pembayaran' => $keterangan_pembayaran,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );

        $cek = DB::table('invoice')->where('id',$id)->first();
        $nominal_terbayar=$cek->nominal_terbayar;
        $tambahnominal=$nominal_pembayaran+$nominal_terbayar;

        $updateschedule=DB::table('schedule')->where('kode_schedule',$cek->kode_schedule)->update(
            [
                'status' => 2,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        $updateinv=DB::table('invoice')->where('id',$id)->update(
            [
                'nominal_terbayar' => $tambahnominal,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        
        $cekterbaru = DB::table('invoice')->where('id',$id)->first();
        
        if($cekterbaru->nominal_total == $cekterbaru->nominal_terbayar)
        {
            DB::table('invoice')->where('id',$id)->update(
                [
                    'status_invoice' => 1,
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );
        }
            
        return redirect()->back()->with(['success' => 'Kwitansi telah diupdate.']);
    }

    public function hapuskwitansi($id)
    {
        $kwitansi=DB::table('kwitansi')->where('id',$id)->first();
        $nominal_pembayaran=$kwitansi->nominal_pembayaran;

        $invoice=DB::table('invoice')->where('id',$kwitansi->id_invoice)->first();
        $dikurangi=$invoice->nominal_terbayar - $nominal_pembayaran;

        $updateinvoice=DB::table('invoice')->where('id',$kwitansi->id_invoice)->update(
            [
                'nominal_terbayar' => $dikurangi,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );


        DB::table('kwitansi')->where('id',$id)->delete();
        return redirect()->back()->with(['success' => 'Kwitansi telah dihapus.']);
    }
	
}
