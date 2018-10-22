-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2018 a las 12:20:14
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rombola`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `idmarca` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`idmarca`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Chevrolet', NULL, NULL),
(2, 'Dodge', NULL, NULL),
(3, 'Mini', NULL, NULL),
(4, 'Jaguar', NULL, NULL),
(5, 'Audi', NULL, NULL),
(6, 'Jeep', NULL, NULL),
(7, 'Mazda', NULL, NULL),
(8, 'Bmw', NULL, NULL),
(9, 'Fiat', NULL, NULL),
(10, 'Kia', NULL, NULL),
(11, 'Mercedez Benz', NULL, NULL),
(12, 'Smart', NULL, NULL),
(13, 'Ford', NULL, NULL),
(14, 'Mitsubishi', NULL, NULL),
(15, 'Tesla', NULL, NULL),
(16, 'Gmc', NULL, NULL),
(17, 'Volkswagen', NULL, NULL),
(18, 'Chrysler', NULL, NULL),
(19, 'Hyndai', NULL, NULL),
(20, 'Volvo', NULL, NULL),
(21, 'Toyota', NULL, NULL),
(22, 'Nissan', NULL, NULL),
(23, 'Peugeot', NULL, NULL),
(24, 'Citroen', NULL, NULL),
(25, 'Honda', NULL, NULL),
(26, 'Corvette', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idmarca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idmarca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
