<?php include("meta.php"); ?>
<script language="javascript">
function toggle(obj) {
var el = document.getElementById(obj);
if ( el.style.display != 'none' ) {
el.style.display = 'none';
}
else {
el.style.display = '';
}
}
 </script>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','210'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
<?php include("cabecalho.php"); ?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png"><SCRIPT src="classes/carrega2.js"></SCRIPT>
    <SCRIPT language=javascript>
     carregaFlash('flash/menu.swf','980','40'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top">
      <table width="976" border="0" align="center">
      <tr>
        <td width="235" valign="top">
        <?php include("esquerdo.php"); ?>
          </td>
        <td width="494" valign="top" bgcolor="#FFFFFF">
        <table width="494" height="29" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#026DA2" style="margin-bottom:4px">
                <tr>
                  <td height="24" background="imagens/b5.png"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="90%" class="manchete_texto" align="center"><font color="#FFFFFF"><b>ÚLTIMAS NOTÍCIAS</b></font></td>
                    </tr>
                  </table></td>
                </tr>
          </table>
         <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_noticias ORDER BY id DESC LIMIT 6");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="manchete_textocasa9">
              <tr>
                <?php if ($y["foto"]=='') { } else { ?><td width="23%" class="pontilhada2"><a href="vernoticia.php?id=<?php echo $y["id"]; ?>"><img title="<?php echo $y["titulo"]; ?>" alt="<?php echo $y["titulo"]; ?>" src="administrador/ups/capasnoticia/<?php echo $y["foto"]; ?>" border="0" /></a> </td><?php 
  }
 ?> 
                <td width="77%" valign="top"><table width="100%" border="0">
                  <tr>
                    <td class="manchete_texto99"><?php echo $y["data"]; ?>  - <b><?php echo $y["titulo"]; ?></b></td>
                  </tr>
                  <tr>
                    <td class="manchete_texto99"><div align="justify"><?php echo $y["legenda"]; ?></div></td>
                  </tr>
                  <tr>
                    <td class="manchete_texto99">( <?php echo $y["contador"]; ?> Visualizações ) Sessão: <b>
                      <?php $iddep = $y["iddep"];
	$sql2 = mysql_query("SELECT * FROM cw_depnot WHERE id = '$iddep'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["departamento"];  }
	
	?>
                    </b></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0">
                      <tr>
                        <td width="3%"><a style="cursor:hand;" onClick="toggle('maisinfo<?php echo $y["id"]; ?>');" class="manchete_texto99"><img border="0" src="imagens/mais.png" /></a></td>
                        <td width="97%" class="manchete_texto99">&nbsp;<a style="cursor:hand;" onClick="toggle('maisinfo<?php echo $y["id"]; ?>');" class="manchete_texto99">Leia mais...</a></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
              <div class="manchete_texto99" id="maisinfo<?php echo $y["id"]; ?>" style="display:none">
			  <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
                    <script type="text/javascript" src="js/prototype.js"></script>
                    <script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
                    <script type="text/javascript" src="js/lightbox.js"></script>
                    <?php

include "administrador/conexao.php";

$id = $y["id"];

$sql2="SELECT * FROM cw_anexosnot WHERE idnot='$id'"; 
$resultado2=mysql_query($sql2);

while($linha2= mysql_fetch_array($resultado2))
{

echo 
"<a href='administrador/ups/fotosnot/g/".$linha2['fotomaior']."' rel='lightbox['roadtrip']' title='".$linha2["legenda"]."'><img alt='VISUALIZAR IMAGEM' border='0' src='administrador/ups/fotosnot/p/".$linha2['fotomenor']."'></a><img src=imagens/branco.gif width=5 height=2>
";

}
  
   ?>
			  <?php echo $y["texto"]; ?></div>
              <?php
  }
  }
 ?></td>
        <td width="235" valign="top"><?php include("direito.php"); ?></td>
          </tr>
        </table></td>
      </tr>
    </table>
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td background="imagens/bggeral.png" valign="top"><img src="imagens/branco.gif" width="2" height="3" /></td>
  </tr>
</table>
    </td>
  </tr>
</table>
<?php include("baixoconta.php"); ?>
<table width="980" background="imagens/baixo.png" height="16" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><img src="imagens/branco.gif" width="2" height="16" /></td>
  </tr>
</table><br /><br />
</body>
</html>
