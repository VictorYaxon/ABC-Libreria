<?php
	include 'serv.php';
	if($_GET['id']){
		$sql = "Delete from proveedores where idProveedor=".$_GET["id"];
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			header("Location:proveedores.php");
		}else{
			echo "Error ".mysqli_error($connection);
		}
	}
?>