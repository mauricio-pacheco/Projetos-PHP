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
     carregaFlash('flash/index.swf','981','220'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#DFE8EC" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("cabecalho.php"); ?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top">
      <table width="976" border="0" align="center">
      <tr>
        <td width="22%" valign="top">
        <?php include("esquerdo.php"); ?>
          </td>
        <td width="78%" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" bordercolor="#A7D2EF" bgcolor="#004080"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="5%"><img src="imagens/antena.png" /></td>
                      <td width="90%" class="manchete_texto" align="center"><font color="#FFFFFF"><strong><em>ÚLTIMAS NOTÍCIAS</em></strong></font></td>
                      <td width="5%" class="manchete_texto"><img src="imagens/antena2.png" /></td>
                    </tr>
                  </table></td>
                </tr>
          </table>
          <?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 6;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_noticias ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="2"; //quantidade de colunas
$cont="1"; //contador

print"<table width=760>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top width=50%>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$titulo = $array["titulo"];
$data = $array["data"];
$hora = $array["hora"];
$iddep = $array["iddep"];
$departamento = $array["departamento"];
$foto = $array["foto"];
$contador = $array["contador"];
$legenda = $array["legenda"];



?>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="manchete_textocasa">
          <tr>
            <td width="77%" valign="top"><table width="100%" border="0">
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="manchete_textocasa">
                  <tr>
                    <td width="8%" class="pontilhada2" valign="top">
                     <?php if ($foto == '') { } else { ?>
                    <a href="vernoticia.php?id=<?php echo $id.""; ?>"><img title="<?php echo $titulo.""; ?>" alt="<?php echo $titulo.""; ?>" src="administrador/ups/capasnoticia/<?php echo $foto.""; ?>" border="0" width="100" height="78" /></a><?php } ?></td>
                    <td width="92%" valign="top"><table width="100%" border="0">
                      <tr>
                        <td class="manchete_texto9"><?php echo $data.""; ?> - <a href="vernoticia.php?id=<?php echo $id.""; ?>"  class="manchete_texto9"><b><?php echo $titulo.""; ?></b></a></td>
                      </tr>
                      <tr>
                        <td class="fontebaixo2">( <?php echo $contador.""; ?> Visualizações ) Sessão: <b>
                          <?php 
	$sql2 = mysql_query("SELECT * FROM cw_depnot WHERE id = '$iddep'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["departamento"];  }
	
	?>
                          </b></td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0">
                          <tr>
                            <td width="3%"><a href="vernoticia.php?id=<?php echo $id.""; ?>" class="fontebaixo2"><img border="0" src="imagens/mais.png" /></a></td>
                            <td width="97%" class="manchete_texto9">&nbsp;<a href="vernoticia.php?id=<?php echo $id.""; ?>" class="manchete_texto9">Leia mais...</a></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          </table>
          <?php
print"</td>";

//se o cont for igual o n&uacute;mero de colunas ele fecha a linha da tabela
if($cont==$colunas){
print"</tr>";
$cont=0;
}
$cont=$cont+1; //acrescenta valor ao cont
}

//se o valor final de cont for diferente do numero de colunas ele fechar&aacute; a tabela
if(!$cont==$colunas){
print"</table>";
} else {
print"</table>";
}
?>
          <?php


$sql_select_all = "SELECT * FROM cw_noticias ORDER BY id DESC";
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



?>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="70%" valign="top">
              <table height="30" bgcolor="#006C36" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="manchete_texto" width="7%" align="center"><img src="imagens/antena.png" /></td>
    <td class="manchete_texto" width="39%" align="center"><font color="#FFFFFF"><strong><em>NOTÍCIAS MAIS LIDAS</em></strong></font></td>
    <td class="manchete_texto" width="8%" align="center"><img src="imagens/antena.png" /></td>
    <td class="manchete_texto" width="39%" align="center"><font color="#FFFFFF"><strong><em>CONFIRA TAMBÉM</em></strong></font></td>
    <td class="manchete_texto" width="7%" align="center"><img src="imagens/antena.png" /></td>
  </tr>
</table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="manchete_texto9">
                <tr>
                  <td valign="top" width="50%"><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_noticias ORDER BY contador + 0 DESC LIMIT 5");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><span class="manchete_texto9">&nbsp;<font color="#013E6F">&bull;</font>&nbsp;<?php echo $y["data"]; ?></span> <a href="vernoticia.php?id=<?php echo $y["id"]; ?>" class="manchete_texto9"><b><?php echo $y["titulo"]; ?></b></a> <span class="fontebaixo3"> <i>( <?php echo $y["contador"]; ?> Visualizações )</i></span></td>
                      </tr>
                    </table>
                    <?php
  }
  }
 ?></td>
                  <td valign="top" width="50%"><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_noticias ORDER BY id DESC LIMIT 5 OFFSET 4");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                    <table border="0" width="99%">
                    <tbody>
                      <tr>
                        <td class="manchete_texto9">&nbsp;<font color="#E67914">&bull;</font> <span class="fontebaixo3"><?php echo $y["data"]; ?></span> <a href="vernoticia.php?id=<?php echo $y["id"]; ?>" class="manchete_texto9"><b><?php echo $y["titulo"]; ?></b></a> <span class="fontebaixo3"> <i>( <?php echo $y["contador"]; ?> Visualizações )</i></span></td>
                      </tr>
                    </tbody>
                  </table><?php
  }
  }
 ?></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                </tr>
              </table>

              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" bordercolor="#A7D2EF" bgcolor="#004080"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="5%"><img src="imagens/antena.png" /></td>
                      <td width="90%" class="manchete_texto" align="center"><font color="#FFFFFF"><strong><em>ÚLTIMOS EVENTOS</em></strong></font></td>
                      <td width="5%" class="manchete_texto"><img src="imagens/antena2.png" /></td>
                    </tr>
                  </table></td>
                </tr>
          </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="50%" valign="top" class="manchete_texto9"><?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 3;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_galeria ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="3"; //quantidade de colunas
