


#
# Table structure for table 'cadastro'
#

CREATE TABLE cadastro (
  id int(3) unsigned NOT NULL auto_increment,
  email varchar(250) default '0',
  data varchar(20) default '0',
  hora varchar(20) default '0',
  PRIMARY KEY  (id)
) TYPE=MyISAM;

