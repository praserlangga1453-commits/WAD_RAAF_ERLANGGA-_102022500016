MODUL - RENTAL ALAT OLAHRAGA

ISI FOLDER
- index.php          Halaman tiket, kategori, formulir tambah, dan daftar data tersimpan
- tambah.php         Menyimpan data tiket ke database
- perlengkapan.php   Formulir tambah dan daftar master perlengkapan
- koneksi.php        Koneksi MySQL bersama untuk semua halaman
- style.css          Gaya tampilan responsif
- database.sql       Pembuatan database dan tabel

CARA MENJALANKAN (XAMPP)
1. Jalankan Apache dan MySQL dari XAMPP Control Panel.
2. Salin folder rental_olahraga_project ke C:\xampp\htdocs\
3. Buka http://localhost/phpmyadmin
4. Pilih tab Import, lalu import file database.sql.
5. Pastikan konfigurasi database pada koneksi.php sesuai dengan MySQL Anda.
   Default XAMPP: host localhost, user root, password kosong.
6. Buka http://localhost/rental_olahraga_project/index.php

CATATAN
- Data tiket ditambahkan melalui formulir di halaman utama dan disimpan ke tabel tiket.
- Data perlengkapan ditambahkan melalui halaman Perlengkapan dan disimpan ke tabel perlengkapan.
- Data yang tersimpan ditampilkan kembali dari database.
- Tidak ada fitur hapus tiket maupun hapus perlengkapan pada versi ini.
- Semua query input menggunakan prepared statement.
