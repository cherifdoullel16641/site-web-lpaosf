-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 06 fév. 2023 à 03:02
-- Version du serveur :  5.7.34-log
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lpaosf`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `idEvent` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`idEvent`, `name`, `description`, `date`) VALUES
(2, 'test test', 'test test', '2023-02-10');

-- --------------------------------------------------------

--
-- Structure de la table `traveaux`
--

CREATE TABLE `traveaux` (
  `id` int(11) NOT NULL,
  `idproprietaire` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `traveaux`
--

INSERT INTO `traveaux` (`id`, `idproprietaire`, `titre`, `document`, `date`) VALUES
(3, 1, 'pollution au Senegal cas de la baleine de yoff', 'TP_VPN__IPSEC (1).pdf', '2022-12-30'),
(6, 2, 'les roches médicinales des fonds marins ', 'TP_VPN__IPSEC (1).pdf', '2022-12-30'),
(7, 3, 'océanographies', 'AnalNumESP21-22 (1).pdf', '2022-12-30'),
(8, 6, 'test', 'Chapitre 4 Méthode moindre carrées 2.pdf', '2023-02-04'),
(9, 6, 'test2', 'cours-ipv6-4.pdf', '2023-02-04'),
(10, 6, 'test3', 'Exercices AN.pdf', '2023-02-04');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `mdp`, `nom`, `prenom`, `fonction`) VALUES
(1, 'test@gmail.com', 'passer123', 'Tall', 'Abdoulaye', 'chercheur'),
(2, 'abdou.lahat@lpaosf.sn', 'passer', 'Dieng', 'Abdou lahat', 'chercheur'),
(3, 'abdoulaye206@gmail.com', 'passer', 'Sow', 'Laye', 'secretaire'),
(6, 'admin@gmail.com', 'passer', 'admin', 'admin', 'admin'),
(7, 'test2@gmail.com', 'passer', 'test2', 'test2', 'test'),
(8, 'test3@gmail.com', 'passer', 'test3', 'test3', 'test'),
(9, 'test2@gmail.com', 'passer', 'test2', 'test2', 'test'),
(12, 'abdou@gmail.com', 'motdepasse', 'ba', 'abdou', 'secretaire');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`idEvent`);

--
-- Index pour la table `traveaux`
--
ALTER TABLE `traveaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `idEvent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `traveaux`
--
ALTER TABLE `traveaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
