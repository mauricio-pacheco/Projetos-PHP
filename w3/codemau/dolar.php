<style type="text/css">
<!--
.style3 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
<?
function busca_cotacao() {
	$resultado = @file_get_contents('http://www.cotacao.republicavirtual.com.br/web_cotacao.php?formato=query_string');
	parse_str($resultado, $retorno);
	return $retorno;
}

$cotacao = busca_cotacao();

?>

<table width="174" border="0">
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td width="7%"><img src="grana.jpg" width="20" height="18" /></td>
        <td width="93%"><span class="style3">COMPRA</span></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="88%"><span class="style3">Dólar Comercial</span></td>
    <td width="12%"><? echo "R$ ".$cotacao['dolar_comercial_compra'].""; ?></td>
  </tr>
  <tr>
    <td><span class="style3">Dólar Paralelo</span></td>
    <td><? echo "R$ ".$cotacao['dolar_paralelo_compra'].""; ?></td>
  </tr>
  <tr>
    <td><span class="style3">Euro -&gt; Dólar</span></td>
    <td><? echo "R$ ".$cotacao['euro_dolar_compra'].""; ?></td>
  </tr>
  <tr>
    <td><span class="style3">Euro -&gt; Real</span></td>
    <td><? echo "R$ ".$cotacao['euro_real_compra'].""; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td><img src="grana.jpg" width="20" height="18" /></td>
        <td><span class="style3">VENDA</span></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style3">Dólar Comercial</span></td>
    <td><? echo "R$ ".$cotacao['dolar_comercial_venda'].""; ?></td>
  </tr>
  <tr>
    <td><span class="style3">Dólar Paralelo</span></td>
    <td><? echo "R$ ".$cotacao['dolar_paralelo_venda'].""; ?></td>
  </tr>
  <tr>
    <td><span class="style3">Euro -&gt; Dólar</span></td>
    <td><? echo "R$ ".$cotacao['euro_dolar_venda'].""; ?></td>
  </tr>
  <tr>
    <td><span class="style3">Euro -&gt; Real</span></td>
    <td><? echo "R$ ".$cotacao['euro_real_venda'].""; ?></td>
  </tr>
</table>
