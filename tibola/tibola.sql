# MySQL-Front 3.1  (Build 4.38)


# Host: Local    Database: tibola
# ------------------------------------------------------
# Server version 5.0.51

#
# Table structure for table departamentos
#

CREATE TABLE `departamentos` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `nomedep` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

#
# Dumping data for table departamentos
#

INSERT INTO `departamentos` VALUES (16,'Motos Novas');
INSERT INTO `departamentos` VALUES (18,'Motos Velhas');

#
# Table structure for table produtos
#

CREATE TABLE `produtos` (
  `id` int(6) unsigned NOT NULL auto_increment,
  `nome` varchar(255) default NULL,
  `foto` varchar(255) default NULL,
  `preco` varchar(30) default NULL,
  `departamento` varchar(255) default NULL,
  `peso` varchar(30) default NULL,
  `descricao` longtext,
  `fotomenor` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Dumping data for table produtos
#

INSERT INTO `produtos` VALUES (12,'DT 400','imagem_1259798291.jpg','4000','Motos Velhas','500','<p>huhuahusddfs</p>','imagemmenor_1259798291.jpg');

