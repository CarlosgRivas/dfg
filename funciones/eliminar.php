<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>formulario eliminar PERSONAL</title>
	<link type="text/css" href="./../estilo.css" rel="stylesheet">

</head>

<body>
	<?php
	require('sesion.php');
	require('./../conexion.php');
	?>
	<table>
		<tr>
			<th>Rut</th>
			<th>Nombre completo</th>
			<th>Email</th>
		</tr>

		<?php

		$sql = 'SELECT rut, CONCAT(nombre, \' \', apellido) AS nombre_completo, email FROM users';
		$result = ($db->query($sql))->fetchAll(PDO::FETCH_ASSOC);


		if (! empty($result)) {
			foreach ($result as $user) {
				echo '<tr>';
				echo '<td>' . $user['rut'] . '</td>';
				echo '<td>' . $user['nombre_completo'] . '</td>';
				echo '<td>' . $user['email'] . '</td>';
				echo '</tr>';
			}
		}
		?>
	</table>
	<div><br><br>
		<p style="font-weight: bold">
			<?php
			if (isset($_GET['error'])) {
				if ($_GET['error'] == 'rut') {
					echo 'Rut no encontrado';
				}
			}
			?>
		</p>
		<form name="desuscribir" method="post" action="" enctype="application/x-www-form-urlencoded">
			<label name="elimina">Ingresa el Rut del registro eliminar:</label>
			<input name='rut' type="number">

			<input name='eliminar' type="submit" value="ELIMINAR">
		</form>
	</div>
	<?php

	if (isset($_POST['eliminar'])) {
		require('funcAux.php');
		if (! rutExist($db, $_POST['rut'])) {
			header('Location: eliminar.php?error=rut');
			exit();
		}

		$sql = 'DELETE FROM users WHERE rut= :rut';
		$query = $db->prepare($sql);
		$query->bindParam(':rut', $_POST['rut']);
		$query->execute() or die('No se puedo ejecutar la eliminación');
		header('Location: eliminar.php');
	}

	?>
</body>

</html>