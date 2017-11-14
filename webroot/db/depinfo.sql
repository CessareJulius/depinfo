-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-11-2017 a las 16:09:25
-- Versión del servidor: 5.7.19-0ubuntu0.16.04.1
-- Versión de PHP: 5.6.31-6+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `persona_id`) VALUES
(1, 5),
(2, 6);

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
(2, '26026083', 'cessare', 'yanez', '04144532962', 0, '2017-11-01 00:00:00', '2017-11-02 00:00:00'),
(3, '8789654', 'jose', 'rojas', '04144532964', 1, '2017-11-01 00:00:00', '2017-11-01 00:00:00'),
(4, '8789661', 'jhonathan', 'silva', '04144532973', 1, '2017-11-01 00:00:00', '2017-11-09 12:49:00'),
(5, '8789662', 'yorman', 'silva', '04144532974', 2, '2017-11-01 00:00:00', '2017-11-01 00:00:00'),
(6, '8789663', 'jorge', 'silva', '04144532975', 2, '2017-11-01 00:00:00', '2017-11-01 00:00:00'),
(7, '8789664', 'carlos', 'perez', '04144532976', 1, '2017-11-01 00:00:00', '2017-11-09 12:49:00'),
(8, '14876534', 'rosa', 'melo', '04241234563', 1, '2017-11-01 00:00:00', '2017-11-09 12:50:00'),
(9, '14876534', 'rosa', 'meltroso', '4241234563', 1, '2017-11-01 00:00:00', '2017-11-09 12:52:00'),
(10, '22614567', 'julio cesar', 'yanez gonzalez', '04144532962', 2, '2017-11-09 21:34:25', '2017-11-09 21:34:25'),
(11, '12345678', 'juanjo', 'perez', '04123451234', 2, '2017-11-09 21:50:34', '2017-11-09 21:50:34'),
(13, '12345679', 'catalina', 'montañer', '04249871234', 2, '2017-11-09 21:55:45', '2017-11-11 00:49:32'),
(14, '1467', 'julio cesar', 'yanez gonzalez', '02129871234', 1, '2017-11-09 22:44:58', '2017-11-09 22:44:58'),
(15, '14671', 'julio cesar', 'yanez gonzalez', '02129871234', 1, '2017-11-09 22:46:02', '2017-11-09 22:46:02'),
(16, '14672', 'julio cesar', 'yanez gonzalez', '02129871234', 1, '2017-11-09 22:47:15', '2017-11-09 22:47:15'),
(17, '26876345', 'juan', 'perez', '04247653498', 1, '2017-11-10 21:05:46', '2017-11-10 21:05:46'),
(18, '12876123', 'carmelo josé', 'diaz aponte', '04127831234', 2, '2017-11-11 01:06:39', '2017-11-11 01:07:20'),
(19, '25130266', 'cesar', 'padrino', '04243677015', 1, '2017-11-11 01:26:08', '2017-11-11 01:26:08'),
(20, '12987456', 'jose', 'paleta', '04123456789', 1, '2017-11-12 14:50:18', '2017-11-12 17:46:08'),
(21, '25887282', 'jose', 'lopez', '02464317606', 1, '2017-11-13 14:42:47', '2017-11-13 14:43:26');

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
(20171101222047, 'CreatePersonasTable', '2017-11-02 05:19:28', '2017-11-02 05:19:29', 0),
(20171102014924, 'CreateTurnos', '2017-11-02 05:52:53', '2017-11-02 05:52:54', 0),
(20171102015432, 'CreateUsersTable', '2017-11-02 06:15:57', '2017-11-02 06:16:01', 0),
(20171102022736, 'CreateAdminSeedMigration', '2017-11-02 06:52:19', '2017-11-02 06:52:20', 0),
(20171102031447, 'CreateUsersDataSeedMigration', '2017-11-02 07:43:26', '2017-11-02 07:43:29', 0),
(20171108030624, 'CreateClientesTable', '2017-11-08 07:12:19', '2017-11-08 07:12:19', 0),
(20171113200055, 'CreateEquiposTable', '2017-11-14 00:05:07', '2017-11-14 00:05:08', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

DROP TABLE IF EXISTS `turnos`;
CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `turno` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `turno`) VALUES
(1, 'mañana'),
(2, 'tarde');

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
  `active` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `per_id` int(11) NOT NULL,
  `turno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `cargo`, `usuario`, `clave`, `active`, `created`, `modified`, `per_id`, `turno`) VALUES
(2, 'user', 'empleado', 'Oran', '$2y$10$aW2MVBGfbrZTblELxRniLO9GAEXieiPKdgzcxLULpx4BcqvQ8xuZG', 0, '2017-11-02 03:43:27', '2017-11-02 03:43:27', 3, 1),
(3, 'admin', 'admin', 'cessare', '$2y$10$LIM54p3p5Gmh0wt4e8pVIO81hk2S/UBhkAoC/XmiNjDrv8HXSE.Sq', 1, '2017-11-02 03:43:27', '2017-11-02 03:43:27', 2, 2),
(4, 'user', 'empleado', 'Althea', '$2y$10$m3rJem0ArObGrsSkubUPjO1qNUsxO44VlZ0eCcDOASnkkTeL3RXUG', 0, '2017-11-02 03:43:27', '2017-11-02 03:43:27', 4, 1),
(7, 'user', 'empleado', 'Rafael', '$2y$10$Hhwj.plt6l2HUkhFTNQJO.RPQqESnuRTy7Uy9rtIRFObseSm6qcsa', 0, '2017-11-02 03:43:28', '2017-11-02 03:43:28', 9, 2),
(8, 'user', 'empleado', 'Ryan', '$2y$10$dyg1oP4sorUHalEHSR13x.V.vVrL.XrXP.vZExyG9XwuEQGuhzdJy', 0, '2017-11-02 03:43:28', '2017-11-02 03:43:28', 7, 1),
(10, 'user', 'empleado', 'Herman', '$2y$10$Py9h1b4QA0E/Al4RiX1DAOeNGdEKs7ETCEpNkOVsdRivT8jrukmDO', 0, '2017-11-02 03:43:29', '2017-11-02 03:43:29', 8, 1),
(13, 'user', 'empleado', 'cesc', '$2y$10$/6DgrjcoYdeMPyQUxfLCiezmiACmZPll7akUZCw2Xoxv8HaaoPfvO', 1, '2017-11-11 01:26:08', '2017-11-11 01:26:08', 19, 1),
(14, 'user', 'empleado', 'root', '$2y$10$QNzxJEqPINGDMvBsqRZCiOQk9k5iQepqKUvlIHCTigAfwpR1oojtq', 1, '2017-11-12 14:50:18', '2017-11-12 14:50:18', 20, 1),
(15, 'user', 'empleado', 'jose', '$2y$10$5ORppUX3WZGb85SvkhM3yeiS6FMB53V.dDZWS9stfCBBZsm90UGZq', 1, '2017-11-13 14:42:47', '2017-11-13 14:42:47', 21, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serial` (`serial`);

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
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `per_id` (`per_id`),
  ADD KEY `turno` (`turno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`per_id`) REFERENCES `personas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
