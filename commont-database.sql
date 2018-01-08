-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 07 jan. 2018 à 15:48
-- Version du serveur :  5.7.19
-- Version de PHP :  7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `commont-database`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idTweet` int(11) NOT NULL,
  `commentContent` varchar(240) DEFAULT NULL,
  `commentImg` varchar(255) DEFAULT NULL,
  `commentCreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` varchar(5) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`idComment`),
  KEY `idUser` (`idUser`),
  KEY `idTweet` (`idTweet`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE IF NOT EXISTS `follow` (
  `idFollowed` int(11) NOT NULL,
  `idFollower` int(11) NOT NULL,
  `dateUpdateStatus` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `followStatus` varchar(5) NOT NULL DEFAULT 'true',  
  KEY `idUser` (`idFollowed`,`idFollower`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `idLike` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idTweet` int(11) NOT NULL,
  `dateUpdateStatus` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likeStatus` varchar(5) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`idLike`),
  KEY `idUser` (`idUser`),
  KEY `idTweet` (`idTweet`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `idMsg` int(11) NOT NULL AUTO_INCREMENT,
  `idSender` int(11) NOT NULL,
  `idReceiver` int(11) NOT NULL,
  `msgContent` varchar(20000) DEFAULT NULL,
  `msgImg` varchar(255) DEFAULT NULL,
  `msgCreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` varchar(5) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`idMsg`),
  KEY `idUser` (`idSender`,`idReceiver`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `idTag` int(11) NOT NULL AUTO_INCREMENT,
  `idTweet` int(11) NOT NULL,
  `tagName` varchar(240) NOT NULL,
  `tagCreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idTag`),
  KEY `idTweet` (`idTweet`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

DROP TABLE IF EXISTS `tweet`;
CREATE TABLE IF NOT EXISTS `tweet` (
  `idTweet` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `tweetContent` varchar(240) DEFAULT NULL,
  `tweetImg` varchar(255) DEFAULT NULL,
  `idReTweet` int(11) DEFAULT NULL,
  `idReTweetFrom` int(11) DEFAULT NULL,
  `tweetDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` varchar(5) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`idTweet`),
  KEY `idUser` (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `displayName` varchar(40) CHARACTER SET utf8 NOT NULL,
  `mail` varchar(254) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `theme` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `registrationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userStatus` varchar(5) NOT NULL DEFAULT 'true',
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
