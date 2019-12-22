-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 12 Novembre 2019 à 11:39
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cesi`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(1, 0, 'niceeee', 'yanis', '2019-11-10 12:29:10'),
(2, 0, 'nice site', 'ali', '2019-11-10 12:29:21'),
(3, 0, 'salut', 'ok', '2019-11-10 12:41:57'),
(4, 0, 'hello Inchallah', 'yanis', '2019-11-10 13:24:44'),
(5, 0, 'salut', '', '2019-11-10 13:34:00'),
(6, 0, 'ok', '', '2019-11-10 13:40:10'),
(7, 0, 'okoko', '', '2019-11-10 13:44:49'),
(8, 0, 'nice web site', '', '2019-11-10 13:51:50'),
(9, 0, 'okoko', '', '2019-11-11 07:35:20'),
(10, 0, 'helllo', '', '2019-11-11 10:19:56'),
(11, 0, 'hello', '', '2019-11-11 15:05:30'),
(12, 1, '', '', '2019-11-11 22:19:19'),
(13, 0, '  okoko', '', '2019-11-11 22:32:13'),
(14, 0, 'yeo', 'no', '2019-11-11 22:32:28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
