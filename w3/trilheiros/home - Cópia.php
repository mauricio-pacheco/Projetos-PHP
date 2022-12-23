<?php include("cabecalho.php"); ?>
    <script>
  function camada( s2 ) {
  var sDiv = document.getElementById( s2 );
  if( sDiv.style.visibility == "hidden" ) {
  sDiv.style.visibility = "visible";
  } else {
  sDiv.style.visibility = "hidden";
  }
  }
</script>
    <div id="menu" style="position:absolute; z-index:9; VISIBILITY: s2; top: 188px; left: 376px;"><a href="#" onclick="camada('menu');"> <img src="fechar.jpg" border="0" /> </a><br />
      <img src="trilhao.jpg" /></div>
<style type="text/css">
<!--
.style19 {color: #FFFFFF; font-size: 14px; }
.style20 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style22 {
	color: #FFFFFF;
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style23 {color: #FFFFFF}
-->
</style>
<?php include("aniversario.php"); ?>
<TABLE cellSpacing=0 cellPadding=0 width=778 align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/esquerdao.gif>&nbsp;</TD>
    <TD width=756 bgColor=#000000>
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
                      <TD vAlign=top align=left><table width="725" 
                              border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#282828">
                        <tbody>
                          <tr>
                            <td width="363" align="left" valign="top"><table width="352" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="26" background="home_arquivos/cimatabela.gif"><div align="center" class="style6 style20 style23">&Uacute;LTIMAS FOTOS</div></td>
                              </tr>
                              <tr>
                                <td background="home_arquivos/central.gif"><table width="92%" border="0" align="center">
                                  <?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM galeria ORDER BY id DESC LIMIT 8");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><br><font color='#ffffff' size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">N&atilde;o existe galerias cadastradas!</font><br><br></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                                  <tr onMouseOver="this.style.backgroundColor='#000000'; this.style.color='#252525'; this.style.cursor='pointer'" onClick="window.location='vergalerias.php?id=<?php echo $n["id"]; ?>';" onMouseOut="this.style.backgroundColor='#282828'; this.style.color='#252525';">
                                    <td width="22%" align="center"><img src="capas/<?php echo $n["foto"]; ?>" width="64" height="48" border="1"/></td>
                                    <td width="78%"><table width="100%" border="0">
                                      <tr>
                                        <td><span class="style22"><?php echo $n["nomegaleria"]; ?></span></td>
                                      </tr>
                                      <tr>
                                        <td><span class="style22"><font color="#FEDC00">Data: </font><?php echo $n["data"]; ?> - <?php echo $n["hora"]; ?></span></td>
                                      </tr>
                                    </table></td>
                                  </tr>


                                  <?
  }
  }
 ?>
                                </table></td>
                              </tr>
                              <tr>
                                <td height="2" background="home_arquivos/baixotabela.gif">&nbsp;</td>
                              </tr>
<tr></tr>
                            </table>
                                </td>
                            <td width="362"><table width="352" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="26" background="home_arquivos/cimatabela.gif"><div align="center" class="style6 style20 style23">AGENDA</div></td>
                                </tr>
                                <tr>
                                  <td background="home_arquivos/central.gif"><table width="92%" border="0" align="center">
                                      <?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM agenda ORDER BY id DESC LIMIT 3");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><br><font color='#ffffff' size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">N&atilde;o existe eventos cadastrados!</font><br><br></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?><tr>
                                      <td><span class="style19">
                                      
                                       <a href="verevento.php?id=<?php echo $n["id"]; ?>"><img src="home_arquivos/caxeta.gif" width="14" height="14" />&nbsp;<?php echo $n["assunto"]; ?></a></span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="style22">Data do Evento: <?php echo $n["dataevento"]; ?></span></td>
                                    </tr>
                                    <tr>
                                      <td><span class="style20"><font color='#D29B36' Arial, Helvetica, sans-serif\"><b>Local:</b></font> <font color='#CDCDCD' Arial, Helvetica, sans-serif\"><?php echo $n["local"]; ?></font></span></td>
                                    </tr> <?
  }
  }
 ?>
                                  </table>
                                                                   </td>
                                </tr>
                                <tr>
                                  <td background="home_arquivos/baixotabela.gif">&nbsp;</td>
                                </tr>
                              </table>
                              <img src="home_arquivos/espaco.gif">
                              <table width="352" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="26" background="home_arquivos/cimatabela.gif"><div align="center" class="style6 style20 style23">&Uacute;LTIMAS NOT&Iacute;CIAS</div></td>
                                  </tr>
                                  <tr>
                                    <td background="home_arquivos/central.gif">
                                        <table width="92%" border="0" align="center">
                                          <?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM noticias ORDER BY id DESC LIMIT 10");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><br><font color='#ffffff' size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">N&atilde;o existe notícias cadastradas!</font><br><br></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                                          <tr>
                                            <td><span class="style19"> <a href="vernoticia.php?id=<?php echo $n["id"]; ?>"><img src="home_arquivos/not.gif" width="14" height="14" />&nbsp;<?php echo $n["assunto"]; ?><span class="style22"> | <?php echo $n["data"]; ?> - <?php echo $n["hora"]; ?></span></a></span></td>
                                          </tr>


                                          <?
  }
  }
 ?>
                                        </table>
                                      </td>
                                  </tr>
                                  <tr>
                                    <td height="2" background="home_arquivos/baixotabela.gif">&nbsp;</td>
                                  </tr>
                                </table>                                </td>
                          </tr>
                        </tbody>
                      </table></TD>
                    </TR></TBODY></TABLE></TD></TR><TR>
                <TD height=10 align=left vAlign=top bgcolor="#282828"></TD>
              </TR>
              </TBODY></TABLE></TD>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD></TR></TBODY></TABLE>
<?php include("patrocinio.php"); ?>
<?php include("baixo.php"); ?>
</BODY></HTML>
