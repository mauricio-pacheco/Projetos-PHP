<?
/// Basicamente o script é gerenciado por um switch na variável acao
/// Se o valor da variável for nulo ele define a variável $corpo_enquete como 
/// sendo a página principal, ou seja, ele mostra a enquete em si.
/// -------------------------------------------------------------------------
include ("libs/padrao.php");
$host = $dados['host'];
$usuario_bancodados = $dados['usuario'];
$senha_bancodados = $dados['senha'];
$bancodados = $dados['banco'];
///
///  A partir de agora não é mais necessário mexer no script.
///  Caso você queira alterar o layout de saída do mesmo por favor 
///  procure pelas seções indicadas pela variável $corpo_enquete
///
///  Você ainda têm abaixo as opções de Fontes e Cores dos textos ...
///  
$fonte_padrao = "Verdana, Arial, Helvetica";
$tamanho_fonte_padrao = "1";
$cor_fonte_padrao = "#000000";
///
///  Daqui para diante só se vc souber mesmo como funciona o PHP ok.
///  Buenas amigo :D>..
///
function usarbd(){
global $conectar,$host,$usuario_bancodados,$senha_bancodados,$bancodados;
$conectar = mysql_connect("$host","$usuario_bancodados","$senha_bancodados");
mysql_select_db("$bancodados");
}
usarbd();
unset ($sel_enquete);

if ($id_enquete){
$sel_enquete = mysql_query("SELECT id, descricao, qtdcampos, campos FROM enquete WHERE id=$id_enquete");
}
else {
$sel_enquete = mysql_query("SELECT id, descricao, qtdcampos, campos FROM enquete WHERE ativa = '1' ORDER BY id DESC LIMIT 0,1");
}

	while ($resp_sel_e = mysql_fetch_array($sel_enquete)){
		$id_enquete		= $resp_sel_e[0];
		$descricao_enq	= $resp_sel_e[1];
		$qtdcampos_enq	= $resp_sel_e[2];
		$campos_enq		= $resp_sel_e[3];
	}
mysql_close($conectar);
/// 1.0 DEFINE A VARIÁVEL $corpo_enquete
/// ... Neste caso como o switch está com valor nulo
/// irá definir a página inicial da enquete
/// $corpo_enquete .= "<p><font color=\"$cor_fonte_padrao\" size=\"$tamanho_fonte_padrao\" face=\"$fonte_padrao\">$descricao_enq</font></p>";
	if(strstr("$REQUEST_URI","?"))
	{
		$corpo_enquete .= "<form action=\"$REQUEST_URI&acao=votar\" method=\"post\">";
	} else {
		$corpo_enquete .= "<form action=\"?acao=votar\" method=\"post\">";
	}
$corpo_enquete .= "<input type=\"hidden\" name=\"qtdcampos_enq\" value=\"$qtdcampos_enq\">";
$corpo_enquete .= "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
// 
//  Faz loop em array $campos formado pela variável campos_enq vinda do banco de dados e 
//  tratada com a função explode dividida pela pipe line |
$campos_enq = explode("|", $campos_enq);
	for ($y = 0; $y < $qtdcampos_enq; $y++)
	{
		/// Continuação da definição da var $corpo_enquete
		$corpo_enquete .= "<tr>\n<td width=\"7%\">\n";
		$corpo_enquete .= "<input type=\"radio\" name=\"opcao\" value=\"$y\">\n</td>\n";
		$corpo_enquete .= "<td width=\"93\"><font face=\"$fonte_padrao\" size=\"$tamanho_fonte_padrao\" color=\"$cor_fonte_padrao\">$campos_enq[$y]</font></td>";
		$corpo_enquete .= "</tr>";
	}
$corpo_enquete .= "</table>\n<input type=\"submit\" name=\"Submit\" value=\"Votar\">\n</form>";
	switch ($acao)
	{
	case "votar":
		usarbd();
		$sel_campo_vc = mysql_query("SELECT campos,valorcampos FROM enquete WHERE id=$id_enquete");
		while ($resp_sel_cvc = mysql_fetch_array($sel_campo_vc))
		{
			$campos	= $resp_sel_cvc[0];
			$valorcampos= $resp_sel_cvc[1];
		}
		$campos = explode("|",$campos);
		$valorcampos = explode("|",$valorcampos);
		//
		// Adiciona + 1 se o campo foi escolhido
		//
		for ($y = 0; $y < $qtdcampos_enq; $y++)
		{
			if ($opcao == "$y")
			{
				$valorcampos[$y] = $valorcampos[$y] + 1;
			}
		}
		/// Define a procentagem de cada valor
		//Soma tudo
		for ($y = 0; $y < $qtdcampos_enq; $y++)
		{
			$total = $valorcampos[$y] + $total; 
		}
		//Define a porcentagem para cada vetor e
		//cria a saída da variável $resultados_enquete
		$resultados_enquete .= "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">";
			for ($y = 0; $y < $qtdcampos_enq; $y++)
			{
				$rcampos = $valorcampos[$y] * 100;
				$restor[$y] = $rcampos / $total;
				$restor[$y] = (int) $restor[$y];
				$resultados_enquete .= "<tr>\n";
				$resultados_enquete .= "<td width=\"100\"><font face=\"$fonte_padrao\" size=\"$tamanho_fonte_padrao\" color=\"#000000\">$campos[$y]:<br><img src=imagens/barra.jpg width=$restor[$y] height=10>$restor[$y]%.</font></td>";
				$resultados_enquete .= "</tr>";
			}
		$resultados_enquete .= "</table>";
		$resto = join("|",$restor);
		$vcra = join("|",$valorcampos);
		mysql_query("UPDATE enquete SET valorcampos = '$vcra' WHERE id = $id_enquete");
		$corpo_enquete = $resultados_enquete;
	break;
}
?>