<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'uuid'; // karena kamu pakai UUID
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'uuid',
        'nama',
        'npm',
        'kelas_id',
    ];

    // relasi ke tabel kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // ambil user + data kelas
    public function getUser()
    {
        return self::with('kelas')->orderBy('created_at', 'asc')->get();
    }
}
