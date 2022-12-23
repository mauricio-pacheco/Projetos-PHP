<?php include("meta.php"); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%" background="imagens/fesquerdo.jpg">&nbsp;</td>
    <td width="60%" valign="top"><?php include("tcima.php"); ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="32" /></td>
        </tr>
    </table>
      <table width="100%" height="300" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td valign="top"><table width="100%" height="30" border="0">
            <tr>
              <td class="fontetitulo">&nbsp;ÁREA DE CLIENTES</td>
            </tr>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="6" /></td>
              </tr>
          </table>
            <table width="100%" border="0">
              <tr>
                <td><table width="100%" border="0">
                  <tr>
                    <td valign="top" width="48%">
                  
  <?php
include "administrador/conexao.php";
$logado = $_COOKIE['usuario'];
$logado2 = $_COOKIE['senha'];
$logado2novo = hash('sha512', $logado2);
$sql = mysql_query("SELECT * FROM cw_clientes WHERE usuario = '$logado' AND senha = '$logado2novo'");
$contar = mysql_num_rows($sql); 

if ( $contar == 1 ) {
	
?>     
  <?php
while($y = mysql_fetch_array($sql))
   {
?>
                      
                      
    <p>                    
                      
  <span class="fonte">Bem vindo, <b><?php 
  $idcliente = $y["id"];
  
  echo $y["cliente"]; ?></b>
  </span>- <a href="sair.php" class="fonte"><font color="#B30015">SAIR DO SISTEMA</font></a></p>
                    <p class="fonte">Segue abaixo seus arquivos anexados:</p>
 
  
                    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="fonte">
                      <tr>
                        <td><span class="fontetabela2">
                          <?php
include "administrador/conexao.php";

$p = $_GET["p"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 4567;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_anexosarquivos WHERE idcliente='$idcliente' ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="1"; //quantidade de colunas
$cont="1"; //contador

print"<table width=444>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$arquivo = $array["arquivo"];
$legenda = $array["legenda"];
$idcliente = $array["idcliente"];
$data = $array["data"];
$hora = $array["hora"];


// Exibe o nome que est&aacute; no BD e pula uma linha


?>
                          </span>
                          <table width="99%" border="0" align="center">
                            <tr>
                              <td width="9%" class="fontetabela"><a href="administrador/ups/arquivos/<?php echo $arquivo.""; ?>" class="fonte" target="_blank"><img src="imagens/arquivo.png" border="0" width="33" height="32" /></a></td>
                              <td width="91%" class="fontetabela"><strong><a href="administrador/ups/arquivos/<?php echo $arquivo.""; ?>" class="fonte" target="_blank"><?php echo $arquivo.""; ?></a></strong><br />
                                <em>ARQUIVO CADASTRADO EM <?php echo $data.""; ?> - <?php echo $hora.""; ?></em></td>
                              </tr>
                          </table>
                          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="1" height="6" /></td>
                            </tr>
                          </table>
                          <span class="manchete_texto96">
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
                            </span>
                          <div align="center">
                            <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br>";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_anexosarquivos WHERE idcliente='$idcliente' ORDER BY id DESC";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 20;
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



?>
                          </div></td>
                      </tr>
                    </table>
                     <?php } ?>
  <?php
} else {
?> 
                    <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><script language="javascript" type="text/javascript">
function validar(form1) { 

if (document.form1.usuario.value=="") {
alert("O Campo Usuário não está preenchido!")
form1.usuario.focus();
return false
}

if (document.form1.password.value=="") {
alert("O Campo Senha não está preenchido!")
form1.password.focus();
return false
}

}

                        </script>
                          <form action="autoriza.php" method="post" name="form1" id="form2" onsubmit="return validar(this)">
                            <p align="left" class="fonte"><strong>Digite o Usu&aacute;rio e a Senha para acessar a Área de Clientes</strong></p>
                            <div align="left">
                              <table width="53%" border="0">
                                <tr>
                                  <td width="48" class="fonte" align="left">Usu&aacute;rio: </td>
                                  <td width="175" class="fonte">
                                    <input name="usuario" type="text" class="fonte" size="16" />
                                    *</td>
                                </tr>
                                <tr>
                                  <td class="fonte" align="left">Senha:</td>
                                  <td class="fonte">
                                    <input name="senha" type="password" class="fonte" size="16" />
                                    *</td>
                                </tr>
                              </table>
                            </div>
                            <p align="left" class="manchete_texto"> <span class="fontetabela">
                              <input type="submit" class="fonte" value=" ENTRAR " />
                              &nbsp;&nbsp;
                              <input class="fonte" type="reset" value=" LIMPAR " />
                              <br />
                              <br />
                            </span><span class="fonte">* Campos Obrigat&oacute;rios</span></p>
                            <p>&nbsp;</p>
                          </form></td>
                      </tr>
                </table><?php } ?>
                      <p align="justify" class="fonte">&nbsp;</p>
                      <p class="fonte">&nbsp;</p>
                      <p align="justify" class="fonte">&nbsp;</p></td>
                    <td valign="top" width="4%">&nbsp;</td>
                    <td valign="top" width="48%" align="left"><p align="justify" class="fonte"><strong>Consulta Processual</strong></p>
                      <p class="fonte"><strong><font color="#B30015">STF:</font></strong> <a href="http://www.stf.jus.br" target="_blank" class="fonte">http://www.stf.jus.br</a></p>
                      <p class="fonte"><strong><font color="#B30015">STJ:</font></strong> <a href="http://www.stj.gov.br" target="_blank" class="fonte">http://www.stj.gov.br</a></p>
                      <p class="fonte"><strong><font color="#B30015">TRF4:</font></strong> <a href="http://www.trf4.jus.br" target="_blank" class="fonte">http://www.trf4.jus.br</a></p>
                      <p class="fonte"><strong><font color="#B30015">TJRS:</font></strong> <a href="http://www.tjrs.jus.br" target="_blank" class="fonte">http://www.tjrs.jus.br</a></p>
                      <p align="justify" class="fonte">&nbsp;</p>
                      <p align="justify" class="fonte">&nbsp;</p></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="6" /></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="20" /></td>
        </tr>
    </table>
      <?php include("tbaixo.php"); ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="12" /></td>
        </tr>
    </table></td>
    <td width="20%" background="imagens/fdireita.jpg">&nbsp;</td>
  </tr>
</table>
</body>
</html>