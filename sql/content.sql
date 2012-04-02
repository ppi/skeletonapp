CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `idx_title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `content` (`id`,`title`,`content`)
VALUES
	(10, 'user_activate_account', 'Hey [%name%],\n\nPlease click the following link to activate your account.\n\n[%activate_link%]\n\nThe PPI Team');

