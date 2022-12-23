<script>
window.location = 'adm.php ';
</script>
<body text="#000000" link="#000000" vlink="#000000" alink="#000000">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<?
include "conecta.php";

$id = $_GET['codigo'];
$nome = $_GET['nome'];


$query = mysql_query("DELETE FROM musicafm WHERE codigo='$id'");
if ($query)  
{
echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">PEDIDO <strong>$nome</strong> DELETADO COM SUCESSO!</font></div>";
}else{
echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">NÃO FOI POSSÍVEL DELETAR O PEDIDO.</font></div>";
}
?>