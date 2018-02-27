-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2018 a las 22:15:19
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `vanhack`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(30) COLLATE utf8_bin NOT NULL,
  `user` varchar(20) COLLATE utf8_bin NOT NULL,
  `pass` varchar(50) COLLATE utf8_bin NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `lastname`, `user`, `pass`, `creation_date`, `update_date`) VALUES
(1, 'Cristian', 'Urrutia', 'cris', '7bb0bb352ffb2f5245f25149889a0c76', '2018-02-21 23:49:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL,
  `post_id` int(4) NOT NULL,
  `comment` varchar(1000) COLLATE utf8_bin NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `post_id`, `comment`, `creation_date`) VALUES
(1, 1, 1, 'comment numer one', '2018-02-23 23:42:37'),
(2, 1, 1, 'this is my second comment', '2018-02-23 23:42:42'),
(3, 1, 2, 'comment in the secont post!!', '2018-02-23 23:48:48'),
(4, 1, 2, 'new comment', '2018-02-24 00:41:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL,
  `title` varchar(250) COLLATE utf8_bin NOT NULL,
  `content` varchar(1000) COLLATE utf8_bin NOT NULL,
  `category` varchar(100) COLLATE utf8_bin NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `title`, `content`, `category`, `date_creation`, `date_update`) VALUES
(1, 1, 'New Post, Thanks for reading', 'Hello world, this is the first post, I'', really happy with mi new orivate forum', 'Hello', '2018-02-23 23:41:56', '0000-00-00 00:00:00'),
(2, 1, 'secont post in the forum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ut pellentesque odio. Maecenas convallis varius finibus. Donec viverra iaculis dui vel molestie. Donec non pellentesque eros. Cras eleifend vestibulum nisl, bibendum gravida tellus. Pellentesque orci odio, feugiat nec vestibulum non, aliquet quis arcu. Praesent facilisis placerat semper. Cras varius, ante eu aliquet malesuada, nunc urna egestas libero, sit amet rhoncus mauris ex a nunc. Nunc facilisis nisl vel tempor convallis. Aliquam erat volutpat. Proin rhoncus, ipsum eu tempus pulvinar, sem ante porta lectus, at interdum nisi erat ut tortor.\n', 'Advice', '2018-02-23 23:47:39', '2018-02-23 23:48:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
