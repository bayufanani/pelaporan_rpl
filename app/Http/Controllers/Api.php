<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class Api extends Controller
{
    function DataPelaporan()
    {
        $laporan = App\Laporan::all();
        foreach($laporan as $dt)
        {
            $data[] = [
                'id_laporan'=>$dt->id_laporan,
                'fasilitas'=>$dt->fasilitas->nama_fasilitas,
                'lokasi'=>$dt->lokasi,
                'foto'=>$dt->foto,
                'tgl_dikirm'=>$dt->tgl_dikirim,
                'pengirim'=>$dt->pengirim,
                'tgl_diverifikasi'=>$dt->tgl_diverifikasi,
                'status'=>$dt->status,
                'keterangan'=>$dt->keterangan
            ];
        }
        return json_encode($data);
    }
}
