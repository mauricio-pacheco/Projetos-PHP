<table background="imagens/fundocima.png" width="100%" border="0" align="center" class="fonte" bgcolor="#FFFFFF" cellpadding="0" cellspacing="0">
    <tr>
      <td width="25%" align="center" valign="top"><iframe src="http://www.tempoagora.com.br/selos_iframe/wide_FredericoWestphalen-RS.html" height="120px" width="180px" frameborder="0" allowtransparency="yes" scrolling="no"></iframe>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="2" /></td>
          </tr>
        </table>
      <a href="http://www.tempoagora.com.br" class="fonte" target="_blank">VISUALIZAR A PREVISÃO EM SUA CIDADE</a>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="2" height="2" /></td>
        </tr>
      </table></td>
      <td width="50%" align="center"><a href="principal.php"><img src="imagens/logo.jpg" border="0" /></a></td>
      <td width="25%">
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
<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
  </tr>
  <tr>
    <td width="14%"><img src="imagens/perfil.png" /></td>
    <td width="86%"><b><?php echo $y["cliente"]; ?></b></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td>&nbsp; &bull; &nbsp;<a class="fonte" href="altera.php?id=<?php echo $y["id"]; ?>&amp;usuario=<?php echo $y["usuario"]; ?>">ALTERAR DADOS PESSOAIS</a></td>
  </tr>
   <tr>
    <td>&nbsp; &bull; &nbsp;<a class="fonte" href="assinatura.php">MINHAS ASSINATURAS</a></td>
  </tr>
  <tr>
    <td>&nbsp; &bull; &nbsp;<a class="fonte" href="sair.php">SAIR DO SISTEMA</a></td>
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
          <td align="center"><b>Área Exclusiva Para Assinantes</b></td>
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
              <td width="22%">Senha:</td>
              <td width="62%"><input name="senha" type="password" class="texto" size="14">
*</td>
              <td width="16%"><input name="button" type="image" class="texto" src="imagens/chave.png" alt="Efetuar Login" title="Efetuar Login"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td align="left" class="fonte"><table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><b><a href="cadastro.php" class="fonte">Seja um Assinante...</a></b></td>
  </tr>
</table>
</td>
        </tr>
      </table></form><?php } ?></td>
    </tr>
  </table>