<?php
$host = 'localhost'; // atau alamat server database Anda
$db = 'web_blog';    // nama database Anda
$user = 'root';      // username yang Anda gunakan
$password = 'root'; // ganti dengan password yang benar

try {
    $pdo = new PDO('mysql:host=localhost;dbname=web_blog', 'root', 'root'); // Ganti 'password_anda' dengan password yang benar
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
