<?php
// Configuración de la base de datos
$host = "localhost";
$usuario = "root";
$clave = "";
$bd = "sistema";

// Crear conexión
$conn = new mysqli($host, $usuario, $clave, $bd);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener teléfono desde el formulario
$telefono = $_POST['telefono'] ?? '';

if (!empty($telefono)) {
    // Preparar la consulta
    $sql = "SELECT nombre, direccion, email FROM usuarios WHERE telefono = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $telefono);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($nombre, $direccion, $email);
        $stmt->fetch();

        echo "<h2>Datos del usuario</h2>";
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Direccion:</strong> $direccion</p>";
        echo "<p><strong>Email:</strong> $email</p>";
    } else {
        echo "No se encontró ningún usuario con ese número de teléfono.";
    }

    $stmt->close();
} else {
    echo "Número de teléfono no proporcionado.";
}

$conn->close();
?>
