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
    <br><br>

	<div class="encabezado">
        <h1>Modificar registro</h1>
        <p>Si no desea modificar algun campo simplemente dejarlo vacio</p>
    </div>

    <div class="formulario">
        <form method="post" action="" enctype="application/x-www-form-urlencoded">
            <div class="campo">
                <label name="Seleccionar">Ingresa el Rut del registro a modificar:</label>
		 		<input name='seleccionar' type="text" required>
            </div>

            <div class="campo">
                <label for="rut">RUT:</label>
                <input type="text" name="rut" />
            </div>

            <div class="campo">
                <div class="en-linea izquierdo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" />
                </div>

                <div class="en-linea">
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" />
                </div>
            </div>

            <div class="campo">
                <label for="email">Correo electrónico:</label>
                <input type="email" name="email" />
            </div>

            <div class="botones">
                <input type="submit" name="modificar" value="Modificar"/>
			</div>
		</form>
        <p></p>
        <?php 
            if (isset($_GET['alerta'])) {
                if ($_GET['alerta'] == 'rutError') {
                    echo '<p align="center" style="color:red; font-weight:bold; font-size:1.5em;">RUT no encontrado</p>';
                } elseif ($_GET['alerta'] == 'vacio') {
                    echo '<p align="center" style="color:red; font-weight:bold; font-size:1.5em;">Sin cambios</p>';
                }
            }
        ?>
	</div>

    <?php 
        if (isset($_POST['modificar'])) {
            require ('conexion.php');
			$rut = $_POST['seleccionar'];
			$consulta = "SELECT * FROM registros WHERE rut='{$rut}'";
			$ejecutar = mysql_query($consulta, $conexion) or die('Problemas al buscar registro </br>' . mysql_errno($conexion) . ": " . mysql_error($conexion));
			if(mysql_num_rows($ejecutar) == 0) {
				header("Location:modificar.php?alerta=rutError");
			} else {
                unset($_POST['modificar']);
                $cambios = "";

                foreach ($_POST as $key => $value) {
                    if ($value != '' && $key != 'seleccionar') {
                        $cambios .= "{$key} = '{$value}', ";
                    }
                }
                $cambios = substr($cambios, 0, -2);

                if (! empty($cambios) ) {
                    $consulta = "UPDATE registros SET " . $cambios . " WHERE rut='{$_POST['seleccionar']}'";
                    $ejecutar = mysql_query($consulta, $conexion) or die('Problemas al modificar registro </br>' . mysql_errno($conexion) . ": " . mysql_error($conexion));
                    header("Location:modificar.php");
                } else {
                    header("Location:modificar.php?alerta=vacio");
                }
			}
            
        }
    ?>
</body>
</html>		