@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header text-white text-center fw-bold" 
                 style="background: linear-gradient(90deg, #db7bc3ff, #062452ff);">
                <h4 class="mb-0">Daftar Mata Kuliah</h4>
            </div>
            <div class="card-body p-4">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('matakuliah.create') }}" class="btn btn-sm fw-semibold text-white" 
                       style="background: linear-gradient(90deg, #db7bc3ff, #062452ff); border-radius: 8px;">
                        ➕ Tambah Mata Kuliah
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center rounded-3 overflow-hidden table-hover">
                        <thead style="background: linear-gradient(90deg, #db7bc3ff, #062452ff); color: white;">
                            <tr>
                                <th>No</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>UUID</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mks as $index => $mk)
                                <tr>
                                    <td class="fw-semibold">{{ $index + 1 }}</td>
                                    <td>{{ $mk->nama_mk }}</td>
                                    <td>{{ $mk->sks }}</td>
                                    <td><code>{{ $mk->id }}</code></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('matakuliah.edit', $mk->id) }}" 
                                               class="btn btn-sm text-white" 
                                               style="background-color: #4b8bf5; border-radius: 8px;">
                                                ✏️ Edit
                                            </a>
                                            <form action="{{ route('matakuliah.destroy', $mk->id) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Yakin ingin menghapus mata kuliah ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 8px;">
                                                    🗑 Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-muted fst-italic">Belum ada data mata kuliah</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Custom CSS --}}
<style>
    body {
        background: #ffe4ec; /* pink soft pastel */
        font-family: 'Poppins', sans-serif;
    }

    .table {
        border-radius: 12px;
        overflow: hidden;
        background: white;
    }

    .table thead th {
        font-weight: 600;
        letter-spacing: 0.5px;
        border: none;
    }

    .table-bordered td, .table-bordered th {
        border: 1px solid #ddd !important;
    }

    .table-hover tbody tr:hover {
        background-color: #fbe0ef; /* highlight pink lembut */
        transition: 0.3s;
    }

    .btn-danger, .btn {
        font-weight: 600;
        transition: 0.3s;
    }

    .btn:hover {
        transform: translateY(-2px);
        opacity: 0.9;
    }
</style>
@endsection
