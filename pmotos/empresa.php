<?php include("meta.php"); ?>
<table width="100%" height="158" background="imagens/cabecalho.png" border="0" cellspacing="0" cellpadding="0">
<tr></tr>
<tr>
  <td valign="top"><table width="100%" background="imagens/fundotabela.jpg" height="120" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top"><?php include("cima.php"); ?></td>
    </tr>
  </table>
    <?php include("menu.php"); ?></td>
</tr>
</table>
<table width="1000" align="center" bgcolor="#D62718" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="2" /></td>
  </tr>
</table>
<table width="1000" border="0" background="imagens/fundogeral2.png" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="2" valign="top" bgcolor="#D62718"><img src="imagens/branco.gif" width="1" height="1" /></td>
    <td width="996" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100%" valign="top"><table width="98%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="fontetitulon">Quem Somos</td>
          </tr>
        </table>
          <table width="98%" bgcolor="#000000" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="6" /></td>
            </tr>
          </table>
          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td>
              <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_conteudo WHERE id='52' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe p&aacute;gina cadastradas!</b></font></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?><?php echo $y["texto"]; ?><?php
  
  }}
 ?></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="6" /></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
    <td width="2" valign="top" bgcolor="#D62718"><img src="imagens/branco.gif" width="1" height="1" /></td>
  </tr>
</table>
<table width="100%" bgcolor="#D62718" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="2" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>