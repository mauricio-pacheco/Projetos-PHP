<?php

include "conecta.php";

$sql = mysql_query("SELECT * FROM musicalfm ORDER BY codigo");
$contar = mysql_num_rows($sql); 
if ($contar < 1)  //Mostra se há algum registro na tabela, caso não houver, ele mostrará a mensagem abaixo
   {echo "<div align=center><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>NÃO EXISTE NENHUM PEDIDO CADASTRADO!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrará os registros. OBS: Você pode mudar o modo de exibir os registros
     //mais não mude nenhuma variável, a não ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">

</style></head>
<LINK href="style.css" type=text/css rel=stylesheet>
<body text="#000000" link="#000000" vlink="#000000" alink="#000000">
<script language="JavaScript">
</script>
<form action="processa.php" method="post" enctype="multipart/form-data" name="cadastro" onSubmit="return validar(this)">
  <p align="center"><img src="fundofm.gif" width="230" height="130"></p>
  <TABLE width="555" border="0" align="center" cellPadding=0 cellSpacing=0 bgcolor="#E7F8F1">
    <TBODY>
      <TR> 
        <TD width=20>&nbsp;</TD>
        <TD width="515"><TABLE cellSpacing=0 cellPadding=0 width="98%" align=center  border=0>
            <TBODY>
              <TR> 
                <TD><TABLE cellSpacing=0 cellPadding=0 width="505" 
border=0>
                    <TBODY>
                      <TR> 
                        <TD width=20>&nbsp;</TD>
                        <TD width="465"><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                            <TBODY>
                              <TR> 
                                <TD height="24" colSpan=2><div align="center"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=2><STRONG>Top 10 Musical </STRONG></FONT><br>
                                </div></TD>
                              </TR>
                              <TR>
                                <TD>&nbsp;</TD>
                                <TD>&nbsp;</TD>
                              </TR>
                              <TR> 
                                <TD width="27%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 1:</FONT></TD>
                                <TD width="73%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <INPUT size=50 name="musica1" value="<? echo $n['musica1']; ?>">
                                  <font color="#FF0000">*</font> </FONT></TD>
                              </TR>
                              <TR> 
                                <TD><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 2 :</font></TD>
                                <TD><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <input 
                                class=camposformularios size=50 id="musica2" name="musica2" value="<? echo $n['musica2']; ?>">
                                  <font color="#FF0000">*</font></font></TD>
                              </TR>
                              <TR> 
                                <TD width="27%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 3 :</FONT></TD>
                                <TD width="73%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <INPUT 
                                class=camposformularios id="musica3" size=50 name="musica3" value="<? echo $n['musica3']; ?>">
                                  <font color="#FF0000">*</font> </FONT></TD>
                              </TR>
                              <TR> 
                                <TD width="27%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 4 :</FONT></TD>
                                <TD width="73%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <INPUT 
                                class=camposformularios id="musica4" size=50 name="musica4" value="<? echo $n['musica4']; ?>">
                                  <font color="#FF0000">*</font> </FONT></TD>
                              </TR>
                              <TR> 
                                <TD><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 5 :</font></TD>
                                <TD><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <INPUT size="50"
                                class=camposformularios id="musica5" name="musica5" value="<? echo $n['musica5']; ?>">
                                  <font color="#FF0000">*</font> </FONT></TD>
                              </TR>
                              <TR> 
                                <TD><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 6 :</font></TD>
                                <TD><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>
                                  <input 
                                class=camposformularios id="musica6" name="musica6" size="50" value="<? echo $n['musica6']; ?>">
                                <font color="#FF0000">*</font> </FONT></TD>
                              </TR>
                              <TR> 
                                <TD width="27%"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 7 :</font></TD>
                                <TD width="73%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <INPUT 
                                class=camposformularios id="musica7" name="musica7" size="50" value="<? echo $n['musica7']; ?>">
                                  <font color="#FF0000">*</font> </FONT></TD>
                              </TR>
                              <TR> 
                                <TD width="27%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 8 :</FONT></TD>
                                <TD width="73%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <INPUT 
                                class=camposformularioscomuns id="musica8" size=50 name="musica8" value="<? echo $n['musica8']; ?>">
                                  <font color="#FF0000">*</font> </FONT></TD>
                              </TR>
                              <TR> 
                                <TD><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 9 :</font></TD>
                                <TD><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <input 
                                class=camposformulariosminusculo id="musica9" 
                                size=50 name="musica9" value="<? echo $n['musica9']; ?>">
                                  <font color="#FF0000">*</font></font></TD>
                              </TR>
                              <TR> 
                                <TD><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 10 :</FONT></TD>
                                <TD><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <input class=camposformularioscomuns id="musica10" size=50 name="musica10" value="<? echo $n['musica10']; ?>">
                                  <font color="#FF0000">*</font></font></TD>
                              </TR>
                              <TR> 
                                <TD width="27%">&nbsp;</TD>
                                <TD width="73%"><div align="right"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>&nbsp; <font color="#FF0000">*</font> 
                                    Campos Obrigat&oacute;rios</FONT></div></TD>
                              </TR>
                            </TBODY>
                          </TABLE></TD>
                        <TD width=20>&nbsp;</TD>
                      </TR>
                      <TR> 
                        <TD width=20>&nbsp;</TD>
                        <TD width="465">&nbsp;</TD>
                        <TD width=20>&nbsp;</TD>
                      </TR>
                    </TBODY>
                  </TABLE></TD>
              </TR>
              <TR> 
                <TD><div align="center">
                    <INPUT class=botoes type=submit value="ATUALIZAR TOP 10 MUSICAL" name=Submit>
                  </div></TD>
              </TR>
            </TBODY>
          </TABLE></TD>
        <TD width=20>&nbsp;</TD>
      </TR>
      <TR> 
        <TD width=20>&nbsp; </TD>
        <TD width="515">&nbsp;</TD>
        <TD width=20>&nbsp; </TD>
      </TR>
    </TBODY>
  </TABLE>
</form>
<?
  }
  }
 ?><? $sql = mysql_query("Select * from musicalfm");
$sql = mysql_num_rows($sql); ?>
  <? if ($sql > 0) {?><? if ($sql < 2) echo ""; else echo ""; ?>
  <? if ($sql < 2) echo ""; else echo ""; ?>
  
  <? } ?>
</body>
</html>
