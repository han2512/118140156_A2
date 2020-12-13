<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "maha_siswa";
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
$kon = mysqli_connect($host, $user, $password, $db);
if(!$kon){
    die("Koneksi gagal:".mysqli_connect_error());
}
?>