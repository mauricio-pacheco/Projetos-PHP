<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

    
    
<table width="99%" background="ff.jpg" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
        <td width="29%" valign="top"><?php include("edicoes(1).php"); ?></td>
        <td width="71%" valign="top"><?php include("notgeral(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="10" /></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>  
  
  

<table width="100%" align="center" background="btabela.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="280" valign="top">
     <?php include("esquerdo(1).php"); ?> </td>
    <td width="460" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>
         <table width="100%" border="0" height="30" cellspacing="0" cellpadding="0">
           <tr>
             <td align="center" bgcolor="#E71C24"><img src="imagens/ultima.png" /></td>
           </tr>
         </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table>
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
$qnt = 6;
// O sistema calcula o in&iacute;cio da sele&ccedil;&atilde;o calculando: 
// (p&aacute;gina atual * quantidade por p&aacute;gina) - quantidade por p&aacute;gina
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos n&uacute;meros acima
$sql_select = "SELECT * FROM cw_noticias WHERE iddep!='0' AND iddep!='18' ORDER BY id DESC LIMIT 1";
// Executa o Query
$sql_query = mysql_query($sql_select);

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$titulo = $array["titulo"];
$data = $array["data"];
$hora = $array["hora"];
$texto = $array["texto"];
$legenda = $array["legenda"];
$foto = $array["foto"];
$contador = $array["contador"];
$iddep = $array["iddep"];



// Exibe o nome que est&aacute; no BD e pula uma linha


?>
        <table width="446" border="0"  align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="51%" valign="top"><?php if ($foto=='') { ?><a 
  title="<?php echo $titulo.""; ?>" 
  href="vernoticia.php?id=<?php echo $id.""; ?>"><img 
  height="165" alt="<?php echo $titulo.""; ?>" 
  src="f1.jpg" width="220" border="0" /></IMG> <?php } else { ?>
              <a 
  title="<?php echo $titulo.""; ?>" 
  href="vernoticia.php?id=<?php echo $id.""; ?>"><img 
  height="165" alt="<?php echo $titulo.""; ?>" 
  src="administrador/ups/capasnoticia/<?php echo $foto.""; ?>" width="220" border="0" /></IMG></a>
              <?php } ?></td>
            <td width="49%" valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td class="fontet1"><a 
  title="<?php echo $titulo.""; ?>" 
  href="vernoticia.php?id=<?php echo $id.""; ?>" class="fontet1"><b><?php echo $titulo.""; ?></b></a></td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                </tr>
              </table>
              
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="legenda"><div align="justify"><a 
  title="<?php echo $titulo.""; ?>" 
  href="vernoticia.php?id=<?php echo $id.""; ?>" class="fonte"><?php echo $legenda.""; ?></a></div></td>
                </tr>
              </table>
              
              
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                </tr>
              </table>
              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="fonte"><?php echo $data.""; ?> - <?php echo $hora.""; ?> <i class="fontemm">( <?php echo $contador.""; ?> Visualizações )</i></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                </tr>
              </table>
             </td>
          </tr>
        </table>
         <?php




}

// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br />";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_noticias WHERE iddep='$iddep'";
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
        
        </td>
      </tr>
    </table>
     <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table>
         <table width="98%" align="center" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td background="imagens/pontilhada.png"><img src="imagens/branco.gif" width="2" height="10" /></td>
           </tr>
         </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table>
      
        
      <table width="96%" border="0" align="center" background="imagens/novas2.png" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top">
              <?php  
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 4;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_noticias WHERE iddep!='0' AND iddep!='18' ORDER BY id DESC LIMIT 4 OFFSET 1";

$sql_query = mysql_query($sql_select);

$colunas="2"; //quantidade de colunas
$cont="1"; //contador

print"<table width=450>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$titulo = $array["titulo"];
$data = $array["data"];
$hora = $array["hora"];
$legenda = $array["legenda"];
$foto = $array["foto"];
$contador = $array["contador"];

