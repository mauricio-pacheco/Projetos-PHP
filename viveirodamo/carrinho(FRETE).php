<?php 
include "administrador/conexao.php";
include("meta.php"); ?>
<table width="100%" height="91" background="imagens/bloco12.jpg" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="100%" height="65" background="imagens/bloco2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" height="61" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><?php include("menu.php"); ?></td>
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
					$add_sql = "INSERT INTO cw_carrinho (id, cod, nome, preco, peso, qtd, sessao) 
					VALUES
					('','".$row_rs_produto['id']."','".$row_rs_produto['nome']."','".$row_rs_produto['valor']."','".$row_rs_produto['peso']."','1','".session_id()."')";
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
	
	
			if (is_array($quant))
		{	
			foreach($quant as $cod => $qtd)
			{
				if(is_numeric($cod) && is_numeric($qtd))
				{
					$pesado = $pesado * $qtd;
					$sql_alterar = "UPDATE cw_carrinho SET qtd = 	'$qtd', peso='$pesado' WHERE  cod = '$cod' AND sessao = '".session_id()."'";
					$rs_alterar = mysql_query($sql_alterar);
				}
			}
		}

}
?>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><form action="carrinho.php?acao=alterar" method="post">
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
    <td><div align="center" class="style3"><input type"text" size="2" name="qtd[<?=$row_rs_produto_carrinho['cod']?>]" value="<?=$row_rs_produto_carrinho['qtd']?>" /><input name="peso" type="hidden" value="<?=$row_rs_produto_carrinho['peso']?>" /></div></td>
    <td><div align="center" class="manchete_texto9">R$ <?= number_format($row_rs_produto_carrinho['preco']*$row_rs_produto_carrinho['qtd'],2,",","."); ?></div></td>
    <td><div align="center"><a href="carrinho.php?cod=<?=$row_rs_produto_carrinho['cod']?>&acao=excluir"><img src="imagens/apagar.png" border="0" alt="Excluir do Carrinho o Produto <?=$row_rs_produto_carrinho['nome']?>" title="Excluir do Carrinho o Produto <?=$row_rs_produto_carrinho['nome']?>" /></a></div></td>
  </tr>
    <?
  }
}
  ?>
  
    <tr>
      <td colspan="3"><div align="right" class="manchete_texto9"><strong>TOTAL:</strong>&nbsp; </div>        
      <div align="right"></div>        
      <div align="right"></div></td>
      <td><div align="center" class="manchete_texto9">
      R$ <?= number_format($soma_carrinho,2,",","."); ?></div></td>
      <td>&nbsp;</td>
    </tr>
      <tr>
      <td colspan="3"><div align="right" class="manchete_texto9"><strong>PESO TOTAL DOS PRODUTOS:</strong>&nbsp; </div> </td>
      <td align="center" class="manchete_texto9"><?php
$conexao = mysql_connect("localhost", "multixsh_gaz", "gaz201") or die(mysql_error());
$db = mysql_select_db("multixsh_gazola");

/* dados da seleção */
$selec = "select sum(peso) AS peso FROM cw_carrinho WHERE  sessao = '".session_id()."'";
$exec = mysql_query($selec, $conexao) or die(mysql_error());

/* exibindo o resultado */
while($dados=mysql_fetch_array($exec)) {

echo "".$dados['peso']."";
}
?>&nbsp;Kg</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5">
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
          <th width="33%" height="60" scope="col"><span class="style3"><a href="principal.php"><img src="imagens/continuar.jpg"  border="0" /></a></span></th>
          <th width="33%" scope="col">&nbsp;</th>
          <th width="34%" scope="col"><label>
            <input type="image" name="imageField" src="imagens/atuacarrinho.jpg" />
          </label></th>
        </tr>
</table></td>
    </tr>
</table>
</form></td>
                </tr>
              </table>
              <form action="frete.php" method="post">
                <table width="98%" align="center" border="0" cellspacing="0" cellpadding="0" class="manchete_texto9">
  <tr>
    <td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
        
          <tr>
            <td><span class="manchete_texto9"><strong>CALCULAR FRETE</strong></span></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><label for="sCepOrigem">Cep de Origem (somente números): </label>
              <input id="sCepOrigem" onkeypress="return txtBoxFormat(this, ’99999999′, event);" type="text" name="sCepOrigem" maxlength="8" />
              <label for="sCepDestino7"></label></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><label for="sCepDestino8">Cep de Destino (somente números): </label>
              <input id="sCepDestino8" onkeypress="return txtBoxFormat(this, ’99999999′, event);" type="text" name="sCepDestino" maxlength="8" /></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><label for="nVlPeso3">Peso Total (Kg): </label>
              <input id="nVlPeso3" onkeydown="javascript: return mascaraValor(this,event,5,3);" type="text" name="nVlPeso" maxlength="5" />
              <label for="nVlComprimento3"></label></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><label for="nVlComprimento4">Comprimento da Embalagem (Cm): </label>
              <input id="nVlComprimento4" onkeypress="return txtBoxFormat(this, ’999′, event);" type="text" name="nVlComprimento" maxlength="3" /></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><label for="nVlAltura2">Altura da Embalagem (Cm): </label>
              <input id="nVlAltura2" onkeypress="return txtBoxFormat(this, ’999′, event);" type="text" name="nVlAltura" maxlength="3" /></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><label for="nVlLargura2">Largura da Embalagem (Cm): </label>
              <input id="nVlLargura2" onkeypress="return txtBoxFormat(this, ’999′, event);" type="text" name="nVlLargura" maxlength="3" /></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><legend>
              <label for="nCdServico2">Serviço: </label>
              <select name="nCdServico">
                <option value="41106">PAC </option>
                <option value="40010">SEDEX </option>
                <option value="40215">SEDEX 10 </option>
                <option value="40290">SEDEX HOJE </option>
              </select>
              <input type="submit" value="Calcular Frete" />
            </legend></td>
          </tr>
        </table></td>
  </tr>
</table></form>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="12" /></td>
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