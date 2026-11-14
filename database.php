<?php
$host     = "localhost";
$db_user  = "root";
$db_pass  = "";
$db_name  = "toko_madura";

$koneksi = mysqli_connect($host, $db_user, $db_pass, $db_name);
if(!$koneksi){
echo "Gagal tersambung";
}
?>