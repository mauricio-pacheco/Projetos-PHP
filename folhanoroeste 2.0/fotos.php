<DIV class="parent chrome23 single1  editorschoice customcontainer blue">
  <DIV class="heading alignright" style="BACKGROUND: #E71C24"><SPAN class=text 
style="COLOR: #ffffff">Galeria de Fotos - <a href="vergalerias.php"><font color="#FFFFFF">Visualizar todas as Galerias</font></a></SPAN></DIV>
  <DIV class=content>
    <TABLE width="100%" align=center 
                    border=0>
      <TBODY>
        <TR>
          <TD width="100%">
            <?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 6;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_galeria ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="6"; //quantidade de colunas
$cont="1"; //contador

print"<table width=840>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$nomegaleria = $array["nomegaleria"];
$data = $array["data"];
$hora = $array["hora"];
$foto = $array["foto"];
$comentario = $array["comentario"];
$dataevento = $array["dataevento"];



?> <table width="100%" border="0">
              <tr>
                <td align="center"><a 
                        href="vergaleria.php?id=<?php echo $id.""; ?>"><img 
                        alt="<?php echo $nomegaleria.""; ?>" 
                        src="administrador/ups/galerias/<?php echo $foto.""; ?>" 
                        border=0 width="144" height="96"></a></td>
              </tr>
              <tr>
                <td align="center"><a class=link_galeria_todas 
                        href="vergaleria.php?id=<?php echo $id.""; ?>"><b><?php echo $nomegaleria.""; ?></b></a></td>
              </tr>
              <tr>
                <td><table width="80%" border="0" align="center">
                  <tr>
                    <td>Data: <?php echo $dataevento.""; ?></td>
                  </tr>
                 </table>
                  <table width="80%" border="0" align="center">
                  <tr>
                    <td width="7%"><img src="imagens/cameraicone.gif" width="28" height="22"></td>
                    <td width="93%">Fotos:  <?php

$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_fotos WHERE idgaleria='$id' AND foto <> '1'");
$contar = mysql_num_rows($sql); 
$total = mysql_result($sql, 0, 'Total');

?>
                          <?php
  echo ''. $total;
 ?></td>
                  </tr>
                </table></td>
              </tr>
            </table><?php
print"</td>";

//se o cont for igual o n&uacute;mero de colunas ele fecha a linha da tabela
if($cont==$colunas){
print"</tr>";
$cont=0;
}
$cont=$cont+1; //acrescenta valor ao cont
}

//se o valor final de cont for diferente do numero de colunas ele fechar&aacute; a tabela
if(!$cont==$colunas){
print"</table>";
} else {
print"</table>";
}
?>
                    <?php


$sql_select_all = "SELECT * FROM cw_galeria ORDER BY id DESC";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 10;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)



?>
                  </TD>
         </TR>
      </TBODY>
    </TABLE>
  </DIV>
</DIV>
