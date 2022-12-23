<?php include ("cabecalho.php"); ?>
<?php include ("creditos.php"); ?>
<?php include ("menu.php"); ?>



<div align="center">
    <p><img src="listacont.jpg" width="400" height="30" /></p>
    <table width="980" border="0">
      <tr>
        <td width="16%"><font color="#006600" size="2" face="Verdana, Arial, Helvetica, sans-serif">Nome:</font></td>
        <td width="16%"><font color="#006600" size="2" face="Verdana, Arial, Helvetica, sans-serif">CPF:</font></td>
        <td width="16%"><font color="#006600" size="2" face="Verdana, Arial, Helvetica, sans-serif">N&ordm; de Dependentes:</font></td>
        <td width="16%"><font color="#006600" size="2" face="Verdana, Arial, Helvetica, sans-serif">Salário:</font></td>
        <td width="16%"><font color="#006600" size="2" face="Verdana, Arial, Helvetica, sans-serif">Alíquota:</font></td>
        <td width="16%"><font color="#006600" size="2" face="Verdana, Arial, Helvetica, sans-serif">T. Imposto:</font></td>
        <td width="16%"><font color="#006600" size="2" face="Verdana, Arial, Helvetica, sans-serif">Deletar:</font></td>
      </tr>
    </table>
    <?php

include "conectar.php";

$sql = mysql_query("SELECT * FROM cadastro");
$contar = mysql_num_rows($sql);

while($n = mysql_fetch_array($sql))
   {





if  ($n["aliquota"] <= '20000') {

$resultado = 'ISENTO' ;
$imposto = 'ISENTO' ;

}

elseif  ($n["aliquota"] > '20000' and $n["aliquota"] <= '50000' )

{


$resultado = '5%' ;
$imposto = $n["aliquota"] * '5' / '100' - $n["dependente"] * '6000' ;


}

elseif  ($n["aliquota"] > '50000' and $n["aliquota"] <= '100000' )

{


$resultado = '10%' ;
$imposto = $n["aliquota"] * '10' / '100' - $n["dependente"] * '6000' ;



}


elseif  ($n["aliquota"] > '100000')

{


$resultado = '27%' ;
$imposto = $n["aliquota"] * '27' / '100' - $n["dependente"] * '6000' ;

}



   ?>
    <table width="980" border="0">
      <tr>
        <td width="16%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $n["nome"]; ?></font></td>
        <td width="16%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $n["cpf"]; ?></font></td>
        <td width="16%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $n["dependente"]; ?></font></td>
        <td width="16%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">R$ <?php echo $n["aliquota"]; ?></font></td>
        <td width="16%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $resultado ?></font></td>
         <td width="16%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
           <?php

         if ($imposto < 0) {

         $imposto = 'ISENTO' ;

         }

         echo $imposto ?>
         </font></td>
         <td width="16%"><div align="center"><a href="apagar.php?id=<?php echo $n["id"];?>" onClick="return confirm('Deseja deletar mesmo o contribuinte <?php echo $n["nome"]; ?>?');"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><img src="apaga.gif" width="19" height="16" border="0" /></font></a></div></td>
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