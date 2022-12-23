<?php include("meta.php"); ?>
<script language="javascript">
function toggle(obj) {
var el = document.getElementById(obj);
if ( el.style.display != 'none' ) {
el.style.display = 'none';
}
else {
el.style.display = '';
}
}
 </script>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','210'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("cabecalho.php"); ?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png"><SCRIPT src="classes/carrega2.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/menu.swf','980','40'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top">
      <table width="976" border="0" align="center">
      <tr>
        <td width="235" valign="top">
        <?php include("esquerdo.php"); ?>
          </td>
        <td width="494" valign="top" bgcolor="#FFFFFF">
        <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_conteudo WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe p&aacute;gina cadastradas!</b></font></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
        <table width="494" height="29" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" background="imagens/b5.png"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="90%" class="manchete_texto" align="center"><font color="#FFFFFF"><b><?php echo $y["titulo"]; ?></b></font></td>
                    </tr>
                  </table></td>
                </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="manchete_textocasa"><?php echo $y["data"]; ?> - ( <?php echo $y["hora"]; ?> )</td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0">
          <tr></tr>
          <tr>
            <td><?php echo $y["texto"]; ?></td>
          </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="2" /></td>
            </tr>
            <tr>
              <td><a href="javascript:history.go(-1)"><img src="imagens/volta.png" border="0" /></a></td>
            </tr>
        </table><?php
  
  }}
 ?>
          </td>
        <td width="235" valign="top"><?php include("direito.php"); ?></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
    </td>
  </tr>
</table>
<?php include("baixo.php"); ?>
<table width="980" background="imagens/baixo.png" height="16" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><img src="imagens/branco.gif" width="2" height="16" /></td>
  </tr>
</table><br /><br />
</body>
</html>
