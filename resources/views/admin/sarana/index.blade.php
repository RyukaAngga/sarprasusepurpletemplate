@extends('layouts.purple')

@section('title', 'Data Sarana Prasarana - Admin')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon text-white me-2">
                <i class="mdi mdi-office-building"></i>
            </span> Kelola Sarana Prasarana
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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
                            <h4 class="card-title mb-1">Master Data Sarana Prasarana Sekolah</h4>
                            <p class="card-description mb-0">Kelola inventaris fasilitas sekolah, lokasi, dan kondisi fisiknya.</p>
                        </div>
                        <a href="{{ route('admin.sarana.create') }}" class="btn btn-primary btn-sm">
                            <i class="mdi mdi-plus me-1"></i> Tambah Sarana
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th width="60">#</th>
                                    <th>Nama Sarana</th>
                                    <th>Lokasi</th>
                                    <th>Kondisi</th>
                                    <th>Keterangan</th>
                                    <th width="160">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sarana as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <strong>{{ $item->nama_sarana }}</strong>
                                        </td>
                                        <td>
                                            <span class="badge badge-outline-secondary">
                                                <i class="mdi mdi-map-marker"></i> {{ $item->lokasi }}
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
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('admin.sarana.edit', $item->id_sarana) }}" class="btn btn-xs btn-info">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <form action="{{ route('admin.sarana.destroy', $item->id_sarana) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data sarana ini?');" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger">
                                                        <i class="mdi mdi-trash-can"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">
                                            Belum ada data sarana prasarana.
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
