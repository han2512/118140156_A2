<?php
    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $namafoto = $_FILES['foto']['name'];
    $namafoto_tmp = $_FILES['foto']['tmp_name'];
    $id_jur = $_POST['jurusan'];
    
    $conn = mysqli_connect("localhost", "root", "", "mahasiswa") or die("Gagal terhubung ke database");
    $query = mysqli_query($conn, "insert into mahasiswa values ('$nrp', '$nama', '$namafoto', '$id_jur')");
    
    if($query) {
        move_uploaded_file($namafoto_tmp, "gambar/${namafoto}");
        echo "
            <script>alert('Data berhasil upload');
            window.location.replace('index.php');
            </script>";
    } else {
        echo "<script> 
            alert('Data gagal ditambahkan');
            </script>";
    }

    mysqli_close($conn);
?>