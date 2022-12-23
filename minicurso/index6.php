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
                  <td>&nbsp;&nbsp;<strong>MINI CURSO DE PHP e MySQL - FORMULÁRIOS</strong></td>
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
                  <td class="fontetabela"><p><strong>Formulários</strong></p>
                    <p>O objetivo desta aula é ensinar como trabalhar com formulários e recuperar os dados no PHP. Uma vez que os dados sejam recuperados pelo PHP, você pode utilizar os dados para diversas coisas: Cadastrar no banco de dados, direcionar o usuário para uma parte do seu site, colocar uma área restrita no seu site onde o usuário informe sua senha para acessar, etc…</p>
                    <p>Antes de mais nada, você precisa saber como inserir um formulário na sua página. Se não souber nada de HTML… acesse o link abaixo para ver como um formulário funciona.</p>
                    <p><a href="http://www.criarweb.com/artigos/93.php" target="_new">http://www.criarweb.com/artigos/93.php</a></p>
                    <p>Mas, para o formulário funcionar, precisamos dos campos que receberão os dados. Sejam eles em forma de texto, ou um botão, uma lista de opções…</p>
                    <p>Como não quero falar de HTML, vou passar umas referências de um site que explica como declarar os tipos de campos no formulário. Acesse:</p>
                    <p><a href="http://www.criarweb.com/artigos/101.php" target="_new">http://www.criarweb.com/artigos/101.php</a><br />
                      <a href="http://www.criarweb.com/artigos/117.php" target="_new">http://www.criarweb.com/artigos/117.php</a><br />
                      <a href="http://www.criarweb.com/artigos/127.php" target="_new">http://www.criarweb.com/artigos/127.php</a>                    </p>
                    <p>Mas como faço pra receber os dados do formulário em uma página PHP?</p>
                    <p>O PHP utiliza variáveis <a href="http://www.php.net/manual/pt_BR/language.variables.superglobals.php" target="_new">super-globais</a> para receber os dados. São elas:</p>
                    <ul type="disc">
                      <li><a href="http://www.php.net/manual/pt_BR/reserved.variables.get.php" target="_new">$_GET</a>
                        <ul type="circle">
                          <li>Quando o método de envio for GET. Se você       definir o “name” de um campo como ‘nome_cliente’, você vai acessá-lo       assim: $_GET[“nome_cliente”]</li>
                          </ul>
                        </li>
                      <li><a href="http://www.php.net/manual/pt_BR/reserved.variables.post.php" target="_new">$_POST</a>
                        <ul type="circle">
                          <li>Quando o método de envio for POST. Se você       definir o “name” de um campo como ‘nome_cliente’, você vai acessá-lo       assim: $_POST[“nome_cliente”]</li>
                          </ul>
                        </li>
                    </ul>
                    <p>Ainda podemos utilizar a super-global <a href="http://www.php.net/manual/pt_BR/reserved.variables.request.php" target="_new">$_REQUEST</a>, esta super-global recebe os dados de $_POST + $_GET + <a href="http://www.php.net/manual/pt_BR/reserved.variables.cookies.php" target="_new">$_COOKIE</a>(veremos mais a frente).</p>
                    <p>Então, a estrutura geralmente é a seguinte:</p>
                    <p>Temos uma página com o formulário e outra página que vai receber os dados e fazer o processamento. Veja a imagem abaixo:</p>
                    <p align="center"><img title="Esquema utilizado para o funcionamento do formulário" alt="FORMULÁRIOS" src="imagens/form.jpg" width="427" height="166" /></p>
                    <p>Como você estudou os links que eu passei, crie uma página chamada<strong> index.php</strong> com o seguinte código fonte <em>(Utilizando o PHP Editor)</em>:</p>
                    <p>&lt;HTML&gt;<br />
                      &lt;HEAD&gt;<br />
