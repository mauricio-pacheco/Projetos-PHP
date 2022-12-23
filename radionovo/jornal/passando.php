<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="StyleSheet" HREF="../themes/Helius/style/style2.css" TYPE="text/css">
<title>Audios Luz e Alegria</title>
<style type="text/css">
<!--
.style1 {font-size: 10px}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style3 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
</head>

<body>
<tr><td><MARQUEE behavior="scroll" align="center" direction="up" height="300" scrollamount="1" scrolldelay="10" onmouseover='this.stop()' onmouseout='this.start()'>
<div align="center"><?php
include "conexao.php";
// Pegar a p&aacute;gina atual por GET
$p = $_GET["p"];
// Verifica se a vari&aacute;vel t&aacute; declarada, sen&atilde;o deixa na primeira p&aacute;gina como padr&atilde;o
if(isset($p)) {
$p = $p;
} else {
$p = 1;
}
// Defina aqui a quantidade m&aacute;xima de registros por p&aacute;gina.
$qnt = 10;
// O sistema calcula o in&iacute;cio da sele&ccedil;&atilde;o calculando: 
// (p&aacute;gina atual * quantidade por p&aacute;gina) - quantidade por p&aacute;gina
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos n&uacute;meros acima
$sql_select = "SELECT * FROM audios ORDER BY id DESC LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$titulo = $array["titulo"];
$tamanho = $array["tamanho"];
$arquivo = $array["arquivo"];
$data = $array["data"];
$hora = $array["hora"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?><tr>
          <td width="86%">&nbsp;</td>
          <td width="5%">&nbsp;</td>
        </tr>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="2%"><a href="../audioenv/<?php echo $arquivo.""; ?>" target="_blank"><img src="fone.gif" border="0" /></a></td>
          <td width="98%">&nbsp;
            <div align="left"><a href="../audioenv/<?php echo $arquivo.""; ?>" target="_blank"><?php echo $titulo.""; ?></a> - Tempo: <?php echo $tamanho.""; ?></div></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td><div align="left">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="1%"><img src="cal.gif"/></td>
            <td width="99%"><font color="#0B7044">&nbsp;<?php echo $data.""; ?> - <?php echo $hora.""; ?></font></td>
          </tr>
        </table>
      </div></td>
    </tr>
  </table>
      <?




}

// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM audios";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 3;
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
</div>
    </marquee>
</body>
</html>
