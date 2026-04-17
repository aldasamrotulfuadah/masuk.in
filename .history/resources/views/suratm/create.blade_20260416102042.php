@extends('layouts/app')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
       {{ $title }} 
    </h1>

    <div class="card">
        <div class="card-header">
                <a href="{{ route('suratmasuk') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left mr-2"></i>
                Kembali
                </a>
        </div>
        <div class="card-body">
            <form action="{{ route('suratmasukStore') }}" method="post">
                @csrf
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            No Urut :
                        </label>
                        <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{ old('tanggal_surat') }}">
                        @error('no_urut')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Tanggal Surat :
                        </label>
                        <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{ old('tanggal_surat') }}">
                        @error('tanggal_surat')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Nomor Surat :
                        </label>
                        <input type="text" name="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror" value="{{ old('nomor_surat') }}">
                        @error('nomor_surat')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Diterima Dari :
                        </label>
                        <input type="text" name="diterima_dari" class="form-control @error('diterima_dari') is-invalid @enderror"  value="{{ old('diterima_dari') }}">
                        @error('diterima_dari')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Perihal :
                        </label>
                        <input type="text" name="perihal" class="form-control @error('perihal') is-invalid @enderror"  value="{{ old('perihal') }}">
                        @error('perihal')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Sifat :
                        </label>
                        <select name="sifat" class="form-control @error('sifat') is-invalid @enderror">
                            <option selected disabled>-- Pilih Sifat Surat --</option>
                            <option value="Sangat Segera">Sangat Segera</option>
                            <option value="Segera">Segera</option>
                            <option value="Biasa">Biasa</option>
                            <option value="Rahasia">Rahasia</option>
                        </select>
                        @error('sifat')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Tanggal dan Tempat Pelaksanaan :
                        </label>
                        <input type="text" name="tanggal_dan_tempat_pelaksanaan" class="form-control @error('tanggal_dan_tempat_pelaksanaan') is-invalid @enderror"  value="{{ old('tanggal_dan_tempat_pelaksanaan') }}">
                        @error('tanggal_dan_tempat_pelaksanaan')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Tanggal Diteruskan :
                        </label>
                        <input type="date" name="tanggal_diteruskan" class="form-control @error('tanggal_diteruskan') is-invalid @enderror"  value="{{ old('tanggal_diteruskan') }}">
                        @error('tanggal_diteruskan')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Diteruskan Kepada :
                        </label> 
                        <select name="diteruskan_kepada" class="form-control @error('diteruskan_kepada') is-invalid @enderror">
                            <option selected disabled>-- Pilih Bidang Terkait --</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="Kabid Ideologi Wawasan Kebangsaan, Ketahanan Eksosbud & Agama">Kabid Ideologi Wawasan Kebangsaan, Ketahanan Eksosbud & Agama</option>
                            <option value="Kabid Kewaspadaan Nasional & Penanganan Konflik">Kabid Kewaspadaan Nasional & Penanganan Konflik</option>
                            <option value="Kabid Politik Dalam Negeri & Ormas">Kabid Politik Dalam Negeri & Ormas</option>
                            <option value="Subid Ideologi Wasbang">Subid Ideologi Wasbang</option>
                            <option value="Subid Ketahanan Eksosbud dan Agama">Subid Ketahanan Eksosbud dan Agama</option>
                            <option value="Subid Politik Dalam Negeri">Subid Politik Dalam Negeri</option>
                            <option value="Subid Organisasi Masyarakat">Subid Organisasi Masyarakat</option>
                            <option value="Subid Kewaspadaan Nasional & Penanganan Konflik">Subid Kewaspadaan Nasional & Penanganan Konflik</option>
                            <option value="Subid Penanganan Konflik">Subid Penanganan Konflik</option>
                            <option value="Subag Umun dan Kepegawaian">Subag Umun dan Kepegawaian</option>
                            <option value="Subag Program Anggaran dan Keuangan">Subag Program Anggaran dan Keuangan</option>
                        </select> 
                        @error('diteruskan_kepada')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Dengan Hormat Harap :
                        </label>
                        <select name="dengan_hormat_harap" class="form-control @error('dengan_hormat_harap') is-invalid @enderror">
                            <option selected disabled>-- Pilih --</option>
                            <option value="Tanggapan dan Saran">Tanggapan dan Saran</option>
                            <option value="Proses Lebih Lanjut">Proses lebih Lanjut</option>
                            <option value="Koordinasi/Konsultasi">Koordinasi/konsultasi</option>
                            <option value="Bahan Pertimbangan">Bahan pertimbangan</option>
                            <option value="Dibahas/Dikaji">Dibahas/Dikaji</option>
                            <option value="Dibantu">Dibantu</option>
                            <option value="Disiapkan Bahan">Disiapkan Bahan</option>
                            <option value="Mendampingi">Mendampingi</option>
                            <option value="Menghadiri">Menghadiri</option>
                            <option value="Mewakili">Mewakili</option>
                            <option value="UMM">UMM</option>
                            <option value="UM">UM</option>
                        </select>
                    @error('dengan_hormat_harap')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-12">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Lampiran :
                        </label>
                        <input type="file" name="lampiran" class="form-control @error('lampiran') is-invalid @enderror"  value="{{ old('lampiran') }}">
                        @error('lampiran')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-secondary">
                    <i class="fas fa-save mr-2"></i>
                    Simpan
                </button>
            </form>
        </div>
    </div>
    


@endsection