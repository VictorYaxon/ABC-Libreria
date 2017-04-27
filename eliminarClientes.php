<?php
	include 'serv.php';
	if($_GET['id']){
		$sql = "Delete from clientes where id_cliente=".$_GET["id"];
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			header("Location:clientes.php");
		}else{
			echo "Error ".mysqli_error($connection);
		}
	}
?>