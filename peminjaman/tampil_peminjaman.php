<?php
include 'config.php';

// Query untuk menampilkan data peminjaman
$result = mysqli_query($conn, "SELECT * FROM peminjaman");

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman Buku</title>
</head>
<body>
    <h1>Data Peminjaman Buku</h1>
    <a href="tambah_peminjaman.php">Tambah Peminjaman</a><br><br>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Judul Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Aksi</th>
        </tr>
        
        <?php 
        $no = 1;
        while($peminjaman = mysqli_fetch_assoc($result)): 
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $peminjaman['nama_user']; ?></td>
            <td><?= $peminjaman['judul_buku']; ?></td>
            <td><?= $peminjaman['tanggal_peminjaman']; ?></td>
            <td><?= $peminjaman['tanggal_pengembalian']; ?></td>
            <td>
                <a href="edit_peminjaman.php?id=<?= $peminjaman['id_peminjaman']; ?>">Edit</a> |
                <a href="hapus_peminjaman.php?id=<?= $peminjaman['id_peminjaman']; ?>" onclick="return confirm('Yakin hapus peminjaman ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <br>
    <a href="../dashboard.php">Kembali ke Halaman Dashboard</a>
</body>
</html>
