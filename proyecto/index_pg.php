<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tienda de Suscripciones</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
  <?php session_start(); ?>

  <!-- Navbar -->
  <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold">ProxyStore</h1>
      <nav class="space-x-6 flex items-center">
        <a href="#inicio" class="text-gray-700 hover:text-blue-600">Inicio</a>
        <a href="#servicio" class="text-gray-700 hover:text-blue-600">Servicio al Cliente</a>

        <!-- Info de usuario si ha iniciado sesión -->
        <div class="flex items-center space-x-4 bg-gray-100 px-4 py-2 rounded-lg ml-4">
          <?php if (isset($_SESSION['usuario'])): ?>
            <img src="<?= htmlspecialchars($_SESSION['usuario']['foto']) ?>" alt="Foto de perfil" class="w-10 h-10 rounded-full object-cover border-2 border-blue-500">
            <div>
              <span class="block text-sm text-gray-600">Bienvenido,</span>
              <span class="block text-blue-700 font-semibold"><?= htmlspecialchars($_SESSION['usuario']['nombre']) ?></span>
            </div>
            <form action="logout.php" method="post" class="ml-4">
              <button type="submit" class="text-red-500 hover:text-red-700 text-sm underline">Cerrar sesión</button>
            </form>
          <?php else: ?>
            <a href="Redireccionar.html" class="text-blue-600 hover:text-blue-800 font-medium">Iniciar Sesión</a>
          <?php endif; ?>
        </div>
      </nav>
    </div>
  </header>

  <!-- Sección Inicio -->
  <section id="inicio" class="py-16 text-center bg-blue-100">
    <div class="max-w-3xl mx-auto px-4">
      <h2 class="text-4xl font-bold mb-4">Bienvenido a ProxyStore</h2>
      <p class="text-lg mb-6">Tu tienda confiable para suscripciones de entretenimiento y más.</p>
    </div>
  </section>

  <!-- Sección Servicio al Cliente -->
  <section id="servicio" class="py-16 bg-blue-50">
    <div class="max-w-4xl mx-auto px-4 text-center">
      <h2 class="text-3xl font-semibold mb-4">Servicio al Cliente</h2>
      <p class="mb-6">¿Tienes dudas o necesitas ayuda con tu suscripción? Estamos aquí para ti.</p>
      <a href="mailto:soporte@proxystore.com" class="text-blue-600 underline">soporte@proxystore.com</a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white py-6 mt-12 border-t text-center text-sm text-gray-500">
    &copy; 2025 SuscripStore. Todos los derechos reservados.
  </footer>
</body>
</html>
