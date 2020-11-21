<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koneksi Database MySQLi</title>
</head>
<body>
    <h1>Demo Koneksi Database</h1>
<?php
        $koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");

        if(mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        } else {
            echo "sukses";
        }
    ?>
</body>
</html>