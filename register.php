<?php
include "database.php"; 
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $cek_nama = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($koneksi, $cek_nama);
    if (mysqli_num_rows($result) > 0) {
        echo "Username sudah digunakan!";
    } else {
        $regis = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($koneksi, $regis)) {
            echo "Pendaftaran berhasil!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
</head>
<body>
    <h1><b>Pendaftaran</b></h1>
    <form action="" method="POST">
        <input type="text" name="username" id="username" placeholder="Username">
        <input type="password" name="password" id="password" placeholder="Password">

        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>