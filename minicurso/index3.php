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
                  <td>&nbsp;&nbsp;<strong>MINI CURSO DE PHP e MySQL - OPERADORES</strong></td>
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
                  <td class="fontetabela"><p><strong>Operadores</strong><br />
                    Operadores são caracteres que utilizamos para fazer alguma  operação especifica. Temos vários tipos de operadores:</p>
                    <ul>
                      <li>Aritméticos;</li>
                      <li>De String;</li>
                      <li>De atribuição;</li>
                      <li>Bit a bit;</li>
                      <li>Lógicos;</li>
                      <li>De comparação;</li>
                    </ul>
<p>Cada um destes tipos de operadores, como você pode ver, tem  um determinado fim. Digamos que queremos fazer uma conta matemática, calcular a  idade do usuário. A partir da data de nascimento. Teremos que fazer uma  subtração do ano atual com o ano que ele nasceu. Para isso, utilizamos o  operador aritmético –(subtração).</p>
                    <p>$idade = 2008-1985;</p>
                    <p>Vejamos para que serve cada tipo de operador citado a cima:</p>
                    <p><strong>Aritmético</strong></p>
                    <p>Servem para fazer operações matemáticas. Estes operadores só  podem ser utilizados com valores dos tipos Integer e Float.</p>
                    <div>
                      <table border="1" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td valign="top" width="84"><p align="center"><strong>Operador</strong></p></td>
                            <td valign="top" width="178"><strong>Função</strong></td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">+</p></td>
                            <td valign="top" width="178">Adição</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">-</p></td>
                            <td valign="top" width="178">Subtração</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">*</p></td>
                            <td valign="top" width="178">Multiplicação</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">/</p></td>
                            <td valign="top" width="178">Divisão</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">%</p></td>
                            <td valign="top" width="178">Resto da divisão</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <p><strong>String</strong></p>
                    <p>Só há um operador para trabalhar com String.</p>
                    <div>
                      <table border="1" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td valign="top" width="84"><p align="center"><strong>Operador</strong></p></td>
                            <td valign="top" width="178"><strong>Função</strong></td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">.</p></td>
                            <td valign="top" width="178">Concatenação</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <p>O operador de concatenação serve para concatenar (juntar)  duas ou mais Strings. Veja o exemplo abaixo:</p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                        </li>
                        <li>
                          <div>$idade = 23;</div>
                        </li>
                        <li>
                          <div><a href="http://www.php.net/echo">echo</a> &quot;Eu tenho &quot;.$idade.&quot; anos.&quot;</div>
                        </li>
                        <li>
                          <div>?&gt;</div>
                        </li>
                      </ol>
                    </div>
                    <p>No exemplo acima, estou concatenando (juntando) três  Strings.</p>
                    <ul>
                      <li>“Eu tenho ”;</li>
                      <li>$idade;</li>
                      <li>“anos”;</li>
                    </ul>
                    <p>Podemos usar a concatenação para declarar novas variáveis,  veja o exemplo:                    </p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                        </li>
                        <li>
                          <div>$str1 = &quot;PHP é &quot;;</div>
                        </li>
                        <li>
                          <div>$str2 = &quot;muito legal!&quot;;</div>
                        </li>
                        <li>
                          <div>$str3 = $str1.$str2;</div>
                        </li>
                        <li>
                          <div><a href="http://www.php.net/echo">echo</a> $str3;</div>
                        </li>
                        <li>
                          <div>?&gt;</div>
                          <strong><br />
                          </strong></li>
                        </ol>
                    </div>
