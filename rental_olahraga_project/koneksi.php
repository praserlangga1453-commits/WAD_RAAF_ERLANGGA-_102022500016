<?php
// Konfigurasi koneksi database MySQL.
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'rental_olahraga';

try {
    $koneksi = new mysqli($host, $username, $password, $database);
    $koneksi->set_charset('utf8mb4');
} catch (mysqli_sql_exception $e) {
    http_response_code(500);
    exit('Koneksi database gagal. Pastikan MySQL aktif dan database rental_olahraga sudah dibuat.');
}

function e($value): (string)
{
    return htmlspecialchars(string) $value, ENT_QUOTES, 'UTF-8');
}
