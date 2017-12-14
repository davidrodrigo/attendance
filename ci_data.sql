-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-10-2017 a las 16:59:18
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ci_data`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(250) NOT NULL,
  `c_fecha` date NOT NULL,
  `c_days` varchar(15) NOT NULL,
  `c_location` varchar(250) NOT NULL,
  `c_room` varchar(50) NOT NULL,
  `c_ref` varchar(10) NOT NULL,
  `c_trainer` varchar(250) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`c_id`, `c_name`, `c_fecha`, `c_days`, `c_location`, `c_room`, `c_ref`, `c_trainer`) VALUES
(1, 'Course 001', '2017-11-01', '3', 'Madrid', 'Room 1', 'curso1', 'Trainer 1'),
(2, 'Course 002', '2017-10-25', '2', 'Barcelona', 'Room 2', 'curso2', 'Trainer 2'),
(3, 'Course 003', '2017-10-28', '3', 'Valencia', 'Room 3', 'curso3', 'Trainer 3'),
(4, 'Course 004', '2018-02-09', '2', 'Madrid', 'Room 2', 'curso4', 'Trainer 2'),
(5, 'Course 005', '2017-12-13', '1', 'Madrid', 'Room 3', 'curso5', 'Trainer 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mstatus` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `verification_key` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `fullname`, `username`, `email`, `password`, `mstatus`, `gender`, `verification_key`, `active`) VALUES
(2, 'David', 'david', 'davidrope@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'male', '172522ec1028ab781d9dfd17eaca4427', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `mensajes` text NOT NULL,
  `hora` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `email`, `asunto`, `mensajes`, `hora`, `fecha`) VALUES
