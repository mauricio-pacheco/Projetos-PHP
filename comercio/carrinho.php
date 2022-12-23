<?
if(!session_is_registered(id_usuario)){
        session_start();
}
require ("libs/padrao.php");
include "formata_valor.php";
// Se o usuário não possuir um cookie válido no computador protege carrinho...
require("libs/classes/padrao.php");
$classe_seguranca = new seguranca;
$id_usuario = $classe_seguranca->verifica_id();
// Inicia processo(do carrinho) se estiver logado senaum pergunta se o cara é cadastrado
if ($id_usuario){
$path_local = "libs/padrao.php";
include "libs/db.php";

if($inserir){
	/**
	 * por André de Castro Zorzo
	 * em: 16/07/2003
	 * Aqui parece que ocorria um problema, quando mais de um usuário tentar colocar o
	 * produto no seu carrinho.. ele se perdia, pois não tinha o controle do id do usuário
	 * $sql_s = mysql_query("SELECT quantidade FROM carrinho WHERE id_produto = '$id' ");
	 */
	$sql_s = mysql_query("SELECT quantidade FROM carrinho WHERE id_produto = '$id' AND id_cliente = '$id_usuario'");
	while($rss = mysql_fetch_array($sql_s)){
		$existe = $rss[0];
	}
	if($existe){
    	$quantidade = $quantidade + $existe;

		/**
		 * por André de Castro Zorzo
		 *
		 * o código possui um bug, no caso de mais de um usuário ter o produto no carrinho
		 * e este seja excluido do carrinho, o comando UPDATE se extenderia a todos os carrinhos
		 * que possum este produto, visto que o UPDATE está sendo dado com condição
		 * apenas do ID do produto, sendo que deve ser também adicionado a condição o ID do
		 * usuário/sessão do usuário.
		 *
		 * mysql_query("UPDATE carrinho SET id_cliente = '$id_usuario', id_produto = '$id', quantidade = '$quantidade', descricao_produto = '$descricao', valor_produto = '$valor' WHERE id_produto = '$id'");
		**/

		mysql_query("UPDATE carrinho SET id_produto = '$id', quantidade = '$quantidade', descricao_produto = '$descricao', valor_produto = '$valor' WHERE id_produto = '$id' AND id_cliente = '$id_usuario' ");

	} else {
      	mysql_query("INSERT INTO carrinho VALUES ('$id_usuario','$id','$quantidade','$descricao','$valor')");
    }
	print "<script Language=\"JavaScript\">";
	print "window.opener.location.href = \"index.php?cat_pai=1&pagina=carrinho\";";
	print "window.close();";
	print "</script>";
}
?>
<html>
<head>
<title>Carrinho de Compras</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="libs/admin/estilo.css">
</head>

<body bgcolor="#FFFFFF">
<p align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
  <font size="2">OQU&Ecirc; H&Aacute; NO MEU CARRINHO ?</font><br>
  <img src="imagens/carrinho.gif" width="50" height="50"><br>
  </font></b></p>
<?
$sql_vsta = mysql_query("SELECT id_produto FROM carrinho WHERE id_cliente = '$id_usuario'");
while($rsvsta = mysql_fetch_array($sql_vsta)){
$existe_algo = $rsvsta[0];
}
if (!$existe_algo){
print "Seu carrinho está vazio..";
exit;
}
?>
<form method="post" action="index.php?cat_pai=1&amp;pagina=carrinho&amp;atualizar=sim">
  <table width="98%" border="0" cellspacing="1" cellpadding="0" bgcolor="<? print "$borda"; ?>">
    <tr bgcolor="<? print "$barra"; ?>" bordercolor="#000000">
      <td width="5%" height="2"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFFF"><b>Qtd.
        </b></font></td>
      <td width="5%" height="2"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFFF"><b>C&oacute;digo</b></font></td>
      <td width="55%" height="2">
        <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFFF"><b>Produto</b></font></div>
      </td>
      <td width="15%" height="2"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFFF"><b>Valor</b></font></td>
      <td width="20%" height="2"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFFF"><b>Sub
        total</b></font></td>
    </tr>
    <?
///1.1 Responsável por atualizar a cesta de compras ou remover produto da ceesta se a quantidade for 0
if ($limpar){
	mysql_query("DELETE FROM carrinho WHERE id_cliente = '$id_usuario'");
}

if($atualizar){
	if($por_codigo){
		mysql_query("DELETE FROM carrinho WHERE id_produto = '$por_codigo' AND id_cliente = '$id_usuario'");
	}
	$id_produto_conta = count($id_produto);
	$id_produto_conta = $id_produto_conta + 1;
    for($i = 0; $i < $id_produto_conta; $i++){
		if ($valor_produto[$i] == "0"){

			/**
			 * por André de Castro Zorzo
			 *
			 * o código possui um bug, no caso de mais de um usuário ter o produto no carrinho
			 * e este seja excluido do carrinho, o comando DELETE se extenderia a todos os carrinhos
			 * que possum este produto, visto que o DELETE está sendo dado com condição
			 * apenas do ID do produto, sendo que deve ser também adicionado a condição o ID do
			 * usuário/sessão do usuário.
			 *
			 * mysql_query("DELETE FROM carrinho WHERE id_produto = '$id_produto[$i]'");
			**/


        	mysql_query("DELETE FROM carrinho WHERE id_produto = '$id_produto[$i]' AND id_cliente = '$id_usuario'");
		} else {

			/**
			 * por André de Castro Zorzo
			 *
			 * o código possui um bug, no caso de mais de um usuário ter o produto no carrinho
			 * e este seja excluido do carrinho, o comando UPDATE se extenderia a todos os carrinhos
			 * que possum este produto, visto que o UPDATE está sendo dado com condição
			 * apenas do ID do produto, sendo que deve ser também adicionado a condição o ID do
			 * usuário/sessão do usuário.
			 *
			 * mysql_query("UPDATE carrinho SET quantidade = '$valor_produto[$i]' WHERE id_produto = '$id_produto[$i]'");
			**/

			mysql_query("UPDATE carrinho SET quantidade = '$valor_produto[$i]' WHERE id_produto = '$id_produto[$i]' AND id_cliente = '$id_usuario' ");
		}
	}
}
///Fim 1.1
$sql_v_p_c = mysql_query("SELECT c.id_cliente,c.id_produto,c.quantidade,c.descricao_produto,p.valor_produto, p.peso_produto FROM carrinho c, produto p WHERE c.id_cliente = $id_usuario AND p.id = c.id_produto ORDER BY c.descricao_produto");
while($rsvpc = mysql_fetch_array($sql_v_p_c)){
$semitotal = $rsvpc[4] * $rsvpc[2];
$totalcompra = $semitotal + $totalcompra;
$semitotalpeso = $rsvpc[5] * $rsvpc[2];
$totalpeso = $totalpeso + $semitotalpeso;
formata_valor($rsvpc[4]);
$j = $j + 1;
if ($corbg == "#FFFFFF"){
$corbg = "$sub_barra";
}
else {
$corbg = "#FFFFFF";
}
print "<tr bgcolor=\"$corbg\">\n";
print "   <td width=\"5%\" height=\"2\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><input class=base_caixas type=\"text\" name=\"valor_produto[$j]\" value=\"$rsvpc[2]\" size=2 maxlength=\"2\"><input type=hidden name=\"id_produto[$j]\" value=\"$rsvpc[1]\"></font></td>\n";
print "   <td width=\"5%\" height=\"2\"><div align=\"center\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">$rsvpc[1]</font></div></td>\n";
print "   <td width=\"60%\" height=\"2\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">$rsvpc[3]</font></td>\n";
print "   <td width=\"15%\" height=\"2\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">R$ $valor</font></td>\n";
formata_valor($semitotal);
print "   <td width=\"15%\" height=\"2\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">R$ $valor</font></td>";
print "  </tr>\n";
}
/// Faz cálculo do frete conforme dados do usuário
//
include "cepcusto.php";
$cepcusto = new cepcusto;

#poe o arquivo cepcusto.dat para o array dados
$data = $cepcusto->read_database("cepcusto.dat");

# Verifica se existe estado padrão
if($estado_usuario){
$estado = $estado_usuario;
}

$ffinal =  $cepcusto->valor($data,"$estado",$totalpeso);

// Lyma
if($tipo_frete == "motoboy" OR !$tipo_frete){
$selected3 = "selected";
$ffinal = $frete_motoboy;
}
// Fim Lyma

if($tipo_frete == "cobrar"){
$selected = "selected";
$ffinal2 = $totalcompra / 100;
$ffinal = $ffinal + $ffinal2;
$ffinal = explode(".",$ffinal);
$ffinal = $ffinal[0];
}
///
// Finaliza cálculo do frete
//////////////////////////////
$totalcompra = $totalcompra + $ffinal;
formata_valor($totalcompra);

if(!$selected AND !$selected3){   //o padrao eh motoboy
$selected2 = "selected";
}

?>
    <tr bgcolor="<? print "$barra"; ?>" bordercolor="#000000">
      <td width="5%" height="2"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="<? print "$barra"; ?>"><b>..
        </b></font></td>
      <td width="5%" height="2"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="<? print "$barra"; ?>"><b>.</b></font></td>
      <td width="55%" height="2">
        <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="<? print "$barra"; ?>">
          <input type="submit" name="Submit" value="::Recalcular::" class="fundo_azul_caixa">
          <input type="button" name="Submit2" value="::Fechar Pedido::" class="fundo_azul_caixa" onclick="javascript:voucomprar(this)">
          </font></div>
      </td>
      <td width="15%" height="2">
        <div align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="<? print "$barra"; ?>"><b><font color="#FFFFFF">Total:</font>
          . </b></font></div>
      </td>
      <td width="20%" height="2"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFFF"><b>R$<? print $valor; ?></b></font></td>
    </tr>
  </table>

  <table width="98%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="2">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="noexiste.gif" width="1" height="1"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="98%" border="0" cellspacing="1" cellpadding="0" bgcolor="<? print "$borda"; ?>">
    <tr bgcolor="<? print "$barra"; ?>">
      <td width="25%">
        <div align="center"><font color="#FFFFFF"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="index.php?cat_pai=1&amp;pagina=carrinho&amp;limpar=sim" class="fundo_azul_caixa_dois">Limpar
          o meu carrinho !</a></font></font></div>
      </td>
      <td width="50%" bgcolor="<? print "$barra"; ?>">
        <div align="center"><font color="#FFFFFF"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
          <input type="submit" name="Submit3" value="Excluir produto por c&oacute;digo:" class="fundo_azul_caixa_dois">
          <input type="text" name="por_codigo" class="base_caixas">
          </font></b></font></div>
      </td>
      <td width="25%">
        <div align="center"><font color="#FFFFFF"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><a href="index.php?cat_pai=1" class="fundo_azul_caixa_dois">Continuar
          as compras</a></font></font></div>
      </td>
    </tr>
  </table>
  <font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
  <font color="#000000"> <font color="#333333"> </font></font></font>
  <table width="98%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><font color="#000000"><font color="#333333"><br>
        <b> SELECIONE ABAIXO O TIPO DE FRETE QUE VOC&Ecirc; PREFERE:</b><br>
        <select name="tipo_frete" onchange="javascript:recarregacarrinho(this);">

          <option value="cobrar" <? print $selected; ?>>SEDEX &agrave; cobrar - Pagamento na
          hora que receber a mercadoria em casa.</option>

          <option value="convencional" <? print $selected2; ?>>SEDEX Convencional - Pagamento adiantado</option>

          <option value="motoboy" <? print $selected3; ?>>Entrega Via Motoboy - Somente para Salvador-BA</option>

        </select>

        [<b> FRETE</b></font></font></font><b><font color="#333333" size="1" face="Verdana, Arial, Helvetica, sans-serif">:</font></b><font color="#333333" size="1" face="Verdana, Arial, Helvetica, sans-serif">
        <font color="#FF3333">R$ <? $ffinal=explode("#",$ffinal);formata_valor("$ffinal[0]");print "$valor";?></font></font><font color="#333333">
        ] </font></td>
    </tr>
  </table>
  <br>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?
}
else {
if($vim_do_java){
include "cadastro.php";
exit;
}
print "<Script LANGUAGE=JavaScript>";
print "function abrejanela(link){";
print "window.open('carrinho.php?vim_do_java=ok','Janela', 'top=0,left=0,toolbar=no, location=no, status=no, scrollbar=no,resizable=yes,width=450, height=460')";
print "}";
print "abrejanela();";
print "</Script>";
        if(!$popup){
                include "principal.php";
                include 'rodape.php';
        }
}
?>
