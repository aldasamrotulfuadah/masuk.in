<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
     protected $fillable = [
        'tanggal_surat',
        'tanggal_surat',
        'nomor_surat',
        'diterima_dari',
        'perihal',
        'sifat',
        'tanggal_dan_tempat_pelaksanaan',
        'tanggal_diteruskan',
        'diteruskan_kepada',
        'dengan_hormat_harap',
        'lampiran',
        'no_hp',
    ];
 
}
