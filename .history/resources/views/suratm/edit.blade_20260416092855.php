@extends('layouts/app')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit mr-2"></i>
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
            <form action="{{ route('suratmasukUpdate', $suratmasuk->id) }}" method="post">
                @csrf
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Tanggal Surat :
                        </label>
                        <input type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{ $suratmasuk->tanggal_surat }}">
                        @error('tanggal_surat')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-1">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Nomor Surat :
                        </label>
                        <input type="text" name="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror" value="{{ $suratmasuk->nomor_surat }}">
                        @error('nomor_surat')
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
                            Diterima Dari :
                        </label>
                        <input type="text" name="diterima_dari" class="form-control @error('diterima_dari') is-invalid @enderror"  value="{{$suratmasuk->diterima_dari }}">
                        @error('diterima_dari')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Perihal :
                        </label>
                        <input type="text" name="perihal" class="form-control @error('perihal') is-invalid @enderror"  value="{{ $suratmasuk->perihal }}">
                        @error('perihal')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-xl-6 mb-2">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Sifat :
                        </label>
                        <select name="sifat" class="form-control @error('sifat') is-invalid @enderror">
                            <option selected disabled>-- Pilih Sifat Surat --</option>
                            <option value="Sangat Segera" {{ $suratmasuk->sifat == 'Sangat Segera' ? 'selected' : ''}}>Sangat Segera</option>
                            <option value="Segera" {{ $suratmasuk->sifat == 'Segera' ? 'selected' : ''}}>Segera</option>
                            <option value="Rahasia"  {{ $suratmasuk->sifat == 'Rahasia' ? 'selected' : ''}}>Rahasia</option>
                        </select>
                        @error('sifat')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Tanggal dan Tempat Pelaksanaan :
                        </label>
                        <input type="text" name="tanggal_dan_tempat_pelaksanaan" class="form-control @error('tanggal_dan_tempat_pelaksanaan') is-invalid @enderror"  value="{{ $suratmasuk->tanggal_dan_tempat_pelaksanaan }}">
                        @error('tanggal_dan_tempat_pelaksanaan')
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
                            Tanggal Diteruskan :
                        </label> 
                        <input type="date" name="tanggal_diteruskan" class="form-control @error('tanggal_surat') is-invalid @enderror" value="{{ $suratmasuk->tanggal_surat }}">
                        @error('tanggal_surat')
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
                            <option value="Tanggapan dan Saran"{{ $suratmasuk->dengan_hormat_harap == 'Tanggapan dan Saran' ? 'selected' : ''}}>Tanggapan dan Saran</option>
                            <option value="Proses Lebih Lanjut" {{ $suratmasuk->dengan_hormat_harap == 'Proses Lebih Lanjut' ? 'selected' : ''}}>Proses lebih Lanjut</option>
                            <option value="Koordinasi/Konsultasi" {{ $suratmasuk->dengan_hormat_harap == 'Koordinasi/Konsultasi' ? 'selected' : ''}}>Koordinasi/konsultasi</option>
                            <option value="Bahan Pertimbangan"{{ $suratmasuk->dengan_hormat_harap == 'Bahan Pertimbangan' ? 'selected' : ''}}>Bahan pertimbangan</option>
                            <option value="Dibahas/Dikaji" {{ $suratmasuk->dengan_hormat_harap == 'Dibahas/Dikaji' ? 'selected' : ''}}>Dibahas/Dikaji</option>
                            <option value="Dibantu" {{ $suratmasuk->dengan_hormat_harap == 'Dibantu' ? 'selected' : ''}}>Dibantu</option>
                            <option value="Disiapkan Bahan" {{ $suratmasuk->dengan_hormat_harap == 'Disiapkan Bahan' ? 'selected' : ''}}>Disiapkan Bahan</option>
                            <option value="Mendampingi" {{ $suratmasuk->dengan_hormat_harap == 'Mendampingi' ? 'selected' : ''}}>Mendampingi</option>
                            <option value="Menghadiri" {{ $suratmasuk->dengan_hormat_harap == 'Menghadiri' ? 'selected' : ''}}>Menghadiri</option>
                            <option value="Mewakili" {{ $suratmasuk->dengan_hormat_harap == 'Mewakili' ? 'selected' : ''}}>Mewakili</option>
                            <option value="UMM" {{ $suratmasuk->dengan_hormat_harap == 'UMM' ? 'selected' : ''}}>UMM</option>
                            <option value="UM" {{ $suratmasuk->dengan_hormat_harap == 'UM' ? 'selected' : ''}}>UM</option>
                    </select>
                    @error('dengan_hormat_harap')
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
                            <option value="Sekretaris" {{ $suratmasuk->diteruskan_kepada == 'Sekretaris' ? 'selected' : ''}}>Sekretaris</option>
                            <option value="Kabid Ideologi Wawasan Kebangsaan, Ketahanan Eksosbud & Agama" {{ $suratmasuk->diteruskan_kepada == 'Kabid Ideologi Wawasan Kebangsaan, Ketahanan Eksosbud & Agama' ? 'selected' : ''}}>Kabid Ideologi Wawasan Kebangsaan, Ketahanan Eksosbud & Agama</option>
                            <option value="Kabid Kewaspadaan Nasional & Penanganan Konflik" {{ $suratmasuk->diteruskan_kepada == 'Kabid Kewaspadaan Nasional & Penanganan Konflik' ? 'selected' : ''}}>Kabid Kewaspadaan Nasional & Penanganan Konflik</option>
                            <option value="Kabid Politik Dalam Negeri & Ormas" {{ $suratmasuk->diteruskan_kepada == 'Kabid Politik Dalam Negeri & Ormas' ? 'selected' : ''}}>Kabid Politik Dalam Negeri & Ormas</option>
                            <option value="Subid Ideologi Wasbang" {{ $suratmasuk->diteruskan_kepada == 'Subid Ideologi Wasbang' ? 'selected' : ''}}>Subid Ideologi Wasbang</option>
                            <option value="Subid Ketahanan Eksosbud dan Agama" {{ $suratmasuk->diteruskan_kepada == 'Subid Ketahanan Eksosbud dan Agama' ? 'selected' : ''}}>Subid Ketahanan Eksosbud dan Agama</option>
                            <option value="Subid Politik Dalam Negeri" {{ $suratmasuk->diteruskan_kepada == 'Subid Politik Dalam Negeri' ? 'selected' : ''}}>Subid Politik Dalam Negeri</option>
                            <option value="Subid Organisasi Masyarakat" {{ $suratmasuk->diteruskan_kepada == 'Subid Organisasi Masyarakat' ? 'selected' : ''}}>Subid Organisasi Masyarakat</option>
                            <option value="Subid Kewaspadaan Nasional & Penanganan Konflik" {{ $suratmasuk->diteruskan_kepada == 'Subid Kewaspadaan Nasional & Penanganan Konflik' ? 'selected' : ''}}>Subid Kewaspadaan Nasional & Penanganan Konflik</option>
                            <option value="Subid Penanganan Konflik" {{ $suratmasuk->diteruskan_kepada == 'Subid Penanganan Konflik' ? 'selected' : ''}}>Subid Penanganan Konflik</option>
                            <option value="Subag Umun dan Kepegawaian" {{ $suratmasuk->diteruskan_kepada == 'Subag Umun dan Kepegawaian' ? 'selected' : ''}}>Subag Umun dan Kepegawaian</option>
                            <option value="Subag Program Anggaran dan Keuangan" {{ $suratmasuk->diteruskan_kepada == 'Subag Program Anggaran dan Keuangan' ? 'selected' : ''}}>Subag Program Anggaran dan Keuangan</option>
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
                            <option value="Tanggapan dan Saran"{{ $suratmasuk->dengan_hormat_harap == 'Tanggapan dan Saran' ? 'selected' : ''}}>Tanggapan dan Saran</option>
                            <option value="Proses Lebih Lanjut" {{ $suratmasuk->dengan_hormat_harap == 'Proses Lebih Lanjut' ? 'selected' : ''}}>Proses lebih Lanjut</option>
                            <option value="Koordinasi/Konsultasi" {{ $suratmasuk->dengan_hormat_harap == 'Koordinasi/Konsultasi' ? 'selected' : ''}}>Koordinasi/konsultasi</option>
                            <option value="Bahan Pertimbangan"{{ $suratmasuk->dengan_hormat_harap == 'Bahan Pertimbangan' ? 'selected' : ''}}>Bahan pertimbangan</option>
                            <option value="Dibahas/Dikaji" {{ $suratmasuk->dengan_hormat_harap == 'Dibahas/Dikaji' ? 'selected' : ''}}>Dibahas/Dikaji</option>
                            <option value="Dibantu" {{ $suratmasuk->dengan_hormat_harap == 'Dibantu' ? 'selected' : ''}}>Dibantu</option>
                            <option value="Disiapkan Bahan" {{ $suratmasuk->dengan_hormat_harap == 'Disiapkan Bahan' ? 'selected' : ''}}>Disiapkan Bahan</option>
                            <option value="Mendampingi" {{ $suratmasuk->dengan_hormat_harap == 'Mendampingi' ? 'selected' : ''}}>Mendampingi</option>
                            <option value="Menghadiri" {{ $suratmasuk->dengan_hormat_harap == 'Menghadiri' ? 'selected' : ''}}>Menghadiri</option>
                            <option value="Mewakili" {{ $suratmasuk->dengan_hormat_harap == 'Mewakili' ? 'selected' : ''}}>Mewakili</option>
                            <option value="UMM" {{ $suratmasuk->dengan_hormat_harap == 'UMM' ? 'selected' : ''}}>UMM</option>
                            <option value="UM" {{ $suratmasuk->dengan_hormat_harap == 'UM' ? 'selected' : ''}}>UM</option>
                    </select>
                    @error('dengan_hormat_harap')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-sm btn-secondary">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
    


@endsection