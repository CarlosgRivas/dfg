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
    $consulta = "SELECT * FROM registros WHERE rut = '{$usuario}';";
    $ejecutar = mysql_query($consulta, $conexion) or die('Usuario no encontrado');
    $user = mysql_fetch_array($ejecutar);
    print_r($user);
    // Confirmar si la pass ingresada coincide con la contraseña de usuario

?>