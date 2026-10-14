<?php
require_once __DIR__ . '/koneksi.php';

$totalTiket = (int) $koneksi->query('SELECT COUNT(*) AS total FROM tiket')->fetch_assoc()['total'];
$totalPerlengkapan = (int) $koneksi->query('SELECT COUNT(*) AS total FROM perlengkapan')->fetch_assoc()['total'];
$tiket = $koneksi->query('SELECT id, nama_pelanggan, kategori, perlengkapan, status FROM tiket ORDER BY id DESC');
$pesan = $_GET['pesan'] ?? '';
$kategoriList = ['Bulutangkis', 'Sepak Bola', 'Futsal'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODUL - Tiket &amp; Kategori</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="navbar">
    <div class="nav-content">
        <a class="brand" href="index.php"><span class="brand-title">MODUL</span><span class="brand-subtitle">Rental Alat Olahraga</span></a>
        <nav><a href="index.php" class="active">Tiket &amp; Kategori</a><a href="perlengkapan.php">Perlengkapan</a></nav>
    </div>
</header>
<main class="container">
    <?php if ($pesan === 'ditambahkan'): ?><p class="notice success-notice">Tiket berhasil ditambahkan.</p><?php endif; ?>
    <?php if ($pesan === 'invalid'): ?><p class="notice error-notice">Data tidak valid. Periksa kembali isian Anda.</p><?php endif; ?>

    <section class="hero">
        <div class="hero-text">
            <span class="badge">MODUL 01 · TIKET &amp; KATEGORI</span>
            <h1>Kelola penyewaan<br>alat olahraga dengan mudah.</h1>
            <p>Catat permintaan pelanggan, kelompokkan jenis olahraga, dan pantau data penyewaan dalam satu halaman.</p>
            <a class="primary-button" href="#form-tiket">+ Buat Tiket Baru</a>
        </div>
        <aside class="identity-card">
            <span class="section-label">IDENTITAS PENGEMBANG</span>
            <h2>ERLANGGA PRASETYA</h2>
            <div class="identity-list">
                <div><span>NIM</span><strong>102022500016</strong></div>
                <div><span>Kelas</span><strong>SI-49-06</strong></div>
                <div><span>Kelompok</span><strong>3</strong></div>
                <div><span>Proyek</span><strong>Rental Alat Olahraga</strong></div>
            </div>
        </aside>
    </section>

    <section class="stats">
        <div class="stat-card"><div class="stat-icon">T</div><div><span>Total Tiket</span><h3><?= $totalTiket ?></h3></div></div>
        <div class="stat-card"><div class="stat-icon">P</div><div><span>Jenis Perlengkapan</span><h3><?= $totalPerlengkapan ?></h3></div></div>
        <div class="stat-card"><div class="stat-icon">K</div><div><span>Kategori Olahraga</span><h3><?= count($kategoriList) ?></h3></div></div>
    </section>

    <section class="content-card" id="form-tiket">
        <div class="section-heading"><div><span class="section-label">INPUT DATA</span><h2>Buat Tiket Penyewaan</h2><p>Masukkan data pelanggan dan perlengkapan yang ingin disewa.</p></div></div>
        <form method="post" action="tambah.php" class="form-box">
            <input type="text" name="nama" placeholder="Nama pelanggan" maxlength="100" required>
            <select name="kategori" required><option value="">Pilih kategori olahraga</option><?php foreach ($kategoriList as $kategori): ?><option value="<?= e($kategori) ?>"><?= e($kategori) ?></option><?php endforeach; ?></select>
            <input type="text" name="perlengkapan" placeholder="Perlengkapan (contoh: raket, bola, rompi)" maxlength="120" required>
            <button type="submit" class="primary-button">Simpan Tiket</button>
        </form>
    </section>

    <section class="content-card">
        <div class="section-heading"><div><span class="section-label">DATA TERSIMPAN</span><h2>Daftar Tiket</h2><p>Daftar tiket terbaru ditampilkan di bagian atas.</p></div></div>
        <div class="table-wrapper"><table><thead><tr><th>Kode</th><th>Pelanggan</th><th>Kategori</th><th>Perlengkapan</th><th>Status</th></tr></thead><tbody>
        <?php if ($tiket->num_rows === 0): ?><tr><td colspan="5">Belum ada tiket. Silakan tambahkan data melalui formulir di atas.</td></tr><?php else: ?>
            <?php while ($row = $tiket->fetch_assoc()): ?><tr>
                <td>#TK<?= str_pad((string) $row['id'], 3, '0', STR_PAD_LEFT) ?></td>
                <td><strong><?= e($row['nama_pelanggan']) ?></strong></td><td><?= e($row['kategori']) ?></td><td><?= e($row['perlengkapan']) ?></td>
                <td><span class="status waiting-status"><?= e($row['status']) ?></span></td>
            </tr><?php endwhile; ?>
        <?php endif; ?>
        </tbody></table></div>
    </section>

    <section class="content-card">
        <div class="section-heading"><div><span class="section-label">KATEGORI</span><h2>Kategori Olahraga</h2><p>Pilih kategori yang sesuai dengan kebutuhan penyewaan.</p></div></div>
        <div class="category-grid">
            <article class="category-card"><span class="category-number">01</span><h3>Bulutangkis</h3><p>Raket, kok, dan perlengkapan bulutangkis lainnya.</p></article>
            <article class="category-card"><span class="category-number">02</span><h3>Sepak Bola</h3><p>Bola dan perlengkapan pendukung sepak bola.</p></article>
            <article class="category-card"><span class="category-number">03</span><h3>Futsal</h3><p>Bola futsal, rompi, dan perlengkapan latihan.</p></article>
        </div>
    </section>

    <section class="flow-card"><div><span class="section-label">MODUL BERIKUTNYA</span><h2>Kelola Master Perlengkapan</h2><p>Atur nama alat, kategori, kondisi, dan tarif sewa harian di halaman perlengkapan.</p></div><a href="perlengkapan.php" class="secondary-button">Buka Perlengkapan →</a></section>
</main>
<footer><p>MODUL · Rental Alat Olahraga</p><span>NAMA</span></footer>
</body>
</html>
