<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Http;

class WhatsAppController extends Controller
{
    public function kirimSurat($id)
{
    // 1. Ambil data dari database
    $surat = SuratMasuk::findOrFail($id);

    // 2. Ambil nomor HP
    $phone = $surat->no_hp ? preg_replace('/^0/', '62', $surat->no_hp) : null;
    if (!$phone) {
        return back()->with('error', 'Nomor HP belum tersedia!');
    }

    // 3. Susun isi pesan
    $message = "📩 SURAT MASUK\n\n";
    $message .= "Tanggal Surat: " . $surat->tanggal_surat . "\n";
    $message .= "Nomor Surat: " . $surat->nomor_surat . "\n";
    $message .= "Pengirim: " . $surat->diterima_dari . "\n";
    $message .= "Perihal: " . $surat->perihal . "\n";
    $message .= "Sifat: " . $surat->sifat . "\n";
    $message .= "Dengan Hormat Harap: " . $surat->dengan_hormat_harap . "\n";
    $message .= "Diteruskan Kepada: " . $surat->diteruskan_kepada . "\n";

    // 4. Kirim ke Fonnte
    $response = Http::withHeaders([
        'Authorization' => env('FONNTE_TOKEN')
    ])->post('https://api.fonnte.com/send', [
        'target' => $phone,
        'message' => $message
    ]);

    dd($response->json());

    // 5. Balik ke halaman sebelumnya
    return back()->with('success', 'Berhasil kirim WA');
}
}