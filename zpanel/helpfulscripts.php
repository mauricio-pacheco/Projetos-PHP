<?php
//require_once('database/db.php');
?>
<p><img src="images/icons/webftpstats.gif" width="32" height="32"> <b><font size="5" face="Times New Roman, Times, serif">Helpful 
  Scripts </font></b></p>
<p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
  <?php
if ($_SESSION['username'] == "") {
	die("You are not logged in...<br><br><p align=center><font size=2>[ <a href=index.php target=parent>Go To Login</a> ]</font></p>");
}
?>
  </font><font size="2" face="Times New Roman, Times, serif">These are scripts 
  that you could put anywhere in your page's HTML:</font></p>
<hr>
<font face="Verdana, Arial, Helvetica, sans-serif"><b>Users Online</b></font> 
<p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">There 
  are currently <b> 
  <!-- Start FastOnlineUsers.com -->
  <script src=http://fastonlineusers.com/online.php?d=zpanel.<?php echo $row_Config['domainname']; ?>></script>
  <!-- End FastOnlineUsers.com -->
  </b> people on our ZPanel</font></p>
<p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Copy 
  and paste the following code into the HTML of your documents and edit &quot;zpanel.<?php echo $row_Config['domainname']; ?>&quot; 
  to your web address.</font></p>
<p align="center"> 
  <textarea name="textarea" cols="50" rows="5" wrap="VIRTUAL"><!-- Start Online Counter --><script src=http://fastonlineusers.com/online.php?d=www.zee-way.com></script><!-- End Online Counter --></textarea>
</p>
<hr>
<font face="Verdana, Arial, Helvetica, sans-serif"><b>Total Hits Counter</b></font> 
<p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">There has been<b> 
<!-- Start FastWebCounter.com  --><script src="http://fastwebcounter.com/secure.php?s=zpanel.<?php echo $row_Config['domainname']; ?>"></script><!-- End FastWebCounter.com  -->
  </b> hits to our ZPanel</font></p>
<p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Copy 
  and paste the following code into the HTML of your documents and edit &quot;zpanel.<?php echo $row_Config['domainname']; ?>&quot; 
  to your web address.</font></p>
<p align="center"> 
  <textarea name="textarea2" cols="50" rows="5" wrap="VIRTUAL"><!-- Start FastWebCounter.com  --><script src="http://fastwebcounter.com/secure.php?s=zpanel.<?php echo $row_Config['domainname']; ?>"></script><!-- End FastWebCounter.com  --></textarea>
</p>
<hr>
<p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">[ 
  <a href="?page=main"><?php echo $lang_back; ?></a> ]</font></p>
