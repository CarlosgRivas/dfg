<?php
require ('sesion.php');
?>

<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8"/>
	<title>formulario mostrar PERSONAL</title>
	<link type="text/css" href="estilo.css" rel="stylesheet">

</head>

<body>
	<p>Bienvenido: <?php echo $_SESSION['usuario'];?><br/></p>
	<a href="salir.php?salir=si">CERRAR SESIÓN</a>
	<h1 align="center">Registros existentes</h1>
	<br><br>
	<?php
		require ('conexion.php');
		$consulta = "SELECT * FROM registros";
		$ejecutar = mysql_query($consulta, $conexion) or die('Problemas al buscar info </br>' . mysql_errno($conexion) . ": " . mysql_error($conexion));
		echo '<table><tr><th>Rut</th><th>Nombre</th><th>Apellido</th><th>Email</th></tr>';
		while ($user = mysql_fetch_array($ejecutar)) {
			echo '<tr>';
			echo "<td>{$user['rut']}</td>";
			echo "<td>{$user['nombre']}</td>";
			echo "<td>{$user['apellido']}</td>";
			echo "<td>{$user['email']}</td>";
			echo '</tr>';
		}
		echo '</table>';
	?>

</body>
</html>