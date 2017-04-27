<?php
	include 'serv.php';
	$id = "";
	$nombre_proveedor="";
	$apellido_proveedor="";
	$tipo_producto="";
	
	
	if(isset($_POST['btn_editar'])){
		$sql = "Update inventario SET producto_nombre = '".$_POST['txt_nombre']."',marca='".$_POST['txt_marca']."',precio_producto='".$_POST['txt_precio']."',id_proveedor='".$_POST['op_proveedor']."',cantidad_producto='".$_POST['txt_cantidad']."' where id_producto=".$_POST['txt_id'];
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			header("Location:inventario.php");
		}else{
			echo "Error ".mysqli_error($connection);
		}
	}
	
	if($_GET['id']){
		$sql = "Select * from inventario where id_producto=".$_GET["id"];
		
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			$row = mysqli_fetch_assoc($resultado);
			$id = $row['id_producto'];
			$producto_nombre = $row['producto_nombre'];
			$marca = $row['marca'];
			$precio_producto = $row['precio_producto'];
			$id_proveedor = $row['id_proveedor'];
			$consulta="Select idProveedor,nombre_proveedor,apellido_proveedor from proveedores where idProveedor =".$id_proveedor;
			$result1 = mysqli_query($connection,$consulta);
			$cantidad_producto = $row['cantidad_producto'];
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
                <center><h2>Editar producto</h2></center>
                <hr/>
                <div class="form-group">
					<label>Nombre</label>
                    <input type="text" placeholder="Ingrese el nombre del proveedor" value="<?=$producto_nombre;?>" name="txt_nombre" class="form-control">
                </div>
				<div class="form-group">
					<label>Marca</label>
                    <input type="text" placeholder="Ingrese el apellido del proveedor" value="<?=$marca;?>" name="txt_marca" class="form-control">
                </div>
				<div class="form-group">
					<label>Precio</label>
                    <input type="text" placeholder="Ingrese el producto del proveedor" value="<?=$precio_producto;?>" name="txt_precio" class="form-control">
                </div>
				<div class="form-group">
					<label>Proveedor</label>
					<select name="op_proveedor" value="<?=$nombre_proveedor;?>" class="form-control">
						<?php while($row1 = mysqli_fetch_array($result1)):;?>
							<option value="<?php echo $row1["idProveedor"];?>"><?php echo $row1["nombre_proveedor"];?><?php echo " "?><?php echo $row1["apellido_proveedor"];?></option>
							<?php endwhile;?>
					</select>
                </div>
				<input type="hidden" name="txt_id" value="<?=$id?>">
				<div class="form-group">
					<label>Cantidad</label>
                    <input type="text" placeholder="Ingrese el producto del proveedor" value="<?=$cantidad_producto;?>" name="txt_cantidad" class="form-control">
                </div>
                <div class="form-group">
                    <center><input type="submit" name="btn_editar" class="btn btn-success"></center>
                </div>
                <hr/>
            </form>
        </div>
    </div>
	</body>
</html>