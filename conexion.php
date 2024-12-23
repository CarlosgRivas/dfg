<?php
    try{
        $db = new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');
    } catch (PDOException $error) {
        die('La conexión ha fallado: ' . $error->getMessage());
    }
?>