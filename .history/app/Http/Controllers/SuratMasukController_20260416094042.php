<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index(){
        $data = array(
            'title'   => 'Data Surat Masuk',
            'menuSuratMasuk'   => 'active',
            'suratmasuk'   => suratmasuk::orderBy('sifat','asc')->get(),
        ); 
        return view('suratm/suratmasuk',$data);
    }
    
    public function create(){
        $data = array(
            'title'   => 'Tambah Data Surat Masuk',
            'menuSuratMasuk'   => 'active',
        ); 
        return view('suratm/create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'tanggal_surat'                   => 'required|date',
            'nomor_surat'                     => 'required',
            'diterima_dari'                   => 'required',
            'perihal'                         => 'required',
            'sifat'                           => 'required',
            'tanggal_dan_tempat_pelaksanaan'  => 'required',
            'tanggal_diteruskan'              => 'required|date',
            'diteruskan_kepada'               => 'required',
            'dengan_hormat_harap'             => 'required',
            'lampiran'                        => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ],[
            'tanggal_surat.required'                  => 'Tanggal Surat Tidak Boleh Kosong',
            'nomor_surat.required'                    => 'Nomor Surat Tidak Boleh Kosong',
            'diterima_dari.required'                  => 'Tidak Boleh Kosong',
            'perihal.required'                        => 'Perihal Surat Tidak Boleh Kosong',
            'sifat.required'                          => 'Sifat Surat Harus Dipilih',
            'tanggal_dan_tempat_pelaksanaan.required' => 'Tanggal dan Tempat Pelaksanaan Tidak Boleh Kosong',
            'tanggal_diteruskan.required'             => 'Tanggal Diteruskan Tidak Boleh Kosong',
            'diteruskan_kepada.required'              => 'Disposisi Surat Harus Dipilih',
            'dengan_hormat_harap.required'            => 'Disposisi Surat Harus Dipilih',
        ]);

        $suratmasuk = new suratmasuk;
        $suratmasuk->tanggal_surat                   = $request->tanggal_surat;
        $suratmasuk->nomor_surat                     = $request->nomor_surat;
        $suratmasuk->diterima_dari                   = $request->diterima_dari;
        $suratmasuk->perihal                         = $request->perihal;
        $suratmasuk->sifat                           = $request->sifat;
        $suratmasuk->tanggal_dan_tempat_pelaksanaan  = $request->tanggal_dan_tempat_pelaksanaan;
        $suratmasuk->tanggal_diteruskan              = $request->tanggal_diteruskan;
        $suratmasuk->diteruskan_kepada               = $request->diteruskan_kepada;
        $suratmasuk->dengan_hormat_harap             = $request->dengan_hormat_harap;
        //Simpan File
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $path = $file->store('uploads/lampiran', 'public');

             $suratmasuk->lampiran = $path;
        }
        $suratmasuk->save();

        return redirect()->route('suratmasuk')->with('success','Data Berhasil Ditambahkan');
    }

    public function edit($id){
        $data = array(
            'title'   => 'Edit Data Surat Masuk',
            'menuSuratMasuk'   => 'active',
            'suratmasuk' => SuratMasuk::findOrFail($id),
        ); 
        return view('suratm/edit',$data);
    }

     public function update(Request $request, $id){
        $request->validate([
            'tanggal_surat'                  => 'required|date',
            'nomor_surat'                    => 'required',
            'diterima_dari'                  => 'required',
            'perihal'                        => 'required',
            'sifat'                          => 'required',
            'tanggal_dan_tempat_pelaksanaan' => 'required',
            'tanggal_diteruskan'             => 'required|date',
            'diteruskan_kepada'              => 'required',
            'dengan_hormat_harap'            => 'required',
            'lampiran'                       => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ],[
            'tanggal_surat.required'                  => 'Tanggal Surat Tidak Boleh Kosong',
            'nomor_surat.required'                    => 'Nomor Surat Tidak Boleh Kosong',
            'diterima_dari.required'                  => 'Tidak Boleh Kosong',
            'perihal.required'                        => 'Perihal Surat Tidak Boleh Kosong',
            'sifat.required'                          => 'Sifat Surat Harus Dipilih',
            'tanggal_dan_tempat_pelaksanaan.required' => 'Tanggal dan Tempat Pelaksanaan Tidak Boleh Kosong',
            'tanggal_diteruskan.required'             => 'Tanggal Diteruskan Tidak Boleh Kosong',
            'diteruskan_kepada.required'              => 'Disposisi Surat Harus Dipilih',
            'dengan_hormat_harap.required'            => 'Disposisi Surat Harus Dipilih',
        ]);

        $suratmasuk = SuratMasuk::findOrFail($id);
        $suratmasuk->tanggal_surat                      = $request->tanggal_surat;
        $suratmasuk->nomor_surat                        = $request->nomor_surat;
        $suratmasuk->diterima_dari                      = $request->diterima_dari;
        $suratmasuk->perihal                            = $request->perihal;
        $suratmasuk->sifat                              = $request->sifat;
        $suratmasuk->tanggal_dan_tempat_pelaksanaan     = $request->tanggal_dan_tempat_pelaksanaan;
        $suratmasuk->tanggal_diteruskan                 = $request->tanggal_diteruskan;
        $suratmasuk->diteruskan_kepada                  = $request->diteruskan_kepada;
        $suratmasuk->dengan_hormat_harap                = $request->dengan_hormat_harap;
         //Simpan File
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $path = $file->store('uploads/lampiran', 'public');

             $suratmasuk->lampiran = $path;
        }
        $suratmasuk->save();

        return redirect()->route('suratmasuk')->with('success','Data Berhasil Di Edit');
    }

    public function destroy($id){
        $suratmasuk = SuratMasuk::findOrFail($id);
        $suratmasuk->delete();

        return redirect()->route('suratmasuk')->with('success', 'Data Berhasil Di Hapus');
    }

        public function kirimWaSurat($id)
{
    $data = SuratMasuk::findOrFail($id);

    // pastikan nomor WA sudah format internasional, contoh 6281234567890
    $nomorWA = $data->no_wa; 

    // bikin pesan default
    $pesan = "📩 SURAT MASUK\n\n" .
             "Tanggal Surat: ".$data->tanggal_surat."\n" .
             "Nomor Surat: ".$data->nomor_surat."\n" .
             "Diterima Dari: ".$data->diterima_dari."\n" .
             "Perihal: ".$data->perihal."\n" .
             "Sifat: ".$data->sifat."\n" .
             "Tanggal dan Tempat Pelaksanaan: ".$data->tanggal_dan_tempat_pelaksanaan."\n" .
             "Tanggal Diteruskan: ".$data->tanggal_diteruskan."\n" .
             "Dengan Hormat Harap: ".$data->dengan_hormat_harap."\n" .
             "Diteruskan Kepada: ".$data->diteruskan_kepada."\n" .
             "Lampiran: ".$data->lampiran;

    // encode pesan untuk URL
    $waLink = "https://wa.me/".$nomorWA."?text=".urlencode($pesan);

    // redirect ke WA
    return redirect()->away($waLink);
}

}
