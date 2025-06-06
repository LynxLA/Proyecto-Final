<?php
// Mostrar errores durante desarrollo
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos
$name = $_POST['name'] ?? '';
$phone = $_POST['phone'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// Validar contraseñas
if ($password !== $confirm_password) {
    echo "Error: Las contraseñas no coinciden.";
    exit;
}

// Encriptar contraseña
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

// Validar imagen
if (!isset($_FILES['image'])) {
    echo "Error: No se envió la imagen.";
    exit;
}

$image = $_FILES['image'];
$image_name = basename($image['name']);
$image_type = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
$allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
$upload_dir = "./archivos/";

// Validar tipo
if (!in_array($image_type, $allowed_types)) {
    echo "Error: Solo se permiten imágenes JPG, JPEG, PNG o GIF.";
    exit;
}

// Crear carpeta si no existe
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

$image_dest = $upload_dir . $image_name;
if (!move_uploaded_file($image['tmp_name'], $image_dest)) {
    echo "Error al subir la imagen.";
    exit;
}

// Insertar en la base de datos
$stmt = $conn->prepare("INSERT INTO usuario (contraseña, nombre, telefono, correo, imagen) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $password_hashed, $name, $phone, $email, $image_name);

if ($stmt->execute()) {
    echo "Usuario registrado correctamente.";
} else {
    echo "Error al registrar usuario: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
