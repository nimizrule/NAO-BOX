-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 15 Décembre 2015 à 18:01
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `naobox`
--

-- --------------------------------------------------------

--
-- Structure de la table `nb_commands`
--

CREATE TABLE IF NOT EXISTS `nb_commands` (
  `cmd_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la commande',
  `cmd_name` varchar(30) NOT NULL COMMENT 'nom de la commande',
  `cmd_file` varchar(30) NOT NULL COMMENT 'fichier associe a la commande',
  `cmd_description` text COMMENT 'description de la commande',
  `cmd_package_id` int(11) DEFAULT NULL COMMENT 'package auquel appartient la commande',
  PRIMARY KEY (`cmd_id`),
  KEY `cmd_package_id` (`cmd_package_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Commandes pour NAO' AUTO_INCREMENT=9 ;

--
-- Contenu de la table `nb_commands`
--

INSERT INTO `nb_commands` (`cmd_id`, `cmd_name`, `cmd_file`, `cmd_description`, `cmd_package_id`) VALUES
(2, 'BellyToBellySuplexgrfllllll', 'Desert.jpg', 'Fait une prise de catchdl', NULL),
(3, 'BellyToBellySuplexooooooooooo', 'Belly.ngp', 'Fait une prise de catch', NULL),
(6, 'testfinale', 'Lighthouse.jpg', 'le este final', NULL),
(7, 'lenom', 'Chrysanthemum.jpg', '', NULL),
(8, 'lenolm', 'Jellyfish.jpg', 'la descripotion', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `nb_packages`
--

CREATE TABLE IF NOT EXISTS `nb_packages` (
  `pkg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id du package',
  `pkg_name` varchar(30) NOT NULL COMMENT 'nom du package',
  `pkg_path` varchar(200) NOT NULL COMMENT 'chemin d acces au package',
  PRIMARY KEY (`pkg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Packages auxquels appartiennent les commandes' AUTO_INCREMENT=6 ;

--
-- Contenu de la table `nb_packages`
--

INSERT INTO `nb_packages` (`pkg_id`, `pkg_name`, `pkg_path`) VALUES
(1, 'thename', 'the path\r\n'),
(5, 'GFH', 'FG');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Peripheriques autorises a dialoguer avec NAO' AUTO_INCREMENT=10 ;

--
-- Contenu de la table `nb_peripherals`
--

INSERT INTO `nb_peripherals` (`prl_id`, `prl_name`, `prl_mac_adress`, `prl_ip_adress`, `prl_description`) VALUES
(8, 'Bastiendd', 'themacdd', 'theadressipdd', 'plop alldd'),
(9, 'thenom', 'themac', 'theIp', 'the description');

-- --------------------------------------------------------

--
-- Structure de la table `nb_profiles`
--

CREATE TABLE IF NOT EXISTS `nb_profiles` (
  `prf_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id du profil utilisateur',
  `prf_name` varchar(30) NOT NULL COMMENT 'nom du profil utilisateur',
  PRIMARY KEY (`prf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Profils utilisateurs' AUTO_INCREMENT=4 ;

--
-- Contenu de la table `nb_profiles`
--

INSERT INTO `nb_profiles` (`prf_id`, `prf_name`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'fd*ghgh');

-- --------------------------------------------------------

--
-- Structure de la table `nb_sensors_buffer`
--

CREATE TABLE IF NOT EXISTS `nb_sensors_buffer` (
  `id_nao` int(11) NOT NULL AUTO_INCREMENT,
  `head_captor` varchar(100) NOT NULL,
  `camera_1` varchar(100) NOT NULL,
  `camera_2` varchar(100) NOT NULL,
  `emmet_receiver_infrared` varchar(100) NOT NULL,
  `belly_button` varchar(100) NOT NULL,
  `sonar_1` varchar(100) NOT NULL,
  `sonar_2` varchar(100) NOT NULL,
  `sonar_3` varchar(100) NOT NULL,
  `sonar_4` varchar(100) NOT NULL,
  `left_Hand` varchar(100) NOT NULL,
  `right_hand` varchar(100) NOT NULL,
  `bumper_left_foot` varchar(100) NOT NULL,
  `bumper_right_foot` varchar(100) NOT NULL,
  `left_foot` varchar(100) NOT NULL,
  `right_foot` varchar(100) NOT NULL,
  PRIMARY KEY (`id_nao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `nb_users`
--

CREATE TABLE IF NOT EXISTS `nb_users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de l utilisateur',
  `usr_login` varchar(30) NOT NULL COMMENT 'login de l utilisateur',
  `usr_pwd` varchar(80) DEFAULT NULL COMMENT 'mot de passe de l utilisateur',
  `usr_connected` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'etat de la connexion',
  `usr_last_use` datetime DEFAULT NULL COMMENT 'date de la derniere connexion',
  `usr_profile_id` int(11) NOT NULL COMMENT 'id du profil utilisateur',
  PRIMARY KEY (`usr_id`),
  KEY `usr_profile_id` (`usr_profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Utilisateurs' AUTO_INCREMENT=3 ;

--
-- Contenu de la table `nb_users`
--

INSERT INTO `nb_users` (`usr_id`, `usr_login`, `usr_pwd`, `usr_connected`, `usr_last_use`, `usr_profile_id`) VALUES
(1, 'user', NULL, 0, NULL, 1),
(2, 'admink,', ',', 0, NULL, 2);

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
