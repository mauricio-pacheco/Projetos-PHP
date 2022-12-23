CREATE TABLE `cw_anexos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fotomaior` varchar(255) DEFAULT NULL,
  `fotomenor` varchar(255) DEFAULT NULL,
  `idnot` varchar(255) DEFAULT NULL,
  `legenda` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;
CREATE TABLE `cw_viajens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(400) DEFAULT NULL,
  `sessao` varchar(255) DEFAULT NULL,
  `valorvista` varchar(30) DEFAULT NULL,
  `valorprazo` varchar(30) DEFAULT NULL,
  `descricao` longtext,
  `foto` varchar(255) DEFAULT NULL,
  `data` varchar(24) DEFAULT NULL,
  `hora` varchar(24) DEFAULT NULL,
  `prazo` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
CREATE TABLE `cw_conteudo` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `data` varchar(20) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  `texto` longtext NOT NULL,
  `legenda` longtext NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `rodape` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;