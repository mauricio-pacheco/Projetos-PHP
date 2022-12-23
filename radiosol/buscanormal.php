<?php include("meta.php"); ?>
<?php include("cima.php"); ?>
<table width="100%" border="0" height="80" style="background-image:url(imagens/fundomeiocapa.png); background-repeat:repeat-x;" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="939" height="80" style="background-repeat:repeat-x; background-image:url(imagens/fundomeio.png)" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top"><?php include("menu.php"); ?>
        <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
              <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" height="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="10" /></td>
        </tr>
    </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="fontemaior">Resultados da Busca<strong></strong></td>
        </tr>
      </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="10" /></td>
        </tr>
      </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><?php

include "administrador/conexao.php";
$palavra = $_POST["palavra"];

$sql = mysql_query("SELECT * FROM cw_noticias WHERE titulo LIKE '%".$palavra."%' ORDER BY id DESC LIMIT 6");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="fonte">
              <tr>
                <?php if ($foto=='') { } else { ?>
                <td width="18%" class="pontilhada2"><a 
  title="<?php echo $titulo.""; ?>" 
  href="vernoticia.php?id=<?php echo $id.""; ?>"><img 
  src="administrador/ups/capasnoticia/<?php echo $foto.""; ?>" 
  alt="<?php echo $titulo.""; ?>" border="0" width="150" height="117" /></IMG></a></td>
                <?php } ?>
                <td width="82%" valign="top"><table width="100%" border="0">
                  <tr>
                    <td><?php echo $y["data"]; ?> ( <?php echo $y["hora"]; ?> ) - <a href="vernot.php?id=<?php echo $y["id"]; ?>" class="fonte"><b><?php echo $y["titulo"]; ?></b></a></td>
                  </tr>
                  <tr>
                    <td class="manchete_texto9"><div align="justify"><?php echo $y["legenda"]; ?></div></td>
                  </tr>
                  <tr>
                    <td class="fontebaixo2">( <?php echo $y["contador"]; ?> Visualizações )</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0">
                      <tr>
                        <td width="3%"><a href="vernot.php?id=<?php echo $y["id"]; ?>" class="manchete_texto9"><img border="0" src="imagens/leia.png" /></a></td>
                        <td width="97%" class="fonte">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
          </table>            <?php
  }
  }
 ?></td>
        </tr>
    </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="10" /></td>
        </tr>
      </table>
<?php include("logoabaixo.php"); ?>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="10" /></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="100%" height="239" background="imagens/fundoabaixo.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"> <?php include("abaixo.php"); ?></td>
  </tr>
</table>
</body>
</html>