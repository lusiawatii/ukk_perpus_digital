<?php
include 'config.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = $id");
$buku = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    $query = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', 
              tahun_terbit='$tahun_terbit' WHERE id_buku=$id";

    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo "Gagal mengupdate buku: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>
    <form method="POST">
        Judul: <input type="text" name="judul" value="<?= $buku['judul']; ?>" required><br>
        Penulis: <input type="text" name="penulis" value="<?= $buku['penulis']; ?>"><br>
        Penerbit: <input type="text" name="penerbit" value="<?= $buku['penerbit']; ?>"><br>
        Tahun Terbit: <input type="number" name="tahun_terbit" value="<?= $buku['tahun_terbit']; ?>"><br>
        <input type="submit" value="Update Buku">
    </form>
    <a href="index.php">Kembali ke Daftar Buku</a>
</body>
</html>
