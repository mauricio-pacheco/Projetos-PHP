<html>
<head>
<title>Adicionar produto ao carrinho de compras</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
$path_local = "libs/padrao.php";
include "libs/db.php";
$pega_dados_do_produto = mysql_query("SELECT * FROM produto WHERE id = '$id'");
while($res_pddp = mysql_fetch_array($pega_dados_do_produto)){
$cod_produto = $res_pddp[1];
$nome_produto = $res_pddp[2];
$descri_produto = $res_pddp[3];
$valor_produto = $res_pddp[4];
$valor_produto_form = $valor_produto;
$imagem_produto = $res_pddp[5];
}
/// Formata string Valor do Produto
include ("formata_valor.php");
formata_valor("$valor_produto");
$valor_produto = $valor;
if ($inserir == "sim"){

//// Verifica autenticidade de valor do produto
$valor = strlen($valor_produto_form);
if ($valor < "3"){
	$erro = "Você deve digitar um valor válido( inclua . e , no valor ).";
}
if ($valor > "3"){
$valor1 = stristr($valor_produto_form,",");
$valor1 = strlen($valor1);
	if($valor1 < "3"){
	$erro = "Você deve digitar um valor válido( inclua . e , no valor ).";
	}
		if ($valor > "6"){
			$valor2 = stristr($valor_produto_form,".");
			$valor2 = strlen($valor2);
				if ($valor2 < "7"){
				$erro = "Você deve digitar um valor válido( inclua . e , no valor ).";
				}	
		}
}
if ($erro){
print $erro;
exit;
}
//// Fim da verificação de autenticidade
///// Formata valor(string) para inclusão em formato integer
if ($valor2){
	$valor_formata = explode(".",$valor_produto_form);
	$valor_formata1 = explode(",",$valor_formata[1]);
	$valor_produto_form = "$valor_formata[0]$valor_formata1[0]$valor_formata1[1]";
} else {
	$valor_formata1 = explode(",",$valor_produto_form);
	$valor_produto_form = "$valor_formata1[0]$valor_formata1[1]";
}

//// Fim formata valor(string) para inclusão em formato integer


print " - $valor1";
//exit;
		$sql = ("UPDATE produto SET cod_produto = '$cod_produto_form', nome_produto = '$nome_produto_form', descri_produto = '$descri_produto_form', valor_produto = '$valor_produto_form' WHERE id = '$id'");
		$n_arquivo = "$id.jpg";
		$executa_sql = @mysql_query($sql);
        if (!$executa_sql){
                echo "Erro ao executar comando sql : $sql";
        }
        mysql_close($conecta);
		$upload = "tumbnail";
		include ("../ftp.php");
        $setor = 1;
print "<script Language=\"JavaScript\">";
print "window.opener.location.href = \"index.php?cat_pai=$pertence_categoria&eu_sou=$eu_sou\";";
print "window.close();";
print "</script>";
}
?>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif"> 
            Adicione o(a) <? print $nome_produto; ?> em seu carrinho...</font></b></font></td>
          <td width="16%"> 
            <div align="right"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">::</font></b></font></div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="<? print "$barra";?>"> 
    <td><font size="1" color="<? print "$barra";?>" face="Verdana, Arial, Helvetica, sans-serif">-</font></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td>
      <form enctype="multipart/form-data" method="post" action="carrinho.php?inserir=sim&popup=sim">
        <p><font size="1"> <font face="Verdana, Arial, Helvetica, sans-serif"> 
          <input type="hidden" name="id" value="<? print $id; ?>">
          <input type="hidden" name="valor" value="<? print $valor_produto_form;?>">
          <input type="hidden" name="descricao" value="<? print $nome_produto;?>">
          <br>
          </font></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="15%"><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">

<?
$contem_img = explode(".",$imagem_produto);
	if($contem_img[1] == "jpg"){
 	print "<img src=\"$base[url]/imagens/$imagem_produto\" border=\"0\" align=\"middle\">";
	} else {
 	print "<img src=\"$base[url]/icones/semfoto.jpg\" border=\"0\" align=\"middle\" width=\"50\" height=\"50\">";
	}
?>
</font></font></td>
            <td width="85%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b><? print $nome_produto; ?></b></font></td>
          </tr>
        </table>
        <p><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif"> 
          <b>Sobre o produto:</b><br>
          <? 
if (!$descri_produto){
print "Nenhuma informação adicional."; 
}
else {
print "<font face=#cccc00>$descri_produto</font>"; 
}

?><br>
          <br>
          <br>
          R$ <? print "<font color=#FF0000>$valor_produto</a>"; ?></font></font></p>
        <p><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif"><br>
          <br>
          <input type="submit" name="Submit" value="+ Adicionar ao carrinho">
          <input type="text" name="quantidade" maxlength="2" size="2" value="1">
          </font> </font> </p>
      </form>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr bgcolor="<? print "$barra";?>"> 
    <td height="2"><img src="../../no_existe.gif" width="1" height="1"></td>
  </tr>
</table>
</body>
</html>
