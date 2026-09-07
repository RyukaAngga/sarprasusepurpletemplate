@extends('layouts.purple')

@section('title', 'Dashboard Admin - Pengaduan Sarana Prasarana')

@section('content')
    <!-- judul halaman pake icon -->
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard Admin
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
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
                    <h4 class="font-weight-normal mb-3">Total Pengaduan <i class="mdi mdi-bullhorn mdi-24px float-end"></i></h4>
                    <h2 class="mb-5">{{ $totalPengaduan }} Data</h2>
                    <h6 class="card-text">Laporan sarana masuk</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('purple/purple/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Sarana Prasarana <i class="mdi mdi-office-building mdi-24px float-end"></i></h4>
                    <h2 class="mb-5">{{ $totalSarana }} Fasilitas</h2>
                    <h6 class="card-text">Terdata di inventaris</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="{{ asset('purple/purple/assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Pengguna / Siswa <i class="mdi mdi-account-multiple mdi-24px float-end"></i></h4>
                    <h2 class="mb-5">{{ $totalPengguna }} Siswa</h2>
                    <h6 class="card-text">Terdaftar di sistem</h6>
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

    <!-- Integrasi Tabel Data Pengaduan Masuk (Di slot tabel Recent Tickets template) -->
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title mb-0">Pengaduan Masuk Terbaru</h4>
                        <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-sm btn-primary">
                            Lihat Semua Pengaduan
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> Pelapor </th>
                                    <th> Sarana Prasarana </th>
                                    <th> Tanggal </th>
                                    <th> Status </th>
                                    <th> Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pengaduanTerbaru as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('purple/purple/assets/images/faces/face1.jpg') }}" class="me-2" alt="image">
                                            <strong>{{ $item->user->name ?? 'Pengguna' }}</strong>
                                        </td>
                                        <td>
                                            {{ $item->sarana->nama_sarana ?? '-' }}
                                            <span class="text-muted d-block small">Lokasi: {{ $item->sarana->lokasi ?? '-' }}</span>
                                        </td>
                                        <td> {{ date('d M Y', strtotime($item->tanggal_pengaduan)) }} </td>
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
                                            <a href="{{ route('admin.pengaduan.edit', $item->id_pengaduan) }}" class="btn btn-xs btn-info">
                                                Tindak Lanjut
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            Belum ada pengaduan yang masuk.
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

    <!-- Bagian Widget Bawah Template Asli (Dipertahankan Utuh) -->
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
                    <h4 class="card-title">Recent Updates</h4>
                    <div class="d-flex">
                        <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                            <i class="mdi mdi-account-outline icon-sm me-2"></i>
                            <span>Admin Sekolah</span>
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
                        <img src="{{ asset('purple/purple/assets/images/faces/face3.jpg') }}" class="img-sm rounded-circle me-3" alt="image">
                        <div class="mb-0 flex-grow">
                            <h5 class="me-2 mb-2">Pusat Layanan Fasilitas & Sarana Prasarana Sekolah</h5>
                            <p class="mb-0 font-weight-light">Pantau kondisi infrastruktur dan tangani pengaduan fasilitas demi kenyamanan belajar mengajar.</p>
                        </div>
                        <div class="ms-auto">
                            <i class="mdi mdi-heart-outline text-muted"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Project Status</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Name </th>
                                    <th> Due Date </th>
                                    <th> Progress </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> 1 </td>
                                    <td> Perbaikan AC Lab Komputer </td>
                                    <td> May 15, 2026 </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 2 </td>
                                    <td> Perbaikan Proyektor Kelas XII </td>
                                    <td> Jul 01, 2026 </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 3 </td>
                                    <td> Pengadaan Meja Kursi Perpustakaan </td>
                                    <td> Apr 12, 2026 </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-dark">Todo List Agenda</h4>
                    <div class="add-items d-flex">
                        <input type="text" class="form-control todo-list-input" placeholder="Tulis agenda sarana hari ini...">
                        <button class="add btn btn-primary font-weight-bold todo-list-add-btn" id="add-task">Tambah</button>
                    </div>
                    <div class="list-wrapper">
                        <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Cek instalasi listrik lab </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked> Koordinasi teknisi AC </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Inventarisasi peralatan olahraga </label>
                                </div>
                                <i class="remove mdi mdi-close-circle-outline"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('purple/purple/assets/js/dashboard.js') }}"></script>
@endpush
