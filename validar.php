<?php
    include("conexion.php");

    /* $ok = json_encode($_POST);
    echo "<script>console.log({$ok});</script>"; */

    foreach ($_POST as $key => $value) {
        if ($key != "ingresar") {
            $$key = $value;
        }
    }
    $pass = md5($pass);
    /* $variables = get_defined_vars();
    print_r($variables);
    echo '</br>';
    echo "{$usuario} - {$pass} </br>"; */

    // Validación
    // Buscar Usuario por rut (primary key)
    $consulta = "SELECT * FROM registros WHERE rut = '{$usuario}' AND contraseña = '{$pass}';";
    $ejecutar = mysqli_query($conexion, $consulta) or die('Usuario no encontrado');
    $user = mysqli_fetch_array($ejecutar);
    // Confirmar si la pass ingresada coincide con la contraseña de usuario
    if ($user != false){
        session_start();
        $_SESSION['usuario'] = $user['rut'];
        $_SESSION['activo'] = true;
        
        if ($user['rut'] == 'k') {
            header('Location:modificar.php');
        }

    } else {
        header('Location:formulario.php?error=si');
    }

?>