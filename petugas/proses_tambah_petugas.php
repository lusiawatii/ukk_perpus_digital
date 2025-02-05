<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";  // Sesuaikan dengan password MySQL-mu
$database = "perpustakaan_digital";  // Ganti dengan nama database kamu

$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari form
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Enkripsi password
$email = $_POST['email'];
$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
$role = $_POST['role'];

// Cek apakah username sudah ada
$cek_username = $conn->query("SELECT * FROM user WHERE username='$username'");
if ($cek_username->num_rows > 0) {
    echo "<script>alert('Username sudah digunakan, silakan pilih yang lain.'); window.location='tambah_petugas.php';</script>";
    exit;
}

// Simpan data ke database
$sql = "INSERT INTO petugas (id_user, username, password, email, nama_lengkap, alamat, role)
        VALUES ('$id_user', '$username', '$password', '$email', '$nama_lengkap', '$alamat', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data petugas berhasil ditambahkan.'); window.location='index.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
