<?php 
    require('conexion.php');

    $pass = md5($_POST['contrasena1']);

    if( $_POST['contrasena1'] == $_POST['contrasena2']) {
        $consulta = "INSERT INTO registros (rut, nombre, apellido, email, contraseña) VALUES ('{$_POST['rut']}', '{$_POST['nombre']}', '{$_POST['apellido']}', '{$_POST['email']}', '{$pass}');";
        $ejecutar = mysql_query($consulta, $conexion) or die('No se pudo crear el registro :( </br>' . mysql_errno($conexion) . ": " . mysql_error($conexion));
        header("Location:formulario.php?valido=si");
        die();
    } else {
        header("Location:formulario.php?passError=si");
    }
    
?>