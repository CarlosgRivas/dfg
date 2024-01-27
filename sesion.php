<?php 
    session_start();
    if ($_SESSION['activo'] != true) {
        header('Location:salir.php?salir=si');
    }
?>