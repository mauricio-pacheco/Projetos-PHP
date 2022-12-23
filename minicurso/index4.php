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
                  <td>&nbsp;&nbsp;<strong>MINI CURSO DE PHP e MySQL - ESTRUTURAS E CONTROLE</strong></td>
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
                  <td class="fontetabela"><p><strong>Estruturas de Controle</strong></p>
                    <p>Estruturas de controle são usadas para direcionar a execução de um bloco de script. Para esse ‘direcionamento’ ocorrer, é necessário que alguma variável aceite determinada condição. Por exemplo: Um script que a pessoa informe a idade. Caso a idade informada seja maior que 18 anos, você vai imprimir na tela: “<strong>Você já é maior de idade”</strong>, caso contrário (menor que 18 anos) você vai imprimir na tela: <strong>“Você ainda é menor de idade.”</strong>.<br />
                      Ou seja, teríamos dois blocos de scripts distintos. </p>
                    <ol type="1">
                      <li>Mostrar <strong>Você já é maior de idade. </strong></li>
                      <li>Mostrar <strong>Você ainda é menor de idade</strong>.</li>
                    </ol>
                    <p>Mas, dependendo da condição proposta (a idade ser maior ou menor que 18 anos), apenas um bloco de script será executado.</p>
                    <p>Estruturas de controle também são chamadas de <strong>Condicionais</strong>.</p>
                    <p><strong>IF</strong></p>
                    <p>O comando condicional mais usado, sem dúvida é o IF. Ele á uma condição que executa um bloco de script se a condição proposta for verdadeira. Ele possui algumas sintaxes diferentes:</p>
                    <p>[Não recomendado]</p>
                    <div>
                      <p>if (expressão)</p>
                      <p> comando;</p>
                    </div>
                    <p>Executa apenas <strong>UM</strong> comando caso a expressão seja verdadeira.</p>
                    <p>[Não recomendado]</p>
                    <div>
                      <p>if (expressão):</p>
                      <p> comando;</p>
                      <p>. . .</p>
                      <p> comando;</p>
                      <p>endif;</p>
                    </div>
                    <p>Executa <strong>VÁRIOS</strong> comandos caso a expressão seja verdadeira. Como existem vários comandos a serem executados, há a necessidade de falar para o PHP quando terminar o IF. Usando o endif.</p>
                    <p>[Este é recomendado]</p>
                    <div>
                      <p>if (expressão){</p>
                      <p> comando1;</p>
                      <p> comando2;</p>
                      <p>}</p>
                    </div>
                    <p>Executa <strong>UM </strong>ou<strong> MAIS</strong> comandos caso a expressão seja verdadeira. Repare que nesta sintaxe, utilizamos os caracteres “<strong>{</strong>“ e ”<strong>}</strong>” para delimitar o bloco de comandos que será executado. Esta sintaxe é mais recomendada, pois seu código fica mais ‘legível’.</p>
                    <p>A diferença deste para o primeiro são os colchetes (<strong>{</strong> e <strong>}</strong>).</p>
                    <p><strong> ELSE</strong></p>
                    <p><strong> </strong>O else é um comando opcional da condicional IF. Caso a expressão seja falsa, ira rodar o bloco de código do ELSE.</p>
                    <p> Veja exemplos da sintaxe do IF com a utilização do ELSE:</p>
                    <div>
                      <p>if (expressão)</p>
                      <p> comando;</p>
                      <p>else</p>
                      <p> comando;</p>
                    </div>
                    <p> </p>
                    <div>
                      <p>if (expressão):</p>
                      <p> comando;</p>
                      <p> . . .</p>
                      <p> comando;</p>
                      <p>else</p>
                      <p> comando;</p>
                      <p> . . .</p>
                      <p> comando;</p>
                      <p>endif;</p>
                    </div>
                    <p> </p>
                    <div>
                      <p>if (expressão){</p>
                      <p> comando1;</p>
                      <p> comando2;</p>
                      <p>} else {</p>
                      <p> comando3;</p>
                      <p> comando4;</p>
                      <p>}</p>
                    </div>
