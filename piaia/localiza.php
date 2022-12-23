<?php include("meta.php"); ?>
<style type="text/css">
      @import url("http://www.google.com/uds/css/gsearch.css");
      @import url("http://www.google.com/uds/solutions/localsearch/gmlocalsearch.css");
      }
    </style>
    <script src=  "http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA_gBBHzzjFj50hx6J2Nno-hQZQUfPsoaPWnS7psXMtU7eSiZgZxQS1uyvAXeE5dZ4kNyvBFYkMt_EjA
" type="text/javascript"></script>
    <script src="http://www.google.com/uds/api?file=uds.js&amp;v=1.0" type="text/javascript"></script>
    <script src="classes/gmlocalsearch.js" type="text/javascript"></script>    
    <script type="text/javascript">
 
      function initialize() {
        if (GBrowserIsCompatible()) {
        
          // Create and Center a Map
          var map = new GMap2(document.getElementById("map_canvas"));
          map.setCenter(new GLatLng(-27.354616,-53.556676), 11);
          map.addControl(new GLargeMapControl());
          map.addControl(new GMapTypeControl());
 
          // bind a search control to the map, suppress result list
          map.addControl(new google.maps.LocalSearch(), new GControlPosition(G_ANCHOR_BOTTOM_RIGHT, new GSize(10,20)));
        }
      }
      GSearch.setOnLoadCallback(initialize);
    </script>
<body topmargin="0" leftmargin="0">
<table width="980" height="160" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','160'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("busca.php"); ?></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0">
      <tr>
        <td class="fontetabela"><strong>LOCALIZAÇÃO</strong></td>
      </tr>
    </table>
      <table width="100%" border="0">
        <tr>
          <td><p class="fontetabela">Palmitinho é um município brasileiro do estado do Rio Grande do Sul.</p>
            <p><span class="fontetabela">Localiza-se a uma latitude 27º21'18&quot; sul e a uma longitude 53º33'18&quot; oeste, estando a uma altitude de 516 metros. Sua população estimada em 2004 era de 7.014 habitantes.<br />
              <br />
              Possui uma área de 144,48 km². É um município que faz parte da Microrregião Frederico Westphalen.<br /><br />
              A PIAIA VEÍCULOS localiza-se em Palmitinho/RS na Rua Rio Branco - 317 - Bairro: Centro - CEP: 98430-000..</span><br />
          </p></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" class="pontilhada">
            <tr>
              <td><div id="map_canvas" style="width: 100%; height: 500px"></div></td>
            </tr>
          </table></td>
        </tr>
    </table>
      <table width="100%" border="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>