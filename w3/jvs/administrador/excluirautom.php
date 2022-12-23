<div id="centro">
<div class="centro_titulo">
<div class="tflash">
  <div align="left"></div>
</div>
</div>

<div class="centro_cont">
<div class="centro_cont_fundo">
<div id="texto">
<p class="spip" align="left"><br />
<?
include "conexao.php";



$id = $_GET['id'];


$query = mysql_query("DELETE FROM cadastro WHERE id='$id'");
if ($query)  
{
echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Produto <strong>$descricao</strong> deletado com sucesso!</font></div>";
}else{
echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">Não foi possível deletar o produto.</font></div>";
}

echo "<script>location.href='apagar.php'</script>";

?></p>
</div>
</div></div>

<div class="centro_rodape"></div>
</div>