<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Yajra\Datatables\Datatables;

class ScheduleController extends Controller
{
    protected $base = 'backend.schedule.';

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

		$data = array(  
            'indexPage' => "Schedule",
            'schedule' => $schedule
		);
        return view($this->base.'index')->with($data);
    }
    
    public function tambah()
    {
        $client=DB::table('client')->orderBy('nama_client','ASC')->get();
        $package=DB::table('package_decoration')->orderBy('nama_paket','ASC')->get();

		$data = array(  
            'indexPage' => "Tambah Data Schedule",
            'client' => $client,
            'package' => $package
		);
        return view($this->base.'tambah')->with($data);
    }
  
    public function add(Request $request)
    {
        $client_id=$request->input('client_id');
        $tanggal_schedule=$request->input('tanggal_schedule');
        $tanggal_selesai=$request->input('tanggal_selesai');
        $package_decoration_id=$request->input('package_decoration_id');
        $venue=$request->input('venue');

        $kode_schedule = date('Y')."/".date('m')."/SCH/".$this->quickRandom();

		$insert = DB::table('schedule')->insert(
            [
                'kode_schedule' => $kode_schedule,
                'client_id' => $client_id,
                'tanggal_schedule' => $tanggal_schedule,
                'tanggal_selesai' => $tanggal_selesai,
                'package_decoration_id' => $package_decoration_id,
                'venue' => $venue,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('schedule')->with(['success' => 'Data schedule ditambahkan.']); 
    }

    public static function quickRandom($length = 5)
    {
        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
  
    public function edit($id)
    {
        $rs=DB::table('schedule')
        ->leftJoin('client','schedule.client_id','=','client.id')
        ->leftJoin('package_decoration','schedule.package_decoration_id','=','package_decoration.id')
        ->select('schedule.*','client.nama_client','client.email_client','client.telepon_client','client.alamat_client','package_decoration.nama_paket')
        ->where('schedule.id',$id)->first();
        $client=DB::table('client')->orderBy('nama_client','ASC')->get();
        $package=DB::table('package_decoration')->orderBy('nama_paket','ASC')->get();

		$data = array(  
            'indexPage' => "Edit Data Schedule",
            'rs' => $rs,
            'client' => $client,
            'package' => $package
		);
        return view($this->base.'edit')->with($data);
    }
  
    public function update(Request $request)
    {
        $id=$request->input('id');
        $client_id=$request->input('client_id');
        $tanggal_schedule=$request->input('tanggal_schedule');
        $tanggal_selesai=$request->input('tanggal_selesai');
        $package_decoration_id=$request->input('package_decoration_id');
        $venue=$request->input('venue');


		$update = DB::table('schedule')->where('id',$id)->update(
            [
                'client_id' => $client_id,
                'tanggal_schedule' => $tanggal_schedule,
                'tanggal_selesai' => $tanggal_selesai,
                'package_decoration_id' => $package_decoration_id,
                'venue' => $venue,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('schedule')->with(['success' => 'Data schedule diupdate.']); 
    }

    public function hapus($id)
    {
        $insert = DB::table('schedule')->where('id',$id)->delete();
            
        return redirect()->route('schedule')->with(['success' => 'Data schedule dihapus.']);
    }

    public function detailclient($id)
    {
        $data=DB::table('client')->where('id',$id)->first();

        return response()->json($data);
    }
	
}
