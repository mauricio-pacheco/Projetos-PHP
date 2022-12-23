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
<table width="979" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="83%"><SCRIPT src="flash/carrega.js"></SCRIPT>
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
          <td><img src="imagens/barraclic.png" /></td>
        </tr>
        <tr>
          <td><table bgcolor="#f9f9f9" width="539" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" align="center">
                <tr>
                  <td border="0"><link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
                    <script type="text/javascript" src="js/prototype.js"></script>
                    <script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
                    <script type="text/javascript" src="js/lightbox.js"></script>
                    <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM gestao_galeria WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se h&Atilde;&iexcl; algum registro na tabela, caso n&Atilde;&pound;o houver, ele mostrar&Atilde;&iexcl; a mensagem abaixo
   {echo "<div align=center class=manchete_texto>Não existe galerias cadastradas!</div>"; 
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
                        <td align="center" class="manchete_texto"><b><?php echo $y["nomegaleria"]; ?></b><br />
                          <br />
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
"<a href='administrador/fotosgaleria/g/".$linha['foto']."' rel='lightbox['roadtrip']' title='".$linha["comentario"]."'><img width=96 height=64 alt='VISUALIZAR IMAGEM' border='0' src='administrador/fotosgaleria/p/".$linha['fotomenor']."'></a>
";

}}
  
   ?>
                        </div></td>
                      </tr>
                      <tr>
                        <td align="left" width="14%"><br />
                          <a href="javascript:history.go(-1)"><img src="imagens/voltar.jpg" border="0" /></a><br /></td>
                      </tr>
                    </table></td>
                </tr>
              </table></td>
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