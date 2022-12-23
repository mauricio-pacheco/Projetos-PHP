<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow" />
<?php include("meta.php"); ?>
<title>Jornal Frederiquense</title>
<link href="imagens/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="classes/import.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="geral"> 
<div class="topo"><?php include("cima.php"); ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr><td width="83%"><SCRIPT src="flash/carrega.js"></SCRIPT>
              <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','831','180'); 
    </SCRIPT></td><td width="17%" valign="bottom" align="right"><!-- Inicio Banner Tempo Agora - http://www.tempoagora.com.br -->
<iframe src="http://tempoagora.uol.com.br/selos/custom/selo_3dias.php?cid=FredericoWestphalen-RS,&height=155&cor=3aa564" name="tempoagora_custom_3dias" width="149" marginwidth="0" height="155" marginheight="0" scrolling="No" frameborder="0" id="tempoagora_custom_3dias"></iframe>
<!--Fim Banner Tempo Agora - http://www.tempoagora.com.br --></td>
      </tr>
    </table>
</div><hr class="dn">
<div class="corpo">
<?php include("menu.php"); ?>
            
<div class="coluna_direita">
<div class="caixa_conteudo" id=texto>
<div class="item_de_conteudo">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="82%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/barraclic.png" /></td>
        </tr>
        <tr>
          <td><table bgcolor="#f9f9f9" width="539" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 15;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM gestao_galeria ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="3"; //quantidade de colunas
$cont="1"; //contador

print"<table width=546>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$data = $array["data"];
$hora = $array["hora"];
$nomegaleria = $array["nomegaleria"];
$foto = $array["foto"];
$comentario = $array["comentario"];
$dataevento = $array["dataevento"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
                <table width="100%" border="0">
                  <tr>
                    <td align="center" class="pontilhada"><a href="vergaleria.php?id=<?php echo $id.""; ?>"><img title="<?php echo $nomegaleria.""; ?>" alt="<?php echo $nomegaleria.""; ?>" src="administrador/galerias/<?php echo $foto.""; ?>" border="0" width="140" height="105"  /></a></td>
                  </tr>
                  <tr>
                    <td align="center"><b><a href="vergaleria.php?id=<?php echo $id.""; ?>"><?php echo $nomegaleria.""; ?></a></b>
                      <table width="100%" border="0">
                        <tr>
                          <td class="manchete_texto" align="center">Data de Publicação:<br />
                            <?php echo $data.""; ?> | ( <?php echo $hora.""; ?> )</td>
                        </tr>
                      </table></td>
                  </tr>
                  <tr>
                    <td><table width="60%" border="0" align="center">
                      <tr>
                        <td width="13%"><img src="imagens/camera.png" /></td>
                        <td width="87%" class="fontebaixo2"><?php

$sql = mysql_query("SELECT COUNT(*) AS Total FROM gestao_fotos WHERE idgaleria='$id' AND foto <> '1'");
$contar = mysql_num_rows($sql); 
$total = mysql_result($sql, 0, 'Total');

?>
                          <?php
  echo ''. $total;
 ?>
                          Fotos</td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
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
                <table width="98%" border="0" align="center">
                  <tr>
                    <td><?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br>";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM gestao_galeria ORDER BY id DESC";
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
echo "<a href='galerias.php?p=1&id=$id' target='_self' class=manchete_texto4>PRIMEIRA PÁGINA</a> <font color='#000000' size='1'>-</font> ";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "<a href='galerias.php?p=".$i."&id=$id' target='_self' class=manchete_texto4>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero

echo "<font class=manchete_texto9><b>";
echo $p." ";
echo "</b></font>";

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
echo "<a href='galerias.php?p=".$i."&id=$id' target='_self' class=manchete_texto4>".$i."</a> ";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo " <font color='#000000' size='1'>-</font> <a href='galerias.php?p=".$pags."&id=$id' target='_self' class=manchete_texto4>ÚLTIMA PÁGINA</a> ";


?></td>
                  </tr>
                </table></td>
            </tr>
           </table></td>
        </tr>
        <tr>
          <td><img src="imagens/barrabaixo.png" width="539" height="12" /></td>
        </tr>
      </table></td>
      <td width="18%" valign="top"><?php include("direito.php"); ?></td>
    </tr>
  </table>
</div>
</div>
</div>    
<br clear="all" />
<div class="corpo_rodape"></div>
</div>
<hr class="dn">
<div class="rodape">
<p> &copy;
<?php   
setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');   
echo strftime("%Y");   
// Uma saída esperada é: terça-feira 29 de janeiro de 2008   
?>
&nbsp;<strong>Jornal Frederiquense</strong>. Todos os direitos reservados.</span></p>
<ul>       
<li>
<a href="http://www.casadaweb.net" class="topo" target=_blank>Casa da Web</a>
</li>
<li>
</li>
</ul>
</div>
</div>
</body>
</html>