<?php include ("cabecalho.php"); ?>
<form action="adicionar.php" method="post" enctype="multipart/form-data" name="cadastro" onsubmit="return validar(this)">
<script>
{
function numeros()
  {
tecla = event.keyCode;
if (tecla >= 48 && tecla <= 57)
    {
    return true;
    }
else
    {
    return false;
    }
  }
}
</script>

<?php include ("creditos.php"); ?>
<?php include ("menu.php"); ?>


 <p align="center"><img src="contribuinte.jpg" width="400" height="30" /></p>
 <p align="center"><font
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color="#000000" size="1"><font color="#FF0000">*</font></font> <font
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color="#000000" size="1">CAMPOS OBRIGAT&Oacute;RIOS</font></p>
 <TABLE width="40%" border="0" align="center" cellPadding=0 cellSpacing=0 bgcolor="f5f5f5">


  <TR>
                                <TD bgcolor="#FFFFFF"><font
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>Nome do Contribuinte:</font></TD>
                                <TD bgcolor="#FFFFFF"><font
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>
                              <input
                                class=camposformularios size=30 id="nome" name="nome" >
                                  <font color="#FF0000">*</font> </font></TD>
    </TR>
                              <TR>
                                <TD width="32%" bgcolor="#FFFFFF"><FONT
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>CPF:</FONT></TD>
                          <TD width="68%" bgcolor="#FFFFFF"><FONT
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>
                  <input type="text" size="22" class=camposformularios id="cpf"  name="cpf" onKeypress="return numeros();">
                                  <font color="#FF0000">*</font> </FONT></TD>
    </TR>
                              <TR>
                                <TD bgcolor="#FFFFFF"><FONT
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>Número de Dependentes:</FONT></TD>
                          <TD bgcolor="#FFFFFF"><FONT
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>
                 <INPUT
                                class=camposformularios size=6 id="dependente" name="dependente" onKeypress="return numeros();" >
                                   <font color="#FF0000">*</font></FONT></TD>
    </TR>
                              <TR>
                                <TD width="32%" bgcolor="#FFFFFF"><FONT
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>Salário:</FONT></TD>
                          <TD width="68%" bgcolor="#FFFFFF"><FONT
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>
                                  R$
                  <INPUT
                                class=camposformularios id="aliquota"
                                size=10 name="aliquota" onKeypress="return numeros();">
                                  <font color="#FF0000">*</font> </FONT></TD>
    </TR>

                              </table>




 <br> <div align="center">

                    <INPUT class=botoes type=submit value="ENVIAR FORMULÁRIO" name="Submit"></div>


</form>
</body>
</html>