-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-11-2017 a las 17:05:44
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `attendance`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activo`
--

CREATE TABLE IF NOT EXISTS `activo` (
  `id_activo` int(11) NOT NULL AUTO_INCREMENT,
  `activo1` tinyint(1) NOT NULL DEFAULT '0',
  `activo2` tinyint(1) NOT NULL DEFAULT '0',
  `activo3` tinyint(1) NOT NULL DEFAULT '0',
  `id_edi_part` int(11) NOT NULL,
  PRIMARY KEY (`id_activo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `ad_pass` varchar(250) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `perfil` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_perfil` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `ad_pass`, `id_perfil`, `perfil`) VALUES
(1, 'drodrigo@cegos.es', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` varchar(250) NOT NULL,
  `c_name` varchar(250) NOT NULL,
  `c_days` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `c_name`, `c_days`) VALUES
('c_001', 'COURSE NAME 1', 3),
('c_002', 'COURSE NAME 2', 2),
('c_003', 'COURSE NAME 3', 1),
('test1', 'Curso Test 1', 2),
('test2', 'Curso Test 2', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion`
--

CREATE TABLE IF NOT EXISTS `edicion` (
  `id_edicion` varchar(250) NOT NULL,
  `id_curso` varchar(250) NOT NULL,
  `ed_name` varchar(250) NOT NULL,
  `ed_fecha1` date NOT NULL,
  `ed_fecha2` date DEFAULT NULL,
  `ed_fecha3` date DEFAULT NULL,
  `ed_localizacion` varchar(250) NOT NULL,
  `id_formador` int(11) NOT NULL,
  PRIMARY KEY (`id_edicion`),
  KEY `id_curso` (`id_curso`),
  KEY `id_formador` (`id_formador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `edicion`
--

INSERT INTO `edicion` (`id_edicion`, `id_curso`, `ed_name`, `ed_fecha1`, `ed_fecha2`, `ed_fecha3`, `ed_localizacion`, `id_formador`) VALUES
('ed_001_c_001', 'c_001', 'EDITION 1 - COURSE NAME 1', '2017-12-01', '2017-12-02', '2017-12-10', 'MADRID', 5),
('ed_002_c_001', 'c_001', 'EDITION 2 - COURSE NAME 1', '2017-12-15', NULL, NULL, 'VALENCIA', 6),
('ed_003_c_002', 'c_002', 'EDITION 3 - COURSE NAME 2', '2017-11-26', '2017-11-27', NULL, 'BARCELONA', 5),
('ed_004_c_002', 'c_002', 'EDITION 4 - COURSE NAME 2', '2017-11-29', '2017-11-30', NULL, 'VALENCIA', 6),
('ed_005_c_003', 'c_003', 'EDITION 5 - COURSE NAME 3', '2017-11-19', '2017-11-20', '2017-11-28', 'MADRID', 5),
('ED_006_C003', 'c_003', 'EDITION 6 - COURSE NAME 3', '2017-12-10', '2017-12-11', '2017-12-27', 'BARCELONA', 6),
('Ref001', 'c_001', 'Edition Test 001', '0000-00-00', '0000-00-00', '0000-00-00', '', 6),
('Ref002', 'c_002', 'Edition Test 002', '0000-00-00', '0000-00-00', NULL, 'Madrid', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edi_part`
--

CREATE TABLE IF NOT EXISTS `edi_part` (
  `id_edi_part` int(11) NOT NULL AUTO_INCREMENT,
  `id_part` int(11) NOT NULL,
  `id_edicion` varchar(250) NOT NULL,
  `activo1` tinyint(4) NOT NULL DEFAULT '0',
  `activo2` tinyint(4) NOT NULL DEFAULT '0',
  `activo3` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_edi_part`),
  KEY `id_part` (`id_part`),
  KEY `id_edicion` (`id_edicion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1414 ;

--
-- Volcado de datos para la tabla `edi_part`
--

INSERT INTO `edi_part` (`id_edi_part`, `id_part`, `id_edicion`, `activo1`, `activo2`, `activo3`) VALUES
(1, 1, 'ed_001_c_001', 0, 0, 0),
(2, 1, 'ed_002_c_001', 0, 0, 0),
(3, 1, 'ed_003_c_002', 0, 0, 0),
(4, 2, 'ed_004_c_002', 0, 0, 0),
(5, 2, 'ed_005_c_003', 0, 0, 0),
(6, 2, 'ED_006_C003', 0, 0, 0),
(7, 3, 'ed_001_c_001', 0, 0, 0),
(8, 3, 'ed_002_c_001', 0, 0, 0),
(9, 3, 'ed_003_c_002', 0, 0, 0),
(10, 4, 'ed_004_c_002', 0, 0, 0),
(11, 5, 'ed_001_c_001', 0, 0, 0),
(12, 5, 'ed_002_c_001', 0, 0, 0),
(13, 6, 'ed_003_c_002', 0, 0, 0),
(14, 6, 'ed_004_c_002', 0, 0, 0),
(15, 7, 'ed_005_c_003', 0, 0, 0),
(16, 7, 'ED_006_C003', 0, 0, 0),
(17, 8, 'ed_001_c_001', 0, 0, 0),
(18, 8, 'ed_002_c_001', 0, 0, 0),
(19, 9, 'ed_003_c_002', 0, 0, 0),
(20, 9, 'ed_004_c_002', 0, 0, 0),
(1305, 10, 'ed_001_c_001', 0, 0, 0),
(1306, 10, 'ed_001_c_001', 0, 0, 0),
(1307, 11, 'ed_003_c_002', 0, 0, 0),
(1308, 12, 'ed_005_c_003', 0, 0, 0),
(1309, 14, 'ed_003_c_002', 0, 0, 0),
(1310, 15, 'ed_001_c_001', 0, 0, 0),
(1311, 16, 'ed_003_c_002', 0, 0, 0),
(1312, 17, 'ed_005_c_003', 0, 0, 0),
(1313, 18, 'ed_001_c_001', 0, 0, 0),
(1314, 19, 'ed_003_c_002', 0, 0, 0),
(1315, 20, 'ed_001_c_001', 0, 0, 0),
(1316, 21, 'ed_003_c_002', 0, 0, 0),
(1317, 22, 'ed_005_c_003', 0, 0, 0),
(1318, 23, 'ed_002_c_001', 0, 0, 0),
(1319, 24, 'ed_004_c_002', 0, 0, 0),
(1320, 25, 'ed_002_c_001', 0, 0, 0),
(1321, 26, 'ed_004_c_002', 0, 0, 0),
(1322, 27, 'ED_006_C003', 0, 0, 0),
(1323, 28, 'ed_002_c_001', 0, 0, 0),
(1324, 29, 'ed_004_c_002', 0, 0, 0),
(1325, 30, 'ed_001_c_001', 0, 0, 0),
(1326, 31, 'ed_003_c_002', 0, 0, 0),
(1327, 32, 'ed_005_c_003', 0, 0, 0),
(1328, 33, 'ed_001_c_001', 0, 0, 0),
(1329, 34, 'ed_003_c_002', 0, 0, 0),
(1330, 35, 'ed_001_c_001', 0, 0, 0),
(1331, 36, 'ed_003_c_002', 0, 0, 0),
(1332, 37, 'ed_005_c_003', 0, 0, 0),
(1333, 38, 'ed_001_c_001', 0, 0, 0),
(1334, 39, 'ed_003_c_002', 0, 0, 0),
(1335, 40, 'ed_002_c_001', 0, 0, 0),
(1336, 41, 'ed_003_c_002', 0, 0, 0),
(1337, 42, 'ED_006_C003', 0, 0, 0),
(1338, 43, 'ed_001_c_001', 0, 0, 0),
(1339, 44, 'ed_004_c_002', 0, 0, 0),
(1340, 45, 'ed_001_c_001', 0, 0, 0),
(1341, 46, 'ed_004_c_002', 0, 0, 0),
(1342, 47, 'ed_005_c_003', 0, 0, 0),
(1343, 48, 'ed_002_c_001', 0, 0, 0),
(1344, 49, 'ed_003_c_002', 0, 0, 0),
(1345, 50, 'ed_002_c_001', 0, 0, 0),
(1346, 51, 'ed_003_c_002', 0, 0, 0),
(1347, 52, 'ED_006_C003', 0, 0, 0),
(1348, 53, 'ed_001_c_001', 0, 0, 0),
(1349, 54, 'ed_004_c_002', 0, 0, 0),
(1350, 55, 'ed_001_c_001', 0, 0, 0),
(1351, 56, 'ed_004_c_002', 0, 0, 0),
(1352, 57, 'ed_005_c_003', 0, 0, 0),
(1353, 58, 'ed_002_c_001', 0, 0, 0),
(1354, 59, 'ed_003_c_002', 0, 0, 0),
(1355, 59, 'ed_004_c_002', 0, 0, 0),
(1356, 60, 'ed_001_c_001', 0, 0, 0),
(1357, 60, 'ed_002_c_001', 0, 0, 0),
(1358, 61, 'ed_003_c_002', 0, 0, 0),
(1359, 61, 'ed_004_c_002', 0, 0, 0),
(1360, 62, 'ed_005_c_003', 0, 0, 0),
(1361, 62, 'ED_006_C003', 0, 0, 0),
(1362, 63, 'ed_001_c_001', 0, 0, 0),
(1363, 63, 'ed_002_c_001', 0, 0, 0),
(1364, 64, 'ed_003_c_002', 0, 0, 0),
(1365, 64, 'ed_004_c_002', 0, 0, 0),
(1366, 65, 'ed_001_c_001', 0, 0, 0),
(1367, 65, 'ed_002_c_001', 0, 0, 0),
(1368, 66, 'ed_003_c_002', 0, 0, 0),
(1369, 66, 'ed_004_c_002', 0, 0, 0),
(1370, 67, 'ed_005_c_003', 0, 0, 0),
(1371, 67, 'ED_006_C003', 0, 0, 0),
(1372, 68, 'ed_001_c_001', 0, 0, 0),
(1373, 68, 'ed_002_c_001', 0, 0, 0),
(1374, 69, 'ed_003_c_002', 0, 0, 0),
(1375, 69, 'ed_004_c_002', 0, 0, 0),
(1376, 70, 'ed_001_c_001', 0, 0, 0),
(1377, 70, 'ed_002_c_001', 0, 0, 0),
(1378, 71, 'ed_003_c_002', 0, 0, 0),
(1379, 71, 'ed_004_c_002', 0, 0, 0),
(1380, 72, 'ed_005_c_003', 0, 0, 0),
(1381, 72, 'ED_006_C003', 0, 0, 0),
(1382, 73, 'ed_001_c_001', 0, 0, 0),
(1383, 73, 'ed_002_c_001', 0, 0, 0),
(1384, 74, 'ed_003_c_002', 0, 0, 0),
(1385, 74, 'ed_004_c_002', 0, 0, 0),
(1386, 75, 'ed_001_c_001', 0, 0, 0),
(1387, 75, 'ed_002_c_001', 0, 0, 0),
(1388, 76, 'ed_003_c_002', 0, 0, 0),
(1389, 76, 'ed_004_c_002', 0, 0, 0),
(1390, 77, 'ed_005_c_003', 0, 0, 0),
(1391, 77, 'ED_006_C003', 0, 0, 0),
(1392, 78, 'ed_001_c_001', 0, 0, 0),
(1393, 78, 'ed_002_c_001', 0, 0, 0),
(1394, 79, 'ed_003_c_002', 0, 0, 0),
(1395, 79, 'ed_004_c_002', 0, 0, 0),
(1396, 80, 'ed_001_c_001', 0, 0, 0),
(1397, 80, 'ed_002_c_001', 0, 0, 0),
(1398, 81, 'ed_003_c_002', 0, 0, 0),
(1399, 81, 'ed_004_c_002', 0, 0, 0),
(1400, 82, 'ed_005_c_003', 0, 0, 0),
(1401, 82, 'ED_006_C003', 0, 0, 0),
(1402, 83, 'ed_001_c_001', 0, 0, 0),
(1403, 83, 'ed_002_c_001', 0, 0, 0),
(1404, 84, 'ed_003_c_002', 0, 0, 0),
(1405, 84, 'ed_004_c_002', 0, 0, 0),
(1406, 85, 'ed_001_c_001', 0, 0, 0),
(1407, 85, 'ed_002_c_001', 0, 0, 0),
(1408, 86, 'ed_003_c_002', 0, 0, 0),
(1409, 86, 'ed_004_c_002', 0, 0, 0),
(1410, 87, 'ed_005_c_003', 0, 0, 0),
(1411, 87, 'ED_006_C003', 0, 0, 0),
(1412, 92, 'ed_001_c_001', 0, 0, 0),
(1413, 93, 'ed_001_c_001', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id_email` int(11) NOT NULL AUTO_INCREMENT,
  `id_part` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  PRIMARY KEY (`id_email`),
  KEY `id_part` (`id_part`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `emails`
--

INSERT INTO `emails` (`id_email`, `id_part`, `email`) VALUES
(1, 1, 'altmail01@participant.com'),
(2, 1, 'altmail02@participant.com'),
(3, 2, 'altmail10@participant.com'),
(4, 2, 'altmail03@participant.com'),
(5, 2, 'altmail04@participant.com'),
(6, 3, 'altmail05@participant.com'),
(7, 4, 'altmail09@participant.com'),
(8, 5, 'altmail06@participant.com'),
(9, 6, 'altmail07@participant.com'),
(10, 5, 'altmail08@participant.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `5b` int(1) NOT NULL DEFAULT '0',
  `6b` int(1) NOT NULL DEFAULT '0',
  `7b` int(1) NOT NULL DEFAULT '0',
  `8b` int(1) NOT NULL DEFAULT '0',
  `9b` int(1) NOT NULL DEFAULT '0',
  `10b` int(1) NOT NULL DEFAULT '0',
  `11b` varchar(250) NOT NULL,
  `12c` int(1) NOT NULL DEFAULT '0',
  `13c` int(1) NOT NULL DEFAULT '0',
  `14c` int(1) NOT NULL DEFAULT '0',
  `15c` int(1) NOT NULL DEFAULT '0',
  `16c` int(1) NOT NULL DEFAULT '0',
  `17c` varchar(250) NOT NULL,
  `id_edi_part` int(11) NOT NULL,
  PRIMARY KEY (`id_event`),
  KEY `id_edi_part` (`id_edi_part`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `event`
--

INSERT INTO `event` (`id_event`, `5b`, `6b`, `7b`, `8b`, `9b`, `10b`, `11b`, `12c`, `13c`, `14c`, `15c`, `16c`, `17c`, `id_edi_part`) VALUES
(1, 5, 4, 5, 4, 5, 4, 'bla bla bla', 5, 4, 5, 4, 5, 'qwerty qwerty', 1),
(2, 3, 4, 3, 4, 5, 5, 'fdgdgsfgs', 5, 5, 4, 4, 5, 'dfgdg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formador`
--

CREATE TABLE IF NOT EXISTS `formador` (
  `id_formador` int(11) NOT NULL AUTO_INCREMENT,
  `for_name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `id_perfil` int(11) NOT NULL DEFAULT '2',
  `perfil` varchar(50) NOT NULL DEFAULT 'formador',
  PRIMARY KEY (`id_formador`),
  KEY `id_perfil` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `formador`
--

INSERT INTO `formador` (`id_formador`, `for_name`, `username`, `password`, `id_perfil`, `perfil`) VALUES
(5, 'John Doe ', 'trainer1@trainer.com', '297e1479cf75d300a89a5b6ec208fd979209878b', 2, 'formador'),
(6, 'Jane Doe', 'trainer2@trainer.com', '297e1479cf75d300a89a5b6ec208fd979209878b', 2, 'formador'),
(8, 'Manuel García', 'email@email.com', '123456', 2, 'formador'),
(9, 'Manuel Sanchez', 'email2@email.com', '123456', 2, 'formador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `general`
--

CREATE TABLE IF NOT EXISTS `general` (
  `id_general` int(11) NOT NULL AUTO_INCREMENT,
  `18d` varchar(250) NOT NULL,
  `19d` varchar(250) NOT NULL,
  `id_edi_part` int(11) NOT NULL,
  PRIMARY KEY (`id_general`),
  KEY `id_edi_part` (`id_edi_part`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `general`
--

INSERT INTO `general` (`id_general`, `18d`, `19d`, `id_edi_part`) VALUES
(1, 'Lorem ipsum sit amet', 'Amet sit ipsum lorem', 1),
(2, 'dfgdgdfgdfg', 'dfgdgdfgds', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE IF NOT EXISTS `participante` (
  `id_part` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(250) NOT NULL,
  `p_email` varchar(250) NOT NULL,
  `p_active1` tinyint(1) NOT NULL DEFAULT '0',
  `p_active2` tinyint(1) NOT NULL DEFAULT '0',
  `p_active3` tinyint(1) NOT NULL DEFAULT '0',
  `id_perfil` int(11) NOT NULL DEFAULT '3',
  `p_pass` varchar(250) NOT NULL DEFAULT '7a2110450a94b44bd46974e65d3f36e05bdc42b8',
  `perfil` varchar(50) NOT NULL DEFAULT 'participant',
  `comentario` varchar(300) NOT NULL,
  PRIMARY KEY (`id_part`),
  UNIQUE KEY `p_email` (`p_email`),
  UNIQUE KEY `p_email_2` (`p_email`),
  KEY `id_perfil` (`id_perfil`),
  KEY `p_active3` (`p_active3`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`id_part`, `p_name`, `p_email`, `p_active1`, `p_active2`, `p_active3`, `id_perfil`, `p_pass`, `perfil`, `comentario`) VALUES
(1, 'John Donaldson', 'part1@part.com', 0, 0, 0, 3, '7a2110450a94b44bd46974e65d3f36e05bdc42b8', 'participant', ''),
(2, 'James Smith', 'part200@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(3, 'Christopher Brown', 'drodrigo@cegos.es', 0, 0, 0, 3, 'participante', 'participant', ''),
(4, 'Ronald Lee', 'part400@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(5, 'Mary Wilson', 'part500@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(6, 'Anthony Williams', 'part600@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(7, 'Lisa Patel', 'part700@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(8, 'Michelle Taylor', 'part800@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(9, 'John Wong', 'part900@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(10, 'Patricia Thompson', 'part1000@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(11, 'Daniel Campbell', 'part110@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(12, 'Nancy Jones', 'part120@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(14, 'Laura Miller', 'part140@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(15, 'Robert Moore', 'part150@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(16, 'Paul Jackson', 'part160@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(17, 'Kevin White', 'part170@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(18, 'Linda Harris', 'part180@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(19, 'Karen Martin', 'part190@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(20, 'Sarah Garcia', 'part2000@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(21, 'Michael Robinson', 'part201@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(22, 'Mark Clark', 'part220@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(23, 'Jason Anderson', 'part230@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(24, 'Barbara Martinez', 'part240@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(25, 'Betty Walker', 'part250@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(26, 'Kimberly Allen', 'part260@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(27, 'William Young', 'part270@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(28, 'Donald Scott', 'part280@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(29, 'Jeff Nelson', 'part290@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(30, 'Elizabeth Carter', 'part30@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(31, 'Helen Mitchell', 'part31@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(32, 'Deborah Perez', 'part32@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(33, 'David Roberts', 'part33@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(34, 'George Phillips', 'part34@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(35, 'Jennifer Parker', 'part35@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(36, 'Richard Evans', 'part36@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(37, 'Kenneth Stewart', 'part37@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(38, 'Maria Morris', 'part38@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(39, 'Donna Roogers', 'part39@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(40, 'Charles Carter', 'part40@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(41, 'Steven King', 'part41@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(42, 'Susan Wright', 'part42@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(43, 'Carol Green', 'part43@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(44, 'Joseph Baker', 'part44@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(45, 'Edward Adams', 'part45@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(46, 'Margaret Turner', 'part46@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(47, 'Ruth Sanchez', 'part47@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(48, 'Thomas Bell', 'part48@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(49, 'Brian Cooper', 'part49@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(50, 'Dorothy Cox', 'part50@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(51, 'Sharon Reed', 'part51@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(52, 'James Smith', 'part2@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(53, 'Christopher Brown', 'part3@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(54, 'Ronald Lee', 'part4@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(55, 'Mary Wilson', 'part5@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(56, 'Lisa Patel', 'part7@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(57, 'Michelle Taylor', 'part8@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(58, 'John Wong', 'part9@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(59, 'Daniel Campbell', 'part11@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(60, 'Anthony Williams', 'part6@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(61, 'Patricia Thompson', 'part10@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(62, 'Nancy Jones', 'part12@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(63, 'Laura Miller', 'part14@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(64, 'Robert Moore', 'part15@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(65, 'Paul Jackson', 'part16@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(66, 'Kevin White', 'part17@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(67, 'Linda Harris', 'part18@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(68, 'Karen Martin', 'part19@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(69, 'Sarah Garcia', 'part20@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(70, 'Michael Robinson', 'part21@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(71, 'Mark Clark', 'part22@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(72, 'Jason Anderson', 'part23@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(73, 'Barbara Martinez', 'part024@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(74, 'Barbara Martinez', 'part24@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(75, 'Betty Walker', 'part25@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(76, 'Kimberly Allen', 'part26@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(77, 'William Young', 'part27@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(78, 'Donald Scott', 'part28@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(79, 'Jeff Nelson', 'part29@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(80, 'Elizabeth Carter', 'part0300@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(81, 'Helen Mitchell', 'part310@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(82, 'Sharon Reed', 'part051@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(83, 'Dorothy Cox', 'part050@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(84, 'Brian Cooper', 'part049@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(85, 'Thomas Bell', 'part048@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(86, 'Ruth Sanchez', 'part047@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(87, 'Margaret Turner', 'part046@part.com', 0, 0, 0, 3, 'participante', 'participant', ''),
(88, 'Manuel Rodriguez', 'mrodriguez@mrodriguez.com', 0, 0, 0, 3, 'nuevo', 'participant', ''),
(89, 'Manuel Rodriguez', 'mrodriguez234234@qwertyy.com', 0, 0, 0, 3, '123456', 'participant', ''),
(92, 'Participante Nuevo', 'participante@nuevo.com', 0, 0, 0, 3, '123456', 'participant', ''),
(93, 'Lewis Nolan', 'lewisnolan@nolan.com', 0, 0, 0, 3, '7a2110450a94b44bd46974e65d3f36e05bdc42b8', 'participant', 'Lorem ipsum sit amet\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(30) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `perfil`) VALUES
(1, 'admin'),
(2, 'trainer'),
(3, 'participant');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_event`
--

CREATE TABLE IF NOT EXISTS `pre_event` (
  `id_pre_event` int(11) NOT NULL AUTO_INCREMENT,
  `1a` int(1) NOT NULL DEFAULT '0',
  `2a` int(1) NOT NULL DEFAULT '0',
  `3a` int(1) NOT NULL DEFAULT '0',
  `4a` varchar(250) NOT NULL,
  `id_edi_part` int(11) NOT NULL,
  `hecho` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pre_event`),
  KEY `id_edi_part` (`id_edi_part`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `pre_event`
--

INSERT INTO `pre_event` (`id_pre_event`, `1a`, `2a`, `3a`, `4a`, `id_edi_part`, `hecho`) VALUES
(1, 5, 5, 5, 'Awesome!', 1, 1),
(2, 5, 5, 5, 'More Awesome!', 1, 1),
(3, 5, 4, 5, 'bla bla bla', 1, 1),
(4, 4, 5, 4, 'dfdfgdfgdf', 2, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `edicion`
--
ALTER TABLE `edicion`
  ADD CONSTRAINT `edicion_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `edicion_ibfk_4` FOREIGN KEY (`id_formador`) REFERENCES `formador` (`id_formador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `edi_part`
--
ALTER TABLE `edi_part`
  ADD CONSTRAINT `edi_part_ibfk_10` FOREIGN KEY (`id_edicion`) REFERENCES `edicion` (`id_edicion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `edi_part_ibfk_9` FOREIGN KEY (`id_part`) REFERENCES `participante` (`id_part`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`id_part`) REFERENCES `participante` (`id_part`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `emails_ibfk_2` FOREIGN KEY (`id_part`) REFERENCES `participante` (`id_part`);

--
-- Filtros para la tabla `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`id_edi_part`) REFERENCES `edi_part` (`id_edi_part`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `formador`
--
ALTER TABLE `formador`
  ADD CONSTRAINT `formador_ibfk_2` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `general`
--
ALTER TABLE `general`
  ADD CONSTRAINT `general_ibfk_2` FOREIGN KEY (`id_edi_part`) REFERENCES `edi_part` (`id_edi_part`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `participante_ibfk_3` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pre_event`
--
ALTER TABLE `pre_event`
  ADD CONSTRAINT `pre_event_ibfk_2` FOREIGN KEY (`id_edi_part`) REFERENCES `edi_part` (`id_edi_part`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;