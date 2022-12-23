<?php include("head.php"); ?>
</HEAD>
<style type="text/css">
<!--
.style12 {font-family: Geneva, Arial, Helvetica, sans-serif; color: #333333;}
.style13 {color: #FFFFFF}
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
                   <div align="center" class="style12 style13">FALE CONOSCO&nbsp;&nbsp;</div>
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
</SCRIPT><FORM action="enviac.php" method="post" enctype="multipart/form-data" name="cadastro" onSubmit="return validar(this)"><table width="96%" border="0" align="center">
                        <tr>
                          <td><table width="100%" border="0">
                            <tr>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><img src="fone.gif"></td>
                              <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">Telefone: (0xx55) 3746 - 1772 </font></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td><img src="email.gif"></td>
                              <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">E-mail: <a href="mailto:grafimarrs@gmail.com"><font color="#666666">grafimarrs@gmail.com</font></a></font></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td width="6%"><img src="msn.gif" width="30" height="28"></td>
                              <td width="94%"><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">MSN: <a href="mailto:grafimarrs@hotmail.com"><font color="#666666">grafimarrs@hotmail.com</font></a></font></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="50%"><table width="100%" border="0">
                            <tr>
                              <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1">Preencha o formul&aacute;rio abaixo para entrar em contato conosco:</font></td>
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
                              color="#000000" size="1">Nome Completo:</font></td>
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
                              color="#000000" size="1">Inserir Anexo:</font></td>
                              </tr>
                              <tr>
                                <td><label>
                                  <input type="file" name="file[]" class="texto" />
                                </label></td>
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
                              color="#000000" size="1">Pa&iacute;s:</font></td>
                              </tr>
                              <tr>
                                <td><font 
                              face="Verdana, Arial, Helvetica, sans-serif" 
                              color="#000000" size="1"> <span style="MARGIN: 0px">
                                  <input type="checkbox" value="Outro Pa&iacute;s" name="outropais" />
                                  </span>Outro Pa&iacute;s?&nbsp;
                                  <select class=texto name="pais">
                                    <option 
                                value="Brasil" selected="selected">Brasil</option>
                                    <option 
                                value="Afeganist&atilde;o">Afeganist&atilde;o</option>
                                    <option 
                                value="&Aacute;frica do Sul">&Aacute;frica do Sul</option>
                                    <option value="Aland - Finl&acirc;ndia">Aland - 
                                      Finl&acirc;ndia</option>
                                    <option 
                                value="Alb&acirc;nia">Alb&acirc;nia</option>
                                    <option 
                                value="Alemanha">Alemanha</option>
                                    <option 
                                value="Andorra">Andorra</option>
                                    <option 
                                value="Angola">Angola</option>
                                    <option 
                                value="Anguilla - Reino Unido">Anguilla - Reino 
                                      Unido</option>
                                    <option 
                                value="Ant&aacute;rtida">Ant&aacute;rtida</option>
                                    <option 
                                value="Ant&iacute;gua e Barbuda">Ant&iacute;gua e 
                                      Barbuda</option>
                                    <option 
                                value="Antilhas Holandesa">Antilhas 
                                      Holandesas</option>
                                    <option 
                                value="Ar&aacute;bia Saudita">Ar&aacute;bia Saudita</option>
                                    <option value="Arg&eacute;lia">Arg&eacute;lia</option>
                                    <option 
                                value="Argentina">Argentina</option>
                                    <option 
                                value="Arm&ecirc;nia">Arm&ecirc;nia</option>
                                    <option 
                                value="Aruba - Holanda">Aruba - Holanda</option>
                                    <option value="Ascens&atilde;o - Reino Unido">Ascens&atilde;o 
                                      - Reino Unido</option>
                                    <option 
                                value="Austr&aacute;lia">Austr&aacute;lia</option>
                                    <option 
                                value="&Aacute;ustria">&Aacute;ustria</option>
                                    <option 
                                value="Azerbaij&atilde;o">Azerbaij&atilde;o</option>
                                    <option 
                                value="Bahamas">Bahamas</option>
                                    <option 
                                value="Bahrein">Bahrein</option>
                                    <option 
                                value="Bangladesh">Bangladesh</option>
                                    <option 
                                value="Barbados">Barbados</option>
                                    <option 
                                value="Belarus">Belarus</option>
                                    <option 
                                value="B&eacute;lgica">B&eacute;lgica</option>
                                    <option 
                                value="Belize">Belize</option>
                                    <option 
                                value="Benin">Benin</option>
                                    <option 
                                value="Bermudas - Reino Unido">Bermudas - Reino 
                                      Unido</option>
                                    <option 
                                value="Bioko - Guin&eacute; Equatorial">Bioko - Guin&eacute; 
                                      Equatorial</option>
                                    <option 
                                value="Bol&iacute;via">Bol&iacute;via</option>
                                    <option 
                                value="B&oacute;snia-Herzeg&oacute;vina">B&oacute;snia-Herzeg&oacute;vina</option>
                                    <option value="Botsuana">Botsuana</option>
                                    <option 
                                value="Brunei">Brunei</option>
                                    <option 
                                value="Bulg&aacute;ria">Bulg&aacute;ria</option>
                                    <option 
                                value="Burkina Fasso">Burkina Fasso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option 
                                value="But&atilde;o">But&atilde;o</option>
                                    <option 
                                value="Cabo Verde">Cabo Verde</option>
                                    <option 
                                value="Camar&otilde;es">Camar&otilde;es</option>
                                    <option 
                                value="Camboja">Camboja</option>
                                    <option 
                                value="Canad&aacute;">Canad&aacute;</option>
                                    <option 
                                value="Cazaquist&atilde;o">Cazaquist&atilde;o</option>
                                    <option 
                                value="Ceuta -  ???
?A?&ordm;?Espanha">Ceuta 
                                      - Espanha</option>
                                    <option 
                                value="Chade">Chade</option>
                                    <option 
                                value="Chile">Chile</option>
                                    <option 
                                value="China">China</option>
                                    <option 
                                value="Chipre">Chipre</option>
                                    <option 
                                value="Cidade do Vaticano">Cidade do 
                                      Vaticano</option>
                                    <option 
                                value="Cingapura">Cingapura</option>
                                    <option 
                                value="Col&ocirc;mbia">Col&ocirc;mbia</option>
                                    <option 
                                value="Congo">Congo</option>
                                    <option 
                                value="Cor&eacute;ia do Norte">Cor&eacute;ia do Norte</option>
                                    <option value="Cor&eacute;ia do Sul">Cor&eacute;ia do 
                                      Sul</option>
                                    <option 
                                value="C&oacute;rsega - Fran&ccedil;a">C&oacute;rsega - 
                                      Fran&ccedil;a</option>
                                    <option 
                                value="Costa do Marfim">Costa do Marfim</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Creta - Gr&eacute;cia">Creta - 
                                      Gr&eacute;cia</option>
                                    <option 
                                value="Cro&aacute;cia">Cro&aacute;cia</option>
                                    <option 
                                value="Cuba">Cuba</option>
                                    <option 
                                value="Cura&ccedil;ao - Holanda">Cura&ccedil;ao - 
                                      Holanda</option>
                                    <option 
                                value="Dinamarca">Dinamarca</option>
                                    <option 
                                value="Djibuti">Djibuti</option>
                                    <option 
                                value="Dominica">Dominica</option>
                                    <option 
                                value="Egito">Egito</option>
                                    <option 
                                value="El Salvador">El Salvador</option>
                                    <option 
                                value="Emirado &Aacute;rabes Unidos">Emirado &Aacute;rabes 
                                      Unidos</option>
                                    <option 
                                value="Equador">Equador</option>
                                    <option 
                                value="Eritr&eacute;ia">Eritr&eacute;ia</option>
                                    <option 
                                value="Eslov&aacute;quia">Eslov&aacute;quia</option>
                                    <option 
                                value="Eslov&ecirc;nia">Eslov&ecirc;nia</option>
                                    <option 
                                value="Espanha">Espanha</option>
                                    <option 
                                value="Estados Unidos">Estados Unidos</option>
                                    <option value="Est&ocirc;nia">Est&ocirc;nia</option>
                                    <option 
                                value="Eti&oacute;pia">Eti&oacute;pia</option>
                                    <option 
                                value="Fiji">Fiji</option>
                                    <option 
                                value="Filipinas">Filipinas</option>
                                    <option 
                                value="Finl&acirc;ndia">Finl&acirc;ndia</option>
                                    <option 
                                value="Fran&ccedil;a">Fran&ccedil;a</option>
                                    <option 
                                value="Gab&atilde;o">Gab&atilde;o</option>
                                    <option 
                                value="G&acirc;mbia">G&acirc;mbia</option>
                                    <option 
                                value="Gana">Gana</option>
                                    <option 
                                value="Ge&oacute;rgia">Ge&oacute;rgia</option>
                                    <option 
                                value="Gibraltar - Reino Unido">Gibraltar - 
                                      Reino Unido</option>
                                    <option 
                                value="Granada">Granada</option>
                                    <option 
                                value="Gr&eacute;cia">Gr&eacute;cia</option>
                                    <option 
                                value="Groenl&acirc;ndia - Dinamarca">Groenl&acirc;ndia - 
                                      Dinamarca</option>
                                    <option 
                                value="Guadalupe - Fran&ccedil;a">Guadalupe - 
                                      Fran&ccedil;a</option>
                                    <option 
                                ?a??ue="Guam - Estados Unidos" ??? val="val">Guam - 
                                      Estados Unidos</option>
                                    <option 
                                value="Guatemala">Guatemala</option>
                                    <option 
                                value="Guiana">Guiana</option>
                                    <option 
                                value="Guiana Francesa">Guiana Francesa</option>
                                    <option value="Guin&eacute;">Guin&eacute;</option>
                                    <option 
                                value="Guin&eacute; Equatorial">Guin&eacute; 
                                      Equatorial</option>
                                    <option 
                                value="Guin&eacute;-Bissau">Guin&eacute;-Bissau</option>
                                    <option 
                                value="Haiti">Haiti</option>
                                    <option 
                                value="Holanda">Holanda</option>
                                    <option 
                                value="Honduras">Honduras</option>
                                    <option 
                                value="Hong Kong">Hong Kong</option>
                                    <option 
                                value="Hungria">Hungria</option>
                                    <option 
                                value="I&ecirc;men">I&ecirc;men</option>
                                    <option 
                                value="IIhas Virgens - Estados Unidos">IIhas 
                                      Virgens - Estados Unidos</option>
                                    <option 
                                value="Ilha de Man - Reino Unido">Ilha de Man - 
                                      Reino Unido</option>
                                    <option 
                                value="Ilha Natal - Austr&aacute;lia">Ilha Natal - 
                                      Austr&aacute;lia</option>
                                    <option 
                                value="Ilha Norfolk - Austr&aacute;lia">Ilha Norfolk - 
                                      Austr&aacute;lia</option>
                                    <option 
                                value="Ilha Pitcairn - Reino Unido">Ilha 
                                      Pitcairn - Reino Unido</option>
                                    <option 
                                value="Ilha Wrangel - R&uacute;ssia">Ilha Wrangel - 
                                      R&uacute;ssia</option>
                                    <option 
                                value="Ilhas Aleutas - Estados Unidos">Ilhas 
                                      Aleutas - Estados Unidos</option>
                                    <option 
                                value="Ilhas Can&aacute;rias - Espanha">Ilhas Can&aacute;rias 
                                      - Espanha</option>
                                    <option 
                                value="Ilhas Cayman - Reino Unido">Ilhas Cayman 
                                      - Reino Unido</option>
                                    <option 
                                value="Ilhas Comores">Ilhas Comores</option>
                                    <option value="Ilhas Cook - Nova Zel&acirc;ndia">Ilhas 
                                      Cook - Nova Zel&acirc;ndia</option>
                                    <option 
                                value="Ilhas do Canal - Reino Unido">Ilhas do 
                                      Canal - Reino Unido</option>
                                    <option 
                                value="Ilhas Salom&atilde;o">Ilhas Salom&atilde;o</option>
                                    <option value="Ilhas Seychelles">Ilhas 
                                      Seychelles</option>
                                    <option 
                                value="Ilhas Tokelau - Nova Zel&acirc;ndia">Ilhas 
                                      Tokelau - Nova Zel&acirc;ndia</option>
                                    <option 
                                value="Ilhas Turks e Caicos - Reino Unido">Ilhas 
                                      Turks e Caicos - Reino Unido</option>
                                    <option 
                                value="Ilhas Virgens - Reino Unido">Ilhas 
                                      Virgens - Reino Unido</option>
                                    <option 
                                value="Ilhas Wallis e Futuna - Fran&ccedil;a">Ilhas 
                                      Wallis e Futuna - Fran&ccedil;a</option>
                                    <option 
                                value="Ilhsa Cocos - Austr&aacute;lia">Ilhsa Cocos - 
                                      Austr&aacute;lia</option>
                                    <option 
                                value="&Iacute;ndia">&Iacute;ndia</option>
                                    &lt; ??? ?A?&ordm;?option 
                                value="Indon&eacute;sia"&gt;Indon&eacute;sia 
                                              
                                              
                                    <option 
                                value="Ir&atilde;">Ir&atilde;</option>
                                    <option 
                                value="Iraque">Iraque</option>
                                    <option 
                                value="Irlanda">Irlanda</option>
                                    <option 
                                value="Isl&acirc;ndia">Isl&acirc;ndia</option>
                                    <option 
                                value="Israel">Israel</option>
                                    <option 
                                value="It&aacute;lia">It&aacute;lia</option>
                                    <option 
                                value="Iugosl&aacute;via">Iugosl&aacute;via</option>
                                    <option 
                                value="Jamaica">Jamaica</option>
                                    <option 
                                value="Jan Mayen - Noruega">Jan Mayen - 
                                      Noruega</option>
                                    <option 
                                value="Jap&atilde;o">Jap&atilde;o</option>
                                    <option 
                                value="Jord&acirc;nia">Jord&acirc;nia</option>
                                    <option 
                                value="Kiribati">Kiribati</option>
                                    <option 
                                value="Kuait">Kuait</option>
                                    <option 
                                value="Laos">Laos</option>
                                    <option 
                                value="Lesoto">Lesoto</option>
                                    <option 
                                value="Let&ocirc;nia">Let&ocirc;nia</option>
                                    <option 
                                value="L&iacute;bano">L&iacute;bano</option>
                                    <option 
                                value="Lib&eacute;ria">Lib&eacute;ria</option>
                                    <option 
                                value="L&iacute;bia">L&iacute;bia</option>
                                    <option 
                                value="Liechtenstein">Liechtenstein</option>
                                    <option value="Litu&acirc;nia">Litu&acirc;nia</option>
                                    <option 
                                value="Luxemburgo">Luxemburgo</option>
                                    <option 
                                value="Macau - Portugal">Macau - 
                                      Portugal</option>
                                    <option 
                                value="Maced&ocirc;nia">Maced&ocirc;nia</option>
                                    <option 
                                value="Madagascar">Madagascar</option>
                                    <option 
                                value="Madeira - Portugal">Madeira - 
                                      Portugal</option>
                                    <option 
                                value="Mal&aacute;sia">Mal&aacute;sia</option>
                                    <option 
                                value="Malaui">Malaui</option>
                                    <option 
                                value="Maldivas">Maldivas</option>
                                    <option 
                                value="Mali">Mali</option>
                                    <option 
                                value="Malta">Malta</option>
                                    <option 
                                value="Marrocos">Marrocos</option>
                                    <option 
                                value="Martinica - Fran&ccedil;a">Martinica - 
                                      Fran&ccedil;a</option>
                                    <option 
                                value="Maur&iacute;cio - Reino Unido">Maur&iacute;cio - Reino 
                                      Unido</option>
                                    <option 
                                value="Maurit&acirc;nia">Maurit&acirc;nia</option>
                                    <option 
                                value="M&eacute;xico">M&eacute;xico</option>
                                    <option 
                                value="Micron&eacute;sia">Micron&eacute;sia</option>
                                    <option 
                                value="Mo&ccedil;ambique">Mo&ccedil;ambique</option>
                                    <option 
                                value="Moldova">Moldova</option>
                                    <option 
                                value="M&ocirc;naco">M&ocirc;naco</option>
                                    <option 
                                value="Mong&oacute;lia">Mong&oacute;lia</option>
                                    <option 
                                value="MontSerrat - Reino Unido">MontSerrat - 
                                      Reino Unido</option>
                                    <option 
                                value="Myanma">Myanma</option>
                                    <option 
                                value="Nam&iacute;bia">Nam&iacute;bia</option>
                                    <option 
                                value="Nauru">Nauru</option>
                                    <option 
                                value="Nepal">Nepal</option>
                                    <option ??? 
                                ?a??alue="Nicar&aacute;gua" v="v">Nicar&aacute;gua</option>
                                    <option value="N&iacute;ger">N&iacute;ger</option>
                                    <option 
                                value="Nig&eacute;ria">Nig&eacute;ria</option>
                                    <option 
                                value="Niue">Niue</option>
                                    <option 
                                value="Noruega">Noruega</option>
                                    <option 
                                value="Nova Bretanha - Papua-Nova Guin&eacute;">Nova 
                                      Bretanha - Papua-Nova Guin&eacute;</option>
                                    <option 
                                value="Nova Caled&ocirc;nia - Fran&ccedil;a">Nova Caled&ocirc;nia - 
                                      Fran&ccedil;a</option>
                                    <option 
                                value="Nova Zel&acirc;ndia">Nova Zel&acirc;ndia</option>
                                    <option value="Om&atilde;">Om&atilde;</option>
                                    <option 
                                value="Palau - Estados Unidos">Palau - Estados 
                                      Unidos</option>
                                    <option 
                                value="Palestina">Palestina</option>
                                    <option 
                                value="Panam&aacute;">Panam&aacute;</option>
                                    <option 
                                value="Papua-Nova Guin&eacute;">Papua-Nova 
                                      Guin&eacute;</option>
                                    <option 
                                value="Paquist&atilde;o">Paquist&atilde;o</option>
                                    <option 
                                value="Paraguai">Paraguai</option>
                                    <option 
                                value="Peru">Peru</option>
                                    <option 
                                value="Polin&eacute;sia Francesa">Polin&eacute;sia 
                                      Francesa</option>
                                    <option 
                                value="Pol&ocirc;nia">Pol&ocirc;nia</option>
                                    <option 
                                value="Porto Rico">Porto Rico</option>
                                    <option 
                                value="Portugal">Portugal</option>
                                    <option 
                                value="Qatar">Qatar</option>
                                    <option 
                                value="Qu&ecirc;nia">Qu&ecirc;nia</option>
                                    <option 
                                value="Quirguist&atilde;o">Quirguist&atilde;o</option>
                                    <option 
                                value="Reino Unido">Reino Unido</option>
                                    <option 
                                value="Rep&uacute;blica Centro-Africana">Rep&uacute;blica 
                                      Centro-Africana</option>
                                    <option 
                                value="Rep&uacute;blica Dominicana">Rep&uacute;blica 
                                      Dominicana</option>
                                    <option 
                                value="Rep&uacute;blica Tcheca">Rep&uacute;blica 
                                      Tcheca</option>
                                    <option 
                                value="Rom&ecirc;nia">Rom&ecirc;nia</option>
                                    <option 
                                value="Ruanda">Ruanda</option>
                                    <option 
                                value="R&uacute;ssia">R&uacute;ssia</option>
                                    <option 
                                value="Samoa Ocidental">Samoa Ocidental</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Santa Helena - Reino Unido">Santa 
                                      Helena - Reino Unido</option>
                                    <option 
                                value="Santa L&uacute;cia">Santa L&uacute;cia</option>
                                    <option 
                                value="S&atilde;o Cristov&atilde;o e N&eacute;vis">S&atilde;o Cristov&atilde;o e 
                                      N&eacute;vis</option>
                                    <option 
                                value="S&atilde;o Tom&eacute; e Pr&iacute;ncipe">S&atilde;o Tom&eacute; e 
                                      Pr&iacute;ncipe</option>
                                    <option 
                                value="S&atilde;o Vicente e Granadinas">S&atilde;o Vicente e 
                                      Granadinas</option>
                                    <option 
                                value="Sardenha - It&aacute;lia">Sardenha - 
                                      It&aacute;lia</option>
                                    <option 
                                value="Senegal">Senegal</option>
                                    <option 
                                value="Serra Leoa">Serra Leoa</option>
                                    <option 
                                value="S&iacute;ria">S&iacute;ria</option>
                                    <option 
                                value="Som&aacute;lia">Som&aacute;lia</option>
                                    <option 
                                value="Sri Lanka">Sri Lanka</option>
                                    <option 
                                value="Suazil&acirc;ndia">Suazil&acirc;ndia</option>
                                    <option 
                                value="Sud&atilde;o">Sud&atilde;o</option>
                                    <option 
                                value="Su&eacute;cia">Su&eacute;cia</option>
                                    <option 
                                value="Su&iacute;&ccedil;a">Su&iacute;&ccedil;a</option>
                                    <option 
                                value="Suriname">Suriname</option>
                                    <option 
                                value="Tadjiquist&atilde;o">Tadjiquist&atilde;o</option>
                                    <option 
                                value="Tail&acirc;ndia">Tail&acirc;ndia</option>
                                    <option 
                                value="Taiti">Taiti</option>
                                    <option 
                                value="Taiwan">Taiwan</option>
                                    <option 
                                value="Tanz&acirc;nia">Tanz&acirc;nia</option>
                                    <option 
                                value="Terra de Francisco Jos&eacute; - R&uacute;ssia">Terra 
                                      de Francisco Jos&eacute; - R&uacute;ssia</option>
                                    <option 
                                value="Togo">Togo</option>
                                    <option 
                                value="Tonga">Tonga</option>
                                    <option 
                                value="Trinidad e Tobago">Trinidad e 
                                      Tobago</option>
                                    <option 
                                value="Trist&atilde;o da Cunha - Reino Unido">Trist&atilde;o 
                                      da Cunha - Reino Unido</option>
                                    <option 
                                value="Tun&iacute;sia">Tun&iacute;sia</option>
                                    <option 
                                value="Turcomenist&atilde;o">Turcomenist&atilde;o</option>
                                    <option value="Turquia">Turquia</option>
                                    <option 
                                value="Tuvalu">Tuvalu</option>
                                    <option 
                                value="Ucr&acirc;nia">Ucr&acirc;nia</option>
                                    <option 
                                value="Uganda">Uganda</option>
                                    <option 
                                value="Uruguai">Uruguai</option>
                                    <option 
                                value="Uzbequist&atilde;o">Uzbequist&atilde;o</option>
                                    <option 
                                value="Vanuatu">Vanuatu</option>
                                    <option 
                                value="Venezuela">Venezuela</option>
                                    <option 
                                value="Vietn&atilde;">Vietn&atilde;</option>
                                    <option 
                                value="Zaire">Zaire</option>
                                    <option 
                                value="Z&acirc;mbia">Z&acirc;mbia</option>
                                    <option 
                                value="Zimb&aacute;bue">Zimb&aacute;bue</option>
                                  </select>
                                </font></td>
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
