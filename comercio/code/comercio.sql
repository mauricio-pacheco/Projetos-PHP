# phpMyAdmin MySQL-Dump
# version 2.2.0rc3
# http://phpwizard.net/phpMyAdmin/
# http://phpmyadmin.sourceforge.net/ (download page)
#
# Servidor: localhost
# Tempo de Generação: June 19, 2002, 6:21 am
# Versão do Servidor: 3.23.34
# Versão do PHP: 4.0.6
# Banco de Dados : comercio
# --------------------------------------------------------

#
# Estrutura da tabela 'boletim'
#

CREATE TABLE `boletim` (
  `id` int(10) NOT NULL auto_increment,
  `nome` varchar(70) NOT NULL default '',
  `email` varchar(70) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM;

#
# Extraindo dados da tabela 'boletim'
#

INSERT INTO boletim VALUES (7,'','rapariga@smo.com.br');
INSERT INTO boletim VALUES (3,'Paulo Magrini','magrini@smo.com.br');
INSERT INTO boletim VALUES (8,'','rambermail@insurer.com');
# --------------------------------------------------------

#
# Estrutura da tabela 'carrinho'
#

CREATE TABLE `carrinho` (
  `id_cliente` int(10) NOT NULL default '0',
  `id_produto` int(10) NOT NULL default '0',
  `quantidade` int(10) NOT NULL default '0',
  `descricao_produto` varchar(255) NOT NULL default '',
  `valor_produto` int(10) NOT NULL default '0',
  KEY `id_cliente` (`id_cliente`)
) TYPE=MyISAM;

#
# Extraindo dados da tabela 'carrinho'
#

INSERT INTO carrinho VALUES (9,36,1,'Cartucho de tinta p/ HP 695',7500);
# --------------------------------------------------------

#
# Estrutura da tabela 'categorias'
#

CREATE TABLE `categorias` (
  `cod_categoria` int(10) NOT NULL auto_increment,
  `descri_categoria` varchar(50) NOT NULL default '',
  `pertence_categoria` int(10) NOT NULL default '0',
  `gif` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`cod_categoria`)
) TYPE=MyISAM;

#
# Extraindo dados da tabela 'categorias'
#

