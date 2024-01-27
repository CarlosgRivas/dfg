<?php
    $conexion = mysql_connect("localhost","root","") or die('Error de conexion</br>');
    mysql_set_charset('utf8');
    $db = mysql_select_db('registro_usuarios', $conexion) or die('DB no encontrada..');
?>