<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Auth;
use Hash;
use Session;

class Autentikasi extends Controller
{
    function Login()
    {
        return view('login');
    }
    function DoLogin(Request $req)
    {
        if(Auth::attempt(['username'=> $req->username, 'password'=>$req->password]))
        {
            Session::put('dd', 'ada');
            Auth::user();
            return redirect()->intended('/');
        }
        
        return redirect('login');
    }
}
