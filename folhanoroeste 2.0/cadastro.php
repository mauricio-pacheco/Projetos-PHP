<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<SCRIPT src="home_arquivos/jquery-1.3.2.min.js" type=text/javascript></SCRIPT>
<META http-equiv=X-UA-Compatible content=IE=7>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="classes/estilos.css">
<META 
content="Descrição" 
name=description>
<META 
content="Palavras, Chave" 
name=keywords>
<title>Folha do Noroeste</title>
</head>

<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1" bgcolor="#CCCCCC"><img src="imagens/branco.gif" width="1" height="1" /></td>
    <td width="978" bgcolor="#FFFFFF">
   
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("cabecalho(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("busca(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("login(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("menu(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>

<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>  
  
  

<table width="100%" align="center" background="btabela2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="280" valign="top">
     <?php include("esquerdo(1).php"); ?> </td>
    <td width="700" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>
         <table width="100%" border="0" height="30" cellspacing="0" cellpadding="0">
           <tr>
             <td align="left" bgcolor="#E71C24" class="fontemaior">&nbsp;&nbsp;<strong>Efetuar Cadastro de Assinante</strong></td>
           </tr>
         </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="78%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="legenda"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td> <script language=javascript>
function Mascara (formato, keypress, objeto){
campo = eval (objeto);

// cep
if (formato=='cep'){
separador = '-';
conjunto1 = 5;
if (campo.value.length == conjunto1){
campo.value = campo.value + separador;}
}

// telefone 1
if (formato=='numero1'){
separador1 = '(';
separador2 = ') ';
separador3 = '-';
conjunto1 = 0;
conjunto2 = 3;
conjunto3 = 9;
if (campo.value.length == conjunto1){
campo.value = campo.value + separador1;
}
if (campo.value.length == conjunto2){
campo.value = campo.value + separador2;
}
if (campo.value.length == conjunto3){
campo.value = campo.value + separador3;
}
}

// telefone 2
if (formato=='numero2'){
separador1 = '(';
separador2 = ') ';
separador3 = '-';
conjunto1 = 0;
conjunto2 = 3;
conjunto3 = 9;
if (campo.value.length == conjunto1){
campo.value = campo.value + separador1;
}
if (campo.value.length == conjunto2){
campo.value = campo.value + separador2;
}
if (campo.value.length == conjunto3){
campo.value = campo.value + separador3;
}
}


// nascimento
if (formato=='nascimento'){
separador = '/'; 
conjunto1 = 2;
conjunto2 = 5;
if (campo.value.length == conjunto1)
  {
  campo.value = campo.value + separador;
  }
if (campo.value.length == conjunto2)
  {
  campo.value = campo.value + separador;
  }
}


// celular 1
if (formato=='celular1'){
separador1 = '(';
separador2 = ') ';
separador3 = '-';
conjunto1 = 0;
conjunto2 = 3;
conjunto3 = 9;
if (campo.value.length == conjunto1){
campo.value = campo.value + separador1;
}
if (campo.value.length == conjunto2){
campo.value = campo.value + separador2;
}
if (campo.value.length == conjunto3){
campo.value = campo.value + separador3;
}
}

// celular 2
if (formato=='celular2'){
separador1 = '(';
separador2 = ') ';
separador3 = '-';
conjunto1 = 0;
conjunto2 = 3;
conjunto3 = 9;
if (campo.value.length == conjunto1){
campo.value = campo.value + separador1;
}
if (campo.value.length == conjunto2){
campo.value = campo.value + separador2;
}
if (campo.value.length == conjunto3){
campo.value = campo.value + separador3;
}
}


}
                    </SCRIPT>
                    

<script language=javascript>

function validar(cadastro) { 

if (document.cadastro.usuario.value=="") {
alert("O Campo Usuário não está preenchido!")
cadastro.usuario.focus();
return false
}

var max=6; 
if (cadastro.senha.value.length < max) { 
alert("O minimo de caracteres é 6. Por favor, entre de novo com a senha."); 
return false; 
   } 
else return true; 

if (document.cadastro.cliente.value=="") {
alert("O Campo Nome do Cliente não está preenchido!")
cadastro.cliente.focus();
return false
}


var filtro_mail = /^.+@.+\..{2,3}$/
if (!filtro_mail.test(cadastro.email.value) || cadastro.email.value=="") {
alert("Preencha o e-mail corretamente.");
cadastro.email.focus();
return false
}

if (document.cadastro.razaosocial.value=="") {
alert("O Campo Razão Social não está preenchido!")
cadastro.razaosocial.focus();
return false
}

if (document.cadastro.nomefantasia.value=="") {
alert("O Campo Nome Fantasia não está preenchido!")
cadastro.nomefantasia.focus();
return false
}

if (document.cadastro.endereco.value=="") {
alert("O Campo Endereço não está preenchido!")
cadastro.endereco.focus();
return false
}

if (document.cadastro.numero.value=="") {
alert("O Campo Número não está preenchido!")
cadastro.numero.focus();
return false
}

if (document.cadastro.bairro.value=="") {
alert("O Campo Bairro não está preenchido!")
cadastro.bairro.focus();
return false
}

if (document.cadastro.cep.value=="") {
alert("O Campo CEP não está preenchido!")
cadastro.cep.focus();
return false
}

if (document.cadastro.cnpjcpf.value=="") {
alert("O Campo CNPJ / CPF não está preenchido!")
cadastro.cnpjcpf.focus();
return false
}

if (document.cadastro.rg.value=="") {
alert("O Campo RG não está preenchido!")
cadastro.rg.focus();
return false
}

if (document.cadastro.telefone.value=="") {
alert("O Campo Telefone não está preenchido!")
cadastro.telefone.focus();
return false
}


}

</SCRIPT> 

<script>

var req;
function loadXMLDoc(url){
 req = null;

if (window.XMLHttpRequest) {
 req = new XMLHttpRequest();
 req.onreadystatechange = processReqChange;
 req.open("GET", url, true); 
 req.send(null);

} else if (window.ActiveXObject) {
try {
req = new ActiveXObject("Msxml2.XMLHTTP.4.0");
} catch(e) {
try {
req = new ActiveXObject("Msxml2.XMLHTTP.3.0");
} catch(e) {
try {
req = new ActiveXObject("Msxml2.XMLHTTP");
} catch(e) {
try {
req = new ActiveXObject("Microsoft.XMLHTTP");
} catch(e) {
req = false;
}
}
}
}
if (req) {
 req.onreadystatechange = processReqChange;
 req.open("GET", url, true);
 req.send();
}
}
}


function processReqChange(){

if (req.readyState == 4) {
if (req.status == 200) {

document.getElementById("atualiza").innerHTML = req.responseText;
} else {
alert("Houve um problema ao obter os dados:\n" + req.statusText);
}
}
}



function atualiza(valor){
loadXMLDoc("administrador/cidades.php?ID="+valor);
}

</script> 
                 
<form name="cadastro" action="cadassinatura.php" method="post" enctype="multipart/form-data" onSubmit="return validar(this)">
                <table width="100%" border="0" align="center" class="fontetabela">
                  <tr>
                    
                  </tr>
                  <tr>
                    <td><b>Usuário:</b></td>
                    <td><input name="usuario" class="fontetabela" size="30" />
                      * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* Campos Obrigatórios</td>
                  </tr>
                  <tr>
                    <td><font color="#ff0000"><b>Senha:</b></font></td>
                    <td><input name="senha" type="password" class="fontetabela" size="30" />
* &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>Tipo de Assinatura:</td>
                    <td><input type="checkbox" name="impresso" id="impresso" value="JORNAL IMPRESSO">
                      <strong>JORNAL IMPRESSO</strong>
                      <input type="checkbox" name="online" id="online" value="JORNAL ONLINE">
                      <strong>JORNAL ONLINE</strong></td>
                  </tr>
                  <tr>
                    <td width="18%">Nome:</td>
                    <td width="82%"><input name="cliente" class="fontetabela" size="56" />
                      *</td>
                  </tr>
                  <tr>
                    <td>E-mail:</td>
                    <td><input name="email" class="fontetabela" id="email" size="46" />
                      *</td>
                  </tr>
                  <tr>
                    <td>Raz&atilde;o Social:</td>
                    <td><input name="razaosocial" class="fontetabela" size="70" />
                      *</td>
                  </tr>
                  <tr>
                    <td>Foto:</td>
                    <td><input class="fontetabela" type="file" name="foto" /></td>
                  </tr>
                  <tr>
                    <td>Nome Fantasia:</td>
                    <td><input name="nomefantasia" class="fontetabela" size="70" />
                      *</td>
                  </tr>
                  <tr>
                    <td>Endere&ccedil;o:</td>
                    <td><input name="endereco" class="fontetabela" size="50" />
                      * &nbsp;&nbsp;N&uacute;mero:
                      <input name="numero" class="fontetabela" size="8" />
                      *</td>
                  </tr>
                  <tr>
                    <td>Complemento:</td>
                    <td><input name="complemento" class="fontetabela" size="40" /></td>
                  </tr>
                  <tr>
                    <td>Bairro:</td>
                    <td><input name="bairro" class="fontetabela" size="26" />
                      *</td>
                  </tr>
                  <tr>
                    <td>Estado:</td>
                    <td><select name="uf" class="fontetabela" onBlur="atualiza(this.value);">
                      <option value="#">Selecione um estado</option>
                      <?
		  include "administrador/conexao.php";
		  $result = mysql_query("SELECT * FROM cw_estado ORDER BY 'nome'");
		  while($row = mysql_fetch_array($result)){
		  echo "<option value=\"$row[uf]\">$row[nome]</option>";
		  }
		  ?>
                    </select></td>
                  </tr>
                  <tr>
                    <td>Cidade:</td>
                    <td><div id="atualiza">
                      <select name="cidade" class="fontetabela">
                        <option value="#">Selecione um estado primeiro</option>
                      </select>
                    </div></td>
                  </tr>
                  <tr>
                    <td>CEP:</td>
                    <td><input name="cep" class="fontetabela" onKeyPress="Mascara('cep', window.event.keyCode, 'document.cadastro.cep');" size="14" maxlength="9"/>
                      *</td>
                  </tr>
                  <tr>
                    <td>CNPJ / CPF:</td>
                    <td><input name="cnpjcpf" class="fontetabela" size="32" />
                      *</td>
                  </tr>
                  <tr>
                    <td>Insc. Est:</td>
                    <td><input name="ie" class="fontetabela" size="32" /></td>
                  </tr>
                  <tr>
                    <td>RG:</td>
                    <td><input name="rg" class="fontetabela" size="32" />
                      *</td>
                  </tr>
                  <tr>
                    <td>Data de Nascimento:</td>
                    <td><input name="datanasc" class="fontetabela" id="nascimento" onKeyPress="Mascara('nascimento', window.event.keyCode, 'document.cadastro.nascimento');" 
size="12" maxlength="10" /></td>
                  </tr>
                  <tr>
                    <td>Telefone:</td>
                    <td><input name="telefone" class="fontetabela" id="numero1" onKeyPress="Mascara('numero1', window.event.keyCode, 'document.cadastro.numero1');" size="15" maxlength="14" />
                      *</td>
                  </tr>
                  <tr>
                    <td>FAX:</td>
                    <td><input name="fax" class="fontetabela" id="numero2" onKeyPress="Mascara('numero2', window.event.keyCode, 'document.cadastro.numero2');" size="15" maxlength="14" /></td>
                  </tr>
                  <tr>
                    <td>Celular:</td>
                    <td><input name="celular" class="fontetabela" id="celular1" onKeyPress="Mascara('celular1', window.event.keyCode, 'document.cadastro.celular1');" size="15" maxlength="14" /></td>
                  </tr>
                  <tr>
                    <td>Home Page:</td>
                    <td>http://
                      <input name="homepage" class="fontetabela" size="40" /></td>
                  </tr>
                </table>
               <table width="100%" border="0" align="center">
  <tr>
    <td class="fontetabela">Observa&ccedil;&otilde;es:</td>
  </tr>
</table>
                <table width="100%" border="0" align="center">
  <tr>
    <td><textarea name="observacao" cols="106" rows="14" class="fontetabela"></textarea></td>
  </tr>
  <tr>
    <td><input name="limpar" type="reset" class="fontetabela" value="Limpar Formul&aacute;rio" />
      <input name="submit2" type="submit" class="fontetabela" value="Efetuar Cadastro"/></td>
  </tr>
</table>
                </form></td>
                  </tr>
                </table></td>
                </tr>
          </table></td>
        </tr>
</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="4" /></td>
              </tr>
          </table></td>
    
  </tr>
</table>

<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table> 
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("baixo(1).php"); ?></td>
  </tr>
</table>

    
    
    </td>
    <td width="1" bgcolor="#CCCCCC"><img src="imagens/branco.gif" width="1" height="1" /></td>
  </tr>
</table>
</body>
</html>