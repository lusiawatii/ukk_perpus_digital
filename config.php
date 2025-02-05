<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'ukk_perpusdigital';

// Membuat koneksi ke database
$conn = mysqli_connect($host, $user, $password, $db);

// Periksa koneksi
if (!$conn) {
    die('Koneksi gagal: ' . mysqli_connect_error());
} else {

}
?>
