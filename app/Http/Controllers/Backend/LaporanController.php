<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Yajra\Datatables\Datatables;

class LaporanController extends Controller
{
    protected $base = 'backend.laporan.';

    public function __construct()
    {
        view()->share('base', $this->base);
    }
  
    public function index()
    {
        $schedule=DB::table('schedule')
        ->leftJoin('client','schedule.client_id','=','client.id')
        ->leftJoin('package_decoration','schedule.package_decoration_id','=','package_decoration.id')
        ->select('schedule.*','client.nama_client','client.email_client','client.telepon_client','package_decoration.nama_paket','package_decoration.harga_paket')
        ->orderBy('schedule.id','DESC')->get();

        $invoice=DB::table('invoice')->get();

		$data = array(  
            'indexPage' => "Laporan",
            'schedule' => $schedule,
            'invoice' => $invoice
		);
        return view($this->base.'index')->with($data);
    }	

    public function cetakinvoice($id)
    {
        $sch=DB::table('schedule')
        ->leftJoin('client','schedule.client_id','=','client.id')
        ->leftJoin('package_decoration','schedule.package_decoration_id','=','package_decoration.id')
        ->select('schedule.*','client.nama_client','client.email_client','client.telepon_client','client.alamat_client','package_decoration.nama_paket','package_decoration.harga_paket','package_decoration.item_paket','package_decoration.keterangan_paket')
        ->where('schedule.id',$id)->first();

        $inv=DB::table('invoice')->where('kode_schedule',$sch->kode_schedule)->first();

		$data = array(  
            'indexPage' => "Cetak Invoice",
            'sch' => $sch,
            'inv' => $inv,
		);
        return view($this->base.'cetakinvoice')->with($data);
    }

    public function cetakkwitansi($id)
    {
        $sch=DB::table('schedule')
        ->leftJoin('client','schedule.client_id','=','client.id')
        ->leftJoin('package_decoration','schedule.package_decoration_id','=','package_decoration.id')
        ->select('schedule.*','client.nama_client','client.email_client','client.telepon_client','client.alamat_client','package_decoration.nama_paket','package_decoration.harga_paket','package_decoration.item_paket','package_decoration.keterangan_paket')
        ->where('schedule.id',$id)->first();

        $inv=DB::table('invoice')->where('kode_schedule',$sch->kode_schedule)->first();

		$data = array(  
            'indexPage' => "Cetak Kwitansi",
            'sch' => $sch,
            'inv' => $inv,
		);
        return view($this->base.'cetakkwitansi')->with($data);
    }

    public function lihatkwitansi($id)
    {
        $kwitansi=DB::table('kwitansi')
        ->join('invoice','kwitansi.id_invoice','=','invoice.id')
        ->select('kwitansi.*','invoice.no_invoice')
        ->where('id_invoice',$id)->get();

        $inv=DB::table('invoice')->where('id',$id)->first();

		$data = array(  
            'indexPage' => "Lihat Kwitansi",
            'kwitansi' => $kwitansi,
            'inv' => $inv
		);
        return view($this->base.'kwitansi')->with($data);
    }
}
