<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <title>Latihan2</title>
    </head>
<body>
    <?php 
	$data = array("lanirne", "aduh", "qifuat", "toda", "anevi", "samid" , "kifuat" , "lorem" , "ipsum" , "dolor");
	
	echo "Urut secara ascending : <br>";
	sort($data);
	$n=count($data);
	for($i=0;$i<$n;$i++){
		if($i==$n-1){
			echo $data[$i];
		}
		else{
			echo $data[$i].", ";
		}
	}
	echo "<br>";
	echo "Urut secara descending : <br>";
	rsort($data);
	$n=count($data);
	for ($i=0;$i<$n;$i++) {
		if($i==$n-1){
			echo $data[$i];
		}
		else{
			echo $data[$i].", ";
		}
	}
    ?>
 </body>
 </html>