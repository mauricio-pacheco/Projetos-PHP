<?
$msg .= "OLÁ! E-MAIL ENVIADO PELO SERVIDOR DO GEAZI!";
$email_de = "geazi@sollbr.com.br";
$cabecalho = "MIME-Version: 1.0\r\n";
$cabecalho .= "Content-type: text/html; charset=iso-8859-1\r\n";
$cabecalho .= "From:<$email_de>\r\n";


mail("geazi@grupovanguarda.com", "Ficha de Cadastro de Intenção para o Confinamento", $msg, $cabecalho);
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

