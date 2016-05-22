-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 22 Mai 2016 à 09:49
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

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
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `author_id`, `recipient_id`, `datetime`, `content`, `is_sent`, `is_read`) VALUES
(1, 12, 1, '2016-05-16 14:13:22', 'Salut Marion ! ', 1, 1),
(2, 1, 12, '2016-05-16 14:53:58', 'Salut Kazuma, comment vas-tu? ', 1, 1),
(3, 12, 1, '2016-05-16 15:42:24', 'Je vais bien et toi? Je vois que tu parles Japonais, tu as appris où ? ', 1, 1),
(4, 13, 1, '2016-05-16 16:09:09', 'マリオンさん、こんにちは、\r\n日本語が話せて、すごいですね！\r\nフランス語を教えてください！\r\n\r\nよろしくお願いします！', 1, 1),
(8, 1, 12, '2016-05-16 16:07:24', 'A la fac. Ca fait longtemps que tu es sur Lyon ?', 1, 1),
(9, 12, 1, '2016-05-19 11:50:35', 'Non, je suis arriver seulement il y a deux semaines. :) ', 1, 1),
(10, 3, 1, '2016-05-21 17:16:33', 'Salut Marion ! ', 1, 1),
(11, 1, 2, '2016-05-21 17:18:39', 'Coucou Kévin !', 1, 0),
(12, 4, 1, '2016-05-21 19:37:55', 'Salut Marion, tu vas bien ? ', 1, 0),
(13, 6, 1, '2016-05-21 21:00:59', 'Hello Marion, how are you ? My name is Louise, and I''m looking for friends in Lyon ! I''m gonna move in there to work! I''m excited! \r\n\r\nNice to meet you :D !', 1, 1),
(14, 1, 14, '2016-05-21 21:10:45', 'Salut Marc !', 1, 0);

-- --------------------------------------------------------


--
-- Contenu de la table `spoken_languages`
--

INSERT INTO `spoken_languages` (`userId`, `languageId`, `levelId`) VALUES
(6, 34, 1),
(13, 34, 1),
(5, 34, 2),
(1, 53, 3),
(2, 89, 3),
(3, 1, 3),
(4, 51, 3),
(6, 53, 3),
(7, 51, 3),
(8, 34, 3),
(10, 27, 3),
(12, 1, 3),
(12, 34, 3),
(15, 6, 3),
(1, 1, 4),
(2, 1, 4),
(2, 27, 4),
(4, 1, 4),
(7, 1, 4),
(7, 53, 4),
(8, 1, 4),
(8, 53, 4),
(9, 1, 4),
(10, 1, 4),
(11, 1, 4),
(13, 1, 4),
(1, 34, 5),
(2, 34, 5),
(3, 34, 5),
(4, 34, 5),
(5, 1, 5),
(6, 1, 5),
(7, 102, 5),
(8, 116, 5),
(9, 34, 5),
(10, 34, 5),
(11, 34, 5),
(12, 53, 5),
(13, 53, 5),
(15, 34, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--


--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `gender`, `description`, `nationalityId`, `cityId`) VALUES
(1, 'Marion', 'marion@gmail.com', '$P$BvLvKt7/FhtJViSARMKdeVbZ2jnr1k1', 'female', '', 75, 17801),
(2, 'Kévin', 'kevin@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'male', ' ', 75, 17801),
(3, 'Loic', 'loic@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'male', '  ', 75, 17801),
(4, 'Elsa', 'elsa@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'female', '', 75, 17801),
(5, 'Matt', 'matt@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'male', '', 230, 17801),
(6, 'Louise', 'louise@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'female', '', 230, 41814),
(7, 'Ales', 'ales@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'male', '', 198, 24656),
(8, 'Waarut', 'warrut@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'male', '', 217, 24656),
(9, 'Jean', 'jean@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'male', '', 75, 17801),
(10, 'Jérémie', 'jeremie@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'male', '', 75, 17801),
(11, 'Fanny', 'fanny@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'female', '', 75, 17801),
(12, 'Kazuma', 'kazuma@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'male', 'Hello, my Name is Kazuma ! \r\n\r\nBonjour, je m''appelle Kazuma, et j''habite à Lyon cette année. Je suis étudiant Japonais et je veux apprendre le Français ! Aidez-moi! \r\n\r\n日本語も教えます！\r\n\r\nよろしくお願いします！\r\n\r\n一馬', 109, 17801),
(13, 'Sayaka', 'sayaka@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'female', '', 109, 17801),
(14, 'Marc', 'marc@gmail.com', '$P$BULGFRhoTpNj0LCVinJossR0kwCRAW1', 'male', '', 75, 24656),
(15, 'Marine', 'marine@gmail.com', '$P$Bicpch4vGTJrq0WlAbHE188teGUQlX1', 'female', '', 75, 17331);


--
-- Contraintes pour les tables exportées
--


--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_author_id` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_message_recipient_id` FOREIGN KEY (`recipient_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `spoken_languages`
--
ALTER TABLE `spoken_languages`
  ADD CONSTRAINT `fk_spk_l_languageId` FOREIGN KEY (`languageId`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_spk_l_levelId` FOREIGN KEY (`levelId`) REFERENCES `language_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_spk_l_userId` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_cityId` FOREIGN KEY (`cityId`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_user_nationalityId` FOREIGN KEY (`nationalityId`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

ALTER TABLE  `states` 
	ADD CONSTRAINT  `fk_states_country_id` FOREIGN KEY (`countryId` ) REFERENCES  `proj_aspe_bcc`.`countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE ;

ALTER TABLE  `cities` 
	ADD CONSTRAINT  `fk_citie_state_id` FOREIGN KEY (`stateId` ) REFERENCES  `proj_aspe_bcc`.`states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
