<?php
$archivo = 'emails.txt';
$mensaje = "";

// Función para eliminar un correo del archivo
function eliminarCorreo($email, $archivo) {
    if (!file_exists($archivo)) {
        return "El archivo no existe.";
    }

    $emails = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (in_array($email, $emails)) {
        $nuevosEmails = array_filter($emails, fn($e) => trim($e) !== trim($email));
        file_put_contents($archivo, implode(PHP_EOL, $nuevosEmails) . PHP_EOL);
        return "Correo eliminado exitosamente.";
    } else {
        return "El correo no se encontró en la lista.";
    }
}

// Manejar formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = eliminarCorreo($email, $archivo);
    } else {
        $mensaje = "Correo electrónico no válido.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dar de baja correo</title>
</head>
<body>
    <h2>Dar de baja un correo</h2>
    <form method="POST">
        <label>Correo electrónico:</label>
        <input type="email" name="email" required>
        <br><br>
        <button type="submit">Dar de baja</button>
    </form>

    <?php if ($mensaje): ?>
        <p><strong><?php echo htmlspecialchars($mensaje); ?></strong></p>
    <?php endif; ?>
</body>
</html>
