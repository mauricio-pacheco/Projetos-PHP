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
                      <TD colSpan=2><FORM name=cadastro action=cadastrarnoticia.php enctype="multipart/form-data" method=post onSubmit="return validar(this)"><table cellspacing="1" cellpadding="3" width="100%" 
                        align="center" border="0">
                        <tbody>
                          <tr>
                            <td width="72%" colspan="2" 
                            bgcolor="#ffffff" 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><?
include "conexao.php";

$nome = $_POST["nome"];
$vencimento = $_POST["vencimento"];
$preco = $_POST["preco"];
$data = date ("j/m/Y");
$hora = date ("H:i:s");

$sql = "UPDATE produtos SET vencimento = '$vencimento', preco = '$preco', data = '$data', hora = '$hora' WHERE id = '$nome'";
if(mysql_query($sql)) {
echo "<div align=center><br><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Produto enviado com sucesso!!</font></div>";
}else{
echo "<div align=center><br><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possivel enviar seu produto!</font></div>";
}
 
?>
</td>
                          </tr>
                        <tr class="back">
                          <td width="28%" 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"></td>
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
