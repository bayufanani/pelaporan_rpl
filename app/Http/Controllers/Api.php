<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class Api extends Controller
{
    function DataPelaporan()
    {
        $laporan = App\Laporan::all();
        $data = [];
        $no = 1;
        foreach($laporan as $dt)
        {
            $data[] = [
                'no'=>$no++,
                'id_laporan'=>$dt->id_laporan,
                'kecamatan'=>$dt->kecamatan->nama_kecamatan,
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

    function DataPelaporanById($id)
    {
        $laporan = App\Laporan::find($id);
        $data = [
            'id_laporan'=>$laporan->id_laporan,
            'kecamatan'=>$laporan->kecamatan->nama_kecamatan,
            'fasilitas'=>$laporan->fasilitas->nama_fasilitas,
             'lokasi'=>$laporan->lokasi,
              'foto'=>$laporan->foto,
              'tgl_dikirm'=>$laporan->tgl_dikirim,
              'pengirim'=>$laporan->pengirim,
              'tgl_diverifikasi'=>$laporan->tgl_diverifikasi,
              'status'=>$laporan->status,
              'keterangan'=>$laporan->keterangan
          ];
        return json_encode($data);
    }

    function DetailModal($id)
    {
        $laporan = App\Laporan::find($id);
        $status = 'Pending';
        if($laporan->status == 1)
        {
            $status = 'Tidak valid';
        }
        else if($laporan->status == 2)
        {
            $status = 'Terverifikasi';
        }
        if($laporan->tgl_diverifikasi == '0000-00-00 00:00:00')
        {
            $tgl_verifikasi = '';
        }
        else
        {
            $tgl_verifikasi = ' pada '.$laporan->tgl_diverifikasi;
        }
        $data = [
            'kecamatan'=>$laporan->kecamatan->nama_kecamatan,
            'fasilitas'=>$laporan->fasilitas->nama_fasilitas,
            'lokasi'=>$laporan->lokasi,
            'foto'=>$laporan->foto,
            'tanggal_dikirim'=>$laporan->tgl_dikirim,
            'pengirim'=>$laporan->pengirim,
            'status'=>$status.$tgl_verifikasi,
            'keterangan'=>$laporan->keterangan
        ];
        return view('admin.detail', $data);
    }

    function DataKecamatan()
    {
        return  App\Kecamatan::all();
    }

    function DataFasilitas()
    {
        return App\Fasilitas::all();
    }
}
