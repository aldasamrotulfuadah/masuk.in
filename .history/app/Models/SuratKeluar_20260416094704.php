<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $fillable = [
        'no_urur',
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
    ];
}
