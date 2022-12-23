<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>PREFEITURA MUNICIPAL DE PALMITINHO</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="Lima" name=description>
<META content="palavras, chave" name=keywords>
<META content=General name=rating>
<META content=index,follow name=robots>
<LINK href="home_arquivos/site.css" type=text/css rel=stylesheet>
<LINK href="favicon.ico" type=image/x-icon rel="shortcut icon">
<META content="MSHTML 6.00.2900.3243" name=GENERATOR>
<style type="text/css">
<!--
body {
	background-image: url(home_arquivos/bg.jpg);
}
.style1 {color: #FFFFFF}
.style11 {font-size: 10px}
.style13 {	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #0E5186;
}
-->
</style>
</HEAD>
<BODY topmargin="0" leftmargin="0"><div align="center"><SCRIPT src="carregador.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash("cima.swf","980","151"); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT></div>
<?php include("linkscima.php"); ?>
<table width="980" border="0" align="center">
  <tr>
    <td width="154" bgcolor="#FFFFFF" valign="top"><?php include("direito.php"); ?></td>
    <td width="574" bgcolor="#FFFFFF" valign="top"><table width="98%" border="0" align="center">
      <tr>
        <td align="center"><br>
        <?php

include "administrador/conexao.php";

$idano = $_GET["id"];
$anodep = $_GET["anodep"];
$depid = $_GET["depid"];
$nomedep = $_GET["nomedep"];
$idsubdep = $_GET["idsubdep"];
$nomesubdep = $_GET["nomesubdep"];



$sql = mysql_query("SELECT * FROM tridep WHERE depid='$depid' AND idsubdep='$idsubdep' AND idano='$id' ORDER BY id DESC LIMIT 1");
$contar = mysql_num_rows($sql); 

while($n = mysql_fetch_array($sql))
   {
   ?><b>ARQUIVOS - <?php echo $n["nomedep"]; ?> - <?php echo $n["nomesubdep"]; ?> - <?php echo $n["nomeano"]; ?></b><?php

  }
 ?></td>
      </tr>
    </table>
      <table width="96%" border="0" align="center">
        <tr>
          <td><table width="97%" border="0" align="center">
            <tr>
              <td bgcolor="#0066FF"><img src="blank.gif" width="1" height="4"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><div align="center"><em>SELECIONAR POR PERÍODO</em></div></td>
        </tr>
        <tr>
          <td><span class="link3">
         <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM tridep WHERE depid='$depid' AND idsubdep='$idsubdep' AND idano='$id' ORDER BY id DESC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se hÃƒÂ¡ algum registro na tabela, caso nÃƒÂ£o houver, ele mostrarÃƒÂ¡ a mensagem abaixo
   {echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe períodos cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrarÃƒÂ¡ os registros. OBS: VocÃƒÂª pode mudar o modo de exibir os registros
     //mais nÃƒÂ£o mude nenhuma variÃƒÂ¡vel, a nÃƒÂ£o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
          </span> <br>
          <table width="96%" border="0" align="center">
            <tr>
              <td><table width="100%" border="0">
                <tr>
                  <td width="2%"><a href="arquivos.php?id=<?php echo $n["id"]; ?>&amp;tridep=<?php echo $n["tridep"]; ?>&amp;depid=<?php echo $n["depid"]; ?>&amp;nomedep=<?php echo $n["nomedep"]; ?>&amp;idsubdep=<?php echo $n["idsubdep"]; ?>&amp;nomesubdep=<?php echo $n["nomesubdep"]; ?>&amp;idano=<?php echo $n["idano"]; ?>&amp;nomeano=<?php echo $n["nomeano"]; ?>"><img src="administrador/trimestre.jpg" border="0" ></a></td>
                  <td width="98%"><a href="arquivos.php?id=<?php echo $n["id"]; ?>&amp;tridep=<?php echo $n["tridep"]; ?>&amp;depid=<?php echo $n["depid"]; ?>&amp;nomedep=<?php echo $n["nomedep"]; ?>&amp;idsubdep=<?php echo $n["idsubdep"]; ?>&amp;nomesubdep=<?php echo $n["nomesubdep"]; ?>&amp;idano=<?php echo $n["idano"]; ?>&amp;nomeano=<?php echo $n["nomeano"]; ?>"><?php echo $n["tridep"]; ?></a>
                    <!--/TITULO--></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <?
  }
  }
 ?></td>
        </tr>
        <tr>
          <td><table width="97%" border="0" align="center">
            <tr>
              <td bgcolor="#0066FF"><img src="blank.gif" width="1" height="4"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><div align="center"><a href="javascript:window.history.go(-1)"><img src="vltar.jpg" width="100" height="26" border="0"></a></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center"><font color="#006600">Arquivos Anexados em
            <?php

include "administrador/conexao.php";


