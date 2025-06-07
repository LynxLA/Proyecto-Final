<?php
// Conexión a la base de datos (ajusta con tus propios datos)
$host = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "sistema";

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $basedatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta
$sql = "SELECT id_venta, id_comprador, id_producto, fecha, costo FROM Ventas";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Ventas</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { border-collapse: collapse; width: 80%; margin: auto; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Listado de Ventas</h2>
    <table>
        <thead>
            <tr>
                <th>ID Venta</th>
                <th>ID Comprador</th>
                <th>ID Producto</th>
                <th>Fecha</th>
                <th>Costo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila["id_venta"] . "</td>";
                    echo "<td>" . $fila["id_comprador"] . "</td>";
                    echo "<td>" . $fila["id_producto"] . "</td>";
                    echo "<td>" . $fila["fecha"] . "</td>";
                    echo "<td>$" . number_format($fila["costo"], 2) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay ventas registradas.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>