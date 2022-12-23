<table width="1000" height="91" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="240" valign="top"><a href="principal.php"><img src="imagens/logomultix.png" border="0" /></a></td>
        <td width="760" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
            <td><img src="imagens/branco.gif" width="1" height="8" /></td>
          </tr>
          <tr>
            <td>
			<?php
include "administrador/conexao.php";
$logado = $_COOKIE['email'];
$logado2 = $_COOKIE['senha'];
$logado2novo = hash('sha512', $logado2);
$sql = mysql_query("SELECT * FROM cw_clientes WHERE email = '$logado' AND senha = '$logado2novo'");
$contar = mysql_num_rows($sql); 

if ( $contar == 1 ) {
	
?>     
<?php
while($y = mysql_fetch_array($sql))
   {
?>
            
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
        <td width="15%" class="manchete_texto9"><a href="atendimento.php" class="manchete_texto9">Atendimento</a></td>
    <td width="32%" class="manchete_texto9">Bem vindo, <b><?php 
	
	if($y["razaosocial"]=='') { echo $y["cliente"]; } else { echo $y["razaosocial"]; } ?></b></td>
    <td width="53%" class="manchete_texto9m"><a class="manchete_texto9m" href="altera.php?id=<?php echo $y["id"]; ?>&amp;usuario=<?php echo $y["usuario"]; ?>">ALTERAR DADOS PESSOAIS</a> | <a class="manchete_texto9m" href="arquivos.php?idcliente=<?php echo $y["id"]; ?>&amp;usuario=<?php echo $y["usuario"]; ?>&amp;cliente=<?php echo $y["cliente"]; ?>">ARQUIVOS</a> | <a class="manchete_texto9m" href="minhascompras.php?id=<?php echo $y["id"]; ?>&amp;usuario=<?php echo $y["usuario"]; ?>&amp;cliente=<?php echo $y["cliente"]; ?>">MINHAS COMPRAS</a> | <a class="manchete_texto9m" href="sair.php">SAIR</a></td>
  </tr>
</table>

<?php } ?>
<?php
} else {
?> 

			<script language="JavaScript" type="text/javascript">
function validarlogin(form1) { 

if (document.formlogin.usuario.value=="") {
alert("O Campo Usuário não está preenchido!")
formlogin.usuario.focus();
return false
}

if (document.formlogin.senha.value=="") {
alert("O Campo Senha não está preenchido!")
formlogin.senha.focus();
return false
}

}

                        </script>
          <form action="autoriza.php" method="post" name="formlogin" onsubmit="return validarlogin(this)"><table width="98%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="323"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                                        <td width="47%" class="manchete_texto9"><a href="atendimento.php" class="manchete_texto9">Atendimento</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="empresa.php" class="manchete_texto9">Quem Somos</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="cadastro.php" class="manchete_texto9">Meu Cadastro</a></td>
                    
                  </tr>
                </table></td>
                <td width="24" class="manchete_texto9"><img src="imagens/usuario.png"  /></td>
                <td width="134" class="manchete_texto9"><input style="font-size:11px; height:18px; width:120px; color:#333; background-color:#F5F4BB" name="email" type="text" onclick="this.value=''" class="manchete_texto9" value="email" /></td>
                <td width="23"><img src="imagens/chave.png"  /></td>
                <td width="125" class="manchete_texto9"><input type="password" style="font-size:11px; height:18px; width:120px; color:#333; background-color:#F5F4BB" class="manchete_texto9" onclick="this.value=''" value="******" name="senha" /></td>
                <td width="51" class="manchete_texto9"><span style="MARGIN: 0px">
                  <input name="submit" type="submit" class="texto" style="FONT-SIZE: 10px" value="LOGIN" />
                </span></td>
              </tr>
            </table></form><?php } ?></td>
          </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="6" /></td>
          </tr>
       
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="50%"><form action="buscaprodutos.php" method="post" name="form1" id="form1">
              <table width="336" background="imagens/fundobusca.png" height="35" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="4%"></td>
                  <td width="36%"><input name="palavra" style="font-size:16px; height:30px; width:400px; color:#FFF; background-color:#F58120" type="text" id="textfield2" onClick="this.value=''" value=" Digite o nome do produto desejado..." /></td>
                  <td width="60%"><input name="" type="image" src="imagens/pesquisa.png" /></td>
                </tr>
              </table>
            </form></td>
                <td width="50%"><table width="90%" border="0" align="right" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="17%"><img src="imagens/carrinho.png" /></td>
                    <td width="83%">
                    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td class="manchete_texto9">Itens no Carrinho: <b><?php
include "administrador/conexao.php";
$sql = mysql_query("SELECT COUNT(*) AS Total FROM cw_carrinho WHERE cw_carrinho.sessao = '".session_id()."'");
$contar = mysql_num_rows($sql); 
$total = mysql_result($sql, 0, 'Total');

?>
                                     <?php
  echo ''. $total;
 ?></b></td>
                        </tr>
                      <tr>
                        <td class="manchete_texto9"><a href="carrinho.php" class="manchete_texto9">Visualizar Meu Carrinho</a></td>
                        </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>