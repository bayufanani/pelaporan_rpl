<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Laporan;

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

    function Verifikasi($id)
    {
        $laporan = Laporan::find($id);
        $laporan->updateStatus(2);
        return redirect('/');
    }

    function HapusLaporan($id)
    {
        $laporan = Laporan::find($id);
        $laporan->delete();
        return redirect('/');
    }

    function Invalid($id)
    {
        $laporan = Laporan::find($id);
        $laporan->updateStatus(1);
        return redirect('/');
    }
}
