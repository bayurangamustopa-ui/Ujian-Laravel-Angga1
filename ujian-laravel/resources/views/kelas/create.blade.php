@extends('layouts.app')
@section('title', 'Tambah Kelas')
@section('content')
<h1>Tambah Kelas</h1>
<form class="card form" action="{{ route('kelas.store') }}" method="POST">
    @include('kelas._form')
</form>
@endsection
