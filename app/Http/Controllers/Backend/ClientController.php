<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Yajra\Datatables\Datatables;

class ClientController extends Controller
{
    protected $base = 'backend.masterisasi.client.';

    public function __construct()
    {
        view()->share('base', $this->base);
    }
  
    public function index()
    {
        $client=DB::table('client')->orderBy('nama_client','ASC')->get();

		$data = array(  
            'indexPage' => "Client",
            'client' => $client
		);
        return view($this->base.'index')->with($data);
    }
    
    public function tambah()
    {
		$data = array(  
            'indexPage' => "Tambah Data Client",
		);
        return view($this->base.'tambah')->with($data);
    }
  
    public function add(Request $request)
    {
        $nama_client=$request->input('nama_client');
        $email_client=$request->input('email_client');
        $telepon_client=$request->input('telepon_client');
        $alamat_client=$request->input('alamat_client');

		$insert = DB::table('client')->insert(
            [
                'nama_client' => $nama_client,
                'email_client' => $email_client,
                'telepon_client' => $telepon_client,
                'alamat_client' => $alamat_client,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('client')->with(['success' => 'Data client ditambahkan.']); 
    }
  
    public function edit($id)
    {
        $rs=DB::table('client')->where('id',$id)->first();

		$data = array(  
            'indexPage' => "Edit Data Client",
            'rs' => $rs
		);
        return view($this->base.'edit')->with($data);
    }
  
    public function update(Request $request)
    {
        $id=$request->input('id');
        $nama_client=$request->input('nama_client');
        $email_client=$request->input('email_client');
        $telepon_client=$request->input('telepon_client');
        $alamat_client=$request->input('alamat_client');

		$update = DB::table('client')->where('id',$id)->update(
            [
                'nama_client' => $nama_client,
                'email_client' => $email_client,
                'telepon_client' => $telepon_client,
                'alamat_client' => $alamat_client,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('client')->with(['success' => 'Data client diupdate.']); 
    }

    public function hapus($id)
    {
        $insert = DB::table('client')->where('id',$id)->delete();
            
        return redirect()->route('client')->with(['success' => 'Data client dihapus.']);
    }
	
}
