<?php
	include 'serv.php';
	$proveedores = "";
	$consulta="Select id_producto,producto_nombre,marca,precio_producto,id_proveedor from inventario";
	$result1 = mysqli_query($connection,$consulta);
	$consulta_clientes="Select id_cliente,nombre,apellido,edad,rango from clientes";
	$resultado_clientes= mysqli_query($connection,$consulta_clientes);;
	if(isset($_POST['btn_guardar'])){
		$sql = "INSERT INTO ventas(id_producto,id_cliente,cantidad)Values('".$_POST['op_proveedor']."','".$_POST['op_clientes']."','".$_POST['txt_cantidad']."')";
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			header("Location:ventas.php");
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
                <center><h2>Ingreso de venta nueva</h2></center>
                <hr/>
                <div class="form-group">
					<label>Productos</label>
					<select name="op_proveedor" class="form-control">
						<?php while($row1 = mysqli_fetch_array($result1)):;?>
							<option value="<?php echo $row1["id_producto"];?>"><?php echo $row1["producto_nombre"];?></option>
						<?php endwhile;?>
					</select>
                </div>
				<div class="form-group">
					<label>Clientes</label>
					<select name="op_clientes" class="form-control">
						<?php while($row_cliente = mysqli_fetch_array($resultado_clientes)):;?>
							<option value="<?php echo $row_cliente["id_cliente"];?>"><?php echo $row_cliente["nombre"];?><?php echo " ";?><?php echo $row_cliente["apellido"];?></option>
						<?php endwhile;?>
					</select>
                </div>
				<div class="form-group">
					<label>Cantidad</label>
					<input type="text" placeholder="Ingrese la cantidad vendida" name="txt_cantidad" class="form-control">
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

