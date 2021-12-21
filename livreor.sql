-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 21 déc. 2021 à 11:46
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
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `commentaire` text COLLATE utf8_unicode_ci NOT NULL,
  `id_article` int(11) DEFAULT NULL,
  `quand` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `pseudo`, `mail`, `commentaire`, `id_article`, `quand`) VALUES
(24, 'nico', 'noci@plateforme.io', 'test', 123, 1639989338),
(23, '`LILI', 'lili@email.fr', 'ESSAI COM<br />\r\n', 123, 1639852706),
(22, '`LILI', 'lili@email.fr', 'ESSAI COM<br />\r\n', 123, 1639852604),
(21, '`LILI', 'lili@email.fr', 'ESSAI COM<br />\r\n', 123, 1639852571),
(20, '`LILI', 'lili@email.fr', 'ESSAI COM<br />\r\n', 123, 1639852151),
(19, 'Oliv', 'olive136@live.fr', 'C&#039;est casque une bombe de technologie. je travaille dans un open-space avec plus de 50 personnes, je peut vous dire que je suis seul avec moi-m&ecirc;me. ', 123, 1639851692),
(18, 'Oliv', 'olive136@live.fr', 'C&#039;est casque une bombe de technologie. je travaille dans un open-space avec plus de 50 personnes, je peut vous dire que je suis seul avec moi-m&ecirc;me. ', 123, 1639841483);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `usersID` int(11) NOT NULL,
  `usersNames` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`usersID`, `usersNames`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(1, 'olivier d\'agostino', 'olive136@live.fr', 'oli', '1234'),
(2, 'titi', 'titi@live.fr', 'titiU', 'aaa');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `usersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
