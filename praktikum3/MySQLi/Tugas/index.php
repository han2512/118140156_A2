<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <hr><hr>

    <h3>Tambah Data</h3>
    <form action="tambahData.php" method="POST" enctype="multipart/form-data">
        NRP : <input type="text" name="nrp"><br>
        nama : <input type="text" name="nama"><br>
        Foto : <input type="file" name="foto"><br>
        <select name="jurusan" id="">
            <?php
                $conn = mysqli_connect("localhost", "root", "", "mahasiswa") or die("Gagal terhubung ke database");
                $query = mysqli_query($conn, "select * from jurusan");
                while($row = mysqli_fetch_array($query)) {
                    echo "<option value=\"${row['id_jur']}\">${row['nama']}</option>";
                }
            ?>
        </select><br>
        <input type="submit" name="simpan" value="simpan"> 
    </form>

    <hr><hr>
    <h3>Search Data</h3>
    <form action="carinama.php" method="POST">
        Nama : <input type="text" name="nama">
        <input type="submit" value="Cari Nama" name='cari'>
    </form>
    <hr><hr>
</body>
</html>