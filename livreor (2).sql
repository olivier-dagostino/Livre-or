-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 05 jan. 2022 à 12:54
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` text COLLATE utf8_unicode_ci NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(35, 'Azertyu', 6, '2022-01-05 07:37:58'),
(1, 'COMMENTAIRE 1', 6, '2022-01-04 18:00:43'),
(36, 'Azertyu', 6, '2022-01-05 07:37:58'),
(37, 'comentaire aurélie', 24, '2022-01-05 08:46:29'),
(38, 'qsd;f,maf,;mez', 24, '2022-01-05 08:46:55'),
(39, 'slkdjfnmazdfnm', 24, '2022-01-05 08:46:58'),
(40, 'TESTE 999999', 24, '2022-01-05 08:47:15'),
(41, 'TESTE 999999', 24, '2022-01-05 08:47:47'),
(42, 'teste', 25, '2022-01-05 09:39:54'),
(43, 'teste', 25, '2022-01-05 09:40:31');

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
(23, 'Margot12', 'Margot', 'D\'Agostino', '1212', 'utilisateur'),
(24, 'Auré', 'Aurélie', 'Préauds', '123456', 'utilisateur'),
(25, 'aa', 'aa', 'aa', '12', 'utilisateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
