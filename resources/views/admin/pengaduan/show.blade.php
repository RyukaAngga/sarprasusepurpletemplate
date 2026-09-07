@extends('layouts.purple')

@section('title', 'Detail Pengaduan - Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon text-white me-2">
                <i class="mdi mdi-eye"></i>
            </span> Detail Pengaduan Sarana
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.pengaduan.index') }}">Pengaduan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Informasi Lengkap Laporan</h4>
                    <p class="card-description">Rincian pelaporan sarana prasarana sekolah.</p>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="220" class="bg-light">Nama Pelapor</th>
                                <td>
                                    <img src="{{ asset('purple/purple/assets/images/faces/face1.jpg') }}" class="me-2" alt="image">
                                    <strong>{{ $pengaduan->user->name ?? '-' }}</strong> ({{ $pengaduan->user->email ?? '-' }})
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">Sarana Prasarana</th>
                                <td><strong>{{ $pengaduan->sarana->nama_sarana ?? '-' }}</strong></td>
                            </tr>
                            <tr>
                                <th class="bg-light">Lokasi Sarana</th>
                                <td>
                                    <span class="badge badge-outline-secondary">
                                        <i class="mdi mdi-map-marker"></i> {{ $pengaduan->sarana->lokasi ?? '-' }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">Tanggal Pengaduan</th>
                                <td>{{ date('d F Y', strtotime($pengaduan->tanggal_pengaduan)) }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Deskripsi Masalah</th>
                                <td>{{ $pengaduan->deskripsi }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Status Saat Ini</th>
                                <td>
                                    @if ($pengaduan->status == 'Menunggu')
                                        <span class="badge badge-danger">Menunggu</span>
                                    @elseif ($pengaduan->status == 'Diproses')
                                        <span class="badge badge-warning">Diproses</span>
                                    @elseif ($pengaduan->status == 'Selesai')
                                        <span class="badge badge-success">Selesai</span>
                                    @else
                                        <span class="badge badge-secondary">{{ $pengaduan->status }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">Keterangan Perbaikan Teknisi</th>
                                <td>
                                    @if($pengaduan->keterangan_perbaikan)
                                        <span class="text-success font-weight-bold">
                                            <i class="mdi mdi-wrench me-1"></i> {{ $pengaduan->keterangan_perbaikan }}
                                        </span>
                                    @else
                                        <span class="text-muted font-italic">Belum ada keterangan perbaikan</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('admin.pengaduan.edit', $pengaduan->id_pengaduan) }}" class="btn btn-primary me-2">
                            <i class="mdi mdi-wrench me-1"></i> Tindak Lanjut / Ubah Status
                        </a>
                        <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-light border">
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
