<?php
	include 'serv.php';
	
	if(isset($_POST['btn_guardar'])){
		$sql = "INSERT INTO clientes(nombre,apellido,edad,rango)values('".$_POST['txt_nombre']."','".$_POST['txt_apellido']."','".$_POST['txt_edad']."','".$_POST['txt_rango']."')";
		$resultado = mysqli_query($connection,$sql);
		if($resultado){
			header("Location:clientes.php");
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
                <center><h2>Ingreso de Clientes</h2></center>
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
					<label>Edad</label>
                    <input type="text" placeholder="Ingrese la edad del cliente" name="txt_edad" class="form-control">
                </div>
				<div class="form-group">
					<label>Rango</label>
                    <select name="txt_rango" class="form-control">
      					<option value="Maestro">Maestro</option>
						<option value="Alumno">Alumno</option>
					</select>
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
