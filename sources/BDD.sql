-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 17 Novembre 2015 à 22:32
-- Version du serveur: 5.5.46
-- Version de PHP: 5.4.45-0+deb7u2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `naobox`
--
CREATE DATABASE `naobox` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `naobox`;

-- --------------------------------------------------------

--
-- Structure de la table `nb_commands`
--

CREATE TABLE IF NOT EXISTS `nb_commands` (
  `_cmd_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la commande',
  `cmd_name` varchar(30) NOT NULL COMMENT 'nom de la commande',
  `cmd_file` varchar(30) NOT NULL COMMENT 'fichier associe a la commande',
  `cmd_description` text COMMENT 'description de la commande',
  `cmd_package_id` int(11) DEFAULT NULL COMMENT 'package auquel appartient la commande',
  PRIMARY KEY (`_cmd_id`),
  KEY `cmd_package_id` (`cmd_package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Commandes pour NAO' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `nb_packages`
--

CREATE TABLE IF NOT EXISTS `nb_packages` (
  `pkg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id du package',
  `pkg_name` varchar(30) NOT NULL COMMENT 'nom du package',
  `pkg_path` varchar(200) NOT NULL COMMENT 'chemin d acces au package',
  PRIMARY KEY (`pkg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Packages auxquels appartiennent les commandes' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `nb_peripherals`
--

CREATE TABLE IF NOT EXISTS `nb_peripherals` (
  `prl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id du peripherique',
  `prl_name` varchar(30) NOT NULL COMMENT 'nom du peripherique',
  `prl_mac_adress` char(17) NOT NULL COMMENT 'adresse mac du peripherique',
  `prl_ip_adress` varchar(15) DEFAULT NULL COMMENT 'adresse ip du peripherique',
  `prl_description` text COMMENT 'description du peripherique',
  PRIMARY KEY (`prl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Peripheriques autorises a dialoguer avec NAO' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `nb_profiles`
--

CREATE TABLE IF NOT EXISTS `nb_profiles` (
  `prf_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id du profil utilisateur',
  `prf_name` varchar(30) NOT NULL COMMENT 'nom du profil utilisateur',
  PRIMARY KEY (`prf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Profils utilisateurs' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `nb_users`
--

CREATE TABLE IF NOT EXISTS `nb_users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de l utilisateur',
  `usr_login` varchar(30) NOT NULL COMMENT 'login de l utilisateur',
  `usr_pwd` varchar(80) NOT NULL COMMENT 'mot de passe de l utilisateur',
  `usr_connected` tinyint(1) NOT NULL COMMENT 'etat de la connexion',
  `usr_last_use` datetime DEFAULT NULL COMMENT 'date de la derniere connexion',
  `usr_profile_id` int(11) NOT NULL COMMENT 'id du profil utilisateur',
  PRIMARY KEY (`usr_id`),
  KEY `usr_profile_id` (`usr_profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Utilisateurs' AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `nb_commands`
--
ALTER TABLE `nb_commands`
  ADD CONSTRAINT `nb_commands_ibfk_1` FOREIGN KEY (`cmd_package_id`) REFERENCES `nb_packages` (`pkg_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `nb_users`
--
ALTER TABLE `nb_users`
  ADD CONSTRAINT `nb_users_ibfk_1` FOREIGN KEY (`usr_profile_id`) REFERENCES `nb_profiles` (`prf_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
