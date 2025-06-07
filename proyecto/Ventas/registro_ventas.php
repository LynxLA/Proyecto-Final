<?php
// Configuración de la base de datos
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "sistema";

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario (POST)
$id_comprador = $_POST['id_comprador'];
$id_producto = $_POST['id_producto'];
$costo = $_POST['costo'];

// Preparar consulta (id_venta y fecha se generan automáticamente)
$stmt = $conn->prepare("INSERT INTO Ventas (id_comprador, id_producto, costo) VALUES (?, ?, ?)");
$stmt->bind_param("iid", $id_comprador, $id_producto, $costo);

// Ejecutar consulta
if ($stmt->execute()) {
    echo "Registro insertado correctamente. ID generado: " . $stmt->insert_id;
} else {
    echo "Error al insertar registro: " . $stmt->error;
}

// Cerrar conexiones
$stmt->close();
$conn->close();
?>
