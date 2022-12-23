<?php include("meta.php"); ?>
<?php include("estilos.php"); ?>


<table width="934" height="352" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <div id="geral" align="center">
<SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('index.swf','934','352'); 
    </SCRIPT></div>
    <div id="alternativo" class="slideshowb1">
	<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='inicial'");
$contar = mysql_num_rows($sql); 

while($y = mysql_fetch_array($sql))
   {

	
?>

<img src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>"  />

<?php } ?>
</div></td>
  </tr>
</table>
<table width="934" height="427" style="background-image:url(imagens/outronovo.png); background-repeat:repeat-x" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table height="360" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="6" /></td>
          </tr>
        </table>
<table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
            <td width="49%"><img src="imagens/tempresa2.png" /></td>
            <td width="2%">&nbsp;</td>
            <td width="49%"><img src="imagens/tlinks2.png" /></td>
          </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
          </tr>
          <tr>
            <td valign="top" class="fonte"><div align="justify">
              <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_galeria WHERE nomegaleria='INICIAL'");

while($y = mysql_fetch_array($sql))
   {
   ?><?php echo $y["comentario"]; ?><?php
  
  }
 ?></div></td>
            <td>&nbsp;</td>
            <td class="fonte" valign="top">Veja alguns links que poderão ajudar:<br /><br /><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_menus ORDER BY departamento ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
	$idnovo = $y["id"];
	
?><strong class="fontelink"><?php echo $y["departamento"]; ?></strong><br />
 <?php

$sql2 = mysql_query("SELECT * FROM cw_conteudo WHERE idmenu='$idnovo' ORDER BY titulo ASC");
$contar2 = mysql_num_rows($sql2); 	
	if ($contar2 < 1)  
   {
   }
else 
   {
while($m = mysql_fetch_array($sql2))
   {
	   
   ?><a href="<?php echo $m["link2"]; ?>" class="fonte" target="_blank"><?php echo $m["titulo"]; ?></a><br /><br /> <?php } } } } ?>
</td>
          </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="6" /></td>
            </tr>
          </table></td>
      </tr>
    </table>
     <?php include("baixo.php"); ?>