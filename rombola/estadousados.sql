-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2018 a las 20:44:34
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
-- Estructura de tabla para la tabla `estadousados`
--

CREATE TABLE `estadousados` (
  `id_estadoUsado` int(10) UNSIGNED NOT NULL,
  `nombreEstado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estadousados`
--

INSERT INTO `estadousados` (`id_estadoUsado`, `nombreEstado`, `created_at`, `updated_at`) VALUES
(1, 'Disponible', NULL, NULL),
(2, 'En tramite', NULL, NULL),
(3, 'Baja', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estadousados`
--
ALTER TABLE `estadousados`
  ADD PRIMARY KEY (`id_estadoUsado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estadousados`
--
ALTER TABLE `estadousados`
  MODIFY `id_estadoUsado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
