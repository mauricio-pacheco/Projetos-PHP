<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Spazio Club</TITLE>
<META content="Palavras, Chave" 
name=title>
<META content="Fotos, Shows, Festas, Raves e Baladas." name=subject>
<META content=general name=rating>
<META content="5 days" name=revisit-after>
<META content=pt-br name=language>
<META content="index, follow" name=robots>
<META content="index, follow" name=googlebot>
<META content=all name=audience>
<META content=magee name=DC.title>
<META content=Completed name=doc-class>
<META content="Mandry" name=author>
<META http-equiv=Pragma content=no-cache>
<META http-equiv=Content-Type content="text/html; charset=utf-8"><LINK 
rev=stylesheet media=screen href="index_arquivos/screen.css" type=text/css 
charset=utf-8 rel=stylesheet><LINK rev=stylesheet media=screen 
href="index_arquivos/home.css" type=text/css charset=utf-8 rel=stylesheet>
<SCRIPT src="index_arquivos/flash.js" type=text/javascript 
charset=utf-8></SCRIPT>
<META content="MSHTML 6.00.6000.16705" name=GENERATOR>
<style type="text/css">
<!--
.style1 {font-size: 11px}
.style22 {color: #FFFFFF;
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style19 {color: #FFFFFF; font-size: 14px; }
.style24 {color: #FEDC01}
-->
</style>
</HEAD>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<BODY><div align="center">
<DIV id=wrapper>
<DIV id=globalnav>
<DIV id=globalnav-content>
<DIV id=logo style="MARGIN: -7px 0px 0px 15px"><?php include("imagem.php"); ?></DIV>
<DIV id=dynamic-title>
<H1 align="center"><img src="logospazio.png"></H1>
</DIV>
<DIV id=options>
<?php include("menu1.php"); ?></DIV></DIV></DIV>
<DIV id=menu align="center">
<?php include("menu2.php"); ?></DIV>
<DIV id=content>
  <table width="743" border="0" align="center">
    <tr>
      <td bgcolor="#272523"><table width="723" border="0" align="center">
          <tr>
            <td bgcolor="#000000"><table width="100%" border="0" align="center">
              <tr>
                <td><div align="center"><img src="ft.jpg" width="440" height="46"></div></td>
              </tr>
              <tr>
                <td><table width="96%" border="0" align="center" bgcolor="#000000">
                  <tr bgcolor="#FFFFFF">
                    <td bgcolor="#000000"><table width="98%" border="0" align="center">
                        <?php

include "../conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM galeria WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N&atilde;o existe notic&iacute;as cadastradas!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                        <tr>
                          <td><span class="style19"> <?php echo $y["nomegaleria"]; ?></span></td>
                        </tr>
                        <tr>
                          <td><span class="style22"><span class="style24">Data do Evento:</span> <?php echo $y["dataevento"]; ?></span></td>
                        </tr>
                        <tr>
                          <td><span class="style22"><?php echo $y["comentario"]; ?></span></td>
                        </tr>
                        <?
  }
  }
 ?>
                        <tr>
                          <td align="center">&nbsp;</td>
                        </tr>
                        <tr>
                          <td align="center" width="730"><?php

include "../conexao.php";

$id = $_GET['id'];

$sql="SELECT * FROM fotos WHERE galeria='$id'"; 
$resultado=mysql_query($sql);
$linha=mysql_fetch_array($resultado);

$k=1;
while($linha= mysql_fetch_array($resultado))
{

echo "
<a href='../galerias/".$linha['foto']."' rel='lightbox[roadtrip]' title='".$linha["comentario"]."'><img border='0' src='../galeriamenor/".$linha['galeriamenor']."'></a>&nbsp;&nbsp;&nbsp;
";
if ($k == 5)
{
echo "<br><br>";
$k=0;
}
$k++;
}
  
   ?></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><div align="center"><font size="2">Sugest&otilde;es ou Reclama&ccedil;&otilde;es favor entrar em contato   conosco pelo link CONTATOS</font></div></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><div align="center"><a href="javascript:history.back(1)"><img src="../imagens/volta.gif" border="0" /></a></div></td>
                        </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><div align="center"><img src="blank.gif" width="1" height="8"></div></td>
              </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
  </table>
</DIV>
<SCRIPT src="index_arquivos/0300.js" type=text/javascript> </SCRIPT>
<!-- globalfooter --><BR class=clear-both>
<?php include("patrocinadores.php"); ?>
<?php include("baixo.php"); ?></DIV>
</div></BODY></HTML>
