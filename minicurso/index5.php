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
                  <td>&nbsp;&nbsp;<strong>MINI CURSO DE PHP e MySQL - COMANDOS DE REPETIÇÃO</strong></td>
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
                  <td class="fontetabela"><p><strong>Comandos de repetição (loops)<br />
                  </strong></p>
                    <p>Como o nome já diz, comandos de repetição repetem determinado bloco de código. Existem várias formas para fazer esta repetição.                    </p>
                    <ul type="disc">
                      <li>while</li>
                      <li>do…      while</li>
                      <li>for</li>
                    </ul>
<p>Vou explicar as três formas usando o mesmo exemplo: Mostrar na tela os números de 1 a 10. Ok?                    </p>
                    <p><strong>WHILE<br /><br />
                      </strong>Este é o laço de repetição mais simples. Ele testa uma condição e enquanto (while) a condição for verdadeira, ele repete seu conteúdo. Uma coisa importante é que se a condição for falsa, ele <strong>NÃO</strong> entra no while.<br />
                      WHILE significa enquanto. Então leríamos assim: <strong>Enquanto</strong> a condição seja verdadeira, faça as instruções.                    </p>
                    <p>Mostrarei a sintaxe que eu uso. A que fica com uma melhor legibilidade. Caso queira ver mais sintaxes acesse <a href="http://br2.php.net/manual/pt_BR/control-structures.while.php" target="_new">php.net</a>.                    </p>
                    <p>Veja o exemplo que foi proposto usando while:                    </p>
                    <p>$tab = 4;<br />
                      $X = 1;<br />
                      while ($X &lt; = 10) {<br />
echo $tab*$X++,”<br />
“; <br />
}</p>
                    <p><strong>Explicação por linha:</strong></p>
                    <p><strong>1)</strong> Inicializei uma variável que vai servir como um contador.<br />
                      <strong>2)</strong> Inicio o while e faço a seguinte condição: Enquanto a minha variável de contador for MENOR ou IGUAL a 10<br />
                      <strong>3)</strong> Informei o que será repetido enquanto a minha condição for verdadeira.<br />
                      <strong>4)</strong> Finalizei o while                    </p>
                    <p>Perceba que, se inicializarmos o contador com 11, a linha 4 não será executada nenhuma vez. Pelo fato de que a condição será falsa.                    </p>
                    <p>Perceberam como é fácil?<br /><br />
                      Um outro exemplo de aplicação do while muito utilizado é: Você seleciona os dados de um banco de dados e ENQUANTO não acabar os registros, você vai mostrá-los na tela.                    </p>
                    <p><strong>DO… WHILE</strong><strong><br /><br />
                      </strong>Ele é muito semelhante ao while, porém, ele <strong>SEMPRE</strong> executa alguma coisa antes de testar a condição.<br /><br />
                      DO significa faça. Então leríamos assim: <strong>Faça</strong> as instruções <strong>enquanto</strong> a condição seja verdadeira.                    </p>
<p>Mostrarei a sintaxe que eu uso. A que fica com uma melhor legibilidade. Caso queira ver mais sintaxes acesse <a href="http://br2.php.net/manual/pt_BR/control-structures.do.while.php" target="_new">php.net</a>.</p>
                    <p>Veja o exemplo que foi proposto usando while:                    </p>
                    <p>$tab = 4;<br />
                      $X = 1;<br />
                      do {echo $tab*$X++; <br />
                      }while ($X &lt; = 10) {</p>
                    <p><strong>Explicação por linha:</strong></p>
                    <p><strong>1)</strong> Inicializei uma variável que vai servir como um contador.<br />
                      <strong>2)</strong> Inicio o comando do…while<br />
                      <strong>3)</strong> Informei o que será feito.<br />
                      <strong>4)</strong> Finalizei o do…while informando a seguinte condição: Enquanto a minha variável de contador for MENOR ou IGUAL a 10                    </p>
                    <p>Você percebe que o do…while <strong>SEMPRE</strong> vai rodar seu conteúdo ao menos uma vez? Imagina que inicializamos o contador com 11. <br />
                      O que vai acontecer? Ele vai imprimir na tela “12” e vai sair do do…while, pois a condição será falsa.                    </p>
                    <p><strong>FOR<br />
                      </strong>O for é o laço de repetição mais complexo, ou melhor, menos fácil.<br />
                      Lembra que no while e no do…while inicializamos uma variável fora do comando? E a incrementávamos(com o ++) dentro do comando? No caso do for, inicializaremos a variável e faremos o incremento / decremento dentro do próprio comando.                    </p>
                    <p>Mostrarei a sintaxe que eu uso. A que fica com uma melhor legibilidade. Caso queira ver mais sintaxes acesse <a href="http://br2.php.net/manual/pt_BR/control-structures.for.php" target="_new">php.net</a>.                    </p>
                    <p>$tab = 4; <br />
                      for ($X = 1;$X &lt; = 10; $X++) {<br />
                      echo $X*$tab;<br />}</p>
                    <p><strong>Explicação por linha:</strong></p>
                    <p><strong>1)</strong> Inicializei o for e já defino a variável que será o contador. Informo a condição e como o contador será incrementado.<br />
                      <strong>2)</strong> Informo os comandos que serão executados enquanto a condição seja verdadeira.<br />
                      <strong>3)</strong> Finalizo o for. <strong><br />
                      </strong></p>
<p><strong>QUEBRA DE FLUXO</strong></p>
                    <p>Podemos quebrar o fluxo do nosso loop. Podemos interromper ou iniciar o loop novamente. </p>
                    <p><strong>BREAK</strong> (já visto em switch, na aula 6)</p>
                    <p>Ele PARA a execução do loop.<strong><br />
                    </strong></p>
<p><strong>CONTINUE</strong></p>
                    <p>Ao contrário do break, ele inicial o loop novamente.<br />
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
