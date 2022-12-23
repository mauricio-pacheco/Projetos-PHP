<?
$english_day = date("l");
switch($english_day)
{
	case "Monday":
		$portuguese_day = "Segunda-Feira";
		break;
	case "Tuesday":
		$portuguese_day = "Terça-Feira";
		break;
	case "Wednesday":
		$portuguese_day = "Quarta-Feira";
		break;
	case "Thursday":
		$portuguese_day = "Quinta-Feira";
		break;	
	case "Friday":
		$portuguese_day = "Sexta-Feira";
		break;
	case "Saturday":
		$portuguese_day = "Sábado";
		break;
	case "Sunday":
		$portuguese_day = "Domingo";
		break;
}

$english_month = date("n");

switch($english_month)
{
	case "1":
		$portuguese_month = "janeiro";
		break;
	case "2":
		$portuguese_month = "fevereiro";
		break;
	case "3":
		$portuguese_month = "março";
		break;
	case "4":
		$portuguese_month = "abril";
		break;
	case "5":
		$portuguese_month = "maio";
		break;
	case "6":
		$portuguese_month = "junho";
		break;
	case "7":
		$portuguese_month = "julho";
		break;
	case "8":
		$portuguese_month = "agosto";
		break;
	case "9":
		$portuguese_month = "setembro";
		break;
	case "10":
		$portuguese_month = "outubro";
		break;
	case "11":
		$portuguese_month = "novembro";
		break;
	case "12":
		$portuguese_month = "dezembro";
		break;
}
echo $portuguese_day . ", " . date("d") . " de " . $portuguese_month . " de " . date("Y");
?>
