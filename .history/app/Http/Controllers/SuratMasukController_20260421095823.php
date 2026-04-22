<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SuratMasukController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Data Surat Masuk',
            'menuSuratMasuk' => 'active',
            'suratmasuk' => SuratMasuk::orderBy('sifat','asc')->get(),
        ]; 
        return view('suratm/suratmasuk',$data);
    }
    
    public function create(){
        return view('suratm/create', [
            'title' => 'Tambah Data Surat Masuk',
            'menuSuratMasuk' => 'active',
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'no_urut' => 'required',
            'tanggal_surat' => 'required|date',
            'nomor_surat' => 'required',
            'diterima_dari' => 'required',
            'perihal' => 'required',
            'sifat' => 'required',
            'tanggal_dan_tempat_pelaksanaan' => 'required',
            'tanggal_diteruskan' => 'required|date',
            'diteruskan_kepada' => 'required',
            'dengan_hormat_harap' => 'required',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:10240',
        ]);

        $surat = new SuratMasuk;

        // upload file
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $namaFile = time().'_'.$file->getClientOriginalName();
            $file->storeAs('uploads/lampiran', $namaFile, 'public');

            $surat->lampiran = 'uploads/lampiran/'.$namaFile;
        }

        $surat->fill($request->except('lampiran'));
        $surat->save();

        return redirect()->route('suratmasuk')->with('success','Data Berhasil Ditambahkan');
    }

    public function edit($id){
        return view('suratm/edit', [
            'title' => 'Edit Data Surat Masuk',
            'menuSuratMasuk' => 'active',
            'suratmasuk' => SuratMasuk::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'no_urut' => 'required',
            'tanggal_surat' => 'required|date',
            'nomor_surat' => 'required',
            'diterima_dari' => 'required',
            'perihal' => 'required',
            'sifat' => 'required',
            'tanggal_dan_tempat_pelaksanaan' => 'required',
            'tanggal_diteruskan' => 'required|date',
            'diteruskan_kepada' => 'required',
            'dengan_hormat_harap' => 'required',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:10240',
        ]);

        $surat = SuratMasuk::findOrFail($id);

        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $namaFile = time().'_'.$file->getClientOriginalName();
            $file->storeAs('uploads/lampiran', $namaFile, 'public');

            $surat->lampiran = 'uploads/lampiran/'.$namaFile;
        }

        $surat->fill($request->except('lampiran'));
        $surat->save();

        return redirect()->route('suratmasuk')->with('success','Data Berhasil Di Edit');
    }

    public function destroy($id){
        SuratMasuk::findOrFail($id)->delete();
        return redirect()->route('suratmasuk')->with('success', 'Data Berhasil Di Hapus');
    }

    // ===============================
    // ✅ KIRIM TELEGRAM
    // ===============================
    public function kirimTelegram($id)
    {
        $data = SuratMasuk::findOrFail($id);

        $token = env('TELEGRAM_BOT_TOKEN');
        $chat_id = env('TELEGRAM_CHAT_ID');

        $pesan = "📩 *SURAT MASUK*\n\n".
            "No Urut: {$data->no_urut}\n".
            "Tanggal: {$data->tanggal_surat}\n".
            "Nomor: {$data->nomor_surat}\n".
            "Dari: {$data->diterima_dari}\n".
            "Perihal: {$data->perihal}\n".
            "Sifat: {$data->sifat}\n".
            "Pelaksanaan: {$data->tanggal_dan_tempat_pelaksanaan}\n".
            "Diteruskan: {$data->tanggal_diteruskan}\n".
            "Kepada: {$data->diteruskan_kepada}\n".
            "Catatan: {$data->dengan_hormat_harap}";

        // jika ada lampiran -> kirim dokumen
        if ($data->lampiran && file_exists(storage_path('app/public/'.$data->lampiran))) {

            Http::attach(
                'document',
                file_get_contents(storage_path('app/public/'.$data->lampiran)),
                basename($data->lampiran)
            )->post("https://api.telegram.org/bot{$token}/sendDocument", [
                'chat_id' => $chat_id,
                'caption' => $pesan,
                'parse_mode' => 'Markdown'
            ]);

        } else {
            // hanya text
            Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
                'chat_id' => $chat_id,
                'text' => $pesan,
                'parse_mode' => 'Markdown'
            ]);
        }

        return redirect()->back()->with('success','Berhasil kirim ke Telegram');
    }

    // ===============================
    // WA (punya kamu, saya rapikan dikit)
    // ===============================
    public function kirimWaSurat($id)
    {
        $data = SuratMasuk::findOrFail($id);

        $nomorWA = $data->no_wa;

        $pesan = "📩 SURAT MASUK\n\n".
            "No Urut: {$data->no_urut}\n".
            "Tanggal: {$data->tanggal_surat}\n".
            "Nomor: {$data->nomor_surat}\n".
            "Dari: {$data->diterima_dari}\n".
            "Perihal: {$data->perihal}\n".
            "Sifat: {$data->sifat}\n".
            "Pelaksanaan: {$data->tanggal_dan_tempat_pelaksanaan}\n".
            "Diteruskan: {$data->tanggal_diteruskan}\n".
            "Kepada: {$data->diteruskan_kepada}";

        return redirect()->away("https://wa.me/".$nomorWA."?text=".urlencode($pesan));
    }
}