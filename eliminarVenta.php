<?php
	include 'serv.php';
	if($_GET['id']){
		$sql = "Delete from ventas where id_venta=".$_GET["id"];
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			header("Location:ventas.php");
		}else{
			echo "Error ".mysqli_error($connection);
		}
	}
?>