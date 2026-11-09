<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Pendataan Siswa dan Kelas') — Angga TI25</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header class="topbar">
    <div class="wrap bar">
        <a href="{{ route('kelas.index') }}" class="brand">Pendataan Siswa &amp; Kelas</a>
        <nav>
            <a href="{{ route('kelas.index') }}" class="{{ request()->is('kelas*') ? 'active' : '' }}">Data Kelas</a>
            <a href="{{ route('siswa.index') }}" class="{{ request()->is('siswa*') ? 'active' : '' }}">Data Siswa</a>
        </nav>
    </div>
</header>

<main class="wrap">
    @if (session('success')) <div class="alert ok">{{ session('success') }}</div> @endif
    @if (session('error')) <div class="alert err">{{ session('error') }}</div> @endif
    @if ($errors->any())
        <div class="alert err">
            <strong>Periksa kembali isian Anda:</strong>
            <ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    @yield('content')
</main>

<footer>Dibuat oleh <strong>Angga</strong> — Kelas <strong>TI25</strong> · UTS Pemrograman Framework (Laravel)</footer>
</body>
</html>
