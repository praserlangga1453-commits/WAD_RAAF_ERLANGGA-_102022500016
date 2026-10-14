CREATE DATABASE IF NOT EXISTS rental_olahraga
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE rental_olahraga;

CREATE TABLE IF NOT EXISTS tiket (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nama_pelanggan VARCHAR(100) NOT NULL,
  kategori VARCHAR(50) NOT NULL,
  perlengkapan VARCHAR(120) NOT NULL,
  status ENUM('Menunggu','Diproses','Selesai','Dibatalkan') NOT NULL DEFAULT 'Menunggu',
  dibuat_pada TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS perlengkapan (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  kategori VARCHAR(50) NOT NULL,
  kondisi ENUM('Baik','Perlu Perawatan') NOT NULL DEFAULT 'Baik',
  tarif INT UNSIGNED NOT NULL DEFAULT 0,
  dibuat_pada TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Contoh data awal (opsional). Hapus tanda komentar jika ingin memasukkan contoh.
-- INSERT INTO perlengkapan (nama, kategori, kondisi, tarif) VALUES
-- ('Raket Badminton', 'Bulutangkis', 'Baik', 15000),
-- ('Bola Sepak', 'Sepak Bola', 'Baik', 25000),
-- ('Rompi Latihan', 'Futsal', 'Perlu Perawatan', 10000);
