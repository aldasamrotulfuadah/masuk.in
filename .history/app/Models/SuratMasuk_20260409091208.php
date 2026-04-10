<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
     protected $fillable = [
        'tanggal_surat',
        'nomor_surat',
        'diterima_dari',
        'perihal',
        'file_surat',
        'tanggal',
        'diteruskan_kepada',
        'dengan_hormat_harap',
        'no_hp',
    ];
 
}
