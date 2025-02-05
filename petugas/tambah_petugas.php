<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $email = trim($_POST['email']);
    $nama_lengkap = trim($_POST['nama_lengkap']);

    $query = "INSERT INTO petugas (username, password, email, nama_lengkap) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $username, $password, $email, $nama_lengkap);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Petugas berhasil ditambahkan!'); window.location='tampil_petugas.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Petugas</title>
</head>
<body>
    <h1>Tambah Petugas</h1>
    <form action="" method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama_lengkap" required><br><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
