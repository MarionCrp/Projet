
-- Structure de la table `chat_messages`
-- - message_id > L'ID du message
-- - message_user > L'ID de l'utilisateur
-- - message_time > La date d'envoi
-- - message_text > Le contenu du message
--
CREATE TABLE IF NOT EXISTS `chat_messages` (
  `message_id` int(11) NOT NULL auto_increment,
  `message_user` int(11) NOT NULL,
  `message_time` bigint(20) NOT NULL,
  `message_text` varchar(255) collate latin1_german1_ci NOT NULL,
  PRIMARY KEY  (`message_id`)
) ENGINE=MyISAM ;


--
-- Structure de la table `chat_online`
-- - online_id > L'ID du membre connecte
-- - online_ip > Son adresse IP
-- - online_user > L'ID de l'utilisateur
-- - online_status > Pour informer les membres (ex : en ligne, absent, occupe)
-- - online_time > Pour indiquer la date de derniere actualisation
--
CREATE TABLE IF NOT EXISTS `chat_online` (
  `online_id` int(11) NOT NULL auto_increment,
  `online_ip` varchar(100) collate latin1_german1_ci NOT NULL,
  `online_user` int(11) NOT NULL,
  `online_status` enum('0','1','2') collate latin1_german1_ci NOT NULL,
  `online_time` bigint(21) NOT NULL,
  PRIMARY KEY  (`online_id`)
) ENGINE=MyISAM ;




