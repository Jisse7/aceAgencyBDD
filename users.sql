-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 31 mars 2024 à 14:44
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ace_agency`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nom` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `note` double NOT NULL,
  `note2` double NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `note`, `note2`) VALUES
(1, 'Jisse', 'Feydel', 15.5, 17.5),
(2, 'Emma', 'Sharma', 18, 19),
(3, 'Ehnry', 'lotter', 10, 12),
(4, 'Marque', 'ZuCoeurBergue', 12, 20),
(11, 'Jean-Christophe', 'Feydel', 20, 19),
(23, '45412123', '123456789', 15, 11),
(21, 'Roh', 'Ack', 17, 17),
(19, 'John', 'Doe', 10, 4),
(13, 'Ace', 'Agency', 20, 20),
(20, 'Vanessa', 'Feydel', 14, 18),
(22, 'Ahmed', 'Nagati', 18, 18);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
