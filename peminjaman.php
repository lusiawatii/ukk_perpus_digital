<?php
include('../config.php');
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user'])) {
    echo "<p>Silakan <a href='../login.php'>login</a> untuk melihat riwayat peminjaman.</p>";
    exit;
}

$id_pengguna = $_SESSION['user']['id_pengguna'];

// Menggunakan prepared statement untuk keamanan
$query = "SELECT peminjaman.*, buku.judul FROM peminjaman 
          INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
          WHERE peminjaman.id_pengguna = ?
          ORDER BY peminjaman.tanggal_peminjaman DESC";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id_pengguna);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            background-color: red;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

<h1>Riwayat Peminjaman</h1>

<?php if (mysqli_num_rows($result) > 0) { ?>
    <table>
        <tr>
            <th>Judul Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Status Pengembalian</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['judul']); ?></td>
            <td><?php echo htmlspecialchars($row['tanggal_peminjaman']); ?></td>
            <td><?php echo $row['status_pengembalian'] ? "Sudah Dikembalikan" : "Belum Dikembalikan"; ?></td>
            <td>
                <?php if (!$row['status_pengembalian']) { ?>
                    <form method="POST" action="proses_pengembalian.php" style="display:inline;">
                        <input type="hidden" name="id_peminjaman" value="<?php echo $row['id_peminjaman']; ?>">
                        <button type="submit" name="kembalikan" class="btn">Kembalikan Buku</button>
                    </form>
                <?php } else { ?>
                    <span style="color:green;">✔</span>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>
<?php } else { ?>
    <p>Anda belum meminjam buku.</p>
<?php } ?>

</body>
</html>

<?php
// Tutup statement
mysqli_stmt_close($stmt);
?>
