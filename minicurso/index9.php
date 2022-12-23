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
                  <td>&nbsp;&nbsp;<strong>MINI CURSO DE PHP e MySQL - MySQL no PHP</strong></td>
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
                  <td class="fontetabela"><p><strong>MySQL no PHP</strong></p>
                    <p>O objetivo desta sessão é fazer com que nosso site/sistema conecte ao Mysql.<br />
                      Você já ouviu aquele ditado: “<strong>Uma coisa é uma coisa, outra coisa é outra coisa.</strong>”? Então, esse ditado se aplica perfeitamente.</p>
                    <p>PHP é uma coisa, Mysql é outra!</p>
<p>PHP é uma linguagem de programação para fazer sites dinâmicos. Mysql é um banco de dados e serve para armazenar informações.</p>
                    <p>Teremos que fazer com que uma coisa <em>(PHP)</em> converse com outra coisa <em>(Mysql)</em>.</p>
                    <p>Para tal feito, o PHP disponibiliza alguns comandos que são chamados de funções. Uma função <strong>SEMPRE</strong> vai fazer alguma coisa.</p>
                    <p>Antes de falar das funções, veja a ordem das coisas que acontecem quando vamos utilizar um banco de dados em nosso site.</p>
                    <ol type="1">
                      <li>Precisamos      conectar ao host;</li>
                      <li>Selecionar      o banco de dados;</li>
                      <li>Executamos      comandos SQL para mostrar as informações do banco de dados ou inserir      novas informações;</li>
                      <li>Fechamos      a conexão com o banco de dados;</li>
                    </ol>
                    <p>Ok? Um site que utiliza banco de dados SEMPRE é assim.</p>
                    <p>Seguindo o esquema apresentado a cima, vejamos as funções que são utilizadas para executar estes passos:</p>
                    <ol type="1">
                      <li>mysql_connect();</li>
                      <li>mysql_select_db();</li>
                      <li>mysql_query();</li>
                      <li>mysql_close();</li>
                    </ol>
                    <p>Muito simples né? 4 comandinhos e nosso site já se comunica com o banco de dados… isso é fantástico!</p>
                    <p>Tem mais algumas coisinhas simples que precisamos saber antes de começar a programar.</p>
                    <p>Todo banco de dados possui usuários com senhas. Não precisa nem falar o por que né? Imagina se descobríssemos o HOST do banco de dados do Banco do Brasil? Caso não tenha senha, simplismente poderíamos fazer qualquer coisa no banco de dados.<br /><br />
                      Então para usar a função mysql_connect() vamos precisar das seguintes informações: HOST, USUARIO, SENHA e o DATABASE. O código ficará assim:</p>
                    <div>
                      <p>mysql_connect(HOST, USUARIO, SENHA);<br />
                        mysql_select_db(DATABASE);</p>
                    </div>
                    <p>Como provavelmente instalamos o XAMPP para fazer este curso. Os dados de acesso ao Mysql são:</p>
                    <p>HOST: localhost<br />
                      USUARIO: root<br />
                      SENHA:</p>
                    <p>Isso mesmo! Não tem senha.</p>
                    <p>Agora iremos criar o nosso arquivo de conexão com o banco de dados chamado <strong>conexao.php</strong>: </p>
                    <p>&lt;?<br />
$con = mysql_connect(&quot;localhost&quot;, &quot;root&quot;, &quot;&quot;);<br />
mysql_select_db(&quot;minicurso&quot;);<br />
if($con){<br />
echo &quot;&quot;;<br />
} else {<br />
echo &quot;Erro ao conectar ao banco de dados!&quot;;<br />
}<br />
?&gt;</p>
                    <p>Este código não esta 100% pra falar a verdade, ele é só para demonstrar para você como é simples. Vamos linha a linha:</p>
                    <p><strong>2</strong>: Faz a conexão com o banco de dados e armazena o resultado em uma variável;<br />
                      <strong>3</strong>: Seleciona o database;<br />
                      <strong>5</strong>: Faz um IF para testar a variável que recebeu o resultado do mysql_connect(), caso a variável não existir, significa que a conexão falhou.<br />
                      O restante não precisa explicar!! heheheheheh</p>
                    <p>E o mysql_close() ??????<br />
                      Bom, neste caso, o PHP fecha a conexão sozinho. Veja a referencia: <a href="http://br.php.net/manual/pt_BR/function.mysql-close.php" target="_blank">http://br.php.net/manual/pt_BR/function.mysql-close.php</a></p>
                    <p>Tudo que eu falei ate agora você pode comprovar e/ou aprofundar no assunto no seguinte link: <a href="http://br.php.net/manual/pt_BR/book.mysql.php" target="_blank">http://br.php.net/manual/pt_BR/book.mysql.php</a><br />
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
