<?php

    function user($user){
        $_SESSION['activo'] = true;
        $_SESSION['usuario'] = $user;

        switch($user) {
            case "1212":
                header('Location: ./funciones/mostrar.php');
                exit();
            case "123":
                header('Location: ./funciones/modificar.php');
                exit();
            case "321":
                header('Location: ./funciones/eliminar.php');
                exit();
            
        }
    }




    require('conexion.php');

    $usuario = $_POST['usuario'];

    $sql = 'SELECT pass FROM users WHERE rut = :rut';

    $query = $db->prepare($sql);
    $query->bindParam(':rut', $usuario);

    if ( ! $query->execute() ) {
        header('Location: formulario.php ?error_V=query');
        exit();
    }
    $result = $query->fetch();

    if ( empty($result) ) {
        header('Location: formulario.php ?error_V=user');
    } else {
        $pass = hash('md5', $_POST['pass']);
        
        if ( $pass == $result['pass'] ){
            user($usuario);
        } else {
            header('Location: formulario.php ?error_V=pass');
        }
    }
?>