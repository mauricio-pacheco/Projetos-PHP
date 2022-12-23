<?php include("meta.php"); ?>
<table width="100%" class="boxSombra" background="imagens/acima.png" height="190" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cabecalho.php"); ?>
      <?php include("menu.php"); ?></td>
  </tr>
</table>
<table width="1000" height="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="6" /></td>
      </tr>
    </table>
      <link rel="stylesheet" href="classesfotos/css/lightbox.css" type="text/css" media="screen" /> <script type="text/javascript" src="classesfotos/js/prototype.js"></script>
<script type="text/javascript" src="classesfotos/js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="classesfotos/js/lightbox.js"></script>
       <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_noticias WHERE id='$id' ORDER BY id");
$sql2 = mysql_query("UPDATE cw_noticias set contador=contador + 1 where id='$id'");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe noticias cadastradas!</b></font></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>

      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="48%" align="center" class="fontetitulon"><?php echo $y["titulo"]; ?></td>
          <td width="52%" align="center" class="fontetitulon"><?php echo $y["data"]; ?> - ( <?php echo $y["hora"]; ?> )</td>
                  </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
      <table width="98%" align="center" bgcolor="#01314B" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="1" /></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="8" /></td>
        </tr>
    </table>
      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td>      
        <?php

$id = $y["id"];

$sql2="SELECT * FROM cw_anexosnot WHERE idnot='$id'"; 
$resultado2=mysql_query($sql2);

while($linha2= mysql_fetch_array($resultado2))
{

echo 
"<a href='administrador/ups/fotosnot/g/".$linha2['fotomaior']."' rel='lightbox['roadtrip']' title='".$linha2["legenda"]."'><img alt='VISUALIZAR IMAGEM' border='0' src='administrador/ups/fotosnot/p/".$linha2['fotomenor']."'></a>
";

}
  
   ?></td>
        </tr>
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="8" /></td>
        </tr>
        <tr>
          <td><div align="justify"><?php echo $y["texto"]; ?></div>
   </td>
        </tr>
    </table><?php
  
  }}
 ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="8" /></td>
        </tr>
    </table></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>