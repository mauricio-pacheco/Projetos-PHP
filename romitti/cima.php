
    <link type="text/css" href="mais/menu.css" rel="stylesheet" />
    <script type="text/javascript" src="mais/jquery.js"></script>
    <script type="text/javascript" src="mais/menu.js"></script>


<style type="text/css">
* { margin:0;
    padding:0;
}
div#menu { margin:20px auto; }
div#copyright {
    font:11px 'Trebuchet MS';
    color:#222;
    text-indent:30px;
    padding:140px 0 0 0;
}
div#copyright a { color:#eee; }
div#copyright a:hover { color:#222; }
</style>

<body topmargin="0" bgcolor="#07527E" leftmargin="0" rightmargin="0" bottommargin="0" background="imagens/bg.jpg">
<div align="center">
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
          <td align="left">
                  <div id="menu">
    <ul class="menu">
       <li><a href="principal.php"><img src="imagens/b1.png" border="0" alt="Página Principal" title="Página Principal" /></a></li>
        <li><a href="#" class="parent"><span><img src="imagens/b3.png" border="0" /></span></a>
            <div><ul>
                <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_depprod ORDER BY nome ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
	$idnovo = $y["id"];
	
?>   
                <li><a href="#" class="parent"><span><?php echo $y["nome"]; ?></span></a>
                    <div><ul>
                        <?php

$sql2 = mysql_query("SELECT * FROM cw_subdepprod WHERE iddep='$idnovo' ORDER BY nomesub ASC");
$contar2 = mysql_num_rows($sql2); 	
	if ($contar2 < 1)  
   {
   }
else 
   {
while($m = mysql_fetch_array($sql2))
   {
	   
   ?>
                        
                        <li><a href="produto.php?idsub=<?php echo $m["id"]; ?>&amp;iddep=<?php echo $y["id"]; ?>"><span><?php echo $m["nomesub"]; ?></span></a></li>
                        
                         <?php } } ?>
                          </ul></div>
                </li>
                 <?php } }  ?>
               
            </ul></div>
        </li>
       <li><a href="localizacao.php" ><img src="imagens/b9.png" border="0" alt="Localização" title="Localização" /></a></li>
       <li><a href="empresa.php" ><img src="imagens/b4.png" border="0" alt="Empresa" title="Empresa" /></a></li>
        <li><a href="contatos.php" ><img src="imagens/b5.png" border="0" alt="Contatos" title="Contatos" /></a></li>
    </ul>
</div>

           </td>
        </tr>
    </table>