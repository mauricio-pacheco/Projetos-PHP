<?php include ('auth.php') ?>
<html>
<head>
<title>Adicionar Produto</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?
$path_local = "../padrao.php";
include "../db.php";
if ($inserir == "sim"){
$descri_produto = nl2br($descri_produto);
//// Verifica autenticidade de valor do produto
$valor_produto_form = $valor_produto;
$valor = strlen($valor_produto_form);
if ($valor < "3"){
        $erro = "Você deve digitar um valor válido( inclua . e , no valor no formato brasileiro ex: 9.999,99 ).";
}
if ($valor > "3"){
$valor1 = stristr($valor_produto_form,",");
$valor1 = strlen($valor1);
        if($valor1 < "3"){
        $erro = "Você deve digitar um valor válido( inclua . e , no valor) no formato brasileiro ex: 9.999,99.";
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


//exit;
                $select_imagem_produto = mysql_query("SELECT id FROM produto ORDER BY id DESC LIMIT 1");
                while($res = mysql_fetch_array($select_imagem_produto)){
                $imagem = $res[0] + 1;
                }
if ($arquivo_form == "none"){
                $sql = ("INSERT INTO produto (cod_produto, nome_produto, descri_produto, valor_produto, peso_produto) VALUES ('$cod_produto', '$nome_produto', '$descri_produto', '$valor_produto_form','$peso_produto')");
} else {
                $sql = ("INSERT INTO produto (cod_produto, nome_produto, descri_produto, valor_produto, foto_produto, peso_produto, icone_produto) VALUES ('$cod_produto', '$nome_produto', '$descri_produto', '$valor_produto_form', '$imagem.jpg', '$peso_produto', '$imagem.jpg')");
}

                $n_arquivo = "$imagem.jpg";
                mysql_close($conecta);
                include "../db.php";
                $select_imagem_produto2 = mysql_query("SELECT id FROM produto ORDER BY id DESC LIMIT 1");
                while($res2 = mysql_fetch_array($select_imagem_produto2)){
                $imagem2 = $res2[0] + 1;
                }
                mysql_query("INSERT INTO produto_categoria VALUES ('$imagem2','$pertence_categoria')");
                $upload = "tumbnail";
                include ("../ftp.php");
                $upload = "icone";
                include ("../ftp.php");
        $executa_sql = @mysql_query($sql);
        if (!$executa_sql){
                echo "Erro ao executar comando sql : $sql";
        }
                mysql_close($conecta);
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
          <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif"> <? print $base[nome]; ?>
            </font></b></font></td>
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
      <p><font color="#FFFFFF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><font color="#000000" size="1">Adicionar
        novo produto na categoria <? print $categoria_pai; ?></font></font> </p>
      <form enctype="multipart/form-data" method="post" action="ad_produtos.php?inserir=sim">
        <p><font size="1"> <font face="Verdana, Arial, Helvetica, sans-serif">
          <input type="hidden" name="pertence_categoria" value="<? print $cat_pai; ?>">
          <input type="hidden" name="eu_sou" value="<? print $categoria_pai; ?>">
          Nome do Produto:<br>
          <input type="text" name="nome_produto">
          <br>
          Descri&ccedil;&atilde;o do Produto:<br>
          <textarea name="descri_produto" rows="5" cols="50"></textarea>
          <br>
          Valor do produto:<br>
          R$
          <input type="text" name="valor_produto">
          <br>
          Peso do produto:<br>
          Gramas:
          <input type="text" name="peso_produto" size="5">
          </font></font></p>
        <p><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">Imagem
          do Produto:<br>
          <input type="file" name="arquivo_form" enctype="multipart/form-data">
          <br>
          &Iacute;cone:<br>
          </font><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">
          <input type="file" name="icone_form" enctype="multipart/form-data">
          </font></font><font face="Verdana, Arial, Helvetica, sans-serif"><br>
          </font></font><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">
          <input type="submit" name="Submit" value="Adicionar Produto">
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
