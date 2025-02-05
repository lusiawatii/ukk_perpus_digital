<?php
include 'config.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM petugas WHERE id=$id");

echo "<script>alert('Petugas berhasil dihapus!'); window.location='tampil_petugas.php';</script>";
?>
