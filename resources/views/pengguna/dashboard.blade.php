@extends('layouts.purple')

@section('title', 'Dashboard Siswa - Pengaduan Sarana Prasarana')

@section('content')
    <!-- judul halaman pake icon -->
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard Siswa
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Beranda Siswa <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <!-- end judul halaman pake icon -->

    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('purple/purple/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Pengaduan Saya <i class="mdi mdi-bullhorn mdi-24px float-end"></i></h4>
                    <h2 class="mb-5">{{ $totalPengaduanSaya }} Laporan</h2>
                    <h6 class="card-text">Total yang pernah diajukan</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('purple/purple/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Laporan Selesai <i class="mdi mdi-check-decagram mdi-24px float-end"></i></h4>
                    <h2 class="mb-5">{{ $pengaduanSelesai }} Selesai</h2>
                    <h6 class="card-text">Telah diperbaiki teknisi</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('purple/purple/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Fasilitas Sekolah <i class="mdi mdi-office-building mdi-24px float-end"></i></h4>
                    <h2 class="mb-5">{{ $totalSarana }} Sarana</h2>
                    <h6 class="card-text">Tersedia di sekolah</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik bawaan Purple Template (Dipertahankan Utuh) -->
    <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <h4 class="card-title float-start">Visit And Sales Statistics</h4>
                        <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-end"></div>
                    </div>
                    <canvas id="visit-sale-chart" class="mt-4"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Traffic Sources</h4>
                    <div class="doughnutjs-wrapper d-flex justify-content-center">
                        <canvas id="traffic-chart"></canvas>
                    </div>
                    <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Integrasi Tabel Data Pengaduan Saya -->
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">Status Pengaduan Saya</h4>
                        <a href="{{ route('pengguna.pengaduan.create') }}" class="btn btn-sm btn-primary">
                            <i class="mdi mdi-plus"></i> Buat Pengaduan Baru
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> Fasilitas / Sarana </th>
                                    <th> Tanggal Lapor </th>
                                    <th> Deskripsi Kerusakan </th>
                                    <th> Status </th>
                                    <th> Keterangan Perbaikan </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pengaduanSaya as $item)
                                    <tr>
                                        <td>
                                            <strong>{{ $item->sarana->nama_sarana ?? '-' }}</strong>
                                            <span class="text-muted d-block small">Lokasi: {{ $item->sarana->lokasi ?? '-' }}</span>
                                        </td>
                                        <td>{{ date('d M Y', strtotime($item->tanggal_pengaduan)) }}</td>
                                        <td class="text-wrap" style="max-width: 250px;">{{ Str::limit($item->deskripsi, 60) }}</td>
                                        <td>
                                            @if($item->status === 'Selesai')
                                                <span class="badge badge-success">Selesai</span>
                                            @elseif($item->status === 'Diproses')
                                                <span class="badge badge-warning">Diproses</span>
                                            @else
                                                <span class="badge badge-danger">Menunggu</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="text-muted small">{{ $item->keterangan_perbaikan ?: 'Belum ada keterangan perbaikan' }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            Anda belum pernah membuat pengaduan sarana prasarana.
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

    <!-- Widget Bawah Template Asli (Dipertahankan Utuh) -->
    <div class="row">
        <div class="col-lg-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body p-0 d-flex">
                    <div id="inline-datepicker" class="datepicker datepicker-custom"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Informasi & Bantuan Fasilitas</h4>
                    <div class="d-flex">
                        <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                            <i class="mdi mdi-school icon-sm me-2"></i>
                            <span>Layanan Sarpras Sekolah</span>
                        </div>
                        <div class="d-flex align-items-center text-muted font-weight-light">
                            <i class="mdi mdi-clock icon-sm me-2"></i>
                            <span>{{ date('F jS, Y') }}</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6 pe-1">
                            <img src="{{ asset('purple/purple/assets/images/dashboard/img_1.jpg') }}" class="mb-2 mw-100 w-100 rounded" alt="image">
                            <img src="{{ asset('purple/purple/assets/images/dashboard/img_4.jpg') }}" class="mw-100 w-100 rounded" alt="image">
                        </div>
                        <div class="col-6 ps-1">
                            <img src="{{ asset('purple/purple/assets/images/dashboard/img_2.jpg') }}" class="mb-2 mw-100 w-100 rounded" alt="image">
                            <img src="{{ asset('purple/purple/assets/images/dashboard/img_3.jpg') }}" class="mw-100 w-100 rounded" alt="image">
                        </div>
                    </div>
                    <div class="d-flex mt-5 align-items-top">
                        <img src="{{ asset('purple/purple/assets/images/faces/face1.jpg') }}" class="img-sm rounded-circle me-3" alt="image">
                        <div class="mb-0 flex-grow">
                            <h5 class="me-2 mb-2">Peduli Sarana, Nyaman Belajarnya!</h5>
                            <p class="mb-0 font-weight-light">Laporkan segera bila menjumpai sarana sekolah seperti kursi rusak, AC mati, atau proyektor bermasalah.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('purple/purple/assets/js/dashboard.js') }}"></script>
@endpush
