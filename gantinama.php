<?php
session_start();
include "database.php";
if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== TRUE) {
    header("Location: login.php");
    exit();
}
if (!isset($_POST['cek']) && !isset($_POST['ganti'])) {
    unset($_SESSION['nama_baru']);
}
if (isset($_POST['cek'])) {
    $nama_baru = $_POST['nama_baru'];
    unset($_SESSION['nama_baru']);

    $cek_nama = "SELECT * FROM users WHERE username = '$nama_baru'";
    $result = mysqli_query($koneksi, $cek_nama);
    if (mysqli_num_rows($result) > 0) {
        echo "Nama sudah digunakan!";
    } else {
        echo "Nama tersedia!. Silahkan klik tombol ganti untuk mengganti nama anda";
        $_SESSION['nama_baru'] = $nama_baru;
    }
}
if (isset($_POST['ganti'])) {
    $username = $_SESSION['username'];
    $nama_baru = $_POST['nama_baru'];

if (!isset($_SESSION['nama_baru']) || $_SESSION['nama_baru'] !== $nama_baru) {
        echo "Silahkan cek ketersediaan nama terlebih dahulu!";
    } else {
        unset($_SESSION['nama_baru']);
    $cek_nama = "SELECT * FROM users WHERE username = '$nama_baru'";
    $result = mysqli_query($koneksi, $cek_nama);
    if (mysqli_num_rows($result) > 0) {
        echo "Nama sudah digunakan!";
    } else {
        $ganti = "UPDATE users SET username = '$nama_baru' WHERE username = '$username'";
        if (mysqli_query($koneksi, $ganti)) {
            $_SESSION['username'] = $nama_baru;
            echo "Nama berhasil diubah!";
            header("Location: dashboard.php");
        }}
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Nama</title>
</head>
<body>
    <h1><b>Ganti Nama</b></h1>
    <p>Pengen ganti nama?. <br>Maka ganti segera</p>
    <p>Nama anda: <?php echo $_SESSION['username']; ?></p>
    <form action="" method="POST">
        <input type="text" name="nama_baru" id="nama_baru" placeholder="Masukkan Nama Baru">
        <button type="submit" name="cek">Cek</button>
        <button type="submit" name="ganti">Ganti</button>
    </form>
</body>
</html>