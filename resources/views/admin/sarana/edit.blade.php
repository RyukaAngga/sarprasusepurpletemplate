@extends('layouts.purple')

@section('title', 'Edit Sarana Prasarana - Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon text-white me-2">
                <i class="mdi mdi-pencil-box"></i>
            </span> Edit Sarana Prasarana
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.sarana.index') }}">Sarana</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Perbarui Data Sarana</h4>
                    <p class="card-description">Ubah rincian fasilitas sekolah: {{ $sarana->nama_sarana }}.</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="forms-sample" action="{{ route('admin.sarana.update', $sarana->id_sarana) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_sarana">Nama Sarana <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="nama_sarana"
                                   id="nama_sarana"
                                   class="form-control"
                                   value="{{ old('nama_sarana', $sarana->nama_sarana) }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="lokasi">Lokasi / Ruangan <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="lokasi"
                                   id="lokasi"
                                   class="form-control"
                                   value="{{ old('lokasi', $sarana->lokasi) }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="kondisi">Kondisi Fisik <span class="text-danger">*</span></label>
                            <select name="kondisi" id="kondisi" class="form-select form-control" required>
                                <option value="Baik" {{ old('kondisi', $sarana->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak Ringan" {{ old('kondisi', $sarana->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                <option value="Rusak Berat" {{ old('kondisi', $sarana->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                <option value="Perlu Perbaikan" {{ old('kondisi', $sarana->kondisi) == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan Tambahan</label>
                            <textarea name="keterangan"
                                      id="keterangan"
                                      class="form-control"
                                      rows="4">{{ old('keterangan', $sarana->keterangan) }}</textarea>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="mdi mdi-check me-1"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('admin.sarana.index') }}" class="btn btn-light border">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
