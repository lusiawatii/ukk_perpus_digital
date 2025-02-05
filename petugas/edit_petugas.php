<?php
include 'config.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM petugas WHERE id=$id");
$petugas = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];

    $query = "UPDATE petugas SET username=?, email=?, nama_lengkap=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $nama_lengkap, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='tampil_petugas.php';</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Petugas</title>
</head>
<body>
    <h1>Edit Petugas</h1>
    <form action="" method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" value="<?= $petugas['username']; ?>" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $petugas['email']; ?>" required><br>
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama_lengkap" value="<?= $petugas['nama_lengkap']; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
