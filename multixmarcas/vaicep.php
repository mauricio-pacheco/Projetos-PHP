<?php
$cep = $_POST["cep"];
$pessoa = $_POST["pessoa"];

if ($pessoa=='Física') {
echo "<script>location.href='cadfisica.php?cep=$cep'</script>";	
}
else
{
echo "<script>location.href='cadjuridica.php?cep=$cep'</script>";		
}

?>