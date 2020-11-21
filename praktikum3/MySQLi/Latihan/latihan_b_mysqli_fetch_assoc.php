<?php

    $koneksi = mysqli_connect("localhost", "root", "", "mahasiswa") 
               or die("gagal");

    $result = mysqli_query($koneksi, "select * from informatika");

    //assoc -> [column_name] => value
    // echo "<br><br>";
    while ($row = mysqli_fetch_assoc($result)) {
         print_r($row);
         echo "<br>";
    }
?>
