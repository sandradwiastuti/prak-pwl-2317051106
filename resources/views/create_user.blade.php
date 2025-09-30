@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header text-white text-center fw-bold" 
                 style="background: linear-gradient(90deg,  #db7bc3ff, #062452ff);">
                <h4 class="mb-0">Add New User</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    
                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold">Nama</label>
                        <input type="text" class="form-control form-control-lg" 
                               id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <!-- NPM -->
                    <div class="mb-3">
                        <label for="npm" class="form-label fw-semibold">NPM</label>
                        <input type="text" class="form-control form-control-lg" 
                               id="npm" name="npm" placeholder="Masukkan NPM" required>
                    </div>

                    <!-- Kelas -->
                    <div class="mb-3">
                        <label for="kelas_id" class="form-label fw-semibold">Kelas</label>
                        <select name="kelas_id" id="kelas_id" 
                                class="form-select form-select-lg">
                            <option value="" disabled selected>-- Pilih Kelas --</option>
                            @foreach ($kelas as $kelasItem)
                                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tombol -->
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
                        <button type="submit" class="btn btn-primary">💾 Submit</button>
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
    }

    label {
        color: #374151;
        font-size: 0.95rem;
    }

    input, select {
        border-radius: 10px !important;
    }

    .btn {
        border-radius: 10px;
        font-weight: 600;
    }

    .btn-primary {
        background: linear-gradient(90deg, #db2777, #be185d); /* pink tua → fuschia */
        border: none;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #be185d, #9d174d);
        transform: translateY(-2px);
        transition: 0.3s;
    }
</style>
@endsection
