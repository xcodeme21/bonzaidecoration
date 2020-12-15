<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Yajra\Datatables\Datatables;

class PackageDecorationController extends Controller
{
    protected $base = 'backend.masterisasi.package-decoration.';

    public function __construct()
    {
        view()->share('base', $this->base);
    }
  
    public function index()
    {
        $package_decoration=DB::table('package_decoration')->orderBy('id','DESC')->get();

		$data = array(  
            'indexPage' => "Package Decoration",
            'package_decoration' => $package_decoration
		);
        return view($this->base.'index')->with($data);
    }
    
    public function tambah()
    {
		$data = array(  
            'indexPage' => "Tambah Package Decoration",
		);
        return view($this->base.'tambah')->with($data);
    }
  
    public function add(Request $request)
    {
        $nama_paket=$request->input('nama_paket');
        $harga_paket=str_replace(".", "",$request->input('harga_paket'));
        $item_paket=$request->input('item_paket');
        $keterangan_paket=$request->input('keterangan_paket');

		$insert = DB::table('package_decoration')->insert(
            [
                'nama_paket' => $nama_paket,
                'harga_paket' => $harga_paket,
                'item_paket' => $item_paket,
                'keterangan_paket' => $keterangan_paket,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('package-decoration')->with(['success' => 'Package Decoration ditambahkan.']); 
    }
  
    public function edit($id)
    {
        $rs=DB::table('package_decoration')->where('id',$id)->first();

		$data = array(  
            'indexPage' => "Edit Package Decoration",
            'rs' => $rs
		);
        return view($this->base.'edit')->with($data);
    }
  
    public function update(Request $request)
    {
        $id=$request->input('id');
        $nama_paket=$request->input('nama_paket');
        $harga_paket=str_replace(".", "",$request->input('harga_paket'));
        $item_paket=$request->input('item_paket');
        $keterangan_paket=$request->input('keterangan_paket');

		$update = DB::table('package_decoration')->where('id',$id)->update(
            [
                'nama_paket' => $nama_paket,
                'harga_paket' => $harga_paket,
                'item_paket' => $item_paket,
                'keterangan_paket' => $keterangan_paket,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('package-decoration')->with(['success' => 'Package Decoration diupdate.']); 
    }

    public function hapus($id)
    {
        $insert = DB::table('package_decoration')->where('id',$id)->delete();
            
        return redirect()->route('package-decoration')->with(['success' => 'Package Decoration dihapus.']);
    }
	
}
