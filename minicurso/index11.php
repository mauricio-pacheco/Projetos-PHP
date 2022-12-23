<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include("meta.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK rel=stylesheet type=text/css href="classes/estilos.css">
<title>Mini Curso de PHP - Maurício Pacheco</title>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<?php include("cima.php"); ?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table class="boxSombra" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="23%" valign="top" bgcolor="#1A181D"><?php include("menu.php"); ?></td>
        <td width="77%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="8" /></td>
          </tr>
        </table>
          <table background="imagens/barratexto.jpg" height="29" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="fontetitulo"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td>&nbsp;&nbsp;<strong>MINI CURSO DE PHP e MySQL - MySQL no PHP - UPDATE E DELETE</strong></td>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="8" /></td>
            </tr>
          </table>
          <table width="98%" bgcolor="#FFFFFF" height="500" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="fontetabela"><p><strong>MySQL no PHP - UPDATE E DELETE</strong></p>
                    <p>Nesta sessão vamos aprender como editar um <strong>cadastro</strong> no Mysql e como <strong>apagar os dados</strong>.</p>
                    <p>Então, como estamos aprendendo PHP e Mysql, não vou me deter a estruturar os arquivos do nosso sistema. Vamos fazê-lo utilizando:</p>
                    <ul>
                      <li>Um      arquivo para conexão com o banco de dados; <em>(<strong>conexao.php</strong>) – este será usado em todo o sistema(será chamado pelo      comando include()).</em></li>
                      <li>Um      arquivo com o formulário para cadastro; <em>(<strong>index.php</strong>)</em></li>
                      <li>Um      arquivo para efetuar o cadastro<em>; (<strong>cadastrar.php</strong>)</em></li>
                      <li>Um      arquivo com a lista dos registros do banco de dados; <em>(<strong>admprodutos.php</strong>)</em></li>
                    </ul>
                    <p>Vamos começar abrindo nosso arquivo <strong>admprodutos.php</strong> para criarmos os links EDITAR e APAGAR:</p>
                    <p>&lt;HTML&gt;<br />
                      &lt;HEAD&gt;<br />
&lt;TITLE&gt;Administrar Produtos&lt;/TITLE&gt;<br />
&lt;/HEAD&gt;<br />
&lt;BODY&gt;<br />
&lt;?php<br />
include(&quot;conexao.php&quot;);<br />
?&gt;</p>
                    <p>&lt;h1&gt;Lista de Produtos&lt;/h1&gt;</p>
                    <p>&lt;?php</p>
                    <p>$sql = &quot;SELECT id, nome, quantidade, marca, peso FROM produtos&quot;;<br />
                      $sql = mysql_query($sql);<br />
                      $total_de_produtos = mysql_num_rows($sql);<br />
                      echo &quot;Total de produtos cadastrados no sistema: $total_de_produtos &lt;BR&gt;&lt;BR&gt;&quot;;</p>
                    <p>// WHILE enquanto o comando for verdadeiro, ou seja, enquanto existir registros a serem exibidos.</p>
                    <p>while ($linha = mysql_fetch_array($sql)) {</p>
                    <p>$id  = $linha[&quot;id&quot;];<br />
                      $nome  = $linha[&quot;nome&quot;];<br />
                      $quantidade  = $linha[&quot;quantidade&quot;];<br />
                      $marca  = $linha[&quot;marca&quot;];<br />
                      $peso  = $linha[&quot;peso&quot;];</p>
                    <p>?&gt;<br />
                      Nome do Produto: &lt;?php echo &quot;$nome&quot;; ?&gt;&lt;br&gt;<br />
                      Quantidade: &lt;?php echo &quot;$quantidade&quot;; ?&gt;&lt;br&gt;<br />
                      Marca: &lt;?php echo &quot;$marca&quot;; ?&gt;&lt;br&gt;<br />
                      Peso: &lt;?php echo &quot;$peso&quot;; ?&gt;&lt;br&gt;<br />
                      <strong>&lt;a href=&quot;ediproduto.php?id=&lt;?php echo &quot;$id&quot;; ?&gt;&quot;&gt;EDITAR&lt;/a&gt; --- &lt;a href=&quot;delproduto.php?id=&lt;?php echo &quot;$id&quot;; ?&gt;&quot;&gt;APAGAR&lt;/a&gt;&lt;br&gt;<br />
                      &lt;br&gt;</strong><br />
                    </p>
                    <p>&lt;?php<br />
                      }<br />
                      ?&gt;<br />
                      &lt;/BODY&gt;<br />
                      &lt;/HTML&gt;</p>
                    <p>Agora iremos criar o arquivo <strong>ediproduto.php</strong> para editarmos o produto selecionado:</p>
                    <p>&lt;HTML&gt;<br />
                      &lt;HEAD&gt;<br />
&lt;TITLE&gt;Editar Produto&lt;/TITLE&gt;<br />
&lt;/HEAD&gt;<br />
&lt;BODY&gt;<br />
&lt;?php include(&quot;menu.php&quot;); ?&gt;<br />
&lt;?php<br />
include(&quot;conexao.php&quot;);<br />
?&gt;<br />
&lt;?php<br />
echo &quot;Editar Produto:&quot;;<br />
?&gt;<br />
&lt;?php</p>
                    <p>$id = $_GET['id'];</p>
                    <p>$sql = &quot;SELECT id, nome, quantidade, marca, peso FROM produtos WHERE id='$id'&quot;;<br />
                      $sql = mysql_query($sql);</p>
                    <p>while ($linha = mysql_fetch_array($sql)) {</p>
                    <p>$id  = $linha[&quot;id&quot;];<br />
                      $nome  = $linha[&quot;nome&quot;];<br />
                      $quantidade  = $linha[&quot;quantidade&quot;];<br />
                      $marca  = $linha[&quot;marca&quot;];<br />
                      $peso  = $linha[&quot;peso&quot;];</p>
                    <p>?&gt;<br />
                      &lt;form method=&quot;POST&quot; name=&quot;cadastro&quot; action=&quot;editarproduto.php&quot;&gt;<br />
                      &lt;input type=&quot;hidden&quot; name=&quot;id&quot; value=&quot;&lt;?php echo $id; ?&gt;&quot; /&gt;<br />
                      Nome do Produto: &lt;input type=&quot;text&quot; size=&quot;20&quot; name=&quot;nome&quot; value=&quot;&lt;?php echo &quot;$nome&quot;; ?&gt;&quot;&gt;&lt;br&gt;<br />
                      Quantidade: &lt;input type=&quot;text&quot; size=&quot;20&quot; name=&quot;quantidade&quot; value=&quot;&lt;?php echo &quot;$quantidade&quot;; ?&gt;&quot;&gt;&lt;br&gt;<br />
                      Marca: &lt;input type=&quot;text&quot; size=&quot;20&quot; name=&quot;marca&quot; value=&quot;&lt;?php echo &quot;$marca&quot;; ?&gt;&quot;&gt;&lt;br&gt;<br />
                      Peso: &lt;select size=&quot;1&quot; name=&quot;peso&quot;&gt;<br />
  &lt;option value=&quot;&lt;?php echo &quot;$peso&quot;; ?&gt;&quot;&gt;&lt;?php echo &quot;$peso&quot;; ?&gt;&lt;/option&gt;<br />
  &lt;option value=&quot;10 g&quot;&gt;10 g&lt;/option&gt;<br />
  &lt;option value=&quot;100 g&quot;&gt;100 g&lt;/option&gt;<br />
  &lt;option value=&quot;500 g&quot;&gt;500 g&lt;/option&gt;<br />
  &lt;option value=&quot;1 Kg&quot;&gt;1 Kg&lt;/option&gt;<br />
  &lt;option value=&quot;5 Kg&quot;&gt;5 Kg&lt;/option&gt;<br />
  &lt;/select&gt;&lt;br&gt;&lt;br&gt;<br />
  &lt;input type=&quot;submit&quot; value=&quot;Atualizar Produto&quot;&gt;<br />
  &lt;/form&gt;<br />
  &lt;?php<br />
                      }<br />
                      ?&gt;<br />
  &lt;/BODY&gt;<br />
  &lt;/HTML&gt;</p>
<p>Abaixo segue a criação do arquivo <strong>editarproduto.php</strong> para realizarmos a atualização do produto no banco de dados:</p>
                    <p>&lt;HTML&gt;<br />
                      &lt;HEAD&gt;<br />
&lt;TITLE&gt;Editar Produto&lt;/TITLE&gt;<br />
&lt;/HEAD&gt;<br />
&lt;BODY&gt;<br />
&lt;?php include(&quot;menu.php&quot;); ?&gt;<br />
&lt;?php<br />
include(&quot;conexao.php&quot;);<br />
?&gt;<br />
&lt;?php</p>
                    <p>$id = $_POST[&quot;id&quot;];<br />
                      $nome = $_POST[&quot;nome&quot;];<br />
                      $quantidade = $_POST[&quot;quantidade&quot;];<br />
                      $marca = $_POST[&quot;marca&quot;];<br />
                      $peso = $_POST[&quot;peso&quot;];</p>
                    <p>$sql = &quot;UPDATE produtos SET nome = '$nome', quantidade = '$quantidade', marca = '$marca', peso = '$peso' WHERE id = '$id'&quot;;<br />
                      if(mysql_query($sql)) {<br />
                      echo &quot;O PRODUTO FOI EDITADO COM SUCESSO!!&quot;;<br />
                      }else{<br />
                      echo &quot;NÃO FOI POSSÍVEL EDITAR O PRODUTO&quot;;<br />
                      }</p>
                    <p>?&gt;<br />
                      &lt;/BODY&gt;<br />
                      &lt;/HTML&gt;</p>
                    <p>Para finalizar criaremos o arquivo <strong>delproduto.php</strong> para a exclusão do produto:</p>
                    <p>&lt;HTML&gt;<br />
                      &lt;HEAD&gt;<br />
&lt;TITLE&gt;Editar Produto&lt;/TITLE&gt;<br />
&lt;/HEAD&gt;<br />
&lt;BODY&gt;<br />
&lt;?php include(&quot;menu.php&quot;); ?&gt;<br />
&lt;?php<br />
include(&quot;conexao.php&quot;);<br />
?&gt;<br />
&lt;?php</p>
                    <p>$id = $_GET['id'];</p>
                    <p>$sql = &quot;DELETE FROM produtos WHERE id='$id'&quot;;<br />
                      if(mysql_query($sql)) {<br />
                      echo &quot;O PRODUTO FOI APAGADO COM SUCESSO!!&quot;;<br />
                      }else{<br />
                      echo &quot;NÃO FOI POSSÍVEL APAGAR O PRODUTO&quot;;<br />
                      }</p>
                    <p>?&gt;<br />
                      &lt;/BODY&gt;<br />
                      &lt;/HTML&gt;<br />
                    </p></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="10" /></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>
