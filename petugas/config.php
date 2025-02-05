<?php
$host = "localhost";  // Sesuaikan dengan host database Anda
$user = "root";       // Sesuaikan dengan user database Anda
$pass = "";           // Sesuaikan dengan password database Anda
$db   = "ukk_perpusdigital"; // Sesuaikan dengan nama database Anda

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
