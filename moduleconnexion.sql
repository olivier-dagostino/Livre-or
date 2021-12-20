-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 20 déc. 2021 à 08:48
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moduleconnexion`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin'),
(6, 'oli', 'Olivier', 'DAgostino', '1234', 'utilisateur'),
(9, 'laeti', 'laeti', 'lemerrer', '1234', 'utilisateur'),
(10, 'tim', 'tim', 'timi', '12', 'utilisateur'),
(11, 'ellaf', 'Sirine', 'DJAOUEL', 'Sdlesang', 'utilisateur'),
(12, 'tom', 'tom', 'im', '1234', 'utilisateur'),
(13, 'alexdago', 'alex', 'dago', '1234', 'utilisateur'),
(18, 'Nico1', 'Nicolas', 'fanjas', '12345', 'utilisateur'),
(19, 'Alex', 'Alexandre', 'D\'AGOSTINO', '12345', 'utilisateur'),
(20, 'OLIV12', 'Olivier', 'dago', '1111', 'utilisateur'),
(21, 'Val', 'Valerie', 'Quickert', '2222', 'utilisateur'),
(23, 'Margot12', 'Margot', 'D\'Agostino', '1212', 'utilisateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
