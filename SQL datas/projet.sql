

/*******************************************
* LE CODE SQL DE NOS TABLES EN BASE DE DONNEES MySQL
********************************************/


-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 12 Janvier 2016 à 18:15
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sent` tinyint(1) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author_id`),
  KEY `recipient` (`recipient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `author_id`, `recipient_id`, `datetime`, `sent`, `read`, `content`) VALUES
(1, 24, 26, '2016-01-11 17:25:47', 0, 0, 'Salut! Je t''écris parce que tu es cool :D !'),
(2, 24, 20, '2016-01-11 17:26:00', 0, 0, 'Toi aussi tu as l''air cool donc je t''écris aussi ;)! '),
(3, 21, 26, '2016-01-11 17:27:53', 0, 0, 'Tu as recu un second message :D !'),
(4, 29, 20, '2016-01-12 09:46:41', 0, 0, 'Tiens, un deuxième message !'),
(5, 20, 24, '2016-01-12 10:27:55', 0, 0, 'Merci pour ton message !'),
(6, 24, 20, '2016-01-12 10:28:13', 0, 0, 'De rien  ;) !'),
(10, 20, 29, '2016-01-12 11:30:18', 1, 0, 'Merci Laura !'),
(11, 20, 24, '2016-01-12 11:32:08', 1, 0, 'Heyhey !');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `gender`, `description`) VALUES
(20, 'Marion', 'marion@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'female', 'Yeah! Je m''en sors avec ce fichu formulaire! '),
(21, 'KevinPlus', 'kevin@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'male', ''),
(22, 'Loic', 'loic@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'male', ''),
(24, 'Louise', 'louise@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'female', ''),
(25, 'Kate', 'kate@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'female', ''),
(26, 'Julien', 'julien@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'male', ''),
(29, 'Laura', 'laura@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'female', 'J''aime les Licornes! \\o/'),
(30, 'Karim', 'karim@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'male', 'Je m''appelle Karim ! ');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_author` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_message_recipient` FOREIGN KEY (`recipient_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
