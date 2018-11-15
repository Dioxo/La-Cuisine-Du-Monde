-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2018 a las 16:14:34
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cuisine_du_monde`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commentaire`
--

CREATE TABLE `commentaire` (
  `numCom` int(11) NOT NULL,
  `Contenu` varchar(300) NOT NULL,
  `numUser` int(11) NOT NULL,
  `numRecette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contient`
--

CREATE TABLE `contient` (
  `numIngredient` int(11) NOT NULL,
  `numRecette` int(11) NOT NULL,
  `Quantite` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contient`
--

INSERT INTO `contient` (`numIngredient`, `numRecette`, `Quantite`) VALUES
(1, 1, '500g'),
(2, 1, '80g'),
(3, 1, '8g'),
(3, 2, NULL),
(4, 1, '25g'),
(5, 1, '2'),
(6, 1, '180ml'),
(7, 1, '100g'),
(8, 2, ''),
(9, 2, '350g'),
(10, 2, '350g'),
(11, 2, '350g'),
(12, 2, '500g'),
(13, 2, '3 gousses'),
(14, 2, '6 cuillères à soupe'),
(15, 2, '1 brin'),
(16, 2, '1'),
(17, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `est_du_type`
--

CREATE TABLE `est_du_type` (
  `numRecette` int(11) NOT NULL,
  `numType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `follow`
--

CREATE TABLE `follow` (
  `numUser` int(11) NOT NULL,
  `numUser_Utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredient`
--

CREATE TABLE `ingredient` (
  `numIngredient` int(11) NOT NULL,
  `nomIngredient` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingredient`
--

INSERT INTO `ingredient` (`numIngredient`, `nomIngredient`) VALUES
(1, 'farine'),
(2, 'sucre'),
(3, 'sel'),
(4, 'levure'),
(5, 'oeuf'),
(6, 'lait'),
(7, 'beurre'),
(8, 'aubergine'),
(9, 'courgette'),
(10, 'poivron'),
(11, 'oignon'),
(12, 'tomate'),
(13, 'ail'),
(14, 'huile d\'olive'),
(15, 'thym'),
(16, 'feuille de laurier'),
(17, 'poivre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `note`
--

CREATE TABLE `note` (
  `note` int(11) NOT NULL,
  `numUser` int(11) NOT NULL,
  `numRecette` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notification`
--

CREATE TABLE `notification` (
  `numNotif` int(11) NOT NULL,
  `Contenu` varchar(50) NOT NULL,
  `numUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recette`
--

CREATE TABLE `recette` (
  `numRecette` int(11) NOT NULL,
  `Titre` varchar(50) NOT NULL,
  `Image` varchar(50) DEFAULT NULL,
  `Video` varchar(50) DEFAULT NULL,
  `Description` varchar(10000) NOT NULL,
  `Temps` varchar(20) DEFAULT NULL,
  `NbPersonne` int(11) DEFAULT NULL,
  `Origine` varchar(50) DEFAULT NULL,
  `Arome` varchar(50) DEFAULT NULL,
  `Fete` varchar(50) DEFAULT NULL,
  `Gout` smallint(6) NOT NULL COMMENT '1: salé / 2: sucré / 3: sucré-salé',
  `Auteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recette`
--

INSERT INTO `recette` (`numRecette`, `Titre`, `Image`, `Video`, `Description`, `Temps`, `NbPersonne`, `Origine`, `Arome`, `Fete`, `Gout`, `Auteur`) VALUES
(1, 'Brioche Tressée', '1.png', NULL, 'Vous allez voir, cette recette de brioche tressée est vraiment facile !\r\n\r\nPlacez les ingrédients dans la cuve en respectant bien l\'ordre, c\'est important. On met d\'abord la farine, puis le sucre d\'un côté, et le sel de l\'autre.\r\n\r\nFormez un puits au centre de la farine et émiettez la levure à l\'intérieur. Il ne faut surtout pas que la farine touche le sel car il la tuerait (et personne ne voudrait assister à une telle scène !)\r\n\r\nPlacez ensuite les oeufs sur la levure. Ils vont la protéger du sel.\r\n\r\nVersez ensuite le lait sur le dessus.\r\n\r\nPétrissez le tout avec le crochet du robot pendant 5 à 10 minutes, sur puissance moyenne. La pâte doit se décoller des parois de la cuve.\r\n\r\n\r\n\r\nAjoutez le beurre en morceaux, petit à petit, sans cesser de pétrir. Il vous faudra environ 5 minutes pour incorporer tout le beurre.\r\n\r\nLaissez tourner le robot pendant encore 5 minutes environ (plus si nécessaire), jusqu\'à ce que la pâte se décolle des parois de la cuve.\r\n\r\nJe teste actuellement chez moi le Cooking chef de chez Kenwood. J\'ai donc laissé ma pâte dans le robot et je m\'en suis servie comme étuve en le réglant sur 28°C.\r\n \r\nSi vous n\'avez pas de robot chauffant, placez votre cuve dans un endroit chaud comme près d\'un chauffage. Attention à ne pas dépasser les 29°C pour ne pas faire fondre votre beurre.\r\n\r\nLaissez pousser ainsi pendant 1h30. La pâte doit doubler de volume.\r\n\r\nAu bout d\'1h30, versez la pâte sur un plan de travail fariné et divisez-la en 2. Réservez une moitié et étalez l\'autre en rectangle. Coupez-la en 3 pour avoir 3 longues bandes.\r\nFormez des boudins avec ces bandes. N\'hésitez pas à regarder la vidéo pour visualiser la technique.\r\n\r\nRetournez les boudins de façon à avoir la soudure en-dessous. \r\nCollez les 3 extrémités entre elles et formez une tresse. Ne la serrez pas trop car la brioche va bien gonfler.\r\n\r\nFaites de même avec la seconde moitié de pâte.\r\n\r\nLaissez pousser 1 heure, toujours au chaud. \r\n\r\nAu bout d\'une heure, préchauffez le four à 180°C.\r\n\r\nMélangez ensemble un jaune d\'oeuf et 2 cuillères à soupe de lait. Badigeonnez ce mélange sur les brioches tressées avec un pinceau alimentaire.\r\n\r\nEnfournez 10 minutes.\r\n\r\nSortez les brioches du four et dorez de nouveau. Parsemez de quelques grains de sucre perlé. ré-enfournez 10 minutes.\r\n\r\nC\'est prêt ! ', '90 min', 10, NULL, NULL, NULL, 2, 2),
(2, 'Ratatouille', '2.png', NULL, 'Etape 1\r\nCoupez les tomates pelées en quartiers,\r\nEtape 2\r\nles aubergines et les courgettes en rondelles.\r\nEtape 3\r\nEmincez les poivrons en lamelles\r\nEtape 4\r\net l\'oignon en rouelles.\r\nEtape 5\r\nChauffez 2 cuillères à soupe d\'huile dans une poêle\r\nEtape 6\r\net faites-y fondre les oignons et les poivrons.\r\nEtape 7\r\nLorsqu\'ils sont tendres, ajoutez les tomates, l\'ail haché, le thym et le laurier.\r\nEtape 8\r\nSalez, poivrez et laissez mijoter doucement à couvert durant 45 minutes.\r\nEtape 9\r\nPendant ce temps, préparez les aubergines et les courgettes. Faites les cuire séparemment ou non dans l\'huile d\'olive pendant 15 minutes.\r\nEtape 10\r\nVérifiez la cuisson des légumes pour qu\'ils ne soient plus fermes. Ajoutez les alors au mélange de tomates et prolongez la cuisson sur tout petit feu pendant 10 min.\r\nEtape 11\r\nSalez et poivrez si besoin.\r\nNote de l\'auteur\r\nTrès bon chaud mais peut aussi se servir froid.', '1h20', 4, NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type`
--

CREATE TABLE `type` (
  `numType` int(11) NOT NULL,
  `nomType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `utilisateur`
--

CREATE TABLE `utilisateur` (
  `numUser` int(11) NOT NULL,
  `Pseudo` varchar(50) NOT NULL,
  `Mdp` varchar(50) NOT NULL,
  `Genre` char(1) NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  `Image` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `utilisateur`
--

INSERT INTO `utilisateur` (`numUser`, `Pseudo`, `Mdp`, `Genre`, `Admin`, `Image`, `Email`) VALUES
(1, 'Billy', 'billy', 'm', 1, '1.png', 'amaury.loeillet@gmail.com'),
(2, 'Marine', 'marine', 'f', 1, '2.png', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`numCom`),
  ADD KEY `commentaire_Utilisateur_FK` (`numUser`),
  ADD KEY `commentaire_Recette0_FK` (`numRecette`);

--
-- Indices de la tabla `contient`
--
ALTER TABLE `contient`
  ADD PRIMARY KEY (`numIngredient`,`numRecette`),
  ADD KEY `contient_Recette0_FK` (`numRecette`);

--
-- Indices de la tabla `est_du_type`
--
ALTER TABLE `est_du_type`
  ADD KEY `numRecette` (`numRecette`),
  ADD KEY `numType` (`numType`);

--
-- Indices de la tabla `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`numUser`,`numUser_Utilisateur`),
  ADD KEY `follow_Utilisateur0_FK` (`numUser_Utilisateur`);

--
-- Indices de la tabla `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`numIngredient`);

--
-- Indices de la tabla `note`
--
ALTER TABLE `note`
  ADD KEY `numRecette` (`numRecette`),
  ADD KEY `numUser` (`numUser`);

--
-- Indices de la tabla `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`numNotif`),
  ADD KEY `Notification_Utilisateur_FK` (`numUser`);

--
-- Indices de la tabla `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`numRecette`),
  ADD KEY `Recette_Utilisateur0_FK` (`Auteur`);

--
-- Indices de la tabla `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`numType`);

--
-- Indices de la tabla `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`numUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `numCom` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `numIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `notification`
--
ALTER TABLE `notification`
  MODIFY `numNotif` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `recette`
--
ALTER TABLE `recette`
  MODIFY `numRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `type`
--
ALTER TABLE `type`
  MODIFY `numType` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `numUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_Recette0_FK` FOREIGN KEY (`numRecette`) REFERENCES `recette` (`numRecette`),
  ADD CONSTRAINT `commentaire_Utilisateur_FK` FOREIGN KEY (`numUser`) REFERENCES `utilisateur` (`numUser`);

--
-- Filtros para la tabla `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `contient_Ingredient_FK` FOREIGN KEY (`numIngredient`) REFERENCES `ingredient` (`numIngredient`),
  ADD CONSTRAINT `contient_Recette0_FK` FOREIGN KEY (`numRecette`) REFERENCES `recette` (`numRecette`);

--
-- Filtros para la tabla `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_Utilisateur0_FK` FOREIGN KEY (`numUser_Utilisateur`) REFERENCES `utilisateur` (`numUser`),
  ADD CONSTRAINT `follow_Utilisateur_FK` FOREIGN KEY (`numUser`) REFERENCES `utilisateur` (`numUser`);

--
-- Filtros para la tabla `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `Notification_Utilisateur_FK` FOREIGN KEY (`numUser`) REFERENCES `utilisateur` (`numUser`);

--
-- Filtros para la tabla `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `Recette_Utilisateur0_FK` FOREIGN KEY (`Auteur`) REFERENCES `utilisateur` (`numUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
