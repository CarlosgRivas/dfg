
<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8"/>
	<title>mostrar PERSONAL</title>
	<link type="text/css" href="./../estilo.css" rel="stylesheet">

</head>

<body>
	<table>
		<tr>
			<th>Rut</th>
			<th>Nombre completo</th>
			<th>Email</th>
		</tr>
	
		<?php 
			require('sesion.php');
			require('./../conexion.php');

			$sql = 'SELECT rut, CONCAT(nombre, apellido) AS nombre_completo, email FROM users';
			$result = ($db->query($sql))->fetchAll(PDO::FETCH_ASSOC);

			
			foreach ( $result as $user ) {
				echo '<tr>';
				echo '<td>' . $user['rut'] . '</td>';
				echo '<td>' . $user['nombre_completo'] . '</td>';
				echo '<td>' . $user['email'] . '</td>';
				echo '</tr>';
			}
		?>
	</table>
</body>
</html>