<?php
include 'config.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_user = $_POST['nama_user'];
    $judul_buku = $_POST['judul_buku'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

    // Update data peminjaman
    $query = "UPDATE peminjaman 
              SET nama_user = '$nama_user', judul_buku = '$judul_buku', 
                  tanggal_peminjaman = '$tanggal_peminjaman', 
                  tanggal_pengembalian = '$tanggal_pengembalian' 
              WHERE id_peminjaman = $id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: tampil_peminjaman.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Ambil data peminjaman yang akan diedit
$query = "SELECT * FROM peminjaman WHERE id_peminjaman = $id";
$result = mysqli_query($conn, $query);
$peminjaman = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman</title>
</head>
<body>
    <h1>Edit Peminjaman Buku</h1>
    <form action="" method="POST">
        <label for="nama_user">Nama User:</label><br>
        <input type="text" id="nama_user" name="nama_user" value="<?= $peminjaman['nama_user']; ?>" required><br><br>

        <label for="judul_buku">Judul Buku:</label><br>
        <input type="text" id="judul_buku" name="judul_buku" value="<?= $peminjaman['judul_buku']; ?>" required><br><br>

        <label for="tanggal_peminjaman">Tanggal Peminjaman:</label><br>
        <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" value="<?= $peminjaman['tanggal_peminjaman']; ?>" required><br><br>

        <label for="tanggal_pengembalian">Tanggal Pengembalian:</label><br>
        <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" value="<?= $peminjaman['tanggal_pengembalian']; ?>" required><br><br>

        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="tampil_peminjaman.php">Kembali</a>
</body>
</html>
