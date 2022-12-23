<?php include("cima.php"); ?>
<table width="100%" background="imagens/geral2.png" height="210" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','210'); 
    </SCRIPT></td>
      </tr>
    </table></td>
  </tr>
</table>
<table class="boxSombra" width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="24%" bgcolor="#F0F0F0" valign="top"><?php include("menu.php"); ?>
        
</td>
        <td width="76%" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
          </table>
          <table width="100%" border="0" align="center">
            <tr>
              <td width="11%" height="30" bgcolor="#076CA0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>EDITAR CLIENTE</b></font></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr></tr>
          <tr>
            <td><table width="99%" bgcolor="#FFFFFF" height="500" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="fontetabela">
                  <tr>
                    <td><script language="JavaScript" type="text/javascript">
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
                    </script>
                      <script language="JavaScript" type="text/javascript">

function validar(cadastro) { 

if (document.cadastro.usuario.value=="") {
alert("O Campo Usuário não está preenchido!")
cadastro.usuario.focus();
return false
}

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

              </script>
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
loadXMLDoc("cidades.php?ID="+valor);
}

              </script>
                      <form action="updatecliente.php" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro" onsubmit="return validar(this)">
                        <?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM cw_clientes WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>NÃO EXISTE CLIENTE CADASTRADO!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                        <table width="100%" border="0" align="center" class="fonteadm">
                          <tr>
                            <td><b>Usuário:</b></td>
                            <td><input name="usuario" disabled="disabled" value="<?php echo $n["usuario"]; ?>" class="fonteadm" size="30" />
                              *<span class="rodape">
                                <input type="hidden" name="usuario" value="<?php echo $n["usuario"]; ?>" />
                                <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />
                                </span></td>
                          </tr>
                          <tr>
                            <td><font color="#ff0000"><b>Senha:</b></font></td>
                            <td><input name="senha" type="password" class="fonteadm" value="<?php echo $n["senha"]; ?>" size="30"/>
                              *</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td width="15%">Nome:</td>
                            <td width="85%"><input name="cliente" class="fonteadm" value="<?php echo $n["cliente"]; ?>" size="56" />
                              *</td>
                          </tr>
                          <tr>
                            <td>E-mail:</td>
                            <td><input name="email" class="fonteadm" value="<?php echo $n["email"]; ?>" id="email" size="46" />
                              *</td>
                          </tr>
                          <tr>
                            <td>Raz&atilde;o Social:</td>
                            <td><input name="razaosocial" class="fonteadm" value="<?php echo $n["razaosocial"]; ?>" size="70" />
                              *</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><span class="rodape"><img src="ups/clientes/<?php echo $n["foto"]; ?>" /></span></td>
                          </tr>
                          <tr>
                            <td>Foto do Cliente:</td>
                            <td><input class="fonteadm" type="file" name="foto" />
                              <span class="rodape">(caso não deseje editar a foto deixe   em branco)
                                <input type="hidden" name="foto" id="foto" value="<?php echo $n["foto"]; ?>" />
                              </span></td>
                          </tr>
                          <tr>
                            <td>Nome Fantasia:</td>
                            <td><input name="nomefantasia" class="fonteadm" value="<?php echo $n["nomefantasia"]; ?>" size="70" />
                              *</td>
                          </tr>
                          <tr>
                            <td>Endere&ccedil;o:</td>
                            <td><input name="endereco" class="fonteadm" value="<?php echo $n["endereco"]; ?>" size="50" />
                              * N&uacute;mero:
                              <input name="numero" class="fonteadm" size="8" value="<?php echo $n["numero"]; ?>" />
                              *</td>
                          </tr>
                          <tr>
                            <td>Complemento:</td>
                            <td><input name="complemento" class="fonteadm" value="<?php echo $n["complemento"]; ?>" size="40" /></td>
                          </tr>
                          <tr>
                            <td>Bairro:</td>
                            <td><input name="bairro" value="<?php echo $n["bairro"]; ?>" class="fonteadm" size="26" />
                              *</td>
                          </tr>
                          <tr>
                            <td>Estado:</td>
                            <td><script>

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
loadXMLDoc("cidades.php?ID="+valor);
}

              </script>
                              <select name="uf" class="fonteadm" onblur="atualiza(this.value);">
                                <option value="<?php echo $n["uf"]; ?>"><?php echo $n["uf"]; ?></option>
                                <option value="#">Selecione um estado</option>
                                <?
		  include "conexao.php";
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
                              <select name="cidade" class="fonteadm">
                                <option value="<?php echo $n["cidade"]; ?>"><?php echo $n["cidade"]; ?></option>
                                <option value="#">Selecione um estado primeiro</option>
                              </select>
                            </div></td>
                          </tr>
                          <tr>
                            <td>CEP:</td>
                            <td><input name="cep" class="fonteadm" onkeypress="Mascara('cep', window.event.keyCode, 'document.cadastro.cep');" size="14" maxlength="9" value="<?php echo $n["cep"]; ?>"/>
                              *</td>
                          </tr>
                          <tr>
                            <td>CNPJ / CPF:</td>
                            <td><input name="cnpjcpf" class="fonteadm" size="32" value="<?php echo $n["cnpjcpf"]; ?>" />
                              *</td>
                          </tr>
                          <tr>
                            <td>Insc. Est:</td>
                            <td><input name="ie" class="fonteadm" size="32" value="<?php echo $n["ie"]; ?>" /></td>
                          </tr>
                          <tr>
                            <td>RG:</td>
                            <td><input name="rg" class="fonteadm" size="32" value="<?php echo $n["rg"]; ?>" />
                              *</td>
                          </tr>
                          <tr>
                            <td>Data de Nascimento:</td>
                            <td><input value="<?php echo $n["datanasc"]; ?>" name="datanasc" class="fonteadm" id="nascimento" onkeypress="Mascara('nascimento', window.event.keyCode, 'document.cadastro.nascimento');" 
