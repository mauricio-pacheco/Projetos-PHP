/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='America/Sao_Paulo' */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;

CREATE TABLE `anodep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `subdep` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
CREATE TABLE `licitacoes` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) DEFAULT '0',
  `categoria` varchar(6) DEFAULT '0',
  `data` varchar(20) DEFAULT '0',
  `hora` varchar(20) DEFAULT '0',
  `arquivo` varchar(250) DEFAULT '0',
  `tamanho` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;
CREATE TABLE `noticias` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `data` varchar(20) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  `texto` longtext NOT NULL,
  `legenda` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
INSERT INTO `noticias` VALUES (10,'Testando a noticia 6','25/03/2010','20:50:52','<p>Matyyry4544</p>','<p>Testetrytrfsddsf</p>');
INSERT INTO `noticias` VALUES (12,'Testando a noticia 3','25/03/2010','20:50:12','<p>Matyyry fdsfds</p>','<p>Testetrytrasfdsf</p>');
CREATE TABLE `subdep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `subdep` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
CREATE TABLE `tridep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `subdep` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
