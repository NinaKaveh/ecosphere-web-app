-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 09 mai 2020 à 04:09
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecosphere`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(127) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `date`, `id_user`) VALUES
(1, 'This title is retrivied from the BDD via PHP.', 'Allofthicontent has been retrivied from the BDD in order to test the content field.', '2020-04-30', 1),
(2, 'This title2 is retrivied from the BDD via PHP.', 'All of thi content2 has been retrivied from the BDD in order to test the content field.', '2020-05-01', 1),
(3, 'This title3 is retrivied from the BDD via PHP.', 'All of this content3 has been retrivied from the BDD in order to test the content field.', '2020-05-01', 1),
(8, 'all of this content3 has been retrivied from the bdd in order to test the content field.', 'all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.all of this content3 has been retrivied from the bdd in order to test the content field.', '2020-05-09', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `like_article`
--

DROP TABLE IF EXISTS `like_article`;
CREATE TABLE IF NOT EXISTS `like_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_article` (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `like_comment`
--

DROP TABLE IF EXISTS `like_comment`;
CREATE TABLE IF NOT EXISTS `like_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_comment` (`id_comment`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_bin NOT NULL,
  `email` varchar(128) COLLATE utf8_bin NOT NULL,
  `password` varchar(512) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bio` varchar(512) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `xp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `bio`, `xp`) VALUES
(1, 'Michel', 'miche@yopmail.com', '$2y$10$nzM.H67f1QBEKarYSaS1aeaZ2gqt56HpXRLTw1XenxN/Dyahuuv9m', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `like_article`
--
ALTER TABLE `like_article`
  ADD CONSTRAINT `like_article_id_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_article_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `like_comment`
--
ALTER TABLE `like_comment`
  ADD CONSTRAINT `like_comment_id_comment` FOREIGN KEY (`id_comment`) REFERENCES `comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_comment_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
