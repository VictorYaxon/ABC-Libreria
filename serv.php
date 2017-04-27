<?php
	$server_name="localhost";
	$username="sergio";
	$password="30631638";
	$db="libreria";
	
	$connection = mysqli_connect($server_name,$username,$password,$db);
	
	if(!$connection){
		echo "error amigo no funciono ".mysqli_connect_error($connection);
	}else{
		//echo "Felicidades conecto a la primera xD";
	}
?>