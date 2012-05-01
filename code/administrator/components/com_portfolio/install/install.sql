CREATE TABLE IF NOT EXISTS `#__portfolio_categories` (
  `portfolio_categories_id` SERIAL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `slug` varchar(255) NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '@Filter("int")',
  `description` text COMMENT '@Filter("html, tidy")',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL default 0,
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `locked_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `locked_by` int(11) NOT NULL DEFAULT 0,
  UNIQUE KEY ( `slug` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__portfolio_files` (
  `portfolio_file_id` SERIAL,
  `work_id` int(11) NOT NULL default 0,
  `filename` varchar(255) NOT NULL DEFAULT '',
  `directory` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY ( `slug` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__portfolio_images` (
  `portfolio_image_id` SERIAL,
  `work_id` int(11) NOT NULL default 0,
  `filename` varchar(255) NOT NULL DEFAULT '',
  `directory` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__portfolio_people` (
  `portfolio_person_id` SERIAL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `slug` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL default 0,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '@Filter("int")',
  `bio` text COMMENT '@Filter("html, tidy")',
  `avatar` text,
  `address1` text,
  `address2` text,
  `city` text,
  `county` varchar(100) DEFAULT NULL,
  `postcode` varchar(100) DEFAULT NULL,
  `telephone` varchar(255),
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `website` varchar(255) NOT NULL DEFAULT '' COMMENT '@Filter("url")',
  `twitter` varchar(255) NOT NULL DEFAULT '' COMMENT '@Filter("url")',
  `facebook` varchar(255) NOT NULL DEFAULT '' COMMENT '@Filter("url")',
  `youtube` varchar(255) NOT NULL DEFAULT '' COMMENT '@Filter("url")',
  `email` varchar(100) COMMENT '@Filter("email")',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL default 0,
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `locked_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `locked_by` int(11) NOT NULL DEFAULT 0,
  UNIQUE KEY ( `slug` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__portfolio_works` (
  `portfolio_work_id` SERIAL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `slug` varchar(255) NOT NULL,
  `icon` text,
  `person_id` int(11) NOT NULL default 0,
  `category_id` int(11) NOT NULL default 0,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '@Filter("int")',
  `short_description` text COMMENT '@Filter("html, tidy")',
  `description` text COMMENT '@Filter("html, tidy")',
  `ordering` int(11) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL default 0,
  `modified_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `locked_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `locked_by` int(11) NOT NULL DEFAULT 0,
  UNIQUE KEY ( `slug` )
) ENGINE=MyISAM DEFAULT CHARSET=utf8;