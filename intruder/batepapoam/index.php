<?php
$nick = isset($_POST['nick']) ? $_POST['nick'] : '';
?>
<html>
<head>
<title>IrcFest Bate Papo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>
<LINK href="default.css" type=text/css rel=stylesheet>
<body bgcolor="#000000">
<br>
<div align="center"> <br>
  <table width="60%" border="0" bordercolor="#FFFFFF">
    <tr> 
      <td bordercolor="#000000"><div align="center"><img src="../logo2.jpg" width="214" height="200"></div></td>
    </tr>
    <tr>
      <td bordercolor="#000000">&nbsp;</td>
    </tr>
    <tr> 
      <td bordercolor="#000000"><form name="login" method="post" action="batepapo.php">
          <center>
            <table width="100%" border="0" cellpadding="2" cellspacing="2">
              <tbody>
                <tr> 
                  <td align="left"><div align="center" class="style1"><font face="Verdana, Arial, Helvetica, sans-serif" size="1">NICK: 
                      <input name="nick" size="25" type="text">
                      </font></div></td>
                </tr>
                <tr> 
                  <td align="left">&nbsp;</td>
                </tr>
                <tr> 
                  <td align="left"> <p align="center"> <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                      <input name="submit" value="ENTRAR NO BATE PAPO" type="submit">
                      </font></p></td>
                </tr>
              </tbody>
            </table>
          </center>
        </form></td>
    </tr>
    <tr> 
      <td bordercolor="#000000">&nbsp;</td>
    </tr>
    <tr> 
      <td bordercolor="#000000"><div align="center"><font color="#FFFF00" size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="http://www.casadaweb.net" target=_blank>Casa 
          da Web</a></font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
          - <font color="#0099FF"><a href="mailto:ederfwrs@gmail.com">Supra Design</a></font></font></div></td>
    </tr>
  </table>
  <br>
</div>
</body>
</html>

