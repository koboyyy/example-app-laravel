<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'tbl_mahasiswa';
    
    // Primary key
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'nim',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'email',
        'no_hp',
        'jurusan',
        'prodi',
        'foto'
    ];

    // Jika ingin format tanggal otomatis
    protected $dates = ['tgl_lahir'];
    
    // (Opsional) Format tanggal
    protected $casts = [
        'tgl_lahir' => 'date:Y-m-d',
    ];
}