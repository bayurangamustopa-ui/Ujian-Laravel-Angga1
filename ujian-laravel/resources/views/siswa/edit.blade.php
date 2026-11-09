@extends('layouts.app')
@section('title', 'Edit Siswa')
@section('content')
<h1>Edit Siswa</h1>
<form class="card form" action="{{ route('siswa.update', $siswa->id) }}" method="POST">
    @method('PUT')
    @include('siswa._form')
</form>
@endsection
