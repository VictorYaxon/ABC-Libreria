<?php
	include 'serv.php';
	$proveedores = "";
	$consulta="Select idProveedor,nombre_proveedor,apellido_proveedor from proveedores";
	$result1 = mysqli_query($connection,$consulta);
	if(isset($_POST['btn_guardar'])){
		$sql = "INSERT INTO inventario(producto_nombre,marca,precio_producto,id_proveedor,cantidad_producto) VALUES('".$_POST['txt_nombre']."','".$_POST['txt_marca']."','".$_POST['txt_precio']."','".$_POST['op_proveedor']."','".$_POST['txt_cantidad']."')";
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			header("Location:inventario.php");
		}else{
			echo "Error ".mysqli_error($connection);
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
                <center><h2>Ingreso de producto nuevo</h2></center>
                <hr/>
                <div class="form-group">
					<label>Nombre</label>
                    <input type="text" placeholder="Ingrese el nombre del proveedor" name="txt_nombre" class="form-control">
                </div>
				<div class="form-group">
					<label>Marca</label>
                    <input type="text" placeholder="Ingrese el apellido del proveedor" name="txt_marca" class="form-control">
                </div>
				<div class="form-group">
					<label>Precio</label>
                    <input type="text" placeholder="Ingrese el producto del proveedor" name="txt_precio" class="form-control">
                </div>
				<div class="form-group">
					<label>Proveedor</label>
					<select name="op_proveedor" class="form-control">
						<?php while($row1 = mysqli_fetch_array($result1)):;?>
							<option value="<?php echo $row1["idProveedor"];?>"><?php echo $row1["nombre_proveedor"];?><?php echo " "?><?php echo $row1["apellido_proveedor"];?></option>
						<?php endwhile;?>
					</select>
                </div>
				<div class="form-group">
					<label>Cantidad</label>
                    <input type="text" placeholder="Ingrese el producto del proveedor" name="txt_cantidad" class="form-control">
                </div>
                <div class="form-group">
                    <center><input type="submit" name="btn_guardar" class="btn btn-success"></center>
                </div>
                <hr/>
            </form>
        </div>
    </div>
	</body>
</html>

