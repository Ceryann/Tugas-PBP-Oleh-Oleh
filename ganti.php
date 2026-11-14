<?php
session_start();
if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== TRUE) {
    header("Location: login.php");
    exit();
}
if (isset($_POST['ganti'])) {
    include "database.php"; 
    $username = $_SESSION['username'];
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    $cek_password = "SELECT * FROM users WHERE username = '$username' AND password = '$password_lama'";
    $result = mysqli_query($koneksi, $cek_password);

    if (mysqli_num_rows($result) > 0) {
        if ($password_baru === $konfirmasi_password) {
            $ganti = "UPDATE users SET password = '$password_baru' WHERE username = '$username'";
            if (mysqli_query($koneksi, $ganti)) {
                echo "Password berhasil diubah!";
                header("Location: dashboard.php");
            }
        } else {
            echo "Konfirmasi password tidak sesuai!";
        }
    } else {
        echo "Password lama salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
</head>
<body>
    <h1><b>Ganti Password</b></h1>
    <form action="" method="POST">
        <input type="password" name="password_lama" id="password_lama" placeholder="Masukkan Password Lama"><br>
        <input type="password" name="password_baru" id="password_baru" placeholder="Masukkan Password Baru"><br>
        <input type="password" name="konfirmasi_password" id="konfirmasi_password" placeholder="Konfirmasi Password Baru">
        <button type="submit" name="ganti">Ganti Password</button>
    </form>
</body>
</html>