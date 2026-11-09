<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    private function rules($id = null): array
    {
        return [
            'kelas_id'      => 'required|exists:kelas,id',
            'nis'           => 'required|max:20|unique:siswas,nis' . ($id ? ',' . $id : ''),
            'nama_lengkap'  => 'required|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir'  => 'nullable|max:100',
            'tanggal_lahir' => 'nullable|date',
            'alamat'        => 'nullable',
            'no_hp'         => 'nullable|max:20',
            'email'         => 'nullable|email|max:255',
            'asal_sekolah'  => 'required|max:150',
            'jurusan'       => 'required|max:100',
            'nama_ayah'     => 'nullable|max:100',
            'nama_ibu'      => 'nullable|max:100',
            'no_hp_wali'    => 'nullable|max:20',
            'status'        => 'required|in:Aktif,Nonaktif',
        ];
    }

    public function index()
    {
        $siswas = DB::table('siswas')
            ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
            ->select('siswas.*', 'kelas.nama_kelas')
            ->orderBy('siswas.nama_lengkap')
            ->get();

        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        $kelas = DB::table('kelas')->orderBy('nama_kelas')->get();

        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        DB::table('siswas')->insert($data + [
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show($id)
    {
        $siswa = DB::table('siswas')
            ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
            ->select('siswas.*', 'kelas.nama_kelas', 'kelas.kode_kelas', 'kelas.tahun_ajaran')
            ->where('siswas.id', $id)
            ->first();
        abort_if(!$siswa, 404);

        return view('siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = DB::table('siswas')->where('id', $id)->first();
        abort_if(!$siswa, 404);
        $kelas = DB::table('kelas')->orderBy('nama_kelas')->get();

        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate($this->rules($id));

        DB::table('siswas')->where('id', $id)->update($data + ['updated_at' => now()]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('siswas')->where('id', $id)->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
