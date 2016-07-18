SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
--
-- Base de datos: `restindexum_db`
--
CREATE DATABASE IF NOT EXISTS `restindexum_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `restindexum_db`;

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `lastname`, `address`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Abraham', 'Aquino', 'Calle Uno', 'kp@yopmail.com', 'pass123', NULL, NULL),
(2, 'Rosa', 'Lopez', 'Calle Dos', 'usuario2@gmail.com', 'aaa123', NULL, NULL),
(3, 'Ruben', 'Gomez', 'Calle Tres', 'usuario3@gmail.com', 'bbb123', NULL, NULL);
