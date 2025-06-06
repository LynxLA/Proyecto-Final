-- Configuraciones iniciales
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Crear base de datos
CREATE DATABASE IF NOT EXISTS sistema;
USE sistema;

-- Crear tabla clientes
CREATE TABLE `clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `correo` VARCHAR(50) NOT NULL,
  `telefono` VARCHAR(10) NOT NULL,
  `contraseña` VARCHAR(50) NOT NULL,
  `direccion` VARCHAR(100) NOT NULL,
  `imagen` VARCHAR(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Crear tabla Membresias
CREATE TABLE Membresias (
  Id INT AUTO_INCREMENT PRIMARY KEY,
  Servicio VARCHAR(50),
  Plan VARCHAR(50),
  Duracion VARCHAR(20),
  Precio DECIMAL(10, 2)
);

-- Crear tabla usuarios
CREATE TABLE `usuarios` (
  `nombre` VARCHAR(50) NOT NULL,
  `correo` VARCHAR(50) NOT NULL,
  `telefono` VARCHAR(10) NOT NULL,
  `contraseña` VARCHAR(50) NOT NULL,
  `imagen` VARCHAR(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Crear la tabla Ventas
CREATE TABLE Ventas (
    id_venta INT PRIMARY KEY,
    id_comprador INT NOT NULL,
    id_producto INT NOT NULL,
    fecha DATE NOT NULL,
    costo DECIMAL(10, 2) NOT NULL
);

-- Crear la tabla Tickets
CREATE TABLE Tickets (
    id_ticket INT PRIMARY KEY,
    id_cliente INT NOT NULL,
    id_admin INT NOT NULL,
    fecha_alta DATE NOT NULL,
    fecha_baja DATE NULL,
    descripcion NVARCHAR(500) NOT NULL,
    estatus NVARCHAR(50) NOT NULL
);

-- Modificar la tabla para que id_venta sea autoincremental
ALTER TABLE Ventas MODIFY id_venta INT AUTO_INCREMENT;

-- Establecer fecha por defecto como la fecha actual
ALTER TABLE Ventas MODIFY fecha DATE NOT NULL DEFAULT CURRENT_DATE;


-- Insertar datos en Membresias
INSERT INTO Membresias (Servicio, Plan, Duracion, Precio) VALUES
  ('Spotify', 'Individual', '1 mes', 109),
  ('Spotify', 'Individual', '3 meses', 329),
  ('Spotify', 'Individual', '6 meses', 659),
  ('Spotify', 'Individual', '1 año', 1099),
  ('Spotify', 'Duo', '1 mes', 149),
  ('Spotify', 'Duo', '3 meses', 459),
  ('Spotify', 'Duo', '6 meses', 880),
  ('Spotify', 'Duo', '1 año', 1640),
  ('Spotify', 'Familiar', '1 mes', 179),
  ('Spotify', 'Familiar', '3 meses', 545),
  ('Spotify', 'Familiar', '6 meses', 1030),
  ('Spotify', 'Familiar', '1 año', 1950),
  ('Spotify', 'Estudiante', '1 mes', 70),
  ('Amazon Prime', 'Amazon Prime', 'Mensual', 85),
  ('Amazon Prime', 'Amazon Prime', 'Anual', 859),
  ('Netflix', 'Estándar con anuncios', 'Mensual', 105),
  ('Netflix', 'Estándar', 'Mensual', 225),
  ('Netflix', 'Premium', 'Mensual', 309);

-- Insertar datos en clientes
INSERT INTO `clientes` (`id`, `nombre`, `correo`, `telefono`, `contraseña`, `direccion`, `imagen`) VALUES
  (1, 'pusyy', 'ponivio@outlook.com', '6671054168', '', 'juan b rojo', 'jotito.png'),
  (2, 'Antonio', 'ponicio@outlook.com', '6693541684', '$2y$10$VgJvtDybvXow1Jo6NjrW..IQ7Kn9h3dZZ1tEMAJKX0X', 'juan b azul', '../archivos/55a5de51-a049-4f45-93ab-0da4415d9d0f.jpg');
