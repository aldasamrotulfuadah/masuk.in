@extends('layouts/app')

@section('content')

    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-tasks mr-2"></i>
       {{ $title }} 
    </h1>


    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
            <div class="mb-1 mr-2">
                <a href="{{ route('suratkeluarCreate') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-plus mr-2"></i>
                Tambah Data
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-danger text-white" style="width:120px" >
                        <tr class="text-center">
                            <th class="text-center align-middle">No Urut</th>
                            <th class="text-center align-middle">Tanggal Surat</th>
                            <th class="text-center align-middle">Nomor Surat</th>
                            <th class="text-center align-middle">Diterima Dari</th>
                            <th class="text-center align-middle">Perihal</th>
                            <th class="text-center align-middle">Sifat</th>
                            <th class="text-center align-middle">Tanggal dan Tempat Pelaksanaan</th>
                            <th class="text-center align-middle">Tanggal Diteruskan</th>
                            <th class="text-center align-middle">Diteruskan Kepada</th>
                            <th class="text-center align-middle">Dengan Hormat Harap</th>
                            <th class="text-center align-middle">Lampiran</th>
                            <th class="text-center align-middle">
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    <tbody>
                        @foreach ($suratkeluar as $item)
                        <tr class="text-center">
                            <td>{{ $item->no_urut }}</td>
                            <td>{{ $item->tanggal_surat }}</td>
                            <td>
                                <span class="badge badge-secondary">
                                    {{ $item->nomor_surat }}
                                </span>
                            </td>
                            <td>{{ $item->diterima_dari }}</td>
                            <td>{{ $item->perihal }}</td>
                            <td>
                                @if ($item->sifat == 'Sangat Segera')
                                <span class="badge badge-dark">
                                    {{ $item->sifat }}
                                </span>
                                @else
                                <span class="badge badge-secondary">
                                    {{ $item->sifat }}
                                </span>
                                @endif
                            </td>
                            <td>{{ $item->tanggal_dan_tempat_pelaksanaan }}</td>
                            <td>{{ $item->tanggal_diteruskan }}</td>
                            <td>{{ $item->diteruskan_kepada }}</td>
                            <td>{{ $item->dengan_hormat_harap }}</td>
                            <td>
                                 <a href="{{ url('storage/' . $item->lampiran) }}" target="_blank" class="btn btn-sm btn-secondary py-1 px-2 text-nowrap">
                                    <i class="fas fa-file-pdf"></i> Lihat
                                </a>
                            </td>
                            <td class="text-truncate" style="max-width: 150px;">
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="{{ route('suratkeluarEdit', $item->id) }}" class="btn btn-sm btn-secondary mr-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                @include('suratk/modal')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
