<?php
include 'config.php';

$id = $_GET['id'];
$query = "DELETE FROM buku WHERE id_buku = $id";

if (mysqli_query($conn, $query)) {
    header('Location: index.php');
} else {
    echo "Gagal menghapus buku: " . mysqli_error($conn);
}
?>