size="12" maxlength="10"  /></td>
                          </tr>
                          <tr>
                            <td>Telefone:</td>
                            <td><input name="telefone" class="fonteadm" id="numero1" onkeypress="Mascara('numero1', window.event.keyCode, 'document.cadastro.numero1');" size="15" maxlength="14" value="<?php echo $n["telefone"]; ?>" />
                              *</td>
                          </tr>
                          <tr>
                            <td>FAX:</td>
                            <td><input name="fax" class="fonteadm" id="numero2" onkeypress="Mascara('numero2', window.event.keyCode, 'document.cadastro.numero2');" size="15" maxlength="14" value="<?php echo $n["fax"]; ?>" /></td>
                          </tr>
                          <tr>
                            <td>Celular:</td>
                            <td><input name="celular" class="fonteadm" id="celular1" onkeypress="Mascara('celular1', window.event.keyCode, 'document.cadastro.celular1');" size="15" maxlength="14" value="<?php echo $n["celular"]; ?>" /></td>
                          </tr>
                          <tr>
                            <td>Home Page:</td>
                            <td>http://
                              <input name="homepage" class="fonteadm" size="40" value="<?php echo $n["homepage"]; ?>" /></td>
                          </tr>
                        </table>
                        <table width="98%" border="0" align="center" class="fonteadm">
                          <tr>
                            <td>Observa&ccedil;&otilde;es:</td>
                          </tr>
                        </table>
                        <table width="98%" border="0" align="center" class="fonteadm">
                          <tr>
                            <td><textarea name="observacao" cols="106" rows="14" class="fonteadm"><?php echo $n["observacao"]; ?></textarea></td>
                          </tr>
                          <tr>
                            <td><input name="submit2" type="submit" class="fonteadm" value="Editar Cliente"/>
                              <?php
  }
  }
 ?></td>
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
            <tr></tr>
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            </tr>
          </table></td>
        </tr>
    </table>
    </td>
  </tr>
</table>
<table width="100%" background="imagens/rodape.png" height="104" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="8" /></td>
      </tr>
    </table>
      <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="22" /></td>
        </tr>
      </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>