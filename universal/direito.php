<table width="235" height="30" border="0" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
  <tr>
    <td height="24" background="imagens/pecasua.png"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       <td width="99%" class="manchete_texto9">&nbsp;&nbsp;<font color="#FFFFFF"><b><a class="manchete_texto9" href="pecamusica.php">PEÇA SUA MÚSICA</a></b></font></td>
        <td width="1%"><img src="imagens/branco.gif" width="20" height="2" /></td>
      </tr>
    </table></td>
  </tr>
</table>

<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='laterald' AND status='0' ORDER BY rand()");

while($y = mysql_fetch_array($sql))
   {
	  $tipo = $y["tipo"]; 
	  
   ?>
   
   
      <?php
						  if ($tipo=='imagem') {
						  						  ?>
      <a href="<?php echo $y["link"]; ?>" target="_blank"><img alt="<?php echo $y["descricao"]; ?>" title="<?php echo $y["descricao"]; ?>" border="0" src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" width="235" /></a>
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
<?php } } ?><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="2" /></td>
  </tr>
</table>
<table width="235" height="30" border="0" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
  <tr>
    <td height="24" background="imagens/b4.png"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="99%" class="manchete_texto">&nbsp;&nbsp;<font color="#FFFFFF"><b>TOP 10 MUSICAL</b></font></td>
        <td width="1%"><img src="imagens/branco.gif" width="20" height="2" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><iframe marginwidth="0" marginheight="0" src="passos/univer.php" frameborder="0" width="235" scrolling="No" height="555"></iframe></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>
<table width="235" height="30" border="0" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
  <tr>
    <td height="24" background="imagens/b4.png"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="99%" class="manchete_texto">&nbsp;&nbsp;<font color="#FFFFFF"><b>METEOROLOGIA</b></font></td>
        <td width="1%"><img src="imagens/branco.gif" width="20" height="2" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
    </style>
      <!-- Inicio Banner Tempo Agora - http://www.tempoagora.com.br -->
      <iframe src="http://www.tempoagora.com.br/selos_iframe/sky_RodeioBonito-RS.html" height="260px" width="180px" frameborder="0" allowtransparency="yes" scrolling="no"></iframe>
      <!--Fim Banner Tempo Agora - http://www.tempoagora.com.br --></td>
  </tr>
</table>
