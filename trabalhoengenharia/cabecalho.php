<?php require("verifica.php"); ?>
<html>
<head>
<title>Trabalho de Engenharia de Software - Cadastro de Contribuintes</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<LINK href="style.css" type=text/css rel=stylesheet>
<body bgcolor="#ffffff" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<script language="JavaScript"><!--
////
 
function validar(Form) {


 
 
if (document.cadastro.nome.value=="") {
alert("O Campo Nome do Contribuinte não está preenchido!")
cadastro.nome.focus();
return false
}

if (document.cadastro.cpf.value=="") {
alert("O Campo CPF não está preenchido!")
cadastro.cpf.focus();
return false
}



if (document.cadastro.dependente.value=="") {
alert("O Campo Número de Dependentes não está preenchido!")
cadastro.dependente.focus();
return false
}

if (document.cadastro.aliquota.value=="") {
alert("O Campo Preço da Aliquota não está preenchido!")
cadastro.aliquota.focus();
return false
}




}
 
// -->
</script>