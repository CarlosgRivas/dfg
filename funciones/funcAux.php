<?php

// Verifica si existe el usuario
function rutExist($db, $rut)
{
    $sql = 'SELECT rut FROM users WHERE rut= :rut';
    $query = $db->prepare($sql);
    $query->bindParam(':rut', $rut);
    $query->execute() or die('Error al conectar con DB');
    if (empty($query->fetchAll())) {
        return false;
    } else {
        return true;
    }
}
