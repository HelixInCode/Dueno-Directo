<?php

$host = "localhost";
$usuario = "root";
$contraseña = "";
$db = "dueno-directo";

try {
    $pdo = new PDO('mysql:host='. $host .';dbname='. $db .';charset=utf8', $usuario, $contraseña);
    
    // echo 'Conectado con PDO';
    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>