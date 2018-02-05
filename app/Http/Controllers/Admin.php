<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class Admin extends Controller
{
    function Home()
    {
        // dd(Auth::user());
        return view('admin.home');
    }

    function Logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
