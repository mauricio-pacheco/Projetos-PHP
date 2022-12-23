CREATE TABLE `cw_anexos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fotomaior` varchar(255) DEFAULT NULL,
  `fotomenor` varchar(255) DEFAULT NULL,
  `idnot` varchar(255) DEFAULT NULL,
  `legenda` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=160 DEFAULT CHARSET=latin1;
INSERT INTO `cw_anexos` VALUES (149,'imagem_1308111313247001.jpg','thumb_1308111313247001.jpg','10','Balaia Jubarte');
INSERT INTO `cw_anexos` VALUES (151,'imagem_1308111313247005.jpg','thumb_1308111313247005.jpg','10',NULL);
INSERT INTO `cw_anexos` VALUES (152,'imagem_1308111313247007.jpg','thumb_1308111313247007.jpg','10',NULL);
INSERT INTO `cw_anexos` VALUES (153,'imagem_1308111313247009.jpg','thumb_1308111313247009.jpg','10',NULL);
INSERT INTO `cw_anexos` VALUES (154,'imagem_1308111313247262.jpg','thumb_1308111313247262.jpg','10',NULL);
INSERT INTO `cw_anexos` VALUES (155,'imagem_1308111313247264.jpg','thumb_1308111313247264.jpg','10',NULL);
INSERT INTO `cw_anexos` VALUES (156,'imagem_1308111313247299.jpg','thumb_1308111313247299.jpg','10',NULL);
INSERT INTO `cw_anexos` VALUES (157,'imagem_1308111313247301.jpg','thumb_1308111313247301.jpg','10',NULL);
INSERT INTO `cw_anexos` VALUES (158,'imagem_1308111313247303.jpg','thumb_1308111313247303.jpg','10',NULL);
INSERT INTO `cw_anexos` VALUES (159,'imagem_1308111313247305.jpg','thumb_1308111313247305.jpg','10',NULL);
CREATE TABLE `cw_veiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `veiculo` varchar(400) DEFAULT NULL,
  `valorvista` varchar(30) DEFAULT NULL,
  `valorprazo` varchar(30) DEFAULT NULL,
  `descricao` longtext,
  `foto` varchar(255) DEFAULT NULL,
  `data` varchar(24) DEFAULT NULL,
  `hora` varchar(24) DEFAULT NULL,
  `prazo` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
INSERT INTO `cw_veiculos` VALUES (10,'Audi Novato','R$ 6000,0','R$ 1000,00','<div>sdasd</div>','imagem_1313246663.jpg','13/08/2011','11:44:24','6');
INSERT INTO `cw_veiculos` VALUES (11,'Outro','R$ ','R$ ','','imagem_1313247852.jpg','13/08/2011','12:04:12','');
