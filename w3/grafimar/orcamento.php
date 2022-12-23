<?php include("head.php"); ?>
</HEAD>
<style type="text/css">
<!--
.style12 {font-family: Geneva, Arial, Helvetica, sans-serif; color: #333333;}
.style13 {color: #FFFFFF}
.style6 {font-family: Verdana, Arial, Helvetica, sans-serif; }
-->
</style>
<BODY topmargin="0">
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <?php include("cabecalho.php"); ?>
  <TR>
    <TD height=308>&nbsp;</TD>
    <TD vAlign=top align=middle width=605 background=home_arquivos/bg.jpg 
    height=308>
      <TABLE height="100%" cellSpacing=0 cellPadding=0 width=800 align=center 
      border=0>
        <TBODY>
        <TR>
          <?php include("esquerdo.php"); ?>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 width=568 align=center 
              border=0><TBODY><TR>
                <TD><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td bgcolor="#7CC329"><img src="blank.gif" height="6"><div align="center"><img src="home_arquivos/banner.jpg" width="564" height="110"></div><img src="blank.gif" height="6"></td>
                  </tr>
                </table></TD>
              </TR>
              <TR>
                <TD height=28 align=left vAlign=center background="home_arquivos/ladrilho.jpg">
                 <div >
                   <div align="center" class="style12 style13">OR&Ccedil;AMENTO&nbsp;&nbsp;</div>
                 </div></TD></TR>
              <TR>
                <TD vAlign=center align=middle><table width="100%" border="0">
                  <tr>
                    <td>
                        <script language=javascript>
function validar(cadastro) { 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome não está preenchido!")
cadastro.nome.focus();
return false
}

if (document.cadastro.empresa.value=="") {
alert("O Campo Empresa não está preenchido!")
cadastro.empresa.focus();
return false
}

if (document.cadastro.telefone.value=="") {
alert("O Campo Telefone não está preenchido!")
cadastro.telefone.focus();
return false
}

if (document.cadastro.email2.value=="") {
alert("O Campo E-mail não está preenchido!")
cadastro.email2.focus();
return false
}


		return true;

}


</SCRIPT>
						<script language=javascript>
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


}
</SCRIPT><FORM action="enviaorcamento.php" method="post" enctype="multipart/form-data" name="cadastro" onSubmit="return validar(this)"><table width="96%" border="0" align="center">
                        <tr>
                          <td><div align="center"><span class="style6"><img src="home_arquivos/calculadora.jpg" width="213" height="143"></span></div></td>
                        </tr>
                        <tr>
                          <td width="50%"><table width="100%" border="0">
                            <tr>
                              <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">Preencha o formul&aacute;rio abaixo e solicite o or&ccedil;amento:</font></td>
                              <td><div align="right"><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">* Campos Obrigat&oacute;rios</font></div></td>
                            </tr>
                          </table></td>
                          </tr>
                        <tr>
                          <td><table width="100%" align="left" border="0">
                            <tbody>
                              <tr>
                                <td width="68%"><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">Respons&aacute;vel (Nome Completo):</font></td>
                              </tr>
                              <tr>
                                <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
                                  <input class=texto size="60" name="nome" />
 *                               </font></td>
                              </tr>
                              <tr>
                                <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">Inserir Imagem do Projeto ( JPG - Tamanho m&aacute;x: 2mb ):</font></td>
                              </tr>
                              <tr>
                                <td><label>
                                  <input type="file" name="file[]" class="texto" />
                                </label></td>
                              </tr>
                              <tr>
                                <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">Empresa:</font></td>
                              </tr>
                              <tr>
                                <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
                                  <input class=texto size="60" name="empresa" />
