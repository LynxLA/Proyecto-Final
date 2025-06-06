<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

// Conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos
$correo = $_POST['correo'] ?? '';
$contraseña = $_POST['contraseña'] ?? '';

// Verificar existencia del usuario
$stmt = $conn->prepare("SELECT contraseña, nombre FROM cliente WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($hash, $nombre);
    $stmt->fetch();

    if (password_verify($contraseña, $hash)) {
        echo "Bienvenido, $nombre.";
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Correo no registrado.";
}

$stmt->close();
$conn->close();
?>