&lt;TITLE&gt;Cadastro do Mini Curso&lt;/TITLE&gt;<br />
&lt;/HEAD&gt;<br />
&lt;BODY&gt;<br />
&lt;?php include(&quot;menu.php&quot;); ?&gt;<br />
&lt;?php<br />
echo &quot;Preencha o Formulário abaixo para cadastrar o produto:&quot;;<br />
?&gt;<br />
&lt;form method=&quot;POST&quot; name=&quot;cadastro&quot; action=&quot;cadastrar.php&quot;&gt;<br />
Nome do Produto: &lt;input type=&quot;text&quot; size=&quot;20&quot; name=&quot;nome&quot;&gt;&lt;br&gt;<br />
Quantidade: &lt;input type=&quot;text&quot; size=&quot;20&quot; name=&quot;quantidade&quot;&gt;&lt;br&gt;<br />
Marca: &lt;input type=&quot;text&quot; size=&quot;20&quot; name=&quot;marca&quot;&gt;&lt;br&gt;<br />
Peso: &lt;select size=&quot;1&quot; name=&quot;peso&quot;&gt;<br />
&lt;option value=&quot;10 g&quot;&gt;10 g&lt;/option&gt;<br />
&lt;option value=&quot;100 g&quot;&gt;100 g&lt;/option&gt;<br />
&lt;option value=&quot;500 g&quot;&gt;500 g&lt;/option&gt;<br />
&lt;option value=&quot;1 Kg&quot;&gt;1 Kg&lt;/option&gt;<br />
&lt;option value=&quot;5 Kg&quot;&gt;5 Kg&lt;/option&gt;<br />
&lt;/select&gt;&lt;br&gt;&lt;br&gt;<br />
&lt;input type=&quot;submit&quot; value=&quot;Cadastrar&quot;&gt;<br />
&lt;/form&gt;<br />
&lt;/BODY&gt;<br />
&lt;/HTML&gt;</p>
                    <p><strong>1:</strong> Inicializei o formulário, informei que o método de envio das variáveis será POST e que o formulário será submetido(action) para a página <strong>“cadastrar.php”</strong>.</p>
                    <p><strong>2:</strong> declaração dos campos do tipo texto com o<strong> ‘nome’, ‘quantidade’, ‘marca’ e ‘peso’</strong> identificando a que o campo se refere e para recuperar no PHP.</p>
                    <p><strong>3:</strong> O botão de <strong>Cadastrar</strong>.</p>
                    <p>O resultado desta tela no navegador é o seguinte:</p>
                    <p align="center"><img title="form2" alt="form2 Mini curso de PHP (Parte 8)   FORMULÁRIOS" src="imagens/formulario.jpg" width="365" height="188" /></p>
                    <p>Agora vamos criar o arquivo <strong>cadastrar.php</strong>. Este, será responsável por mostrar na tela o que a pessoa digitou no formulário. Crie o arquivo na mesma pasta do form.php com o seguinte código PHP:</p>
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
echo &quot;O produto cadastrado é:&lt;br&gt;&lt;b&gt;Nome do Produto:&lt;/b&gt; $nome &lt;br&gt;&lt;b&gt;Quantidade:&lt;/b&gt; $quantidade &lt;br&gt;&lt;b&gt;Marca:&lt;/b&gt; $marca &lt;br&gt; &lt;b&gt;Peso:&lt;/b&gt; $peso&quot;;<br />
?&gt;<br />
&lt;/BODY&gt;<br />
&lt;/HTML&gt;</p>
                    <p><strong>1:</strong> Como o método do formulário foi POST, estamos atribuindo a variável $nome o valor digitado no campo ‘nome’, a mesma situação para as demais variáveis.</p>
                    <p><strong>2:</strong> Estamos imprimindo uma frase onde utilizamos as variáveis que contem o valor dos campos.</p>
<p>Rodando o script, você verá algo parecido com isso:</p>
                    <p align="center"><img src="imagens/cad.jpg" width="255" height="152" /><br />
                    </p>
                    <p>
                      <center>
                      </center>
                    </p>
                    <p><br />
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
