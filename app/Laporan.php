<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    public function kecamatan() 
    {
        return $this->belongsTo('App\Kecamatan', 'id_kecamatan');
    }

    public function fasilitas() 
    {
        return $this->belongsTo('App\Fasilitas', 'id_fasilitas');
    }
}
