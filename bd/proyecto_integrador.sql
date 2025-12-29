-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-12-2025 a las 23:18:03
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_integrador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `productos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`productos`)),
  `total` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `nombre`, `email`, `telefono`, `productos`, `total`, `fecha`) VALUES
(1, 'Javier Verón', 'javier.veron@gmail.com', '11222333', '[{\"id\":1,\"cantidad\":1},{\"id\":2,\"cantidad\":3},{\"id\":4,\"cantidad\":2}]', 909994, '2025-12-23 03:33:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` text NOT NULL,
  `promo` tinyint(1) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `imagen`, `promo`, `categoria`) VALUES
(1, 'Zapatillas Forum Mid', 149999, 'Zapatillas de caña media que conectan estilo atrevido y autoexpresión.', 'https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/048f8b5bec2f4e6b999a35ab7c8479c8_9366/Zapatillas_Forum_Mid_Blanco_IG3755_01_standard.jpg', 0, 'mujeres'),
(2, 'Zapatillas Samba OG', 209999, 'Un mito del fútbol toma las calles.', 'https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/2b4aae1dcee04c3d8ad2b080ad5675fb_9366/Zapatillas_Samba_OG_Negro_JI2734_01_standard.jpg', 1, 'mujeres'),
(3, 'Zapatillas SUPERSTAR II', 189999, 'Zapatillas icónicas con detalles de tejido denim únicos que marcan la diferencia.', 'https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/719d001264c64cc39dd28fd1ec497b28_9366/ZAPATILLAS_SUPERSTAR_II_Gris_KI8492_01_00_standard.jpg', 0, 'hombres'),
(4, 'Zapatillas adidas x Marvel Spider-Man Grand Court Niños', 64999, 'Zapatillas para Niñes.', 'https://assets.adidas.com/images/h_2000,f_auto,q_auto,fl_lossy,c_fill,g_auto/0dbef1c3fe194a26a257736b160f112f_9366/Zapatillas_adidas_x_Marvel_Spider-Man_Grand_Court_Ninos_Blanco_JQ8072_01_00_standard.jpg', 1, 'niños');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
