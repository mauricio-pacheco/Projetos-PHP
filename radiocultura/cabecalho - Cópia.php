<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" height="30" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3%" align="center"><img src="imagens/lupa.png"/></td>
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

$sql = mysql_query("SELECT * FROM cw_clientes WHERE usuario = '$logado' AND senha = '$logado2'");
$contar = mysql_num_rows($sql); 

if ( $contar == 1 ) {
	
?>     
<?php
while($y = mysql_fetch_array($sql))
   {
?>
<span class="manchete_textocasa">&nbsp;Bem vindo: <b><?php echo $y["cliente"]; ?></b></span><span class="manchete_texto9">&nbsp; &bull; &nbsp;<a class="manchete_texto9" href="altera.php?id=<?php echo $y["id"]; ?>&amp;usuario=<?php echo $y["usuario"]; ?>"><font color="#333333">Alterar Dados Pessoais</font></a>&nbsp; &bull; &nbsp;<a class="manchete_texto9" href="sair.php"><font color="#E60000">Sair do Sistema</font></a></span>	
		<?php } ?>
<?php
} else {
?> 
        <FORM style="MARGIN: 0px" name="form_busca" action="autoriza.php" 
                  method=post><span style="MARGIN: 0px">
          <span class="manchete_textocasa"><strong>OUVINTES:&nbsp;</strong></span>
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
    <td bgcolor="#DFE8EC" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<table width="980" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="73%" align="left"><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='cabecalho' AND status='0' ORDER BY rand() LIMIT 1");

while($y = mysql_fetch_array($sql))
   {
	  $tipo = $y["tipo"]; 
	  
   ?>
          <?php
						  if ($tipo=='imagem') {
						  						  ?>
          <a href="<?php echo $y["link"]; ?>" target="_blank"><img alt="<?php echo $y["descricao"]; ?>" title="<?php echo $y["descricao"]; ?>" border="0" src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" /></a>
          <?php
						  } else {
						  ?>
          <script src="administrador/scripts/swfobject_modified.js" type="text/javascript"></script>
          <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="<?php echo $y["f1"]; ?>" height="<?php echo $y["f2"]; ?>">
            <param name="movie" value="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" />
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="6.0.65.0" />
            <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don&rsquo;t want users to see the prompt. -->
            <param name="expressinstall" value="administrador/scripts/expressInstall.swf" />
            <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" width="<?php echo $y["f1"]; ?>" height="<?php echo $y["f2"]; ?>">
              <!--<![endif]-->
              <param name="quality" value="high" />
              <param name="wmode" value="opaque" />
              <param name="swfversion" value="6.0.65.0" />
              <param name="expressinstall" value="administrador/scripts/expressInstall.swf" />
              <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
              <div>
                <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                </div>
              <!--[if !IE]>-->
              </object>
            <!--<![endif]-->
            </object>
          <script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
              </script>
          <?php } } ?></td>
       </tr>
</table></td>
</tr>
  
  <tr>
    <td bgcolor="#DFE8EC" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
<tr>
    <td align="center" bgcolor="#FFFFFF"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr> </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
