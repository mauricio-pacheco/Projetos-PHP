<?php include("meta.php"); ?>
<table width="100%" height="91" background="imagens/bloco12.jpg" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="100%" height="24" background="imagens/bloco2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("slides.php"); ?>
      <table width="1000" bgcolor="#EBEBEB" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
      <table width="1000" background="imagens/barracentro.png" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td valign="top"><table width="992" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="231" valign="top"><?php include("menulateral.php"); ?></td>
            <td width="761" valign="top"><table height="30" background="imagens/funtotabelamaior.png" bgcolor="#535353" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fontetabela5" align="right"><strong>Cadastro Pessoa Física</strong>&nbsp;&nbsp;</td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center" class="manchete_texto9">
                <tr>
                  <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><script language="javascript" type="text/javascript">
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
                        <script language="javascript" type="text/javascript">

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
                        <form action="cadcliente1.php" method="post" enctype="multipart/form-data" name="cadastro" onsubmit="return validar(this)">
                          <table width="100%" border="0" align="center" class="manchete_texto9">
                            <tr>
                              <td><b>Usuário:</b></td>
                              <td><input name="usuario" class="manchete_texto96" size="30" />
                                * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* Campos Obrigatórios</td>
                            </tr>
                            <tr>
                              <td><font color="#ff0000"><b>Senha:</b></font></td>
                              <td><font color="#0066CC">SENHA AUTOMÁTICA</font> ( Senha enviada para o e-mail de cadastro )</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td width="18%">Nome Completo:</td>
                              <td width="82%"><input name="cliente" class="manchete_texto96" size="56" />
                                *</td>
                            </tr>
                            <tr>
                              <td>E-mail:</td>
                              <td><input name="email" class="manchete_texto96" id="email" size="46" />
                                *</td>
                            </tr>
                            <tr>
                              <td>Foto do Cliente:</td>
                              <td><input class="manchete_texto96" type="file" name="foto" /></td>
                            </tr>
                            <tr>
                              <td>Endere&ccedil;o:</td>
                              <td><input name="endereco" class="manchete_texto96" size="50" />
                                * N&uacute;mero:
                                <input name="numero" class="manchete_texto96" size="8" />
                                *</td>
                            </tr>
                            <tr>
                              <td>Complemento:</td>
                              <td><input name="complemento" class="manchete_texto96" size="40" /></td>
                            </tr>
                            <tr>
                              <td>Bairro:</td>
                              <td><input name="bairro" class="manchete_texto96" size="26" />
                                *</td>
                            </tr>
                            <tr>
                              <td>Estado:</td>
                              <td><select name="uf" class="manchete_texto96" onblur="atualiza(this.value);">
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
                                <select name="cidade" class="manchete_texto96">
                                  <option value="#">Selecione um estado primeiro</option>
                                </select>
                              </div></td>
                            </tr>
                            <tr>
                              <td>CEP:</td>
                              <td><input name="cep" class="manchete_texto96" value="<?php $cep = $_GET['cep']; echo $cep; ?>" size="14" maxlength="9"/>
                                *</td>
                            </tr>
                            <tr>
                              <td>CPF:</td>
                              <td><input name="cnpjcpf" class="manchete_texto96" size="32" />
                                *</td>
                            </tr>
                            <tr>
                              <td>RG:</td>
                              <td><input name="rg" class="manchete_texto96" size="32" />
                                *</td>
                            </tr>
                            <tr>
                              <td>Data de Nascimento:</td>
                              <td><input name="datanasc" class="manchete_texto96" id="nascimento" onkeypress="Mascara('nascimento', window.event.keyCode, 'document.cadastro.nascimento');" 
size="12" maxlength="10" /></td>
                            </tr>
                            <tr>
                              <td>Telefone:</td>
                              <td><input name="telefone" class="manchete_texto96" id="numero1" onkeypress="Mascara('numero1', window.event.keyCode, 'document.cadastro.numero1');" size="15" maxlength="14" />
                                *</td>
                            </tr>
                            <tr>
                              <td>FAX:</td>
                              <td><input name="fax" class="manchete_texto96" id="numero2" onkeypress="Mascara('numero2', window.event.keyCode, 'document.cadastro.numero2');" size="15" maxlength="14" /></td>
                            </tr>
                            <tr>
                              <td>Celular:</td>
                              <td><input name="celular" class="manchete_texto96" id="celular1" onkeypress="Mascara('celular1', window.event.keyCode, 'document.cadastro.celular1');" size="15" maxlength="14" /></td>
                            </tr>
                            <tr>
                              <td>Home Page:</td>
                              <td>http://
                                <input name="homepage" class="manchete_texto96" size="40" /></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" align="center">
                            <tr>
                              <td class="manchete_texto9">Observa&ccedil;&otilde;es:</td>
                            </tr>
                          </table>
                          <table width="100%" border="0" align="center">
                            <tr>
                              <td><textarea name="observacao" cols="106" rows="14" class="manchete_texto96"></textarea></td>
                            </tr>
                            <tr>
                              <td><input name="limpar" type="reset" class="manchete_texto96" value="Limpar Formulário" />
                                <input name="submit" type="submit" class="manchete_texto96" value="Cadastrar Cliente"/></td>
                            </tr>
                          </table>
                        </form></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="12" /></td>
                </tr>
      </table></td>
          </tr>
        </table></td>
      </tr>
  </table></td>
  </tr>
</table>
<table width="100%" height="120" background="imagens/blocoabaixo.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="16" /></td>
      </tr>
    </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>