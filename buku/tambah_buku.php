<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $query = "INSERT INTO buku (judul, penulis, penerbit, tahun_terbit) 
              VALUES ('$judul', '$penulis', '$penerbit', '$tahun_terbit')";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo "Gagal menambahkan buku: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<br>
    <h1>Tambah Buku</h1>
    <form method="POST">
        Judul: <input type="text" name="judul" required><br>
        Penulis: <input type="text" name="penulis"><br>
        Penerbit: <input type="text" name="penerbit"><br>
        Tahun Terbit: <input type="number" name="tahun_terbit" min="1900" max="2099"><br>
        <input type="submit" value="Tambah Buku">
    </form>
    <a href="index.php">Kembali </a>
</body>
</html>
