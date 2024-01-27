<?php 
    if ($_GET['salir'] == 'si') {
        session_start();
        session_destroy();
        header('Location:formulario.php');
    }
?>