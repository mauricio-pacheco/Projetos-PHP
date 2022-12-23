# MySQL-Front Dump 2.5
#
# Host: localhost   Database: trilheiros
# --------------------------------------------------------
# Server version 4.0.22-nt


#
# Table structure for table 'agenda'
#

CREATE TABLE agenda (
  id int(8) NOT NULL auto_increment,
  assunto varchar(250) default NULL,
  local varchar(250) default NULL,
  texto longtext,
  data varchar(50) default NULL,
  hora varchar(50) default NULL,
  dataevento varchar(60) default NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM;



#
# Dumping data for table 'agenda'
#



#
# Table structure for table 'fotos'
#

CREATE TABLE fotos (
  id int(8) NOT NULL auto_increment,
  galeria varchar(250) default '0',
  foto varchar(250) default '0',
  data varchar(50) default '0',
  hora varchar(50) default '0',
  comentario varchar(250) default NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM;



#
# Dumping data for table 'fotos'
#



#
# Table structure for table 'galeria'
#

CREATE TABLE galeria (
  id int(5) NOT NULL auto_increment,
  nomegaleria varchar(250) default NULL,
  data varchar(50) default NULL,
  hora varchar(50) default NULL,
  foto varchar(250) default NULL,
  comentario text,
  PRIMARY KEY  (id)
) TYPE=MyISAM;



#
# Dumping data for table 'galeria'
#



#
# Table structure for table 'integrantes'
#

CREATE TABLE integrantes (
  id int(8) NOT NULL auto_increment,
  telefone varchar(50) default NULL,
  nome varchar(250) default '0',
  foto varchar(250) default '0',
  nascimento varchar(30) default '0',
  email varchar(250) default '0',
  senha varchar(50) default '0',
  data varchar(30) default '0',
  fax varchar(20) default '0',
  endereco varchar(250) default '0',
  complemento varchar(150) default '0',
  bairro varchar(100) default '0',
  cidade varchar(250) default '0',
  cep varchar(16) default '0',
  estado varchar(40) default '0',
  msg varchar(250) default '0',
  hora varchar(30) default NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM;



#
# Dumping data for table 'integrantes'
#



#
# Table structure for table 'mensagens'
#

CREATE TABLE mensagens (
  id int(8) NOT NULL auto_increment,
  autor varchar(250) default '0',
  titulo varchar(250) default '0',
  texto text,
  data varchar(10) default '0',
  hora varchar(10) default '0',
  idrecebedor varchar(4) default NULL,
  idusuario varchar(4) default NULL,
  nomeusuario varchar(250) default NULL,
  fotousuario varchar(250) default NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM;



#
# Dumping data for table 'mensagens'
#



#
# Table structure for table 'noticias'
#

CREATE TABLE noticias (
  id int(8) NOT NULL auto_increment,
  assunto varchar(250) default '0',
  local varchar(250) default '0',
  texto longtext,
  data varchar(50) default '0',
  hora varchar(50) default '0',
  PRIMARY KEY  (id)
) TYPE=MyISAM;



#
# Dumping data for table 'noticias'
#



#
# Table structure for table 'visitas'
#

CREATE TABLE visitas (
  id int(50) NOT NULL default '0',
  ip varchar(11) NOT NULL default '',
  data varchar(10) NOT NULL default ''
) TYPE=MyISAM;



#
# Dumping data for table 'visitas'
#

