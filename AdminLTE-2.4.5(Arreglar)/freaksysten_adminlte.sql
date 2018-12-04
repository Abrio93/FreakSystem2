-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2018 a las 20:16:07
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `freaksysten_adminlte`
--
CREATE DATABASE IF NOT EXISTS `freaksysten_adminlte` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `freaksysten_adminlte`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_usuarios`
--

CREATE TABLE `grupo_usuarios` (
  `id_grupo_usuario` int(11) NOT NULL,
  `nombre_grupo_usuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `permisos` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `grupo_usuarios`
--

INSERT INTO `grupo_usuarios` (`id_grupo_usuario`, `nombre_grupo_usuario`, `permisos`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'Administrador', 'verUsuarios;1', '2018-11-26 19:10:06', '2018-11-26 19:11:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_izquierdo_contenido`
--

CREATE TABLE `menu_izquierdo_contenido` (
  `id_menu_izquierdo_contenido` int(11) NOT NULL,
  `id_menu_izquierdo_titulo` int(11) NOT NULL,
  `titulo_menu_izquierdo_contenido` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `posicion` int(11) NOT NULL,
  `icono` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `accion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `menu_izquierdo_contenido`
--

INSERT INTO `menu_izquierdo_contenido` (`id_menu_izquierdo_contenido`, `id_menu_izquierdo_titulo`, `titulo_menu_izquierdo_contenido`, `posicion`, `icono`, `accion`) VALUES
(1, 1, 'Ver usuarios', 1, '', 'verUsuarios'),
(3, 2, 'Home', 1, '', 'default');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_izquierdo_titulo`
--

CREATE TABLE `menu_izquierdo_titulo` (
  `id_menu_izquierdo_titulo` int(11) NOT NULL,
  `titulo_menu_izquierdo_titulo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `posicion` int(11) NOT NULL,
  `icono` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `menu_izquierdo_titulo`
--

INSERT INTO `menu_izquierdo_titulo` (`id_menu_izquierdo_titulo`, `titulo_menu_izquierdo_titulo`, `posicion`, `icono`) VALUES
(1, 'Usuarios', 2, '<i class=\"fas fa-user\"></i>'),
(2, 'Administracion', 1, '<i class=\"fas fa-home\"></i>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_grupo_usuario` int(11) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_grupo_usuario`, `usuario`, `pass`, `correo`, `nombre`, `apellidos`, `fecha_creacion`, `fecha_modificacion`) VALUES
(2, 1, 'manga', '123', 'javimanga93@gmail.com', 'Javier', 'Manga Muñoz', '2018-11-26 14:38:24', '2018-11-26 19:09:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `grupo_usuarios`
--
ALTER TABLE `grupo_usuarios`
  ADD PRIMARY KEY (`id_grupo_usuario`);

--
-- Indices de la tabla `menu_izquierdo_contenido`
--
ALTER TABLE `menu_izquierdo_contenido`
  ADD PRIMARY KEY (`id_menu_izquierdo_contenido`),
  ADD UNIQUE KEY `posicion` (`posicion`,`id_menu_izquierdo_titulo`) USING BTREE,
  ADD KEY `id_menu_izquierdo_titulo` (`id_menu_izquierdo_titulo`);

--
-- Indices de la tabla `menu_izquierdo_titulo`
--
ALTER TABLE `menu_izquierdo_titulo`
  ADD PRIMARY KEY (`id_menu_izquierdo_titulo`),
  ADD UNIQUE KEY `posicion` (`posicion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_grupo_usuario` (`id_grupo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grupo_usuarios`
--
ALTER TABLE `grupo_usuarios`
  MODIFY `id_grupo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `menu_izquierdo_contenido`
--
ALTER TABLE `menu_izquierdo_contenido`
  MODIFY `id_menu_izquierdo_contenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `menu_izquierdo_titulo`
--
ALTER TABLE `menu_izquierdo_titulo`
  MODIFY `id_menu_izquierdo_titulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
