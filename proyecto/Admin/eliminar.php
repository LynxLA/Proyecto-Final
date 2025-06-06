<?php
// eliminar.php

// Conexión a la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$db = "sistema";

$conn = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener teléfono del formulario
$phone = $_POST['phone'] ?? '';

if (!empty($phone)) {
    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE phone = ?");
    $stmt->bind_param("s", $phone);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "Usuario eliminado correctamente.";
        } else {
            echo "No se encontró ningún cliente con ese número de teléfono.";
        }
    } else {
        echo "Error al eliminar: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Teléfono no proporcionado.";
}

$conn->close();
?>