<?php
//require_once('database/db.php');

//connecting to databases
		 $colname_Installers = "1";
         mysql_select_db($database_Customer_Database, $Customer_Database);
         $query_Installers = sprintf("SELECT * FROM installers WHERE shortname = '".$_GET['script']."'", $colname_Recordset1);
         $Installers = mysql_query($query_Installers, $Customer_Database) or die(mysql_error());
         $row_Installers = mysql_fetch_assoc($Installers);
         $totalRows_Installers = mysql_num_rows($Installers);
		 
		 $colname_Recordset1 = "1";
         if (isset($HTTP_SESSION_VARS['servicename'])) {
     		$colname_Recordset1 = (get_magic_quotes_gpc()) ? $HTTP_SESSION_VARS['servicename'] : addslashes($HTTP_SESSION_VARS['servicename']);
         }
         mysql_select_db($database_Customer_Database, $Customer_Database);
         $query_Recordset1 = sprintf("SELECT * FROM custumerbase WHERE servicename = '".$_SESSION['username']."'", $colname_Recordset1);
         $Recordset1 = mysql_query($query_Recordset1, $Customer_Database) or die(mysql_error());
         $row_Recordset1 = mysql_fetch_assoc($Recordset1);
         $totalRows_Recordset1 = mysql_num_rows($Recordset1);

		//Registering Variables
		$Servicename = $row_Recordset1['servicename'];
		$Domainname = $row_Config['domainname'];
		if (isset($_POST["dir"])) {
			$dir = $_POST["dir"];
		}else{
			$dir = $row_Installers['exampledir'];
		}
		$instructions_filter1 = str_replace ('%username%' , $row_Recordset1['servicename'] , $row_Installers['instructions']);
		$instructions_filter2 = str_replace ('%dir%' , $dir , $instructions_filter1);
		$instructions_filter3 = str_replace ('%url%' , $row_Recordset1['url'] , $instructions_filter2);
		$instructions_final = str_replace ('%domain%' , $row_Config['domainname'] , $instructions_filter3);

		$finalmessage_filter1 = str_replace ('%username%' , $row_Recordset1['servicename'] , $row_Installers['finalmessage']);
		$finalmessage_filter2 = str_replace ('%dir%' , $dir , $finalmessage_filter1);
		$finalmessage_filter3 = str_replace ('%url%' , $row_Recordset1['url'] , $finalmessage_filter2);
		$finalmessage_final = str_replace ('%domain%' , $row_Config['domainname'] , $finalmessage_filter3);



		$filepath = str_replace ('%installdir%' , $row_Config['installdir'] , $row_Installers['filepath']);
		
               function rec_copy($to_path, $from_path) {
                 mkdir($to_path, 0777); 
                 $this_path = getcwd(); 
                 if (is_dir($from_path)) {
				 chdir($from_path);
                     $handle=opendir('.'); 
                     while (($file = readdir($handle))!==false) {
                         if (($file != ".") && ($file != "..")) {
                             if (is_dir($file)) {
//							 if ($row_Installers['silent'] == 0) {
//								 echo ('Changing into folder '.$file.'...<br>');
//							 }
                                 rec_copy ($to_path.$file."/", $from_path.$file."/"); 
                                 chdir($from_path);
                             }
                             if (is_file($file)){ 
                                 copy($from_path.$file, $to_path.$file); 
//							 	 if ($row_Installers['silent'] == 0) {
//									 echo ('Copyed file '.$file.'...<br>');
//							 	 }
                       		 } 
                         } 
                     } 
                 closedir($handle); 
                 } 
			}
         
   if (isset($_POST['submit'])) {
			  echo '<font size=4><b>Installing '.$row_Installers['name'].'</b></font><br><font size=2>This may take some time to complete. Please let the script run.</font><br><br>';
             $to_path = ($row_Recordset1['homedir']. "/" .$_POST["dir"]."/");
             $from_path = $filepath;
                rec_copy($to_path, $from_path);
                 print $finalmessage_final;
         }
?>
<p><img src="<?php echo $row_Installers['icon']; ?>"><b><font size="5"><?php echo $lang_install; ?> <?php echo $row_Installers['name']; ?></font></b></p>
<?php
if ($_SESSION['username'] == "") {
	die($lang_notloggedin."<br><br><p align=center><font size=2>[ <a href=index.php target=parent>".$lang_gotologin."</a> ]</font></p>");
}
?>
<form name="form1" method="post" action="?page=install-execute&script=<?php echo $row_Installers['shortname']; ?>">
  <p><font size="2"><?php $row_Installers['welcome']; ?></font></p>
<?php
echo $instructions_final;
?>
  <hr width="100%" size="1">
  <p><font size="2"><?php echo $lang_choosefolder; ?> <?php echo $row_Installers['shortname']; ?> (ie. <?php echo $row_Installers['exampledir']; ?>):<br>
    <?php echo ($row_Recordset1['url'].'/'); ?> 
    <input class="inputbox" name="dir" type="text" id="dir" value="<?php echo $row_Installers['exampledir']; ?>">
    <input class="inputbox" type="submit" name="submit" value="<?php echo $lang_loadmeup; ?>">
    </font></p>
  <p><font color="#FF0000" size="2"><?php echo $lang_notice; ?></font><font size="2">: <?php echo $lang_installnotice; ?></font></p>
  </form>
  
<p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[ 
  <a href="?page=main"><?php echo $lang_back; ?></a> ]</font></p>
