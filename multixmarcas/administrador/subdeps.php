<?
//Header para evitar cahe
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include "conexao.php";
echo "&nbsp;Sub-Departamento:&nbsp;<select name=\"subdep\" class=fontetabela>";
$result = mysql_query("SELECT * FROM cw_subdepprod WHERE iddep='$_GET[id]' ORDER BY 'nomesub'");
while($row = mysql_fetch_array($result)){
echo "<option value=\"$row[id]\">".ucwords(strtolower(utf8_encode($row["nomesub"])))."</option>";
}
echo "</select>";
?>
