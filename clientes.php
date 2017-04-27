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
			<center><h2>Clientes</h2></center>
			<table class="table table-hover">
				<thead>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<td>Apellido</td>
						<td>Edad</td>
						<td>Rango</td>
						<td>Editar</td>
						<td>Eliminar</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT * from clientes";
								
						$resultado = mysqli_query($connection,$sql);
						if(mysqli_num_rows($resultado)>0){
							while($row=mysqli_fetch_assoc($resultado)){
								
							?>		
							<tr>
								<td><?php echo $row['id_cliente']?></td>
								<td><?php echo $row['nombre']?></td>
								<td><?php echo $row['apellido']?></td>
								<td><?php echo $row['edad']?></td>
								<td><?php echo $row['rango']?></td>
								<td><a href="editarClientes.php?id=<?=$row['id_cliente'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
								
								<td><a href="eliminarClientes.php?id=<?=$row['id_cliente'];?>"><span class="glyphicon glyphicon-trash"></span></a></td>
								
							</tr>
							<?php
							}
						}
					?>	
				</tbody>
			</table>
		<div>
		<a href="guardarClientes.php" class="btn btn-success">Agregar</a>
	</body>
</html>
<?php
}else{
	echo '<script> window.location="index.php"; </script>';
}
?>