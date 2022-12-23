<?php include ('auth.php') ?>
<?
function formata_valor($valor_formata){
global $valor,$cv;
$cv = strlen("$valor_formata");
//print "anotae o cv $cv e o valor que vai é $valor_formata";
//exit;
        switch ($cv){
		case "2":
                $valor1 = '0';
                $valor2 = $valor_formata;
                $valor = "$valor1,$valor2";
                break;
		case "3":
                $valor1 = substr("$valor_formata",0,1);
                $valor2 = substr("$valor_formata",-2,2);
                $valor = "$valor1,$valor2";
                break;
        case "4":
                $valor1 = substr("$valor_formata",0,2);
                $valor2 = substr("$valor_formata",-2,2);
                $valor = "$valor1,$valor2";
                break;
        case "5":
                $valor1 = substr("$valor_formata",0,3);
                $valor2 = substr("$valor_formata",-2,2);
                $valor = "$valor1,$valor2";
                break;
        case "6":
                $valor1 = substr("$valor_formata",1,3);
                $valor2 = substr("$valor_formata",-2,2);
                //Casa dos mil
                $valor3 = substr("$valor_formata",0,1);
                $valor = "$valor3.$valor1,$valor2";
                break;
        case "7":
                $valor1 = substr("$valor_formata",2,3);
                $valor2 = substr("$valor_formata",-2,2);
                //Casa dos mil
                $valor3 = substr("$valor_formata",0,2);
                $valor = "$valor3.$valor1,$valor2";
                break;
        case "8":
                $valor1 = substr("$valor_formata",3,3);
                $valor2 = substr("$valor_formata",-2,2);
                //Casa dos mil
                $valor3 = substr("$valor_formata",0,3);
                $valor = "$valor3.$valor1,$valor2";
                break;

        }
}
?>