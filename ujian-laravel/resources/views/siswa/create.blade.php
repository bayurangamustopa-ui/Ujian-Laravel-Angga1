@extends('layouts.app')
@section('title', 'Tambah Siswa')
@section('content')
<h1>Tambah Siswa</h1>
<form class="card form" action="{{ route('siswa.store') }}" method="POST">
    @include('siswa._form')
</form>
@endsection
