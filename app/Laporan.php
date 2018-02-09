<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';
    const CREATED_AT = 'tgl_dikirim'; 
    const UPDATED_AT = 'updated_at';

    public function kecamatan() 
    {
        return $this->belongsTo('App\Kecamatan', 'id_kecamatan');
    }

    public function fasilitas() 
    {
        return $this->belongsTo('App\Fasilitas', 'id_fasilitas');
    }

    public function updateStatus($status)
    {
        $this->status = $status;
        $this->tgl_diverifikasi = now();
        $this->save();
    }
}
