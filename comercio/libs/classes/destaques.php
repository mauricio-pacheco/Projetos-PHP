<?
class destaques{
	function imprime_destaque($id_destaque){
	global $rdestaque;
	 $sql_d = mysql_query("SELECT * FROM destaques WHERE id_destaque = '$id_destaque'");
		while($res_d = mysql_fetch_array($sql_d)){
		 $destaque = "$res_d[nome_setor]|$res_d[descricao]|$res_d[texto]|$res_d[foto]";
		}
	$rdestaque = explode("|",$destaque);
	return $rdestaque;	
	}
//
// Função que retorna destaque - produtos simples(sem tabela)
	function imprime_destaque_produtos($id_promo){
	global $ridp,$valor;
 	 include("formata_valor.php");
	 include("libs/padrao.php");
	 $seleciona_produtos = mysql_query("SELECT * FROM produto WHERE promo = $id_promo ORDER BY nome_produto");
	 $eu_sou2 = urlencode("$eu_sou");
	 $contador_res_sp = "0";
	 	while ($res_sp = mysql_fetch_array($seleciona_produtos)){
	 	$contem_img = explode(".",$res_sp[5]);
	 	formata_valor($res_sp[4]);
			if($contem_img[1] == "jpg"){
	 		$ripd .= "<a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp[0]');><br><img src=\"$base[url]/icones/$res_sp[5]\" border=\"0\" align=\"middle\" width=\"50\" height=\"50\"></a>R$ <font color=\"#FF0000\">$valor</font> <br> :: $res_sp[2] ::<br>";
			} else {
	 		$ripd .= "<a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp[0]');><br><img src=\"$base[url]/icones/semfoto.jpg\" border=\"0\" align=\"middle\" width=\"50\" height=\"50\"></a>R$ <font color=\"#FF0000\">$valor</font> <br> :: $res_sp[2] ::<br>";
			}
		}
	return $ripd;
	}
//
// Função que retorna destaque - produtos completo com tabela
	function imprime_destaque_produtos1($id_promo){
	global $ridp1,$valor;
	unset($ripd1);
 	 include("formata_valor.php");
	 include("libs/padrao.php");
	 $seleciona_produtos1 = mysql_query("SELECT * FROM produto WHERE promo = $id_promo ORDER BY nome_produto");
	 $contador_res_sp = "0";
	 $ripd1 .= "<table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"1\">";
	 	while ($res_sp1 = mysql_fetch_array($seleciona_produtos1)){
	 	$contem_img1 = explode(".",$res_sp1[5]);
	 	formata_valor($res_sp1[4]);
			if($contem_img1[1] == "jpg"){
				$ripd1 .= " <tr>\n ";
				$ripd1 .= "    <td width=\"1%\"><a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp1[0]');><br><img src=\"$base[url]/icones/$res_sp1[5]\" border=\"0\" align=\"middle\" width=\"50\" height=\"50\"></a></td>\n";
				$ripd1 .= "    <td width=\"99%\"><font color=\"#000000\" size=\"1\">R$</font> <font color=\"#FF0000\" size=\"1\">$valor</font> <br> <font color=\"#000000\" size=\"1\">$res_sp1[2]</font><br></td>";
				$ripd1 .= "  </tr>";
			} else {
				$ripd1 .= " <tr>\n ";
				$ripd1 .= "    <td width=\"1%\"><a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp1[0]');><br><img src=\"$base[url]/icones/semfoto.jpg\" border=\"0\" align=\"middle\" width=\"50\" height=\"50\"></a></td>\n";
				$ripd1 .= "    <td width=\"99%\"><font color=\"#000000\" size=\"1\">R$</font> <font color=\"#FF0000\" size=\"1\">$valor</font> <br> <font color=\"#000000\" size=\"1\">$res_sp1[2]</font><br></td>";
				$ripd1 .= "  </tr>";
			}
		}
	$ripd1 .= "</table>";
	return $ripd1;
	}
//
// Função que retorna destaque - produtos completo com tabela, icone e texto veja mais
	function imprime_destaque_produtos_mais($id_promo){
	global $ridp1,$valor;
	unset($ripd1);
 	 include("formata_valor.php");
	 include("libs/padrao.php");
	 $seleciona_produtos1 = mysql_query("SELECT * FROM produto WHERE promo = $id_promo ORDER BY nome_produto");
	 $contador_res_sp = "0";
	 $ripd1 .= "<table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"1\">";
	 	while ($res_sp1 = mysql_fetch_array($seleciona_produtos1)){
	 	$contem_img1 = explode(".",$res_sp1[5]);
	 	formata_valor($res_sp1[4]);
			if($contem_img1[1] == "jpg"){
				$ripd1 .= " <tr>\n ";
				$ripd1 .= "    <td width=\"1%\"><a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp1[0]');><br><img src=\"$base[url]/icones/$res_sp1[5]\" border=\"0\" align=\"middle\" width=\"50\" height=\"50\"></a></td>\n";
				$ripd1 .= "    <td width=\"99%\"><font color=\"#000000\" size=\"1\">R$</font> <font color=\"#FF0000\" size=\"1\">$valor</font> <br> <font color=\"#000000\" size=\"1\">$res_sp1[2]</font><br><a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp1[0]');><img src=\"$base[url]/imagens/mais.jpg\" border=\"0\" align=\"middle\"> <b>Veja mais</b></a></td>";
				$ripd1 .= "  </tr>";
			} else {
				$ripd1 .= " <tr>\n ";
				$ripd1 .= "    <td width=\"1%\"><a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp1[0]');><br><img src=\"$base[url]/icones/semfoto.jpg\" border=\"0\" align=\"middle\" width=\"50\" height=\"50\"></a></td>\n";
				$ripd1 .= "    <td width=\"99%\"><font color=\"#000000\" size=\"1\">R$</font> <font color=\"#FF0000\" size=\"1\">$valor</font> <br> <font color=\"#000000\" size=\"1\">$res_sp1[2]</font><br><a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp1[0]');><img src=\"$base[url]/imagens/mais.jpg\" border=\"0\" align=\"middle\" width=\"8\" height=\"8\"> <b>Veja mais</b></a></td>";
				$ripd1 .= "  </tr>";
			}
		}
	$ripd1 .= "</table>";
	return $ripd1;
	}
// Função que retorna destaque - produtos completo com tabela, icone e texto veja mais(imagem grande)
	function imprime_destaque_produtos_mais_1($id_promo){
	global $ridp1,$valor;
	unset($ripd1);
 	 include("formata_valor.php");
	 include("libs/padrao.php");
	 $seleciona_produtos1 = mysql_query("SELECT * FROM produto WHERE promo = $id_promo ORDER BY nome_produto");
	 $contador_res_sp = "0";
	 $ripd1 .= "<table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"1\">";
	 	while ($res_sp1 = mysql_fetch_array($seleciona_produtos1)){
	 	$contem_img1 = explode(".",$res_sp1[5]);
	 	formata_valor($res_sp1[4]);
			if($contem_img1[1] == "jpg"){
				$ripd1 .= " <tr>\n ";
				$ripd1 .= "    <td width=\"1%\"><a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp1[0]');><br><img src=\"$base[url]/icones/$res_sp1[5]\" border=\"0\" align=\"middle\" width=\"200\" height=\"150\"></a></td>\n";
				$ripd1 .= "    <td width=\"99%\"><font color=\"#000000\" size=\"1\">R$</font> <font color=\"#FF0000\" size=\"1\">$valor</font> <br> <font color=\"#000000\" size=\"1\">$res_sp1[2]</font><br><a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp1[0]');><img src=\"$base[url]/imagens/mais.jpg\" border=\"0\" align=\"middle\"> <b>Veja mais</b></a></td>";
				$ripd1 .= "  </tr>";
			} else {
				$ripd1 .= " <tr>\n ";
				$ripd1 .= "    <td width=\"1%\"><a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp1[0]');><br><img src=\"$base[url]/icones/semfoto.jpg\" border=\"0\" align=\"middle\" width=\"200\" height=\"150\"></a></td>\n";
				$ripd1 .= "    <td width=\"99%\"><font color=\"#000000\" size=\"1\">R$</font> <font color=\"#FF0000\" size=\"1\">$valor</font> <br> <font color=\"#000000\" size=\"1\">$res_sp1[2]</font><br><a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp1[0]');><img src=\"$base[url]/imagens/mais.jpg\" border=\"0\" align=\"middle\" width=\"8\" height=\"8\"> <b>Veja mais</b></a></td>";
				$ripd1 .= "  </tr>";
			}
		}
	$ripd1 .= "</table>";
	return $ripd1;
	}
// Função que retorna destaque - produtos completo com tabela, icone e texto veja mais ( lateral )
	function imprime_destaque_produtos_mais_lateral($id_promo){
	global $ridp1,$valor;
	unset($ripd1);
 	 include("formata_valor.php");
	 include("libs/padrao.php");
	 $seleciona_produtos1 = mysql_query("SELECT * FROM produto WHERE promo = $id_promo ORDER BY nome_produto");
	 $contador_res_sp = "0";
	 $ripd1 .= "<table width=\"100%\" border=\"0\" cellspacing=\"2\" cellpadding=\"1\"><tr>";

	 	while ($res_sp1 = mysql_fetch_array($seleciona_produtos1)){
	 	$contem_img1 = explode(".",$res_sp1[5]);
	 	formata_valor($res_sp1[4]);
			if($contem_img1[1] == "jpg"){
				$ripd1 .= " ";
				$ripd1 .= "    <td width=\"1%\"><a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp1[0]');><br><img src=\"$base[url]/icones/$res_sp1[5]\" border=\"0\" align=\"middle\" width=\"50\" height=\"50\"></a></td>\n";
				$ripd1 .= "    <td width=\"33%\"><font color=\"#000000\" size=\"1\">R$</font> <font color=\"#FF0000\" size=\"1\">$valor</font> <br> <font color=\"#000000\" size=\"1\">$res_sp1[2]</font><br><a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp1[0]');><img src=\"$base[url]/imagens/mais.jpg\" border=\"0\" align=\"middle\"> <b>Veja mais</b></a></td>";
				$ripd1 .= "  ";
			} else {
				$ripd1 .= " ";
				$ripd1 .= "    <td width=\"1%\"><a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp1[0]');><br><img src=\"$base[url]/icones/semfoto.jpg\" border=\"0\" align=\"middle\" width=\"50\" height=\"50\"></a></td>\n";
				$ripd1 .= "    <td width=\"33%\"><font color=\"#000000\" size=\"1\">R$</font> <font color=\"#FF0000\" size=\"1\">$valor</font> <br> <font color=\"#000000\" size=\"1\">$res_sp1[2]</font><br><a class=link_verde href=javascript:alteraproduto('vs_produto.php?cat_pai=$cat_pai&categoria_pai=$eu_sou2&id=$res_sp1[0]');><img src=\"$base[url]/imagens/mais.jpg\" border=\"0\" align=\"middle\" width=\"8\" height=\"8\"> <b>Veja mais</b></a></td>";
				$ripd1 .= "  ";
			}
		}
	$ripd1 .= "</tr>\n</table>";
	return $ripd1;
	}
}
?>