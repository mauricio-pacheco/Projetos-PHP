<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rádio Sol da América</title>
</head>
<style type="text/css">
body {
    overflow-x:hidden;
overflow-y:hidden;

}
</style>

<body style="margin:0">
<table height="240" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="54%" valign="top">
       <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades ORDER BY id DESC LIMIT 1");

while($y = mysql_fetch_array($sql))
   {
   ?>
        <?php if($y["local"]=='b6') { ?>
         <iframe marginwidth="0" marginheight="0" src="p2.php" frameborder="0" width="358" scrolling="no" height="240"></iframe>
        <?php } else { ?> 
       <iframe marginwidth="0" marginheight="0" src="p1.php" frameborder="0" width="358" scrolling="no" height="240"></iframe>
       <?php } } ?>
        
     
        </td>
        <td width="46%" valign="top"><iframe marginwidth="0" marginheight="0" src="bannercima.php" frameborder="0" width="300" scrolling="no" height="240"></iframe></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td bgcolor="#CECECE"><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>