INSERT INTO categorias VALUES (1,'Informática','','');
INSERT INTO categorias VALUES (2,'Acessórios',1,'1Acess%F3rios.jpg');
INSERT INTO categorias VALUES (3,'Cartuchos',2,'2Cartuchos.jpg');
INSERT INTO categorias VALUES (4,'Caixas de Som',2,'2Caixas%20de%20Som.jpg');
INSERT INTO categorias VALUES (6,'Monitores',1,'1Monitores.jpg');
INSERT INTO categorias VALUES (7,'Computadores',1,'1Computadores.jpg');
INSERT INTO categorias VALUES (8,'No-Breaks',1,'1No-Breaks.jpg');
INSERT INTO categorias VALUES (10,'IBM',7,'7IBM.jpg');
INSERT INTO categorias VALUES (11,'HP',3,'3HP.jpg');
INSERT INTO categorias VALUES (12,'Epson',3,'');
INSERT INTO categorias VALUES (13,'Lexmark',3,'');
INSERT INTO categorias VALUES (14,'BST',8,'8BST.jpg');
INSERT INTO categorias VALUES (15,'Creative',4,'4Creative.jpg');
INSERT INTO categorias VALUES (16,'Jtec',4,'');
INSERT INTO categorias VALUES (17,'Genius',4,'');
INSERT INTO categorias VALUES (18,'AOC',6,'6AOC.jpg');
INSERT INTO categorias VALUES (46,'Killer',4,'4Killer.jpg');
INSERT INTO categorias VALUES (35,'Formulários Contínuos',1,'1Formul%E1rios%20Cont%EDnuos.jpg');
INSERT INTO categorias VALUES (58,'Work Pads',2,'2Work%20Pads.jpg');
INSERT INTO categorias VALUES (29,'JVC',4,'4JVC.jpg');
INSERT INTO categorias VALUES (30,'EJM',4,'4EJM.jpg');
INSERT INTO categorias VALUES (56,'Mouses',2,'2Mouses.jpg');
INSERT INTO categorias VALUES (45,'Impressoras',1,'1Impressoras.jpg');
INSERT INTO categorias VALUES (49,'Mambo´s Sound',4,'4Mambo%B4s%20Sound.jpg');
INSERT INTO categorias VALUES (61,'Scanners',1,'1Scanners.jpg');
INSERT INTO categorias VALUES (52,'Epson',45,'45Epson.jpg');
INSERT INTO categorias VALUES (39,'Notebooks',7,'7Notebooks.jpg');
INSERT INTO categorias VALUES (41,'Placas de Som',1,'1Placas%20de%20Som.jpg');
INSERT INTO categorias VALUES (42,'Gravadores de CD',1,'1Gravadores%20de%20CD.jpg');
INSERT INTO categorias VALUES (43,'Placas Mãe',1,'1Placas%20M%E3e.jpg');
INSERT INTO categorias VALUES (57,'Joysticks',2,'2Joysticks.jpg');
INSERT INTO categorias VALUES (51,'HP',45,'45HP.jpg');
INSERT INTO categorias VALUES (53,'Palm Top´s',1,'1Palm%20Top%B4s.jpg');
INSERT INTO categorias VALUES (54,'HD´s',1,'1HD%B4s.jpg');
INSERT INTO categorias VALUES (59,' Mouses Especiais',2,'2%20Mouses%20Especiais.jpg');
INSERT INTO categorias VALUES (60,'Placas de Vídeo',1,'1Placas%20de%20V%EDdeo.jpg');
INSERT INTO categorias VALUES (63,'CD-Rom´s','','0CD-Rom%B4s.jpg');
INSERT INTO categorias VALUES (64,'Teste',63,'63Teste.jpg');
INSERT INTO categorias VALUES (65,'Roupas','','0Roupas.jpg');
INSERT INTO categorias VALUES (66,'Heavy Metal',63,'63Heavy%20Metal.jpg');
INSERT INTO categorias VALUES (67,'Forró',63,'63.jpg');
INSERT INTO categorias VALUES (68,'Samba',63,'63Samba.jpg');
INSERT INTO categorias VALUES (69,'Pagode',63,'63Pagode.jpg');
INSERT INTO categorias VALUES (70,'Malwe',65,'65Malwe.jpg');
INSERT INTO categorias VALUES (71,'Villante',65,'65Villante.jpg');
INSERT INTO categorias VALUES (72,'Ellus',65,'65Ellus.jpg');
INSERT INTO categorias VALUES (73,'Choice',65,'65Choice.jpg');
INSERT INTO categorias VALUES (74,'Rock',63,'0Rock.jpg');
INSERT INTO categorias VALUES (75,'Forum',65,'65Forum.jpg');
# --------------------------------------------------------

#
# Estrutura da tabela 'clientes'
#

