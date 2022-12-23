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
                  <td>&nbsp;&nbsp;<strong>MINI CURSO DE PHP e MySQL - INTRODUÇÃO</strong></td>
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
                  <td class="fontetabela"><p><strong>Sintaxe Básica</strong></p>
                    <p>Como já foi falado, os scripts de PHP são embutidos dentro do HTML. Como você já sabe, os códigos HTML são delimitados por &lt;(menor) e &gt; (maior). Por exemplo:                    </p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;b&gt;Mini-Curso de PHP&lt;/b&gt;</div>
                          </li>
                        </ol>
                    </div>
                    <p><strong>Mini-Curso de PHP</strong> – Colocamos o texto em negrito.</p>
                    <p>Semelhantemente ao HTML, o PHP também fica dentro de um delimitador. Isto serve para que o “interpretador” saiba quando começa um script PHP.</p>
                    <p>Podemos usar as seguintes tags para delimitar um script (um bloco de códigos) PHP.</p>
                    <p><img title="tipo-de-tags-para-abertura" alt="SINTAXE, VARIÁVEIS E TIPOS" src="imagens/tipo-de-tags-para-abertura.jpg" width="206" height="205" /></a></p>
                    <p>O tipo de tag mais utilizada é a terceira, que é a forma mais simplificada. Para poder utilizar esta tag, a opção <a href="http://br.php.net/ini.core" target="_blank">short-tags do php.ini</a> precisa estar habilitada.                    </p>
                    <p>Exemplo de utilização:                    </p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                          </li>
                        <li>
                          <div><a href="http://www.php.net/echo">echo</a> &quot;Olá mundo!&quot;;</div>
                          </li>
                        <li>
                          <div>?&gt;</div>
                          </li>
                        </ol>
                    </div>
                    <p><strong>Analisando o exemplo: </strong></p>
                    <ul type="disc">
                      <li>Na linha 1, abrimos uma tag PHP para informar ao      interpretador que queremos rodar algum comando PHP.</li>
                      <li>Na linha 2, utilizamos o comando echo do PHP, que      serve para imprimir algo na tela.</li>
                      <li>Na linha 3, fechamos a tag PHP, assim, o interpretador      sabe que nosso script PHP acabou.                    </li>
                    </ul>
                    <p><strong>Separador de instruções</strong></p>
                    <p>No exemplo acima, podemos perceber que utilizamos o PHP para rodar apenas uma instrução, que foi para mostrar na tela a seguinte mensagem: “Ola Mundo!”.</p>
                    <p>Podemos criar um bloco de códigos com “N” instruções. Para separar uma instrução da outra, usamos um ;(ponto e vírgula).</p>
                    <p>Veja o exemplo abaixo:                    </p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                          </li>
                        <li>
                          <div><a href="http://www.php.net/echo">echo</a> &quot;Olá mundo!&quot;;</div>
                          </li>
                        <li>
                          <div><a href="http://www.php.net/echo">echo</a> &quot;&lt;br&gt;&quot;;</div>
                          </li>
                        <li>
                          <div><a href="http://www.php.net/echo">echo</a> &quot;PHP é muito legal…&quot;</div>
                          </li>
                        <li>
                          <div>?&gt;</div>
                          </li>
                        </ol>
                    </div>
