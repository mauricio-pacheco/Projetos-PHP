# MySQL-Front 3.1  (Build 4.38)


# Host: local    Database: engenharia
# ------------------------------------------------------
# Server version 5.0.51

#
# Table structure for table cadastro
#

CREATE TABLE `cadastro` (
  `id` tinyint(250) NOT NULL auto_increment,
  `nome` varchar(250) default '0',
  `cpf` varchar(250) default '0',
  `dependente` varchar(250) default '0',
  `aliquota` varchar(250) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Dumping data for table cadastro
#


#
# Table structure for table fornecedores
#

CREATE TABLE `fornecedores` (
  `id` tinyint(250) NOT NULL auto_increment,
  `nome` varchar(250) default '0',
  `email` varchar(250) default '0',
  `telefone` varchar(250) default '0',
  `produto` varchar(250) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Dumping data for table fornecedores
#


