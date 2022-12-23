<?
function busca_cotacao() {
	$resultado = @file_get_contents("http://www.cotacao.republicavirtual.com.br/web_cotacao.php?formato=query_string");
	parse_str($resultado, $retorno);
	return $retorno;
}

$cotacao = busca_cotacao();

?><MARQUEE direction="left" scrollamount="2" scrolldelay="10" onmouseover='this.stop()' onmouseout='this.start()'><font color="#FC8119">COTAÇÕES:</font> Dólar Comercial (COMPRA) : <font color="#317C1F"><? echo "R$ ".$cotacao['dolar_comercial_compra'].""; ?></font> - Dólar Paralelo (COMPRA) : <font color="#317C1F"><? echo "R$ ".$cotacao['dolar_paralelo_compra'].""; ?></font> - Euro -&gt; Dólar (COMPRA) : <font color="#317C1F"><? echo "R$ ".$cotacao['euro_dolar_compra'].""; ?></font> - Euro -&gt; Real (COMPRA) : <font color="#317C1F"><? echo "R$ ".$cotacao['euro_real_compra'].""; ?></font> -------- Dólar Comercial (VENDA) : <font color="#317C1F"><? echo "R$ ".$cotacao['dolar_comercial_venda'].""; ?></font> - Dólar Paralelo (VENDA) : <font color="#317C1F"><? echo "R$ ".$cotacao['dolar_paralelo_venda'].""; ?></font> - Euro -&gt; Dólar (VENDA) : <font color="#317C1F"><? echo "R$ ".$cotacao['euro_dolar_venda'].""; ?></font> - Euro -&gt; Real (VENDA) : <font color="#317C1F"><? echo "R$ ".$cotacao['euro_real_venda'].""; ?></font>
                                </MARQUEE>