<p><strong>Analisando o exemplo: </strong></p>
                    <p>Na linha 1, abrimos a tag PHP.</p>
                    <p>Na linha 2, executamos a primeira instrução, que é mostrar o texto na tela.</p>
                    <p>Na linha 3, executamos a segunda instrução, que é dar uma quebra delinha.</p>
                    <p>Na linha 4, executamos a terceira instrução, que é mostrar o texto na tela.</p>
                    <p>Na linha 5, fechamos a tag PHP.                    </p>
                    <p><em>Note que, ao final de cada instrução, eu coloquei um ; (ponto e vírgula).</em></p>
                    <p><strong><em>Esta regra não se aplica a comandos de controle, que vamos ver mais à frente.(Seriam if, while, for, etc..).</em></strong>                    </p>
                    <p>EX:                    </p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                          </li>
                        <li>
                          <div>if(2&gt;1){</div>
                          </li>
                        <li>
                          <div> <a href="http://www.php.net/echo">echo</a> &quot;2 é maior que 1.&quot;;</div>
                          </li>
                        <li>
                          <div>}</div>
                          </li>
                        <li>
                          <div>?&gt;</div>
                          </li>
                        </ol>
                    </div>
                    <p><strong>Comentários</strong></p>
                    <p>Em uma linguagem de programação, às vezes, precisamos comentar algumas rotinas. Isto é bastante útil.</p>
                    <p>No PHP, temos dois tipos de comentários.</p>
                    <p>Comentário de uma linha</p>
                    <p>Para comentar uma linha inteira, você usa o caractere #(sustenido) ou // (duas barras).</p>
                    <p>Veja o exemplo:                    </p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                          </li>
                        <li>
                          <div>// isto é um comentário de uma linha</div>
                          </li>
                        <li>
                          <div>if(2&gt;1){</div>
                          </li>
                        <li>
                          <div> <a href="http://www.php.net/echo">echo</a> &quot;2 é maior que 1.&quot;;</div>
                          </li>
                        <li>
                          <div>}</div>
                          </li>
                        <li>
                          <div>?&gt;</div>
                          </li>
                        </ol>
                    </div>
                    <p>Repare na linha 2, coloquei duas barras, toda a linha foi comentada, sendo assim, <strong>o interpretador não rodará</strong> a instrução que esta nesta linha.</p>
                    <p>Lembrando que, não precisa, necessariamente comentar a linha toda, você pode colocar um comentário ao lado da linha, depois do ;(ponto e virgula). EX:                    </p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                          </li>
                        <li>
                          <div>if(2&gt;1){</div>
                          </li>
                        <li>
                          <div> <a href="http://www.php.net/echo">echo</a> &quot;2 é maior que 1.&quot;; // comentário no final da linha</div>
                          </li>
                        <li>
                          <div>}</div>
                          </li>
                        <li>
                          <div>?&gt;</div>
                          </li>
                        </ol>
                    </div>
                    <p>Na linha 2, coloquei um comentário após a instrução, sem atrapalhar a execução dela.                    </p>
                    <p>2. Bloco de comentário</p>
                    <p>Serve para comentar várias linhas ao mesmo tempo. Utilizamos /*(barra e asterisco) para iniciar e utilizamos */(asterisco e barra) para finalizar o bloco de comentário.</p>
                    <p>Veja o exemplo abaixo:                    </p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                          </li>
                        <li>
                          <div>/*</div>
                          </li>
                        <li>
                          <div>Este é um comentário de </div>
                          </li>
                        <li>
                          <div>várias linhas…</div>
                          </li>
                        <li>
                          <div> </div>
                          </li>
                        <li>
                          <div>Pode ter linhas em branco no meio.</div>
                          </li>
                        <li>
                          <div>*/</div>
                          </li>
                        <li>
                          <div>if(2&gt;1){</div>
                          </li>
                        <li>
                          <div> <a href="http://www.php.net/echo">echo</a> &quot;2 é maior que 1.&quot;;</div>
                          </li>
                        <li>
                          <div>}</div>
                          </li>
                        <li>
                          <div>?&gt;</div>
                        </li>
                      </ol>
                    </div>
                    <p>Repare na linha 2 iniciei um bloco de comentário, e na linha 7 eu fechei o bloco, sendo assim<strong>, o “interpretador” não irá rodar</strong> este bloco de códigos.                    </p>
                    <p><em>Dica: Um bom programador comenta seus códigos, esta pratica permite uma manutenção mais fácil no seu código. </em></p>
                    <p><em>Mais a frente, estudaremos os comentários no padrão PHPDoc. Onde, a partir deles, podemos gerar documentação do código fonte.</em></p>
                    <p><strong>Variáveis</strong></p>
                    <p>São espaços reservados na memória, que servem para armazenar informações. Podem ter diversos tamanhos e tipos(inteiro, string, etc…).</p>
                    <p><strong>Pra que utilizar uma variável?</strong></p>
                    <p>Imagine que você precisa guardar um valor em sua página, por exemplo, você tem um site com 15 páginas. Imagine se você precisar mudar o título destas páginas? Teria que abrir página por página e mudar.</p>
                    <p>Se você utilizar uma variável para guardar este valor, você mandaria o PHP mostrar o valor da variável ‘titulo’ em todas as péginas, sendo assim, quando precisar mudar o título da página, você vai mudar apenas o valor da variável.</p>
                    <p>Outro exemplo: Imagine que você tem uma página que lista os produtos da sua empresa. Mas, os clientes da sua empresa tem desconto diferente sobre os produtos… por exemplo, o cliente 1, tem 10% de desconto, e o cliente 2 tem 5% de desconto.</p>
                    <p>Para mostrar os seus produtos você vai fazer uma página para cada cliente? Claro que não, você vai guardar a porcentagem em uma variável e usa-la para fazer a conta.                    </p>
                    <p><strong>Como criar uma variável?</strong></p>
                    <p>Toda variável no PHP, precisa começar com o caractere “$”. EX:                    </p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                          </li>
                        <li>
                          <div>$nome = &quot;João&quot;;</div>
                          </li>
                        <li>
                          <div>?&gt;</div>
                          </li>
                        </ol>
                    </div>
                    <p>Criamos uma variável chamada $nome, com o valor “Marcelo Sabadini”.                    </p>
                    <p>Para criar variáveis temos que seguir algumas regrinhas.</p>
                    <p>Sempre começar com $, como você já sabe.</p>
                    <p>· Após o $, não pode começar com números.                    </p>
                    <p>$nome: Válido</p>
                    <p>$123: Inválido.</p>
                    <p>$teste_123: Válido.</p>
                    <p>$_teste: Válido.                    </p>
                    <p>As variáveis podem conter todo tipo de valor, por exemplo:                    </p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                          </li>
                        <li>
                          <div>$titulo = &quot;Bem vindo ao meu site!&quot;; // armazena o texto</div>
                          </li>
                        <li>
                          <div>$resultado = 20+10; // armazena o resultado da operação</div>
                          </li>
                        <li>
                          <div>$status = true;</div>
                          </li>
                        <li>
                          <div>$total = 100;</div>
                          </li>
                        <li>
                          <div>?&gt;</div>
                        </li>
                      </ol>
                    </div>
                    <p><strong>Tipos</strong></p>
                    <p>O PHP suporta os seguintes tipos de dados:                    </p>
                    <ul type="disc">
                      <li>Inteiro(números)</li>
                      <li>String(texto)</li>
                      <li>Double(números com ponto flutuante</li>
                      <li>Boolean(verdadeiro e falso)</li>
                      <li>Array</li>
                      <li>Objeto                    </li>
                    </ul>
                    <p>Antes de mais nada, precisamos saber que no PHP, as variáveis são <strong>dinamicamente tipadas,</strong> ou seja, o tipo de dado que a variável vai conter é dinâmico. Pode receber uma string, depois um inteiro,depois um array, e assim por diante.</p>
                    <p>Em outras linguagens, em Java por exemplo, as variáveis são <strong>estaticamente tipadas</strong>, ou seja, se você declarar uma variável como String, você não consegue atribuir um valor numérico para ela.                    </p>
                    <p>Neste momento, vou explicar apenas os tipos String e Inteiro. Prefiro falar de cada tipo conforme nossa necessidade, para não causar confusão.                    </p>
                    <p><strong>String</strong></p>
                    <p>Variáveis do tipo String são declaradas com o seu valor <strong>entre aspas</strong>(duplas ou simples, mas eu aconselho a usar <strong>aspas duplas</strong>. Mais a frente você entenderá por que.), veja alguns  exemplos de declaração de variáveis do tipo String:</p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                        </li>
                        <li>
                          <div>$nome_do_cliente = &quot;João Saldanha&quot;;</div>
                        </li>
                        <li>
                          <div>$cidade = &quot;Frederico Westphalen&quot;;</div>
                        </li>
                        <li>
                          <div>$email = &quot;joaosaldanha@gmail.com&quot;;</div>
                        </li>
                        <li>
                          <div>$_status = &quot;Aprovado&quot;;</div>
                        </li>
                        <li>
                          <div>?&gt;</div>
                        </li>
                      </ol>
                    </div>
                    <p><strong>String</strong></p>
                    <p>Variáveis do tipo Inteiro são declaradas com valor numérico, sem aspas, veja alguns exemplos de declaração de variáveis do tipo Inteiro:</p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                        </li>
                        <li>
                          <div>$idade = 23;</div>
                        </li>
                        <li>
                          <div>$ano_corrente = 2008;</div>
                        </li>
                        <li>
                          <div>$_status = 1;</div>
                        </li>
                        <li>
                          <div>?&gt;</div>
                        </li>
                      </ol>
                    </div>
<p>Se você declarar uma variável do tipo Inteiro entre aspas, em alguns casos, o PHP irá interpretá-la como Inteiro, e não como String.</p>
                    <p>Ex:</p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                        </li>
                        <li>
                          <div>$idade = 23;</div>
                        </li>
                        <li>
                          <div>?&gt;</div>
                        </li>
                      </ol>
                    </div>
                    <p>Como você já deve ter percebido, você declara um valor para uma variável usando o =(igual). Sempre assim: </p>
<p>$nome_da_variavel = “Valor da variável”; </p>
<p>Uma variável, pode se declarada usando uma outra variável, veja o exemplo:</p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                        </li>
                        <li>
                          <div>$nome = &quot;João Saldanha&quot;;</div>
                        </li>
                        <li>
                          <div>$idade = 23;</div>
                        </li>
                        <li>
                          <div>$frase = &quot;Meu nome é $nome e tenho $idade anos!!&quot;;</div>
                        </li>
                        <li>
                          <div><a href="http://www.php.net/echo">echo</a> $frase;</div>
                        </li>
                        <li>
                          <div>?&gt;</div>
                        </li>
                      </ol>
                    </div>
                    <p>Ao rodar este script, a saída será:                    </p>
                    <p>Meu nome é João Saldanha e tenho 23 anos!!                    </p>
                    <p>Caractere de escape</p>
                    <p>Imagine que você precisa colocar o seguinte texto em uma variável:                    </p>
                    <p>Eu não sou “gudjubed”!                    </p>
                    <p>Como você iria declarar?</p>
                    <p>$var = “Eu não sou “gudjubed”!”;                    </p>
                    <p>Certo?? Errado!!!!!!!!!</p>
                    <p>Como você esta colocando “(aspas) dentro de uma string, o PHP irá reclamar(gerar um erro). Observe a cor utilizada na string, o que esta em vermelho é o valor da string, ou seja, a palavra gudjubed ficaria fora da string, gerando um erro no interpretador do PHP.</p>
                    <p>Para fazer isso, precisamos usar o caractere de escape, que é a \(contra-barra). A declaração da variável teria que ser assim:</p>
                    <p>$var = “Eu não sou \“gudjubed\”!”;                    </p>
                    <p>Usando \”(contra-barra + aspas), o PHP vai saber que você quer usar o caractere “(aspas) dentro da string.                    <br />
                      <br />
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