$sql = mysql_query("SELECT * FROM tridep WHERE depid='$depid' AND idsubdep='$idsubdep' AND idano='$id' ORDER BY id DESC LIMIT 1");
$contar = mysql_num_rows($sql); 

while($n = mysql_fetch_array($sql))
   {
   ?>
            <b><?php echo $n["nomedep"]; ?> - <?php echo $n["nomesubdep"]; ?> - <?php echo $n["nomeano"]; ?></b>
            <?php

  }
 ?>
          </font></div></td>
        </tr>
        <tr>
          <td><table width="97%" border="0" align="center">
            <tr>
              <td bgcolor="#7AD35D"><img src="blank.gif" width="1" height="4"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><span class="link3">
            <?php
include "administrador/conexao.php";
// Pegar a p&aacute;gina atual por GET
$p = $_GET["p"];
// Verifica se a vari&aacute;vel t&aacute; declarada, sen&atilde;o deixa na PRIMEIRA PÁGINA como padr&atilde;o
if(isset($p)) {
$p = $p;
} else {
$p = 1;
}
// Defina aqui a quantidade m&aacute;xima de registros por p&aacute;gina.
$qnt = 20;
// O sistema calcula o in&iacute;cio da sele&ccedil;&atilde;o calculando: 
// (p&aacute;gina atual * quantidade por p&aacute;gina) - quantidade por p&aacute;gina
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos n&uacute;meros acima
$sql_select = "SELECT * FROM licitacoes WHERE iddep = '$depid' AND idsubdep = '$idsubdep' AND idano = '$idano' AND idtri = 's' ORDER BY id DESC LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$titulo = $array["titulo"];
$categoria = $array["categoria"];
$arquivo = $array["arquivo"];
$tamanho = $array["tamanho"];
$data = $array["data"];
$hora = $array["hora"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
          </span>
            <table width="96%" border="0" align="center">
              <tr>
                <td><table width="100%" border="0">
                  <tr>
                    <td width="2%"><a href="administrador/licitacoes/<?php echo $arquivo.""; ?>"><img src="administrador/arquivo.jpg" border="0" ></a></td>
                    <td width="98%"><a href="administrador/licitacoes/<?php echo $arquivo.""; ?>"><?php echo $titulo.""; ?></a>
                      <!--/TITULO--></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;Arquivo: <font color="#0000CC"><?php echo $arquivo.""; ?></font> - - - Tamanho: <font color="#FF0000"><?php echo $tamanho.""; ?></font> bytes</td>
              </tr>
            </table>
          <?php




}

// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br />";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM licitacoes WHERE iddep = '$depid' AND idsubdep = '$idsubdep' AND idano = '$idano' AND idtri = 's' ";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 16;
// Exibe o primeiro link 'PRIMEIRA PÁGINA', que n&atilde;o entra na contagem acima(3)
echo "<a href='arqtrideps.php?p=1&amp;id=$idano&anodep=$anodep&depid=$depid&nomedep=$nomedep&nomesubdep=$nomesubdep&idsubdep=$idsubdep' target='_self'><font size='1'>PRIMEIRA PÁGINA</font></a> <font color='#000000' size='1'>-</font> ";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "<a href='arqtrideps.php?p=".$i."&amp;id=$idano&anodep=$anodep&depid=$depid&nomedep=$nomedep&nomesubdep=$nomesubdep&idsubdep=$idsubdep' target='_self'>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero
echo "";
echo $p." ";
echo "";

// Cria outro for(), desta vez para exibir 3 links ap&oacute;s a p&aacute;gina atual
for($i = $p+1; $i <= $p+$max_links; $i++) {
// Verifica se a p&aacute;gina atual &eacute; maior do que a ÚLTIMA PÁGINA. Se for, n&atilde;o faz nada.
if($i > $pags)
{
//faz nada
}
// Se tiver tudo Ok gera os links.
else
{
echo "<a href='arqtrideps.php?p=".$i."&amp;id=$idano&anodep=$anodep&depid=$depid&nomedep=$nomedep&nomesubdep=$nomesubdep&idsubdep=$idsubdep' target='_self'>".$i."</a> ";
}
}
// Exibe o link "ÚLTIMA PÁGINA"
echo " <font color='#000000' size='1'>-</font> <a href='arqtrideps.php?p=".$pags."&amp;id=$idano&anodep=$anodep&depid=$depid&nomedep=$nomedep&nomesubdep=$nomesubdep&idsubdep=$idsubdep' target='_self'><font size='1'>ÚLTIMA PÁGINA</font></a> ";
?></td>
        </tr>
    </table>
      <table width="97%" border="0" align="center">
        <tr>
          <td bgcolor="#7AD35D"><img src="blank.gif" width="1" height="4"></td>
        </tr>
    </table></td>
    <td width="238" bgcolor="#FFFFFF" valign="top"><?php include("esquerdo.php"); ?></td>
  </tr>
</table>
<?php include("baixo.php"); ?></BODY></HTML>
