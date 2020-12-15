<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User; 
use DB;
class DashboardController extends Controller
{
    protected $base = 'backend.';

    public function __construct()
    {
        view()->share('base', $this->base);
    }

    public function index()
    {
		$data = array(  
            'indexPage' => "Dashboard",
        );
        
        return view($this->base.'index')->with($data);
    }
}
