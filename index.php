<?php
	session_start();
	include 'serv.php';
	include 'navbar.php';
	if(isset($_SESSION['user'])){
	echo '<script> window.location="bienvenida.php"; </script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8">
</head>
<body background="fondo.jpg">
	<center><h1 class="h1" style="color:rgba(125, 124, 124, 0.76)">Login</h1></center>
	<form method="post" action="validar.php" >
		<div class="container">
			<div style="width:500px; margin:50px auto;">
		<hr/>
		<label style="color:white">Username </label>	
		<input style="background-color:rgba(234, 234, 234, 0.60); color:#312525 " type="text" class="form-control" name="user" autocomplete="off" required><br><br>
		<label style="color:white">Password</label>	
		<input style="background-color:rgba(234, 234, 234, 0.38) " type="password" class="form-control" name="pw" autocomplete="off" required><br><br>
		<hr/>
		<input type="submit" class="btn btn-success" name="login" value="Entrar">
			</div>
		</div>
	</form>
</body>
</html>
