<?
include("uf_define.php");
require ("libs/padrao.php");
include "formata_valor.php";
session_start();
// Se o usuário não digitou a senha pede a senha agora
if(!$senha_usuario){
include ("verifica_senha.php");
exit;
}
if ($id_usuario){
// Inicia processo se estiver logado senaum pergunta se o cara é cadastrado
$path_local = "libs/padrao.php";
include "libs/db.php";

if($inserir){
// Seleciona dados do cliente
$qcliente = mysql_query("SELECT * FROM clientes WHERE id = '$id_usuario'");
while($rqcliente = mysql_fetch_array($qcliente)){
// Id do usuário
$id_cliente = $id_usuario;
// Nome que deve constar no pedido
        if($outro_nome){
         $nome_cliente = $outro_nome;
         }
         else {
         $nome_cliente = $rqcliente[1];
        }
// Endereco que deve constar no pedido
         if($outro_endereco){
          $endereco_entrega = $outro_endereco;
          } else {
          $endereco_entrega = $rqcliente[5];
         }
// Cidade que deve constar no pedido
      if($outra_cidade){
                $cidade_entrega = $outra_cidade;
            } else {
            $cidade_entrega = $rqcliente[6];
           }
// Estado que deve constar no pedido
      if($estado_form){
                $estado_entrega = $estado_form;
            } else {
            $estado_entrega = $rqcliente[7];
           }
// CEP que deve constar no pedido
      if($outro_cep){
                $cep_entrega = $outro_cep;
            } else {
            $cep_entrega = $rqcliente[8];
           }
// PRODUTOS
        function spaagora($sc){
                $c = count($sc);
                for($x=0;$x<$c;$x++){
                $cl = $x + 1;
                 if($cl == $c){
                  $s1 .= "$sc[$x]";
                   } else {
                  $s1 .= "$sc[$x]|";
                 }
                }
        return $s1;
         }
$produtos = spaagora($produtos);
// QUANTIDADES
$quantidades = spaagora($quantidades);
// VALORES
$valores = spaagora($valores);
}
mysql_query("INSERT INTO pedidos  (id_cliente,nome_cliente,endereco_entrega,cidade_entrega,estado_entrega,cep_entrega,produtos,quantidades,valores,ativo,frete,pagamento,mensagem) VALUES ('$id_cliente','$nome_cliente','$endereco_entrega','$cidade_entrega','$estado_entrega','$cep_entrega','$produtos','$quantidades','$valores','$ativo','$frete','$pagamento','$mensagem');") or die ("Ocorreu um erro ao incluir seu pedido..<br>O seu pedido não foi enviado aos nossos servidores devido a um erro crítico no banco de dados. <br><br>Defido a este erro as su compra não será concluída.<br><br>Por favor ajude-nos a resolver este problema comunicando-nos que ele ocorreu.<br><br>Obrigado !");;

// inicio Lyma!
$sql = mysql_query("SELECT * FROM pedidos ");
while($resp = mysql_fetch_array($sql)){
$id = $resp[0];
}
//fim lyma

mysql_query("DELETE FROM carrinho WHERE id_cliente = '$id_usuario'");
print "<script Language=\"JavaScript\">";
print "window.opener.location.href = \"index.php?cat_pai=1&pagina=pedido&id=$id\";";
print "window.close();";
print "</script>";
}
?>
<html>
<head>
<title>Fechar um pedido</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="libs/admin/estilo.css">
</head>
<Script Language="JavaScript">
function recarrega(link){
var sele = link.form.elements['estado_usuario'].value;
if (sele == "AC")
window.location.href = "comprar.php?estado_form=AC&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "AL")
window.location.href = "comprar.php?estado_form=AL&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "AM")
window.location.href = "comprar.php?estado_form=AM&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "AP")
window.location.href = "comprar.php?estado_form=AP&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "BA")
window.location.href = "comprar.php?estado_form=BA&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "CE")
window.location.href = "comprar.php?estado_form=CE&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "DF")
window.location.href = "comprar.php?estado_form=DF&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "ES")
window.location.href = "comprar.php?estado_form=ES&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "GO")
window.location.href = "comprar.php?estado_form=GO&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "MA")
window.location.href = "comprar.php?estado_form=MA&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "MG")
window.location.href = "comprar.php?estado_form=MG&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "MS")
window.location.href = "comprar.php?estado_form=MS&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "MT")
window.location.href = "comprar.php?estado_form=MT&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "PA")
window.location.href = "comprar.php?estado_form=PA&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "PB")
window.location.href = "comprar.php?estado_form=PB&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "PE")
window.location.href = "comprar.php?estado_form=PE&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "PI")
window.location.href = "comprar.php?estado_form=PI&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "PR")
window.location.href = "comprar.php?estado_form=PR&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "RJ")
window.location.href = "comprar.php?estado_form=RJ&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "RN")
window.location.href = "comprar.php?estado_form=RN&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "RO")
window.location.href = "comprar.php?estado_form=RO&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "RR")
window.location.href = "comprar.php?estado_form=RR&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "RS")
window.location.href = "comprar.php?estado_form=RS&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "SC")
window.location.href = "comprar.php?estado_form=SC&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "SE")
window.location.href = "comprar.php?estado_form=SE&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "SP")
window.location.href = "comprar.php?estado_form=SP&tipo_frete=<? print $tipo_frete;?>";
else if (sele == "TO")
window.location.href = "comprar.php?estado_form=TO&tipo_frete=<? print $tipo_frete;?>";
}
</Script>
<body bgcolor="#FFFFFF">
<p align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><font size="2">Vamos
  fechar seu pedido ?</font><br>
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
<form name="master" method="post" action="comprar.php?inserir=sim">
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
$sql_v_p_c = mysql_query("SELECT c.id_cliente,c.id_produto,c.quantidade,c.descricao_produto,p.valor_produto, p.peso_produto FROM carrinho c, produto p WHERE c.id_cliente = $id_usuario AND p.id = c.id_produto ORDER BY c.descricao_produto");
while($rsvpc = mysql_fetch_array($sql_v_p_c)){
/// Joga para array os componentes necessário para cadastro na tabela pedidos
if(!$i){
$i = "0";
}
// coloca os componentes
$id_produto_form[$i] = $rsvpc[1];
$qtd_produto_form[$i] = $rsvpc[2];
$desc_produto_form[$i] = $rsvpc[3];
$valor_produto_form[$i] = $rsvpc[4];
// Conta mais um a cada volta do laço
$i = $i + 1;
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
print "   <td width=\"5%\" height=\"2\"><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\"><input class=base_caixas type=\"text\" name=\"valor_produto[$j]\" value=\"$rsvpc[2]\" size=2><input type=hidden name=\"id_produto[$j]\" value=\"$rsvpc[1]\"></font></td>\n";
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
if($estado_form){
$estado = $estado_form;
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
<?
// <!-- O Input abaixo define os campos hidden a serem enviados na confirmação -->
$i = count($id_produto_form);
$valor_produto_form[$i] = $rsvpc[4];
for($x=0;$x<$i;$x++){
print "<input type=\"hidden\" name=\"produtos[$x]\" value=\"$id_produto_form[$x]\">\n";
print "<input type=\"hidden\" name=\"quantidades[$x]\" value=\"$qtd_produto_form[$x]\">\n";
print "<input type=\"hidden\" name=\"valores[$x]\" value=\"$valor_produto_form[$x]\">\n";
$j = $x + 1;
}
?>
<input type="hidden" name="frete" value="<? print $ffinal; ?>">
<input type="hidden" name="estado_form" value="<? print $estado_form; ?>">
<?
if($tipo_frete == "cobrar" OR !$tipo_frete){
$pagamento = "SEDEX à COBRAR";
} else {
$pagamento = "DOC, Transferência ou Depósito em conta";
}
?>
<input type="hidden" name="pagamento" value="<? print $pagamento; ?>">
<tr bgcolor="<? print "$barra"; ?>" bordercolor="#000000">
      <td width="5%" height="2"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="<? print "$barra"; ?>"><b>..
        </b></font></td>
      <td width="5%" height="2"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="<? print "$barra"; ?>"><b>.</b></font></td>
      <td width="55%" height="2">
        <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="<? print "$barra"; ?>">
          <input type="button" name="DeixaQuieto" value="::Não quero comprar agora::" class="fundo_azul_caixa" onclick="javascript:window.close();">
          <input type="submit" name="Submit2" value="::CONFIRMO A COMPRA ::" class="fundo_azul_caixa">
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
  <font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">
  <font color="#000000"> <font color="#333333"> </font></font></font>
  <table width="98%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
        <p><font color="#333333"><b></b></font></p>
      </td>
    </tr>
  </table>
  <p><font color="#333333"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
    DADOS DE ENVIO DA MERCADORIA: ( Apenas se for diferente do seu endere&ccedil;o cadastrado
    ) </font></b></font><br>
    <font size="1" face="Verdana, Arial, Helvetica, sans-serif"><br>
    <?   /*
    Nome da pessoa:
    <input type="text" name="outro_nome">
    <br> */ ?>
    Estado:
    <select name="estado_usuario" onchange="javascript:recarrega(this);">
      <option value="0">SELECIONE DESTINO</option>
      <option value="AC"<?print $AC;?>>Acre</option>
      <option value="AL"<?print $AL;?>>Alagoas</option>
      <option value="AM"<?print $AM;?>>Amazonas</option>
      <option value="AP"<?print $AP;?>>Amapá</option>
      <option value="BA"<?print $BA;?>>Bahia</option>
      <option value="CE"<?print $CE;?>>Ceará</option>
      <option value="DF"<?print $DF;?>>Distrito Federal</option>
      <option value="ES"<?print $ES;?>>Espírito Santo</option>
      <option value="GO"<?print $GO;?>>Goiás</option>
      <option value="MA"<?print $MA;?>>Manaus</option>
      <option value="MG"<?print $MG;?>>Minas Gerais</option>
      <option value="MS"<?print $MS;?>>Mato Grosso do Sul</option>
      <option value="MT"<?print $MT;?>>Mato Grosso</option>
      <option value="PA"<?print $PA;?>>Pará</option>
      <option value="PB"<?print $PB;?>>Paraiba</option>
      <option value="PE"<?print $PE;?>>Pernambuco</option>
      <option value="PI"<?print $PI;?>>Piauí</option>
      <option value="PR"<?print $PR;?>>Paraná</option>
      <option value="RJ"<?print $RJ;?>>Rio de Janeiro</option>
      <option value="RN"<?print $RN;?>>Rio Grande do Norte</option>
      <option value="RO"<?print $RO;?>>Rondônia</option>
      <option value="RR"<?print $RR;?>>Roraima</option>
      <option value="RS"<?print $RS;?>>Rio Grande do Sul</option>
      <option value="SC"<?print $SC;?>>Santa Catarina</option>
      <option value="SE"<?print $SE;?>>Sergipe</option>
      <option value="SP"<?print $SP;?>>São Paulo</option>
      <option value="TO"<?print $TO;?>>Tocantins</option>
    </select>
    <br>
    Cidade:
    <input type="text" name="outra_cidade">
    <br>
    </font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Endere&ccedil;o:
    <input type="text" name="outro_endereco">
    EX:( Rua: 7 de Setembro 247 )<br>
    CEP:
    <input type="text" name="outro_cep">
    <br>
    Mensagem para a pessoa:<br>
    <textarea name="mensagem" cols="40" rows="5"></textarea>
    </font><br>
    <br>
  </p>
  </form>
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
print "window.open('carrinho.php?vim_do_java=ok','Janela', 'top=0,left=0,toolbar=no, location=no, status=no, scrollbar=no,resizable=yes,width=450, height=410')";
print "}";
print "abrejanela();";
print "</Script>";
}
?>