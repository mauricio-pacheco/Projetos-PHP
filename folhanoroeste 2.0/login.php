<table width="100%" border="0" align="center" bgcolor="#FFFFFF">
    <tr>
      <td width="51%" align="center"><a href="principal.php"><img src="imagens/logo.jpg" border="0"></a></td>
      <td width="20%" align="center" bgcolor="#F3F3F3"><a href="cadastro.php"><img title="FAÇA SUA ASSINATURA ONLINE" alt="FAÇA SUA ASSINATURA ONLINE" src="imagens/ass.png" border="0" ></a></td>
      <td width="29%" valign="top" bgcolor="#F3F3F3" style="background-image:url(imagens/fundotabela.jpg); BACKGROUND-REPEAT: no-repeat;"  height="97">
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
<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
  </tr>
  <tr>
    <td width="6%"><img src="imagens/perfil.png" /></td>
    <td width="94%">&nbsp;Bem vindo: <b><?php echo $y["cliente"]; ?></b></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td>&nbsp; &bull; &nbsp;<a class="fonterodape" href="altera.php?id=<?php echo $y["id"]; ?>&amp;usuario=<?php echo $y["usuario"]; ?>"><font color="#333333">ALTERAR DADOS PESSOAIS</font></a></td>
  </tr>
   <tr>
    <td>&nbsp; &bull; &nbsp;<a class="fonterodape" href="assinatura.php"><font color="#333333">MINHAS ASSINATURAS</font></a></td>
  </tr>
  <tr>
    <td>&nbsp; &bull; &nbsp;<a class="fonterodape" href="sair.php"><font color="#333333">SAIR DO SISTEMA</font></a></td>
  </tr>
</table>
<?php } ?>
<?php
} else {
?> 
      
<script language="JavaScript" type="text/javascript">
function validargeral(logingeral) { 

if (document.logingeral.usuario.value=="") {
alert("O Campo Usuário não está preenchido!")
logingeral.usuario.focus();
return false
}

if (document.logingeral.senha.value=="") {
alert("O Campo Senha não está preenchido!")
logingeral.senha.focus();
return false
}

}

                        </script>
              <form action="autoriza.php" method="post" name="logingeral" onsubmit="return validargeral(this)">
      <table width="86%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td align="center"><b>Área Exclusiva Para Assinantes Online</b></td>
        </tr>
        <tr>
          <td><table width="88%" border="0" align="center">
            <tr>
              <td width="10%">Login:&nbsp;&nbsp;</td>
              <td width="90%"><input name="usuario" type="text" class="texto" size="20">
                *</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td><table width="88%" border="0" align="center">
            <tr>
              <td width="19%">Senha:</td>
              <td width="56%"><input name="senha" type="password" class="texto" size="14">
*</td>
              <td width="25%"><input name="button" type="image" class="texto" src="imagens/chave.png" alt="Efetuar Login" title="Efetuar Login"></td>
            </tr>
          </table></td>
        </tr>
      </table></form><?php } ?></td>
    </tr>
  </table>