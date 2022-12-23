<?php include("cabecalho.php"); ?>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<style type="text/css">
<!--
.style19 {color: #FFFFFF; font-size: 14px; }
.style22 {
	color: #FFFFFF;
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style23 {color: #FEDC01}
-->
</style>

<TABLE cellSpacing=0 cellPadding=0 width=778 align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/esquerdao.gif>&nbsp;</TD>
    <TD width=756 bgColor=#000000>
      <TABLE cellSpacing=0 cellPadding=0 width=756 border=0>
        <TBODY>
        <TR>
          <TD style="BACKGROUND-REPEAT: repeat-x" vAlign=center align=middle 
          background="#282828" height=19>
            <TABLE cellSpacing=0 cellPadding=0 width=756 align=left border=0>
              <TBODY>
              <TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              <TR>
                <TD>
                  <TABLE width=756 
                  border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828">
                    <TBODY>
                    <TR>
                      <TD vAlign=top align=left><table width="98%" border="0" align="center">
                     
                        <?php

include "conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM galeria WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se há algum registro na tabela, caso não houver, ele mostrará a mensagem abaixo
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N�o existe notic�as cadastradas!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrará os registros. OBS: Você pode mudar o modo de exibir os registros
     //mais não mude nenhuma variável, a não ser que mude o script todo.
   {
while($y = mysql_fetch_array($sql))
   {
   ?><tr>
                          <td><span class="style19"> <?php echo $y["nomegaleria"]; ?></span></td>
                        </tr>
                        <tr>
                          <td><span class="style22"><span class="style23">Data da Postagem:</span> <?php echo $y["data"]; ?> - <?php echo $y["hora"]; ?></span></td>
                        </tr>
                        <tr>
                          <td><span class="style22"><?php echo $y["comentario"]; ?></span></td>
                        </tr><?
  }
  }
 ?>
                        <tr>
                          <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center" width="730">  <?php

include "conexao.php";

$id = $_GET['id'];

$sql="SELECT * FROM fotos WHERE galeria='$id'"; 
$resultado=mysql_query($sql);
$linha=mysql_fetch_array($resultado);

$k=1;
while($linha= mysql_fetch_array($resultado))
{

echo "
<a href='fotosnot/g/".$linha['foto']."' rel='lightbox[roadtrip]' title='".$linha["comentario"]."'><img width='100' height='75' src='fotosnot/p/".$linha['fotomenor']."'></a>
";
if ($k == 5)
{
echo "<br><br>";
$k=0;
}
$k++;
}
  
   ?></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><div align="center"><a href="javascript:history.back(1)"><img src="home_arquivos/voltando.gif" width="70" height="26" border="0" /></a></div></td>
                        </tr>
                       
                      </table></TD>
                    </TR></TBODY></TABLE></TD></TR><TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              </TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD></TR></TBODY></TABLE>
<?php include("patrocinio.php"); ?>
<?php include("baixo.php"); ?>
</BODY></HTML>
