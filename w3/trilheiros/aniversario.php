<?php include("usuario.php"); ?>
  <?php

include "conexao.php";

$dataservidor = date('d/m') ;

$sql = mysql_query("SELECT * FROM integrantes WHERE nascimento = '$dataservidor' ORDER BY id DESC");
$contar = mysql_num_rows($sql); 

if ($contar >= 1) 
   {
   while($n = mysql_fetch_array($sql))
   {
       ?>
<style type="text/css">
<!--
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>

<TABLE cellSpacing=0 cellPadding=0 width=778 align=center border=0>
  <TBODY>
    <TR>
      <TD vAlign=top align=middle width=11 
    background=home_arquivos/esquerdao.gif>&nbsp;</TD>
      <TD width=756 bgColor=#000000><TABLE cellSpacing=0 cellPadding=0 width=756 border=0>
        <TBODY>
          <TR>
            <TD style="BACKGROUND-REPEAT: repeat-x" vAlign=center align=middle 
          background="home_arquivos/fundob.gif" height=98>
       <table width="100%" border="0">
              <tr>
                <td width="11%"><div align="center"><img src="spaco.gif" width="1"/><img src="integrantes/<?php echo $n["foto"]; ?>" border="1"/></div></td>
                <td width="77%"><table width="100%" border="0">
                  <tr>
                    <td width="5%"><div align="center"><img src="home_arquivos/bolo.png" width="20" height="19" /></div></td>
                    <td width="95%"><span class="style2"><span class="style1"><span class="style4">Aniversariante:</span>&nbsp;<?php echo $n["nome"]; ?></span></span></td>
                  </tr>
                  <tr>
                    <td><div align="center"><img src="home_arquivos/carta.png" width="18" height="12" /></div></td>
                    <td><span class="style2"><span class="style1"><a href="mailto:<?php echo $n["email"]; ?>"><span class="style4">E-mail:</span>&nbsp;<?php echo $n["email"]; ?></a></span></span></td>
                  </tr>
                  <tr>
                    <td><div align="center"><img src="home_arquivos/telefone.png" width="17" height="14" /></div></td>
                    <td><span class="style2"><span class="style1"><span class="style4">Telefone:</span>&nbsp;<?php echo $n["telefone"]; ?> - <?php echo $n["fax"]; ?></span></span></td>
                  </tr>
                  <tr>
                    <td><div align="center"><img src="home_arquivos/menino.png" width="16" height="16" /></div></td>
                    <td><table width="100%" border="0">
                      <tr>
                        <td width="23%"><span class="style15">
                          <input type="submit" onClick="Javascript: location.href='mensagens.php?id=<?php echo $n["id"]; ?>'" class="texto" value="Enviar Mensagem" />
                        </span></td>
                        <td width="77%"><span class="style15">
                          <input type="submit" onClick="Javascript: location.href='enviadas.php?id=<?php echo $n["id"]; ?>'" class="texto" value="Mensagens" />
                        </span></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>                  </td>
                <td width="12%">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
          </TD>
          </TR>
        </TBODY>
      </TABLE></TD>
      <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD>
    </TR>
  </TBODY>
</TABLE><?
  }
 
 ?>
<?php }
else 
   {  }?>