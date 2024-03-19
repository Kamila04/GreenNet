-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2024 a las 14:58:51
-- Versión del servidor: 11.2.0-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `greennet`
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

--
-- Volcado de datos para la tabla `publication`
--

INSERT INTO `publication` (`ID_publication`, `Title`, `Content`, `Date`, `ID_user`, `ID_topic`) VALUES
(1, 'HOLA MUNDO', 'Mi primera publicaciÃ³n', '2024-03-17', 3, NULL),
(3, 'ECOSISTEMA TERRESTRE', 'Ya son mÃ¡s de 200 Ã¡rboles plantados por estudiantes de la Universidad de Colima en la zona centro del municipio de Manzanillo, Colima ', '2024-03-17', 3, NULL),
(4, 'Â¿EDUCACIÃ“N O ADOCTRINAMIENTO?', 'Â¿El sistema educativo actual es de calidad o en realidad dirige a un adoctrinamiento para ser un empleado mÃ¡s?\r\n\r\nAlgo cuestionable desde hace tiempo es el hecho de que en la educaciÃ³n no hay materias tales como la EducaciÃ³n Financiera', '2024-03-17', 4, NULL),
(5, 'BRECHA SALARIAL EN SOFTWARE, Â¿AÃšN EXISTE?', 'La brecha salarial entre las mujeres y los hombres que trabajan en la industria del software estÃ¡ acompaÃ±ada de una brecha de acceso a niveles directivos dentro de empresas y organizaciones. SegÃºn el reporte â€œÂ¡Igualdad salarial ya!â€, en MÃ©xico, las mujeres que se dedican a la programaciÃ³n, la administraciÃ³n de sistemas y otras labores dentro de la industria del software ganan en promedio 30% menos que los hombres. El salario promedio que recibe un hombre dentro de la industria de software es de 37,201 pesos mientras que una mujer percibe alrededor de 28,533 pesos al mes.', '2024-03-17', 4, NULL),
(6, 'JORNADA DE VACUNACIÃ“N CANINA Y FELINA', 'Del domingo 17 al sÃ¡bado 23 de marzo se llevarÃ¡ a cabo en el estado de Colima la Jornada Nacional de VacunaciÃ³n Canina y Felina 2024 y, asÃ­, brindar protecciÃ³n contra la rabia a perros y gatos; habrÃ¡ puntos de vacunaciÃ³n en los diez municipios de la entidad, mediante brigadas y puestos fijos en Centros de Salud. En Manzanillo y MinatitlÃ¡n se desplegarÃ¡n brigadas de vacunaciÃ³n hasta el 28 de marzo, mientras que en ArmerÃ­a, IxtlahuacÃ¡n y TecomÃ¡n se instalarÃ¡n 32 puestos fijos en Centros de Salud de estos municipios. La ubicaciÃ³n de los puestos y de las brigadas de la Jornada Nacional de VacunaciÃ³n Canina y Felina 2024, se pueden consultar en plataformas digitales oficiales en https://bit.ly/4agXLQi', '2024-03-17', 4, NULL);

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

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`ID_Role`, `Position`, `Description`) VALUES
(1, 'administrador', 'Administrador del foro'),
(2, 'usuario', 'Usuario que interactúan y publica en el foro');

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
  `Password` varchar(60) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `ID_Role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ID_user`, `Username`, `Password`, `Email`, `ID_Role`) VALUES
(2, 'Saúl Bustamante Bernabe', '$2y$10$/JTlLYqOZ/0/5hhkBLcefuRrZScAIYftHDV7jyhZoQL1sgU9EzrLK', 'zaul.bush@hotmail.com', 2),
(3, 'Karla RM', '$2y$10$9S6Z.7qQfSAluAgYVHKMduyLyP0fVOqVrIdFmRvgt55ili8qEXi1u', 'kramirez32@ucol.mx', 2),
(4, 'Wolfkarl', '$2y$10$tFbURbIWv7uC83aTJUryFOK1OWX7qP/92UDKCAXX/Qwv//gTqbidy', 'Karlarmlp@gmail.com', 2),
(5, 'Citlaly ', '$2y$10$hnbarYeIKW.DSgJPen5VtO3zrZOlEdxekcC3jL1.qqa8pKO5IRIZq', 'csamano@ucol.mx', 2);

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
  MODIFY `ID_publication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `ID_Role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `topics`
--
ALTER TABLE `topics`
  MODIFY `ID_topic` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
