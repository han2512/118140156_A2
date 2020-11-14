<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <title>Latihan3</title>
    </head>
<body>
    <?php 
	echo "Bilangan Prima dari 1-50 : ";
	for ($i=1;$i<=50;$i++){
		$a=0;
		for ($j=1;$j<=$i;$j++){
			if($i%$j==0){
				$a++;
			}
		}
		if($a==2){
			if($i==50-3){
				echo $i;
			}
			else{
				echo $i.", ";
			}
		}
	}
    ?>
</body>
</html>