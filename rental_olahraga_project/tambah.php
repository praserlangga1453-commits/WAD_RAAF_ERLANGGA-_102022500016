<?php
require_once __DIR__ . '/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$kategori = trim($_POST['kategori'] ?? '');
$perlengkapan = trim($_POST['perlengkapan'] ?? '');
$kategoriValid = ['Bulutangkis', 'Sepak Bola', 'Futsal'];

if ($nama === '' || $perlengkapan === '' || !in_array($kategori, $kategoriValid, true)) {
    header('Location: index.php?pesan=invalid');
    exit;
}

$stmt = $koneksi->prepare('INSERT INTO tiket (nama_pelanggan, kategori, perlengkapan, status) VALUES (?, ?, ?, ?)');
$status = 'Menunggu';
$stmt->bind_param('ssss', $nama, $kategori, $perlengkapan, $status);
$stmt->execute();
$stmt->close();

header('Location: index.php?pesan=ditambahkan');
exit;
