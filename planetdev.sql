-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 22 jan. 2023 à 16:57
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `planetdev`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'adminadmin');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `smalltitle` varchar(255) DEFAULT NULL,
  `paragraph` varchar(255) DEFAULT NULL,
  `linkes` varchar(255) DEFAULT NULL,
  `autour` int(11) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `image`, `smalltitle`, `paragraph`, `linkes`, `autour`, `categoryid`) VALUES
(75, 'Nostrum nobis conseq', 'book-63cd55edb5f17.', 'Quis excepturi aute ', 'Ea nihil placeat qu', 'https://www.covimedugosyv.in', 1, 1),
(76, 'Sit quasi nihil quia', 'book-63cd56402d9de.', 'Sed aliquid at debit', 'Non tempor nulla con', 'https://www.cuqevy.in', 1, 2),
(77, 'Cupidatat ea nostrud', 'book-63cd55edbce7d.', 'Perferendis est plac', 'Qui dolor laudantium', 'https://www.zisopulenasyv.cc', 1, 3),
(78, 'Laboris fugiat persp', 'book-63cd5638548f0.jpg', 'Dolore repudiandae d', 'Provident quas perf', 'https://www.totupagokysov.me.uk', 1, 1),
(80, 'Pariatur Magni quas', 'book-63cd5c6532fa1.', 'Elit et et officiis', 'Neque voluptas sed i', 'https://www.nagazepoji.mobi', 1, 1),
(81, 'Molestiae minima odi', 'book-63cd5c6537a11.', 'Dolor nihil aut aut ', 'Explicabo Qui repre', 'https://www.lygu.cm', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `categoryname`) VALUES
(1, 'category1'),
(2, 'category2'),
(3, 'category3');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autour` (`autour`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`autour`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
