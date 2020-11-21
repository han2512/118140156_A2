<form method="post">
	<input type="number" name="faktorialial" placeholder="isi angka" required>
	<button type="submit" name="hitung">Hitung Angka</button>
</form>

<?php
function faktorial($x){
	$angka = 1;
	$faktorial = 1;
	 while($angka <= $x){
		 $faktorial = $faktorial * $angka;
		 $angka = $angka + 1;
	 }
	  return $faktorial;
}
if(isset($_POST["hitung"])){
	$x = $_POST["faktorialial"];
	echo "$x! = ".faktorial($x);
}
?>
