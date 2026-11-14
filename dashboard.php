<?php
session_start();

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== TRUE) {
    header("Location: login.php");
    exit();
}
if (isset($_POST['delete'])) {
    include "database.php"; 
    $username = $_SESSION['username'];
    $delete = "DELETE FROM users WHERE username = '$username'";
    if (mysqli_query($koneksi, $delete)) {
        session_unset();
        session_destroy();
        header("Location: register.php");
        exit();
    } else {
        echo "Gagal menghapus akun!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat Datang di Dashboard</h1>
    <p>Halo, <?php echo $_SESSION['username']; ?>!</p>
    <form action="" method="POST">
        <button type="submit" name="logout">Logout</button>
        <button type="submit" name="delete">Delete Account</button><br>
        <a href="ganti.php">Ganti Password</a><br>
        <a href="gantinama.php">Ganti Nama</a><br>
    </form>
</body>
</html>