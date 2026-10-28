@extends('layouts.app')
@section('content')
<section class="page-header"><div><span class="badge">MODUL 03</span><h1>Tambah Perlengkapan</h1></div><a href="{{ route('perlengkapan.index') }}" class="back-button">← Kembali</a></section>
<section class="content-card">
<form action="{{ route('perlengkapan.store') }}" method="POST" class="form-box">
    @csrf
    @include('perlengkapan._form')
    <button type="submit" class="primary-button">Simpan Data</button>
</form>
</section>
@endsection
