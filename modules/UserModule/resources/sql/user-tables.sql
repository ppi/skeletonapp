CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_level_id` int(10) unsigned NOT NULL DEFAULT '1',
  `title` varchar(10) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_level_id` (`user_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_activation_token` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `used` tinyint(1) DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `date_used` datetime NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_forgot_token` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `used` tinyint(1) DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `date_used` datetime NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_level` (`id`,`title`)
VALUES
	(1, 'Member'),
	(2, 'Administrator'),
	(3, 'Developer');

