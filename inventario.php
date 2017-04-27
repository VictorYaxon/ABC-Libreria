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
			<center><h2>Inventario</h2></center>
			<table class="table table-hover">
				<thead>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<td>Marca</td>
						<td>Precio</td>
						<td>Proveedor</td>
						<td>Cantidad</td>
						<td>Editar</td>
						<td>Eliminar</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT i.id_producto,i.producto_nombre,i.marca,i.precio_producto,CONCAT(p.nombre_proveedor,' ',p.apellido_proveedor)AS nombre_proveedor,
								i.cantidad_producto FROM inventario AS i INNER JOIN proveedores AS p ON p.idProveedor=i.id_proveedor";
								
						$resultado = mysqli_query($connection,$sql);
						if(mysqli_num_rows($resultado)>0){
							while($row=mysqli_fetch_assoc($resultado)){
								
							?>		
							<tr>
								<td><?php echo $row['id_producto']?></td>
								<td><?php echo $row['producto_nombre']?></td>
								<td><?php echo $row['marca']?></td>
								<td><?php echo $row['precio_producto']?></td>
								<td><?php echo $row['nombre_proveedor']?></td>
								<td><?php echo $row['cantidad_producto']?></td>
								<td><a href="editarInventario.php?id=<?=$row['id_producto'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
								
								<td><a href="eliminarInventario.php?id=<?=$row['id_producto'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
								
							</tr>
							<?php
							}
						}
					?>	
				</tbody>
			</table>
		<div>
		<a href="guardarInventario.php" class="btn btn-success">Agregar</a>
	</body>
</html>
<?php
}else{
	echo '<script> window.location="index.php"; </script>';
}
?>