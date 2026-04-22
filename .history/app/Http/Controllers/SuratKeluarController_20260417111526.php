<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index(){
        $data = array(
            'title'   => 'Data Surat Masuk',
            'menuSuratKeluar'   => 'active',
            'suratkeluar'   => suratkeluar::orderBy('sifat','asc')->get(),
        ); 
        return view('suratk/suratkeluar',$data);
    }
    
    public function create(){
        $data = array(
            'title'   => 'Tambah Data Surat Keluar',
            'menuSuratKeluar'   => 'active',
        ); 
        return view('suratk/create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'no_urut'                         => 'required',
            'tanggal_surat'                   => 'required|date',
            'nomor_surat'                     => 'required',
            'diterima_dari'                   => 'required',
            'perihal'                         => 'required',
            'sifat'                           => 'required',
            'tanggal_dan_tempat_pelaksanaan'  => 'required',
            'tanggal_diteruskan'              => 'required|date',
            'diteruskan_kepada'               => 'required',
            'dengan_hormat_harap'             => 'required',
            'lampiran'                        => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:10240',
        ],[
            'no_urut.required'                        => 'No Urut Surat Tidak Boleh Kosong',
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

        $suratkeluar = new suratkeluar;
        //Simpan File
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $namaFile = time().'_'.$file->getClientOriginalName();
            $file->storeAs('uploads/lampiran', $namaFile, 'public');

            $suratkeluar->lampiran = 'uploads/lampiran/'.$namaFile;
        }
        $suratkeluar->no_urut                         = $request->no_urut;
        $suratkeluar->tanggal_surat                   = $request->tanggal_surat;
        $suratkeluar->nomor_surat                     = $request->nomor_surat;
        $suratkeluar->diterima_dari                   = $request->diterima_dari;
        $suratkeluar->perihal                         = $request->perihal;
        $suratmasuk->sifat                           = $request->sifat;
        $suratmasuk->tanggal_dan_tempat_pelaksanaan  = $request->tanggal_dan_tempat_pelaksanaan;
        $suratmasuk->tanggal_diteruskan              = $request->tanggal_diteruskan;
        $suratmasuk->diteruskan_kepada               = $request->diteruskan_kepada;
        $suratmasuk->dengan_hormat_harap             = $request->dengan_hormat_harap;
        
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
            'no_urut'                        => 'required',
            'tanggal_surat'                  => 'required|date',
            'nomor_surat'                    => 'required',
            'diterima_dari'                  => 'required',
            'perihal'                        => 'required',
            'sifat'                          => 'required',
            'tanggal_dan_tempat_pelaksanaan' => 'required',
            'tanggal_diteruskan'             => 'required|date',
            'diteruskan_kepada'              => 'required',
            'dengan_hormat_harap'            => 'required',
            'lampiran'                       => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:10240',
        ],[
            'no_urut.required'                        => 'No Urut Surat Tidak Boleh Kosong',
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
        //Simpan File
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $namaFile = time().'_'.$file->getClientOriginalName();
            $file->storeAs('uploads/lampiran', $namaFile, 'public');

            $suratmasuk->lampiran = 'uploads/lampiran/'.$namaFile;
        }
        $suratmasuk->no_urut                            = $request->no_urut;
        $suratmasuk->tanggal_surat                      = $request->tanggal_surat;
        $suratmasuk->nomor_surat                        = $request->nomor_surat;
        $suratmasuk->diterima_dari                      = $request->diterima_dari;
        $suratmasuk->perihal                            = $request->perihal;
        $suratmasuk->sifat                              = $request->sifat;
        $suratmasuk->tanggal_dan_tempat_pelaksanaan     = $request->tanggal_dan_tempat_pelaksanaan;
        $suratmasuk->tanggal_diteruskan                 = $request->tanggal_diteruskan;
        $suratmasuk->diteruskan_kepada                  = $request->diteruskan_kepada;
        $suratmasuk->dengan_hormat_harap                = $request->dengan_hormat_harap;
         
        $suratmasuk->save();

        return redirect()->route('suratmasuk')->with('success','Data Berhasil Di Edit');
    }

    public function destroy($id){
        $suratmasuk = SuratMasuk::findOrFail($id);
        $suratmasuk->delete();

        return redirect()->route('suratmasuk')->with('success', 'Data Berhasil Di Hapus');
    }

}