// Exibe o nome que est&aacute; no BD e pula uma linha

  ?>
          <table width="208" height="260" border="0" align="left" cellpadding="0" cellspacing="0">
            <tr>
              <td align="left" valign="top"><?php if ($foto=='') {?><a 
  title="<?php echo $titulo.""; ?>" 
  href="vernoticia.php?id=<?php echo $id.""; ?>"><img 
  height="100" alt="<?php echo $titulo.""; ?>" 
  src="f2.jpg" width="208" border="0" /></IMG></a> <?php } else { ?>
                <a 
  title="<?php echo $titulo.""; ?>" 
  href="vernoticia.php?id=<?php echo $id.""; ?>"><img 
  height="100" alt="<?php echo $titulo.""; ?>" 
  src="administrador/ups/capasnoticia/<?php echo $foto.""; ?>" width="208" border="0" /></IMG></a>
                <?php } ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                </table>
                <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="fontet2"><div align="justify"><a 
  title="<?php echo $titulo.""; ?>" 
  href="vernoticia.php?id=<?php echo $id.""; ?>" class="fontet2"><b><?php echo $titulo.""; ?></b></a></div></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="legenda"><div align="justify"><a 
  title="<?php echo $titulo.""; ?>" 
  href="vernoticia.php?id=<?php echo $id.""; ?>" class="fonte"><?php echo $legenda.""; ?></a></div></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                  </tr>
                </table>
                <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="fonte"><?php echo $data.""; ?> - <?php echo $hora.""; ?> <i class="fontemm">( <?php echo $contador.""; ?> Visualizações )</i></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="24" /></td>
                  </tr>
                </table></td>
            </tr>
          </table>
           <?php
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
print"</tr></table>";
} else {
print"</table>";
}
?>
                    <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)


// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_noticias";
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



?>
          </td>
        </tr>
      </table>
      
               
      
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                      </tr>
          </table>
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table>
         <table width="98%" align="center" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td background="imagens/pontilhada.png"><img src="imagens/branco.gif" width="2" height="10" /></td>
           </tr>
         </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table>
            
             <table width="100%" background="imagens/novas.png" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td><?php  
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 12;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_noticias WHERE iddep!='0' AND iddep!='18' ORDER BY id DESC LIMIT 12 OFFSET 5";

$sql_query = mysql_query($sql_select);

$colunas="3"; //quantidade de colunas
$cont="1"; //contador

print"<table width=460>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$titulo = $array["titulo"];
$data = $array["data"];
$hora = $array["hora"];
$legenda = $array["legenda"];
$foto = $array["foto"];
$contador = $array["contador"];

// Exibe o nome que est&aacute; no BD e pula uma linha

  ?>
                   <table width="141" height="102" border="0" align="center" cellpadding="0" cellspacing="0">
                     <tr>
                       <td valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                         <tr>
                           <td class="fontet2"><a 
  title="<?php echo $titulo.""; ?>" 
  href="vernoticia.php?id=<?php echo $id.""; ?>" class="fontet2"><b><?php echo $titulo.""; ?></b></a></td>
                         </tr>
                       </table>
                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                             <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                           </tr>
                         </table>
                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                             <td class="legenda"><a 
  title="<?php echo $titulo.""; ?>" 
  href="vernoticia.php?id=<?php echo $id.""; ?>" class="fonte"><?php echo $legenda.""; ?></a></td>
                           </tr>
                         </table>
                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                             <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                           </tr>
                         </table>
                         <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                           <tr>
                             <td class="fonte"><?php echo $data.""; ?> - <?php echo $hora.""; ?><br />
                               <i class="fontemm">( <?php echo $contador.""; ?> Visualizações )</i></td>
                           </tr>
                         </table>
                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                           <tr>
                             <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                           </tr>
                         </table></td>
                     </tr>
                   </table>
                   <?php
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
print"</tr></table>";
} else {
print"</table>";
}
?>
                 <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)


// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_noticias";
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



