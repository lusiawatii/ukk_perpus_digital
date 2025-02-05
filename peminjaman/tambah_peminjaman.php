<?php
// Include file config untuk koneksi ke database
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form dan lakukan validasi
    $nama_user = trim($_POST['nama_user']);
    $judul_buku = trim($_POST['judul_buku']);
    $tanggal_peminjaman = trim($_POST['tanggal_peminjaman']);

    if (empty($nama_user) || empty($judul_buku) || empty($tanggal_peminjaman) || empty($tanggal_pengembalian)) {
        echo "<p style='color:red;'>";
    } else {
        // Cek apakah peminjaman dengan buku yang sama dan user yang sama sudah ada
        $checkQuery = "SELECT id FROM peminjaman WHERE nama_user = ? AND judul_buku ";
        if ($stmtCheck = mysqli_prepare($conn, $checkQuery)) {
            mysqli_stmt_bind_param($stmtCheck, "ss", $nama_user, $judul_buku);
            mysqli_stmt_execute($stmtCheck);
            mysqli_stmt_store_result($stmtCheck);

            if (mysqli_stmt_num_rows($stmtCheck) > 0) {
                echo "<p style='color:red;'>Buku ini sudah dipinjam oleh pengguna yang sama!</p>";
            } else {
                // Query untuk insert data
                $query = "INSERT INTO peminjaman (nama_user, judul_buku, tanggal_peminjaman, tanggal_pengembalian) 
                          VALUES (?, ?, ?, ?)";

                if ($stmt = mysqli_prepare($conn, $query)) {
                    mysqli_stmt_bind_param($stmt, "ssss", $nama_user, $judul_buku, $tanggal_peminjaman, $tanggal_pengembalian);

                    if (mysqli_stmt_execute($stmt)) {
                        header("Location: tampil_peminjaman.php");
                        exit();
                    } else {
                        echo "<p style='color:red;'>Terjadi kesalahan saat menyimpan data!</p>";
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo "<p style='color:red;'>Kesalahan pada prepared statement!</p>";
                }
            }
            mysqli_stmt_close($stmtCheck);
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman</title>
</head>
<body>
    <h1>Tambah Peminjaman Buku</h1>
    <form action="" method="POST">
        <label for="nama_user">Nama User:</label><br>
        <input type="text" id="nama_user" name="nama_user" required><br><br>

        <label for="judul_buku">Judul Buku:</label><br>
        <input type="text" id="judul_buku" name="judul_buku" required><br><br>

        <label for="tanggal_peminjaman">Tanggal Peminjaman:</label><br>
        <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" required><br><br>

        <label for="tanggal_pengembalian">Tanggal Pengembalian:</label><br>
        <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" required><br><br>


        <input type="submit" value="Simpan">
    </form>
    <br>
    <a href="tampil_peminjaman.php">Kembali ke Data Peminjaman</a>
</body>
</html>
