<?
/// REDIRECIONAMENTO PARA PÁGINA DE LOGIN
include "libs/padrao.php";
if($ir_para_login){
print "<script Language=\"JavaScript\">";
print "window.opener.location.href = \"index.php?cat_pai=1&pagina=login\";";
print "window.close();";
print "</script>";
exit;
}
?>
<html>
<head>
<title>Cadastro no boletim</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="libs/admin/estilo.css">
</head>
 


<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif"> 
            Obrigado por participar do nosso boletim.</font></b></font></td>
          <td width="16%"> 
            <div align="right"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">::</font></b></font></div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="<? print "$barra";?>"> 
    <td><font size="1" color="<? print "$barra";?>" face="Verdana, Arial, Helvetica, sans-serif">-</font></td>
  </tr>
  <tr bgcolor="#FFFFFF" valign="top"> 
    <td height="208"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><br>
      A partir de agora voc&ecirc; est&aacute; participando do nosso boletim de 
      not&iacute;cias.<br>
      <br>
      O boletim tem por finalidade mant&ecirc;-lo(a) informado(a) sobre nossos produtos e servi&ccedil;os.<br>
      <br>
      Continue visitando nossa loja, e tenha a certeza que estamos extremamente felizes por sua presen&ccedil;a.<br>
      <br>
      Muito Obrigado!</font></td>
  </tr>
    <script Language="JavaScript">
	function closeWindow(){
     window.close();}
	 setTimeout("closeWindow()", 10000);
    </script>
  <tr bgcolor="<? print "$barra";?>"> 
    <td><font size="1" color="<? print "$barra";?>" face="Verdana, Arial, Helvetica, sans-serif">-</font></td>
  </tr>
</table>
</body>
</html>
