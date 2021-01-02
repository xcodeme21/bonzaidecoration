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
        $totalclient=DB::table('client')->count();
        $scheduletahunini=DB::table('schedule')->where('status','!=',3)->whereYear('tanggal_schedule',date('Y'))->count();
        $schedulebulanini=DB::table('schedule')->where('status','!=',3)->whereMonth('tanggal_schedule',date('m'))->count();
        $sumpemasukan=DB::table('invoice')->where('status_invoice','!=',2)->sum('nominal_terbayar');
        $total_pemasukan=$sumpemasukan;

		$data = array(  
            'indexPage' => "Dashboard",
            'totalclient' =>$totalclient,
            'scheduletahunini' =>$scheduletahunini,
            'schedulebulanini' =>$schedulebulanini,
            'total_pemasukan' =>$total_pemasukan,
        );
        
        return view($this->base.'index')->with($data);
    }
}
