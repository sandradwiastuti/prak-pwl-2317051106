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

    public function index(){
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser()
        ];

        return view('list_user', $data);
    }


public function create(): Factory|View
{
    $kelas = Kelas::all();
    $user = UserModel::all();
    $data = [
        'title' => 'Create User',
        'user' => $user,
        'kelas' => $kelas,
    ];

    return view('create_user', $data);
}


    public function store(Request $request)
{
    $this->userModel->create([
        'nama' => $request->input('nama'),
        'npm' => $request->input('npm'),
        'kelas_id' => $request->input('kelas_id'),
    ]);

    return redirect()->to('/user')->with('success', 'User berhasil ditambahkan!');
}


    public function destroy($id)
{
    UserModel::findOrFail($id)->delete();
    return redirect('/user')->with('success', 'User berhasil dihapus!');
}
public function edit($id)
{
    // Cari user berdasarkan UUID (bukan id biasa)
    $user = UserModel::findOrFail($id);

    // Ambil semua data kelas
    $kelas = Kelas::all();


    // kirim ke view edit
    return view('edit_user', compact('user', 'kelas'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'npm' => 'required',
        'kelas_id' => 'required',
    ]);

    // kalau pakai UUID, bisa pakai whereUuid atau where('uuid', $id)
    $user = UserModel::findOrFail($id);

    $user->update([
        'nama' => $request->nama,
        'npm' => $request->npm,
        'kelas_id' => $request->kelas_id,
    ]);

    return redirect()->to('/user')->with('success', 'Data berhasil diperbarui!');
}
}





