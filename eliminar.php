<?php
include ('sesion.php');
?>

<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8"/>
	<title>formulario eliminar PERSONAL</title>
	<link type="text/css" href="estilo.css" rel="stylesheet">

</head>

<body>
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
    <div><br><br>
		<form action="" method="post" align='center'>
		 	<label name="elimina">Ingresa el Rut del registro eliminar:</label>
		 	<input name='eliminar-registro' type="text">
		 	<input name='eliminar' type="submit" value="ELIMINAR">
		</form>

		<?php
            if (isset($_GET['error'])) {
            	if($_GET['error'] == 'si'){
            	    echo '<p align="center" style="color:red; font-weight:bold; font-size:1.5em;">RUT no encontrado</p>';
            	}
			}
        ?>

		<?php
			require ('conexion.php');
			if(isset($_POST['eliminar'])) {
				$rut = $_POST['eliminar-registro'];
				$consulta = "SELECT * FROM registros WHERE rut='{$rut}'";
				$ejecutar = mysql_query($consulta, $conexion) or die('Problemas al buscar registro </br>' . mysql_errno($conexion) . ": " . mysql_error($conexion));
				if(mysql_num_rows($ejecutar) == 0) {
					header("Location:eliminar.php?error=si");
				} else {
					$consulta = "DELETE FROM registros WHERE rut='{$rut}'";
					$ejecutar = mysql_query($consulta, $conexion) or die('Problemas al eliminar registro </br>' . mysql_errno($conexion) . ": " . mysql_error($conexion));
					header("Location:eliminar.php");
				}
				
			}
		?>	    	
	</div>
</body>
</html>		 