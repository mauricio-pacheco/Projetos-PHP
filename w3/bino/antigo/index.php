<?
$host = "localhost";
$user = "binoarte";
$pass = "ba2006";
$db = "binoarte";


	session_start();
	$conn = mysql_connect($host,$user,$pass) or die ("Não foi possivel conectar: ".mysql_error()); 
	mysql_select_db($db,$conn) or die ("Não foi possível usar db:" . mysql_error());
	$SqlA = "SELECT id_visitas FROM visitas WHERE id_visitas='".session_id()."'";
	$QueryA = mysql_query($SqlA);
	$ChecaID = mysql_num_rows($QueryA);
	if(!$ChecaID){
		$SqlB = "INSERT INTO visitas (id_visitas,ip_visitas, lingua_visitas, data_visitas, bowser_visitas) VALUES ('".session_id()."','".$_SERVER['HTTP_X_FORWARDED_FOR']."', '".$_SERVER['HTTP_ACCEPT_LANGUAGE']."', '".date("Y-m-d H:i:s")."', '".$_SERVER['HTTP_USER_AGENT']."')";
		$QueryB = mysql_query($SqlB);
	}				
	$SqlC = "SELECT * FROM visitas";
	$QueryC = mysql_query($SqlC);
	$NumVisitas = mysql_num_rows($QueryC);
	$NumVisitas;
?>
<?
header("Location: default.php");
?>