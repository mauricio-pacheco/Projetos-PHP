﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<SCRIPT src="home_arquivos/jquery-1.3.2.min.js" type=text/javascript></SCRIPT>
<META http-equiv=X-UA-Compatible content=IE=7>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="classes/estilos.css">
<META 
content="Descrição" 
name=description>
<META 
content="Palavras, Chave" 
name=keywords>
<title>Folha do Noroeste</title>
</head>

<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1" bgcolor="#CCCCCC"><img src="imagens/branco.gif" width="1" height="1" /></td>
    <td width="978" bgcolor="#FFFFFF">
   
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("cabecalho(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("busca(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("login(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("menu(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>

<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>  
  
  

<table width="100%" align="center" background="btabela2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="280" valign="top">
     <?php include("esquerdo(1).php"); ?> </td>
    <td width="700" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>
         <table width="100%" border="0" height="30" cellspacing="0" cellpadding="0">
           <tr>
             <td align="left" bgcolor="#E71C24" class="fontemaior">&nbsp;&nbsp;<strong><?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_galeria WHERE id='$id' ORDER BY id");
$sql2 = mysql_query("UPDATE cw_galeria set contador=contador + 1 where id='$id'");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center class=manchete_texto>Não existe galerias cadastradas!</div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
      <?php echo $y["nomegaleria"]; ?></strong></td>
           </tr>
         </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="78%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="legenda"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td> <table width="100%" border="0" align="center">
        <tr>
          <td border="0"><link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
            <script type="text/javascript" src="js/prototype.js"></script>
            <script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
            <script type="text/javascript" src="js/lightbox.js"></script>
            <table width="100%" border="0" align="center">
              <tr>
                <td align="center" class="manchete_texto"><?php
                     $branca = $y["foto"];
					 $testeb = '';
					 if ($branca == $testeb)
					 {
					  					  ?>
                  <?php } else { ?>
                  <img src="administrador/ups/galerias/<?php echo $y["foto"]; ?>" />
                  <?php } ?></td>
                </tr>
              <tr>
                <td align="center" class="manchete_texto"><b><?php echo $y["nomegaleria"]; ?></b><br />
                  <br />
                  Data da Galeria: <?php echo $y["dataevento"]; ?></td>
                </tr>
              <tr>
                <td align="center" class="manchete_texto">Data de Publica&ccedil;&atilde;o: <?php echo $y["data"]; ?> --- ( <?php echo $y["hora"]; ?> Hs )</td>
                </tr>
              <tr>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left"><div align="left" class="manchete_texto"><?php echo $y["comentario"]; ?></div></td>
                </tr>
              <tr>
                <td align="left">&nbsp;</td>
                </tr>
              <tr>
                <td align="left"><div align="center">
                  <?php }  ?>
                  <?php
include "administrador/conexao.php";
// Pegar a p&aacute;gina atual por GET
$p = $_GET["p"];
// Verifica se a vari&aacute;vel t&aacute; declarada, sen&atilde;o deixa na primeira p&aacute;gina como padr&atilde;o
if(isset($p)) {
$p = $p;
} else {
$p = 1;
}
// Defina aqui a quantidade m&aacute;xima de registros por p&aacute;gina.
$qnt = 600000;
// O sistema calcula o in&iacute;cio da sele&ccedil;&atilde;o calculando: 
// (p&aacute;gina atual * quantidade por p&aacute;gina) - quantidade por p&aacute;gina
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos n&uacute;meros acima
$sql_select = "SELECT * FROM cw_fotos WHERE idgaleria='$id' LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

$colunas="6"; //quantidade de colunas
$cont="1"; //contador

print"<table width=500>";

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$foto = $array["foto"];
$fotomenor = $array["fotomenor"];
$idgaleria = $array["idgaleria"];
$comentario = $array["comentario"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center"><a href='administrador/ups/fotosgaleria/g/<?php echo $foto.""; ?>' rel='lightbox['roadtrip']' title='<?php echo $comentario.""; ?>'><img width=96 height=64 alt='VISUALIZAR IMAGEM' border='0' src='administrador/ups/fotosgaleria/p/<?php echo $fotomenor.""; ?>' /></a></td>
                      </tr>
                    </table>
                  <?php
$linhaco = $linha['id'];
?>
                  <?php
print"</td>";

//se o cont for igual o número de colunas ele fecha a linha da tabela
if($cont==$colunas){
print"</tr>";
$cont=0;
}
$cont=$cont+1; //acrescenta valor ao cont
}

//se o valor final de cont for diferente do numero de colunas ele fechará a tabela
if(!$cont==$colunas){
print"</tr></table>";
} else {
print"</table>";
}
?>
                  <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)


// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_fotos";
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

// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {

}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero



// Cria outro for(), desta vez para exibir 3 links ap&oacute;s a p&aacute;gina atual
for($i = $p+1; $i <= $p+$max_links; $i++) {
// Verifica se a p&aacute;gina atual &eacute; maior do que a &uacute;ltima p&aacute;gina. Se for, n&atilde;o faz nada.
if($i > $pags)
{
//faz nada
}
// Se tiver tudo Ok gera os links.
else
{

}
}
// Exibe o link "&uacute;ltima p&aacute;gina"

   }

?>
                  </div></td>
                </tr>
              <tr>
                <td align="left" width="14%"><br />
                  <a href="javascript:history.go(-1)"><img src="imagens/volta.png" border="0" /></a><br /></td>
                </tr>
            </table></td>
        </tr>
      </table></td>
                  </tr>
                </table></td>
                </tr>
          </table></td>
        </tr>
</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="4" /></td>
              </tr>
          </table></td>
    
  </tr>
</table>

<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table> 
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("baixo(1).php"); ?></td>
  </tr>
</table>

    
    
    </td>
    <td width="1" bgcolor="#CCCCCC"><img src="imagens/branco.gif" width="1" height="1" /></td>
  </tr>
</table>
</body>
</html>