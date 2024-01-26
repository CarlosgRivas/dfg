<?php
    include("conexion.php");

    /* Insertar
    $consulta = "INSERT INTO registros (rut, nombre, apellido, email, contraseña) VALUES 
    ('27466603K', 'Carlos', 'Rivas', 'cgrivasguevara@gmail.com', 'Salud100%'),
    ('27466620K', 'Domaurys', 'Guevara', 'cgrivasguevara@gmail.com', 'Salud100%');";
    $ejecutar = mysql_query($consulta, $conexion) or die('Error al insertar datos..');
    echo 'Datos Insertados</br>';
    echo $ejecutar;
    */

    /* Modificar
    $consulta = "UPDATE registros SET email = 'doma@gmail.com', contraseña = '123456789' WHERE rut = '27466620K';";
    $ejecutar = mysql_query($consulta, $conexion) or die('Error al modificar registro');
    echo 'Registro modificado!</br>';
    echo $ejecutar;
    */

    /* Eliminar
    $consulta = "DELETE FROM registros WHERE rut = 'sf';";
    $ejecutar = mysql_query($consulta, $conexion) or die('Error al eliminar registro');
    echo 'Registro eliminado!</br>';
    echo $ejecutar;
    */

    $consulta = "SELECT * FROM registros WHERE email LIKE '%@gmail%';";
    $ejecutar = mysql_query($consulta, $conexion) or die('Error al consultar..');
    echo 'Consulta exitosa</br>';
    while($usuario = mysql_fetch_array($ejecutar)){
        echo $usuario['rut'] . ' - ' . $usuario['nombre'] .' - '. $usuario['apellido'] . ' - '. $usuario['email'] .' - '. $usuario['contraseña'] . '</br>';
    }
?>