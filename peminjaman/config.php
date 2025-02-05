<?php
$host = "localhost";  // Ganti jika perlu
$user = "root";       // Sesuaikan dengan database Anda
$password = "";       // Jika ada password, isi di sini
$database = "ukk_perpusdigital"; // Nama database

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
