<?php
    require('conexion.php');
    if ( $_POST['rut'] == 0 ) {
        header('Location: formulario.php ?error_R=user');
        exit();
    }

    if( $_POST['contrasena1'] == $_POST['contrasena2'] ){
        $pass = hash('md5',$_POST['contrasena1']);
        echo $_POST['contrasena1'] . ' ---> ' . $pass;

        $sql = 'INSERT INTO users (rut, nombre, apellido, email, pass) VALUES (:rut, :nombre, :apellido, :email, :pass)';

        $query = $db->prepare($sql);
        $query->bindParam(':rut', $_POST['rut']);
        $query->bindParam(':nombre', $_POST['nombre']);
        $query->bindParam(':apellido', $_POST['apellido']);
        $query->bindParam(':email', $_POST['email']);
        $query->bindParam(':pass', $pass);
        if ( $query->execute() ) {
            header('Location: formulario.php ?error_R=no');
        } else {
            header('Location: formulario.php ?error_R=query');
        }
    } else {
        header('Location: formulario.php ?error_R=pass');
    }
?>