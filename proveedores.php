<?php
	session_start();
	include 'serv.php';
	if(isset($_SESSION['user'])) {
?>
<html>
	<head>
		<?php include "navbar.php"; ?>
	</head>
	<body>
		<div class="container">
			<center><h2>Proveedores</h2></center>
			<table class="table table-hover">
				<thead>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>Producto</td>
						<td>Editar</td>
						<td>Eliminar</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "Select * From proveedores";
						$resultado = mysqli_query($connection,$sql);
						if(mysqli_num_rows($resultado)>0){
							while($row=mysqli_fetch_assoc($resultado)){
								
							?>		
							<tr>
								<td><?php echo $row['idProveedor']?></td>
								<td><?php echo $row['nombre_proveedor']?></td>
								<td><?php echo $row['apellido_proveedor']?></td>
								<td><?php echo $row['tipo_producto']?></td>
								<td><a href="editarProveedores.php?id=<?=$row['idProveedor'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
								
								<td><a href="eliminarProveedores.php?id=<?=$row['idProveedor'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
								
							</tr>
							<?php
							}
						}
					?>	
				</tbody>
			</table>
		<div>
		<a href="guardarProveedores.php" class="btn btn-success">Agregar</a>
	</body>
</html>
<?php
}else{
	echo '<script> window.location="index.php"; </script>';
}
?>