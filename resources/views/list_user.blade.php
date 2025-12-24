@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header text-white text-center fw-bold" 
                 style="background: linear-gradient(90deg, #db7bc3ff, #062452ff);">
                <h4 class="mb-0">Daftar User</h4>
            </div>
            <div class="card-body p-4">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('user.create') }}" class="btn btn-success fw-semibold"
                        style="background: linear-gradient(90deg, #db7bc3ff, #062452ff); border-radius: 8px;">
                        ➕ Tambah User
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center rounded-3 overflow-hidden table-hover">
                        <thead style="background: linear-gradient(90deg, #db7bc3ff, #062452ff); color: white;">
                            <tr>
                                <th>No</th>
                                <th>UUID</th>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Kelas</th>
                                <th width="160px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="fw-semibold">{{ $loop->iteration }}</td>
                                    <td class="text-muted small">{{ $user->uuid }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->npm }}</td>

                                    {{-- ✅ ini diperbaiki --}}
                                    <td>{{ $user->kelas ? $user->kelas->nama_kelas : '-' }}</td>

                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('user.edit', $user->uuid) }}"
                                               class="btn btn-sm text-white" 
                                               style="background-color: #4b8bf5; border-radius: 8px;">
                                                ✏️ Edit
                                            </a>

                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('user.destroy', $user->uuid) }}" method="POST" 
                                                  onsubmit="return confirm('Yakin hapus user ini?');">
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
                                    <td colspan="6" class="text-muted fst-italic">Belum ada data pengguna</td>
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
        background-color: #fbe0ef;
        transition: 0.3s;
    }

    .btn {
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-warning {
        background-color: #f59e0b;
        border: none;
    }

    .btn-warning:hover {
        background-color: #d97706;
    }
</style>
@endsection
