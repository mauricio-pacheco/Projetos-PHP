<div id="centro">
<div class="centro_titulo">
<div class="tflash">
  <div align="left"></div>
</div>
</div>

<div class="centro_cont">
<div class="centro_cont_fundo">
<div id="texto">
<br />               <script language=javascript>
				  function validar(cadastro) { 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome Completo n�o est� preenchido!")
cadastro.nome.focus();
return false
}

if (document.cadastro.cidade.value=="") {
alert("O Campo Cidade n�o est� preenchido!")
cadastro.cidade.focus();
return false
}

if (document.cadastro.cep.value=="") {
alert("O Campo CEP n�o est� preenchido!")
cadastro.cep.focus();
return false
}

if (document.cadastro.email2.value=="") {
alert("O Campo E-mail n�o est� preenchido!")
cadastro.email2.focus();
return false
}

if (document.cadastro.telefone.value=="") {
alert("O Campo Telefone n�o est� preenchido!")
cadastro.telefone.focus();
return false
}

		return true;

}
				  
				  
function Mascara (formato, keypress, objeto){
campo = eval (objeto);

// cep
if (formato=='cep'){
separador = '-';
conjunto1 = 5;
if (campo.value.length == conjunto1){
campo.value = campo.value + separador;}
}

// cpf
if (formato=='cpf'){
separador1 = '.'; 
separador2 = '-'; 
conjunto1 = 3;
conjunto2 = 7;
conjunto3 = 11;
if (campo.value.length == conjunto1)
  {
  campo.value = campo.value + separador1;
  }
if (campo.value.length == conjunto2)
  {
  campo.value = campo.value + separador1;
  }
if (campo.value.length == conjunto3)
  {
  campo.value = campo.value + separador2;
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

// telefone
if (formato=='telefone'){
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


// telefone
if (formato=='celular'){
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
        <?php
        
		$nome = $_GET['nome'];
		
		?><FORM action=enviapedido.php method=post enctype="multipart/form-data" name=cadastro onSubmit="return validar(this)">
  <p class="spip" align="center">Preencha o formul&aacute;rio abaixo para realizar o seu pedido.. </p>
  <br />
  <p class="spip" align="left">* Campos Obrigat&oacute;rios<br />
  </p>
  <p class="spip" align="left"><br />
    Nome do Ve�culo: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="40" name="ve�culo" value="<?php echo $nome ?>" readonly/>
      </font> <br />
    <br />
    Nome Completo: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="60" name="nome" />
      </font>*<br />
    Cidade: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="20" name="cidade" />
      </font>
        *
        <select class="texto2" 
                              name="estado">
          <option value="estado" selected="selected">Estado</option>
          <option 
                                value="AC - Acre">AC - Acre</option>
          <option value="AL - Alagoas">AL - Alagoas</option>
          <option 
                                value="AM - Amazonas">AM - Amazonas</option>
          <option value="AP - Amap&aacute;">AP - Amap&aacute;</option>
          <option 
                                value="BA - Bahia">BA - Bahia</option>
          <option value="CE - Cear&aacute;">CE - Cear&aacute;</option>
          <option 
                                value="DF - Distrito Federal">DF - Distrito Federal</option>
          <option value="ES - Esp&iacute;rito Santo">ES - Esp&iacute;rito Santo</option>
          <option 
                                value="GO - Goi&aacute;s">GO - Goi&aacute;s</option>
          <option value="MA - Maranh&atilde;o">MA - Maranh&atilde;o</option>
          <option 
                                value="MG - Minas Gerais">MG - Minas Gerais</option>
          <option value="MS - Mato Grosso do Sul">MS - Mato Grosso do Sul</option>
          <option 
                                value="MT - Mato Grosso">MT - Mato Grosso</option>
          <option value="PA - Par&aacute;">PA - Par&aacute;</option>
          <option 
                                value="PB - Para&iacute;ba">PB - Para&iacute;ba</option>
          <option value="PE - Pernambuco">PE - Pernambuco</option>
          <option 
                                value="PI - Piau&iacute;">PI - Piau&iacute;</option>
          <option value="PR - Paran&aacute;">PR - Paran&aacute;</option>
          <option 
                                value="RJ - Rio de Janeiro">RJ - Rio de Janeiro</option>
          <option value="RN - Rio Grande do Norte">RN - Rio Grande do Norte</option>
          <option 
                                value="RO - Roraima">RO - Roraima</option>
          <option value="RR - Roraima">RR - Roraima</option>
          <option 
                                value="RS - Rio Grande do Sul">RS - Rio Grande do Sul</option>
          <option value="SC - Santa Catarina">SC - Santa Catarina</option>
          <option 
                                value="SE - Sergipe">SE - Sergipe</option>
          <option value="SP - S&atilde;o Paulo">SP - S&atilde;o Paulo</option>
          <option 
                                value="TO - Tocantins">TO - Tocantins</option>
          </select>
        </font></font></font></font></font></font></font><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#ffffff" size="1"><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1"> </font> <br /><font 
                              color="#000000">CEP</font><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">:
          </font><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#ffffff" size="1"><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
            <input onkeypress="Mascara('cep', window.event.keyCode, 'document.cadastro.cep');" class="texto2" size="14" name="cep"/>
            </font></font><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">            </font></font>*<br />
    E-mail: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="20" name="email2" />
      </font>*<br />
    Telefone:<font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="32" name="telefone" onkeypress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');"  />
      </font>*<br />
    Celular: <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input class="texto2" size="20" name="celular" onkeypress="Mascara('celular', window.event.keyCode, 'document.cadastro.celular');" />
      </font><br />
    <br />
    Enviar Anexo: 
    <input type="file" name="file[]" class="texto2" />
    <br />
    <br />
    Mensagem:<br />
    <font color="#000000"><b><b><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              size="1">
      <textarea class="texto2" name="mensagem" rows="12" cols="60"></textarea>
      </font></b></b></font><br />
    <br />
    <font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
      <input type="reset" value="Limpar Formul�rio" name="submit2" class="texto2" />
      <input type="submit" value="Enviar Dados" name="submit" class="texto2" />
      </font><br />
  </p>
        </form>
</div>
</div></div>

<div class="centro_rodape"></div>
</div>