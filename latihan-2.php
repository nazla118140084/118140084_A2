<?php 
	
	
	$nama = array("lanirne", "aduh", "qifuat", "toda", "anevi", "samid" , "kifuat" , "lorem" , "ipsum" , "dolor");


	echo "Sebelum data diurutkan : <br>";
	$i = 1;
	foreach ($nama as $value) {
		echo "$i. $value <br>";
		$i++;
	}

	echo "<br>";

	echo "Data diurutkan dari Huruf A-Z : <br>";
	sort($nama);
	$i = 1;
	foreach ($nama as $value) {
		echo "$i. $value <br>";
		$i++;
	}

	echo "<br>";

	echo "Data diurutkan dari Huruf Z-A : <br>";
	rsort($nama);
	$i = 1;
	foreach ($nama as $value) {
		echo "$i. $value <br>";
		$i++;
	}
 ?>