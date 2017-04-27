<?php
	include 'serv.php';
	$id = "";
	$nombre_cliente="";
	$apellido_cliente="";
	$edad_cliente ="";
	$rango_cliente="";
	
	
	if(isset($_POST['btn_editar'])){
		$sql = "Update clientes SET nombre = '".$_POST['txt_nombre']."',apellido='".$_POST['txt_apellido']."',edad='".$_POST['txt_edad']."',rango='".$_POST['op_rango']."' where id_cliente=".$_POST['txt_id'];
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			header("Location:clientes.php");
		}else{
			echo "Error ".mysqli_error($connection);
		}
	}
	
	if($_GET['id']){
		$sql = "Select * from clientes where id_cliente=".$_GET["id"];
		
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			$row = mysqli_fetch_assoc($resultado);
			$id = $row['id_cliente'];
			$nombre_cliente = $row['nombre'];
			$apellido_cliente = $row['apellido'];
			$edad_cliente = $row['edad'];
			$rango_cliente = $row['rango'];
		}
	}
?>
<html>
	<head>
		<?php include "navbar.php";?>
	</head>
	<body>
		<div class="container">
        <div style="width: 500px; margin: 50px auto;">
            <form method="post" action="" autocomplete="off">
                <center><h2>Editar Cliente</h2></center>
                <hr/>
                <div class="form-group">
					<label>Nombre</label>
                    <input type="text" placeholder="Ingrese el nombre del proveedor" value="<?=$nombre_cliente;?>" name="txt_nombre" class="form-control">
                </div>
				<div class="form-group">
					<label>Apellido</label>
                    <input type="text" placeholder="Ingrese el apellido del proveedor" value="<?=$apellido_cliente;?>" name="txt_apellido" class="form-control">
                </div>
				<div class="form-group">
					<label>Edad</label>
                    <input type="text" placeholder="Ingrese el producto del proveedor" value="<?=$edad_cliente;?>" name="txt_edad" class="form-control">
                </div>
				<div class="form-group">
					<label>Rango</label>
					<select name="op_rango" class="form-control">
						<option value="<?=$rango_cliente;?>"><?=$rango_cliente;?></option>
					</select>
                </div>
				<input type="hidden" name="txt_id" value="<?=$id?>">
                <div class="form-group">
                    <center><input type="submit" name="btn_editar" class="btn btn-success"></center>
                </div>
                <hr/>
            </form>
        </div>
    </div>
	</body>
</html>