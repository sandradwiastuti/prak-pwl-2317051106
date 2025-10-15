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
    $user = UserModel::findOrFail($id);
    $kelas = Kelas::all();

    $data = [
        'title' => 'Edit User',
        'user' => $user,
        'kelas' => $kelas,
    ];

    return view('edit_user', $data);
}

public function update(Request $request, $id)
{
    $user = UserModel::findOrFail($id);

    $user->update([
        'nama' => $request->input('nama'),
        'npm' => $request->input('npm'),
        'kelas_id' => $request->input('kelas_id'),
    ]);

    return redirect()->to('/user')->with('success', 'Data user berhasil diperbarui!');


}



}
