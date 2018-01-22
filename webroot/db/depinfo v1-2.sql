-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-01-2018 a las 22:02:43
-- Versión del servidor: 10.1.26-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `depinfo`
--
CREATE DATABASE IF NOT EXISTS `depinfo` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `depinfo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_registro_equipos`
--

DROP TABLE IF EXISTS `detalle_registro_equipos`;
CREATE TABLE `detalle_registro_equipos` (
  `id` int(11) NOT NULL,
  `falla` text COLLATE utf8_spanish_ci NOT NULL,
  `reparacion` text COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('activo','anulado') COLLATE utf8_spanish_ci NOT NULL,
  `equipo_id` int(11) NOT NULL,
  `registro_equipos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

DROP TABLE IF EXISTS `equipos`;
CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `serial` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `status` enum('reparando','reparado','entregado') COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `cedula` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `status` int(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `cedula`, `nombre`, `apellido`, `telefono`, `status`, `created`, `modified`) VALUES
(1, '1111111', 'admin', 'admin', '01023456789', 0, '2018-01-22 01:44:45', '2018-01-22 01:44:45'),
(2, '1111112', 'juan', 'perez', '01023456788', 1, '2018-01-22 01:54:26', '2018-01-22 01:54:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(201801212359, 'CreateAdminSeedMigration', '2018-01-22 04:24:22', '2018-01-22 04:24:22', 0),
(20171101222047, 'CreatePersonasTable', '2018-01-22 05:44:34', '2018-01-22 05:44:34', 0),
(20171102014924, 'CreateTurnos', '2018-01-22 05:44:34', '2018-01-22 05:44:34', 0),
(20171102015432, 'CreateUsersTable', '2018-01-22 05:44:34', '2018-01-22 05:44:36', 0),
(20171102022736, 'CreateAdminSeedMigration', '2018-01-22 04:19:13', '2018-01-22 04:19:13', 0),
(20171102031447, 'CreateUsersDataSeedMigration', '2018-01-22 05:44:36', '2018-01-22 05:44:36', 0),
(20171108030624, 'CreateClientesTable', '2018-01-22 05:44:36', '2018-01-22 05:44:36', 0),
(20171113200055, 'CreateEquiposTable', '2018-01-22 05:44:36', '2018-01-22 05:44:37', 0),
(20171113201034, 'CreateRegistroEquiposTable', '2017-11-14 00:16:15', '2017-11-14 00:16:19', 0),
(20171113202142, 'CreateDetalleRegistroEquipos', '2017-11-14 00:25:26', '2017-11-14 00:25:30', 0),
(20171115180837, 'CreateSessionsTable', '2018-01-22 05:44:37', '2018-01-22 05:44:38', 0),
(20171119161702, 'CreateRegistroEquiposTable', '2018-01-22 05:44:38', '2018-01-22 05:44:41', 0),
(20171119180246, 'CreateDetalleRegistroEquipos', '2018-01-22 05:44:42', '2018-01-22 05:44:45', 0),
(20180121235813, 'CreatePersonSeedMigration', '2018-01-22 05:44:45', '2018-01-22 05:44:45', 0),
(20180122010723, 'CreateAdminDataSeedMigration', '2018-01-22 05:44:45', '2018-01-22 05:44:45', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_equipos`
--

DROP TABLE IF EXISTS `registro_equipos`;
CREATE TABLE `registro_equipos` (
  `id` int(11) NOT NULL,
  `Codigo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `persona_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `status` enum('activa','terminada') COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `status`, `created`, `modified`, `user_id`) VALUES
(1, 'terminada', '2018-01-22 01:53:41', '2018-01-22 01:55:02', 1),
(2, 'activa', '2018-01-22 01:55:04', '2018-01-22 01:55:04', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('admin','user') COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `turno` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `per_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `cargo`, `usuario`, `clave`, `turno`, `active`, `created`, `modified`, `per_id`) VALUES
(1, 'admin', 'administrador', 'admin', '$2y$10$m3rJem0ArObGrsSkubUPjO1qNUsxO44VlZ0eCcDOASnkkTeL3RXUG', 1, 1, '2018-01-22 01:44:45', '2018-01-22 01:44:45', 1),
(2, 'user', 'empleado', 'root', '$2y$10$H5s2J2svJ4kWmumgOS0YR.rzFpCi3CODLx6p3pvjDmf5zUM5Y96X2', 2, 1, '2018-01-22 01:54:26', '2018-01-22 01:54:58', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_registro_equipos`
--
ALTER TABLE `detalle_registro_equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipo_id` (`equipo_id`),
  ADD KEY `registro_equipos_id` (`registro_equipos_id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `registro_equipos`
--
ALTER TABLE `registro_equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `per_id` (`per_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_registro_equipos`
--
ALTER TABLE `detalle_registro_equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registro_equipos`
--
ALTER TABLE `registro_equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_registro_equipos`
--
ALTER TABLE `detalle_registro_equipos`
  ADD CONSTRAINT `detalle_registro_equipos_ibfk_1` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `detalle_registro_equipos_ibfk_2` FOREIGN KEY (`registro_equipos_id`) REFERENCES `registro_equipos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registro_equipos`
--
ALTER TABLE `registro_equipos`
  ADD CONSTRAINT `registro_equipos_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `registro_equipos_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`per_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
