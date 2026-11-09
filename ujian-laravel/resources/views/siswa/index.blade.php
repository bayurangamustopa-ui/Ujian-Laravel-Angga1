@extends('layouts.app')
@section('title', 'Data Siswa')
@section('content')
<div class="head">
    <h1>Data Siswa</h1>
    <a href="{{ route('siswa.create') }}" class="btn primary">+ Tambah Siswa</a>
</div>
<div class="card table-wrap">
<table>
    <thead><tr><th>No</th><th>NIS</th><th>Nama Lengkap</th><th>L/P</th><th>Kelas</th><th>Jurusan</th><th>Status</th><th>Aksi</th></tr></thead>
    <tbody>
    @forelse ($siswas as $i => $s)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $s->nis }}</td>
            <td>{{ $s->nama_lengkap }}</td>
            <td>{{ $s->jenis_kelamin }}</td>
            <td>{{ $s->nama_kelas }}</td>
            <td>{{ $s->jurusan }}</td>
            <td><span class="badge {{ $s->status === 'Aktif' ? 'on' : 'off' }}">{{ $s->status }}</span></td>
            <td class="aksi">
                <a href="{{ route('siswa.show', $s->id) }}" class="btn sm">Detail</a>
                <a href="{{ route('siswa.edit', $s->id) }}" class="btn warn sm">Edit</a>
                <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Yakin hapus siswa {{ $s->nama_lengkap }}?')">
                    @csrf @method('DELETE')
                    <button class="btn danger sm">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="8" class="empty">Belum ada data siswa.</td></tr>
    @endforelse
    </tbody>
</table>
</div>
@endsection
