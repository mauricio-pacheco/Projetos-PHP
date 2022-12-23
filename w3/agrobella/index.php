<?php include ("meta.php"); ?>
<SCRIPT src="home_arquivos/urchin.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/urchin.js" type=text/javascript></SCRIPT>
<style type="text/css">
<!--
.style9 {
	font-size: 12px;
	font-style: italic;
	color: #000000;
}
-->
</style>
<BODY>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD>
      <DIV id=Layer1 style="Z-INDEX: 1; WIDTH: 100%; POSITION: absolute">
      <TABLE height=284 cellSpacing=0 cellPadding=0 width=770 align=center 
      border=0>
        <TBODY>
        <TR>
          <TD vAlign=bottom><SCRIPT src="carrega.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash('menu.swf','770','68'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT>
            </TD></TR></TBODY></TABLE></DIV>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD class=bgCabecEsq>&nbsp;</TD></TR>
              <TR>
                <TD class=bgMenuEsq>&nbsp;</TD></TR></TBODY></TABLE></TD>
          <TD class=bgCabecDir vAlign=top width=770 bgColor=#ffffff>
            <TABLE cellSpacing=0 cellPadding=0 width=770 border=0>
              <TBODY>
              <TR>
                <TD background=home_arquivos/bg_cabec_esq.jpg>
                  <SCRIPT src="carrega2.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash('cabec.swf','770','225'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT>
                </TD></TR>
              <TR>
                <TD>&nbsp;</TD></TR></TBODY></TABLE></TD>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD class=bgCabecDir>&nbsp;</TD></TR>
              <TR>
                <TD 
      class=bgMenuEsq>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD>&nbsp;</TD>
          <TD width=770>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <?php include ("menu.php"); ?>
                <TD vAlign=top width=80% bgColor=#ffffff>
                  <DIV align=center><BR>
                  </DIV>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD width=27 background=home_arquivos/bg_tit_novidades.jpg 
                      height=32><img src="home.png" width="70" height="38"></TD>
                    </TR>
                    <TR>
                      <TD colSpan=2>
                                                <TABLE cellSpacing=10 cellPadding=0 width="100%" 
                        border=0>
                          <TBODY>
                          <TR>
                            <TD class=tahoma10cinza666666><MARQUEE behavior= "scroll" align= "center" direction= "left" height="20" scrollamount= "3" onmouseover='this.stop()' onmouseout='this.start()'><?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM produtos");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se há algum registro na tabela, caso não houver, ele mostrará a mensagem abaixo
   {echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe produtos cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrará os registros. OBS: Você pode mudar o modo de exibir os registros
     //mais não mude nenhuma variável, a não ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
          <img src="folha.gif" width="24" height="25" />&nbsp;<span class="tahoma10preto"><?php echo $n["nome"]; ?></span>&nbsp;<img alt="Vencimento" src="ve.gif" width="16" height="16" />&nbsp;<span class="tahoma10preto"><?php echo $n["vencimento"]; ?></span>&nbsp;<img alt="Valor" src="grana.gif" width="20" height="16" />&nbsp;<span class="tahoma10preto">R$ <?php echo $n["preco"]; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<img src="capsula.gif" width="9" height="31" />&nbsp;&nbsp;
          <?
  }
  }
 ?></MARQUEE>
          <table width="100%" border="0">
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="center"><span class="tahoma10preto">Cotação do Dólar</span></div></td>
              <td><div align="center"><span class="tahoma10preto">Previsão do Tempo</span></div></td>
            </tr>
            <tr>
              <td width="50%"><div align="center">
                  <script language='JavaScript' src='http://www.debit.com.br/resumogratuito.php?info=novo_dolar' type="text/javascript"></script>
              </div></td>
              <td width="50%"><table width="100%" border="0">
                  <tr>
                    <td width="32%"><iframe src="selo1.php" name="centro" width="120" marginwidth="0" height="125" marginheight="0" scrolling="No" frameborder="0" id="centro"></iframe></td>
                    <td width="68%"><table width="100%" border="0">
                        <tr>
                          <td width="8%"><img src="mapinha.gif" width="15" height="16" /></td>
                          <td width="92%"><span class="tahoma10preto"><a href="selo1.php" class="tahoma10preto" target="centro">Frederico Westphalen</a></span></td>
                        </tr>
                        <tr>
                          <td><img src="mapinha.gif" width="15" height="16" /></td>
                          <td><span class="tahoma10preto"><a href="selo2.php" class="tahoma10preto" target="centro">Seberi</a></span></td>
                        </tr>
                        <tr>
                          <td><img src="mapinha.gif" width="15" height="16" /></td>
                          <td><span class="tahoma10preto"><a href="selo3.php" class="tahoma10preto" target="centro">Iraí</a></span></td>
                        </tr>
                        <tr>
                          <td><img src="mapinha.gif" width="15" height="16" /></td>
                          <td><span class="tahoma10preto"><a href="selo4.php" class="tahoma10preto" target="centro">Vicente Dutra</a></span></td>
                        </tr>
                        <tr>
                          <td><img src="mapinha.gif" width="15" height="16" /></td>
                          <td><span class="tahoma10preto"><a href="selo5.php" class="tahoma10preto" target="centro">Palmeira das Missões</a></span></td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
          </table>
        <table width="100%" border="0">
            <tr>
              <td><table width="100%" border="0">
                  <tr>
                    <td width="1%"><img src="jornal.gif" width="23" height="26" /></td>
                    <td width="99%"><div align="left"><span class="tahoma10preto">Ultimas Notícias Agrobella</span></div></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td><? 
								 
								 // bloco 1 - conecte-se ao banco de dados
