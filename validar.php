<?php

    function user(){
        switch($_POST['usuario']) {
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

    $sql = 'SELECT pass FROM users WHERE rut = :rut';

    $query = $db->prepare($sql);
    $query->bindParam(':rut', $_POST['usuario']);

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
            user();
        } else {
            header('Location: formulario.php ?error_V=pass');
        }
    }
?>