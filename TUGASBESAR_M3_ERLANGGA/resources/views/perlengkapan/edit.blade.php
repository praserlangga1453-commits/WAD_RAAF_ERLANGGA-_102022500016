@extends('layouts.app')
@section('content')
<section class="page-header"><div><span class="badge">MODUL 03</span><h1>Edit Perlengkapan</h1></div><a href="{{ route('perlengkapan.index') }}" class="back-button">← Kembali</a></section>
<section class="content-card">
<form action="{{ route('perlengkapan.update', $perlengkapan->id) }}" method="POST" class="form-box">
    @csrf
    @method('PUT')
    @include('perlengkapan._form', ['perlengkapan' => $perlengkapan])
    <button type="submit" class="primary-button">Update Data</button>
</form>
</section>
@endsection