<p align="center"><strong>** TUDO QUE EU FIZER COM A CONDICIONAL IF, DAQUI EM DIANTE, USAREI A TERCEIRA SINTAXE APRESENTADA **</strong></p>
                    <p>Em algumas situações, é necessário fazer mais de uma condição para a variável . Por exemplo, usando o exemplo do inicio deste post, você imprimia na tela duas mensagens: </p>
                    <ol type="1">
                      <li>Mostrar <strong>Você já é maior de idade. </strong>(idade      maior que 18 anos)</li>
                      <li>Mostrar <strong>Você ainda é menor de idade</strong>.      (idade menos que 18 anos)</li>
                    </ol>
                    <p>Agora, teremos três opções de frases. </p>
                    <ol type="1">
                      <li>Mostrar <strong>Você ainda é criança. </strong>(idade menor      que 12 anos)</li>
                      <li>Mostrar <strong>Você ainda é adolesceste</strong>.      (idade maior que 12 anos)</li>
                      <li>Mostrar <strong>Você já é maior de idade</strong>.      (idade maior que 18 anos) </li>
                    </ol>
<p>Neste caso utilizaremos o ELSEIF ou ELSE IF. Veja abaixo: </p>
<p>if (expressão){</p>
                    <p> comando1;</p>
                    <p>} <strong>else if(express){</strong></p>
                    <p><strong> Comando2;</strong></p>
                    <p><strong>} </strong>else {</p>
                    <p> Comando3;</p>
                    <p>} </p>
<p><strong>SWITCH</strong></p>
                    <p>O switch é uma maneira semelhante de fazer uma série de if’s na mesma expressão. Geralmente utilizados, quando um valor pode ter muitas condições. Veja o exemplo abaixo, farei a mesma coisa usando o IF e o SWITCH.</p>
                    <div>
                      <p>if ($mes == “1”){</p>
                      <p> <span lang="EN-US" xml:lang="EN-US">echo “Janeiro”;</span></p>
                      <p><span lang="EN-US" xml:lang="EN-US">} else if($mes == “2”){</span></p>
                      <p><span lang="EN-US" xml:lang="EN-US"> </span>echo “Fevereiro”;</p>
                      <p>} else if($mes == “3”){</p>
                      <p> echo “Março”;</p>
                      <p><span lang="EN-US" xml:lang="EN-US">} else if($mes == “4”){</span></p>
                      <p><span lang="EN-US" xml:lang="EN-US"> echo “Abril”;</span></p>
                      <p><span lang="EN-US" xml:lang="EN-US">} else if($mes == “5”){</span></p>
                      <p><span lang="EN-US" xml:lang="EN-US"> echo “Maio”;</span></p>
                      <p><span lang="EN-US" xml:lang="EN-US">}</span></p>
                    </div>
                    <p><span lang="EN-US" xml:lang="EN-US"> </span></p>
                    <div>
                      <p>switch ($mes) {</p>
                      <p> case 1:</p>
                      <p> echo “Janeiro”;</p>
                      <p> <span lang="EN-US" xml:lang="EN-US">break;</span></p>
                      <p><span lang="EN-US" xml:lang="EN-US"> </span>case 2:</p>
                      <p><span lang="EN-US" xml:lang="EN-US"> </span>echo “Fevereiro”;</p>
                      <p> break;</p>
                      <p> case 3:</p>
                      <p> echo “Março”;</p>
                      <p> break;</p>
                      <p> case 4:</p>
                      <p> <span lang="EN-US" xml:lang="EN-US">echo “Abril”;</span></p>
                      <p> break; </p>
                      <p> case 5:</p>
                      <p> <span lang="EN-US" xml:lang="EN-US">echo “Maio”;</span></p>
                      <p> break;</p>
                      <p>}</p>
                    </div>
                    <p>No switch, utilize-se o break para interromper a execução do switch quando ele achar o valor verdadeiro. Ou seja, se você não usar o break, o switch vai RODAR TODOS OS COMANDOS DE TODOS OS CASE’S.<br />
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
