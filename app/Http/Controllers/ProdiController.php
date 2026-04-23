<?php
namespace App\Http\Controllers;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller

{
    public function index()
    {
    $prodi = Prodi::all();
      return view('admin.prodi.index', compact('prodi'));
    }

    public function create()
    {
        return view('admin/prodi/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => ['required', 'string', 'max:100'],
        ],
        [
            'nama_prodi.required' => 'Nama prodi wajib diisi',
        ]);

        DB::table('tbl_prodi')->insert([
            'nama_prodi' => $request->nama_prodi,
        ]);


        return redirect()->route('prodi.create')
            ->with('success', 'Data berhasil ditambahkan');
    }
    
    public function edit(Request $request)
    {
      $id = $request->query('id');
        $prodi = Prodi::where('id', $id)->firstOrFail();
        return view('admin/prodi/edit', compact('prodi'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_prodi' => ['required', 'string', 'max:100'],
        ],
        [
            'nama_prodi.required' => 'Nama prodi wajib diisi',
        ]);

        $id = $request->query('id');
        DB::table('tbl_prodi')->where('id', $id)->update([
            'nama_prodi' => $request->nama_prodi,
        ]);

        return redirect()->route('prodi.index')
            ->with('success', 'Data berhasil diubah');
    }


    public function delete(Request $request)
    {
        $id = $request->query('id');
        DB::table('tbl_prodi')->where('id', $id)->delete();

        return redirect()->route('prodi.index')
            ->with('success', 'Data berhasil dihapus');
    }
}