?></td>
               </tr>
             </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="10" /></td>
              </tr>
            </table>
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table>
         <table width="98%" align="center" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td background="imagens/pontilhada.png"><img src="imagens/branco.gif" width="2" height="10" /></td>
           </tr>
         </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table>
         
                 
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td align="center"><a href="cadastro.php"><img src="imagens/ass.png" border="0" /></a></td>
           </tr>
         </table> 
         
         
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table>
         
            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                               <td width="100%" align="center"><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='lateral' AND status='0' ORDER BY rand()");

while($y = mysql_fetch_array($sql))
   {
	  $tipo = $y["tipo"]; 
	  
   ?>
                  <?php
						  if ($tipo=='imagem') {
						  						  ?>
                  <a href="<?php echo $y["link"]; ?>" target="_blank"><img alt="<?php echo $y["descricao"]; ?>" title="<?php echo $y["descricao"]; ?>" border="0" src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" /></a>
                  <?php
						  } else {
						  ?>
                  <object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php echo $y["f1"]; ?>" height="<?php echo $y["f2"]; ?>">
                    <param name="movie" value="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" />
                    <param name="quality" value="high" />
                    <param name="wmode" value="opaque" />
                    <param name="swfversion" value="6.0.65.0" />
                    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don&rsquo;t want users to see the prompt. -->
                    <param name="expressinstall" value="administrador/scripts/expressInstall.swf" />
                    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                    <!--[if !IE]>-->
                    <object type="application/x-shockwave-flash" data="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" width="<?php echo $y["f1"]; ?>" height="<?php echo $y["f2"]; ?>">
                      <!--<![endif]-->
                      <param name="quality" value="high" />
                      <param name="wmode" value="opaque" />
                      <param name="swfversion" value="6.0.65.0" />
                      <param name="expressinstall" value="administrador/scripts/expressInstall.swf" />
                      <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                      <div>
                        <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                      </div>
                      <!--[if !IE]>-->
                    </object>
                    <!--<![endif]-->
                  </object>
                  <script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
                  </script>
                <?php } } ?></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="10" /></td>
              </tr>
            </table></td>
    <td width="240" valign="top"><table width="100%" height="30" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td bgcolor="#E71C24" class="fontemaior">&nbsp;&nbsp;<strong>Galeria de Fotos</strong></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="100%" align="center" 
                    border="0" class="fonte">
            <tbody>
              <tr>
                <td width="100%"><?php
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

$colunas="1"; //quantidade de colunas
$cont="1"; //contador

print"<table width=230>";


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



?>
                  <table width="100%" border="0">
                    <tr>
                      <td align="center"><a 
                        href="vergaleria.php?id=<?php echo $id.""; ?>"><img 
                        alt="<?php echo $nomegaleria.""; ?>" 
                        src="administrador/ups/galerias/<?php echo $foto.""; ?>" 
                        border="0" width="144" height="96" /></a></td>
                    </tr>
                    <tr>
                      <td align="center" class="fontegaleria"><a class="fontegaleria" 
                        href="vergaleria.php?id=<?php echo $id.""; ?>"><b><?php echo $nomegaleria.""; ?></b></a></td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" align="center">
                        <tr>
                          <td align="center" class="fontedatagaleria">Data: <?php echo $dataevento.""; ?></td>
                        </tr>
                      </table>
                        <table width="40%" border="0" align="center">
                          <tr>
                            <td width="7%"><img src="imagens/cameraicone.gif" width="28" height="22" /></td>
                            <td width="93%">Fotos:
                              <?php

$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_fotos WHERE idgaleria='$id' AND foto <> '1'");
$contar = mysql_num_rows($sql); 
$total = mysql_result($sql, 0, 'Total');

?>
                              <?php
  echo ''. $total;
 ?></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="imagens/branco.gif" width="2" height="2" /></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td bgcolor="#A2A2A2"><img src="imagens/branco.gif" width="2" height="1" /></td>
                          </tr>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="imagens/branco.gif" width="2" height="2" /></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table>
                  <?php
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



?></td>
              </tr>
            </tbody>
          </table></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;</td>
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