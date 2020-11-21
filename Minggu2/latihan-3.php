




<?php 

	echo "<h1>Bilangan Prima 1-50</h1>";

	for ($i=1;$i<=50;$i++){
		$x=0;
		for ($j=1;$j<=$i;$j++){
			if($i%$j==0){
				$x++;
			}
		}
		if($x==2){
			echo $i." ";
		}
	}

 ?>