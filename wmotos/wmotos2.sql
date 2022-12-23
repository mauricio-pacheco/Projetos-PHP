# MySQL-Front 3.1  (Build 4.38)


# Host: Local    Database: wmotos
# ------------------------------------------------------
# Server version 5.0.51

#
# Table structure for table produtos
#

CREATE TABLE `produtos` (
  `Id` int(6) unsigned NOT NULL auto_increment,
  `modelo` varchar(250) default NULL,
  `estado` varchar(60) default NULL,
  `ano` varchar(14) default NULL,
  `cor` varchar(30) default NULL,
  `fotomenor` varchar(250) default NULL,
  `foto1` varchar(250) default NULL,
  `foto2` varchar(250) default NULL,
  `foto3` varchar(250) default NULL,
  `foto4` varchar(250) default NULL,
  `foto5` varchar(250) default NULL,
  `foto6` varchar(250) default NULL,
  `descricao` longtext NOT NULL,
  `cidade` varchar(200) default NULL,
  PRIMARY KEY  (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Dumping data for table produtos
#


