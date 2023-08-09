-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : dim. 01 jan. 2023 à 18:03
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
(4, 1, 'petrole off-chores', 'A (1).pdf', '2022-12-30'),
(6, 2, 'les roches médicinales des fonds marins ', 'TP_VPN__IPSEC (1).pdf', '2022-12-30'),
(7, 3, 'océanographies', 'AnalNumESP21-22 (1).pdf', '2022-12-30');

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
(1, 'test@gmail.com', 'passer', 'Tall', 'Abdoulaye', 'chercheur'),
(2, 'abdou.lahat@lpaosf.sn', 'passer', 'Dieng', 'Abdou lahat', 'chercheur'),
(3, 'abdoulaye206@gmail.com', 'passer', 'Sow', 'Laye', 'secretaire');

--
-- Index pour les tables déchargées
--

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
-- AUTO_INCREMENT pour la table `traveaux`
--
ALTER TABLE `traveaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `events` (
  `idEvent` int primary key auto_increment,
  `name` varchar(30),
  `description` varchar(255),
  `date` date,
)ENGINE=InnoDB DEFAULT CHARSET=utf8;