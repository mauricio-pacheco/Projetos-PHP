<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png"><table width="100%" height="30" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3%" align="center"><img src="imagens/lupa.png" width="23" height="23" /></td>
        <td width="35%"><span class="fontebaixo2">
          <FORM style="MARGIN: 0px" name="form_busca" action="buscanormal.php" 
                  method=post><input type="text" size="36" class="texto" onclick="this.value=''" value="Digite a Palavra Chave" name="palavra"  />
           <input type="submit" class="texto" value="Pesquisar no site" /></FORM>
        </span></td>
        <td width="4%" align="center"><img src="imagens/user.png" /></td>
        <td width="43%">
              <?php
include "administrador/conexao.php";
$logado = $_COOKIE['usuario'];
$logado2 = $_COOKIE['senha'];

$sql = mysql_query("SELECT * FROM cw_clientes WHERE usuario = '$logado' AND senha = sha1('$logado2')");
$contar = mysql_num_rows($sql); 

if ( $contar == 1 ) {
	
?>     
<?php
while($y = mysql_fetch_array($sql))
   {
?>
<span class="manchete_textocasa"><font color="#FFFFFF">&nbsp;Bem vindo: <b><?php echo $y["cliente"]; ?></b></font></span><span class="manchete_texto9"><font color="#FFFFFF">&nbsp; &bull; &nbsp;</font><a class="manchete_texto9" href="altera.php?id=<?php echo $y["id"]; ?>&amp;usuario=<?php echo $y["usuario"]; ?>"><font color="#ffffff">Alterar Dados Pessoais</font></a><font color="#FFFFFF">&nbsp; &bull; &nbsp;</font><a class="manchete_texto9" href="sair.php"><font color="#E60000">Sair do Sistema</font></a></span>	
		<?php } ?>
<?php
} else {
?> 
        <FORM style="MARGIN: 0px" name="form_busca" action="autoriza.php" 
                  method=post><span style="MARGIN: 0px">
          <span class="manchete_texto989"><strong>OUVINTES:&nbsp;</strong></span>
                     <input type="text" size="20" class="texto" onclick="this.value=''" value="Usuário" name="usuario"  />
          <input type="password" size="20" class="texto" onclick="this.value=''" value="Senha" name="senha"  />
          <input type="submit" class="texto" value="Efetuar Login" /></FORM><?php } ?></td>
        <td width="15%"><a href="cadastro.php"><img src="imagens/bcad2.png" alt="Efetuar Cadastro de Ouvinte" title="Efetuar Cadastro de Ouvinte" width="150" height="28" border="0" /></a></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" background="imagens/bggeral.png"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
