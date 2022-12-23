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
                  <td>&nbsp;&nbsp;<strong>MINI CURSO DE PHP e MySQL - MySQL no PHP - INSERT E SELECT</strong></td>
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
                  <td class="fontetabela"><p><strong>MySQL no PHP - INSERT E SELECT</strong></p>
                    <p>Nesta sessão vamos aprender como fazer um <strong>cadastro</strong> no Mysql e como <strong>recuperar os dados</strong>. Tentarei ser o mais breve possível.</p>
                    <p>Então, como estamos aprendendo PHP e Mysql, não vou me deter a estruturar os arquivos do nosso sistema. Vamos fazê-lo utilizando:</p>
                    <ul>
                      <li>Um      arquivo para conexão com o banco de dados; <em>(<strong>conexao.php</strong>) – este será usado em todo o sistema(será chamado pelo      comando include()).</em></li>
                      <li>Um      arquivo com o formulário para cadastro; <em>(<strong>index.php</strong>)</em></li>
                      <li>Um      arquivo para efetuar o cadastro<em>; (<strong>cadastrar.php</strong>)</em></li>
                      <li>Um      arquivo com a lista dos registros do banco de dados(iremos criar nesta sessão); <em>(<strong>admprodutos.php</strong>)</em></li>
                    </ul>
                    <p>Vamos começar abrindo nosso arquivo <strong>cadastrar.php</strong> para gravarmos os dados no banco de dados:</p>
                    <p>&lt;HTML&gt;<br />
                      &lt;HEAD&gt;<br />
&lt;TITLE&gt;Cadastrar Produto&lt;/TITLE&gt;<br />
&lt;/HEAD&gt;<br />
&lt;BODY&gt;<br />
&lt;?php include(&quot;menu.php&quot;); ?&gt;<br />
&lt;?php<br />
$nome = $_POST[&quot;nome&quot;];<br />
$quantidade = $_POST[&quot;quantidade&quot;];<br />
$marca = $_POST[&quot;marca&quot;];<br />
$peso = $_POST[&quot;peso&quot;];<br />
echo &quot;O produto cadastrado é:&lt;br&gt;&lt;b&gt;Nome do Produto:&lt;/b&gt; $nome &lt;br&gt;&lt;b&gt;Quantidade:&lt;/b&gt; $quantidade &lt;br&gt;&lt;b&gt;Marca:&lt;/b&gt; $marca &lt;br&gt; &lt;b&gt;Peso:&lt;/b&gt; $peso&quot;;</p>
                    <p><strong>//Comandos de inserção no banco de dados<br />
                      echo &quot;&lt;br&gt;&lt;br&gt;&quot;;<br />
                      include(&quot;conexao.php&quot;);<br />
                      $sql = &quot;INSERT INTO produtos (nome, quantidade, marca, peso) VALUES ('$nome', '$quantidade', '$marca', '$peso')&quot;;<br />
                      $sql = mysql_query($sql);<br />
                      if($sql){<br />
                      echo &quot;&lt;br&gt;Cadastro efetuado no Banco de Dados&quot;;<br />
                      } else {<br />
                      echo &quot;Ops.. ocorreu algum erro:&quot;;<br />
                      }</strong></p>
                    <p>?&gt;<br />
                      &lt;/BODY&gt;<br />
                      &lt;/HTML&gt;</p>
                    <p>Agora iremos criar o arquivo <strong>admprodutos.php</strong> para analisar nossos cadastros na tabela do banco de dados:</p>
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
                      Peso: &lt;?php echo &quot;$peso&quot;; ?&gt;&lt;br&gt;&lt;br&gt;</p>
                    <p>&lt;?php<br />
                      }<br />
                      ?&gt;<br />
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
