<table width="100%" border="0" cellspacing="0" cellpadding="0" class="fonte">
    <tr>
      <td bgcolor="#FFFFFF" valign="top"><style type="text/css">

#destaques{width:650px;}
#destaques ul{list-style:none;}
.paginacao a{padding:9px; border:0px solid #fff; text-decoration:bold; background:url(bslide.png); position:relative;
		left:0px; top:-88px; z-index:999;
 font-family: Tahoma, Geneva, sans-serif; font-size: 11px; text-decoration: none;
 color:#333; margin:5px 10px;}
.paginacao a:hover{color:#f9f9f9; background:url(bslide.png);}

.paginacao a.activeSlide{background:url(fslide.png); color:#f9f9f9;}
</style>

<script type="text/javascript" src="vai/jquery.cycle.all.js" /></script>

<script type="text/javascript">
$(function(){
   $('#destaques ul').cycle({
     fx: 'fade',
     speed: 2000,
     timeout: 5000,
     next: '#proximo',
     prev: '#anterior',
     pager: '#pager'
   })
 })
</script>


<div id="destaques" class="fonte">
 <ul>
 
<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_noticias WHERE iddep='0' ORDER BY id DESC LIMIT 7");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?> 
 <li>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><a href="vernoticia.php?id=<?php echo $y["id"]; ?>"><img alt="<?php echo $y["titulo"]; ?>" title="<?php echo $y["titulo"]; ?>" src="administrador/ups/capasnoticia/<?php echo $y["foto"]; ?>" border="0" width="656" height="320" /></a></td>
     </tr>
</table>
<table width="656" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="edicao"><a class="edicao" href="vernoticia.php?id=<?php echo $y["id"]; ?>"><b><?php echo $y["titulo"]; ?></b></a></td>
  </tr>
</table>
<table width="656" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="legenda"><a class="legenda" href="vernoticia.php?id=<?php echo $y["id"]; ?>"><?php echo $y["legenda"]; ?></a></td>
  </tr>
</table>
 </li>
<?php
  }
  }
 ?> 
 
 </ul>
 <div class="paginacao">

 <span id="pager"></span>

 </div>

</div></td>
      </tr>
</table>
