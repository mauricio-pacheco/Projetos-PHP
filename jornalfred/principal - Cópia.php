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
          <td><img src="imagens/barra1.png" /></td>
        </tr>
        <tr>
          <td><table bgcolor="#f9f9f9" width="539" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td>
              
              <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_noticias ORDER BY id DESC LIMIT 10");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
              <table bgcolor="#ffffff" width="99%" border="0" align="center">
                <tr>
                  <td><table width="100%" border="0">
                    <tr>
                      <td width="97%" class="titulonoticia"><b><?php echo $y["titulo"]; ?></b></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>
                  
                  
                  <table width="100%" border="0">
                    <tr>
                      <td width="29%"><img src="noticias/11179663.jpg" width="150" height="115" /></td>
                      <td width="71%" valign="top"><table width="100%" border="0">
                        <tr>
                          <td><div align="justify"><?php echo $y["primeira"]; ?></div></td>
                        </tr>
                        <tr>
                          <td><table width="100%" border="0">
                            <tr>
                              <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                            </tr>
                          </table>
                            <table width="100%" border="0">
                            <tr>
                              <td width="44%"><?php echo $y["data"]; ?> - (<?php echo $y["hora"]; ?>)</td>
                              <td width="34%" class="titulosessao"><?php echo $y["sessao"]; ?></td>
                              <td width="16%"><a href="vernoticia.php?id=<?php echo $y["id"]; ?>" class="texto"><img src="imagens/leia.png" alt="Leia Mais..." title="Leia Mais..." border="0" /></a></td>
                              <td width="6%"><a href="index.php"><img src="imagens/face.png" alt="Compartilhe no FaceBook" title="Compartilhe no FaceBook" width="20" height="20" border="0" /></a></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
                <table width="100%" border="0" align="center">
                  <tr>
                    <td bgcolor="#464646"><img src="imagens/branco.gif" width="1" height="2" /></td>
                  </tr>
                </table>
                <?php
  }
  }
 ?></td>
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