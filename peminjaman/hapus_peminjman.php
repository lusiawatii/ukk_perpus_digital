<?php
include 'config.php';

$id = $_GET['id'];

// Query untuk menghapus data peminjaman
$query = "DELETE FROM peminjaman WHERE id_peminjaman = $id";

if (mysqli_query($conn, $query)) {
    header("Location: tampil_peminjaman.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>
