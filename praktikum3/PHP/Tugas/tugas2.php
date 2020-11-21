<form method="post">
	<input type="text" name="name" placeholder="isi nama anda " required>
	<button type="submit" name="hitung">Harga nametag</button>
</form>

<?php

function nametag($name, $color = 'red') {
    $space_length = substr_count($name," ");
    $name_length = strlen($name);
    $name_length_no_space = $name_length - $space_length;
    $harga;
    $harga_no_space;
    if($name_length<=10){
        $harga = $name_length * 300;
    }
    elseif($name_length<=20){
        $harga = $name_length * 500;
    }
    else{
        $harga = $name_length * 700;
    }
    if($name_length_no_space<=10){
        $harga_no_space = $name_length_no_space * 300;
    }
    elseif($name_length_no_space<=20){
        $harga_no_space = $name_length_no_space * 500;
    }
    else{
        $harga_no_space = $name_length_no_space * 700;
    }
    echo "<p style='color:$color'> " . ucwords($name) . "</p>";
    echo "Harga nametag: ";
    echo $harga . "<br>" ;
    echo "Harga nametag: ".$harga_no_space."(Tidak termasuk spasi)"."<br>";
}

if(isset($_POST["hitung"])){
	$name = $_POST['name'];
    nametag($name);
}
?>