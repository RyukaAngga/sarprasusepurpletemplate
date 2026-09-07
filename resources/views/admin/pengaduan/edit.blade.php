@extends('layouts.purple')

@section('title', 'Tindak Lanjut Pengaduan - Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon text-white me-2">
                <i class="mdi mdi-wrench"></i>
            </span> Tindak Lanjut Pengaduan
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.pengaduan.index') }}">Pengaduan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Proses</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Proses & Ubah Status Pengaduan</h4>
                    <p class="card-description">Perbarui status pengerjaan atau hasil perbaikan sarana.</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Detail Pengaduan -->
                    <div class="bg-light p-3 rounded mb-4 border">
                        <h6 class="font-weight-bold text-primary mb-3">
                            <i class="mdi mdi-information-outline me-1"></i> Rincian Laporan Pengaduan
                        </h6>
                        <table class="table table-sm table-borderless">
                            <tr>
                                <th width="180" class="text-muted">Nama Pelapor:</th>
                                <td><strong>{{ $pengaduan->user->name ?? '-' }}</strong></td>
                            </tr>
                            <tr>
                                <th class="text-muted">Sarana Prasarana:</th>
                                <td>{{ $pengaduan->sarana->nama_sarana ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Lokasi Fasilitas:</th>
                                <td>{{ $pengaduan->sarana->lokasi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Tanggal Lapor:</th>
                                <td>{{ date('d F Y', strtotime($pengaduan->tanggal_pengaduan)) }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted align-top">Deskripsi Kerusakan:</th>
                                <td><span class="text-dark">{{ $pengaduan->deskripsi }}</span></td>
                            </tr>
                        </table>
                    </div>

                    <form class="forms-sample" action="{{ route('admin.pengaduan.update', $pengaduan->id_pengaduan) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="status">Status Pengaduan <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-select form-control" required>
                                <option value="Menunggu" {{ old('status', $pengaduan->status) == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="Diproses" {{ old('status', $pengaduan->status) == 'Diproses' ? 'selected' : '' }}>Diproses (Teknisi Sedang Menangani)</option>
                                <option value="Selesai" {{ old('status', $pengaduan->status) == 'Selesai' ? 'selected' : '' }}>Selesai (Sudah Diperbaiki)</option>
                                <option value="Ditolak" {{ old('status', $pengaduan->status) == 'Ditolak' ? 'selected' : '' }}>Ditolak / Dibatalkan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="keterangan_perbaikan">Catatan / Keterangan Perbaikan Teknisi</label>
                            <textarea name="keterangan_perbaikan"
                                      id="keterangan_perbaikan"
                                      class="form-control"
                                      rows="4"
                                      placeholder="Tuliskan tindakan yang dilakukan, contoh: Kompresor AC telah diperbaiki, remote baru diganti.">{{ old('keterangan_perbaikan', $pengaduan->keterangan_perbaikan) }}</textarea>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="mdi mdi-content-save-check me-1"></i> Simpan Status & Keterangan
                            </button>
                            <a href="{{ route('admin.pengaduan.index') }}" class="btn btn-light border">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
