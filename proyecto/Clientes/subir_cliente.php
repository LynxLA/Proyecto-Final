<?php
// Configuración de conexión
$host = 'localhost';
$db   = 'sistema';
$user = 'root';
$password = '';
$charset = 'utf8mb4';

// Conexión con PDO
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}

// Obtener datos del formulario
$nombre = $_POST['nombre'] ?? '';
$telefono = $_POST['telefono'] ?? '';
$correo = $_POST['correo'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$contraseña = $_POST['contraseña'] ?? '';
$confirmar = $_POST['confirmar_contraseña'] ?? '';

// Validar que las contraseñas coincidan
if ($contraseña !== $confirmar) {
    echo "Error: Las contraseñas no coinciden.";
    exit;
}

// Encriptar contraseña
$hash = password_hash($contraseña, PASSWORD_DEFAULT);

// Subir imagen si se proporciona
$imagenRuta = '';
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
    $nombreArchivo = basename($_FILES["imagen"]["name"]);
    $rutaDestino = "./archivos/" . $nombreArchivo;

    // Asegúrate de que la carpeta "uploads" exista
    if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaDestino)) {
        echo "Error al subir la imagen.";
        exit;
    }
    $imagenRuta = $rutaDestino;
}

// Insertar en la base de datos
$sql = "INSERT INTO clientes (nombre, telefono, correo, direccion, contraseña, imagen)
        VALUES (:nombre, :telefono, :correo, :direccion, :contraseña, :imagen)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        'nombre' => $nombre,
        'telefono' => $telefono,
        'correo' => $correo,
        'direccion' => $direccion,
        'contraseña' => $hash,
        'imagen' => $imagenRuta
    ]);

    echo "Registro exitoso.";
} catch (PDOException $e) {
    echo "Error al guardar en la base de datos: " . $e->getMessage();
}
?>
