@extends('layouts.purple')

@section('title', 'Daftar Sarana Prasarana - Siswa')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon text-white me-2">
                <i class="mdi mdi-view-list"></i>
            </span> Data Sarana Prasarana Sekolah
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('pengguna.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sarana Prasarana</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="card-title mb-1">Daftar Fasilitas & Sarana Prasarana</h4>
                            <p class="card-description mb-0">Informasi kondisi sarana prasarana sekolah yang terdata di sistem.</p>
                        </div>
                        <a href="{{ route('pengguna.pengaduan.create') }}" class="btn btn-primary btn-sm">
                            <i class="mdi mdi-plus me-1"></i> Buat Pengaduan
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Sarana</th>
                                    <th>Lokasi</th>
                                    <th>Kondisi</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sarana as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <i class="mdi mdi-check-circle-outline text-primary me-2"></i>
                                            <strong>{{ $item->nama_sarana }}</strong>
                                        </td>
                                        <td>
                                            <span class="badge badge-outline-secondary">
                                                <i class="mdi mdi-map-marker me-1"></i> {{ $item->lokasi }}
                                            </span>
                                        </td>
                                        <td>
                                            @if(stripos($item->kondisi, 'baik') !== false)
                                                <span class="badge badge-success">{{ $item->kondisi }}</span>
                                            @elseif(stripos($item->kondisi, 'ringan') !== false)
                                                <span class="badge badge-warning">{{ $item->kondisi }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ $item->kondisi }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->keterangan ?: '-' }}</td>
                                        <td>
                                            <a href="{{ route('pengguna.pengaduan.create') }}?sarana_id={{ $item->id_sarana }}" class="btn btn-xs btn-primary" title="Laporkan kerusakan sarana ini">
                                                <i class="mdi mdi-alert-circle me-1"></i> Lapor Kerusakan
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            Belum ada data sarana prasarana yang tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
