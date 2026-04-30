<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Validation\Rule;

class MahasiswaApiController extends Controller
{
    public function index()
    {
        return response()->json(Mahasiswa::all(), 200);
    }

    public function store(Request $request)
    {
        // VALIDASI
        $validated = $request->validate([
            'nim' => 'required|digits:10|numeric|unique:tbl_mahasiswa,nim',
            'nama_lengkap' => 'required|string|min:3|max:50',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:60',
            'tgl_lahir' => 'required|date|before:today',
            'alamat' => 'required|string|max:200',
            'email' => 'required|email|max:50|unique:tbl_mahasiswa,email',
            'no_hp'=> 'required|regex:/^[0-9]{10,12}$/',
            'jurusan' => 'required|string|max:50',
            'prodi' => 'required|string|max:50',
        ]);

        // SIMPAN DATA
        $mahasiswa = Mahasiswa::create($validated);

        // RESPONSE
        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => $mahasiswa
        ], 201);
    }
}