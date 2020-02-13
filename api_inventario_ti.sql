-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-02-2020 a las 22:33:43
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api_inventario_ti`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `n_ambientes`
--

CREATE TABLE `n_ambientes` (
  `id_ambiente` int(11) NOT NULL,
  `descripcion_ambiente` varchar(80) COLLATE utf8_bin NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `n_ambientes`
--

INSERT INTO `n_ambientes` (`id_ambiente`, `descripcion_ambiente`, `estatus`, `fecha_registro`) VALUES
(1, 'Desarrollo', 1, '2020-02-11 01:28:54'),
(2, 'Produccion', 1, '2020-02-11 01:28:54'),
(3, 'QA', 1, '2020-02-11 01:29:12'),
(4, 'testing', 1, '2020-02-11 01:29:12'),
(9, 'HOTFIX', 1, '2020-02-11 20:20:11'),
(10, 'RELEASE', 2, '2020-02-11 20:22:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `n_roles`
--

CREATE TABLE `n_roles` (
  `id_rol` int(11) NOT NULL,
  `descripcion_rol` varchar(200) COLLATE utf8_bin NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `n_roles`
--

INSERT INTO `n_roles` (`id_rol`, `descripcion_rol`, `fecha_registro`) VALUES
(1, 'Administrador', '2020-01-04 18:43:43'),
(2, 'Mantenedor', '2020-01-04 18:43:43'),
(3, 'Consulta', '2020-01-04 18:43:56'),
(4, 'Usuario de Equipo', '2020-01-10 13:27:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `n_servicios`
--

CREATE TABLE `n_servicios` (
  `id_servicio` int(11) NOT NULL,
  `descripcion_servicio` varchar(80) COLLATE utf8_bin NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `feacha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `n_servicios`
--

