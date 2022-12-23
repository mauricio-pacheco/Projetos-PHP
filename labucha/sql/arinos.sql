-- phpMyAdmin SQL Dump
-- version 2.6.0-pl3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost:3306
-- Tempo de Generação: Mar 21, 2006 at 07:11 PM
-- Versão do Servidor: 4.1.12
-- Versão do PHP: 4.3.10
-- 
-- Banco de Dados: `arinos`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_authors`
-- 

CREATE TABLE `kayapo_authors` (
  `aid` varchar(25) NOT NULL default '',
  `name` varchar(50) default NULL,
  `url` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `pwd` varchar(40) default NULL,
  `counter` int(11) NOT NULL default '0',
  `radminsuper` tinyint(1) NOT NULL default '1',
  `admlanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`aid`),
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_authors`
-- 

INSERT INTO `kayapo_authors` VALUES ('Mandry', 'God', 'http://www.casadaweb.net/arinos', 'mandry@casadaweb.net', '04b6e1a104ba0ed5e7985abde3e13140', 1, 1, '');
INSERT INTO `kayapo_authors` VALUES ('Arinos', 'Arinos FM', '', '123456', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, '');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_autonews`
-- 

CREATE TABLE `kayapo_autonews` (
  `anid` int(11) NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `aid` varchar(30) NOT NULL default '',
  `title` varchar(80) NOT NULL default '',
  `time` varchar(19) NOT NULL default '',
  `hometext` text NOT NULL,
  `bodytext` text NOT NULL,
  `topic` int(3) NOT NULL default '1',
  `informant` varchar(20) NOT NULL default '',
  `notes` text NOT NULL,
  `ihome` int(1) NOT NULL default '0',
  `alanguage` varchar(30) NOT NULL default '',
  `acomm` int(1) NOT NULL default '0',
  `associated` text NOT NULL,
  PRIMARY KEY  (`anid`),
  KEY `anid` (`anid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_autonews`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_banned_ip`
-- 

CREATE TABLE `kayapo_banned_ip` (
  `id` int(11) NOT NULL auto_increment,
  `ip_address` varchar(15) NOT NULL default '',
  `reason` varchar(255) NOT NULL default '',
  `date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_banned_ip`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_banner`
-- 

CREATE TABLE `kayapo_banner` (
  `bid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `imptotal` int(11) NOT NULL default '0',
  `impmade` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `imageurl` varchar(100) NOT NULL default '',
  `clickurl` varchar(200) NOT NULL default '',
  `alttext` varchar(255) NOT NULL default '',
  `date` datetime default NULL,
  `dateend` datetime default NULL,
  `type` tinyint(1) NOT NULL default '0',
  `active` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`bid`),
  KEY `bid` (`bid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `kayapo_banner`
-- 

INSERT INTO `kayapo_banner` VALUES (1, 1, 0, 422, 0, 'http://kayapo.phpnuke.org.br/images/banner01.gif', 'kayapo.phpnuke.org.br', 'Kayap?! Toda a for?a do PHP-Nuke...', '2005-01-13 16:27:39', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bannerclient`
-- 

CREATE TABLE `kayapo_bannerclient` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `contact` varchar(60) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `login` varchar(10) NOT NULL default '',
  `passwd` varchar(10) NOT NULL default '',
  `extrainfo` text NOT NULL,
  PRIMARY KEY  (`cid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `kayapo_bannerclient`
-- 

INSERT INTO `kayapo_bannerclient` VALUES (1, 'Kayap?', 'Kayap?', 'kayapo@phpnuke.org.br', 'kayapo', 'kanyanpob', '@;D');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbauth_access`
-- 

CREATE TABLE `kayapo_bbauth_access` (
  `group_id` mediumint(8) NOT NULL default '0',
  `forum_id` smallint(5) unsigned NOT NULL default '0',
  `auth_view` tinyint(1) NOT NULL default '0',
  `auth_read` tinyint(1) NOT NULL default '0',
  `auth_post` tinyint(1) NOT NULL default '0',
  `auth_reply` tinyint(1) NOT NULL default '0',
  `auth_edit` tinyint(1) NOT NULL default '0',
  `auth_delete` tinyint(1) NOT NULL default '0',
  `auth_sticky` tinyint(1) NOT NULL default '0',
  `auth_announce` tinyint(1) NOT NULL default '0',
  `auth_vote` tinyint(1) NOT NULL default '0',
  `auth_pollcreate` tinyint(1) NOT NULL default '0',
  `auth_attachments` tinyint(1) NOT NULL default '0',
  `auth_mod` tinyint(1) NOT NULL default '0',
  KEY `group_id` (`group_id`),
  KEY `forum_id` (`forum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_bbauth_access`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbbanlist`
-- 

CREATE TABLE `kayapo_bbbanlist` (
  `ban_id` mediumint(8) unsigned NOT NULL auto_increment,
  `ban_userid` mediumint(8) NOT NULL default '0',
  `ban_ip` varchar(8) NOT NULL default '',
  `ban_email` varchar(255) default NULL,
  `ban_time` int(11) default NULL,
  `ban_expire_time` int(11) default NULL,
  `ban_by_userid` mediumint(8) default NULL,
  `ban_priv_reason` text,
  `ban_pub_reason_mode` tinyint(1) default NULL,
  `ban_pub_reason` text,
  PRIMARY KEY  (`ban_id`),
  KEY `ban_ip_user_id` (`ban_ip`,`ban_userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_bbbanlist`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbcategories`
-- 

CREATE TABLE `kayapo_bbcategories` (
  `cat_id` mediumint(8) unsigned NOT NULL auto_increment,
  `cat_title` varchar(100) default NULL,
  `cat_order` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`cat_id`),
  KEY `cat_order` (`cat_order`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Extraindo dados da tabela `kayapo_bbcategories`
-- 

INSERT INTO `kayapo_bbcategories` VALUES (1, 'Notícias', 10);
INSERT INTO `kayapo_bbcategories` VALUES (2, 'Classificados', 20);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbconfig`
-- 

CREATE TABLE `kayapo_bbconfig` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_bbconfig`
-- 

INSERT INTO `kayapo_bbconfig` VALUES ('config_id', '1');
INSERT INTO `kayapo_bbconfig` VALUES ('board_disable', '0');
INSERT INTO `kayapo_bbconfig` VALUES ('sitename', 'Arinos FM');
INSERT INTO `kayapo_bbconfig` VALUES ('site_desc', 'Arinos FM');
INSERT INTO `kayapo_bbconfig` VALUES ('cookie_name', 'phpbb2mysql');
INSERT INTO `kayapo_bbconfig` VALUES ('cookie_path', '/');
INSERT INTO `kayapo_bbconfig` VALUES ('cookie_domain', 'meysite.com.br');
INSERT INTO `kayapo_bbconfig` VALUES ('cookie_secure', '0');
INSERT INTO `kayapo_bbconfig` VALUES ('session_length', '3600');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_html', '1');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_html_tags', 'b,i,u,pre');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_bbcode', '1');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_smilies', '1');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_sig', '1');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_namechange', '0');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_theme_create', '0');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_avatar_local', '1');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_avatar_remote', '0');
INSERT INTO `kayapo_bbconfig` VALUES ('allow_avatar_upload', '0');
INSERT INTO `kayapo_bbconfig` VALUES ('override_user_style', '1');
INSERT INTO `kayapo_bbconfig` VALUES ('posts_per_page', '15');
INSERT INTO `kayapo_bbconfig` VALUES ('topics_per_page', '50');
INSERT INTO `kayapo_bbconfig` VALUES ('hot_threshold', '25');
INSERT INTO `kayapo_bbconfig` VALUES ('max_poll_options', '10');
INSERT INTO `kayapo_bbconfig` VALUES ('max_sig_chars', '255');
INSERT INTO `kayapo_bbconfig` VALUES ('max_inbox_privmsgs', '100');
INSERT INTO `kayapo_bbconfig` VALUES ('max_sentbox_privmsgs', '100');
INSERT INTO `kayapo_bbconfig` VALUES ('max_savebox_privmsgs', '100');
INSERT INTO `kayapo_bbconfig` VALUES ('board_email_sig', 'Thanks, Webmaster@MySite.com');
INSERT INTO `kayapo_bbconfig` VALUES ('board_email', 'Webmaster@MySite.com');
INSERT INTO `kayapo_bbconfig` VALUES ('smtp_delivery', '0');
INSERT INTO `kayapo_bbconfig` VALUES ('smtp_host', '');
INSERT INTO `kayapo_bbconfig` VALUES ('require_activation', '0');
INSERT INTO `kayapo_bbconfig` VALUES ('flood_interval', '15');
INSERT INTO `kayapo_bbconfig` VALUES ('board_email_form', '0');
INSERT INTO `kayapo_bbconfig` VALUES ('avatar_filesize', '6144');
INSERT INTO `kayapo_bbconfig` VALUES ('avatar_max_width', '80');
INSERT INTO `kayapo_bbconfig` VALUES ('avatar_max_height', '80');
INSERT INTO `kayapo_bbconfig` VALUES ('avatar_path', 'modules/Forums/images/avatars');
INSERT INTO `kayapo_bbconfig` VALUES ('avatar_gallery_path', 'modules/Forums/images/avatars');
INSERT INTO `kayapo_bbconfig` VALUES ('smilies_path', 'modules/Forums/images/smiles');
INSERT INTO `kayapo_bbconfig` VALUES ('default_style', '2');
INSERT INTO `kayapo_bbconfig` VALUES ('default_dateformat', 'D M d, Y g:i a');
INSERT INTO `kayapo_bbconfig` VALUES ('board_timezone', '-3');
INSERT INTO `kayapo_bbconfig` VALUES ('prune_enable', '0');
INSERT INTO `kayapo_bbconfig` VALUES ('privmsg_disable', '0');
INSERT INTO `kayapo_bbconfig` VALUES ('gzip_compress', '0');
INSERT INTO `kayapo_bbconfig` VALUES ('coppa_fax', '');
INSERT INTO `kayapo_bbconfig` VALUES ('coppa_mail', '');
INSERT INTO `kayapo_bbconfig` VALUES ('board_startdate', '1013908210');
INSERT INTO `kayapo_bbconfig` VALUES ('default_lang', 'brazilian');
INSERT INTO `kayapo_bbconfig` VALUES ('smtp_username', '');
INSERT INTO `kayapo_bbconfig` VALUES ('smtp_password', '');
INSERT INTO `kayapo_bbconfig` VALUES ('record_online_users', '1');
INSERT INTO `kayapo_bbconfig` VALUES ('record_online_date', '1139272899');
INSERT INTO `kayapo_bbconfig` VALUES ('server_name', 'R?dio Arinos FM');
INSERT INTO `kayapo_bbconfig` VALUES ('server_port', '80');
INSERT INTO `kayapo_bbconfig` VALUES ('script_path', '/modules/Forums/');
INSERT INTO `kayapo_bbconfig` VALUES ('version', '.0.10');
INSERT INTO `kayapo_bbconfig` VALUES ('enable_confirm', '0');
INSERT INTO `kayapo_bbconfig` VALUES ('sendmail_fix', '0');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbdisallow`
-- 

CREATE TABLE `kayapo_bbdisallow` (
  `disallow_id` mediumint(8) unsigned NOT NULL auto_increment,
  `disallow_username` varchar(25) default NULL,
  PRIMARY KEY  (`disallow_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_bbdisallow`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbforum_prune`
-- 

CREATE TABLE `kayapo_bbforum_prune` (
  `prune_id` mediumint(8) unsigned NOT NULL auto_increment,
  `forum_id` smallint(5) unsigned NOT NULL default '0',
  `prune_days` tinyint(4) unsigned NOT NULL default '0',
  `prune_freq` tinyint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (`prune_id`),
  KEY `forum_id` (`forum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_bbforum_prune`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbforums`
-- 

CREATE TABLE `kayapo_bbforums` (
  `forum_id` smallint(5) unsigned NOT NULL auto_increment,
  `cat_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_name` varchar(150) default NULL,
  `forum_desc` text,
  `forum_status` tinyint(4) NOT NULL default '0',
  `forum_order` mediumint(8) unsigned NOT NULL default '1',
  `forum_posts` mediumint(8) unsigned NOT NULL default '0',
  `forum_topics` mediumint(8) unsigned NOT NULL default '0',
  `forum_last_post_id` mediumint(8) unsigned NOT NULL default '0',
  `prune_next` int(11) default NULL,
  `prune_enable` tinyint(1) NOT NULL default '1',
  `auth_view` tinyint(2) NOT NULL default '0',
  `auth_read` tinyint(2) NOT NULL default '0',
  `auth_post` tinyint(2) NOT NULL default '0',
  `auth_reply` tinyint(2) NOT NULL default '0',
  `auth_edit` tinyint(2) NOT NULL default '0',
  `auth_delete` tinyint(2) NOT NULL default '0',
  `auth_sticky` tinyint(2) NOT NULL default '0',
  `auth_announce` tinyint(2) NOT NULL default '0',
  `auth_vote` tinyint(2) NOT NULL default '0',
  `auth_pollcreate` tinyint(2) NOT NULL default '0',
  `auth_attachments` tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (`forum_id`),
  KEY `forums_order` (`forum_order`),
  KEY `cat_id` (`cat_id`),
  KEY `forum_last_post_id` (`forum_last_post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- 
-- Extraindo dados da tabela `kayapo_bbforums`
-- 

INSERT INTO `kayapo_bbforums` VALUES (1, 1, 'Mundo', 'Notícias do Mundo', 0, 10, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 1, 1, 3, 3, 1, 1, 0);
INSERT INTO `kayapo_bbforums` VALUES (2, 1, 'Brasil', 'Notícias do Brasil', 0, 20, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 1, 1, 3, 3, 1, 1, 0);
INSERT INTO `kayapo_bbforums` VALUES (3, 1, 'Região', 'Notícias da Região', 0, 30, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 1, 1, 3, 3, 1, 1, 0);
INSERT INTO `kayapo_bbforums` VALUES (4, 1, 'Esporte', 'Notícias do Esporte', 0, 40, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 1, 1, 3, 3, 1, 1, 0);
INSERT INTO `kayapo_bbforums` VALUES (5, 1, 'Educação', 'Notícias da Educação', 0, 50, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 1, 1, 3, 3, 1, 1, 0);
INSERT INTO `kayapo_bbforums` VALUES (6, 2, 'Veículos', 'Veículos', 0, 10, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 1, 1, 3, 3, 1, 1, 0);
INSERT INTO `kayapo_bbforums` VALUES (7, 2, 'Empregos', 'Empregos', 0, 20, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 1, 1, 3, 3, 1, 1, 0);
INSERT INTO `kayapo_bbforums` VALUES (8, 2, 'Imóveis', 'Imóveis', 0, 30, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 1, 1, 3, 3, 1, 1, 0);
INSERT INTO `kayapo_bbforums` VALUES (9, 2, 'Informática', 'Informática', 0, 40, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 1, 1, 3, 3, 1, 1, 0);
INSERT INTO `kayapo_bbforums` VALUES (10, 2, 'Diversos', 'Diversos', 0, 50, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 1, 1, 3, 3, 1, 1, 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbgroups`
-- 

CREATE TABLE `kayapo_bbgroups` (
  `group_id` mediumint(8) NOT NULL auto_increment,
  `group_type` tinyint(4) NOT NULL default '1',
  `group_name` varchar(40) NOT NULL default '',
  `group_description` varchar(255) NOT NULL default '',
  `group_moderator` mediumint(8) NOT NULL default '0',
  `group_single_user` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`group_id`),
  KEY `group_single_user` (`group_single_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `kayapo_bbgroups`
-- 

INSERT INTO `kayapo_bbgroups` VALUES (1, 1, 'Anonymous', 'Personal User', 0, 1);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbposts`
-- 

CREATE TABLE `kayapo_bbposts` (
  `post_id` mediumint(8) unsigned NOT NULL auto_increment,
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `forum_id` smallint(5) unsigned NOT NULL default '0',
  `poster_id` mediumint(8) NOT NULL default '0',
  `post_time` int(11) NOT NULL default '0',
  `poster_ip` varchar(8) NOT NULL default '',
  `post_username` varchar(25) default NULL,
  `enable_bbcode` tinyint(1) NOT NULL default '1',
  `enable_html` tinyint(1) NOT NULL default '0',
  `enable_smilies` tinyint(1) NOT NULL default '1',
  `enable_sig` tinyint(1) NOT NULL default '1',
  `post_edit_time` int(11) default NULL,
  `post_edit_count` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`post_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_id` (`topic_id`),
  KEY `poster_id` (`poster_id`),
  KEY `post_time` (`post_time`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_bbposts`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbposts_text`
-- 

CREATE TABLE `kayapo_bbposts_text` (
  `post_id` mediumint(8) unsigned NOT NULL default '0',
  `bbcode_uid` varchar(10) NOT NULL default '',
  `post_subject` varchar(60) default NULL,
  `post_text` text,
  PRIMARY KEY  (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_bbposts_text`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbprivmsgs`
-- 

CREATE TABLE `kayapo_bbprivmsgs` (
  `privmsgs_id` mediumint(8) unsigned NOT NULL auto_increment,
  `privmsgs_type` tinyint(4) NOT NULL default '0',
  `privmsgs_subject` varchar(255) NOT NULL default '0',
  `privmsgs_from_userid` mediumint(8) NOT NULL default '0',
  `privmsgs_to_userid` mediumint(8) NOT NULL default '0',
  `privmsgs_date` int(11) NOT NULL default '0',
  `privmsgs_ip` varchar(8) NOT NULL default '',
  `privmsgs_enable_bbcode` tinyint(1) NOT NULL default '1',
  `privmsgs_enable_html` tinyint(1) NOT NULL default '0',
  `privmsgs_enable_smilies` tinyint(1) NOT NULL default '1',
  `privmsgs_attach_sig` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`privmsgs_id`),
  KEY `privmsgs_from_userid` (`privmsgs_from_userid`),
  KEY `privmsgs_to_userid` (`privmsgs_to_userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_bbprivmsgs`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbprivmsgs_text`
-- 

CREATE TABLE `kayapo_bbprivmsgs_text` (
  `privmsgs_text_id` mediumint(8) unsigned NOT NULL default '0',
  `privmsgs_bbcode_uid` varchar(10) NOT NULL default '0',
  `privmsgs_text` text,
  PRIMARY KEY  (`privmsgs_text_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_bbprivmsgs_text`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbranks`
-- 

CREATE TABLE `kayapo_bbranks` (
  `rank_id` smallint(5) unsigned NOT NULL auto_increment,
  `rank_title` varchar(50) NOT NULL default '',
  `rank_min` mediumint(8) NOT NULL default '0',
  `rank_max` mediumint(8) NOT NULL default '0',
  `rank_special` tinyint(1) default '0',
  `rank_image` varchar(255) default NULL,
  PRIMARY KEY  (`rank_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Extraindo dados da tabela `kayapo_bbranks`
-- 

INSERT INTO `kayapo_bbranks` VALUES (1, 'Site Admin', -1, -1, 1, 'modules/Forums/images/ranks/6stars.gif');
INSERT INTO `kayapo_bbranks` VALUES (2, 'Newbie', 1, 0, 0, 'modules/Forums/images/ranks/1star.gif');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbsearch_results`
-- 

CREATE TABLE `kayapo_bbsearch_results` (
  `search_id` int(11) unsigned NOT NULL default '0',
  `session_id` varchar(32) NOT NULL default '',
  `search_array` text NOT NULL,
  PRIMARY KEY  (`search_id`),
  KEY `session_id` (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_bbsearch_results`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbsearch_wordlist`
-- 

CREATE TABLE `kayapo_bbsearch_wordlist` (
  `word_text` varchar(50) character set latin1 collate latin1_bin NOT NULL default '',
  `word_id` mediumint(8) unsigned NOT NULL auto_increment,
  `word_common` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`word_text`),
  KEY `word_id` (`word_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_bbsearch_wordlist`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbsearch_wordmatch`
-- 

CREATE TABLE `kayapo_bbsearch_wordmatch` (
  `post_id` mediumint(8) unsigned NOT NULL default '0',
  `word_id` mediumint(8) unsigned NOT NULL default '0',
  `title_match` tinyint(1) NOT NULL default '0',
  KEY `word_id` (`word_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_bbsearch_wordmatch`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbsessions`
-- 

CREATE TABLE `kayapo_bbsessions` (
  `session_id` char(32) NOT NULL default '',
  `session_user_id` mediumint(8) NOT NULL default '0',
  `session_start` int(11) NOT NULL default '0',
  `session_time` int(11) NOT NULL default '0',
  `session_ip` char(8) NOT NULL default '0',
  `session_page` int(11) NOT NULL default '0',
  `session_logged_in` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`session_id`),
  KEY `session_user_id` (`session_user_id`),
  KEY `session_id_ip_user_id` (`session_id`,`session_ip`,`session_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_bbsessions`
-- 

INSERT INTO `kayapo_bbsessions` VALUES ('5715d61ed8a560067c1db5dd849d05b8', 1, 1139245988, 1139245988, '7f000001', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('422a97e7e10d78892ce38e9ca34fbeb4', 1, 1139246029, 1139246029, '7f000001', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('5893c5e0e89ef3b975b215098ed6f848', 1, 1139246030, 1139246030, '7f000001', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('0d584f927cd1d36a9230a0797635ed43', 1, 1139246030, 1139246030, '7f000001', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('adbcc52d12562098f047b32093f5ff71', 1, 1139246036, 1139246036, '7f000001', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('b4386164f139ee5dd5589751c5e90c4d', 1, 1139246061, 1139246061, '7f000001', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('dd0660ee24ed4d4c7e99fe68a5b9788f', 1, 1139246065, 1139246065, '7f000001', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('add98777cf7fad1e839e26391e0eb97e', 1, 1139246105, 1139246105, '7f000001', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('b6affced76e5c5abf445d48ea1a33307', 1, 1139248140, 1139248140, '7f000001', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('c46b261f27e463faa80d42c5378e016e', 2, 1139248159, 1139248159, '7f000001', 0, 1);
INSERT INTO `kayapo_bbsessions` VALUES ('27fc1d8d794c36ffec526c3959ff76bc', 1, 1139272276, 1139272276, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('67aa5a22133ddd31a7cd9c7e490f335c', 1, 1139272277, 1139272277, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('1937243f731d9889c41907f3ebdfa494', 1, 1139272277, 1139272277, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('857bccd59b709da05464ad8962bf4b3d', 1, 1139272306, 1139272306, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('1fa0d6f7111cbb42b408e34b3120726a', 1, 1139272444, 1139272444, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('3856f8627cd2eb978e27508241497e32', 1, 1139272449, 1139272449, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('5ab148e341d00e38be39d7662278154e', 1, 1139272492, 1139272492, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('fa456411450bb2e5e3e26cb14f0f79a1', 1, 1139272503, 1139272503, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('a391b402b67fefad5209a14cdc3bc224', 1, 1139272510, 1139272510, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('908c3ad2815fcf4eb0348fb3d02c1fd9', 1, 1139272535, 1139272535, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('5213fb2101e4ad205e351629b3e821e9', 1, 1139272543, 1139272543, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('4c65beba5d4d4986425f90deb2a0c2d8', 1, 1139272586, 1139272586, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('f82a0f04cc8a5c74b5cb4c11f40a9e6a', 1, 1139272609, 1139272609, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('ae313ac0be5cae11c98446eb7653be31', 1, 1139272616, 1139272616, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('ff751e9fa6dbc87906ac839e729986b4', 1, 1139272619, 1139272619, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('239340f5069d9de84dd5ed73cc5f9624', 1, 1139272657, 1139272657, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('598fb054905b8cbed5784396f0af7eb0', 1, 1139272665, 1139272665, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('bd9ff148f0c40c124c31629c61753d0d', 1, 1139272668, 1139272668, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('43fcce72e84bde05129f849b0e51cd59', 1, 1139272674, 1139272674, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('5d373c3a54c277f810576b764dd93438', 1, 1139272688, 1139272688, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('e9e91fc1be8970b811fbe93f202b05c2', 1, 1139272703, 1139272703, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('c8c468450bc36ed18ca236186320d917', 1, 1139272725, 1139272725, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('e4f37c0bd8ae773d65e13c3655ec8292', 1, 1139272728, 1139272728, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('cc4fb719996924e18bf57cf6ded35cc8', 1, 1139272751, 1139272751, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('a3ee17ebb9ed211f8e3a91689e1ca050', 1, 1139272758, 1139272758, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('b3d06eb3cc9db310c79ec80b290ed71d', 1, 1139272761, 1139272761, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('89e023daa21055f44edf5486a40afed5', 1, 1139272771, 1139272771, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('a02d3b89f9d1711c2ec0186ded3b51c7', 1, 1139272777, 1139272777, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('7f752ea9fb2022c9f41bff2f211c4186', 1, 1139272786, 1139272786, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('e8a6c1bc7c8c63cfbab53066a0902c69', 1, 1139272841, 1139272841, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('089514fba1ba965867e71909eadf853e', 1, 1139272847, 1139272847, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('21f2c9ac5d87b141324905cd8875f703', 1, 1139272849, 1139272849, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('4a6e7ca81df9be43dd1f9ea897d913ec', 1, 1139272857, 1139272857, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('2980cb742fd0d979dda605a3a79c844c', 1, 1139272860, 1139272860, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('116a7366ba2570aea9b2d0928861fd23', 1, 1139272862, 1139272862, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('f6f2e607f5572b11b356b87d0bdf3214', 1, 1139272872, 1139272872, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('ab763dc9685f6b7ef79388c3d66e40ba', 1, 1139272876, 1139272876, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('5a370ffb54b424719a63103d147b8409', 1, 1139272899, 1139272899, 'c9039f10', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('b3827d002f46664e1fbf386ea7217cc4', 1, 1139272911, 1139272911, 'c9039f10', 9, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('c09419fb4c0107f231a819d4887b795c', 1, 1139273319, 1139273319, 'c9039f10', 9, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('81cabda723381f348f5f7c8b0d4844a5', 1, 1139273329, 1139273329, 'c9039f10', -9, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('d766dd166a10a741d6f87d158ce4347f', 3, 1139400108, 1139400108, 'c9189a41', 0, 1);
INSERT INTO `kayapo_bbsessions` VALUES ('a18d277219caeb0f48027ec56ed64336', 2, 1139525644, 1139525644, 'c90284f8', 0, 1);
INSERT INTO `kayapo_bbsessions` VALUES ('951a92b04151711d22673ada20d07f40', 2, 1139529458, 1139529458, 'c90284f8', 0, 1);
INSERT INTO `kayapo_bbsessions` VALUES ('38416b74090498c339ab3a2c88738ced', 2, 1139531348, 1139531348, 'c90284f8', 0, 1);
INSERT INTO `kayapo_bbsessions` VALUES ('824492bb7f7a63be24db0b8ed008e7cf', 2, 1139531936, 1139531936, 'c90284f8', 0, 1);
INSERT INTO `kayapo_bbsessions` VALUES ('54b5a5e02e90f43a4336939bf8ad3dfa', 2, 1139532045, 1139532045, 'c90284f8', 0, 1);
INSERT INTO `kayapo_bbsessions` VALUES ('cdc8e14a4105d09003530b0c7de89b7b', 2, 1139532671, 1139532671, 'c90284f8', 0, 1);
INSERT INTO `kayapo_bbsessions` VALUES ('d2dfb7630ab08c686fcb723c6405bd9b', 1, 1141851368, 1141851368, 'c86522fa', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('fb4b59fc74897d8425ab8e175ab3e57a', 1, 1141851590, 1141851590, 'c86522fa', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('c0eedfd00dede6b2acea571c5826fbc1', 1, 1141852075, 1141852075, 'c86522fa', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('f8c3e114b7918256fa4369812f9bdf8f', 1, 1141938809, 1141938809, 'c91816cd', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('aa1c734118238c34f99970f7c0436f23', 1, 1142510436, 1142510436, 'c8a33fd5', 0, 0);
INSERT INTO `kayapo_bbsessions` VALUES ('14857e494039c25defd5fda85ac4ba67', 2, 1142512404, 1142512404, 'c8b4bd63', 0, 1);
INSERT INTO `kayapo_bbsessions` VALUES ('bd0f174dcb666690eda170eceb3320c0', 2, 1142512693, 1142512693, 'c8b4bd63', 0, 1);
INSERT INTO `kayapo_bbsessions` VALUES ('e5f62d6abd6f515e41e01f3d9d43a15a', 1, 1142944380, 1142944380, 'c90a180c', 0, 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbsmilies`
-- 

CREATE TABLE `kayapo_bbsmilies` (
  `smilies_id` smallint(5) unsigned NOT NULL auto_increment,
  `code` varchar(50) default NULL,
  `smile_url` varchar(100) default NULL,
  `emoticon` varchar(75) default NULL,
  PRIMARY KEY  (`smilies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

-- 
-- Extraindo dados da tabela `kayapo_bbsmilies`
-- 

INSERT INTO `kayapo_bbsmilies` VALUES (1, ':D', 'icon_biggrin.gif', 'Very Happy');
INSERT INTO `kayapo_bbsmilies` VALUES (2, ':-D', 'icon_biggrin.gif', 'Very Happy');
INSERT INTO `kayapo_bbsmilies` VALUES (3, ':grin:', 'icon_biggrin.gif', 'Very Happy');
INSERT INTO `kayapo_bbsmilies` VALUES (4, ':)', 'icon_smile.gif', 'Smile');
INSERT INTO `kayapo_bbsmilies` VALUES (5, ':-)', 'icon_smile.gif', 'Smile');
INSERT INTO `kayapo_bbsmilies` VALUES (6, ':smile:', 'icon_smile.gif', 'Smile');
INSERT INTO `kayapo_bbsmilies` VALUES (7, ':(', 'icon_sad.gif', 'Sad');
INSERT INTO `kayapo_bbsmilies` VALUES (8, ':-(', 'icon_sad.gif', 'Sad');
INSERT INTO `kayapo_bbsmilies` VALUES (9, ':sad:', 'icon_sad.gif', 'Sad');
INSERT INTO `kayapo_bbsmilies` VALUES (10, ':o', 'icon_surprised.gif', 'Surprised');
INSERT INTO `kayapo_bbsmilies` VALUES (11, ':-o', 'icon_surprised.gif', 'Surprised');
INSERT INTO `kayapo_bbsmilies` VALUES (12, ':eek:', 'icon_surprised.gif', 'Surprised');
INSERT INTO `kayapo_bbsmilies` VALUES (13, '8O', 'icon_eek.gif', 'Shocked');
INSERT INTO `kayapo_bbsmilies` VALUES (14, '8-O', 'icon_eek.gif', 'Shocked');
INSERT INTO `kayapo_bbsmilies` VALUES (15, ':shock:', 'icon_eek.gif', 'Shocked');
INSERT INTO `kayapo_bbsmilies` VALUES (16, ':?', 'icon_confused.gif', 'Confused');
INSERT INTO `kayapo_bbsmilies` VALUES (17, ':-?', 'icon_confused.gif', 'Confused');
INSERT INTO `kayapo_bbsmilies` VALUES (18, ':???:', 'icon_confused.gif', 'Confused');
INSERT INTO `kayapo_bbsmilies` VALUES (19, '8)', 'icon_cool.gif', 'Cool');
INSERT INTO `kayapo_bbsmilies` VALUES (20, '8-)', 'icon_cool.gif', 'Cool');
INSERT INTO `kayapo_bbsmilies` VALUES (21, ':cool:', 'icon_cool.gif', 'Cool');
INSERT INTO `kayapo_bbsmilies` VALUES (22, ':lol:', 'icon_lol.gif', 'Laughing');
INSERT INTO `kayapo_bbsmilies` VALUES (23, ':x', 'icon_mad.gif', 'Mad');
INSERT INTO `kayapo_bbsmilies` VALUES (24, ':-x', 'icon_mad.gif', 'Mad');
INSERT INTO `kayapo_bbsmilies` VALUES (25, ':mad:', 'icon_mad.gif', 'Mad');
INSERT INTO `kayapo_bbsmilies` VALUES (26, ':P', 'icon_razz.gif', 'Razz');
INSERT INTO `kayapo_bbsmilies` VALUES (27, ':-P', 'icon_razz.gif', 'Razz');
INSERT INTO `kayapo_bbsmilies` VALUES (28, ':razz:', 'icon_razz.gif', 'Razz');
INSERT INTO `kayapo_bbsmilies` VALUES (29, ':oops:', 'icon_redface.gif', 'Embarassed');
INSERT INTO `kayapo_bbsmilies` VALUES (30, ':cry:', 'icon_cry.gif', 'Crying or Very sad');
INSERT INTO `kayapo_bbsmilies` VALUES (31, ':evil:', 'icon_evil.gif', 'Evil or Very Mad');
INSERT INTO `kayapo_bbsmilies` VALUES (32, ':twisted:', 'icon_twisted.gif', 'Twisted Evil');
INSERT INTO `kayapo_bbsmilies` VALUES (33, ':roll:', 'icon_rolleyes.gif', 'Rolling Eyes');
INSERT INTO `kayapo_bbsmilies` VALUES (34, ':wink:', 'icon_wink.gif', 'Wink');
INSERT INTO `kayapo_bbsmilies` VALUES (35, ';)', 'icon_wink.gif', 'Wink');
INSERT INTO `kayapo_bbsmilies` VALUES (36, ';-)', 'icon_wink.gif', 'Wink');
INSERT INTO `kayapo_bbsmilies` VALUES (37, ':!:', 'icon_exclaim.gif', 'Exclamation');
INSERT INTO `kayapo_bbsmilies` VALUES (38, ':?:', 'icon_question.gif', 'Question');
INSERT INTO `kayapo_bbsmilies` VALUES (39, ':idea:', 'icon_idea.gif', 'Idea');
INSERT INTO `kayapo_bbsmilies` VALUES (40, ':arrow:', 'icon_arrow.gif', 'Arrow');
INSERT INTO `kayapo_bbsmilies` VALUES (41, ':|', 'icon_neutral.gif', 'Neutral');
INSERT INTO `kayapo_bbsmilies` VALUES (42, ':-|', 'icon_neutral.gif', 'Neutral');
INSERT INTO `kayapo_bbsmilies` VALUES (43, ':neutral:', 'icon_neutral.gif', 'Neutral');
INSERT INTO `kayapo_bbsmilies` VALUES (44, ':mrgreen:', 'icon_mrgreen.gif', 'Mr. Green');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbthemes`
-- 

CREATE TABLE `kayapo_bbthemes` (
  `themes_id` mediumint(8) unsigned NOT NULL auto_increment,
  `template_name` varchar(30) NOT NULL default '',
  `style_name` varchar(30) NOT NULL default '',
  `head_stylesheet` varchar(100) default NULL,
  `body_background` varchar(100) default NULL,
  `body_bgcolor` varchar(6) default NULL,
  `body_text` varchar(6) default NULL,
  `body_link` varchar(6) default NULL,
  `body_vlink` varchar(6) default NULL,
  `body_alink` varchar(6) default NULL,
  `body_hlink` varchar(6) default NULL,
  `tr_color1` varchar(6) default NULL,
  `tr_color2` varchar(6) default NULL,
  `tr_color3` varchar(6) default NULL,
  `tr_class1` varchar(25) default NULL,
  `tr_class2` varchar(25) default NULL,
  `tr_class3` varchar(25) default NULL,
  `th_color1` varchar(6) default NULL,
  `th_color2` varchar(6) default NULL,
  `th_color3` varchar(6) default NULL,
  `th_class1` varchar(25) default NULL,
  `th_class2` varchar(25) default NULL,
  `th_class3` varchar(25) default NULL,
  `td_color1` varchar(6) default NULL,
  `td_color2` varchar(6) default NULL,
  `td_color3` varchar(6) default NULL,
  `td_class1` varchar(25) default NULL,
  `td_class2` varchar(25) default NULL,
  `td_class3` varchar(25) default NULL,
  `fontface1` varchar(50) default NULL,
  `fontface2` varchar(50) default NULL,
  `fontface3` varchar(50) default NULL,
  `fontsize1` tinyint(4) default NULL,
  `fontsize2` tinyint(4) default NULL,
  `fontsize3` tinyint(4) default NULL,
  `fontcolor1` varchar(6) default NULL,
  `fontcolor2` varchar(6) default NULL,
  `fontcolor3` varchar(6) default NULL,
  `span_class1` varchar(25) default NULL,
  `span_class2` varchar(25) default NULL,
  `span_class3` varchar(25) default NULL,
  `img_size_poll` smallint(5) unsigned default NULL,
  `img_size_privmsg` smallint(5) unsigned default NULL,
  PRIMARY KEY  (`themes_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Extraindo dados da tabela `kayapo_bbthemes`
-- 

INSERT INTO `kayapo_bbthemes` VALUES (2, 'subSilver', 'CNB', 'forums', '', 'FFFFFF', '000000', '000000', '000000', 'FF0000', 'F44903', 'ECECEC', 'CACCCB', 'CACCCB', '', '', '', 'ECECEC', 'CACCCB', 'ECECEC', '', '', '', 'A3A2A2', 'ECECEC', 'ECECEC', '', '', '', 'Verdana', 'Arial', 'Sans-Serif', 10, 11, 10, '000000', '000000', 'F44903', '', '', '', NULL, NULL);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbthemes_name`
-- 

CREATE TABLE `kayapo_bbthemes_name` (
  `themes_id` smallint(5) unsigned NOT NULL default '0',
  `tr_color1_name` char(50) default NULL,
  `tr_color2_name` char(50) default NULL,
  `tr_color3_name` char(50) default NULL,
  `tr_class1_name` char(50) default NULL,
  `tr_class2_name` char(50) default NULL,
  `tr_class3_name` char(50) default NULL,
  `th_color1_name` char(50) default NULL,
  `th_color2_name` char(50) default NULL,
  `th_color3_name` char(50) default NULL,
  `th_class1_name` char(50) default NULL,
  `th_class2_name` char(50) default NULL,
  `th_class3_name` char(50) default NULL,
  `td_color1_name` char(50) default NULL,
  `td_color2_name` char(50) default NULL,
  `td_color3_name` char(50) default NULL,
  `td_class1_name` char(50) default NULL,
  `td_class2_name` char(50) default NULL,
  `td_class3_name` char(50) default NULL,
  `fontface1_name` char(50) default NULL,
  `fontface2_name` char(50) default NULL,
  `fontface3_name` char(50) default NULL,
  `fontsize1_name` char(50) default NULL,
  `fontsize2_name` char(50) default NULL,
  `fontsize3_name` char(50) default NULL,
  `fontcolor1_name` char(50) default NULL,
  `fontcolor2_name` char(50) default NULL,
  `fontcolor3_name` char(50) default NULL,
  `span_class1_name` char(50) default NULL,
  `span_class2_name` char(50) default NULL,
  `span_class3_name` char(50) default NULL,
  PRIMARY KEY  (`themes_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_bbthemes_name`
-- 

INSERT INTO `kayapo_bbthemes_name` VALUES (2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbtopics`
-- 

CREATE TABLE `kayapo_bbtopics` (
  `topic_id` mediumint(8) unsigned NOT NULL auto_increment,
  `forum_id` smallint(8) unsigned NOT NULL default '0',
  `topic_title` char(60) NOT NULL default '',
  `topic_poster` mediumint(8) NOT NULL default '0',
  `topic_time` int(11) NOT NULL default '0',
  `topic_views` mediumint(8) unsigned NOT NULL default '0',
  `topic_replies` mediumint(8) unsigned NOT NULL default '0',
  `topic_status` tinyint(3) NOT NULL default '0',
  `topic_vote` tinyint(1) NOT NULL default '0',
  `topic_type` tinyint(3) NOT NULL default '0',
  `topic_last_post_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_first_post_id` mediumint(8) unsigned NOT NULL default '0',
  `topic_moved_id` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`topic_id`),
  KEY `forum_id` (`forum_id`),
  KEY `topic_moved_id` (`topic_moved_id`),
  KEY `topic_status` (`topic_status`),
  KEY `topic_type` (`topic_type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_bbtopics`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbtopics_watch`
-- 

CREATE TABLE `kayapo_bbtopics_watch` (
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `notify_status` tinyint(1) NOT NULL default '0',
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`),
  KEY `notify_status` (`notify_status`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_bbtopics_watch`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbuser_group`
-- 

CREATE TABLE `kayapo_bbuser_group` (
  `group_id` mediumint(8) NOT NULL default '0',
  `user_id` mediumint(8) NOT NULL default '0',
  `user_pending` tinyint(1) default NULL,
  KEY `group_id` (`group_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_bbuser_group`
-- 

INSERT INTO `kayapo_bbuser_group` VALUES (1, -1, 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbvote_desc`
-- 

CREATE TABLE `kayapo_bbvote_desc` (
  `vote_id` mediumint(8) unsigned NOT NULL auto_increment,
  `topic_id` mediumint(8) unsigned NOT NULL default '0',
  `vote_text` text NOT NULL,
  `vote_start` int(11) NOT NULL default '0',
  `vote_length` int(11) NOT NULL default '0',
  PRIMARY KEY  (`vote_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_bbvote_desc`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbvote_results`
-- 

CREATE TABLE `kayapo_bbvote_results` (
  `vote_id` mediumint(8) unsigned NOT NULL default '0',
  `vote_option_id` tinyint(4) unsigned NOT NULL default '0',
  `vote_option_text` varchar(255) NOT NULL default '',
  `vote_result` int(11) NOT NULL default '0',
  KEY `vote_option_id` (`vote_option_id`),
  KEY `vote_id` (`vote_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_bbvote_results`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbvote_voters`
-- 

CREATE TABLE `kayapo_bbvote_voters` (
  `vote_id` mediumint(8) unsigned NOT NULL default '0',
  `vote_user_id` mediumint(8) NOT NULL default '0',
  `vote_user_ip` char(8) NOT NULL default '',
  KEY `vote_id` (`vote_id`),
  KEY `vote_user_id` (`vote_user_id`),
  KEY `vote_user_ip` (`vote_user_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_bbvote_voters`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_bbwords`
-- 

CREATE TABLE `kayapo_bbwords` (
  `word_id` mediumint(8) unsigned NOT NULL auto_increment,
  `word` char(100) NOT NULL default '',
  `replacement` char(100) NOT NULL default '',
  PRIMARY KEY  (`word_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_bbwords`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_blocks`
-- 

CREATE TABLE `kayapo_blocks` (
  `bid` int(10) NOT NULL auto_increment,
  `bkey` varchar(15) NOT NULL default '',
  `title` varchar(60) NOT NULL default '',
  `content` text NOT NULL,
  `url` varchar(200) NOT NULL default '',
  `bposition` char(1) NOT NULL default '',
  `weight` int(10) NOT NULL default '1',
  `active` int(1) NOT NULL default '1',
  `refresh` int(10) NOT NULL default '0',
  `time` varchar(14) NOT NULL default '0',
  `blanguage` varchar(30) NOT NULL default '',
  `blockfile` varchar(255) NOT NULL default '',
  `view` int(1) NOT NULL default '0',
  `groups` text NOT NULL,
  `expire` varchar(14) NOT NULL default '0',
  `action` char(1) NOT NULL default '',
  `subscription` int(1) NOT NULL default '0',
  PRIMARY KEY  (`bid`),
  KEY `bid` (`bid`),
  KEY `title` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- 
-- Extraindo dados da tabela `kayapo_blocks`
-- 

INSERT INTO `kayapo_blocks` VALUES (2, 'admin', 'Administra?', '<strong><big>?</big></strong> <a href="admin.php">Menu de Administra??o</a><br>\r\n<strong><big>?</big></strong> <a href="admin.php?op=FCKadminStory">Nova Not?cia</a><br>\r\n<strong><big>?</big></strong> <a href="admin.php?op=create">Alterar Enquete</a><br>\r\n<strong><big>?</big></strong> <a href="admin.php?op=content">Inserir Conte?do</a><br>\r\n<strong><big>?</big></strong> <a href="admin.php?op=logout">Logout</a><center>', '', 'l', 1, 0, 0, '985591188', '', '', 2, '', '0', 'd', 0);
INSERT INTO `kayapo_blocks` VALUES (9, '', 'Ouvintes', '', '', 'l', 4, 1, 3600, '', '', 'block-User_Info.php', 0, '', '0', 'd', 0);
INSERT INTO `kayapo_blocks` VALUES (10, '', 'Tempo Agora', '<p align="center"><iframe src="http://www.tempoagora.com.br/selos/custom/selo.php?cid=NovaMutum-MT;" name="seloNovaMutum-MT" width="120" height="125" frameborder="0" marginheight="0" marginwidth="0" scrolling="no"></iframe></p>', '', 'l', 3, 1, 3600, '', '', '', 0, '', '0', 'd', 0);
INSERT INTO `kayapo_blocks` VALUES (11, '', 'Últimas Notícias Atualizadas', '<MARQUEE behavior="scroll" align="left" direction="up" height="100" width="500" scrollamount="1" scrolldelay="10" onmouseover=''''this.stop()'''' onmouseout=''''this.start()''''>\r\n      <iframe src="news2.php" width="500" height="450" frameborder="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>\r\n      </marquee>\r\n                           ', '', 'c', 2, 1, 0, '', '', '', 0, '', '0', 'd', 0);
INSERT INTO `kayapo_blocks` VALUES (12, '', 'Foruns', '', '', 'r', 3, 1, 3600, '', '', 'block-Forums_lateral.php', 0, '', '0', 'd', 0);
INSERT INTO `kayapo_blocks` VALUES (13, '', 'Eventos', '', '', 'r', 4, 1, 0, '', '', 'block-Calendar3.php', 0, '', '0', 'd', 0);
INSERT INTO `kayapo_blocks` VALUES (5, 'userbox', 'Bloco do Usu?rio', '', '', 'r', 1, 0, 0, '', '', '', 1, '', '0', 'd', 0);
INSERT INTO `kayapo_blocks` VALUES (6, '', 'Top 10', '', '', 'r', 2, 1, 0, '', '', 'block-Survey.php', 0, '', '0', 'd', 0);
INSERT INTO `kayapo_blocks` VALUES (14, '', 'Menu', '<table width="160" border="0" cellspacing="0" cellpadding="0"><tr>\r\n    <td width="160" height="20" bgcolor="#FFFFFF"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> \r\n      <img src="downloads.gif" width="16" height="14"> <B> Home</B><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="index.php" target=_top>Home</a></strong><BR>\r\n      <BR>\r\n      <img src="downloads2.gif" width="16" height="15"> <B> Emissora</B><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="modules.php?name=Content&pa=showpage&pid=4">Locutores</a><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="modules.php?name=Content&pa=showpage&pid=2">Histórico</a><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="modules.php?name=Content&pa=showpage&pid=3">Programação</a></a><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="index.php">Fotos</a><BR>\r\n      <BR>\r\n      <img src="network.gif" width="16" height="15"> <B> Notícias</B><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="modules.php?name=Stories_Archive">Notícias</a><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="modules.php?name=FCKeditor">Enviar Notícia</a><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="modules.php?name=Forums">Foruns</a><BR>\r\n      <BR>\r\n      <img src="eventos.gif" width="16" height="15"> <B> Interação</B><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="modules.php?name=Content&pa=showpage&pid=1">Peça sua música!</a><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="modules.php?name=Calendar">Eventos</a><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="modules.php?name=Surveys">Enquete</a><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="batepapo/index.asp" target=_blank>Bate Papo</a><BR>\r\n      <BR>\r\n      <img src="outros.gif" width="16" height="15"> <B> Outros</B><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="modules.php?name=Statistics">Estatísticas</a><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="modules.php?name=Your_Account">Sua Conta</a><BR>\r\n      <img src="bala.gif" width="16" height="16"> <a href="modules.php?name=Content&pa=showpage&pid=5">Contatos</a><BR>\r\n	   </td>\r\n  </tr></table>', '', 'l', 2, 1, 0, '', '', '', 0, '', '0', 'd', 0);
INSERT INTO `kayapo_blocks` VALUES (16, '', '', '<p align="center"><embed src="autor.swf" width="553" height="200"></embed></p>', '', 'c', 1, 1, 3600, '', '', '', 0, '', '0', 'd', 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_cnbya_config`
-- 

CREATE TABLE `kayapo_cnbya_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` longtext,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_cnbya_config`
-- 

INSERT INTO `kayapo_cnbya_config` VALUES ('sendaddmail', '0');
INSERT INTO `kayapo_cnbya_config` VALUES ('senddeletemail', '0');
INSERT INTO `kayapo_cnbya_config` VALUES ('allowuserdelete', '0');
INSERT INTO `kayapo_cnbya_config` VALUES ('allowusertheme', '1');
INSERT INTO `kayapo_cnbya_config` VALUES ('allowuserreg', '0');
INSERT INTO `kayapo_cnbya_config` VALUES ('allowmailchange', '0');
INSERT INTO `kayapo_cnbya_config` VALUES ('emailvalidate', '1');
INSERT INTO `kayapo_cnbya_config` VALUES ('requireadmin', '0');
INSERT INTO `kayapo_cnbya_config` VALUES ('servermail', '0');
INSERT INTO `kayapo_cnbya_config` VALUES ('useactivate', '0');
INSERT INTO `kayapo_cnbya_config` VALUES ('usegfxcheck', '0');
INSERT INTO `kayapo_cnbya_config` VALUES ('autosuspend', '0');
INSERT INTO `kayapo_cnbya_config` VALUES ('perpage', '100');
INSERT INTO `kayapo_cnbya_config` VALUES ('expiring', '86400');
INSERT INTO `kayapo_cnbya_config` VALUES ('nick_min', '4');
INSERT INTO `kayapo_cnbya_config` VALUES ('nick_max', '20');
INSERT INTO `kayapo_cnbya_config` VALUES ('pass_min', '4');
INSERT INTO `kayapo_cnbya_config` VALUES ('pass_max', '20');
INSERT INTO `kayapo_cnbya_config` VALUES ('bad_mail', 'mysite.com\r\nyoursite.com');
INSERT INTO `kayapo_cnbya_config` VALUES ('bad_nick', 'adm\r\nadmin\r\nan?nimo\r\nanonimo\r\nanonymous\r\ngod\r\nlinux\r\nnobody\r\noperator\r\nroot\r\nstaff\r\nwebmaster');
INSERT INTO `kayapo_cnbya_config` VALUES ('coppa', '0');
INSERT INTO `kayapo_cnbya_config` VALUES ('tos', '0');
INSERT INTO `kayapo_cnbya_config` VALUES ('tosall', '1');
INSERT INTO `kayapo_cnbya_config` VALUES ('cookiecheck', '1');
INSERT INTO `kayapo_cnbya_config` VALUES ('cookiecleaner', '1');
INSERT INTO `kayapo_cnbya_config` VALUES ('cookietimelife', '2592000');
INSERT INTO `kayapo_cnbya_config` VALUES ('cookiepath', '');
INSERT INTO `kayapo_cnbya_config` VALUES ('cookieinactivity', '-');
INSERT INTO `kayapo_cnbya_config` VALUES ('autosuspendmain', '0');
INSERT INTO `kayapo_cnbya_config` VALUES ('codesize', '6');
INSERT INTO `kayapo_cnbya_config` VALUES ('version', '4.4.0 b2');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_cnbya_field`
-- 

CREATE TABLE `kayapo_cnbya_field` (
  `fid` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default 'field',
  `value` varchar(255) default NULL,
  `size` int(3) default NULL,
  `need` int(1) NOT NULL default '1',
  `pos` int(3) default NULL,
  `public` int(1) NOT NULL default '1',
  PRIMARY KEY  (`fid`),
  KEY `fid` (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_cnbya_field`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_cnbya_value`
-- 

CREATE TABLE `kayapo_cnbya_value` (
  `vid` int(10) NOT NULL auto_increment,
  `uid` int(10) NOT NULL default '0',
  `fid` int(10) NOT NULL default '0',
  `value` varchar(255) default NULL,
  PRIMARY KEY  (`vid`),
  KEY `vid` (`vid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_cnbya_value`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_cnbya_value_temp`
-- 

CREATE TABLE `kayapo_cnbya_value_temp` (
  `vid` int(10) NOT NULL auto_increment,
  `uid` int(10) NOT NULL default '0',
  `fid` int(10) NOT NULL default '0',
  `value` varchar(255) default NULL,
  PRIMARY KEY  (`vid`),
  KEY `vid` (`vid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_cnbya_value_temp`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_comments`
-- 

CREATE TABLE `kayapo_comments` (
  `tid` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `date` datetime default NULL,
  `name` varchar(60) NOT NULL default '',
  `email` varchar(60) default NULL,
  `url` varchar(60) default NULL,
  `host_name` varchar(60) default NULL,
  `subject` varchar(85) NOT NULL default '',
  `comment` text NOT NULL,
  `score` tinyint(4) NOT NULL default '0',
  `reason` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`tid`),
  KEY `tid` (`tid`),
  KEY `pid` (`pid`),
  KEY `sid` (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_comments`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_config`
-- 

CREATE TABLE `kayapo_config` (
  `sitename` varchar(255) NOT NULL default '',
  `nukeurl` varchar(255) NOT NULL default '',
  `site_logo` varchar(255) NOT NULL default '',
  `slogan` varchar(255) NOT NULL default '',
  `startdate` varchar(50) NOT NULL default '',
  `adminmail` varchar(255) NOT NULL default '',
  `anonpost` tinyint(1) NOT NULL default '0',
  `Default_Theme` varchar(255) NOT NULL default '',
  `foot1` text NOT NULL,
  `foot2` text NOT NULL,
  `foot3` text NOT NULL,
  `commentlimit` int(9) NOT NULL default '4096',
  `anonymous` varchar(255) NOT NULL default '',
  `minpass` tinyint(1) NOT NULL default '5',
  `pollcomm` tinyint(1) NOT NULL default '1',
  `articlecomm` tinyint(1) NOT NULL default '1',
  `broadcast_msg` tinyint(1) NOT NULL default '1',
  `my_headlines` tinyint(1) NOT NULL default '1',
  `top` int(3) NOT NULL default '10',
  `storyhome` int(2) NOT NULL default '10',
  `user_news` tinyint(1) NOT NULL default '1',
  `oldnum` int(2) NOT NULL default '30',
  `ultramode` tinyint(1) NOT NULL default '0',
  `banners` tinyint(1) NOT NULL default '1',
  `backend_title` varchar(255) NOT NULL default '',
  `backend_language` varchar(10) NOT NULL default '',
  `language` varchar(100) NOT NULL default '',
  `locale` varchar(10) NOT NULL default '',
  `multilingual` tinyint(1) NOT NULL default '0',
  `useflags` tinyint(1) NOT NULL default '0',
  `notify` tinyint(1) NOT NULL default '0',
  `notify_email` varchar(255) NOT NULL default '',
  `notify_subject` varchar(255) NOT NULL default '',
  `notify_message` varchar(255) NOT NULL default '',
  `notify_from` varchar(255) NOT NULL default '',
  `moderate` tinyint(1) NOT NULL default '0',
  `admingraphic` tinyint(1) NOT NULL default '1',
  `httpref` tinyint(1) NOT NULL default '1',
  `httprefmax` int(5) NOT NULL default '1000',
  `CensorMode` tinyint(1) NOT NULL default '3',
  `CensorReplace` varchar(10) NOT NULL default '',
  `copyright` text NOT NULL,
  `Version_Num` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`sitename`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_config`
-- 

INSERT INTO `kayapo_config` VALUES ('Arinos FM', 'http://www.casadaweb.net/arinos', '', 'Arinos FM', 'Mar?o de 2006', 'mandry@casadaweb.net', 0, 'PH2RED', '', '', '', 4096, 'Visitante', 5, 1, 1, 0, 0, 10, 10, 0, 30, 0, 1, 'Arinos FM', 'pt-br', 'brazilian', 'pt_BR', 0, 0, 0, 'e-mail@phpnuke.org.br', 'Algu&eacute;m enviou uma not&iacute;cia!!!', 'Ol?\r\n\\n\\n\r\nAlgu?m enviou uma not?cia para seu portal!', 'webmaster', 0, 1, 1, 2000, 3, '*****', 'PHP-Nuke Copyright &copy; 2004 by Francisco Burzi. This is free software, and you may redistribute it under the <a href="http://phpnuke.org/files/gpl.txt"><font class="footmsg_l">GPL</font></a>. PHP-Nuke comes with absolutely no warranty, for details, see the <a href="http://phpnuke.org/files/gpl.txt"><font class="footmsg_l">license</font></a>.', '7.5 Kayap?');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_confirm`
-- 

CREATE TABLE `kayapo_confirm` (
  `confirm_id` char(32) NOT NULL default '',
  `session_id` char(32) NOT NULL default '',
  `code` char(6) NOT NULL default '',
  PRIMARY KEY  (`session_id`,`confirm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_confirm`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_counter`
-- 

CREATE TABLE `kayapo_counter` (
  `type` varchar(80) NOT NULL default '',
  `var` varchar(80) NOT NULL default '',
  `count` int(10) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_counter`
-- 

INSERT INTO `kayapo_counter` VALUES ('total', 'hits', 1154);
INSERT INTO `kayapo_counter` VALUES ('browser', 'WebTV', 0);
INSERT INTO `kayapo_counter` VALUES ('browser', 'Lynx', 0);
INSERT INTO `kayapo_counter` VALUES ('browser', 'MSIE', 1154);
INSERT INTO `kayapo_counter` VALUES ('browser', 'Opera', 0);
INSERT INTO `kayapo_counter` VALUES ('browser', 'Konqueror', 0);
INSERT INTO `kayapo_counter` VALUES ('browser', 'Netscape', 0);
INSERT INTO `kayapo_counter` VALUES ('browser', 'Bot', 0);
INSERT INTO `kayapo_counter` VALUES ('browser', 'Other', 0);
INSERT INTO `kayapo_counter` VALUES ('os', 'Windows', 1154);
INSERT INTO `kayapo_counter` VALUES ('os', 'Linux', 0);
INSERT INTO `kayapo_counter` VALUES ('os', 'Mac', 0);
INSERT INTO `kayapo_counter` VALUES ('os', 'FreeBSD', 0);
INSERT INTO `kayapo_counter` VALUES ('os', 'SunOS', 0);
INSERT INTO `kayapo_counter` VALUES ('os', 'IRIX', 0);
INSERT INTO `kayapo_counter` VALUES ('os', 'BeOS', 0);
INSERT INTO `kayapo_counter` VALUES ('os', 'OS/2', 0);
INSERT INTO `kayapo_counter` VALUES ('os', 'AIX', 0);
INSERT INTO `kayapo_counter` VALUES ('os', 'Other', 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_encyclopedia`
-- 

CREATE TABLE `kayapo_encyclopedia` (
  `eid` int(10) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `elanguage` varchar(30) NOT NULL default '',
  `active` int(1) NOT NULL default '0',
  PRIMARY KEY  (`eid`),
  KEY `eid` (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_encyclopedia`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_encyclopedia_text`
-- 

CREATE TABLE `kayapo_encyclopedia_text` (
  `tid` int(10) NOT NULL auto_increment,
  `eid` int(10) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `text` text NOT NULL,
  `counter` int(10) NOT NULL default '0',
  PRIMARY KEY  (`tid`),
  KEY `tid` (`tid`),
  KEY `eid` (`eid`),
  KEY `title` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_encyclopedia_text`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_events`
-- 

CREATE TABLE `kayapo_events` (
  `eid` bigint(20) NOT NULL auto_increment,
  `aid` varchar(30) NOT NULL default '',
  `title` varchar(150) default NULL,
  `time` datetime default NULL,
  `hometext` blob,
  `comments` int(11) default '0',
  `counter` mediumint(8) unsigned default NULL,
  `topic` int(3) NOT NULL default '1',
  `informant` varchar(20) NOT NULL default '',
  `eventDate` date NOT NULL default '0000-00-00',
  `endDate` date NOT NULL default '0000-00-00',
  `startTime` time default NULL,
  `endTime` time default NULL,
  `alldayevent` int(1) NOT NULL default '0',
  `barcolor` char(1) default NULL,
  PRIMARY KEY  (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `kayapo_events`
-- 

INSERT INTO `kayapo_events` VALUES (1, 'Mandry', 'Show do Roberto Carlos', '2006-02-07 01:25:12', 0x5375706572204d6567612053686f7720636f6d206f20526569213c6272202f3e0d0a3c6272202f3e0d0a47696ee173696f20646f20417578696c6961646f72613c6272202f3e0d0a3c6272202f3e0d0a496e67726573736f733c6272202f3e0d0a3c6272202f3e0d0a56495020522436303c6272202f3e0d0a3c6272202f3e0d0a43616465697261732043656e747261697320522432353c6272202f3e0d0a3c6272202f3e0d0a4361646569726173204c61746572616973522431303c6272202f3e0d0a, 0, 0, 3, 'Anonymous', 0x323030362d30322d3237, 0x323030362d30322d3238, 0x32323a30303a3030, 0x30363a30303a3030, 0, 'w');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_events_comments`
-- 

CREATE TABLE `kayapo_events_comments` (
  `cid` int(10) unsigned NOT NULL auto_increment,
  `eid` int(10) unsigned NOT NULL default '0',
  `comment` varchar(255) NOT NULL default '',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `name` varchar(255) default NULL,
  PRIMARY KEY  (`cid`),
  UNIQUE KEY `cid` (`cid`),
  KEY `cid_2` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_events_comments`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_events_queue`
-- 

CREATE TABLE `kayapo_events_queue` (
  `qid` bigint(20) NOT NULL auto_increment,
  `uid` mediumint(9) NOT NULL default '0',
  `uname` varchar(40) NOT NULL default '',
  `title` varchar(150) NOT NULL default '',
  `story` blob,
  `timestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  `topic` varchar(20) NOT NULL default '',
  `eventDate` date NOT NULL default '0000-00-00',
  `endDate` date NOT NULL default '0000-00-00',
  `startTime` time default NULL,
  `endTime` time default NULL,
  `alldayevent` int(1) NOT NULL default '0',
  `barcolor` char(1) default NULL,
  PRIMARY KEY  (`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `kayapo_events_queue`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_faqanswer`
-- 

CREATE TABLE `kayapo_faqanswer` (
  `id` tinyint(4) NOT NULL auto_increment,
  `id_cat` tinyint(4) NOT NULL default '0',
  `question` varchar(255) default '',
  `answer` text,
  PRIMARY KEY  (`id`),
  KEY `id` (`id`),
  KEY `id_cat` (`id_cat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_faqanswer`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_faqcategories`
-- 

CREATE TABLE `kayapo_faqcategories` (
  `id_cat` tinyint(3) NOT NULL auto_increment,
  `categories` varchar(255) default NULL,
  `flanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id_cat`),
  KEY `id_cat` (`id_cat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_faqcategories`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_gallery_categories`
-- 

CREATE TABLE `kayapo_gallery_categories` (
  `gallid` int(11) NOT NULL auto_increment,
  `gallname` varchar(30) default NULL,
  `gallimg` varchar(50) default NULL,
  `galloc` blob,
  `description` blob,
  `parent` int(11) default NULL,
  `visible` int(11) default NULL,
  `template` int(11) default NULL,
  `thumbwidth` int(11) default NULL,
  `numcol` int(11) default NULL,
  `total` int(11) default NULL,
  `lastadd` date default NULL,
  PRIMARY KEY  (`gallid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Extraindo dados da tabela `kayapo_gallery_categories`
-- 

INSERT INTO `kayapo_gallery_categories` VALUES (2, 'Kayapo', 'logo.gif', 0x6b617961706f, 0x496d6167656e7320646520cd6e64696f73204b61796170f3732e, -1, 2, 0, 135, 3, 1, 0x323030342d31322d3231);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_gallery_comments`
-- 

CREATE TABLE `kayapo_gallery_comments` (
  `cid` int(11) NOT NULL auto_increment,
  `pid` int(11) default NULL,
  `comment` blob,
  `date` datetime default NULL,
  `name` varchar(255) default NULL,
  `member` int(11) default NULL,
  PRIMARY KEY  (`cid`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Extraindo dados da tabela `kayapo_gallery_comments`
-- 

INSERT INTO `kayapo_gallery_comments` VALUES (1, 1, 0x636f6f6c20617274, '2000-12-19 12:18:53', 'dgrabows', 0);
INSERT INTO `kayapo_gallery_comments` VALUES (2, 1, 0x476f6f64206a6f622062757420636f756c6420626520626574746572, '2001-05-18 17:50:04', 'MarsIsHere', 0);
INSERT INTO `kayapo_gallery_comments` VALUES (3, 1, 0x457420766f696ce0212121, '2001-05-18 17:58:51', 'Webmaster', 1);
INSERT INTO `kayapo_gallery_comments` VALUES (4, 1, 0x726f726f726f, '2001-09-24 21:18:10', 'tororo', 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_gallery_media_class`
-- 

CREATE TABLE `kayapo_gallery_media_class` (
  `id` int(11) NOT NULL auto_increment,
  `class` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Extraindo dados da tabela `kayapo_gallery_media_class`
-- 

INSERT INTO `kayapo_gallery_media_class` VALUES (1, 'Image');
INSERT INTO `kayapo_gallery_media_class` VALUES (2, 'Audio');
INSERT INTO `kayapo_gallery_media_class` VALUES (3, 'Video');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_gallery_media_types`
-- 

CREATE TABLE `kayapo_gallery_media_types` (
  `extension` varchar(10) NOT NULL default '',
  `description` blob,
  `filetype` varchar(20) default NULL,
  `displaytag` blob,
  `thumbnail` varchar(255) default NULL,
  PRIMARY KEY  (`extension`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_gallery_media_types`
-- 

INSERT INTO `kayapo_gallery_media_types` VALUES ('bmp', 0x496d6167652f424d50, '1', 0x3c696d67207372633d223c3a46494c454e414d453a3e2220626f726465723d22302220616c743d223c3a4445534352495054494f4e3a3e223e, 'image_gif.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('gif', 0x496d6167652f474946, '1', 0x3c696d67207372633d223c3a46494c454e414d453a3e2220626f726465723d2231222077696474683d223c3a57494454483a3e22206865696768743d223c3a4845494748543a3e2220616c743d223c3a4445534352495054494f4e3a3e223e, 'image_gif.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('jpg', 0x496d6167652f4a504547, '1', 0x3c696d67207372633d223c3a46494c454e414d453a3e2220626f726465723d2231222077696474683d223c3a57494454483a3e22206865696768743d223c3a4845494748543a3e2220616c743d223c3a4445534352495054494f4e3a3e223e, 'image_jpg.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('png', 0x496d6167652f504e47, '1', 0x3c696d67207372633d223c3a46494c454e414d453a3e2220626f726465723d2231222077696474683d223c3a57494454483a3e22206865696768743d223c3a4845494748543a3e2220616c743d223c3a4445534352495054494f4e3a3e223e, 'image_png.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('mov', 0x566964656f2f517569636b74696d65, '3', 0x3c656d62656420636f6e74726f6c6c65723d2274727565222077696474683d223c3a57494454483a3e22206865696768743d223c3a4845494748543a3e22207372633d223c3a46494c454e414d453a3e2220626f726465723d22302220706c7567696e73706167653d22687474703a2f2f7777772e6170706c652e636f6d2f717569636b74696d652f646f776e6c6f61642f696e646578742e68746d6c223e3c2f656d6265643e, 'video_mov.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('avi', 0x566964656f2f415649, '3', 0x3c656d626564207372633d223c3a46494c454e414d453a3e22207769647468203d2236343022206865696768743d2234383022207a6f6f6d3d22313030252220636f6e74726f6c6c65723d2274727565222073686f77646973706c61793d2230222073686f77636f6e74726f6c3d223122206175746f73697a653d2230222073686f777374617475736261723d22312220626f726465723d22302220747970653d226170706c69636174696f6e2f782d6d706c6179657232223e3c2f656d6265643e, 'video_avi.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('mpg', 0x566964656f2f4d504547, '3', 0x3c656d626564207372633d223c3a46494c454e414d453a3e22207769647468203d2236343022206865696768743d2234383022207a6f6f6d3d22313030252220636f6e74726f6c6c65723d2274727565222073686f77646973706c61793d2230222073686f77636f6e74726f6c3d223122206175746f73697a653d2230222073686f777374617475736261723d22312220626f726465723d22302220747970653d226170706c69636174696f6e2f782d6d706c6179657232223e3c2f656d6265643e, 'video_mpg.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('mp3', 0x417564696f2f4d5033, '2', 0x3c656d626564207372633d223c3a46494c454e414d453a3e2220747970653d226170706c69636174696f6e2f782d6d706c6179657232222068696464656e3d2266616c736522206175746f73746172743d227472756522206c6f6f703d2266616c7365222073686f77646973706c61793d2230222073686f77636f6e74726f6c3d223122206175746f73697a653d2230222073686f777374617475736261723d22312220626f726465723d223022203c2f656d6265643e, 'audio_mp3.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('mid', 0x417564696f2f4d494449, '2', 0x3c656d626564207372633d223c3a46494c454e414d453a3e2220747970653d22617564696f2f6d696469222068696464656e3d2266616c736522206175746f73746172743d227472756522206c6f6f703d2266616c7365222073686f77646973706c61793d2230222073686f77636f6e74726f6c3d223122206175746f73697a653d2230222073686f777374617475736261723d22312220626f726465723d223022203c2f656d6265643e, 'audio_mid.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('swf', 0x566964656f2f466c617368, '3', 0x3c656d626564207372633d223c3a46494c454e414d453a3e2220706c7567696e73706167653d22687474703a2f2f7777772e6d6163726f6d656469612e636f6d2f73686f636b776176652f646f776e6c6f61642f696e6465782e6367693f50315f50726f645f56657273696f6e3d53686f636b77617665466c6173682220747970653d226170706c69636174696f6e2f782d73686f636b776176652d666c617368222077696474683d223c3a57494454483a3e22206865696768743d223c3a4845494748543a3e2220706c61793d227472756522206c6f6f703d227472756522207175616c6974793d226869676822207363616c653d2273686f77616c6c22206d656e753d2274727565223e3c2f656d6265643e, 'video_swf.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('wma', 0x417564696f2f574d41, '2', 0x3c656d626564207372633d223c3a46494c454e414d453a3e2220747970653d22617564696f2f6d696469222068696464656e3d2266616c736522206175746f73746172743d227472756522206c6f6f703d2266616c7365222073686f77646973706c61793d2230222073686f77636f6e74726f6c3d223122206175746f73697a653d2230222073686f777374617475736261723d22312220626f726465723d223022203c2f656d6265643e, 'audio_mid.gif');
INSERT INTO `kayapo_gallery_media_types` VALUES ('wmv', 0x566964656f2f4d6f766965, '3', 0x3c656d626564207372633d223c3a46494c454e414d453a3e2220207769647468203d2236343022206865696768743d223438302220636f6e74726f6c6c65723d2274727565222073686f77646973706c61793d2230222073686f77636f6e74726f6c3d223122206175746f73697a653d2230222073686f777374617475736261723d22312220626f726465723d22302220747970653d226170706c69636174696f6e2f782d6d706c6179657232223e3c2f656d6265643e, 'video_mpg.gif');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_gallery_pictures`
-- 

CREATE TABLE `kayapo_gallery_pictures` (
  `pid` int(11) NOT NULL auto_increment,
  `gid` int(11) default NULL,
  `img` varchar(255) default NULL,
  `counter` int(11) default NULL,
  `submitter` varchar(24) default NULL,
  `date` datetime default NULL,
  `name` varchar(255) default NULL,
  `description` blob,
  `votes` int(11) default NULL,
  `rate` double default NULL,
  `extension` varchar(10) default NULL,
  `width` int(11) default NULL,
  `height` int(11) default NULL,
  PRIMARY KEY  (`pid`),
  KEY `gid` (`gid`),
  KEY `counter` (`counter`),
  KEY `date` (`date`),
  KEY `votes` (`votes`),
  KEY `rate` (`rate`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Extraindo dados da tabela `kayapo_gallery_pictures`
-- 

INSERT INTO `kayapo_gallery_pictures` VALUES (7, 2, 'kayapo-card01.jpg', 16, 'Kayap?', '2004-12-21 10:52:05', 'Kayapo01', 0x496d6167656d20646520756d206a6f76656d20ed6e64696f204b61796170f32e0d0a0d0a4573746120696d6167656d20e920636f72746573696120646520476572686172642050726f6b6f702e, 0, 0, 'jpg', 430, 600);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_gallery_pictures_newpicture`
-- 

CREATE TABLE `kayapo_gallery_pictures_newpicture` (
  `pid` int(11) NOT NULL auto_increment,
  `gid` int(11) default NULL,
  `img` varchar(255) default NULL,
  `counter` int(11) default NULL,
  `submitter` varchar(24) default NULL,
  `date` datetime default NULL,
  `name` varchar(255) default NULL,
  `description` blob,
  `votes` int(11) default NULL,
  `rate` double default NULL,
  `extension` varchar(10) default NULL,
  `width` int(11) default NULL,
  `height` int(11) default NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_gallery_pictures_newpicture`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_gallery_rate_check`
-- 

CREATE TABLE `kayapo_gallery_rate_check` (
  `ip` varchar(20) default NULL,
  `time` varchar(14) default NULL,
  `pid` int(11) default NULL,
  KEY `ip` (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_gallery_rate_check`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_gallery_template_types`
-- 

CREATE TABLE `kayapo_gallery_template_types` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) default NULL,
  `type` int(11) default NULL,
  `templateCategory` blob,
  `templatePictures` blob,
  `templateCSS` blob,
  PRIMARY KEY  (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Extraindo dados da tabela `kayapo_gallery_template_types`
-- 

INSERT INTO `kayapo_gallery_template_types` VALUES (1, 'Default Main Page Template', 1, 0x3c7461626c6520616c69676e3d2263656e746572223e0d0a3c74723e0d0a093c746420636f6c7370616e3d2232223e0d0a09093c3a47414c4c4e414d453a3e0d0a093c2f74643e0d0a3c2f74723e0d0a3c74723e0d0a093c74643e0d0a09093c3a494d4147453a3e0d0a093c2f74643e0d0a093c74642076616c69676e3d22746f702220616c69676e3d226c656674223e0d0a09093c3a4445534352495054494f4e3a3e0d0a093c2f74643e0d0a3c2f74723e0d0a3c2f7461626c653e, 0x32, 0x2e636f6d6d6f6e5f746578745f626c61636b207b746578742d636f6c6f723a233030303030307d0d0a2e636f6d6d6f6e5f746578745f7768697465207b746578742d636f6c6f723a236666666666667d);
INSERT INTO `kayapo_gallery_template_types` VALUES (2, 'Default', 2, 0x3c7461626c6520626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d2230223e0d0a3c74723e0d0a093c74643e0d0a09093c3a494d4147453a3e0d0a093c2f74643e0d0a093c74642076616c69676e3d22746f70223e0d0a09093c703e0d0a090909093c7461626c653e0d0a090909093c74723e0d0a09090909093c746420616c69676e3d2263656e746572223e0d0a0909090909093c3a444154453a3e0d0a09090909093c2f74643e0d0a09090909093c746420616c69676e3d2263656e746572223e0d0a0909090909093c3a524154453a3e0d0a09090909093c2f74643e0d0a09090909093c746420616c69676e3d2263656e746572223e0d0a0909090909093c3a484954533a3e0d0a09090909093c2f74643e0d0a09090909093c746420616c69676e3d2263656e746572223e0d0a0909090909093c3a4e45573a3e0d0a09090909093c2f74643e0d0a090909093c2f74723e0d0a090909093c2f7461626c653e0d0a09093c2f703e0d0a09093c703e0d0a090909093c3a4445534352495054494f4e3a3e0d0a09093c2f703e0d0a09093c703e0d0a090909093c3a4e42434f4d4d454e54533a3e207c203c3a464f524d41543a3e207c203c3a53495a453a3e0d0a09093c2f703e0d0a093c2f74643e0d0a3c2f74723e0d0a3c2f7461626c653e, 0x3c7461626c653e0d0a3c74723e0d0a093c74642076616c69676e3d22746f702220616c69676e3d2263656e746572223e0d0a09093c3a4e414d4553495a453a3e0d0a09093c62723e3c62723e0d0a09093c5441424c452043656c6c50616464696e673d2230222043656c6c53706163696e673d2230223e0d0a09093c54523e0d0a0909093c54442076616c69676e3d22746f70223e0d0a090909093c3a5355424d49545445523a3e0d0a090909093c3a444154453a3e0d0a090909093c3a484954533a3e0d0a090909093c3a524154453a3e0d0a0909093c2f54443e0d0a09093c2f54523e0d0a09093c2f7461626c653e3c62723e0d0a09093c3a524154494e474241523a3e3c62723e0d0a09093c3a504f5354434152443a3e3c62723e0d0a09093c3a444f574e4c4f41443a3e3c62723e0d0a09093c3a5052494e543a3e0d0a093c2f74643e0d0a093c74642077696474683d223830252220616c69676e3d2263656e746572223e0d0a09093c3a494d4147453a3e0d0a093c2f74643e0d0a3c2f74723e0d0a3c74723e0d0a093c746420636f6c7370616e3d2232223e3c3a4445534352495054494f4e3a3e3c2f74643e0d0a3c2f74723e0d0a3c74723e0d0a093c746420636f6c7370616e3d2232223e0d0a09093c3a434f4d4d454e54533a3e0d0a093c2f74643e0d0a3c2f74723e0d0a3c2f7461626c653e, 0x2e636f6d6d6f6e5f746578745f626c61636b207b746578742d636f6c6f723a233030303030307d0d0a2e636f6d6d6f6e5f746578745f7768697465207b746578742d636f6c6f723a236666666666667d);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_groups`
-- 

CREATE TABLE `kayapo_groups` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `points` int(10) NOT NULL default '0',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_groups`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_groups_points`
-- 

CREATE TABLE `kayapo_groups_points` (
  `id` int(10) NOT NULL auto_increment,
  `points` int(10) NOT NULL default '0',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- 
-- Extraindo dados da tabela `kayapo_groups_points`
-- 

INSERT INTO `kayapo_groups_points` VALUES (1, 0);
INSERT INTO `kayapo_groups_points` VALUES (2, 0);
INSERT INTO `kayapo_groups_points` VALUES (3, 0);
INSERT INTO `kayapo_groups_points` VALUES (4, 0);
INSERT INTO `kayapo_groups_points` VALUES (5, 0);
INSERT INTO `kayapo_groups_points` VALUES (6, 0);
INSERT INTO `kayapo_groups_points` VALUES (7, 0);
INSERT INTO `kayapo_groups_points` VALUES (8, 0);
INSERT INTO `kayapo_groups_points` VALUES (9, 0);
INSERT INTO `kayapo_groups_points` VALUES (10, 0);
INSERT INTO `kayapo_groups_points` VALUES (11, 0);
INSERT INTO `kayapo_groups_points` VALUES (12, 0);
INSERT INTO `kayapo_groups_points` VALUES (13, 0);
INSERT INTO `kayapo_groups_points` VALUES (14, 0);
INSERT INTO `kayapo_groups_points` VALUES (15, 0);
INSERT INTO `kayapo_groups_points` VALUES (16, 0);
INSERT INTO `kayapo_groups_points` VALUES (17, 0);
INSERT INTO `kayapo_groups_points` VALUES (18, 0);
INSERT INTO `kayapo_groups_points` VALUES (19, 0);
INSERT INTO `kayapo_groups_points` VALUES (20, 0);
INSERT INTO `kayapo_groups_points` VALUES (21, 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_headlines`
-- 

CREATE TABLE `kayapo_headlines` (
  `hid` int(11) NOT NULL auto_increment,
  `sitename` varchar(30) NOT NULL default '',
  `headlinesurl` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`hid`),
  KEY `hid` (`hid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- 
-- Extraindo dados da tabela `kayapo_headlines`
-- 

INSERT INTO `kayapo_headlines` VALUES (1, 'AbsoluteGames', 'http://files.gameaholic.com/agfa.rdf');
INSERT INTO `kayapo_headlines` VALUES (2, 'BSDToday', 'http://www.bsdtoday.com/backend/bt.rdf');
INSERT INTO `kayapo_headlines` VALUES (3, 'BrunchingShuttlecocks', 'http://www.brunching.com/brunching.rdf');
INSERT INTO `kayapo_headlines` VALUES (4, 'DailyDaemonNews', 'http://daily.daemonnews.org/ddn.rdf.php3');
INSERT INTO `kayapo_headlines` VALUES (5, 'DigitalTheatre', 'http://www.dtheatre.com/backend.php3?xml=yes');
INSERT INTO `kayapo_headlines` VALUES (6, 'DotKDE', 'http://dot.kde.org/rdf');
INSERT INTO `kayapo_headlines` VALUES (7, 'FreeDOS', 'http://www.freedos.org/channels/rss.cgi');
INSERT INTO `kayapo_headlines` VALUES (8, 'Freshmeat', 'http://freshmeat.net/backend/fm.rdf');
INSERT INTO `kayapo_headlines` VALUES (9, 'Gnome Desktop', 'http://www.gnomedesktop.org/backend.php');
INSERT INTO `kayapo_headlines` VALUES (10, 'HappyPenguin', 'http://happypenguin.org/html/news.rdf');
INSERT INTO `kayapo_headlines` VALUES (11, 'HollywoodBitchslap', 'http://hollywoodbitchslap.com/hbs.rdf');
INSERT INTO `kayapo_headlines` VALUES (12, 'Learning Linux', 'http://www.learninglinux.com/backend.php');
INSERT INTO `kayapo_headlines` VALUES (13, 'LinuxCentral', 'http://linuxcentral.com/backend/lcnew.rdf');
INSERT INTO `kayapo_headlines` VALUES (14, 'LinuxJournal', 'http://www.linuxjournal.com/news.rss');
INSERT INTO `kayapo_headlines` VALUES (15, 'LinuxWeelyNews', 'http://lwn.net/headlines/rss');
INSERT INTO `kayapo_headlines` VALUES (16, 'Listology', 'http://listology.com/recent.rdf');
INSERT INTO `kayapo_headlines` VALUES (17, 'MozillaNewsBot', 'http://www.mozilla.org/newsbot/newsbot.rdf');
INSERT INTO `kayapo_headlines` VALUES (18, 'NewsForge', 'http://www.newsforge.com/newsforge.rdf');
INSERT INTO `kayapo_headlines` VALUES (19, 'NukeResources', 'http://www.nukeresources.com/backend.php');
INSERT INTO `kayapo_headlines` VALUES (20, 'NukeScripts', 'http://www.nukescripts.net/backend.php');
INSERT INTO `kayapo_headlines` VALUES (21, 'PDABuzz', 'http://www.pdabuzz.com/netscape.txt');
INSERT INTO `kayapo_headlines` VALUES (22, 'PHP-Nuke', 'http://phpnuke.org/backend.php');
INSERT INTO `kayapo_headlines` VALUES (23, 'PHP.net', 'http://www.php.net/news.rss');
INSERT INTO `kayapo_headlines` VALUES (24, 'PHPBuilder', 'http://phpbuilder.com/rss_feed.php');
INSERT INTO `kayapo_headlines` VALUES (25, 'PerlMonks', 'http://www.perlmonks.org/headlines.rdf');
INSERT INTO `kayapo_headlines` VALUES (26, 'TheNextLevel', 'http://www.the-nextlevel.com/rdf/tnl.rdf');
INSERT INTO `kayapo_headlines` VALUES (27, 'WebReference', 'http://webreference.com/webreference.rdf');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_journal`
-- 

CREATE TABLE `kayapo_journal` (
  `jid` int(11) NOT NULL auto_increment,
  `aid` varchar(30) NOT NULL default '',
  `title` varchar(80) default NULL,
  `bodytext` text NOT NULL,
  `mood` varchar(48) NOT NULL default '',
  `pdate` varchar(48) NOT NULL default '',
  `ptime` varchar(48) NOT NULL default '',
  `status` varchar(48) NOT NULL default '',
  `mtime` varchar(48) NOT NULL default '',
  `mdate` varchar(48) NOT NULL default '',
  PRIMARY KEY  (`jid`),
  KEY `jid` (`jid`),
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_journal`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_journal_comments`
-- 

CREATE TABLE `kayapo_journal_comments` (
  `cid` int(11) NOT NULL auto_increment,
  `rid` varchar(48) NOT NULL default '',
  `aid` varchar(30) NOT NULL default '',
  `comment` text NOT NULL,
  `pdate` varchar(48) NOT NULL default '',
  `ptime` varchar(48) NOT NULL default '',
  PRIMARY KEY  (`cid`),
  KEY `cid` (`cid`),
  KEY `rid` (`rid`),
  KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_journal_comments`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_journal_stats`
-- 

CREATE TABLE `kayapo_journal_stats` (
  `id` int(11) NOT NULL auto_increment,
  `joid` varchar(48) NOT NULL default '',
  `nop` varchar(48) NOT NULL default '',
  `ldp` varchar(24) NOT NULL default '',
  `ltp` varchar(24) NOT NULL default '',
  `micro` varchar(128) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_journal_stats`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_links_categories`
-- 

CREATE TABLE `kayapo_links_categories` (
  `cid` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL default '',
  `cdescription` text NOT NULL,
  `parentid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`cid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_links_categories`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_links_editorials`
-- 

CREATE TABLE `kayapo_links_editorials` (
  `linkid` int(11) NOT NULL default '0',
  `adminid` varchar(60) NOT NULL default '',
  `editorialtimestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  `editorialtext` text NOT NULL,
  `editorialtitle` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`linkid`),
  KEY `linkid` (`linkid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_links_editorials`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_links_links`
-- 

CREATE TABLE `kayapo_links_links` (
  `lid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime default NULL,
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `hits` int(11) NOT NULL default '0',
  `submitter` varchar(60) NOT NULL default '',
  `linkratingsummary` double(6,4) NOT NULL default '0.0000',
  `totalvotes` int(11) NOT NULL default '0',
  `totalcomments` int(11) NOT NULL default '0',
  PRIMARY KEY  (`lid`),
  KEY `lid` (`lid`),
  KEY `cid` (`cid`),
  KEY `sid` (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_links_links`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_links_modrequest`
-- 

CREATE TABLE `kayapo_links_modrequest` (
  `requestid` int(11) NOT NULL auto_increment,
  `lid` int(11) NOT NULL default '0',
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `modifysubmitter` varchar(60) NOT NULL default '',
  `brokenlink` int(3) NOT NULL default '0',
  PRIMARY KEY  (`requestid`),
  UNIQUE KEY `requestid` (`requestid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_links_modrequest`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_links_newlink`
-- 

CREATE TABLE `kayapo_links_newlink` (
  `lid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `submitter` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`lid`),
  KEY `lid` (`lid`),
  KEY `cid` (`cid`),
  KEY `sid` (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_links_newlink`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_links_votedata`
-- 

CREATE TABLE `kayapo_links_votedata` (
  `ratingdbid` int(11) NOT NULL auto_increment,
  `ratinglid` int(11) NOT NULL default '0',
  `ratinguser` varchar(60) NOT NULL default '',
  `rating` int(11) NOT NULL default '0',
  `ratinghostname` varchar(60) NOT NULL default '',
  `ratingcomments` text NOT NULL,
  `ratingtimestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`ratingdbid`),
  KEY `ratingdbid` (`ratingdbid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_links_votedata`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_main`
-- 

CREATE TABLE `kayapo_main` (
  `main_module` varchar(255) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_main`
-- 

INSERT INTO `kayapo_main` VALUES ('News');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_message`
-- 

CREATE TABLE `kayapo_message` (
  `mid` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL default '',
  `content` text NOT NULL,
  `date` varchar(14) NOT NULL default '',
  `expire` int(7) NOT NULL default '0',
  `active` int(1) NOT NULL default '1',
  `view` int(1) NOT NULL default '1',
  `groups` text NOT NULL,
  `mlanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`mid`),
  UNIQUE KEY `mid` (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `kayapo_message`
-- 

INSERT INTO `kayapo_message` VALUES (1, 'Bem-vindo ao PHP-Nuke CNB 7.5 Kayap?!', 'Este ? o PHP-Nuke CNB 7.5 Kayap?, desenvolvido pelos Administradores da Comunidade PHP-Nuke Brasil - \r\nCNB com o que h? \r\nde melhor para o PHP-Nuke.\r\n<br><br>Para os cr?ditos desta vers?o, acesse <a href="creditos.php">ESTE ARQUIVO</a>.\r\n<br><br>Nesta vers?o voc? ter? a ?ltima vers?o do PHP-Nuke liberada \r\npara o p?blico, adicionada de todos as corre??es de seguran?a e \r\nos aplicativos essenciais \r\npara um \r\nPortal PHP-Nuke rodar perfeitamente.\r\n<br><br>\r\n<b>Itens inclu?dos nesta vers?o:</b>\r\n<br><br>\r\n- PHP-Nuke 7.5 (patch 2.8) chatserv;\r\n<br>\r\n- NSN Sentinel 2.1.2\r\n<br>\r\n- NSN Groups Universal 7.5.1\r\n<br>\r\n- NSN Groups Downloads 7.5\r\n<br>\r\n- CNB Your_Account 4.4\r\n<br>\r\n- My_eGallery 2.8\r\n<br>\r\n- Event Calendar 2.1.3 (modificado para 7.5)\r\n<br><br>\r\nE muito mais...\r\n<br><br>\r\nEste Tema chama-se Kayap?, e foi adaptado do Tema CNB desenvolvido pela Comunidade PHP-Nuke Brasil - CNB especialmente para o lan?amento deste pacote.', '993373194', 0, 0, 1, '', '');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_modules`
-- 

CREATE TABLE `kayapo_modules` (
  `mid` int(10) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `custom_title` varchar(255) NOT NULL default '',
  `active` int(1) NOT NULL default '0',
  `view` int(1) NOT NULL default '0',
  `groups` text NOT NULL,
  `inmenu` tinyint(1) NOT NULL default '1',
  `mod_group` int(10) default '0',
  `admins` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`mid`),
  KEY `mid` (`mid`),
  KEY `title` (`title`),
  KEY `custom_title` (`custom_title`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

-- 
-- Extraindo dados da tabela `kayapo_modules`
-- 

INSERT INTO `kayapo_modules` VALUES (1, 'AvantGo', 'AvantGo', 0, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (2, 'Content', 'Conte?do', 1, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (3, 'Downloads', 'Downloads', 1, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (4, 'Encyclopedia', 'Enciclop?dia', 0, 0, '', 1, 0, 'Arinos FM,');
INSERT INTO `kayapo_modules` VALUES (5, 'FAQ', 'Perguntas Frequentes', 0, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (6, 'Feedback', 'Contate-nos', 0, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (7, 'Forums', 'Foros', 1, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (8, 'Journal', 'Di?rio de Usu?rio', 0, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (9, 'Members_List', 'Lista de Usuários', 1, 1, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (10, 'News', 'Not?cias', 1, 0, '', 1, 0, 'Arinos FM,');
INSERT INTO `kayapo_modules` VALUES (11, 'Private_Messages', 'Mensagens Privadas', 1, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (12, 'Recommend_Us', 'Recomende-nos', 0, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (13, 'Reviews', 'Revis?es', 0, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (15, 'Statistics', 'Estatísticas', 1, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (16, 'Stories_Archive', 'Arquivo de Notícias', 1, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (18, 'Surveys', 'Enquetes', 1, 0, '', 1, 0, 'Arinos FM,');
INSERT INTO `kayapo_modules` VALUES (19, 'Top', 'Top 10', 1, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (20, 'Topics', 'Tópicos', 1, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (21, 'Web_Links', 'Web Links', 1, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (22, 'Your_Account', 'Sua Conta', 1, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (23, 'My_eGallery', 'Galeria de Fotos', 1, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (24, 'Blocked_IPs', 'IPs Bloqueados', 0, 2, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (25, 'Blocked_Ranges', 'Faixas de IPs Bloqueados', 0, 2, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (26, 'Blocked_Referers', 'Referenciadores Bloqueados', 0, 2, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (27, 'Groups', 'Grupos de Usuários', 1, 0, '', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (29, 'Recherches', 'Busca Avan?ada', 0, 0, '1', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (32, 'Submit_Downloads', 'Enviar um Arquivo', 0, 1, '1', 1, 0, '');
INSERT INTO `kayapo_modules` VALUES (30, 'FCKeditor', 'Enviar Not?cia', 1, 0, '1', 1, 0, 'Arinos FM,');
INSERT INTO `kayapo_modules` VALUES (31, 'Calendar', 'Calend?rio', 1, 0, '1', 1, 0, 'Arinos FM,');
INSERT INTO `kayapo_modules` VALUES (33, 'Banner_Ads', 'Banner Ads', 0, 0, '1', 0, 0, '');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsnba_banners`
-- 

CREATE TABLE `kayapo_nsnba_banners` (
  `bid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `pid` tinyint(1) NOT NULL default '0',
  `imptotal` int(11) NOT NULL default '0',
  `impmade` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `imageurl` varchar(200) NOT NULL default '',
  `clickurl` varchar(200) NOT NULL default '',
  `alttext` varchar(255) NOT NULL default '',
  `code` tinyint(1) NOT NULL default '0',
  `flash` tinyint(1) NOT NULL default '0',
  `height` int(4) NOT NULL default '60',
  `width` int(4) NOT NULL default '468',
  `datestr` date NOT NULL default '0000-00-00',
  `dateend` date NOT NULL default '0000-00-00',
  `active` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`bid`),
  KEY `bid` (`bid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `kayapo_nsnba_banners`
-- 

INSERT INTO `kayapo_nsnba_banners` VALUES (1, 1, 1, 12000, 9, 0, 'http://kayapo.phpnuke.org.br/images/banners/banner01.gif', 'http://kayapo.phpnuke.org.br/images/banners', 'CNB Kayap? - A For?a do PHP-Nuke no Brasil!', 0, 0, 60, 468, 0x323030352d30312d3235, 0x323030362d30312d3235, 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsnba_clients`
-- 

CREATE TABLE `kayapo_nsnba_clients` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `login` varchar(25) NOT NULL default '',
  `passwd` varchar(40) NOT NULL default '',
  PRIMARY KEY  (`cid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `kayapo_nsnba_clients`
-- 

INSERT INTO `kayapo_nsnba_clients` VALUES (1, 'CNB', 'webmaster@phpnuke.org.br', 'CNB', 'b15edd567fcbdbb1991dd9c39c21c86b');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsnba_config`
-- 

CREATE TABLE `kayapo_nsnba_config` (
  `id` tinyint(1) NOT NULL auto_increment,
  `ipp` tinyint(4) NOT NULL default '20',
  `impamnt` int(6) NOT NULL default '1000',
  `usegfxcheck` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `kayapo_nsnba_config`
-- 

INSERT INTO `kayapo_nsnba_config` VALUES (1, 20, 1000, 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsngd_accesses`
-- 

CREATE TABLE `kayapo_nsngd_accesses` (
  `username` varchar(60) NOT NULL default '',
  `downloads` int(11) NOT NULL default '0',
  `uploads` int(11) NOT NULL default '0',
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_nsngd_accesses`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsngd_categories`
-- 

CREATE TABLE `kayapo_nsngd_categories` (
  `cid` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL default '',
  `cdescription` text NOT NULL,
  `parentid` int(11) NOT NULL default '0',
  `whoadd` tinyint(2) NOT NULL default '0',
  `uploaddir` varchar(255) NOT NULL default '',
  `canupload` tinyint(2) NOT NULL default '0',
  `active` tinyint(2) NOT NULL default '1',
  PRIMARY KEY  (`cid`),
  KEY `cid` (`cid`),
  KEY `title` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_nsngd_categories`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsngd_config`
-- 

CREATE TABLE `kayapo_nsngd_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` text NOT NULL,
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_nsngd_config`
-- 

INSERT INTO `kayapo_nsngd_config` VALUES ('admperpage', '50');
INSERT INTO `kayapo_nsngd_config` VALUES ('blockunregmodify', '0');
INSERT INTO `kayapo_nsngd_config` VALUES ('dateformat', 'D M j G:i:s T Y');
INSERT INTO `kayapo_nsngd_config` VALUES ('mostpopular', '25');
INSERT INTO `kayapo_nsngd_config` VALUES ('mostpopulartrig', '0');
INSERT INTO `kayapo_nsngd_config` VALUES ('perpage', '10');
INSERT INTO `kayapo_nsngd_config` VALUES ('popular', '500');
INSERT INTO `kayapo_nsngd_config` VALUES ('results', '10');
INSERT INTO `kayapo_nsngd_config` VALUES ('show_links_num', '0');
INSERT INTO `kayapo_nsngd_config` VALUES ('usegfxcheck', '0');
INSERT INTO `kayapo_nsngd_config` VALUES ('show_download', '0');
INSERT INTO `kayapo_nsngd_config` VALUES ('version_number', '1.0.0');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsngd_downloads`
-- 

CREATE TABLE `kayapo_nsngd_downloads` (
  `lid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `hits` int(11) NOT NULL default '0',
  `submitter` varchar(60) NOT NULL default '',
  `sub_ip` varchar(16) NOT NULL default '0.0.0.0',
  `filesize` bigint(20) NOT NULL default '0',
  `version` varchar(20) NOT NULL default '',
  `homepage` varchar(255) NOT NULL default '',
  `active` tinyint(2) NOT NULL default '1',
  PRIMARY KEY  (`lid`),
  KEY `lid` (`lid`),
  KEY `cid` (`cid`),
  KEY `sid` (`sid`),
  KEY `title` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_nsngd_downloads`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsngd_extensions`
-- 

CREATE TABLE `kayapo_nsngd_extensions` (
  `eid` int(11) NOT NULL auto_increment,
  `ext` varchar(6) NOT NULL default '',
  `file` tinyint(1) NOT NULL default '0',
  `image` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`eid`),
  KEY `ext` (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- 
-- Extraindo dados da tabela `kayapo_nsngd_extensions`
-- 

INSERT INTO `kayapo_nsngd_extensions` VALUES (1, '.ace', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (2, '.arj', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (3, '.bz', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (4, '.bz2', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (5, '.cab', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (6, '.exe', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (7, '.gif', 0, 1);
INSERT INTO `kayapo_nsngd_extensions` VALUES (8, '.gz', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (9, '.iso', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (10, '.jpeg', 0, 1);
INSERT INTO `kayapo_nsngd_extensions` VALUES (11, '.jpg', 0, 1);
INSERT INTO `kayapo_nsngd_extensions` VALUES (12, '.lha', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (13, '.lzh', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (14, '.png', 0, 1);
INSERT INTO `kayapo_nsngd_extensions` VALUES (15, '.rar', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (16, '.tar', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (17, '.tgz', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (18, '.uue', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (19, '.zip', 1, 0);
INSERT INTO `kayapo_nsngd_extensions` VALUES (20, '.zoo', 1, 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsngd_mods`
-- 

CREATE TABLE `kayapo_nsngd_mods` (
  `rid` int(11) NOT NULL auto_increment,
  `lid` int(11) NOT NULL default '0',
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `modifier` varchar(60) NOT NULL default '',
  `sub_ip` varchar(16) NOT NULL default '0.0.0.0',
  `brokendownload` int(3) NOT NULL default '0',
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `filesize` bigint(20) NOT NULL default '0',
  `version` varchar(20) NOT NULL default '',
  `homepage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`rid`),
  UNIQUE KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_nsngd_mods`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsngd_new`
-- 

CREATE TABLE `kayapo_nsngd_new` (
  `lid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `name` varchar(100) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `submitter` varchar(60) NOT NULL default '',
  `sub_ip` varchar(16) NOT NULL default '0.0.0.0',
  `filesize` bigint(20) NOT NULL default '0',
  `version` varchar(20) NOT NULL default '',
  `homepage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`lid`),
  KEY `lid` (`lid`),
  KEY `cid` (`cid`),
  KEY `sid` (`sid`),
  KEY `title` (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_nsngd_new`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsngr_config`
-- 

CREATE TABLE `kayapo_nsngr_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` text NOT NULL,
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_nsngr_config`
-- 

INSERT INTO `kayapo_nsngr_config` VALUES ('perpage', '50');
INSERT INTO `kayapo_nsngr_config` VALUES ('date_format', 'Y-m-d');
INSERT INTO `kayapo_nsngr_config` VALUES ('send_notice', '1');
INSERT INTO `kayapo_nsngr_config` VALUES ('script_version', '1.5.0');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsngr_groups`
-- 

CREATE TABLE `kayapo_nsngr_groups` (
  `gid` int(11) NOT NULL auto_increment,
  `gname` varchar(32) NOT NULL default '',
  `gdesc` text NOT NULL,
  `gpublic` tinyint(1) NOT NULL default '0',
  `glimit` int(11) NOT NULL default '0',
  PRIMARY KEY  (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `kayapo_nsngr_groups`
-- 

INSERT INTO `kayapo_nsngr_groups` VALUES (1, 'General', '', 0, 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsngr_users`
-- 

CREATE TABLE `kayapo_nsngr_users` (
  `gid` int(11) NOT NULL default '0',
  `uid` int(11) NOT NULL default '0',
  `uname` varchar(25) NOT NULL default '',
  `trial` tinyint(1) NOT NULL default '0',
  `notice` tinyint(1) NOT NULL default '0',
  `sdate` int(14) NOT NULL default '0',
  `edate` int(14) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_nsngr_users`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsnst_admins`
-- 

CREATE TABLE `kayapo_nsnst_admins` (
  `aid` varchar(25) NOT NULL default '',
  `login` varchar(25) NOT NULL default '',
  `password` varchar(20) NOT NULL default '',
  `password_md5` varchar(60) NOT NULL default '',
  `password_crypt` varchar(60) NOT NULL default '',
  `protected` tinyint(2) NOT NULL default '0',
  PRIMARY KEY  (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_nsnst_admins`
-- 

INSERT INTO `kayapo_nsnst_admins` VALUES ('admin', 'admin', '', '', '', 1);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsnst_blocked_ips`
-- 

CREATE TABLE `kayapo_nsnst_blocked_ips` (
  `ip_addr` varchar(15) NOT NULL default '',
  `user_id` int(11) NOT NULL default '1',
  `username` varchar(60) NOT NULL default 'Anonymous',
  `user_agent` text NOT NULL,
  `date` int(20) NOT NULL default '0',
  `notes` text NOT NULL,
  `reason` tinyint(1) NOT NULL default '0',
  `query_string` text NOT NULL,
  `x_forward_for` varchar(32) NOT NULL default 'None',
  `client_ip` varchar(32) NOT NULL default 'None',
  `remote_addr` varchar(32) NOT NULL default '',
  `remote_port` varchar(11) NOT NULL default 'Unknown',
  `request_method` varchar(10) NOT NULL default '',
  `expires` int(20) NOT NULL default '0',
  `c2c` char(2) NOT NULL default '00',
  PRIMARY KEY  (`ip_addr`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_nsnst_blocked_ips`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsnst_blocked_ranges`
-- 

CREATE TABLE `kayapo_nsnst_blocked_ranges` (
  `ip_lo` int(10) unsigned NOT NULL default '0',
  `ip_hi` int(10) unsigned NOT NULL default '0',
  `date` int(20) NOT NULL default '0',
  `notes` text NOT NULL,
  `reason` tinyint(1) NOT NULL default '0',
  `expires` int(20) NOT NULL default '0',
  `c2c` char(2) NOT NULL default '00',
  KEY `code` (`ip_lo`,`ip_hi`,`c2c`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_nsnst_blocked_ranges`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsnst_blockers`
-- 

CREATE TABLE `kayapo_nsnst_blockers` (
  `blocker` int(4) NOT NULL default '0',
  `block_name` varchar(20) NOT NULL default '',
  `activate` int(4) NOT NULL default '0',
  `block_type` int(4) NOT NULL default '0',
  `email_lookup` int(4) NOT NULL default '0',
  `forward` varchar(255) NOT NULL default '',
  `reason` varchar(20) NOT NULL default '',
  `template` varchar(255) NOT NULL default '',
  `duration` int(20) NOT NULL default '0',
  `htaccess` int(4) NOT NULL default '0',
  `list` longtext NOT NULL,
  PRIMARY KEY  (`blocker`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_nsnst_blockers`
-- 

INSERT INTO `kayapo_nsnst_blockers` VALUES (0, 'other', 0, 0, 0, '', 'Abuse-Other', 'abuse_default.tpl', 0, 0, '');
INSERT INTO `kayapo_nsnst_blockers` VALUES (1, 'union', 0, 0, 0, '', 'Abuse-Union', 'abuse_union.tpl', 0, 0, '');
INSERT INTO `kayapo_nsnst_blockers` VALUES (2, 'clike', 0, 0, 0, '', 'Abuse-CLike', 'abuse_clike.tpl', 0, 0, '');
INSERT INTO `kayapo_nsnst_blockers` VALUES (3, 'harvester', 0, 0, 0, '', 'Abuse-Harvest', 'abuse_harvester.tpl', 0, 0, '@yahoo.com\r\nalexibot\r\nalligator\r\nanonymiz\r\nasterias\r\nbackdoorbot\r\nblack hole\r\nblackwidow\r\nblowfish\r\nbotalot\r\nbuiltbottough\r\nbullseye\r\nbunnyslippers\r\ncatch\r\ncegbfeieh\r\ncharon\r\ncheesebot\r\ncherrypicker\r\nchinaclaw\r\ncombine\r\ncopyrightcheck\r\ncosmos\r\ncrescent\r\ncurl\r\ndbrowse\r\ndisco\r\ndittospyder\r\ndlman\r\ndnloadmage\r\ndownload\r\ndreampassport\r\ndts agent\r\necatch\r\neirgrabber\r\nerocrawler\r\nexpress webpictures\r\nextractorpro\r\neyenetie\r\nfantombrowser\r\nfantomcrew browser\r\nfileheap\r\nfilehound\r\nflashget\r\nfoobot\r\nfranklin locator\r\nfreshdownload\r\nfscrawler\r\ngamespy_arcade\r\ngetbot\r\ngetright\r\ngetweb\r\ngo!zilla\r\ngo-ahead-got-it\r\ngrab\r\ngrafula\r\ngsa-crawler\r\nharvest\r\nhloader\r\nhmview\r\nhttplib\r\nhttpresume\r\nhttrack\r\nhumanlinks\r\nigetter\r\nimage stripper\r\nimage sucker\r\nindustry program\r\nindy library\r\ninfonavirobot\r\ninstallshield digitalwizard\r\ninterget\r\niria\r\nirvine\r\niupui research bot\r\njbh agent\r\njennybot\r\njetcar\r\njobo\r\njoc\r\nkapere\r\nkenjin spider\r\nkeyword density\r\nlarbin\r\nleechftp\r\nleechget\r\nlexibot\r\nlibweb/clshttp\r\nlibwww-perl\r\nlightningdownload\r\nlincoln state web browser\r\nlinkextractorpro\r\nlinkscan/8.1a.unix\r\nlinkwalker\r\nlwp-trivial\r\nlwp::simple\r\nmac finder\r\nmata hari\r\nmediasearch\r\nmetaproducts\r\nmicrosoft url control\r\nmidown tool\r\nmiixpc\r\nmissauga locate\r\nmissouri college browse\r\nmister pix\r\nmoget\r\nmozilla.*newt\r\nmozilla/3.0 (compatible)\r\nmozilla/3.mozilla/2.01\r\nmsie 4.0 (win95)\r\nmultiblocker browser\r\nmydaemon\r\nmygetright\r\nnabot\r\nnavroad\r\nnearsite\r\nnet vampire\r\nnetants\r\nnetmechanic\r\nnetpumper\r\nnetspider\r\nnewsearchengine\r\nnicerspro\r\nninja\r\nnitro downloader\r\nnpbot\r\noctopus\r\noffline explorer\r\noffline navigator\r\nopenfind\r\npagegrabber\r\npapa foto\r\npavuk\r\npbrowse\r\npcbrowser\r\npeval\r\npompos/\r\nprogram shareware\r\npropowerbot\r\nprowebwalker\r\npsurf\r\npuf\r\npuxarapido\r\nqueryn metasearch\r\nrealdownload\r\nreget\r\nrepomonkey\r\nrsurf\r\nrumours-agent\r\nsakura\r\nscan4mail\r\nsemanticdiscovery\r\nsitesnagger\r\nslysearch\r\nspankbot\r\nspanner \r\nspiderzilla\r\nsq webscanner\r\nstamina\r\nstar downloader\r\nsteeler\r\nsteeler\r\nstrip\r\nsuperbot\r\nsuperhttp\r\nsurfbot\r\nsuzuran\r\nswbot\r\nszukacz\r\ntakeout\r\nteleport\r\ntelesoft\r\ntest spider\r\nthe intraformant\r\nthenomad\r\ntighttwatbot\r\ntitan\r\ntocrawl/urldispatcher\r\ntrue_robot\r\ntsurf\r\nturing machine\r\nturingos\r\nurlblaze\r\nurlgetfile\r\nurly warning\r\nutilmind\r\nvci\r\nvoideye\r\nweb image collector\r\nweb sucker\r\nwebauto\r\nwebbandit\r\nwebcapture\r\nwebcollage\r\nwebcopier\r\nwebenhancer\r\nwebfetch\r\nwebgo\r\nwebleacher\r\nwebmasterworldforumbot\r\nwebql\r\nwebreaper\r\nwebsite extractor\r\nwebsite quester\r\nwebster\r\nwebstripper\r\nwebwhacker\r\nwep search\r\nwget\r\nwhizbang\r\nwidow\r\nwildsoft surfer\r\nwww-collector-e\r\nwww.netwu.com\r\nwwwoffle\r\nxaldon\r\nxenu\r\nzeus\r\nziggy\r\nzippy');
INSERT INTO `kayapo_nsnst_blockers` VALUES (4, 'script', 0, 0, 0, '', 'Abuse-Script', 'abuse_script.tpl', 0, 0, '');
INSERT INTO `kayapo_nsnst_blockers` VALUES (5, 'author', 0, 0, 0, '', 'Abuse-Author', 'abuse_author.tpl', 0, 0, '');
INSERT INTO `kayapo_nsnst_blockers` VALUES (6, 'referer', 0, 0, 0, '', 'Abuse-Referer', 'abuse_referer.tpl', 0, 0, '121hr.com\r\n1st-call.net\r\n1stcool.com\r\n5000n.com\r\n69-xxx.com\r\n9irl.com\r\n9uy.com\r\na-day-at-the-party.com\r\naccessthepeace.com\r\nadult-model-nude-pictures.com\r\nadult-sex-toys-free-porn.com\r\nagnitum.com\r\nalfonssackpfeiffe.com\r\nalongwayfrommars.com\r\nanime-sex-1.com\r\nanorex-sf-stimulant-free.com\r\nantibot.net\r\nantique-tokiwa.com\r\napotheke-heute.com\r\narmada31.com\r\nartark.com\r\nartlilei.com\r\nascendbtg.com\r\naschalaecheck.com\r\nasian-sex-free-sex.com\r\naslowspeeker.com\r\nassasinatedfrogs.com\r\nathirst-for-tranquillity.net\r\naubonpanier.com\r\navalonumc.com\r\nayingba.com\r\nbayofnoreturn.com\r\nbbw4phonesex.com\r\nbeersarenotfree.com\r\nbierikiuetsch.com\r\nbilingualannouncements.com\r\nblack-pussy-toon-clip-anal-lover-single.com\r\nblownapart.com\r\nblueroutes.com\r\nboasex.com\r\nbooksandpages.com\r\nbootyquake.com\r\nbossyhunter.com\r\nboyz-sex.com\r\nbrokersaandpokers.com\r\nbrowserwindowcleaner.com\r\nbudobytes.com\r\nbusiness2fun.com\r\nbuymyshitz.com\r\nbyuntaesex.com\r\ncaniputsomeloveintoyou.com\r\ncartoons.net.ru\r\ncaverunsailing.com\r\ncertainhealth.com\r\nclantea.com\r\nclose-protection-services.com\r\nclubcanino.com\r\nclubstic.com\r\ncobrakai-skf.com\r\ncollegefucktour.co.uk\r\ncommanderspank.com\r\ncoolenabled.com\r\ncrusecountryart.com\r\ncrusingforsex.co.uk\r\ncunt-twat-pussy-juice-clit-licking.com\r\ncustomerhandshaker.com\r\ncyborgrama.com\r\ndarkprofits.co.uk\r\ndatingforme.co.uk\r\ndatingmind.com\r\ndegree.org.ru\r\ndelorentos.com\r\ndiggydigger.com\r\ndinkydonkyaussie.com\r\ndjpritchard.com\r\ndjtop.com\r\ndraufgeschissen.com\r\ndreamerteens.co.uk\r\nebonyarchives.co.uk\r\nebonyplaya.co.uk\r\necobuilder2000.com\r\nemailandemail.com\r\nemedici.net\r\nengine-on-fire.com\r\nerocity.co.uk\r\nesport3.com\r\neteenbabes.com\r\neurofreepages.com\r\neurotexans.com\r\nevolucionweb.com\r\nfakoli.com\r\nfe4ba.com\r\nferienschweden.com\r\nfindly.com\r\nfirsttimeteadrinker.com\r\nfishing.net.ru\r\nflatwonkers.com\r\nflowershopentertainment.com\r\nflymario.com\r\nfree-xxx-pictures-porno-gallery.com\r\nfreebestporn.com\r\nfreefuckingmovies.co.uk\r\nfreexxxstuff.co.uk\r\nfruitologist.net\r\nfruitsandbolts.com\r\nfuck-cumshots-free-midget-movie-clips.com\r\nfuck-michaelmoore.com\r\nfundacep.com\r\ngadless.com\r\ngallapagosrangers.com\r\ngalleries4free.co.uk\r\ngalofu.com\r\ngaypixpost.co.uk\r\ngeomasti.com\r\ngirltime.co.uk\r\nglassrope.com\r\ngodjustblessyouall.com\r\ngoldenageresort.com\r\ngonnabedaddies.com\r\ngranadasexi.com\r\ngranadasexi.com\r\nguardingtheangels.com\r\nguyprofiles.co.uk\r\nhappy1225.com\r\nhappychappywacky.com\r\nhealth.org.ru\r\nhexplas.com\r\nhighheelsmodels4fun.com\r\nhillsweb.com\r\nhiptuner.com\r\nhistoryintospace.com\r\nhoa-tuoi.com\r\nhomebuyinginatlanta.com\r\nhorizonultra.com\r\nhorseminiature.net\r\nhotkiss.co.uk\r\nhotlivegirls.co.uk\r\nhotmatchup.co.uk\r\nhusler.co.uk\r\niaentertainment.com\r\niamnotsomeone.com\r\niconsofcorruption.com\r\nihavenotrustinyou.com\r\ninformat-systems.com\r\ninteriorproshop.com\r\nintersoftnetworks.com\r\ninthecrib.com\r\ninvestment4cashiers.com\r\niti-trailers.com\r\njackpot-hacker.com\r\njacks-world.com\r\njamesthesailorbasher.com\r\njesuislemonds.com\r\njustanotherdomainname.com\r\nkampelicka.com\r\nkanalrattenarsch.com\r\nkatzasher.com\r\nkerosinjunkie.com\r\nkillasvideo.com\r\nkoenigspisser.com\r\nkontorpara.com\r\nl8t.com\r\nlaestacion101.com\r\nlambuschlamppen.com\r\nlankasex.co.uk\r\nlaser-creations.com\r\nle-tour-du-monde.com\r\nlecraft.com\r\nledo-design.com\r\nleftregistration.com\r\nlekkikoomastas.com\r\nlepommeau.com\r\nlibr-animal.com\r\nlibraries.org.ru\r\nlikewaterlikewind.com\r\nlimbojumpers.com\r\nlink.ru\r\nlockportlinks.com\r\nloiproject.com\r\nlongtermalternatives.com\r\nlottoeco.com\r\nlucalozzi.com\r\nmaki-e-pens.com\r\nmalepayperview.co.uk\r\nmangaxoxo.com\r\nmaps.org.ru\r\nmarcofields.com\r\nmasterofcheese.com\r\nmasteroftheblasterhill.com\r\nmastheadwankers.com\r\nmegafrontier.com\r\nmeinschuppen.com\r\nmercurybar.com\r\nmetapannas.com\r\nmicelebre.com\r\nmidnightlaundries.com\r\nmikeapartment.co.uk\r\nmillenniumchorus.com\r\nmimundial2002.com\r\nminiaturegallerymm.com\r\nmixtaperadio.com\r\nmondialcoral.com\r\nmonja-wakamatsu.com\r\nmonstermonkey.net\r\nmouthfreshners.com\r\nmullensholiday.com\r\nmusilo.com\r\nmyhollowlog.com\r\nmyhomephonenumber.com\r\nmykeyboardisbroken.com\r\nmysofia.net\r\nnaked-cheaters.com\r\nnaked-old-women.com\r\nnastygirls.co.uk\r\nnationclan.net\r\nnatterratter.com\r\nnaughtyadam.com\r\nnestbeschmutzer.com\r\nnetwu.com\r\nnewrealeaseonline.com\r\nnewrealeasesonline.com\r\nnextfrontiersonline.com\r\nnikostaxi.com\r\nnotorious7.com\r\nnrecruiter.com\r\nnursingdepot.com\r\nnustramosse.com\r\nnuturalhicks.com\r\noccaz-auto49.com\r\nocean-db.net\r\noilburnerservice.net\r\nomburo.com\r\noneoz.com\r\nonepageahead.net\r\nonlinewithaline.com\r\norganizate.net\r\nourownweddingsong.com\r\nowen-music.com\r\np-partners.com\r\npaginadeautor.com\r\npakistandutyfree.com\r\npamanderson.co.uk\r\nparentsense.net\r\nparticlewave.net\r\npay-clic.com\r\npay4link.net\r\npcisp.com\r\npersist-pharma.com\r\npeteband.com\r\npetplusindia.com\r\npickabbw.co.uk\r\npicture-oral-position-lesbian.com\r\npl8again.com\r\nplaneting.net\r\npopusky.com\r\nporn-expert.com\r\npromoblitza.com\r\nproproducts-usa.com\r\nptcgzone.com\r\nptporn.com\r\npublishmybong.com\r\nputtingtogether.com\r\nqualifiedcancelations.com\r\nrahost.com\r\nrainbow21.com\r\nrakkashakka.com\r\nrandomfeeding.com\r\nrape-art.com\r\nrd-brains.com\r\nrealestateonthehill.net\r\nrebuscadobot\r\nrequested-stuff.com\r\nretrotrasher.com\r\nricopositive.com\r\nrisorseinrete.com\r\nrotatingcunts.com\r\nrunawayclicks.com\r\nrutalibre.com\r\ns-marche.com\r\nsabrosojazz.com\r\nsamuraidojo.com\r\nsanaldarbe.com\r\nsasseminars.com\r\nschlampenbruzzler.com\r\nsearchmybong.com\r\nseckur.com\r\nsex-asian-porn-interracial-photo.com\r\nsex-porn-fuck-hardcore-movie.com\r\nsexa3.net\r\nsexer.com\r\nsexintention.com\r\nsexnet24.tv\r\nsexomundo.com\r\nsharks.com.ru\r\nshells.com.ru\r\nshop-ecosafe.com\r\nshop-toon-hardcore-fuck-cum-pics.com\r\nsilverfussions.com\r\nsin-city-sex.net\r\nsluisvan.com\r\nsmutshots.com\r\nsnagglersmaggler.com\r\nsomethingtoforgetit.com\r\nsophiesplace.net\r\nsoursushi.com\r\nsouthernxstables.com\r\nspeed467.com\r\nspeedpal4you.com\r\nsporty.org.ru\r\nstopdriving.net\r\nstw.org.ru\r\nsufficientlife.com\r\nsussexboats.net\r\nswinger-party-free-dating-porn-sluts.com\r\nsydneyhay.com\r\nszmjht.com\r\nteninchtrout.com\r\nthebalancedfruits.com\r\ntheendofthesummit.com\r\nthiswillbeit.com\r\nthosethosethose.com\r\nticyclesofindia.com\r\ntits-gay-fagot-black-tits-bigtits-amateur.com\r\ntonius.com\r\ntoohsoft.com\r\ntoolvalley.com\r\ntooporno.net\r\ntoosexual.com\r\ntorngat.com\r\ntour.org.ru\r\ntowneluxury.com\r\ntrafficmogger.com\r\ntriacoach.net\r\ntrottinbob.com\r\ntttframes.com\r\ntvjukebox.net\r\nundercvr.com\r\nunfinished-desires.com\r\nunicornonero.com\r\nunionvillefire.com\r\nupsandowns.com\r\nupthehillanddown.com\r\nvallartavideo.com\r\nvietnamdatingservices.com\r\nvinegarlemonshots.com\r\nvizy.net.ru\r\nvnladiesdatingservices.com\r\nvomitandbusted.com\r\nwalkingthewalking.com\r\nwell-I-am-the-type-of-boy.com\r\nwhales.com.ru\r\nwhincer.net\r\nwhitpagesrippers.com\r\nwhois.sc\r\nwipperrippers.com\r\nwordfilebooklets.com\r\nworld-sexs.com\r\nxsay.com\r\nxxxchyangel.com\r\nxxxx:\r\nxxxzips.com\r\nyouarelostintransit.com\r\nyuppieslovestocks.com\r\nyuzhouhuagong.com\r\nzhaori-food.com\r\nzwiebelbacke.com');
INSERT INTO `kayapo_nsnst_blockers` VALUES (7, 'filter', 0, 0, 0, '', 'Abuse-Filter', 'abuse_filter.tpl', 0, 0, '');
INSERT INTO `kayapo_nsnst_blockers` VALUES (8, 'request', 0, 0, 0, '', 'Abuse-Request', 'abuse_request.tpl', 0, 0, '');
INSERT INTO `kayapo_nsnst_blockers` VALUES (9, 'string', 0, 0, 0, '', 'Abuse-String', 'abuse_string.tpl', 0, 0, '');
INSERT INTO `kayapo_nsnst_blockers` VALUES (10, 'admin', 0, 0, 0, '', 'Abuse-Admin', 'abuse_admin.tpl', 0, 0, '');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsnst_config`
-- 

CREATE TABLE `kayapo_nsnst_config` (
  `config_name` varchar(255) NOT NULL default '',
  `config_value` longtext NOT NULL,
  PRIMARY KEY  (`config_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_nsnst_config`
-- 

INSERT INTO `kayapo_nsnst_config` VALUES ('admin_contact', 'webmaster@yoursite.com');
INSERT INTO `kayapo_nsnst_config` VALUES ('block_perpage', '50');
INSERT INTO `kayapo_nsnst_config` VALUES ('block_sort_column', 'date');
INSERT INTO `kayapo_nsnst_config` VALUES ('block_sort_direction', 'desc');
INSERT INTO `kayapo_nsnst_config` VALUES ('crypt_salt', 'N$');
INSERT INTO `kayapo_nsnst_config` VALUES ('display_link', '3');
INSERT INTO `kayapo_nsnst_config` VALUES ('display_reason', '3');
INSERT INTO `kayapo_nsnst_config` VALUES ('force_nukeurl', '0');
INSERT INTO `kayapo_nsnst_config` VALUES ('help_switch', '1');
INSERT INTO `kayapo_nsnst_config` VALUES ('htaccess_path', '');
INSERT INTO `kayapo_nsnst_config` VALUES ('http_auth', '0');
INSERT INTO `kayapo_nsnst_config` VALUES ('lookup_link', 'http://dnsstuff.com/tools/whois.ch?cache=off&ip=');
INSERT INTO `kayapo_nsnst_config` VALUES ('prevent_dos', '0');
INSERT INTO `kayapo_nsnst_config` VALUES ('proxy_reason', 'admin_proxy_reason.tpl');
INSERT INTO `kayapo_nsnst_config` VALUES ('proxy_switch', '0');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_block_perpage', '50');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_block_sort_column', 'date');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_block_sort_direction', 'desc');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_track_perpage', '50');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_track_sort_column', '6');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_track_sort_direction', 'desc');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_user_perpage', '50');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_user_sort_column', 'username');
INSERT INTO `kayapo_nsnst_config` VALUES ('search_user_sort_direction', 'asc');
INSERT INTO `kayapo_nsnst_config` VALUES ('self_expire', '0');
INSERT INTO `kayapo_nsnst_config` VALUES ('site_reason', 'admin_site_reason.tpl');
INSERT INTO `kayapo_nsnst_config` VALUES ('site_switch', '0');
INSERT INTO `kayapo_nsnst_config` VALUES ('staccess_path', '');
INSERT INTO `kayapo_nsnst_config` VALUES ('track_active', '1');
INSERT INTO `kayapo_nsnst_config` VALUES ('track_del', '1000');
INSERT INTO `kayapo_nsnst_config` VALUES ('track_max', '10000');
INSERT INTO `kayapo_nsnst_config` VALUES ('track_perpage', '50');
INSERT INTO `kayapo_nsnst_config` VALUES ('track_sort_column', '6');
INSERT INTO `kayapo_nsnst_config` VALUES ('track_sort_direction', 'desc');
INSERT INTO `kayapo_nsnst_config` VALUES ('version_number', '2.1.2');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsnst_countries`
-- 

CREATE TABLE `kayapo_nsnst_countries` (
  `c2c` char(2) NOT NULL default '',
  `country` varchar(60) NOT NULL default '',
  KEY `c2c` (`c2c`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_nsnst_countries`
-- 

INSERT INTO `kayapo_nsnst_countries` VALUES ('00', 'Unknown');
INSERT INTO `kayapo_nsnst_countries` VALUES ('01', 'IANA Reserved');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsnst_excluded_ranges`
-- 

CREATE TABLE `kayapo_nsnst_excluded_ranges` (
  `ip_lo` int(10) unsigned NOT NULL default '0',
  `ip_hi` int(10) unsigned NOT NULL default '0',
  `date` int(20) NOT NULL default '0',
  `notes` text NOT NULL,
  `c2c` char(2) NOT NULL default '00',
  KEY `code` (`ip_lo`,`ip_hi`,`c2c`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_nsnst_excluded_ranges`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsnst_protected_ranges`
-- 

CREATE TABLE `kayapo_nsnst_protected_ranges` (
  `ip_lo` int(10) unsigned NOT NULL default '0',
  `ip_hi` int(10) unsigned NOT NULL default '0',
  `date` int(20) NOT NULL default '0',
  `notes` text NOT NULL,
  `c2c` char(2) NOT NULL default '00',
  KEY `code` (`ip_lo`,`ip_hi`,`c2c`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_nsnst_protected_ranges`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsnst_reserved_ranges`
-- 

CREATE TABLE `kayapo_nsnst_reserved_ranges` (
  `ip_lo` int(10) unsigned NOT NULL default '0',
  `ip_hi` int(10) unsigned NOT NULL default '0',
  `date` int(20) NOT NULL default '0',
  `c2c` char(2) NOT NULL default '00',
  KEY `code` (`ip_lo`,`ip_hi`,`c2c`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_nsnst_reserved_ranges`
-- 

INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (0, 16777215, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (16777216, 33554431, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (33554432, 50331647, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (83886080, 100663295, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (117440512, 134217727, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (167772160, 184549375, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (234881024, 251658239, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (385875968, 402653183, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (452984832, 469762047, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (520093696, 536870911, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (603979776, 620756991, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (620756992, 637534207, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (687865856, 704643071, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (704643072, 721420287, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1224736768, 1241513983, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1241513984, 1258291199, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1258291200, 1275068415, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1275068416, 1291845631, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1291845632, 1308622847, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1308622848, 1325400063, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1325400064, 1342177279, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1493172224, 1509949439, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1509949440, 1526726655, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1526726656, 1543503871, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1543503872, 1560281087, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1560281088, 1577058303, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1577058304, 1593835519, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1593835520, 1610612735, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1610612736, 1627389951, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1627389952, 1644167167, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1644167168, 1660944383, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1660944384, 1677721599, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1677721600, 1694498815, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1694498816, 1711276031, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1711276032, 1728053247, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1728053248, 1744830463, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1744830464, 1761607679, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1761607680, 1778384895, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1778384896, 1795162111, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1795162112, 1811939327, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1811939328, 1828716543, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1828716544, 1845493759, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1845493760, 1862270975, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1862270976, 1879048191, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1879048192, 1895825407, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1895825408, 1912602623, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1912602624, 1929379839, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1929379840, 1946157055, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1946157056, 1962934271, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1962934272, 1979711487, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1979711488, 1996488703, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (1996488704, 2013265919, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2013265920, 2030043135, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2030043136, 2046820351, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2046820352, 2063597567, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2063597568, 2080374783, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2080374784, 2097151999, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2097152000, 2113929215, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2113929216, 2130706431, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2130706432, 2147483647, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2851995648, 2852061183, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2886729728, 2887778303, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2902458368, 2919235583, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2919235584, 2936012799, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2936012800, 2952790015, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2952790016, 2969567231, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2969567232, 2986344447, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (2986344448, 3003121663, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3003121664, 3019898879, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3019898880, 3036676095, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3036676096, 3053453311, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3053453312, 3070230527, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3070230528, 3087007743, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3087007744, 3103784959, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3103784960, 3120562175, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3120562176, 3137339391, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3137339392, 3154116607, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3170893824, 3187671039, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3187671040, 3204448255, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3221225472, 3221258239, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3232235520, 3232301055, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3305111552, 3321888767, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3741319168, 3758096383, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3758096384, 3774873599, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3774873600, 3791650815, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3791650816, 3808428031, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3808428032, 3825205247, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3825205248, 3841982463, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3841982464, 3858759679, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3858759680, 3875536895, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3875536896, 3892314111, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3892314112, 3909091327, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3909091328, 3925868543, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3925868544, 3942645759, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3942645760, 3959422975, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3959422976, 3976200191, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3976200192, 3992977407, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (3992977408, 4009754623, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4009754624, 4026531839, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4026531840, 4043309055, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4043309056, 4060086271, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4060086272, 4076863487, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4076863488, 4093640703, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4093640704, 4110417919, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4110417920, 4127195135, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4127195136, 4143972351, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4143972352, 4160749567, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4160749568, 4177526783, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4177526784, 4194303999, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4194304000, 4211081215, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4211081216, 4227858431, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4227858432, 4244635647, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4244635648, 4261412863, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4261412864, 4278190079, 1098424776, '01');
INSERT INTO `kayapo_nsnst_reserved_ranges` VALUES (4278190080, 4294967295, 1098424776, '01');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_nsnst_tracked_ips`
-- 

CREATE TABLE `kayapo_nsnst_tracked_ips` (
  `tid` int(10) NOT NULL auto_increment,
  `ip_addr` varchar(15) NOT NULL default '',
  `hostname` varchar(100) NOT NULL default '',
  `user_id` int(11) NOT NULL default '1',
  `username` varchar(60) NOT NULL default '',
  `user_agent` text NOT NULL,
  `date` int(20) NOT NULL default '0',
  `page` text NOT NULL,
  `x_forward_for` varchar(32) NOT NULL default '',
  `client_ip` varchar(32) NOT NULL default '',
  `remote_addr` varchar(32) NOT NULL default '',
  `remote_port` varchar(11) NOT NULL default '',
  `request_method` varchar(10) NOT NULL default '',
  `c2c` char(2) NOT NULL default '00',
  PRIMARY KEY  (`tid`),
  KEY `tid` (`tid`),
  KEY `maintracking` (`ip_addr`,`hostname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1400 ;

-- 
-- Extraindo dados da tabela `kayapo_nsnst_tracked_ips`
-- 

INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139225510, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '1199', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (2, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139225532, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '1208', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (3, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139225549, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '1211', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (4, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139225660, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '1259', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (5, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139225722, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '1346', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (6, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139225723, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '1346', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (7, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226764, '/arinos/admin.php?op=modules', 'none', 'none', '127.0.0.1', '1649', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (8, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226812, '/arinos/admin.php?op=module_status&mid=1&active=0', 'none', 'none', '127.0.0.1', '1658', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (9, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226813, '/arinos/admin.php?op=modules', 'none', 'none', '127.0.0.1', '1658', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (10, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226829, '/arinos/admin.php?op=module_status&mid=31&active=1', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (11, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226830, '/arinos/admin.php?op=modules', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (12, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226837, '/arinos/admin.php?op=module_status&mid=2&active=1', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (13, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226837, '/arinos/admin.php?op=modules', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (14, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226844, '/arinos/admin.php?op=module_status&mid=3&active=0', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (15, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226845, '/arinos/admin.php?op=modules', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (16, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226855, '/arinos/admin.php?op=module_status&mid=7&active=1', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (17, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226856, '/arinos/admin.php?op=modules', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (18, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226866, '/arinos/admin.php?op=module_status&mid=8&active=0', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (19, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226867, '/arinos/admin.php?op=modules', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (20, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226876, '/arinos/admin.php?op=module_status&mid=9&active=1', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (21, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226876, '/arinos/admin.php?op=modules', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (22, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226887, '/arinos/admin.php?op=module_status&mid=29&active=0', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (23, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226887, '/arinos/admin.php?op=modules', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (24, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226893, '/arinos/admin.php?op=module_status&mid=12&active=0', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (25, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139226893, '/arinos/admin.php?op=modules', 'none', 'none', '127.0.0.1', '1661', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (26, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227689, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '1895', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (27, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227696, '/arinos/admin.php?op=BlocksDelete&bid=8', 'none', 'none', '127.0.0.1', '1895', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (28, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227699, '/arinos/admin.php?op=BlocksDelete&bid=8&ok=1', 'none', 'none', '127.0.0.1', '1897', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (29, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227699, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '1895', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (30, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227708, '/arinos/admin.php?op=BlocksDelete&bid=7', 'none', 'none', '127.0.0.1', '1897', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (31, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227712, '/arinos/admin.php?op=BlocksDelete&bid=7&ok=1', 'none', 'none', '127.0.0.1', '1895', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (32, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227713, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '1897', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (33, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227722, '/arinos/admin.php?op=BlocksDelete&bid=4', 'none', 'none', '127.0.0.1', '1895', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (34, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227726, '/arinos/admin.php?op=BlocksDelete&bid=4&ok=1', 'none', 'none', '127.0.0.1', '1897', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (35, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227726, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '1895', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (36, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227732, '/arinos/admin.php?op=ChangeStatus&bid=5', 'none', 'none', '127.0.0.1', '1897', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (37, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227733, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '1895', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (38, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227738, '/arinos/admin.php?op=ChangeStatus&bid=2', 'none', 'none', '127.0.0.1', '1897', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (39, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227738, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '1895', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (40, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227743, '/arinos/admin.php?op=BlocksDelete&bid=1', 'none', 'none', '127.0.0.1', '1897', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (41, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227747, '/arinos/admin.php?op=BlocksDelete&bid=1&ok=1', 'none', 'none', '127.0.0.1', '1895', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (42, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227747, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '1897', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (43, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227753, '/arinos/admin.php?op=BlocksDelete&bid=3', 'none', 'none', '127.0.0.1', '1895', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (44, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227757, '/arinos/admin.php?op=BlocksDelete&bid=3&ok=1', 'none', 'none', '127.0.0.1', '1897', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (45, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227757, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '1895', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (46, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227773, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '1971', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (47, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227773, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '1971', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (48, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227853, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2005', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (49, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227853, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '2005', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (50, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227989, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2034', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (51, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139227989, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '2034', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (52, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229108, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '2288', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (53, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229306, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '2353', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (54, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229360, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '2364', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (55, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229800, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2541', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (56, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229816, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2541', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (57, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229921, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2564', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (58, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229934, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2564', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (59, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229934, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2566', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (60, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229945, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2564', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (61, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229946, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2566', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (62, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229967, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2582', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (63, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229967, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2582', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (64, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229976, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2586', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (65, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229977, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2582', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (66, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229984, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2582', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (67, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229984, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2586', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (68, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229998, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2582', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (69, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139229999, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2586', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (70, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230011, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2582', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (71, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230011, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2586', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (72, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230020, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2582', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (73, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230020, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2586', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (74, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230032, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2586', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (75, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230032, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2582', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (76, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230049, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2615', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (77, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230050, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2615', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (78, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230059, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2615', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (79, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230059, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2615', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (80, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230069, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2615', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (81, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230070, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2623', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (82, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230076, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2615', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (83, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230077, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2623', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (84, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230092, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2623', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (85, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230093, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2615', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (86, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230100, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2623', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (87, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230101, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2615', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (88, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230110, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2615', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (89, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230110, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2623', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (90, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230118, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2623', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (91, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230119, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2615', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (92, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230131, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2623', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (93, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230132, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2615', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (94, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230141, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2623', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (95, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230141, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2615', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (96, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230151, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2623', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (97, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230151, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2615', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (98, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230159, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2615', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (99, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230159, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2623', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (100, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230172, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2623', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (101, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230172, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2615', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (102, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230179, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2623', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (103, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230179, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2615', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (104, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230191, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2615', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (105, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230192, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2623', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (106, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230199, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2623', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (107, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230200, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2623', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (108, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230211, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2688', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (109, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230211, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2686', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (110, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230226, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2686', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (111, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230227, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2688', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (112, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230322, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2769', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (113, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230322, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2769', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (114, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230355, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2812', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (115, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230355, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2812', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (116, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230368, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2812', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (117, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230369, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2815', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (118, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230383, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2815', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (119, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230383, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2812', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (120, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230404, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2831', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (121, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230404, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2831', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (122, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230420, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2839', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (123, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230421, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2839', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (124, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230428, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2839', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (125, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230428, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2842', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (126, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230444, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2842', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (127, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230445, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2842', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (128, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230480, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2860', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (129, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230480, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2860', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (130, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230494, '/arinos/modules.php?name=Your_Account', 'none', 'none', '127.0.0.1', '2860', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (131, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230663, '/arinos/modules.php?name=Your_Account', 'none', 'none', '127.0.0.1', '2921', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (132, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230669, '/arinos/modules.php?name=Your_Account', 'none', 'none', '127.0.0.1', '2921', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (133, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230702, '/arinos/modules.php?name=Your_Account', 'none', 'none', '127.0.0.1', '2972', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (134, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230799, '/arinos/modules.php?name=Your_Account', 'none', 'none', '127.0.0.1', '2990', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (135, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230808, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2993', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (136, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139230814, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2990', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (137, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139231121, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3065', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (138, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139231121, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3065', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (139, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139231133, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3065', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (140, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139231133, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3068', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (141, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139231134, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3068', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (142, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139231317, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3103', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (143, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139231318, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3103', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (144, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139231394, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3120', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (145, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139234950, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3579', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (146, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139234969, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3587', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (147, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139234970, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3587', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (148, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139235009, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3593', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (149, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139235017, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3593', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (150, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139235017, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3593', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (151, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139235045, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3602', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (152, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139235063, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3606', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (153, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139235064, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3606', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (154, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139235082, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3606', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (155, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139235082, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3609', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (156, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237209, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3857', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (157, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237224, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3859', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (158, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237224, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3857', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (159, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237237, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3859', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (160, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237865, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3959', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (161, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237865, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3959', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (162, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237874, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3959', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (163, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237874, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3962', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (164, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237884, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3962', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (165, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237884, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3962', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (166, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237895, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3975', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (167, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237896, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3962', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (168, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237906, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3975', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (169, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237906, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3962', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (170, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237925, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3988', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (171, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237926, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3988', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (172, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237935, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3988', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (173, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237936, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3991', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (174, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237944, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3991', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (175, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237945, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3988', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (176, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139237954, '/arinos/modules.php?name=Your_Account', 'none', 'none', '127.0.0.1', '3991', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (177, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238005, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4012', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (178, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238032, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4021', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (179, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238054, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4029', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (180, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238055, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4029', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (181, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238338, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4312', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (182, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238397, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4390', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (183, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238413, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4392', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (184, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238413, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4390', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (185, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238449, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4457', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (186, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238461, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4461', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (187, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238462, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4457', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (188, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238479, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4457', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (189, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238479, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4461', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (190, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238811, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4760', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (191, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238818, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4762', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (192, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139238818, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4760', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (193, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139240150, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '1321', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (194, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139241639, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '1813', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (195, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139241646, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '1813', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (196, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139241647, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '1813', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (197, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139241655, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '1823', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (198, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139241655, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '1813', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (199, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139241770, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '1933', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (200, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139241780, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '1933', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (201, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139241780, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '1933', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (202, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139241813, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '1945', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (203, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139241813, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '1945', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (204, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139241968, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2004', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (205, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139241978, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2004', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (206, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139241979, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2004', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (207, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242009, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2051', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (208, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242009, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2051', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (209, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242183, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2199', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (210, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242191, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2199', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (211, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242191, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2199', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (212, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242241, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2210', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (213, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242268, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2221', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (214, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242311, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2237', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (215, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242356, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2250', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (216, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242549, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2282', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (217, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242562, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2292', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (218, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242601, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2350', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (219, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242612, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2350', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (220, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242645, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2377', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (221, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242727, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2392', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (222, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242745, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2402', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (223, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242774, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2414', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (224, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242791, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2424', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (225, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242856, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2446', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (226, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242877, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2455', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (227, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242946, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2471', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (228, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242969, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2481', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (229, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139242999, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2492', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (230, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243041, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2504', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (231, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243080, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2515', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (232, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243092, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2525', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (233, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243228, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2549', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (234, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243233, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2558', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (235, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243260, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2594', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (236, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243273, '/arinos/modules.php?name=News&file=article&sid=1', 'none', 'none', '127.0.0.1', '2594', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (237, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243337, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2665', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (238, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243341, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2670', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (239, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243369, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2678', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (240, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243391, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2686', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (241, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243415, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2693', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (242, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243423, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2700', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (243, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243465, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2714', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (244, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243486, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2724', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (245, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243500, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '2730', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (246, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243503, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2735', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (247, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243543, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2749', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (248, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243595, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2758', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (249, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243640, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2786', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (250, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243685, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2800', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (251, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243792, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2841', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (252, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243831, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2858', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (253, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243864, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2879', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (254, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243890, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2891', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (255, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139243941, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2930', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (256, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244005, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2978', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (257, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244264, '/arinos/modules.php?name=Surveys', 'none', 'none', '127.0.0.1', '3073', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (258, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244264, '/arinos/modules.php?name=Surveys&op=results&pollID=1', 'none', 'none', '127.0.0.1', '3073', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (259, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244333, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3100', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (260, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244354, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3113', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (261, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244506, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3128', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (262, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244509, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3128', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (263, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244575, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3143', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (264, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244606, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3154', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (265, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244672, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3162', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (266, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244742, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3169', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (267, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244766, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3172', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (268, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244805, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3181', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (269, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244848, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3187', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (270, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244892, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3198', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (271, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244922, '/arinos/admin.php?op=editmsg&mid=1', 'none', 'none', '127.0.0.1', '3203', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (272, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244929, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3203', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (273, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244929, '/arinos/admin.php?op=messages', 'none', 'none', '127.0.0.1', '3203', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (274, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244937, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3203', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (275, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244944, '/arinos/modules.php?name=News&file=article&sid=1', 'none', 'none', '127.0.0.1', '3216', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (276, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244949, '/arinos/modules.php?name=News&file=article&sid=1', 'none', 'none', '127.0.0.1', '3203', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (277, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139244996, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3242', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (278, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245005, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3244', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (279, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245027, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3273', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (280, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245032, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3273', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (281, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245063, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3323', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (282, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245067, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3323', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (283, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245070, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3323', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (284, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245163, '/arinos/modules.php?name=News&file=article&sid=1', 'none', 'none', '127.0.0.1', '3356', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (285, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245168, '/arinos/modules.php?name=News&file=article&sid=1', 'none', 'none', '127.0.0.1', '3356', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (286, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245211, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3370', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (287, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245232, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3389', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (288, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245598, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3548', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (289, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245606, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3548', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (290, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245607, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3548', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (291, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245748, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3658', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (292, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245756, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3658', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (293, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245756, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '3658', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (294, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245760, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3658', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (295, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245801, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3682', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (296, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245830, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3688', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (297, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245878, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '3720', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (298, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245934, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3752', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (299, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245934, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '3752', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (300, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245938, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3761', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (301, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245957, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '3775', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (302, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245957, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '127.0.0.1', '3775', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (303, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245964, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3780', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (304, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139245987, '/arinos/modules.php?name=Forums', 'none', 'none', '127.0.0.1', '3792', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (305, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246019, '/arinos/modules.php?name=Your_Account&redirect=index', 'none', 'none', '127.0.0.1', '3801', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (306, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246028, '/arinos/admin.php?op=forums', 'none', 'none', '127.0.0.1', '3809', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (307, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246028, '/arinos/modules/Forums/admin/index.php', 'none', 'none', '127.0.0.1', '3809', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (308, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246030, '/arinos/modules/Forums/admin/index.php?pane=right', 'none', 'none', '127.0.0.1', '3812', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (309, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246030, '/arinos/modules/Forums/admin/index.php?pane=left', 'none', 'none', '127.0.0.1', '3809', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (310, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246036, '/arinos/modules/Forums/admin/admin_board.php?mode=config', 'none', 'none', '127.0.0.1', '3809', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (311, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246061, '/arinos/modules/Forums/admin/admin_board.php', 'none', 'none', '127.0.0.1', '3820', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (312, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246065, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '127.0.0.1', '3820', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (313, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246104, '/arinos/modules.php?name=Forums', 'none', 'none', '127.0.0.1', '3850', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (314, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246162, '/arinos/index.php', 'none', 'none', '127.0.0.1', '3865', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (315, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246554, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4077', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (316, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246556, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4077', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (317, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246569, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4077', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (318, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246570, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4077', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (319, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246904, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4152', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (320, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246915, '/arinos/index.php', 'none', 'none', '127.0.0.1', '4152', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (321, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246942, '/arinos/modules.php?name=News&file=article&sid=1', 'none', 'none', '127.0.0.1', '4168', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (322, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246952, '/arinos/index.php', 'none', 'none', '127.0.0.1', '4168', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (323, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246960, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4170', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (324, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139246967, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4170', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (325, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247047, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4203', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (326, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247087, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4214', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (327, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247139, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4226', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (328, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247147, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4226', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (329, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247148, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4226', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (330, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247161, '/arinos/index.php', 'none', 'none', '127.0.0.1', '4226', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (331, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247168, '/arinos/modules.php?name=News&file=article&sid=1', 'none', 'none', '127.0.0.1', '4226', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (332, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247182, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4226', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (333, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247188, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4232', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (334, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247198, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4232', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (335, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247198, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4226', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (336, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247208, '/arinos/index.php', 'none', 'none', '127.0.0.1', '4226', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (337, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247349, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4313', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (338, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247353, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4313', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (339, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247359, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4313', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (340, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247360, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4313', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (341, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247369, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4322', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (342, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247369, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4313', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (343, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247375, '/arinos/index.php', 'none', 'none', '127.0.0.1', '4313', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (344, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247409, '/arinos/index.php', 'none', 'none', '127.0.0.1', '4339', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (345, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247413, '/arinos/modules.php?name=News&file=article&sid=1', 'none', 'none', '127.0.0.1', '4341', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (346, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247425, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4339', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (347, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247430, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4341', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (348, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247437, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4339', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (349, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247438, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4341', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (350, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247442, '/arinos/index.php', 'none', 'none', '127.0.0.1', '4341', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (351, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247444, '/arinos/index.php', 'none', 'none', '127.0.0.1', '4339', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (352, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247574, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4398', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (353, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247581, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4398', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (354, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247588, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4398', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (355, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247589, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4398', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (356, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247598, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4398', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (357, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247615, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4411', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (358, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247622, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4411', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (359, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247622, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4416', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (360, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247844, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4517', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (361, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247850, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4517', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (362, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247850, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4517', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (363, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247858, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4517', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (364, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247867, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4524', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (365, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247867, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4517', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (366, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247873, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4517', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (367, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247912, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4546', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (368, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247918, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4546', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (369, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247918, '/arinos/admin.php?op=Configure', 'none', 'none', '127.0.0.1', '4546', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (370, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139247931, '/arinos/index.php', 'none', 'none', '127.0.0.1', '4552', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (371, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248069, '/arinos/index.php', 'none', 'none', '127.0.0.1', '4604', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (372, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248081, '/arinos/modules.php?name=News&file=article&sid=1', 'none', 'none', '127.0.0.1', '4606', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (373, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248116, '/arinos/modules.php?name=News&file=article&sid=1', 'none', 'none', '127.0.0.1', '4616', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (374, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248138, '/arinos/modules.php?name=Forums', 'none', 'none', '127.0.0.1', '4624', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (375, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248151, '/arinos/modules.php?name=Your_Account', 'none', 'none', '127.0.0.1', '4624', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (376, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248151, '/arinos/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry', 'none', 'none', '127.0.0.1', '4624', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (377, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248157, '/arinos/modules.php?name=Private_Messages', 'none', 'none', '127.0.0.1', '4632', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (378, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248165, '/arinos/modules.php?name=Private_Messages&file=index&mode=post&sid=c46b261f27e463faa80d42c5378e016e', 'none', 'none', '127.0.0.1', '4624', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (379, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248177, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4632', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (380, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248182, '/arinos/modules.php?name=Your_Account&file=admin', 'none', 'none', '127.0.0.1', '4624', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (381, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248296, '/arinos/modules.php?name=Your_Account&file=admin', 'none', 'none', '127.0.0.1', '4674', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (382, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248313, '/arinos/modules.php?name=Your_Account&file=admin', 'none', 'none', '127.0.0.1', '4680', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (383, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248319, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '4682', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (384, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248334, '/arinos/modules.php?name=Your_Account&file=admin', 'none', 'none', '127.0.0.1', '4682', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (385, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139248346, '/arinos/modules.php?name=Your_Account&file=admin&op=UsersConfig', 'none', 'none', '127.0.0.1', '4682', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (386, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139249516, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '1068', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (387, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139249531, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1075', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (388, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139249696, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1160', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (389, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139249758, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1174', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (390, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139249786, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1181', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (391, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139249850, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '1190', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (392, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139249853, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1194', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (393, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139249876, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1206', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (394, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139249896, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1213', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (395, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139249965, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1226', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (396, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139249980, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1228', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (397, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250056, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1260', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (398, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250095, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1279', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (399, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250124, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1291', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (400, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250217, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1328', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (401, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250234, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1328', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (402, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250327, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1375', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (403, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250342, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1377', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (404, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250390, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1387', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (405, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250469, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1396', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (406, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250694, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1414', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (407, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250769, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1427', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (408, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250782, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1427', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (409, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250798, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1427', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (410, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250817, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1435', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (411, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250833, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1437', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (412, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250862, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1444', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (413, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139250918, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1452', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (414, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251004, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1458', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (415, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251065, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1465', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (416, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251141, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1476', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (417, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251167, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1481', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (418, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251227, '/arinos/modules.php?name=News&file=article&sid=1&mode=&order=0&thold=0', 'none', 'none', '127.0.0.1', '1490', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (419, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251241, '/arinos/modules.php?name=News&file=article&sid=1&mode=&order=0&thold=0', 'none', 'none', '127.0.0.1', '1493', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (420, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251283, '/arinos/modules.php?name=News&file=article&sid=1&mode=&order=0&thold=0', 'none', 'none', '127.0.0.1', '1500', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (421, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251741, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '1906', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (422, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251750, '/arinos/admin.php?op=topicsmanager', 'none', 'none', '127.0.0.1', '1906', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (423, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251774, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '1916', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (424, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251775, '/arinos/admin.php?op=topicsmanager', 'none', 'none', '127.0.0.1', '1916', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (425, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251777, '/arinos/admin.php?op=topicedit&topicid=1', 'none', 'none', '127.0.0.1', '1916', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (426, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251780, '/arinos/admin.php?op=topicdelete&topicid=1', 'none', 'none', '127.0.0.1', '1916', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (427, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251784, '/arinos/admin.php?op=topicdelete&topicid=1&ok=1', 'none', 'none', '127.0.0.1', '1916', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (428, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251784, '/arinos/admin.php?op=topicsmanager', 'none', 'none', '127.0.0.1', '1916', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (429, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251792, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1916', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (430, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139251794, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1916', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (431, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252329, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1953', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (432, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252352, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1959', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (433, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252372, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1965', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (434, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252387, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1967', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (435, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252409, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1973', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (436, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252428, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1978', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (437, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252450, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1984', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (438, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252490, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1992', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (439, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252517, '/arinos/index.php', 'none', 'none', '127.0.0.1', '1998', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (440, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252534, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2000', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (441, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252554, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2010', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (442, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252586, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2015', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (443, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252610, '/arinos/admin.php', 'none', 'none', '127.0.0.1', '2020', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (444, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252691, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2026', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (445, 'none', '', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139252720, '/arinos/index.php', 'none', 'none', '127.0.0.1', '2032', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (446, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139270924, '/arinos/Index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (447, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139270982, '/arinos/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (448, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139271289, '/arinos/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (449, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139271303, '/arinos/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (450, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272194, '/arinos/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (451, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272252, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (452, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272261, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (453, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272276, '/arinos/admin.php?op=forums', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (454, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272276, '/arinos/modules/Forums/admin/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (455, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272277, '/arinos/modules/Forums/admin/index.php?pane=left', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (456, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272277, '/arinos/modules/Forums/admin/index.php?pane=right', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (457, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272306, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (458, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272444, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (459, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272449, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (460, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272492, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (461, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272503, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (462, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272509, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (463, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272535, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (464, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272543, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (465, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272586, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (466, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272609, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (467, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272615, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (468, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272619, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (469, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272657, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (470, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272665, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (471, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272668, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (472, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272673, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (473, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272688, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (474, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272702, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (475, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272725, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (476, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272728, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (477, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272751, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (478, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272758, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (479, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272761, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (480, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272771, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (481, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272777, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (482, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272786, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (483, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272841, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (484, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272847, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (485, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272849, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (486, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272857, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (487, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272860, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (488, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272862, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (489, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272872, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (490, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272876, '/arinos/modules/Forums/admin/admin_forums.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (491, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272893, '/arinos/Index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (492, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272898, '/arinos/modules.php?name=Forums', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (493, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139272911, '/arinos/modules.php?name=Forums&file=viewforum&f=9', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (494, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139273319, '/arinos/modules.php?name=Forums&file=viewforum&f=9', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (495, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139273329, '/arinos/modules.php?name=Forums&file=posting&mode=newtopic&f=9', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (496, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139274450, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (497, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139274473, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (498, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139274487, '/arinos/admin.php?op=BlocksEdit&bid=11', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (499, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139274499, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (500, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139274500, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (501, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139274512, '/arinos/admin.php?op=BlocksEdit&bid=11', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (502, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139274603, '/arinos/Index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (503, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139274721, '/arinos/Index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (504, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139274936, '/arinos/Index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (505, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139275004, '/arinos/Index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (506, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139275106, '/arinos/Index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (507, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139275135, '/arinos/Index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (508, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139275164, '/arinos/modules.php?name=Surveys&op=results&pollID=1&mode=&order=&thold=', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (509, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139275170, '/arinos/admin.php?op=polledit&pollID=1', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (510, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139275221, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (511, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139275221, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (512, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139275344, '/arinos/modules.php?name=Your_Account&op=new_user', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (513, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139275663, '/arinos/modules.php?name=Your_Account', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (514, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139275667, '/arinos/modules.php?name=Your_Account', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (515, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139276200, '/arinos/Index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (516, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139276547, '/arinos/modules.php?name=Your_Account&op=new_user', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (517, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139276704, '/arinos/modules.php?name=Your_Account&op=new_user', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (518, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139276727, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (519, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139276736, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (520, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277024, '/arinos/Index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (521, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277423, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (522, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277430, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (523, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277440, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (524, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277441, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (525, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277451, '/arinos/admin.php?op=BlockOrder&weight=5&bidori=14&weightrep=4&bidrep=13', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (526, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277452, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (527, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277456, '/arinos/admin.php?op=BlockOrder&weight=4&bidori=14&weightrep=3&bidrep=10', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (528, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277457, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (529, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277462, '/arinos/admin.php?op=BlockOrder&weight=3&bidori=14&weightrep=2&bidrep=9', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (530, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277463, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (531, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277628, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (532, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277628, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (533, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277665, '/arinos/admin.php?op=BlocksEdit&bid=15', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (534, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277673, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (535, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277760, '/arinos/admin.php?op=BlocksDelete&bid=15', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (536, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277763, '/arinos/admin.php?op=BlocksDelete&bid=15&ok=1', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (537, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277764, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (538, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277769, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (539, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277777, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (540, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277777, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (541, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277806, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (542, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277810, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (543, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277827, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (544, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277827, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (545, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277833, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (546, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277878, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (547, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277886, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (548, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139277887, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (549, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139278265, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (550, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139278700, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (551, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139279686, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (552, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139279686, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (553, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139279726, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (554, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139279784, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (555, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139279791, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (556, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139279792, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (557, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139279812, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (558, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139279823, '/arinos/admin.php?op=BlocksEdit&bid=13', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (559, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139279831, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (560, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139279831, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (561, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139279842, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (562, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139279861, '/arinos/admin.php?op=BlockOrder&weight=4&bidori=10&weightrep=3&bidrep=9', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (563, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139279861, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (564, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139279870, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (565, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139280000, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (566, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139280008, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (567, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139280008, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (568, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139280017, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (569, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139280304, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (570, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139280742, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (571, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139280750, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (572, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139280750, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (573, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139280885, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (574, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139280893, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (575, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139280894, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (576, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281005, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (577, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281015, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (578, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281015, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (579, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281050, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (580, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281086, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (581, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281142, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (582, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281150, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (583, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281151, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (584, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281154, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (585, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281167, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (586, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281214, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (587, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281220, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (588, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281220, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (589, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281268, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (590, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281322, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (591, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281434, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (592, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281514, '/arinos/modules.php?name=Calendar', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (593, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281523, '/arinos/modules.php?name=Calendar&file=submit', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (594, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281554, '/arinos/admin.php?op=topicsmanager', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (595, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281562, '/arinos/admin.php?op=topicedit&topicid=2', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (596, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281841, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (597, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281841, '/arinos/admin.php?op=topicedit&topicid=2', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (598, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281848, '/arinos/admin.php?op=topicsmanager', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (599, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281860, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (600, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281861, '/arinos/admin.php?op=topicsmanager#Add', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (601, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281868, '/arinos/admin.php?op=topicsmanager', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (602, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139281902, '/arinos/modules.php?name=Calendar', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (603, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282010, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (604, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282075, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (605, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282104, '/arinos/modules.php?name=Calendar', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (606, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282109, '/arinos/modules.php?name=Calendar&file=submit', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (607, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282198, '/arinos/modules.php?name=Calendar&file=submit', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (608, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282390, '/arinos/modules.php?name=Calendar&file=submit', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (609, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282398, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (610, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282404, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (611, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282412, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (612, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282418, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (613, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282424, '/arinos/admin.php?op=BlocksEdit&bid=13', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (614, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282434, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (615, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282434, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (616, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282439, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (617, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282441, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (618, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282463, '/arinos/admin.php?op=BlocksEdit&bid=13', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (619, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282471, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (620, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282471, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (621, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282478, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (622, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282501, '/arinos/admin.php?op=BlocksEdit&bid=13', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (623, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282507, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (624, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282508, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (625, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282511, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (626, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282521, '/arinos/admin.php?op=BlocksEdit&bid=13', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (627, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282526, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (628, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282526, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (629, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282530, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (630, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282552, '/arinos/admin.php?op=BlocksEdit&bid=13', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (631, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282560, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (632, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282560, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (633, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282569, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (634, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282577, '/arinos/modules.php?name=Calendar', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (635, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282584, '/arinos/admin.php?op=CalendarAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (636, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282589, '/arinos/admin.php?op=CalendarAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (637, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282598, '/arinos/modules.php?name=Calendar', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (638, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282601, '/arinos/modules.php?name=Calendar&file=submit', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (639, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282683, '/arinos/modules.php?name=Calendar&file=submit', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (640, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282687, '/arinos/modules.php?name=Calendar&file=submit', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (641, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282694, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (642, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282697, '/arinos/admin.php?op=CalendarAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (643, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282702, '/arinos/admin.php?op=CalendarDisplayStory&qid=1', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (644, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282712, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (645, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282712, '/arinos/admin.php?op=CalendarAdmin', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (646, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282719, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (647, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282913, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (648, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139282959, '/arinos/admin.php?op=mod_authors', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (649, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139283003, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (650, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139283003, '/arinos/admin.php?op=mod_authors', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (651, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139283006, '/arinos/admin.php?op=logout', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (652, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139283011, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (653, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139283053, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (654, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139283135, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (655, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139283152, '/arinos/admin.php?op=logout', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (656, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139283157, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (657, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139283161, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (658, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139283801, '/arinos/Index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (659, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139283935, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (660, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139283947, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (661, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139283950, '/arinos/admin.php?op=FCKadminStory', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (662, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284074, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (663, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284074, '/arinos/admin.php?op=adminMain', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (664, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284091, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (665, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284091, '/arinos/admin.php?op=adminMain', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (666, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284094, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (667, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284101, '/arinos/modules.php?name=News&file=article&sid=2', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (668, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284107, '/arinos/admin.php?op=RemoveStory&sid=2', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (669, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284110, '/arinos/admin.php?op=RemoveStory&sid=2&ok=1', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (670, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284110, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (671, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284115, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (672, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284118, '/arinos/modules.php?name=News&file=article&sid=3', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (673, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284121, '/arinos/admin.php?op=EditStory&sid=3', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (674, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284131, '/arinos/admin.php', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (675, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284131, '/arinos/admin.php?op=adminMain', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (676, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284134, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (677, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284153, '/arinos/modules.php?name=News&file=article&sid=3', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (678, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284156, '/arinos/modules.php?name=News', 'none', 'none', '201.3.159.16', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (679, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284156, '/arinos/modules.php?name=News&op=rate_complete&sid=3', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (680, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284258, '/arinos/modules.php?name=News&op=rate_complete&sid=3', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (681, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284264, '/arinos/modules.php?name=News&file=article&sid=3', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (682, '201.3.159.16', '201-3-159-16.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139284269, '/arinos/index.php', 'none', 'none', '201.3.159.16', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (683, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139311488, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (684, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139314527, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (685, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139314557, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (686, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139314835, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (687, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139317036, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (688, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139327950, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (689, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139328088, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (690, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139328174, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (691, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139330767, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (692, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139330837, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (693, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139333214, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (694, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139333463, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (695, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139337709, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (696, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139338488, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (697, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139357170, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (698, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139358713, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (699, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139359343, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (700, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139359438, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (701, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139360087, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (702, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139360897, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (703, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139363672, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (704, '200.102.143.234', '200-102-143-234.paemt7013.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139365769, '/arinos/Index.php', 'none', 'none', '200.102.143.234', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (705, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139398289, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (706, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139398372, '/arinos/modules.php?name=Surveys', '192.168.0.104', 'none', '201.24.154.65', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (707, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139398373, '/arinos/modules.php?name=Surveys&op=results&pollID=1', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (708, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139398388, '/arinos/index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (709, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139398435, '/arinos/modules.php?name=Your_Account', '192.168.0.104', 'none', '201.24.154.65', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (710, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139398445, '/arinos/modules.php?name=Your_Account&op=new_user', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (711, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139398473, '/arinos/modules.php?name=Your_Account', '192.168.0.104', 'none', '201.24.154.65', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (712, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139398490, '/arinos/modules.php?name=Your_Account', '192.168.0.104', 'none', '201.24.154.65', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (713, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139399693, '/arinos/index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (714, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139399697, '/arinos/index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (715, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139399700, '/arinos/index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (716, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139399702, '/arinos/index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (717, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139399704, '/arinos/modules.php?name=Stories_Archive', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (718, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139399715, '/arinos/modules.php?name=Foruns', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (719, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139399862, '/arinos/modules.php?name=Your_Account&op=activate&username=claudio&check_num=ded2ada63bcb57040db55f695bfc8052', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (720, '201.3.154.64', '201-3-154-64.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139399897, '/arinos/Index.php', 'none', 'none', '201.3.154.64', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (721, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139400055, '/arinos/modules.php?name=Your_Account', '192.168.0.104', 'none', '201.24.154.65', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (722, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139400066, '/arinos/modules.php?name=Your_Account', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (723, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139400067, '/arinos/modules.php?name=Your_Account&op=userinfo&username=claudio', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (724, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139400108, '/arinos/modules.php?name=Members_List', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (725, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139400127, '/arinos/index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (726, '201.11.238.2', '201.11.238.2', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139404507, '/arinos/Index.php', 'none', 'none', '201.11.238.2', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (727, '201.11.238.2', '201.11.238.2', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139426837, '/arinos/Index.php', 'none', 'none', '201.11.238.2', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (728, '201.11.238.2', '201.11.238.2', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139426999, '/arinos/Index.php', 'none', 'none', '201.11.238.2', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (729, '201.11.238.2', '201.11.238.2', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139427103, '/arinos/Index.php', 'none', 'none', '201.11.238.2', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (730, '201.11.238.2', '201.11.238.2', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139427222, '/arinos/Index.php', 'none', 'none', '201.11.238.2', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (731, '201.11.238.2', '201.11.238.2', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139427349, '/arinos/Index.php', 'none', 'none', '201.11.238.2', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (732, '201.11.238.2', '201.11.238.2', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139427477, '/arinos/Index.php', 'none', 'none', '201.11.238.2', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (733, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139427603, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (734, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139427803, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (735, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139428108, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (736, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139428148, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (737, '201.11.238.2', '201.11.238.2', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139428204, '/arinos/Index.php', 'none', 'none', '201.11.238.2', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (738, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139428828, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (739, '201.11.238.2', '201.11.238.2', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139433200, '/arinos/Index.php', 'none', 'none', '201.11.238.2', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (740, '201.11.238.2', '201.11.238.2', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139434377, '/arinos/Index.php', 'none', 'none', '201.11.238.2', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (741, '200.96.127.48', '200.96.127.48', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139458649, '/arinos/Index.php', 'none', 'none', '200.96.127.48', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (742, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139497904, '/arinos/Index.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (743, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139500185, '/arinos/Index.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (744, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139500702, '/arinos/Index.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (745, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139500716, '/arinos/Index.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (746, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139500944, '/arinos/Index.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (747, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139501410, '/arinos/Index.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (748, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139501444, '/arinos/index.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (749, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139501590, '/arinos/index.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (750, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139501737, '/arinos/index.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (751, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139501875, '/arinos/index.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (752, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502048, '/arinos/index.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (753, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502190, '/arinos/index.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (754, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502231, '/arinos/index.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (755, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502366, '/arinos/modules.php?name=Your_Account&op=new_user', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (756, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502381, '/arinos/modules.php?name=Your_Account', 'none', 'none', '201.10.24.196', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (757, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502382, '/arinos/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (758, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502391, '/arinos/admin.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (759, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502396, '/arinos/modules.php?name=Your_Account&file=admin', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (760, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502401, '/arinos/modules.php?name=Your_Account&file=admin&op=UsersConfig', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (761, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502412, '/arinos/admin.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (762, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502415, '/arinos/admin.php?op=logout', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (763, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502420, '/arinos/admin.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (764, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502436, '/arinos/admin.php', 'none', 'none', '201.10.24.196', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (765, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502448, '/arinos/modules.php?name=Your_Account&file=admin', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (766, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502452, '/arinos/modules.php?name=Your_Account&file=admin&op=UsersConfig', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (767, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502459, '/arinos/modules.php?name=Your_Account&file=admin', 'none', 'none', '201.10.24.196', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (768, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502462, '/arinos/admin.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (769, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502466, '/arinos/admin.php?op=mod_authors', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (770, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502471, '/arinos/admin.php?op=modifyadmin&chng_aid=Arinos', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (771, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502494, '/arinos/admin.php', 'none', 'none', '201.10.24.196', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (772, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502496, '/arinos/admin.php?op=mod_authors', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (773, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502502, '/arinos/admin.php?op=logout', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (774, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502507, '/arinos/admin.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (775, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502523, '/arinos/admin.php', 'none', 'none', '201.10.24.196', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (776, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502535, '/arinos/admin.php?op=logout', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (777, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502540, '/arinos/admin.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (778, '201.10.24.196', '201-10-24-196.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502544, '/arinos/index.php', 'none', 'none', '201.10.24.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (779, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139502821, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (780, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139510203, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (781, '200.96.127.138', '200.96.127.138', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139513204, '/arinos/Index.php', 'none', 'none', '200.96.127.138', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (782, '200.96.127.138', '200.96.127.138', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139513623, '/arinos/modules.php?name=Statistics', 'none', 'none', '200.96.127.138', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (783, '200.96.127.138', '200.96.127.138', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139517309, '/arinos/admin.php', 'none', 'none', '200.96.127.138', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (784, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139524937, '/arinos/Index.php', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (785, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139524978, '/arinos/modules.php?name=Foruns', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (786, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525062, '/arinos/ADMIN.PHP', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (787, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525510, '/arinos/admin.php', 'none', 'none', '201.2.132.248', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (788, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525539, '/arinos/admin.php?op=modules', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (789, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525565, '/arinos/admin.php?op=module_status&mid=3&active=1', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (790, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525570, '/arinos/admin.php?op=modules', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (791, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525595, '/arinos/admin.php?op=module_edit&mid=27', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (792, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525603, '/arinos/Index.php', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (793, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525611, '/arinos/admin.php', 'none', 'none', '201.2.132.248', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (794, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525616, '/arinos/admin.php?op=modules', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (795, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525639, '/arinos/modules.php?name=Forums', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (796, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525652, '/arinos/modules.php?name=Foruns', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (797, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525663, '/arinos/admin.php?op=module_edit&mid=9', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (798, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525695, '/arinos/admin.php', 'none', 'none', '201.2.132.248', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (799, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525701, '/arinos/admin.php?op=modules', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (800, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525729, '/arinos/admin.php?op=module_edit&mid=15', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (801, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525745, '/arinos/admin.php', 'none', 'none', '201.2.132.248', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (802, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525750, '/arinos/admin.php?op=modules', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (803, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525773, '/arinos/admin.php?op=module_edit&mid=16', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (804, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525784, '/arinos/admin.php', 'none', 'none', '201.2.132.248', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (805, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525789, '/arinos/admin.php?op=modules', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (806, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525806, '/arinos/admin.php?op=module_edit&mid=20', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (807, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525818, '/arinos/admin.php', 'none', 'none', '201.2.132.248', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (808, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525823, '/arinos/admin.php?op=modules', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (809, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525842, '/arinos/index.php', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (810, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525845, '/arinos/admin.php?op=logout', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (811, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525864, '/arinos/admin.php', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (812, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139525876, '/arinos/index.php', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (813, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139529127, '/arinos/Index.php', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (814, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139529222, '/arinos/modules.php?name=Surveys&op=results&pollID=1&mode=&order=0&thold=0', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (815, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139529252, '/arinos/modules.php?name=Stories_Archive', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (816, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139529281, '/arinos/modules.php?name=FCKeditor', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (817, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139529325, '/arinos/modules.php?name=Foruns', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (818, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139529333, '/arinos/index.php', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (819, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139529347, '/arinos/admin.php', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (820, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139529364, '/arinos/admin.php', 'none', 'none', '201.2.132.248', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (821, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139529385, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (822, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139529397, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (823, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139529426, '/arinos/admin.php', 'none', 'none', '201.2.132.248', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (824, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139529431, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (825, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139529439, '/arinos/index.php', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (826, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139529454, '/arinos/modules.php?name=Forums', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (827, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139531201, '/arinos/Index.php', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (828, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139531343, '/arinos/modules.php?name=Forums', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (829, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139531932, '/arinos/modules.php?name=Forums', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (830, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139531948, '/arinos/index.php', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (831, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139532041, '/arinos/modules.php?name=Forums', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (832, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139532666, '/arinos/modules.php?name=Forums', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (833, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139532701, '/arinos/modules.php?name=Forums&file=viewforum&f=1&sid=cdc8e14a4105d09003530b0c7de89b7b', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (834, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139532721, '/arinos/modules.php?name=Forums&file=posting&mode=newtopic&f=1&sid=cdc8e14a4105d09003530b0c7de89b7b', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (835, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139532737, '/arinos/index.php', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (836, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139532751, '/arinos/modules.php?name=Surveys', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (837, '201.2.132.248', '201.2.132.248', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139532763, '/arinos/index.php', 'none', 'none', '201.2.132.248', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (838, '200.102.139.107', '200-102-139-107.paemt7011.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139584890, '/arinos/Index.php', 'none', 'none', '200.102.139.107', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (839, '200.102.139.107', '200-102-139-107.paemt7011.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139593187, '/arinos/Index.php', 'none', 'none', '200.102.139.107', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (840, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139595393, '/arinos/admin.php', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (841, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139595408, '/arinos/admin.php?op=content', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (842, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139595610, '/arinos/admin.php', 'none', 'none', '201.3.155.79', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (843, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139595611, '/arinos/admin.php?op=content', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (844, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139595643, '/arinos/modules.php?name=Content&pa=showpage&pid=1', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (845, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139595706, '/arinos/modules.php?name=Content&pa=showpage&pid=1', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (846, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139595783, '/arinos/modules.php?name=Content&pa=showpage&pid=1', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (847, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596289, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (848, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596299, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (849, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596327, '/arinos/admin.php', 'none', 'none', '201.3.155.79', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (850, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596328, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (851, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596335, '/arinos/modules.php?name=Content&pa=showpage&pid=1', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (852, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596381, '/arinos/admin.php', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (853, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596573, '/arinos/admin.php?op=mod_authors', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (854, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596583, '/arinos/admin.php?op=modifyadmin&chng_aid=Arinos', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (855, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596607, '/arinos/admin.php', 'none', 'none', '201.3.155.79', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (856, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596607, '/arinos/admin.php?op=mod_authors', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (857, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596613, '/arinos/admin.php?op=logout', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (858, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596618, '/arinos/admin.php', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (859, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596640, '/arinos/admin.php', 'none', 'none', '201.3.155.79', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (860, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596788, '/arinos/admin.php', 'none', 'none', '201.3.155.79', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (861, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596817, '/arinos/admin.php', 'none', 'none', '201.3.155.79', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (862, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139596994, '/arinos/admin.php', 'none', 'none', '201.3.155.79', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (863, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139597004, '/arinos/admin.php?op=encyclopedia', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (864, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139597033, '/arinos/admin.php?op=CalendarAdmin', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (865, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139597101, '/arinos/admin.php?op=logout', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (866, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139597110, '/arinos/admin.php', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (867, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139597131, '/arinos/admin.php', 'none', 'none', '201.3.155.79', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (868, '201.3.155.79', '201-3-155-79.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139597141, '/arinos/admin.php?op=FCKadminStory', 'none', 'none', '201.3.155.79', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (869, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139673344, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (870, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139863200, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (871, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1139928787, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (872, '200.180.168.250', '200-180-168-250.paemt7003.e.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140023491, '/arinos/Index.php', 'none', 'none', '200.180.168.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (873, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140029637, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (874, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140029697, '/arinos/modules.php?name=Content&pa=showpage&pid=1', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (875, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140030363, '/arinos/index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (876, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140030458, '/arinos/index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (877, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140030482, '/arinos/index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (878, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140030485, '/arinos/index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (879, '200.203.21.119', '200-203-021-119.paemt7002.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140114338, '/arinos/Index.php', 'none', 'none', '200.203.21.119', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (880, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140114458, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (881, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140119351, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (882, '201.10.26.198', '201-10-26-198.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140187823, '/arinos/Index.php', 'none', 'none', '201.10.26.198', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (883, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188042, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (884, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188074, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (885, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 3, 'claudio', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188080, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (886, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188117, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (887, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188139, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (888, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188143, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (889, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188180, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (890, '201.10.26.198', '201-10-26-198.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188323, '/arinos/Index.php', 'none', 'none', '201.10.26.198', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (891, '201.10.26.198', '201-10-26-198.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188372, '/arinos/Index.php', 'none', 'none', '201.10.26.198', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (892, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188424, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (893, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188431, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (894, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188434, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (895, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188435, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (896, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188437, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (897, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188439, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (898, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188442, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (899, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188514, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (900, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188516, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (901, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188518, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (902, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188519, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (903, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188621, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (904, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188626, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (905, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188628, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (906, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188663, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (907, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188758, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (908, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188763, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (909, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140188765, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (910, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210767, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (911, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210835, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (912, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210842, '/arinos/modules.php?name=News&file=article&sid=3', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (913, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210902, '/arinos/modules.php?name=News', '192.168.0.104', 'none', '201.24.154.65', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (914, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210902, '/arinos/modules.php?name=News&op=rate_complete&sid=3', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (915, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210913, '/arinos/modules.php?name=Surveys', '192.168.0.104', 'none', '201.24.154.65', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (916, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210913, '/arinos/modules.php?name=Surveys&op=results&pollID=1', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (917, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210931, '/arinos/modules.php?name=Surveys', '192.168.0.104', 'none', '201.24.154.65', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (918, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210931, '/arinos/modules.php?name=Surveys&op=results&pollID=1', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (919, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210942, '/arinos/modules.php?name=Surveys', '192.168.0.104', 'none', '201.24.154.65', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (920, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210942, '/arinos/modules.php?name=Surveys&op=results&pollID=1', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (921, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210954, '/arinos/modules.php?name=Surveys', '192.168.0.104', 'none', '201.24.154.65', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (922, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210955, '/arinos/modules.php?name=Surveys&op=results&pollID=1', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (923, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210961, '/arinos/modules.php?name=Surveys', '192.168.0.104', 'none', '201.24.154.65', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (924, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210961, '/arinos/modules.php?name=Surveys&op=results&pollID=1', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (925, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210970, '/arinos/modules.php?name=Surveys', '192.168.0.104', 'none', '201.24.154.65', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (926, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210970, '/arinos/modules.php?name=Surveys&op=results&pollID=1', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (927, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210979, '/arinos/modules.php?name=Surveys', '192.168.0.104', 'none', '201.24.154.65', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (928, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140210980, '/arinos/modules.php?name=Surveys&op=results&pollID=1', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (929, '201.2.130.107', '201.2.130.107', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1140440487, '/arinos/Index.php', 'none', 'none', '201.2.130.107', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (930, '201.11.201.206', '201.11.201.206', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141248484, '/arinos/Index.php', 'none', 'none', '201.11.201.206', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (931, '201.11.201.206', '201.11.201.206', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141248593, '/arinos/admin.php', 'none', 'none', '201.11.201.206', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (932, '201.11.201.206', '201.11.201.206', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141248608, '/arinos/admin.php', 'none', 'none', '201.11.201.206', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (933, '201.11.201.206', '201.11.201.206', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141248621, '/arinos/admin.php?op=mod_authors', 'none', 'none', '201.11.201.206', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (934, '201.11.201.206', '201.11.201.206', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141248637, '/arinos/admin.php?op=logout', 'none', 'none', '201.11.201.206', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (935, '201.11.201.206', '201.11.201.206', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141248648, '/arinos/admin.php', 'none', 'none', '201.11.201.206', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (936, '201.11.201.206', '201.11.201.206', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141248680, '/arinos/admin.php', 'none', 'none', '201.11.201.206', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (937, '201.11.201.206', '201.11.201.206', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141248706, '/arinos/admin.php?op=logout', 'none', 'none', '201.11.201.206', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (938, '201.11.201.206', '201.11.201.206', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141248737, '/arinos/admin.php', 'none', 'none', '201.11.201.206', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (939, '201.24.154.38', '201-24-154-38.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141312945, '/arinos/Index.php', 'none', 'none', '201.24.154.38', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (940, '201.10.24.37', '201-10-24-37.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141461010, '/arinos/Index.php', 'none', 'none', '201.10.24.37', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (941, '201.10.24.37', '201-10-24-37.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141461981, '/arinos/Index.php', 'none', 'none', '201.10.24.37', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (942, '201.24.154.38', '201-24-154-38.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141649471, '/arinos/Index.php', 'none', 'none', '201.24.154.38', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (943, '201.24.154.38', '201-24-154-38.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141649656, '/arinos/Index.php', 'none', 'none', '201.24.154.38', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (944, '201.24.154.38', '201-24-154-38.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141649720, '/arinos/Index.php', 'none', 'none', '201.24.154.38', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (945, '201.10.26.89', '201-10-26-89.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141655090, '/arinos/Index.php', 'none', 'none', '201.10.26.89', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (946, '201.10.26.89', '201-10-26-89.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141656699, '/arinos/Index.php', 'none', 'none', '201.10.26.89', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (947, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1141657071, '/arinos/Index.php', '192.168.0.97', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (948, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141658159, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (949, '201.3.159.253', '201-3-159-253.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141732708, '/arinos/Index.php', 'none', 'none', '201.3.159.253', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (950, '201.3.159.253', '201-3-159-253.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141732788, '/arinos/admin.php', 'none', 'none', '201.3.159.253', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (951, '201.3.159.253', '201-3-159-253.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141732799, '/arinos/admin.php', 'none', 'none', '201.3.159.253', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (952, '201.3.159.253', '201-3-159-253.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141732804, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.3.159.253', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (953, '201.3.159.253', '201-3-159-253.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141732812, '/arinos/admin.php?op=BlocksEdit&bid=11', 'none', 'none', '201.3.159.253', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (954, '201.3.159.253', '201-3-159-253.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141732976, '/arinos/index.php', 'none', 'none', '201.3.159.253', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (955, '201.3.159.253', '201-3-159-253.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141733229, '/arinos/modules.php?name=Statistics', 'none', 'none', '201.3.159.253', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (956, '201.3.159.253', '201-3-159-253.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141733250, '/arinos/index.php', 'none', 'none', '201.3.159.253', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (957, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141752454, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (958, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141752588, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (959, '200.96.176.230', '200-96-176-230.cbace702.e.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141756368, '/arinos/Index.php', 'none', 'none', '200.96.176.230', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (960, '200.96.176.230', '200-96-176-230.cbace702.e.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141756369, '/arinos/Index.php', 'none', 'none', '200.96.176.230', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (961, '201.15.159.167', '201-15-159-167.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141756596, '/arinos/Index.php', 'none', 'none', '201.15.159.167', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (962, '201.15.159.167', '201-15-159-167.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141757093, '/arinos/Index.php', 'none', 'none', '201.15.159.167', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (963, '201.15.159.167', '201-15-159-167.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141757175, '/arinos/Index.php', 'none', 'none', '201.15.159.167', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (964, '201.15.159.167', '201-15-159-167.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141757229, '/arinos/Index.php', 'none', 'none', '201.15.159.167', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (965, '200.96.176.230', '200-96-176-230.cbace702.e.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141757294, '/arinos/Index.php', 'none', 'none', '200.96.176.230', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (966, '201.15.159.167', '201-15-159-167.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141758790, '/arinos/Index.php', 'none', 'none', '201.15.159.167', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (967, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141758969, '/arinos/modules.php?name=Content&pa=showpage&pid=1', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (968, '201.15.159.167', '201-15-159-167.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141759354, '/arinos/modules.php?name=Content&pa=showpage&pid=1', 'none', 'none', '201.15.159.167', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (969, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141845277, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (970, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141845307, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (971, '82.155.159.197', '82.155.159.197', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; InfoPath.1)', 1141845394, '/ARINOS/Index.php', 'none', 'none', '82.155.159.197', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (972, '200.103.7.196', '200-103-7-196.cbace7004.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1141845627, '/ARINOS/Index.php', 'none', 'none', '200.103.7.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (973, '82.155.159.197', '82.155.159.197', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; InfoPath.1)', 1141845644, '/ARINOS/index.php', 'none', 'none', '82.155.159.197', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (974, '82.155.159.197', '82.155.159.197', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; InfoPath.1)', 1141845675, '/ARINOS/index.php', 'none', 'none', '82.155.159.197', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (975, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1141845799, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (976, '82.155.159.197', '82.155.159.197', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; InfoPath.1)', 1141846146, '/ARINOS/Index.php', 'none', 'none', '82.155.159.197', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (977, '201.25.73.129', '201-25-73-129.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141847143, '/ARINOS/Index.php', 'none', 'none', '201.25.73.129', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (978, '201.25.73.129', '201-25-73-129.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141847199, '/ARINOS/index.php', 'none', 'none', '201.25.73.129', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (979, '201.25.73.129', '201-25-73-129.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141847227, '/ARINOS/index.php', 'none', 'none', '201.25.73.129', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (980, '201.25.73.129', '201-25-73-129.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141847238, '/ARINOS/index.php', 'none', 'none', '201.25.73.129', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (981, '201.15.65.232', '201.15.65.232.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141847293, '/arinos/Index.php', 'none', 'none', '201.15.65.232', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (982, '200.103.7.196', '200-103-7-196.cbace7004.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1141847368, '/ARINOS/Index.php', 'none', 'none', '200.103.7.196', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (983, '201.15.65.232', '201.15.65.232.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141847427, '/arinos/modules.php?name=Content&pa=showpage&pid=1', 'none', 'none', '201.15.65.232', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (984, '201.15.65.232', '201.15.65.232.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141847459, '/arinos/index.php', 'none', 'none', '201.15.65.232', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (985, '201.15.65.232', '201.15.65.232.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141847610, '/arinos/index.php', 'none', 'none', '201.15.65.232', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (986, '201.15.65.232', '201.15.65.232.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141847628, '/arinos/index.php', 'none', 'none', '201.15.65.232', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (987, '201.15.65.232', '201.15.65.232.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141847643, '/arinos/index.php', 'none', 'none', '201.15.65.232', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (988, '200.140.41.157', '200-140-41-157.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1141848777, '/arinos/Index.php', 'none', 'none', '200.140.41.157', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (989, '200.103.90.62', '200-103-90-62.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141850153, '/ARINOS/Index.php', '10.10.10.99', 'none', '200.103.90.62', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (990, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141850703, '/arinos/Index.php', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (991, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141850877, '/arinos/index.php', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (992, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141850922, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (993, '200.103.91.185', '200-103-91-185.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141850951, '/arinos/Index.php', 'none', 'none', '200.103.91.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (994, '200.103.90.62', '200-103-90-62.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98)', 1141851121, '/arinos/Index.php', '10.10.10.50', 'none', '200.103.90.62', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (995, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141851287, '/arinos/index.php', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (996, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141851367, '/arinos/modules.php?name=Forums', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (997, '200.103.90.62', '200-103-90-62.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98)', 1141851478, '/arinos/Index.php', '10.10.10.50', 'none', '200.103.90.62', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (998, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141851563, '/arinos/Index.php', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (999, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141851590, '/arinos/modules.php?name=Forums', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1000, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141852075, '/arinos/modules.php?name=Forums', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1001, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141852710, '/arinos/index.php', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1002, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141852762, '/arinos/index.php', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1003, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141852780, '/arinos/index.php', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1004, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141852795, '/arinos/index.php', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1005, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141852827, '/arinos/modules.php?name=Your_Account&op=userinfo&username=claudio', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1006, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141852862, '/arinos/index.php', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1007, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141853501, '/arinos/index.php', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1008, '200.103.90.62', '200-103-90-62.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98)', 1141902521, '/arinos/Index.php', '10.10.10.50', 'none', '200.103.90.62', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1009, '201.15.65.235', '201.15.65.235.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141911924, '/arinos/Index.php', 'none', 'none', '201.15.65.235', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1010, '201.15.65.235', '201.15.65.235.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141912265, '/arinos/index.php', 'none', 'none', '201.15.65.235', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1011, '201.15.65.235', '201.15.65.235.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141912286, '/arinos/index.php', 'none', 'none', '201.15.65.235', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1012, '201.15.65.235', '201.15.65.235.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141912349, '/arinos/modules.php?name=Content&pa=showpage&pid=1', 'none', 'none', '201.15.65.235', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1013, '201.15.65.235', '201.15.65.235.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141912414, '/arinos/index.php', 'none', 'none', '201.15.65.235', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1014, '201.15.65.235', '201.15.65.235.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141912773, '/arinos/index.php', 'none', 'none', '201.15.65.235', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1015, '201.15.65.235', '201.15.65.235.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141913095, '/arinos/index.php', 'none', 'none', '201.15.65.235', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1016, '201.14.98.149', '201.14.98.149.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1141914210, '/ARINOS/Index.php', 'none', 'none', '201.14.98.149', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1017, '201.11.182.52', '201.11.182.52.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141914503, '/arinos/Index.php', 'none', 'none', '201.11.182.52', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1018, '201.24.22.205', '201-24-22-205.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141915856, '/arinos/Index.php', 'none', 'none', '201.24.22.205', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1019, '201.24.22.205', '201-24-22-205.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141915912, '/arinos/index.php', 'none', 'none', '201.24.22.205', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1020, '201.14.98.128', '201.14.98.128.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1141917618, '/arinos/Index.php', 'none', 'none', '201.14.98.128', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1021, '201.24.141.42', '201-24-141-42.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141917629, '/arinos/Index.php', 'none', 'none', '201.24.141.42', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1022, '201.14.98.128', '201.14.98.128.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141917661, '/arinos/Index.php', 'none', 'none', '201.14.98.128', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1023, '201.24.141.42', '201-24-141-42.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141917706, '/arinos/Index.php', 'none', 'none', '201.24.141.42', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1024, '201.24.141.42', '201-24-141-42.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141918353, '/arinos/Index.php', 'none', 'none', '201.24.141.42', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1025, '201.24.141.42', '201-24-141-42.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141918353, '/arinos/Index.php', 'none', 'none', '201.24.141.42', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1026, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141926362, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1027, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1141927220, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1028, '201.24.43.169', '201-24-43-169.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141927346, '/arinos/Index.php', 'none', 'none', '201.24.43.169', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1029, '201.24.43.169', '201-24-43-169.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141927366, '/arinos/Index.php', 'none', 'none', '201.24.43.169', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1030, '201.15.79.143', '201.15.79.143.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; .NET CLR 1.1.4322)', 1141927843, '/arinos/Index.php', 'none', 'none', '201.15.79.143', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1031, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141927986, '/arinos/Index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1032, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141928037, '/arinos/index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1033, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141928049, '/arinos/index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1034, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141928066, '/arinos/modules.php?name=Your_Account&op=new_user', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1035, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141928094, '/arinos/Index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1036, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141928106, '/arinos/index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1037, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141928117, '/arinos/index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1038, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141928126, '/arinos/index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1039, '201.15.79.143', '201.15.79.143.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; .NET CLR 1.1.4322)', 1141928189, '/arinos/modules.php?name=Content&pa=showpage&pid=1', 'none', 'none', '201.15.79.143', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1040, '201.15.79.143', '201.15.79.143.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; .NET CLR 1.1.4322)', 1141928210, '/arinos/index.php', 'none', 'none', '201.15.79.143', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1041, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141928316, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1042, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141928411, '/arinos/modules.php?name=Calendar', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1043, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141928460, '/arinos/modules.php?name=Your_Account&op=new_user', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1044, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141928530, '/arinos/modules.php?name=Your_Account', 'none', 'none', '200.96.203.223', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1045, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141928546, '/arinos/modules.php?name=Your_Account', 'none', 'none', '200.96.203.223', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1046, '201.15.79.143', '201.15.79.143.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; .NET CLR 1.1.4322)', 1141928980, '/arinos/Index.php', 'none', 'none', '201.15.79.143', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1047, '201.15.79.143', '201.15.79.143.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; .NET CLR 1.1.4322)', 1141929006, '/arinos/Index.php', 'none', 'none', '201.15.79.143', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1048, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141929026, '/arinos/index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1049, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141929070, '/arinos/index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1050, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141929101, '/arinos/Index.php', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1051, '201.24.22.205', '201-24-22-205.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141929645, '/arinos/Index.php', 'none', 'none', '201.24.22.205', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1052, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1141929705, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1053, '201.14.98.149', '201.14.98.149.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1141930351, '/ARINOS/Index.php', 'none', 'none', '201.14.98.149', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1054, '201.14.98.149', '201.14.98.149.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1141930483, '/ARINOS/Index.php', 'none', 'none', '201.14.98.149', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1055, '201.24.172.176', '201-24-172-176.cbace703.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)', 1141931783, '/ARINOS/Index.php', 'none', 'none', '201.24.172.176', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1056, '200.96.181.182', '200-96-181-182.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141932255, '/ARINOS/Index.php', 'none', 'none', '200.96.181.182', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1057, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141932709, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1058, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141932972, '/arinos/Index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1059, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141933104, '/arinos/Index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1060, '200.96.177.209', '200-96-177-209.cbace702.e.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141933837, '/arinos/Index.php', 'none', 'none', '200.96.177.209', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1061, '201.14.98.120', '201.14.98.120.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141933935, '/arinos/index.php', 'none', 'none', '201.14.98.120', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1062, '201.14.98.120', '201.14.98.120.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141933949, '/arinos/modules.php?name=Calendar', 'none', 'none', '201.14.98.120', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1063, '200.96.177.209', '200-96-177-209.cbace702.e.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141933967, '/arinos/modules.php?name=Calendar&file=index&Date=03/9/2006&type=day', 'none', 'none', '200.96.177.209', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1064, '200.103.94.251', '200-103-94-251.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98)', 1141934627, '/arinos/Index.php', '10.10.10.50', 'none', '200.103.94.251', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1065, '201.24.22.205', '201-24-22-205.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141935156, '/arinos/Index.php', 'none', 'none', '201.24.22.205', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1066, '201.24.22.205', '201-24-22-205.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141935195, '/arinos/index.php', 'none', 'none', '201.24.22.205', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1067, '201.24.22.205', '201-24-22-205.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141935268, '/arinos/index.php', 'none', 'none', '201.24.22.205', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1068, '201.24.22.205', '201-24-22-205.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141935278, '/arinos/index.php', 'none', 'none', '201.24.22.205', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1069, '201.67.5.245', '201.67.5.245', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)', 1141935323, '/ARINOS/Index.php', 'none', 'none', '201.67.5.245', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1070, '201.22.172.215', '201.22.172.215.adsl.gvt.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141936203, '/arinos/Index.php', 'none', 'none', '201.22.172.215', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1071, '201.22.172.215', '201.22.172.215.adsl.gvt.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141937216, '/arinos/modules.php?name=Content&pa=showpage&pid=1', 'none', 'none', '201.22.172.215', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1072, '201.22.172.215', '201.22.172.215.adsl.gvt.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141937290, '/arinos/index.php', 'none', 'none', '201.22.172.215', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1073, '201.22.172.215', '201.22.172.215.adsl.gvt.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141937350, '/arinos/index.php', 'none', 'none', '201.22.172.215', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1074, '201.22.172.215', '201.22.172.215.adsl.gvt.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141937371, '/arinos/modules.php?name=Top', 'none', 'none', '201.22.172.215', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1075, '201.22.172.215', '201.22.172.215.adsl.gvt.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1141937400, '/arinos/modules.php?name=Content&pa=showpage&pid=1', 'none', 'none', '201.22.172.215', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1076, '200.140.37.11', '200-140-37-11.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141938377, '/ARINOS/Index.php', 'none', 'none', '200.140.37.11', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1077, '201.24.22.205', '201-24-22-205.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141938593, '/arinos/Index.php', 'none', 'none', '201.24.22.205', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1078, '201.24.22.205', '201-24-22-205.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141938661, '/arinos/index.php', 'none', 'none', '201.24.22.205', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1079, '201.24.22.205', '201-24-22-205.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141938689, '/arinos/index.php', 'none', 'none', '201.24.22.205', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1080, '201.24.22.205', '201-24-22-205.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141938704, '/arinos/modules.php?name=Top', 'none', 'none', '201.24.22.205', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1081, '201.24.22.205', '201-24-22-205.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141938719, '/arinos/index.php', 'none', 'none', '201.24.22.205', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1082, '201.24.22.205', '201-24-22-205.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141938809, '/arinos/modules.php?name=Forums', 'none', 'none', '201.24.22.205', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1083, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141950093, '/arinos/Index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1084, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141950144, '/arinos/index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1085, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141950155, '/arinos/index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1086, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141950172, '/arinos/index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1087, '200.103.94.251', '200-103-94-251.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98)', 1141989151, '/arinos/Index.php', '10.10.10.50', 'none', '200.103.94.251', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1088, '201.11.176.226', '201-11-176-226.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; .NET CLR 1.1.4322)', 1141990961, '/arinos/Index.php', 'none', 'none', '201.11.176.226', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1089, '201.11.176.226', '201-11-176-226.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; .NET CLR 1.1.4322)', 1141991056, '/arinos/modules.php?name=Content&pa=showpage&pid=1', 'none', 'none', '201.11.176.226', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1090, '201.11.176.226', '201-11-176-226.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; .NET CLR 1.1.4322)', 1141991234, '/arinos/index.php', 'none', 'none', '201.11.176.226', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1091, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141992080, '/arinos/admin.php', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1092, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141992102, '/arinos/admin.php', 'none', 'none', '200.203.22.56', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1093, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141992995, '/arinos/admin.php?op=content', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1094, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993292, '/arinos/admin.php', 'none', 'none', '200.203.22.56', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1095, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993293, '/arinos/admin.php?op=content', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1096, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993324, '/arinos/modules.php?name=Content&pa=showpage&pid=2', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1097, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993333, '/arinos/admin.php?op=content_edit&pid=2', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1098, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993358, '/arinos/admin.php', 'none', 'none', '200.203.22.56', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1099, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993359, '/arinos/admin.php?op=content', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1100, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993373, '/arinos/modules.php?name=Content&pa=showpage&pid=2', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1101, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993387, '/arinos/admin.php?op=content_edit&pid=2', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1102, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993402, '/arinos/admin.php', 'none', 'none', '200.203.22.56', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1103, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993403, '/arinos/admin.php?op=content', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1104, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993415, '/arinos/modules.php?name=Content&pa=showpage&pid=2', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1105, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993428, '/arinos/admin.php?op=content_edit&pid=2', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1106, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993446, '/arinos/admin.php', 'none', 'none', '200.203.22.56', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1107, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993446, '/arinos/admin.php?op=content', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1108, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993458, '/arinos/modules.php?name=Content&pa=showpage&pid=2', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1109, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993550, '/arinos/admin.php', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1110, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993558, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1111, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993563, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1112, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993572, '/arinos/admin.php', 'none', 'none', '200.203.22.56', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1113, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993572, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1114, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141993578, '/arinos/modules.php?name=Content&pa=showpage&pid=2', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1115, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141994756, '/arinos/admin.php?op=content', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1116, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141994769, '/arinos/admin.php?op=content_edit&pid=2', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1117, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141994796, '/arinos/admin.php?op=content', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1118, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141994876, '/arinos/admin.php', 'none', 'none', '200.203.22.56', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1119, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141994877, '/arinos/admin.php?op=content', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1120, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141995861, '/arinos/modules.php?name=Content&pa=showpage&pid=3', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1121, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141996191, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1122, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141996523, '/arinos/admin.php', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1123, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141996549, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1124, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141996555, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1125, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141996561, '/arinos/admin.php', 'none', 'none', '200.203.22.56', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1126, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141996561, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1127, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141996565, '/arinos/admin.php?op=content', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1128, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141996753, '/arinos/admin.php', 'none', 'none', '200.203.22.56', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1129, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141996754, '/arinos/admin.php?op=content', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1130, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141996941, '/arinos/admin.php?op=content_edit&pid=4', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1131, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141996989, '/arinos/admin.php', 'none', 'none', '200.203.22.56', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1132, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141996990, '/arinos/admin.php?op=content', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1133, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141997028, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1134, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141997157, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1135, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141997174, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1136, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141997195, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1137, '200.203.22.56', '200-203-022-056.paemt7002.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141997658, '/arinos/index.php', 'none', 'none', '200.203.22.56', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1138, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141999939, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1139, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141999951, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1140, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141999971, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1141, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1141999992, '/arinos/modules.php?name=Content&pa=showpage&pid=2', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1142, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142000009, '/arinos/modules.php?name=Content&pa=showpage&pid=3', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1143, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142000020, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1144, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142000280, '/arinos/modules.php?name=Stories_Archive', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1145, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142000291, '/arinos/modules.php?name=Statistics', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1146, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142000309, '/arinos/modules.php?name=Top', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1147, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142000320, '/arinos/modules.php?name=FCKeditor', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1148, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142000326, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1149, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142000899, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1150, '201.22.172.215', '201.22.172.215.adsl.gvt.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)', 1142000943, '/arinos/Index.php', 'none', 'none', '201.22.172.215', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1151, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142000972, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1152, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142000998, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1153, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142001083, '/arinos/modules.php?name=Content&pa=showpage&pid=2', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1154, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142001238, '/arinos/modules.php?name=Content&pa=showpage&pid=3', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1155, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142001323, '/arinos/modules.php?name=Your_Account', 'none', 'none', '201.24.154.34', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1156, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142001330, '/arinos/modules.php?name=Your_Account&op=new_user', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1157, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142001397, '/arinos/modules.php?name=Your_Account', 'none', 'none', '201.24.154.34', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1158, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142001404, '/arinos/modules.php?name=Your_Account', 'none', 'none', '201.24.154.34', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1159, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142001479, '/arinos/modules.php?name=Surveys', 'none', 'none', '201.24.154.34', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1160, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142001480, '/arinos/modules.php?name=Surveys&op=results&pollID=1', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1161, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142001486, '/arinos/modules.php?name=Content&pa=showpage&pid=2', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1162, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142001882, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1163, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142001890, '/arinos/modules.php?name=Content&pa=showpage&pid=2', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1164, '201.3.37.252', '201-3-37-252.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1142002191, '/arinos/Index.php', 'none', 'none', '201.3.37.252', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1165, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142002249, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1166, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142002259, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1167, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142002266, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1168, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142002300, '/arinos/modules.php?name=Content&pa=showpage&pid=3', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1169, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142002309, '/arinos/modules.php?name=Content&pa=showpage&pid=2', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1170, '201.22.172.215', '201.22.172.215.adsl.gvt.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)', 1142002330, '/arinos/Index.php', 'none', 'none', '201.22.172.215', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1171, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142002350, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1172, '201.22.172.215', '201.22.172.215.adsl.gvt.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)', 1142002429, '/arinos/index.php', 'none', 'none', '201.22.172.215', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1173, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142003159, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1174, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142003407, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1175, '200.103.94.251', '200-103-94-251.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98)', 1142014146, '/arinos/Index.php', '10.10.10.50', 'none', '200.103.94.251', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1176, '200.96.203.223', '200-96-203-223.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; HbTools 4.7.5)', 1142015140, '/arinos/Index.php', 'none', 'none', '200.96.203.223', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1177, '201.67.3.25', '201-67-3-25.cbace700.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)', 1142016828, '/ARINOS/Index.php', 'none', 'none', '201.67.3.25', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1178, '201.67.3.25', '201-67-3-25.cbace700.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)', 1142017083, '/ARINOS/Index.php', 'none', 'none', '201.67.3.25', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1179, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142017095, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1180, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142017320, '/arinos/Index.php', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1181, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142017394, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1182, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142018029, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1183, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142018101, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1184, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142018220, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1185, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142018257, '/arinos/modules.php?name=Content&pa=showpage&pid=2', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1186, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142018332, '/arinos/modules.php?name=Top', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1187, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142018369, '/arinos/modules.php?name=Content&pa=showpage&pid=3', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1188, '200.96.203.62', '200-96-203-62.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142019149, '/arinos/Index.php', 'none', 'none', '200.96.203.62', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1189, '200.96.203.62', '200-96-203-62.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142020188, '/arinos/Index.php', 'none', 'none', '200.96.203.62', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1190, '200.96.203.62', '200-96-203-62.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142025296, '/arinos/Index.php', 'none', 'none', '200.96.203.62', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1191, '200.163.63.230', '200-163-63-230.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142068291, '/arinos/Index.php', 'none', 'none', '200.163.63.230', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1192, '200.163.63.230', '200-163-63-230.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142068470, '/arinos/Index.php', 'none', 'none', '200.163.63.230', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1193, '201.14.76.15', '201.14.76.15.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; HbTools 4.7.5)', 1142096302, '/arinos/Index.php', 'none', 'none', '201.14.76.15', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1194, '201.14.95.34', '201.14.95.34.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142110313, '/arinos/Index.php', 'none', 'none', '201.14.95.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1195, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142250940, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1196, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142250966, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1197, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142255345, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1198, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142258522, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1199, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142258589, '/arinos/modules.php?name=Content&pa=showpage&pid=3', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1200, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142258633, '/arinos/modules.php?name=Top', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1201, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142258651, '/arinos/modules.php?name=Search&query=&author=Arinos', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1202, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142258659, '/arinos/modules.php?name=Content&pa=showpage&pid=1', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1203, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142258699, '/arinos/modules.php?name=Statistics', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1204, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142258723, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1205, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142258946, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1206, '201.11.134.76', '201.11.134.76.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; .NET CLR 1.1.4322)', 1142258995, '/arinos/Index.php', 'none', 'none', '201.11.134.76', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1207, '201.11.134.76', '201.11.134.76.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; .NET CLR 1.1.4322)', 1142259150, '/arinos/Index.php', 'none', 'none', '201.11.134.76', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1208, '201.11.134.76', '201.11.134.76.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98; .NET CLR 1.1.4322)', 1142259241, '/arinos/Index.php', 'none', 'none', '201.11.134.76', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1209, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142263654, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1210, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142263691, '/arinos/modules.php?name=Top', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1211, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142263698, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1212, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142263863, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1213, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142263961, '/arinos/modules.php?name=Content&pa=showpage&pid=3', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1214, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142263968, '/arinos/modules.php?name=Statistics', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1215, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142263981, '/arinos/modules.php?name=FCKeditor', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1216, '201.3.128.174', '201-3-128-174.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142274538, '/arinos/Index.php', 'none', 'none', '201.3.128.174', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1217, '200.96.126.240', '200.96.126.240', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142275017, '/arinos/Index.php', 'none', 'none', '200.96.126.240', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1218, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142275781, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1219, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142275799, '/arinos/modules.php?name=Top', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1220, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142278069, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1221, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142284331, '/arinos/Index.php', '192.168.0.104', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1222, '201.10.26.48', '201-10-26-48.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142339480, '/arinos/Index.php', 'none', 'none', '201.10.26.48', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1223, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142339839, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1224, '201.10.26.48', '201-10-26-48.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142340466, '/arinos/admin.php', 'none', 'none', '201.10.26.48', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1225, '201.10.26.48', '201-10-26-48.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142340497, '/arinos/admin.php?op=content', 'none', 'none', '201.10.26.48', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1226, '201.10.26.48', '201-10-26-48.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142340684, '/arinos/admin.php?op=content_edit&pid=4', 'none', 'none', '201.10.26.48', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1227, '201.10.26.48', '201-10-26-48.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142340722, '/arinos/admin.php', 'none', 'none', '201.10.26.48', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1228, '201.10.26.48', '201-10-26-48.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142340722, '/arinos/admin.php?op=content', 'none', 'none', '201.10.26.48', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1229, '201.10.26.48', '201-10-26-48.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142340733, '/arinos/index.php', 'none', 'none', '201.10.26.48', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1230, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142342557, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1231, '201.10.26.48', '201-10-26-48.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142342719, '/arinos/admin.php', 'none', 'none', '201.10.26.48', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1232, '201.10.26.48', '201-10-26-48.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142342738, '/arinos/admin.php?op=create', 'none', 'none', '201.10.26.48', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1233, '201.24.44.105', '201-24-44-105.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142345514, '/arinos/Index.php', 'none', 'none', '201.24.44.105', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1234, '201.24.44.105', '201-24-44-105.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142345656, '/arinos/modules.php?name=Your_Account&op=new_user', 'none', 'none', '201.24.44.105', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1235, '201.24.44.105', '201-24-44-105.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142345982, '/arinos/modules.php?name=Your_Account', 'none', 'none', '201.24.44.105', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1236, '201.24.44.105', '201-24-44-105.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142346028, '/arinos/modules.php?name=Surveys', 'none', 'none', '201.24.44.105', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1237, '201.24.44.105', '201-24-44-105.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142346029, '/arinos/modules.php?name=Surveys&op=results&pollID=1', 'none', 'none', '201.24.44.105', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1238, '201.24.44.105', '201-24-44-105.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142346049, '/arinos/modules.php?name=Your_Account', 'none', 'none', '201.24.44.105', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1239, '201.24.44.105', '201-24-44-105.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142346173, '/arinos/modules.php?name=Your_Account&op=activate&username=Robson&check_num=cd525ae3d5bf8f6d4c043bc878aacd3a', 'none', 'none', '201.24.44.105', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1240, '201.24.44.105', '201-24-44-105.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142346321, '/arinos/modules.php?name=Your_Account', 'none', 'none', '201.24.44.105', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1241, '201.14.76.150', '201.14.76.150.cbace702.dsl.brasiltelecom.net.br', 4, 'Robson', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142346499, '/arinos/modules.php?name=Your_Account', 'none', 'none', '201.14.76.150', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1242, '201.14.76.150', '201.14.76.150.cbace702.dsl.brasiltelecom.net.br', 4, 'Robson', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142346502, '/arinos/modules.php?name=Your_Account&op=userinfo&bypass=1&username=robson', 'none', 'none', '201.14.76.150', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1243, '201.24.140.9', '201-24-140-9.cbace702.dsl.brasiltelecom.net.br', 4, 'Robson', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142346697, '/arinos/index.php', 'none', 'none', '201.24.140.9', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1244, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142347135, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1245, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142347356, '/arinos/modules.php?name=Surveys', 'none', 'none', '201.24.154.34', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1246, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142347357, '/arinos/modules.php?name=Surveys&op=results&pollID=1', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1247, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142347384, '/arinos/modules.php?name=Your_Account&op=userinfo&username=Robson', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1248, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142347405, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1249, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142347418, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1250, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142351592, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1251, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142351602, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1252, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142351844, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1253, '200.140.43.204', '200-140-43-204.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142352651, '/ARINOS/Index.php', 'none', 'none', '200.140.43.204', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1254, '201.14.252.114', '201-14-252-114.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142354912, '/arinos/Index.php', 'none', 'none', '201.14.252.114', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1255, '200.96.86.177', '200-96-86-177.smace701.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142358181, '/arinos/Index.php', 'none', 'none', '200.96.86.177', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1256, '201.14.252.114', '201-14-252-114.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142361863, '/arinos/Index.php', 'none', 'none', '201.14.252.114', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1257, '201.14.252.114', '201-14-252-114.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142361884, '/arinos/admin.php', 'none', 'none', '201.14.252.114', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1258, '201.14.252.114', '201-14-252-114.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142361892, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.14.252.114', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1259, '201.14.252.114', '201-14-252-114.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142361946, '/arinos/admin.php', 'none', 'none', '201.14.252.114', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1260, '201.14.252.114', '201-14-252-114.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142361947, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.14.252.114', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1261, '201.14.252.114', '201-14-252-114.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142361952, '/arinos/admin.php?op=BlockOrder&weight=2&bidori=16&weightrep=1&bidrep=11', 'none', 'none', '201.14.252.114', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1262, '201.14.252.114', '201-14-252-114.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142361954, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.14.252.114', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1263, '201.14.252.114', '201-14-252-114.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142361958, '/arinos/Index.php', 'none', 'none', '201.14.252.114', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1264, '200.96.86.177', '200-96-86-177.smace701.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142367330, '/arinos/Index.php', 'none', 'none', '200.96.86.177', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1265, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142368506, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1266, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142368545, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1267, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142368555, '/arinos/modules.php?name=Top', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1268, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142368566, '/arinos/modules.php?name=Statistics', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1269, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142368575, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1270, '201.14.252.114', '201-14-252-114.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142386514, '/arinos/Index.php', 'none', 'none', '201.14.252.114', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1271, '200.101.37.173', '200-101-37-173.cbabm702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142424355, '/arinos/Index.php', 'none', 'none', '200.101.37.173', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1272, '200.101.37.173', '200-101-37-173.cbabm702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142424847, '/arinos/index.php', 'none', 'none', '200.101.37.173', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1273, '200.101.37.173', '200-101-37-173.cbabm702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142424913, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '200.101.37.173', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1274, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1142429353, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1275, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1142429393, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1276, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1142429412, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1277, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1142429514, '/arinos/modules.php?name=Content&pa=showpage&pid=2', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1278, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1142429552, '/arinos/modules.php?name=Top', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1279, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1142429559, '/arinos/modules.php?name=News&file=article&sid=3', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1280, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142429746, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1281, '201.11.223.121', '201.11.223.121', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142439711, '/arinos/admin.php', 'none', 'none', '201.11.223.121', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1282, '201.11.223.121', '201.11.223.121', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142439727, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.11.223.121', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1283, '201.11.223.121', '201.11.223.121', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142439740, '/arinos/admin.php?op=BlocksEdit&bid=6', 'none', 'none', '201.11.223.121', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1284, '201.11.223.121', '201.11.223.121', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142439752, '/arinos/admin.php', 'none', 'none', '201.11.223.121', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1285, '201.11.223.121', '201.11.223.121', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142439758, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.11.223.121', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1286, '201.11.223.121', '201.11.223.121', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142439918, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.11.223.121', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1287, '201.11.223.121', '201.11.223.121', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142439933, '/arinos/admin.php?op=create', 'none', 'none', '201.11.223.121', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1288, '201.11.223.121', '201.11.223.121', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142440187, '/arinos/admin.php', 'none', 'none', '201.11.223.121', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1289, '201.11.223.121', '201.11.223.121', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142440192, '/arinos/admin.php?op=adminMain', 'none', 'none', '201.11.223.121', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1290, '201.11.223.121', '201.11.223.121', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142440201, '/arinos/index.php', 'none', 'none', '201.11.223.121', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1291, '201.11.223.121', '201.11.223.121', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142440263, '/arinos/index.php', 'none', 'none', '201.11.223.121', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1292, '201.24.141.250', '201-24-141-250.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142448884, '/arinos/Index.php', 'none', 'none', '201.24.141.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1293, '201.11.223.121', '201.11.223.121', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142452455, '/arinos/Index.php', 'none', 'none', '201.11.223.121', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1294, '201.11.177.153', '201.11.177.153.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142472615, '/arinos/Index.php', 'none', 'none', '201.11.177.153', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1295, '201.11.177.153', '201.11.177.153.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142472642, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '201.11.177.153', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1296, '200.163.63.213', '200-163-63-213.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142510283, '/arinos/Index.php', 'none', 'none', '200.163.63.213', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1297, '200.163.63.213', '200-163-63-213.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142510435, '/arinos/modules.php?name=Forums', 'none', 'none', '200.163.63.213', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1298, '200.163.63.213', '200-163-63-213.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142510550, '/arinos/modules.php?name=Top', 'none', 'none', '200.163.63.213', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1299, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142510606, '/arinos/Index.php', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1300, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512135, '/arinos/modules.php?name=Your_Account&op=userinfo&username=Robson', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1301, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512160, '/arinos/Index.php', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1302, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512232, '/arinos/admin.php', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1303, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512241, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1304, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512247, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1305, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512344, '/arinos/admin.php', 'none', 'none', '200.180.189.99', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1306, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512345, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1307, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512375, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1308, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512386, '/arinos/modules.php?name=Your_Account', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1309, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512391, '/arinos/modules.php?name=Your_Account', 'none', 'none', '200.180.189.99', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1310, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512392, '/arinos/modules.php?name=Your_Account&op=userinfo&bypass=1&username=Mandry', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1311, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512399, '/arinos/modules.php?name=Your_Account&op=edithome', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1312, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512403, '/arinos/modules.php?name=Private_Messages', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1313, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512682, '/arinos/Index.php', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1314, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512688, '/arinos/modules.php?name=Your_Account', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1315, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512689, '/arinos/modules.php?name=Your_Account', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1316, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512689, '/arinos/modules.php?name=Your_Account&op=userinfo&username=Mandry', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1317, '200.180.189.99', '200-180-189-099.paemt7005.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142512693, '/arinos/modules.php?name=Private_Messages', 'none', 'none', '200.180.189.99', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1318, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142520909, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1319, '201.22.171.135', '201.22.171.135.adsl.gvt.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1142533617, '/arinos/Index.php', 'none', 'none', '201.22.171.135', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1320, '200.101.34.250', '200-101-34-250.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142555007, '/arinos/Index.php', 'none', 'none', '200.101.34.250', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1321, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142610085, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1322, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142610138, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1323, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142610159, '/arinos/modules.php?name=Your_Account', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1324, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142610169, '/arinos/index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1325, '200.101.113.201', '200-101-113-201.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142632214, '/arinos/Index.php', 'none', 'none', '200.101.113.201', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1326, '200.101.37.153', '200-101-37-153.cbabm702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142696247, '/arinos/Index.php', 'none', 'none', '200.101.37.153', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1327, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142857043, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1328, '201.3.155.211', '201-3-155-211.paemt705.dsl.brasiltelecom.net.br', 2, 'Mandry', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142858440, '/arinos/Index.php', 'none', 'none', '201.3.155.211', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1329, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322)', 1142865523, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1330, '201.24.154.65', '201-24-154-65.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)', 1142867295, '/arinos/Index.php', '192.168.0.100', 'none', '201.24.154.65', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1331, '200.96.203.233', '200-96-203-233.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142941847, '/ARINOS/Index.php', 'none', 'none', '200.96.203.233', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1332, '200.96.203.233', '200-96-203-233.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98)', 1142942356, '/arinos/Index.php', 'none', 'none', '200.96.203.233', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1333, '200.96.203.233', '200-96-203-233.cbace702.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows 98)', 1142942606, '/arinos/Index.php', 'none', 'none', '200.96.203.233', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1334, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142943927, '/arinos/Index.php', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1335, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944137, '/arinos/modules.php?name=Content&pa=showpage&pid=2', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1336, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944149, '/arinos/index.php', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1337, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944155, '/arinos/modules.php?name=Content&pa=showpage&pid=3', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1338, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944160, '/arinos/modules.php?name=Content&pa=showpage&pid=4', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1339, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944191, '/arinos/admin.php', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1340, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944200, '/arinos/admin.php', 'none', 'none', '201.10.24.12', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1341, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944200, '/arinos/admin.php', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1342, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944208, '/arinos/admin.php', 'none', 'none', '201.10.24.12', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1343, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944216, '/arinos/admin.php', 'none', 'none', '201.10.24.12', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1344, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944229, '/arinos/admin.php', 'none', 'none', '201.10.24.12', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1345, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944234, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1346, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944242, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1347, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944276, '/arinos/admin.php', 'none', 'none', '201.10.24.12', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1348, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944277, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1349, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944307, '/arinos/index.php', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1350, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944318, '/arinos/modules.php?name=Stories_Archive', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1351, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944321, '/arinos/modules.php?name=FCKeditor', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1352, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944324, '/arinos/modules.php?name=Foruns', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1353, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944329, '/arinos/modules.php?name=Foruns', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1354, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944361, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1355, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944366, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1356, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944376, '/arinos/admin.php', 'none', 'none', '201.10.24.12', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1357, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944377, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1358, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944380, '/arinos/modules.php?name=Forums', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1359, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944410, '/arinos/modules.php?name=Calendar', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1360, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944416, '/arinos/modules.php?name=Surveys', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1361, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944428, '/arinos/modules.php?name=Statistics', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1362, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944441, '/arinos/admin.php', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1363, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944447, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1364, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944451, '/arinos/admin.php?op=content', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1365, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944471, '/arinos/modules.php?name=Your_Account', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1366, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944474, '/arinos/index.php', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1367, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944485, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1368, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944489, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1369, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944527, '/arinos/admin.php', 'none', 'none', '201.10.24.12', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1370, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944527, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1371, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944531, '/arinos/modules.php?name=Content&pa=showpage&pid=1', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1372, '201.10.24.12', '201-10-24-12.paemt705.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142944581, '/arinos/modules.php?name=News&file=article&sid=3', 'none', 'none', '201.10.24.12', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1373, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142948002, '/arinos/admin.php', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1374, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142948008, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1375, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142948012, '/arinos/admin.php?op=content', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1376, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142948021, '/arinos/admin.php?op=content_edit&pid=1', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1377, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142948060, '/arinos/admin.php?op=content', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1378, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142948615, '/arinos/admin.php?op=content_edit&pid=1', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1379, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142948648, '/arinos/admin.php?op=content', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1380, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142948685, '/arinos/admin.php', 'none', 'none', '200.203.27.185', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1381, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142948686, '/arinos/admin.php?op=content', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1382, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142948761, '/arinos/admin.php?op=content_edit&pid=5', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1383, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949087, '/arinos/admin.php', 'none', 'none', '200.203.27.185', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1384, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949088, '/arinos/admin.php?op=content', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1385, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949101, '/arinos/modules.php?name=Content&pa=showpage&pid=5', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1386, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949232, '/arinos/admin.php', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1387, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949241, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1388, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949245, '/arinos/admin.php?op=BlocksEdit&bid=14', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1389, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949275, '/arinos/admin.php', 'none', 'none', '200.203.27.185', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1390, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949276, '/arinos/admin.php?op=BlocksAdmin', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1391, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949308, '/arinos/index.php', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1392, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949328, '/arinos/modules.php?name=Content&pa=showpage&pid=5', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1393, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949492, '/arinos/admin.php?op=content_edit&pid=5', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1394, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949511, '/arinos/admin.php', 'none', 'none', '200.203.27.185', 'none', 'POST', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1395, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949512, '/arinos/admin.php?op=content', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1396, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949631, '/arinos/modules.php?name=Content&pa=showpage&pid=5', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1397, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949694, '/arinos/modules.php?name=Content&pa=showpage&pid=5', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1398, '200.203.27.185', '200-203-027-185.paemt7003.dsl.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142949760, '/arinos/modules.php?name=Content&pa=showpage&pid=5', 'none', 'none', '200.203.27.185', 'none', 'GET', '00');
INSERT INTO `kayapo_nsnst_tracked_ips` VALUES (1399, '201.24.154.34', '201-24-154-34.cbace300.ipd.brasiltelecom.net.br', 1, '', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)', 1142967660, '/arinos/Index.php', 'none', 'none', '201.24.154.34', 'none', 'GET', '00');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_pages`
-- 

CREATE TABLE `kayapo_pages` (
  `pid` int(10) NOT NULL auto_increment,
  `cid` int(10) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `subtitle` varchar(255) NOT NULL default '',
  `active` int(1) NOT NULL default '0',
  `page_header` text NOT NULL,
  `text` text NOT NULL,
  `page_footer` text NOT NULL,
  `signature` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `counter` int(10) NOT NULL default '0',
  `clanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`pid`),
  KEY `pid` (`pid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Extraindo dados da tabela `kayapo_pages`
-- 

INSERT INTO `kayapo_pages` VALUES (1, 0, 'Peça sua música!', 'Peça sua música online.', 1, '', '<p align="left"><iframe marginwidth="0" marginheight="0" src="http://www.casadaweb.net/arinos/musica/musica.asp" frameborder="0" width="754" scrolling="no" height="500"></iframe></p>', '', '', '2006-02-10 16:20:10', 15, 'brazilian');
INSERT INTO `kayapo_pages` VALUES (2, 0, 'Histórico', 'Histórico da Emissora Arinos FM', 1, '', '<p align="left"><iframe marginwidth="0" marginheight="0" src="http://www.casadaweb.net/arinos/programas.php" frameborder="0" width="782" scrolling="no" height="1350"></iframe></p>', '', '', '2006-03-10 09:21:32', 13, 'brazilian');
INSERT INTO `kayapo_pages` VALUES (3, 0, 'Programação', 'Programação da Emissora Arinos FM', 1, '', '<p align="left"><iframe marginwidth="0" marginheight="0" src="http://www.casadaweb.net/arinos/programac.php" frameborder="0" width="782" scrolling="no" height="1750"></iframe></p>', '', '', '2006-03-10 09:47:56', 8, 'brazilian');
INSERT INTO `kayapo_pages` VALUES (4, 0, 'Locutores', 'Locutores da Emissora Arinos FM', 1, '', '<p align="left"><iframe marginwidth="0" marginheight="0" src="http://www.casadaweb.net/arinos/locutores.php" frameborder="0" width="782" scrolling="no" height="3200"></iframe></p>', '', '', '2006-03-10 10:19:13', 17, 'brazilian');
INSERT INTO `kayapo_pages` VALUES (5, 0, 'Contatos', 'Entre em contato com a Arinos FM', 1, '', '<p align="center"><iframe marginwidth="0" marginheight="0" src="http://www.casadaweb.net/arinos/contatos.php" frameborder="0" width="754" scrolling="no" height="700"></iframe></p>', '', '', '2006-03-21 10:44:45', 5, 'brazilian');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_pages_categories`
-- 

CREATE TABLE `kayapo_pages_categories` (
  `cid` int(10) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  PRIMARY KEY  (`cid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_pages_categories`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_poll_check`
-- 

CREATE TABLE `kayapo_poll_check` (
  `ip` varchar(20) NOT NULL default '',
  `time` varchar(14) NOT NULL default '',
  `pollID` int(10) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_poll_check`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_poll_data`
-- 

CREATE TABLE `kayapo_poll_data` (
  `pollID` int(11) NOT NULL default '0',
  `optionText` char(50) NOT NULL default '',
  `optionCount` int(11) NOT NULL default '0',
  `voteID` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_poll_data`
-- 

INSERT INTO `kayapo_poll_data` VALUES (1, 'Hum... Nada mal!', 1, 1);
INSERT INTO `kayapo_poll_data` VALUES (1, 'Show!!!', 2, 2);
INSERT INTO `kayapo_poll_data` VALUES (1, 'Maravilhoso!!!', 1, 3);
INSERT INTO `kayapo_poll_data` VALUES (1, 'O melhor de todos!!!', 1, 4);
INSERT INTO `kayapo_poll_data` VALUES (1, 'Hum...', 0, 5);
INSERT INTO `kayapo_poll_data` VALUES (1, 'Não gostei!', 0, 6);
INSERT INTO `kayapo_poll_data` VALUES (1, 'Odiei!!!', 1, 7);
INSERT INTO `kayapo_poll_data` VALUES (1, '', 0, 8);
INSERT INTO `kayapo_poll_data` VALUES (1, '', 0, 9);
INSERT INTO `kayapo_poll_data` VALUES (1, '', 0, 10);
INSERT INTO `kayapo_poll_data` VALUES (1, '', 0, 11);
INSERT INTO `kayapo_poll_data` VALUES (1, '', 0, 12);
INSERT INTO `kayapo_poll_data` VALUES (2, 'Deixa a vida me levar - Zeca Pagodinho', 0, 1);
INSERT INTO `kayapo_poll_data` VALUES (2, 'Zóio de lula - Charlie Brow Junior', 0, 2);
INSERT INTO `kayapo_poll_data` VALUES (2, 'School - Green Day', 0, 3);
INSERT INTO `kayapo_poll_data` VALUES (2, 'Camila - Nenhum de nós', 0, 4);
INSERT INTO `kayapo_poll_data` VALUES (2, 'Parabólica - Engenheiros do Haway', 0, 5);
INSERT INTO `kayapo_poll_data` VALUES (2, 'No elevador - Kid Abelha', 0, 6);
INSERT INTO `kayapo_poll_data` VALUES (2, 'Eu juro - Leandro e Leonardo', 0, 7);
INSERT INTO `kayapo_poll_data` VALUES (2, 'Vida de gado - Zé Ramalho', 0, 8);
INSERT INTO `kayapo_poll_data` VALUES (2, 'Por mais que eu tente - Marjorie Estiano', 0, 9);
INSERT INTO `kayapo_poll_data` VALUES (2, 'Dias atrás - CPM 22', 0, 10);
INSERT INTO `kayapo_poll_data` VALUES (2, '', 0, 11);
INSERT INTO `kayapo_poll_data` VALUES (2, '', 0, 12);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_poll_desc`
-- 

CREATE TABLE `kayapo_poll_desc` (
  `pollID` int(11) NOT NULL auto_increment,
  `pollTitle` varchar(100) NOT NULL default '',
  `timeStamp` int(11) NOT NULL default '0',
  `voters` mediumint(9) NOT NULL default '0',
  `planguage` varchar(30) NOT NULL default '',
  `artid` int(10) NOT NULL default '0',
  PRIMARY KEY  (`pollID`),
  KEY `pollID` (`pollID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Extraindo dados da tabela `kayapo_poll_desc`
-- 

INSERT INTO `kayapo_poll_desc` VALUES (1, 'O que você achou deste site?', 961405160, 6, 'brazilian', 0);
INSERT INTO `kayapo_poll_desc` VALUES (2, 'Vote na mais tocada da Arinos FM!', 1142440191, 0, 'brazilian', 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_pollcomments`
-- 

CREATE TABLE `kayapo_pollcomments` (
  `tid` int(11) NOT NULL auto_increment,
  `pid` int(11) NOT NULL default '0',
  `pollID` int(11) NOT NULL default '0',
  `date` datetime default NULL,
  `name` varchar(60) NOT NULL default '',
  `email` varchar(60) default NULL,
  `url` varchar(60) default NULL,
  `host_name` varchar(60) default NULL,
  `subject` varchar(60) NOT NULL default '',
  `comment` text NOT NULL,
  `score` tinyint(4) NOT NULL default '0',
  `reason` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`tid`),
  KEY `tid` (`tid`),
  KEY `pid` (`pid`),
  KEY `pollID` (`pollID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_pollcomments`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_public_messages`
-- 

CREATE TABLE `kayapo_public_messages` (
  `mid` int(10) NOT NULL auto_increment,
  `content` varchar(255) NOT NULL default '',
  `date` varchar(14) default NULL,
  `who` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`mid`),
  KEY `mid` (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_public_messages`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_queue`
-- 

CREATE TABLE `kayapo_queue` (
  `qid` smallint(5) unsigned NOT NULL auto_increment,
  `uid` mediumint(9) NOT NULL default '0',
  `uname` varchar(40) NOT NULL default '',
  `subject` varchar(100) NOT NULL default '',
  `story` text,
  `storyext` text NOT NULL,
  `timestamp` datetime NOT NULL default '0000-00-00 00:00:00',
  `topic` varchar(20) NOT NULL default '',
  `alanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`qid`),
  KEY `qid` (`qid`),
  KEY `uid` (`uid`),
  KEY `uname` (`uname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_queue`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_quotes`
-- 

CREATE TABLE `kayapo_quotes` (
  `qid` int(10) unsigned NOT NULL auto_increment,
  `quote` text,
  PRIMARY KEY  (`qid`),
  KEY `qid` (`qid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Extraindo dados da tabela `kayapo_quotes`
-- 

INSERT INTO `kayapo_quotes` VALUES (1, 'Nos morituri te salutamus - CBHS');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_recherches`
-- 

CREATE TABLE `kayapo_recherches` (
  `primkey` smallint(6) NOT NULL auto_increment,
  `ip` varchar(15) default NULL,
  `query` varchar(50) default NULL,
  `date` varchar(18) default NULL,
  `userid` varchar(20) default NULL,
  `total` varchar(10) default NULL,
  PRIMARY KEY  (`primkey`),
  UNIQUE KEY `primkey` (`primkey`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_recherches`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_referer`
-- 

CREATE TABLE `kayapo_referer` (
  `rid` int(11) NOT NULL auto_increment,
  `url` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`rid`),
  KEY `rid` (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Extraindo dados da tabela `kayapo_referer`
-- 

INSERT INTO `kayapo_referer` VALUES (1, 'http://www.casadaweb.net/ARINOS/');
INSERT INTO `kayapo_referer` VALUES (2, 'http://www.casadaweb.net/ARINOS/index.php');
INSERT INTO `kayapo_referer` VALUES (3, 'http://www.casadaweb.net/ARINOS/');
INSERT INTO `kayapo_referer` VALUES (4, 'http://www.casadaweb.net/ARINOS/index.php');
INSERT INTO `kayapo_referer` VALUES (5, 'http://www.casadaweb.net/ARINOS/index.php');
INSERT INTO `kayapo_referer` VALUES (6, 'http://www.google.com.br/search?hl=pt-BR&q=www.casadaweb.net%2Farinos&btnI=Estou+com+sorte&meta=cr%3');
INSERT INTO `kayapo_referer` VALUES (7, 'http://www.google.com.br/search?hl=pt-BR&q=www.casadaweb.net%2Farinos&btnI=Estou+com+sorte&meta=cr%3');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_related`
-- 

CREATE TABLE `kayapo_related` (
  `rid` int(11) NOT NULL auto_increment,
  `tid` int(11) NOT NULL default '0',
  `name` varchar(30) NOT NULL default '',
  `url` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`rid`),
  KEY `rid` (`rid`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_related`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_reviews`
-- 

CREATE TABLE `kayapo_reviews` (
  `id` int(10) NOT NULL auto_increment,
  `date` date NOT NULL default '0000-00-00',
  `title` varchar(150) NOT NULL default '',
  `text` text NOT NULL,
  `reviewer` varchar(20) default NULL,
  `email` varchar(60) default NULL,
  `score` int(10) NOT NULL default '0',
  `cover` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `url_title` varchar(50) NOT NULL default '',
  `hits` int(10) NOT NULL default '0',
  `rlanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_reviews`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_reviews_add`
-- 

CREATE TABLE `kayapo_reviews_add` (
  `id` int(10) NOT NULL auto_increment,
  `date` date default NULL,
  `title` varchar(150) NOT NULL default '',
  `text` text NOT NULL,
  `reviewer` varchar(20) NOT NULL default '',
  `email` varchar(60) default NULL,
  `score` int(10) NOT NULL default '0',
  `url` varchar(100) NOT NULL default '',
  `url_title` varchar(50) NOT NULL default '',
  `rlanguage` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_reviews_add`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_reviews_comments`
-- 

CREATE TABLE `kayapo_reviews_comments` (
  `cid` int(10) NOT NULL auto_increment,
  `rid` int(10) NOT NULL default '0',
  `userid` varchar(25) NOT NULL default '',
  `date` datetime default NULL,
  `comments` text,
  `score` int(10) NOT NULL default '0',
  PRIMARY KEY  (`cid`),
  KEY `cid` (`cid`),
  KEY `rid` (`rid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_reviews_comments`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_reviews_main`
-- 

CREATE TABLE `kayapo_reviews_main` (
  `title` varchar(100) default NULL,
  `description` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_reviews_main`
-- 

INSERT INTO `kayapo_reviews_main` VALUES ('Reviews Section Title', 'Reviews Section Long Description');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_session`
-- 

CREATE TABLE `kayapo_session` (
  `uname` varchar(25) NOT NULL default '',
  `time` varchar(14) NOT NULL default '',
  `host_addr` varchar(48) NOT NULL default '',
  `guest` int(1) NOT NULL default '0',
  KEY `time` (`time`),
  KEY `guest` (`guest`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_session`
-- 

INSERT INTO `kayapo_session` VALUES ('201.24.154.34', '1142967660', '201.24.154.34', 1);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_stats_date`
-- 

CREATE TABLE `kayapo_stats_date` (
  `year` smallint(6) NOT NULL default '0',
  `month` tinyint(4) NOT NULL default '0',
  `date` tinyint(4) NOT NULL default '0',
  `hits` bigint(20) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_stats_date`
-- 

INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 1, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 2, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 3, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 4, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 5, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 6, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 7, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 8, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 9, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 10, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 11, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 12, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 13, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 14, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 15, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 16, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 17, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 18, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 19, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 20, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 21, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 22, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 23, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 24, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 25, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 26, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 27, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 28, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 29, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 30, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 1, 31, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 1, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 2, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 3, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 4, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 5, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 6, 367);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 7, 143);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 8, 35);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 9, 88);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 10, 28);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 11, 1);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 12, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 13, 1);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 14, 1);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 15, 7);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 16, 3);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 17, 39);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 18, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 19, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 20, 1);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 21, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 22, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 23, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 24, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 25, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 26, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 27, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 2, 28, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 1, 9);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 2, 1);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 3, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 4, 2);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 5, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 6, 7);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 7, 20);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 8, 39);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 9, 79);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 10, 94);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 11, 4);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 12, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 13, 27);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 14, 43);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 15, 23);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 16, 21);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 17, 5);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 18, 1);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 19, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 20, 4);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 21, 61);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 22, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 23, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 24, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 25, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 26, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 27, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 28, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 29, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 30, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 3, 31, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 1, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 2, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 3, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 4, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 5, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 6, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 7, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 8, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 9, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 10, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 11, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 12, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 13, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 14, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 15, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 16, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 17, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 18, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 19, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 20, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 21, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 22, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 23, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 24, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 25, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 26, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 27, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 28, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 29, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 4, 30, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 1, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 2, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 3, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 4, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 5, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 6, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 7, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 8, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 9, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 10, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 11, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 12, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 13, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 14, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 15, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 16, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 17, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 18, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 19, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 20, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 21, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 22, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 23, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 24, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 25, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 26, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 27, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 28, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 29, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 30, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 5, 31, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 1, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 2, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 3, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 4, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 5, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 6, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 7, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 8, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 9, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 10, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 11, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 12, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 13, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 14, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 15, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 16, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 17, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 18, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 19, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 20, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 21, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 22, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 23, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 24, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 25, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 26, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 27, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 28, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 29, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 6, 30, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 1, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 2, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 3, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 4, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 5, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 6, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 7, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 8, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 9, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 10, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 11, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 12, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 13, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 14, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 15, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 16, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 17, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 18, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 19, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 20, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 21, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 22, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 23, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 24, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 25, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 26, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 27, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 28, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 29, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 30, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 7, 31, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 1, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 2, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 3, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 4, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 5, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 6, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 7, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 8, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 9, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 10, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 11, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 12, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 13, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 14, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 15, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 16, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 17, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 18, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 19, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 20, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 21, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 22, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 23, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 24, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 25, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 26, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 27, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 28, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 29, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 30, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 8, 31, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 1, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 2, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 3, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 4, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 5, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 6, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 7, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 8, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 9, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 10, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 11, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 12, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 13, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 14, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 15, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 16, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 17, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 18, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 19, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 20, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 21, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 22, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 23, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 24, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 25, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 26, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 27, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 28, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 29, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 9, 30, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 1, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 2, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 3, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 4, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 5, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 6, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 7, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 8, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 9, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 10, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 11, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 12, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 13, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 14, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 15, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 16, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 17, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 18, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 19, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 20, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 21, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 22, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 23, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 24, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 25, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 26, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 27, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 28, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 29, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 30, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 10, 31, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 1, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 2, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 3, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 4, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 5, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 6, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 7, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 8, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 9, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 10, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 11, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 12, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 13, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 14, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 15, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 16, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 17, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 18, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 19, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 20, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 21, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 22, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 23, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 24, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 25, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 26, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 27, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 28, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 29, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 11, 30, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 1, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 2, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 3, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 4, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 5, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 6, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 7, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 8, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 9, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 10, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 11, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 12, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 13, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 14, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 15, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 16, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 17, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 18, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 19, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 20, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 21, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 22, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 23, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 24, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 25, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 26, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 27, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 28, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 29, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 30, 0);
INSERT INTO `kayapo_stats_date` VALUES (2006, 12, 31, 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_stats_hour`
-- 

CREATE TABLE `kayapo_stats_hour` (
  `year` smallint(6) NOT NULL default '0',
  `month` tinyint(4) NOT NULL default '0',
  `date` tinyint(4) NOT NULL default '0',
  `hour` tinyint(4) NOT NULL default '0',
  `hits` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_stats_hour`
-- 

INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 9, 15);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 10, 63);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 11, 6);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 12, 19);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 13, 12);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 14, 81);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 15, 73);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 16, 46);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 17, 11);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 22, 12);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 6, 23, 29);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 0, 41);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 1, 81);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 9, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 10, 4);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 13, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 14, 4);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 15, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 16, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 22, 5);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 7, 23, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 0, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 9, 15);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 10, 4);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 11, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 17, 11);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 18, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 19, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 8, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 2, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 13, 4);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 14, 32);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 16, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 17, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 18, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 20, 23);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 21, 13);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 22, 11);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 9, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 13, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 15, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 16, 26);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 10, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 13, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 11, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 17, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 13, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 11, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 14, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 14, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 15, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 16, 4);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 15, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 15, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 16, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 16, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 11, 10);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 12, 18);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 18, 11);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 17, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 10, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 2, 20, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 18, 9);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 1, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 12, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 2, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 5, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 4, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 9, 3);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 11, 3);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 12, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 6, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 8, 3);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 9, 5);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 14, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 15, 7);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 16, 3);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 7, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 16, 19);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 17, 12);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 18, 8);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 8, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 8, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 10, 6);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 11, 5);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 12, 6);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 14, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 15, 28);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 16, 9);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 17, 12);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 18, 7);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 21, 4);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 9, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 8, 4);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 9, 23);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 10, 15);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 11, 34);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 12, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 15, 5);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 16, 10);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 18, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 10, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 6, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 13, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 17, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 11, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 8, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 10, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 11, 11);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 12, 7);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 15, 4);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 16, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 18, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 13, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 9, 7);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 10, 3);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 11, 14);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 12, 3);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 13, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 14, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 15, 6);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 17, 6);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 22, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 14, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 9, 3);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 10, 7);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 13, 9);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 15, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 16, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 22, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 15, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 8, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 9, 17);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 11, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 15, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 21, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 16, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 12, 4);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 18, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 17, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 9, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 11, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 12, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 18, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 8, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 9, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 10, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 11, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 12, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 16, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 20, 23, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 0, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 1, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 2, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 3, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 4, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 5, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 6, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 7, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 8, 2);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 9, 36);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 10, 19);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 11, 3);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 12, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 13, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 14, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 15, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 16, 1);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 17, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 18, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 19, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 20, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 21, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 22, 0);
INSERT INTO `kayapo_stats_hour` VALUES (2006, 3, 21, 23, 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_stats_month`
-- 

CREATE TABLE `kayapo_stats_month` (
  `year` smallint(6) NOT NULL default '0',
  `month` tinyint(4) NOT NULL default '0',
  `hits` bigint(20) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_stats_month`
-- 

INSERT INTO `kayapo_stats_month` VALUES (2006, 1, 0);
INSERT INTO `kayapo_stats_month` VALUES (2006, 2, 714);
INSERT INTO `kayapo_stats_month` VALUES (2006, 3, 440);
INSERT INTO `kayapo_stats_month` VALUES (2006, 4, 0);
INSERT INTO `kayapo_stats_month` VALUES (2006, 5, 0);
INSERT INTO `kayapo_stats_month` VALUES (2006, 6, 0);
INSERT INTO `kayapo_stats_month` VALUES (2006, 7, 0);
INSERT INTO `kayapo_stats_month` VALUES (2006, 8, 0);
INSERT INTO `kayapo_stats_month` VALUES (2006, 9, 0);
INSERT INTO `kayapo_stats_month` VALUES (2006, 10, 0);
INSERT INTO `kayapo_stats_month` VALUES (2006, 11, 0);
INSERT INTO `kayapo_stats_month` VALUES (2006, 12, 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_stats_year`
-- 

CREATE TABLE `kayapo_stats_year` (
  `year` smallint(6) NOT NULL default '0',
  `hits` bigint(20) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Extraindo dados da tabela `kayapo_stats_year`
-- 

INSERT INTO `kayapo_stats_year` VALUES (2006, 1154);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_stories`
-- 

CREATE TABLE `kayapo_stories` (
  `sid` int(11) NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `aid` varchar(30) NOT NULL default '',
  `title` varchar(80) default NULL,
  `time` datetime default NULL,
  `hometext` text,
  `bodytext` text NOT NULL,
  `comments` int(11) default '0',
  `counter` mediumint(8) unsigned default NULL,
  `topic` int(3) NOT NULL default '1',
  `informant` varchar(20) NOT NULL default '',
  `notes` text NOT NULL,
  `ihome` int(1) NOT NULL default '0',
  `alanguage` varchar(30) NOT NULL default '',
  `acomm` int(1) NOT NULL default '0',
  `haspoll` int(1) NOT NULL default '0',
  `pollID` int(10) NOT NULL default '0',
  `score` int(10) NOT NULL default '0',
  `ratings` int(10) NOT NULL default '0',
  `associated` text NOT NULL,
  PRIMARY KEY  (`sid`),
  KEY `sid` (`sid`),
  KEY `catid` (`catid`),
  KEY `counter` (`counter`),
  KEY `topic` (`topic`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Extraindo dados da tabela `kayapo_stories`
-- 

INSERT INTO `kayapo_stories` VALUES (3, 0, 'Arinos', 'Médio Uruguai ganha unidade do Sebrae', '2006-02-07 01:48:11', '<p align="justify"><span style="FONT-SIZE: 12pt; FONT-FAMILY: Verdana; mso-fareast-font-family: ''Times New Roman''; mso-bidi-font-family: ''Times New Roman''; mso-ansi-language: PT-BR; mso-fareast-language: PT-BR; mso-bidi-language: AR-SA"><font size="1"><img height="107" alt="" src="http://www.luzealegria.com.br/modules/FCKeditor/upload/Image/SEBRAE.jpg" width="160" align="left" border="1"/>O Serviço de Apoio às Micro e Pequenas Empresas no Rio Grande do Sul (Sebrae/RS) está mais próximo dos empreendedores do Médio Uruguai. Foi inaugurada na noite de ontem,26, em Frederico Westphalen, a nova unidade de atendimento, com abrangência em 29 municípios do Médio Uruguai. O Sebrae, instalado numa sala da ACI de Frederico Westphalen vai atender 300 empresários.</font></span></p>', '<p align="justify"><font face="Verdana" size="1">Da solenidade participaram entre outras lideranças, o prefeito em exercício, Volmar Tauffer, o presidente da Câmara de vereadores, Eduardo Milani, o presidente da ACI, Francisco Carlos Quatrim, além do presidente do Sindilojas, Jamel Younes e o<span style="mso-spacerun: yes">  </span>diretor-superintendente do Sebrae/RS, Derly Fialho. Durante a solenidade o Secretário da Indústria e Comércio, Nelcy Bakof, falou em nome do prefeito em exercício Volmar Tauffer. Também se manifestaram, O diretor-superintendente do Sebrae RS, Derli Fialho e o presidente da ACI de Frederico Westphalen, Francisco Carlos Quatrim. Após a solenidade foi servido um coquetel aos presentes, no Salão Nobre da ACI.</font></p>', 0, 6, 2, 'Arinos', '', 0, '', 0, 0, 0, 10, 2, '2-');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_stories_cat`
-- 

CREATE TABLE `kayapo_stories_cat` (
  `catid` int(11) NOT NULL auto_increment,
  `title` varchar(20) NOT NULL default '',
  `counter` int(11) NOT NULL default '0',
  PRIMARY KEY  (`catid`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_stories_cat`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_subscriptions`
-- 

CREATE TABLE `kayapo_subscriptions` (
  `id` int(10) NOT NULL auto_increment,
  `userid` int(10) default '0',
  `subscription_expire` varchar(50) NOT NULL default '',
  KEY `id` (`id`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `kayapo_subscriptions`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_topics`
-- 

CREATE TABLE `kayapo_topics` (
  `topicid` int(3) NOT NULL auto_increment,
  `topicname` varchar(20) default NULL,
  `topicimage` varchar(20) default NULL,
  `topictext` varchar(40) default NULL,
  `counter` int(11) NOT NULL default '0',
  PRIMARY KEY  (`topicid`),
  KEY `topicid` (`topicid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Extraindo dados da tabela `kayapo_topics`
-- 

INSERT INTO `kayapo_topics` VALUES (2, 'Notícias', 'relatorio5.jpg', 'Notícias', 0);
INSERT INTO `kayapo_topics` VALUES (3, 'Eventos', 'variados47.gif', 'Eventos', 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_users`
-- 

CREATE TABLE `kayapo_users` (
  `user_id` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `username` varchar(25) NOT NULL default '',
  `user_email` varchar(255) NOT NULL default '',
  `femail` varchar(255) NOT NULL default '',
  `user_website` varchar(255) NOT NULL default '',
  `user_avatar` varchar(255) NOT NULL default '',
  `user_regdate` varchar(20) NOT NULL default '',
  `user_icq` varchar(15) default NULL,
  `user_occ` varchar(100) default NULL,
  `user_from` varchar(100) default NULL,
  `user_interests` varchar(150) NOT NULL default '',
  `user_sig` varchar(255) default NULL,
  `user_viewemail` tinyint(2) default NULL,
  `user_theme` int(3) default NULL,
  `user_aim` varchar(18) default NULL,
  `user_yim` varchar(25) default NULL,
  `user_msnm` varchar(25) default NULL,
  `user_password` varchar(40) NOT NULL default '',
  `storynum` tinyint(4) NOT NULL default '10',
  `umode` varchar(10) NOT NULL default '',
  `uorder` tinyint(1) NOT NULL default '0',
  `thold` tinyint(1) NOT NULL default '0',
  `noscore` tinyint(1) NOT NULL default '0',
  `bio` tinytext NOT NULL,
  `ublockon` tinyint(1) NOT NULL default '0',
  `ublock` tinytext NOT NULL,
  `theme` varchar(255) NOT NULL default '',
  `commentmax` int(11) NOT NULL default '4096',
  `counter` int(11) NOT NULL default '0',
  `newsletter` int(1) NOT NULL default '0',
  `user_posts` int(10) NOT NULL default '0',
  `user_attachsig` int(2) NOT NULL default '0',
  `user_rank` int(10) NOT NULL default '0',
  `user_level` int(10) NOT NULL default '1',
  `broadcast` tinyint(1) NOT NULL default '1',
  `popmeson` tinyint(1) NOT NULL default '0',
  `user_active` tinyint(1) default '1',
  `user_session_time` int(11) NOT NULL default '0',
  `user_session_page` smallint(5) NOT NULL default '0',
  `user_lastvisit` int(11) NOT NULL default '0',
  `user_timezone` tinyint(4) NOT NULL default '10',
  `user_style` tinyint(4) default NULL,
  `user_lang` varchar(255) NOT NULL default 'brazilian',
  `user_dateformat` varchar(14) NOT NULL default 'D M d, Y g:i a',
  `user_new_privmsg` smallint(5) unsigned NOT NULL default '0',
  `user_unread_privmsg` smallint(5) unsigned NOT NULL default '0',
  `user_last_privmsg` int(11) NOT NULL default '0',
  `user_emailtime` int(11) default NULL,
  `user_allowhtml` tinyint(1) default '1',
  `user_allowbbcode` tinyint(1) default '1',
  `user_allowsmile` tinyint(1) default '1',
  `user_allowavatar` tinyint(1) NOT NULL default '1',
  `user_allow_pm` tinyint(1) NOT NULL default '1',
  `user_allow_viewonline` tinyint(1) NOT NULL default '1',
  `user_notify` tinyint(1) NOT NULL default '0',
  `user_notify_pm` tinyint(1) NOT NULL default '0',
  `user_popup_pm` tinyint(1) NOT NULL default '0',
  `user_avatar_type` tinyint(4) NOT NULL default '3',
  `user_sig_bbcode_uid` varchar(10) default NULL,
  `user_actkey` varchar(32) default NULL,
  `user_newpasswd` varchar(32) default NULL,
  `points` int(10) default '0',
  `last_ip` varchar(15) NOT NULL default '0',
  `agreedtos` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`user_id`),
  KEY `uid` (`user_id`),
  KEY `uname` (`username`),
  KEY `user_session_time` (`user_session_time`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Extraindo dados da tabela `kayapo_users`
-- 

INSERT INTO `kayapo_users` VALUES (1, '', 'Anonymous', '', '', '', 'blank.gif', 'Nov 10, 2000', '', '', '', '', '', 0, 0, '', '', '', '', 10, '', 0, 0, 0, '', 0, '', '', 4096, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 10, NULL, 'brazilian', 'D M d, Y g:i a', 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 0, 3, NULL, NULL, NULL, 0, '0', 0);
INSERT INTO `kayapo_users` VALUES (2, '', 'Mandry', 'mandry@casadaweb.net', '', 'http://www.casadaweb.net/arinos', 'gallery/blank.gif', 'Feb 06, 2006', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '04b6e1a104ba0ed5e7985abde3e13140', 10, '', 0, 0, 0, '', 0, '', '', 4096, 0, 0, 0, 0, 0, 2, 1, 0, 1, 1142512693, 0, 1142512404, 10, NULL, 'brazilian', 'D M d, Y g:i a', 0, 0, 1142512693, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 0, 3, NULL, NULL, NULL, 0, '200.180.189.99', 0);
INSERT INTO `kayapo_users` VALUES (3, 'claudio Gomes', 'claudio', 'claudio@arinosnet.com.br', '', 'http://www.sollucao.inf.br', 'gallery/blank.gif', 'Feb 08, 2006', '', 'diretor adm', 'nova mutum - mt', 'informatica', '', 0, NULL, '', '', 'claudio@sollucao.inf.br', 'c760a09b0916445dc8c6528bcbc8037b', 10, 'nested', 0, 0, 0, '', 0, '', '', 4096, 0, 1, 0, 0, 0, 1, 1, 0, 1, 1139400108, 0, 1139400108, -4, NULL, 'brazilian', 'Y-m-d, H:i:s', 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 0, 3, NULL, NULL, NULL, 0, '0', 0);
INSERT INTO `kayapo_users` VALUES (4, 'Robson Luiz Sziminski', 'Robson', 'robinhogato2@hotmail.com', '', '', 'gallery/blank.gif', 'Mar 14, 2006', '', 'Locutor e produtor de audio', 'Ipiranga do Norte', '', '', 0, NULL, '', '', '', '9b77a63930206f15df1ff310a7a5ce55', 10, 'nested', 0, 0, 0, '', 0, '', '', 4096, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 1142346322, -3, NULL, 'brazilian', 'Y-m-d, H:i:s', 0, 0, 0, NULL, 1, 1, 1, 1, 1, 1, 0, 0, 0, 3, NULL, NULL, NULL, 0, '201.14.76.150', 0);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `kayapo_users_temp`
-- 

CREATE TABLE `kayapo_users_temp` (
  `user_id` int(10) NOT NULL auto_increment,
  `username` varchar(25) NOT NULL default '',
  `realname` varchar(255) NOT NULL default '',
  `user_email` varchar(255) NOT NULL default '',
  `user_password` varchar(40) NOT NULL default '',
  `user_regdate` varchar(20) NOT NULL default '',
  `check_num` varchar(50) NOT NULL default '',
  `time` varchar(14) NOT NULL default '',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Extraindo dados da tabela `kayapo_users_temp`
-- 

