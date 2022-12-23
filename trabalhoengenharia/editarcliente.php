<?php include ("cabecalho2.php"); ?>
<form action="editacliente.php" method="post" enctype="multipart/form-data" name="cadastro" onsubmit="return validar(this)">


<?php include ("creditos.php"); ?>
<?php include ("menu.php"); ?>


 <p align="center"><img src="editar.jpg" width="400" height="30" /></p>
 <p align="center"><font
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color="#000000" size="1"><font color="#FF0000">*</font></font> <font
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color="#000000" size="1">CAMPOS OBRIGAT&Oacute;RIOS</font>
   <?php

include "conectar.php";

$id = $_GET['id'];
$nome = $_GET['nome'];

$sql = mysql_query("SELECT * FROM fornecedores WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&fnof;&Acirc;&iexcl; algum registro na tabela, caso n&Atilde;&fnof;&Acirc;&pound;o houver, ele mostrar&Atilde;&fnof;&Acirc;&iexcl; a mensagem abaixo
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe fornecedores cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&fnof;&Acirc;&iexcl; os registros. OBS: Voc&Atilde;&fnof;&Acirc;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&fnof;&Acirc;&pound;o mude nenhuma vari&Atilde;&fnof;&Acirc;&iexcl;vel, a n&Atilde;&fnof;&Acirc;&pound;o ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
   <input name="id" type="hidden" value="<?php echo $n["id"]; ?>" />
 </p>
 <TABLE width="31%" border="0" align="center" cellPadding=0 cellSpacing=0 bgcolor="f5f5f5">


<TR>
                                <TD bgcolor="#FFFFFF"><font
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>Nome do Cliente:</font></TD>
<TD bgcolor="#FFFFFF"><font
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>
                              <input
                                class=camposformularios size=30 id="nome" name="nome" value="<?php echo $n["nome"]; ?>">
                                  <font color="#FF0000">*</font> </font></TD>
    </TR>
                              <TR>
                                <TD width="29%" bgcolor="#FFFFFF"><FONT
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>E-mail:</FONT></TD>
                          <TD width="71%" bgcolor="#FFFFFF"><FONT
                                face="Verdana, Arial, Helvetica, sans-serif"
                                color=#000000 size=1>
<input type="text" size="34" class=camposformularios id="email"  name="email"  value="<?php echo $n["email"]; ?>">
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
                                class=camposformularios size=30 id="telefone" name="telefone" value="<?php echo $n["telefone"]; ?>">
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
                                size=32 name="produto" value="<?php echo $n["produto"]; ?>">
                                  <font color="#FF0000">*</font> </FONT></TD>
    </TR>

                              </table>




<br> <div align="center">

                    <INPUT class=botoes type=submit value="EDITAR FORNECEDOR" name="Submit">
                    <?
  }
  }
 ?>
</div>


</form>
</body>
</html>