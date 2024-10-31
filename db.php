<?php
$host = 'localhost'; // atau alamat server database Anda
$db = 'web_blog';    // nama database Anda
$user = 'root';      // username yang Anda gunakan
$password = 'root';  // ganti dengan password yang benar

try {
    // Buat koneksi PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    // Atur mode error PDO ke Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
