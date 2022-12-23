<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>:: WebMaster.PT - Implementando um Carrinho de Compras ::</title>
<style type="text/css">

* {
font-family:"Trebuchet MS","Lucida Grande",Verdana,Tahoma,Helvetica,Arial,sans-serif;
font-size:12px;
font-style:normal;
font-variant:normal;
font-weight:normal;
line-height:normal;
}

body {
background:#FFFFFF none repeat scroll 0 0;
height:100%;
margin:0;
margin-top:20px;
width:100%;
}

div#wrapper {
margin:auto;
position:relative;
width:450px;
z-index:0;
}

.formMain .select {
text-transform:uppercase;
width:99%;
border:1px solid #B6B6B6;
display:block;
}

.formSearch fieldset {
border:1px solid #CCCCCC;
margin:0;
padding:0 10px;
}

.formMain label {
display:block;
float:left;
margin-right:4px;
padding-bottom:5px !important;
}

.formMain legend {
color:#1E398D;
font-family:"Legacy Sans ITC TT Bold","Trebuchet MS","Lucida Grande",Verdana,Tahoma,Helvetica,Arial,sans-serif;
font-size:1.5em;
padding:10px 5px;
}

.formMain .button {
background:#F5EED3;
border:1px solid #CCCCCC;
color:#666666;
cursor:pointer;
font-size:12px;
font-weight:bold;
letter-spacing:1px;
margin:10px 0 0;
overflow:visible;
text-transform:uppercase;
width:100%;
}

.formMain .inline {
margin:15px 0 0 !important;
}

.formMain .text, .formMain .select, .formMain .textarea, .formMain .password {
border:1px solid #B6B6B6;
display:block;
text-transform:uppercase;
}

.formMain fieldset span.nameField {
color:#666666;
text-transform:uppercase;
}

h3 {
border-bottom:1px solid #F58220;
margin:0;
padding:0;
}

h3 span {
-x-system-font:none;
color:#1E398D;
font-family:"Legacy Sans ITC TT Bold","Trebuchet MS","Lucida Grande",Verdana,Tahoma,Helvetica,Arial,sans-serif;
font-size:1.5em;
font-style:normal;
font-variant:normal;
font-weight:bold;
line-height:normal;
}

#value {
-x-system-font:none;
color:#9B0000;
font-family:"Legacy Sans ITC TT Bold","Trebuchet MS","Lucida Grande",Verdana,Tahoma,Helvetica,Arial,sans-serif;
font-size:1.5em;
font-style:normal;
font-variant:normal;
font-weight:bold;
line-height:normal;
}
</style>

</head>
<body>
<div id="wrapper">
<h3>
<span>Pesquisa valor de frete</span>

</h3>
<form id="form-pesquisa-repasse" action="calcularFrete.php" method="post" class="formMain formSearch wsizep100" onsubmit="submitForm(this); return false;">
<fieldset>
<legend>Filtrar Referência</legend>
<label for="servico" class="wsize015">
<span class="nameField">Envio</span>
<select id="servico" name="servico" title="Serviços dos Correios" class="select" tabindex="1">
<option value="41106">PAC</option>
<option value="40010">SEDEX</option>
</select>
</label>
<label class="wsize010" for="cep-destino">
<span class="nameField">CEP Destino</span>
<input id="cep-destino" class="text" type="text" value="" maxlength="9" title="CPF destino" name="cep-destino" tabindex="2"/>
</label>
<label for="pesquisar" class="wsize010">
<input type="submit" id="pesquisar" name="pesquisar" tabindex="3" class="button inline"  value="Pesquisar" />
</label>
</fieldset>
</form>
<span>* Digitar somente número no CEP</span>
<br />
<span id="value"></span>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.6.0.3/prototype.js" type="text/javascript"></script>
<script type="text/javascript">
function submitForm(form) {
form.request({
onComplete: function(transport){

if(transport.responseText !=-1)  {
$('value').innerHTML = transport.responseText;
} else {
form.reset();
$('value').innerHTML = 'Erro ao consultar';
}
}
});
return false;
}

</script>
</body>
</html>
