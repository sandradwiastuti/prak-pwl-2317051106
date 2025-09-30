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
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center rounded-3 overflow-hidden table-hover">
                        <thead style="background: linear-gradient(90deg, #db7bc3ff, #062452ff); color: white;">
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="fw-semibold">{{ $loop->iteration }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->npm }}</td>
                                    <td>{{ $user->nama_kelas }}</td>
                                    <td>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                🗑 Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-muted fst-italic">Belum ada data pengguna</td>
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
        background-color: #fbe0ef; /* highlight pink lembut */
        transition: 0.3s;
    }

    .btn-danger {
        border-radius: 8px;
        font-weight: 600;
    }
</style>
@endsection
