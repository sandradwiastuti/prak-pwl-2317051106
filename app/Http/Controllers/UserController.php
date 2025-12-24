<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    // TAMPIL SEMUA USER
    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser()
        ];

        return view('list_user', $data);
    }

    // FORM TAMBAH
    public function create(): Factory|View
    {
        $kelas = Kelas::all();
        return view('create_user', [
            'title' => 'Create User',
            'kelas' => $kelas,
        ]);
    }

    // SIMPAN DATA BARU
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'npm' => 'required',
            'kelas_id' => 'required',
        ]);

        $this->userModel->create([
            'uuid' => Str::uuid(), // kolom uuid
            'nama' => $request->nama,
            'npm' => $request->npm,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    // HAPUS USER
    public function destroy($uuid)
    {
        $user = UserModel::where('uuid', $uuid)->firstOrFail();
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }

    // FORM EDIT
    public function edit($uuid)
    {
        $user = UserModel::where('uuid', $uuid)->firstOrFail();
        $kelas = Kelas::all();

        return view('edit_user', compact('user', 'kelas'));
    }

    // UPDATE DATA
    public function update(Request $request, $uuid)
    {
        $request->validate([
            'nama' => 'required',
            'npm' => 'required',
            'kelas_id' => 'required',
        ]);

        $user = UserModel::where('uuid', $uuid)->firstOrFail();

        $user->update([
            'nama' => $request->nama,
            'npm' => $request->npm,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('user.index')->with('success', 'Data berhasil diperbarui!');
    }
}
