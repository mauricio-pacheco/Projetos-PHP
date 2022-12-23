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
                      <TD colSpan=2><div align="center" class="style2"><a href="fotoadmin.php">Incluir Galeria</a> - <a href="cadastrarfoto.php"> Cadastrar Fotos</a> - <a href="excluirgalerias.php"> Excluir Galerias</a></div></TD>
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

$nomegaleria = $_POST["nomegaleria"];

$foto1 = isset($_FILES['foto1']) ? $_FILES['foto1'] : FALSE; 

// Código acima... com as demais verificaçoes... 

// Diretório para onde o arquivo será movido 
$diretorio = "./galerias/"; 

// Substitui espaços por underscores no nome do arquivo 
$nomefoto1 = str_replace(" ", "_", $foto1["name"]); 

// Todas as letras em minúsculo 
$nomefoto1 = strtolower($nomefoto1); 

// Caminho completo do arquivo 
$nomefoto1 = $diretorio . $nomefoto1; 

$foto1nome = $foto1["name"];

// Tudo ok! Então, move o arquivo 
if (move_uploaded_file($foto1['tmp_name'], $nomefoto1)) { 
    echo ""; 
} 
else { 
    echo ""; 
} 

// fecha foto 1



$sql = "INSERT INTO galerias (nomegaleria, foto1) VALUES ('$nomegaleria','$foto1nome')";
if(mysql_query($sql)) {
echo "<div align=center><br><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Galeria cadastrada com sucesso!!</font></div>";
}else{
echo "<div align=center><br><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possivel cadastrar a galeria!</font></div>";
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
