<?php include ("cabecalho.php"); ?>
<?php include ("creditos.php"); ?>
<?php include ("menu.php"); ?>



  <div align="center">
    <p><img src="listacliente.jpg" width="400" height="30" /></p>
    <table width="980" border="0">
      <tr>
        <td width="16%"><font color="#006600" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome:</font></td>
        <td width="16%"><font color="#006600" size="2" face="Verdana, Arial, Helvetica, sans-serif">E-mail:</font></td>
        <td width="16%"><font color="#006600" size="2" face="Verdana, Arial, Helvetica, sans-serif">Telefone:</font></td>
        <td width="16%"><font color="#006600" size="2" face="Verdana, Arial, Helvetica, sans-serif">Produto:</font></td>
        <td width="16%"><font color="#006600" size="2" face="Verdana, Arial, Helvetica, sans-serif">Op&ccedil;&otilde;es:</font></td>
      </tr>
    </table>
    <?php

include "conectar.php";

$sql = mysql_query("SELECT * FROM fornecedores");
$contar = mysql_num_rows($sql);

while($n = mysql_fetch_array($sql))
   {




   ?>
    <table width="980" border="0">
      <tr>
        <td width="16%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $n["nome"]; ?></font></td>
        <td width="16%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $n["email"]; ?></font></td>
        <td width="16%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $n["telefone"]; ?></font></td>
        <td width="16%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $n["produto"]; ?></font></td>
        <td width="16%"><div align="left"><a href="apagarcliente.php?id=<?php echo $n["id"];?>" onClick="return confirm('Deseja mesmo deletar o fornecedor <?php echo $n["nome"]; ?>?');"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img src="apaga.gif" width="19" height="16" border="0" /> Deletar</font></a> - <a href="editarcliente.php?id=<?php echo $n["id"];?>" onclick="return confirm('Deseja mesmo editar o fornecedor <?php echo $n["nome"]; ?>?');"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img src="lapis.gif" border="0" /> Editar</font></a></div></td>
      </tr>
    </table>
   	<?
	}



?>
    <p>&nbsp;</p>
    <p><br>
        </p>
 </div>
<div align="center"></div>



</body>
</html>