$cont="1"; //contador

print"<table width=526>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top width=33%>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$nomegaleria = $array["nomegaleria"];
$data = $array["data"];
$hora = $array["hora"];
$foto = $array["foto"];
$comentario = $array["comentario"];
$dataevento = $array["dataevento"];



?>
                      <table width="100%" border="0">
                        <tr>
                          <td align="center"><a 
                        href="vergaleria.php?id=<?php echo $id.""; ?>"><img 
                        alt="<?php echo $nomegaleria.""; ?>" 
                        src="administrador/ups/galerias/<?php echo $foto.""; ?>" 
                        border="0" width="100" height="78" /></a></td>
                        </tr>
                        <tr>
                          <td align="center" class="manchete_texto9"><a class="manchete_texto9" 
                        href="vergaleria.php?id=<?php echo $id.""; ?>"><b><?php echo $nomegaleria.""; ?></b></a></td>
                        </tr>
                        <tr>
                          <td><table width="70%" border="0" align="center">
                            <tr>
                              <td align="center">Data: <?php echo $dataevento.""; ?></td>
                            </tr>
                          </table>
                            <table width="60%" border="0" align="center">
                              <tr>
                                <td width="7%"><img src="imagens/cameraicone.png" /></td>
                                <td width="93%">Fotos:
                                  <?php

$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_fotos WHERE idgaleria='$id' AND foto <> '1'");
$contar = mysql_num_rows($sql); 
$total = mysql_result($sql, 0, 'Total');

?>
                                  <?php
  echo ''. $total;
 ?></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      <?php
print"</td>";

//se o cont for igual o n&uacute;mero de colunas ele fecha a linha da tabela
if($cont==$colunas){
print"</tr>";
$cont=0;
}
$cont=$cont+1; //acrescenta valor ao cont
}

//se o valor final de cont for diferente do numero de colunas ele fechar&aacute; a tabela
if(!$cont==$colunas){
print"</table>";
} else {
print"</table>";
}
?>
                      <?php


$sql_select_all = "SELECT * FROM cw_galeria ORDER BY id DESC";
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



?>
                      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                        <tr>
                          <td height="24" bordercolor="#A7D2EF" bgcolor="#004080"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="5%"><img src="imagens/antena.png" /></td>
                              <td width="90%" class="manchete_texto" align="center"><font color="#FFFFFF"><strong><em>ARQUIVOS EM AUDIO</em></strong></font></td>
                              <td width="5%" class="manchete_texto"><img src="imagens/antena2.png" /></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>
						  
						  <?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 12;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_noticias WHERE integra != '' ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="2"; //quantidade de colunas
$cont="1"; //contador

print"<table width=526>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top width=50%>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$integra = $array["integra"];
$titulo = $array["titulo"];




