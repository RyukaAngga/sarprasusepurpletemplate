@extends('layouts.purple')

@section('title', 'Riwayat Pengaduan - Siswa')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon text-white me-2">
                <i class="mdi mdi-history"></i>
            </span> Riwayat Pengaduan Saya
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('pengguna.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Riwayat Pengaduan</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h4 class="card-title mb-1">Daftar Laporan yang Telah Dikirim</h4>
                            <p class="card-description mb-0">Pantau status penanganan laporan kerusakan fasilitas sekolah Anda di sini.</p>
                        </div>
                        <a href="{{ route('pengguna.pengaduan.create') }}" class="btn btn-primary btn-sm">
                            <i class="mdi mdi-plus me-1"></i> Buat Pengaduan Baru
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Sarana</th>
                                    <th>Lokasi</th>
                                    <th>Deskripsi Masalah</th>
                                    <th>Status</th>
                                    <th>Keterangan Teknisi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengaduan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d M Y', strtotime($item->tanggal_pengaduan)) }}</td>
                                        <td><strong>{{ $item->sarana->nama_sarana ?? '-' }}</strong></td>
                                        <td>
                                            <span class="badge badge-outline-secondary">
                                                <i class="mdi mdi-map-marker"></i> {{ $item->sarana->lokasi ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="text-wrap" style="max-width: 250px;">{{ $item->deskripsi }}</td>
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
                                            @if($item->keterangan_perbaikan)
                                                <span class="text-success font-weight-bold">
                                                    <i class="mdi mdi-wrench me-1"></i> {{ $item->keterangan_perbaikan }}
                                                </span>
                                            @else
                                                <span class="text-muted font-italic">Sedang ditinjau</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            Belum ada data pengaduan yang dikirim.
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
