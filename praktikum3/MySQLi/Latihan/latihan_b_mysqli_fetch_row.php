<?php

    $koneksi = mysqli_connect("localhost", "root", "", "mahasiswa") 
               or die("gagal");

    $result = mysqli_query($koneksi, "select * from informatika");

    //row -> [Index] => value
    // echo "<br><br>";
    while ($row = mysqli_fetch_row($result)) {
         print_r($row);
         echo "<br>";
    }
?>