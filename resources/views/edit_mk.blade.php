@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header text-white text-center fw-bold" 
                 style="background: linear-gradient(90deg, #db7bc3ff, #062452ff);">
                <h4 class="mb-0">✏️ Edit Mata Kuliah</h4>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('matakuliah.update', $mk->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_mk" class="form-label fw-semibold">Nama Mata Kuliah</label>
                        <input type="text" 
                               class="form-control border-2 rounded-3" 
                               id="nama_mk" 
                               name="nama_mk" 
                               value="{{ $mk->nama_mk }}" 
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="sks" class="form-label fw-semibold">SKS</label>
                        <input type="number" 
                               class="form-control border-2 rounded-3" 
                               id="sks" 
                               name="sks" 
                               value="{{ $mk->sks }}" 
                               required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ url('/matakuliah') }}" 
                           class="btn text-white fw-semibold"
                           style="background-color: #6c757d; border-radius: 10px;">
                            ← Kembali
                        </a>
                        <button type="submit" 
                                class="btn fw-semibold text-white" 
                                style="background: linear-gradient(90deg, #db7bc3ff, #062452ff); border-radius: 10px;">
                            💾 Simpan Perubahan
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
        background: #ffe4ec; /* pink soft pastel */
        font-family: 'Poppins', sans-serif;
    }

    .form-control {
        padding: 10px 12px;
        border-color: #db7bc3ff;
        box-shadow: none;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #062452ff;
        box-shadow: 0 0 5px rgba(6, 36, 82, 0.3);
    }

    .btn {
        transition: 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        opacity: 0.9;
    }

    .card {
        background: white;
        border-radius: 15px;
    }

    .card-header h4 {
        font-family: 'Poppins', sans-serif;
    }
</style>
@endsection
