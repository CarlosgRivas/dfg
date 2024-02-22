<?php
    $conexion = mysqli_connect("192.168.2.102:3306","root","root") or die('Error de conexion</br>');
    mysqli_set_charset($conexion, 'utf8');
    $db = mysqli_select_db($conexion, 'registro_usuarios') or die('DB no encontrada..');
?>