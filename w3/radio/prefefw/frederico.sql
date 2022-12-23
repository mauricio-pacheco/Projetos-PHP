-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Servidor: admin.mysql-hospedagem.procergs.com.br
-- Tempo de Geração: Mar 02, 2009 as 03:47 PM
-- Versão do Servidor: 5.0.24
-- Versão do PHP: 4.4.8_pre20070816-pl0-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Banco de Dados: `frederico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_avatar`
--

CREATE TABLE IF NOT EXISTS `xoops_avatar` (
  `avatar_id` mediumint(8) unsigned NOT NULL auto_increment,
  `avatar_file` varchar(30) NOT NULL default '',
  `avatar_name` varchar(100) NOT NULL default '',
  `avatar_mimetype` varchar(30) NOT NULL default '',
  `avatar_created` int(10) NOT NULL default '0',
  `avatar_display` tinyint(1) unsigned NOT NULL default '0',
  `avatar_weight` smallint(5) unsigned NOT NULL default '0',
  `avatar_type` char(1) NOT NULL default '',
  PRIMARY KEY  (`avatar_id`),
  KEY `avatar_type` (`avatar_type`,`avatar_display`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `xoops_avatar`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_avatar_user_link`
--

CREATE TABLE IF NOT EXISTS `xoops_avatar_user_link` (
  `avatar_id` mediumint(8) unsigned NOT NULL default '0',
  `user_id` mediumint(8) unsigned NOT NULL default '0',
  KEY `avatar_user_id` (`avatar_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `xoops_avatar_user_link`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_banner`
--

CREATE TABLE IF NOT EXISTS `xoops_banner` (
  `bid` smallint(5) unsigned NOT NULL auto_increment,
  `cid` tinyint(3) unsigned NOT NULL default '0',
  `imptotal` mediumint(8) unsigned NOT NULL default '0',
  `impmade` mediumint(8) unsigned NOT NULL default '0',
  `clicks` mediumint(8) unsigned NOT NULL default '0',
  `imageurl` varchar(255) NOT NULL default '',
  `clickurl` varchar(255) NOT NULL default '',
  `date` int(10) NOT NULL default '0',
  `htmlbanner` tinyint(1) NOT NULL default '0',
  `htmlcode` text NOT NULL,
  PRIMARY KEY  (`bid`),
  KEY `idxbannercid` (`cid`),
  KEY `idxbannerbidcid` (`bid`,`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `xoops_banner`
--

INSERT INTO `xoops_banner` (`bid`, `cid`, `imptotal`, `impmade`, `clicks`, `imageurl`, `clickurl`, `date`, `htmlbanner`, `htmlcode`) VALUES
(6, 2, 0, 113483, 0, 'http://www.fredericowestphalen.rs.gov.br/html/images/banner.swf', 'http://www.fredericowestphalen.rs.gov.br/html/images/banner.swf', 1175255419, 0, ''),
(4, 2, 0, 227233, 0, 'http://www.fredericowestphalen.rs.gov.br/html/images/banner.swf', 'http://www.fredericowestphalen.rs.gov.br/html/images/banner.swf', 1100776860, 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_bannerclient`
--

CREATE TABLE IF NOT EXISTS `xoops_bannerclient` (
  `cid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `contact` varchar(60) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `login` varchar(10) NOT NULL default '',
  `passwd` varchar(10) NOT NULL default '',
  `extrainfo` text NOT NULL,
  PRIMARY KEY  (`cid`),
  KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `xoops_bannerclient`
--

INSERT INTO `xoops_bannerclient` (`cid`, `name`, `contact`, `email`, `login`, `passwd`, `extrainfo`) VALUES
(2, 'Webmaster', '', 'roberto@fredericowestphalen.rs.gov.br', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_bannerfinish`
--

CREATE TABLE IF NOT EXISTS `xoops_bannerfinish` (
  `bid` smallint(5) unsigned NOT NULL auto_increment,
  `cid` smallint(5) unsigned NOT NULL default '0',
  `impressions` mediumint(8) unsigned NOT NULL default '0',
  `clicks` mediumint(8) unsigned NOT NULL default '0',
  `datestart` int(10) unsigned NOT NULL default '0',
  `dateend` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`bid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `xoops_bannerfinish`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_block_module_link`
--

CREATE TABLE IF NOT EXISTS `xoops_block_module_link` (
  `block_id` mediumint(8) unsigned NOT NULL default '0',
  `module_id` smallint(5) NOT NULL default '0',
  KEY `module_id` (`module_id`),
  KEY `block_id` (`block_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `xoops_block_module_link`
--

INSERT INTO `xoops_block_module_link` (`block_id`, `module_id`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(57, 0),
(14, 0),
(15, 0),
(16, 0),
(58, -1),
(39, -1),
(63, 0),
(48, -1),
(46, 0),
(49, -1),
(45, 0),
(43, 0),
(44, 0),
(42, 0),
(62, -1),
(61, -1),
(51, -1),
(52, -1),
(53, -1),
(54, -1),
(55, -1),
(56, -1),
(64, -1),
(65, -1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_config`
--

CREATE TABLE IF NOT EXISTS `xoops_config` (
  `conf_id` smallint(5) unsigned NOT NULL auto_increment,
  `conf_modid` smallint(5) unsigned NOT NULL default '0',
  `conf_catid` smallint(5) unsigned NOT NULL default '0',
  `conf_name` varchar(25) NOT NULL default '',
  `conf_title` varchar(30) NOT NULL default '',
  `conf_value` text NOT NULL,
  `conf_desc` varchar(30) NOT NULL default '',
  `conf_formtype` varchar(15) NOT NULL default '',
  `conf_valuetype` varchar(10) NOT NULL default '',
  `conf_order` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`conf_id`),
  KEY `conf_mod_cat_id` (`conf_modid`,`conf_catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=243 ;

--
-- Extraindo dados da tabela `xoops_config`
--

INSERT INTO `xoops_config` (`conf_id`, `conf_modid`, `conf_catid`, `conf_name`, `conf_title`, `conf_value`, `conf_desc`, `conf_formtype`, `conf_valuetype`, `conf_order`) VALUES
(1, 0, 1, 'sitename', '_MD_AM_SITENAME', 'Prefeitura Municipal de Frederico Westphalen - RS', '_MD_AM_SITENAMEDSC', 'textbox', 'text', 0),
(2, 0, 1, 'slogan', '_MD_AM_SLOGAN', 'Administrando com a Comunidade', '_MD_AM_SLOGANDSC', 'textbox', 'text', 2),
(3, 0, 1, 'language', '_MD_AM_LANGUAGE', 'portugues.do.brasil', '_MD_AM_LANGUAGEDSC', 'language', 'other', 4),
(4, 0, 1, 'startpage', '_MD_AM_STARTPAGE', '--', '_MD_AM_STARTPAGEDSC', 'startpage', 'other', 6),
(5, 0, 1, 'server_TZ', '_MD_AM_SERVERTZ', '-3', '_MD_AM_SERVERTZDSC', 'timezone', 'float', 8),
(6, 0, 1, 'default_TZ', '_MD_AM_DEFAULTTZ', '-3', '_MD_AM_DEFAULTTZDSC', 'timezone', 'float', 10),
(7, 0, 1, 'theme_set', '_MD_AM_DTHEME', 'orange_peco', '_MD_AM_DTHEMEDSC', 'theme', 'other', 12),
(8, 0, 1, 'anonymous', '_MD_AM_ANONNAME', 'Visitantes', '_MD_AM_ANONNAMEDSC', 'textbox', 'text', 15),
(9, 0, 1, 'gzip_compression', '_MD_AM_USEGZIP', '0', '_MD_AM_USEGZIPDSC', 'yesno', 'int', 16),
(10, 0, 1, 'usercookie', '_MD_AM_USERCOOKIE', 'xoops_user', '_MD_AM_USERCOOKIEDSC', 'textbox', 'text', 18),
(11, 0, 1, 'session_expire', '_MD_AM_SESSEXPIRE', '50', '_MD_AM_SESSEXPIREDSC', 'textbox', 'int', 22),
(12, 0, 1, 'banners', '_MD_AM_BANNERS', '1', '_MD_AM_BANNERSDSC', 'yesno', 'int', 26),
(13, 0, 1, 'debug_mode', '_MD_AM_DEBUGMODE', '0', '_MD_AM_DEBUGMODEDSC', 'select', 'int', 24),
(14, 0, 1, 'my_ip', '_MD_AM_MYIP', '200.180.153.2', '_MD_AM_MYIPDSC', 'textbox', 'text', 29),
(15, 0, 1, 'use_ssl', '_MD_AM_USESSL', '0', '_MD_AM_USESSLDSC', 'yesno', 'int', 30),
(16, 0, 1, 'session_name', '_MD_AM_SESSNAME', 'xoops_session', '_MD_AM_SESSNAMEDSC', 'textbox', 'text', 20),
(17, 0, 2, 'minpass', '_MD_AM_MINPASS', '5', '_MD_AM_MINPASSDSC', 'textbox', 'int', 1),
(18, 0, 2, 'minuname', '_MD_AM_MINUNAME', '3', '_MD_AM_MINUNAMEDSC', 'textbox', 'int', 2),
(19, 0, 2, 'new_user_notify', '_MD_AM_NEWUNOTIFY', '1', '_MD_AM_NEWUNOTIFYDSC', 'yesno', 'int', 4),
(20, 0, 2, 'new_user_notify_group', '_MD_AM_NOTIFYTO', '1', '_MD_AM_NOTIFYTODSC', 'group', 'int', 6),
(21, 0, 2, 'activation_type', '_MD_AM_ACTVTYPE', '0', '_MD_AM_ACTVTYPEDSC', 'select', 'int', 8),
(22, 0, 2, 'activation_group', '_MD_AM_ACTVGROUP', '1', '_MD_AM_ACTVGROUPDSC', 'group', 'int', 10),
(23, 0, 2, 'uname_test_level', '_MD_AM_UNAMELVL', '0', '_MD_AM_UNAMELVLDSC', 'select', 'int', 12),
(24, 0, 2, 'avatar_allow_upload', '_MD_AM_AVATARALLOW', '0', '_MD_AM_AVATARALWDSC', 'yesno', 'int', 14),
(27, 0, 2, 'avatar_width', '_MD_AM_AVATARW', '80', '_MD_AM_AVATARWDSC', 'textbox', 'int', 16),
(28, 0, 2, 'avatar_height', '_MD_AM_AVATARH', '80', '_MD_AM_AVATARHDSC', 'textbox', 'int', 18),
(29, 0, 2, 'avatar_maxsize', '_MD_AM_AVATARMAX', '35000', '_MD_AM_AVATARMAXDSC', 'textbox', 'int', 20),
(30, 0, 1, 'adminmail', '_MD_AM_ADMINML', 'fredericowestphalen@fredericowestphalen.rs.gov.br', '_MD_AM_ADMINMLDSC', 'textbox', 'text', 3),
(31, 0, 2, 'self_delete', '_MD_AM_SELFDELETE', '0', '_MD_AM_SELFDELETEDSC', 'yesno', 'int', 22),
(32, 0, 1, 'com_mode', '_MD_AM_COMMODE', 'nest', '_MD_AM_COMMODEDSC', 'select', 'text', 34),
(33, 0, 1, 'com_order', '_MD_AM_COMORDER', '0', '_MD_AM_COMORDERDSC', 'select', 'int', 36),
(34, 0, 2, 'bad_unames', '_MD_AM_BADUNAMES', 'a:3:{i:0;s:9:"webmaster";i:1;s:6:"^xoops";i:2;s:6:"^admin";}', '_MD_AM_BADUNAMESDSC', 'textarea', 'array', 24),
(35, 0, 2, 'bad_emails', '_MD_AM_BADEMAILS', 'a:1:{i:0;s:10:"xoops.org$";}', '_MD_AM_BADEMAILSDSC', 'textarea', 'array', 26),
(36, 0, 2, 'maxuname', '_MD_AM_MAXUNAME', '10', '_MD_AM_MAXUNAMEDSC', 'textbox', 'int', 3),
(37, 0, 1, 'bad_ips', '_MD_AM_BADIPS', 'a:4:{i:0;s:0:"";i:1;s:13:"201.41.127.42";i:2;s:13:"24.187.74.102";i:3;s:13:"91.187.123.69";}', '_MD_AM_BADIPSDSC', 'textarea', 'array', 42),
(38, 0, 3, 'meta_keywords', '_MD_AM_METAKEY', 'linux, software, download, free, php, portal, open, source, opensource, FreeSoftware, gnu, gpl, license, Unix, mysql, sql, database, databases, web site, modules, theme, cms,', '_MD_AM_METAKEYDSC', 'textarea', 'text', 0),
(233, 10, 0, 'san_isocom', '_MI_PROTECTOR_SAN_ISOCOM', '1', '_MI_PROTECTOR_SAN_ISOCOMDSC', 'yesno', 'int', 3),
(39, 0, 3, 'footer', '_MD_AM_FOOTER', 'Portal da Prefeitura Municipal de Frederico Westphalen - RS   -   \r\nCopyright © 2007-2008 - Todos os Direitos Reservados', '_MD_AM_FOOTERDSC', 'textarea', 'text', 20),
(40, 0, 4, 'censor_enable', '_MD_AM_DOCENSOR', '0', '_MD_AM_DOCENSORDSC', 'yesno', 'int', 0),
(41, 0, 4, 'censor_words', '_MD_AM_CENSORWRD', 'a:2:{i:0;s:4:"fuck";i:1;s:4:"shit";}', '_MD_AM_CENSORWRDDSC', 'textarea', 'array', 1),
(42, 0, 4, 'censor_replace', '_MD_AM_CENSORRPLC', '#OOPS#', '_MD_AM_CENSORRPLCDSC', 'textbox', 'text', 2),
(43, 0, 3, 'meta_robots', '_MD_AM_METAROBOTS', 'index,nofollow', '_MD_AM_METAROBOTSDSC', 'select', 'text', 2),
(44, 0, 5, 'enable_search', '_MD_AM_DOSEARCH', '1', '_MD_AM_DOSEARCHDSC', 'yesno', 'int', 0),
(45, 0, 5, 'keyword_min', '_MD_AM_MINSEARCH', '5', '_MD_AM_MINSEARCHDSC', 'textbox', 'int', 1),
(46, 0, 2, 'avatar_minposts', '_MD_AM_AVATARMP', '0', '_MD_AM_AVATARMPDSC', 'textbox', 'int', 15),
(47, 0, 1, 'enable_badips', '_MD_AM_DOBADIPS', '0', '_MD_AM_DOBADIPSDSC', 'yesno', 'int', 40),
(48, 0, 3, 'meta_rating', '_MD_AM_METARATING', 'general', '_MD_AM_METARATINGDSC', 'select', 'text', 4),
(49, 0, 3, 'meta_author', '_MD_AM_METAAUTHOR', 'Webmaster', '_MD_AM_METAAUTHORDSC', 'textbox', 'text', 6),
(50, 0, 3, 'meta_copyright', '_MD_AM_METACOPYR', 'Copyright © 2001-2003', '_MD_AM_METACOPYRDSC', 'textbox', 'text', 8),
(51, 0, 3, 'meta_description', '_MD_AM_METADESC', 'Informação, conteúdo e disponibilidade.\r\nPrefeitura Municipal de Frederico Westphalen - RS', '_MD_AM_METADESCDSC', 'textarea', 'text', 1),
(52, 0, 2, 'allow_chgmail', '_MD_AM_ALLWCHGMAIL', '0', '_MD_AM_ALLWCHGMAILDSC', 'yesno', 'int', 3),
(53, 0, 1, 'use_mysession', '_MD_AM_USEMYSESS', '0', '_MD_AM_USEMYSESSDSC', 'yesno', 'int', 19),
(54, 0, 2, 'reg_dispdsclmr', '_MD_AM_DSPDSCLMR', '1', '_MD_AM_DSPDSCLMRDSC', 'yesno', 'int', 30),
(55, 0, 2, 'reg_disclaimer', '_MD_AM_REGDSCLMR', 'Apesar dos administradores e moderadores deste site tentarem remover ou editar todo o conteúdo questionável o mais depressa possível, será impossível rever todas as mensagens antes de serem publicadas.\r\n\r\nDesta forma, tome conhecimento de que todas as mensagens publicadas neste site são de responsabilidade de seus respectivos autores. Não sendo os administradores e moderadores responsáveis pelo seu conteúdo.\r\n\r\nVocê compromete-se a não publicar conteúdo abusivo, obsceno, vulgar, difamatório, ameaçador, sexual, ódio ou qualquer conteúdo que viole as leis vigentes. Se o fizer, corre o risco de ser permanentenmente banido do site (com uma notificação feita ao seu fornecedor de acesso à Internet).\r\n\r\nO número IP de todas as mensagens publicadas é guardado para ajudar a implementar estas normas. Criar várias contas para um único associado é proibido.\r\n\r\nVocê concorda que o administrador ou moderador tem o direito de remover, editar, mover ou fechar qualquer tópico que ele ache próprio. Como associado, concorda que qualquer informação introduzida no site será guadada em um banco de dados. Apesar dessa informação não ser distribuída a terceiros sem o seu consentimento, os administradores não podem ser responsabilizados por qualquer ataque informático que comprometa esses dados.\r\n\r\nEste site usa cookies para guardar informação em seu computador, os cookies não contêm nenhuma informação introduzida por si, são usados apenas para melhorar a qualidade de sua estadia no site.\r\n\r\nO seu endereço de e-mail é apenas usado para confirmar a sua senha (e no caso de se esquecer dela).\r\n\r\nAo clicar em registrar, você estará concordando com este termo de responsabilidade.', '_MD_AM_REGDSCLMRDSC', 'textarea', 'text', 32),
(56, 0, 2, 'allow_register', '_MD_AM_ALLOWREG', '0', '_MD_AM_ALLOWREGDSC', 'yesno', 'int', 0),
(57, 0, 1, 'theme_fromfile', '_MD_AM_THEMEFILE', '1', '_MD_AM_THEMEFILEDSC', 'yesno', 'int', 13),
(58, 0, 1, 'closesite', '_MD_AM_CLOSESITE', '0', '_MD_AM_CLOSESITEDSC', 'yesno', 'int', 26),
(59, 0, 1, 'closesite_okgrp', '_MD_AM_CLOSESITEOK', 'a:1:{i:0;s:1:"1";}', '_MD_AM_CLOSESITEOKDSC', 'group_multi', 'array', 27),
(60, 0, 1, 'closesite_text', '_MD_AM_CLOSESITETXT', 'O site está fechado para manutenção. Por gentileza, volte mais tarde.', '_MD_AM_CLOSESITETXTDSC', 'textarea', 'text', 28),
(61, 0, 1, 'sslpost_name', '_MD_AM_SSLPOST', 'xoops_ssl', '_MD_AM_SSLPOSTDSC', 'textbox', 'text', 31),
(62, 0, 1, 'module_cache', '_MD_AM_MODCACHE', 'a:2:{i:7;s:1:"0";i:9;s:1:"0";}', '_MD_AM_MODCACHEDSC', 'module_cache', 'array', 50),
(63, 0, 1, 'template_set', '_MD_AM_DTPLSET', 'default', '_MD_AM_DTPLSETDSC', 'tplset', 'other', 14),
(64, 0, 6, 'mailmethod', '_MD_AM_MAILERMETHOD', 'mail', '_MD_AM_MAILERMETHODDESC', 'select', 'text', 4),
(65, 0, 6, 'smtphost', '_MD_AM_SMTPHOST', 'a:1:{i:0;s:0:"";}', '_MD_AM_SMTPHOSTDESC', 'textarea', 'array', 6),
(66, 0, 6, 'smtpuser', '_MD_AM_SMTPUSER', '', '_MD_AM_SMTPUSERDESC', 'textbox', 'text', 7),
(67, 0, 6, 'smtppass', '_MD_AM_SMTPPASS', '', '_MD_AM_SMTPPASSDESC', 'password', 'text', 8),
(68, 0, 6, 'sendmailpath', '_MD_AM_SENDMAILPATH', '/usr/sbin/sendmail', '_MD_AM_SENDMAILPATHDESC', 'textbox', 'text', 5),
(69, 0, 6, 'from', '_MD_AM_MAILFROM', '', '_MD_AM_MAILFROMDESC', 'textbox', 'text', 1),
(70, 0, 6, 'fromname', '_MD_AM_MAILFROMNAME', '', '_MD_AM_MAILFROMNAMEDESC', 'textbox', 'text', 2),
(71, 0, 1, 'sslloginlink', '_MD_AM_SSLLINK', 'https://', '_MD_AM_SSLLINKDSC', 'textbox', 'text', 33),
(72, 0, 1, 'theme_set_allowed', '_MD_AM_THEMEOK', 'a:1:{i:0;s:11:"orange_peco";}', '_MD_AM_THEMEOKDSC', 'theme_multi', 'array', 13),
(73, 0, 6, 'fromuid', '_MD_AM_MAILFROMUID', '1', '_MD_AM_MAILFROMUIDDESC', 'user', 'int', 3),
(232, 10, 0, 'bip_contami', '_MI_PROTECTOR_BIP_CONTAMI', '1', '_MI_PROTECTOR_BIP_CONTAMIDSC', 'yesno', 'int', 2),
(231, 10, 0, 'die_contami', '_MI_PROTECTOR_DIE_CONTAMI', '1', '_MI_PROTECTOR_DIE_CONTAMIDSC', 'yesno', 'int', 1),
(230, 10, 0, 'die_badext', '_MI_PROTECTOR_DIE_BADEXT', '1', '_MI_PROTECTOR_DIE_BADEXTDSC', 'yesno', 'int', 0),
(229, 9, 0, 'notification_events', '_NOT_CONFIG_EVENTS', 'a:5:{i:0;s:19:"global-new_category";i:1;s:19:"global-story_submit";i:2;s:16:"global-new_story";i:3;s:20:"story-comment_submit";i:4;s:14:"story-bookmark";}', '_NOT_CONFIG_EVENTSDSC', 'select_multi', 'array', 14),
(227, 9, 0, 'com_anonpost', '_CM_COMANONPOST', '0', '', 'yesno', 'int', 12),
(228, 9, 0, 'notification_enabled', '_NOT_CONFIG_ENABLE', '3', '_NOT_CONFIG_ENABLEDSC', 'select', 'int', 13),
(226, 9, 0, 'com_rule', '_CM_COMRULES', '1', '', 'select', 'int', 11),
(225, 9, 0, 'restrictindex', '_MI_RESTRICTINDEX', '0', '_MI_RESTRICTINDEXDSC', 'yesno', 'int', 10),
(224, 9, 0, 'maxuploadsize', '_MI_UPLOADFILESIZE', '1048576', '_MI_UPLOADFILESIZE_DESC', 'texbox', 'int', 9),
(234, 10, 0, 'die_isocom', '_MI_PROTECTOR_DIE_ISOCOM', '1', '_MI_PROTECTOR_DIE_ISOCOMDSC', 'yesno', 'int', 4),
(235, 10, 0, 'bip_isocom', '_MI_PROTECTOR_BIP_ISOCOM', '1', '_MI_PROTECTOR_BIP_ISOCOMDSC', 'yesno', 'int', 5),
(236, 10, 0, 'san_union', '_MI_PROTECTOR_SAN_UNION', '1', '_MI_PROTECTOR_SAN_UNIONDSC', 'yesno', 'int', 6),
(237, 10, 0, 'die_union', '_MI_PROTECTOR_DIE_UNION', '1', '_MI_PROTECTOR_DIE_UNIONDSC', 'yesno', 'int', 7),
(238, 10, 0, 'bip_union', '_MI_PROTECTOR_BIP_UNION', '1', '_MI_PROTECTOR_BIP_UNIONDSC', 'yesno', 'int', 8),
(239, 10, 0, 'id_forceintval', '_MI_PROTECTOR_ID_INTVAL', '1', '_MI_PROTECTOR_ID_INTVALDSC', 'yesno', 'int', 9),
(240, 10, 0, 'dos_warncount', '_MI_PROTECTOR_DOS_WARNCOUNT', '5', '_MI_PROTECTOR_DOS_WARNCOUNTDSC', 'text', 'int', 10),
(241, 10, 0, 'dos_bancount', '_MI_PROTECTOR_DOS_BANCOUNT', '50', '_MI_PROTECTOR_DOS_BANCOUNTDSC', 'text', 'int', 11),
(242, 10, 0, 'bip_except', '_MI_PROTECTOR_BIP_EXCEPT', 'a:1:{i:0;s:1:"1";}', '_MI_PROTECTOR_BIP_EXCEPTDSC', 'group_multi', 'array', 12),
(223, 9, 0, 'uploadgroups', '_MI_UPLOADGROUPS', '3', '_MI_UPLOADGROUPS_DESC', 'select', 'int', 8),
(222, 9, 0, 'storycountadmin', '_MI_STORYCOUNTADMIN', '35', '_MI_STORYCOUNTADMIN_DESC', 'select', 'int', 7),
(221, 9, 0, 'columnmode', '_MI_COLUMNMODE', '1', '_MI_COLUMNMODE_DESC', 'select', 'int', 6),
(220, 9, 0, 'displayname', '_MI_NAMEDISPLAY', '3', '_MI_ADISPLAYNAMEDSC', 'select', 'int', 5),
(219, 9, 0, 'newsdisplay', '_MI_NEWSDISPLAY', 'Bytopic', '_MI_NEWSDISPLAYDESC', 'select', 'text', 4),
(218, 9, 0, 'autoapprove', '_MI_AUTOAPPROVE', '1', '_MI_AUTOAPPROVEDSC', 'yesno', 'int', 3),
(217, 9, 0, 'anonpost', '_MI_ANONPOST', '0', '', 'yesno', 'int', 2),
(216, 9, 0, 'displaynav', '_MI_DISPLAYNAV', '1', '_MI_DISPLAYNAVDSC', 'yesno', 'int', 1),
(215, 9, 0, 'storyhome', '_MI_STORYHOME', '5', '_MI_STORYHOMEDSC', 'select', 'int', 0),
(213, 7, 0, 'com_rule', '_CM_COMRULES', '1', '', 'select', 'int', 0),
(214, 7, 0, 'com_anonpost', '_CM_COMANONPOST', '0', '', 'yesno', 'int', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_configcategory`
--

CREATE TABLE IF NOT EXISTS `xoops_configcategory` (
  `confcat_id` smallint(5) unsigned NOT NULL auto_increment,
  `confcat_name` varchar(25) NOT NULL default '',
  `confcat_order` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`confcat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `xoops_configcategory`
--

INSERT INTO `xoops_configcategory` (`confcat_id`, `confcat_name`, `confcat_order`) VALUES
(1, '_MD_AM_GENERAL', 0),
(2, '_MD_AM_USERSETTINGS', 0),
(3, '_MD_AM_METAFOOTER', 0),
(4, '_MD_AM_CENSOR', 0),
(5, '_MD_AM_SEARCH', 0),
(6, '_MD_AM_MAILER', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_configoption`
--

CREATE TABLE IF NOT EXISTS `xoops_configoption` (
  `confop_id` mediumint(8) unsigned NOT NULL auto_increment,
  `confop_name` varchar(255) NOT NULL default '',
  `confop_value` varchar(255) NOT NULL default '',
  `conf_id` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`confop_id`),
  KEY `conf_id` (`conf_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=263 ;

--
-- Extraindo dados da tabela `xoops_configoption`
--

INSERT INTO `xoops_configoption` (`confop_id`, `confop_name`, `confop_value`, `conf_id`) VALUES
(1, '_MD_AM_DEBUGMODE1', '1', 13),
(2, '_MD_AM_DEBUGMODE2', '2', 13),
(3, '_NESTED', 'nest', 32),
(4, '_FLAT', 'flat', 32),
(5, '_THREADED', 'thread', 32),
(6, '_OLDESTFIRST', '0', 33),
(7, '_NEWESTFIRST', '1', 33),
(8, '_MD_AM_USERACTV', '0', 21),
(9, '_MD_AM_AUTOACTV', '1', 21),
(10, '_MD_AM_ADMINACTV', '2', 21),
(11, '_MD_AM_STRICT', '0', 23),
(12, '_MD_AM_MEDIUM', '1', 23),
(13, '_MD_AM_LIGHT', '2', 23),
(14, '_MD_AM_DEBUGMODE3', '3', 13),
(15, '_MD_AM_INDEXFOLLOW', 'index,follow', 43),
(16, '_MD_AM_NOINDEXFOLLOW', 'noindex,follow', 43),
(17, '_MD_AM_INDEXNOFOLLOW', 'index,nofollow', 43),
(18, '_MD_AM_NOINDEXNOFOLLOW', 'noindex,nofollow', 43),
(19, '_MD_AM_METAOGEN', 'general', 48),
(20, '_MD_AM_METAO14YRS', '14 years', 48),
(21, '_MD_AM_METAOREST', 'restricted', 48),
(22, '_MD_AM_METAOMAT', 'mature', 48),
(23, '_MD_AM_DEBUGMODE0', '0', 13),
(24, 'PHP mail()', 'mail', 64),
(25, 'sendmail', 'sendmail', 64),
(26, 'SMTP', 'smtp', 64),
(27, 'SMTPAuth', 'smtpauth', 64),
(235, '2', '2', 221),
(236, '3', '3', 221),
(237, '4', '4', 221),
(238, '5', '5', 221),
(239, '5', '5', 222),
(240, '10', '10', 222),
(241, '15', '15', 222),
(242, '20', '20', 222),
(243, '25', '25', 222),
(244, '30', '30', 222),
(245, '35', '35', 222),
(246, '40', '40', 222),
(247, '_MI_UPLOAD_GROUP1', '1', 223),
(248, '_MI_UPLOAD_GROUP2', '2', 223),
(249, '_MI_UPLOAD_GROUP3', '3', 223),
(250, '_CM_COMNOCOM', '0', 226),
(251, '_CM_COMAPPROVEALL', '1', 226),
(252, '_CM_COMAPPROVEUSER', '2', 226),
(253, '_CM_COMAPPROVEADMIN', '3', 226),
(254, '_NOT_CONFIG_DISABLE', '0', 228),
(255, '_NOT_CONFIG_ENABLEBLOCK', '1', 228),
(256, '_NOT_CONFIG_ENABLEINLINE', '2', 228),
(257, '_NOT_CONFIG_ENABLEBOTH', '3', 228),
(258, 'Geral : Novo tópico', 'global-new_category', 229),
(259, 'Geral : Nova notícia enviada', 'global-story_submit', 229),
(260, 'Geral : Última notícia', 'global-new_story', 229),
(261, 'Notícia : Comentário incluído', 'story-comment_submit', 229),
(262, 'Notícia : Marcador de páginas', 'story-bookmark', 229),
(234, '1', '1', 221),
(233, '_MI_DISPLAYNAME3', '3', 220),
(232, '_MI_DISPLAYNAME2', '2', 220),
(231, '_MI_DISPLAYNAME1', '1', 220),
(230, '_MI_NEWSBYTOPIC', 'Bytopic', 219),
(229, '_MI_NEWSCLASSIC', 'Classic', 219),
(228, '30', '30', 215),
(227, '25', '25', 215),
(226, '20', '20', 215),
(225, '15', '15', 215),
(224, '10', '10', 215),
(223, '5', '5', 215),
(219, '_CM_COMNOCOM', '0', 213),
(220, '_CM_COMAPPROVEALL', '1', 213),
(221, '_CM_COMAPPROVEUSER', '2', 213),
(222, '_CM_COMAPPROVEADMIN', '3', 213);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_groups`
--

CREATE TABLE IF NOT EXISTS `xoops_groups` (
  `groupid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `description` text NOT NULL,
  `group_type` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`groupid`),
  KEY `group_type` (`group_type`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `xoops_groups`
--

INSERT INTO `xoops_groups` (`groupid`, `name`, `description`, `group_type`) VALUES
(1, 'Administrador', 'Administrador deste site', 'Admin'),
(2, 'Associados', 'Grupo de visitantes registrados', 'User'),
(3, 'Anônimos', 'Grupo de visitantes anônimos', 'Anonymous');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_groups_users_link`
--

CREATE TABLE IF NOT EXISTS `xoops_groups_users_link` (
  `linkid` mediumint(8) unsigned NOT NULL auto_increment,
  `groupid` smallint(5) unsigned NOT NULL default '0',
  `uid` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`linkid`),
  KEY `groupid_uid` (`groupid`,`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `xoops_groups_users_link`
--

INSERT INTO `xoops_groups_users_link` (`linkid`, `groupid`, `uid`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_group_permission`
--

CREATE TABLE IF NOT EXISTS `xoops_group_permission` (
  `gperm_id` int(10) unsigned NOT NULL auto_increment,
  `gperm_groupid` smallint(5) unsigned NOT NULL default '0',
  `gperm_itemid` mediumint(8) unsigned NOT NULL default '0',
  `gperm_modid` mediumint(5) unsigned NOT NULL default '0',
  `gperm_name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`gperm_id`),
  KEY `groupid` (`gperm_groupid`),
  KEY `itemid` (`gperm_itemid`),
  KEY `gperm_modid` (`gperm_modid`,`gperm_name`(10))
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=774 ;

--
-- Extraindo dados da tabela `xoops_group_permission`
--

INSERT INTO `xoops_group_permission` (`gperm_id`, `gperm_groupid`, `gperm_itemid`, `gperm_modid`, `gperm_name`) VALUES
(700, 1, 58, 1, 'block_read'),
(699, 1, 62, 1, 'block_read'),
(654, 2, 57, 1, 'block_read'),
(698, 1, 54, 1, 'block_read'),
(697, 1, 53, 1, 'block_read'),
(696, 1, 52, 1, 'block_read'),
(695, 1, 49, 1, 'block_read'),
(694, 1, 61, 1, 'block_read'),
(693, 1, 46, 1, 'block_read'),
(692, 1, 48, 1, 'block_read'),
(691, 1, 7, 1, 'block_read'),
(690, 1, 5, 1, 'block_read'),
(689, 1, 3, 1, 'block_read'),
(688, 1, 2, 1, 'block_read'),
(687, 1, 14, 1, 'block_read'),
(686, 1, 63, 1, 'block_read'),
(685, 1, 55, 1, 'block_read'),
(684, 1, 51, 1, 'block_read'),
(683, 1, 12, 1, 'block_read'),
(653, 2, 45, 1, 'block_read'),
(682, 1, 11, 1, 'block_read'),
(652, 2, 44, 1, 'block_read'),
(651, 2, 43, 1, 'block_read'),
(681, 1, 10, 1, 'block_read'),
(650, 2, 16, 1, 'block_read'),
(680, 1, 9, 1, 'block_read'),
(679, 1, 8, 1, 'block_read'),
(649, 2, 42, 1, 'block_read'),
(678, 1, 6, 1, 'block_read'),
(677, 1, 4, 1, 'block_read'),
(648, 2, 15, 1, 'block_read'),
(676, 1, 1, 1, 'block_read'),
(647, 2, 39, 1, 'block_read'),
(770, 3, 45, 1, 'block_read'),
(675, 1, 1, 1, 'module_read'),
(646, 2, 56, 1, 'block_read'),
(674, 1, 9, 1, 'module_read'),
(673, 1, 7, 1, 'module_read'),
(645, 2, 58, 1, 'block_read'),
(644, 2, 62, 1, 'block_read'),
(643, 2, 54, 1, 'block_read'),
(672, 1, 1, 1, 'module_admin'),
(642, 2, 53, 1, 'block_read'),
(671, 1, 10, 1, 'module_admin'),
(641, 2, 52, 1, 'block_read'),
(670, 1, 9, 1, 'module_admin'),
(640, 2, 49, 1, 'block_read'),
(769, 3, 44, 1, 'block_read'),
(768, 3, 43, 1, 'block_read'),
(767, 3, 16, 1, 'block_read'),
(766, 3, 42, 1, 'block_read'),
(639, 2, 61, 1, 'block_read'),
(669, 1, 7, 1, 'module_admin'),
(638, 2, 46, 1, 'block_read'),
(637, 2, 48, 1, 'block_read'),
(668, 1, 2, 1, 'system_admin'),
(636, 2, 7, 1, 'block_read'),
(765, 3, 15, 1, 'block_read'),
(764, 3, 39, 1, 'block_read'),
(635, 2, 5, 1, 'block_read'),
(667, 1, 11, 1, 'system_admin'),
(762, 3, 56, 1, 'block_read'),
(666, 1, 15, 1, 'system_admin'),
(634, 2, 3, 1, 'block_read'),
(665, 1, 12, 1, 'system_admin'),
(633, 2, 2, 1, 'block_read'),
(664, 1, 3, 1, 'system_admin'),
(632, 2, 14, 1, 'block_read'),
(663, 1, 4, 1, 'system_admin'),
(631, 2, 63, 1, 'block_read'),
(761, 3, 58, 1, 'block_read'),
(760, 3, 62, 1, 'block_read'),
(759, 3, 54, 1, 'block_read'),
(758, 3, 53, 1, 'block_read'),
(757, 3, 52, 1, 'block_read'),
(630, 2, 55, 1, 'block_read'),
(771, 3, 57, 1, 'block_read'),
(662, 1, 8, 1, 'system_admin'),
(629, 2, 51, 1, 'block_read'),
(628, 2, 12, 1, 'block_read'),
(661, 1, 9, 1, 'system_admin'),
(627, 2, 11, 1, 'block_read'),
(626, 2, 10, 1, 'block_read'),
(756, 3, 49, 1, 'block_read'),
(755, 3, 61, 1, 'block_read'),
(754, 3, 46, 1, 'block_read'),
(753, 3, 48, 1, 'block_read'),
(660, 1, 1, 1, 'system_admin'),
(625, 2, 9, 1, 'block_read'),
(659, 1, 7, 1, 'system_admin'),
(658, 1, 14, 1, 'system_admin'),
(657, 1, 5, 1, 'system_admin'),
(656, 1, 13, 1, 'system_admin'),
(655, 1, 10, 1, 'system_admin'),
(624, 2, 8, 1, 'block_read'),
(623, 2, 6, 1, 'block_read'),
(622, 2, 4, 1, 'block_read'),
(621, 2, 1, 1, 'block_read'),
(620, 2, 1, 1, 'module_read'),
(619, 2, 9, 1, 'module_read'),
(618, 2, 7, 1, 'module_read'),
(308, 1, 1, 9, 'news_approve'),
(309, 1, 1, 9, 'news_submit'),
(310, 1, 1, 9, 'news_view'),
(311, 2, 1, 9, 'news_view'),
(312, 3, 1, 9, 'news_view'),
(752, 3, 7, 1, 'block_read'),
(751, 3, 3, 1, 'block_read'),
(750, 3, 14, 1, 'block_read'),
(749, 3, 63, 1, 'block_read'),
(748, 3, 51, 1, 'block_read'),
(747, 3, 8, 1, 'block_read'),
(746, 3, 6, 1, 'block_read'),
(745, 3, 1, 1, 'module_read'),
(744, 3, 9, 1, 'module_read'),
(701, 1, 56, 1, 'block_read'),
(702, 1, 39, 1, 'block_read'),
(703, 1, 15, 1, 'block_read'),
(704, 1, 42, 1, 'block_read'),
(705, 1, 16, 1, 'block_read'),
(706, 1, 43, 1, 'block_read'),
(707, 1, 44, 1, 'block_read'),
(708, 1, 45, 1, 'block_read'),
(709, 1, 57, 1, 'block_read'),
(743, 3, 7, 1, 'module_read'),
(772, 1, 65, 1, 'block_read'),
(773, 2, 65, 1, 'block_read');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_image`
--

CREATE TABLE IF NOT EXISTS `xoops_image` (
  `image_id` mediumint(8) unsigned NOT NULL auto_increment,
  `image_name` varchar(30) NOT NULL default '',
  `image_nicename` varchar(255) NOT NULL default '',
  `image_mimetype` varchar(30) NOT NULL default '',
  `image_created` int(10) unsigned NOT NULL default '0',
  `image_display` tinyint(1) unsigned NOT NULL default '0',
  `image_weight` smallint(5) unsigned NOT NULL default '0',
  `imgcat_id` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`image_id`),
  KEY `imgcat_id` (`imgcat_id`),
  KEY `image_display` (`image_display`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `xoops_image`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_imagebody`
--

CREATE TABLE IF NOT EXISTS `xoops_imagebody` (
  `image_id` mediumint(8) unsigned NOT NULL default '0',
  `image_body` mediumblob,
  KEY `image_id` (`image_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `xoops_imagebody`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_imagecategory`
--

CREATE TABLE IF NOT EXISTS `xoops_imagecategory` (
  `imgcat_id` smallint(5) unsigned NOT NULL auto_increment,
  `imgcat_name` varchar(100) NOT NULL default '',
  `imgcat_maxsize` int(8) unsigned NOT NULL default '0',
  `imgcat_maxwidth` smallint(3) unsigned NOT NULL default '0',
  `imgcat_maxheight` smallint(3) unsigned NOT NULL default '0',
  `imgcat_display` tinyint(1) unsigned NOT NULL default '0',
  `imgcat_weight` smallint(3) unsigned NOT NULL default '0',
  `imgcat_type` char(1) NOT NULL default '',
  `imgcat_storetype` varchar(5) NOT NULL default '',
  PRIMARY KEY  (`imgcat_id`),
  KEY `imgcat_display` (`imgcat_display`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `xoops_imagecategory`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_imgset`
--

CREATE TABLE IF NOT EXISTS `xoops_imgset` (
  `imgset_id` smallint(5) unsigned NOT NULL auto_increment,
  `imgset_name` varchar(50) NOT NULL default '',
  `imgset_refid` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`imgset_id`),
  KEY `imgset_refid` (`imgset_refid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `xoops_imgset`
--

INSERT INTO `xoops_imgset` (`imgset_id`, `imgset_name`, `imgset_refid`) VALUES
(1, 'default', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_imgsetimg`
--

CREATE TABLE IF NOT EXISTS `xoops_imgsetimg` (
  `imgsetimg_id` mediumint(8) unsigned NOT NULL auto_increment,
  `imgsetimg_file` varchar(50) NOT NULL default '',
  `imgsetimg_body` blob NOT NULL,
  `imgsetimg_imgset` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`imgsetimg_id`),
  KEY `imgsetimg_imgset` (`imgsetimg_imgset`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `xoops_imgsetimg`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_imgset_tplset_link`
--

CREATE TABLE IF NOT EXISTS `xoops_imgset_tplset_link` (
  `imgset_id` smallint(5) unsigned NOT NULL default '0',
  `tplset_name` varchar(50) NOT NULL default '',
  KEY `tplset_name` (`tplset_name`(10))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `xoops_imgset_tplset_link`
--

INSERT INTO `xoops_imgset_tplset_link` (`imgset_id`, `tplset_name`) VALUES
(1, 'default');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_modules`
--

CREATE TABLE IF NOT EXISTS `xoops_modules` (
  `mid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(150) NOT NULL default '',
  `version` smallint(5) unsigned NOT NULL default '100',
  `last_update` int(10) unsigned NOT NULL default '0',
  `weight` smallint(3) unsigned NOT NULL default '0',
  `isactive` tinyint(1) unsigned NOT NULL default '0',
  `dirname` varchar(25) NOT NULL default '',
  `hasmain` tinyint(1) unsigned NOT NULL default '0',
  `hasadmin` tinyint(1) unsigned NOT NULL default '0',
  `hassearch` tinyint(1) unsigned NOT NULL default '0',
  `hasconfig` tinyint(1) unsigned NOT NULL default '0',
  `hascomments` tinyint(1) unsigned NOT NULL default '0',
  `hasnotification` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`mid`),
  KEY `hasmain` (`hasmain`),
  KEY `hasadmin` (`hasadmin`),
  KEY `hassearch` (`hassearch`),
  KEY `hasnotification` (`hasnotification`),
  KEY `dirname` (`dirname`),
  KEY `name` (`name`(15))
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `xoops_modules`
--

INSERT INTO `xoops_modules` (`mid`, `name`, `version`, `last_update`, `weight`, `isactive`, `dirname`, `hasmain`, `hasadmin`, `hassearch`, `hasconfig`, `hascomments`, `hasnotification`) VALUES
(1, 'Sistema', 100, 1099576705, 0, 1, 'system', 0, 1, 0, 0, 0, 0),
(10, 'Xoops Protector', 211, 1102329437, 1, 1, 'protector', 0, 1, 0, 1, 0, 0),
(7, 'Enquetes', 100, 1176229524, 1, 0, 'xoopspoll', 1, 1, 0, 1, 1, 0),
(9, 'Notícias', 121, 1101463656, 1, 1, 'news', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_newblocks`
--

CREATE TABLE IF NOT EXISTS `xoops_newblocks` (
  `bid` mediumint(8) unsigned NOT NULL auto_increment,
  `mid` smallint(5) unsigned NOT NULL default '0',
  `func_num` tinyint(3) unsigned NOT NULL default '0',
  `options` varchar(255) NOT NULL default '',
  `name` varchar(150) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `content` text NOT NULL,
  `side` tinyint(1) unsigned NOT NULL default '0',
  `weight` smallint(5) unsigned NOT NULL default '0',
  `visible` tinyint(1) unsigned NOT NULL default '0',
  `block_type` char(1) NOT NULL default '',
  `c_type` char(1) NOT NULL default '',
  `isactive` tinyint(1) unsigned NOT NULL default '0',
  `dirname` varchar(50) NOT NULL default '',
  `func_file` varchar(50) NOT NULL default '',
  `show_func` varchar(50) NOT NULL default '',
  `edit_func` varchar(50) NOT NULL default '',
  `template` varchar(50) NOT NULL default '',
  `bcachetime` int(10) unsigned NOT NULL default '0',
  `last_modified` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`bid`),
  KEY `mid` (`mid`),
  KEY `visible` (`visible`),
  KEY `isactive_visible_mid` (`isactive`,`visible`,`mid`),
  KEY `mid_funcnum` (`mid`,`func_num`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Extraindo dados da tabela `xoops_newblocks`
--

INSERT INTO `xoops_newblocks` (`bid`, `mid`, `func_num`, `options`, `name`, `title`, `content`, `side`, `weight`, `visible`, `block_type`, `c_type`, `isactive`, `dirname`, `func_file`, `show_func`, `edit_func`, `template`, `bcachetime`, `last_modified`) VALUES
(1, 1, 1, '', 'Menu pessoal', 'Menu pessoal', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_user_show', '', 'system_block_user.html', 0, 1100268605),
(2, 1, 2, '', 'Entrar', 'Entrar', '', 0, 3, 1, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_login_show', '', 'system_block_login.html', 0, 1101998565),
(3, 1, 3, '', 'Pesquisa', 'Pesquisar no Site', '', 1, 1, 1, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_search_show', '', 'system_block_search.html', 0, 1176234357),
(4, 1, 4, '', 'Conteúdo pendente', 'Conteúdo pendente', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_waiting_show', '', 'system_block_waiting.html', 0, 1099576705),
(5, 1, 5, '', 'Menu principal', 'Menu principal', '', 0, 5, 1, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_main_show', '', 'system_block_mainmenu.html', 0, 1101998565),
(6, 1, 6, '40|30|logonovo.jpg|0', 'Sobre o site:', 'Adm. 2009-2012', '', 1, 0, 1, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_info_show', 'b_system_info_edit', 'system_block_siteinfo.html', 0, 1234976287),
(7, 1, 7, '', 'Quem nos visita', 'Quem nos visita', '', 1, 3, 1, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_online_show', '', 'system_block_online.html', 0, 1176468433),
(8, 1, 8, '10|1', 'Os mais participativos:', 'Os mais participativos:', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_topposters_show', 'b_system_topposters_edit', 'system_block_topusers.html', 0, 1099576705),
(9, 1, 9, '10|1', 'Novos associados', 'Novos associados', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_newmembers_show', 'b_system_newmembers_edit', 'system_block_newusers.html', 0, 1099576705),
(10, 1, 10, '10', 'Últimos comentários', 'Últimos comentários', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_comments_show', 'b_system_comments_edit', 'system_block_comments.html', 0, 1099576705),
(11, 1, 11, '', 'Notificações', 'Notificações', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_notification_show', '', 'system_block_notification.html', 0, 1099576705),
(12, 1, 12, '1|80', 'Temas', 'Temas', '', 0, 0, 0, 'S', 'H', 1, 'system', 'system_blocks.php', 'b_system_themes_show', 'b_system_themes_edit', 'system_block_themes.html', 0, 1101475789),
(14, 0, 0, '', 'Bloco personalizado (HTML)', 'Prefeitura Municipal', '<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=24">Contas Públicas</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=35">Cons. Mun. de Saúde</a><br>\r\n\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a \r\nhref="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=4">Dados Sociais</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=5"> Fotos da Cidade</a><br>\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=3">Histórico</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=26">Leilão</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.camarafw.rs.gov.br/portal/leismunicipais.php">Leis Municipais</a><br>\r\n\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a\r\nhref="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=25">Licitações/Pregão</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.camarafw.rs.gov.br/portal/leiorganica.php">Lei Orgânica </a><br>\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/planodiretor/plano_diretor.pdf">Plano Diretor</a><br>\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=19">Sec. da Educação</a><br>\r\n\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=11">Sec. Esportes</a><br>\r\n\r\n\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=15"> Sec. da Fazenda</a><br>\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=17">Sec. de Obras</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=12">Sec. de Saúde</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=34">Sec. do Turismo</a><br>\r\n\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a \r\nhref="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=36">Setor Meio Ambiente</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=8">Sites Úteis</a><br>\r\n\r\n\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=7">Tel. Úteis</a><br>\r\n\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=30">Fiscalização/Setor &nbsp;&nbsp;&nbsp;&nbsp;Tributario</a><br>', 0, 1, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1217449632),
(63, 10, 1, '', 'Protector', 'Protector', '', 0, 0, 1, 'M', 'H', 1, 'protector', 'protector_block.php', 'b_protector_show', '', '', 0, 1102335606),
(15, 0, 0, '', 'Bloco personalizado (HTML)', 'Bancos', '<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.bb.com.br">  Banco do Brasil</a><br>\r\n\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.banrisul.com.br"> Banrisul</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.bradesco.com.br"> Bradesco</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.caixa.gov.br">  Caixa</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.sicredi.com.br">  Sicredi</a><br>', 0, 12, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1176987952),
(16, 0, 0, '', 'Bloco personalizado (HTML)', 'Hotéis', '<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n\r\n<a href="http://www.pigattohotel.com.br"> Pigatto Hotéis</a><br>\r\n\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n\r\n<a href="http://www.cantellehotel.hpgvip.ig.com.br/website.htm"> Cantelle</a><br>\r\n<img \r\n\r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n\r\n<a href="http://www.hotelpalacefw.com.br"> Palace Hotel</a><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n\r\n<b>Hotel TIO ZÉ<br>\r\n55-3744-3478', 0, 9, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1188307177),
(64, 0, 0, '', 'Bloco personalizado (HTML)', 'Encontro de Bandas', '<center>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/encontroBandas.jpg"><br>\r\n</center>', 5, 1, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1157550732),
(39, 7, 1, '', 'Enquete', 'Mapas de Localização', '', 1, 0, 0, 'M', 'H', 0, 'xoopspoll', 'xoopspoll.php', 'b_xoopspoll_show', '', 'xoopspoll_block_poll.html', 0, 1176229524),
(42, 0, 0, '', 'Bloco personalizado (HTML)', 'Mapas de Localização', '<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/Estradas_regionais.jpg">Estradas Regionais <br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/localizacao.jpg">   Localização <br>\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/Rodovias_interestaduais.jpg">Rodovias', 0, 4, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1176483704),
(43, 0, 0, '', 'Bloco personalizado (HTML)', 'Rádios', '<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n\r\n<a href="http://www.comunitaria.com.br"> Comunitária</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.luzealegria.com.br"> Complexo Luz e &nbsp;&nbsp;&nbsp;&nbsp;Alegria AM / FM</a><br>', 0, 11, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1176485352),
(44, 0, 0, '', 'Bloco personalizado (HTML)', 'Instituições de Ensino', '<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10"> \r\n\r\n<a href=" http://www.cafw.ufsm.br/ "> Colegio Agrícola</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n\r\n\r\n<a href="http://www.auxiliadorafw.com.br"> Colegio Nossa Sra. &nbsp;&nbsp;&nbsp;&nbsp;Auxiliadora</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.fw.uri.br"> URI</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.cesnors.ufsm.br"> CESNORS</a><br>', 0, 8, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1177586983),
(45, 0, 0, '', 'Bloco personalizado (HTML)', 'Jornais', '<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n\r\n<a href="http://www.oaltouruguai.com.br">O Alto Uruguai</a><br>\r\n<img \r\n\r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n\r\n<a href="http://www.jornalfrederiquense.com.br"> Jornal <br>&nbsp;&nbsp;&nbsp; Frederiquense</a><br>', 0, 10, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1176815992),
(46, 0, 0, '', 'Bloco personalizado (HTML)', 'Tempo', '<!-- Inicio banner Somar Meteorologia -->\r\n<center><br>\r\n<iframe src="http://www.tempoagora.com.br/selos/custom/selo.php?cid=FredericoWestphalen-RS;" name="seloFredericoWestphalen-RS" width="120" height="125" frameborder="0" marginheight="0" marginwidth="0" scrolling="no"></iframe><br>\r\n</center><br>\r\n<!--Fim banner Somar Meteorologia -->', 1, 6, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1176232259),
(49, 0, 0, '', 'Bloco personalizado (HTML)', 'Informações da Cidade', '<p align="justify">\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=44">Confira algumas fotos do Carnaval 2009 - Park Folia II\r\n</a>\r\n\r\n<br>\r\n<br>\r\nProgramação para os 54 anos de Frederico Westphalen.\r\n<br>\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html//images/carnaval09.jpg" width="450" height="650">\r\n<br>\r\n<center>', 3, 1, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1235592880),
(51, 9, 1, '', 'Tópicos', 'Tópicos', '', 0, 0, 0, 'M', 'H', 1, 'news', 'news_topics.php', 'b_news_topics_show', '', 'news_block_topics.html', 0, 1101463657),
(48, 0, 0, '', 'Bloco personalizado (HTML)', 'Busca Online', '<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.aonde.com.br"> Aonde</a><br>\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.cade.com.br">  Cade</a><br>\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.radaruol.com.br">  Uol</a><br>\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n<a href="http://www.yahoo.com.br"> Yahoo</a><br>\r\n<br>\r\n<!-- Search Google -->\r\n<center>\r\n<FORM method=GET action="http://www.google.com/search"><center>\r\n<TABLE bgcolor="#FFFFFF"><tr><td><center>\r\n<A HREF="http://www.google.com/"><center>\r\n<IMG SRC="http://www.google.com/logos/Logo_25wht.gif" <br><center>\r\n<INPUT TYPE=text name=q size=20 maxlength=100 value=""><center><br>\r\n<INPUT TYPE=hidden name=hl value="en"><center>\r\n<INPUT type=submit name=btnG VALUE="Pesquisar"><center>\r\n</td></tr></TABLE>\r\n</FORM>\r\n</center>\r\n<!-- Search Google -->\r\n<br>\r\n<b>Bandeira do Município\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bandeira.jpg" width="150" height="100">', 1, 8, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1189521732),
(52, 9, 2, '', 'Notícia do dia', 'Notícia do dia', '', 4, 1, 0, 'M', 'H', 1, 'news', 'news_bigstory.php', 'b_news_bigstory_show', '', 'news_block_bigstory.html', 0, 1176813289),
(53, 9, 3, 'counter|8|20|1', 'Notícias mais lidas', 'Notícias mais lidas', '', 3, 3, 1, 'M', 'H', 1, 'news', 'news_top.php', 'b_news_top_show', 'b_news_top_edit', 'news_block_top.html', 0, 1220296494),
(54, 9, 4, 'published|7|20|0', 'Últimas notícias', 'Últimas notícias', '', 3, 4, 1, 'M', 'H', 1, 'news', 'news_top.php', 'b_news_top_show', 'b_news_top_edit', 'news_block_new.html', 0, 1220296532),
(55, 9, 5, '', 'Notícias pendentes', 'Notícias pendentes', '', 0, 0, 0, 'M', 'H', 1, 'news', 'news_moderate.php', 'b_news_topics_moderate', '', 'news_block_moderate.html', 0, 1176492550),
(56, 9, 6, '', 'Notícias', 'Notícias', '', 5, 0, 0, 'M', 'H', 1, 'news', 'news_topicsnav.php', 'b_news_topicsnav_show', 'b_news_topicsnav_edit', 'news_block_topicnav.html', 0, 1101824622),
(57, 0, 0, '', 'Bloco personalizado (HTML)', 'Câmara de Vereadores', '<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bola.gif" width="10" height="10">\r\n\r\n<a href="http://www.camarafw.rs.gov.br"> Câmara On-line </a><br>', 0, 6, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1176483960),
(58, 0, 0, '', 'Bloco personalizado (HTML)', 'Contatos', 'Prefeitura Municipal de Frederico Westphalen<br>\r\nRua José Cañellas, 258 - Centro<br> \r\nRio Grande do Sul - Brasil<br>\r\nCEP: 98400-000<br><br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/ico_telefone.gif" width="16" height="16"> Tel: (55) 3744 5050<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/ico_telefone.gif" width="16" height="16"> Fax: (55) 3744 3887<br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/email.gif" width="65" height="23" border="0">\r\n<a href="mailto:fredericowestphalen@fredericowestphalen.rs.gov.br">E-mail</a>\r\n<br><br>\r\n<center>\r\n<font color=red><b>Melhor visualização: 1024 x 768</font>\r\n<br><br>\r\n<center>', 3, 5, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1221704305),
(62, 0, 0, '', 'Bloco personalizado (HTML)', 'Notícias', '<p align="justify">\r\n- Uma visita a Vila Pedreira – Br. 386, abaixo do viaduto – marcou o primeiro dia de trabalho do novo prefeito de Frederico Westphalen, José Alberto Panosso, e de seu vice, Luís Carlos de Oliveira, o Luís da LC. A visita ocorreu na manhã desta sexta-feira, logo após o prefeito chegar a seu gabinete, cumprimentar os funcionários e dar posse aos novos secretários e assessores. Depois da visita a Vila Pedreira, o prefeito e seu vice, acompanhado de colaboradores, visitaram a Caixa Econômica Federal e a Cresol.\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/imprensa/visita_pedreira.pdf"><font color=red>Clique aqui e veja mais.\r\n</a></font>\r\n<br>\r\n<br>\r\n- Depois de visitar a Vila Pedreira no seu primeiro dia útil de governo, o novo prefeito de Frederico Westphalen, José Panosso, voltou a demontrar sua preocupação com a área social: no início desta semana, acompanhado do vice-prefeito Luís da LC e de secretários, ele esteve na 19ª Delegacia de Saúde entregando três ofícios ao delegado da saúde, Fernando Panosso.  Nos ofícios, o prefeito solicitava a ampliação PIM (Programa Infância Melhor), dos agentes da dengue e do PSF (Programa da Saúde da Família).\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/imprensa/social_preocupa.pdf"><font color=red>Clique aqui e veja mais.\r\n</font>\r\n\r\n\r\n\r\n<table border="1" width="40%">\r\n<tr>\r\n  <td> </td>\r\n</tr>\r\n</table>\r\n<br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/seta57.gif" width="16" height="16">\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/calendario.pdf">Calendário de Feriados Mun./2008<br><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/seta57.gif" width="16" height="16">\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/EVENTOS2008.pdf">Calendário de Eventos para 2008<br><br>\r\n\r\n\r\n\r\n<table border="1" width="40%">\r\n<tr>\r\n  <td> </td>\r\n</tr>\r\n</table>\r\n<br>\r\n\r\n\r\n\r\n\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/seta57.gif" width="16" height="16">\r\n\r\n<a \r\nhref="http://www.correios.com.br/servicos/cep/cep_default.cfm">Busca CEP</a><br>\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/seta57.gif" width="16" height="16">\r\n\r\n<a href="http://www.receita.fazenda.gov.br/PessoaJuridica/CNPJ/cnpjreva/Cnpjreva_Solicitacao.asp">Consulta CNPJ</a><br>\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/seta57.gif" width="16" height="16">\r\n\r\n<a href="http://www.receita.fazenda.gov.br/Aplicacoes/ATCTA/CPF/ConsultaPublica.asp"> Consulta CPF</a><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/seta57.gif" width="16" height="16">\r\n\r\n<a\r\n href="http://www.tre-rs.gov.br/consulta.html">Consulta Título de Eleitor</a><br>\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/seta57.gif" width="16" height="16">\r\n<a href="http://www.daer.rs.gov.br/daer_maparodoviario.htm"> Mapa Rodoviario</a><br>\r\n\r\n<font color=red><b> &nbsp;&nbsp;&nbsp;&nbsp;Consultas Detran</font><br>\r\n\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/seta57.gif" width="16" height="16">\r\n<a href="http://bogota.procergs.com.br/detran/detran-habilitacao-consulta.html">Consulta CNH</a><br>\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/seta57.gif" width="16" height="16">\r\n<a href="http://bogota.procergs.com.br/detran/detran-infracao-consulta.html">Consulta Infrações</a><br>\r\n<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/seta57.gif" width="16" height="16">\r\n<a href="http://webgen.procergs.com.br/cgi-bin/webgen2.cgi?TR=detran-veiculo-consulta">Consulta Veículos</a><br>', 4, 2, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1231348555),
(61, 0, 0, '', 'Bloco personalizado (HTML)', 'Órgãos Publicos', '<br>\r\n<p align="center"><a href="http://www.brasil.gov.br"><img src="http://www.fredericowestphalen.rs.gov.br/html/images/brasil.gif" width="116" height="33" border="0"></a>\r\n\r\n<p align="center"><a href="http://www.rs.gov.br"><img src="http://www.fredericowestphalen.rs.gov.br/html/images/rio_grande_do_sul.jpg" width="70" height="90" border="0" alt="Governo do Estado do Rio Grande do Sul"></a>\r\n\r\n<p align="center"><a href="http://www.tce.rs.gov.br"><img src="http://www.fredericowestphalen.rs.gov.br/html/images/tce.gif" width="90" height="40" border="0" alt="Tribunal de Contas do Estado do Rio Grande do Sul"></a>', 1, 2, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1176485772),
(65, 0, 0, '', 'Bloco personalizado (HTML)', 'Bandeira do Município', '<img \r\nsrc="http://www.fredericowestphalen.rs.gov.br/html/images/bandeira.jpg" width="250" height="230">', 4, 5, 1, 'C', 'H', 1, '', '', '', '', '', 0, 1189512414);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_online`
--

CREATE TABLE IF NOT EXISTS `xoops_online` (
  `online_uid` mediumint(8) unsigned NOT NULL default '0',
  `online_uname` varchar(25) NOT NULL default '',
  `online_updated` int(10) unsigned NOT NULL default '0',
  `online_module` smallint(5) unsigned NOT NULL default '0',
  `online_ip` varchar(15) NOT NULL default '',
  KEY `online_module` (`online_module`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `xoops_online`
--

INSERT INTO `xoops_online` (`online_uid`, `online_uname`, `online_updated`, `online_module`, `online_ip`) VALUES
(0, '', 1236019462, 0, '201.10.8.13'),
(0, '', 1236019619, 9, '187.4.13.58'),
(0, '', 1236019527, 9, '200.18.33.214');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_priv_msgs`
--

CREATE TABLE IF NOT EXISTS `xoops_priv_msgs` (
  `msg_id` mediumint(8) unsigned NOT NULL auto_increment,
  `msg_image` varchar(100) default NULL,
  `subject` varchar(255) NOT NULL default '',
  `from_userid` mediumint(8) unsigned NOT NULL default '0',
  `to_userid` mediumint(8) unsigned NOT NULL default '0',
  `msg_time` int(10) unsigned NOT NULL default '0',
  `msg_text` text NOT NULL,
  `read_msg` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`msg_id`),
  KEY `to_userid` (`to_userid`),
  KEY `touseridreadmsg` (`to_userid`,`read_msg`),
  KEY `msgidfromuserid` (`msg_id`,`from_userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `xoops_priv_msgs`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_protector_log`
--

CREATE TABLE IF NOT EXISTS `xoops_protector_log` (
  `lid` mediumint(8) unsigned NOT NULL auto_increment,
  `uid` mediumint(8) unsigned NOT NULL default '0',
  `ip` varchar(255) NOT NULL default '0.0.0.0',
  `type` varchar(255) NOT NULL default '',
  `agent` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `extra` text NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`lid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `xoops_protector_log`
--

INSERT INTO `xoops_protector_log` (`lid`, `uid`, `ip`, `type`, `agent`, `description`, `extra`, `timestamp`) VALUES
(14, 0, '201.41.127.42', 'DoS', '', '', '', '2007-07-16 19:22:26'),
(15, 0, '66.249.2.138', 'CONTAMI', '', 'Attempt to inject ''_REQUEST'' was found.\n', '', '2007-09-29 16:38:56'),
(16, 0, '24.187.74.102', 'UNION', '', 'Pattern like SQL injection found. (15 union select 0 from obz)\n', '', '2008-06-09 18:22:06'),
(17, 0, '91.187.123.69', 'UNION', '', 'Pattern like SQL injection found. (8 and 1=0 union select */)\n', '', '2009-02-18 20:22:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_ranks`
--

CREATE TABLE IF NOT EXISTS `xoops_ranks` (
  `rank_id` smallint(5) unsigned NOT NULL auto_increment,
  `rank_title` varchar(50) NOT NULL default '',
  `rank_min` mediumint(8) unsigned NOT NULL default '0',
  `rank_max` mediumint(8) unsigned NOT NULL default '0',
  `rank_special` tinyint(1) unsigned NOT NULL default '0',
  `rank_image` varchar(255) default NULL,
  PRIMARY KEY  (`rank_id`),
  KEY `rank_min` (`rank_min`),
  KEY `rank_max` (`rank_max`),
  KEY `rankminrankmaxranspecial` (`rank_min`,`rank_max`,`rank_special`),
  KEY `rankspecial` (`rank_special`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `xoops_ranks`
--

INSERT INTO `xoops_ranks` (`rank_id`, `rank_title`, `rank_min`, `rank_max`, `rank_special`, `rank_image`) VALUES
(1, 'Novato', 0, 20, 0, 'rank3e632f95e81ca.gif'),
(2, 'Já está aparecendo', 21, 40, 0, 'rank3dbf8e94a6f72.gif'),
(3, 'Regular', 41, 70, 0, 'rank3dbf8e9e7d88d.gif'),
(4, 'Não consegue se afastar', 71, 150, 0, 'rank3dbf8ea81e642.gif'),
(5, 'Da casa', 151, 10000, 0, 'rank3dbf8eb1a72e7.gif'),
(6, 'Redator', 0, 0, 1, 'rank3dbf8edf15093.gif'),
(7, 'Moderador', 0, 0, 1, 'rank3dbf8edf15093.gif'),
(8, 'Colaborador', 0, 0, 1, 'rank3dbf8edf15093.gif'),
(9, 'Administrador', 0, 0, 1, 'rank3dbf8ee8681cd.gif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_session`
--

CREATE TABLE IF NOT EXISTS `xoops_session` (
  `sess_id` varchar(32) NOT NULL default '',
  `sess_updated` int(10) unsigned NOT NULL default '0',
  `sess_ip` varchar(15) NOT NULL default '',
  `sess_data` text NOT NULL,
  PRIMARY KEY  (`sess_id`),
  KEY `updated` (`sess_updated`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `xoops_session`
--

INSERT INTO `xoops_session` (`sess_id`, `sess_updated`, `sess_ip`, `sess_data`) VALUES
('b8dbf59210ec2c72ead981ddbba08f05', 1236015005, '200.160.177.22', ''),
('e21ba60fe8a7d968a16de01221685a97', 1236016153, '189.10.176.18', ''),
('ee07e19f17ccdd8f9fed04de214b35df', 1236015051, '189.30.28.2', ''),
('1ffef8774a9a4f9074905734a413ad7c', 1236015648, '65.55.209.3', ''),
('45a73d1ea2807ae2f946af66cd6db92a', 1236015666, '200.144.5.29', ''),
('d95ad30b01d8793f003e508570154377', 1236015688, '200.144.5.29', ''),
('638561982a1f65ec1d318a13c70e9abe', 1236016508, '189.10.176.2', ''),
('f6078759fc44f00a838fc0b424d67a17', 1236016037, '189.107.54.132', ''),
('759bc3f6ff69bca7e607d3ca9f9a1e88', 1236016473, '200.96.77.68', ''),
('c3723b20864d964974fa42abcad0c9dc', 1236015895, '201.66.217.40', ''),
('1250500c0d84f1a29d138309897148fa', 1236016103, '67.195.37.169', ''),
('e5549a25efecb4475c0a17025aa97ed2', 1236016199, '85.242.183.107', ''),
('d35a93fff43a0bde328278ede005cc4f', 1236016205, '85.242.183.107', ''),
('66b169cf78f9bd5835098182f3dd6bb7', 1236016645, '201.10.8.13', ''),
('fdc3ad186a2f04140299b8d9da9f2820', 1236018913, '200.203.21.93', ''),
('a457f2720810ecbb1fa5cb898812d0f7', 1236018953, '200.203.21.93', ''),
('d8753db1e85935bee4a872f5ef7e976f', 1236018991, '200.203.21.93', ''),
('acf133594f000458d6b1bec59593b124', 1236019013, '200.203.21.93', ''),
('10e4c04ee658d0549f6f7fa93de0d0bc', 1236019015, '200.203.21.93', ''),
('af9b13e4d28504289da4ef60bf10681a', 1236019016, '200.203.21.93', ''),
('697f4deb6fa61cdb64ceb9c939737d16', 1236019527, '200.18.33.214', ''),
('4fa48eec8eb127af9247b5a8bc2d90eb', 1236019619, '187.4.13.58', ''),
('22252197fbf3259d44e6d306bb114d0f', 1236019620, '200.138.88.32', ''),
('f0b3b7bc74bea916dbe2d5fb3d02f989', 1236015291, '189.10.176.130', ''),
('4860e18ad61992e449070af47bbfef48', 1236018911, '200.203.21.93', ''),
('752fb3b11bcd6f991354503b5c74b19e', 1236018910, '200.203.21.93', ''),
('7d3786459beb4124fc8cdde24f529810', 1236018888, '200.203.21.93', ''),
('b8db28011273459ddb0cb4e4d1e22829', 1236018836, '189.19.91.141', ''),
('94b0755c93ff73614b55cb885fe10872', 1236018697, '189.10.176.130', ''),
('f57a7b039fe95ea2e3e9cfc78edf68d9', 1236018466, '200.140.142.66', ''),
('4d675a8e95f49c12186870672e116ad5', 1236018855, '200.203.21.93', ''),
('f42550cf4bbfc3838dd2effb30bca889', 1236018835, '200.143.84.132', ''),
('ebf8f385e8ce9a5c197ba0d3d50a2ca1', 1236018269, '189.107.102.208', ''),
('757d6a5dfc08e17531f858c055cbeb5d', 1236018235, '189.110.84.253', ''),
('a9c93ccc47eb9764ad6cdc50927be924', 1236018228, '189.107.102.208', ''),
('13f4454b6376524fdf5b44d8c52e481d', 1236018320, '201.22.219.63', ''),
('e75837e6d8561eefe070362f5db9d285', 1236017920, '65.55.209.3', ''),
('4e880c58d3b67ee01a08ccff1da73d36', 1236017754, '189.104.175.243', ''),
('1ab5567d542b86a1b2f8afb560ef2de7', 1236018050, '189.27.170.204', ''),
('cbfb7c97dec6f0dd13ca6954ee437a35', 1236017277, '187.4.21.182', ''),
('dcc96bd5fd68c1e7cb609dc9fb69e5d3', 1236019463, '201.10.8.13', ''),
('b07272efc006e83ecaf24a1744d656f3', 1236017148, '201.10.8.13', ''),
('0c631f7bd029d6dc5676edbb89119d7d', 1236017049, '187.5.193.44', ''),
('69ee1483f5cbbf9eaeabbf045dffbe0c', 1236016922, '189.58.209.161', ''),
('cd4733c27ce2e3afd831b5b828beb2de', 1236016970, '200.203.105.126', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_smiles`
--

CREATE TABLE IF NOT EXISTS `xoops_smiles` (
  `id` smallint(5) unsigned NOT NULL auto_increment,
  `code` varchar(50) NOT NULL default '',
  `smile_url` varchar(100) NOT NULL default '',
  `emotion` varchar(75) NOT NULL default '',
  `display` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Extraindo dados da tabela `xoops_smiles`
--

INSERT INTO `xoops_smiles` (`id`, `code`, `smile_url`, `emotion`, `display`) VALUES
(1, ':-D', 'smil3dbd4d4e4c4f2.gif', 'Muito feliz', 1),
(2, ':-)', 'smil3dbd4d6422f04.gif', 'Sorriso', 1),
(3, ':-(', 'smil3dbd4d75edb5e.gif', 'Triste', 1),
(4, ':-o', 'smil3dbd4d8676346.gif', 'Surpreendido', 1),
(5, ':-?', 'smil3dbd4d99c6eaa.gif', 'Confuso', 1),
(6, '8-)', 'smil3dbd4daabd491.gif', 'Atento', 1),
(7, ':lol:', 'smil3dbd4dbc14f3f.gif', 'Gargalhadas', 1),
(8, ':-x', 'smil3dbd4dcd7b9f4.gif', 'Zangado', 1),
(9, ':-P', 'smil3dbd4ddd6835f.gif', 'Língua de fora', 1),
(10, ':oops:', 'smil3dbd4df1944ee.gif', 'Envergonhado', 0),
(11, ':cry:', 'smil3dbd4e02c5440.gif', 'Chorando)', 0),
(12, ':evil:', 'smil3dbd4e1748cc9.gif', 'Muito zangado', 0),
(13, ':roll:', 'smil3dbd4e29bbcc7.gif', 'Pensativo', 0),
(14, ';-)', 'smil3dbd4e398ff7b.gif', 'Piscando', 0),
(15, ':pint:', 'smil3dbd4e4c2e742.gif', 'Mais um café', 0),
(16, ':hammer:', 'smil3dbd4e5e7563a.gif', 'Sempre trabalhando', 0),
(17, ':idea:', 'smil3dbd4e7853679.gif', 'Idéia', 0),
(50, '[anjo]', 'e-mocao_anjo.gif', 'anjo', 0),
(51, '[ave]', 'e-mocao_ave.gif', 'ave', 0),
(52, '[banido]', 'e-mocao_banido.gif', 'banido', 0),
(53, '[beijo]', 'e-mocao_beijo.gif', 'beijo', 0),
(54, '[biruta]', 'e-mocao_biruta.gif', 'biruta', 0),
(55, '[bom]', 'e-mocao_bom.gif', 'bom', 0),
(56, '[box]', 'e-mocao_box.gif', 'box', 0),
(57, '[brasil]', 'e-mocao_brasil.gif', 'brasil', 0),
(58, '[café]', 'e-mocao_cafe.gif', 'cafe', 0),
(59, '[careta]', 'e-mocao_careta.gif', 'careta', 0),
(60, '[celular]', 'e-mocao_celular.gif', 'celular', 0),
(61, '[choro]', 'e-mocao_choro.gif', 'choro', 0),
(62, '[desculpa]', 'e-mocao_desculpa.gif', 'desculpa', 0),
(63, '[diabinho]', 'e-mocao_diabinho.gif', 'diabinho', 0),
(64, '[dicotomia]', 'e-mocao_dicotomia.gif', 'dicotomia', 0),
(65, '[duelo]', 'e-mocao_duelo.gif', 'duelo', 0),
(66, '[?]', 'e-mocao_duvida.gif', 'Dúvida', 0),
(67, '[espera]', 'e-mocao_espera.gif', 'Na espera', 0),
(68, '[!]', 'e-mocao_exclamacao.gif', 'Exclamação', 0),
(69, '[flor]', 'e-mocao_flor.gif', 'Flor', 0),
(70, '[flores]', 'e-mocao_flores.gif', 'Flores', 0),
(71, '[gato]', 'e-mocao_gato.gif', 'Gato', 0),
(72, '[haha]', 'e-mocao_haha.gif', 'HAHAHA', 0),
(73, '[hehe]', 'e-mocao_hehe.gif', 'Hehe...', 0),
(74, '[idéia]', 'e-mocao_ideia.gif', 'Idéia!', 0),
(75, '[inocente]', 'e-mocao_inocente.gif', 'Inocente', 0),
(76, '[jedi]', 'e-mocao_jedi.gif', 'Jedi', 0),
(77, '[karatê]', 'e-mocao_karate.gif', 'Karatê', 0),
(78, '[lendo]', 'e-mocao_lendo.gif', 'Lendo', 0),
(79, '[lerdeza]', 'e-mocao_lerdeza.gif', 'Lerdeza', 0),
(80, '[matrix]', 'e-mocao_matrix.gif', 'Matrix', 0),
(81, '[mau]', 'e-mocao_mau.gif', 'Mau', 0),
(82, '[morto]', 'e-mocao_morto.gif', 'Morto', 0),
(83, '[não]', 'e-mocao_nao.gif', 'Não', 0),
(84, '[nojo]', 'e-mocao_nojo.gif', 'Nojo', 0),
(85, '[obrigado]', 'e-mocao_obrigado.gif', 'Obrigado', 0),
(86, '[oi]', 'e-mocao_oi.gif', 'Oi', 0),
(87, '[ok]', 'e-mocao_ok.gif', 'Ok', 0),
(88, '[ola]', 'e-mocao_ola.gif', 'Olá', 0),
(89, '[palmas]', 'e-mocao_palmas.gif', 'Palmas', 0),
(90, '[piscadinha]', 'e-mocao_piscadinha.gif', 'Piscadinha', 0),
(91, '[presente]', 'e-mocao_presente.gif', 'Presente', 0),
(92, '[punk]', 'e-mocao_punk.gif', 'Punk', 0),
(93, '[raios]', 'e-mocao_raios.gif', 'Raios', 0),
(94, '[raiva]', 'e-mocao_raiva.gif', 'Raiva', 0),
(95, '[rave]', 'e-mocao_rave.gif', 'Rave', 0),
(96, '[rendição]', 'e-mocao_rendicao.gif', 'Rendição', 0),
(97, '[reverência]', 'e-mocao_reverencia.gif', 'Reverência', 0),
(98, '[reza]', 'e-mocao_reza.gif', 'Reza', 0),
(99, '[ruim]', 'e-mocao_ruim.gif', 'Ruim', 0),
(100, '[sim]', 'e-mocao_sim.gif', 'Sim', 0),
(101, '[sorte]', 'e-mocao_sorte.gif', 'Sorte', 0),
(102, '[strip]', 'e-mocao_strip.gif', 'Strip', 0),
(103, '[tchau]', 'e-mocao_tchau.gif', 'Tchau', 0),
(104, '[tv]', 'e-mocao_tv.gif', 'TV', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_stories`
--

CREATE TABLE IF NOT EXISTS `xoops_stories` (
  `storyid` int(8) unsigned NOT NULL auto_increment,
  `uid` int(5) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `created` int(10) unsigned NOT NULL default '0',
  `published` int(10) unsigned NOT NULL default '0',
  `expired` int(10) unsigned NOT NULL default '0',
  `hostname` varchar(20) NOT NULL default '',
  `nohtml` tinyint(1) NOT NULL default '0',
  `nosmiley` tinyint(1) NOT NULL default '0',
  `hometext` text NOT NULL,
  `bodytext` text NOT NULL,
  `counter` int(8) unsigned NOT NULL default '0',
  `topicid` smallint(4) unsigned NOT NULL default '1',
  `ihome` tinyint(1) NOT NULL default '0',
  `notifypub` tinyint(1) NOT NULL default '0',
  `story_type` varchar(5) NOT NULL default '',
  `topicdisplay` tinyint(1) NOT NULL default '0',
  `topicalign` char(1) NOT NULL default 'R',
  `comments` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`storyid`),
  KEY `idxstoriestopic` (`topicid`),
  KEY `ihome` (`ihome`),
  KEY `uid` (`uid`),
  KEY `published_ihome` (`published`,`ihome`),
  KEY `title` (`title`(40)),
  KEY `created` (`created`),
  FULLTEXT KEY `search` (`title`,`hometext`,`bodytext`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Extraindo dados da tabela `xoops_stories`
--

INSERT INTO `xoops_stories` (`storyid`, `uid`, `title`, `created`, `published`, `expired`, `hostname`, `nohtml`, `nosmiley`, `hometext`, `bodytext`, `counter`, `topicid`, `ihome`, `notifypub`, `story_type`, `topicdisplay`, `topicalign`, `comments`) VALUES
(5, 1, 'Fotos da Cidade', 1101724548, 1101724548, 0, '200.180.153.2', 0, 0, 'Algumas Fotos da Cidade de Frederico Westphalen<br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/area_de_lazer.jpg" width="476" height="315"><br>\r\nÁrea de Lazer Sonho Verde - Linha 21 de Abril <br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/cachoeira_faguense.jpg" width="476" height="315"><br>\r\nCachoeira Faguense - Linha Faguense <br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/cascata_faguense.jpg" width="423" height="620"><br>\r\nCascata Faguense - Linha Faguense <br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/catedral_externa.jpg" width="423" height="620"><br>\r\nCatedral Diocesana - Imagem Externa <br><br>\r\n\r\n<div align="center"><a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=6">Próximo</a>', ' ', 33121, 1, 0, 0, 'admin', 0, 'R', 0),
(6, 1, 'Fotos da Cidade - II', 1101725895, 1101725895, 0, '200.180.153.2', 0, 0, 'Algumas Fotos da Cidade de Frederico Westphalen - Parte II<br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/monumento_schoenstatt.jpg" width="423" height="620"><br>\r\nMonumento - Mãe Rainha Três Vezes Admirável de Schoenstatt - Linha Faguense <br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/rua_do_comercio.jpg" width="476" height="315"><br>\r\nRua do Comércio - Centro da Cidade<br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/vista_cidade2.jpg" width="476" height="315"><br>\r\nVista Aérea da Cidade<br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/vista_uri.jpg" width="476" height="315"><br>\r\nVista da Catedral Diocesana  <br><br>\r\n', ' ', 21660, 1, 0, 0, 'admin', 0, 'R', 0),
(7, 1, 'Telefones Úteis', 1101726556, 1101726556, 0, '200.180.153.2', 0, 0, 'Principais telefones úteis da cidade de Frederico Westphalen - RS<br><br>\r\nPrefixo (55)<br><br>\r\n\r\n   - Brasil Telecom:  3744 6053<br><br>\r\n   - Brigada Militar: 190 ou 3744 - 3744 <br><br>\r\n   - Camara Municipal de Vereadores: 3744 - 4966<br><br>\r\n   - Conselho Tutelar: 3744 - 4466 <br><br>\r\n   - Conselho Tutelar - Plantão: 9989 8969<br><br>\r\n   - Corpo de Bombeiros: 193 ou 3744 - 4925 <br><br>\r\n   - Correios: 3744 - 3633<br><br>\r\n   - Delegacia de Polícia: 3744 - 4044<br><br>\r\n   - Estação Rodoviária: 3744 - 1800<br><br>\r\n   - Expofred: 3744 - 1478<br><br>\r\n   - FORUM: 3744 - 3666<br><br>\r\n   - Hospital Divina Providência: 3744 - 4888<br><br>\r\n   - Hospital Santo Antônio: 3744 -1514<br><br>\r\n   - Posto de Saúde: 3744 6922 ou 3744 4911<br><br>\r\n   - Prefeitura Municipal: 3744 - 5050<br><br>\r\n   - Promotoria: 3744 - 4240<br><br>\r\n   - RGE: 0800 900 900<br><br>\r\n   - Sec. de Obras: 3744 - 4466 <br><br>\r\n   - Universidade Regional Integrada - URI: 3744 - 9200<br><br>', ' ', 4937, 1, 0, 0, 'admin', 0, 'R', 0),
(3, 1, 'Histórico', 1101722576, 1176340800, 0, '200.180.153.2', 0, 0, '<center>\r\n<embed src="http://www.fredericowestphalen.rs.gov.br/html/images/teste.swf" width="470" height="264"><br>\r\n</center>\r\n<p align="justify">\r\n&nbsp;&nbsp;&nbsp;Os Pioneiros chegaram trazendo esperança de uma vida melhor, mas vinham com vontade de trabalhar á terra e retirar dela o sustento, garantindo um futuro melhor. Os primeiros migrantes chegaram em 1918, época que aconteceu a abertura das primeiras picadas, pois a estrada  levou 10 anos para ser construída entre Boca da Picada (Seberi) a Iraí.<br>\r\n\r\n&nbsp;&nbsp;&nbsp;Os primeiros carreteiros João Tombini, Ângelo Serafini, José Copatti sob o comando do comerciante estabelecido na Boca da Picada, Antonio Marino Zanatto faziam o transporte de produtos manufaturados e da produção agrícola. Numa dessas viagens, um barril de aguardente caiu da carroça, danificando a tampa e para não jogar fora a vasilha, eles tiveram a idéia de colocá-lo na fonte, sob a sombra, ligando com uma taquara. A localização do barril à beira da estrada com água limpa e muita sombra colaborou para o surgimento da expressão “vou descansar, comer e dormir no barril”. Assim o lugarejo foi crescendo na selva do Vale Alto Uruguai.<br>\r\n\r\n&nbsp;&nbsp;&nbsp;Mais tarde, pelo Decreto 30 do Prefeito de Palmeira das Missões, por decisão de uma assembléia de moradores foi fixado o nome de Vila Frederico Westphalen, homenageando o Engenheiro que colonizou a região sob o comando do Governo do Estado.<br><br>\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Colaboração: Wilson A. Ferigollo', ' ', 6398, 1, 0, 1, 'admin', 0, 'R', 0),
(4, 1, 'Dados Sociais', 1101722756, 1101712200, 0, '200.180.153.2', 0, 0, '<br>\r\nMUNICÍPIO DE FREDERICO WESTPHALEN/RS.<br><br>\r\n\r\n	Endereço: Rua José Cañellas, 258 - Centro<br>\r\n	CEP: 98400-000<br>\r\n	E-Mail: fredericowestphalen@fredericowestphalen.rs.gov.br<br>\r\n	Fone: (055) 3744-5050<br>\r\n	Fax: (055) 3744-3887<br>\r\n	REGIÃO: Médio Alto Uruguai<br>\r\n	CRIAÇÃO DO MUNICÍPIO: 15/12/54<br>\r\n	INSTALAÇÃO/EMANCIPAÇÃO: 28/02/55<br>\r\n	Distância do Município à Capital: 430 Km<br>\r\n	Distância dos Municípios Limítrofes:<br>\r\n	Ametista do Sul - 24 Km<br>\r\n	Rodeio Bonito - 45 Km<br>\r\n	Taquaruçu do Sul - 9 km<br>\r\n	Vicente Dutra - 28 Km<br>\r\n	Iraí - 34 Km<br>\r\n	Seberi - 14 Km<br>\r\n	Caiçara - 10 Km<br><br>\r\n	\r\n	Rodovias de Acesso: BR-386<br>\r\n	                                RS-150<br><br>\r\n	 \r\nÁREA:\r\n     - Urbana : 4,57 Km²<br>\r\n     - Rural : 259,93 Km²<br>\r\n     - Total : 264,5 Km²<br><br>\r\n\r\n	Nº de Bairros do Município: 16<br><br>\r\n	\r\n	População : (Censo de 2000)<br>\r\n                - Urbana : 20.394 habitantes<br>\r\n                - Rural :      6.322 habitantes<br>\r\n                - Total :     26.716 habitantes<br><br>\r\n\r\n     * Homens: 13.072<br>\r\n     * Mulheres: 13.644<br><br>\r\n \r\n      Taxa de crescimento anual, 1996-2000: -0,54%<br><br>\r\n\r\n      Principal Atividade do Município: Comércio<br><br>\r\n	\r\nDados Diversos:<br><br>\r\n\r\n    - Altitude de F.W.: 566 m<br>\r\n    - Densidade Demográfico: 93,92 hab/Km²<br>\r\n    - Taxa de Crescimento: 0,89 %<br>\r\n    - Terreno: Razoavelmente Acidentado<br>\r\n    - Clima: sub-tropical<br>\r\n    - Temperatura Média Anual : 19.1 ºC máx. 38o C mín. 0o C<br>\r\n    - Umidade Relativa: 65 %<br>\r\n    - Localização Geográfica: Latitude -   27º 21’ 25’’<br>\r\n                                       Longitude -   53º 22’ 27’’<br><br>\r\n\r\nUrbanização:<br><br>\r\n\r\n    - Extensão de sistema viário urbano: 85,30 Km<br>\r\n    - Ruas Pavimentadas (%) : 23,4 %<br>\r\n    - Ruas com Calçamento (%) : 58,6 %<br>\r\n    - Extensão de ruas incluídas no perímetro urbano: 18 Km<br><br>\r\n\r\nFeriados Municipais:<br><br>\r\n\r\n    - 28/Fev: Dia do Município (antecipado p/ 25-02)<br>\r\n    - 10/Abril: Paixão de Cristo<br>\r\n    - 13/Junho: Dia do Padroeiro - Stº. Antônio<br>\r\n    - 08/Dezembro: Dia Nossa Senhora Conceição<br><br>\r\n\r\nNº domicílios na área urbana do Município: 6.746<br>\r\nNº domicílios na área rural do Município: 1.783', ' ', 9682, 1, 0, 1, 'admin', 0, 'R', 0),
(8, 1, 'Sites Úteis', 1101809570, 1101809570, 0, '200.180.153.2', 0, 0, '<br>\r\nSites Úteis <br><br>\r\n<br><br>\r\n\r\n    - Agência Nacional de Telecomunicações - ANATEL <br><br>\r\n   <a href="http://www.anatel.gov.br">http://www.anatel.gov.br</a><br><br><br>\r\n\r\n   - Agência Nacional de Vigilância Sanitária - Anvisa<br><br>\r\n   <a href="http://www.anvisa.gov.br">http://www.anvisa.gov.br</a><br><br><br>\r\n\r\n   - Camara Municipal de Vereadores de Frederico Westphalen<br><br>\r\n   <a href="http://www.camarafw.rs.gov.br">http://www.camarafw.rs.gov.br</a><br><br><br>\r\n\r\n   - CEP Brasil (Consulta o CEP de qualquer localidade do Brasil)<br><br>\r\n   <a href="http://www.cepbrasil.com">http://www.cepbrasil.com</a><br><br><br>\r\n\r\n   - FAMURS (Federação das Associações de Municípios do Rio Grande do Sul) <br><br>\r\n   <a href="http://www.famurs.com.br">http://www.famurs.com.br</a><br><br><br>\r\n\r\n   - Imprensa Nacional<br><br>\r\n   <a href="http://www.in.gov.br">http://www.in.gov.br</a><br><br><br>\r\n\r\n   - Previdência Social<br><br>\r\n   <a href="http://www.previdenciasocial.gov.br">http://www.previdenciasocial.gov.br</a><br><br><br>\r\n\r\n   - Receita Federal <br><br>\r\n   <a href="http://www.receita.fazenda.gov.br">http://www.receita.fazenda.gov.br</a><br><br><br>\r\n\r\n   - SEBRAE Nacional<br><br>\r\n   <a href="http://www.sebrae.gov.br">http://www.sebrae.gov.br</a><br><br><br>\r\n\r\n   - Secretaria da Fazenda do Rio Grande do Sul<br><br>\r\n   <a href="http://www.sefaz.rs.gov.br">http://www.sefaz.rs.gov.br</a><br><br><br>', ' ', 5089, 1, 0, 0, 'admin', 0, 'R', 0),
(10, 1, 'Secretaria de Esportes - II', 1101898115, 1101898115, 0, '200.180.153.2', 0, 0, '<img src="http://www.fredericowestphalen.rs.gov.br/html/images/carrinhos1.jpg" width="476" height="315"><br>\r\nArrancada de Carrinhos de Lomba <br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/carrinhos4.jpg" width="476" height="315"><br>\r\nArrancada de Carrinhos de Lomba <br><br>\r\nRua Miguel Couto<br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/chutando_lata.jpg" width="476" height="315"><br>\r\nCampeonato Municipal de Futsal <br>\r\nEquipe: Chutando Lata (campeã)<br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/futivolei.jpg" width="476" height="315"><br>\r\nTorneio de Futivolei duplas Masculino<br><br>\r\n\r\n<div align="center"><a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=11">Próximo</a>\r\n', ' ', 976, 1, 0, 0, 'admin', 0, 'R', 0),
(11, 1, 'Secretaria de Esportes - III', 1101898882, 1101856200, 0, '200.180.153.2', 0, 0, '<img src="http://www.fredericowestphalen.rs.gov.br/html/images/1 (1).jpg" width="476" height="315"><br>\r\n50 anos de fw. <br>\r\n <br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/municipalito3.jpg" width="476" height="315"><br>\r\n8º Municipalito de Futsal <br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/volei_fem.jpg" width="476" height="315"><br>\r\nVolei de quadra feminino<br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/volei_masc.jpg" width="476" height="315"><br>\r\nVolei de quadra masculino<br><br>\r\n', ' ', 3012, 1, 0, 0, 'admin', 0, 'R', 0),
(12, 1, 'Secretaria de Saúde', 1101923388, 1101923388, 0, '200.180.153.2', 0, 0, 'A Secretaria Municipal de Saúde está localizada à rua 21 de Abril s/nº, com uma infraestrutura completa possibilitando um atendimento satisfatório à população, com consultórios médicos equipados, atendendo 03 Pediatras, 03 Clínicos Gerais, 01 Gineco/Obstétra, 02 Psicólogas, 07 Odontólogos, 01 Fonoaudióloga, 02 Fisioterapeutas. <br><br>\r\n\r\nPossui uma sala de pronto atendimento de enfermagem, onde são efetuados diversos procedimentos ambulatoriais e também orientação em saúde ao paciente. Realizam também esclarecimentos, através dos meios de comunicação, sobre como proceder com pacientes portadores de doenças crônicas; distribruição de material informativo a alunos da rede pública; distribuição de material de auto-cuidado e primeiros socorros a população em geral.<br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/centro_de_saude.jpg" width="476" height="315"><br><br>\r\n\r\nPossui ainda Sala de Vacinas, distribuição de medicamentos da Farmácia Básica, da Saúde Mental e Terceira Idade, distribuição de Medicamentos para pessoas portadoras de deficiência, criado pela Lei Municipal nº 2.349 de 27/10/99. Também são feitos cadastros para medicamentos especiais, através de processos via Coordenadoria.<br><br>\r\n	\r\nOferecemos campos de estágio curricular para alunos do curso de Enfermagem, Psicologia, Assistência Social, Farmácia e estágios voluntários.<br><br>\r\n	\r\nNo Centro Municipal funciona o posto do IML que realiza perícias, tudo que ocorre na área da Polícia Civil, Brigada Militar e verificação de Óbitos. <br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/posto_de_saude_atend.jpg" width="476" height="315"><br><br>\r\n\r\n<div align="center"><a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=13">Próximo</a>', ' ', 3851, 1, 0, 0, 'admin', 0, 'R', 0),
(13, 1, 'Secretaria de Saúde - II', 1101981413, 1101981413, 0, '200.180.153.2', 0, 0, 'Prestamos atendimento na Área da Assistência Social contando com 2 assistentes sociais, cadastrando a população nos diversos programas do Governo Federal, como a Bolsa Família, CADSUS, Hiperdia, Sisprenatal, entre outros. Também é feito a doação de passagens para quem necessita de consultas especializadas fora do município. Uma terceira profissional trabalha exclusivamente com os Grupos de Terceira Idade, que são em número de 9.<br><br>\r\n\r\nTemos profissionais da vigilância sanitária, que realizam inspeção e fiscalização de abatedouros e demais abastecimentos. Também inspecionam denúncias ligadas a área.<br><br>\r\n\r\nSão realizadas, na Secretaria Municipal de Saúde, as seguintes vacinas de rotina: Pólio, BCG, Hepatite B, Antitetânica, Tetravalente (difecteria, tétano, coqueluche e meningite tipo B), anti rábica, sarampo, rubéola e cachumba.<br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/pressao.jpg" width="476" height="315"><br><br>\r\n\r\nTemos uma equipe do Programa da Saúde da Família (PSF) no Centro Municipal de Saúde, com um profissional médico, uma enfermeira, uma auxiliar de enfermagem e 5 agentes comunitários de saúde, cobrindo os seguintes bairros: Fátima, Santo Antônio e Barril. Tais profissionais estão comprometidos em prestar assistência integral as pessoas, visando humanizar as práticas de saúde, tendo como meta sempre a prevenção, fazendo com que a saúde seja reconhecida como um direito, portanto a expressão de qualidade de vida.\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/pacs.jpg" width="476" height="315"><br><br>\r\n\r\n<div align="center"><a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=14">Próximo</a>', ' ', 2104, 1, 0, 0, 'admin', 0, 'R', 0),
(14, 1, 'Secretaria de Saúde - III', 1101982033, 1101982033, 0, '200.180.153.2', 0, 0, 'Com uma população de 27.321 habitantes, estamos comprometidos e empenhados em mudar o modelo de saúde, investindo na prevenção, tentando provocar uma transformação interna ao próprio sistema. Para que nossos objetivos sejam alcançados contamos com a parceria do Estado e da União, atendendo sempre ao princípio da universalidade dos direitos sociais e do respeito à dignidade do cidadão.<br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/feira2.jpg" width="476" height="315"><br><br>\r\n\r\nNo distrito de Castelinho, contamos com um posto de saúde, onde todas as quartas-feiras, disponibilizamos um carro e um motorista para transporte do médico, dentistas e auxiliares de enfermagem que se  deslocam para atender os pacientes.<br><br>\r\n\r\nNo distrito de Osvaldo Cruz encontra-se mais um posto de saúde, que já se encontra em pleno funcionamento.<br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/posto_osvaldo_cruz2.jpg" width="476" height="315"><br><br>', ' ', 1782, 1, 0, 0, 'admin', 0, 'R', 0),
(15, 1, 'Secretaria da Fazenda', 1101996958, 1101996958, 0, '200.180.153.2', 0, 0, 'A Secretaria da Fazenda, disponibiliza os valores adicionados do munícipio, (separados por setores da economia) referente aos anos de 1996 à 2000, valores estes disponibilizados, calculados e processados pela Secretaria da Fazenda do Rio Grande do Sul:<br><br>\r\n\r\nAno Base: 1996<br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/val_1996.jpg" width="476" height="380"><br><br>\r\n\r\nAno Base: 1996<br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/val_1997.jpg" width="476" height="380"><br><br>\r\n\r\n\r\n<div align="center"><a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=16">Próximo</a>', ' ', 2639, 1, 0, 0, 'admin', 0, 'R', 0),
(16, 1, 'Secretaria da Fazenda - II', 1101997179, 1101997179, 0, '200.180.153.2', 0, 0, '<img src="http://www.fredericowestphalen.rs.gov.br/html/images/val_1998.jpg" width="476" height="380"><br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/val_1999.jpg" width="476" height="380"><br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/val_2000.jpg" width="476" height="380"><br><br>', ' ', 616, 1, 0, 0, 'admin', 0, 'R', 0),
(17, 1, 'Secretaria de Obras', 1103201098, 1103201098, 0, '200.180.153.2', 0, 0, 'A Secretaria de Obras, está localizada na Rua do Comércio, nº 981 ( em frente a Câmara Municipal de Vereadores) onde realizam-se diversos serviços em prol da comunidade, visando o bem-estar social e a realização de inúmeros trabalhos, nas quais, podemos citar: calçamentos, asfaltos, redes de tratamento de esgoto cloacal, construções de centros comunitários e serviços em geral.<br><br>\r\n\r\nDentre as diversas obras realizadas durante todo o ano podemos citar algumas: <br><br> \r\n\r\nCalçamento na Rua Capitão Raimundo, que liga os bairros Santo Antônio e Barril.<br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/calcamento.jpg" width="476" height="315"><br><br>\r\n\r\nCalçamentos nas ruas 15 de Novembro e Rio de Janeiro no bairro Itapagé.<br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/calcamento2.jpg" width="476" height="315"><br><br>\r\n\r\nComplementação de asfalto nas Ruas Tenente Lira e Alfredo Haubert<br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/asfalto.jpg" width="476" height="315"><br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/asfalto2.jpg" width="476" height="315"><br><br>\r\n\r\n<div align="center"><a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=18">Próximo</a>', ' ', 2720, 1, 0, 0, 'admin', 0, 'R', 0),
(18, 1, 'Secretaria de Obras - II', 1103202020, 1103202020, 0, '200.180.153.2', 0, 0, 'Construção da Rede de Tratamento e Estação de Esgoto nos bairros Fátima e Itapagé\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/esgotobairrofatima.jpg" width="476" height="315"><br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/esgotobairroitapage.jpg" width="476" height="315"><br><br>\r\n\r\nReformulação da Praça da Matriz<br>\r\nInvestimentos e mão-de-obra com recursos próprios do município<br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/praca.jpg" width="476" height="315"><br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/praca2.jpg" width="476" height="315"><br><br>', ' ', 1032, 1, 1, 0, 'admin', 0, 'R', 0),
(19, 1, 'Secretaria da Educação e Cultura', 1105450612, 1105450612, 0, '200.180.153.2', 0, 0, 'A Secretaria Municipal de Educação e Cultura, apresenta abaixo alguns dados referentes a rede municipal de ensino de Frederico Westphalen: <br><br>\r\nEnsino Fundamental:<br><br>\r\n17 escolas de ensino fundamental <br>\r\n04 escolas na zona urbana<br>\r\n13 na zona rural <br>\r\n1568 alunos nas classes de Pré-escola a 8ª séries<br>\r\n136 professores<br><br>\r\nEducação Infantil:<br><br>\r\n06 Escolas de Educação Infantil em turno integral, sendo atendidas, aproximadamente, 350 crianças de 0 a 5 anos.<br>\r\n80 profissionais atuando nas escolas de Educação Infantil (professores, merendeiras, serventes, vigilantes e nutricionista)<br><br>\r\nProjetos Desenvolvidos na Rede Municipal de Frederico Westphalen <br><br>\r\n1 - Projeto: Fazendo Arte na Escola <br><br>\r\n<div align = center>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/arte1.jpg" width="476" height="315"><br><br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/arte2.jpg" width="476" height="315"><br><br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/arte3.jpg" width="476" height="315"><br><br>\r\n</div align = center>\r\nAssegurar o desenvolvimento integral de crianças e adolescentes com ações educativas complementares, priorizando a música, teatro, canto/técnica vocal, prática de instrumentos musicais (violão e flauta doce) e artesanato.\r\n\r\n<div align="center"><a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=21">Próximo</a>', ' ', 6607, 1, 0, 0, 'admin', 0, 'R', 0),
(22, 1, 'Secretaria da Educação e Cultura III', 1105465857, 1105465857, 0, '200.180.153.2', 0, 0, 'Projeto Biblioteca Itinerante<br><br>\r\nAdaptação de veículo para operacionalização de projetos pedagógicos e culturais itinerantes, bens como provê-lo de equipamentos necessários para o pleno funcionamento.<br><br>\r\nProjeto Brinquedoteca do Roda Leitura<br><br>\r\n<div align=center>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/roda_leitura1.jpg" width="476" height="315"><br><br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/roda_leitura2.jpg" width="476" height="315"><br><br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/roda_leitura3.jpg" width="476" height="315"><br><br>\r\n</div align=center>\r\nRecursos lúdicos no Roda Leitura favorecendo, aos educandos, o desenvolvimento de conceitos, habilidades cognitivas, psicomotoras e afetivo-sociais, em especial, através de jogos e brincadeiras.\r\n<br><br>\r\nCerca de 8000 pessoas visitaram o Roda Leitura no período de outubro de 2002 a novembro de 2004.<br><br>\r\nProjeto Atletibol<br><br>\r\nCongregar alunos das Escolas da Rede Municipal de Ensino numa competição esportiva de atletismo e futsal, visando a integração, o conhecimento teórico e prático, a socialização e o respeito às regras e aos adversários na prática esportiva.  \r\n<br><br>\r\nDemais Atividades:<br><br>\r\n<div align=center>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/tribaolivro1.jpg" width="476" height="315"><br><br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/tribaolivro2.jpg" width="476" height="315"><br><br>\r\n</div align=center>\r\nTributo ao Livro - Realizado no mês de abril\r\n<div align="center"><a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=23">Próximo</a>', ' ', 2552, 1, 0, 0, 'admin', 0, 'R', 0),
(21, 1, 'Secretaria da Educação e Cultura II', 1105464537, 1105464537, 0, '200.180.153.2', 0, 0, 'Projeto Hoje <br><br>\r\nOportunizar aos educandos acesso à tecnologia, à língua estrangeira e ao esporte, como forma de contribuir com uma formação adequada às necessidades da vida moderna, à diminuição das desigualdades e à incorporação de hábitos, atitudes, habilidades e normas.\r\n<br><br>\r\nEscolinha de Futsal e Voleibol <br><br>\r\nDesenvolver habilidades esportivas visando a socialização, recreação e experiências motoras que promovam o crescimento humano global, valorizando as potencialidades físicas, psíquicas, sociais e intelectuais.\r\n<br><br>\r\nProjeto Jogo de Xadrez<br><br>\r\n<div align=center>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/xadrez.jpg" width="476" height="315"><br><br>\r\n</div align=center>\r\nOportunizar à comunidade educativa a prática do esporte intelectual, promovendo o desenvolvimento de habilidades intelectuais, sociais e motoras.\r\n<br><br>\r\nProjeto de Informática<br><br>\r\n<div align=center>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/informatica.jpg" width="476" height="315"><br><br>\r\n</div align=center>\r\nOportunizar aos alunos a prática de aulas de informática, com vistas ao desenvolvimento de habilidades compatíveis às exigências modernas do conhecimento.\r\n<br><br>\r\nProjeto Dedo Verde<br><br>\r\nArborização e ajardinamento das escolas da Rede. Trabalho desenvolvido pela comunidade educativa.<br><br>\r\nProjeto Viagens de Estudo <br><br>\r\nConhecer a diversidade do patrimônio etno-cultural brasileiro, tendo atitude de respeito para com as pessoas e grupos que a compõem, reconhecendo a diversidade cultural como um idreito de todos os elementos de fortalecimento da democracia.<br><br>\r\n\r\n<div align="center"><a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=22">Próximo</a>', ' ', 1960, 1, 0, 0, 'admin', 0, 'R', 0),
(23, 1, 'Secretaria da Educação e Cultura IV', 1105633482, 1105633482, 0, '200.180.153.2', 0, 0, 'Feira do Livro - Realizada no mês de outubro <br><br>\r\n<div align=center>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/tribaolivro4.jpg" width="476" height="315"><br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/tribaolivro5.jpg" width="476" height="315"><br><br>\r\n</div align=center>\r\nNatal Vida - Mês de dezembro <br><br>\r\n<div align=center>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/natalvida1.jpg" width="476" height="315"><br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/natalvida2.jpg" width="476" height="315"><br><br>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/natalvida7.jpg" width="476" height="315"><br><br>\r\n', ' ', 1269, 1, 0, 0, 'admin', 0, 'R', 0),
(24, 1, 'Contas Públicas', 1108472535, 1180154400, 0, '200.180.153.2', 0, 0, 'A Prefeitura Municipal de Frederico Westphalen, publica abaixo as contas públicas do município, atendendo a Lei de Responsabilidade Fiscal e demais obrigações. <br><br>\r\n\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/demonstrativo_legislativo_2semestre2008.pdf" target="_blank"> - DEMONSTRATIVO SIMPLIFICADO DO RELATÓRIO RESUMIDO DA EXECUÇÃO ORÇAMENTÁRIA ORÇAMENTO FISCAIS E DA SEGURIDADE SOCIAL - PODER LEGISLATIVO - 2º Semestre de 2008\r\n</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/demonstrativo_2semestre2008.pdf" target="_blank"> - DEMONSTRATIVO SIMPLIFICADO DO RELATÓRIO RESUMIDO DA EXECUÇÃO ORÇAMENTÁRIA ORÇAMENTO FISCAIS E DA SEGURIDADE SOCIAL - 2º Semestre de 2008\r\n</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/demonstrativo_6bimestre2008.pdf" target="_blank"> - DEMONSTRATIVO SIMPLIFICADO DO RELATÓRIO RESUMIDO DA EXECUÇÃO ORÇAMENTÁRIA ORÇAMENTO FISCAIS E DA SEGURIDADE SOCIAL - 6º Bimestre de 2008\r\n</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/demonstrativo_5bimestre2008.pdf" target="_blank"> - DEMONSTRATIVO SIMPLIFICADO DO RELATÓRIO RESUMIDO DA EXECUÇÃO ORÇAMENTÁRIA ORÇAMENTO FISCAIS E DA SEGURIDADE SOCIAL - Setembro/Outubro - 5º Bimestre de 2008\r\n</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/demonstrativo_4bimestre08.pdf" target="_blank"> - DEMONSTRATIVO SIMPLIFICADO DO RELATÓRIO RESUMIDO DA EXECUÇÃO ORÇAMENTÁRIA ORÇAMENTO FISCAIS E DA SEGURIDADE SOCIAL - Julho/Agosto - 4º Bimestre de 2008\r\n</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/demostrativo_1semestre08.pdf" target="_blank"> - DEMONSTRATIVO SIMPLIFICADO DO RELATÓRIO RESUMIDO DA EXECUÇÃO ORÇAMENTÁRIA ORÇAMENTO FISCAIS E DA SEGURIDADE SOCIAL - Janeiro a Junho de 2008 - 1º Semestre de 2008\r\n</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/demostrativo_2007.pdf" target="_blank"> - DEMONSTRATIVO SIMPLIFICADO DO RELATÓRIO RESUMIDO DA EXECUÇÃO ORÇAMENTÁRIA ORÇAMENTO FISCAIS E DA SEGURIDADE SOCIAL - Janeiro a Dezembro de 2007 - 2º Semestre de 2007\r\n</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/DemonstrSimplRelResumExecOrcam_5Bim2007.pdf" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Orçamentária, da Gestão Fiscal e da Seguridade Social 5º Bimestre - Setembro/Outubro - 2007</a><br>\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/DemonstrSimplRelResumExecOrcam_4Bim2007.pdf" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Orçamentária, da Gestão Fiscal e da Seguridade Social 4º bimestre - julho/agosto - 2007</a><br>\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/demostrativo_1semestre07.pdf" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Orçamentária, da Gestão Fiscal e da Seguridade Social 1º semestre - 2007</a><br>\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/RREO 2 bim.PDF" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Orçamentária, da Gestão Fiscal e da Seguridade Social 2º Bimestre - 2007</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/DemonstrSimplRelResumExecOrcam_1Bim2007.pdf" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Orçamentária, da Gestão Fiscal e da Seguridade Social 1º Bimestre - 2007</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/DemonstrSimplRelResumExecOrcam_2Sem2006.pdf" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Orçamentária, da Gestão Fiscal e da Seguridade Social 2º Semestre - 2006</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/DemonstrSimplRelResumExecOrcam_5Bim2006.html" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Orçamentária - Orçamento Fiscal e da Seguridade Social 5º Bimestre - 2006</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/DemonstrSimplRelResumExecOrcam_4Bim2006.html" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Orçamentária - Orçamento Fiscal e da Seguridade Social 4º Bimestre - 2006</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/DemonstrSimplRelResumExecOrcam_1Sem2006.html" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Orçamentária - Orçamento Fiscal e da Seguridade Social 1º Semestre - 2006</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/VerSimplRelGestFiscal_1Sem2006.html" target="_blank"> - Versão Simplificada do Relatório da Gestão Fiscal - Orçamento Fiscal e da Seguridade Social 1º Semestre - 2006</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/contasPublicas/RelatExecOrcBimestre2_2006.html" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Orçamentária - Orçamento Fiscal e da Seguridade Social 2º Bimestre - 2006</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/RelatExecOrcBimestreJANFEV.html" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Orçamentária - Orçamento Fiscal e da Seguridade Social 1º Bimestre - Janeiro/Fevereiro 2006</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/fredericoWestphalenLRF.html" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Orçamentária - Demostrativo dos Limites - Janeiro a Dezembro de 2005</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/Demonstrativo_simplificado_5_bi.jpg" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Orçamentária, Orçamento Fiscal e da Seguridade Social - 5º bimestre - 2005</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/Relatorio_gestao_fiscal.htm" target="_blank"> - Versão Simplificada do Relatório de Gestão Fiscal, Demonstrativo dos Limites, Orçamento Fiscal e da Seguridade Social - 4º bimestre - 2005</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/Demonstrativo_simplificado.htm" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Orçamentária, Orçamento Fiscal e da Seguridade Social - 4º bimestre - 2005</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/limites_05.jpg" target="_blank"> - Demonstrativo dos Limites - Janeiro a Junho de 2005 </a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/dcl_0405.jpg" target="_blank"> - Demonstrativo da Receita Corrente Líquida - Julho 2004 a Junho de 2005 </a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/cp4.jpg" target="_blank"> - Versão Simplificada do Relatório de Gestão Fiscal - Demonstrativo dos Limites - Orçamento Fiscal e da Seguridade Social - 02/2004 (Folha 2) </a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/cp3.jpg" target="_blank"> - Versão Simplificada do Relatório de Gestão Fiscal - Demonstrativo dos Limites - Orçamento Fiscal e da Seguridade Social - 02/2004</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/cp2.jpg" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Oraçamentária - 02/2004 (Folha 2)</a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/cp1.jpg" target="_blank"> - Demonstrativo Simplificado do Relatório Resumido da Execução Oraçamentária - 02/2004 </a><br>', ' ', 3088, 1, 0, 0, 'admin', 0, 'R', 0),
(25, 1, 'Licitações', 1109080374, 1180575600, 0, '200.180.153.2', 0, 0, 'Edital de Licitação de 2009<br>\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=42">TOMADA DE PREÇOS 2009\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=41">PREGÃO PRESENCIAL 2009</a>\r\n\r\n\r\n\r\n_________________________________________\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=43"> Clique aqui para ver as licitações do ano de 2008</a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=38"> Clique aqui para ver as licitações do ano de 2007</a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=31"> Clique aqui para ver as licitações do ano de 2006</a>\r\n\r\n\r\nDepartamento de Licitações\r\nPrefeitura Municipal de Frederico Westphalen - RS\r\n', ' ', 16002, 1, 0, 0, 'admin', 0, 'R', 0),
(34, 1, 'Secretaria do Turismo', 1194522467, 1194414600, 0, '200.180.153.2', 0, 0, '<b>TURISMO ECOLÓGICO</b>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/sec_turismo/faguense.jpg" width="434" height="336">\r\nA cascata da Faguense é um local muito visitado face a sua beleza e pela Gruta de Nossa Senhora de Lourdes.\r\n<br>\r\n\r\n<b>TURISMO RELIGIOSO</b>\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/catedral_externa.jpg" width="323" height="520">\r\nA imponente Catedral Ciocesana, de construção estilo neogótico, considerada uma das coisas mais belas e suntuosas do Estado.\r\n\r\n**** EM ATUALIZAÇÃO *******\r\n\r\n', ' ', 2833, 1, 1, 0, 'admin', 0, 'R', 0),
(35, 1, 'Conselho Municipal de Saúde', 1196094371, 1196062200, 0, '200.180.153.2', 0, 0, '<center><img src="http://www.fredericowestphalen.rs.gov.br/html/images/conselhosite.gif"></center>\r\n\r\nO Controle Social é a produção das “necessidades” da vida por seus próprios protagonistas, é partilhar poder, é a construção de um processo político-pedagógico de conquista de cidadania e fortalecimento da sociedade civil (SILVA, EGYDIO e SOUZA, 1999).\r\n\r\nO que é o Conselho Municipal de Saúde\r\nNeste contexto de construção de um sistema de saúde mais justo e democrático, há vários anos vem sendo discutido o Controle Social no contexto das Políticas e Programas de Saúde no Brasil, mas foi só na década de 80 com a proclamação da Constituição Federal onde é criado o Sistema Único de Saúde - SUS, que a recomendação da participação social passa a ser garantida.\r\nO Controle Social é uma forma de fiscalização da população civil mediante a formulação e implantação de Políticas e Programas de Saúde junto à comunidade. Assim, é indicado como um controle da população organizada em diversos segmentos sociais sobre o Estado, estando intrinsecamente associado às políticas sociais, já que o mesmo está ligado à cidadania, prometendo melhorias nas condições de vida da sociedade.\r\nO conceito “Controle Social” é originário do campo das ciências sociais e refere-se a “adaptação” ou a conferir um significado desviante à ação e tem lugar na interação informal ou através de agências especialmente concebidas para este fim. Trata-se de uma noção fortemente normativa e disciplinar relativa à vida em sociedade (GERSCHMAN, 2004).\r\nA participação popular passa a ser recomenda no ano de 1988, quando a Constituição Federal em seus artigos 196 e 200, criam o Sistema Único de Saúde. É a partir deste período que a participação social passa a ser considerada como uma das mais importantes conquistas para a construção de uma sociedade democrática e participativa e de um sistema de saúde mais justo com poder de influência na gestão e produção de Políticas de Saúde.\r\n	Todavia, o Controle Social passa a ser regulamentado pela Lei Orgânica da Saúde nº. 8.080/90, que após sofrer 25 vetos em decorrência da existência de artigos que incluam a participação social, foi complementada pela Lei 8.142/90 que torna legítimo as Conferências e Conselhos de Saúde como locais de formulação e fiscalização das Políticas de Saúde.\r\nOs Conselhos de Saúde são espaços de negociações, representando a descentralização e a participação social e buscando soluções para a população local, com objetivo de viabilizar um sistema de saúde mais democrático no âmbito nacional. Assim sendo, representam um espaço de participação da comunidade, no qual, tem origem uma nova cultura política e onde deve configurar-se a prática do diálogo, da contestação e da negociação em favor da democracia e da cidadania, com vistas à consolidação do processo democrático e à diminuição das desigualdades existentes (MOCINHO e SAUPE, 2000).\r\nO Conselho de Saúde é um local de negociação, sendo de sua competência indicar as prioridades para a implantação de Políticas de Saúde condizentes com a realidade de população. Assim, o Conselho torna efetiva a participação social, a qual corresponde à busca da população em prol de uma sociedade democrática e participativa, mediante sua atuação em tais fóruns de discussão.\r\nDessa maneira, os Conselhos de Saúde possuem o papel de tornar viável o Controle Social mediante a conjuntura de examinar e aprovar as diretrizes das Políticas e Programas de Saúde. Todavia, é através de tais fóruns que institucionalizou-se a participação social, problematizada frente às demandas da influência exercida.  \r\n	O Conselho é um espaço de negociação, cujo compromisso dos gestores e conselheiros é buscar soluções para os problemas da população local, tendo como perspectiva a democracia. Assim, a participação junto ao Conselho pelos seus membros deve ser ativa, pois só assim o conselheiro poderá atuar junto à elaboração de Políticas de Saúde que sejam condizentes com as reais necessidades da população, tal como é preconizado pela legislação.\r\n	O conselheiro é uma liderança dentro de sua comunidade, dessa forma deve atuar como um cidadão consciente e participante junto ás reuniões do Conselho de Saúde, deliberando e discutindo a cerca das questões pertinentes à saúde de sua comunidade. Nesse sentido, Carvalho (2003) coloca que o conselheiro deve atuar “postulando”, reclamando, fiscalizando, a sociedade exerce o Controle Social, participando da organização do SUS, por meio dos Conselhos de Saúde.\r\n	Adquirindo os conselheiros tais atribuições e responsabilidades, há necessidade de formar conselheiros juridicamente instrumentalizados para que possa atuar nos Conselhos de Saúde, tornando-os verdadeiros espaços de negociação entre os que gerenciam e prestam serviços no Sistema de Saúde, tendo como perspectiva a sua transformação democrática, bem como a firmação do SUS, na conjuntura nacional. Portanto, conforme Oliveira (2001) para atuar na elaboração e operacionalização de estratégias concernentes à saúde é imprescindível que sejam formados conselheiros cientes de suas atribuições legais. Sendo esses representantes natos no exercício de suas ações, serão capazes de atuar mediante a fiscalização, o planejamento e o acompanhamento do desenvolvimento de ações e serviços de saúde. \r\n	É através da participação que o cidadão assume um lugar de destaque, estando no centro das discussões políticas, fazendo com que o governo deixe de ser o comandante dessas decisões, que vem ao encontro de toda a população Assim, o Controle Social exercido pela população através da participação é forma de assumir sua cidadania, mediante a tomada de decisões a respeito da saúde de toda uma comunidade. \r\nPara tanto, os Conselhos de Saúde exercem o papel de viabilizar o Controle Social, visto que o mesmo deve possuir uma paridade entre o número de representantes dos usuários e o número total de representantes dos outros três segmentos (governo, profissionais de saúde e prestadores de serviço). Essa paridade é garantia de uma real realização do Controle Social sobre as Políticas de Saúde, sendo uma forma de participação da comunidade na gestão do SUS. Por isso, a composição dos Conselhos deve ser distribuída que 50% do número total de conselheiros serão de representantes dos usuários, enquanto que os outros 50% será dos outros segmentos, sendo este dividido, em 25% para trabalhadores de saúde e 25% para prestadores de serviços públicos e privados. (BRASIL, 1995).\r\nDessa maneira, através da potencializarão do exercício do Controle Social junto às comunidades por meio dos Conselhos de Saúde será possível avançarmos rumo à solidificação de um sistema de saúde mais justo e democrático a nível nacional. Portanto, será possível atuar na perspectiva da construção de Políticas e Programas de Saúde voltadas aos interesses da população, possibilitando assim, a concretização dos direitos sociais, individuais e coletivos. \r\nNeste sentido, o Conselho Municipal de Saúde de Frederico Westphalen foi criado pela Lei nº 1.812 de 14 de abril de 1994, com posteriores alterações promovidas pelas Leis nº 2.116 de 21 de março de 1997 e 2.293 de 22 de abril de 1999. Posteriormente no dia 22 de fevereiro de 2005 é formulada a Lei nº 2.900, a qual reformula a estruturação e composição do Conselho Municipal de Saúde de Frederico Westphalen.\r\n	Todavia, os Conselhos de Saúde indicam uma nova modalidade de relacionamento da sociedade com o Estado, sendo uma forma de fiscalização da população civil. Esta população deve se apropriar dos meios e instrumentos de planejamento, fiscalização e análise das ações para assim conseguir verdadeiramente atuar como fiscalizador das Políticas de Saúde adotadas em seus municípios.\r\n\r\n- Membros do Conselho Municipal de Saúde de Frederico Westphalen e respectivas entidades a que pertencem\r\n.\r\nHamilton Lara Medeiros;\r\nCarmem Grassi;\r\nAlessandra Regina Muller Germani;\r\nElíbia Michelon;\r\nElis R. de T. Boita;\r\nEvani Piovesan;\r\nFrancisco Cerutti;\r\nIliria Trevisol;\r\nJuarez Lemes; \r\nJucelaine Borsatto;\r\nLiléia Durigon; \r\nRoque Antonio Harmann;\r\nMarly Vendruscolo;\r\nMilton Rocha;\r\nNeila Rodrigues; \r\nNoeli Grobin;\r\nOsvaldo A. Dalla Nora;\r\nOtilia Tibolla;\r\nVanderlei B. de Lima;\r\nVanderlei Dallagnol; \r\nVera Cancian;\r\nWilson Ferigollo (Presidente do Conselho Municipal);\r\nWilson Pinheiro.\r\nMarcos Forquezatto – Presidente do Hospital de Caridade Divina Providência.\r\n\r\nAs reuniões do Conselho Municipal de Saúde de Frederico Westphalen ocorrem na terceira segunda-feira de cada mês às 18:00, junto à sede da Câmara de Vereadores do referido município. \r\nContamos com a presença de toda a comunidade.\r\n\r\nEntre em contato conosco por meio do e-mail: conselho.saude.yahoo.com.br\r\n\r\nColaboração textual:\r\nCAROLINE OTTOBELLI - Bolsista Voluntária de Extensão – caroline.ottobelli@yahoo.com.br\r\n\r\n', ' ', 1208, 1, 1, 1, 'admin', 0, 'R', 0),
(26, 1, 'Editais de Leilão', 1121170127, 1121094600, 0, '200.180.153.2', 0, 0, 'LEILÃO PARA VENDA DE BENS MÓVEIS DE PROPRIEDADE DO MUNICÍPIO DE FREDERICO WESTPHALEN <br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/leiloes/leilao_ 2007.pdf" target="_blank"> - Edital de Leilão 001/2007</a><br><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/leiloes/leilao001_2006CancelItem.htm" target="_blank"> - Edital de Leilão 001/2006 - <font color="red">Cancelamento de ítem</font> </a><br><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/leiloes/leilao001_2006.htm" target="_blank"> - Edital de Leilão 001/2006 </a><br><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/leilao.htm"> - Edital de Leilão 001/2005 </a><br><br>\r\n\r\n\r\n\r\n', ' ', 3343, 1, 0, 0, 'admin', 0, 'R', 0),
(27, 1, 'Incrições abertas para cursos.', 1145879851, 1145879962, 1149033000, '200.180.153.2', 0, 0, 'A Associação Comercial e Industrial e Prefeitura Municipal de Frederico Westphalen, juntamente com o SENAI-RS estão promovendo os seguintes cursos:\r\n\r\n', '   CURSO DE SOLDA MIG MAG.\r\n   Idade mínima 18 anos, saber ler e escrever\r\n   Carga horária: 60 horas aula\r\n   Número de participantes: 12 alunos\r\n   Turno: Noite\r\n   Início: 08 de Maio de 2006\r\n   Local: Escola Profissionalizante SENAI\r\n\r\n   CURSO BÁSICO DE CABELEIREIRO\r\n   OBJETIVO: Preparar recursos humanos para executar o trabalho de cabeleireiro empreendendo o seu proprio negócio.\r\n   Idade mínima de 16 anos, escolaridade ter 4ª série (1º grau)\r\n   Carga horária: 120 horas aula\r\n   Número de participantes por turma: 16 alunos\r\n   Turno: Tarde e Noite\r\n   Início: 22 de Maio de 2006\r\n   Local: Escola Profissionalizante SENAI\r\n\r\n   CURSO DE MONTAGEM E MANUTENÇÃO DE REDE LOCAL DE COMPUTADORES\r\n   Idade mínima 16 anos, 3 horas diárias\r\n   Carga horária: 60 horas aula\r\n   Turno: Tarde e Noite\r\n   Início: 29 de Maio de 2006\r\n   Local: Escola Profissionalizante SENAI\r\n\r\n\r\n   Continuamos recebendo incrsições para os seguintes cursos:\r\n   CURSO DE TRANSPORTE DE PASSAGEIROS,\r\n   CURSO DE TRANSPORTE DE EMERGÊNCIA,\r\n   CURSO DE CARGAS PERIGOSAS.\r\n\r\n\r\n   MAIORES INFORMAÇÕES E INCRIÇÃO NA ASSOCIAÇÃO COMERCIAL E INDUSTRIAL, SALA Nº 4, OU PELO FONE: 3744-7746.\r\n\r\nLembre-se: Capacitação Profissional gera Oportunidades!', 101, 1, 0, 1, 'admin', 0, 'R', 0),
(28, 1, 'Grupo Viramundos apresenta-se em Frederico Westphalen', 1146675549, 1146664800, 0, '200.180.153.2', 0, 0, 'O Grupo Viramundos da Universidade de Passo Fundo (UPF) apresenta nesta sexta-feira, 5 de maio,no município de Frederico Westphalen, o espetáculo "Timbre deGalo".', 'A encenação, baseada na obra Contos Gauchescos e Lendas do Sul, de João Simões Lopes Neto, é gratuita e tem início às 20 horas, em frente à Praça Central\r\nda cidade. O município,recebe a peça que, em 2005, arrebatou quatro prêmios no 19º Festival Universitário de Blumenau: melhor conjunto de atores, ator, figurino e melhor espetáculo.\r\n\r\n"Timbre de Galo", adaptado ao teatro por Roberto Mallet, reconta a história do gaúcho, as suas lutas, o tom romântico do campo, o humor e até mesmo o bolicho do interior. Pernas-de-pau, instrumentos de percussão, violões e figurinos que ilustram a pilcha gaudéria complementam a peça.\r\n\r\nO espetáculo tem o patrocínio de Grazziotin, Comercial Zaffari e RBSTV Passo Fundo. O apoio é da Simbiose Academia e Leis de Incentivo à Cultura do Ministério da Cultura e do Estado do Rio Grande do Sul.\r\n\r\nÁlvaro Henkes\r\nAssessoria de Imprensa \r\nGrupo Viramundos \r\nUniversidade de Passo Fundo (UPF)\r\n\r\nOutras informações sobre o Grupo Viramundos podem ser obtidas pelo telefone (54) 3316-8575 ou pelo site www.upf.br/viramundos.br.', 424, 1, 0, 1, 'admin', 0, 'R', 0),
(29, 1, 'Plano Diretor', 1163064644, 1163054400, 0, '200.180.153.2', 0, 0, 'Relatório do Plano Diretor Participativo', 'Leitura Comunitária\r\n\r\n1ª Etapa\r\n\r\nTemas prioritários, problemas e sugestões.\r\n\r\nAtendendo às normas do Estatuto das Cidades – Lei 10.257/01, o Plano Diretor de\r\nFrederico Westphalen está sendo elaborado de forma participativa e, também, como prevê a\r\nlei, está abrangendo todo o território do município (áreas urbanas e rurais).\r\n\r\nPara visualizar o relatório clique <a href="http://www.fredericowestphalen.rs.gov.br/html/planodiretor/relatorio.pdf"> aqui</a>.', 450, 1, 0, 1, 'admin', 0, 'R', 0);
INSERT INTO `xoops_stories` (`storyid`, `uid`, `title`, `created`, `published`, `expired`, `hostname`, `nohtml`, `nosmiley`, `hometext`, `bodytext`, `counter`, `topicid`, `ihome`, `notifypub`, `story_type`, `topicdisplay`, `topicalign`, `comments`) VALUES
(30, 1, 'Decreto ISS', 1167128433, 1176355200, 0, '200.180.153.2', 0, 0, '<a href="http://www.fredericowestphalen.rs.gov.br/html/fiscalizacao/DECRETO_177.pdf"> DECRETO FISCAL 177/2005 ISS E ANEXOS </a>tamanho 3.16 Mb<br>\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/leis/LM 2.794 - ISSQN.pdf"> LEI Nº 2.794, DE 17 DE DEZEMBRO DE 2003.</a><br>\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/leis/LM 2.890.pdf"> LEI Nº 2.890, DE 31 DE DEZEMBRO DE 2004.</a><br>\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/leis/LM_2.882.pdf"> LEI Nº 2.882, DE 15 DE DEZEMBRO DE 2004.</a><br>\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/leis/LM 2.996.pdf"> LEI N° 2.996, DE 21 DE DEZEMBRO DE 2005.</a><br>\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/leis/LM 3.008.pdf"> LEI Nº 3.008, DE 30 DE DEZEMBRO DE 2005.</a><br>\r\n<br>', ' ', 17878, 1, 1, 1, 'admin', 0, 'R', 0),
(31, 1, 'Licitações de 2006', 1169470985, 1169449800, 0, '200.180.153.2', 0, 0, 'Tomada de Preços nº 09/2006 -\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/tp_09_06.pdf"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/tp_09_06_anexo.pdf"> - Anexo </a><br>\r\n\r\nTomada de Preços nº 08/2006 -\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/tp_08_06.pdf"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/tp_08_06_anexo.html"> - Anexo </a><br>\r\n\r\nTomada de Preços nº 07/2006 -\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/tp_07_06.pdf"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/tp_07_06_anexo.html"> - Anexo </a><br>\r\n\r\nTomada de Preços nº 05/2006 -\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/retificacao_05_06.html"> - Retificação do Edital TP 05/2006</a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/tp_05_06.pdf"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/tp_05_06_anexo_b.html"> - Anexo </a><br>\r\n\r\nTomada de Preços nº 03/2006 -\r\n<a href="http://geocities.yahoo.com.br/roberto_fw/tp3.PDF"> - Edital </a>\r\n<a href="http://geocities.yahoo.com.br/roberto_fw/anexo_tp_3.html"> - Anexo </a><br>\r\n\r\nTomada de Preços nº 02/2006 - Medicamentos\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/edital_medicamentos_tp_02_06.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/anexo_tp_02_06.htm"> - Anexo </a>\r\n\r\nTomada de Preços nº 01/2006 - Asfalto\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/tomada_de_preco_edital_01-06.pdf"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/images/tp_anexo_01_06.htm"> - Anexo </a>\r\n\r\n\r\nDepartamento de Licitações\r\nPrefeitura Municipal de Frederico Westphalen - RS\r\n', ' ', 705, 1, 1, 1, 'admin', 0, 'R', 0),
(32, 1, 'Tomada de Preços 2007', 1190663249, 1190512800, 0, '200.180.153.2', 0, 0, 'Tomada de Preços nº 01/2007 -\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/tp_01_2007.pdf"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/tp_01_2007_anexo.pdf"> - Anexo </a><br>\r\n\r\nTomada de Preços nº 02/2007 -\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/tp_02_2007.pdf"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/tp_02_2007_anexo.pdf"> - Anexo </a><br>\r\n\r\n\r\nTomada de Preços nº 03/2007 \r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/tomada_preco3.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/anexotomadapreco3.pdf"> - Anexo  </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/anexo2tomadapreco3.pdf"> - Anexo I </a>\r\n\r\n\r\nTomada de Preços nº 04/2007 \r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/edital4/edital4.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/edital4/anexo1_4.PDF"> - Anexo  </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/edital4/minuta_asfalto.pdf"> - Minuta </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/edital4/projeto asfalto.pdf"> - Projeto </a>\r\n\r\n\r\nTomada de Preços nº 05/2007 \r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/edital5/edital5.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/edital5/anexo1_5.PDF"> - Anexo  </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/edital5/minuta_iluminacao.pdf"> - Minuta </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/edital5/projeto iluminacao.pdf"> - Projeto </a>\r\n\r\n\r\nTomada de Preços nº 06/2007 \r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/edital6/edital6.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/edital6/anexo2_6.PDF"> - Anexo I  </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/edital6/minuta_calcamento2.pdf"> - Minuta </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/edital6/projeto calcamento.pdf"> - Projeto </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/edital6/modelos_placa.pdf"> - Modelos de Placas </a>\r\n\r\n<BR>\r\n\r\nDepartamento de Licitações\r\nPrefeitura Municipal de Frederico Westphalen - RS\r\n\r\n', ' ', 1305, 1, 1, 1, 'admin', 0, 'R', 0),
(33, 1, 'Pregão Presencial 2007', 1190664187, 1190642400, 0, '200.180.153.2', 0, 0, 'PREGÃO PRESENCIAL Nº 1/2007\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/licitacao.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/anexo.PDF"> - Anexo </a>\r\n<BR>\r\nPREGÃO PRESENCIAL Nº 2/2007\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/pregao 02.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/anexo pregao 02.PDF"> - Anexo I </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/declaracao_pregao.pdf"> - Anexo II </a>\r\n<BR>\r\nPREGÃO PRESENCIAL Nº 3/2007\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/Pregao 3.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/Anexo I3.PDF"> - Anexo I </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/declaracao_pregao3.pdf"> - Anexo II </a>\r\n<BR>\r\nPREGÃO PRESENCIAL Nº 4/2007\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/edital_4.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/anexo_pregao4.PDF"> - Anexo I </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/declaracao_pregao.pdf"> - Anexo II </a>\r\n<BR>\r\nPREGÃO PRESENCIAL Nº 5/2007\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/pregao_edital5.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/pregao_anexo5.PDF"> - Anexo I </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/declaracao_pregao.pdf"> - Anexo II </a>\r\n<BR>\r\nPREGÃO PRESENCIAL Nº 6/2007\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/pregao6.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/anexo6.PDF"> - Anexo I </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/declaracao_pregao.pdf"> - Anexo II </a>\r\n<BR>\r\nDepartamento de Licitações\r\nPrefeitura Municipal de Frederico Westphalen - RS\r\n\r\n', ' ', 854, 1, 1, 1, 'admin', 0, 'R', 0),
(36, 1, 'Setor do Meio Ambiente', 1197044180, 1196774400, 0, '200.180.153.2', 0, 0, 'FORMULÁRIOS:\r\n\r\n1-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/CORTE_ARVORES_AREA_URBANA.doc">DOCUMENTOS EXIGIDOS PARA SOLICITAÇÃO DE AUTORIZAÇÃO PARA CORTE DE ÁRVORES NA ÁREA URBANA<br>\r\n2-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/Corte_Seletivo_de_Arvores_na_Area_Urbana.doc">FORMULÁRIO PARA AUTORIZAÇÃO DE CORTE  SELETIVO DE ÁRVORES NA ÁREA URBANA<br>\r\n3-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/Descapoeiramento_ate_25_ha.doc">FORMULÁRIO PARA LICENCIAMENTO DE DESCAPOEIRAMENTO (em propriedades com até 25 ha)<br>\r\n4-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/Descapoeiramento_maior_25_ha.doc">FORMULÁRIO PARA LICENCIAMENTO DE DESCAPOEIRAMENTO (em propriedades maiores que 25 ha)<br>\r\n5-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/canaliz_cursos_agua_Urbano.doc">CANALIZAÇÕES EM CURSOS DE ÁGUA SUPERFICIAL LOCALIZADOS EM ÁREAS URBANAS (EXCETO CANALIZAÇÕES EM LOTEAMENTOS/PARCELAMENTO DO SOLO)<br>\r\n6-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/form_obras_travessias_cursos_dagua.doc">Informações para Licenciamento de OBRAS DE TRAVESSIAS DE CURSOS D’ÁGUA EM ÁREAS URBANAS E ESTRADAS VICINAIS (PONTES, PONTILHÕES, GALERIAS, DUTOS).<br>\r\n7-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/Form_LP_Parc_Solo.doc">Informações Básicas para Licenciamento de PARCELAMENTO DE SOLO PARA FINS RESIDENCIAIS Licença Prévia<br>\r\n8-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/form_aquacultura.doc">Informações para Licenciamento para a atividade de AQUACULTURA<br>\r\n9-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/form_avicultura.doc">Formulário para licenciamento de ATIVIDADE DE AVICULTURA<br>\r\n10-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/form_bovinocult.doc">Formulário para licenciamento de ATIVIDADE DE BOVINOCULTURA<br>\r\n11-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/form_irrig_dren_acudagem.doc">Formulário para licenciamento de Obras de IRRIGAÇÃO/DRENAGEM/AÇUDAGEM<br>\r\n12-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/form_parques_areas_lazer.doc">Informações para Licenciamento de PARQUES E/OU ÁREAS DE LAZER<br>\r\n13-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/Inst.Solic.Doc.doc">Modelo - Instruções para Solicitação de Documento<br>\r\n14-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/LP.doc">DOCUMENTOS EXIGIDOS PARA ENCAMINHAMENTO DE LICENÇA PRÉVIA<br>\r\n15-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/Tabela_valores.doc">Tabela de Valores para os Serviços de Licenciamento Ambiental<br>\r\n16-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/form_suinocultura.doc">Formulário para Licenciamento de ATIVIDADE DE SUINOCULTURA<br>\r\n17-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/Class_Ativ_Licenciamento_FW.doc">TABELA DE CLASSIFICAÇÃO DE LICENCIAMENTO<br>\r\n18-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/form_serrarias.doc">Formulário de Serrarias<br>\r\n19-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/Corte_Seletivo_de_Arvores_ate_10m3.doc">Formulário para Corte Seletivo de Arvores até 10m3 (exceto na área urbana)<br>\r\n20-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/LP_LI.doc">Formulário de Atividades Industriais _ LP e LI<br>\r\n21-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/LO.doc">Formulário de Atividades Industriais _LO<br>\r\n22-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/Corte_Seletivo2.doc">Corte Seletivo de Até 2 Árvores<br>\r\n23-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/form_LP-LI_met.doc">Formulário LP-LI - Indústria Metalúrgica<br>\r\n24-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/form_LO_met.doc">Formulário LO - Indústria Metalúrgica<br>\r\n25-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/projeto_ex_form_ naturais.doc">Formulário - Projeto de Exótica em Formações Naturais<br>\r\n26-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/Form_Deposito_GLP_Classes_I_e_II.doc">Formulário Depósito GLP Classe I e II<br>\r\n27-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/form_Deposito_Quim_Sem_Manip.doc">Formulário Depósito Químico Sem Manipulação<br>\r\n28-<a href="http://www.fredericowestphalen.rs.gov.br/html/Meio Ambiente/form_isen_lic.doc">Formulário para solicitação de declaração de isenção de Licenciamento Ambiental.<br></a>\r\n\r\n\r\nSETOR DO MEIO AMBIENTE\r\nPREFEITURA MUNICIPAL DE FREDERICO WESTPHALEN - RS', ' ', 2008, 1, 1, 1, 'admin', 0, 'R', 0),
(37, 1, 'Notícias', 1200335623, 1200325200, 0, '200.180.153.2', 0, 0, 'Em construção !!!', ' ', 267, 1, 1, 1, 'admin', 0, 'R', 0),
(38, 1, 'Licitações 2007', 1200915786, 1200894600, 0, '200.180.153.2', 0, 0, '<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=32">TOMADA DE PREÇOS 2007\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=33">PREGÃO PRESENCIAL 2007\r\n', ' ', 631, 1, 1, 1, 'admin', 0, 'R', 0),
(39, 1, 'Tomada de Preços 2008', 1200915995, 1200376200, 0, '200.180.153.2', 0, 0, 'Tomada de Preços nº 01/2008 -\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_01-08.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_01-08.PDF"> - Anexo </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/modelo_declaracao.RTF"> - Modelo de Declaração </a><br>\r\n\r\n<b>Tomada de Preços nº 02/2008</b> - Contratação de empresa para execução, em regime de empreitada global, de ampliação da Escola Municipal Irmã Odila Maria Lenhen.\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital2.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo2.PDF"> - Anexo </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/minuta_2.RTF"> - Minuta de Contrato </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/Memorial escola odila.doc"> - Memorial Escola Odila </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/planilha.jpg"> - Planilha de Orçamento - parte 1 </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/planilha2.jpg"> - Planilha de Orçamento - parte 2 </a><br>\r\n\r\n<b>Tomada de Preços nº 03/2008</b> - Contratação de empresa para execução das obras de reforma da Praça do Barril no Município de Frederico Westphalen-RS.\r\n<br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/Retificacao03.doc"> <font size="4">- Retificação do Edital de Tomada de Preços </font> </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/tp03.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo1_tp03.PDF"> - Anexo </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/minuta_tp03.RTF"> - Minuta de Contrato </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/Memorial Praca Barril.doc"> - Memorial Praça Barril 1 </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/Memorial Praca Barril2.doc"> - Memorial Praça Barril 2</a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/tm3_1.jpg"> - Planilha de Orçamento - parte 1 </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/tm3_2.jpg"> - Planilha de Orçamento - parte 2 </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/tm3_3.jpg"> - Planilha de Orçamento - parte 3 </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/tm3_4.jpg"> - Planilha de Orçamento - parte 4 </a><br>\r\n<b>Tomada de Preços nº 04/2008</b> - Contratação de empresa para execução, em regime de empreitada global, de ampliação da Escola Municipal Irmã Odila Maria Lenhen.\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_tp04.PDF"> - Edital </font> </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_tp04.PDF"> - Anexo </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/minuta_tp04.RTF"> - Minuta de Contrato </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/Memorial escola odila.doc"> - Memorial Escola Odila </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/planilha.jpg"> - Planilha de Orçamento - parte 1 </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/planilha2.jpg"> - Planilha de Orçamento - parte 2 </a><br>\r\n<b>Tomada de Preços nº 05/2008</b> - Contratação de empresa, em regime de empreitada global, para adequação e conclusão do pavilhão destinado a abrigar a Secretaria Municipal de Obras e a Secretaria Municipal de Agricultura.\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_tp05.PDF"> - Edital </font> </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_tp05.PDF"> - Anexo </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/minuta_tp05.pdf"> - Minuta de Contrato </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/tp05_1.jpg"> - Planilha de Orçamento - parte 1 </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/tp05_2.jpg"> - Planilha de Orçamento - parte 2 </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/tp05-3.jpg"> - Planilha de Orçamento - parte 3 </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/cronograma.jpg"> - Cronograma Físico-Financeiro </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/Memorial obras.pdf"> - Memorial</a>\r\n<br>\r\n<b>Tomada de Preços nº 06/2008</b> - Aquisição de 1.038,17 toneladas de pedrisco, 112.646,35 litros de emulsão asfaltica RM 1C e 286,39 toneladas de areia grossa destinados ao recapeamento asfáltico (refilamento) a ser realizado em diversas ruas desta cidade...\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_tp06.PDF"> - Edital </font> </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/Anexo_tp06.PDF"> - Anexo </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/memorial_asfalto.pdf"> - Memorial </a>\r\nOrçamentos:\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/kennedy.pdf"> - Rua Presidente Kennedy </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/muniz_reis.pdf"> - Av. João Muniz Reis </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/miguel_couto.pdf"> - Rua Miguel Couto</a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/cerutti.pdf"> - Rua Santo Cerutti </a>\r\n<br>\r\n<b>Tomada de Preços nº 07/2008</b> - Contratação de empresa para aquisição de materiais e mão-de-obra para pavimentação asfáltica sobre calçamento nas Ruas Seringueira, Antonio Boscardin e Duque de Caxias...\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_tp07.PDF"> - Edital </font> </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_tp07.PDF"> - Anexo </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/memorial.jpg"> - Memorial de serviços a serem contratados... </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/memorial.pdf"> - Memorial</a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/memorial_descritivo.pdf"> - Memorial Descritivo</a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/orcamento2.jpg"> Orçamento - Rua Antonio Boscardin trecho entre a Av. Luiz Milani... </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/orcamento3.jpg"> Orçamento - Rua Duque de Caxias trecho entre a Rua Santo Cerutti... </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/orcamento1.pdf"> Orçamento - Rua das Seringueiras trecho entre a Rua Miguel Couto... </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/perfil_longitudinal.jpg"> Detalhe do Perfil Longitudinal </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/sargetas.jpg"> Detalhe das Sargetas de Meio-Fio </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/ruas1.jpg"> Detalhes das Ruas 1 </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/ruas2.jpg"> Detalhes das Ruas 2 </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/perfil.jpg"> Perfil </a>\r\n<br>\r\n<b>Tomada de Preços nº 08/2008</b> - Contratação de empresa para, em regime de empreitada global, construção de 24 (vinte e quatro) unidades habitacionais em Frederico Westphalen...\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_tp08.PDF"> - Edital </font> </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_tp08.PDF"> - Anexo </font> </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/Projeto_hab_tp08.pdf"> - Projeto Habitacional </font> </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/memoria_calculo_tp08.pdf"> - Memória de Cálculo </font> </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/Plano_trab_tp08.pdf"> - Plano de Trabalho - parte1 </font> </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/Plano_trab_parte2_tp08.pdf"> - Plano de Trabalho - parte2 </font> </a>\r\n<br>\r\n<b>Tomada de Preços nº 10/2008</b> - Aquisição de diversos medicamentos destinados a Farmácia Básica do Estado, Programa "Inverno Gaúcho" e Farmácia Básica da União.\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_tp10.PDF"> - Edital </font> </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_tp10.PDF"> - Anexo </font> </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/modelo_desistencia_tp10.RTF"> - Modelo de Desistência </font> </a>\r\n<br>\r\n<b>Tomada de Preços nº 11/2008</b> - Aquisição de diversos medicamentos destinados a Farmácia Básica do Município, Saúde Mental e Pactuação Bipartite e Triprtite.\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_tp11.PDF"> - Edital </font> </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_tp11.PDF"> - Anexo </font> </a>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', ' ', 4511, 1, 1, 1, 'admin', 0, 'R', 0),
(40, 1, 'Pregão Presencial 2008', 1200916042, 1200700200, 0, '200.180.153.2', 0, 0, 'Pregão Presencial nº 01/2008 - Contratação de empresa para aquisição de ônibus tipo turismo...\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/pregao1_08.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo01_08.PDF"> - Anexo </a><br>\r\n\r\nPregão Presencial nº 02/2008 - Aquisição de Usina Estacionária de Asfalto Pré Misturado a Frio (PMF).\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_pregao02.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_pregao02.PDF"> - Anexo </a>\r\n\r\nPregão Presencial nº 03/2008 - Contratação de empresa para aquisição de equipamentos e materiais permanentes odontológicos e ambulatoriais, destinados ao centro municipal de saúde de Frederico Westphalen\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_pregao03.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_pregao03.PDF"> - Anexo </a>\r\n\r\nPregão Presencial nº 04/2008 - Aquisição de 350.000(trezentos e cinqüenta mil) litros de óleo diesel para entrega na bomba do varejista na zona urbana\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_pregao04.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_pregao04.PDF"> - Anexo </a>\r\n\r\nPregão Presencial nº 05/2008 - Aquisição de cestas básicas para auxílio-alimentação destinadas aos servidores públicos municipais integrantes do quadro geral e do Magistério\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_pregao05.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_pregao05.PDF"> - Anexo </a>\r\n\r\nPregão Presencial nº 06/2008 - Contratação de empresa para aquisição de equipamentos destinados à ampliação da patrulha Agrícola\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_pregao06.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_pregao06.PDF"> - Anexo </a>\r\n\r\nPregão Presencial nº 07/2008 - Contratação de empresa para aquisição de materiais para a pavimentação asfáltica sobre calçamento nas Ruas Seringueira, Antonio Boscardin e Duque de Caxias...\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_pregao07.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_pregao07.PDF"> - Anexo </a>\r\n\r\nPregão Presencial nº 08/2008 - Aquisição de equipamentos para complementar estrutura de laboratórios a serem utilizados para análises e certificação da produção da agricultura familiar do território do Médio Alto Uruguai...\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_pregao08.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_pregao08.PDF"> - Anexo </a>\r\n\r\nPregão Presencial nº 11/2008 - Aquisição de equipamentos para complementar estrutura da agroindústria de vinho...\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_pregao11.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_pregao11.PDF"> - Anexo </a>\r\n\r\nPregão Presencial nº 13/2008 - Contratação de empresa para aquisição de materiais para a pavimentação asfáltica sobre calçamento na Avenida Maurício Cardoso, trecho compreendido entre a Rua São João e a BR 386...\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_pregao13.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_pregao13.PDF"> - Anexo </a>\r\n\r\nPregão Presencial nº 15/2008 - Aquisição de até 100 (cem) mil litros de gasolina comum para entrega na bomba do varejista na zona urbana, destinado aos veiculos deste Município.\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/edital_pregao15.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/anexo_pregao15.PDF"> - Anexo </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2008/minutacontrato_pregao15.RTF"> - Minuta do Contrato</a>\r\n\r\n\r\n', ' ', 2278, 1, 1, 1, 'admin', 0, 'R', 0),
(41, 1, 'Pregão Presencial 2009', 1233655556, 1233645000, 0, '189.10.176.130', 0, 0, 'Pregão 2009', ' ', 297, 1, 1, 1, 'admin', 0, 'R', 0),
(42, 1, 'Tomada de Preços 2009', 1233655625, 1233601800, 0, '189.10.176.130', 0, 0, '<b>Tomada de Preços nº 01/2009 </b> - Aquisição de diversos medicamentos destinados a Assistência Farmacêutica Básica da União, Estado e Município, CAPS, Saúde Mental e Pessoas Portadoras de Deficiência (PPD).\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2009/Edital TP01.PDF"> - Edital </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2009/Anexo_TP01.PDF"> - Anexo </a>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2009/Declaracao_desistencia.RTF"> - Declaração de Desistência </a><br>\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/editais/2009/Julgamento_TP01.RTF"> - Resultado do Julgamento da Documentação </a><br>\r\n\r\n', ' ', 421, 1, 1, 1, 'admin', 0, 'R', 0),
(43, 1, 'Licitações 2008', 1233655704, 1233623400, 0, '189.10.176.130', 0, 0, '<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=39">TOMADA DE PREÇOS 2008\r\n\r\n<a href="http://www.fredericowestphalen.rs.gov.br/html/modules/news/article.php?storyid=40">PREGÃO PRESENCIAL 2008\r\n', ' ', 88, 1, 1, 1, 'admin', 0, 'R', 0),
(44, 1, 'Carnval 2009 - Park Folia II', 1235592687, 1235571000, 0, '189.10.176.130', 0, 0, 'Acústicos e Valvulados\r\n\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/acusticos/acusticos1.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/acusticos/acusticos2.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/acusticos/acusticos3.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/acusticos/acusticos4.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/acusticos/acusticos5.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/acusticos/acusticos6.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/acusticos/acusticos7.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/acusticos/acusticos8.JPG">\r\n<br><br>\r\nTequila Baby\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Tequila/tequila1.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Tequila/tequila2.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Tequila/tequila3.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Tequila/tequila4.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Tequila/tequila5.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Tequila/tequila6.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Tequila/tequila7.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Tequila/tequila8.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Tequila/tequila9.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Tequila/tequila10.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Tequila/tequila11.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Tequila/tequila12.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Tequila/tequila13.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Tequila/tequila14.JPG">\r\n<br>\r\n<br>\r\nChocolate com Pimenta - BA\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Chocolate_pimenta/choc_pim1.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Chocolate_pimenta/choc_pim2.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Chocolate_pimenta/choc_pim3.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Chocolate_pimenta/choc_pim4.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Chocolate_pimenta/choc_pim5.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Chocolate_pimenta/choc_pim6.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Chocolate_pimenta/choc_pim7.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/Chocolate_pimenta/choc_pim8.JPG">\r\n<br>\r\n<br>\r\nBanho de espuma e Jato d´ água\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/banho_espuma/banho_esp1.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/banho_espuma/banho_esp2.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/banho_espuma/banho_esp3.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/banho_espuma/banho_esp4.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/banho_espuma/banho_esp5.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/banho_espuma/banho_esp6.JPG">\r\n<br>\r\n<img src="http://www.fredericowestphalen.rs.gov.br/html/images/fotos carnaval/banho_espuma/banho_esp7.JPG">\r\n<br>\r\n\r\n', ' ', 142, 1, 1, 1, 'admin', 0, 'R', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_stories_files`
--

CREATE TABLE IF NOT EXISTS `xoops_stories_files` (
  `fileid` int(8) unsigned NOT NULL auto_increment,
  `filerealname` varchar(255) NOT NULL default '',
  `storyid` int(8) unsigned NOT NULL default '0',
  `date` int(10) NOT NULL default '0',
  `mimetype` varchar(64) NOT NULL default '',
  `downloadname` varchar(255) NOT NULL default '',
  `counter` int(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`fileid`),
  KEY `storyid` (`storyid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `xoops_stories_files`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_topics`
--

CREATE TABLE IF NOT EXISTS `xoops_topics` (
  `topic_id` smallint(4) unsigned NOT NULL auto_increment,
  `topic_pid` smallint(4) unsigned NOT NULL default '0',
  `topic_imgurl` varchar(20) NOT NULL default '',
  `topic_title` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`topic_id`),
  KEY `pid` (`topic_pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `xoops_topics`
--

INSERT INTO `xoops_topics` (`topic_id`, `topic_pid`, `topic_imgurl`, `topic_title`) VALUES
(1, 0, 'xoops.gif', 'Frederico Westphalen');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_tplfile`
--

CREATE TABLE IF NOT EXISTS `xoops_tplfile` (
  `tpl_id` mediumint(7) unsigned NOT NULL auto_increment,
  `tpl_refid` smallint(5) unsigned NOT NULL default '0',
  `tpl_module` varchar(25) NOT NULL default '',
  `tpl_tplset` varchar(50) NOT NULL default '',
  `tpl_file` varchar(50) NOT NULL default '',
  `tpl_desc` varchar(255) NOT NULL default '',
  `tpl_lastmodified` int(10) unsigned NOT NULL default '0',
  `tpl_lastimported` int(10) unsigned NOT NULL default '0',
  `tpl_type` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`tpl_id`),
  KEY `tpl_refid` (`tpl_refid`,`tpl_type`),
  KEY `tpl_tplset` (`tpl_tplset`,`tpl_file`(10))
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=213 ;

--
-- Extraindo dados da tabela `xoops_tplfile`
--

INSERT INTO `xoops_tplfile` (`tpl_id`, `tpl_refid`, `tpl_module`, `tpl_tplset`, `tpl_file`, `tpl_desc`, `tpl_lastmodified`, `tpl_lastimported`, `tpl_type`) VALUES
(1, 1, 'system', 'default', 'system_imagemanager.html', '', 1099576705, 1099576705, 'module'),
(2, 1, 'system', 'default', 'system_imagemanager2.html', '', 1099576705, 1099576705, 'module'),
(3, 1, 'system', 'default', 'system_userinfo.html', '', 1099576705, 1099576705, 'module'),
(4, 1, 'system', 'default', 'system_userform.html', '', 1106332189, 1106332189, 'module'),
(5, 1, 'system', 'default', 'system_rss.html', '', 1099576705, 1099576705, 'module'),
(6, 1, 'system', 'default', 'system_redirect.html', '', 1099576705, 1099576705, 'module'),
(7, 1, 'system', 'default', 'system_comment.html', '', 1099576705, 1099576705, 'module'),
(8, 1, 'system', 'default', 'system_comments_flat.html', '', 1099576705, 1099576705, 'module'),
(9, 1, 'system', 'default', 'system_comments_thread.html', '', 1099576705, 1099576705, 'module'),
(10, 1, 'system', 'default', 'system_comments_nest.html', '', 1099576705, 1099576705, 'module'),
(11, 1, 'system', 'default', 'system_siteclosed.html', '', 1099576705, 1099576705, 'module'),
(12, 1, 'system', 'default', 'system_dummy.html', 'Dummy template file for holding non-template contents. This should not be edited.', 1099576705, 1099576705, 'module'),
(13, 1, 'system', 'default', 'system_notification_list.html', '', 1099576705, 1099576705, 'module'),
(14, 1, 'system', 'default', 'system_notification_select.html', '', 1099576705, 1099576705, 'module'),
(15, 1, 'system', 'default', 'system_block_user.html', 'Shows user block', 1099576705, 1099576705, 'block'),
(16, 2, 'system', 'default', 'system_block_login.html', 'Shows login form', 1099576705, 1099576705, 'block'),
(17, 3, 'system', 'default', 'system_block_search.html', 'Shows search form block', 1099576705, 1099576705, 'block'),
(18, 4, 'system', 'default', 'system_block_waiting.html', 'Shows contents waiting for approval', 1099576705, 1099576705, 'block'),
(19, 5, 'system', 'default', 'system_block_mainmenu.html', 'Shows the main navigation menu of the site', 1099576705, 1099576705, 'block'),
(20, 6, 'system', 'default', 'system_block_siteinfo.html', 'Shows basic info about the site and a link to Recommend Us pop up window', 1099576705, 1099576705, 'block'),
(21, 7, 'system', 'default', 'system_block_online.html', 'Displays users/guests currently online', 1099576705, 1099576705, 'block'),
(22, 8, 'system', 'default', 'system_block_topusers.html', 'Top posters', 1099576705, 1099576705, 'block'),
(23, 9, 'system', 'default', 'system_block_newusers.html', 'Shows most recent users', 1099576705, 1099576705, 'block'),
(24, 10, 'system', 'default', 'system_block_comments.html', 'Shows most recent comments', 1099576705, 1099576705, 'block'),
(25, 11, 'system', 'default', 'system_block_notification.html', 'Shows notification options', 1099576705, 1099576705, 'block'),
(26, 12, 'system', 'default', 'system_block_themes.html', 'Shows theme selection box', 1099576705, 1099576705, 'block'),
(79, 9, 'news', 'default', 'news_item.html', '', 1101463656, 0, 'module'),
(80, 9, 'news', 'default', 'news_archive.html', '', 1101463656, 0, 'module'),
(81, 9, 'news', 'default', 'news_article.html', '', 1101463657, 0, 'module'),
(82, 9, 'news', 'default', 'news_index.html', '', 1101463657, 0, 'module'),
(83, 9, 'news', 'default', 'news_by_topic.html', '', 1101463657, 0, 'module'),
(84, 51, 'news', 'default', 'news_block_topics.html', 'Shows news topics', 1101463657, 0, 'block'),
(85, 52, 'news', 'default', 'news_block_bigstory.html', 'Shows most read story of the day', 1101463657, 0, 'block'),
(86, 53, 'news', 'default', 'news_block_top.html', 'Shows top read news articles', 1101463657, 0, 'block'),
(87, 54, 'news', 'default', 'news_block_new.html', 'Shows recent articles', 1101463657, 0, 'block'),
(88, 55, 'news', 'default', 'news_block_moderate.html', 'Shows a block to moderate articles', 1101463657, 0, 'block'),
(89, 56, 'news', 'default', 'news_block_topicnav.html', 'Shows a block to navigate topics', 1101463657, 0, 'block'),
(182, 1, 'system', '26/04/2007', 'system_siteclosed.html', '', 1177635939, 0, 'module'),
(183, 1, 'system', '26/04/2007', 'system_dummy.html', 'Dummy template file for holding non-template contents. This should not be edited.', 1177635939, 0, 'module'),
(191, 6, 'system', '26/04/2007', 'system_block_siteinfo.html', 'Shows basic info about the site and a link to Recommend Us pop up window', 1177635939, 0, 'block'),
(184, 1, 'system', '26/04/2007', 'system_notification_list.html', '', 1177635939, 0, 'module'),
(185, 1, 'system', '26/04/2007', 'system_notification_select.html', '', 1177635939, 0, 'module'),
(186, 1, 'system', '26/04/2007', 'system_block_user.html', 'Shows user block', 1177635939, 0, 'block'),
(187, 2, 'system', '26/04/2007', 'system_block_login.html', 'Shows login form', 1177635939, 0, 'block'),
(188, 3, 'system', '26/04/2007', 'system_block_search.html', 'Shows search form block', 1177635939, 0, 'block'),
(189, 4, 'system', '26/04/2007', 'system_block_waiting.html', 'Shows contents waiting for approval', 1177635939, 0, 'block'),
(190, 5, 'system', '26/04/2007', 'system_block_mainmenu.html', 'Shows the main navigation menu of the site', 1177635939, 0, 'block'),
(75, 7, 'xoopspoll', 'default', 'xoopspoll_index.html', '', 1101206521, 0, 'module'),
(76, 7, 'xoopspoll', 'default', 'xoopspoll_view.html', '', 1101206521, 0, 'module'),
(77, 7, 'xoopspoll', 'default', 'xoopspoll_results.html', '', 1101206521, 0, 'module'),
(78, 39, 'xoopspoll', 'default', 'xoopspoll_block_poll.html', 'Shows unlimited number of polls/surveys', 1101206521, 0, 'block'),
(192, 7, 'system', '26/04/2007', 'system_block_online.html', 'Displays users/guests currently online', 1177635939, 0, 'block'),
(193, 7, 'xoopspoll', '26/04/2007', 'xoopspoll_index.html', '', 1177635939, 0, 'module'),
(194, 7, 'xoopspoll', '26/04/2007', 'xoopspoll_view.html', '', 1177635939, 0, 'module'),
(195, 7, 'xoopspoll', '26/04/2007', 'xoopspoll_results.html', '', 1177635939, 0, 'module'),
(196, 8, 'system', '26/04/2007', 'system_block_topusers.html', 'Top posters', 1177635939, 0, 'block'),
(197, 9, 'system', '26/04/2007', 'system_block_newusers.html', 'Shows most recent users', 1177635939, 0, 'block'),
(198, 9, 'news', '26/04/2007', 'news_item.html', '', 1177635939, 0, 'module'),
(199, 9, 'news', '26/04/2007', 'news_archive.html', '', 1177635939, 0, 'module'),
(200, 9, 'news', '26/04/2007', 'news_article.html', '', 1177635939, 0, 'module'),
(201, 9, 'news', '26/04/2007', 'news_index.html', '', 1177635939, 0, 'module'),
(202, 9, 'news', '26/04/2007', 'news_by_topic.html', '', 1177635939, 0, 'module'),
(203, 10, 'system', '26/04/2007', 'system_block_comments.html', 'Shows most recent comments', 1177635939, 0, 'block'),
(204, 11, 'system', '26/04/2007', 'system_block_notification.html', 'Shows notification options', 1177635939, 0, 'block'),
(205, 12, 'system', '26/04/2007', 'system_block_themes.html', 'Shows theme selection box', 1177635939, 0, 'block'),
(206, 39, 'xoopspoll', '26/04/2007', 'xoopspoll_block_poll.html', 'Shows unlimited number of polls/surveys', 1177635939, 0, 'block'),
(207, 51, 'news', '26/04/2007', 'news_block_topics.html', 'Shows news topics', 1177635939, 0, 'block'),
(208, 52, 'news', '26/04/2007', 'news_block_bigstory.html', 'Shows most read story of the day', 1177635939, 0, 'block'),
(209, 53, 'news', '26/04/2007', 'news_block_top.html', 'Shows top read news articles', 1177635939, 0, 'block'),
(210, 54, 'news', '26/04/2007', 'news_block_new.html', 'Shows recent articles', 1177635939, 0, 'block'),
(211, 55, 'news', '26/04/2007', 'news_block_moderate.html', 'Shows a block to moderate articles', 1177635939, 0, 'block'),
(212, 56, 'news', '26/04/2007', 'news_block_topicnav.html', 'Shows a block to navigate topics', 1177635939, 0, 'block'),
(181, 1, 'system', '26/04/2007', 'system_comments_nest.html', '', 1177635939, 0, 'module'),
(180, 1, 'system', '26/04/2007', 'system_comments_thread.html', '', 1177635939, 0, 'module'),
(178, 1, 'system', '26/04/2007', 'system_comment.html', '', 1177635939, 0, 'module'),
(179, 1, 'system', '26/04/2007', 'system_comments_flat.html', '', 1177635939, 0, 'module'),
(177, 1, 'system', '26/04/2007', 'system_redirect.html', '', 1177635939, 0, 'module'),
(176, 1, 'system', '26/04/2007', 'system_rss.html', '', 1177635939, 0, 'module'),
(175, 1, 'system', '26/04/2007', 'system_userform.html', '', 1177635939, 0, 'module'),
(174, 1, 'system', '26/04/2007', 'system_userinfo.html', '', 1177635939, 0, 'module'),
(173, 1, 'system', '26/04/2007', 'system_imagemanager2.html', '', 1177635939, 0, 'module'),
(172, 1, 'system', '26/04/2007', 'system_imagemanager.html', '', 1177635939, 0, 'module');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_tplset`
--

CREATE TABLE IF NOT EXISTS `xoops_tplset` (
  `tplset_id` int(7) unsigned NOT NULL auto_increment,
  `tplset_name` varchar(50) NOT NULL default '',
  `tplset_desc` varchar(255) NOT NULL default '',
  `tplset_credits` text NOT NULL,
  `tplset_created` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`tplset_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `xoops_tplset`
--

INSERT INTO `xoops_tplset` (`tplset_id`, `tplset_name`, `tplset_desc`, `tplset_credits`, `tplset_created`) VALUES
(1, 'default', 'XOOPS Default Template Set', '', 1099576705),
(4, '26/04/2007', '', '', 1177635939);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_tplsource`
--

CREATE TABLE IF NOT EXISTS `xoops_tplsource` (
  `tpl_id` mediumint(7) unsigned NOT NULL default '0',
  `tpl_source` mediumtext NOT NULL,
  KEY `tpl_id` (`tpl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `xoops_tplsource`
--

INSERT INTO `xoops_tplsource` (`tpl_id`, `tpl_source`) VALUES
(1, '<!DOCTYPE html PUBLIC ''//W3C//DTD XHTML 1.0 Transitional//EN'' ''http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd''>\r\n<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<{$xoops_langcode}>" lang="<{$xoops_langcode}>">\r\n<head>\r\n<meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset}>" />\r\n<meta http-equiv="content-language" content="<{$xoops_langcode}>" />\r\n<title><{$sitename}> <{$lang_imgmanager}></title>\r\n<script type="text/javascript">\r\n<!--//\r\nfunction appendCode(addCode) {\r\n	var targetDom = window.opener.xoopsGetElementById(''<{$target}>'');\r\n	if (targetDom.createTextRange && targetDom.caretPos){\r\n  		var caretPos = targetDom.caretPos;\r\n		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) \r\n== '' '' ? addCode + '' '' : addCode;  \r\n	} else if (targetDom.getSelection && targetDom.caretPos){\r\n		var caretPos = targetDom.caretPos;\r\n		caretPos.text = caretPos.text.charat(caretPos.text.length - 1)  \r\n== '' '' ? addCode + '' '' : addCode;\r\n	} else {\r\n		targetDom.value = targetDom.value + addCode;\r\n  	}\r\n	window.close();\r\n	return;\r\n}\r\n//-->\r\n</script>\r\n<style type="text/css" media="all">\r\nbody {margin: 0;}\r\nimg {border: 0;}\r\ntable {width: 100%; margin: 0;}\r\na:link {color: #3a76d6; font-weight: bold; background-color: transparent;}\r\na:visited {color: #9eb2d6; font-weight: bold; background-color: transparent;}\r\na:hover {color: #e18a00; background-color: transparent;}\r\ntable td {background-color: white; font-size: 12px; padding: 0; border-width: 0; vertical-align: top; font-family: Verdana, Arial, Helvetica, sans-serif;}\r\ntable#imagenav td {vertical-align: bottom; padding: 5px;}\r\ntable#imagemain td {border-right: 1px solid silver; border-bottom: 1px solid silver; padding: 5px; vertical-align: middle;}\r\ntable#imagemain th {border: 0; background-color: #2F5376; color:white; font-size: 12px; padding: 5px; vertical-align: top; text-align:center; font-family: Verdana, Arial, Helvetica, sans-serif;}\r\ntable#header td {width: 100%; background-color: #2F5376; vertical-align: middle;}\r\ntable#header td#headerbar {border-bottom: 1px solid silver; background-color: #dddddd;}\r\ndiv#pagenav {text-align:center;}\r\ndiv#footer {text-align:right; padding: 5px;}\r\n</style>\r\n</head>\r\n\r\n<body onload="window.resizeTo(<{$xsize}>, <{$ysize}>);">\r\n  <table id="header" cellspacing="0">\r\n    <tr>\r\n      <td><a href="<{$xoops_url}>/"><img src="<{$xoops_url}>/images/logo.gif" width="150" height="80" alt="" /></a></td><td> </td>\r\n    </tr>\r\n    <tr>\r\n      <td id="headerbar" colspan="2"> </td>\r\n    </tr>\r\n  </table>\r\n\r\n  <form action="imagemanager.php" method="get">\r\n    <table cellspacing="0" id="imagenav">\r\n      <tr>\r\n        <td>\r\n          <select name="cat_id" onchange="location=''<{$xoops_url}>/imagemanager.php?target=<{$target}>&cat_id=''+this.options[this.selectedIndex].value"><{$cat_options}></select> <input type="hidden" name="target" value="<{$target}>" /><input type="submit" value="<{$lang_go}>" />\r\n        </td>\r\n\r\n        <{if $show_cat > 0}>\r\n        <td align="right"><a href="<{$xoops_url}>/imagemanager.php?target=<{$target}>&op=upload&imgcat_id=<{$show_cat}>"><{$lang_addimage}></a></td>\r\n        <{/if}>\r\n\r\n      </tr>\r\n    </table>\r\n  </form>\r\n\r\n  <{if $image_total > 0}>\r\n\r\n  <table cellspacing="0" id="imagemain">\r\n    <tr>\r\n      <th><{$lang_imagename}></th>\r\n      <th><{$lang_image}></th>\r\n      <th><{$lang_imagemime}></th>\r\n      <th><{$lang_align}></th>\r\n    </tr>\r\n\r\n    <{section name=i loop=$images}>\r\n    <tr align="center">\r\n      <td><input type="hidden" name="image_id[]" value="<{$images[i].id}>" /><{$images[i].nicename}></td>\r\n      <td><img src="<{$images[i].src}>" alt="" /></td>\r\n      <td><{$images[i].mimetype}></td>\r\n      <td><a href="#" onclick="javascript:appendCode(''<{$images[i].lxcode}>'');"><img src="<{$xoops_url}>/images/alignleft.gif" alt="Left" /></a> <a href="#" onclick="javascript:appendCode(''<{$images[i].xcode}>'');"><img src="<{$xoops_url}>/images/aligncenter.gif" alt="Center" /></a> <a href="#" onclick="javascript:appendCode(''<{$images[i].rxcode}>'');"><img src="<{$xoops_url}>/images/alignright.gif" alt="Right" /></a></td>\r\n    </tr>\r\n    <{/section}>\r\n  </table>\r\n\r\n  <{/if}>\r\n\r\n  <div id="pagenav"><{$pagenav}></div>\r\n\r\n  <div id="footer">\r\n    <input value="<{$lang_close}>" type="button" onclick="javascript:window.close();" />\r\n  </div>\r\n\r\n  </body>\r\n</html>'),
(2, '<!DOCTYPE html PUBLIC ''//W3C//DTD XHTML 1.0 Transitional//EN'' ''http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd''>\r\n<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<{$xoops_langcode}>" lang="<{$xoops_langcode}>">\r\n<head>\r\n<meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset}>" />\r\n<meta http-equiv="content-language" content="<{$xoops_langcode}>" />\r\n<title><{$xoops_sitename}> <{$lang_imgmanager}></title>\r\n<{$image_form.javascript}>\r\n<style type="text/css" media="all">\r\nbody {margin: 0;}\r\nimg {border: 0;}\r\ntable {width: 100%; margin: 0;}\r\na:link {color: #3a76d6; font-weight: bold; background-color: transparent;}\r\na:visited {color: #9eb2d6; font-weight: bold; background-color: transparent;}\r\na:hover {color: #e18a00; background-color: transparent;}\r\ntable td {background-color: white; font-size: 12px; padding: 0; border-width: 0; vertical-align: top; font-family: Verdana, Arial, Helvetica, sans-serif;}\r\ntable#imagenav td {vertical-align: bottom; padding: 5px;}\r\ntd.body {padding: 5px; vertical-align: middle;}\r\ntd.caption {border: 0; background-color: #2F5376; color:white; font-size: 12px; padding: 5px; vertical-align: top; text-align:left; font-family: Verdana, Arial, Helvetica, sans-serif;}\r\ntable#imageform {border: 1px solid silver;}\r\ntable#header td {width: 100%; background-color: #2F5376; vertical-align: middle;}\r\ntable#header td#headerbar {border-bottom: 1px solid silver; background-color: #dddddd;}\r\ndiv#footer {text-align:right; padding: 5px;}\r\n</style>\r\n</head>\r\n\r\n<body onload="window.resizeTo(<{$xsize}>, <{$ysize}>);">\r\n  <table id="header" cellspacing="0">\r\n    <tr>\r\n      <td><a href="<{$xoops_url}>/"><img src="<{$xoops_url}>/images/logo.gif" width="150" height="80" alt="" /></a></td><td> </td>\r\n    </tr>\r\n    <tr>\r\n      <td id="headerbar" colspan="2"> </td>\r\n    </tr>\r\n  </table>\r\n\r\n  <table cellspacing="0" id="imagenav">\r\n    <tr>\r\n      <td align="left"><a href="<{$xoops_url}>/imagemanager.php?target=<{$target}>&cat_id=<{$show_cat}>"><{$lang_imgmanager}></a></td>\r\n    </tr>\r\n  </table>\r\n\r\n  <form name="<{$image_form.name}>" id="<{$image_form.name}>" action="<{$image_form.action}>" method="<{$image_form.method}>" <{$image_form.extra}>>\r\n    <table id="imageform" cellspacing="0">\r\n    <!-- start of form elements loop -->\r\n    <{foreach item=element from=$image_form.elements}>\r\n      <{if $element.hidden != true}>\r\n      <tr valign="top">\r\n        <td class="caption"><{$element.caption}></td>\r\n        <td class="body"><{$element.body}></td>\r\n      </tr>\r\n      <{else}>\r\n      <{$element.body}>\r\n      <{/if}>\r\n    <{/foreach}>\r\n    <!-- end of form elements loop -->\r\n    </table>\r\n  </form>\r\n\r\n\r\n  <div id="footer">\r\n    <input value="<{$lang_close}>" type="button" onclick="javascript:window.close();" />\r\n  </div>\r\n\r\n  </body>\r\n</html>'),
(3, '<{if $user_ownpage == true}>\r\n\r\n<form name="usernav" action="user.php" method="post">\r\n\r\n<br /><br />\r\n\r\n<table width="70%" align="center" border="0">\r\n  <tr align="center">\r\n    <td><input type="button" value="<{$lang_editprofile}>" onclick="location=''edituser.php''" />\r\n    <input type="button" value="<{$lang_avatar}>" onclick="location=''edituser.php?op=avatarform''" />\r\n    <input type="button" value="<{$lang_inbox}>" onclick="location=''viewpmsg.php''" />\r\n\r\n    <{if $user_candelete == true}>\r\n    <input type="button" value="<{$lang_deleteaccount}>" onclick="location=''user.php?op=delete''" />\r\n    <{/if}>\r\n\r\n    <input type="button" value="<{$lang_logout}>" onclick="location=''user.php?op=logout''" /></td>\r\n  </tr>\r\n</table>\r\n</form>\r\n\r\n<br /><br />\r\n<{elseif $xoops_isadmin != false}>\r\n\r\n<br /><br />\r\n\r\n<table width="70%" align="center" border="0">\r\n  <tr align="center">\r\n    <td><input type="button" value="<{$lang_editprofile}>" onclick="location=''<{$xoops_url}>/modules/system/admin.php?fct=users&uid=<{$user_uid}>&op=modifyUser''" />\r\n    <input type="button" value="<{$lang_deleteaccount}>" onclick="location=''<{$xoops_url}>/modules/system/admin.php?fct=users&op=delUser&uid=<{$user_uid}>''" />\r\n  </tr>\r\n</table>\r\n\r\n<br /><br />\r\n<{/if}>\r\n\r\n<table width="100%" border="0" cellspacing="5">\r\n  <tr valign="top">\r\n    <td width="50%">\r\n      <table class="outer" cellpadding="4" cellspacing="1" width="100%">\r\n        <tr>\r\n          <th colspan="2" align="center"><{$lang_allaboutuser}></th>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_avatar}></td>\r\n          <td align="center" class="even"><img src="<{$user_avatarurl}>" alt="Avatar" /></td>\r\n        </tr>\r\n        <tr>\r\n          <td class="head"><{$lang_realname}></td>\r\n          <td align="center" class="odd"><{$user_realname}></td>\r\n        </tr>\r\n        <tr>\r\n          <td class="head"><{$lang_website}></td>\r\n          <td class="even"><{$user_websiteurl}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_email}></td>\r\n          <td class="odd"><{$user_email}></td>\r\n        </tr>\r\n	<tr valign="top">\r\n          <td class="head"><{$lang_privmsg}></td>\r\n          <td class="even"><{$user_pmlink}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_icq}></td>\r\n          <td class="odd"><{$user_icq}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_aim}></td>\r\n          <td class="even"><{$user_aim}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_yim}></td>\r\n          <td class="odd"><{$user_yim}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_msnm}></td>\r\n          <td class="even"><{$user_msnm}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_location}></td>\r\n          <td class="odd"><{$user_location}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_occupation}></td>\r\n          <td class="even"><{$user_occupation}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_interest}></td>\r\n          <td class="odd"><{$user_interest}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_extrainfo}></td>\r\n          <td class="even"><{$user_extrainfo}></td>\r\n        </tr>\r\n      </table>\r\n    </td>\r\n    <td width="50%">\r\n      <table class="outer" cellpadding="4" cellspacing="1" width="100%">\r\n        <tr valign="top">\r\n          <th colspan="2" align="center"><{$lang_statistics}></th>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_membersince}></td>\r\n          <td align="center" class="even"><{$user_joindate}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_rank}></td>\r\n          <td align="center" class="odd"><{$user_rankimage}><br /><{$user_ranktitle}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_posts}></td>\r\n          <td align="center" class="even"><{$user_posts}></td>\r\n        </tr>\r\n	<tr valign="top">\r\n          <td class="head"><{$lang_lastlogin}></td>\r\n          <td align="center" class="odd"><{$user_lastlogin}></td>\r\n        </tr>\r\n      </table>\r\n      <br />\r\n      <table class="outer" cellpadding="4" cellspacing="1" width="100%">\r\n        <tr valign="top">\r\n          <th colspan="2" align="center"><{$lang_signature}></th>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="even"><{$user_signature}></td>\r\n        </tr>\r\n      </table>\r\n    </td>\r\n  </tr>\r\n</table>\r\n\r\n<!-- start module search results loop -->\r\n<{foreach item=module from=$modules}>\r\n\r\n<p>\r\n<h4><{$module.name}></h4>\r\n\r\n  <!-- start results item loop -->\r\n  <{foreach item=result from=$module.results}>\r\n\r\n  <img src="<{$result.image}>" alt="<{$module.name}>" /><b><a href="<{$result.link}>"><{$result.title}></a></b><br /><small>(<{$result.time}>)</small><br />\r\n\r\n  <{/foreach}>\r\n  <!-- end results item loop -->\r\n\r\n<{$module.showall_link}>\r\n</p>\r\n\r\n<{/foreach}>\r\n<!-- end module search results loop -->\r\n'),
(4, '<fieldset style="padding: 10px;">\r\n  <legend style="font-weight: bold;"><{$lang_login}></legend>\r\n  <form action="user.php" method="post">\r\n    <{$lang_username}> <input type="text" name="uname" size="26" maxlength="25" value="<{$usercookie}>" /><br />\r\n    <{$lang_password}> <input type="password" name="pass" size="21" maxlength="32" /><br />\r\n    <input type="hidden" name="op" value="login" />\r\n    <input type="hidden" name="xoops_redirect" value="<{$redirect_page}>" />\r\n    <input type="submit" value="<{$lang_login}>" />\r\n  </form>\r\n  <a name="lost"></a>\r\n  <div><{$lang_notregister}><br /></div>\r\n</fieldset>\r\n\r\n<br />\r\n\r\n<fieldset style="padding: 10px;">\r\n  <legend style="font-weight: bold;"><{$lang_lostpassword}></legend>\r\n  <div><br /><{$lang_noproblem}></div>\r\n  <form action="lostpass.php" method="post">\r\n    <{$lang_youremail}> <input type="text" name="email" size="26" maxlength="60" />&nbsp;&nbsp;<input type="hidden" name="op" value="mailpasswd" /><input type="submit" value="<{$lang_sendpassword}>" />\r\n  </form>\r\n</fieldset>'),
(5, '<?xml version="1.0" encoding="UTF-8"?>\r\n<rss version="2.0">\r\n  <channel>\r\n    <title><{$channel_title}></title>\r\n    <link><{$channel_link}></link>\r\n    <description><{$channel_desc}></description>\r\n    <lastBuildDate><{$channel_lastbuild}></lastBuildDate>\r\n    <docs>http://backend.userland.com/rss/</docs>\r\n    <generator><{$channel_generator}></generator>\r\n    <category><{$channel_category}></category>\r\n    <managingEditor><{$channel_editor}></managingEditor>\r\n    <webMaster><{$channel_webmaster}></webMaster>\r\n    <language><{$channel_language}></language>\r\n    <{if $image_url != ""}>\r\n    <image>\r\n      <title><{$channel_title}></title>\r\n      <url><{$image_url}></url>\r\n      <link><{$channel_link}></link>\r\n      <width><{$image_width}></width>\r\n      <height><{$image_height}></height>\r\n    </image>\r\n    <{/if}>\r\n    <{foreach item=item from=$items}>\r\n    <item>\r\n      <title><{$item.title}></title>\r\n      <link><{$item.link}></link>\r\n      <description><{$item.description}></description>\r\n      <pubDate><{$item.pubdate}></pubDate>\r\n      <guid><{$item.guid}></guid>\r\n    </item>\r\n    <{/foreach}>\r\n  </channel>\r\n</rss>'),
(6, '<html>\r\n<head>\r\n<meta http-equiv="Content-Type" content="text/html; charset=<{$xoops_charset}>" />\r\n<meta http-equiv="Refresh" content="<{$time}>; url=<{$url}>" />\r\n<title><{$xoops_sitename}></title>\r\n</head>\r\n<body>\r\n<div style="text-align:center; background-color: #EBEBEB; border-top: 1px solid #FFFFFF; border-left: 1px solid #FFFFFF; border-right: 1px solid #AAAAAA; border-bottom: 1px solid #AAAAAA; font-weight : bold;">\r\n  <h4><{$message}></h4>\r\n  <p><{$lang_ifnotreload}></p>\r\n</div>\r\n</body>\r\n</html>'),
(7, '<!-- start comment post -->\r\n        <tr>\r\n          <td class="head"><a id="comment<{$comment.id}>"></a> <{$comment.poster.uname}></td>\r\n          <td class="head"><div class="comDate"><span class="comDateCaption"><{$lang_posted}>:</span> <{$comment.date_posted}>&nbsp;&nbsp;<span class="comDateCaption"><{$lang_updated}>:</span> <{$comment.date_modified}></div></td>\r\n        </tr>\r\n        <tr>\r\n\r\n          <{if $comment.poster.id != 0}>\r\n\r\n          <td class="odd"><div class="comUserRank"><div class="comUserRankText"><{$comment.poster.rank_title}></div><img class="comUserRankImg" src="<{$xoops_upload_url}>/<{$comment.poster.rank_image}>" alt="" /></div><img class="comUserImg" src="<{$xoops_upload_url}>/<{$comment.poster.avatar}>" alt="" /><div class="comUserStat"><span class="comUserStatCaption"><{$lang_joined}>:</span> <{$comment.poster.regdate}></div><div class="comUserStat"><span class="comUserStatCaption"><{$lang_from}>:</span> <{$comment.poster.from}></div><div class="comUserStat"><span class="comUserStatCaption"><{$lang_posts}>:</span> <{$comment.poster.postnum}></div><div class="comUserStatus"><{$comment.poster.status}></div></td>\r\n\r\n          <{else}>\r\n\r\n          <td class="odd"> </td>\r\n\r\n          <{/if}>\r\n\r\n          <td class="odd">\r\n            <div class="comTitle"><{$comment.image}><{$comment.title}></div><div class="comText"><{$comment.text}></div>\r\n          </td>\r\n        </tr>\r\n        <tr>\r\n          <td class="even"></td>\r\n\r\n          <{if $xoops_iscommentadmin == true}>\r\n\r\n          <td class="even" align="right">\r\n            <a href="<{$editcomment_link}>&amp;com_id=<{$comment.id}>"><img src="<{$xoops_url}>/images/icons/edit.gif" alt="<{$lang_edit}>" /></a><a href="<{$deletecomment_link}>&amp;com_id=<{$comment.id}>"><img src="<{$xoops_url}>/images/icons/delete.gif" alt="<{$lang_delete}>" /></a><a href="<{$replycomment_link}>&amp;com_id=<{$comment.id}>"><img src="<{$xoops_url}>/images/icons/reply.gif" alt="<{$lang_reply}>" /></a>\r\n          </td>\r\n\r\n          <{elseif $xoops_isuser == true && $xoops_userid == $comment.poster.id}>\r\n\r\n          <td class="even" align="right">\r\n            <a href="<{$editcomment_link}>&amp;com_id=<{$comment.id}>"><img src="<{$xoops_url}>/images/icons/edit.gif" alt="<{$lang_edit}>" /></a><a href="<{$replycomment_link}>&amp;com_id=<{$comment.id}>"><img src="<{$xoops_url}>/images/icons/reply.gif" alt="<{$lang_reply}>" /></a>\r\n          </td>\r\n\r\n          <{elseif $xoops_isuser == true || $anon_canpost == true}>\r\n\r\n          <td class="even" align="right">\r\n            <a href="<{$replycomment_link}>&amp;com_id=<{$comment.id}>"><img src="<{$xoops_url}>/images/icons/reply.gif" alt="<{$lang_reply}>" /></a>\r\n          </td>\r\n\r\n          <{else}>\r\n\r\n          <td class="even"> </td>\r\n\r\n          <{/if}>\r\n\r\n        </tr>\r\n<!-- end comment post -->'),
(8, '<table class="outer" cellpadding="5" cellspacing="1">\r\n  <tr>\r\n    <th width="20%"><{$lang_poster}></td>\r\n    <th><{$lang_thread}></td>\r\n  </tr>\r\n  <{foreach item=comment from=$comments}>\r\n    <{include file="db:system_comment.html" comment=$comment}>\r\n  <{/foreach}>\r\n</table>'),
(9, '<{section name=i loop=$comments}>\r\n<br />\r\n<table cellspacing="1" class="outer">\r\n  <tr>\r\n    <th width="20%"><{$lang_poster}></th>\r\n    <th><{$lang_thread}></th>\r\n  </tr>\r\n  <{include file="db:system_comment.html" comment=$comments[i]}>\r\n</table>\r\n\r\n<{if $show_threadnav == true}>\r\n<div style="text-align:left; margin:3px; padding: 5px;">\r\n<a href="<{$comment_url}>"><{$lang_top}></a> | <a href="<{$comment_url}>&amp;com_id=<{$comments[i].pid}>&amp;com_rootid=<{$comments[i].rootid}>#newscomment<{$comments[i].pid}>"><{$lang_parent}></a>\r\n</div>\r\n<{/if}>\r\n\r\n<{if $comments[i].show_replies == true}>\r\n<!-- start comment tree -->\r\n<br />\r\n<table cellspacing="1" class="outer">\r\n  <tr>\r\n    <th width="50%"><{$lang_subject}></th>\r\n    <th width="20%" align="center"><{$lang_poster}></th>\r\n    <th align="right"><{$lang_posted}></th>\r\n  </tr>\r\n  <{foreach item=reply from=$comments[i].replies}>\r\n  <tr>\r\n    <td class="even"><{$reply.prefix}> <a href="<{$comment_url}>&amp;com_id=<{$reply.id}>&amp;com_rootid=<{$reply.root_id}>"><{$reply.title}></a></td>\r\n    <td class="odd" align="center"><{$reply.poster.uname}></td>\r\n    <td class="even" align="right"><{$reply.date_posted}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n</table>\r\n<!-- end comment tree -->\r\n<{/if}>\r\n\r\n<{/section}>'),
(10, '<{section name=i loop=$comments}>\r\n<br />\r\n<table cellspacing="1" class="outer">\r\n  <tr>\r\n    <th width="20%"><{$lang_poster}></th>\r\n    <th><{$lang_thread}></th>\r\n  </tr>\r\n  <{include file="db:system_comment.html" comment=$comments[i]}>\r\n</table>\r\n\r\n<!-- start comment replies -->\r\n<{foreach item=reply from=$comments[i].replies}>\r\n<br />\r\n<table cellspacing="0" border="0">\r\n  <tr>\r\n    <td width="<{$reply.prefix}>"></td>\r\n    <td>\r\n      <table class="outer" cellspacing="1">\r\n        <tr>\r\n          <th width="20%"><{$lang_poster}></th>\r\n          <th><{$lang_thread}></th>\r\n        </tr>\r\n        <{include file="db:system_comment.html" comment=$reply}>\r\n      </table>\r\n    </td>\r\n  </tr>\r\n</table>\r\n<{/foreach}>\r\n<!-- end comment tree -->\r\n<{/section}>'),
(11, '<!DOCTYPE html PUBLIC ''//W3C//DTD XHTML 1.0 Transitional//EN'' ''http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd''>\r\n<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<{$xoops_langcode}>" lang="<{$xoops_langcode}>">\r\n<head>\r\n<meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset}>" />\r\n<meta http-equiv="content-language" content="<{$xoops_langcode}>" />\r\n<title><{$xoops_sitename}></title>\r\n<link rel="stylesheet" type="text/css" media="all" href="<{$xoops_url}>/xoops.css" />\r\n\r\n</head>\r\n<body>\r\n  <table cellspacing="0">\r\n    <tr id="header">\r\n      <td style="width: 150px; background-color: #2F5376; vertical-align: middle; text-align:center;"><a href="<{$xoops_url}>/"><img src="<{$xoops_imageurl}>logo.gif" width="150" alt="" /></a></td>\r\n      <td style="width: 100%; background-color: #2F5376; vertical-align: middle; text-align:center;">&nbsp;</td>\r\n    </tr>\r\n    <tr>\r\n      <td style="height: 8px; border-bottom: 1px solid silver; background-color: #dddddd;" colspan="2">&nbsp;</td>\r\n    </tr>\r\n  </table>\r\n\r\n  <table cellspacing="1" align="center" width="80%" border="0" cellpadding="10px;">\r\n    <tr>\r\n      <td align="center"><div style="background-color: #DDFFDF; color: #136C99; text-align: center; border-top: 1px solid #DDDDFF; border-left: 1px solid #DDDDFF; border-right: 1px solid #AAAAAA; border-bottom: 1px solid #AAAAAA; font-weight: bold; padding: 10px;"><{$lang_siteclosemsg}></div></td>\r\n    </tr>\r\n  </table>\r\n  \r\n  <form action="<{$xoops_url}>/user.php" method="post">\r\n    <table cellspacing="0" align="center" style="border: 1px solid silver; width: 200px;">\r\n      <tr>\r\n        <th style="background-color: #2F5376; color: #FFFFFF; padding : 2px; vertical-align : middle;" colspan="2"><{$lang_login}></th>\r\n      </tr>\r\n      <tr>\r\n        <td style="padding: 2px;"><{$lang_username}></td><td style="padding: 2px;"><input type="text" name="uname" size="12" value="" /></td>\r\n      </tr>\r\n      <tr>\r\n        <td style="padding: 2px;"><{$lang_password}></td><td style="padding: 2px;"><input type="password" name="pass" size="12" /></td>\r\n      </tr>\r\n      <tr>\r\n        <td style="padding: 2px;">&nbsp;</td>\r\n        <td style="padding: 2px;"><input type="hidden" name="xoops_login" value="1" /><input type="submit" value="<{$lang_login}>" /></td>\r\n      </tr>\r\n    </table>\r\n  </form>\r\n\r\n  <table cellspacing="0" width="100%">\r\n    <td style="height:8px; border-bottom: 1px solid silver; border-top: 1px solid silver; background-color: #dddddd;" colspan="2">&nbsp;</td>\r\n  </table>\r\n\r\n  </body>\r\n</html>'),
(12, '<{$dummy_content}>'),
(13, '<h4><{$lang_activenotifications}></h4>\r\n<form name="notificationlist" action="notifications.php" method="post">\r\n<table class="outer">\r\n  <tr>\r\n    <th><input name="allbox" id="allbox" onclick="xoopsCheckGroup(''notificationlist'', ''allbox'', ''del_mod[]'');" type="checkbox" value="<{$lang_checkall}>" /></th>\r\n    <th><{$lang_event}></th>\r\n    <th><{$lang_category}></th>\r\n    <th><{$lang_itemid}></th>\r\n    <th><{$lang_itemname}></th>\r\n  </tr>\r\n  <{foreach item=module from=$modules}>\r\n  <tr>\r\n    <td class="head"><input name="del_mod[<{$module.id}>]" id="del_mod[]" onclick="xoopsCheckGroup(''notificationlist'', ''del_mod[<{$module.id}>]'', ''del_not[<{$module.id}>][]'');" type="checkbox" value="<{$module.id}>" /></td>\r\n    <td class="head" colspan="4"><{$lang_module}>: <{$module.name}></td>\r\n  </tr>\r\n  <{foreach item=category from=$module.categories}>\r\n  <{foreach item=item from=$category.items}>\r\n  <{foreach item=notification from=$item.notifications}>\r\n  <tr>\r\n    <{cycle values=odd,even assign=class}>\r\n    <td class="<{$class}>"><input type="checkbox" name="del_not[<{$module.id}>][]" id="del_not[<{$module.id}>][]" value="<{$notification.id}>" /></td>\r\n    <td class="<{$class}>"><{$notification.event_title}></td>\r\n    <td class="<{$class}>"><{$notification.category_title}></td>\r\n    <td class="<{$class}>"><{if $item.id != 0}><{$item.id}><{/if}></td>\r\n    <td class="<{$class}>"><{if $item.id != 0}><{if $item.url != ''''}><a href="<{$item.url}>"><{/if}><{$item.name}><{if $item.url != ''''}></a><{/if}><{/if}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n  <{/foreach}>\r\n  <{/foreach}>\r\n  <{/foreach}>\r\n  <tr>\r\n    <td class="foot" colspan="5">\r\n      <input type="submit" name="delete_cancel" value="<{$lang_cancel}>" />\r\n      <input type="reset" name="delete_reset" value="<{$lang_clear}>" />\r\n      <input type="submit" name="delete" value="<{$lang_delete}>" />\r\n    </td>\r\n  </tr>\r\n</table>\r\n</form>\r\n'),
(14, '<{if $xoops_notification.show}>\r\n<form name="notification_select" action="<{$xoops_notification.target_page}>" method="post">\r\n<h4 style="text-align:center;"><{$lang_activenotifications}></h4>\r\n<input type="hidden" name="not_redirect" value="<{$xoops_notification.redirect_script}>" />\r\n<table class="outer">\r\n  <tr><th colspan="3"><{$lang_notificationoptions}></th></tr>\r\n  <tr>\r\n    <td class="head"><{$lang_category}></td>\r\n    <td class="head"><input name="allbox" id="allbox" onclick="xoopsCheckAll(''notification_select'',''allbox'');" type="checkbox" value="<{$lang_checkall}>" /></td>\r\n    <td class="head"><{$lang_events}></td>\r\n  </tr>\r\n  <{foreach name=outer item=category from=$xoops_notification.categories}>\r\n  <{foreach name=inner item=event from=$category.events}>\r\n  <tr>\r\n    <{if $smarty.foreach.inner.first}>\r\n    <td class="even" rowspan="<{$smarty.foreach.inner.total}>"><{$category.title}></td>\r\n    <{/if}>\r\n    <td class="odd">\r\n    <{counter assign=index}>\r\n    <input type="hidden" name="not_list[<{$index}>][params]" value="<{$category.name}>,<{$category.itemid}>,<{$event.name}>" />\r\n    <input type="checkbox" id="not_list[]" name="not_list[<{$index}>][status]" value="1" <{if $event.subscribed}>checked="checked"<{/if}> />\r\n    </td>\r\n    <td class="odd"><{$event.caption}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n  <{/foreach}>\r\n  <tr>\r\n    <td class="foot" colspan="3" align="center"><input type="submit" name="not_submit" value="<{$lang_updatenow}>" /></td>\r\n  </tr>\r\n</table>\r\n<div align="center">\r\n<{$lang_notificationmethodis}>:&nbsp;<{$user_method}>&nbsp;&nbsp;[<a href="<{$editprofile_url}>"><{$lang_change}></a>]\r\n</div>\r\n</form>\r\n<{/if}>'),
(15, '<table cellspacing="0">\r\n  <tr>\r\n    <td id="usermenu">\r\n      <a class="menuTop" href="<{$xoops_url}>/user.php"><{$block.lang_youraccount}></a>\r\n      <a href="<{$xoops_url}>/edituser.php"><{$block.lang_editaccount}></a>\r\n      <a href="<{$xoops_url}>/notifications.php"><{$block.lang_notifications}></a>\r\n      <a href="<{$xoops_url}>/user.php?op=logout"><{$block.lang_logout}></a>\r\n      <{if $block.new_messages > 0}>\r\n        <a class="highlight" href="<{$xoops_url}>/viewpmsg.php"><{$block.lang_inbox}> (<span style="color:#ff0000; font-weight: bold;"><{$block.new_messages}></span>)</a>\r\n      <{else}>\r\n        <a href="<{$xoops_url}>/viewpmsg.php"><{$block.lang_inbox}></a>\r\n      <{/if}>\r\n\r\n      <{if $xoops_isadmin}>\r\n        <a href="<{$xoops_url}>/admin.php"><{$block.lang_adminmenu}></a>\r\n      <{/if}>\r\n    </td>\r\n  </tr>\r\n</table>\r\n'),
(16, '<form style="margin-top: 0px;" action="<{$xoops_url}>/user.php" method="post">\r\n    <{$block.lang_username}><br />\r\n    <input type="text" name="uname" size="12" value="<{$block.unamevalue}>" maxlength="25" /><br />\r\n    <{$block.lang_password}><br />\r\n    <input type="password" name="pass" size="12" maxlength="32" /><br />\r\n    <!-- <input type="checkbox" name="rememberme" value="On" class ="formButton" /><{$block.lang_rememberme}><br /> //-->\r\n    <input type="hidden" name="xoops_redirect" value="<{$xoops_requesturi}>" />\r\n    <input type="hidden" name="op" value="login" />\r\n    <input type="submit" value="<{$block.lang_login}>" /><br />\r\n    <{$block.sslloginlink}>\r\n</form>\r\n<a href="<{$xoops_url}>/user.php#lost"><{$block.lang_lostpass}></a>\r\n<br /><br />\r\n<a href="<{$xoops_url}>/register.php"><{$block.lang_registernow}></a>'),
(17, '<form style="margin-top: 0px;" action="<{$xoops_url}>/search.php" method="get">\r\n  <input type="text" name="query" size="14" /><input type="hidden" name="action" value="results" /><br /><input type="submit" value="<{$block.lang_search}>" />\r\n</form>\r\n<a href="<{$xoops_url}>/search.php"><{$block.lang_advsearch}></a>'),
(18, '<ul>\r\n  <{foreach item=module from=$block.modules}>\r\n  <li><a href="<{$module.adminlink}>"><{$module.lang_linkname}></a>: <{$module.pendingnum}></li>\r\n  <{/foreach}>\r\n</ul>'),
(19, '<table cellspacing="0">\r\n  <tr>\r\n    <td id="mainmenu">\r\n      <a class="menuTop" href="<{$xoops_url}>/"><{$block.lang_home}></a>\r\n      <!-- start module menu loop -->\r\n      <{foreach item=module from=$block.modules}>\r\n      <a class="menuMain" href="<{$xoops_url}>/modules/<{$module.directory}>/"><{$module.name}></a>\r\n        <{foreach item=sublink from=$module.sublinks}>\r\n          <a class="menuSub" href="<{$sublink.url}>"><{$sublink.name}></a>\r\n        <{/foreach}>\r\n      <{/foreach}>\r\n      <!-- end module menu loop -->\r\n    </td>\r\n  </tr>\r\n</table>'),
(20, '<table class="outer" cellspacing="0">\r\n\r\n  <{if $block.showgroups == true}>\r\n\r\n  <!-- start group loop -->\r\n  <{foreach item=group from=$block.groups}>\r\n  <tr>\r\n    <th colspan="2"><{$group.name}></th>\r\n  </tr>\r\n\r\n  <!-- start group member loop -->\r\n  <{foreach item=user from=$group.users}>\r\n  <tr>\r\n    <td class="even" valign="middle" align="center"><img src="<{$user.avatar}>" alt="" width="32" /><br /><a href="<{$xoops_url}>/userinfo.php?uid=<{$user.id}>"><{$user.name}></a></td><td class="odd" width="20%" align="right" valign="middle"><{$user.msglink}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n  <!-- end group member loop -->\r\n\r\n  <{/foreach}>\r\n  <!-- end group loop -->\r\n  <{/if}>\r\n</table>\r\n\r\n<br />\r\n\r\n<div style="margin: 3px; text-align:center;">\r\n  <img src="<{$block.logourl}>" alt="" border="0" /><br /><{$block.recommendlink}>\r\n</div>'),
(21, '<{$block.online_total}><br /><br /><{$block.lang_members}>: <{$block.online_members}><br /><{$block.lang_guests}>: <{$block.online_guests}><br /><br /><{$block.online_names}> <a href="javascript:openWithSelfMain(''<{$xoops_url}>/misc.php?action=showpopups&amp;type=online'',''Online'',420,350);"><{$block.lang_more}></a>'),
(22, '<table cellspacing="1" class="outer">\r\n  <{foreach item=user from=$block.users}>\r\n  <tr class="<{cycle values="even,odd"}>" valign="middle">\r\n    <td><{$user.rank}></td>\r\n    <td align="center">\r\n      <{if $user.avatar != ""}>\r\n      <img src="<{$user.avatar}>" alt="" width="32" /><br />\r\n      <{/if}>\r\n      <a href="<{$xoops_url}>/userinfo.php?uid=<{$user.id}>"><{$user.name}></a>\r\n    </td>\r\n    <td align="center"><{$user.posts}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n</table>\r\n'),
(23, '<table cellspacing="1" class="outer">\r\n  <{foreach item=user from=$block.users}>\r\n    <tr class="<{cycle values="even,odd"}>" valign="middle">\r\n      <td align="center">\r\n      <{if $user.avatar != ""}>\r\n      <img src="<{$user.avatar}>" alt="" width="32" /><br />\r\n      <{/if}>\r\n      <a href="<{$xoops_url}>/userinfo.php?uid=<{$user.id}>"><{$user.name}></a>\r\n      </td>\r\n      <td align="center"><{$user.joindate}></td>\r\n    </tr>\r\n  <{/foreach}>\r\n</table>\r\n'),
(24, '<table width="100%" cellspacing="1" class="outer">\r\n  <{foreach item=comment from=$block.comments}>\r\n  <tr class="<{cycle values="even,odd"}>">\r\n    <td align="center"><img src="<{$xoops_url}>/images/subject/<{$comment.icon}>" alt="" /></td>\r\n    <td><{$comment.title}></td>\r\n    <td align="center"><{$comment.module}></td>\r\n    <td align="center"><{$comment.poster}></td>\r\n    <td align="right"><{$comment.time}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n</table>'),
(25, '<form action="<{$block.target_page}>" method="post">\r\n<table class="outer">\r\n  <{foreach item=category from=$block.categories}>\r\n  <{foreach name=inner item=event from=$category.events}>\r\n  <{if $smarty.foreach.inner.first}>\r\n  <tr>\r\n    <td class="head" colspan="2"><{$category.title}></td>\r\n  </tr>\r\n  <{/if}>\r\n  <tr>\r\n    <td class="odd"><{counter assign=index}><input type="hidden" name="not_list[<{$index}>][params]" value="<{$category.name}>,<{$category.itemid}>,<{$event.name}>" /><input type="checkbox" name="not_list[<{$index}>][status]" value="1" <{if $event.subscribed}>checked="checked"<{/if}> /></td>\r\n    <td class="odd"><{$event.caption}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n  <{/foreach}>\r\n  <tr>\r\n    <td class="foot" colspan="2"><input type="hidden" name="not_redirect" value="<{$block.redirect_script}>"><input type="submit" name="not_submit" value="<{$block.submit_button}>" /></td>\r\n  </tr>\r\n</table>\r\n</form>'),
(26, '<div style="text-align: center;">\r\n<form action="index.php" method="post">\r\n<{$block.theme_select}>\r\n</form>\r\n</div>'),
(79, '<table cellpadding="0" cellspacing="0" class="item">\r\n    <tr>\r\n        <td>\r\n        <table cellpadding="0" cellspacing="0" width="98%">\r\n            <tbody>\r\n                <tr>\r\n                    <td class="itemHead">\r\n                        <span class="itemTitle"><{$story.title}></span>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td class="itemInfo">\r\n                        <{if $story.poster != ''''}><span class="itemPoster"><{$lang_postedby}> <{$story.poster}></span><{/if}>\r\n                        <span class="itemPostDate"><{$lang_on}> <{$story.posttime}></span> (<span class="itemStats"><{$story.hits}> <{$lang_reads}></span>)\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td><div class="itemBody">\r\n                            <{$story.imglink}>\r\n                            <p class="itemText"><{$story.text}></p>\r\n                        </div>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td class="itemFoot">\r\n                        <span class="itemAdminLink"><{$story.adminlink}></span>\r\n                        <span class="itemPermaLink"><{$story.morelink}></span>\r\n                    </td>\r\n                </tr>\r\n             </tbody>\r\n         </table>\r\n      </td>\r\n  </tr>\r\n</table>'),
(78, '<{foreach item=poll from=$block.polls}>\r\n<form style="margin-top: 1px;" action="<{$xoops_url}>/modules/xoopspoll/index.php" method="post">\r\n<table class="outer" cellspacing="1">\r\n  <tr>\r\n    <th align="center" colspan="2"><input type="hidden" name="poll_id" value="<{$poll.id}>" /><{$poll.question}></th>\r\n  </tr>\r\n\r\n  <{foreach item=option from=$poll.options}>\r\n  <tr class="<{cycle values="even,odd"}>">\r\n    <td align="center"><input type="<{$poll.option_type}>" name="<{$poll.option_name}>" value="<{$option.id}>" /></td>\r\n    <td align="left"><{$option.text}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n\r\n  <tr>\r\n    <td class="foot" align="center" colspan="2"><input type="submit" value="<{$block.lang_vote}>" /> <input type="button" value="<{$block.lang_results}>" onclick="location=''<{$xoops_url}>/modules/xoopspoll/pollresults.php?poll_id=<{$poll.id}>''" /></td>\r\n  </tr>\r\n</table>\r\n</form>\r\n<{/foreach}>'),
(212, '<table cellspacing="0">\r\n    <tr>\r\n        <td id="mainmenu">\r\n            <{foreach item=topic from=$block.topics}>\r\n                <a class="menuMain" href="<{$xoops_url}>/modules/news/index.php?storytopic=<{$topic.id}>"><{$topic.title}></a>\r\n            <{/foreach}>\r\n        </td>\r\n    </tr>\r\n</table>'),
(211, '<table class="outer" cellspacing="1">\r\n  <tr>\r\n    <th align="center"><{$block.lang_story_title}></th>\r\n    <th align="center"><{$block.lang_story_topic}></th>\r\n    <th align="center"><{$block.lang_story_date}></th>\r\n    <th align="center"><{$block.lang_story_author}></th>\r\n    <th align="center"><{$block.lang_story_action}></th>\r\n  </tr>\r\n\r\n  <{foreach item=news from=$block.stories}>\r\n  <tr class="<{cycle values="even,odd"}>">\r\n    <td align="left"><{$news.title}></td>\r\n    <td align="left"><{$news.topic_title}></td>\r\n    <td align="center"><{$news.date}></td>\r\n    <td align="left"><{$news.author}></td>\r\n    <td align="center"><{$news.action}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n</table>'),
(80, '<table>\r\n  <tr>\r\n    <th><{$lang_newsarchives}></th>\r\n  </tr>\r\n\r\n<{foreach item=year from=$years}>\r\n<{foreach item=month from=$year.months}>\r\n\r\n  <tr class="even">\r\n    <td><a href="./archive.php?year=<{$year.number}>&amp;month=<{$month.number}>"><{$month.string}> <{$year.number}></a></td>\r\n  </tr>\r\n\r\n<{/foreach}>\r\n<{/foreach}>\r\n\r\n</table>\r\n\r\n<{if $show_articles == true}>\r\n\r\n<table>\r\n  <tr>\r\n    <th><{$lang_articles}></th><th align="center"><{$lang_actions}></th><th align="center"><{$lang_views}></th><th align="center"><{$lang_date}></th>\r\n  </tr>\r\n\r\n  <{foreach item=story from=$stories}>\r\n\r\n  <tr class="<{cycle values="even,odd"}>">\r\n    <td><{$story.title}></td><td align="center"><a href="<{$story.print_link}>"><img src="images/print.gif" alt="<{$lang_printer}>" /></a> <a href="<{$story.mail_link}>" target="_top" /><img src="images/friend.gif" alt="<{$lang_sendstory}>" /></td><td align="center"><{$story.counter}></td><td align="center"><{$story.date}></td>\r\n  </tr>\r\n\r\n  <{/foreach}>\r\n\r\n</table>\r\n\r\n<div>\r\n<{$lang_storytotal}>\r\n</div>\r\n\r\n<{/if}>'),
(81, '<div style="text-align: left; margin: 10px;"><{if $pagenav}>Page <{$pagenav}><{/if}></div>\r\n\r\n<div style="padding: 3px; margin-right:3px;"><{include file="db:news_item.html" story=$story}></div>\r\n\r\n<{if $attached_files_count>0}>\r\n	<div class="itemInfo"><{$lang_attached_files}>\r\n		<{foreach item=onefile from=$attached_files}>\r\n			<a href=''<{$onefile.visitlink}>'' target=''_blank''><{$onefile.file_realname}></a>&nbsp;\r\n		<{/foreach}>\r\n	</div>\r\n<{/if}>\r\n\r\n<div style="text-align: left; margin: 10px;"><{if $pagenav}>Page <{$pagenav}><{/if}></div>\r\n\r\n<div style="padding: 5px; text-align: right; margin-right:3px;">\r\n	<a href="print.php?storyid=<{$story.id}>"><img src="images/print.gif" border="0" alt="<{$lang_printerpage}>" /></a> <a target="_top" href="<{$mail_link}>"><img src="images/friend.gif" border="0" alt="<{$lang_sendstory}>" /></a>\r\n</div>\r\n\r\n<div style="text-align: center; padding: 3px; margin:3px;">\r\n	<{$commentsnav}>\r\n	<{$lang_notice}>\r\n</div>\r\n\r\n<div style="margin:3px; padding: 3px;">\r\n<!-- start comments loop -->\r\n<{if $comment_mode == "flat"}>\r\n	<{include file="db:system_comments_flat.html"}>\r\n<{elseif $comment_mode == "thread"}>\r\n	<{include file="db:system_comments_thread.html"}>\r\n<{elseif $comment_mode == "nest"}>\r\n	<{include file="db:system_comments_nest.html"}>\r\n<{/if}>\r\n<!-- end comments loop -->\r\n</div>\r\n<{include file=''db:system_notification_select.html''}>'),
(82, '<{if $displaynav == true}>\r\n  <div style="text-align: center;">\r\n    <form name="form1" action="index.php" method="get">\r\n    <{$topic_select}> <select name="storynum"><{$storynum_options}></select> <input type="submit" value="<{$lang_go}>" class="formButton" /></form>\r\n  <hr />\r\n  </div>\r\n<{/if}>\r\n\r\n<div style="margin: 10px;"><{$pagenav}></div>\r\n<table width=100% border=0>\r\n    <tr>\r\n        <!-- start news item loop -->\r\n        <{section name=i loop=$columns}>\r\n            <td width="<{$columnwidth}>%">\r\n                <{foreach item=story from=$columns[i]}>\r\n                    <{include file="db:news_item.html" story=$story}>\r\n                <{/foreach}>\r\n            </td>\r\n        <{/section}>\r\n    </tr>\r\n</table>\r\n\r\n<div style="text-align: right; margin: 10px;"><{$pagenav}></div>\r\n<{include file=''db:system_notification_select.html''}>'),
(83, '<div class="item">\r\n<table width=100% border=0>\r\n    <tr>\r\n        <{section name=i loop=$columns}>\r\n            <td width="<{$columnwidth}>%" valign="top">\r\n                <!-- start topic loop -->\r\n                <{foreach item=topic from=$columns[i]}>\r\n                    <div class="itemBody">\r\n                    <div class="itemInfo"><span class="itemText"><a href="<{$xoops_url}>/modules/news/index.php?storytopic=<{$topic.id}>"><{$topic.title}></a></span></div>\r\n                    <!-- start news item loop -->\r\n                    <{counter start=0 print=false assign=storynum}>\r\n                    <{foreach item=story from=$topic.stories}>\r\n                      <{if $storynum == 0}>\r\n                        <{include file="db:news_item.html" story=$story}>\r\n                        <br />\r\n                      <{else}>\r\n                        <{if $storynum == 1}>\r\n                            <ul>\r\n                        <{/if}>\r\n                        <li><a href="<{$xoops_url}>/modules/news/article.php?storyid=<{$story.id}>"><{$story.title}></a> (<{$story.posttime}>)</li>\r\n                      <{/if}>\r\n                      <{counter}>\r\n                    <{/foreach}>\r\n                    <{if $storynum > 1}>\r\n                        </ul>\r\n                        <a href="<{$xoops_url}>/modules/news/index.php?storytopic=<{$topic.id}>"><{$lang_morereleases}><{$topic.title}></a>\r\n                    <{/if}>\r\n                    </div>\r\n                    <br />\r\n                    <!-- end news item loop -->\r\n                <{/foreach}>\r\n            </td>\r\n        <{/section}>\r\n    </tr>\r\n</table>\r\n<!-- end topic loop -->\r\n</div>\r\n<{include file=''db:system_notification_select.html''}>'),
(75, '<h4><{$lang_pollslist}></h4>\r\n\r\n<table width="100%" class="outer" cellspacing=''1''>\r\n  <tr>\r\n    <th><{$lang_pollquestion}></th>\r\n    <th align=''center''><{$lang_pollvoters}></th>\r\n    <th align=''center''><{$lang_votes}></th>\r\n    <th align=''center''><{$lang_expiration}></th>\r\n    <th>&nbsp;</th>\r\n  </tr>\r\n\r\n<!-- start polls item loop -->\r\n<{section name=i loop=$polls}>\r\n  <tr>\r\n    <td class="even"><{$polls[i].pollQuestion}></td>\r\n    <td align="center" class="odd"><{$polls[i].pollVoters}></td>\r\n    <td align="center" class="even"><{$polls[i].pollVotes}></td>\r\n    <td align="center" class="odd"><{$polls[i].pollEnd}></td>\r\n    <td align="right" class="even"><a href="pollresults.php?poll_id=<{$polls[i].pollId}>"><{$lang_results}></a></td>\r\n  </tr>\r\n<{/section}>\r\n<!-- end polls item loop -->\r\n\r\n</table>'),
(76, '<form action="<{$poll.action}>" method="post">\r\n  <table width="100%" class="outer" cellspacing="1">\r\n    <tr>\r\n      <th align="center" colspan="2"><input type="hidden" name="poll_id" value="<{$poll.pollId}>" /><{$poll.question}></th>\r\n    </tr>\r\n\r\n    <{foreach item=option from=$poll.options}>\r\n	<tr>\r\n      <td class="even" align="left" width="2%"><{$option.input}></td>\r\n      <td class="odd" align="left" width="98%"><{$option.text}></td>\r\n    </tr>\r\n    <{/foreach}>\r\n\r\n	<tr>\r\n      <td align="center" colspan="2" class="foot"><input type="submit" value="<{$lang_vote}>" />&nbsp;<input type="button" value="<{$lang_results}>" onclick="location=''<{$poll.viewresults}>''" /></td>\r\n    </tr>\r\n  </table>\r\n</form>'),
(77, '<div style=''text-align: center; margin: 3px;''>\r\n<table width="60%" class="outer" cellspacing="1">\r\n  <tr>\r\n    <th colspan="2"><{$poll.question}></th>\r\n  </tr>\r\n  <tr>\r\n    <td class="head" align="right" colspan="2">\r\n    <{$poll.end_text}>\r\n    </td>\r\n  </tr>\r\n\r\n  <{foreach item=option from=$poll.options}>\r\n  <tr>\r\n    <td class="even" width="30%" align="left">\r\n    <{$option.text}>\r\n    </td>\r\n    <td class="odd" width="70%" align="left">\r\n    <{$option.image}> <{$option.percent}>\r\n    </td>\r\n  </tr>\r\n  <{/foreach}>\r\n  <tr>\r\n    <td class="foot" colspan="2" align="center">\r\n      <{$poll.totalVotes}><br /><{$poll.totalVoters}><br /><{$poll.vote}>\r\n    </td>\r\n  </tr>\r\n</table>\r\n</div>\r\n<br />\r\n\r\n<div style="text-align:center; padding: 3px; margin:3px;">\r\n  <{$commentsnav}>\r\n  <{$lang_notice}>\r\n</div>\r\n\r\n<div style="margin:3px; padding: 3px;">\r\n<!-- start comments loop -->\r\n<{if $comment_mode == "flat"}>\r\n  <{include file="db:system_comments_flat.html"}>\r\n<{elseif $comment_mode == "thread"}>\r\n  <{include file="db:system_comments_thread.html"}>\r\n<{elseif $comment_mode == "nest"}>\r\n  <{include file="db:system_comments_nest.html"}>\r\n<{/if}>\r\n<!-- end comments loop -->\r\n</div>'),
(173, '<!DOCTYPE html PUBLIC ''//W3C//DTD XHTML 1.0 Transitional//EN'' ''http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd''>\r\n<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<{$xoops_langcode}>" lang="<{$xoops_langcode}>">\r\n<head>\r\n<meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset}>" />\r\n<meta http-equiv="content-language" content="<{$xoops_langcode}>" />\r\n<title><{$xoops_sitename}> <{$lang_imgmanager}></title>\r\n<{$image_form.javascript}>\r\n<style type="text/css" media="all">\r\nbody {margin: 0;}\r\nimg {border: 0;}\r\ntable {width: 100%; margin: 0;}\r\na:link {color: #3a76d6; font-weight: bold; background-color: transparent;}\r\na:visited {color: #9eb2d6; font-weight: bold; background-color: transparent;}\r\na:hover {color: #e18a00; background-color: transparent;}\r\ntable td {background-color: white; font-size: 12px; padding: 0; border-width: 0; vertical-align: top; font-family: Verdana, Arial, Helvetica, sans-serif;}\r\ntable#imagenav td {vertical-align: bottom; padding: 5px;}\r\ntd.body {padding: 5px; vertical-align: middle;}\r\ntd.caption {border: 0; background-color: #2F5376; color:white; font-size: 12px; padding: 5px; vertical-align: top; text-align:left; font-family: Verdana, Arial, Helvetica, sans-serif;}\r\ntable#imageform {border: 1px solid silver;}\r\ntable#header td {width: 100%; background-color: #2F5376; vertical-align: middle;}\r\ntable#header td#headerbar {border-bottom: 1px solid silver; background-color: #dddddd;}\r\ndiv#footer {text-align:right; padding: 5px;}\r\n</style>\r\n</head>\r\n\r\n<body onload="window.resizeTo(<{$xsize}>, <{$ysize}>);">\r\n  <table id="header" cellspacing="0">\r\n    <tr>\r\n      <td><a href="<{$xoops_url}>/"><img src="<{$xoops_url}>/images/logo.gif" width="150" height="80" alt="" /></a></td><td> </td>\r\n    </tr>\r\n    <tr>\r\n      <td id="headerbar" colspan="2"> </td>\r\n    </tr>\r\n  </table>\r\n\r\n  <table cellspacing="0" id="imagenav">\r\n    <tr>\r\n      <td align="left"><a href="<{$xoops_url}>/imagemanager.php?target=<{$target}>&cat_id=<{$show_cat}>"><{$lang_imgmanager}></a></td>\r\n    </tr>\r\n  </table>\r\n\r\n  <form name="<{$image_form.name}>" id="<{$image_form.name}>" action="<{$image_form.action}>" method="<{$image_form.method}>" <{$image_form.extra}>>\r\n    <table id="imageform" cellspacing="0">\r\n    <!-- start of form elements loop -->\r\n    <{foreach item=element from=$image_form.elements}>\r\n      <{if $element.hidden != true}>\r\n      <tr valign="top">\r\n        <td class="caption"><{$element.caption}></td>\r\n        <td class="body"><{$element.body}></td>\r\n      </tr>\r\n      <{else}>\r\n      <{$element.body}>\r\n      <{/if}>\r\n    <{/foreach}>\r\n    <!-- end of form elements loop -->\r\n    </table>\r\n  </form>\r\n\r\n\r\n  <div id="footer">\r\n    <input value="<{$lang_close}>" type="button" onclick="javascript:window.close();" />\r\n  </div>\r\n\r\n  </body>\r\n</html>');
INSERT INTO `xoops_tplsource` (`tpl_id`, `tpl_source`) VALUES
(174, '<{if $user_ownpage == true}>\r\n\r\n<form name="usernav" action="user.php" method="post">\r\n\r\n<br /><br />\r\n\r\n<table width="70%" align="center" border="0">\r\n  <tr align="center">\r\n    <td><input type="button" value="<{$lang_editprofile}>" onclick="location=''edituser.php''" />\r\n    <input type="button" value="<{$lang_avatar}>" onclick="location=''edituser.php?op=avatarform''" />\r\n    <input type="button" value="<{$lang_inbox}>" onclick="location=''viewpmsg.php''" />\r\n\r\n    <{if $user_candelete == true}>\r\n    <input type="button" value="<{$lang_deleteaccount}>" onclick="location=''user.php?op=delete''" />\r\n    <{/if}>\r\n\r\n    <input type="button" value="<{$lang_logout}>" onclick="location=''user.php?op=logout''" /></td>\r\n  </tr>\r\n</table>\r\n</form>\r\n\r\n<br /><br />\r\n<{elseif $xoops_isadmin != false}>\r\n\r\n<br /><br />\r\n\r\n<table width="70%" align="center" border="0">\r\n  <tr align="center">\r\n    <td><input type="button" value="<{$lang_editprofile}>" onclick="location=''<{$xoops_url}>/modules/system/admin.php?fct=users&uid=<{$user_uid}>&op=modifyUser''" />\r\n    <input type="button" value="<{$lang_deleteaccount}>" onclick="location=''<{$xoops_url}>/modules/system/admin.php?fct=users&op=delUser&uid=<{$user_uid}>''" />\r\n  </tr>\r\n</table>\r\n\r\n<br /><br />\r\n<{/if}>\r\n\r\n<table width="100%" border="0" cellspacing="5">\r\n  <tr valign="top">\r\n    <td width="50%">\r\n      <table class="outer" cellpadding="4" cellspacing="1" width="100%">\r\n        <tr>\r\n          <th colspan="2" align="center"><{$lang_allaboutuser}></th>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_avatar}></td>\r\n          <td align="center" class="even"><img src="<{$user_avatarurl}>" alt="Avatar" /></td>\r\n        </tr>\r\n        <tr>\r\n          <td class="head"><{$lang_realname}></td>\r\n          <td align="center" class="odd"><{$user_realname}></td>\r\n        </tr>\r\n        <tr>\r\n          <td class="head"><{$lang_website}></td>\r\n          <td class="even"><{$user_websiteurl}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_email}></td>\r\n          <td class="odd"><{$user_email}></td>\r\n        </tr>\r\n	<tr valign="top">\r\n          <td class="head"><{$lang_privmsg}></td>\r\n          <td class="even"><{$user_pmlink}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_icq}></td>\r\n          <td class="odd"><{$user_icq}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_aim}></td>\r\n          <td class="even"><{$user_aim}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_yim}></td>\r\n          <td class="odd"><{$user_yim}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_msnm}></td>\r\n          <td class="even"><{$user_msnm}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_location}></td>\r\n          <td class="odd"><{$user_location}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_occupation}></td>\r\n          <td class="even"><{$user_occupation}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_interest}></td>\r\n          <td class="odd"><{$user_interest}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_extrainfo}></td>\r\n          <td class="even"><{$user_extrainfo}></td>\r\n        </tr>\r\n      </table>\r\n    </td>\r\n    <td width="50%">\r\n      <table class="outer" cellpadding="4" cellspacing="1" width="100%">\r\n        <tr valign="top">\r\n          <th colspan="2" align="center"><{$lang_statistics}></th>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_membersince}></td>\r\n          <td align="center" class="even"><{$user_joindate}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_rank}></td>\r\n          <td align="center" class="odd"><{$user_rankimage}><br /><{$user_ranktitle}></td>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="head"><{$lang_posts}></td>\r\n          <td align="center" class="even"><{$user_posts}></td>\r\n        </tr>\r\n	<tr valign="top">\r\n          <td class="head"><{$lang_lastlogin}></td>\r\n          <td align="center" class="odd"><{$user_lastlogin}></td>\r\n        </tr>\r\n      </table>\r\n      <br />\r\n      <table class="outer" cellpadding="4" cellspacing="1" width="100%">\r\n        <tr valign="top">\r\n          <th colspan="2" align="center"><{$lang_signature}></th>\r\n        </tr>\r\n        <tr valign="top">\r\n          <td class="even"><{$user_signature}></td>\r\n        </tr>\r\n      </table>\r\n    </td>\r\n  </tr>\r\n</table>\r\n\r\n<!-- start module search results loop -->\r\n<{foreach item=module from=$modules}>\r\n\r\n<p>\r\n<h4><{$module.name}></h4>\r\n\r\n  <!-- start results item loop -->\r\n  <{foreach item=result from=$module.results}>\r\n\r\n  <img src="<{$result.image}>" alt="<{$module.name}>" /><b><a href="<{$result.link}>"><{$result.title}></a></b><br /><small>(<{$result.time}>)</small><br />\r\n\r\n  <{/foreach}>\r\n  <!-- end results item loop -->\r\n\r\n<{$module.showall_link}>\r\n</p>\r\n\r\n<{/foreach}>\r\n<!-- end module search results loop -->\r\n'),
(175, '<fieldset style="padding: 10px;">\r\n  <legend style="font-weight: bold;"><{$lang_login}></legend>\r\n  <form action="user.php" method="post">\r\n    <{$lang_username}> <input type="text" name="uname" size="26" maxlength="25" value="<{$usercookie}>" /><br />\r\n    <{$lang_password}> <input type="password" name="pass" size="21" maxlength="32" /><br />\r\n    <input type="hidden" name="op" value="login" />\r\n    <input type="hidden" name="xoops_redirect" value="<{$redirect_page}>" />\r\n    <input type="submit" value="<{$lang_login}>" />\r\n  </form>\r\n  <a name="lost"></a>\r\n  <div><{$lang_notregister}><br /></div>\r\n</fieldset>\r\n\r\n<br />\r\n\r\n<fieldset style="padding: 10px;">\r\n  <legend style="font-weight: bold;"><{$lang_lostpassword}></legend>\r\n  <div><br /><{$lang_noproblem}></div>\r\n  <form action="lostpass.php" method="post">\r\n    <{$lang_youremail}> <input type="text" name="email" size="26" maxlength="60" />&nbsp;&nbsp;<input type="hidden" name="op" value="mailpasswd" /><input type="submit" value="<{$lang_sendpassword}>" />\r\n  </form>\r\n</fieldset>'),
(176, '<?xml version="1.0" encoding="UTF-8"?>\r\n<rss version="2.0">\r\n  <channel>\r\n    <title><{$channel_title}></title>\r\n    <link><{$channel_link}></link>\r\n    <description><{$channel_desc}></description>\r\n    <lastBuildDate><{$channel_lastbuild}></lastBuildDate>\r\n    <docs>http://backend.userland.com/rss/</docs>\r\n    <generator><{$channel_generator}></generator>\r\n    <category><{$channel_category}></category>\r\n    <managingEditor><{$channel_editor}></managingEditor>\r\n    <webMaster><{$channel_webmaster}></webMaster>\r\n    <language><{$channel_language}></language>\r\n    <{if $image_url != ""}>\r\n    <image>\r\n      <title><{$channel_title}></title>\r\n      <url><{$image_url}></url>\r\n      <link><{$channel_link}></link>\r\n      <width><{$image_width}></width>\r\n      <height><{$image_height}></height>\r\n    </image>\r\n    <{/if}>\r\n    <{foreach item=item from=$items}>\r\n    <item>\r\n      <title><{$item.title}></title>\r\n      <link><{$item.link}></link>\r\n      <description><{$item.description}></description>\r\n      <pubDate><{$item.pubdate}></pubDate>\r\n      <guid><{$item.guid}></guid>\r\n    </item>\r\n    <{/foreach}>\r\n  </channel>\r\n</rss>'),
(177, '<html>\r\n<head>\r\n<meta http-equiv="Content-Type" content="text/html; charset=<{$xoops_charset}>" />\r\n<meta http-equiv="Refresh" content="<{$time}>; url=<{$url}>" />\r\n<title><{$xoops_sitename}></title>\r\n</head>\r\n<body>\r\n<div style="text-align:center; background-color: #EBEBEB; border-top: 1px solid #FFFFFF; border-left: 1px solid #FFFFFF; border-right: 1px solid #AAAAAA; border-bottom: 1px solid #AAAAAA; font-weight : bold;">\r\n  <h4><{$message}></h4>\r\n  <p><{$lang_ifnotreload}></p>\r\n</div>\r\n</body>\r\n</html>'),
(178, '<!-- start comment post -->\r\n        <tr>\r\n          <td class="head"><a id="comment<{$comment.id}>"></a> <{$comment.poster.uname}></td>\r\n          <td class="head"><div class="comDate"><span class="comDateCaption"><{$lang_posted}>:</span> <{$comment.date_posted}>&nbsp;&nbsp;<span class="comDateCaption"><{$lang_updated}>:</span> <{$comment.date_modified}></div></td>\r\n        </tr>\r\n        <tr>\r\n\r\n          <{if $comment.poster.id != 0}>\r\n\r\n          <td class="odd"><div class="comUserRank"><div class="comUserRankText"><{$comment.poster.rank_title}></div><img class="comUserRankImg" src="<{$xoops_upload_url}>/<{$comment.poster.rank_image}>" alt="" /></div><img class="comUserImg" src="<{$xoops_upload_url}>/<{$comment.poster.avatar}>" alt="" /><div class="comUserStat"><span class="comUserStatCaption"><{$lang_joined}>:</span> <{$comment.poster.regdate}></div><div class="comUserStat"><span class="comUserStatCaption"><{$lang_from}>:</span> <{$comment.poster.from}></div><div class="comUserStat"><span class="comUserStatCaption"><{$lang_posts}>:</span> <{$comment.poster.postnum}></div><div class="comUserStatus"><{$comment.poster.status}></div></td>\r\n\r\n          <{else}>\r\n\r\n          <td class="odd"> </td>\r\n\r\n          <{/if}>\r\n\r\n          <td class="odd">\r\n            <div class="comTitle"><{$comment.image}><{$comment.title}></div><div class="comText"><{$comment.text}></div>\r\n          </td>\r\n        </tr>\r\n        <tr>\r\n          <td class="even"></td>\r\n\r\n          <{if $xoops_iscommentadmin == true}>\r\n\r\n          <td class="even" align="right">\r\n            <a href="<{$editcomment_link}>&amp;com_id=<{$comment.id}>"><img src="<{$xoops_url}>/images/icons/edit.gif" alt="<{$lang_edit}>" /></a><a href="<{$deletecomment_link}>&amp;com_id=<{$comment.id}>"><img src="<{$xoops_url}>/images/icons/delete.gif" alt="<{$lang_delete}>" /></a><a href="<{$replycomment_link}>&amp;com_id=<{$comment.id}>"><img src="<{$xoops_url}>/images/icons/reply.gif" alt="<{$lang_reply}>" /></a>\r\n          </td>\r\n\r\n          <{elseif $xoops_isuser == true && $xoops_userid == $comment.poster.id}>\r\n\r\n          <td class="even" align="right">\r\n            <a href="<{$editcomment_link}>&amp;com_id=<{$comment.id}>"><img src="<{$xoops_url}>/images/icons/edit.gif" alt="<{$lang_edit}>" /></a><a href="<{$replycomment_link}>&amp;com_id=<{$comment.id}>"><img src="<{$xoops_url}>/images/icons/reply.gif" alt="<{$lang_reply}>" /></a>\r\n          </td>\r\n\r\n          <{elseif $xoops_isuser == true || $anon_canpost == true}>\r\n\r\n          <td class="even" align="right">\r\n            <a href="<{$replycomment_link}>&amp;com_id=<{$comment.id}>"><img src="<{$xoops_url}>/images/icons/reply.gif" alt="<{$lang_reply}>" /></a>\r\n          </td>\r\n\r\n          <{else}>\r\n\r\n          <td class="even"> </td>\r\n\r\n          <{/if}>\r\n\r\n        </tr>\r\n<!-- end comment post -->'),
(183, '<{$dummy_content}>'),
(184, '<h4><{$lang_activenotifications}></h4>\r\n<form name="notificationlist" action="notifications.php" method="post">\r\n<table class="outer">\r\n  <tr>\r\n    <th><input name="allbox" id="allbox" onclick="xoopsCheckGroup(''notificationlist'', ''allbox'', ''del_mod[]'');" type="checkbox" value="<{$lang_checkall}>" /></th>\r\n    <th><{$lang_event}></th>\r\n    <th><{$lang_category}></th>\r\n    <th><{$lang_itemid}></th>\r\n    <th><{$lang_itemname}></th>\r\n  </tr>\r\n  <{foreach item=module from=$modules}>\r\n  <tr>\r\n    <td class="head"><input name="del_mod[<{$module.id}>]" id="del_mod[]" onclick="xoopsCheckGroup(''notificationlist'', ''del_mod[<{$module.id}>]'', ''del_not[<{$module.id}>][]'');" type="checkbox" value="<{$module.id}>" /></td>\r\n    <td class="head" colspan="4"><{$lang_module}>: <{$module.name}></td>\r\n  </tr>\r\n  <{foreach item=category from=$module.categories}>\r\n  <{foreach item=item from=$category.items}>\r\n  <{foreach item=notification from=$item.notifications}>\r\n  <tr>\r\n    <{cycle values=odd,even assign=class}>\r\n    <td class="<{$class}>"><input type="checkbox" name="del_not[<{$module.id}>][]" id="del_not[<{$module.id}>][]" value="<{$notification.id}>" /></td>\r\n    <td class="<{$class}>"><{$notification.event_title}></td>\r\n    <td class="<{$class}>"><{$notification.category_title}></td>\r\n    <td class="<{$class}>"><{if $item.id != 0}><{$item.id}><{/if}></td>\r\n    <td class="<{$class}>"><{if $item.id != 0}><{if $item.url != ''''}><a href="<{$item.url}>"><{/if}><{$item.name}><{if $item.url != ''''}></a><{/if}><{/if}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n  <{/foreach}>\r\n  <{/foreach}>\r\n  <{/foreach}>\r\n  <tr>\r\n    <td class="foot" colspan="5">\r\n      <input type="submit" name="delete_cancel" value="<{$lang_cancel}>" />\r\n      <input type="reset" name="delete_reset" value="<{$lang_clear}>" />\r\n      <input type="submit" name="delete" value="<{$lang_delete}>" />\r\n    </td>\r\n  </tr>\r\n</table>\r\n</form>\r\n'),
(185, '<{if $xoops_notification.show}>\r\n<form name="notification_select" action="<{$xoops_notification.target_page}>" method="post">\r\n<h4 style="text-align:center;"><{$lang_activenotifications}></h4>\r\n<input type="hidden" name="not_redirect" value="<{$xoops_notification.redirect_script}>" />\r\n<table class="outer">\r\n  <tr><th colspan="3"><{$lang_notificationoptions}></th></tr>\r\n  <tr>\r\n    <td class="head"><{$lang_category}></td>\r\n    <td class="head"><input name="allbox" id="allbox" onclick="xoopsCheckAll(''notification_select'',''allbox'');" type="checkbox" value="<{$lang_checkall}>" /></td>\r\n    <td class="head"><{$lang_events}></td>\r\n  </tr>\r\n  <{foreach name=outer item=category from=$xoops_notification.categories}>\r\n  <{foreach name=inner item=event from=$category.events}>\r\n  <tr>\r\n    <{if $smarty.foreach.inner.first}>\r\n    <td class="even" rowspan="<{$smarty.foreach.inner.total}>"><{$category.title}></td>\r\n    <{/if}>\r\n    <td class="odd">\r\n    <{counter assign=index}>\r\n    <input type="hidden" name="not_list[<{$index}>][params]" value="<{$category.name}>,<{$category.itemid}>,<{$event.name}>" />\r\n    <input type="checkbox" id="not_list[]" name="not_list[<{$index}>][status]" value="1" <{if $event.subscribed}>checked="checked"<{/if}> />\r\n    </td>\r\n    <td class="odd"><{$event.caption}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n  <{/foreach}>\r\n  <tr>\r\n    <td class="foot" colspan="3" align="center"><input type="submit" name="not_submit" value="<{$lang_updatenow}>" /></td>\r\n  </tr>\r\n</table>\r\n<div align="center">\r\n<{$lang_notificationmethodis}>:&nbsp;<{$user_method}>&nbsp;&nbsp;[<a href="<{$editprofile_url}>"><{$lang_change}></a>]\r\n</div>\r\n</form>\r\n<{/if}>'),
(179, '<table class="outer" cellpadding="5" cellspacing="1">\r\n  <tr>\r\n    <th width="20%"><{$lang_poster}></td>\r\n    <th><{$lang_thread}></td>\r\n  </tr>\r\n  <{foreach item=comment from=$comments}>\r\n    <{include file="db:system_comment.html" comment=$comment}>\r\n  <{/foreach}>\r\n</table>'),
(180, '<{section name=i loop=$comments}>\r\n<br />\r\n<table cellspacing="1" class="outer">\r\n  <tr>\r\n    <th width="20%"><{$lang_poster}></th>\r\n    <th><{$lang_thread}></th>\r\n  </tr>\r\n  <{include file="db:system_comment.html" comment=$comments[i]}>\r\n</table>\r\n\r\n<{if $show_threadnav == true}>\r\n<div style="text-align:left; margin:3px; padding: 5px;">\r\n<a href="<{$comment_url}>"><{$lang_top}></a> | <a href="<{$comment_url}>&amp;com_id=<{$comments[i].pid}>&amp;com_rootid=<{$comments[i].rootid}>#newscomment<{$comments[i].pid}>"><{$lang_parent}></a>\r\n</div>\r\n<{/if}>\r\n\r\n<{if $comments[i].show_replies == true}>\r\n<!-- start comment tree -->\r\n<br />\r\n<table cellspacing="1" class="outer">\r\n  <tr>\r\n    <th width="50%"><{$lang_subject}></th>\r\n    <th width="20%" align="center"><{$lang_poster}></th>\r\n    <th align="right"><{$lang_posted}></th>\r\n  </tr>\r\n  <{foreach item=reply from=$comments[i].replies}>\r\n  <tr>\r\n    <td class="even"><{$reply.prefix}> <a href="<{$comment_url}>&amp;com_id=<{$reply.id}>&amp;com_rootid=<{$reply.root_id}>"><{$reply.title}></a></td>\r\n    <td class="odd" align="center"><{$reply.poster.uname}></td>\r\n    <td class="even" align="right"><{$reply.date_posted}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n</table>\r\n<!-- end comment tree -->\r\n<{/if}>\r\n\r\n<{/section}>'),
(181, '<{section name=i loop=$comments}>\r\n<br />\r\n<table cellspacing="1" class="outer">\r\n  <tr>\r\n    <th width="20%"><{$lang_poster}></th>\r\n    <th><{$lang_thread}></th>\r\n  </tr>\r\n  <{include file="db:system_comment.html" comment=$comments[i]}>\r\n</table>\r\n\r\n<!-- start comment replies -->\r\n<{foreach item=reply from=$comments[i].replies}>\r\n<br />\r\n<table cellspacing="0" border="0">\r\n  <tr>\r\n    <td width="<{$reply.prefix}>"></td>\r\n    <td>\r\n      <table class="outer" cellspacing="1">\r\n        <tr>\r\n          <th width="20%"><{$lang_poster}></th>\r\n          <th><{$lang_thread}></th>\r\n        </tr>\r\n        <{include file="db:system_comment.html" comment=$reply}>\r\n      </table>\r\n    </td>\r\n  </tr>\r\n</table>\r\n<{/foreach}>\r\n<!-- end comment tree -->\r\n<{/section}>'),
(182, '<!DOCTYPE html PUBLIC ''//W3C//DTD XHTML 1.0 Transitional//EN'' ''http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd''>\r\n<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<{$xoops_langcode}>" lang="<{$xoops_langcode}>">\r\n<head>\r\n<meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset}>" />\r\n<meta http-equiv="content-language" content="<{$xoops_langcode}>" />\r\n<title><{$xoops_sitename}></title>\r\n<link rel="stylesheet" type="text/css" media="all" href="<{$xoops_url}>/xoops.css" />\r\n\r\n</head>\r\n<body>\r\n  <table cellspacing="0">\r\n    <tr id="header">\r\n      <td style="width: 150px; background-color: #2F5376; vertical-align: middle; text-align:center;"><a href="<{$xoops_url}>/"><img src="<{$xoops_imageurl}>logo.gif" width="150" alt="" /></a></td>\r\n      <td style="width: 100%; background-color: #2F5376; vertical-align: middle; text-align:center;">&nbsp;</td>\r\n    </tr>\r\n    <tr>\r\n      <td style="height: 8px; border-bottom: 1px solid silver; background-color: #dddddd;" colspan="2">&nbsp;</td>\r\n    </tr>\r\n  </table>\r\n\r\n  <table cellspacing="1" align="center" width="80%" border="0" cellpadding="10px;">\r\n    <tr>\r\n      <td align="center"><div style="background-color: #DDFFDF; color: #136C99; text-align: center; border-top: 1px solid #DDDDFF; border-left: 1px solid #DDDDFF; border-right: 1px solid #AAAAAA; border-bottom: 1px solid #AAAAAA; font-weight: bold; padding: 10px;"><{$lang_siteclosemsg}></div></td>\r\n    </tr>\r\n  </table>\r\n  \r\n  <form action="<{$xoops_url}>/user.php" method="post">\r\n    <table cellspacing="0" align="center" style="border: 1px solid silver; width: 200px;">\r\n      <tr>\r\n        <th style="background-color: #2F5376; color: #FFFFFF; padding : 2px; vertical-align : middle;" colspan="2"><{$lang_login}></th>\r\n      </tr>\r\n      <tr>\r\n        <td style="padding: 2px;"><{$lang_username}></td><td style="padding: 2px;"><input type="text" name="uname" size="12" value="" /></td>\r\n      </tr>\r\n      <tr>\r\n        <td style="padding: 2px;"><{$lang_password}></td><td style="padding: 2px;"><input type="password" name="pass" size="12" /></td>\r\n      </tr>\r\n      <tr>\r\n        <td style="padding: 2px;">&nbsp;</td>\r\n        <td style="padding: 2px;"><input type="hidden" name="xoops_login" value="1" /><input type="submit" value="<{$lang_login}>" /></td>\r\n      </tr>\r\n    </table>\r\n  </form>\r\n\r\n  <table cellspacing="0" width="100%">\r\n    <td style="height:8px; border-bottom: 1px solid silver; border-top: 1px solid silver; background-color: #dddddd;" colspan="2">&nbsp;</td>\r\n  </table>\r\n\r\n  </body>\r\n</html>'),
(84, '<div style="text-align: center;"><form name="newstopicform" action="<{$xoops_url}>/modules/news/index.php" method="get"><{$block.selectbox}></form></div>'),
(85, '<p><{$block.message}></p>\r\n\r\n<{if $block.story_id != ""}>\r\n  <p><a href="<{$xoops_url}>/modules/news/article.php?storyid=<{$block.story_id}>"><{$block.story_title}></a></p>\r\n<{/if}>'),
(86, '<ul>\r\n  <{foreach item=news from=$block.stories}>\r\n    <li><a href="<{$xoops_url}>/modules/news/article.php?storyid=<{$news.id}>"><{$news.title}></a> (<{$news.hits}>)</li>\r\n  <{/foreach}>\r\n</ul>'),
(87, '<ul>\r\n  <{foreach item=news from=$block.stories}>\r\n    <li><a href="<{$xoops_url}>/modules/news/article.php?storyid=<{$news.id}>"><{$news.title}></a> (<{$news.date}>)</li>\r\n  <{/foreach}>\r\n</ul>'),
(88, '<table class="outer" cellspacing="1">\r\n  <tr>\r\n    <th align="center"><{$block.lang_story_title}></th>\r\n    <th align="center"><{$block.lang_story_topic}></th>\r\n    <th align="center"><{$block.lang_story_date}></th>\r\n    <th align="center"><{$block.lang_story_author}></th>\r\n    <th align="center"><{$block.lang_story_action}></th>\r\n  </tr>\r\n\r\n  <{foreach item=news from=$block.stories}>\r\n  <tr class="<{cycle values="even,odd"}>">\r\n    <td align="left"><{$news.title}></td>\r\n    <td align="left"><{$news.topic_title}></td>\r\n    <td align="center"><{$news.date}></td>\r\n    <td align="left"><{$news.author}></td>\r\n    <td align="center"><{$news.action}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n</table>'),
(89, '<table cellspacing="0">\r\n    <tr>\r\n        <td id="mainmenu">\r\n            <{foreach item=topic from=$block.topics}>\r\n                <a class="menuMain" href="<{$xoops_url}>/modules/news/index.php?storytopic=<{$topic.id}>"><{$topic.title}></a>\r\n            <{/foreach}>\r\n        </td>\r\n    </tr>\r\n</table>'),
(207, '<div style="text-align: center;"><form name="newstopicform" action="<{$xoops_url}>/modules/news/index.php" method="get"><{$block.selectbox}></form></div>'),
(208, '<p><{$block.message}></p>\r\n\r\n<{if $block.story_id != ""}>\r\n  <p><a href="<{$xoops_url}>/modules/news/article.php?storyid=<{$block.story_id}>"><{$block.story_title}></a></p>\r\n<{/if}>'),
(209, '<ul>\r\n  <{foreach item=news from=$block.stories}>\r\n    <li><a href="<{$xoops_url}>/modules/news/article.php?storyid=<{$news.id}>"><{$news.title}></a> (<{$news.hits}>)</li>\r\n  <{/foreach}>\r\n</ul>'),
(210, '<ul>\r\n  <{foreach item=news from=$block.stories}>\r\n    <li><a href="<{$xoops_url}>/modules/news/article.php?storyid=<{$news.id}>"><{$news.title}></a> (<{$news.date}>)</li>\r\n  <{/foreach}>\r\n</ul>'),
(203, '<table width="100%" cellspacing="1" class="outer">\r\n  <{foreach item=comment from=$block.comments}>\r\n  <tr class="<{cycle values="even,odd"}>">\r\n    <td align="center"><img src="<{$xoops_url}>/images/subject/<{$comment.icon}>" alt="" /></td>\r\n    <td><{$comment.title}></td>\r\n    <td align="center"><{$comment.module}></td>\r\n    <td align="center"><{$comment.poster}></td>\r\n    <td align="right"><{$comment.time}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n</table>'),
(204, '<form action="<{$block.target_page}>" method="post">\r\n<table class="outer">\r\n  <{foreach item=category from=$block.categories}>\r\n  <{foreach name=inner item=event from=$category.events}>\r\n  <{if $smarty.foreach.inner.first}>\r\n  <tr>\r\n    <td class="head" colspan="2"><{$category.title}></td>\r\n  </tr>\r\n  <{/if}>\r\n  <tr>\r\n    <td class="odd"><{counter assign=index}><input type="hidden" name="not_list[<{$index}>][params]" value="<{$category.name}>,<{$category.itemid}>,<{$event.name}>" /><input type="checkbox" name="not_list[<{$index}>][status]" value="1" <{if $event.subscribed}>checked="checked"<{/if}> /></td>\r\n    <td class="odd"><{$event.caption}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n  <{/foreach}>\r\n  <tr>\r\n    <td class="foot" colspan="2"><input type="hidden" name="not_redirect" value="<{$block.redirect_script}>"><input type="submit" name="not_submit" value="<{$block.submit_button}>" /></td>\r\n  </tr>\r\n</table>\r\n</form>'),
(205, '<div style="text-align: center;">\r\n<form action="index.php" method="post">\r\n<{$block.theme_select}>\r\n</form>\r\n</div>'),
(206, '<{foreach item=poll from=$block.polls}>\r\n<form style="margin-top: 1px;" action="<{$xoops_url}>/modules/xoopspoll/index.php" method="post">\r\n<table class="outer" cellspacing="1">\r\n  <tr>\r\n    <th align="center" colspan="2"><input type="hidden" name="poll_id" value="<{$poll.id}>" /><{$poll.question}></th>\r\n  </tr>\r\n\r\n  <{foreach item=option from=$poll.options}>\r\n  <tr class="<{cycle values="even,odd"}>">\r\n    <td align="center"><input type="<{$poll.option_type}>" name="<{$poll.option_name}>" value="<{$option.id}>" /></td>\r\n    <td align="left"><{$option.text}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n\r\n  <tr>\r\n    <td class="foot" align="center" colspan="2"><input type="submit" value="<{$block.lang_vote}>" /> <input type="button" value="<{$block.lang_results}>" onclick="location=''<{$xoops_url}>/modules/xoopspoll/pollresults.php?poll_id=<{$poll.id}>''" /></td>\r\n  </tr>\r\n</table>\r\n</form>\r\n<{/foreach}>'),
(201, '<{if $displaynav == true}>\r\n  <div style="text-align: center;">\r\n    <form name="form1" action="index.php" method="get">\r\n    <{$topic_select}> <select name="storynum"><{$storynum_options}></select> <input type="submit" value="<{$lang_go}>" class="formButton" /></form>\r\n  <hr />\r\n  </div>\r\n<{/if}>\r\n\r\n<div style="margin: 10px;"><{$pagenav}></div>\r\n<table width=100% border=0>\r\n    <tr>\r\n        <!-- start news item loop -->\r\n        <{section name=i loop=$columns}>\r\n            <td width="<{$columnwidth}>%">\r\n                <{foreach item=story from=$columns[i]}>\r\n                    <{include file="db:news_item.html" story=$story}>\r\n                <{/foreach}>\r\n            </td>\r\n        <{/section}>\r\n    </tr>\r\n</table>\r\n\r\n<div style="text-align: right; margin: 10px;"><{$pagenav}></div>\r\n<{include file=''db:system_notification_select.html''}>'),
(202, '<div class="item">\r\n<table width=100% border=0>\r\n    <tr>\r\n        <{section name=i loop=$columns}>\r\n            <td width="<{$columnwidth}>%" valign="top">\r\n                <!-- start topic loop -->\r\n                <{foreach item=topic from=$columns[i]}>\r\n                    <div class="itemBody">\r\n                    <div class="itemInfo"><span class="itemText"><a href="<{$xoops_url}>/modules/news/index.php?storytopic=<{$topic.id}>"><{$topic.title}></a></span></div>\r\n                    <!-- start news item loop -->\r\n                    <{counter start=0 print=false assign=storynum}>\r\n                    <{foreach item=story from=$topic.stories}>\r\n                      <{if $storynum == 0}>\r\n                        <{include file="db:news_item.html" story=$story}>\r\n                        <br />\r\n                      <{else}>\r\n                        <{if $storynum == 1}>\r\n                            <ul>\r\n                        <{/if}>\r\n                        <li><a href="<{$xoops_url}>/modules/news/article.php?storyid=<{$story.id}>"><{$story.title}></a> (<{$story.posttime}>)</li>\r\n                      <{/if}>\r\n                      <{counter}>\r\n                    <{/foreach}>\r\n                    <{if $storynum > 1}>\r\n                        </ul>\r\n                        <a href="<{$xoops_url}>/modules/news/index.php?storytopic=<{$topic.id}>"><{$lang_morereleases}><{$topic.title}></a>\r\n                    <{/if}>\r\n                    </div>\r\n                    <br />\r\n                    <!-- end news item loop -->\r\n                <{/foreach}>\r\n            </td>\r\n        <{/section}>\r\n    </tr>\r\n</table>\r\n<!-- end topic loop -->\r\n</div>\r\n<{include file=''db:system_notification_select.html''}>'),
(196, '<table cellspacing="1" class="outer">\r\n  <{foreach item=user from=$block.users}>\r\n  <tr class="<{cycle values="even,odd"}>" valign="middle">\r\n    <td><{$user.rank}></td>\r\n    <td align="center">\r\n      <{if $user.avatar != ""}>\r\n      <img src="<{$user.avatar}>" alt="" width="32" /><br />\r\n      <{/if}>\r\n      <a href="<{$xoops_url}>/userinfo.php?uid=<{$user.id}>"><{$user.name}></a>\r\n    </td>\r\n    <td align="center"><{$user.posts}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n</table>\r\n'),
(197, '<table cellspacing="1" class="outer">\r\n  <{foreach item=user from=$block.users}>\r\n    <tr class="<{cycle values="even,odd"}>" valign="middle">\r\n      <td align="center">\r\n      <{if $user.avatar != ""}>\r\n      <img src="<{$user.avatar}>" alt="" width="32" /><br />\r\n      <{/if}>\r\n      <a href="<{$xoops_url}>/userinfo.php?uid=<{$user.id}>"><{$user.name}></a>\r\n      </td>\r\n      <td align="center"><{$user.joindate}></td>\r\n    </tr>\r\n  <{/foreach}>\r\n</table>\r\n'),
(198, '<table cellpadding="0" cellspacing="0" class="item">\r\n    <tr>\r\n        <td>\r\n        <table cellpadding="0" cellspacing="0" width="98%">\r\n            <tbody>\r\n                <tr>\r\n                    <td class="itemHead">\r\n                        <span class="itemTitle"><{$story.title}></span>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td class="itemInfo">\r\n                        <{if $story.poster != ''''}><span class="itemPoster"><{$lang_postedby}> <{$story.poster}></span><{/if}>\r\n                        <span class="itemPostDate"><{$lang_on}> <{$story.posttime}></span> (<span class="itemStats"><{$story.hits}> <{$lang_reads}></span>)\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td><div class="itemBody">\r\n                            <{$story.imglink}>\r\n                            <p class="itemText"><{$story.text}></p>\r\n                        </div>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td class="itemFoot">\r\n                        <span class="itemAdminLink"><{$story.adminlink}></span>\r\n                        <span class="itemPermaLink"><{$story.morelink}></span>\r\n                    </td>\r\n                </tr>\r\n             </tbody>\r\n         </table>\r\n      </td>\r\n  </tr>\r\n</table>'),
(199, '<table>\r\n  <tr>\r\n    <th><{$lang_newsarchives}></th>\r\n  </tr>\r\n\r\n<{foreach item=year from=$years}>\r\n<{foreach item=month from=$year.months}>\r\n\r\n  <tr class="even">\r\n    <td><a href="./archive.php?year=<{$year.number}>&amp;month=<{$month.number}>"><{$month.string}> <{$year.number}></a></td>\r\n  </tr>\r\n\r\n<{/foreach}>\r\n<{/foreach}>\r\n\r\n</table>\r\n\r\n<{if $show_articles == true}>\r\n\r\n<table>\r\n  <tr>\r\n    <th><{$lang_articles}></th><th align="center"><{$lang_actions}></th><th align="center"><{$lang_views}></th><th align="center"><{$lang_date}></th>\r\n  </tr>\r\n\r\n  <{foreach item=story from=$stories}>\r\n\r\n  <tr class="<{cycle values="even,odd"}>">\r\n    <td><{$story.title}></td><td align="center"><a href="<{$story.print_link}>"><img src="images/print.gif" alt="<{$lang_printer}>" /></a> <a href="<{$story.mail_link}>" target="_top" /><img src="images/friend.gif" alt="<{$lang_sendstory}>" /></td><td align="center"><{$story.counter}></td><td align="center"><{$story.date}></td>\r\n  </tr>\r\n\r\n  <{/foreach}>\r\n\r\n</table>\r\n\r\n<div>\r\n<{$lang_storytotal}>\r\n</div>\r\n\r\n<{/if}>'),
(200, '<div style="text-align: left; margin: 10px;"><{if $pagenav}>Page <{$pagenav}><{/if}></div>\r\n\r\n<div style="padding: 3px; margin-right:3px;"><{include file="db:news_item.html" story=$story}></div>\r\n\r\n<{if $attached_files_count>0}>\r\n	<div class="itemInfo"><{$lang_attached_files}>\r\n		<{foreach item=onefile from=$attached_files}>\r\n			<a href=''<{$onefile.visitlink}>'' target=''_blank''><{$onefile.file_realname}></a>&nbsp;\r\n		<{/foreach}>\r\n	</div>\r\n<{/if}>\r\n\r\n<div style="text-align: left; margin: 10px;"><{if $pagenav}>Page <{$pagenav}><{/if}></div>\r\n\r\n<div style="padding: 5px; text-align: right; margin-right:3px;">\r\n	<a href="print.php?storyid=<{$story.id}>"><img src="images/print.gif" border="0" alt="<{$lang_printerpage}>" /></a> <a target="_top" href="<{$mail_link}>"><img src="images/friend.gif" border="0" alt="<{$lang_sendstory}>" /></a>\r\n</div>\r\n\r\n<div style="text-align: center; padding: 3px; margin:3px;">\r\n	<{$commentsnav}>\r\n	<{$lang_notice}>\r\n</div>\r\n\r\n<div style="margin:3px; padding: 3px;">\r\n<!-- start comments loop -->\r\n<{if $comment_mode == "flat"}>\r\n	<{include file="db:system_comments_flat.html"}>\r\n<{elseif $comment_mode == "thread"}>\r\n	<{include file="db:system_comments_thread.html"}>\r\n<{elseif $comment_mode == "nest"}>\r\n	<{include file="db:system_comments_nest.html"}>\r\n<{/if}>\r\n<!-- end comments loop -->\r\n</div>\r\n<{include file=''db:system_notification_select.html''}>'),
(194, '<form action="<{$poll.action}>" method="post">\r\n  <table width="100%" class="outer" cellspacing="1">\r\n    <tr>\r\n      <th align="center" colspan="2"><input type="hidden" name="poll_id" value="<{$poll.pollId}>" /><{$poll.question}></th>\r\n    </tr>\r\n\r\n    <{foreach item=option from=$poll.options}>\r\n	<tr>\r\n      <td class="even" align="left" width="2%"><{$option.input}></td>\r\n      <td class="odd" align="left" width="98%"><{$option.text}></td>\r\n    </tr>\r\n    <{/foreach}>\r\n\r\n	<tr>\r\n      <td align="center" colspan="2" class="foot"><input type="submit" value="<{$lang_vote}>" />&nbsp;<input type="button" value="<{$lang_results}>" onclick="location=''<{$poll.viewresults}>''" /></td>\r\n    </tr>\r\n  </table>\r\n</form>'),
(195, '<div style=''text-align: center; margin: 3px;''>\r\n<table width="60%" class="outer" cellspacing="1">\r\n  <tr>\r\n    <th colspan="2"><{$poll.question}></th>\r\n  </tr>\r\n  <tr>\r\n    <td class="head" align="right" colspan="2">\r\n    <{$poll.end_text}>\r\n    </td>\r\n  </tr>\r\n\r\n  <{foreach item=option from=$poll.options}>\r\n  <tr>\r\n    <td class="even" width="30%" align="left">\r\n    <{$option.text}>\r\n    </td>\r\n    <td class="odd" width="70%" align="left">\r\n    <{$option.image}> <{$option.percent}>\r\n    </td>\r\n  </tr>\r\n  <{/foreach}>\r\n  <tr>\r\n    <td class="foot" colspan="2" align="center">\r\n      <{$poll.totalVotes}><br /><{$poll.totalVoters}><br /><{$poll.vote}>\r\n    </td>\r\n  </tr>\r\n</table>\r\n</div>\r\n<br />\r\n\r\n<div style="text-align:center; padding: 3px; margin:3px;">\r\n  <{$commentsnav}>\r\n  <{$lang_notice}>\r\n</div>\r\n\r\n<div style="margin:3px; padding: 3px;">\r\n<!-- start comments loop -->\r\n<{if $comment_mode == "flat"}>\r\n  <{include file="db:system_comments_flat.html"}>\r\n<{elseif $comment_mode == "thread"}>\r\n  <{include file="db:system_comments_thread.html"}>\r\n<{elseif $comment_mode == "nest"}>\r\n  <{include file="db:system_comments_nest.html"}>\r\n<{/if}>\r\n<!-- end comments loop -->\r\n</div>'),
(186, '<table cellspacing="0">\r\n  <tr>\r\n    <td id="usermenu">\r\n      <a class="menuTop" href="<{$xoops_url}>/user.php"><{$block.lang_youraccount}></a>\r\n      <a href="<{$xoops_url}>/edituser.php"><{$block.lang_editaccount}></a>\r\n      <a href="<{$xoops_url}>/notifications.php"><{$block.lang_notifications}></a>\r\n      <a href="<{$xoops_url}>/user.php?op=logout"><{$block.lang_logout}></a>\r\n      <{if $block.new_messages > 0}>\r\n        <a class="highlight" href="<{$xoops_url}>/viewpmsg.php"><{$block.lang_inbox}> (<span style="color:#ff0000; font-weight: bold;"><{$block.new_messages}></span>)</a>\r\n      <{else}>\r\n        <a href="<{$xoops_url}>/viewpmsg.php"><{$block.lang_inbox}></a>\r\n      <{/if}>\r\n\r\n      <{if $xoops_isadmin}>\r\n        <a href="<{$xoops_url}>/admin.php"><{$block.lang_adminmenu}></a>\r\n      <{/if}>\r\n    </td>\r\n  </tr>\r\n</table>\r\n'),
(187, '<form style="margin-top: 0px;" action="<{$xoops_url}>/user.php" method="post">\r\n    <{$block.lang_username}><br />\r\n    <input type="text" name="uname" size="12" value="<{$block.unamevalue}>" maxlength="25" /><br />\r\n    <{$block.lang_password}><br />\r\n    <input type="password" name="pass" size="12" maxlength="32" /><br />\r\n    <!-- <input type="checkbox" name="rememberme" value="On" class ="formButton" /><{$block.lang_rememberme}><br /> //-->\r\n    <input type="hidden" name="xoops_redirect" value="<{$xoops_requesturi}>" />\r\n    <input type="hidden" name="op" value="login" />\r\n    <input type="submit" value="<{$block.lang_login}>" /><br />\r\n    <{$block.sslloginlink}>\r\n</form>\r\n<a href="<{$xoops_url}>/user.php#lost"><{$block.lang_lostpass}></a>\r\n<br /><br />\r\n<a href="<{$xoops_url}>/register.php"><{$block.lang_registernow}></a>'),
(188, '<form style="margin-top: 0px;" action="<{$xoops_url}>/search.php" method="get">\r\n  <input type="text" name="query" size="14" /><input type="hidden" name="action" value="results" /><br /><input type="submit" value="<{$block.lang_search}>" />\r\n</form>\r\n<a href="<{$xoops_url}>/search.php"><{$block.lang_advsearch}></a>'),
(189, '<ul>\r\n  <{foreach item=module from=$block.modules}>\r\n  <li><a href="<{$module.adminlink}>"><{$module.lang_linkname}></a>: <{$module.pendingnum}></li>\r\n  <{/foreach}>\r\n</ul>'),
(190, '<table cellspacing="0">\r\n  <tr>\r\n    <td id="mainmenu">\r\n      <a class="menuTop" href="<{$xoops_url}>/"><{$block.lang_home}></a>\r\n      <!-- start module menu loop -->\r\n      <{foreach item=module from=$block.modules}>\r\n      <a class="menuMain" href="<{$xoops_url}>/modules/<{$module.directory}>/"><{$module.name}></a>\r\n        <{foreach item=sublink from=$module.sublinks}>\r\n          <a class="menuSub" href="<{$sublink.url}>"><{$sublink.name}></a>\r\n        <{/foreach}>\r\n      <{/foreach}>\r\n      <!-- end module menu loop -->\r\n    </td>\r\n  </tr>\r\n</table>'),
(191, '<table class="outer" cellspacing="0">\r\n\r\n  <{if $block.showgroups == true}>\r\n\r\n  <!-- start group loop -->\r\n  <{foreach item=group from=$block.groups}>\r\n  <tr>\r\n    <th colspan="2"><{$group.name}></th>\r\n  </tr>\r\n\r\n  <!-- start group member loop -->\r\n  <{foreach item=user from=$group.users}>\r\n  <tr>\r\n    <td class="even" valign="middle" align="center"><img src="<{$user.avatar}>" alt="" width="32" /><br /><a href="<{$xoops_url}>/userinfo.php?uid=<{$user.id}>"><{$user.name}></a></td><td class="odd" width="20%" align="right" valign="middle"><{$user.msglink}></td>\r\n  </tr>\r\n  <{/foreach}>\r\n  <!-- end group member loop -->\r\n\r\n  <{/foreach}>\r\n  <!-- end group loop -->\r\n  <{/if}>\r\n</table>\r\n\r\n<br />\r\n\r\n<div style="margin: 3px; text-align:center;">\r\n  <img src="<{$block.logourl}>" alt="" border="0" /><br /><{$block.recommendlink}>\r\n</div>'),
(192, '<{$block.online_total}><br /><br /><{$block.lang_members}>: <{$block.online_members}><br /><{$block.lang_guests}>: <{$block.online_guests}><br /><br /><{$block.online_names}> <a href="javascript:openWithSelfMain(''<{$xoops_url}>/misc.php?action=showpopups&amp;type=online'',''Online'',420,350);"><{$block.lang_more}></a>'),
(193, '<h4><{$lang_pollslist}></h4>\r\n\r\n<table width="100%" class="outer" cellspacing=''1''>\r\n  <tr>\r\n    <th><{$lang_pollquestion}></th>\r\n    <th align=''center''><{$lang_pollvoters}></th>\r\n    <th align=''center''><{$lang_votes}></th>\r\n    <th align=''center''><{$lang_expiration}></th>\r\n    <th>&nbsp;</th>\r\n  </tr>\r\n\r\n<!-- start polls item loop -->\r\n<{section name=i loop=$polls}>\r\n  <tr>\r\n    <td class="even"><{$polls[i].pollQuestion}></td>\r\n    <td align="center" class="odd"><{$polls[i].pollVoters}></td>\r\n    <td align="center" class="even"><{$polls[i].pollVotes}></td>\r\n    <td align="center" class="odd"><{$polls[i].pollEnd}></td>\r\n    <td align="right" class="even"><a href="pollresults.php?poll_id=<{$polls[i].pollId}>"><{$lang_results}></a></td>\r\n  </tr>\r\n<{/section}>\r\n<!-- end polls item loop -->\r\n\r\n</table>'),
(172, '<!DOCTYPE html PUBLIC ''//W3C//DTD XHTML 1.0 Transitional//EN'' ''http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd''>\r\n<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<{$xoops_langcode}>" lang="<{$xoops_langcode}>">\r\n<head>\r\n<meta http-equiv="content-type" content="text/html; charset=<{$xoops_charset}>" />\r\n<meta http-equiv="content-language" content="<{$xoops_langcode}>" />\r\n<title><{$sitename}> <{$lang_imgmanager}></title>\r\n<script type="text/javascript">\r\n<!--//\r\nfunction appendCode(addCode) {\r\n	var targetDom = window.opener.xoopsGetElementById(''<{$target}>'');\r\n	if (targetDom.createTextRange && targetDom.caretPos){\r\n  		var caretPos = targetDom.caretPos;\r\n		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) \r\n== '' '' ? addCode + '' '' : addCode;  \r\n	} else if (targetDom.getSelection && targetDom.caretPos){\r\n		var caretPos = targetDom.caretPos;\r\n		caretPos.text = caretPos.text.charat(caretPos.text.length - 1)  \r\n== '' '' ? addCode + '' '' : addCode;\r\n	} else {\r\n		targetDom.value = targetDom.value + addCode;\r\n  	}\r\n	window.close();\r\n	return;\r\n}\r\n//-->\r\n</script>\r\n<style type="text/css" media="all">\r\nbody {margin: 0;}\r\nimg {border: 0;}\r\ntable {width: 100%; margin: 0;}\r\na:link {color: #3a76d6; font-weight: bold; background-color: transparent;}\r\na:visited {color: #9eb2d6; font-weight: bold; background-color: transparent;}\r\na:hover {color: #e18a00; background-color: transparent;}\r\ntable td {background-color: white; font-size: 12px; padding: 0; border-width: 0; vertical-align: top; font-family: Verdana, Arial, Helvetica, sans-serif;}\r\ntable#imagenav td {vertical-align: bottom; padding: 5px;}\r\ntable#imagemain td {border-right: 1px solid silver; border-bottom: 1px solid silver; padding: 5px; vertical-align: middle;}\r\ntable#imagemain th {border: 0; background-color: #2F5376; color:white; font-size: 12px; padding: 5px; vertical-align: top; text-align:center; font-family: Verdana, Arial, Helvetica, sans-serif;}\r\ntable#header td {width: 100%; background-color: #2F5376; vertical-align: middle;}\r\ntable#header td#headerbar {border-bottom: 1px solid silver; background-color: #dddddd;}\r\ndiv#pagenav {text-align:center;}\r\ndiv#footer {text-align:right; padding: 5px;}\r\n</style>\r\n</head>\r\n\r\n<body onload="window.resizeTo(<{$xsize}>, <{$ysize}>);">\r\n  <table id="header" cellspacing="0">\r\n    <tr>\r\n      <td><a href="<{$xoops_url}>/"><img src="<{$xoops_url}>/images/logo.gif" width="150" height="80" alt="" /></a></td><td> </td>\r\n    </tr>\r\n    <tr>\r\n      <td id="headerbar" colspan="2"> </td>\r\n    </tr>\r\n  </table>\r\n\r\n  <form action="imagemanager.php" method="get">\r\n    <table cellspacing="0" id="imagenav">\r\n      <tr>\r\n        <td>\r\n          <select name="cat_id" onchange="location=''<{$xoops_url}>/imagemanager.php?target=<{$target}>&cat_id=''+this.options[this.selectedIndex].value"><{$cat_options}></select> <input type="hidden" name="target" value="<{$target}>" /><input type="submit" value="<{$lang_go}>" />\r\n        </td>\r\n\r\n        <{if $show_cat > 0}>\r\n        <td align="right"><a href="<{$xoops_url}>/imagemanager.php?target=<{$target}>&op=upload&imgcat_id=<{$show_cat}>"><{$lang_addimage}></a></td>\r\n        <{/if}>\r\n\r\n      </tr>\r\n    </table>\r\n  </form>\r\n\r\n  <{if $image_total > 0}>\r\n\r\n  <table cellspacing="0" id="imagemain">\r\n    <tr>\r\n      <th><{$lang_imagename}></th>\r\n      <th><{$lang_image}></th>\r\n      <th><{$lang_imagemime}></th>\r\n      <th><{$lang_align}></th>\r\n    </tr>\r\n\r\n    <{section name=i loop=$images}>\r\n    <tr align="center">\r\n      <td><input type="hidden" name="image_id[]" value="<{$images[i].id}>" /><{$images[i].nicename}></td>\r\n      <td><img src="<{$images[i].src}>" alt="" /></td>\r\n      <td><{$images[i].mimetype}></td>\r\n      <td><a href="#" onclick="javascript:appendCode(''<{$images[i].lxcode}>'');"><img src="<{$xoops_url}>/images/alignleft.gif" alt="Left" /></a> <a href="#" onclick="javascript:appendCode(''<{$images[i].xcode}>'');"><img src="<{$xoops_url}>/images/aligncenter.gif" alt="Center" /></a> <a href="#" onclick="javascript:appendCode(''<{$images[i].rxcode}>'');"><img src="<{$xoops_url}>/images/alignright.gif" alt="Right" /></a></td>\r\n    </tr>\r\n    <{/section}>\r\n  </table>\r\n\r\n  <{/if}>\r\n\r\n  <div id="pagenav"><{$pagenav}></div>\r\n\r\n  <div id="footer">\r\n    <input value="<{$lang_close}>" type="button" onclick="javascript:window.close();" />\r\n  </div>\r\n\r\n  </body>\r\n</html>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_users`
--

CREATE TABLE IF NOT EXISTS `xoops_users` (
  `uid` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(60) NOT NULL default '',
  `uname` varchar(25) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `user_avatar` varchar(30) NOT NULL default 'blank.gif',
  `user_regdate` int(10) unsigned NOT NULL default '0',
  `user_icq` varchar(15) NOT NULL default '',
  `user_from` varchar(100) NOT NULL default '',
  `user_sig` tinytext NOT NULL,
  `user_viewemail` tinyint(1) unsigned NOT NULL default '0',
  `actkey` varchar(8) NOT NULL default '',
  `user_aim` varchar(18) NOT NULL default '',
  `user_yim` varchar(25) NOT NULL default '',
  `user_msnm` varchar(100) NOT NULL default '',
  `pass` varchar(32) NOT NULL default '',
  `posts` mediumint(8) unsigned NOT NULL default '0',
  `attachsig` tinyint(1) unsigned NOT NULL default '0',
  `rank` smallint(5) unsigned NOT NULL default '0',
  `level` tinyint(3) unsigned NOT NULL default '1',
  `theme` varchar(100) NOT NULL default '',
  `timezone_offset` float(3,1) NOT NULL default '0.0',
  `last_login` int(10) unsigned NOT NULL default '0',
  `umode` varchar(10) NOT NULL default '',
  `uorder` tinyint(1) unsigned NOT NULL default '0',
  `notify_method` tinyint(1) NOT NULL default '1',
  `notify_mode` tinyint(1) NOT NULL default '0',
  `user_occ` varchar(100) NOT NULL default '',
  `bio` tinytext NOT NULL,
  `user_intrest` varchar(150) NOT NULL default '',
  `user_mailok` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`uid`),
  KEY `uname` (`uname`),
  KEY `email` (`email`),
  KEY `uiduname` (`uid`,`uname`),
  KEY `unamepass` (`uname`,`pass`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `xoops_users`
--

INSERT INTO `xoops_users` (`uid`, `name`, `uname`, `email`, `url`, `user_avatar`, `user_regdate`, `user_icq`, `user_from`, `user_sig`, `user_viewemail`, `actkey`, `user_aim`, `user_yim`, `user_msnm`, `pass`, `posts`, `attachsig`, `rank`, `level`, `theme`, `timezone_offset`, `last_login`, `umode`, `uorder`, `notify_method`, `notify_mode`, `user_occ`, `bio`, `user_intrest`, `user_mailok`) VALUES
(1, '', 'drrobert', 'roberto@fredericowestphalen.rs.gov.br', 'http://www.fredericowestphalen.rs.gov.br/html/', 'blank.gif', 1099576705, '', '', '', 1, '', '', '', '', 'c9fbf371d035ef7a07c2fc2e2cd11aaf', 0, 0, 7, 5, 'orange_peco', 0.0, 1236005849, 'thread', 0, 1, 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_xoopscomments`
--

CREATE TABLE IF NOT EXISTS `xoops_xoopscomments` (
  `com_id` mediumint(8) unsigned NOT NULL auto_increment,
  `com_pid` mediumint(8) unsigned NOT NULL default '0',
  `com_rootid` mediumint(8) unsigned NOT NULL default '0',
  `com_modid` smallint(5) unsigned NOT NULL default '0',
  `com_itemid` mediumint(8) unsigned NOT NULL default '0',
  `com_icon` varchar(25) NOT NULL default '',
  `com_created` int(10) unsigned NOT NULL default '0',
  `com_modified` int(10) unsigned NOT NULL default '0',
  `com_uid` mediumint(8) unsigned NOT NULL default '0',
  `com_ip` varchar(15) NOT NULL default '',
  `com_title` varchar(255) NOT NULL default '',
  `com_text` text NOT NULL,
  `com_sig` tinyint(1) unsigned NOT NULL default '0',
  `com_status` tinyint(1) unsigned NOT NULL default '0',
  `com_exparams` varchar(255) NOT NULL default '',
  `dohtml` tinyint(1) unsigned NOT NULL default '0',
  `dosmiley` tinyint(1) unsigned NOT NULL default '0',
  `doxcode` tinyint(1) unsigned NOT NULL default '0',
  `doimage` tinyint(1) unsigned NOT NULL default '0',
  `dobr` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`com_id`),
  KEY `com_pid` (`com_pid`),
  KEY `com_itemid` (`com_itemid`),
  KEY `com_uid` (`com_uid`),
  KEY `com_title` (`com_title`(40))
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `xoops_xoopscomments`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_xoopsnotifications`
--

CREATE TABLE IF NOT EXISTS `xoops_xoopsnotifications` (
  `not_id` mediumint(8) unsigned NOT NULL auto_increment,
  `not_modid` smallint(5) unsigned NOT NULL default '0',
  `not_itemid` mediumint(8) unsigned NOT NULL default '0',
  `not_category` varchar(30) NOT NULL default '',
  `not_event` varchar(30) NOT NULL default '',
  `not_uid` mediumint(8) unsigned NOT NULL default '0',
  `not_mode` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`not_id`),
  KEY `not_modid` (`not_modid`),
  KEY `not_itemid` (`not_itemid`),
  KEY `not_class` (`not_category`),
  KEY `not_uid` (`not_uid`),
  KEY `not_event` (`not_event`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `xoops_xoopsnotifications`
--

INSERT INTO `xoops_xoopsnotifications` (`not_id`, `not_modid`, `not_itemid`, `not_category`, `not_event`, `not_uid`, `not_mode`) VALUES
(5, 9, 27, 'story', 'approve', 1, 1),
(3, 9, 3, 'story', 'approve', 1, 1),
(4, 9, 4, 'story', 'approve', 1, 1),
(6, 9, 28, 'story', 'approve', 1, 1),
(7, 9, 29, 'story', 'approve', 1, 1),
(8, 9, 30, 'story', 'approve', 1, 1),
(9, 9, 31, 'story', 'approve', 1, 1),
(10, 9, 32, 'story', 'approve', 1, 1),
(11, 9, 33, 'story', 'approve', 1, 1),
(12, 9, 35, 'story', 'approve', 1, 1),
(13, 9, 36, 'story', 'approve', 1, 1),
(14, 9, 37, 'story', 'approve', 1, 1),
(15, 9, 38, 'story', 'approve', 1, 1),
(16, 9, 39, 'story', 'approve', 1, 1),
(17, 9, 40, 'story', 'approve', 1, 1),
(18, 9, 41, 'story', 'approve', 1, 1),
(19, 9, 42, 'story', 'approve', 1, 1),
(20, 9, 43, 'story', 'approve', 1, 1),
(21, 9, 44, 'story', 'approve', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_xoopspoll_desc`
--

CREATE TABLE IF NOT EXISTS `xoops_xoopspoll_desc` (
  `poll_id` mediumint(8) unsigned NOT NULL auto_increment,
  `question` varchar(255) NOT NULL default '',
  `description` tinytext NOT NULL,
  `user_id` int(5) unsigned NOT NULL default '0',
  `start_time` int(10) unsigned NOT NULL default '0',
  `end_time` int(10) unsigned NOT NULL default '0',
  `votes` smallint(5) unsigned NOT NULL default '0',
  `voters` smallint(5) unsigned NOT NULL default '0',
  `multiple` tinyint(1) unsigned NOT NULL default '0',
  `display` tinyint(1) unsigned NOT NULL default '0',
  `weight` smallint(5) unsigned NOT NULL default '0',
  `mail_status` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`poll_id`),
  KEY `end_time` (`end_time`),
  KEY `display` (`display`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `xoops_xoopspoll_desc`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_xoopspoll_log`
--

CREATE TABLE IF NOT EXISTS `xoops_xoopspoll_log` (
  `log_id` int(10) unsigned NOT NULL auto_increment,
  `poll_id` mediumint(8) unsigned NOT NULL default '0',
  `option_id` int(10) unsigned NOT NULL default '0',
  `ip` char(15) NOT NULL default '',
  `user_id` int(5) unsigned NOT NULL default '0',
  `time` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`log_id`),
  KEY `poll_id_user_id` (`poll_id`,`user_id`),
  KEY `poll_id_ip` (`poll_id`,`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `xoops_xoopspoll_log`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `xoops_xoopspoll_option`
--

CREATE TABLE IF NOT EXISTS `xoops_xoopspoll_option` (
  `option_id` int(10) unsigned NOT NULL auto_increment,
  `poll_id` mediumint(8) unsigned NOT NULL default '0',
  `option_text` varchar(255) NOT NULL default '',
  `option_count` smallint(5) unsigned NOT NULL default '0',
  `option_color` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`option_id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `xoops_xoopspoll_option`
--

