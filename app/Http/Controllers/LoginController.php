<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
      if($request->password=='fleksibel'){
        $request->session()->put('login','masuk');
        return redirect('/dashboard');
      }else{
        return redirect('/');
      }
    }
}
