<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML lang=pt-BR xml:lang="pt-BR" 
xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Posto Seberi</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<META content=pt-BR http-equiv=Content-language>
<META name=description 
content="Descrição">
<META name=keywords 
content="palavras, chave"><LINK rel="Shortcut icon" type=image/x-icon 
href="home_arquivos/favicon.ico">

<STYLE type=text/css>@import url( home_arquivos/default.css );
@import url( home_arquivos/pais.css );
</STYLE>

<META name=GENERATOR content="MSHTML 8.00.6001.18702"></HEAD>
<BODY>
<DIV id=layout>
<DIV id=topo>
<DIV id=topo-mg>
  <?php include("cabecalho.php"); ?>
</DIV>
<table width="98%" border="0">
  <tr>
    <td><img src="home_arquivos/branco.gif" width="2" height="20"></td>
  </tr>
</table>

<table width="950" align="left" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("menucima.php"); ?></td>
  </tr>
</table>
</DIV></DIV>
<DIV id=conceitual-home>
<SCRIPT src="carrega.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash('index.swf','972','329'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT><br>
</DIV>

</DIV></DIV>
<DIV id=rodape>
<DIV id=rodape-topo>
</DIV>
<table width="976" background="home_arquivos/fundo.jpg" border="0" align="center">
  <tr>
    <td valign="top"><table width="99%" border="0" align="center">
      <tr>
        <td width="21%" valign="top"><?php include("menu.php"); ?></td>
        <td width="79%" valign="top"><table width="100%" border="0">
          <tr>
            <td><img src="home_arquivos/bb.gif" width="20" height="250"></td>
          </tr>
          <tr>
            <td><table width="100%" border="0">
              <tr>
                <td width="1%"><img src="barra1.jpg" width="30" height="38"></td>
                <td width="99%" align="left" background="barra11.jpg">&nbsp;&nbsp;&nbsp;<b>Página Principal</b></td>
              </tr>
            </table>
              <table width="100%" border="0">
                <tr>
                  <td width="1%" valign="top"><table width="100%" border="0">
                    <tr>
                      <td width="6" background="traco.jpg">&nbsp;</td>
                      <td width="770"><TABLE width="98%" align="center" cellPadding=0 cellSpacing=0 class=blog>
                        <TBODY>
                          <TR>
                            <TD vAlign=top><DIV>
                              <TABLE cellpadding="0" cellspacing="0">
                                <TBODY>
                                  <TR>
                                    <TD width="100%"><?php
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
$qnt = 5;
// O sistema calcula o in&iacute;cio da sele&ccedil;&atilde;o calculando: 
// (p&aacute;gina atual * quantidade por p&aacute;gina) - quantidade por p&aacute;gina
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos n&uacute;meros acima
$sql_select = "SELECT * FROM gestao_noticias ORDER BY id DESC LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$titulo = $array["titulo"];
$legenda = $array["legenda"];
$data = $array["data"];
$hora = $array["hora"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?></TD>
                                  </TR>
                                </TBODY>
                              </TABLE>
                              <TABLE width="100%" cellpadding="0" cellspacing="0">
                                <TBODY>
                                  <TR>
                                    <TD><div align="left">
                                      <table width="100%" border="0">
                                        <tr>
                                          <td width="4%"><img src="administrador/jornal.png"></td>
                                          <td width="96%"><font size="2"><b><?php echo $titulo.""; ?></b></font></td>
                                          </tr>
                                      </table>
                                    </div></TD>
                                  </TR>
                                  <TR>
                                    <TD><div align="left"><?php echo $legenda.""; ?></div></TD>
                                  </TR>
                                  <TR>
                                    <TD><div align="left">
                                      <table width="100%" border="0">
                                        <tr>
                                          <td width="3%"><img src="relogio.gif"></td>
                                          <td width="56%">Not&iacute;cia Publicada em <?php echo $data.""; ?> - <?php echo $hora.""; ?></td>
                                          <td width="3%"><img src="mais.gif"></td>
                                          <td width="38%">&nbsp;<A  
      href="detalhes.php?id=<?php echo $id.""; ?>">Leia mais...</A></td>
                                          </tr>
                                      </table>
                                      
                                      <?




}

// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br />";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM gestao_noticias";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 20;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)
echo "<a href='index.php?p=1' target='_self'><font size='1'>PRIMEIRA P&Aacute;GINA</font></a> <font color='#000000' size='1'>-</font> ";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "<a href='index.php?p=".$i."' target='_self'>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero
echo "<font color='#000000' size='1'>";
echo $p." ";
echo "</font>";

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
echo "<a href='index.php?p=".$i."' target='_self'>".$i."</a> ";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo " <font color='#000000' size='1'>-</font> <a href='index.php?p=".$pags."' target='_self'><font size='1'>&Uacute;LTIMA P&Aacute;GINA</font></a> ";
?>
                                      <BR>
                                    </div></TD>
                                  </TR>
                                </TBODY>
                              </TABLE>
                            </DIV></TD>
                          </TR>
                        </TBODY>
                      </TABLE><br>
                      <table width="100%" border="0">
                        <tr>
                          <td><div align="center"><img src="t1.jpg" width="500" height="32"></div></td>
                        </tr>
                        </table>
                        <table width="98%" border="0" align="center">
                          <tr>
                            <td align="center"><img src="parceiros/ravanello_logotipo.gif"></td>
                            <td align="center"><img src="parceiros/transpitlati.gif"></td>
                            <td align="center"><img src="parceiros/coopavel.jpg"></td>
                            </tr>
                        </table>
                        <table width="98%" border="0" align="center">
                          <tr>
                            <td align="center"><img src="parceiros/camera.jpg"></td>
                            <td align="center"><img src="parceiros/rodovico_lgoo.jpg" width="160" height="90"></td>
                            <td align="center"><img src="parceiros/coamo.gif"></td>
                          </tr>
                        </table>
                        <table width="100%" border="0">
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            </tr>
                          <tr>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><div align="center"><img src="t2.png" width="500" height="32"></div></td>
                            </tr>
                        </table>
                        <table width="98%" border="0" align="center">
                          <tr>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="center"><img src="parceiros/mann.jpg"></td>
                            <td align="center"><img src="cartoes/FiltrosFram.jpg" width="103" height="125"></td>
                            <td align="center"><img src="parceiros/bardal.jpg"></td>
                            <td align="center"><img src="parceiros/tecfil.jpg"></td>
                          </tr>
                        </table>
                        <table width="98%" border="0" align="center">
                          <tr>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="center"><div align="center"><img src="cartoes/Varga.jpg"></div></td>
                            <td align="center"><div align="center"><img src="cartoes/Goodyear.jpg" width="103" height="37"></div></td>
                            <td align="center"><div align="center"><img src="cartoes/grill.jpg"></div></td>
                            <td align="center"><div align="center"><img src="cartoes/wurt.jpg" width="151" height="80"></div></td>
                            <td align="center"><div align="center"><img src="cartoes/stp.jpg"></div></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" align="center">
                          <tr>
                            <td valign="top" width="54%" align="left"><table width="100%" border="0">
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><div align="center"><img src="t3.jpg" width="500" height="32"></div></td>
                              </tr>
                            </table>
                              <table width="100%" border="0">
                                <tr>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  </tr>
                                <tr>
                                  <td><table width="100%" border="0">
                                    <tr>
                                      <td><div align="center"><img src="cartoes/logo_mastercard.gif"></div></td>
                                      <td><div align="center"><img src="cartoes/visa2.gif" width="40" height="25"></div></td>
                                      <td><div align="center"><img src="cartoes/logo_visa.gif"></div></td>
                                      <td><div align="center"><img src="cartoes/banri.gif"></div></td>
                                      </tr>
                                    <tr>
                                      <td><div align="center"></div></td>
                                      <td><div align="center"></div></td>
                                      <td><div align="center"></div></td>
                                      <td><div align="center"></div></td>
                                      </tr>
                                    <tr>
                                      <td><div align="center"><img src="cartoes/sicre.gif"></div></td>
                                      <td><div align="center"><img src="cartoes/maestro.gif"></div></td>
                                      <td><div align="center"><img src="cartoes/ope_5.gif"></div></td>
                                      <td><div align="center"><img src="cartoes/good.gif" width="41" height="26"></div></td>
                                      </tr>
                                    </table></td>
                                  <td><div align="center"><img src="cartoes/cresol.jpg" align="middle"></div></td>
                                  <td><div align="center"><img src="cartoes/car.jpg"></div></td>
                                  </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table>                   </td>
                  </tr>
              </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<DIV id=rodape-baixo>
  <DIV class=conteudo>
  <DIV id=direitos>
  <?php include("baixo.php"); ?><BR class=clr></DIV></DIV></DIV></DIV></BODY></HTML>
