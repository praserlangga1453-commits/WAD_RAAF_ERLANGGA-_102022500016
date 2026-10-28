@extends('layouts.app')
@section('content')
<section class="page-header"><div><span class="badge">MODUL 03</span><h1>Master Perlengkapan</h1><p>Kelola data perlengkapan olahraga yang tersedia.</p></div></section>
<section class="content-card">
<div class="section-heading"><div><span class="section-label">MASTER DATA</span><h2>Perlengkapan Olahraga</h2></div></div>
<a href="{{ route('perlengkapan.create') }}" class="primary-button" style="margin-bottom:20px">+ Tambah Perlengkapan</a>
<div class="table-wrapper"><table><thead><tr><th>Perlengkapan</th><th>Kategori</th><th>Kondisi</th><th>Tarif / Hari</th><th>Aksi</th></tr></thead>
<tbody>
@foreach($data as $row)
<tr>
<td><strong>{{ $row->nama }}</strong></td>
<td>{{ $row->kategori }}</td>
<td><span class="condition {{ $row->kondisi == 'Baik' ? 'good' : 'repair' }}">{{ $row->kondisi }}</span></td>
<td>Rp{{ number_format($row->tarif, 0, ',', '.') }}</td>
<td>
<a href="{{ route('perlengkapan.edit', $row->id) }}" class="secondary-button" style="margin-right: 5px;">Edit</a>
<form action="{{ route('perlengkapan.destroy', $row->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus perlengkapan ini?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete-button">Hapus</button>
</form>
</td>
</tr>
@endforeach
</tbody></table></div>
</section>
@endsection
