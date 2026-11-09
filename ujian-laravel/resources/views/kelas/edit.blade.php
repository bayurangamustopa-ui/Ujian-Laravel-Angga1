@extends('layouts.app')
@section('title', 'Edit Kelas')
@section('content')
<h1>Edit Kelas</h1>
<form class="card form" action="{{ route('kelas.update', $kelas->id) }}" method="POST">
    @method('PUT')
    @include('kelas._form')
</form>
@endsection
