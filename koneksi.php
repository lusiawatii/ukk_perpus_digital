<?php
// Parameter koneksi database
$host = 'localhost';       // Alamat server MySQL (biasanya localhost)
$user = 'root';            // Username MySQL
$password = '';            // Password MySQL (kosongkan jika tidak ada password)
$db = 'ukk_perpusdigital';     // Nama database yang ingin Anda hubungkan

// Membuat koneksi ke database MySQL
$conn = mysqli_connect($host, $user, $password, $db);

// Cek apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());  // Menampilkan pesan error jika koneksi gagal
}
?>
