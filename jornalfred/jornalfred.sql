
CREATE TABLE `cw_anexos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fotomaior` varchar(255) DEFAULT NULL,
  `fotomenor` varchar(255) DEFAULT NULL,
  `idnot` varchar(255) DEFAULT NULL,
  `legenda` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=149 DEFAULT CHARSET=latin1;
CREATE TABLE `cw_noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `sessao` varchar(255) DEFAULT NULL,
  `texto` longtext NOT NULL,
  `data` varchar(70) DEFAULT NULL,
  `hora` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
INSERT INTO `cw_noticias` VALUES (43,'Testando a Notícia 5','imagemmenor0_1309994011.jpg','Opnião','\r\n<div>sadasd n&#227;o</div>\r\n\r\n','6/07/2011','20:13:32');
CREATE TABLE `gestao_bannersl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `legenda` varchar(255) DEFAULT NULL,
  `data` varchar(50) DEFAULT NULL,
  `hora` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
CREATE TABLE `gestao_fotos` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `idgaleria` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `fotomenor` varchar(255) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=501 DEFAULT CHARSET=latin1;
CREATE TABLE `gestao_galeria` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nomegaleria` varchar(250) DEFAULT NULL,
  `data` varchar(50) DEFAULT NULL,
  `hora` varchar(50) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `comentario` text,
  `dataevento` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;


