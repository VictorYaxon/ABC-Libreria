<?php
	include 'serv.php';
	$id = "";
	$nombre_proveedor="";
	$apellido_proveedor="";
	$tipo_producto="";
	$consulta="Select idProveedor,nombre_proveedor,apellido_proveedor from proveedores";
	$result1 = mysqli_query($connection,$consulta);
	
	if(isset($_POST['btn_editar'])){
		$sql = "Update proveedores SET nombre_proveedor = '".$_POST['txt_nombre']."',apellido_proveedor='".$_POST['txt_apellido']."',tipo_producto='".$_POST['txt_tipo']."' where idProveedor=".$_POST['txt_id'];
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			header("Location:proveedores.php");
		}else{
			echo "Error ".mysqli_error($connection);
		}
	}
	
	if($_GET['id']){
		$sql = "Select * from proveedores where idProveedor=".$_GET["id"];
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			$row = mysqli_fetch_assoc($resultado);
			$id = $row['idProveedor'];
			$nombre_proveedor = $row['nombre_proveedor'];
			$apellido_proveedor = $row['apellido_proveedor'];
			$tipo_producto = $row['tipo_producto'];
		}
	}
?>
<html>
	<head>
		<?php include "navbar.php";?>
	</head>
	<body>
		<div class="container">
			<div style="width:500px; margin:50px auto;">
				<form action="" method="post">
					<div class="form-group">
						<center><h2>Editar Proveedor<h2></center>
						<hr/>
						<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="txt_nombre" value="<?=$nombre_proveedor;?>" class="form-control">
						<div/>
						<div class="form-group">
						<label>Apellido</label>
						<input type="text" name="txt_apellido" value="<?=$apellido_proveedor;?>" class="form-control">
						<div/>
						<div class="form-group">
						<label>Producto</label>
						<input type="text" name="txt_tipo" value="<?=$tipo_producto;?>" class="form-control">
						<div/>			
						<input type="hidden" name="txt_id" value="<?=$id?>">
						<hr/>
					</div>
					<div class="form-group">
						<center><input type="submit" name="btn_editar" class="btn btn-success"></center>
						<hr/>
					</div>
			</form>
		</div>
	</body>
</html>