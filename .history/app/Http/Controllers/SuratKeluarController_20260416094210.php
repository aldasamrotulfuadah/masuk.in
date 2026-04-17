<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index(){
        $data = array(
            'title'   => 'Data Surat Keluar',
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
            'tanggal_surat'                     => 'required|date',
            'nomor_surat'                       => 'required',
            'diterima_dari'                     => 'required',
            'perihal'                           => 'required',
            'sifat'                             => 'required',
            'tanggal_dan_tempat_pelaksanaan'    => 'required',
            'tanggal_diteruskan'                => 'required|date',
            'diteruskan_kepada'                 => 'required',
            'dengan_hormat_harap'               => 'required',
            'lampiran'                          => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
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

        $suratkeluar = new suratkeluar;
        $suratkeluar->tanggal_surat                     = $request->tanggal_surat;
        $suratkeluar->nomor_surat                       = $request->nomor_surat;
        $suratkeluar->diterima_dari                     = $request->diterima_dari;
        $suratkeluar->perihal                           = $request->perihal;
        $suratkeluar->sifat                             = $request->sifat;
        $suratkeluar->tanggal_dan_tempat_pelaksanaan    = $request->tanggal_dan_tempat_pelaksanaan;
        $suratkeluar->diteruskan_kepada                 = $request->diteruskan_kepada;
        $suratkeluar->dengan_hormat_harap               = $request->dengan_hormat_harap;
        $suratkeluar->save();

        return redirect()->route('suratkeluar')->with('success','Data Berhasil Ditambahkan');
    }

    public function edit($id){
        $data = array(
            'title'   => 'Edit Data Surat Keluar',
            'menuSuratKeluar'   => 'active',
            'suratkeluar' => SuratKeluar::findOrFail($id),
        ); 
        return view('suratk/edit',$data);
    }

     public function update(Request $request, $id){
        $request->validate([
            'tanggal_surat'                  => 'required|date',
            'nomor_surat'                    => 'required',
            'diterima_dari'                  => 'required',
            'perihal'                        => 'required',
            'sifat'                          => 'required',
            'tanggal_dan_tempat_pelaksanaan' => 'required',
            'diteruskan_kepada'              => 'required',
            'dengan_hormat_harap'            => 'required',
        ],[
            'tanggal_surat.required'                    => 'Tanggal Surat Tidak Boleh Kosong',
            'nomor_surat.required'                      => 'Nomor Surat Tidak Boleh Kosong',
            'diterima_dari.required'                    => 'Tidak Boleh Kosong',
            'perihal.required'                          => 'Perihal Surat Tidak Boleh Kosong',
            'sifat.required'                            => 'Sifat Surat Harus Dipilih',
            'tanggal_dan_tempat_pelaksanaan.required'   => 'Tanggal dan Tempat Pelaksanaan Tidak Boleh Kosong',
            'diteruskan_kepada.required'                => 'Disposisi Surat Harus Dipilih',
            'dengan_hormat_harap.required'              => 'Disposisi Surat Harus Dipilih',
        ]);

        $suratkeluar = SuratKeluar::findOrFail($id);
        $suratkeluar->tanggal_surat                     = $request->tanggal_surat;
        $suratkeluar->nomor_surat                       = $request->nomor_surat;
        $suratkeluar->diterima_dari                     = $request->diterima_dari;
        $suratkeluar->perihal                           = $request->perihal;
        $suratkeluar->sifat                             = $request->sifat;
        $suratkeluar->tanggal_dan_tempat_pelaksanaan    = $request->tanggal_dan_tempat_pelaksanaan;
        $suratkeluar->diteruskan_kepada                 = $request->diteruskan_kepada;
        $suratkeluar->dengan_hormat_harap               = $request->dengan_hormat_harap;
        $suratkeluar->save();

        return redirect()->route('suratkeluar')->with('success','Data Berhasil Di Edit');
    }

    public function destroy($id){
        $suratkeluar = SuratKeluar::findOrFail($id);
        $suratkeluar->delete();

        return redirect()->route('suratkeluar')->with('success', 'Data Berhasil Di Hapus');
    }


}
