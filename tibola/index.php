<?php include("meta.php"); ?>
<BODY bgColor=#efefef leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD vAlign=top>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD>&nbsp;</TD>
          <TD width=770 bgColor=#ffffff><TABLE cellSpacing=0 cellPadding=0 width="100%" 
            align=center border=0>
            <TBODY>
              <TR>
                <TD vAlign=top width=770>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" 
                  bgColor=#ffffff border=0>
                          <TBODY>
                            <TR> 
                              <TD vAlign=top align=middle width=100%>
                                <?php include("carrinho.php"); ?>
                                <TABLE cellSpacing=0 cellPadding=0 width="100%" align=center 
                  border=0>
                                  <TBODY>
                                    <TR>
                                      <TD background=home_arquivos/home_barra_so_sombra.gif 
                      bgColor=#ffffff height=8></TD>
                                    </TR>
                                  </TBODY>
                              </TABLE>
                                <table width="100%" height="600" border="0">
                                  <tr>
                                    <td width="21%" valign="top" bgcolor="#F9F9F9"><?php include("menu.php"); ?></td>
                                    <td width="79%" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0">
                                      <tr>
                                        <td align="center"><img src="prod.jpg" width="420" height="20"></td>
                                      </tr>
                                    </table>
                                      <table width="100%" border="0">
                                        <tr>
                                          <td><?php
include "administrador/conexao.php";

$colunas="2"; //quantidade de colunas
$cont="1"; //contador

print"<table width=240 align=center>";

#Consulta
$s = mysql_query("SELECT * FROM produtos ORDER BY RAND() LIMIT 8");

while($x=mysql_fetch_array($s)){
//se o cont for igual a 1 ele começa a linha da tabela
if($cont==1){
print"<tr>";
}
print"<td>";
?>
                                            <br />
                                            <table width="280" align="center" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td width="3%">&nbsp;<font color="#000000"><img src="administrador/produtosmenor/<?php echo $x["fotomenor"]; ?>" /></font>&nbsp;</td>
                                                <td width="97%" class=tahomafonte>&nbsp;<b><?php echo $x["nome"]; ?></b><br />
                                                  &nbsp;Pre&ccedil;o: <br />
                                                  &nbsp;<font color="#ff0000">R$ <?php echo $x["preco"]; ?></font><br>
                                                  &nbsp;<font class="tahoma_preta_11"><a href="detalhes.php?id=<?php echo $x["id"]; ?>">Mais detalhes...</a></font></td>
                                              </tr>
                                            </table>
                                            <br />
                                            <?
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
print"</tr></table>";
} else {
print"</table>";
}
?></td>
                                        </tr>
                                      </table></td>
                                  </tr>
                              </table></TD>
                            </TR>
                          </TBODY>
                        </TABLE>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" align=center 
                  border=0>
                    <TBODY>
                    <TR>
                      <TD background=home_arquivos/home_barra_so_sombra.gif 
                      bgColor=#ffffff height=7></TD></TR></TBODY></TABLE>
                      </TD>
                    </TR></TBODY></TABLE></TD>
          <TD>&nbsp;</TD></TR></TBODY></TABLE></TD></TR>
  <TR>
      <TD vAlign=top height=75> 
        <?php include("baixo.php"); ?>
    </TD></TR></TBODY></TABLE></BODY></HTML>
