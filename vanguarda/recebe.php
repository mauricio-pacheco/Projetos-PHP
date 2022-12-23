<?
$msg .= "<font face=\"Verdana\" size=\"1\"><br><br>**********************************************************************<br>";
$msg .= "<br>Formulário de Ficha de Cadastro de Intenção para o Confinamento – Grupo Vanguarda.<br>";
$msg .= "<br>**********************************************************************<br><br>";
$msg .= "Nome:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$nome</font><br>";
$msg .= "Propriedade:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$propriedade</font><br>";
$msg .= "Município:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$municipio - \t$estado</font><br>";
$msg .= "Localização:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$localizacao</font><br>";
$msg .= "Reserva:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$reserva</font><br>";
$msg .= "Área:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$area</font><br>";
$msg .= "<br>Suplementação Realizada:<br><br>";
$msg .= "Água:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$agua</font><br>";
$msg .= "Seca:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$seca</font><br>";
$msg .= "<br>Pastagens predominantes:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$pastagens</font><br><br>";
$msg .= "Distância estimada da área de Confinamento:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$distancia</font><br><br>";
$msg .= "QUANTIDADE<br><br>";
$msg .= "Quantidade 1:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$qt1</font><br>";
$msg .= "Quantidade 2:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$qt2</font><br>";
$msg .= "Quantidade 3:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$qt3</font><br>";
$msg .= "Quantidade 4:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$qt4</font><br><br>";
$msg .= "SEXO<br><br>";
$msg .= "Sexo 1:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$sex1</font><br>";
$msg .= "Sexo 2:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$sex2</font><br>";
$msg .= "Sexo 3:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$sex3</font><br>";
$msg .= "Sexo 4:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$sex4</font><br><br>";
$msg .= "IDADE<br><br>";
$msg .= "Idade 1:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$idade1</font><br>";
$msg .= "Idade 2:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$idade2</font><br>";
$msg .= "Idade 3:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$idade3</font><br>";
$msg .= "Idade 4:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$idade4</font><br><br>";
$msg .= "PESO @<br><br>";
$msg .= "Peso @ 1:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$peso1</font><br>";
$msg .= "Peso @ 2:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$peso2</font><br>";
$msg .= "Peso @ 3:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$peso3</font><br>";
$msg .= "Peso @ 4:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$peso4</font><br><br>";
$msg .= "PESO Kg<br><br>";
$msg .= "Peso (Kg) 1:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$pesok1</font><br>";
$msg .= "Peso (Kg) 2:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$pesok2</font><br>";
$msg .= "Peso (Kg) 3:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$pesok3</font><br>";
$msg .= "Peso (Kg) 4:<font face=\"Verdana\" size=\"1\" color=\"#ff0000\">\t$pesok4</font><br><br>";
$msg .= "Data Cadastro:<font face=\"Verdana\" size=\"1\" color=\"#45720C\">\tNova Mutum, \t$dia \t de \t $mes \t 20\t$ano</font>
<br><br>";
$msg .= "ASSINATURA:<font face=\"Verdana\" size=\"1\" color=\"#45720C\">\t$assinatura</font><br><br>";
$msg .="<br><br>**********************************************************************<br>";
$msg .= "<br>Formulário de Ficha de Cadastro de Intenção para o Confinamento – Grupo Vanguarda.<br>";
$msg .= "<br>**********************************************************************<br><br></font>";
$email_de = "grupovanguarda@grupovanguarda.com";
$cabecalho = "MIME-Version: 1.0\r\n";
$cabecalho .= "Content-type: text/html; charset=iso-8859-1\r\n";
$cabecalho .= "From:<$email_de>\r\n";

mail("walker@grupovanguarda.com", "Ficha de Cadastro de Intenção para o Confinamento", $msg, $cabecalho);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastro Confinamento</title>
<style type="text/css">
<!--
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
BODY {
scrollbar-face-color:#009900; scrollbar-highlight-color:#009900; scrollbar-3dlight-color:#FFFFFF; scrollbar-darkshadow-color:#009900; scrollbar-shadow-color:#FFFFFF; scrollbar-arrow-color:#FFFFFF; scrollbar-track-color:#009900;
}

</style>
<LINK href="default3.css" type=text/css rel=STYLESHEET>

<style type="text/css">
<!--
.style4 {font-size: 12px}
-->
</style>
</head>
</html>
<html>
<head>
</head>
<body>
<br /><p align="center"><img src="fucha.jpg" width="500" height="80" /></p>
<p align="center"><img src="banner.jpg" width="560" height="149" border="1"></p>
 <p align="center"><img src="crm2.jpg" width="270" height="135"></p>
 <table width="90%" border="0" align="center">
   <tr>
     <td><div align="center"><span class="style2 style4">Seu formul&aacute;rio foi enviado com sucesso, agradecemos a sua visita em breve estaremos entrando em contato! </span></div></td>
   </tr>
 </table>
 <p align="center" class="style2 style4"><a href="javascript:window.close();">FECHAR ESTA JANELA!</a> </p>
</body>
</html>

