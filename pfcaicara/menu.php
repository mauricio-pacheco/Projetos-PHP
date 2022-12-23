
        
 <table width="100%" height="24" bgcolor="#77BED2" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="fontemenu">&nbsp;&nbsp;&nbsp;&nbsp;<strong>PRINCIPAL</strong></td>
          </tr>
        </table>
 <table width="220" cellpadding="0" cellspacing="0" >
   <tr>
     <td height="36" bgcolor="#F7F3E8" onclick="window.location='index.php';" onmouseover="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#F7F3E8'; this.style.color='#252525';">&nbsp;<span class="fonte"> &bull; &nbsp;Inicio</span></td>
   </tr>
 </table>
 <table width="220" cellpadding="0" cellspacing="0" >
   <tr>
     <td height="36" bgcolor="#F7F3E8" onclick="window.location='historia.php';" onmouseover="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#F7F3E8'; this.style.color='#252525';">&nbsp;<span class="fonte"> &bull; &nbsp;História</span></td>
   </tr>
 </table>
 <table width="220" cellpadding="0" cellspacing="0" >
   <tr>
     <td height="36" bgcolor="#F7F3E8" onclick="window.location='contato.php';" onmouseover="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#F7F3E8'; this.style.color='#252525';">&nbsp;<span class="fonte"> &bull; &nbsp;Contato</span></td>
   </tr>
 </table>
<table width="100%" height="24" bgcolor="#77BED2" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <td class="fontemenu">&nbsp;&nbsp;&nbsp;&nbsp;<strong>PORTAL TRANSPARÊNCIA</strong></td>
   </tr>
 </table>
 <table width="220" cellpadding="0" cellspacing="0" >
   <tr>
     <td height="36" bgcolor="#F7F3E8" onclick="window.location='contato.php';" onmouseover="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#F7F3E8'; this.style.color='#252525';"><a href="http://www.betha.com.br/transparencia/con_comparativoreceita.faces?mun=j_eKEC1ETGU=" target="_blank"><img src="imagens/portaltransparencia.jpg" width="219" height="60" border="0" /></a></td>
   </tr>
 </table>
 <table width="100%" height="24" bgcolor="#77BED2" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <td class="fontemenu">&nbsp;&nbsp;&nbsp;&nbsp;<strong>NOTÍCIAS</strong></td>
   </tr>
 </table>
 <?php
include "administrador/conexao.php";
$sql2 = mysql_query("SELECT * FROM cw_depnot ORDER BY departamento ASC");
$contar2 = mysql_num_rows($sql2); 	
	if ($contar2 < 1)  
   {
   }
else 
   {
while($m = mysql_fetch_array($sql2))
   {
	   
   ?>
 <table width="220" cellpadding="0" cellspacing="0" >
   <tr>
     <td height="36" bgcolor="#F7F3E8" onclick="window.location='nots.php?iddep=<?php echo $m["id"]; ?>';" onmouseover="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#F7F3E8'; this.style.color='#252525';">&nbsp;<span class="fonte"> &bull; &nbsp;<?php echo $m["departamento"]; ?></span></td>
   </tr>
 </table>
 <?php } }  ?>
 <table width="100%" height="24" bgcolor="#77BED2" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <td class="fontemenu">&nbsp;&nbsp;&nbsp;&nbsp;<strong>CONTEÚDO</strong></td>
   </tr>
</table>
 <table width="220" cellpadding="0" cellspacing="0" >
   <tr>
     <td height="36" bgcolor="#F7F3E8" onclick="window.location='fotos.php';" onmouseover="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#F7F3E8'; this.style.color='#252525';">&nbsp;<span class="fonte"> &bull; &nbsp;Fotos</span></td>
   </tr>
 </table>
 <table width="220" cellpadding="0" cellspacing="0" >
   <tr>
     <td height="36" bgcolor="#F7F3E8" onclick="window.location='editais.php';" onmouseover="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#F7F3E8'; this.style.color='#252525';">&nbsp;<span class="fonte"> &bull; &nbsp;Publicações</span></td>
   </tr>
 </table>        
        <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_menus ORDER BY departamento ASC");
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
 <table width="100%" height="24" bgcolor="#77BED2" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td class="fontemenu">&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $y["departamento"]; ?></strong></td>
          </tr>
        </table>

     <?php

$sql2 = mysql_query("SELECT * FROM cw_conteudo WHERE idmenu='$idnovo' ORDER BY titulo ASC");
$contar2 = mysql_num_rows($sql2); 	
	if ($contar2 < 1)  
   {
   }
else 
   {
while($m = mysql_fetch_array($sql2))
   {
	   
   ?>
    
    <table width="220" cellpadding=0 cellspacing=0 >
                <tr>
        <td height=36 bgcolor="#F7F3E8" onClick="window.location='conteudo.php?id=<?php echo $m["id"]; ?>';" onMouseOver="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#F7F3E8'; this.style.color='#252525';">&nbsp;<span class="fonte"> &bull; &nbsp;<?php echo $m["titulo"]; ?></span></td>
    </tr></table>
     <?php } } } } ?>