<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin/mahasiswa/index', compact('mahasiswa'));
    }

    public function create()
    {
        $jurusan = Jurusan::all();
        $prodi = Prodi::all();
        return view('admin/mahasiswa/create', compact('jurusan', 'prodi'));
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');
        $mahasiswa = Mahasiswa::where('id', $id)->firstOrFail();
        $jurusan = Jurusan::all();
        $prodi = Prodi::all();
        return view('admin/mahasiswa/edit', compact('mahasiswa', 'jurusan', 'prodi'));
    }

    public function update(Request $request)
    {
        $id = $request->query('id');
        $mahasiswa = Mahasiswa::where('id', $id)->firstOrFail();

        $request->validate([
            'nim' => ['required', 'digits:10', 'numeric', Rule::unique('tbl_mahasiswa', 'nim')->ignore($mahasiswa->id)],
            'nama_lengkap' => ['required', 'string', 'min:3', 'max:50'],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'tempat_lahir' => ['required', 'string', 'max:60'],
            'tgl_lahir' => ['required', 'date', 'before:today'], // tidak boleh tanggal masa depan
            'alamat' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email:rfc,dns', 'max:50', Rule::unique('tbl_mahasiswa', 'email')->ignore($mahasiswa->id)],
            'no_hp' => ['required', 'regex:/^[0-9]{10,12}$/'], // hanya angka 10-12 digit
            'jurusan' => ['required', 'string', 'max:50'],
            'prodi' => ['required', 'string', 'max:50'],
        ]);

        $mahasiswa->update([
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jurusan' => $request->jurusan,
            'prodi' => $request->prodi,
        ]);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => ['required', 'digits:10', 'numeric', 'unique:tbl_mahasiswa,nim'],
            'nama_lengkap' => ['required', 'string', 'min:3', 'max:50'],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'tempat_lahir' => ['required', 'string', 'max:60'],
            'tgl_lahir' => ['required', 'date', 'before:today'], // tidak boleh tanggal masa depan
            'alamat' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email:rfc,dns', 'max:50', 'unique:tbl_mahasiswa,email'],
            'no_hp' => ['required', 'regex:/^[0-9]{10,12}$/'], // hanya angka 10-12 digit
            'jurusan' => ['required', 'string', 'max:50'],
            'prodi' => ['required', 'string', 'max:50'],
        ],
        [
            'nim.required' => 'NIM wajib diisi',
            'nim.digits' => 'NIM harus 10 digit angka',
            'nim.unique' => 'NIM sudah terdaftar',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'jenis_kelamin.in' => 'Jenis kelamin tidak valid',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi',
            'tgl_lahir.required' => 'Tanggal lahir wajib diisi',
            'tgl_lahir.before' => 'Tanggal lahir tidak boleh di masa depan',
            'alamat.required' => 'Alamat wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'no_hp.regex' => 'No HP harus 10-12 digit angka',
            'jurusan.required' => 'Jurusan wajib diisi',
            'prodi.required' => 'Prodi wajib diisi',
        ]);

        DB::table('tbl_mahasiswa')->insert([
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jurusan' => $request->jurusan,
            'prodi' => $request->prodi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function delete(Request $request)
    {
        $id = $request->query('id');
        $mahasiswa = Mahasiswa::where('id', $id)->firstOrFail();
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data berhasil dihapus');
    }
}