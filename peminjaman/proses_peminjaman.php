<?php
include('../includes/config.php');
session_start();

// Memastikan pengguna telah login
if (!isset($_SESSION['user'])) {
    echo "Silakan login terlebih dahulu.";
    exit;
}

if (isset($_POST['pinjam'])) {
    $id_buku = $_POST['id_buku'];
    $id_pengguna = $_SESSION['user']['id_pengguna'];
    $tanggal_peminjaman = date('Y-m-d');

    // Mengecek stok buku
    $query_stok = "SELECT stok FROM buku WHERE id_buku = $id_buku";
    $result_stok = $conn->query($query_stok);
    $buku = $result_stok->fetch_assoc();

    if ($buku['stok'] > 0) {
        // Mengurangi stok buku
        $query_update_stok = "UPDATE buku SET stok = stok - 1 WHERE id_buku = $id_buku";
        if ($conn->query($query_update_stok)) {
            // Menyimpan data peminjaman
            $query_peminjaman = "INSERT INTO peminjaman (id_buku, id_pengguna, tanggal_peminjaman) 
                                 VALUES ($id_buku, $id_pengguna, '$tanggal_peminjaman')";
            if ($conn->query($query_peminjaman)) {
                echo "Buku berhasil dipinjam!";
            } else {
                echo "Gagal memproses peminjaman: " . $conn->error;
            }
        } else {
            echo "Gagal mengurangi stok buku: " . $conn->error;
        }
    } else {
        echo "Stok buku tidak tersedia.";
    }
}
?>
