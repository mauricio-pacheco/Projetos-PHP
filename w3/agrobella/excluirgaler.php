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
                      <TD colSpan=2><table cellspacing="1" cellpadding="3" width="100%" 
                        align="center" border="0">
                        <tbody>
                          <tr>
                            <td width="72%" colspan="2" 
                            bgcolor="#ffffff" 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><?
include "conexao.php";

$id = $_GET['id'];
$nomegaleria = $_GET['nomegaleria'];


$query = mysql_query("DELETE FROM galerias WHERE id='$id'");

$id="$id";

$dir="/var/www/virtual/agrobellaalimentos.com.br/htdocs/arquivos/$id/";

function apagar($dir)
{
if(is_dir($dir)) // verifica se realmente é uma pasta
{
if($handle = opendir($dir))
{
while(false !== ($file = readdir($handle))) // varre cada um dos arquivos da pasta
{
if(($file == ".") or ($file == ".."))
{
continue;
}
if(is_dir($file)) // verifica se o arquivo atual é uma pasta
{
// caso seja uma pasta, faz a chamada para a funcao novamente
apagar($file);
} else
{
// caso seja um arquivo, exclui ele
unlink($file);
}
}
} else
{
print("nao foi possivel abrir o arquivo.");
return false;
}

// fecha a pasta aberta
closedir($handle);

// apaga a pasta, que agora esta vazia
unlink($dir);
} else
{
print("diretorio informado invalido");
return false;
}
}



if ($query)  
{
echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Galeria <strong>$titulo</strong> deletado com sucesso!</font></div>";
}else{
echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possível deletar a Galeria.</font></div>";
}
?></td>
                          </tr>
                        <tr class="back">
                          <td width="28%" 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><script> 

var checkobj 
function agreesubmit(el){ 
checkobj=el 
if (document.all||document.getElementById){ 
for (i=0;i<checkobj.form.length;i++){  //hunt down submit button 
var tempobj=checkobj.form.elements[i] 
if(tempobj.type.toLowerCase()=="submit") 
tempobj.disabled=!checkobj.checked 
} 
} 
} 

function defaultagree(el){ 
if (!document.all&&!document.getElementById){ 
if (window.checkobj&&checkobj.checked) 
return true 
else{ 
alert("Please read/accept terms to submit form") 
return false 
} 
} 
} 

                                    </script>                          </td>
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
