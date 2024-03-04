-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2024 a las 04:38:19
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `greenet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `ID_comment` int(11) NOT NULL,
  `Content` text NOT NULL,
  `Date` datetime NOT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `ID_publication` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publication`
--

CREATE TABLE `publication` (
  `ID_publication` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Content` text NOT NULL,
  `Date` date NOT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `ID_topic` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reactions_comments`
--

CREATE TABLE `reactions_comments` (
  `ID_reaction` int(11) NOT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `ID_type` int(11) DEFAULT NULL,
  `ID_comment` int(11) DEFAULT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reactions_publications`
--

CREATE TABLE `reactions_publications` (
  `ID_reaction` int(11) NOT NULL,
  `ID_user` int(11) DEFAULT NULL,
  `ID_type` int(11) DEFAULT NULL,
  `ID_publication` int(11) DEFAULT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reaction_type`
--

CREATE TABLE `reaction_type` (
  `ID_type` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `ID_Role` int(11) NOT NULL,
  `Position` varchar(30) NOT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topics`
--

CREATE TABLE `topics` (
  `ID_topic` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `ID_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `ID_user` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `ID_Role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID_comment`),
  ADD KEY `comments_ibfk_1` (`ID_publication`),
  ADD KEY `comments_ibfk_2` (`ID_user`);

--
-- Indices de la tabla `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`ID_publication`),
  ADD KEY `publication_ibfk_1` (`ID_user`),
  ADD KEY `publication_ibfk_2` (`ID_topic`);

--
-- Indices de la tabla `reactions_comments`
--
ALTER TABLE `reactions_comments`
  ADD PRIMARY KEY (`ID_reaction`),
  ADD KEY `reactions_comments_ibfk_1` (`ID_user`),
  ADD KEY `reactions_comments_ibfk_2` (`ID_type`),
  ADD KEY `reactions_comments_ibfk_3` (`ID_comment`);

--
-- Indices de la tabla `reactions_publications`
--
ALTER TABLE `reactions_publications`
  ADD PRIMARY KEY (`ID_reaction`),
  ADD KEY `reactions_publications_ibfk_1` (`ID_user`),
  ADD KEY `reactions_publications_ibfk_2` (`ID_type`),
  ADD KEY `reactions_publications_ibfk_3` (`ID_publication`);

--
-- Indices de la tabla `reaction_type`
--
ALTER TABLE `reaction_type`
  ADD PRIMARY KEY (`ID_type`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_Role`);

--
-- Indices de la tabla `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`ID_topic`),
  ADD KEY `topics_ibfk_1` (`ID_user`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`),
  ADD KEY `user_ibfk_1` (`ID_Role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `ID_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publication`
--
ALTER TABLE `publication`
  MODIFY `ID_publication` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reactions_comments`
--
ALTER TABLE `reactions_comments`
  MODIFY `ID_reaction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reactions_publications`
--
ALTER TABLE `reactions_publications`
  MODIFY `ID_reaction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reaction_type`
--
ALTER TABLE `reaction_type`
  MODIFY `ID_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `ID_Role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `topics`
--
ALTER TABLE `topics`
  MODIFY `ID_topic` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`ID_publication`) REFERENCES `publication` (`ID_publication`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `publication_ibfk_2` FOREIGN KEY (`ID_topic`) REFERENCES `topics` (`ID_topic`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `reactions_comments`
--
ALTER TABLE `reactions_comments`
  ADD CONSTRAINT `reactions_comments_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reactions_comments_ibfk_2` FOREIGN KEY (`ID_type`) REFERENCES `reaction_type` (`ID_type`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reactions_comments_ibfk_3` FOREIGN KEY (`ID_comment`) REFERENCES `comments` (`ID_comment`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `reactions_publications`
--
ALTER TABLE `reactions_publications`
  ADD CONSTRAINT `reactions_publications_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reactions_publications_ibfk_2` FOREIGN KEY (`ID_type`) REFERENCES `reaction_type` (`ID_type`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `reactions_publications_ibfk_3` FOREIGN KEY (`ID_publication`) REFERENCES `publication` (`ID_publication`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID_Role`) REFERENCES `role` (`ID_Role`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
