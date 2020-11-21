<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Data</title>
    <style>
        table {
            border-collapse: collapse;
            text-align: center;
        }

        th {
            background-color: #92a8d1;
        }

        td, th {
            border: 1px solid #000;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Pencarian Nama</h1>
    <?php 
        $conn = mysqli_connect("localhost", "root", "", "mahasiswa");
        
        $nama = $_POST['nama'];
        $query = mysqli_query($conn, "select * from mahasiswa where nama like '%$nama%'");
        $query_jurusan = mysqli_query($conn, "select * from jurusan");
        $simpan = array();
        while($result_jurusan = mysqli_fetch_array($query_jurusan)) {
            array_push($simpan, $result_jurusan);
        }

        $jumlah = mysqli_num_rows($query);
        if($jumlah > 0) {
    ?>
        <table>
            <tr>
                <th>NRP</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Jurusan</th>
                <th>Pilihan</th>
            </tr>
    <?php
            while($row = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . $row['nrp'] . "</td>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td><img src=\"gambar/${row['alamat']}\" width='150' height='150'></td>";
                echo "<td>";
                foreach ($simpan as $array) {
                    if($array['id_jur'] == $row['id_jur']) {
                        echo $array['nama'];
                    }
                }
                echo "</td>";
                echo "<td><a href='deletedata.php?nrp=${row['nrp']}'>Hapus</a></td>";
            }
        } else {
            echo "<script>
                    alert('Nama tidak ditemukan');
                    window.location.replace('index.php');
                </script>";
        }
    ?>
        
        </table>
</body>
</html>