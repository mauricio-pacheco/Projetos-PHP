<?php include ("meta.php"); ?>
<style type="text/css">
<!--
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<SCRIPT src="home_arquivos/urchin.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/urchin.js" type=text/javascript></SCRIPT>
<BODY>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD>&nbsp;</TD>
          <TD width=770>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD vAlign=top bgColor=#ffffff>&nbsp;</TD>
              </TR>
              <TR>
                <TD vAlign=top bgColor=#ffffff><div align="center"><span class="style2">Administração do Site Agrobella Alimentos</span></div></TD>
              </TR>
              <TR>
                <TD vAlign=top bgColor=#ffffff>&nbsp;</TD>
              </TR>
              <TR>
                <TD vAlign=top width=80% bgColor=#ffffff>
                   <?php include "menuadmin.php" ; ?>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD width=27 background=home_arquivos/bg_tit_novidades.jpg 
                      height=32>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD colSpan=2>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD colSpan=2><div align="center" class="style2"><a href="incluircota.php">Incluir Cota</a> - <a href="cotaadmin.php"> Cadastrar Produto</a> - <a href="excluirproduto.php"> Excluir Produto</a></div></TD>
                    </TR>
                    <TR>
                      <TD colSpan=2>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD colSpan=2><FORM name=cadastro action=atualizarproduto.php enctype="multipart/form-data" method=post onSubmit="return validar(this)"><table cellspacing="1" cellpadding="3" width="100%" 
                        align="center" border="0">
                        <tbody>
                          <tr>
                            <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            bgcolor="#ffffff" colspan="2"><span class="tahoma10preto"></td>
                          </tr>
                        <tr class="back">
                          <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            width="28%"><span class="tahoma10preto">
                              <div align="right"><font color="#000000">Nome do Produto: </font></div></td>
                          <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            width="72%"><strong>
  <select 
                              class="formularioDir"  name="nome">                     <?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM produtos ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se há algum registro na tabela, caso não houver, ele mostrará a mensagem abaixo
   {echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe produtos cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrará os registros. OBS: Você pode mudar o modo de exibir os registros
     //mais não mude nenhuma variável, a não ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
  <option 
                              value="<?php echo $n["id"]; ?>"><?php echo $n["nome"]; ?></option><?
  }
  }
 ?>
</select>                            
</strong></td>
                        </tr>
                        <tr class="back">
                          <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right"><font color="#000000">Vencimento: </font></div></td>
                          <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong>
                            <input class="formularioDir" size="20" 
                              name="vencimento" />
*</strong></td>
                        </tr>
                        <tr class="back">
                          <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div align="right"><font color="#000000">Preço: </font></div></td>
                          <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong>
                            <input class="formularioDir" size="20" 
                              name="preco" />
*</strong></td>
                        </tr>
                        <tr class="back">
                          <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><span class="tahoma10preto">
                              <div align="right"></div></td>
                          <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><strong><span style="FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif">
                            <input class="texto"  type="submit" value="Atualizar Cotação" name="submit" />
                            </span><br />
                                </strong></td>
                        </tr>
                        <tr class="back">
                          <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif">             </td>
                        </tr>
  </tbody>
  
                      </table>
                      </form></TD>
                    </TR> <TR>
                      <TD width=100% background=home_arquivos/bg_tit_novidades.jpg 
                      height=32>&nbsp;</TD>
                    </TR>
                   </TBODY></TABLE></TD>
              </TR></TBODY></TABLE></TD>
          <TD>&nbsp;</TD></TR></TBODY></TABLE>
    </TD></TR></TBODY></TABLE><?php include ("abaixoadm.php"); ?>
</BODY></HTML>
