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
                  <td>&nbsp;&nbsp;<strong>MINI CURSO DE PHP e MySQL - INCLUDES</strong></td>
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
                  <td class="fontetabela"><p><strong>Includes</strong></p>
                    <p>Iremos incluir um menu com links do nosso sistema de cadastro de produtos utilizando uma include. Abaixo segue o escopo de como será nosso menu:</p>
                    <p>CADASTRAR PRODUTO</p>
                    <p>ADMINISTRAR PRODUTOS</p>
<p>Mas vale lembrar que ainda temos MUITA coisa para aprender sobre a linguagem PHP. Decidi ensinar o restante fazendo alguns sistemas simples, para que o aprendizado seja mais dinâmico e que o que for aprendido seja visto na pratica.</p>
                    <p>Antes de começarmos o nosso sistema, temos algumas coisas muito importantes para aprender. São elas:</p>
                    <p>Includes;</p>
                    <p>Comandos básicos de Mysql;</p>
                    <p>Comandos do PHP para trabalhar com Mysql.                    </p>
                    <p><strong>INCLUDE</strong></p>
                    <p>Como o próprio nome sugere, include é um comando que <strong>INCLUI</strong> o conteúdo de outro arquivo onde ele é chamado. É como se você copiasse o código do arquivo e colasse onde você quer usar.<br />
                    </p>
                    <p>Qual o sentido de usar o INCLUDE? Bom, imagine que sua administração tenha 20 paginas. E seu menu precisa estar em todas. Ai você vai ter que mudar as 20 páginas que este menu. Usando INCLUDE este problema acaba… pois todas as 20 paginas usam o MENU que esta escrito no arquivo que será incluído.</p>
<p>Utilizamos um INCLUDE da seguinte forma:</p>
                    <div>
                      <p>&lt;?php include(&quot;caminho&quot;); ?&gt;</p>
                    </div>
                    <p>Criando o arquivo <strong>menu.php</strong> :</p>
                    <p>&lt;a href=&quot;index.php&quot;&gt;CADASTRAR PRODUTO&lt;/a&gt;&lt;br&gt;&lt;br&gt;<br />
                      &lt;a href=&quot;admprodutos.php&quot;&gt;ADMINISTRAR PRODUTOS&lt;/a&gt;&lt;br&gt;&lt;br&gt;</p>
                    <p>Comando para incluir o arquivo<strong> menu.php</strong> em nosso sistema:</p>
                    <div>
                      <p>&lt;?php include(&quot;menu.php&quot;); ?&gt;</p>
                    </div>
                    <p>O caminho do arquivo é a pasta e o nome do arquivo que será incluído, por exemplo: <strong>“includes/menu.php”</strong>. Para incluir um arquivo que está uma pasta abaixo, você vai usar “..” para sair da pasta onde seu arquivo esta rodando. Por exemplo: <strong>“../includes/menu.php”</strong>. E assim por diante… se quiser incluir um arquivo que esta a três nível abaixo você usa: <strong>“../../../includes/menu.php”</strong></p>
                    <p><strong>IMPORTANTE</strong></p>
<p>Caso o arquivo include não ache o arquivo solicitado.. ele <strong>NÃO IRÁ DAR ERRO</strong>… o script vai seguir normalmente. Então em muitos casos, ao invés de usar o comando include() é mais aconselhável usar o comando <strong>REQUIRE</strong>, pois caso o arquivo não seja encontrado o script não continuara rodando. O interpretador do PHP ira dar erro.</p>
                    <p>Para saber mais sobre INCLUDE ou REQUIRE acesse a documentação no php.net: <a href="http://br2.php.net/manual/pt_BR/function.include.php" target="_blank">http://br2.php.net/manual/pt_BR/function.include.php</a><br />
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
