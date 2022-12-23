
CREATE TABLE `anodep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `anodep` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `nomedep` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `nomesubdep` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `idsubdep` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
CREATE TABLE `licitacoes` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) DEFAULT '0',
  `categoria` varchar(6) DEFAULT '0',
  `data` varchar(20) DEFAULT '0',
  `hora` varchar(20) DEFAULT '0',
  `arquivo` varchar(250) DEFAULT '0',
  `tamanho` varchar(140) DEFAULT NULL,
  `iddep` varchar(255) DEFAULT NULL,
  `idsubdep` varchar(255) DEFAULT NULL,
  `idano` varchar(255) DEFAULT NULL,
  `idtri` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;
CREATE TABLE `subdep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `subdep` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `nomedep` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
CREATE TABLE `tridep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depid` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `tridep` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `nomedep` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `idsubdep` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `nomesubdep` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `idano` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `nomeano` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

