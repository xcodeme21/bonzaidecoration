<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Yajra\Datatables\Datatables;

class ProfilController extends Controller
{
    protected $base = 'backend.profil.';

    public function __construct()
    {
        view()->share('base', $this->base);
    }
  
    public function index()
    {
		$data = array(  
            'indexPage' => "Profil",
		);
        return view($this->base.'index')->with($data);
    }
  
    public function update(Request $request)
    {
        $name=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');

        if($password == null)
        {
            $update = DB::table('users')->where('id',auth()->user()->id)->update(
                [
                    'name' => $name,
                    'email' => $email,
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );
        }
        else
        {
            $update = DB::table('users')->where('id',auth()->user()->id)->update(
                [
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt($password),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );
        }

		

        return redirect()->route('profil')->with(['success' => 'Profil berhasil diupdate.']); 
    }
	
}
