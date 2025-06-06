<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$database = "sistema";

$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


/*
Esto ay que modificarlo por el usuario que inicio secion y el produsto
// Recibir datos (pueden venir de un formulario POST, por ejemplo)
$comprador_id = $_POST['comprador_id'];
$producto_id = $_POST['producto_id'];
$precio = $_POST['precio']; // o puedes traerlo de la tabla Productos
*/


// Preparar e insertar la venta
$sql = "INSERT INTO Ventas (comprador_id, producto_id, precio) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iid", $comprador_id, $producto_id, $precio); // i=int, d=decimal

if ($stmt->execute()) {
    echo "✅ Venta registrada correctamente.";
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
