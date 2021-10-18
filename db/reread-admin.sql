-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-10-2020 a las 17:46:39
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reread-admin`
--
CREATE DATABASE IF NOT EXISTS `reread` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `reread`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Authors`
--

CREATE TABLE `Authors` (
  `Id` int(11) NOT NULL,
  `Name` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `Country` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Authors`
--

INSERT INTO `Authors` (`Id`, `Name`, `Country`) VALUES
(1, 'Gabriel García Márquez', 'Colombia'),
(2, 'Varios autores', 'Otros'),
(3, 'Mercedes Franco', 'Venezuela'),
(4, 'Vicenç Pagès Jordà', 'España'),
(6, 'Jordi Gracia Garcia', 'España'),
(7, 'Toni Morrison', 'Estados Unidos'),
(12, 'Isabel Allende', 'Chile');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Books`
--

CREATE TABLE `Books` (
  `Id` int(11) NOT NULL,
  `Title` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Description` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `eBook` tinyint(1) NOT NULL,
  `img` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Top` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Books`
--

INSERT INTO `Books` (`Id`, `Title`, `Description`, `eBook`, `img`, `Top`) VALUES
(6, 'Cien años de soledad', 'Es considerada una obra maestra de la literatura hispanoamericana y universal, así como una de las obras más traducidas y leídas en español.​', 1, '5CC3DECF-C21F-4A5A-8952-5A62961142E2.jpeg', 1),
(7, 'El amor en los tiempos del cólera', 'Es una novela dedicada al verdadero amor que perdura y supera las adversidades toda una vida, es un homenaje al amor, las aventuras, el tiempo, la vejez y la muerte.', 1, 'A05E8686-AC6B-41F9-A543-B83E14F6C611.jpeg', 1),
(8, 'Fuera de norma: Antología de pensamiento feminista hispanoamericano', 'Fuera de norma reúne los más importantes artículos, cartas y ensayos referentes a los derechos de las mujeres y al movimiento feminista en Hispanoamérica...', 1, '6BB9D208-5BC2-4A93-B572-4F0867DF26FE.jpeg', 1),
(9, 'La Otredad: Antología de cuentos latinoamericanos del siglo XX', 'Una antología de escritores latinoamericanos, correspondientes a distintas etapas de la historia de la literatura del siglo XX y con diversas temáticas y estilos, que presenta a la otredad en sus múltiples formas.', 1, 'BEE2A4E9-B92F-4397-B782-F12830C468D4.jpeg', 0),
(10, 'Los funerales de la Mamá Grande', 'Los funerales de la Mamá Grande es una colección de ocho cuentos del escritor colombiano Gabriel García Márquez.', 1, '4C6F348C-6B6E-4718-AFA7-0061BBDD9F81.jpeg', 0),
(11, 'La Sayona y otros cuentos de espanto', 'Quién es la Sayona? ¿Había fantasmas en la época de Simón Bolívar? ¿Qué criaturas antropófagas acechan en la selva amazónica? En todas partes existen leyendas terroríficas sobre fantasmas y apariciones.', 1, 'AFD8133D-85D8-4D7C-9FEF-A3C9C4C7A706.jpeg', 0),
(12, 'Les olors en la literatura', 'Fa més d’una dècada que l’escriptor i crític literari Vicenç Pagès Jordà ha anat “col·leccionant” fragments literaris d’autors universals on apareixen olors i pudors.', 1, '31550B74-AF90-40DA-8476-89227E3270EE.jpeg', 0),
(13, 'La casa de los espíritus', 'La casa de los espíritus es la primera novela de la escritora chilena Isabel Allende.', 1, '99F36406-989E-408A-8F8D-2B57257F9362.jpeg', 1),
(14, 'Miguel de Cervantes: La conquista de la ironia', 'Esta biografía aspira a despojar a Cervantes de los 400 años de historia que le han caído encima para acercarnos a su dimensión humana y sentimental...', 1, '90C592F9-F2D4-47C1-BA96-D56D29FE9087.jpeg', 0),
(15, 'La canción de Salomón', 'Una novela poderosa, sensual y poética que explora la historia que une cuatro generaciones de una familia erróneamente llamada Dead.', 1, '56E05DC6-E8B7-4084-8A69-29E1B0EF7418.jpeg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BooksAuthors`
--

CREATE TABLE `BooksAuthors` (
  `AuthorId` int(11) NOT NULL,
  `BookId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `BooksAuthors`
--

INSERT INTO `BooksAuthors` (`AuthorId`, `BookId`) VALUES
(1, 6),
(1, 7),
(1, 10),
(12, 13),
(6, 14),
(3, 11),
(7, 15),
(2, 8),
(2, 9),
(4, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Users`
--

CREATE TABLE `Users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Pass` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `Users`
--

INSERT INTO `Users` (`Id`, `Name`, `Email`, `Pass`) VALUES
(1, 'Random', 'random@random.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Test', 'test@test.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Authors`
--
ALTER TABLE `Authors`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `BooksAuthors`
--
ALTER TABLE `BooksAuthors`
  ADD KEY `AuthorId` (`AuthorId`),
  ADD KEY `BookId` (`BookId`);

--
-- Indices de la tabla `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Authors`
--
ALTER TABLE `Authors`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `Books`
--
ALTER TABLE `Books`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `BooksAuthors`
--
ALTER TABLE `BooksAuthors`
  ADD CONSTRAINT `BooksAuthors_ibfk_1` FOREIGN KEY (`AuthorId`) REFERENCES `Authors` (`Id`),
  ADD CONSTRAINT `BooksAuthors_ibfk_2` FOREIGN KEY (`BookId`) REFERENCES `Books` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
