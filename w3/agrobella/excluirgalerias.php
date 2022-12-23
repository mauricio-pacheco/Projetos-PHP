<?php include ("meta.php"); ?>
<style type="text/css">
<!--
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style3 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; font-style: italic; }
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
                      <TD colSpan=2><div align="center" class="style2"><a href="fotoadmin.php">Incluir Galeria</a> - <a href="cadastrarfoto.php"> Cadastrar Fotos</a> - <a href="excluirgalerias.php"> Excluir Galerias</a></div></TD>
                    </TR>
                    <TR>
                      <TD colSpan=2>
</TD>
                    </TR>
                    <TR>
                      <TD colSpan=2><table cellspacing="1" cellpadding="3" width="100%" 
                        align="center" border="0">
                        <tbody>
                          <tr>
                            <td width="72%" colspan="2" 
                            bgcolor="#ffffff" 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><span class="style3">
                              <?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM galerias ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se há algum registro na tabela, caso não houver, ele mostrará a mensagem abaixo
   {echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe Galerias cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrará os registros. OBS: Você pode mudar o modo de exibir os registros
     //mais não mude nenhuma variável, a não ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                              <?php echo $n["nomegaleria"]; ?> - <a href="excluirgaler.php?id=<?php echo $n["id"]; ?>">APAGAR</a><br />
                              <br />
                              <?
  }
  }
 ?>
                            </span></td>
                          </tr>
                        <tr class="back">
                          <td width="28%" 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"></td>
                        </tr>
  </tbody>
  
                      </table>
                      </TD>
                    </TR> <TR>
                      <TD width=100% background=home_arquivos/bg_tit_novidades.jpg 
                      height=32>&nbsp;</TD>
                    </TR>
                   </TBODY></TABLE></TD>
              </TR></TBODY></TABLE></TD>
          <TD>&nbsp;</TD></TR></TBODY></TABLE>
    </TD></TR></TBODY></TABLE><?php include ("abaixoadm.php"); ?>
</BODY></HTML>
