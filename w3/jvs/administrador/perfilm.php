<style type="text/css">
<!--
.style8 {color: #006600}
.style3 {font-size: 16px}
.style4 {color: #000000}
-->
</style>
<div id="centro">
<div class="centro_titulo">
<div class="tflash">
  <div align="left"></div>
</div>
</div>

<div class="centro_cont">
<div class="centro_cont_fundo">
<div id="texto"><?php

include "conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cadastro WHERE id = ('$id') LIMIT 1");
$contar = mysql_num_rows($sql); 

while($p = mysql_fetch_array($sql))
   {
   ?>
    <p align="center"><br />
        <img src="logos/<?php echo $p["marca"]; ?>.jpg" /><br />
        <br /><a href="pedido.php?nome=<?php echo $p["nome"]; ?>"><img src="pedidao.jpg" border="0"/></a><br /><br />
        <span class="style3"><?php echo $p["nome"]; ?> - <span class="style8">R$</span> <?php echo $p["preco"]; ?>
		<?php } ?>
        </span></p><br />
      <?php

$sql = mysql_query("SELECT * FROM cadastro WHERE  id = ('$id')");
$contar = mysql_num_rows($sql); 

while($n = mysql_fetch_array($sql))
   {
   ?>
      </p>
    <p align="center">
<iframe src="arquivos/<?php echo $n["foto1"]; ?>" name="exibe_foto" width="422" marginwidth="0" height="322" marginheight="0" scrolling="no" frameborder="0"></iframe>
</p>
    <p align="center"><a href='arquivos/<?php echo $n["foto1"]; ?>' target='exibe_foto'><img src="arquivos/<?php echo $n["foto1"]; ?>" alt="<?php echo $n["nome"]; ?> - FOTO 1" border="1" width="67" height="50" /></a> <a href='arquivos/<?php echo $n["foto2"]; ?>' target='exibe_foto'><img src="arquivos/<?php echo $n["foto2"]; ?>" alt="<?php echo $n["nome"]; ?> - FOTO 2" border="1" width="67" height="50" /></a> <a href='arquivos/<?php echo $n["foto3"]; ?>' target='exibe_foto'><img src="arquivos/<?php echo $n["foto3"]; ?>" alt="<?php echo $n["nome"]; ?> - FOTO 3" border="1" width="67" height="50" /></a> <a href='arquivos/<?php echo $n["foto4"]; ?>' target='exibe_foto'><img src="arquivos/<?php echo $n["foto4"]; ?>" alt="<?php echo $n["nome"]; ?> - FOTO 4" border="1" width="67" height="50" /></a> <a href='arquivos/<?php echo $n["foto5"]; ?>' target='exibe_foto'><img src="arquivos/<?php echo $n["foto5"]; ?>" alt="<?php echo $n["nome"]; ?> - FOTO 5" border="1" width="67" height="50" /></a> <a href='arquivos/<?php echo $n["foto6"]; ?>' target='exibe_foto'><img src="arquivos/<?php echo $n["foto6"]; ?>" alt="<?php echo $n["nome"]; ?> - FOTO 6" border="1" width="67" height="50" /></a></p>
    <p align="center"><br /><img src="detalhado.jpg" width="360" height="22" /></p>
    <p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style4">Ano:</span> <?php echo $n["anofab"]; ?><br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style4">Opcional:</span> <?php echo $n["motor"]; ?><br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style4">Combust&iacute;vel:</span> <?php echo $n["comb"]; ?><br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style4">Dire&ccedil;&atilde;o:</span> <?php echo $n["direcao"]; ?><br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style4">Cor:</span> <?php echo $n["cor"]; ?><br />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="style4">Descri&ccedil;&atilde;o:</span> <?php echo $n["descricao"]; ?></p>
    <p align="center"><br /><a href="javascript:history.go(-1)"><img src="volta.jpg" width="120" height="30" border="0" /></a></p>
    </p>
    <?php
									 if ($contar < 1)  //Mostra se h&aacute; algum registro na tabela, caso n&atilde;o houver, ele mostrar&aacute; a mensagem abaixo
   {echo "<div align=center><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N&atilde;o existe produtos cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&aacute; os registros. OBS: Voc&ecirc; pode mudar o modo de exibir os registros
     //mais n&atilde;o mude nenhuma vari&aacute;vel, a n&atilde;o ser que mude o script todo.
   { }}?></div>
</div></div>

<div class="centro_rodape"></div>
</div>