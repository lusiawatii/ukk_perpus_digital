<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "ukk_perpusdigital";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data peminjaman
// $sql = "SELECT p.id_peminjaman, b.judul_buku, u.nama_lengkap, p.tanggal_pinjam, p.tanggal_kembali, p.status 
//         FROM peminjaman p
//         JOIN buku b ON p.id_buku = b.id_buku
//         JOIN user u ON p.id_user = u.id_user
//         ORDER BY p.tanggal_pinjam DESC";
// $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Peminjaman Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .header {
        background-color:rgb(14, 43, 74); /* Biru cerah */
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 24px;
    }

    .container {
        margin-top: 30px;
        width: 90%;
        margin: 20px auto;
    }
</style>
<body class="bg-light">

    <!-- Header -->
    <div class="header">
        Laporan Peminjaman Buku
    </div>

    <div class="container">
        <h3>Laporan Peminjaman Buku</h3>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Id Peminjaman</th>
                    <th>Judul Buku</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- <?php while($row = $result->fetch_assoc()) { ?> -->
                    <tr>
                        <td><?= $row['id_peminjaman'] ?></td>
                        <td><?= $row['judul_buku'] ?></td>
                        <td><?= $row['nama_lengkap'] ?></td>
                        <td><?= $row['tanggal_pinjam'] ?></td>
                        <td><?= $row['tanggal_kembali'] ?></td>
                        <td><?= ucfirst($row['status']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>

<?php $conn->close(); ?>
