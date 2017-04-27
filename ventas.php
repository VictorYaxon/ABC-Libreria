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
			<center><h2>Ventas</h2></center>
			<a href="guardarVenta.php" class="btn btn-success">Agregar</a>
			<hr/>
			<table class="table table-hover">
				<thead>
					<tr>
						<td>ID</td>
						<td>Producto</td>
						<td>Marca</td>
						<td>Cantidad</td>
						<td>Precio</td>
						<td>Cliente</td>
						<td>Total</td>
						<td>Editar</td>
						<td>Eliminar</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT ventas.id_venta as id_venta,inventario.`producto_nombre`,inventario.`marca`,ventas.`cantidad`,
								inventario.`precio_producto`,CONCAT(clientes.`nombre`,' ',clientes.`apellido`)AS Nombre_cliente,
								(ventas.`cantidad`*inventario.`precio_producto`)AS total FROM ventas INNER JOIN 
								inventario ON ventas.`id_producto`=inventario.`id_producto` INNER JOIN 
								clientes ON ventas.id_cliente = clientes.id_cliente ORDER BY id_venta 
								";
								
						$resultado = mysqli_query($connection,$sql);
						if(mysqli_num_rows($resultado)>0){
							while($row=mysqli_fetch_assoc($resultado)){
								
							?>		
							<tr>
								<td><?php echo $row['id_venta']?></td>
								<td><?php echo $row['producto_nombre']?></td>
								<td><?php echo $row['marca']?></td>
								<td><?php echo $row['cantidad']?></td>
								<td><?php echo $row['precio_producto']?></td>
								<td><?php echo $row['Nombre_cliente']?></td>
								<td><?php echo $row['total']?></td>
								<td><a href="editarVenta.php?id=<?=$row['id_venta'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
								
								<td><a href="eliminarVenta.php?id=<?=$row['id_venta'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
								
							</tr>
							<?php
							}
						}
					?>	
				</tbody>
			</table>
		<div>
	</body>
</html>
<?php
}else{
	echo '<script> window.location="index.php"; </script>';
}
?>