?>
					
                            <table width="99%" border="0" align="center">
                              <tr>
                                <td><img src="administrador/imagens/branco.gif" width="2" height="2" /></td>
                              </tr>
                            </table>
                            <table width="98%" border="0" align="center">
                              <tr>
                                <td width="7%"><a href="administrador/ups/integra/<?php echo $y["integra"]; ?>" class="fontetabela"><img src="imagens/audionovo.png" border="0" /></a></td>
                                <td width="93%"><table width="100%" border="0">
                                  <tr>
                                    <td class="manchete_texto9">&nbsp;<a href="administrador/ups/integra/<?php echo $integra.""; ?>" class="manchete_texto9"><?php echo $titulo.""; ?></a></td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table>
                           <?php
print"</td>";

//se o cont for igual o n&uacute;mero de colunas ele fecha a linha da tabela
if($cont==$colunas){
print"</tr>";
$cont=0;
}
$cont=$cont+1; //acrescenta valor ao cont
}

//se o valor final de cont for diferente do numero de colunas ele fechar&aacute; a tabela
if(!$cont==$colunas){
print"</table>";
} else {
print"</table>";
}
?>
                      <?php


$sql_select_all = "SELECT * FROM cw_noticias WHERE integra != '' ORDER BY id DESC";
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



?></td>
                        </tr>
                      </table>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                            <tr>
                              <td height="24" bordercolor="#A7D2EF" bgcolor="#004080"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="5%"><img src="imagens/antena.png" /></td>
                                  <td width="90%" class="manchete_texto" align="center"><font color="#FFFFFF"><strong><em>BLOGS</em></strong></font></td>
                                  <td width="5%" class="manchete_texto"><img src="imagens/antena2.png" /></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table>
                      <?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 12;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_blogs ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="2"; //quantidade de colunas
$cont="1"; //contador

print"<table width=526>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top width=50%>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$titulo = $array["titulo"];
$link = $array["link"];
$foto = $array["foto"];
$comentario = $array["comentario"];




?>
                      <table width="99%" border="0" align="center">
                        <tr>
                          <td><img src="administrador/imagens/branco.gif" width="2" height="2" /></td>
                        </tr>
                      </table>
                      <table width="98%" border="0" align="center">
                        <tr>
                          <td width="7%">
                          <?php if ($foto == '') { ?> <a href="<?php echo $link.""; ?>" target="_blank" class="fontetabela"><img src="imagens/blog.png" border="0" /></a><?php } else { ?>
                          <a href="<?php echo $link.""; ?>" target="_blank" class="fontetabela"><img src="administrador/ups/blogs/<?php echo $foto.""; ?>" border="0" /></a><?php } ?></td>
                          <td width="93%" valign="top"><table width="100%" border="0">
                            <tr>
                              <td class="manchete_texto9"><a href="<?php echo $link.""; ?>" target="_blank" class="manchete_texto9"><b><?php echo $titulo.""; ?></b></a></td>
                            </tr>
                          </table>
                            <table width="100%" border="0">
                              <tr>
                                <td class="manchete_texto9"><?php echo $comentario.""; ?></td>
                              </tr>
                            </table></td>
                        </tr>
                      </table>
                      <?php
print"</td>";

//se o cont for igual o n&uacute;mero de colunas ele fecha a linha da tabela
if($cont==$colunas){
print"</tr>";
$cont=0;
}
$cont=$cont+1; //acrescenta valor ao cont
}

//se o valor final de cont for diferente do numero de colunas ele fechar&aacute; a tabela
if(!$cont==$colunas){
print"</table>";
} else {
print"</table>";
}
?>
                      <?php


$sql_select_all = "SELECT * FROM cw_blogs ORDER BY id DESC";
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



?></td>
                  </tr>
                </table></td>
              <td width="30%" valign="top" align="center">
			  <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
            <tr>
              <td height="24" bordercolor="#A7D2EF" bgcolor="#E67914"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="1%"><img src="imagens/antena.png" /></td>
                  <td width="98%" class="manchete_texto" align="center"><font color="#FFFFFF"><b>ENQUETE</b></font></td>
                  <td width="1%"><img src="imagens/antena.png" /></td>
                </tr>
              </table></td>
            </tr>
</table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td> <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_enquetes ORDER BY id DESC LIMIT 1");

