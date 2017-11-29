-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-11-2017 a las 09:37:00
-- Versión del servidor: 5.7.19-0ubuntu0.16.04.1
-- Versión de PHP: 5.6.32-1+ubuntu16.04.1+deb.sury.org+1

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
-- Estructura de tabla para la tabla `detalle_registro_equipos`
--

DROP TABLE IF EXISTS `detalle_registro_equipos`;
CREATE TABLE `detalle_registro_equipos` (
  `id` int(11) NOT NULL,
  `falla` text COLLATE utf8_spanish_ci NOT NULL,
  `reparacion` text COLLATE utf8_spanish_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('activo','anulado') COLLATE utf8_spanish_ci NOT NULL,
  `equipo_id` int(11) NOT NULL,
  `registro_equipos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_registro_equipos`
--

INSERT INTO `detalle_registro_equipos` (`id`, `falla`, `reparacion`, `created`, `modified`, `status`, `equipo_id`, `registro_equipos_id`) VALUES
(1, 'No enciende la pantalla', 'se le cambio la tarjeta madre', '2017-11-19 16:12:00', '2017-11-26 12:23:51', 'activo', 1, 1),
(2, 'no enciende', NULL, '2017-11-23 13:59:00', '2017-11-23 13:58:00', 'activo', 2, 2),
(3, 'no enciende', NULL, '2017-11-23 14:13:00', '2017-11-23 14:13:00', 'activo', 4, 4),
(4, 'no enciende', NULL, '2017-11-23 18:24:03', '2017-11-23 18:24:03', 'activo', 5, 5),
(5, 'NO ENCIENDE', NULL, '2017-11-26 10:55:00', '2017-11-26 10:55:00', 'activo', 6, 6),
(6, 'se queda pegada en el logo', NULL, '2017-11-26 12:32:37', '2017-11-26 12:32:37', 'activo', 7, 7),
(7, 'no prende esa mierda', NULL, '2017-11-27 09:02:23', '2017-11-27 09:02:23', 'activo', 8, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

DROP TABLE IF EXISTS `equipos`;
CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `serial` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `status` enum('reparando','reparado','entregado') COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `serial`, `tipo`, `marca`, `modelo`, `departamento`, `status`, `created`, `modified`) VALUES
(1, 'XB12-JGU8-12BR', 'laptop', 'hp', 'compac', NULL, 'reparado', '2017-11-19 16:12:00', '2017-11-23 15:15:42'),
(2, '123456789', 'laptop', 'samsung', 'compac', NULL, 'reparando', '2017-11-23 17:37:13', '2017-11-23 17:37:13'),
(4, '21312312', 'laptop', 'samsung', 'compac', NULL, 'reparando', '2017-11-23 18:11:31', '2017-11-23 18:11:31'),
(5, '3132131', 'laptop', 'samsung', 'compac', 'tecnologia', 'reparando', '2017-11-23 18:24:03', '2017-11-23 18:25:34'),
(6, '9081923', 'laptop', 'samsung', 'notebook', NULL, 'reparando', '2017-11-23 22:22:43', '2017-11-23 22:22:43'),
(7, 'abc123nm', 'tablet', 'canaima', 'm4a1', NULL, 'reparando', '2017-11-26 12:32:36', '2017-11-26 12:32:36'),
(8, '6178236871', 'pc', 'samsung', 'el gue', NULL, 'reparando', '2017-11-27 09:02:23', '2017-11-27 09:02:23');

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
(2, '26026083', 'cessare julius', 'yanez', '04144532962', 0, '2017-11-01 00:00:00', '2017-11-26 12:33:46'),
(3, '8789654', 'jose', 'rojas', '04144532964', 1, '2017-11-01 00:00:00', '2017-11-01 00:00:00'),
(4, '8789661', 'jhonathan', 'silva', '04144532973', 1, '2017-11-01 00:00:00', '2017-11-09 12:49:00'),
(5, '8789662', 'yorman', 'silba', '04144532974', 2, '2017-11-01 00:00:00', '2017-11-17 13:59:14'),
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
(20, '12987456', 'jose', 'lopez', '04123456789', 1, '2017-11-12 14:50:18', '2017-11-17 13:47:57'),
(21, '25887282', 'jose', 'lopez', '02464317606', 1, '2017-11-13 14:42:47', '2017-11-13 14:43:26'),
(22, '8787156', 'carlos', 'yanez', '02464312530', 2, '2017-11-22 21:40:07', '2017-11-22 21:40:07');

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
(20171113200055, 'CreateEquiposTable', '2017-11-14 00:05:07', '2017-11-14 00:05:08', 0),
(20171113201034, 'CreateRegistroEquiposTable', '2017-11-14 00:16:15', '2017-11-14 00:16:19', 0),
(20171113202142, 'CreateDetalleRegistroEquipos', '2017-11-14 00:25:26', '2017-11-14 00:25:30', 0),
(20171115180837, 'CreateSessionsTable', '2017-11-15 22:29:34', '2017-11-15 22:29:36', 0),
(20171119161702, 'CreateRegistroEquiposTable', '2017-11-19 20:17:44', '2017-11-19 20:17:48', 0),
(20171119180246, 'CreateDetalleRegistroEquipos', '2017-11-19 22:04:40', '2017-11-19 22:04:43', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_equipos`
--

DROP TABLE IF EXISTS `registro_equipos`;
CREATE TABLE `registro_equipos` (
  `id` int(11) NOT NULL,
  `Codigo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `persona_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro_equipos`
--

INSERT INTO `registro_equipos` (`id`, `Codigo`, `created`, `modified`, `persona_id`, `user_id`) VALUES
(1, 'X1-RGB-CD1-H9', '2017-11-19 16:12:00', '2017-11-19 16:12:00', 10, 14),
(2, '1234567', '2017-11-23 17:37:13', '2017-11-23 17:37:13', 2, 13),
(4, '12313', '2017-11-23 18:11:31', '2017-11-23 18:11:31', 21, 13),
(5, '2301', '2017-11-23 18:24:03', '2017-11-23 18:24:03', 13, 13),
(6, 'XC-DFG-1CF-56', '2017-11-26 10:54:00', '2017-11-26 10:55:00', 18, 3),
(7, 'L2-P6V-PFN-51', '2017-11-26 12:32:36', '2017-11-26 12:32:36', 2, 3),
(8, '9C-0JS-OK8-67', '2017-11-27 09:02:23', '2017-11-27 09:02:23', 21, 3);

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
(1, 'terminada', '2017-11-15 20:21:54', '2017-11-15 20:21:54', 3),
(2, 'terminada', '2017-11-15 20:48:58', '2017-11-15 20:48:58', 3),
(3, 'terminada', '2017-11-15 21:32:47', '2017-11-15 21:32:47', 3),
(4, 'terminada', '2017-11-15 23:54:36', '2017-11-15 23:54:36', 3),
(5, 'terminada', '2017-11-16 16:17:14', '2017-11-16 16:17:14', 3),
(6, 'terminada', '2017-11-16 21:01:41', '2017-11-16 21:01:41', 3),
(7, 'terminada', '2017-11-17 01:37:30', '2017-11-17 01:37:30', 3),
(8, 'terminada', '2017-11-17 02:55:05', '2017-11-17 02:55:05', 3),
(9, 'terminada', '2017-11-17 03:54:03', '2017-11-17 03:54:03', 3),
(10, 'terminada', '2017-11-17 03:58:01', '2017-11-17 03:58:01', 14),
(11, 'terminada', '2017-11-17 04:27:38', '2017-11-17 04:27:38', 13),
(12, 'terminada', '2017-11-17 13:24:50', '2017-11-17 13:24:50', 3),
(13, 'terminada', '2017-11-17 13:42:07', '2017-11-17 17:18:07', 13),
(14, 'terminada', '2017-11-17 13:47:15', '2017-11-17 17:19:15', 14),
(15, 'terminada', '2017-11-17 21:27:01', '2017-11-17 21:34:15', 3),
(16, 'terminada', '2017-11-17 21:35:39', '2017-11-17 18:20:39', 3),
(17, 'terminada', '2017-11-17 21:36:04', '2017-11-17 21:38:36', 13),
(18, 'terminada', '2017-11-18 20:47:53', '2017-11-18 17:35:40', 14),
(19, 'terminada', '2017-11-18 21:43:27', '2017-11-18 18:03:27', 14),
(20, 'terminada', '2017-11-18 22:16:25', '2017-11-18 22:16:44', 14),
(21, 'terminada', '2017-11-18 22:47:58', '2017-11-18 22:53:38', 3),
(22, 'terminada', '2017-11-18 22:54:07', '2017-11-18 23:30:09', 3),
(23, 'terminada', '2017-11-18 22:54:23', '2017-11-18 23:01:58', 14),
(24, 'terminada', '2017-11-18 23:02:33', '2017-11-18 23:02:47', 14),
(25, 'terminada', '2017-11-18 23:12:42', '2017-11-18 23:12:49', 14),
(26, 'terminada', '2017-11-18 23:14:13', '2017-11-18 23:14:19', 14),
(27, 'terminada', '2017-11-18 23:16:49', '2017-11-18 23:16:51', 14),
(28, 'terminada', '2017-11-18 23:17:31', '2017-11-18 23:17:35', 14),
(29, 'terminada', '2017-11-18 23:20:59', '2017-11-18 23:21:11', 14),
(30, 'terminada', '2017-11-18 23:22:05', '2017-11-18 23:22:12', 14),
(31, 'terminada', '2017-11-18 23:25:37', '2017-11-18 23:25:44', 14),
(32, 'terminada', '2017-11-18 23:27:00', '2017-11-18 23:27:07', 14),
(33, 'terminada', '2017-11-18 23:27:27', '2017-11-18 23:27:32', 14),
(34, 'terminada', '2017-11-18 23:28:03', '2017-11-18 23:28:09', 14),
(35, 'terminada', '2017-11-18 23:28:37', '2017-11-18 23:28:45', 14),
(36, 'terminada', '2017-11-18 23:29:11', '2017-11-18 23:29:16', 14),
(37, 'terminada', '2017-11-18 23:43:06', '2017-11-18 23:44:09', 14),
(38, 'terminada', '2017-11-18 23:43:16', '2017-11-18 20:50:16', 3),
(39, 'terminada', '2017-11-18 23:45:32', '2017-11-18 23:46:33', 14),
(40, 'terminada', '2017-11-19 00:56:57', '2017-11-19 01:42:59', 3),
(41, 'terminada', '2017-11-19 01:27:03', '2017-11-19 01:42:29', 14),
(42, 'terminada', '2017-11-19 19:16:44', '2017-11-19 20:19:30', 14),
(43, 'terminada', '2017-11-19 19:18:43', '2017-11-19 15:55:43', 3),
(44, 'terminada', '2017-11-19 19:54:27', '2017-11-19 20:21:22', 3),
(45, 'terminada', '2017-11-19 20:21:36', '2017-11-19 17:47:36', 3),
(46, 'terminada', '2017-11-19 21:46:52', '2017-11-19 22:31:50', 3),
(47, 'terminada', '2017-11-19 22:14:26', '2017-11-19 22:24:01', 13),
(48, 'terminada', '2017-11-19 22:24:10', '2017-11-19 22:24:19', 13),
(49, 'terminada', '2017-11-19 22:59:10', '2017-11-19 23:16:00', 3),
(50, 'terminada', '2017-11-19 23:38:43', '2017-11-19 20:38:43', 3),
(51, 'terminada', '2017-11-20 00:38:57', '2017-11-20 02:55:25', 3),
(52, 'terminada', '2017-11-20 13:52:15', '2017-11-20 13:59:39', 3),
(53, 'terminada', '2017-11-20 14:07:34', '2017-11-20 11:11:34', 3),
(54, 'terminada', '2017-11-20 15:24:26', '2017-11-20 16:20:06', 3),
(55, 'terminada', '2017-11-20 16:40:11', '2017-11-20 21:05:34', 3),
(56, 'terminada', '2017-11-21 01:06:15', '2017-11-21 01:37:45', 3),
(57, 'terminada', '2017-11-21 01:39:44', '2017-11-21 02:37:20', 3),
(58, 'terminada', '2017-11-21 02:37:24', '2017-11-21 02:37:33', 3),
(59, 'terminada', '2017-11-21 02:37:36', '2017-11-21 03:10:40', 3),
(60, 'terminada', '2017-11-21 15:15:54', '2017-11-21 11:56:54', 3),
(61, 'terminada', '2017-11-21 15:55:30', '2017-11-21 15:56:15', 13),
(62, 'terminada', '2017-11-21 15:56:22', '2017-11-22 04:09:23', 3),
(63, 'terminada', '2017-11-22 16:22:09', '2017-11-22 16:22:09', 3),
(64, 'terminada', '2017-11-22 16:28:23', '2017-11-26 17:44:21', 3),
(65, 'terminada', '2017-11-23 15:00:19', '2017-11-23 15:00:20', 13),
(66, 'terminada', '2017-11-23 15:00:30', '2017-11-23 18:43:38', 13),
(67, 'terminada', '2017-11-23 15:19:54', '2017-11-23 17:01:59', 14),
(68, 'terminada', '2017-11-26 16:56:10', '2017-11-26 17:44:24', 14),
(69, 'terminada', '2017-11-27 08:57:01', '2017-11-27 09:02:56', 3),
(70, 'terminada', '2017-11-27 16:41:09', '2017-11-27 17:04:42', 3);

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
(2, 'user', 'empleado', 'Oran', '$2y$10$aW2MVBGfbrZTblELxRniLO9GAEXieiPKdgzcxLULpx4BcqvQ8xuZG', 0, '2017-11-02 03:43:27', '2017-11-14 21:17:18', 3, 1),
(3, 'admin', 'admin', 'cessare', '$2y$10$eUtcI6wpejtw1hqi8fy3vedK3F0inr1l5lUOS9VflDKvh1ban.JZu', 1, '2017-11-02 03:43:27', '2017-11-15 00:20:26', 2, 1),
(4, 'user', 'empleado', 'Althea', '$2y$10$m3rJem0ArObGrsSkubUPjO1qNUsxO44VlZ0eCcDOASnkkTeL3RXUG', 0, '2017-11-02 03:43:27', '2017-11-02 03:43:27', 4, 1),
(7, 'user', 'empleado', 'Rafael', '$2y$10$Hhwj.plt6l2HUkhFTNQJO.RPQqESnuRTy7Uy9rtIRFObseSm6qcsa', 1, '2017-11-02 03:43:28', '2017-11-14 21:17:38', 9, 2),
(8, 'user', 'empleado', 'Ryan', '$2y$10$dyg1oP4sorUHalEHSR13x.V.vVrL.XrXP.vZExyG9XwuEQGuhzdJy', 0, '2017-11-02 03:43:28', '2017-11-02 03:43:28', 7, 1),
(10, 'user', 'empleado', 'Herman', '$2y$10$Py9h1b4QA0E/Al4RiX1DAOeNGdEKs7ETCEpNkOVsdRivT8jrukmDO', 0, '2017-11-02 03:43:29', '2017-11-02 03:43:29', 8, 1),
(13, 'admin', 'empleado', 'cesc', '$2y$10$/6DgrjcoYdeMPyQUxfLCiezmiACmZPll7akUZCw2Xoxv8HaaoPfvO', 1, '2017-11-11 01:26:08', '2017-11-21 11:55:08', 19, 1),
(14, 'user', 'empleado', 'root', '$2y$10$QNzxJEqPINGDMvBsqRZCiOQk9k5iQepqKUvlIHCTigAfwpR1oojtq', 1, '2017-11-12 14:50:18', '2017-11-12 14:50:18', 20, 1),
(15, 'user', 'empleado', 'jose', '$2y$10$5ORppUX3WZGb85SvkhM3yeiS6FMB53V.dDZWS9stfCBBZsm90UGZq', 1, '2017-11-13 14:42:47', '2017-11-13 14:42:47', 21, 1);

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
  ADD KEY `per_id` (`per_id`),
  ADD KEY `turno` (`turno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_registro_equipos`
--
ALTER TABLE `detalle_registro_equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `registro_equipos`
--
ALTER TABLE `registro_equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
