<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = DB::table('kelas')
            ->leftJoin('siswas', 'siswas.kelas_id', '=', 'kelas.id')
            ->select('kelas.*', DB::raw('COUNT(siswas.id) as jumlah_siswa'))
            ->groupBy('kelas.id', 'kelas.kode_kelas', 'kelas.nama_kelas', 'kelas.tingkat',
                'kelas.tahun_ajaran', 'kelas.wali_kelas', 'kelas.created_at', 'kelas.updated_at')
            ->orderBy('kelas.nama_kelas')
            ->get();

        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_kelas'   => 'required|max:20|unique:kelas,kode_kelas',
            'nama_kelas'   => 'required|max:50',
            'tingkat'      => 'required|max:20',
            'tahun_ajaran' => 'required|max:20',
            'wali_kelas'   => 'nullable|max:100',
        ]);

        DB::table('kelas')->insert($data + [
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kelas = DB::table('kelas')->where('id', $id)->first();
        abort_if(!$kelas, 404);

        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'kode_kelas'   => 'required|max:20|unique:kelas,kode_kelas,' . $id,
            'nama_kelas'   => 'required|max:50',
            'tingkat'      => 'required|max:20',
            'tahun_ajaran' => 'required|max:20',
            'wali_kelas'   => 'nullable|max:100',
        ]);

        DB::table('kelas')->where('id', $id)->update($data + ['updated_at' => now()]);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        if (DB::table('siswas')->where('kelas_id', $id)->exists()) {
            return redirect()->route('kelas.index')
                ->with('error', 'Kelas tidak dapat dihapus karena masih memiliki siswa.');
        }

        DB::table('kelas')->where('id', $id)->delete();

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
