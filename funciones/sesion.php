<?php
    session_start();

    if ( ! $_SESSION['activo'] ) {
        session_destroy();
        header('Location: ./../formulario.php');
    }
?>