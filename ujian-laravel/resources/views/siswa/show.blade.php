@extends('layouts.app')
@section('title', 'Detail Siswa')
@section('content')
<div class="head">
    <h1>Detail Siswa</h1>
    <div>
        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn warn">Edit</a>
        <a href="{{ route('siswa.index') }}" class="btn">&larr; Kembali</a>
    </div>
</div>
<div class="card">
<dl class="detail">
    <dt>Kelas</dt><dd>{{ $siswa->nama_kelas }} <small>({{ $siswa->kode_kelas }} · {{ $siswa->tahun_ajaran }})</small></dd>
    <dt>NIS</dt><dd>{{ $siswa->nis }}</dd>
    <dt>Nama Lengkap</dt><dd>{{ $siswa->nama_lengkap }}</dd>
    <dt>Jenis Kelamin</dt><dd>{{ $siswa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</dd>
    <dt>Tempat, Tgl Lahir</dt><dd>{{ $siswa->tempat_lahir ?: '-' }}, {{ $siswa->tanggal_lahir ? \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') : '-' }}</dd>
    <dt>Alamat</dt><dd>{{ $siswa->alamat ?: '-' }}</dd>
    <dt>No. HP</dt><dd>{{ $siswa->no_hp ?: '-' }}</dd>
    <dt>Email</dt><dd>{{ $siswa->email ?: '-' }}</dd>
    <dt>Asal Sekolah</dt><dd>{{ $siswa->asal_sekolah }}</dd>
    <dt>Jurusan</dt><dd>{{ $siswa->jurusan }}</dd>
    <dt>Nama Ayah</dt><dd>{{ $siswa->nama_ayah ?: '-' }}</dd>
    <dt>Nama Ibu</dt><dd>{{ $siswa->nama_ibu ?: '-' }}</dd>
    <dt>No. HP Wali</dt><dd>{{ $siswa->no_hp_wali ?: '-' }}</dd>
    <dt>Status</dt><dd><span class="badge {{ $siswa->status === 'Aktif' ? 'on' : 'off' }}">{{ $siswa->status }}</span></dd>
</dl>
</div>
@endsection
