<?php include ("cabecalho2.php"); ?>
<form action="adcliente.php" method="post" enctype="multipart/form-data" name="cadastro" onsubmit="return validar(this)">


<?php include ("creditos.php"); ?>
<?php include ("menu.php"); ?>


 <p align="center"><img src="cliente.jpg" width="400" height="30" /></p>
 <p align="center"><font
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color="#000000" size="1"><font color="#FF0000">*</font></font> <font
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color="#000000" size="1">CAMPOS OBRIGAT&Oacute;RIOS</font></p>
 <TABLE width="31%" border="0" align="center" cellPadding=0 cellSpacing=0 bgcolor="f5f5f5">


<TR>
                                <TD bgcolor="#FFFFFF"><font
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>Nome do Cliente:</font></TD>
<TD bgcolor="#FFFFFF"><font
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>
                              <input
                                class=camposformularios size=30 id="nome" name="nome" >
                                  <font color="#FF0000">*</font> </font></TD>
    </TR>
                              <TR>
                                <TD width="29%" bgcolor="#FFFFFF"><FONT
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>E-mail:</FONT></TD>
                          <TD width="71%" bgcolor="#FFFFFF"><FONT
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>
<input type="text" size="34" class=camposformularios id="email"  name="email" >
                                  <font color="#FF0000">*</font> </FONT></TD>
    </TR>
                              <TR>
                                <TD bgcolor="#FFFFFF"><FONT
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>Telefone:</FONT></TD>
                          <TD bgcolor="#FFFFFF"><FONT
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>
                 <INPUT
                                class=camposformularios size=30 id="telefone" name="telefone">
                                   <font color="#FF0000">*</font></FONT></TD>
    </TR>
                              <TR>
                                <TD width="29%" bgcolor="#FFFFFF"><FONT
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>Produto:</FONT></TD>
<TD width="71%" bgcolor="#FFFFFF"><FONT
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>
<INPUT
                                class=camposformularios id="produto"
                                size=32 name="produto">
                                  <font color="#FF0000">*</font> </FONT></TD>
    </TR>

                              </table>




<br> <div align="center">

                    <INPUT class=botoes type=submit value="ENVIAR FORMULÁRIO" name="Submit"></div>


</form>
</body>
</html>