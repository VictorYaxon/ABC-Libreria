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
			<center><h2>Bienvenido</h2></center>
			<p>
				¿En qué consiste?
			</p>
			<p>
				En la entrega de un set anual de útiles escolares, diferenciados por niveles educacionales pre básica, básica, media  y adulta.  A los y las estudiantes más vulnerables del país. Revisa aquí el contenido de los sets que se entregan por nivel.
			<p>
				¿Cuál es su finalidad?
			</p>	
				Contribuir a la permanencia en el sistema educacional en igualdad de condiciones, disminuyendo los gastos por concepto de compra de útiles escolares del grupo familiar,  Se encuentra dirigido a los estudiantes más vulnerables de establecimientos municipales y particular subvencionados.
			<p>
				¿Qué servicios entrega?
			</p>
				El programa entrega un set anual de útiles escolares, diferenciado por niveles; educación prebásica (set colectivo para 12 alumnos), básica primer ciclo (set Individual para 1° a 4° año básico), básica segundo ciclo A (set individual de 5° a 7° año básico), básica segundo ciclo B (set individual de  8° año básico), enseñanza media (set individual de 1° a 4° año medio)  y adulto. El cual estima una cobertura  a más de un millón setecientos treinta  y cuatro mil estudiantes en todas las regiones del país.
			<p>
				¿Cuándo se accede al programa?
			</p>
				Este programa no cuenta con un sistema de postulación ya que es un derecho que reciben todos los niños, niñas y jóvenes más vulnerables que pertenezcan al Sistema Nacional de Asignación con Equidad (SINAE) clasificados en las primeras prioridades.
			<p>
				¿Dónde se realiza la entrega de este beneficio?
			</p>	
				Directamente en los establecimientos educacionales Municipalizados y Particular Subvencionados.
			</p>
			<center><img class="alignleft wp-image-12197" src="https://www.junaeb.cl/wp-content/uploads/2014/12/bastian_agenda.jpg" alt="bastian_agenda" width="492" height="361"></center>
		<div>
	</body>
</html>
<?php
	}
	else{
	echo '<script> window.location="index.php"; </script>';
}
?>
<?php
	include 'footer.php';
?>

