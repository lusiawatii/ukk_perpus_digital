<?php
include 'config.php';
$result = mysqli_query($conn, "SELECT * FROM buku");
?>

<!DOCTYPE html>

<head>
    <title>Perpustakaan Digital</title>
</head>
<body>
    <h1>Daftar Buku</h1>
    <a href="tambah_buku.php">Tambah Buku</a><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $no = 1;
        while($buku = mysqli_fetch_assoc($result)): 
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $buku['judul']; ?></td>
            <td><?= $buku['penulis']; ?></td>
            <td><?= $buku['penerbit']; ?></td>
            <td><?= $buku['tahun_terbit']; ?></td>
            <td>
                <a href="edit_buku.php?id=<?= $buku['id_buku']; ?>">Edit</a> |
                <a href="hapus_buku.php?id=<?= $buku['id_buku']; ?>" onclick="return confirm('Yakin hapus buku ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <a href="../dashboard.php">Kembali ke Halaman Dashboard</a>
</body>
</html>
