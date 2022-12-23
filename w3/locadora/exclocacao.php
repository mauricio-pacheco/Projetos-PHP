<?php include("acima.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>MV Video Locadora</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<STYLE type=text/css>
A:link {
	COLOR: #000000; TEXT-DECORATION: none
}
A:visited {
	COLOR: #000000; TEXT-DECORATION: none
}
A:hover {
	COLOR: #003366;
	TEXT-DECORATION: underline
}
#divDrag0 {
	LEFT: 0px; WIDTH: 40px; CLIP: rect(0px 120px 120px 0px); CURSOR: hand; POSITION: absolute; TOP: 0px; HEIGHT: 120px
}
.style1 {
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
</STYLE>

<META content="MSHTML 6.00.5730.13" name=GENERATOR></HEAD>
<BODY bottomMargin=0 leftMargin=0 topMargin=0 rightMargin=0>
<TABLE style="BORDER-RIGHT: #cccccc 1px solid; BORDER-LEFT: #cccccc 1px solid" 
cellSpacing="0" cellPadding="0" width="760" bgColor=#ffffff 
align=center>
  <TBODY>
  <TR>
    <TD><div align="center">
        <table width="100%" border="0">
          <tr>
            <td width="64%"><img src="mv.jpg"></td>
            <td width="36%"><div align="center"><a href="sair.php"><img src="sair.jpg" width="240" height="48" border="0"></a></div></td>
          </tr>
        </table>
    </div>
      <HR align=center width="99%" color=#cccccc SIZE=1>
      <table width="100%" border="0">
        <tr>
          <td width="19%"><?php include("menu.php"); ?></td>
          <td width="81%" valign=top><table width="100%" border="0">
            <tr>
              <td>&nbsp;<font face="Verdana">Excluir Locação</font></td>
            </tr>
            <tr>
              <td><HR align=center width="99%" color=#cccccc SIZE=1></td>
            </tr>
            <form method="post" ENCTYPE="multipart/form-data" action="pesquisarloc2.php" name="cadastro" onSubmit="return validar(this)"><tr>
              <td><table width="98%" border="0" align="center">
                <tr>
                  <td width="28%"><span class="style2">Digite o nome do filme:</span></td>
                  <td width="45%"><script language=javascript>
function validar(cadastro) { 

if (document.cadastro.palavra.value=="") {
alert("Digite a palavra para a pesquisa!")
cadastro.palavra.focus();
return false
}

		return true;

}


              </SCRIPT>
                      <input name="palavra" type="text" size=50 value="" style=font-size:11px;font-family:tahoma></td>
                  <td width="27%"><input type="submit" NAME="Enter" style=font-size:11px;font-family:tahoma value=" Pesquisar "></td>
                </tr>
              </table></td>
            </tr></form>
            <tr>
              <td><HR align=center width="99%" color=#cccccc SIZE=1></td>
            </tr>
            <tr>
              <td><div align="center"><font face="Verdana">Selecione o Filme Locado para excluir:</font></div></td>
            </tr>
            <tr>
              <td><HR align=center width="99%" color=#cccccc SIZE=1></td>
            </tr>
            <tr>
              <td><table width="80%" border="0" align="center">
                <tr>
                  <td width="9%"><img src="vaita.gif"></td>
                  <td width="42%"><span class="style2">LOCAÇÃO ABERTA:</span></td>
                  <td width="6%"><img src="feito.gif"></td>
                  <td width="43%"><span class="style2"><font color="#ff0000">LOCAÇÃO FECHADA</font></span></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td><HR align=center width="99%" color=#cccccc SIZE=1></td>
            </tr>
            <tr>
              <td><?php
include "conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 10;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM locacoes ORDER BY codigo DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

while($array = mysql_fetch_array($sql_query)) {

$codigo = $array["codigo"];
$nomecliente = $array["nomecliente"];
$nomefilme = $array["nomefilme"];
$codigofilme = $array["codigofilme"];
$codigocliente = $array["codigocliente"];
$preco = $array["preco"];
$datasaida = $array["datasaida"];
$dataentrega = $array["dataentrega"];
$status = $array["status"];

?>
                <table width="98%" border="0" align="center">
                  <tr>
                    <td width="9%"><?php
                     $faze = $status."";
					 $testefaze = 's';
					 if ($faze == $testefaze)
					 {
					  					  ?><img src="feito.gif"><?php } else { ?><img src="vaita.gif"><?php } ?></td>
                    <td width="76%"><table width="100%" border="0">
                        <tr>
                          <td width="45%"><FONT face=tahoma  style=font-size:11px>Cliente: <?php echo $nomecliente.""; ?></font></td>
                          <td width="55%"><FONT face=tahoma  style=font-size:11px>Filme: <?php echo $nomefilme.""; ?></font></td>
                        </tr>
                      </table>
                      <table width="100%" border="0">
                        <tr>
                          <td width="45%"><FONT face=tahoma  style=font-size:11px>Data Sa&iacute;da:</font> <FONT face=tahoma  style=font-size:11px color="#006C36"><?php echo $datasaida.""; ?></font></td>
                          <td width="55%"><FONT face=tahoma  style=font-size:11px>Data Entrega:</font> <FONT face=tahoma  style=font-size:11px color="#FF0000"><?php echo $dataentrega.""; ?></font></td>
                        </tr>
                      </table></td>
                    <td width="15%"><?php
                     $faze = $status."";
					 $testefaze = 's';
					 if ($faze == $testefaze)
					 {
					  					  ?><div align="center"><font face="Verdana" size="2"><a href="excluiloc.php?codigo=<?php echo $codigo.""; ?>" onClick="return confirm('Tem certeza que deseja excluir a locação ?')">EXCLUIR LOCAÇÃO</a></font></div></td>
                    <td width="4%"><div align="center"><a href="excluiloc.php?codigo=<?php echo $codigo.""; ?>" onClick="return confirm('Tem certeza que deseja excluir a locação ?')"><img src="lixo.gif" width="19" height="24" border="0"></a></div><?php } else { ?><div align="center"><font face="Verdana" size="2"><a href="atualizaloc.php?codigo=<?php echo $codigo.""; ?>&codigofilme=<?php echo $codigofilme.""; ?>" onClick="return confirm('Tem certeza que deseja concluir a locação ?')">FINALIZAR LOCAÇÃO</a></font></div></td>
                    <td width="4%"><div align="center"><a href="atualizaloc.php?codigo=<?php echo $codigo.""; ?>&codigofilme=<?php echo $codigofilme.""; ?>" onClick="return confirm('Tem certeza que deseja concluir a locação ?')"><img src="conclui.gif" border="0"></a></div><?php } ?></td>
                  </tr>
                </table>
                 <span class="style2"><div align="center"><?
}

echo "<br />";

$sql_select_all = "SELECT * FROM locacoes ORDER BY codigo DESC";

$sql_query_all = mysql_query($sql_select_all);

$total_registros = mysql_num_rows($sql_query_all);

$pags = ceil($total_registros/$qnt);

$max_links = 3;

echo "<a href='exclocacao.php?p=1' target='_self'>Primeira p&aacute;gina</a> - ";

for($i = $p-$max_links; $i <= $p-1; $i++) {

if($i <=0) {

} else {

echo "<a href='exclocacao.php?p=".$i."' target='_self'>".$i."</a> ";

}
}

echo "";
echo $p." ";
echo "</font>";

for($i = $p+1; $i <= $p+$max_links; $i++) {

if($i > $pags)
{

}

else
{
echo "<a href='exclocacao.php?p=".$i."' target='_self'>".$i."</a> ";
}
}

echo "- <a href='exclocacao.php?p=".$pags."' target='_self'>&Uacute;ltima p&aacute;gina</a> ";
?></div></span></td>
            </tr>
            <tr>
              <td><HR align=center width="99%" color=#cccccc SIZE=1></td>
            </tr>
          </table></td>
        </tr>
      </table>
      </TD>
  </TR>
  <TR>
    <TD>&nbsp;</TD>
  </TR>
  <TR>
    <TD vAlign=bottom>
      <TABLE cellSpacing=2 cellPadding=2 width="100%" align=center 
      bgColor=#eeeeee border=0 valign="bottom">
        <TBODY>
        <TR>
          <TD vAlign=bottom align=right width="100%"><B><FONT style="FONT-SIZE: 11px" face=tahoma>© Sistema desenvolvido por 
        <A 
            style="TEXT-DECORATION: none" href="mailto:mandry@casadaweb.net" 
            target=_new>Maurício Pacheco</A> e  <A 
            style="TEXT-DECORATION: none" href="mailto:rossivr@hotmail.com" 
            target=_new>Vinicius Rossi</A></FONT></B></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TABLE></BODY></HTML>
