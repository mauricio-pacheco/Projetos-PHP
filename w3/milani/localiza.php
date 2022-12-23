<?php include("meta.php"); ?>
<?php include("head.php"); ?>
<style type="text/css">
      @import url("http://www.google.com/uds/css/gsearch.css");
      @import url("http://www.google.com/uds/solutions/localsearch/gmlocalsearch.css");
      }
    </style>
    <script src=  "http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA_gBBHzzjFj50hx6J2Nno-hSubjlxlBqM96KYSZuyEYQwKggjwxTgaPZb7zVlwjKPNSgFX8SNxWY3FQ" type="text/javascript"></script>
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
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<BODY class="auto fs3" id=bd onLoad="initialize()" onUnload="GUnload()">
<TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
  <TBODY>
    <TR>
      <TD>
     <?php include("cabecalho.php"); ?>
      <TABLE border=0 cellSpacing=0 cellPadding=0 width=100% 
              align=center>
        <TBODY>
          <TR>
            <TD bgColor=#ffffff align=middle>
             <?php include("cima.php"); ?></TD>
          </TR>
        </TBODY>
      </TABLE>
      <?php include("menu.php"); ?>
        <TABLE id=tabela border=0 cellSpacing=0 cellPadding=0 width=760 
      align=center>
          <TBODY>
            <TR>
              <TD id=header_td bgColor=#ffffff colSpan=2><?php include("banner.php"); ?></TD>
            </TR>
            <TR>
              <TD bgColor=#ffffff height=8 colSpan=2></TD>
            </TR>
            <TR>
              <TD background="imagens/fundotabela.jpg" vAlign=top width=200><?php include("esquerdo.php"); ?> <TD style="PADDING-LEFT: 8px; PADDING-RIGHT: 8px" id=main_td 
          bgColor=#ffffff vAlign=top width=544><DIV id=div-main>
                <CENTER>
                  <DIV style="Z-INDEX: 666" id=flash1>
                    <table background="imagens/barra1.jpg" height="40" width="100%" border="0">
                      <tr>
                        <td class="manchete_texto"><b>
                          Frederico Westphalen - Localiza&ccedil;&atilde;o</b></td>
                      </tr>
                    </table>
                    <table width="100%" border="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="2"></td>
                      </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><img src="imagens/barratabela2.png"></td>
                      </tr>
                    </table>
                    <table bgcolor="#FAFAFA" width="100%" border="0">
                      <tr>
                        <td valign="top"><table width="100%" border="0" align="center">
                          <tr>
                            <td width="2%" class="manchete_texto"><div align="justify">Frederico Westphalen &eacute; um munic&iacute;pio brasileiro do estado do Rio Grande do Sul. Localiza-se a uma latitude 27&ordm;21'33&quot; sul e a uma longitude 53&ordm;23'40&quot; oeste, estando a uma altitude de 566 metros. Sua popula&ccedil;&atilde;o, de acordo com a estimativa para 2008, feita pelo IBGE, &eacute; de 28.295 habitantes. Possui uma &aacute;rea de 264,53 km&sup2;. &Eacute; o centro regional da microrregi&atilde;o hom&ocirc;nima.</div></td>
                            </tr>
                        </table></td>
                      </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><img src="imagens/barratabela2.png"></td>
                      </tr>
                    </table>
                    <table width="100%" border="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="2"></td>
                      </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><img src="imagens/barralocal.png"></td>
                      </tr>
                    </table>
                    
                    
                    
                   <table bgcolor="#FAFAFA" width="100%" border="0">
                      <tr>
                        <td valign="top"><table width="100%" border="0" align="center">
                          <tr>
                            <td valign="top">


  
   <table width="100%" border="0">
                              <tr>
                                  <td class="pontilhada" align="center"> 
								 <div id="map_canvas" style="width: 500px; height: 300px"></div></td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><img src="imagens/barratabela2.png"></td>
                      </tr>
                    </table>
                    <table width="100%" border="0"><tr>
                                      <td align="left" width="14%"><br>                                        <br /></td>
                                    </tr>
                                  </table> 
                    
                    
                 <table width="100%" border="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="2"></td>
                      </tr>
                    </table>   
                    
                    
                    
                  </DIV>
                </CENTER>
              </DIV></TD>
            </TR>
        </TABLE></TD>
      <TD width=1>&nbsp;</TD>
      <TD vAlign=top></TD>
    </TR>
  </TBODY>
</TABLE>
<DIV id=barra_login>
<DIV style="BACKGROUND-COLOR: #FF7800" id=cabecalho2>
<TABLE border=0 cellSpacing=0 cellPadding=0 width=740 align=center>
  <TBODY>
  <TR>
    
    <TD vAlign=center width=408 align=left>
      <TABLE border=0 cellSpacing=0 cellPadding=0 width=467>
        <TBODY>
        <TR>
          <TD vAlign=center width=202 align=left>&nbsp;</TD>
          <TD vAlign=center width=180 align=left>&nbsp;</TD>
          <TD vAlign=center width=85 align=left>&nbsp;</TD></TR></TBODY></TABLE></TD>
<TD vAlign=center width=332 align=right>&nbsp;</TD></TR></TBODY></TABLE></DIV></DIV>
<DIV id=bottom>
  <table width="100%" height="120" border="0" align="center" background="imagens/baixo.gif">
    <tr>
      <td valign="top"><?php include("rodape.php"); ?></td>
    </tr>
  </table>
<DIV style="BACKGROUND-COLOR: #FF7800"></DIV></DIV>
<SCRIPT type=text/javascript>
    <!--
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    -->	
    </SCRIPT>

<SCRIPT type=text/javascript>
    <!--
        try {
            var pageTracker = _gat._getTracker("UA-5629445-1");
            pageTracker._trackPageview();
        } catch(err) {}
    -->
    </SCRIPT>
</BODY></HTML>
