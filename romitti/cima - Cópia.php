<link rel="stylesheet" href="menumulti/style.css" type="text/css" />
<script type="text/javascript" src="menumulti/script.js"></script>
<body topmargin="0" bgcolor="#07527E" leftmargin="0" rightmargin="0" bottommargin="0" background="imagens/bg.jpg">
<br /><table class="boxSombra" width="900" background="imagens/bggeral.jpg" height="568" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#1A3E6A">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="34%" valign="top"><img src="imagens/acima.png" /></td>
        <td width="66%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="right"><img src="imagens/lado.png" width="230" height="42" /></td>
          </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="right"><img src="imagens/letras2.png" width="290" height="50" /></td>
          </tr>
        </table></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><div class="menu" align="center">
                   <li style="list-style-type:none"><a href="principal.php" ><img src="imagens/b1.png" border="0" alt="Página Principal" title="Página Principal" /></a></li>
                   <li style="list-style-type:none"><a href="cortinas.php"><img src="imagens/b3.png" border="0" title="Cortinas" alt="Cortinas" /></a>
              <ul>
                <?php
include "administrador/conexao.php";
$sql2 = mysql_query("SELECT * FROM cw_subdepprod WHERE iddep='28'");
$contar2 = mysql_num_rows($sql2); 	
	if ($contar2 < 1)  
   {
   }
else 
   {
while($m = mysql_fetch_array($sql2))
   {
	   
   ?>
                <li><a href="produto.php?idsub=<?php echo $m["id"]; ?>&amp;iddep=28">&nbsp;&#8250;&nbsp;<?php echo $m["nomesub"]; ?></a></li>
              <?php } } ?>
              </ul>
            </li>
               
            <li style="list-style-type:none"><a href="localizacao.php" ><img src="imagens/b9.png" border="0" alt="Localização" title="Localização" /></a></li>     
            <li style="list-style-type:none"><a href="empresa.php" ><img src="imagens/b4.png" border="0" alt="Empresa" title="Empresa" /></a></li>
            <li style="list-style-type:none"><a href="contatos.php" ><img src="imagens/b5.png" border="0" alt="Contatos" title="Contatos" /></a></li>
          </div></td>
        </tr>
    </table>