while($y = mysql_fetch_array($sql))
   {
   ?> <FORM style="DISPLAY: inline" name="enquete" action="atualizaenquete.php" method="post">
 <input type="hidden" name="idenquete" value="<?php echo $y["id"]; ?>" />
      <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_textocasa">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><STRONG><?php echo $y["pergunta"]; ?></STRONG></td>
            </tr>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="2" /></td>
              </tr>
          </table>
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php if ( $y["op1"] == '' ) { } else { ?>
              <?php if ($y["foto1"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto1"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op1"]; ?>" checked="checked" /></td>
                  <td width="91%" align="left"><?php echo $y["op1"]; ?></td>
                </tr>
              </table>
              <?php } ?>
               <?php if ( $y["op2"] == '' ) { } else { ?>
              <?php if ($y["foto2"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto2"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op2"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op2"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op3"] == '' ) { } else { ?>
              <?php if ($y["foto3"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto3"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op3"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op3"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op4"] == '' ) { } else { ?>
              <?php if ($y["foto4"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto4"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op4"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op4"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op5"] == '' ) { } else { ?>
              <?php if ($y["foto5"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto5"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op5"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op5"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op6"] == '' ) { } else { ?>
              <?php if ($y["foto6"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto6"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op6"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op6"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op7"] == '' ) { } else { ?>
              <?php if ($y["foto7"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto7"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op7"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op7"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op8"] == '' ) { } else { ?>
              <?php if ($y["foto8"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto8"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op8"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op8"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op9"] == '' ) { } else { ?>
              <?php if ($y["foto9"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto9"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op9"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op9"]; ?></td>
                </tr>
              </table>
              <?php } ?>
              <?php if ( $y["op10"] == '' ) { } else { ?>
              <?php if ($y["foto10"] == '') { } else { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="administrador/ups/fotosenquetes/<?php echo $y["foto10"]; ?>" width="74" height="54" /></td>
                </tr>
              </table>
              <?php } ?>
              <table width="100%" border="0">
                <tr>
                  <td width="9%"><input name="voto" type="radio" class="fontetabela" id="voto" value="<?php echo $y["op10"]; ?>" /></td>
                  <td width="91%" align="left"><?php echo $y["op10"]; ?></td>
                </tr>
              </table><?php } ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><INPUT class="texto" type="submit" value="votar" name="votar"></td>
                </tr>
              </table></td>
              </tr>
          </table>
          </td>
        </tr>
      </table></FORM>
      <table width="100%" border="0">
              <tr>
                <td width="96%" class="manchete_texto9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                </table>                  &nbsp;<a class="manchete_texto9" 
                        href="atualizaenquete2.php?idenquete=<?php echo $y["id"]; ?>"><b>Resultados da Enquete</b></a></td>
              </tr>
              <tr>
                <td class="manchete_texto9">&nbsp;<a class="manchete_texto9"
                        href="enquetes.php"><b>Visualizar todas as enquetes...</b></a></td>
              </tr>
      </table><br /><?php } ?></td>
            </tr>
          </table>

			  <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='lateral' AND status='0' ORDER BY rand()");

while($y = mysql_fetch_array($sql))
   {
	  $tipo = $y["tipo"]; 
	  
   ?>
   
   
      <?php
						  if ($tipo=='imagem') {
						  						  ?>
         
         <a href="<?php echo $y["link"]; ?>" target="_blank"><img alt="<?php echo $y["descricao"]; ?>" title="<?php echo $y["descricao"]; ?>" border="0" src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" width="220" /></a>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="3" /></td>
           </tr>
         </table>
         <?php
          } else {
						  ?>
      <script src="administrador/scripts/swfobject_modified.js" type="text/javascript"></script>
      <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php echo $y["f1"]; ?>" height="<?php echo $y["f2"]; ?>">
        <param name="movie" value="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don&rsquo;t want users to see the prompt. -->
        <param name="expressinstall" value="administrador/scripts/expressInstall.swf" />
        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" width="<?php echo $y["f1"]; ?>" height="<?php echo $y["f2"]; ?>">
          <!--<![endif]-->
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="6.0.65.0" />
          <param name="expressinstall" value="administrador/scripts/expressInstall.swf" />
          <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
          <div>
            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
          </div>
          <!--[if !IE]>-->
        </object>
        <!--<![endif]-->
      </object>
      <script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
      </script>
<?php } } ?></td>
            </tr>
          </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
    </td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#DFE8EC" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
<table width="980" height="16" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/baixo.png" width="980" height="16" /></td>
  </tr>
</table><br /><br />
</body>
</html>
