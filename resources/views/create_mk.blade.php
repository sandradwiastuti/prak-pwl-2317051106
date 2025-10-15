@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header text-white text-center fw-bold" 
                 style="background: linear-gradient(90deg, #db7bc3ff, #062452ff);">
                <h4 class="mb-0">Tambah Mata Kuliah</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('matakuliah.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_mk" class="form-label fw-semibold">Nama Mata Kuliah</label>
                        <input type="text" name="nama_mk" id="nama_mk" class="form-control" 
                               placeholder="Masukkan nama mata kuliah" required>
                    </div>

                    <div class="mb-3">
                        <label for="sks" class="form-label fw-semibold">Jumlah SKS</label>
                        <input type="number" name="sks" id="sks" class="form-control" 
                               placeholder="Masukkan jumlah SKS" min="1" max="6" required>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="/matakuliah" 
                           class="btn btn-outline-secondary me-2" style="border-radius: 8px;">← Kembali</a>
                        <button type="submit" 
                                class="btn text-white fw-semibold" 
                                style="background: linear-gradient(90deg, #db7bc3ff, #062452ff); border-radius: 8px;">
                            ✅ Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Custom CSS --}}
<style>
    body {
        background: #ffe4ec; /* warna pastel pink lembut */
        font-family: 'Poppins', sans-serif;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .form-control:focus {
        border-color: #db7bc3;
        box-shadow: 0 0 5px rgba(219, 123, 195, 0.5);
    }

    .btn:hover {
        transform: translateY(-2px);
        opacity: 0.9;
        transition: 0.3s;
    }

    label {
        color: #333;
    }
</style>
@endsection
