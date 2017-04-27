<?php
	include 'serv.php';
	$id = "";
	$nombre_proveedor="";
	$apellido_proveedor="";
	$tipo_producto="";
	
	
	if(isset($_POST['btn_editar'])){
		$sql = "Update ventas SET id_producto = '".$_POST['op_producto']."',cantidad='".$_POST['txt_cantidad']."',id_cliente='".$_POST['op_cliente']."' where id_venta=".$_POST['txt_id'];
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			header("Location:ventas.php");
		}else{
			echo "Error ".mysqli_error($connection);
		}
	}
	
	if($_GET['id']){
		$sql = "SELECT id_venta,id_producto,cantidad,id_cliente FROM ventas WHERE id_venta=".$_GET["id"];
		
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			$row = mysqli_fetch_assoc($resultado);
			$id = $row['id_venta'];
			$producto_id = $row['id_producto'];
			$cantidad = $row['cantidad'];
			$id_cliente = $row['id_cliente'];
			$consulta="SELECT id_producto,producto_nombre,marca,precio_producto,id_proveedor,cantidad_producto FROM inventario WHERE id_producto=".$producto_id;
			$result1 = mysqli_query($connection,$consulta);
			$consulta_cliente="SELECT id_cliente,nombre,apellido,edad,rango FROM clientes WHERE id_cliente=".$id_cliente;
			$result_cliente = mysqli_query($connection,$consulta_cliente);
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
                <center><h2>Editar una venta</h2></center>
                <hr/>
				<div class="form-group">
					<label>Producto</label>
					<select name="op_producto"  class="form-control">
						<?php while($row1 = mysqli_fetch_array($result1)):;?>
							<option value="<?php echo $row1["id_producto"];?>"><?php echo $row1["producto_nombre"];?></option>
							<?php endwhile;?>
					</select>
                </div>
				<div class="form-group">
					<label>Cliente</label>
					<select name="op_cliente"  class="form-control">
						<?php while($row1 = mysqli_fetch_array($result_cliente)):;?>
							<option value="<?php echo $row1["id_cliente"];?>"><?php echo $row1["nombre"];?><?php echo " "?><?php echo $row1["apellido"];?></option>
							<?php endwhile;?>
					</select>
                </div>
				<input type="hidden" name="txt_id" value="<?=$id?>">
				<div class="form-group">
					<label>Cantidad</label>
                    <input type="text" placeholder="Ingrese el producto del proveedor" value="<?=$cantidad;?>" name="txt_cantidad" class="form-control">
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