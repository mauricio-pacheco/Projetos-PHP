<?php include ('auth.php') ?>
<html>
<head>
<title>Altera&ccedil;&atilde;o de produto</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
$path_local = "../padrao.php";
include "../db.php";
$pega_dados_do_produto = mysql_query("SELECT * FROM produto WHERE id = '$id'");
while($res_pddp = mysql_fetch_array($pega_dados_do_produto)){
$cod_produto = $res_pddp[1];
$nome_produto = $res_pddp[2];
$descri_produto = $res_pddp[3];
$valor_produto = $res_pddp[4];
$imagem_produto = $res_pddp[5];
$peso_produto = $res_pddp[7];
}
/// Formata string Valor do Produto
include ("formata_valor.php");
formata_valor("$valor_produto");
$valor_produto = $valor;
if ($inserir == "sim"){
$descri_produto_form = nl2br($descri_produto_form);
//// Verifica autenticidade de valor do produto
$valor = strlen($valor_produto_form);
if ($valor < "3"){
        $erro = "Você deve digitar um valor válido( inclua . e , no valor )no formato brasileiro ex: 9.999,99.";
}
if ($valor > "3"){
$valor1 = stristr($valor_produto_form,",");
$valor1 = strlen($valor1);
        if($valor1 < "3"){
        $erro = "Você deve digitar um valor válido( inclua . e , no valor )no formato brasileiro ex: 9.999,99.";
        }
                if ($valor > "6"){
                        $valor2 = stristr($valor_produto_form,".");
                        $valor2 = strlen($valor2);
                                if ($valor2 < "7"){
                                $erro = "Você deve digitar um valor válido( inclua . e , no valor )no formato brasileiro ex: 9.999,99.";
                                }
                }
}
if ($erro){
echo '<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">';
print $erro;
echo '</body>';
echo '</html>';
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


// jl print " - $valor1";
//exit;
                $img = "$id.jpg";
                if ($desativar_imagens == "1"){
                $img = "";
                }
                $sql = ("UPDATE produto SET cod_produto = '$cod_produto_form', nome_produto = '$nome_produto_form', descri_produto = '$descri_produto_form', valor_produto = '$valor_produto_form', peso_produto = '$peso_produto_form', foto_produto = '$img', promo = '$ativar_destaque' WHERE id = '$id'");
                $n_arquivo = "$id.jpg";
                $executa_sql = @mysql_query($sql);
        if (!$executa_sql){
                echo "Erro ao executar comando sql : $sql";
        }
        mysql_close($conecta);
                $upload = "tumbnail";
                include ("../ftp.php");
                $upload = "icone";
                include ("../ftp.php");
        $setor = 1;
print "<script Language=\"JavaScript\">";
print "window.opener.location.href = \"categorias.php?cat_pai=$pertence_categoria&eu_sou=$eu_sou\";";
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
            </font><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif"><? print $base[nome]; ?></font></b></font></b></font></td>
          <td width="16%">
            <div align="right"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">Administrador</font></b></font></div>
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
      <p><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><font color="#000000" size="1">Alterando
        um produto:</font></font> </p>
      <form enctype="multipart/form-data" method="post" action="al_produtos.php?inserir=sim">
        <p><font size="1"> <font face="Verdana, Arial, Helvetica, sans-serif">
          <input type="hidden" name="id" value="<? print $id; ?>">
          <input type="hidden" name="pertence_categoria" value="<? print $cat_pai;?>">
          <input type="hidden" name="eu_sou" value="<? print $categoria_pai;?>">
          Nome do Produto:<br>
          <input type="text" name="nome_produto_form" value="<? print $nome_produto; ?>" size="50">
          <br>
          Descri&ccedil;&atilde;o do Produto:<br>
          <textarea name="descri_produto_form" rows="5" cols="50"><? print $descri_produto; ?></textarea>
          <br>
          Valor do produto:<br>
          R$
          <input type="text" name="valor_produto_form" value="<? print $valor_produto; ?>">
          <br>
          Peso do produto<br>
          Gramas:
          <input type="text" name="peso_produto_form" value="<? print $peso_produto; ?>" size="5">
          </font></font></p>
        <p><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">Imagem
          do Produto:<br>
           <?
           $contem_img = explode(".",$imagem_produto);
	          if($contem_img[1] == "jpg"){
 	             print "<img src=\"$base[url]/imagens/$imagem_produto\" border=\"0\" align=\"middle\">";
            } else {
 	             print "<img src=\"$base[url]/icones/semfoto.jpg\" border=\"0\" align=\"middle\" width=\"50\" height=\"50\">";
            }
            ?>
          <br>
          <input type="file" name="arquivo_form" enctype="multipart/form-data">
          <br>
          &Iacute;cone do Produto:<br>
          </font><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">
          <?
           $contem_img = explode(".",$imagem_produto);
	          if($contem_img[1] == "jpg"){
 	             print "<img src=\"$base[url]/icones/$imagem_produto\" border=\"0\" align=\"middle\">";
            } else {
 	             print "<img src=\"$base[url]/icones/semfoto.jpg\" border=\"0\" align=\"middle\" width=\"50\" height=\"50\">";
            }
            ?>
          <br>
          <input type="file" name="icone_form" enctype="multipart/form-data">
          <br>

          </font></font><font face="Verdana, Arial, Helvetica, sans-serif"> <br>
          <input type="checkbox" name="desativar_imagens" value="1">
          Desativar Imagens ?<br>
          </font><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">
          <b><br>
          DESTAQUE</b><br>
          <input type="radio" name="ativar_destaque" value="0">
          Desativar </font></font><font face="Verdana, Arial, Helvetica, sans-serif">
          </font><font size="1"><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">
          <input type="radio" name="ativar_destaque" value="1">
          </font></font></font><font face="Verdana, Arial, Helvetica, sans-serif">
          Esquerda</font><font size="1"><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">
          <input type="radio" name="ativar_destaque" value="2">
          Centro </font></font></font><font face="Verdana, Arial, Helvetica, sans-serif"><br>
          <input type="submit" name="Submit" value="Alterar Produto">
          </font> </font> </p>
      </form>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr bgcolor="<? print "$barra";?>">
    <td height="2"><img src="../../no_existe.gif" width="1" height="1"></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="400">
  <tr>
    <td width="80%" height="80%" valign="top">&nbsp;</td>
  </tr>
</table>
</body>
</html>
