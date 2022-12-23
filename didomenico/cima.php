<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="252"><img src="imagens/logo.png" /></td>
        <td width="728" valign="top" background="imagens/fundo.png">
        <script>

var req;
function loadXMLDoc(url){
 req = null;

if (window.XMLHttpRequest) {
 req = new XMLHttpRequest();
 req.onreadystatechange = processReqChange;
 req.open("GET", url, true); 
 req.send(null);

} else if (window.ActiveXObject) {
try {
req = new ActiveXObject("Msxml2.XMLHTTP.4.0");
} catch(e) {
try {
req = new ActiveXObject("Msxml2.XMLHTTP.3.0");
} catch(e) {
try {
req = new ActiveXObject("Msxml2.XMLHTTP");
} catch(e) {
try {
req = new ActiveXObject("Microsoft.XMLHTTP");
} catch(e) {
req = false;
}
}
}
}
if (req) {
 req.onreadystatechange = processReqChange;
 req.open("GET", url, true);
 req.send();
}
}
}


function processReqChange(){

if (req.readyState == 4) {
if (req.status == 200) {

document.getElementById("atualiza").innerHTML = req.responseText;
} else {
alert("Houve um problema ao obter os dados:\n" + req.statusText);
}
}
}



function atualiza(valor){
loadXMLDoc("subdeps.php?id="+valor);
}

</script>
         <form action="pesquisa.php" method="post" name="form1" id="form1"> <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td>
              <table width="92%" border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="23%"><img src="imagens/pesquisar.png" width="130" height="24" /></td>
                  <td width="1%"><img src="imagens/branco.gif" width="6" height="2" /></td>
                  <td width="14%"><span class="manchete_texto">
                    <select name="departamento" class="manchete_texto9" style="width:180px" onblur="atualiza(this.value);">
                                           <option value="#">
                                       Selecione o tipo de imóvel
</option>
                                            <?
		  include "administrador/conexao.php";
		  $result = mysql_query("SELECT * FROM cw_depprod ORDER BY 'nome' ASC");
		  while($row = mysql_fetch_array($result)){
		  echo "<option value=\"$row[id]\">$row[nome]</option>";
		  }
		  ?>
                    </select>
                  </span></td>
                  <td width="1%"><img src="imagens/branco.gif" width="6" height="2" /></td>
                                   <td width="14%"><div id="atualiza"><select style="width:200px" name="subdep" class="manchete_texto9">
                                     <option value="#">
                                       Selecione o tipo de imóvel primeiro
                                     </option>
                                   </select></div></td>
                  <td width="1%"><img src="imagens/branco.gif" width="6" height="2" /></td>
                  <td width="47%"><span class="manchete_textocasab">Tipo: </span>                    <select name="tipo" class="manchete_texto9" id="select">
                                        <option value="Venda">Venda</option>
                                        <option value="Loca&ccedil;&atilde;o">Loca&ccedil;&atilde;o</option>
                  </select></td>
                  <td width="6%"><input type="image" alt="PESQUISAR" title="PESQUISAR" src="imagens/lupa.png" name="button" id="button" value="Submit" /></td>
                </tr>
              </table></td>
            </tr>
          </table>
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
               <td><img src="imagens/branco.gif" width="2" height="10" /></td>
             </tr>
           </table>
         </form>
          
        <table width="710" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="76%" align="right"><a href="cadastro.php"><img alt="CADASTRE SEU IMÓVEL" title="CADASTRE SEU IMÓVEL" src="imagens/cadastre.png" width="224" height="30" border="0" /></a></td>
            <td width="1%">&nbsp;</td>
            <td width="23%"><img src="imagens/fone.png" width="160" height="30" /></td>
          </tr>
        </table>
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="24" /></td>
            </tr>
      </table>            
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="right"><SCRIPT src="classes/carrega.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash("imagens/menu.swf","714","30"); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT></td>
            </tr>
      </table></td>
      </tr>
    </table>
<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='cabecalho' AND status='0' ORDER BY rand()");

while($y = mysql_fetch_array($sql))
   {
	  $tipo = $y["tipo"]; 
	  
   ?>
<table bgcolor="#EC1D25" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php
						  if ($tipo=='imagem') {
						  						  ?>
      <a href="<?php echo $y["link"]; ?>" target="_blank"><img alt="<?php echo $y["descricao"]; ?>" title="<?php echo $y["descricao"]; ?>" border="0" src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>" width="978" height="250" /></a>
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
  <tr> </tr>
</table>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
