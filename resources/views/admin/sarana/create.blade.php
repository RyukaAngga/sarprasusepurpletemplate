@extends('layouts.purple')

@section('title', 'Tambah Sarana Prasarana - Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon text-white me-2">
                <i class="mdi mdi-plus-box"></i>
            </span> Tambah Sarana Prasarana
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.sarana.index') }}">Sarana</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-8 grid-margin stretch-card mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Input Fasilitas Baru</h4>
                    <p class="card-description">Masukkan rincian fasilitas atau sarana prasarana sekolah.</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="forms-sample" action="{{ route('admin.sarana.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nama_sarana">Nama Sarana <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="nama_sarana"
                                   id="nama_sarana"
                                   class="form-control"
                                   value="{{ old('nama_sarana') }}"
                                   placeholder="Contoh: AC Sharp 1 PK, Proyektor Epson, Meja Guru"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="lokasi">Lokasi / Ruangan <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="lokasi"
                                   id="lokasi"
                                   class="form-control"
                                   value="{{ old('lokasi') }}"
                                   placeholder="Contoh: Lab Komputer 2, Ruang Kelas XII PPLG 2"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="kondisi">Kondisi Fisik <span class="text-danger">*</span></label>
                            <select name="kondisi" id="kondisi" class="form-select form-control" required>
                                <option value="">-- Pilih Kondisi --</option>
                                <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                <option value="Perlu Perbaikan" {{ old('kondisi') == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan Tambahan</label>
                            <textarea name="keterangan"
                                      id="keterangan"
                                      class="form-control"
                                      rows="4"
                                      placeholder="Catatan detail mengenai sarana ini (opsional)...">{{ old('keterangan') }}</textarea>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="mdi mdi-content-save me-1"></i> Simpan Data
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
