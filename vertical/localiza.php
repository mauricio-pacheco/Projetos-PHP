<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vertical Turismo</title>
<LINK rel=stylesheet type=text/css href="classes/estilos.css">
</head>

<style type="text/css">
      @import url("http://www.google.com/uds/css/gsearch.css");
      @import url("http://www.google.com/uds/solutions/localsearch/gmlocalsearch.css");
      }
    </style>
    <script src=  "http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA_gBBHzzjFj50hx6J2Nno-hSmmPvILZyS7j866BxUwtL8GEL3nRSpxnZ5VaHrlDEyDut4nlq1LvNEqQ" type="text/javascript"></script>
    <script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0" type="text/javascript"></script>
    <script src="classes/gmlocalsearch.js" type="text/javascript"></script>    
    <script type="text/javascript">
 
      function initialize() {
        if (GBrowserIsCompatible()) {
        
          // Create and Center a Map
          var map = new GMap2(document.getElementById("map_canvas"));
          map.setCenter(new GLatLng(-27.346764, -53.393555), 11);
          map.addControl(new GLargeMapControl());
          map.addControl(new GMapTypeControl());
 
          // bind a search control to the map, suppress result list
          map.addControl(new google.maps.LocalSearch(), new GControlPosition(G_ANCHOR_BOTTOM_RIGHT, new GSize(10,20)));
        }
      }
      GSearch.setOnLoadCallback(initialize);
    </script>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" onLoad="initialize()" onUnload="GUnload()">
<?php include("cima.php"); ?>
<?php include("banner.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="26%" valign="top"><?php include("menu.php"); ?></td>
        <td width="74%" valign="top">
               <table width="636" border="0" cellpadding="0" cellspacing="0" align="center">
          <tr>
            <td bgcolor="#f9f9f9"><img src="imagens/barra4.jpg" /></td>
          </tr></table>
           <table width="636" height="2" align="center" cellspacing="0" cellpadding="0" border="0">
               <tr>
                 <td bgcolor="#4893B9"><img src="imagens/branco.gif" width="2" height="2" /></td>
               </tr>
            </table>
          <table width="636" border="0" cellpadding="0" cellspacing="0" align="center">
          <tr>
            <td bgcolor="#f9f9f9"><table width="100%" border="0">
              <tr>
                <td><table width="100%" border="0">
                  <tr>
                    <td align="left" class="fontetabela">A Vertical Turismo localiza-se na cidade de Frederico Westphalen/RS.<br /><br />Frederico Westphalen é um município brasileiro do estado do Rio Grande do Sul. Localiza-se a uma latitude 27º21'33&quot; sul e a uma longitude 53º23'40&quot; oeste, estando a uma altitude de 566 metros. Sua população, de acordo com a estimativa para 2008, feita pelo IBGE, é de 28.295 habitantes. Possui uma área de 264,53 km².</td>
                  </tr>
                  <tr>
                    <td align="left" class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                  <tr>
                    <td align="left" class="fontetabela"><strong>Pesquise sua rota:</strong></td>
                    </tr>
                  <tr>
                    <td class="pontilhada" align="center"> <div id="map_canvas" style="width: 100%; height: 400px"></div></td>
                    </tr>
                </table></td>
                </tr>
            </table></td>
          </tr>
        </table>
          <table width="636" height="2" align="center" cellspacing="0" cellpadding="0" border="0">
               <tr>
                 <td bgcolor="#4893B9"><img src="imagens/branco.gif" width="2" height="2" /></td>
               </tr>
            </table></td>
      </tr>
    </table></td>
  </tr>
</table><br />
<?php include("baixo.php"); ?>
</body>
</html>