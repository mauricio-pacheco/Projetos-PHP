<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow" />
<?php include("meta.php"); ?>
<title>Jornal Frederiquense</title>
<link href="imagens/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="classes/import.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="geral"> 
<div class="topo"><?php include("cima.php"); ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr><td width="83%"><SCRIPT src="flash/carrega.js"></SCRIPT>
              <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','831','180'); 
    </SCRIPT></td><td width="17%" valign="bottom" align="right"><!-- Inicio Banner Tempo Agora - http://www.tempoagora.com.br -->
<iframe src="http://tempoagora.uol.com.br/selos/custom/selo_3dias.php?cid=FredericoWestphalen-RS,&height=155&cor=3aa564" name="tempoagora_custom_3dias" width="149" marginwidth="0" height="155" marginheight="0" scrolling="No" frameborder="0" id="tempoagora_custom_3dias"></iframe>
<!--Fim Banner Tempo Agora - http://www.tempoagora.com.br --></td>
      </tr>
    </table>
</div><hr class="dn">
<div class="corpo">
<?php include("menu.php"); ?>
            
<div class="coluna_direita">
<div class="caixa_conteudo" id=texto>
<div class="item_de_conteudo">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="82%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/barra123.png" /></td>
        </tr>
        <tr>
          <td><table bgcolor="#f9f9f9" width="539" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><span class="manchete_texto">
                <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_noticias WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe noticias cadastradas!</b></font></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
              </span>
                <table width="100%" border="0">
                  <tr>
                    <td valign="top"><table width="100%" border="0">
                      <tr>
                        <td width="77%" valign="top"><table width="100%" border="0">
                          <tr>
                            <td width="63%" align="left" class="titulonoticia"><b><?php echo $y["titulo"]; ?></b></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <table width="98%" border="0" align="center">
                  <tr>
                    <td align="right"><b>Imagens Anexadas a Notícia</b></td>
                  </tr>
                </table>
                <table width="100%" border="0" align="center">
                  <tr>
                    <td align="center"><link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
                      <script type="text/javascript" src="js/prototype.js"></script>
                      <script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
                      <script type="text/javascript" src="js/lightbox.js"></script>
                      <?php

include "administrador/conexao.php";

$id = $y["id"];

$sql2="SELECT * FROM cw_anexos WHERE idnot='$id'"; 
$resultado2=mysql_query($sql2);

while($linha2= mysql_fetch_array($resultado2))
{

echo 
"<a href='administrador/fotos/g/".$linha2['fotomaior']."' rel='lightbox['roadtrip']' title='".$linha2["legenda"]."'><img alt='VISUALIZAR IMAGEM' border='0' src='administrador/fotos/p/".$linha2['fotomenor']."'></a>
";

}
  
   ?></td>
                  </tr>
                </table>
                <table width="100%" height="2" border="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
              
                             <table width="99%" align="center" border="0">
                  <tr>
                    <td class="titulooriginal"><div align="justify" class="titulooriginal"><?php echo $y["texto"]; ?></div></td>
                  </tr>
                </table>
                             <table width="99%" border="0" align="center">
                               <tr>
                                 <td width="37%"><font class="titulosessao"><?php echo $y["sessao"]; ?></font> --- <?php echo $y["data"]; ?> - ( <?php echo $y["hora"]; ?> )</td>
                               </tr>
                             </table>
                <table width="99%" align="center" border="0">
                  <tr>
                    <td align="center"><?php echo $y["video"]; ?></td>
                    </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td><a href="javascript:history.go(-1)"><img src="imagens/voltar.png" border="0" /></a></td>
                  </tr>
                </table>
                <table width="100%" height="2" border="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                <span style="Z-INDEX: 666">
                <?php
  
  }}
 ?>
                </span></td>
            </tr>
           </table></td>
        </tr>
        <tr>
          <td><img src="imagens/barrabaixo.png" width="539" height="12" /></td>
        </tr>
      </table></td>
      <td width="18%" valign="top"><?php include("direito.php"); ?></td>
    </tr>
  </table>
</div>
</div>
</div>    
<br clear="all" />
<div class="corpo_rodape"></div>
</div>
<hr class="dn">
<div class="rodape">
<p> &copy;
<?php   
setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');   
echo strftime("%Y");   
// Uma saída esperada é: terça-feira 29 de janeiro de 2008   
?>
&nbsp;<strong>Jornal Frederiquense</strong>. Todos os direitos reservados.</span></p>
<ul>       
<li>
<a href="http://www.casadaweb.net" class="topo" target=_blank>Casa da Web</a>
</li>
<li>
</li>
</ul>
</div>
</div>
</body>
</html>