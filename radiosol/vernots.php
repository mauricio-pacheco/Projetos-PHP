﻿<?php include("meta.php"); ?>
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
          <td class="fontemaior"> <?php $iddep = $_GET["iddep"];
	$sql2 = mysql_query("SELECT * FROM cw_depnot WHERE id = '$iddep'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["departamento"];  }
	
	?><strong></strong></td>
        </tr>
      </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="10" /></td>
        </tr>
      </table>
      <table width="856" border="0" align="center" cellpadding="0" cellspacing="0" class="fonte">
        <tr>
          <td><?php
include "administrador/conexao.php";
// Pegar a p&aacute;gina atual por GET

$p = $_GET["p"];
// Verifica se a vari&aacute;vel t&aacute; declarada, sen&atilde;o deixa na primeira p&aacute;gina como padr&atilde;o
if(isset($p)) {
$p = $p;
} else {
$p = 1;
}
// Defina aqui a quantidade m&aacute;xima de registros por p&aacute;gina.
$qnt = 25;
// O sistema calcula o in&iacute;cio da sele&ccedil;&atilde;o calculando: 
// (p&aacute;gina atual * quantidade por p&aacute;gina) - quantidade por p&aacute;gina
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos n&uacute;meros acima
$sql_select = "SELECT * FROM cw_noticias WHERE iddep='$iddep' ORDER BY id DESC LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$titulo = $array["titulo"];
$data = $array["data"];
$hora = $array["hora"];
$texto = $array["texto"];
$legenda = $array["legenda"];
$foto = $array["foto"];
$contador = $array["contador"];
$iddep = $array["iddep"];



// Exibe o nome que est&aacute; no BD e pula uma linha


?>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="manchete_textocasa">
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
                    <td><?php echo $data.""; ?> ( <?php echo $hora.""; ?> ) - <a href="vernot.php?id=<?php echo $id.""; ?>" class="fonte"><b><?php echo $titulo.""; ?></b></a></td>
                  </tr>
                  <tr>
                    <td class="manchete_texto9"><div align="justify"><?php echo $legenda.""; ?></div></td>
                  </tr>
                  <tr>
                    <td class="fontebaixo2">( <?php echo $contador.""; ?> Visualizações )</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0">
                      <tr>
                        <td width="3%"><a href="vernot.php?id=<?php echo $id.""; ?>" class="manchete_texto9"><img border="0" src="imagens/leia.png" /></a></td>
                        <td width="97%" class="fonte">&nbsp;</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <div id="maisinfo<?php echo $id.""; ?>" style="display:none">
              <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
              <script type="text/javascript" src="js/prototype.js"></script>
              <script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
              <script type="text/javascript" src="js/lightbox.js"></script>
              <?php

include "administrador/conexao.php";

$sql2="SELECT * FROM cw_anexosnot WHERE idnot='$id'"; 
$resultado2=mysql_query($sql2);

while($linha2= mysql_fetch_array($resultado2))
{

echo 
"<a href='administrador/ups/fotosnot/g/".$linha2['fotomaior']."' rel='lightbox['roadtrip']' title='".$linha2["legenda"]."'><img alt='VISUALIZAR IMAGEM' border='0' src='administrador/ups/fotosnot/p/".$linha2['fotomenor']."'></a><img src=imagens/branco.gif width=5 height=2>
";

}
  
   ?>
              <?php echo $texto.""; ?></div>
          <?php




}

// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br />";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_noticias WHERE iddep='$iddep'";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 10;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)
echo "<a href='nots.php?p=1&amp;iddep=$iddep' target='_self' class=fonte><b>PRIMEIRA P&Aacute;GINA</b></a>&nbsp;&nbsp;";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "| <a href='nots.php?p=".$i."&amp;iddep=$iddep' target='_self' class=fonte>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero
echo "| <span class=manchete_texto><b>";
echo $p." ";
echo "</b></span> |";

// Cria outro for(), desta vez para exibir 3 links ap&oacute;s a p&aacute;gina atual
for($i = $p+1; $i <= $p+$max_links; $i++) {
// Verifica se a p&aacute;gina atual &eacute; maior do que a &uacute;ltima p&aacute;gina. Se for, n&atilde;o faz nada.
if($i > $pags)
{
//faz nada
}
// Se tiver tudo Ok gera os links.
else
{
echo " <a href='nots.php?p=".$i."&amp;iddep=$iddep' target='_self' class=fonte>".$i."</a> |";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo "&nbsp;&nbsp;<a href='nots.php?p=".$pags."&amp;iddep=$iddep' target='_self' class=fonte><b>&Uacute;LTIMA P&Aacute;GINA</b></a> ";
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