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
.style19 {color: #FFFFFF; font-size: 14px; }
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
          <td width="19%" valign=top><?php include("menu.php"); ?></td>
          <td width="81%" valign=top><table width="100%" border="0">
            <tr>
              <td>&nbsp;<font face="Verdana">Excluir Cliente</font></td>
            </tr>
            <tr>
              <td><HR align=center width="99%" color=#cccccc SIZE=1></td>
            </tr>
            <tr>
              <td><table width="98%" border="0" align="center">
                <form method="post" ENCTYPE="multipart/form-data" action="pesquisarclienteexcluido.php" name="cadastro" onSubmit="return validar(this)">
                  <tr>
                    <td width="28%"><span class="style2">Digite o nome do cliente:</span></td>
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
                </form>
              </table></td>
            </tr>
            <tr>
              <td><HR align=center width="99%" color=#cccccc SIZE=1></td>
            </tr>
            <tr>
              <td><div align="center"><font face="Verdana">Selecione o Cliente para excluir:</font></div></td>
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

$sql_select = "SELECT * FROM clientes ORDER BY codigo DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

while($array = mysql_fetch_array($sql_query)) {

$codigo = $array["codigo"];
$nomecliente = $array["nomecliente"];

?>
                  <span class="style2"><table width="98%" border="0" align="center">
                    <tr>
                    <td width="7%"><img src="clientes.jpg" width="37" height="27"></td>
                    <td width="74%">&nbsp;<font face="Verdana" size="2"><?php echo $nomecliente.""; ?></font></td>
                    <td width="15%"><div align="center"><font face="Verdana" size="2"><a href="excluicliente.php?codigo=<?php echo $codigo.""; ?>" onClick="return confirm('Tem certeza que deseja excluir o cliente <?php echo $nomecliente.""; ?> ?')">APAGAR</a></font></div></td>
                    <td width="4%"><div align="center"><a href="excluicliente.php?codigo=<?php echo $codigo.""; ?>" onClick="return confirm('Tem certeza que deseja excluir o cliente <?php echo $nomecliente.""; ?> ?')"><img src="lixo.gif" width="19" height="24" border="0"></a></div></td>
                    </tr></table>
                  </span>
                <span class="style2"><div align="center">
                  <?
}

echo "<br />";

$sql_select_all = "SELECT * FROM clientes ORDER BY codigo DESC";

$sql_query_all = mysql_query($sql_select_all);

$total_registros = mysql_num_rows($sql_query_all);

$pags = ceil($total_registros/$qnt);

$max_links = 3;

echo "<a href='excluircliente.php?p=1' target='_self'>Primeira p&aacute;gina</a> - ";

for($i = $p-$max_links; $i <= $p-1; $i++) {

if($i <=0) {

} else {

echo "<a href='excluircliente.php?p=".$i."' target='_self'>".$i."</a> ";

}
}

echo "";
echo $p." ";
echo "";

for($i = $p+1; $i <= $p+$max_links; $i++) {

if($i > $pags)
{

}

else
{
echo "<a href='excluircliente.php?p=".$i."' target='_self'>".$i."</a> ";
}
}

echo "- <a href='excluircliente.php?p=".$pags."' target='_self'>&Uacute;ltima p&aacute;gina</a> ";
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
