-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 13 nov. 2019 à 14:30
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cesi`
--

-- --------------------------------------------------------

--
-- Structure de la table `even`
--

DROP TABLE IF EXISTS `even`;
CREATE TABLE IF NOT EXISTS `even` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NomEv` varchar(25) COLLATE utf8_bin NOT NULL,
  `prix` double NOT NULL,
  `description` varchar(100) COLLATE utf8_bin NOT NULL,
  `dateEv` date NOT NULL,
  `IsSub` tinyint(1) NOT NULL,
  `lieu` varchar(80) COLLATE utf8_bin NOT NULL,
  `photo` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Stickers NodeJS', '3DcAM01', '../../assets/12.png', 100.00),
(2, 'Stickers HTML 5', 'USB02', '../../assets/8.png', 80.00),
(3, 'Stickers Visuel Studio', 'wristWear03', '../../assets/5.png', 150.00),
(4, 'Stickers Android', 'LPN45', '../../assets/3.png', 100.00),
(5, 'Stickers \"I need a break\"', 'AFG-8M', '../../assets/30.png', 100.00),
(6, 'Sticker Earth', 'HJFT5-6', '../../assets/12.png', 60.00),
(7, 'Stickers \"Hello friend\" MrRobot', 'KJHF42', '../../assets/29.png', 150.00),
(8, 'Stickers Einstein', 'HDK-74', '../../assets/34.png', 200.00);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_comment`
--

DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(2, 0, 'nice site', 'ali', '2019-11-10 12:29:21'),
(4, 0, 'hello Inchallah', 'yanis', '2019-11-10 13:24:44'),
(5, 0, 'salut', '', '2019-11-10 13:34:00'),
(6, 0, 'ok', '', '2019-11-10 13:40:10'),
(7, 0, 'okoko', '', '2019-11-10 13:44:49'),
(15, 2, 'rerzerze  ', 'raraz', '2019-11-12 21:42:35'),
(16, 7, 'fsdfsd', 'dfsdf', '2019-11-12 21:43:02'),
(17, 2, '  dsq', 'dsqd', '2019-11-12 22:06:42'),
(18, 16, '  sqdqsd', 'sdqsd', '2019-11-13 07:50:24'),
(19, 2, '  fsdf', 'effsd', '2019-11-13 09:20:30');

-- --------------------------------------------------------

--
-- Structure de la table `tbl_like_unlike`
--

DROP TABLE IF EXISTS `tbl_like_unlike`;
CREATE TABLE IF NOT EXISTS `tbl_like_unlike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `like_unlike` int(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_like_unlike`
--

INSERT INTO `tbl_like_unlike` (`id`, `member_id`, `comment_id`, `like_unlike`, `date`) VALUES
(43, 1, 1, 0, '2019-11-11 22:28:44'),
(44, 1, 2, 1, '2019-11-12 22:42:26'),
(45, 1, 12, 0, '2019-11-11 22:28:42'),
(46, 1, 3, 0, '2019-11-11 22:28:50'),
(47, 1, 14, 0, '2019-11-12 18:27:05'),
(48, 1, 13, 0, '2019-11-12 18:27:04');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) COLLATE utf8_bin NOT NULL,
  `Prenom` varchar(25) COLLATE utf8_bin NOT NULL,
  `Localisation` varchar(25) COLLATE utf8_bin NOT NULL,
  `Email` varchar(50) COLLATE utf8_bin NOT NULL,
  `Mot_De_Passe` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `Nom`, `Prenom`, `Localisation`, `Email`, `Mot_De_Passe`) VALUES
(9, 'ramdani', 'ali', 'Cesi Algerie Alger', 'ali.ramdani.dz@viacesi.fr', '$2y$10$Z0EJuIyIIQZmmy5RrmHCdu7gUH4FM/W3oY.OghOioDqHkTIwt3Gyu'),
(10, 'dsqd', 'dqsd', 'Cesi Algerie Alger', 'dsqd@dsqd.fr', '$2y$10$yqytoE15DWPErBRbzv91be.WIp8l2WCSME5r7fP44JYQf1IEDaGg2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
