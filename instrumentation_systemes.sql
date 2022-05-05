-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 28 mars 2022 à 19:48
-- Version du serveur :  5.5.68-MariaDB
-- Version de PHP : 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `instrumentation_systemes`
--
CREATE DATABASE IF NOT EXISTS `instrumentation_systemes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `instrumentation_systemes`;

-- --------------------------------------------------------

--
-- Structure de la table `MesurePS`
--
-- Création : lun. 21 mars 2022 à 15:45
--

CREATE TABLE `MesurePS` (
  `ID` int(11) NOT NULL,
  `id_ps` int(11) NOT NULL,
  `Horodatage` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Inclination_Panneau` int(11) NOT NULL,
  `Orientation_Panneau` int(11) NOT NULL,
  `I_Panneau` float NOT NULL,
  `I_Batterie` float NOT NULL,
  `V_Panneau` float NOT NULL,
  `V_Batterie` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='panneau solaire';

--
-- Déchargement des données de la table `MesurePS`
--

INSERT INTO `MesurePS` (`ID`, `id_ps`, `Horodatage`, `Inclination_Panneau`, `Orientation_Panneau`, `I_Panneau`, `I_Batterie`, `V_Panneau`, `V_Batterie`) VALUES
(1, 1, '2022-03-21 15:45:28', 47, 77, 7, 77, 77, 77),
(2, 1, '2022-03-28 07:20:34', 33, 33, 33, 33, 33, 33),
(3, 1, '2022-03-28 07:22:16', 45, 60, 45, 45, 5, 896),
(4, 1, '2022-03-28 07:27:13', -20, 50, 789, 45, 563, 33),
(5, 1, '2022-03-28 07:39:18', 77, 77, 77, 77, 77, 77),
(6, 1, '2022-03-28 07:42:24', 52, 60, 789, 77, 5, 896);

-- --------------------------------------------------------

--
-- Structure de la table `MesureRL`
--
-- Création : jeu. 17 mars 2022 à 15:03
--

CREATE TABLE `MesureRL` (
  `ID` int(11) NOT NULL,
  `id_rl` int(11) NOT NULL,
  `Horodatage` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `consommation` float NOT NULL,
  `tmp_marche` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='régie lumière';

--
-- Déchargement des données de la table `MesureRL`
--

INSERT INTO `MesureRL` (`ID`, `id_rl`, `Horodatage`, `consommation`, `tmp_marche`) VALUES
(1, 1, '2022-03-17 15:03:00', 4561, '00:00:56');

-- --------------------------------------------------------

--
-- Structure de la table `Panneau_Solaire`
--
-- Création : jeu. 17 mars 2022 à 15:39
--

CREATE TABLE `Panneau_Solaire` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='panneau solaire';

--
-- Déchargement des données de la table `Panneau_Solaire`
--

INSERT INTO `Panneau_Solaire` (`ID`, `Nom`) VALUES
(1, 'AS1'),
(2, 'AS2');

-- --------------------------------------------------------

--
-- Structure de la table `Regie_Lumiere`
--
-- Création : jeu. 17 mars 2022 à 15:39
--

CREATE TABLE `Regie_Lumiere` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='régie lumière';

--
-- Déchargement des données de la table `Regie_Lumiere`
--

INSERT INTO `Regie_Lumiere` (`ID`, `NOM`) VALUES
(1, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `MesurePS`
--
ALTER TABLE `MesurePS`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_ps` (`id_ps`);

--
-- Index pour la table `MesureRL`
--
ALTER TABLE `MesureRL`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `id_rl` (`id_rl`);

--
-- Index pour la table `Panneau_Solaire`
--
ALTER TABLE `Panneau_Solaire`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Regie_Lumiere`
--
ALTER TABLE `Regie_Lumiere`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `MesurePS`
--
ALTER TABLE `MesurePS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `MesureRL`
--
ALTER TABLE `MesureRL`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Panneau_Solaire`
--
ALTER TABLE `Panneau_Solaire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Regie_Lumiere`
--
ALTER TABLE `Regie_Lumiere`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `MesurePS`
--
ALTER TABLE `MesurePS`
  ADD CONSTRAINT `MesurePS_ibfk_1` FOREIGN KEY (`id_ps`) REFERENCES `Panneau_Solaire` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `MesureRL`
--
ALTER TABLE `MesureRL`
  ADD CONSTRAINT `MesureRL_ibfk_1` FOREIGN KEY (`id_rl`) REFERENCES `Regie_Lumiere` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
