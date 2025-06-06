<?php
$host = 'localhost';
$usuario = 'root'; // Cambiar con tu usuario
$contraseña = ''; // Cambiar con tu contraseña si es necesario
$base_de_datos = 'sistema';

$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>