$con = mysql_pconnect('localhost','agrobe','w37001'); // host, usuário, senha
mysql_select_db('agrobella'); // banco de dados


// bloco 2 - defina o número de registros exibidos por página
$num_por_pagina = 10;

// bloco 3 - descubra o número da página que será exibida
// se o numero da página não for informado, definir como 1
$pagina=$_GET['pagina']; 

if (!$pagina) {
$pagina = 1;
}



// bloco 4 - construa uma cláusula SQL "SELECT" que nos retorne somente os registros desejados
// definir o número do primeiro registro da página. Faça a continha na calculadora que você entenderá minha fórmula.
$primeiro_registro = ($pagina*$num_por_pagina) - $num_por_pagina;

// consulta apenas os registros da página em questão utilizando como auxílio a definição LIMIT. Ordene os registros pela quantidade de pontos, começando do maior para o menor DESC.
$consulta = "SELECT * FROM noticias ORDER BY id DESC LIMIT $primeiro_registro, $num_por_pagina";
// executar query
$res = mysql_query($consulta,$con);


// bloco 5 - exiba os registros na tela
while ($dados = mysql_fetch_array($res)) {

								 
								   ?>
                  <table width="96%" border="0">
                    <tr>
                      <td width="2%"><span class="tahoma10preto"><img src="setacobel.gif" border="0" /></span></td>
                      <td width="98%"><span class="tahoma10preto"><a class="tahoma10preto" href="noticias.php?id=<?php echo $dados["id"]; ?>"><?php echo $dados["titulo"]; ?></a> --- <span class="texto2"><?php echo $dados["data"]; ?> - <?php echo $dados["hora"]; ?></span></span></td>
                    </tr>
                  </table>
                <span class="paginacao">
                  <? 
							  
							  
							  }


// bloco 6 - construa e exiba um painel de navegabilidade entre as páginas
$consulta = "SELECT COUNT(*) FROM noticias";
list($total_usuarios) = mysql_fetch_array(mysql_query($consulta,$con));

$total_paginas = $total_usuarios/$num_por_pagina;

$prev = $pagina - 1;
$next = $pagina + 1;
// se página maior que 1 (um), então temos link para a página anterior
if ($pagina > 1) {
$prev_link = "<br><a class=paginacao href=\"$PHP_SELF?pagina=$prev\">Anterior</a>";
} else { // senão não há link para a página anterior
$prev_link = "<br>Anterior";
}

// se número total de páginas for maior que a página corrente, então temos link para a próxima página
if ($total_paginas > $pagina) {
$next_link = "<a class=paginacao href=\"$PHP_SELF?pagina=$next\">Próxima";
} else { // senão não há link para a próxima página
$next_link = "Próxima";
}

// vamos arredondar para o alto o número de páginas que serão necessárias para exibir todos os registros. Por exemplo, se temos 20 registros e mostramos 6 por página, nossa variável $total_paginas será igual a 20/6, que resultará em 3.33. Para exibir os 2 registros restantes dos 18 mostrados nas primeiras 3 páginas (0.33), será necessária a quarta página. Logo, sempre devemos arredondar uma fração de número real para um inteiro de cima e isto é feito com a função ceil().
$total_paginas = ceil($total_paginas);
$painel = "";
for ($x=1; $x<=$total_paginas; $x++) {
if ($x==$pagina) { // se estivermos na página corrente, não exibir o link para visualização desta página
$painel .= " [$x] ";
} else {
$painel .= " <a class=paginacao href=\"$PHP_SELF?pagina=$x\">[$x]</a>";
}
}


// exibir painel na tela
echo "$prev_link | $painel | $next_link";
  ?>
                </span></td>
            </tr>
        </table></TD>
                          </TR></TBODY></TABLE></TD></TR> <TR>
                      <TD width=100% background=home_arquivos/bg_tit_novidades.jpg 
                      height=32><?php include ("rodape.php"); ?></TD>
                    </TR>
                   </TBODY></TABLE></TD>
               </TR></TBODY></TABLE></TD>
          <TD>&nbsp;</TD></TR></TBODY></TABLE>
    </TD></TR></TBODY></TABLE><?php include ("abaixoconta.php"); ?>
</BODY></HTML>
