
#
# Table structure for table `net2ftp_logAccess`
#

CREATE TABLE net2ftp_logAccess (
  date date NOT NULL default '0000-00-00',
  time time NOT NULL default '00:00:00',
  remote_addr text NOT NULL,
  remote_port text NOT NULL,
  http_user_agent text NOT NULL,
  page text NOT NULL,
  ftpserver text NOT NULL,
  username text NOT NULL,
  state text NOT NULL,
  manage text NOT NULL,
  directory text NOT NULL,
  file text NOT NULL,
  http_referer text NOT NULL
) TYPE=MyISAM;
# --------------------------------------------------------

#
# Table structure for table `net2ftp_logError`
#

CREATE TABLE net2ftp_logError (
  date date NOT NULL default '0000-00-00',
  time time NOT NULL default '00:00:00',
  ftpserver text NOT NULL,
  username text NOT NULL,
  message text NOT NULL,
  cause text NOT NULL,
  drilldown text NOT NULL,
  state text NOT NULL,
  manage text NOT NULL,
  directory text NOT NULL,
  debug1 text NOT NULL,
  debug2 text NOT NULL,
  debug3 text NOT NULL,
  debug4 text NOT NULL,
  debug5 text NOT NULL,
  remote_addr text NOT NULL,
  remote_port text NOT NULL,
  http_user_agent text NOT NULL
) TYPE=MyISAM;
# --------------------------------------------------------

#
# Table structure for table `net2ftp_logLogin`
#

CREATE TABLE net2ftp_logLogin (
  date date NOT NULL default '0000-00-00',
  time time NOT NULL default '00:00:00',
  ftpserver text NOT NULL,
  username text NOT NULL,
  remote_addr text NOT NULL,
  remote_port text NOT NULL,
  http_user_agent text NOT NULL
) TYPE=MyISAM;