<p><strong>Atribuição</strong></p>
                    <p>Como o nome já diz, estes operadores vão atribuir valores.  Existe um operador básico e outros que servem para complementar sua  funcionalidade.</p>
                    <div>
                      <table border="1" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td valign="top" width="84"><p align="center"><strong>Operador</strong></p></td>
                            <td valign="top" width="462"><strong>Função</strong></td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">=</p></td>
                            <td valign="top" width="462">Operador principal, serve para    atribuir um valor a uma variável.</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">+=</p></td>
                            <td valign="top" width="462">Atribuição com adição.</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">-=</p></td>
                            <td valign="top" width="462">Atribuição com subtração.</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">*=</p></td>
                            <td valign="top" width="462">Atribuição com multiplicação.</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">/=</p></td>
                            <td valign="top" width="462">Atribuição com divisão.</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">.=</p></td>
                            <td valign="top" width="462">Atribuição com concatenação.</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <p>Veja o exemplo:                    </p>
                    <div>
                      <ol>
                        <li>
                          <div>&lt;?</div>
                          </li>
                        <li>
                          <div>$valor = 5;</div>
                          </li>
                        <li>
                          <div>$valor += 10;</div>
                          </li>
                        <li>
                          <div><a href="http://www.php.net/echo">echo</a> $valor;</div>
                          </li>
                        <li>
                        <div>?&gt;</div></li></ol></div>
                    <p>O exemplo acima, ira imprimir na tela “15”. Pois ele fará o valor da  própria variável ($valor) mais 5.</p>
                    <p><strong>Lógicos</strong></p>
                    <p>Eles vão servir para quando formos fazer mais de uma  comparação.</p>
                    <div>
                      <table border="1" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td valign="top" width="84"><p align="center"><strong>Operador</strong></p></td>
                            <td valign="top" width="178"><strong>Função</strong></td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">and</p></td>
                            <td valign="top" width="178">‘e’</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">or</p></td>
                            <td valign="top" width="178">‘ou’</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">xor</p></td>
                            <td valign="top" width="178">Ou exclusivo</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">!</p></td>
                            <td valign="top" width="178">Não(inversão)</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">&amp;&amp;</p></td>
                            <td valign="top" width="178">‘e’</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">||</p></td>
                            <td valign="top" width="178">‘ou’</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <p>Não vou colocar um código para exemplo, pois entraria no  próximo assunto. Mas, iríamos aplicar, por exemplo, na seguinte situação:</p>
                    <p>Você quer classificar seus usuários cadastrados. Usuários  que <em>(1)</em>tenham mais de 14 anos <strong>E</strong> <em>(2)</em>menos que 21 anos, você quer  classificam-los como adolescentes.</p>
                    <p>Você percebeu que para classificar estes usuários, é  necessário que as duas condições sejam atendidas?</p>
                    <p>Neste caso utilizaríamos o operador ‘<strong>and</strong>’ ou’<strong>&amp;&amp;</strong>’</p>
                    <p><strong>Comparação</strong></p>
                    <p>Servem para comparar valores de variáveis. Estes operadores  sempre retornam um valor booleano (true ou false).</p>
                    <div>
                      <table border="1" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td valign="top" width="84"><p align="center"><strong>Operador</strong></p></td>
                            <td valign="top" width="178"><strong>Função</strong></td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">==</p></td>
                            <td valign="top" width="178">Igual</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">!=</p></td>
                            <td valign="top" width="178">Diferente</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">&lt;&gt;</p></td>
                            <td valign="top" width="178">Diferente</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">&lt;</p></td>
                            <td valign="top" width="178">Menor</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">&lt;=</p></td>
                            <td valign="top" width="178">Menor OU igual</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">&gt;</p></td>
                            <td valign="top" width="178">Maior</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">&gt;=</p></td>
                            <td valign="top" width="178">Maior OU igual</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <p>Estude bem estes operadores, pois eles serão MUITO  utilizados.</p>
                    <p><strong>Operadores de  incremento / decremento</strong></p>
                    <div>
                      <table border="1" cellspacing="0" cellpadding="0">
                        <tbody>
                          <tr>
                            <td valign="top" width="84"><p align="center"><strong>Operador</strong></p></td>
                            <td valign="top" width="178"><strong>Função</strong></td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">++</p></td>
                            <td valign="top" width="178">Incrementa</td>
                          </tr>
                          <tr>
                            <td valign="top" width="84"><p align="center">–</p></td>
                            <td valign="top" width="178">Decrementa</td>
                          </tr>
                        </tbody>
                      </table>
                      <br />
                    </div></td>
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
