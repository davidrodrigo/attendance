-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2017 a las 07:57:38
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `attendance`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `ad_pass` varchar(250) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `perfil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `ad_pass`, `id_perfil`, `perfil`) VALUES
(1, 'drodrigo@cegos.es', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` varchar(250) NOT NULL,
  `c_name` varchar(250) NOT NULL,
  `c_days` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `c_name`, `c_days`) VALUES
('c_001', 'COURSE NAME 1', 1),
('c_002', 'COURSE NAME 2', 2),
('c_003', 'COURSE NAME 3', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion`
--

CREATE TABLE `edicion` (
  `id_edicion` varchar(250) NOT NULL,
  `id_curso` varchar(250) NOT NULL,
  `ed_name` varchar(250) NOT NULL,
  `ed_fecha1` date NOT NULL,
  `ed_fecha2` date DEFAULT NULL,
  `ed_fecha3` date DEFAULT NULL,
  `ed_localizacion` varchar(250) NOT NULL,
  `id_formador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `edicion`
--

INSERT INTO `edicion` (`id_edicion`, `id_curso`, `ed_name`, `ed_fecha1`, `ed_fecha2`, `ed_fecha3`, `ed_localizacion`, `id_formador`) VALUES
('ed_001_c_001', 'c_001', 'EDITION 1 - COURSE NAME 1', '2017-12-01', NULL, NULL, 'MADRID', 5),
('ed_002_c_001', 'c_001', 'EDITION 2 - COURSE NAME 1', '2017-12-15', NULL, NULL, 'VALENCIA', 6),
('ed_003_c_002', 'c_002', 'EDITION 3 - COURSE NAME 2', '2017-11-26', '2017-11-27', NULL, 'BARCELONA', 5),
('ed_004_c_002', 'c_002', 'EDITION 4 - COURSE NAME 2', '2017-11-29', '2017-11-30', NULL, 'VALENCIA', 6),
('ed_005_c_003', 'c_003', 'EDITION 5 - COURSE NAME 3', '2017-11-19', '2017-11-20', '2017-11-28', 'MADRID', 5),
('ED_006_C003', 'c_003', 'EDITION 6 - COURSE NAME 3', '2017-12-10', '2017-12-11', '2017-12-27', 'BARCELONA', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edi_part`
--

CREATE TABLE `edi_part` (
  `id_edi_part` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `id_edicion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `edi_part`
--

INSERT INTO `edi_part` (`id_edi_part`, `id_part`, `id_edicion`) VALUES
(1, 1, 'ed_001_c_001'),
(2, 1, 'ed_002_c_001'),
(3, 1, 'ed_003_c_002'),
(4, 2, 'ed_004_c_002'),
(5, 2, 'ed_005_c_003'),
(6, 2, 'ED_006_C003'),
(7, 3, 'ed_001_c_001'),
(8, 3, 'ed_002_c_001'),
(9, 3, 'ed_003_c_002'),
(10, 4, 'ed_004_c_002'),
(11, 5, 'ed_001_c_001'),
(12, 5, 'ed_002_c_001'),
(13, 6, 'ed_003_c_002'),
(14, 6, 'ed_004_c_002'),
(15, 7, 'ed_005_c_003'),
(16, 7, 'ED_006_C003'),
(17, 8, 'ed_001_c_001'),
(18, 8, 'ed_002_c_001'),
(19, 9, 'ed_003_c_002'),
(20, 9, 'ed_004_c_002'),
(1305, 10, 'ed_001_c_001'),
(1306, 10, 'ed_001_c_001'),
(1307, 11, 'ed_003_c_002'),
(1308, 12, 'ed_005_c_003'),
(1309, 14, 'ed_003_c_002'),
(1310, 15, 'ed_001_c_001'),
(1311, 16, 'ed_003_c_002'),
(1312, 17, 'ed_005_c_003'),
(1313, 18, 'ed_001_c_001'),
(1314, 19, 'ed_003_c_002'),
(1315, 20, 'ed_001_c_001'),
(1316, 21, 'ed_003_c_002'),
(1317, 22, 'ed_005_c_003'),
(1318, 23, 'ed_002_c_001'),
(1319, 24, 'ed_004_c_002'),
(1320, 25, 'ed_002_c_001'),
(1321, 26, 'ed_004_c_002'),
(1322, 27, 'ED_006_C003'),
(1323, 28, 'ed_002_c_001'),
(1324, 29, 'ed_004_c_002'),
(1325, 30, 'ed_001_c_001'),
(1326, 31, 'ed_003_c_002'),
(1327, 32, 'ed_005_c_003'),
(1328, 33, 'ed_001_c_001'),
(1329, 34, 'ed_003_c_002'),
(1330, 35, 'ed_001_c_001'),
(1331, 36, 'ed_003_c_002'),
(1332, 37, 'ed_005_c_003'),
(1333, 38, 'ed_001_c_001'),
(1334, 39, 'ed_003_c_002'),
(1335, 40, 'ed_002_c_001'),
(1336, 41, 'ed_003_c_002'),
(1337, 42, 'ED_006_C003'),
(1338, 43, 'ed_001_c_001'),
(1339, 44, 'ed_004_c_002'),
(1340, 45, 'ed_001_c_001'),
(1341, 46, 'ed_004_c_002'),
(1342, 47, 'ed_005_c_003'),
(1343, 48, 'ed_002_c_001'),
(1344, 49, 'ed_003_c_002'),
(1345, 50, 'ed_002_c_001'),
(1346, 51, 'ed_003_c_002'),
(1347, 52, 'ED_006_C003'),
(1348, 53, 'ed_001_c_001'),
(1349, 54, 'ed_004_c_002'),
(1350, 55, 'ed_001_c_001'),
(1351, 56, 'ed_004_c_002'),
(1352, 57, 'ed_005_c_003'),
(1353, 58, 'ed_002_c_001'),
(1354, 59, 'ed_003_c_002'),
(1355, 59, 'ed_004_c_002'),
(1356, 60, 'ed_001_c_001'),
(1357, 60, 'ed_002_c_001'),
(1358, 61, 'ed_003_c_002'),
(1359, 61, 'ed_004_c_002'),
(1360, 62, 'ed_005_c_003'),
(1361, 62, 'ED_006_C003'),
(1362, 63, 'ed_001_c_001'),
(1363, 63, 'ed_002_c_001'),
(1364, 64, 'ed_003_c_002'),
(1365, 64, 'ed_004_c_002'),
(1366, 65, 'ed_001_c_001'),
(1367, 65, 'ed_002_c_001'),
(1368, 66, 'ed_003_c_002'),
(1369, 66, 'ed_004_c_002'),
(1370, 67, 'ed_005_c_003'),
(1371, 67, 'ED_006_C003'),
(1372, 68, 'ed_001_c_001'),
(1373, 68, 'ed_002_c_001'),
(1374, 69, 'ed_003_c_002'),
(1375, 69, 'ed_004_c_002'),
(1376, 70, 'ed_001_c_001'),
(1377, 70, 'ed_002_c_001'),
(1378, 71, 'ed_003_c_002'),
(1379, 71, 'ed_004_c_002'),
(1380, 72, 'ed_005_c_003'),
(1381, 72, 'ED_006_C003'),
(1382, 73, 'ed_001_c_001'),
(1383, 73, 'ed_002_c_001'),
(1384, 74, 'ed_003_c_002'),
(1385, 74, 'ed_004_c_002'),
(1386, 75, 'ed_001_c_001'),
(1387, 75, 'ed_002_c_001'),
(1388, 76, 'ed_003_c_002'),
(1389, 76, 'ed_004_c_002'),
(1390, 77, 'ed_005_c_003'),
(1391, 77, 'ED_006_C003'),
(1392, 78, 'ed_001_c_001'),
(1393, 78, 'ed_002_c_001'),
(1394, 79, 'ed_003_c_002'),
(1395, 79, 'ed_004_c_002'),
(1396, 80, 'ed_001_c_001'),
(1397, 80, 'ed_002_c_001'),
(1398, 81, 'ed_003_c_002'),
(1399, 81, 'ed_004_c_002'),
(1400, 82, 'ed_005_c_003'),
(1401, 82, 'ED_006_C003'),
(1402, 83, 'ed_001_c_001'),
(1403, 83, 'ed_002_c_001'),
(1404, 84, 'ed_003_c_002'),
(1405, 84, 'ed_004_c_002'),
(1406, 85, 'ed_001_c_001'),
(1407, 85, 'ed_002_c_001'),
(1408, 86, 'ed_003_c_002'),
(1409, 86, 'ed_004_c_002'),
(1410, 87, 'ed_005_c_003'),
(1411, 87, 'ED_006_C003');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails`
--

CREATE TABLE `emails` (
  `id_email` int(11) NOT NULL,
  `id_part` int(11) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `formador`
--

CREATE TABLE `formador` (
  `id_formador` int(11) NOT NULL,
  `for_name` varchar(250) NOT NULL,
  `for_email` varchar(250) NOT NULL,
  `for_pass` varchar(250) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formador`
--

INSERT INTO `formador` (`id_formador`, `for_name`, `for_email`, `for_pass`, `id_perfil`) VALUES
(5, 'TRAINER NAME 001', 'trainer1@trainer.com', 'trainer', 2),
(6, 'TRAINER NAME 002', 'trainer2@trainer.com', 'trainer', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE `participante` (
  `id_part` int(11) NOT NULL,
  `p_name` varchar(250) NOT NULL,
  `p_email` varchar(250) NOT NULL,
  `p_active1` tinyint(1) NOT NULL DEFAULT '0',
  `p_active2` tinyint(1) NOT NULL DEFAULT '0',
  `p_active3` tinyint(1) NOT NULL DEFAULT '0',
  `id_perfil` int(11) NOT NULL DEFAULT '3',
  `p_pass` varchar(250) NOT NULL DEFAULT 'participant'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`id_part`, `p_name`, `p_email`, `p_active1`, `p_active2`, `p_active3`, `id_perfil`, `p_pass`) VALUES
(1, 'John Doe', 'part1@part.com', 0, 0, 0, 3, 'participant'),
(2, 'James Smith', 'part200@part.com', 0, 0, 0, 3, 'participante'),
(3, 'Christopher Brown', 'part300@part.com', 0, 0, 0, 3, 'participante'),
(4, 'Ronald Lee', 'part400@part.com', 0, 0, 0, 3, 'participante'),
(5, 'Mary Wilson', 'part500@part.com', 0, 0, 0, 3, 'participante'),
(6, 'Anthony Williams', 'part600@part.com', 0, 0, 0, 3, 'participante'),
(7, 'Lisa Patel', 'part700@part.com', 0, 0, 0, 3, 'participante'),
(8, 'Michelle Taylor', 'part800@part.com', 0, 0, 0, 3, 'participante'),
(9, 'John Wong', 'part900@part.com', 0, 0, 0, 3, 'participante'),
(10, 'Patricia Thompson', 'part1000@part.com', 0, 0, 0, 3, 'participante'),
(11, 'Daniel Campbell', 'part110@part.com', 0, 0, 0, 3, 'participante'),
(12, 'Nancy Jones', 'part120@part.com', 0, 0, 0, 3, 'participante'),
(14, 'Laura Miller', 'part140@part.com', 0, 0, 0, 3, 'participante'),
(15, 'Robert Moore', 'part150@part.com', 0, 0, 0, 3, 'participante'),
(16, 'Paul Jackson', 'part160@part.com', 0, 0, 0, 3, 'participante'),
(17, 'Kevin White', 'part170@part.com', 0, 0, 0, 3, 'participante'),
(18, 'Linda Harris', 'part180@part.com', 0, 0, 0, 3, 'participante'),
(19, 'Karen Martin', 'part190@part.com', 0, 0, 0, 3, 'participante'),
(20, 'Sarah Garcia', 'part2000@part.com', 0, 0, 0, 3, 'participante'),
(21, 'Michael Robinson', 'part201@part.com', 0, 0, 0, 3, 'participante'),
(22, 'Mark Clark', 'part220@part.com', 0, 0, 0, 3, 'participante'),
(23, 'Jason Anderson', 'part230@part.com', 0, 0, 0, 3, 'participante'),
(24, 'Barbara Martinez', 'part240@part.com', 0, 0, 0, 3, 'participante'),
(25, 'Betty Walker', 'part250@part.com', 0, 0, 0, 3, 'participante'),
(26, 'Kimberly Allen', 'part260@part.com', 0, 0, 0, 3, 'participante'),
(27, 'William Young', 'part270@part.com', 0, 0, 0, 3, 'participante'),
(28, 'Donald Scott', 'part280@part.com', 0, 0, 0, 3, 'participante'),
(29, 'Jeff Nelson', 'part290@part.com', 0, 0, 0, 3, 'participante'),
(30, 'Elizabeth Carter', 'part30@part.com', 0, 0, 0, 3, 'participante'),
(31, 'Helen Mitchell', 'part31@part.com', 0, 0, 0, 3, 'participante'),
(32, 'Deborah Perez', 'part32@part.com', 0, 0, 0, 3, 'participante'),
(33, 'David Roberts', 'part33@part.com', 0, 0, 0, 3, 'participante'),
(34, 'George Phillips', 'part34@part.com', 0, 0, 0, 3, 'participante'),
(35, 'Jennifer Parker', 'part35@part.com', 0, 0, 0, 3, 'participante'),
(36, 'Richard Evans', 'part36@part.com', 0, 0, 0, 3, 'participante'),
(37, 'Kenneth Stewart', 'part37@part.com', 0, 0, 0, 3, 'participante'),
(38, 'Maria Morris', 'part38@part.com', 0, 0, 0, 3, 'participante'),
(39, 'Donna Roogers', 'part39@part.com', 0, 0, 0, 3, 'participante'),
(40, 'Charles Carter', 'part40@part.com', 0, 0, 0, 3, 'participante'),
(41, 'Steven King', 'part41@part.com', 0, 0, 0, 3, 'participante'),
(42, 'Susan Wright', 'part42@part.com', 0, 0, 0, 3, 'participante'),
(43, 'Carol Green', 'part43@part.com', 0, 0, 0, 3, 'participante'),
(44, 'Joseph Baker', 'part44@part.com', 0, 0, 0, 3, 'participante'),
(45, 'Edward Adams', 'part45@part.com', 0, 0, 0, 3, 'participante'),
(46, 'Margaret Turner', 'part46@part.com', 0, 0, 0, 3, 'participante'),
(47, 'Ruth Sanchez', 'part47@part.com', 0, 0, 0, 3, 'participante'),
(48, 'Thomas Bell', 'part48@part.com', 0, 0, 0, 3, 'participante'),
(49, 'Brian Cooper', 'part49@part.com', 0, 0, 0, 3, 'participante'),
(50, 'Dorothy Cox', 'part50@part.com', 0, 0, 0, 3, 'participante'),
(51, 'Sharon Reed', 'part51@part.com', 0, 0, 0, 3, 'participante'),
(52, 'James Smith', 'part2@part.com', 0, 0, 0, 3, 'participante'),
(53, 'Christopher Brown', 'part3@part.com', 0, 0, 0, 3, 'participante'),
(54, 'Ronald Lee', 'part4@part.com', 0, 0, 0, 3, 'participante'),
(55, 'Mary Wilson', 'part5@part.com', 0, 0, 0, 3, 'participante'),
(56, 'Lisa Patel', 'part7@part.com', 0, 0, 0, 3, 'participante'),
(57, 'Michelle Taylor', 'part8@part.com', 0, 0, 0, 3, 'participante'),
(58, 'John Wong', 'part9@part.com', 0, 0, 0, 3, 'participante'),
(59, 'Daniel Campbell', 'part11@part.com', 0, 0, 0, 3, 'participante'),
(60, 'Anthony Williams', 'part6@part.com', 0, 0, 0, 3, 'participante'),
(61, 'Patricia Thompson', 'part10@part.com', 0, 0, 0, 3, 'participante'),
(62, 'Nancy Jones', 'part12@part.com', 0, 0, 0, 3, 'participante'),
(63, 'Laura Miller', 'part14@part.com', 0, 0, 0, 3, 'participante'),
(64, 'Robert Moore', 'part15@part.com', 0, 0, 0, 3, 'participante'),
(65, 'Paul Jackson', 'part16@part.com', 0, 0, 0, 3, 'participante'),
(66, 'Kevin White', 'part17@part.com', 0, 0, 0, 3, 'participante'),
(67, 'Linda Harris', 'part18@part.com', 0, 0, 0, 3, 'participante'),
(68, 'Karen Martin', 'part19@part.com', 0, 0, 0, 3, 'participante'),
(69, 'Sarah Garcia', 'part20@part.com', 0, 0, 0, 3, 'participante'),
(70, 'Michael Robinson', 'part21@part.com', 0, 0, 0, 3, 'participante'),
(71, 'Mark Clark', 'part22@part.com', 0, 0, 0, 3, 'participante'),
(72, 'Jason Anderson', 'part23@part.com', 0, 0, 0, 3, 'participante'),
(73, 'Barbara Martinez', 'part024@part.com', 0, 0, 0, 3, 'participante'),
(74, 'Barbara Martinez', 'part24@part.com', 0, 0, 0, 3, 'participante'),
(75, 'Betty Walker', 'part25@part.com', 0, 0, 0, 3, 'participante'),
(76, 'Kimberly Allen', 'part26@part.com', 0, 0, 0, 3, 'participante'),
(77, 'William Young', 'part27@part.com', 0, 0, 0, 3, 'participante'),
(78, 'Donald Scott', 'part28@part.com', 0, 0, 0, 3, 'participante'),
(79, 'Jeff Nelson', 'part29@part.com', 0, 0, 0, 3, 'participante'),
(80, 'Elizabeth Carter', 'part0300@part.com', 0, 0, 0, 3, 'participante'),
(81, 'Helen Mitchell', 'part310@part.com', 0, 0, 0, 3, 'participante'),
(82, 'Sharon Reed', 'part051@part.com', 0, 0, 0, 3, 'participante'),
(83, 'Dorothy Cox', 'part050@part.com', 0, 0, 0, 3, 'participante'),
(84, 'Brian Cooper', 'part049@part.com', 0, 0, 0, 3, 'participante'),
(85, 'Thomas Bell', 'part048@part.com', 0, 0, 0, 3, 'participante'),
(86, 'Ruth Sanchez', 'part047@part.com', 0, 0, 0, 3, 'participante'),
(87, 'Margaret Turner', 'part046@part.com', 0, 0, 0, 3, 'participante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `perfil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `perfil`) VALUES
(1, 'admin'),
(2, 'trainer'),
(3, 'participant');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `edicion`
--
ALTER TABLE `edicion`
  ADD PRIMARY KEY (`id_edicion`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_formador` (`id_formador`);

--
-- Indices de la tabla `edi_part`
--
ALTER TABLE `edi_part`
  ADD PRIMARY KEY (`id_edi_part`),
  ADD KEY `id_part` (`id_part`),
  ADD KEY `id_edicion` (`id_edicion`);

--
-- Indices de la tabla `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id_email`),
  ADD KEY `id_part` (`id_part`);

--
-- Indices de la tabla `formador`
--
ALTER TABLE `formador`
  ADD PRIMARY KEY (`id_formador`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indices de la tabla `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`id_part`),
  ADD UNIQUE KEY `p_email` (`p_email`),
  ADD UNIQUE KEY `p_email_2` (`p_email`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `edi_part`
--
ALTER TABLE `edi_part`
  MODIFY `id_edi_part` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1412;
--
-- AUTO_INCREMENT de la tabla `emails`
--
ALTER TABLE `emails`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `formador`
--
ALTER TABLE `formador`
  MODIFY `id_formador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `participante`
--
ALTER TABLE `participante`
  MODIFY `id_part` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- Filtros para la tabla `formador`
--
ALTER TABLE `formador`
  ADD CONSTRAINT `formador_ibfk_2` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `participante_ibfk_3` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
