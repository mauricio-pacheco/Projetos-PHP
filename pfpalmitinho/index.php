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
        <td align="center"><BR><b><script language="JavaScript" type="text/javascript">
var datahora,xhora,xdia,dia,mes,ano,txtsaudacao;
datahora = new Date();
xhora = datahora.getHours();
if (xhora >= 0 && xhora < 12) {txtsaudacao = "Bom Dia,"}
if (xhora >= 12 && xhora < 18) {txtsaudacao = "Boa Tarde,"}
if (xhora >= 18 && xhora <= 23) {txtsaudacao = "Boa Noite,"}
xdia = datahora.getDay();
diasemana = new Array(7);
diasemana[0] = "Domingo";
diasemana[1] = "Segunda Feira";
diasemana[2] = "Terça Feira";
diasemana[3] = "Quarta Feira";
diasemana[4] = "Quinta Feira";
diasemana[5] = "Sexta Feira";
diasemana[6] = "Sábado";
dia = datahora.getDate();
mes = datahora.getMonth();
mesdoano = new Array(12);
mesdoano[0] = "01";
mesdoano[1] = "02";
mesdoano[2] = "03";
mesdoano[3] = "04";
mesdoano[4] = "05";
mesdoano[5] = "06";
mesdoano[6] = "07";
mesdoano[7] = "08";
mesdoano[8] = "09";
mesdoano[9] = "10";
mesdoano[10] = "11";
mesdoano[11] = "12";
ano = datahora.getFullYear();
document.write(txtsaudacao + " Palmitinho/RS, " + diasemana[xdia] + ", " + dia + "/" + mesdoano[mes] + "/" + ano);
</script></b></td>
      </tr>
    </table>
      <table width="96%" border="0" align="center">
        <tr>
          <td><table width="97%" border="0" align="center">
            <tr>
              <td bgcolor="#0066FF"><img src="blank.gif" width="1" height="4"></td>
            </tr>
          </table>
            <span class="link3">
            <?php
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
$qnt = 7;
// O sistema calcula o in&iacute;cio da sele&ccedil;&atilde;o calculando: 
// (p&aacute;gina atual * quantidade por p&aacute;gina) - quantidade por p&aacute;gina
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos n&uacute;meros acima
$sql_select = "SELECT * FROM noticias ORDER BY id DESC LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$titulo = $array["titulo"];
$legenda = $array["legenda"];
$texto = $array["texto"];
$data = $array["data"];
$hora = $array["hora"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
            </span>
            <table width="96%" border="0" align="center">
              <tr>
                <td><table width="100%" border="0">
                  <tr>
                    <td width="2%"><img src="news.gif" width="17" height="16"></td>
                    <td width="98%"><a href="vernoticia.php?id=<?php echo $id.""; ?>"><?php echo $titulo.""; ?></a>                      <!--/TITULO--></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><?php echo $legenda.""; ?></td>
              </tr>
              <tr>
                <td><table width="100%" border="0">
                  <tr>
                    <td width="2%"><a href="vernoticia.php?id=<?php echo $id.""; ?>"><img src="read_icon.gif" width="16" height="16" border="0"></a></td>
                    <td width="32%"><a href="vernoticia.php?id=<?php echo $id.""; ?>">Leia Mais...</a></td>
                    <td width="66%" align="right"><font color="#003300">Publicada Terça-feira, <?php echo $data.""; ?> (<?php echo $hora.""; ?>)</font></td>
                  </tr>
                </table></td>
              </tr>
          </table>
            <?php




}

// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br />";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM noticias";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 16;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)
echo "<a href='index.php?p=1' target='_self'><font size='1'>Primeira p&aacute;gina</font></a> <font color='#000000' size='1'>-</font> ";
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
echo " <font color='#000000' size='1'>-</font> <a href='index.php?p=".$pags."' target='_self'><font size='1'>&Uacute;ltima p&aacute;gina</font></a> ";
?></td>
        </tr>
    </table>
      <table width="98%" border="0" align="center">
        <tr>
          <td align="center"><TABLE height=165 cellSpacing=0 cellPadding=0 
                        width="97%" border=0>
            <TBODY>
              <TR>
                <TD borderColor=#cccccc width="48%" height=1><DIV align=center>
                  <TABLE width=100%>
                    <TBODY>
                      <TR>
                        <TD borderColor=#e9e9e9 bgColor=#0066ff><DIV align=center><FONT size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                color=#ffffff><STRONG>Emails</STRONG></FONT></FONT></FONT></DIV></TD>
                      </TR>
                    </TBODY>
                  </TABLE>
                  <TABLE width=287>
                    <TBODY>
                    </TBODY>
                  </TABLE>
                  <TABLE width=100%>
                    <TBODY>
                      <TR>
                        <TD borderColor=#e9e9e9 width=22 
                                bgColor=#f7f7f7><img src="email.gif"></TD>
                        <TD borderColor=#e9e9e9 width=173 
                                bgColor=#f7f7f7><div align="left"><FONT color=#0066ff 
                                size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Secretaria 
                          da 
                          Administração</STRONG></FONT></FONT></div></TD>
                        <TD borderColor=#e9e9e9 width=332 
                                bgColor=#f7f7f7><DIV align=left><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#666666 size=1><A 
                                href="mailto:adm@palmitinho.rs.gov.br">adm@palmitinho.rs.gov.br</A></FONT></DIV></TD>
                      </TR>
                      <TR>
                        <TD borderColor=#e9e9e9><img src="email.gif"></TD>
                        <TD borderColor=#e9e9e9><div align="left"><FONT color=#0066ff 
                                size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Secretaria 
                          da Agricultura</STRONG></FONT></FONT></div></TD>
                        <TD borderColor=#e9e9e9><DIV align=left><FONT size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#666666 size=1><A 
                                href="mailto:agricultura@palmitinho.rs.gov.br">agricultura@palmitinho.rs.gov.br</A></FONT></FONT></FONT></DIV></TD>
                      </TR>
                      <TR>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><img src="email.gif"></TD>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><div align="left"><FONT color=#0066ff 
                                size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Câmara 
                          de Vereadores</STRONG></FONT></FONT></div></TD>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><DIV align=left><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#666666 size=1><A 
                                href="mailto:camara@palmitinho.rs.gov.br">camara@palmitinho.rs.gov.br</A></FONT></DIV></TD>
                      </TR>
                      <TR>
                        <TD borderColor=#e9e9e9><img src="email.gif"></TD>
                        <TD borderColor=#e9e9e9><div align="left"><FONT color=#0066ff 
                                size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Setor 
                          de Compras</STRONG></FONT></FONT></div></TD>
                        <TD borderColor=#e9e9e9><DIV align=left><FONT size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#666666 size=1><A 
                                href="mailto:compras@palmitinho.rs.gov.br">compras@palmitinho.rs.gov.br</A></FONT></FONT></FONT></DIV></TD>
                      </TR>
                      <TR>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><img src="email.gif"></TD>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7 
                                height=14><div align="left"><FONT color=#0066ff 
                                size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Contabilidade</STRONG></FONT></FONT></div></TD>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><DIV align=left><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#666666 size=1><A 
                                href="mailto:contabilidade@palmitinho.rs.gov.br">contabilidade@palmitinho.rs.gov.br</A></FONT></DIV></TD>
                      </TR>
                      <TR>
                        <TD borderColor=#e9e9e9><img src="email.gif"></TD>
                        <TD borderColor=#e9e9e9><div align="left"><FONT color=#0066ff 
                                size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Secretaria 
                          da 
                          Educação</STRONG></FONT></FONT></FONT></div></TD>
                        <TD borderColor=#e9e9e9><DIV align=left><FONT size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#666666 size=1><A 
                                href="mailto:educacao@palmitinho.rs.gov.br">educacao@palmitinho.rs.gov.br</A></FONT></FONT></DIV></TD>
                      </TR>
                      <TR>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><img src="email.gif"></TD>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><div align="left"><FONT color=#0066ff 
                                size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Prestação 
                          de 
                          Contas</STRONG></FONT></FONT></FONT></div></TD>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><DIV align=left><FONT size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#666666 size=1><A 
                                href="mailto:pccontas@palmitinho.rs.gov.br">pccontas@palmitinho.rs.gov.br</A></FONT></FONT></FONT></DIV></TD>
                      </TR>
                      <TR>
                        <TD borderColor=#e9e9e9><img src="email.gif"></TD>
                        <TD borderColor=#e9e9e9><div align="left"><FONT color=#0066ff 
                                size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Departamento 
                          Pessoal</STRONG></FONT></FONT></FONT></div></TD>
                        <TD borderColor=#e9e9e9><DIV align=left><FONT size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#666666 size=1><A 
                                href="mailto:pessoal@palmitinho.rs.gov.br">pessoal@palmitinho.rs.gov.br</A></FONT></FONT></DIV></TD>
                      </TR>
                      <TR>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><img src="email.gif"></TD>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><div align="left"><FONT color=#0066ff 
                                size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Setor 
                          de 
                          Projetos</STRONG></FONT></FONT></FONT></div></TD>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><DIV align=left><FONT size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#666666 size=1><A 
                                href="mailto:projetos@palmitinho.rs.gov.br">projetos@palmitinho.rs.gov.br</A></FONT></FONT></FONT></DIV></TD>
                      </TR>
                      <TR>
                        <TD borderColor=#e9e9e9><img src="email.gif"></TD>
                        <TD borderColor=#e9e9e9 height=14><div align="left"><FONT color=#0066ff 
                                size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Secretaria 
                          da 
                          Saúde</STRONG></FONT></FONT></FONT></div></TD>
                        <TD borderColor=#e9e9e9><DIV align=left><FONT size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#666666 size=1><A 
                                href="mailto:saude@palmitinho.rs.gov.br">saude@palmitinho.rs.gov.br</A></FONT></FONT></DIV></TD>
                      </TR>
                      <TR>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><img src="email.gif"></TD>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><div align="left"><FONT color=#0066ff 
                                size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Setor 
                          Primário</STRONG></FONT></FONT></FONT></div></TD>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><DIV align=left><FONT size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#666666 size=1><A 
                                href="mailto:setorprimario@palmitinho.rs.gov.br">setorprimario@palmitinho.rs.gov.br</A></FONT></FONT></FONT></DIV></TD>
                      </TR>
                      <TR>
                        <TD borderColor=#e9e9e9><img src="email.gif"></TD>
                        <TD borderColor=#e9e9e9 height=14><div align="left"><FONT color=#0066ff 
                                size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Tesouraria</STRONG></FONT></FONT></FONT></div></TD>
                        <TD borderColor=#e9e9e9><DIV align=left><FONT size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#666666 size=1><A 
                                href="mailto:tesouraria@palmitinho.rs.gov.br">tesouraria@palmitinho.rs.gov.br</A></FONT></FONT></DIV></TD>
                      </TR>
                      <TR>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><img src="email.gif"></TD>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><div align="left"><FONT color=#0066ff 
                                size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Divisão 
                          de 
                          Trânsito</STRONG></FONT></FONT></FONT></div></TD>
                        <TD borderColor=#e9e9e9 bgColor=#f7f7f7><DIV align=left><FONT size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#666666 size=1><A 
                                href="mailto:transito@palmitinho.rs.gov.br">transito@palmitinho.rs.gov.br</A></FONT></FONT></FONT></DIV></TD>
                      </TR>
                      <TR>
                        <TD borderColor=#e9e9e9><img src="email.gif"></TD>
                        <TD borderColor=#e9e9e9 height=14><div align="left"><FONT color=#0066ff 
                                size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif"><STRONG>Tributação</STRONG></FONT></FONT></FONT></div></TD>
                        <TD borderColor=#e9e9e9><DIV align=left><FONT size=1><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#666666 size=1><A 
                                href="mailto:tributacao@palmitinho.rs.gov.br">tributacao@palmitinho.rs.gov.br</A></FONT></FONT></DIV></TD>
                      </TR>
                    </TBODY>
                  </TABLE>
                </DIV></TD>
              </TR>
            </TBODY>
          </TABLE></td>
        </tr>
    </table>
      <table width="98%" border="0" align="center">
        <tr>
          <td>&nbsp;</td>
        </tr>
    </table></td>
    <td width="238" bgcolor="#FFFFFF" valign="top"><?php include("esquerdo.php"); ?></td>
  </tr>
</table>
<?php include("baixo.php"); ?></BODY></HTML>
