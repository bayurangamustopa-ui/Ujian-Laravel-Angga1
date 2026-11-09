@extends('layouts.app')
@section('title', 'Data Kelas')
@section('content')
<div class="head">
    <h1>Data Kelas</h1>
    <a href="{{ route('kelas.create') }}" class="btn primary">+ Tambah Kelas</a>
</div>
<div class="card table-wrap">
<table>
    <thead><tr><th>No</th><th>Kode</th><th>Nama Kelas</th><th>Tingkat</th><th>Tahun Ajaran</th><th>Wali Kelas</th><th>Siswa</th><th>Aksi</th></tr></thead>
    <tbody>
    @forelse ($kelas as $i => $k)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $k->kode_kelas }}</td>
            <td>{{ $k->nama_kelas }}</td>
            <td>{{ $k->tingkat }}</td>
            <td>{{ $k->tahun_ajaran }}</td>
            <td>{{ $k->wali_kelas ?: '-' }}</td>
            <td>{{ $k->jumlah_siswa }}</td>
            <td class="aksi">
                <a href="{{ route('kelas.edit', $k->id) }}" class="btn warn sm">Edit</a>
                <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Yakin hapus kelas {{ $k->nama_kelas }}?')">
                    @csrf @method('DELETE')
                    <button class="btn danger sm">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="8" class="empty">Belum ada data kelas.</td></tr>
    @endforelse
    </tbody>
</table>
</div>
@endsection
