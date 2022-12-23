<?php 
include "administrador/conexao.php";
include("meta.php"); ?>
<table width="100%" height="91" background="imagens/bloco12.jpg" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="100%" height="24" background="imagens/bloco2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("slides.php"); ?>
      <table width="1000" bgcolor="#EBEBEB" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
      <table width="1000" background="imagens/barracentro.png" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td valign="top"><table width="992" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="231" valign="top"><?php include("menulateral.php"); ?></td>
            <td width="761" valign="top"><table height="30" background="imagens/funtotabelamaior.png" bgcolor="#535353" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fontetabela5" align="right"><strong>Seu Carrinho de Compras</strong>&nbsp;&nbsp;</td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <?php
include "administrador/conexao.php";
$logado = $_COOKIE['email'];
$logado2 = $_COOKIE['senha'];
$logado2novo = hash('sha512', $logado2);

$sql = mysql_query("SELECT * FROM cw_clientes WHERE email = '$logado' AND senha = '$logado2novo'");
$contar = mysql_num_rows($sql); 

if ( $contar == 1 ) {

while($y = mysql_fetch_array($sql))
   {
$idcliente = $y["id"];
   }
	
?>
              
              <?php

$acao = $_GET['acao'];
$cod =  $_GET['cod'];

if ($acao == "incluir")
{	
	if ($cod != '')
	{
		if (is_numeric($cod))
		{	
			$cod = addslashes(htmlentities($cod));
			
			$query_rs_carrinho = "SELECT * FROM cw_carrinho WHERE cw_carrinho.cod = '".$cod."'  AND cw_carrinho.sessao = '".session_id()."'";
			$rs_carrinho = mysql_query($query_rs_carrinho);
			$row_rs_carrinho = mysql_fetch_assoc($rs_carrinho);
			$totalRows_rs_carrinho = mysql_num_rows($rs_carrinho);
			
			if ($totalRows_rs_carrinho == 0)
			{
				// Aqui pegamos os dados do produto a ser incluido no carrinho
				$query_rs_produto = "select * from cw_produtos where id = '".$cod."'";
				$rs_produto = mysql_query($query_rs_produto);
				$row_rs_produto = mysql_fetch_assoc($rs_produto);
				$totalRows_rs_produto = mysql_num_rows($rs_produto);
								
				if ($totalRows_rs_produto > 0)
				{
					$registro_produto = mysql_fetch_assoc($rs_produto);
					// Incluimos o produto selecionado no carrinho de compras
					$add_sql = "INSERT INTO cw_carrinho (id, cod, nome, preco, peso, pesoor, qtd, sessao) 
					VALUES
					('','".$row_rs_produto['id']."','".$row_rs_produto['nome']."','".$row_rs_produto['valor']."','".$row_rs_produto['peso']."', '".$row_rs_produto['peso']."','1','".session_id()."')";
					$rs_produto_add = mysql_query($add_sql);
				}
			}		
		}
	}
}	

if ($acao == "excluir")
{
	if ($cod != '')
	{
		if (is_numeric($cod))
		{	
			$cod = addslashes(htmlentities($cod));

			$query_rs_car = "SELECT * FROM cw_carrinho WHERE cod = '".$cod."'  AND sessao = '".session_id()."'";
			$rs_car = mysql_query($query_rs_car);
			$row_rs_carrinho = mysql_fetch_assoc($rs_car);
			$totalRows_rs_car = mysql_num_rows($rs_car);
			
			if ($totalRows_rs_car > 0)
			{
				$sql_carrinho_excluir = "DELETE FROM cw_carrinho WHERE cod = '".$cod."' AND sessao = '".session_id()."'";	
				$exec_carrinho_excluir = mysql_query($sql_carrinho_excluir);
			}
		}
	}
}

if ($acao == "alterar")
{

	
	
	
$quant = $_POST['qtd'];
$pesado = $_POST['peso'];
$formaenvios = $_POST['formaenvios'];
$somatoriototal = $_POST['somatorio'];


	
			if (is_array($quant))
		{	
			foreach($quant as $cod => $qtd)
			{
				if(is_numeric($cod) && is_numeric($qtd))
				{
					$pesado = $pesado * $qtd;
					
					$sql_alterar = "UPDATE cw_carrinho SET qtd = '$qtd', pesoor='$pesado' WHERE  cod = '$cod' AND sessao = '".session_id()."'";
					$rs_alterar = mysql_query($sql_alterar);
				}
			}
		}
		
		
		
	// Peso total do pacote em Quilos, caso seja menos de 1Kg, ex.: 300g, coloque 0.300
define('PESO',$pesado);
define('EMBALAGEM',0.00);

// Valor adicional no envio como custo de embalagem.
define('COMPRIMENTO',20);
define('ALTURA',15);
define('LARGURA',20);

if($_POST) {
// Código do Serviço que deseja calcular, veja tabela acima:
if ($_POST['servico']) {
$cod_servico = $_POST['servico'];
}
// CEP de Origem, em geral o CEP da Loja
$cep_origem = '79091-814';

if ($cod_servico=='41106') { $codpp = 'PAC'; } else  { $codpp = 'SEDEX'; }

// CEP de Destino, você pode passar esse CEP por GET ou POST vindo de um formulário
$cep_destino = $_POST['cep'];
$cep_destino = eregi_replace("([^0-9])","",$cep_destino);

// URL de Consulta dos Correios
$correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?StrRetorno=xml&nCdServico={$cod_servico}&nVlPeso=" . PESO . "&sCepOrigem={$cep_origem}&sCepDestino={$cep_destino}&nCdFormato=1&nVlComprimento=" . COMPRIMENTO . "&nVlAltura=" . ALTURA . "&nVlLargura=" . LARGURA;

// Capta as informações da página dos Correios
$correios_info = file($correios);

// Processa as informações vindas do site dos correios em um Array
foreach($correios_info as $info) {

// Busca a informação do Preço da Postagem
if(preg_match("/\<Valor>(.*)\<\/Valor>/",$info,$tarifa)) {

$total = $tarifa[1] + EMBALAGEM;
}
if(preg_match("/\<PrazoEntrega>(.*)\<\/PrazoEntrega>/",$info,$PrazoEntrega)) {
$PrazoEntrega = $PrazoEntrega[1];
}
}

// Neste exemplo estamos usando apenas PAC e SEDEX. Caso seja necessário, utilize outras opções.
switch ($cod_servico) {
case 41106:
$nome_servico = " PAC ";
break;
case 40010:
$nome_servico = " SEDEX ";
break;
}

// Caso venha valor de resposta é numerio e maior que o custo da embalagem senão ocorreu algum erro na solicitação.
if(is_numeric($total) and ($total > $embalagem)) {

// Quando encontra o valor da postagem, exibe na página formatando em padrão de moeda 10,89
// Caso você não queira formatar basta comentar a linha abaixo que será exibido assim 10.89 e basta executar o comando abaixo
$total = number_format($total,2,',','.');


//$prossiga = '<a href=fecharcompra.php?idcliente=' . $idcliente . '&valorfrete=' . $total . '&carrinho=' .session_id().'&prazoentrega='. $PrazoEntrega .'&formaenvio='.$codpp.'&pesoprodutos='.$pesado.'&cepentrega'.$cep_destino.'&valorcompra=' .$somatoriototal .'><img border=0 src=imagens/prossegue.png /></a>';

} else {
echo '<span class=manchete_texto9><font color=#FF0000>&nbsp;&nbsp;Erro ao consultar verifique se CEP esta correto</font></span>';
}
}
		

}
?>
              <table width="99%" border="0" align="center">
                <tr>
                  <td>
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="6" /></td>
                    </tr>
                  </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="center"><img src="imagens/b1.png" width="752" height="39" /></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="6" /></td>
                    </tr>
                  </table>
                  
                                    <script language="javascript" type="text/javascript">
function Mascara (formato, keypress, objeto){
campo = eval (objeto);

// cep
if (formato=='cep'){
separador = '-';
conjunto1 = 5;
if (campo.value.length == conjunto1){
campo.value = campo.value + separador;}
}

}
                    </script>
                  <form action="carrinho.php?acao=alterar" name="cadastro" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="36%" scope="col"><div align="left" class="manchete_texto9">PRODUTO</div></th>
    <th width="22%" class="manchete_texto9" scope="col">PRE&Ccedil;O</th>
    <th width="13%" class="manchete_texto9" scope="col">QUANTIDADE</th>
    <th width="14%" class="manchete_texto9" scope="col">SUBTOTAL</th>
    <th width="5%" scope="col">&nbsp;</th>
  </tr>

  <?
  $sql_meu_carrinho = "SELECT * FROM cw_carrinho WHERE  sessao = '".session_id()."' ORDER BY nome ASC";
  $exec_meu_carrinho =  mysql_query($sql_meu_carrinho);
  $qtd_meu_carrinho = mysql_num_rows($exec_meu_carrinho);
  
  if ($qtd_meu_carrinho > 0)
  {
  	$soma_carrinho = 0;
  	while ($row_rs_produto_carrinho = mysql_fetch_assoc($exec_meu_carrinho))
	{
		$soma_carrinho += ($row_rs_produto_carrinho['preco']*$row_rs_produto_carrinho['qtd']);
  ?>
    <tr>
  
    <td><span class="manchete_texto9">
      <?=$row_rs_produto_carrinho['nome']?></span></td>
    <td><div align="center" class="manchete_texto9">R$ <?= number_format($row_rs_produto_carrinho['preco'],2,",","."); ?></div></td>
    <td><div align="center" class="style3"><input type"text" size="2" name="qtd[<?=$row_rs_produto_carrinho['cod']?>]" value="<?=$row_rs_produto_carrinho['qtd']?>" /><input name="peso" type="hidden" value="<?=$row_rs_produto_carrinho['peso']?>" /> </div></td>
    <td><div align="center" class="manchete_texto9">R$ <?= number_format($row_rs_produto_carrinho['preco']*$row_rs_produto_carrinho['qtd'],2,",","."); ?></div></td>
    <td><div align="center"><a href="carrinho.php?cod=<?=$row_rs_produto_carrinho['cod']?>&acao=excluir"><img src="imagens/apagar.png" border="0" alt="Excluir do Carrinho o Produto <?=$row_rs_produto_carrinho['nome']?>" title="Excluir do Carrinho o Produto <?=$row_rs_produto_carrinho['nome']?>" /></a></div></td>
  </tr>
   <?
  }
}
 
  ?>
 <tr>
      <td colspan="3"><div align="right" class="manchete_texto9"><strong>VALOR TOTAL DOS PRODUTOS:</strong>&nbsp; </div>        
      <div align="right"></div>        
      <div align="right"></div></td>
      <td><div align="center" class="manchete_texto9">
      R$ <?= number_format($soma_carrinho,2,",","."); ?></div></td>
      <td>&nbsp;</td>
    </tr>
 
  <tr>
        <td colspan="3"><div align="right" class="manchete_texto9"><strong>VALOR DO  FRETE:</strong>&nbsp; </div></td>
        <td align="center" class="manchete_texto9"><div align="center" class="manchete_texto9">
      R$ <?php 
	  $somadorcar = number_format($soma_carrinho,2,",",".");
	  if($somadorcar>150 and $nome_servico==' PAC ') {
		  $total = 0;
		  echo $total;
	  } else {
	  echo $total;
	  }?></div></td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td colspan="3"><div align="right" class="manchete_texto9"><strong>FORMA DE ENVIO:</strong>&nbsp; </div></td>
        <td align="center" class="manchete_texto9"><div align="center" class="manchete_texto9"><?php echo $nome_servico; ?><span class="style3">
      
      </span></div></td>
        <td>&nbsp;</td>
      </tr>
      
      
      <tr>
        <td colspan="3"><div align="right" class="manchete_texto9"><strong>PRAZO DO TRANSPORTE:</strong>&nbsp; </div></td>
        <td align="center" class="manchete_texto9"><div align="center" class="manchete_texto9">
      <?php echo $PrazoEntrega; ?> dia(s)</div></td>
        <td>&nbsp;</td>
      </tr>
      
      
      <tr>
        <td colspan="3"><div align="right" class="manchete_texto9"><strong>PRAZO DE PRODUÇÃO:</strong>&nbsp; </div></td>
        <td align="center" class="manchete_texto9"><div align="center" class="manchete_texto9">
      3 dia(s)</div></td>
        <td>&nbsp;</td>
      </tr>
      
      
      <tr>
        <td colspan="3"><div align="right" class="manchete_texto9"><strong>PRAZO TOTAL DE ENTREGA:</strong>&nbsp; </div></td>
        <td align="center" class="manchete_texto9"><div align="center" class="manchete_texto9">
      <?php 
	  $PrazoEntregaTotal = $PrazoEntrega + 3;
	  echo $PrazoEntregaTotal; ?> dia(s)</div></td>
        <td>&nbsp;</td>
      </tr>
      
      
             <tr>
      <td colspan="3"><div align="right" class="manchete_texto9"><strong>PESO TOTAL DOS PRODUTOS:</strong>&nbsp; </div> </td>
      <td align="center" class="manchete_texto9"><?php
$conexao = mysql_connect("localhost", "multixsh_gaz", "gaz201") or die(mysql_error());
$db = mysql_select_db("multixsh_gazola");

/* dados da seleção */
$selec = "select sum(pesoor) AS pesoor FROM cw_carrinho WHERE  sessao = '".session_id()."'";
$exec = mysql_query($selec, $conexao) or die(mysql_error());

/* exibindo o resultado */
while($dados=mysql_fetch_array($exec)) {
$pesadao = $dados['pesoor'];
echo "".$dados['pesoor']."";
}
?>&nbsp;Kg</td>
      <td>&nbsp;</td>
    </tr>
    
     <tr>
      <td colspan="3"><div align="right" class="manchete_texto9"><strong>VALOR TOTAL DA COMPRA:</strong>&nbsp; </div>        
      <div align="right"></div>        
      <div align="right"></div></td>
      <td><div align="center" class="manchete_texto9">
      <b>R$</b> <b><?=  $somatorio = $soma_carrinho + $total;    number_format($somatorio,2,",","."); ?></b><span class="style3">
      <input name="somatorio" type="hidden" value="<?php echo $somatorio; ?>" />
      </span></div></td>
      <td>&nbsp;</td>
    </tr>
          
    <tr>
      <td colspan="5">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          
          <td class="manchete_texto9"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="3%"><input name="servico" type="radio" value="41106" checked="checked" /></td>
              <td width="97%"><img src="imagens/pac.png" width="144" height="55" /></td>
            </tr>
          </table></td>
          <td class="manchete_texto9"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="3%"><input type="radio" name="servico" value="40010" /></td>
                <td width="97%"><img src="imagens/sedex.png" width="154" height="55" /></td>
              </tr>
        </table></td>
        <td class="manchete_texto9"><strong>CALCULAR FRETE: </strong>CEP:<strong>
          <input type="text" class="manchete_texto9" name="cep" onkeypress="Mascara('cep', window.event.keyCode, 'document.cadastro.cep');" size="14" maxlength="9"/><input type="submit" name="imageField" value="OK" />
          </strong><br />Formato Ex: (98400-000)<br /><i>OBS: Frete Gratuito em Compras Acima de R$150,00 Via PAC Correios</i> </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="6" /></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="65%">&nbsp;</td>
          <td width="33%">
          <?php if($cep_destino=='') { } else {?>
          <a href="fecharcompra.php?idcliente=<?php echo $idcliente; ?>&valorfrete=<?php echo $total; ?>&carrinho=<?php  echo session_id(); ?>&prazoentrega=<?php echo $PrazoEntregaTotal; ?>&prazotransporte=<?php echo $PrazoEntrega; ?>&formaenvio=<?php echo $nome_servico; ?>&pesoprodutos=<?php echo $pesadao; ?>&cepentrega=<?php echo $cep_destino; ?>&valorcompra=<?php echo $somatorio; ?>"><img border=0 src=imagens/prossegue.png /></a><?php } ?></td>
          <td width="2%">&nbsp;</td>
        </tr>
      </table>
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="8" /></td>
        </tr>
    </table>
     
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="8" /></td>
        </tr>
    </table>
      <table bgcolor="#000000" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="1" /></td>
        </tr>
  </table>
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
      
       <table width="100%" border="0" cellspacing="0" cellpadding="0">
         <tr>
          <th width="33%" height="60" scope="col"><span class="style3"><a href="principal.php"><img src="imagens/continuar.jpg"  border="0" /></a></span></th>
          <th width="33%" scope="col">&nbsp;</th>
          <th width="34%" scope="col"><label>
            <input type="image" name="imageField" src="imagens/atuacarrinho.jpg" />
          </label>
          </th>
        </tr>
</table></td>
    </tr>
</table>
</form></td>
                </tr>
              </table>
                        <?php
} else {
?>
                        <div align="center" class="fonteadm"><br />
                          <img src="imagens/chavao.png"  /><br />
                          <br />
                          <span class="manchete_texto9">Você precisa estar logado para executar esta ação!</span></div>
                        <?php } ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="12" /></td>
                </tr>
              </table>
             
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
  </table></td>
  </tr>
</table>
<table width="100%" height="120" background="imagens/blocoabaixo.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="16" /></td>
      </tr>
    </table> 
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>