(1, 'david', 'davidrope@gmail.com', 'holalalalalala', 'que pasa', '10:28:20', '2017-10-25'),
(2, 'paco pérez', 'p@paco.es', 'paco peres', 'paco', '10:33:09', '2017-10-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(250) NOT NULL,
  `p_curso` varchar(250) NOT NULL,
  `p_email` varchar(250) NOT NULL,
  `p_department` varchar(250) NOT NULL,
  `p_trainer` varchar(250) NOT NULL,
  `p_active1` tinyint(1) NOT NULL DEFAULT '1',
  `p_active2` tinyint(1) NOT NULL DEFAULT '0',
  `p_active3` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(15) NOT NULL DEFAULT 'participant',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Volcado de datos para la tabla `participant`
--

INSERT INTO `participant` (`p_id`, `p_name`, `p_curso`, `p_email`, `p_department`, `p_trainer`, `p_active1`, `p_active2`, `p_active3`, `password`) VALUES
(1, 'John Doe', 'Course 001', 'part1@part.com', 'Sales', 'Trainer 1', 1, 0, 0, 'participant'),
(2, 'James Smith', 'Course 001', 'part2@part.com', 'Sales', 'Trainer 1', 1, 0, 0, 'participant'),
(3, 'Christopher Brown', 'Course 001', 'part3@part.com', '', 'Trainer 1', 0, 1, 0, 'participant'),
(4, 'Ronald Lee', 'Course 001', 'part4@part.com', '', 'Trainer 1', 0, 1, 0, 'participant'),
(5, 'Mary Wilson', 'Course 001', 'part5@part.com', '', 'Trainer 1', 1, 0, 0, 'participant'),
(6, 'Anthony Williams', 'Course 001', 'part6@part.com', '', 'Trainer 1', 0, 1, 1, 'participant'),
(7, 'Lisa Patel', 'Course 001', 'part7@part.com', '', 'Trainer 1', 1, 0, 0, 'participant'),
(8, 'Michelle Taylor', 'Course 001', 'part8@part.com', '', 'Trainer 1', 1, 0, 0, 'participant'),
(9, 'John Wong', 'Course 001', 'part9@part.com', '', 'Trainer 1', 1, 0, 0, 'participant'),
(10, 'Patricia Thompson', 'Course 001', 'part10@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(11, 'Daniel Campbell', 'Course 001', 'part11@part.com', '', 'Trainer 1', 1, 0, 0, 'participant'),
(12, 'Nancy Jones', 'Course 001', 'part12@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(14, 'Laura Miller', 'Course 001', 'part14@part.com', '', 'Trainer 1', 1, 0, 0, 'participant'),
(15, 'Robert Moore', 'Course 001', 'part15@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(16, 'Paul Jackson', 'Course 001', 'part16@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(17, 'Kevin White', 'Course 002', 'part17@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(18, 'Linda Harris', 'Course 002', 'part18@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(19, 'Karen Martin', 'Course 002', 'part19@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(20, 'Sarah Garcia', 'Course 002', 'part20@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(21, 'Michael Robinson', 'Course 002', 'part21@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(22, 'Mark Clark', 'Course 002', 'part22@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(23, 'Jason Anderson', 'Course 002', 'part23@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(24, 'Barbara Martinez', 'Course 002', 'part24@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(25, 'Betty Walker', 'Course 002', 'part25@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(26, 'Kimberly Allen', 'Course 002', 'part26@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(27, 'William Young', 'Course 002', 'part27@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(28, 'Donald Scott', 'Course 002', 'part28@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(29, 'Jeff Nelson', 'Course 002', 'part29@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(30, 'Elizabeth Carter', 'Course 002', 'part30@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(31, 'Helen Mitchell', 'Course 002', 'part31@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(32, 'Deborah Perez', 'Course 002', 'part32@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(33, 'David Roberts', 'Course 002', 'part33@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(34, 'George Phillips', 'Course 002', 'part34@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(35, 'Jennifer Parker', 'Course 002', 'part35@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(36, 'Richard Evans', 'Course 003', 'part36@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(37, 'Kenneth Stewart', 'Course 003', 'part37@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(38, 'Maria Morris', 'Course 003', 'part38@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(39, 'Donna Roogers', 'Course 003', 'part39@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(40, 'Charles Carter', 'Course 003', 'part40@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(41, 'Steven King', 'Course 003', 'part41@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(42, 'Susan Wright', 'Course 003', 'part42@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(43, 'Carol Green', 'Course 003', 'part43@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(44, 'Joseph Baker', 'Course 003', 'part44@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(45, 'Edward Adams', 'Course 003', 'part45@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(46, 'Margaret Turner', 'Course 003', 'part46@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(47, 'Ruth Sanchez', 'Course 003', 'part47@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(48, 'Thomas Bell', 'Course 003', 'part48@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(49, 'Brian Cooper', 'Course 003', 'part49@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(50, 'Dorothy Cox', 'Course 003', 'part50@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(51, 'Sharon Reed', 'Course 003', 'part51@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(52, 'James Smith', 'Course 003', 'part2@part.com', '', 'Trainer 3', 1, 0, 0, 'participant'),
(53, 'Christopher Brown', 'Course 003', 'part3@part.com', '', 'Trainer 3', 0, 1, 0, 'participant'),
(54, 'Ronald Lee', 'Course 003', 'part4@part.com', '', 'Trainer 3', 0, 1, 0, 'participant'),
(55, 'Mary Wilson', 'Course 003', 'part5@part.com', '', 'Trainer 3', 1, 0, 0, 'participant'),
(56, 'Lisa Patel', 'Course 003', 'part7@part.com', '', 'Trainer 3', 1, 0, 0, 'participant'),
(57, 'Michelle Taylor', 'Course 003', 'part8@part.com', '', 'Trainer 3', 1, 0, 0, 'participant'),
(58, 'John Wong', 'Course 003', 'part9@part.com', '', 'Trainer 3', 1, 0, 0, 'participant'),
(59, 'Daniel Campbell', 'Course 003', 'part11@part.com', '', 'Trainer 3', 1, 0, 0, 'participant'),
(60, 'Anthony Williams', 'Course 003', 'part6@part.com', '', 'Trainer 3', 0, 1, 1, 'participant'),
(61, 'Patricia Thompson', 'Course 003', 'part10@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(62, 'Nancy Jones', 'Course 003', 'part12@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(63, 'Laura Miller', 'Course 003', 'part14@part.com', '', 'Trainer 3', 1, 0, 0, 'participant'),
(64, 'Robert Moore', 'Course 003', 'part15@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(65, 'Paul Jackson', 'Course 003', 'part16@part.com', '', 'Trainer 3', 0, 0, 0, 'participant'),
(66, 'Kevin White', 'Course 004', 'part17@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(67, 'Linda Harris', 'Course 004', 'part18@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(68, 'Karen Martin', 'Course 004', 'part19@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(69, 'Sarah Garcia', 'Course 004', 'part20@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(70, 'Michael Robinson', 'Course 004', 'part21@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(71, 'Mark Clark', 'Course 004', 'part22@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(72, 'Jason Anderson', 'Course 004', 'part23@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(73, 'Barbara Martinez', 'Course 004', 'part24@part.com', '', 'Trainer 2', 0, 0, 0, 'participant'),
(74, 'Barbara Martinez', 'Course 005', 'part24@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(75, 'Betty Walker', 'Course 005', 'part25@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(76, 'Kimberly Allen', 'Course 005', 'part26@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(77, 'William Young', 'Course 005', 'part27@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(78, 'Donald Scott', 'Course 005', 'part28@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(79, 'Jeff Nelson', 'Course 005', 'part29@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(80, 'Elizabeth Carter', 'Course 005', 'part30@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(81, 'Helen Mitchell', 'Course 005', 'part31@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(82, 'Sharon Reed', 'Course 005', 'part51@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(83, 'Dorothy Cox', 'Course 005', 'part50@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(84, 'Brian Cooper', 'Course 005', 'part49@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(85, 'Thomas Bell', 'Course 005', 'part48@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(86, 'Ruth Sanchez', 'Course 005', 'part47@part.com', '', 'Trainer 1', 0, 0, 0, 'participant'),
(87, 'Margaret Turner', 'Course 005', 'part46@part.com', '', 'Trainer 1', 0, 0, 0, 'participant');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` text NOT NULL,
  `post_description` text NOT NULL,
  `post_author` text NOT NULL,
  `post_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_description`, `post_author`, `post_date`) VALUES
(1, 'we&apos;re learning Codeigniter.', 'Codeigniter is the latest framework por PHP. It´s a popular framework due to its weight and work.', 'david rodrigo', '2017-10-19'),
(3, 'Health is Important', 'Health is a gift of nature, so make sure you&apos;re healthy enough. bla, bla, bla...', 'david rodrigo', '2017-10-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test_001`
--

CREATE TABLE IF NOT EXISTS `test_001` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) NOT NULL,
  `course_location` varchar(30) NOT NULL,
  `course_room` varchar(50) DEFAULT NULL,
  `course_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `part_name` varchar(50) NOT NULL,
  `part_surname` varchar(50) NOT NULL,
  `part_email` varchar(100) NOT NULL,
  `part_department` varchar(50) DEFAULT NULL,
  `trainer_name` varchar(50) DEFAULT NULL,
  `trainer_surname` varchar(50) DEFAULT NULL,
  `trainer_email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trainer`
--

CREATE TABLE IF NOT EXISTS `trainer` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_ref` varchar(10) NOT NULL,
  `t_name` varchar(250) NOT NULL,
  `t_email` varchar(250) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `trainer`
--

INSERT INTO `trainer` (`t_id`, `t_ref`, `t_name`, `t_email`, `perfil`, `password`) VALUES
(1, 'train1', 'Trainer 1', 'trainer1@trainer.com', 'editor', 'trainer'),
(2, 'train2', 'Trainer 2', 'trainer2@trainer.com', 'editor', 'trainer'),
(3, 'train3', 'Trainer 3', 'trainer3@trainer.com', 'editor', 'trainer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `perfil`, `username`, `password`) VALUES
(1, 'administrador', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'editor', 'Trainer 1', 'ab41949825606da179db7c89ddcedcc167b64847'),
(3, 'suscriptor', 'student', '1a248d7a471ad8d5993aa523c8397ce1d0bafe78'),
(4, 'editor', 'trainer1@trainer.com', '3a54d7b078d06df444dfe3cbf5d59df094597073');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'admin', '123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
