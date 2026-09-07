@extends('layouts.purple')

@section('title', 'Formulir Pengaduan Sarana - Siswa')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon text-white me-2">
                <i class="mdi mdi-lead-pencil"></i>
            </span> Formulir Pengaduan Sarana
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('pengguna.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Buat Pengaduan</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Kirim Laporan Kerusakan Fasilitas</h4>
                    <p class="card-description">
                        Silakan lengkapi formulir di bawah ini agar tim sarana prasarana sekolah dapat segera menindaklanjutinya.
                    </p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="forms-sample" action="{{ route('pengguna.pengaduan.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="id_sarana">Pilih Sarana / Prasarana <span class="text-danger">*</span></label>
                            <select name="id_sarana" id="id_sarana" class="form-select form-control" required>
                                <option value="">-- Pilih Fasilitas Sekolah --</option>
                                @foreach ($sarana as $item)
                                    <option value="{{ $item->id_sarana }}" {{ (old('id_sarana', request('sarana_id')) == $item->id_sarana) ? 'selected' : '' }}>
                                        {{ $item->nama_sarana }} — Lokasi: {{ $item->lokasi }} (Kondisi saat ini: {{ $item->kondisi }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pengaduan">Tanggal Pengaduan <span class="text-danger">*</span></label>
                            <input type="date"
                                   name="tanggal_pengaduan"
                                   id="tanggal_pengaduan"
                                   class="form-control"
                                   value="{{ old('tanggal_pengaduan', date('Y-m-d')) }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Masalah / Kerusakan <span class="text-danger">*</span></label>
                            <textarea name="deskripsi"
                                      id="deskripsi"
                                      class="form-control"
                                      rows="5"
                                      placeholder="Jelaskan detail kerusakan sarana (contoh: AC tidak dingin, proyektor mati mendadak, dll)..."
                                      required>{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="mdi mdi-send me-1"></i> Kirim Pengaduan
                            </button>
                            <a href="{{ route('pengguna.dashboard') }}" class="btn btn-light border">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
