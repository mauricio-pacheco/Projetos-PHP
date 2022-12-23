<?
//Header para evitar cahe
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include "administrador/conexao.php";
echo "<select style='width:200px' name=\"subdep\" class=manchete_texto9>";
$result = mysql_query("SELECT * FROM cw_subdepprod WHERE iddep='$_GET[id]' ORDER BY 'nomesub'");
while($row = mysql_fetch_array($result)){
echo "<option value=\"$row[id]\">".ucwords(strtolower($row["nomesub"]))."</option>";
}
echo "</select>";
?>
