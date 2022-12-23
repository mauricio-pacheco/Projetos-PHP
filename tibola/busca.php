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
                                          <td><table width="96%" border="0" align="center">
                                              <tr>
                                                <td><?php
include "administrador/conexao.php";

$departamento = $_POST["departamento"];

if(!empty($HTTP_POST_VARS["palavra"])) {
	

$palavra = str_replace(" ", "%", $HTTP_POST_VARS[palavra]);

/* Altera os espa&ccedil;os adicionando no lugar o simbolo % */
        
$qr = "SELECT * FROM produtos WHERE nome LIKE '%".$palavra."%' AND departamento='$departamento'";
        
// Executa a query no Banco de Dados
$sql = mysql_query($qr);
        
// Conta o total de resultados encontrados
$total = mysql_num_rows($sql);

echo "<br><br><div align=\"center\"><font class=tahomafonte>Sua busca retornou ' $total ' resultados.</font></div><br><br>";
// Gera o Loop com os resultados
while($r = mysql_fetch_array($sql)) {
		
 ?>
                                                  <table width="100%" border="0">
                                                    <tr>
                                                      <td width="7%"><img src="administrador/produtosmenor/<?php echo $r["fotomenor"]; ?>"></td>
                                                      <td width="93%" class="tahomafonte">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $r["nome"]; ?><br><br>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;Pre&ccedil;o:&nbsp;<font color="#ff0000">R$</font> <?php echo $r["preco"]; ?><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;<font class="tahoma_preta_11"><a href="detalhes.php?id=<?php echo $r["id"]; ?>">Mais detalhes...</a></font></td>
                                                    </tr>
                                                  </table>
                                                  <? }
  } 
 ?></td>
                                              </tr>
                                            </table></td>
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
