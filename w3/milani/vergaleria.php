<?php include("meta.php"); ?>
<?php include("head.php"); ?>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<BODY class="auto fs3" id=bd>
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
                        <td class="manchete_texto"><b>P&aacute;gina Principal</b></td>
                      </tr>
                    </table>
                    <table width="100%" border="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="2"></td>
                      </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                      <tr>
                        <td><table width="98%" border="0" align="center">
                          <tr>
                            <td border="0"><table width="100%" border="0" align="center">
                              <tr>
                                <td border="0">
								<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
								<?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM gestao_galeria WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center class=manchete_texto>Não existe noticías cadastradas!</div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                                
                                  <table width="100%" border="0" align="center">
                                    <tr>
                                      <td align="center" class="manchete_texto"><?php
                     $branca = $y["foto"];
					 $testeb = '';
					 if ($branca == $testeb)
					 {
					  					  ?>
                                        <?php } else { ?>
                                        <img src="administrador/galerias/<?php echo $y["foto"]; ?>" />
                                        <?php } ?></td>
                                    </tr>
                                    <tr>
                                      <td align="center" class="manchete_texto"><b><?php echo $y["nomegaleria"]; ?></b><br>
                                        Data da Galeria: <?php echo $y["dataevento"]; ?></td>
                                    </tr>
                                    <tr>
                                      <td align="center" class="manchete_texto">Data de Publica&ccedil;&atilde;o: <?php echo $y["data"]; ?> --- ( <?php echo $y["hora"]; ?> Hs )</td>
                                    </tr>
                                    <tr>
                                      <td align="left">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td align="left"><div align="left" class="manchete_texto"><?php echo $y["comentario"]; ?></div></td>
                                    </tr>
                                    <tr>
                                      <td align="left">&nbsp;</td>
                                    </tr>
                                                                      <tr>
                                                                        <td align="left"><div align="center">
                                                                          <?php }  ?>
                                                                          <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql="SELECT * FROM gestao_fotos WHERE idgaleria='$id'"; 
$resultado=mysql_query($sql);

while($linha= mysql_fetch_array($resultado))
{

echo 
"<a href='administrador/fotosgaleria/g/".$linha['foto']."' rel='lightbox['roadtrip']' title='".$linha["comentario"]."'><img alt='VISUALIZAR IMAGEM' border='0' src='administrador/fotosgaleria/p/".$linha['fotomenor']."'></a>
";

}}
  
   ?>
                                                                        </div></td>
                                                                      </tr>
                                                                      <tr>
                                      <td align="left" width="14%"><br><a href="javascript:history.go(-1)"><img src="imagens/voltar.jpg" border="0"></a><br /></td>
                                    </tr>
                                  </table></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
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
