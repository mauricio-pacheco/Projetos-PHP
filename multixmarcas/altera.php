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
                <td class="fontetabela5" align="right"><strong>Alterar Dados Pessoais</strong>&nbsp;&nbsp;</td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><?php
include "administrador/conexao.php";
$logado = $_COOKIE['email'];
$logado2 = $_COOKIE['senha'];
$logado2novo = hash('sha512', $logado2);

$sql = mysql_query("SELECT * FROM cw_clientes WHERE email = '$logado' AND senha = '$logado2novo'");
$contar = mysql_num_rows($sql); 

if ( $contar == 1 ) {
	
?>
                        <?php
while($y = mysql_fetch_array($sql))
   {
?>
                        <script language="javascript" type="text/javascript">
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
                        <form action="updatecliente.php" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro" onSubmit="return validar(this)">
                          <table width="100%" border="0" align="center" class="manchete_texto9">
                            <tr>
                              <td><b>Usuário:<span class="rodape">
                                <input type="hidden" name="usuario2" value="<?php echo $y["usuario"]; ?>" />
                                <input type="hidden" name="id" value="<?php echo $y["id"]; ?>" />
                                </span></b></td>
                              <td><input name="usuario" disabled="disabled"  class="manchete_texto96" value="<?php echo $y["usuario"]; ?>" size="30" />
                                * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* Campos Obrigatórios</td>
                            </tr>
                            <tr>
                              <td><font color="#ff0000"><b>Senha:</b></font></td>
                              <td><input name="senha" type="password" class="manchete_texto96" size="30" />
                                * &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="hidden" name="usuario" value="<?php echo $y["usuario"]; ?>" /></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td width="18%">Nome:</td>
                              <td width="82%"><input name="cliente" value="<?php echo $y["cliente"]; ?>" class="manchete_texto96" size="56" />
                                *</td>
                            </tr>
                            <tr>
                              <td>E-mail:</td>
                              <td><input name="email" class="manchete_texto96" value="<?php echo $y["email"]; ?>" id="email" size="46" />
                                *</td>
                            </tr>
                            <tr>
                              <td>Raz&atilde;o Social:</td>
                              <td><input name="razaosocial" class="manchete_texto96" value="<?php echo $y["razaosocial"]; ?>" size="70" />
                                *</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td><span class="rodape"><img src="administrador/ups/clientes/<?php echo $y["foto"]; ?>" /></span></td>
                            </tr>
                            <tr>
                              <td>Foto:</td>
                              <td><input class="manchete_texto96" type="file" name="foto" />
                                <span class="rodape">(caso não deseje editar a foto deixe   em branco)
                                  <input type="hidden" name="foto" id="foto" value="<?php echo $y["foto"]; ?>" />
                                </span></td>
                            </tr>
                            <tr>
                              <td>Nome Fantasia:</td>
                              <td><input name="nomefantasia" value="<?php echo $y["nomefantasia"]; ?>" class="manchete_texto96" size="70" />
                                *</td>
                            </tr>
                            <tr>
                              <td>Endere&ccedil;o:</td>
                              <td><input name="endereco" value="<?php echo $y["endereco"]; ?>" class="manchete_texto96" size="50" />
                                * &nbsp;&nbsp;N&uacute;mero:
                                <input name="numero" value="<?php echo $y["numero"]; ?>" class="manchete_texto96" size="8" />
                                *</td>
                            </tr>
                            <tr>
                              <td>Complemento:</td>
                              <td><input name="complemento" value="<?php echo $y["complemento"]; ?>" class="manchete_texto96" size="40" /></td>
                            </tr>
                            <tr>
                              <td>Bairro:</td>
                              <td><input name="bairro" value="<?php echo $y["bairro"]; ?>" class="manchete_texto96" size="26" />
                                *</td>
                            </tr>
                            <tr>
                              <td>Estado:</td>
                              <td><select name="uf" class="manchete_texto96" onBlur="atualiza(this.value);">
                                <option value="<?php echo $y["uf"]; ?>"><?php echo $y["uf"]; ?></option>
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
                                <select name="cidade" class="manchete_texto96">
                                  <option value="<?php echo $y["cidade"]; ?>"><?php echo $y["cidade"]; ?></option>
                                  <option value="#">Selecione um estado primeiro</option>
                                </select>
                              </div></td>
                            </tr>
                            <tr>
                              <td>CEP:</td>
                              <td><input name="cep" value="<?php echo $y["cep"]; ?>" class="manchete_texto96" onKeyPress="Mascara('cep', window.event.keyCode, 'document.cadastro.cep');" size="14" maxlength="9"/>
                                *</td>
                            </tr>
                            <tr>
                              <td>CNPJ / CPF:</td>
                              <td><input name="cnpjcpf" value="<?php echo $y["cnpjcpf"]; ?>" class="manchete_texto96" size="32" />
                                *</td>
                            </tr>
                            <tr>
                              <td>Insc. Est:</td>
                              <td><input name="ie" value="<?php echo $y["ie"]; ?>" class="manchete_texto96" size="32" /></td>
                            </tr>
                            <tr>
                              <td>RG:</td>
                              <td><input name="rg" value="<?php echo $y["rg"]; ?>" class="manchete_texto96" size="32" />
                                *</td>
                            </tr>
                            <tr>
                              <td>Data de Nascimento:</td>
                              <td><input name="datanasc" value="<?php echo $y["datanasc"]; ?>" class="manchete_texto96" id="nascimento" onKeyPress="Mascara('nascimento', window.event.keyCode, 'document.cadastro.nascimento');" 
size="12" maxlength="10" /></td>
                            </tr>
                            <tr>
                              <td>Telefone:</td>
                              <td><input name="telefone" value="<?php echo $y["telefone"]; ?>" class="manchete_texto96" id="numero1" onKeyPress="Mascara('numero1', window.event.keyCode, 'document.cadastro.numero1');" size="15" maxlength="14" />
                                *</td>
                            </tr>
                            <tr>
                              <td>FAX:</td>
                              <td><input name="fax" value="<?php echo $y["fax"]; ?>" class="manchete_texto96" id="numero2" onKeyPress="Mascara('numero2', window.event.keyCode, 'document.cadastro.numero2');" size="15" maxlength="14" /></td>
                            </tr>
                            <tr>
                              <td>Celular:</td>
                              <td><input name="celular" value="<?php echo $y["celular"]; ?>" class="manchete_texto96" id="celular1" onKeyPress="Mascara('celular1', window.event.keyCode, 'document.cadastro.celular1');" size="15" maxlength="14" /></td>
                            </tr>
                            <tr>
                              <td>Home Page:</td>
                              <td>http://
                                <input name="homepage" value="<?php echo $y["homepage"]; ?>" class="manchete_texto96" size="40" /></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" align="center">
                            <tr>
                              <td class="manchete_texto9">Observa&ccedil;&otilde;es:</td>
                            </tr>
                          </table>
                          <table width="100%" border="0" align="center">
                            <tr>
                              <td><textarea name="observacao" cols="106" rows="14" class="manchete_texto96"><?php echo $y["observacao"]; ?></textarea></td>
                            </tr>
                            <tr>
                              <td><input name="limpar" type="reset" class="manchete_texto96" value="Limpar Formulário" />
                                <input name="submit2" type="submit" class="manchete_texto96" value="Alterar Dados"/></td>
                            </tr>
                          </table>
                        </form>
                        <?php } ?>
                        <?php
} else {
?>
                        <div align="center" class="fonteadm"><br />
                          <img src="imagens/chavao.png"  /><br />
                          <br />
                          <span class="manchete_texto9">Você precisa estar logado para executar esta ação!</span></div>
                        <?php } ?></td>
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