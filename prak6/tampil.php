<table border="1" cellpadding="5px">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Angkatan</th>
        <th>Pilihan</th>
    </tr>
    <?php
    include "koneksi.php";
    $hasil = mysqli_query($kon, 
    "select * from mahasiswa order by nim asc");
    $no = 0;
    while($data = mysqli_fetch_array($hasil)):
    $no++;
    ?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $data['nim'];?></td>
        <td><?php echo $data['nama'];?></td>
        <td><?php echo $data['prodi'];?></td>
        <td><?php echo $data['angkatan']; ?></td>
        <td>
            <button id="<?php echo $data['nim']; ?>" class="edit"> Edit </button>
            <button id="<?php echo $data['nim']; ?>" class="hapus"> Hapus </button>
        </td>
    </tr>
    <?php endwhile;?>
</table>
<script type='text/javascript'>
$(document).on('click', '.hapus', function(){
    var id = $(this).attr('id');
    $.ajax({
        type: 'POST',
        url: "hapus.php",
        data: {id:id},
        success: function() {
            $('#tampil_data').load("tampil.php");
        }, error: function(response){
            console.log(response.responseText);
        }
    });
});
</script>