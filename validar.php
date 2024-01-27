<?php
    include("conexion.php");

    $ok = json_encode($_POST);
    echo "<script>console.log({$ok});</script>";

    foreach ($_POST as $key => $value) {
        if ($key != "ingresar") {
            $$key = $value;
        }
    }
    $variables = get_defined_vars();
    print_r($variables);
    echo '</br>';
    echo "{$usuario} - {$pass} </br>";

    // Validación
    // Buscar Usuario por rut (primary key)
    $consulta = "SELECT * FROM registros WHERE rut = '{$usuario}' AND contraseña = '{$pass}';";
    $ejecutar = mysql_query($consulta, $conexion) or die('Usuario no encontrado');
    $user = mysql_fetch_array($ejecutar);
    // Confirmar si la pass ingresada coincide con la contraseña de usuario
    if ($user != false){
        echo 'Usuario encontrado</br>';
        echo 'Contraseña coincide</br>';
        print_r($user);

    } else {
        header('Location:formulario.php?error=si');
    }

?>