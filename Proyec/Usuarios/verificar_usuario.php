<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$email = $_POST['email'] ?? '';
$password_input = $_POST['password'] ?? '';

// Buscar usuario por correo
$stmt = $conn->prepare("SELECT contraseña, name FROM usuario WHERE correo = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($password_hash, $name);
    $stmt->fetch();

    if (password_verify($password_input, $password_hash)) {
        echo "Bienvenido, $name.";
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Correo no registrado.";
}

$stmt->close();
$conn->close();
?>
