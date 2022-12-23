<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE>Arbaza</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<SCRIPT src="home_arquivos/j.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/scripts.js" type=text/javascript></SCRIPT>
<LINK href="home_arquivos/estilo.css" type=text/css rel=stylesheet>
<LINK href="home_arquivos/menu.css" type=text/css rel=stylesheet>
<LINK href="home_arquivos/estilo_int.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2900.2180" name=GENERATOR>
<style type="text/css">
.style3 {font-family: Tahoma, Arial}
.style5 {
	font-family: Tahoma, Arial;
	font-size: 11px;
	color: #FFFFFF;
}
.style7 {font-family: Tahoma, Arial; font-size: 11px; color: #333333; }
.style10 {color: #333333}
#apDiv1 {
	position:absolute;
	width:146px;
	height:56px;
	z-index:3;
	left: 114px;
	top: 816px;
}
.style13 {font-size: 11px; font-family: Tahoma; }
.style15 {font-size: 12px}
.style19 {font-size: 12px; font-family: Tahoma, Arial;}
.style20 {font-family: Tahoma, Arial; font-size: 12px; color: #333333; }
.style21 {font-family: Tahoma; color: #333333; }
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style23 {
	color: #333333;
	font-size: 11px;
	font-family: Tahoma;
}
.style27 {font-family: Tahoma; color: #D81E05; font-size: 11px; }
</style>
</HEAD>
<BODY>
<?php include("cima.php"); ?>
<TABLE id=conteudo cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD id=col_esquerda>
      <?php include("menu.php"); ?></TD>
    <TD id=meio><table width="98%" border="0" align="center">
      <tr>
        <td width="94%"><img src="blank.gif" width="1" height="2"></td>
      </tr>
    </table>
    <table width="98%" border="0" align="center">
      <tr>
        <td width="44%"><img src="jet.jpg" width="184" height="130"></td>
        <td width="56%" height="24">&nbsp;</td>
      </tr>
    </table></TD>
    <TD id=col_direita background="fundilho.jpg"><table width="98%" border="0" align="center">
      <tr>
        <td width="94%"><img src="blank.gif" width="1" height="1"></td>
      </tr>
    </table><table width="98%" border="0" align="center">
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td width="6%" class="style10"><img src="m3.gif" width="26" height="26"></td>
            <td width="94%" class="style13 style15 style10">Cota&ccedil;&otilde;es</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><span class="style13 style10">

        <?
function busca_cotacao() {
	$resultado = @file_get_contents('http://www.cotacao.republicavirtual.com.br/web_cotacao.php?formato=query_string');
	parse_str($resultado, $retorno);
	return $retorno;
}

$cotacao = busca_cotacao();

?>
          
          </span>
          <table width="174" border="0">
            <tr>
              <td class="style13 style10"><table width="100%" border="0">
                <tr>
                  <td width="7%"><img src="bolinha.gif" width="10" height="10"></td>
          <td width="93%">Compra</td>
        </tr>
                </table></td>
      <td class="style13 style10">&nbsp;</td>
    </tr>
            <tr>
              <td width="67%" class="style13 style10">&nbsp;Dólar Comercial</td>
      <td width="33%" class="style13 style10"><? echo "R$ ".$cotacao['dolar_comercial_compra'].""; ?></td>
    </tr>
            <tr>
              <td class="style13 style10">&nbsp;Dólar Paralelo</td>
      <td class="style13 style10"><? echo "R$ ".$cotacao['dolar_paralelo_compra'].""; ?></td>
    </tr>
            <tr>
              <td class="style13 style10">&nbsp;Euro -&gt; Dólar</td>
      <td class="style13 style10"><? echo "R$ ".$cotacao['euro_dolar_compra'].""; ?></td>
    </tr>
            <tr>
              <td class="style13 style10">&nbsp;Euro -&gt; Real</td>
      <td class="style13 style10"><? echo "R$ ".$cotacao['euro_real_compra'].""; ?></td>
    </tr>
            <tr>
              <td class="style13 style10">&nbsp;</td>
      <td class="style13 style10">&nbsp;</td>
    </tr>
            <tr>
              <td class="style13 style10"><table width="100%" border="0">
                <tr>
                  <td width="13%"><img src="bolinha.gif" width="10" height="10"></td>
          <td width="87%">Venda</td>
        </tr>
                </table></td>
      <td class="style13 style10">&nbsp;</td>
    </tr>
            <tr>
              <td class="style13 style10">&nbsp;Dólar Comercial</td>
      <td class="style13 style10"><? echo "R$ ".$cotacao['dolar_comercial_venda'].""; ?></td>
    </tr>
            <tr>
              <td class="style13 style10">&nbsp;Dólar Paralelo</td>
      <td class="style13 style10"><? echo "R$ ".$cotacao['dolar_paralelo_venda'].""; ?></td>
    </tr>
            <tr>
              <td class="style13 style10">&nbsp;Euro -&gt; Dólar</td>
      <td class="style13 style10"><? echo "R$ ".$cotacao['euro_dolar_venda'].""; ?></td>
    </tr>
            <tr>
              <td class="style13 style10">&nbsp;Euro -&gt; Real</td>
      <td class="style13 style10"><? echo "R$ ".$cotacao['euro_real_venda'].""; ?></td>
    </tr>
</table></td>
      </tr>
      <tr>
        <td><img src="blank.gif" width="1" height=""></td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td class="style10">&nbsp;</td>
            <td class="style13 style15 style10">&nbsp;</td>
          </tr>
          <tr>
            <td width="6%" class="style10"><img src="m1.gif" width="26" height="22"></td>
            <td width="94%" class="style13 style15 style10">Previs&atilde;o do Tempo</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center"><span class="style10">
          <iframe src="http://www.tempoagora.com.br/selos/custom/selo.php?cid=FredericoWestphalen-RS;" name="seloFredericoWestphalen-RS" width="120" height="125" frameborder="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>
        </span></td>
      </tr>
      <tr>
        <td align="center"><img src="blank.gif" width="1" height="6"></td>
      </tr>
      <tr>
        <td align="center"><a href="http://tempoagora.uol.com.br/previsaodotempo.html/brasil/FredericoWestphalen-RS/" target=_blank class="style27">Clique para ver os demais dias.</a></td>
      </tr>

    </table></TD>
  </TR></TBODY></TABLE>
<?php include("baixo.php"); ?>
</BODY></HTML>