INSERT INTO `n_servicios` (`id_servicio`, `descripcion_servicio`, `estatus`, `feacha_registro`) VALUES
(1, 'Lineas de Servicio', 1, '2020-02-11 01:27:49'),
(2, 'CDR', 1, '2020-02-11 01:27:49'),
(3, 'Mensajeria', 1, '2020-02-11 01:28:09'),
(4, 'MENSAJERIA MASIVA', 1, '2020-02-11 21:01:49'),
(6, 'TELEFONIA', 1, '2020-02-12 00:45:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `n_sitios`
--

CREATE TABLE `n_sitios` (
  `id_sitio` int(11) NOT NULL,
  `descripcion_sitio` varchar(50) COLLATE utf8_bin NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `n_sitios`
--

INSERT INTO `n_sitios` (`id_sitio`, `descripcion_sitio`, `estatus`, `fecha_registro`) VALUES
(1, 'MISITIO.CL', 1, '2020-02-11 17:32:13'),
(2, 'MIEMPRESA.COM', 1, '2020-02-11 17:32:34'),
(3, 'SITODESDEPOSTMAN.CL', 1, '2020-02-11 19:13:47'),
(4, 'SITIODEDESARROLLO.COM', 2, '2020-02-11 20:22:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `n_tipo_servidor`
--

CREATE TABLE `n_tipo_servidor` (
  `id_tipo_servidor` int(11) NOT NULL,
  `tipo_servidor` varchar(80) COLLATE utf8_bin NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `n_tipo_servidor`
--

INSERT INTO `n_tipo_servidor` (`id_tipo_servidor`, `tipo_servidor`, `estatus`, `fecha_registro`) VALUES
(1, 'Fisico', 1, '2020-02-11 01:29:40'),
(2, 'VIRTUAL ', 1, '2020-02-11 01:29:40'),
(3, 'Firewall', 1, '2020-02-11 01:29:49'),
(4, 'CLON', 1, '2020-02-12 00:44:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `n_tipo_software`
--

CREATE TABLE `n_tipo_software` (
  `id_tipo_software` int(11) NOT NULL,
  `descripcion_software` varchar(80) COLLATE utf8_bin NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `feacha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `n_tipo_software`
--

INSERT INTO `n_tipo_software` (`id_tipo_software`, `descripcion_software`, `estatus`, `feacha_registro`) VALUES
(1, 'APLICACION', 1, '2020-02-12 01:01:04'),
(2, 'BASE DE DATOS pg', 1, '2020-02-12 01:01:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_asignacion_equipos`
--

CREATE TABLE `t_asignacion_equipos` (
  `id_asignacion_equipo` int(11) NOT NULL,
  `id_servidor_software` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_asignacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_servidores`
--

CREATE TABLE `t_servidores` (
  `id_servidor` int(11) NOT NULL,
  `id_ambiente` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `nombre_servidor` varchar(150) COLLATE utf8_bin NOT NULL,
  `ip_servidor` varchar(25) COLLATE utf8_bin NOT NULL,
  `id_sitio` int(11) NOT NULL,
  `id_tipo_servidor` int(11) NOT NULL,
  `marca_servidor` varchar(80) COLLATE utf8_bin NOT NULL,
  `modelo_servidor` varchar(90) COLLATE utf8_bin NOT NULL,
  `nro_serie` varchar(80) COLLATE utf8_bin NOT NULL,
  `proveedor` varchar(50) COLLATE utf8_bin NOT NULL,
  `contacto` varchar(50) COLLATE utf8_bin NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `id_software` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_servidores`
--

INSERT INTO `t_servidores` (`id_servidor`, `id_ambiente`, `id_servicio`, `nombre_servidor`, `ip_servidor`, `id_sitio`, `id_tipo_servidor`, `marca_servidor`, `modelo_servidor`, `nro_serie`, `proveedor`, `contacto`, `estatus`, `id_software`, `fecha_registro`) VALUES
(1, 10, 6, 'PRIMER SERVIDOR', '192.168.10.210', 4, 4, 'HPS', 'PROLIANT', '123455jjj-0', 'SERVIDORESCHILE', 'PEDRO 9-12340987', 1, NULL, '2020-02-13 14:34:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_servidor_software`
--

CREATE TABLE `t_servidor_software` (
  `id_servidor_software` int(11) NOT NULL,
  `id_software` int(11) NOT NULL,
  `nro_licencia` varchar(50) COLLATE utf8_bin NOT NULL,
  `proveedor_licencia` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_servidor` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_software`
--

CREATE TABLE `t_software` (
  `id_software` int(11) NOT NULL,
  `id_tipo_software` int(11) NOT NULL,
  `nombre_software` varchar(100) COLLATE utf8_bin NOT NULL,
  `version_software` varchar(20) COLLATE utf8_bin NOT NULL,
  `nro_licencia` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `proveedor` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `contacto` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `fecha_expiracion` date DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_software`
--

INSERT INTO `t_software` (`id_software`, `id_tipo_software`, `nombre_software`, `version_software`, `nro_licencia`, `proveedor`, `contacto`, `fecha_compra`, `fecha_expiracion`, `estatus`, `fecha_registro`) VALUES
(1, 2, 'SISTEMA DE INVENATARIO III', '3.1', '1234-90', 'proveedor1.com', '912346543', '2019-11-05', '2020-03-04', 2, '2020-02-12 12:20:40'),
(2, 1, 'BASE DE DATOS DEL SISTEMA DE INVENTARIO', '1.0', 'wdwewewe-99', 'proveedor2.cl', '909871234', '2019-05-05', '2020-02-21', 1, '2020-02-12 12:20:40'),
(3, 1, 'SISTEMA DE INVENTARIO', '1.0', 'LIBRE', 'IDSISTEMAS15', '12345708', '2019-02-01', '2020-02-29', 1, '2020-02-12 17:06:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(12) COLLATE utf8_bin NOT NULL,
  `rut` varchar(12) COLLATE utf8_bin NOT NULL,
  `clave` varchar(250) COLLATE utf8_bin NOT NULL,
  `rol` int(11) NOT NULL DEFAULT 4,
  `email` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `token` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id_usuario`, `nombres`, `apellidos`, `usuario`, `rut`, `clave`, `rol`, `email`, `telefono`, `token`, `estatus`, `fecha_registro`) VALUES
(1, 'Javier', 'La Cruz', 'jlacruz', '12345678', '25d55ad283aa400af464c76d713c07ad', 1, 'LTOMOCHE@GMAIL.COM', '56964174727', 'd5843c2634578decb7f59b5452225a8eda6cb8a4', 1, '2020-01-04 18:54:44'),
(102, 'Breanna', 'Vincent', 'Yuli', '13398910-2', '25d55ad283aa400af464c76d713c07ad', 2, 'eu@risusDonec.com', '1-583-174-4579', NULL, 1, '2020-01-09 23:58:54'),
(103, 'Lacota', 'Shannon', 'Zephania', '35895544-4', '25d55ad283aa400af464c76d713c07ad', 3, 'ac.turpis@ligulaelit.edu', '220-3563', NULL, 1, '2020-01-09 23:58:54'),
(104, 'Helen', 'Hansen', 'Mark', '15643811-1', '25d55ad283aa400af464c76d713c07ad', 1, 'orci.quis.lectus@enimSednulla.co.uk', '1-182-909-4260', NULL, 1, '2020-01-09 23:58:54'),
(105, 'Medge', 'Ruiz', 'Colorado', '29858763-7', '25d55ad283aa400af464c76d713c07ad', 4, 'ultrices.mauris@ante.ca', '470-7987', NULL, 1, '2020-01-09 23:58:54'),
(106, 'Gareth', 'Case', 'Jermaine', '45037883-6', '25d55ad283aa400af464c76d713c07ad', 4, 'auctor.vitae.aliquet@mus.ca', '1-200-299-2734', NULL, 1, '2020-01-09 23:58:54'),
(107, 'Deborah', 'Chen', 'Elton', '44078328-7', '25d55ad283aa400af464c76d713c07ad', 4, 'vehicula.et@duiin.co.uk', '687-1036', NULL, 1, '2020-01-09 23:58:54'),
(108, 'Stone', 'Mcdaniel', 'Galvin', '27979985-2', '25d55ad283aa400af464c76d713c07ad', 3, 'eu.metus.In@elementumsem.ca', '1-541-704-1248', NULL, 1, '2020-01-09 23:58:54'),
(109, 'Moana', 'Pearson', 'Cade', '10262675-3', '25d55ad283aa400af464c76d713c07ad', 4, 'metus.In.lorem@magnaSuspendisse.net', '607-6497', NULL, 1, '2020-01-09 23:58:54'),
(110, 'Ashely', 'Hyde', 'Marsden', '9476628-1', '25d55ad283aa400af464c76d713c07ad', 4, 'vitae.aliquet.nec@neceuismod.co.uk', '1-823-306-5921', NULL, 1, '2020-01-09 23:58:54'),
(111, 'Avye', 'Crosby', 'Jacob', '11037133-0', '25d55ad283aa400af464c76d713c07ad', 4, 'venenatis.vel.faucibus@sed.edu', '914-5758', NULL, 1, '2020-01-09 23:58:54'),
(112, 'Aristotle', 'Herman', 'Kieran', '6884293-K', '25d55ad283aa400af464c76d713c07ad', 4, 'Ut@neque.net', '1-584-752-2505', NULL, 1, '2020-01-09 23:58:54'),
(113, 'Demetrius', 'Rogers', 'Cedric', '27926302-2', '25d55ad283aa400af464c76d713c07ad', 4, 'egestas.a.scelerisque@sapien.ca', '763-7172', NULL, 1, '2020-01-09 23:58:54'),
(114, 'Holly', 'Robinson', 'Orson', '27035110-7', '25d55ad283aa400af464c76d713c07ad', 4, 'felis.Nulla@Donecest.co.uk', '607-9074', NULL, 1, '2020-01-09 23:58:54'),
(115, 'Theodore', 'Dawson', 'Duncan', '50574049-1', '25d55ad283aa400af464c76d713c07ad', 4, 'congue.elit.sed@in.net', '1-828-385-6246', NULL, 1, '2020-01-09 23:58:54'),
(116, 'Ciaran', 'Blankenship', 'Kieran', '9159261-4', '25d55ad283aa400af464c76d713c07ad', 4, 'dolor@consectetuermauris.com', '1-766-179-6152', NULL, 1, '2020-01-09 23:58:54'),
(117, 'Joan', 'Good', 'Jin', '42901319-4', '25d55ad283aa400af464c76d713c07ad', 4, 'Curabitur.consequat.lectus@augue.edu', '679-1688', NULL, 1, '2020-01-09 23:58:54'),
(118, 'Lev', 'Mullins', 'Cooper', '6840810-5', '25d55ad283aa400af464c76d713c07ad', 4, 'non.lacinia@anteVivamus.com', '107-9049', NULL, 1, '2020-01-09 23:58:54'),
(119, 'Renee', 'Burke', 'Akeem', '28445549-5', '25d55ad283aa400af464c76d713c07ad', 4, 'massa@ategestasa.ca', '1-888-847-6191', NULL, 1, '2020-01-09 23:58:54'),
(120, 'Christian', 'Ellison', 'Kareem', '17588464-5', '25d55ad283aa400af464c76d713c07ad', 4, 'sodales.purus@suscipitest.co.uk', '539-3053', NULL, 1, '2020-01-09 23:58:54'),
(121, 'Alika', 'Walters', 'Brandon', '6333104-K', '25d55ad283aa400af464c76d713c07ad', 4, 'lorem@orciconsectetuereuismod.edu', '630-9331', NULL, 1, '2020-01-09 23:58:54'),
(122, 'Constance', 'York', 'Amir', '31879034-5', '25d55ad283aa400af464c76d713c07ad', 4, 'fringilla.purus@non.edu', '1-983-532-7176', NULL, 1, '2020-01-09 23:58:54'),
(123, 'Kevyn', 'Stewart', 'Len', '31876126-4', '25d55ad283aa400af464c76d713c07ad', 4, 'est@urnaVivamus.co.uk', '116-5564', NULL, 1, '2020-01-09 23:58:54'),
(124, 'Alma', 'Flores', 'Burton', '29104011-K', '25d55ad283aa400af464c76d713c07ad', 4, 'leo@semeget.com', '1-814-827-9605', NULL, 1, '2020-01-09 23:58:54'),
(125, 'Wing', 'Wynn', 'Kenyon', '18542014-0', '25d55ad283aa400af464c76d713c07ad', 4, 'tincidunt.pede@anequeNullam.ca', '884-0090', NULL, 1, '2020-01-09 23:58:54'),
(126, 'Xena', 'Patton', 'Bruno', '31803144-4', '25d55ad283aa400af464c76d713c07ad', 4, 'venenatis.vel@nequeNullam.edu', '854-4382', NULL, 1, '2020-01-09 23:58:54'),
(127, 'Anne', 'Hughes', 'Cairo', '33204142-8', '25d55ad283aa400af464c76d713c07ad', 4, 'pede.ultrices.a@Donecsollicitudinadipiscing.co.uk', '440-9337', NULL, 1, '2020-01-09 23:58:54'),
(128, 'Kaden', 'Garza', 'David', '41782178-3', '25d55ad283aa400af464c76d713c07ad', 4, 'Nulla@Fusce.ca', '541-9273', NULL, 1, '2020-01-09 23:58:54'),
(129, 'Quinn', 'Jenkins', 'Grant', '14937287-3', '25d55ad283aa400af464c76d713c07ad', 4, 'augue.id@tellusSuspendisse.co.uk', '141-8370', NULL, 1, '2020-01-09 23:58:54'),
(130, 'Troy', 'Petty', 'Gary', '21018425-2', '25d55ad283aa400af464c76d713c07ad', 4, 'ut.lacus@ipsum.org', '854-6107', NULL, 1, '2020-01-09 23:58:54'),
(131, 'Keaton', 'Gould', 'Reece', '39570238-6', '25d55ad283aa400af464c76d713c07ad', 4, 'nec.quam.Curabitur@nibh.edu', '910-9810', NULL, 1, '2020-01-09 23:58:54'),
(132, 'Reagan', 'Schwartz', 'Alvin', '7720270-6', '25d55ad283aa400af464c76d713c07ad', 4, 'sociis@senectus.com', '449-3541', NULL, 1, '2020-01-09 23:58:54'),
(133, 'Mufutau', 'Kaufman', 'Colton', '36623837-9', '25d55ad283aa400af464c76d713c07ad', 4, 'ligula.eu.enim@placeratorci.net', '438-9146', NULL, 1, '2020-01-09 23:58:54'),
(134, 'Astra', 'Chandler', 'Nathaniel', '43791949-6', '25d55ad283aa400af464c76d713c07ad', 4, 'nec@Donec.ca', '269-3346', NULL, 1, '2020-01-09 23:58:54'),
(135, 'Owen', 'Farley', 'Cade', '23387179-6', '25d55ad283aa400af464c76d713c07ad', 4, 'ac.mattis@nec.com', '1-408-539-6852', NULL, 1, '2020-01-09 23:58:54'),
(136, 'Isaac', 'Page', 'Jarrod', '10120609-2', '25d55ad283aa400af464c76d713c07ad', 4, 'tincidunt.congue@MorbimetusVivamus.com', '460-1218', NULL, 1, '2020-01-09 23:58:54'),
(137, 'Calista', 'Gross', 'Troy', '37171751-K', '25d55ad283aa400af464c76d713c07ad', 4, 'scelerisque@pedeCumsociis.edu', '1-580-189-9760', NULL, 1, '2020-01-09 23:58:54'),
(138, 'Odysseus', 'Barr', 'Brett', '36381522-7', '25d55ad283aa400af464c76d713c07ad', 4, 'elit.Etiam.laoreet@nequepellentesque.co.uk', '1-647-441-8999', NULL, 1, '2020-01-09 23:58:54'),
(139, 'Lillith', 'York', 'Chaim', '45475750-5', '25d55ad283aa400af464c76d713c07ad', 4, 'Nunc@Morbisit.com', '185-0669', NULL, 1, '2020-01-09 23:58:54'),
(140, 'Stone', 'Britt', 'Zeus', '46926862-4', '25d55ad283aa400af464c76d713c07ad', 4, 'Pellentesque.ut.ipsum@etpede.com', '209-9236', NULL, 1, '2020-01-09 23:58:54'),
(141, 'Pearl', 'Wilkins', 'Brenden', '27446691-K', '25d55ad283aa400af464c76d713c07ad', 4, 'vulputate@et.ca', '377-4201', NULL, 1, '2020-01-09 23:58:54'),
(142, 'Sloane', 'Osborne', 'Simon', '26386377-1', '25d55ad283aa400af464c76d713c07ad', 4, 'malesuada.id.erat@aultriciesadipiscing.co.uk', '538-0801', NULL, 1, '2020-01-09 23:58:54'),
(143, 'Madeson', 'Delaney', 'Sean', '8506655-2', '25d55ad283aa400af464c76d713c07ad', 4, 'egestas.Duis@lacus.net', '982-9482', NULL, 1, '2020-01-09 23:58:54'),
(144, 'Baker', 'Mckenzie', 'Orson', '5584433-K', '25d55ad283aa400af464c76d713c07ad', 4, 'sed.tortor.Integer@sedestNunc.co.uk', '1-334-904-5319', NULL, 1, '2020-01-09 23:58:54'),
(145, 'Hillary', 'Trevino', 'Connor', '23655779-0', '25d55ad283aa400af464c76d713c07ad', 4, 'nisi.Aenean@vitaerisusDuis.org', '1-129-119-4572', NULL, 1, '2020-01-09 23:58:54'),
(146, 'Ross', 'Oconnor', 'Edward', '5148294-8', '25d55ad283aa400af464c76d713c07ad', 4, 'in@elitAliquam.com', '797-2400', NULL, 1, '2020-01-09 23:58:54'),
(147, 'Ryan', 'Fleming', 'Grant', '30650964-0', '25d55ad283aa400af464c76d713c07ad', 4, 'consectetuer.rhoncus@ipsum.org', '1-273-504-3126', NULL, 1, '2020-01-09 23:58:54'),
(148, 'Maya', 'Carpenter', 'Thor', '15928082-9', '25d55ad283aa400af464c76d713c07ad', 4, 'luctus.vulputate.nisi@enimCurabiturmassa.org', '732-5121', NULL, 1, '2020-01-09 23:58:54'),
(149, 'Alea', 'Rivers', 'Gavin', '11775564-9', '25d55ad283aa400af464c76d713c07ad', 4, 'mauris.Suspendisse.aliquet@miAliquam.com', '542-4750', NULL, 1, '2020-01-09 23:58:54'),
(150, 'Brynne', 'Fischer', 'Brennan', '41655334-3', '25d55ad283aa400af464c76d713c07ad', 4, 'Phasellus.dolor@sagittis.co.uk', '1-570-864-5982', NULL, 1, '2020-01-09 23:58:54'),
(151, 'Cade', 'York', 'Ira', '10288095-1', '25d55ad283aa400af464c76d713c07ad', 4, 'neque.vitae.semper@placerataugueSed.edu', '246-3754', NULL, 1, '2020-01-09 23:58:54'),
(152, 'Zeus', 'Gonzales', 'Howard', '16091166-2', '25d55ad283aa400af464c76d713c07ad', 4, 'Aenean.egestas.hendrerit@sedturpisnec.edu', '1-595-609-0400', NULL, 1, '2020-01-09 23:58:54'),
(153, 'Barclay', 'Wall', 'Dalton', '34173497-5', '25d55ad283aa400af464c76d713c07ad', 4, 'ipsum@Vivamuseuismodurna.edu', '1-261-486-8575', NULL, 1, '2020-01-09 23:58:54'),
(154, 'Buckminster', 'Morse', 'Ahmed', '24023681-8', '25d55ad283aa400af464c76d713c07ad', 4, 'id.risus@vel.edu', '845-0157', NULL, 1, '2020-01-09 23:58:54'),
(155, 'Boris', 'Cain', 'Ashton', '48089087-6', '25d55ad283aa400af464c76d713c07ad', 4, 'ridiculus@Loremipsumdolor.co.uk', '1-810-785-6635', NULL, 1, '2020-01-09 23:58:54'),
(156, 'Carl', 'Barr', 'Reed', '50613579-6', '25d55ad283aa400af464c76d713c07ad', 4, 'scelerisque.lorem@Aliquameratvolutpat.ca', '1-147-119-0743', NULL, 1, '2020-01-09 23:58:54'),
(157, 'Carly', 'Pittman', 'Cyrus', '39876137-5', '25d55ad283aa400af464c76d713c07ad', 4, 'eu.dui@orciluctus.ca', '282-7539', NULL, 1, '2020-01-09 23:58:54'),
(158, 'Kenyon', 'Lawson', 'Allen', '38244659-3', '25d55ad283aa400af464c76d713c07ad', 4, 'tristique.pharetra.Quisque@fringillapurusmauris.net', '376-0393', NULL, 1, '2020-01-09 23:58:54'),
(159, 'Destiny', 'Sargent', 'Howard', '43642091-9', '25d55ad283aa400af464c76d713c07ad', 4, 'urna.Nunc.quis@lacusvestibulum.ca', '1-649-599-6220', NULL, 1, '2020-01-09 23:58:54'),
(160, 'Uriel', 'Moon', 'Zephania', '23005831-8', '25d55ad283aa400af464c76d713c07ad', 4, 'Integer.sem.elit@duiquis.edu', '957-9359', NULL, 1, '2020-01-09 23:58:54'),
(161, 'Olivia', 'Watkins', 'Branden', '10414638-4', '25d55ad283aa400af464c76d713c07ad', 4, 'Nunc.sed@imperdietnon.net', '1-582-373-2753', NULL, 1, '2020-01-09 23:58:54'),
(162, 'Noel', 'Shaffer', 'Chaney', '8069136-K', '25d55ad283aa400af464c76d713c07ad', 4, 'Sed.nec.metus@pedesagittisaugue.edu', '105-9931', NULL, 1, '2020-01-09 23:58:54'),
(163, 'Reagan', 'Avila', 'Abdul', '20493852-0', '25d55ad283aa400af464c76d713c07ad', 4, 'mollis.lectus@tinciduntnibh.net', '286-6713', NULL, 1, '2020-01-09 23:58:54'),
(164, 'Kathleen', 'Ayers', 'Thaddeus', '38157549-7', '25d55ad283aa400af464c76d713c07ad', 4, 'cursus.diam@auctorodio.org', '1-457-306-0082', NULL, 1, '2020-01-09 23:58:54'),
(165, 'Ulric', 'Howard', 'Nathan', '13847413-5', '25d55ad283aa400af464c76d713c07ad', 4, 'eu.dui.Cum@Namnullamagna.net', '1-832-870-7328', NULL, 1, '2020-01-09 23:58:54'),
(166, 'Kirk', 'Olsen', 'Logan', '33180339-1', '25d55ad283aa400af464c76d713c07ad', 4, 'at.pede.Cras@semelitpharetra.co.uk', '428-5185', NULL, 1, '2020-01-09 23:58:54'),
(167, 'Kareem', 'Schwartz', 'Chadwick', '32466279-0', '25d55ad283aa400af464c76d713c07ad', 4, 'libero@fringillamilacinia.org', '989-5675', NULL, 1, '2020-01-09 23:58:54'),
(168, 'Unity', 'Dunlap', 'Barry', '5923966-K', '25d55ad283aa400af464c76d713c07ad', 4, 'convallis.ante@rutrumeuultrices.org', '1-480-907-0364', NULL, 1, '2020-01-09 23:58:54'),
(169, 'Iola', 'Morton', 'Caleb', '49446900-6', '25d55ad283aa400af464c76d713c07ad', 4, 'auctor.velit@nunc.edu', '274-5251', NULL, 1, '2020-01-09 23:58:54'),
(170, 'Joy', 'Watts', 'Ryan', '8867239-9', '25d55ad283aa400af464c76d713c07ad', 4, 'id.enim.Curabitur@arcuVestibulum.com', '1-519-621-0551', NULL, 1, '2020-01-09 23:58:54'),
(171, 'Kieran', 'Tucker', 'Knox', '31181975-5', '25d55ad283aa400af464c76d713c07ad', 4, 'nec.luctus.felis@tempusloremfringilla.edu', '1-419-500-0053', NULL, 1, '2020-01-09 23:58:54'),
(172, 'Avram', 'Gordon', 'Colin', '9202863-1', '25d55ad283aa400af464c76d713c07ad', 4, 'sem@ridiculusmusProin.co.uk', '1-861-812-2380', NULL, 1, '2020-01-09 23:58:54'),
(173, 'Ruby', 'Bruce', 'Neil', '32429445-7', '25d55ad283aa400af464c76d713c07ad', 4, 'lectus.ante@Cras.edu', '320-9438', NULL, 1, '2020-01-09 23:58:54'),
(174, 'Callum', 'Holloway', 'Wylie', '35346003-K', '25d55ad283aa400af464c76d713c07ad', 4, 'tincidunt.adipiscing.Mauris@velit.co.uk', '248-9824', NULL, 1, '2020-01-09 23:58:54'),
(175, 'Suki', 'Cohen', 'Samson', '37742625-8', '25d55ad283aa400af464c76d713c07ad', 4, 'imperdiet@aodiosemper.co.uk', '303-6395', NULL, 1, '2020-01-09 23:58:54'),
(176, 'Yvette', 'Sutton', 'Rafael', '28412970-9', '25d55ad283aa400af464c76d713c07ad', 4, 'litora.torquent@uterosnon.com', '1-354-296-7601', NULL, 1, '2020-01-09 23:58:54'),
(177, 'Jordan', 'Carver', 'Lars', '12849040-K', '25d55ad283aa400af464c76d713c07ad', 4, 'libero@nisl.co.uk', '1-363-503-2311', NULL, 1, '2020-01-09 23:58:54'),
(178, 'Brittany', 'Vazquez', 'Igor', '47241878-5', '25d55ad283aa400af464c76d713c07ad', 4, 'Morbi@imperdietnec.co.uk', '1-319-383-1875', NULL, 1, '2020-01-09 23:58:54'),
(179, 'Flavia', 'Jennings', 'Silas', '48859439-7', '25d55ad283aa400af464c76d713c07ad', 4, 'dui@iaculisneceleifend.co.uk', '1-632-476-1670', NULL, 1, '2020-01-09 23:58:54'),
(180, 'Fritz', 'Preston', 'Abraham', '28850690-6', '25d55ad283aa400af464c76d713c07ad', 4, 'consectetuer.ipsum.nunc@a.net', '500-1183', NULL, 1, '2020-01-09 23:58:54'),
(181, 'Emerson', 'Craig', 'Quinn', '18979007-4', '25d55ad283aa400af464c76d713c07ad', 4, 'nec@velitdui.co.uk', '909-0414', NULL, 1, '2020-01-09 23:58:54'),
(182, 'Michelle', 'Good', 'Harding', '46543540-2', '25d55ad283aa400af464c76d713c07ad', 4, 'orci@neque.net', '1-273-498-7002', NULL, 1, '2020-01-09 23:58:54'),
(183, 'Belle', 'Marshall', 'Beck', '37279434-8', '25d55ad283aa400af464c76d713c07ad', 4, 'mi.ac@Fuscediamnunc.edu', '1-388-351-9308', NULL, 1, '2020-01-09 23:58:54'),
(184, 'Jenna', 'Finch', 'Kevin', '35603694-8', '25d55ad283aa400af464c76d713c07ad', 4, 'Aliquam.vulputate.ullamcorper@mauris.ca', '1-311-449-1256', NULL, 1, '2020-01-09 23:58:54'),
(185, 'Malik', 'Spence', 'Otto', '45190591-0', '25d55ad283aa400af464c76d713c07ad', 4, 'mi@acipsum.co.uk', '1-159-204-8540', NULL, 1, '2020-01-09 23:58:54'),
(186, 'Daniel', 'Cummings', 'Driscoll', '18738273-4', '25d55ad283aa400af464c76d713c07ad', 4, 'Aenean.gravida@nonegestas.ca', '1-337-308-7816', NULL, 1, '2020-01-09 23:58:54'),
(187, 'Yvette', 'Knowles', 'Cody', '46266660-8', '25d55ad283aa400af464c76d713c07ad', 4, 'Phasellus.ornare@magnaCrasconvallis.co.uk', '1-835-273-3484', NULL, 1, '2020-01-09 23:58:54'),
(188, 'Quynn', 'Carter', 'Duncan', '33360046-3', '25d55ad283aa400af464c76d713c07ad', 4, 'Nam.ligula.elit@Morbi.edu', '1-711-215-6061', NULL, 1, '2020-01-09 23:58:54'),
(189, 'Anne', 'Sharp', 'Harper', '21183482-K', '25d55ad283aa400af464c76d713c07ad', 4, 'interdum.Curabitur.dictum@lacinia.co.uk', '727-5173', NULL, 1, '2020-01-09 23:58:54'),
(190, 'Beau', 'Olson', 'Gavin', '34579580-4', '25d55ad283aa400af464c76d713c07ad', 4, 'et.magnis@sed.co.uk', '887-1428', NULL, 1, '2020-01-09 23:58:54'),
(191, 'Emmanuel', 'Hays', 'Brody', '9113817-4', '25d55ad283aa400af464c76d713c07ad', 4, 'Etiam.imperdiet@acmattis.ca', '1-242-391-4923', NULL, 1, '2020-01-09 23:58:54'),
(192, 'Cullen', 'Houston', 'Felix', '28174137-3', '25d55ad283aa400af464c76d713c07ad', 4, 'sit@enimcommodohendrerit.org', '298-7622', NULL, 1, '2020-01-09 23:58:54'),
(193, 'Byron', 'Anderson', 'Sawyer', '39533367-4', '25d55ad283aa400af464c76d713c07ad', 4, 'pede.blandit@nunc.net', '1-160-150-0010', NULL, 1, '2020-01-09 23:58:54'),
(194, 'Mechelle', 'Harris', 'Ira', '32653439-0', '25d55ad283aa400af464c76d713c07ad', 4, 'quis@semperauctorMauris.ca', '1-157-631-9514', NULL, 1, '2020-01-09 23:58:54'),
(195, 'Indira', 'Contreras', 'Jarrod', '49864245-4', 'd41d8cd98f00b204e9800998ecf8427e', 1, 'elementum.sem.vitae@Quisquenonummy.co.uk', '(+45) 5-1617-', NULL, 1, '2020-01-09 23:58:54'),
(196, 'Leandra', 'Carson', 'Jonah', '25216316-6', 'd41d8cd98f00b204e9800998ecf8427e', 3, 'ullamcorper@tortorat.ca', '(+12) 0-0681-', NULL, 1, '2020-01-09 23:58:54'),
(197, 'Cailin', 'Osborne', 'Talon', '7115761-K', '25d55ad283aa400af464c76d713c07ad', 4, 'Integer@perconubia.org', '1-563-761-2927', NULL, 1, '2020-01-09 23:58:54'),
(198, 'Brenna', 'Leon', 'Ray', '35477614-6', 'd41d8cd98f00b204e9800998ecf8427e', 4, 'posuere.enim@a.org', '(+11) 9-0872-33', NULL, 2, '2020-01-09 23:58:54'),
(199, 'Elliott', 'Callahan', 'Colt', '37680262-0', '25d55ad283aa400af464c76d713c07ad', 4, 'vitae@natoquepenatibus.net', '1-880-694-7005', NULL, 1, '2020-01-09 23:58:54'),
(200, 'Thaddeus', 'Cooley', 'Finn', '22864445-5', '25d55ad283aa400af464c76d713c07ad', 4, 'convallis.erat@metusAliquam.co.uk', '1-810-483-6939', NULL, 1, '2020-01-09 23:58:54'),
(201, 'Melissa', 'Jefferson', 'Alfonso', '47539630-8', 'd41d8cd98f00b204e9800998ecf8427e', 4, 'purus.in@lacinia.edu', '(+17) 8-1665-27', NULL, 2, '2020-01-09 23:58:54'),
(203, 'NAIROBI', 'RAMOS', 'ADMIN', '12345675', 'd41d8cd98f00b204e9800998ecf8427e', 1, 'IDSISTEMAS15@GMAIL.COM', '(+96) 4-1747-27', NULL, 1, '2020-01-11 20:10:05'),
(204, 'NAIROBI ERIKA', 'RAMOS', 'ADMIN', '12345676', 'd41d8cd98f00b204e9800998ecf8427e', 3, 'IDSISTEMAS15@GMAIL.COM', '(+96) 4-1747-27', NULL, 1, '2020-01-11 20:12:16'),
(205, 'CARLOS  J', 'LA CRUZ', 'CLACRUZ', '12345677', 'd41d8cd98f00b204e9800998ecf8427e', 1, 'IDSISTEMAS15@GMAIL.COM', '(+96) 4-1747-27', NULL, 1, '2020-01-11 20:15:25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `n_ambientes`
--
ALTER TABLE `n_ambientes`
  ADD PRIMARY KEY (`id_ambiente`);

--
-- Indices de la tabla `n_roles`
--
ALTER TABLE `n_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `n_servicios`
--
ALTER TABLE `n_servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `n_sitios`
--
ALTER TABLE `n_sitios`
  ADD PRIMARY KEY (`id_sitio`);

--
-- Indices de la tabla `n_tipo_servidor`
--
ALTER TABLE `n_tipo_servidor`
  ADD PRIMARY KEY (`id_tipo_servidor`);

--
-- Indices de la tabla `n_tipo_software`
--
ALTER TABLE `n_tipo_software`
  ADD PRIMARY KEY (`id_tipo_software`);

--
-- Indices de la tabla `t_asignacion_equipos`
--
ALTER TABLE `t_asignacion_equipos`
  ADD PRIMARY KEY (`id_asignacion_equipo`),
  ADD KEY `id_servidor_software` (`id_servidor_software`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `t_servidores`
--
ALTER TABLE `t_servidores`
  ADD PRIMARY KEY (`id_servidor`),
  ADD KEY `id_ambiente` (`id_ambiente`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_tipo_servidor` (`id_tipo_servidor`),
  ADD KEY `id_sitio` (`id_sitio`);

--
-- Indices de la tabla `t_servidor_software`
--
ALTER TABLE `t_servidor_software`
  ADD PRIMARY KEY (`id_servidor_software`),
  ADD KEY `id_servidor` (`id_servidor`),
  ADD KEY `id_software` (`id_software`);

--
-- Indices de la tabla `t_software`
--
ALTER TABLE `t_software`
  ADD PRIMARY KEY (`id_software`),
  ADD KEY `id_tipo_software` (`id_tipo_software`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `n_ambientes`
--
ALTER TABLE `n_ambientes`
  MODIFY `id_ambiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `n_roles`
--
ALTER TABLE `n_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `n_servicios`
--
ALTER TABLE `n_servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `n_sitios`
--
ALTER TABLE `n_sitios`
  MODIFY `id_sitio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `n_tipo_servidor`
--
ALTER TABLE `n_tipo_servidor`
  MODIFY `id_tipo_servidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `n_tipo_software`
--
ALTER TABLE `n_tipo_software`
  MODIFY `id_tipo_software` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_asignacion_equipos`
--
ALTER TABLE `t_asignacion_equipos`
  MODIFY `id_asignacion_equipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_servidores`
--
ALTER TABLE `t_servidores`
  MODIFY `id_servidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `t_servidor_software`
--
ALTER TABLE `t_servidor_software`
  MODIFY `id_servidor_software` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_software`
--
ALTER TABLE `t_software`
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_asignacion_equipos`
--
ALTER TABLE `t_asignacion_equipos`
  ADD CONSTRAINT `id_servidor_software` FOREIGN KEY (`id_servidor_software`) REFERENCES `t_servidor_software` (`id_servidor_software`),
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `t_servidores`
--
ALTER TABLE `t_servidores`
  ADD CONSTRAINT `id_ambiente` FOREIGN KEY (`id_ambiente`) REFERENCES `n_ambientes` (`id_ambiente`),
  ADD CONSTRAINT `id_servicio` FOREIGN KEY (`id_servicio`) REFERENCES `n_servicios` (`id_servicio`),
  ADD CONSTRAINT `id_sitio` FOREIGN KEY (`id_sitio`) REFERENCES `n_sitios` (`id_sitio`),
  ADD CONSTRAINT `id_tipo_servidor` FOREIGN KEY (`id_tipo_servidor`) REFERENCES `n_tipo_servidor` (`id_tipo_servidor`);

--
-- Filtros para la tabla `t_servidor_software`
--
ALTER TABLE `t_servidor_software`
  ADD CONSTRAINT `id_servidor` FOREIGN KEY (`id_servidor`) REFERENCES `t_servidores` (`id_servidor`),
  ADD CONSTRAINT `id_software` FOREIGN KEY (`id_software`) REFERENCES `t_software` (`id_software`);

--
-- Filtros para la tabla `t_software`
--
ALTER TABLE `t_software`
  ADD CONSTRAINT `id_tipo_software` FOREIGN KEY (`id_tipo_software`) REFERENCES `n_tipo_software` (`id_tipo_software`);

--
-- Filtros para la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD CONSTRAINT `id_rol` FOREIGN KEY (`rol`) REFERENCES `n_roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
