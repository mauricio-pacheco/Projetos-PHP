<?php include ('auth.php') ?>
<?
////// Início Paginação de Resultados
if (!$inicio) {
$inicio = "0";
} else {
$inicio = $inicio; }
if (!$max) {
$max = "10";
} else {
$max = $max; }
$sql1 = $sql_paginacao_1;
$sql = $sql_paginacao;
$sql1 = mysql_query($sql1);
$resultado = mysql_query($sql);
$num = mysql_num_rows($sql1);
$total = $num;
$fim = $inicio + $max;
$ant = $inicio - $max;
$comeco = $inicio + 1;
if($fim > $total) $fim = $total;
if($inicio > 0) $anterior = "<b><a class=link_verde href='$PHP_SELF?inicio=$ant&cat_pai=$cat_pai&eu_sou=$eu_sou'><<< </a></b>";
if($fim < $total) $proximo = "<b><a class=link_verde href='$PHP_SELF?inicio=$fim&cat_pai=$cat_pai&eu_sou=$eu_sou'> >>></a></b>";
$navega2 = "$anterior";
$x=0;
for($i=1;$i<($total/$max)+1;$i++){
$navega2 .= " <a class=link_verde href='$PHP_SELF?inicio=$x&cat_pai=$cat_pai&eu_sou=$eu_sou'>$i</a> ";
$x += $max;
}
$navega2 .= "$proximo";
if ($navega2){
$corpo .= "[ $navega2 ]";
}
?>