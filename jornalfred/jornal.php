﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
          <td><img src="imagens/barrajornal.png" /></td>
        </tr>
        <tr>
          <td><table bgcolor="#f9f9f9" width="539" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><p>&nbsp;</p>
                <p align="center"><img src="imagens/constru07.gif" width="40" height="40" /></p>
                <p align="center">&nbsp;</p>
                <p align="center">Em construção...</p>
                <p>&nbsp;</p></td>
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