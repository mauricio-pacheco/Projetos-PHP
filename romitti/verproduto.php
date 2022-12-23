<?php include("meta.php"); ?>
<?php include("cima.php"); ?>

      <table width="100%" height="300" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="8" /></td>
            </tr>
          </table>
            <table background="imagens/fundotitulo.png" width="100%" height="30" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center">
                <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
                    <script type="text/javascript" src="js/prototype.js"></script>
                    <script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
                  <script type="text/javascript" src="js/lightbox.js"></script>
			<?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_produtos WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center class=manchete_texto>Não existe galerias cadastradas!</div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
			<strong class="manchete_t"><em><b><?php echo $y["nome"]; ?></b></em></strong></td>
              </tr>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="1" height="8" />
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><table width="100%" border="0" align="center" class="manchete_texto9">
                        <tr>
                          <td align="left" class="manchete_texto9"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                            </tr>
                          </table>
                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                            </table>
                            <table width="99%" border="0" align="right" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="28%" valign="top"><?php
                     $branca = $y["foto"];
					 $testeb = '';
					 if ($branca == $testeb)
					 {
					  					  ?>
                                  <?php } else { ?>
                                  <img src="administrador/ups/produtos/<?php echo $y["foto"]; ?>" width="240" height="120"/>
                                  <?php } ?></td>
                                <td width="72%" valign="top"><?php
include "administrador/conexao.php";
// Pegar a p&aacute;gina atual por GET
$p = $_GET["p"];
// Verifica se a vari&aacute;vel t&aacute; declarada, sen&atilde;o deixa na primeira p&aacute;gina como padr&atilde;o
if(isset($p)) {
$p = $p;
} else {
$p = 1;
}
// Defina aqui a quantidade m&aacute;xima de registros por p&aacute;gina.
$qnt = 600000;
// O sistema calcula o in&iacute;cio da sele&ccedil;&atilde;o calculando: 
// (p&aacute;gina atual * quantidade por p&aacute;gina) - quantidade por p&aacute;gina
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos n&uacute;meros acima
$sql_select = "SELECT * FROM cw_anexosprod WHERE idnot='$id' LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

$colunas="7"; //quantidade de colunas
$cont="1"; //contador

print"<table width=300>";

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$fotomaior = $array["fotomaior"];
$fotomenor = $array["fotomenor"];
$idnot = $array["idnot"];
$legenda = $array["legenda"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td align="left"><a href='administrador/ups/fotosprodutos/g/<?php echo $fotomaior.""; ?>' rel='lightbox['roadtrip="roadtrip"']' title='<?php echo $legenda.""; ?>'><img width="80" height="53" alt='<?php echo $legenda.""; ?>' title='<?php echo $legenda.""; ?>' border='0' src='administrador/ups/fotosprodutos/p/<?php echo $fotomenor.""; ?>' /></a></td>
                                    </tr>
                                  </table>
                                  <?php
$linhaco = $linha['id'];
?>
                                  <?php
print"</td>";

//se o cont for igual o número de colunas ele fecha a linha da tabela
if($cont==$colunas){
print"</tr>";
$cont=0;
}
$cont=$cont+1; //acrescenta valor ao cont
}

//se o valor final de cont for diferente do numero de colunas ele fechará a tabela
if(!$cont==$colunas){
print"</tr></table>";
} else {
print"</table>";
}
?>
                                  <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)


// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_anexosprod";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 10;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)

// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {

}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero



// Cria outro for(), desta vez para exibir 3 links ap&oacute;s a p&aacute;gina atual
for($i = $p+1; $i <= $p+$max_links; $i++) {
// Verifica se a p&aacute;gina atual &eacute; maior do que a &uacute;ltima p&aacute;gina. Se for, n&atilde;o faz nada.
if($i > $pags)
{
//faz nada
}
// Se tiver tudo Ok gera os links.
else
{

}
}
// Exibe o link "&uacute;ltima p&aacute;gina"

   

