<div class="coluna_esquerda">
<h2 class="dn"><a name="ancoraMenuPrincipal" accesskey="8">Menu de Navegação</a></h2>
<div><img src="imagens/botao1.png"/>
<ul class="meu_menu_menu" id="meu_menu_menu">
<li class="cadastre_se"><a href="principal.php" class="dados_cadastrais">Página Principal</a></li>
<li class="acesse"><a href="assinatura.php" class="acesse smoothbox">Assinatura</a></li>
<li class="acesse"><a href="contatos.php" class="acesse smoothbox">Fale Conosco</a></li>
</ul></div>
<div><img src="imagens/botao2.png" />
<ul class="professores___diretores_menu" id="professores___diretores_menu">
<li class="prova_brasil"><a href="noticias.php?sessao2=Geral" class="geral">Geral</a></li>
<li class="saude"><a href="noticias.php?sessao2=Saúde" class="saude">Saúde</a></li>
<li class="var"><a href="noticias.php?sessao2=Variedades" class="var">Variedades</a></li>
<li class="esportes"><a href="noticias.php?sessao2=Esportes" class="esportes">Esportes</a></li>
<li class="esportes"><a href="noticias.php?sessao2=Colunistas" class="esportes">Colunistas</a></li>
<li class="clic"><a href="galerias.php" class="clic">Clic Social</a></li>
</ul></div>

<?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_capas ORDER BY id DESC LIMIT 1");

while($y = mysql_fetch_array($sql))
   {
   ?><div align="center">ÚLTIMA EDIÇÃO<BR /><br /><img src="administrador/imagenscapa/<?php echo $y["foto"]; ?>" border="0" /><br /><?php echo $y["nome"]; ?><br /><?php echo $y["data"]; ?></div><?php } ?>
<div></div><div></div>
</div>

