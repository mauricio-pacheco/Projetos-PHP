<?php include("meta2.php"); ?>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript"    src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">

function initialize() {  
var myLatlng = new google.maps.LatLng(-27.356163,-53.401356);
var myOptions = {    
zoom: 16,    
center: myLatlng,   
mapTypeId: 
google.maps.MapTypeId.ROADMAP  }  

var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);  


var mapa1 = new google.maps.LatLng(-27.356163,-53.401356); 
var beachMarker1 = new google.maps.Marker({      
position: mapa1,      
map: map,     
icon: 'imagens/target.png'
})
var infowindow1 = new google.maps.InfoWindow(
{ content: "<b>V-Mat Imagem</b><br>Frederico Westphalen/RS<br>Rua Sete de Setembro, 90 - Centro<br>",
size: new google.maps.Size(50,50),
position: mapa1
});
google.maps.event.addListener(beachMarker1, 'click', function() {
infowindow1.open(map);
});

;  }

</script>
<?php include("estilos.php"); ?>


<table width="934" height="352" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
    <div id="geral" align="center">
<SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('index.swf','934','352'); 
    </SCRIPT></div>
    <div id="alternativo" class="slideshowb1">
	<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_publicidades WHERE local='contatos'");
$contar = mysql_num_rows($sql); 

while($y = mysql_fetch_array($sql))
   {

	
?>

<img src="administrador/ups/publicidades/<?php echo $y["arquivo"]; ?>"  />

<?php } ?>
</div></td>
  </tr>
</table>
<table width="934" height="427" style="background-image:url(imagens/outronovo.png); background-repeat:repeat-x" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table height="360" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="6" /></td>
          </tr>
        </table>
<script language="javascript" type="text/javascript">
function validar(cadastro) { 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome não está preenchido!")
cadastro.nome.focus();
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
<form action="enviac.php" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro" onsubmit="return validar(this)">
<table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
            <td width="49%"><img src="imagens/tcontato2.png" /></td>
            <td width="2%">&nbsp;</td>
            <td width="49%">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
          </tr>
          <tr>
            <td valign="top" class="fonte"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/nomec.png" width="71" height="24" /></td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><input name="nome" type="text" size="60" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/emailc.png" /></td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                </tr>
              </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><input name="email2" type="text" size="60" /></td>
                </tr>
              </table>
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/mensagemc.png" /></td>
                </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                </tr>
              </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><textarea name="mensagem" cols="46" rows="8"></textarea></td>
                </tr>
              </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                </tr>
              </table>
              <table width="90%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="right"><input type="image" src="imagens/benviar.png" name="button" value="Enviar" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="fonte"><?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_galeria WHERE nomegaleria='CONTATOS'");

while($y = mysql_fetch_array($sql))
   {
   ?><font color="#333333"><?php echo $y["comentario"]; ?></font><?php
  
  }
 ?></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="2" height="4" /></td>
                </tr>
              </table></td>
            <td>&nbsp;</td>
            <td class="fonte" valign="top"><div id="map_canvas" style="width:425px; height:350px"></div></td>
          </tr>
        </table></form>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="6" /></td>
            </tr>
          </table></td>
      </tr>
    </table>
     <?php include("baixo.php"); ?>