CREATE TABLE `clientes` (
  `id` int(10) NOT NULL auto_increment,
  `nome_cliente` varchar(255) NOT NULL default '',
  `email_cliente` varchar(150) NOT NULL default '',
  `senha_cliente` varchar(30) NOT NULL default '',
  `fone_cliente` varchar(20) NOT NULL default '',
  `endereco_cliente` varchar(255) NOT NULL default '',
  `cidade_cliente` varchar(100) NOT NULL default '',
  `estado_cliente` varchar(50) NOT NULL default '',
  `cep_cliente` varchar(10) NOT NULL default '',
  `cpf_cliente` varchar(50) NOT NULL default '',
  `rg_cliente` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM;

#
# Extraindo dados da tabela 'clientes'
#

INSERT INTO clientes VALUES (29,'Raparigote','raparigote@smo.com.br','773359240eb9a1d9','','Teste','Teste','SC','','','');
INSERT INTO clientes VALUES (30,'Renegade','renegade@smo.com.br','773359240eb9a1d9','SDTRE','123','Teste','MT','89900','123','1234');
INSERT INTO clientes VALUES (33,'lyma','lyma@lymas.com','5dad05d871e0bbe0','2127668','Aqui mesmo','Salvador','BA','40000000','12345678','87654321');
INSERT INTO clientes VALUES (25,'Paulo Roberto Magrini','suporte2@smo.com.br','773359240eb9a1d9','49 622 1426','Naum','São Miguel do Oeste','SC','89900-000','1','2');
INSERT INTO clientes VALUES (26,'Ripper System','rippersystem@insurer.com','4ceccfc82e8801b7','6221426','Rua alberico','Teste','SC','89900-000','123','456');
INSERT INTO clientes VALUES (34,'eu','eu','077cce504923855a','eu','eu','eu','BA','eu','eu','eu');
INSERT INTO clientes VALUES (35,'claudio','claudio@gssom.com.br','79b7641057398036','','brotas','Salvador','BA','40000000','3222222222','222');
# --------------------------------------------------------

#
# Estrutura da tabela 'destaques'
#

CREATE TABLE `destaques` (
  `id` int(10) NOT NULL auto_increment,
  `nome_setor` varchar(50) default NULL,
  `id_destaque` tinyint(2) unsigned default '0',
  `foto` int(10) unsigned default '0',
  `descricao` varchar(255) default NULL,
  `texto` text,
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM;

#
# Extraindo dados da tabela 'destaques'
#

INSERT INTO destaques VALUES (1,'Destaque Principal','',29,'<b>Lymas.com -  O projeto de comércio virtual </b>','<br><br><b>Olá pessoal.<br><br><br></b>\r\nSejam bem vindos ao nosso site de compras para produtos automotivos!<br>Este projeto é baseado no script PHP Brazilian Merchant que está no início de seu desenvolvimento. Este início só terá continuidade se todos desenvolvedores estiverem dispostos a apoiar o projeto.<br><br>\r\nNós da equipe de desenvolvimento ficamos muito felizes com o resultado do trabalho até agora.\r\n<br><br>\r\nNo mais, apenas tenho muito a fazer e por enquanto pouco a colher, muito obrigado por estar usando o nosso site!\r\n<br><br><br><b><i>\r\nJo&atilde;o Lyma</i></b><br>Webmaster<br><br><br><br><br>');
INSERT INTO destaques VALUES (2,'Destaque sobre produtos',1,'','Promoções deste mês...','');
INSERT INTO destaques VALUES (4,'Ajuda',3,'','<b>Ajuda ao usuário</b>','<br><br>\nAbaixo algumas dicas para você não se perder ao navegar pelo nosso site.<br>\nTeste');
INSERT INTO destaques VALUES (5,'Notícias',12,'','Noticias on-line','Confira as principai notícias que ocoreram esta tarde.');
# --------------------------------------------------------

#
# Estrutura da tabela 'enquete'
#

CREATE TABLE `enquete` (
  `id` int(10) NOT NULL auto_increment,
  `descricao` varchar(255) NOT NULL default '0',
  `qtdcampos` int(10) unsigned default '0',
  `campos` text NOT NULL,
  `valorcampos` varchar(100) default '0',
  `ativa` tinyint(1) unsigned default '0',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM;

#
# Extraindo dados da tabela 'enquete'
#

INSERT INTO enquete VALUES (1,'Qual sua opniao sobre nosso site?',3,'Maravilhoso|Ótimo|Lindooooo','3|1|2',1);
# --------------------------------------------------------

#
# Estrutura da tabela 'pedidos'
#

CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL auto_increment,
  `id_cliente` int(10) NOT NULL default '0',
  `nome_cliente` varchar(100) NOT NULL default '',
  `endereco_entrega` varchar(255) NOT NULL default '',
  `cidade_entrega` varchar(100) NOT NULL default '',
  `estado_entrega` varchar(50) NOT NULL default '',
  `cep_entrega` varchar(9) NOT NULL default '',
  `produtos` text NOT NULL,
  `quantidades` text NOT NULL,
  `valores` text NOT NULL,
  `ativo` tinyint(1) NOT NULL default '1',
  `frete` varchar(255) NOT NULL default '0',
  `pagamento` varchar(255) NOT NULL default '',
  `mensagem` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM;

#
# Extraindo dados da tabela 'pedidos'
#

INSERT INTO pedidos VALUES (73,25,'Paulo Roberto Magrini','Naum','São Miguel do Oeste','SC','89900-000','46','1','21560','','2400','DOC, Transferência ou Depósito em conta','');
INSERT INTO pedidos VALUES (74,25,'Paulo Roberto Magrini','Naum','São Miguel do Oeste','SC','89900-000','58|7|24|25|44|23|29|57|35|43|21|20','1|1|2|1|1|1|1|1|1|1|1|1','37000|5200|45000|80870|14520|122000|211099|120000|142000|42000|12800|1900','','11193','SEDEX à COBRAR','');
INSERT INTO pedidos VALUES (81,30,'Renegade','123','Teste','MT','89900','32|7|29','1|3|2','65000|5200|211099','','6327','SEDEX à COBRAR','');
INSERT INTO pedidos VALUES (76,25,'Paulo Roberto Magrini','Naum','São Miguel do Oeste','SC','89900-000','22|7|61|24|46|28|55','1|12|2|1|3|1|1','22000|5200|25033|45000|21560|325000|15700','','8248','SEDEX à COBRAR','');
INSERT INTO pedidos VALUES (77,25,'Paulo Roberto Magrini','Naum','São Miguel do Oeste','SC','89900-000','61|25','1|1','25033|80870','','3459','SEDEX à COBRAR','');
INSERT INTO pedidos VALUES (78,25,'Paulo Roberto Magrini','Naum','São Miguel do Oeste','SC','89900-000','7|25|46|57','1|1|1|1','5200|80870|21560|120000','','4676','SEDEX à COBRAR','');
INSERT INTO pedidos VALUES (79,25,'Paulo Roberto Magrini','Naum','São Miguel do Oeste','SC','89900-000','29','1','211099','','4510','SEDEX à COBRAR','');
INSERT INTO pedidos VALUES (80,26,'Ripper System','Rua alberico','Teste','SC','89900-000','58','1','37000','','2400','DOC, Transferência ou Depósito em conta','');
INSERT INTO pedidos VALUES (82,33,'lyma','Aqui mesmo','Salvador','BA','40000000','66','1','2050','','','DOC, Transferência ou Depósito em conta','');
INSERT INTO pedidos VALUES (83,33,'lyma','Aqui mesmo','Salvador','BA','40000000','61','1','25033','','750','SEDEX à COBRAR','');
INSERT INTO pedidos VALUES (84,35,'claudio','brotas','Salvador','BA','40000000','61','2','25033','','1000','SEDEX à COBRAR','');
INSERT INTO pedidos VALUES (85,33,'lyma','Aqui mesmo','Salvador','BA','40000000','61','1','25033','','610#','DOC, Transferência ou Depósito em conta','');
INSERT INTO pedidos VALUES (86,33,'lyma','Aqui mesmo','Salvador','BA','40000000','7','1','5200','','610#','DOC, Transferência ou Depósito em conta','');
INSERT INTO pedidos VALUES (87,33,'lyma','Aqui mesmo','Salvador','BA','40000000','28','1','325000','','610#','DOC, Transferência ou Depósito em conta','');
INSERT INTO pedidos VALUES (88,33,'lyma','Aqui mesmo','Salvador','BA','40000000','46','1','21560','','810#','DOC, Transferência ou Depósito em conta','');
INSERT INTO pedidos VALUES (89,33,'lyma','Aqui mesmo','Salvador','BA','40000000','46','1','21560','','1025','SEDEX à COBRAR','');
INSERT INTO pedidos VALUES (90,33,'lyma','Aqui mesmo','Salvador','BA','40000000','7','1','5200','','610','DOC, Transferência ou Depósito em conta','');
INSERT INTO pedidos VALUES (91,33,'lyma','Aqui mesmo','Salvador','BA','40000000','58','1','37000','','999','DOC, Transferência ou Depósito em conta','');
INSERT INTO pedidos VALUES (92,33,'lyma','Aqui mesmo','Salvador','BA','40000000','58','1','37000','','999','DOC, Transferência ou Depósito em conta','');
INSERT INTO pedidos VALUES (93,33,'lyma','Aqui mesmo','Salvador','BA','40000000','58','1','37000','','999','DOC, Transferência ou Depósito em conta','');
INSERT INTO pedidos VALUES (94,33,'lyma','Aqui mesmo','Salvador','BA','40000000','58|55','1|1','37000|15700','','999','DOC, Transferência ou Depósito em conta','');
# --------------------------------------------------------

#
# Estrutura da tabela 'produto'
#

CREATE TABLE `produto` (
  `id` int(11) NOT NULL auto_increment,
  `cod_produto` int(11) NOT NULL default '0',
  `nome_produto` varchar(50) NOT NULL default '',
  `descri_produto` text,
  `valor_produto` int(11) NOT NULL default '0',
  `foto_produto` varchar(50) NOT NULL default '',
  `promo` tinyint(1) NOT NULL default '0',
  `peso_produto` int(10) NOT NULL default '0',
  `icone_produto` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM;

#
# Extraindo dados da tabela 'produto'
#

INSERT INTO produto VALUES (8,'','MotherBoard','Um placa mãe ué',230,'8.jpg','','','');
INSERT INTO produto VALUES (3,'','Notebook SEMPTOSHIBA','O melhor da categoria',178000,'3.jpg',1,8,'');
INSERT INTO produto VALUES (6,'','Joystick','Um joy',3710,'6.jpg','','','');
INSERT INTO produto VALUES (7,'','CD-ROM 64X NEC','Drive de CD-ROM',5200,'7.jpg','',250,'');
INSERT INTO produto VALUES (9,'','Imac Roxo Power G300','ahaheuaheuh',270000,'9.jpg',1,'','');
INSERT INTO produto VALUES (18,'','Mother Board PII até 550','Placa mãe para PII até 550 MHZ',57020,'18.jpg','','','');
INSERT INTO produto VALUES (19,'','Super Promoção - Gravador Externo PCMCIA','UM excelente gravador para seu Notebook, Grava em 12 X',45090,'19.jpg','',2,'');
INSERT INTO produto VALUES (20,'','Sound Blaster 16','Placa de Som de 16 bits da Creative.',1900,'20.jpg','',550,'');
INSERT INTO produto VALUES (21,'','Sound Blaster !Live','',12800,'21.jpg','',750,'');
INSERT INTO produto VALUES (22,'','Caixa som - Creative SB 8900','',22000,'22.jpg','',100,'');
INSERT INTO produto VALUES (23,'','HP Deskjet 930','Impressora de alta qualidade',122000,'23.jpg','',4700,'');
INSERT INTO produto VALUES (24,'','Epson 777i - Altíssima qualidade e desempenho','',45000,'24.jpg','','','');
INSERT INTO produto VALUES (25,'','Epson 880','A impressora da linha InkJet mais rápida no momento.\n<br>\n<br>\n<br>\nAlém de muito veloz esta impressora permite a impressão de até 2880x1400 ppp, em papel especial.\n<br>\n<br>\n<br>\n\n<br>\n<br>\n<br>\nDestinada a usuários que querem o melhor em qualidade gráfica.',80870,'25.jpg',1,'','');
INSERT INTO produto VALUES (26,'','Imac Power G300 Roxo','O mais belo e potente da categoria',355000,'26.jpg','',12000,'');
INSERT INTO produto VALUES (28,'','IBM NetVisa 3000','O melhor da Internet na sua mesa de trabalho.',325000,'28.jpg',2,12500,'');
INSERT INTO produto VALUES (29,'','IBM - PC 300','O melhor custo benefício da categoria.\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>',211099,'29.jpg','',7500,'');
INSERT INTO produto VALUES (30,'','Maxtor E-200','O mais rápido HD para portas IDE',72000,'30.jpg','',2750,'');
INSERT INTO produto VALUES (31,'','IBM E/WISE - SCSI Ultra WIDE','Alto desempenho a médio custo',210000,'31.jpg','',2750,'');
INSERT INTO produto VALUES (32,'','BARRACUDA','Hard Disk',65000,'32.jpg','',2700,'');
INSERT INTO produto VALUES (33,'','HP Apolo 2200','Além de linda ela funciona.',35000,'33.jpg',2,4200,'');
INSERT INTO produto VALUES (35,'','Plotter - Design Jet HP 500','',142000,'35.jpg',2,22000,'');
INSERT INTO produto VALUES (36,'','Cartucho de tinta p/ HP 695','',7500,'','',250,'');
INSERT INTO produto VALUES (40,'','SCANNER 920','',72300,'38.jpg','',5,'38.gif');
INSERT INTO produto VALUES (42,'','Scanner 820','',58025,'41.jpg','',6,'41.gif');
INSERT INTO produto VALUES (43,'','Scanner 820','',42000,'43.jpg',1,1200,'43.gif');
INSERT INTO produto VALUES (44,'','Escanner','TYeste',14520,'','',2,'');
INSERT INTO produto VALUES (46,'','Gravador Philips IDE - 16x10x32','Excelente gravador a Philips',21560,'46.jpg','',4000,'46.gif');
INSERT INTO produto VALUES (48,'','Scanner Master teste','teste',12000,'47.jpg','',12000,'47.gif');
INSERT INTO produto VALUES (57,'','IBM - WorkPad','O IBM workpad é ideal para a rápida obtenção de vendas em grandes empresas.\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\n<br>\r<br>\nContando com diversas funcionalidades com certeza é um investimento válido.',120000,'57.jpg','',750,'57.gif');
INSERT INTO produto VALUES (55,'','Mother Board Best','The best of mother',15700,'','',120,'');
INSERT INTO produto VALUES (53,'','dfgdf','',1700,'','','','');
INSERT INTO produto VALUES (54,'','dfgdf','',1700,'','','','');
INSERT INTO produto VALUES (61,'','dfgbdfg','dfgsdfg',25033,'61.jpg',1,'','61.gif');
INSERT INTO produto VALUES (60,'','GE FORCE II MX 400','',29800,'60.jpg','','','59.gif');
INSERT INTO produto VALUES (58,'','BST 600 Va','Sem comparação.\r<br />\n<br />\r<br />\n<br>\r<br />\n<br />\r<br />\n<br>\r<br />\n<br />\r<br />\n<br>\r<br />\n<br />\r<br />\n<br>\r<br />\n<br />\r<br />\n<br>\r<br />\n<br />\r<br />\n<br>\r<br />\n<br />\r<br />\n<br>\r<br />\n<br />\r<br />\n\r<br />\n<br />\r<br />\n<br>\r<br />\n<br />\r<br />\n<br>\r<br />\n<br />\r<br />\n<br>\r<br />\n<br />\r<br />\n<br>\r<br />\n<br />\r<br />\n<br>\r<br />\n<br />\r<br />\n<br>\r<br />\n<br />\r<br />\n<br>\r<br />\n<br />\r<br />\nO melhor no-brake do mercado p/ diversos gostos.',37000,'58.jpg','',7500,'58.gif');
INSERT INTO produto VALUES (63,'','Nvadia','Deve vir munha',15020,'','',450,'62.gif');
INSERT INTO produto VALUES (64,'','Pla de São','Teste',550320,'64.jpg','',500,'64.gif');
INSERT INTO produto VALUES (65,'','Teste imagens','Olá teste',45020,'65.jpg','',500,'65.gif');
INSERT INTO produto VALUES (66,'','Calcinha Suja','A banda fedendo a bacalhau',2050,'','',50,'');
INSERT INTO produto VALUES (67,'','Calca Jeans','Ótima costura e durabilidade.',6524,'','',600,'');
# --------------------------------------------------------

#
# Estrutura da tabela 'produto_categoria'
#

CREATE TABLE `produto_categoria` (
  `cod_produto` int(10) NOT NULL default '0',
  `cod_categoria` int(10) NOT NULL default '0'
) TYPE=MyISAM;

#
# Extraindo dados da tabela 'produto_categoria'
#

INSERT INTO produto_categoria VALUES (6,2);
INSERT INTO produto_categoria VALUES (62,60);
INSERT INTO produto_categoria VALUES (59,60);
INSERT INTO produto_categoria VALUES (3,39);
INSERT INTO produto_categoria VALUES (7,2);
INSERT INTO produto_categoria VALUES (38,61);
INSERT INTO produto_categoria VALUES (8,2);
INSERT INTO produto_categoria VALUES (9,2);
INSERT INTO produto_categoria VALUES (18,43);
INSERT INTO produto_categoria VALUES (41,1);
INSERT INTO produto_categoria VALUES (19,42);
INSERT INTO produto_categoria VALUES (20,41);
INSERT INTO produto_categoria VALUES (21,41);
INSERT INTO produto_categoria VALUES (22,15);
INSERT INTO produto_categoria VALUES (23,51);
INSERT INTO produto_categoria VALUES (24,52);
INSERT INTO produto_categoria VALUES (25,52);
INSERT INTO produto_categoria VALUES (26,9);
INSERT INTO produto_categoria VALUES (61,60);
INSERT INTO produto_categoria VALUES (28,10);
INSERT INTO produto_categoria VALUES (29,10);
INSERT INTO produto_categoria VALUES (30,54);
INSERT INTO produto_categoria VALUES (31,54);
INSERT INTO produto_categoria VALUES (32,54);
INSERT INTO produto_categoria VALUES (33,51);
INSERT INTO produto_categoria VALUES (35,51);
INSERT INTO produto_categoria VALUES (36,11);
INSERT INTO produto_categoria VALUES (43,61);
INSERT INTO produto_categoria VALUES (44,61);
INSERT INTO produto_categoria VALUES (47,61);
INSERT INTO produto_categoria VALUES (46,42);
INSERT INTO produto_categoria VALUES (57,53);
INSERT INTO produto_categoria VALUES (65,45);
INSERT INTO produto_categoria VALUES (55,43);
INSERT INTO produto_categoria VALUES (64,41);
INSERT INTO produto_categoria VALUES (58,14);
INSERT INTO produto_categoria VALUES (56,60);
INSERT INTO produto_categoria VALUES (66,67);
INSERT INTO produto_categoria VALUES (67,75);


