<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Transaksi;
use App\Anggota;
// use App\Acara;
use App\User;
// use App\nikah;
// use App\Gerwil;
use App\Talenta;
// use App\Jabatan;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggotas = Anggota::count(); 
        $user = User::get();
        $talentas  = Talenta::get();
        $anggota   = Anggota::get();

        return view('layouts.dashboard',array('talenta' => $talentas, 'anggota' => $anggota, 'anggotas' => $anggotas,   'user' => $user));
    
        

    }
}
    