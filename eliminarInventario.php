<?php
	include 'serv.php';
	if($_GET['id']){
		$sql = "Delete from inventario where id_producto=".$_GET["id"];
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			header("Location:inventario.php");
		}else{
			echo "Error ".mysqli_error($connection);
		}
	}
?>