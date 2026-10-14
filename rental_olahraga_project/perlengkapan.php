<?php
require_once __DIR__ . '/koneksi.php';

$kategoriValid = ['Bulutangkis', 'Sepak Bola', 'Futsal'];
$kondisiValid = ['Baik', 'Perlu Perawatan'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan'])) {
    $nama = trim($_POST['nama'] ?? '');
    $kategori = trim($_POST['kategori'] ?? '');
    $kondisi = trim($_POST['kondisi'] ?? '');
    $tarif = filter_input(INPUT_POST, 'tarif', FILTER_VALIDATE_INT);

    if ($nama === '' || !in_array($kategori, $kategoriValid, true) || !in_array($kondisi, $kondisiValid, true) || $tarif === false || $tarif === null || $tarif < 0) {
        header('Location: perlengkapan.php?pesan=invalid');
        exit;
    }

    $stmt = $koneksi->prepare('INSERT INTO perlengkapan (nama, kategori, kondisi, tarif) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('sssi', $nama, $kategori, $kondisi, $tarif);
    $stmt->execute();
    $stmt->close();
    header('Location: perlengkapan.php?pesan=ditambahkan');
    exit;
}

$total = (int) $koneksi->query('SELECT COUNT(*) AS total FROM perlengkapan')->fetch_assoc()['total'];
$baik = (int) $koneksi->query("SELECT COUNT(*) AS total FROM perlengkapan WHERE kondisi = 'Baik'")->fetch_assoc()['total'];
$rawat = $total - $baik;
$data = $koneksi->query('SELECT id, nama, kategori, kondisi, tarif FROM perlengkapan ORDER BY id DESC');
$pesan = $_GET['pesan'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>MODUL - Master Perlengkapan</title><link rel="stylesheet" href="style.css"></head>
<body>
<header class="navbar"><div class="nav-content"><a class="brand" href="index.php"><span class="brand-title">MODUL</span><span class="brand-subtitle">Rental Alat Olahraga</span></a><nav><a href="index.php">Tiket &amp; Kategori</a><a href="perlengkapan.php" class="active">Perlengkapan</a></nav></div></header>
<main class="container">
    <?php if ($pesan === 'ditambahkan'): ?><p class="notice success-notice">Perlengkapan berhasil ditambahkan.</p><?php endif; ?>
    <?php if ($pesan === 'invalid'): ?><p class="notice error-notice">Data tidak valid. Periksa kembali isian Anda.</p><?php endif; ?>
    <section class="page-header"><div><span class="badge">MODUL 02</span><h1>Master Perlengkapan</h1><p>Kelola data perlengkapan olahraga yang tersedia untuk disewakan kepada pelanggan.</p></div><a href="index.php" class="back-button">← Kembali ke Tiket</a></section>
    <section class="stats">
        <div class="stat-card"><div class="stat-icon">T</div><div><span>Total Perlengkapan</span><h3><?= $total ?></h3></div></div>
        <div class="stat-card"><div class="stat-icon">B</div><div><span>Kondisi Baik</span><h3><?= $baik ?></h3></div></div>
        <div class="stat-card"><div class="stat-icon">P</div><div><span>Perlu Perawatan</span><h3><?= $rawat ?></h3></div></div>
    </section>
    <section class="content-card"><div class="section-heading"><div><span class="section-label">MASTER DATA</span><h2>Perlengkapan Olahraga</h2><p>Informasi jenis perlengkapan, kondisi, dan tarif sewa per hari.</p></div></div>
        <form method="post" class="form-box">
            <input type="text" name="nama" placeholder="Nama perlengkapan" maxlength="100" required>
            <select name="kategori" required><option value="">Pilih kategori</option><?php foreach ($kategoriValid as $kategori): ?><option value="<?= e($kategori) ?>"><?= e($kategori) ?></option><?php endforeach; ?></select>
            <select name="kondisi" required><option value="Baik">Baik</option><option value="Perlu Perawatan">Perlu Perawatan</option></select>
            <input type="number" name="tarif" placeholder="Tarif per hari (Rp)" min="0" step="1" required>
            <button type="submit" name="simpan" class="primary-button">+ Tambah Perlengkapan</button>
        </form>
        <div class="table-wrapper"><table><thead><tr><th>Kode</th><th>Perlengkapan</th><th>Kategori</th><th>Kondisi</th><th>Tarif / Hari</th></tr></thead><tbody>
        <?php if ($data->num_rows === 0): ?><tr><td colspan="5">Belum ada data perlengkapan. Tambahkan data melalui formulir di atas.</td></tr><?php else: ?>
            <?php while ($row = $data->fetch_assoc()): ?><tr><td>#EQ<?= str_pad((string) $row['id'], 3, '0', STR_PAD_LEFT) ?></td><td><strong><?= e($row['nama']) ?></strong></td><td><?= e($row['kategori']) ?></td><td><span class="condition <?= $row['kondisi'] === 'Baik' ? 'good' : 'repair' ?>"><?= e($row['kondisi']) ?></span></td><td>Rp<?= number_format((int) $row['tarif'], 0, ',', '.') ?></td></tr><?php endwhile; ?>
        <?php endif; ?></tbody></table></div>
    </section>
    <section class="info-grid"><div class="info-card"><span>01</span><h3>Perlengkapan</h3><p>Data alat yang tersedia untuk proses penyewaan.</p></div><div class="info-card"><span>02</span><h3>Kondisi</h3><p>Kondisi alat membantu memastikan kualitas sebelum disewakan.</p></div><div class="info-card"><span>03</span><h3>Tarif Sewa</h3><p>Tarif ditentukan berdasarkan jenis perlengkapan per hari.</p></div></section>
    <section class="flow-card"><div><span class="section-label">LANJUTKAN PROSES</span><h2>Kembali ke Modul Tiket</h2><p>Setelah perlengkapan dikelola, kembali ke halaman tiket penyewaan.</p></div><a href="index.php" class="secondary-button">← Modul Tiket</a></section>
</main><footer><p>MODUL · Rental Alat Olahraga</p><span>NAMA</span></footer>
</body></html>