* </font></td>
                              </tr>
                              <tr>
                                <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">Cidade:</font></td>
                              </tr>
                              <tr>
                                <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#ffffff" size="1"><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
                                  <input class=texto size="36" name="cidade" />
                                  </font><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#ffffff" size="1"><font color="#000000">
                                  <select class=texto 
                              name="estado">
                                    <option value="Estado" selected="selected">Estado</option>
                                    <option 
                                value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option 
                                value="AM">AM</option>
                                    <option value="AP">AP</option>
                                    <option 
                                value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option 
                                value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option 
                                value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option 
                                value="MG">MG</option>
                                    <option value="MS">MS</option>
                                    <option 
                                value="MT">MT</option>
                                    <option value="PA">PA</option>
                                    <option 
                                value="PB">PB</option>
                                    <option value="PE">PE</option>
                                    <option 
                                value="PI">PI</option>
                                    <option value="PR">PR</option>
                                    <option 
                                value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option 
                                value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option 
                                value="RS">RS</option>
                                    <option value="SC">SC</option>
                                    <option 
                                value="SE">SE</option>
                                    <option value="SP">SP</option>
                                    <option 
                                value="TO">TO</option>
                                  </select>
                                  </font></font><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1"> </font> <font 
                              color="#000000">CEP</font><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">:
                                    <input onKeyPress="Mascara('cep', window.event.keyCode, 'document.cadastro.cep');" class=texto size="14" name="cep"/>
                                </font></font></td>
                              </tr>
                              <tr>
                                <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">Telefone:</font></td>
                              </tr>
                              <tr>
                                <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
                                  <input class=texto size="32" name="telefone" onKeyPress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');"  />
 *                               </font></td>
                              </tr>
                              <tr>
                                <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">E-mail:</font></td>
                              </tr>
                              <tr>
                                <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
                                  <input class=texto size="40" name="email2" />
 *                               </font></td>
                              </tr>
                              <tr>
                                <td><font size="1">Mensagem / Sugest&otilde;es<font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000">:</font></font></td>
                              </tr>
                              <tr>
                                <td><font color="#000000"><b><b><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              size="1">
                                  <textarea class=texto name="mensagem" rows="12" cols="80"></textarea>
                                </font></b></b></font><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">&nbsp; </font></td>
                              </tr>
                              <tr>
                                <td><table width="100%" border="0">
                                  <tr>
                                    <td width="13%"><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">Quantidade:</font></td>
                                    <td width="16%"><font 
                  face="Verdana, Arial" size=2>
                                      <select class=texto 
                  name=quantidade>
                                        <option selected>500</option>
                                        <option>1000</option>
                                        <option>1500</option>
                                        <option>2000</option>
                                        <option>2500</option>
                                        <option>3500</option>
                                        <option>3000</option>
                                        <option>4500</option>
                                        <option>5000</option>
                                        <option>5500</option>
                                        <option>6000</option>
                                        <option>6500</option>
                                        <option>7000</option>
                                        <option>7500</option>
                                        <option>8000</option>
                                        <option>8500</option>
                                        <option>9000</option>
                                        <option>9500</option>
                                        <option>10000</option>
                                        <option>Outro</option>
                                      </select>
                                    </font></td>
                                    <td width="11%"><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">Tamanho:</font></td>
                                    <td width="60%"><font 
                  face="Verdana, Arial" size=2>
                                      <select class=texto 
                  name=tamanho>
                                        <option selected>5,5" = 140 x 240 mm</option>
                                        <option>6" = 152 x 240 mm</option>
                                        <option>6,5" = 165 x 240 
                                          mm</option>
                                        <option>8" = 204 x 240 mm</option>
                                        <option>8,5" 
                                          = 216 x 240 mm</option>
                                        <option>11" = 280 x 240 mm</option>
                                        <option>12" = 304 x 240 mm</option>
                                        <option>13" = 330 x 240 
                                          mm</option>
                                        <option>Outro tamanho.</option>
                                      </select>
                                    </font></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td><table width="100%" border="0">
                                  <tr>
                                    <td width="13%"><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">N&ordm; de Vias:</font></td>
                                    <td width="13%"><font 
                  face="Verdana, Arial" size=2>
                                      <select class=texto 
                  name=n_vias>
                                        <option selected>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                      </select>
                                    </font></td>
                                    <td width="25%"><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">Quantidade de Cores:</font></td>
                                    <td width="49%"><font face="Verdana, Arial" 
                  size=2>
                                      <select class=texto name=quant_cores>
                                        <option>01 
                                          cor</option>
                                        <option>02 cores</option>
                                        <option selected>03 
                                          cores</option>
                                        <option>04 cores</option>
                                      </select>
                                    </font></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td><table width="100%" border="0">
                                  <tr>
                                    <td width="7%"><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">Papel:</font></td>
                                    <td width="93%"><FONT face="Verdana, Arial" 
                  size=2>
                                      <SELECT class=texto name=papel>
                                        <OPTION 
                    selected>Sulfite</OPTION>
                                        <OPTION>Sulfite/Carbono</OPTION>
                                        <OPTION>Auto-copiativo</OPTION>
                                      </SELECT>
                                    </FONT></td>
                                  </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">
                                  <input class=texto type="submit" value="Enviar Dados" name="submit" />
                                </font></td>
                              </tr>
                            </tbody>
                          </table></td>
                        </tr>
                      </table>
</FORM></td>
                  </tr>
                </table></TD>
              </TR></TABLE></TD>
          <TD width=67>&nbsp;</TD></TR></TABLE></TD>
    <TD height=308>&nbsp;</TD></TR><?php include("cabecalhobaxo.php"); ?></TBODY></TABLE>
</BODY></HTML>
