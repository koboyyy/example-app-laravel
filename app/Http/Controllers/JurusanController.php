<?php
namespace App\Http\Controllers;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    public function index()
    {
    $jurusan = Jurusan::all();
      return view('admin.mahasiswa.jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('admin/mahasiswa/jurusan/create');
    }

       public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => ['required', 'string', 'max:100'],
        ],
        [
            'nama_jurusan.required' => 'Nama jurusan wajib diisi',
        ]);

        DB::table('tbl_jurusan')->insert([
            'nama_jurusan' => $request->nama_jurusan,
        ]);

        return redirect()->route('jurusan.create')
            ->with('success', 'Data berhasil ditambahkan');
    }
}