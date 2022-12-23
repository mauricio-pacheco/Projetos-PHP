<table width="960" height="220" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" background="imagens/fundo1.png" width="570"><table width="571" bgcolor="#EBEBEB" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#EBEBEB"><table align="center" width="570" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div id="container">
<div id="content">
<div id="slider">
<ul>                
<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='cabecalho' ORDER BY id ASC");
$contar = mysql_num_rows($sql); 

while($y = mysql_fetch_array($sql))
   {

	
?>
<li><img alt="<?php echo $y["titulo"]; ?>" title="<?php echo $y["titulo"]; ?>" src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" /></li>
                
                <?php }  ?>
</ul>
</div></td>
  </tr>
</table>
</td>
      </tr>
    </table></td>
    <td width="10" valign="top"><img src="imagens/branco.gif" width="4" height="1" /></td>
    <td width="380" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
        <script language="JavaScript">
		function abrir(URL) {
			var width = 316;
			var height = 180;
			var left = 99;
			var top = 99;
			window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=no, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
			}
			</script>
        
        <a href="javascript:abrir('http://www.cineticafm.com/player.htm');">
        <img src="imagens/radioonline.png" border="0" /></a>
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="10" /></td>
      </tr>
      <tr>
        <td bgcolor="#000000"><img src="imagens/nuestras.png" /></td>
      </tr>
      <tr>
        <td bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="51%"><a href="https://www.facebook.com/cineticael.puntomaximo?fref=ts" target="_blank"><img src="imagens/face.png" border="0" /></a></td>
            <td width="49%"><img src="imagens/twitter.png" /></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>