?></td>
                              </tr>
                            </table></td>
                        </tr>
                        <tr>
                          <td align="left" class="manchete_texto"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><span class="manchete_texto9"><i> <strong>
                                <?php 	
								
								$departamento = $y["departamento"];
								$sql2 = mysql_query("SELECT * FROM cw_depprod WHERE id = '$departamento'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["nome"];  }
	
	?>
                                -
                                <?php 	
								$subdep = $y["subdep"];
								$sql2 = mysql_query("SELECT * FROM cw_subdepprod WHERE id = '$subdep'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["nomesub"];  }
	
	?>
                              </strong></i></span></td>
                            </tr>
                          </table>
                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="2" /></td>
                              </tr>
                            </table>
                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td class="manchete_texto9"><?php if ($y["valor"]=='') { } else { ?>
                                  Valor: <font color="#f9f9f9"><b>R$</b></font> <?php echo $y["valor"]; ?>
                                  <?php } ?></td>
                              </tr>
                            </table>
                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td class="manchete_texto9"><?php if ($y["valorpx"]=='' and $y["valorp"]=='') { } else { ?>
                                  ou em <?php echo $y["valorpx"]; ?> X de <font color="#f9f9f9"><b>R$</b></font> <?php echo $y["valorp"]; ?>
                                  <?php } ?></td>
                              </tr>
                            </table>
                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td class="manchete_texto9"><?php if ($y["valor"]!='' and $y["valorpx"]!='' and $y["valorp"]!='') { } else { ?>
                                 <?php echo $y["valortratar"]; ?>
                                  <?php } ?></td>
                              </tr>
                            </table></td>
                        </tr>
                        <tr>
                          <td align="left"><div align="center">
                            <?php } }  ?>
                          </div></td>
                        </tr>
                        <tr>
                          <td align="left" width="14%"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><div align="justify"><span class="manchete_texto9">
                                <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_produtos WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center class=manchete_texto>Não existe galerias cadastradas!</div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                                <?php echo $y["descricao"]; ?></span></div></td>
                            </tr>
                          </table>
                            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="2" height="16" /></td>
                              </tr>
                            </table>
                            <script language="JavaScript" type="text/javascript">
function validar(cadastro) { 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome não está preenchido!")
cadastro.nome.focus();
return false
}

if (document.cadastro.fone.value=="") {
alert("O Campo Telefone não está preenchido!")
cadastro.fone.focus();
return false
}

if (document.cadastro.email2.value=="") {
alert("O Campo E-mail não está preenchido!")
cadastro.email2.focus();
return false
}


		return true;

}


                            </script>
                            <form action="emailproduto.php" method="post" name="cadastro" id="cadastro" onsubmit="return validar(this)">
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><strong>MAIS INFORMAÇÕES SOBRE O PRODUTO:</strong></td>
                                </tr>
                              </table>
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                                </tr>
                              </table>
                              <input type="hidden" name="produto" value="<?php echo $y["nome"]; ?>" id="produto" />
                              <input type="hidden" name="id" value="<?php echo $y["id"]; ?>" id="id" />
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><span class="fontetabela">Nome:
                                    <input name="nome" type="text" class="manchete_texto99" id="nome" style="width:330px"  />
                                    *</span></td>
                                </tr>
                              </table>
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                                </tr>
                              </table>
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><span class="fontetabela">Telefone:
                                    <input name="fone" type="text" class="manchete_textocasa" id="fone" style="width:150px" />
                                    *</span></td>
                                </tr>
                              </table>
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                                </tr>
                              </table>
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><span class="fontetabela">E-mail:
                                    <input name="email2" type="text" class="manchete_texto99" id="email" style="width:300px" />
                                    *</span></td>
                                </tr>
                              </table>
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                                </tr>
                              </table>
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><span class="fontetabela">Digite abaixo as informações que deseja sobre o produto:</span></td>
                                </tr>
                              </table>
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                                </tr>
                              </table>
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><span class="fontetabela">
                                    <textarea name="descricao" cols="60" rows="10" class="manchete_texto99" id="descricao"></textarea>
                                  </span></td>
                                </tr>
                              </table>
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                                </tr>
                              </table>
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><span class="fontetabela">
                                    <input name="button2" type="submit" value="ENVIAR DADOS" class="manchete_texto99" id="button2"  />
                                    <span class="manchete_texto">
                                      <?php } } ?>
                                    </span></span></td>
                                </tr>
                              </table>
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><img src="imagens/branco.gif" width="2" height="8" /></td>
                                </tr>
                              </table>
                              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td><a href="javascript:history.go(-1)"><img src="imagens/voltar.png" border="0" /></a></td>
                                </tr>
                              </table>
                            </form></td>
                        </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
          </table></td>
        </tr>
    </table>
     <?php include("baixo.php"); ?></td>
  </tr>
</table><br /><br /></div>
</body>
</html>