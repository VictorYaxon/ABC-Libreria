<?php
	include 'serv.php';
	
	if(isset($_POST['btn_guardar'])){
		$sql = "Insert into proveedores(nombre_proveedor,apellido_proveedor,tipo_producto)values('".$_POST['txt_nombre']."','".$_POST['txt_apellido']."','".$_POST['txt_producto']."')";
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			header("Location:proveedores.php");
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
                <center><h2>Ingreso de Proveedores</h2></center>
                <hr/>
                <div class="form-group">
					<label>Nombre</label>
                    <input type="text" placeholder="Ingrese el nombre del proveedor" name="txt_nombre" class="form-control">
                </div>
				<div class="form-group">
					<label>Apellido</label>
                    <input type="text" placeholder="Ingrese el apellido del proveedor" name="txt_apellido" class="form-control">
                </div>
				<div class="form-group">
					<label>Producto</label>
                    <input type="text" placeholder="Ingrese el producto del proveedor" name="txt_producto" class="form-control">
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
