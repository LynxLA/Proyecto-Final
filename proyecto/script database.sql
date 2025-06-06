-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2025 a las 23:44:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `imagen` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `correo`, `telefono`, `contraseña`, `direccion`, `imagen`) VALUES
(1, 'pusyy', 'ponivio@outlook.com', '6671054168', '', 'juan b rojo', 'jotito.png'),
(2, 'Antonio', 'ponicio@outlook.com', '6693541684', '$2y$10$VgJvtDybvXow1Jo6NjrW..IQ7Kn9h3dZZ1tEMAJKX0X', 'juan b azul', '../archivos/55a5de51-a049-4f45-93ab-0da4415d9d0f.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `imagen` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE Membresias (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Servicio VARCHAR(50),
    Plan VARCHAR(50),
    Duracion VARCHAR(20),
    Precio DECIMAL(10,2)
);

-- Membresías Spotify
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
('Spotify', 'Estudiante', '1 mes', 70);

-- Membresías Amazon Prime
INSERT INTO Membresias (Servicio, Plan, Duracion, Precio) VALUES
('Amazon Prime', 'Amazon Prime', 'Mensual', 85),
('Amazon Prime', 'Amazon Prime', 'Anual', 859);

-- Membresías Netflix
INSERT INTO Membresias (Servicio, Plan, Duracion, Precio) VALUES
('Netflix', 'Estándar con anuncios', 'Mensual', 105),
('Netflix', 'Estándar', 'Mensual', 225),
('Netflix', 'Premium', 'Mensual', 309);

