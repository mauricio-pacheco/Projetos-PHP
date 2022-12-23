<?php include("meta.php"); ?>

<body>
<?php include("cima.php"); ?>
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><table width="100%" height="22" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td class="fontetabela2" align="left"><font 
                                class="content">
              <table width="100%" border="0" align="center">
                <tr>
                  <td border="0"><link rel="stylesheet" href="classesfotos/css/lightbox.css" type="text/css" media="screen" />
                    <script type="text/javascript" src="classesfotos/js/prototype.js"></script>
                    <script type="text/javascript" src="classesfotos/js/scriptaculous.js?load=effects"></script>
                    <script type="text/javascript" src="classesfotos/js/lightbox.js"></script>
                    <table width="100%" border="0" align="center">
                      <tr>
                        <td align="center" class="manchete_texto"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left"><?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_galeria WHERE id='$id' ORDER BY id");
$sql2 = mysql_query("UPDATE cw_galeria set contador=contador + 1 where id='$id'");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center class=manchete_texto>N&atilde;o existe galerias cadastradas!</div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&Atilde;&iexcl; os registros. OBS: Voc&Atilde;&ordf; pode mudar o modo de exibir os registros
     //mais n&Atilde;&pound;o mude nenhuma vari&Atilde;&iexcl;vel, a n&Atilde;&pound;o ser que mude o script todo.
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                              &nbsp;<span class="fontetitulo4"><i><?php echo $y["nomegaleria"]; ?></i></span></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                          </tr>
                        </table>
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="32%"><?php
                     $branca = $y["foto"];
					 $testeb = '';
					 if ($branca == $testeb)
					 {
					  					  ?>
                              <?php } else { ?>
                              <img src="administrador/ups/galerias/<?php echo $y["foto"]; ?>" width="300" height="120" />
                              <?php } ?></td>
                            <td width="68%" valign="top" align="left"><span class="fontetabela">Data do Evento: <?php echo $y["dataevento"]; ?><br />
Data de Publica&ccedil;&atilde;o: <?php echo $y["data"]; ?> --- ( <?php echo $y["hora"]; ?> Hs )<br /><?php echo $y["comentario"]; ?></span></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr> </tr>
                    </table></td>
                </tr>
              </table>
              </font>
             
              <font 
                                class="content">
                <table width="100%" border="0" align="center">
                  <tr>
                    <td border="0"><table width="100%" border="0" align="center">
                                           <tr>
                        <td align="left"><div align="center">
                          <?php }  ?>
                          <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql="SELECT * FROM cw_fotos WHERE idgaleria='$id'"; 
$resultado=mysql_query($sql);

while($linha= mysql_fetch_array($resultado))
{

echo 
"<a href='administrador/ups/fotosgaleria/g/".$linha['foto']."' rel='lightbox['roadtrip']' title='".$linha["comentario"]."'><img  width=156 height=117 alt='VISUALIZAR IMAGEM' border='0' src='administrador/ups/fotosgaleria/p/".$linha['fotomenor']."'></a>
";

}}
  
   ?>
                        </div></td>
                      </tr>
                      <tr>
                        <td align="center" width="14%"><br />
                          <a href="javascript:history.go(-1)"><img src="imagens/voltar.png" border="0" /></a><br /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
              </font></td>
          </tr>
      </table></td>
      </tr>
  </table>
</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="2" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="2" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>