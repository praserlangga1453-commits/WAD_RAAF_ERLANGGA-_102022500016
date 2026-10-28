<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MODUL - Rental Alat Olahraga</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header class="navbar"><div class="nav-content">
<div class="brand"><span class="brand-title">MODUL</span><span class="brand-subtitle">Rental Alat Olahraga</span></div>
<nav><a href="{{ route('perlengkapan.index') }}" class="active">Perlengkapan</a></nav>
</div></header>
<main class="container">
    @yield('content')
</main>
<footer><p>MODUL · Rental Alat Olahraga</p><span>ERLANGGA PRASETYA</span></footer>
</body>
</html>
