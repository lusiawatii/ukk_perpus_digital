<?php
include 'config.php';

// Ambil data dari database
$result = mysqli_query($conn, "SELECT * FROM petugas");

// Cek jika query gagal
if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Petugas Perpustakaan</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background-color: #f9f9f9; }
        h1 { text-align: center; margin-bottom: 20px; }
        .btn { padding: 10px 15px; text-decoration: none; color: white; border-radius: 4px; margin-right: 5px; }
        .btn-add { background-color: #28a745; }
        .btn-edit { background-color: #ffc107; }
        .btn-delete { background-color: #dc3545; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        .table th { background-color: #f2f2f2; }
        .no-data { text-align: center; font-style: italic; color: #888; }
    </style>
</head>
<body>
    <h1>Manajemen Petugas Perpustakaan</h1>
    <a href="tambah_petugas.php" class="btn btn-add">Tambah Petugas</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Nama Lengkap</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0) : ?>
                <?php $no = 1; while ($petugas = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($petugas['username']); ?></td>
                        <td><?= htmlspecialchars($petugas['email']); ?></td>
                        <td><?= htmlspecialchars($petugas['nama_lengkap']); ?></td>
                        <td>
                            <a href="edit_petugas.php?id=<?= $petugas['id']; ?>" class="btn btn-edit">Edit</a>
                            <a href="hapus_petugas.php?id=<?= $petugas['id']; ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus petugas ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="no-data">Belum ada petugas yang terdaftar.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
