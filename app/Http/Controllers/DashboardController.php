<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pinjaman;

class DashboardController extends Controller
{
    public function login(Request $request)
    {
      if ($request->session()->has('login')) {
        return redirect('dashboard');
      }else{
        return view('homepage');
      }
    }
    public function index(Request $request)
    {
      if ($request->session()->has('login')) {

        $data = array();
        $pinjaman = Pinjaman::get();
        $data['pinjaman'] = $pinjaman;

        return view('dashboard',$data);
      }else{
        return redirect('/');
      }
    }
}
