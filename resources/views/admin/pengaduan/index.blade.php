@extends('layouts.purple')

@section('title', 'Kelola Pengaduan - Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon text-white me-2">
                <i class="mdi mdi-bullhorn"></i>
            </span> Kelola Pengaduan Sarana
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengaduan</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="card-title mb-1">Daftar Pengaduan Fasilitas Masuk</h4>
                            <p class="card-description mb-0">Tinjau laporan dari siswa dan kelola status perbaikan sarana.</p>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="50">#</th>
                                    <th>Pelapor (Siswa)</th>
                                    <th>Sarana & Lokasi</th>
                                    <th>Tanggal</th>
                                    <th>Deskripsi Masalah</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                    <th width="140">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengaduan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('purple/purple/assets/images/faces/face1.jpg') }}" class="me-2" alt="image">
                                            <strong>{{ $item->user->name ?? 'Pengguna' }}</strong>
                                        </td>
                                        <td>
                                            <strong>{{ $item->sarana->nama_sarana ?? '-' }}</strong>
                                            <span class="text-muted d-block small">
                                                <i class="mdi mdi-map-marker"></i> {{ $item->sarana->lokasi ?? '-' }}
                                            </span>
                                        </td>
                                        <td>{{ date('d M Y', strtotime($item->tanggal_pengaduan)) }}</td>
                                        <td class="text-wrap" style="max-width: 200px;">{{ Str::limit($item->deskripsi, 60) }}</td>
                                        <td>
                                            @if ($item->status == 'Menunggu')
                                                <span class="badge badge-danger">Menunggu</span>
                                            @elseif ($item->status == 'Diproses')
                                                <span class="badge badge-warning">Diproses</span>
                                            @elseif ($item->status == 'Selesai')
                                                <span class="badge badge-success">Selesai</span>
                                            @else
                                                <span class="badge badge-secondary">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="text-muted small">{{ $item->keterangan_perbaikan ?: '-' }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.pengaduan.edit', $item->id_pengaduan) }}" class="btn btn-xs btn-primary">
                                                <i class="mdi mdi-wrench me-1"></i> Tindak Lanjut
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted py-4">
                                            Belum ada data pengaduan yang masuk.
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
