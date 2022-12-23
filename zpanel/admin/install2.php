<?php
if (!isset($_POST['db_host'])) {
	if(file_exists('../database/mysql.php')) {
		$down_one = "yes";
		require_once('../database/db.php');
 
		if (isset($row_Config['installed'])) {
			if ($row_Config['installed'] == '1') {
				echo ("<script language=javascript>document.location.href = '../index.php'</script>");
			}
		}
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>ZPanel</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../default.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#CCCCCC" topmargin="0">
<div align="center">
  <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
    <!-- fwtable fwsrc="default.png" fwbase="default.gif" fwstyle="Dreamweaver" fwdocid = "742308039" fwnested="0" -->
    <tr> 
      <td width="188"><img src="../images/templates/spacer.gif" width="188" height="1" border="0" alt=""></td>
      <td width="243"><img src="../images/templates/spacer.gif" width="243" height="1" border="0" alt=""></td>
      <td width="349"><img src="../images/templates/spacer.gif" width="349" height="1" border="0" alt=""></td>
    </tr>
    <tr> 
      <td rowspan="2"><img name="default_r1_c1" src="../images/templates/default_r1_c1.jpg" width="188" height="208" border="0" alt=""></td>
      <td><img name="default_r1_c2" src="../images/templates/default_r1_c2.jpg" width="243" height="98" border="0" alt=""></td>
      <td><img name="default_r1_c3" src="../images/templates/default_r1_c3.jpg" width="349" height="98" border="0" alt=""></td>
    </tr>
    <tr> 
      <td><img name="default_r2_c2" src="../images/templates/default_r2_c2.jpg" width="243" height="110" border="0" alt=""></td>
      <td><img name="default_r2_c3" src="../images/templates/default_r2_c3.jpg" width="349" height="110" border="0" alt=""></td>
    </tr>
    <tr> 
      <td height="241" align="left" valign="top" background="../images/templates/default_r3_c1.gif" bgcolor="#FFFFFF" style="background-repeat:no-repeat"><br>
        <br><ul>
          <li><font color="#999999"><strong>Welcome to ZPanel</strong></font></li>
          <li><strong><font color="#FF0000">Setup Database</font></strong></li>
          <li><strong>Setup Admin</strong></li>
          <li><strong>Setup System Info.</strong></li>
          <li><strong>Customize Packages</strong></li>
          <li><strong>Finished!</strong></li>
        </ul>
        <strong>Step 2 of 6</strong><br>
        <table width="143" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#F4F4F4">
          <tr> 
            <td height="25" align="left" valign="top"><font color="#0000FF"><strong><font color="#FF0000">|||</font></strong></font><font color="#FF0000"><strong>||||||</strong></font><strong><font color="#FF0000">|||||||</font>||||||||||||||||||||||||||||||</strong></td>
          </tr>
        </table></td>
      <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF"><p><font size="4"><strong>Setup 
          2: Setup Database</strong></font></p>
        <blockquote>
<?php
if (isset($_POST['inject'])){
$host = $_POST['db_host'];
$user = $_POST['db_user'];
$pass = $_POST['db_pass'];
$name = $_POST['db_name'];
$db_prefix = "";
$getconn = mysql_connect("$host" , "$user" , "$pass");
if (!isset($getconn)) die ("Sorry, an error occured. Please check your database info is correct.");
mysql_select_db($name, $getconn) or die ("Sorry, an error occured. Please check your database info is correct and make sure your database already excists!");
 $colname_Installers = "1";
 $query_Installers = sprintf("SELECT * FROM installers WHERE id = '1'", $colname_Installers);
 $Installers = mysql_query($query_Installers, $getconn);
 $row_Installers = mysql_fetch_assoc($Installers);
 $totalRows_Installers = mysql_num_rows($Installers);

if (isset($row_Installers['id'])) {
	echo ("<script language=javascript>alert('Looks like you're upgrading.')</script>");
}
if (!isset($row_Installers['id'])) {

	echo ('Creating Billing Database... ');
	$query = "CREATE TABLE `billingbase` (
	  `id` int(11) NOT NULL auto_increment,
	  `servicename` varchar(100) NOT NULL default '',
	  `date` date NOT NULL default '0000-00-00',
	  `amount` mediumint(9) NOT NULL default '0',
	  `method` varchar(100) NOT NULL default '',
	  `currentbill` mediumint(9) NOT NULL default '0',
	  `debitorcredit` varchar(100) NOT NULL default '',
	  `service` varchar(100) NOT NULL default '',
	  PRIMARY KEY  (`id`)
	)";
	$result = mysql_query($query);
	echo ('Done<br>');

	echo ('Creating Config Database... ');
	$query = "CREATE TABLE `config` (
	  `server_pop` varchar(100) default '',
	  `server_smtp` varchar(100) default '',
	  `hide_asp` varchar(100) default '',
	  `admin_password` varchar(100) default '',
	  `admin_username` varchar(100) default '',
	  `admin_name` varchar(100) default '',
	  `company` varchar(100) default '',
	  `installed` varchar(100) default '0',
	  `support_link` varchar(100) default '',
	  `support_email` varchar(100) default '',
	  `email_admin` varchar(100) default '',
	  `email_webmail` varchar(100) default '',
	  `installdir` varchar(100) default '',
	  `broadcastmessage` varchar(100) default '',
	  `domainname` varchar(100) default '',
	  `language` varchar(100) default 'english.php',
	  `ftpserver` varchar(100) default 'ftp.zee-way.com',
	  `template` varchar(100) default 'ZPanelV2'
	)";
	$result = mysql_query($query);
	echo ('Done<br>');

	echo ('Creating Customer Database... ');
	$query = "CREATE TABLE `custumerbase` (
	  `id` int(11) NOT NULL auto_increment,
	  `servicename` varchar(20) NOT NULL default '',
	  `name` varchar(50) default NULL,
	  `Rank` varchar(10) NOT NULL default 'User',
	  `email` varchar(100) default NULL,
	  `adminemail` varchar(100) default NULL,
	  `ftppass` varchar(100) NOT NULL default '',
	  `address` varchar(100) default NULL,
	  `city` varchar(20) default NULL,
	  `state` varchar(5) default NULL,
	  `zip` varchar(10) default NULL,
	  `phone` varchar(50) default NULL,
	  `webservice` varchar(50) default NULL,
	  `mailservice` varchar(50) default NULL,
	  `gameservice` varchar(50) default NULL,
	  `stats_installed` varchar(100) default NULL,
	  `status` varchar(20) default NULL,
	  `homedir` varchar(100) default '',
	  `ftpaccounts` varchar(100) default NULL,
	  `mysqluser` varchar(20) default NULL,
	  `mysqlpass` varchar(20) default NULL,
	  `mysqldatabases` varchar(100) default NULL,
	  `notes` longtext,
	  `PaidTill` date default '0000-00-00',
	  `lost_key` varchar(60) default '0',
	  `lost_date` datetime default '0000-00-00 00:00:00',
	  `gameserver` varchar(50) default NULL,
	  `gameserverport` varchar(20) default NULL,
	  `url` varchar(200) default NULL,
	  PRIMARY KEY  (`id`),
	  UNIQUE KEY `servicename` (`servicename`)
	)";
	$result = mysql_query($query);
	echo ('Done<br>');

	echo ('Creating Installers Database... ');
	$query = "CREATE TABLE `installers` (
	  `id` int(11) NOT NULL auto_increment,
	  `name` varchar(100) NOT NULL default '',
	  `shortname` varchar(100) NOT NULL default '',
	  `website` varchar(100) default '',
	  `scripttype` varchar(100) default '',
	  `installer-path` varchar(100) NOT NULL default '',
	  `filepath` varchar(100) NOT NULL default '',
	  `icon` varchar(100) default '',
	  `welcome` varchar(100) default '',
	  `silent` tinyint(1) NOT NULL default '1',
	  `instructions` text,
	  `finalmessage` text,
	  `exampledir` varchar(100) default '',
	  PRIMARY KEY  (`id`)
	)";
	$result = mysql_query($query);
	echo ('Done<br>');

	echo ('Creating Packages Database... ');
	$query = "CREATE TABLE `packages` (
	  `package_name` varchar(100) default '',
	  `package_type` varchar(100) default '',
	  `package_quota` varchar(100) default '',
	  `package_mo_price` varchar(100) default '',
	  `id` int(11) NOT NULL auto_increment,
	  `maxftp` varchar(100) default '',
	  `maxsql` varchar(100) default '',
	  PRIMARY KEY  (`id`)
	)";
	$result = mysql_query($query);
	echo ('Done<br>');

	echo ('Creating Private Messages Database... ');
	$query = "CREATE TABLE `privatemessages` (
		`messageid` int(11) NOT NULL auto_increment,
  		`whoto` varchar(100) default NULL,
  		`whofrom` varchar(100) default NULL,
  		`message` text,
  		`timestamp` timestamp(14) NOT NULL,
  		PRIMARY KEY  (`messageid`)
		)";
	$result = mysql_query($query);
	echo ('Done<br>');

	echo ('Creating Buddy List Database... ');
	$query = "CREATE TABLE `buddylists` (
	  `buddyid` int(11) NOT NULL auto_increment,
	  `listowner` varchar(100) default '',
	  `buddy` varchar(100) default '',
	  PRIMARY KEY  (`buddyid`)
	)";
	$result = mysql_query($query);
	echo ('Done<br>');

	echo ('Inserting defaults into the database... ');
	$query = "INSERT INTO `billingbase` VALUES (1, 'demo', '2003-08-10', 15, 'Paypal', 20, 'Basic Web Hosting')";
	$result = mysql_query($query);
	$query = "INSERT INTO `config` VALUES ('mail.zee-way.com', 'mail.zee-way.com', 'yes', 'Admin', 'Test', 'Test Admin', 'Zee-Way Services', '0', 'http://www.zee-way.com/contact.php', 'support@zee-way.com', 'http://mailadmin.zee-way.com', 'http://mail.zee-way.com', 'd:/wwwroot/cpanel', NULL, 'zee-way.com', 'english.php', 'ftp.zee-way.com', 'ZPanelV2')";
	$result = mysql_query($query);
	$query = "INSERT INTO `custumerbase` VALUES (9, 'demo', 'Demo User', 'User', 'demo@zee-way.com', NULL, 'demo', NULL, NULL, NULL, NULL, NULL, 'Basic', NULL, NULL, NULL, 'Active', 'd:/wwwroot/hosted/demo', NULL, 'demo', 'demo', 'demo-1,demo-2', NULL, '0000-00-00', '0', '0000-00-00 00:00:00', NULL, NULL, 'http://demo.yourdomain.com')";
	$result = mysql_query($query);
	$query = "INSERT INTO `installers` VALUES (1, 'PHP-Nuke 7.2', 'PHP-Nuke', 'http://www.phpnuke.org', 'PHP', 'install-phpnuke.php', '%installdir%/installers/phpnuke72/', 'images/icons/addon.gif', 'Already installed PHP-Nuke and need to setup or upgrade your database?', 1, '<ol><li><font size=2>Login to your FTP account and edit config.php, in the PHP-Nuke directory.</font></li><li><font size=2>Login to phpMyAdmin through the MySQL page and use %dir/nuke.sql to load your database. If you are UPGRADING then please view your %dir/upgrades folder and run the updater for your version.</a></font></li></ol>', 'Great, your PHP-Nuke has been installed!<br><br>Please follow the steps below to finish setting up your PHP-Nuke<br><br><a href=install.php>Done...</a><br>', 'nuke')";
	$result = mysql_query($query);
	$query = "INSERT INTO `installers` VALUES (2, 'paFileDB 3', 'paFileDB', 'http://www.phparena.net/pafiledb.php', 'PHP', '', '%installdir%/installers/pafiledb/', 'images/icons/addon.gif', '', 1, NULL, 'Great, your paFileDB has been installed!<br><br>Administer your downloads at <a href=http://%url%/%dir%/install.php target=_blank>http://%url%/%dir%/install.php</a>', 'downloads')";
	$result = mysql_query($query);
	$query = "INSERT INTO `installers` VALUES (3, 'FusionNews 3.6.1', 'FusionNews', 'http://www.fusionphp.net/index.php?id=fnews/fn_features', 'PHP', '', '%installdir%/installers/fusionnews/', 'images/icons/addon.gif', NULL, 1, NULL, 'Great, your FusionNews has been installed!<br><br>Administer your forum at <a href=http://%url%/%dir%/installer.php target=_blank>http://%url%/%dir%/installer.php</a>', 'news')";
	$result = mysql_query($query);
	$query = "INSERT INTO `installers` VALUES (4, 'Aardvark TopSites 4.1.1', 'TopSites', 'http://www.aardvarkind.com/index.php?page=topsitesphp', 'PHP', '', '%installdir%/installers/topsitesphp/', 'images/icons/addon.gif', NULL, 1, NULL, 'Great, your Aardvark Topsites has been installed!<br><br>Administer your topsites at <a href=http://%url%/%dir%/install.php target=_blank>http://%url%/%dir%/install.php</a>', 'topsites')";
	$result = mysql_query($query);
	$query = "INSERT INTO `installers` VALUES (5, 'phpBB Forums 2.0.8a', 'phpBB', 'http://www.phpbb.com', 'PHP', '', '%installdir%/installers/phpBB2/', 'images/icons/forum.gif', NULL, 1, NULL, 'Great, your phpBB has been installed!<br><br>Administer your forum at <a href=http://%url%/%dir%/ target=_blank>http://%url%/%dir%/</a>', 'forums')";
	$result = mysql_query($query);
	$query = "INSERT INTO `installers` VALUES (6, 'MaxWebPortal 1.33', 'MaxWebPortal', 'http://www.maxwebportal.com/', 'ASP', '', '%installdir%/installers/MaxWebPortal/', 'images/icons/addon.gif', 'Already installed MaxWebPortal and need to setup?', 1, '<ol>\n    <li><font size=2>Login to your FTP account and open config.asp, in the MaxWebPortal \n      directory.</font></li>\n    <li><font size=2>On line 42</font></li>\n  </ol>\n  <ul>\n    <li><font size=2><strong>Find:</strong> strConnString = &quot;Provider=Microsoft.Jet.OLEDB.4.0;Data \n      Source=D:\\wwwroot\\hosted\\YOUR-SERVICE-NAME\\MaxWebPortal\\database\\db2000.mdb&quot; \n      \'## MS Access 2000</font></li>\n    <li><font size=2><strong>Replace with: </strong>strConnString = &quot;Provider=Microsoft.Jet.OLEDB.4.0;Data \n      Source=D:\\wwwroot\\hosted\\%username%\\%dir%\\database\\db2000.mdb&quot; \'## MS Access 2000</font></li>\n  </ul>', 'Great, your MaxWebPortal has been installed!<br><br>Please follow the steps below to finish setting up your MaxWebPortal<br><br><a href=install.php>Done...</a>', 'portal')";
	$result = mysql_query($query);
	$query = "INSERT INTO `installers` VALUES (7, 'Snitz Forums 2000 3.4.04', 'Snitz', 'http://forum.snitz.com', 'ASP', '', '%installdir%/installers/snitzforums2000/', 'images/icons/forum.gif', NULL, 1, NULL, 'Great, your Snitz Forum has been installed!<br><br>Administer your forum at <a href=http://%url%/%dir%/setup.asp target=_blank>http://%url%/%dir%/setup.asp</a>', 'forums')";
	$result = mysql_query($query);
	$query = "INSERT INTO `installers` VALUES (8, 'phpOpenChat', 'phpOpenChat', 'http://phpopenchat.org/', 'PHP', '', '%installdir%/installers/phpopenchat/', 'images/icons/chat.gif', 'Already installed phpOpenChat and just need to set it up?', 1, '1. Import PHPOpenChat\'s database-schema db.schema.txt into your MySQL database.<br>\n<br>\n2. Change configuration settings in config.inc.php<br>\n&nbsp;&nbsp;&nbsp;- the hostname, where the database runs<br>\n&nbsp;&nbsp;&nbsp;  define(\'DATABASE_HOST\',\'localhost\');<br>\n&nbsp;&nbsp;&nbsp;- the database user with proper access rights<br>\n&nbsp;&nbsp;&nbsp;  define(\'DATABASE_USER\',\'\');<br>\n&nbsp;&nbsp;&nbsp;- the password of this database user<br>\n&nbsp;&nbsp;&nbsp;  define(\'DATABASE_PASSWORD\',\'\');<br>\n&nbsp;&nbsp;&nbsp;- the name of your created database which will contain your sql-tables (In other cases than mysql, it may be called \'tablespace\')<br>\n&nbsp;&nbsp;&nbsp;  define(\'DATABASE_TABLESPACE\',\'\');<br>', 'Great, your phpOpenChat has been installed!<br><br>Please follow the steps below to finish setting up your phpOpenChat<br><br><a href=install.php>Done...</a>', 'chats')";
	$result = mysql_query($query);
	$query = "INSERT INTO `packages` VALUES ('Basic', 'Web', '300', '10', 1, '5', '2')";
	$result = mysql_query($query);
	$query = "INSERT INTO `packages` VALUES ('Advanced', 'Web', '800', '35', 2, '10', '5')";
	$result = mysql_query($query);
	$query = "INSERT INTO `packages` VALUES ('Expert', 'Web', '1300', '50', 3, '20', '6')";
	$result = mysql_query($query);
	$query = "INSERT INTO `packages` VALUES ('Unlimited', 'Web', '7000', '0', 4, '1000', '1000')";
	$result = mysql_query($query);
	echo ('Done<br>');

	$filename = '../database/mysql.php'; //your mysql info file

	// clear config file
	$fp = fopen($filename,"w");
	fclose($fp);
	
			// Write out the config file.
			$config_data = '<?php'."\n\n";
			$config_data .= "\n// ZPanel auto-generated config file\n// Do not change anything in this file!\n\n";
			$config_data .= '$db_host = \'' . $host . '\';' . "\n";
			$config_data .= '$db_name = \'' . $name . '\';' . "\n";
			$config_data .= '$db_user = \'' . $user . '\';' . "\n";
			$config_data .= '$db_pass = \'' . $pass . '\';' . "\n\n";
			$config_data .= '?' . '>'; // Done this to prevent highlighting editors getting confused!

	if (is_writable($filename)) {
		$handle = fopen($filename, 'a');

    	if (!$handle = fopen($filename, 'a')) {
         	die ("Cannot open file ($filename)");
         	exit;
    	}
	    if (!fwrite($handle, $config_data)) {
        	die ("Cannot write to file ($filename)");
        	exit;
    	}
    	print "Success, wrote your configs to file ($filename)";
    	fclose($handle);
	} else {
    	print "The file $filename is not writable";
	}
				
	echo ("<script language=javascript>document.location.href = 'install3.php'</script>");
}else{

	echo ('Creating Private Messages Database... ');
	$query = "CREATE TABLE `privatemessages` (
		`messageid` int(11) NOT NULL auto_increment,
  		`whoto` varchar(100) default NULL,
  		`whofrom` varchar(100) default NULL,
  		`message` text,
  		`timestamp` timestamp(14) NOT NULL,
  		PRIMARY KEY  (`messageid`)
		)";
	$result = mysql_query($query);
	echo ('Done<br>');

	echo ('Creating Buddy List Database... ');
	$query = "CREATE TABLE `buddylists` (
	  `buddyid` int(11) NOT NULL auto_increment,
	  `listowner` varchar(100) default '',
	  `buddy` varchar(100) default '',
	  PRIMARY KEY  (`buddyid`)
	)";
	$result = mysql_query($query);
	echo ('Done<br>');

	echo ('Updating Billing Database... ');
	$query = "ALTER TABLE billingbase ADD debitorcredit VARCHAR(100) NOT NULL DEFAULT ''";
	$result = mysql_query($query);
	echo ('Done<br>');

	echo ('Updating Config Database... ');
	$query = "ALTER TABLE config ADD language VARCHAR(100) DEFAULT 'english.php'";
	$result = mysql_query($query);
	$query = "ALTER TABLE config ADD ftpserver VARCHAR(100) DEFAULT 'ftp.zee-way.com'";
	$result = mysql_query($query);
	$query = "ALTER TABLE config ADD template VARCHAR(100) DEFAULT 'ZPanelV2'";
	$result = mysql_query($query);
	echo ('Done<br>');

	echo ('Updating Packages Database... ');
	$query = "ALTER TABLE packages ADD package_mo_price VARCHAR(100) DEFAULT '1'";
	$result = mysql_query($query);
	$query = "ALTER TABLE packages ADD maxftp VARCHAR(100) DEFAULT '1'";
	$result = mysql_query($query);
	$query = "ALTER TABLE packages ADD maxsql VARCHAR(100) DEFAULT '1'";
	$result = mysql_query($query);
	echo ('Done<br>');

	$filename = '../database/mysql.php';
	
	// clear config file
	$fp = fopen($filename,"w");
	fclose($fp);
	
			// Write out the config file.
			$config_data = '<?php'."\n\n";
			$config_data .= "\n// ZPanel auto-generated config file\n// Do not change anything in this file!\n\n";
			$config_data .= '$db_host = \'' . $host . '\';' . "\n";
			$config_data .= '$db_name = \'' . $name . '\';' . "\n";
			$config_data .= '$db_user = \'' . $user . '\';' . "\n";
			$config_data .= '$db_pass = \'' . $pass . '\';' . "\n\n";
			$config_data .= '?' . '>'; // Done this to prevent highlighting editors getting confused!

	if (is_writable($filename)) {
		$handle = fopen($filename, 'a');

    	if (!$handle = fopen($filename, 'a')) {
         	die ("Cannot open file ($filename)");
         	exit;
    	}
	    if (!fwrite($handle, $config_data)) {
        	die ("Cannot write to file ($filename)");
        	exit;
    	}
    	print "Success, wrote your configs to file ($filename)";
    	fclose($handle);
	} else {
    	print "The file $filename is not writable";
	}
	
	$query = "UPDATE config SET installed='1'";
	$result = mysql_query($query);

	
	echo ("<script language=javascript>alert('Database updated, skiping the rest of install.')</script>");
	echo ("<script language=javascript>document.location.href = '../index.php'</script>");
}
}else{
?>
<form name="form1" method="post" action="install2.php">
            <div align="right"> 
              <p align="center">This MUST be your root username and password, 
                or an account that has FULL rights to the MySQL server or-else 
                most key components won't work.</p>
              <table width="291" border="1" align="center" cellpadding="0" cellspacing="0">
                <tr> 
                  <td width="141" bordercolor="#000000"><font color="#000000"><strong>MySQL 
                    Information</strong></font></td>
                  <td width="144" bordercolor="#FFFFFF"><font size="2">&nbsp;</font></td>
                </tr>
                <tr> 
                  <td bordercolor="#000000" bgcolor="#3399CC"><font color="#FFFFFF" size="2"><strong> 
                    Server ($db_host):</strong></font></td>
                  <td bordercolor="#CCCCCC"><font size="2">
                    <input name="db_host" type="text" id="db_host" value="localhost">
                    </font></td>
                </tr>
                <tr> 
                  <td bordercolor="#000000" bgcolor="#3399CC"><font color="#FFFFFF" size="2"><strong>Username 
                    ($db_user): </strong></font></td>
                  <td bordercolor="#CCCCCC"><input name="db_user" type="text" id="db_user" value="root"></td>
                </tr>
                <tr>
                  <td bordercolor="#000000" bgcolor="#3399CC"><font color="#FFFFFF" size="2"><strong>Password 
                    ($db_pass): </strong></font></td>
                  <td bordercolor="#CCCCCC"><input name="db_pass" type="text" id="db_pass"></td>
                </tr>
                <tr>
                  <td bordercolor="#000000" bgcolor="#3399CC"><font color="#FFFFFF" size="2"><strong>Database 
                    ($db_name): </strong></font></td>
                  <td bordercolor="#CCCCCC"><input name="db_name" type="text" id="db_name"></td>
                </tr>
              </table>
              <p align="left">&nbsp;</p>
              <p><input name="inject" type="hidden" value="NOW"><input class="inputbox" type="submit" name="Submit" value="Continue">
            </p></div>
          </form>
        </blockquote>
		<?php }?></td>
    </tr>
    <tr align="center" valign="bottom"> 
      <td height="43" colspan="3" bgcolor="#FFFFFF" style="background-repeat:no-repeat"><img src="../images/templates/default_footer.gif" width="780" height="35" border="0" usemap="#Map"></td>
    </tr>
  </table>
</div>
<map name="Map">
  <area shape="rect" coords="546,5,776,29" href="http://www.zee-way.com" target="_blank">
</map>
</body>
</html>