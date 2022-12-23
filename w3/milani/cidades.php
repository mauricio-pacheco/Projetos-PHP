<?php
//Header para evitar cahe
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include "administrador/conexao.php";

echo "<select name=\"cidade\">";
$result = mysql_query("SELECT * FROM gestao_cidades WHERE uf='$_GET[ID]' ORDER BY 'nome'");
while($row = mysql_fetch_array($result)){
echo utf8_encode("<option value=\"$row[nome]\">".ucwords(strtolower(utf8_encode($row["nome"])))."</option>");
}
echo "</select>";
?>
