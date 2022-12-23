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

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM produtos");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center class=tahomafonte><b>N&atilde;o existe departamentos cadastrados!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                                            <table width="100%" border="0">
                                              <tr>
                                                <td><div align="center"><br>
                                                <img src="administrador/produtos/<?php echo $n["foto"]; ?>" /></div></td>
                                              </tr>
                                              <tr>
                                                <td>&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td class=tahomafonte align="center"><font color="#FF0000"><b><?php echo $n["departamento"]; ?></b></font></td>
                                              </tr>
                                              <tr>
                                                <td class=tahomafonte align="center">&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td class=tahomafonte align="center"><b><?php echo $n["nome"]; ?> --- Pre&ccedil;o: <font color="#1B580E">R$</font> <?php echo $n["preco"]; ?> --- Peso: <?php echo $n["peso"]; ?> Kg</b></td>
                                              </tr>
                                              <tr>
                                                <td>&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td class=tahomafonte><?php echo $n["descricao"]; ?></td>
                                              </tr>
                                              <tr>
                                                <td>&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td class=tahomafonte><div align="center"><a href="javascript:history.go(-1)"><font color="#006600">- VOLTAR -</font></a></div></td>
                                              </tr>
                                            </table>
                                            <p>&nbsp;</p>
   
   
   
   
   <?
  }
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
