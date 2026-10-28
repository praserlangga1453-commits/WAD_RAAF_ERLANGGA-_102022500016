<input type="text" name="nama" placeholder="Nama perlengkapan" value="{{ $perlengkapan->nama ?? '' }}" required>
<select name="kategori">
    <option value="Bulutangkis" {{ (isset($perlengkapan) && $perlengkapan->kategori == 'Bulutangkis') ? 'selected' : '' }}>Bulutangkis</option>
    <option value="Sepak Bola" {{ (isset($perlengkapan) && $perlengkapan->kategori == 'Sepak Bola') ? 'selected' : '' }}>Sepak Bola</option>
    <option value="Futsal" {{ (isset($perlengkapan) && $perlengkapan->kategori == 'Futsal') ? 'selected' : '' }}>Futsal</option>
</select>
<select name="kondisi">
    <option value="Baik" {{ (isset($perlengkapan) && $perlengkapan->kondisi == 'Baik') ? 'selected' : '' }}>Baik</option>
    <option value="Perlu Perawatan" {{ (isset($perlengkapan) && $perlengkapan->kondisi == 'Perlu Perawatan') ? 'selected' : '' }}>Perlu Perawatan</option>
</select>
<input type="number" name="tarif" placeholder="Tarif per hari" value="{{ $perlengkapan->tarif ?? '' }}" required>
