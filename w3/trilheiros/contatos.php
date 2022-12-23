<?php include("cabecalho.php"); ?>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<style type="text/css">
<!--
.style24 {font-size: 10px; color: #FFFFFF}
.style25 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style26 {color: #FFFFFF}
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>

<TABLE cellSpacing=0 cellPadding=0 width=778 align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/esquerdao.gif>&nbsp;</TD>
    <TD width=756 bgColor=#000000>
      <TABLE cellSpacing=0 cellPadding=0 width=756 border=0>
        <TBODY>
        <TR>
          <TD style="BACKGROUND-REPEAT: repeat-x" vAlign=center align=middle 
          background="#282828" height=19>
            <TABLE cellSpacing=0 cellPadding=0 width=756 align=left border=0>
              <TBODY>
              <TR>
                <TD>
                  <TABLE width=756 
                  border=0 align=center cellPadding=0 cellSpacing=0 bgcolor="#282828">
                    <TBODY>
                    <TR>
                      <TD vAlign=top align=left><table width="98%" border="0" align="center">
                     
                    <tr>
                      <td><div align="center"><img src="home_arquivos/fale.jpg" width="200" height="30" /></div></td>
                    </tr>
                    <tr>
                          <td><script language=javascript>
function validar(cadastro) { 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome não está preenchido!")
cadastro.nome.focus();
return false
}

if (document.cadastro.email2.value=="") {
alert("O Campo E-mail não está preenchido!")
cadastro.email2.focus();
return false
}

if (document.cadastro.assunto.value=="") {
alert("O Campo Assunto não está preenchido!")
cadastro.assunto.focus();
return false
}

		return true;

}


</SCRIPT>
    <form action="enviandoc.php" method="post" enctype="multipart/form-data" name="cadastro" class="style24 style25 style26" onSubmit="return validar(this)"><table align=center width=100% border=0>
                                      <tbody>
                                        <tr>
                                          <td class="style24">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td class="style24"><div align="center">Preencha o formul&aacute;rio abaixo para entrar em contato conosco:</div></td>
                                        </tr>
                                        <tr>
                                          <td class="style24">&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td width=68% class="style24"><font Arial, Helvetica, sans-serif>Nome Completo:</font></td>
                                        </tr>
                                        <tr>
                                          <td class="style24"><font Arial, Helvetica, sans-serif>
                                            <input class="caixacontato" size=60 name=nome />
&nbsp;* </font></td>
                                        </tr>

                                        <tr>
                                          <td class="style24"><font Arial, Helvetica, sans-serif>Inserir Anexo:</font></td>
                                        </tr>
                                        <tr>
                                          <td class="style24"><label>
                                            <input type=file name=file[] class="caixacontato" />
                                          </label></td>
                                        </tr>
                                        <tr>
                                          <td class="style24"><font Arial, Helvetica, sans-serif>Cidade:</font></td>
                                        </tr>
                                        <tr>
                                          <td class="style24"><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#ffffff size=1><font Arial, Helvetica, sans-serif>
                                          <input class="caixacontato" size=36 name=cidade />
                                          </font><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#ffffff size=1><font color=#000000>
                                          <select class="caixacontato" 
                              name=estado>
                            <option value='RS - Rio Grande do Sul' selected=selected>RS - Rio Grande do Sul</option>
                            <option 
                                value='AC - Acre'>AC - Acre</option>
                            <option value='AL - Alagoas'>AL - Alagoas</option>
                            <option 
                                value='AM - Amazonas'>AM - Amazonas</option>
                            <option value='AP - Amap&aacute;'>AP - Amap&aacute;</option>
                            <option 
                                value='BA - Bahia'>BA - Bahia</option>
                            <option value='CE - Cear&aacute;'>CE - Cear&aacute;</option>
                            <option 
                                value='DF - Distrito Federal'>DF - Distrito Federal</option>
                            <option value='ES - Esp&iacute;rito Santo'>ES - Esp&iacute;rito Santo</option>
                            <option 
                                value='GO - Goi&aacute;s'>GO - Goi&aacute;s</option>
                            <option value='MA - Maranh&atilde;o'>MA - Maranh&atilde;o</option>
                            <option 
                                value='MG - Minas Gerais'>MG - Minas Gerais</option>
                            <option value='MS - Mato Grosso do Sul'>MS - Mato Grosso do Sul</option>
                            <option 
                                value='MT - Mato Grosso'>MT - Mato Grosso</option>
                            <option value='PA - Par&aacute;'>PA - Par&aacute;</option>
                            <option 
                                value='PB - Para&iacute;ba'>PB - Para&iacute;ba</option>
                            <option value='PE - Pernambuco'>PE - Pernambuco</option>
                            <option 
                                value='PI - Piau&iacute;'>PI - Piau&iacute;</option>
                            <option value='PR - Paran&aacute;'>PR - Paran&aacute;</option>
                            <option 
                                value='RJ - Rio de Janeiro'>RJ - Rio de Janeiro</option>
                            <option value='RN - Rio Grande do Norte'>RN - Rio Grande do Norte</option>
                            <option 
                                value='RO - Roraima'>RO - Roraima</option>
                            <option value='RR - Roraima'>RR - Roraima</option>
                            <option value='SC - Santa Catarina'>SC - Santa Catarina</option>
                            <option 
                                value='SE - Sergipe'>SE - Sergipe</option>
                            <option value='SP - S&atilde;o Paulo'>SP - S&atilde;o Paulo</option>
                            <option 
                                value='TO - Tocantins'>TO - Tocantins</option>
                          </select>                                          </td>
                                        </tr>
                                                                                <tr>
                                          <td class="style24"><font Arial, Helvetica, sans-serif>Telefone:</font></td>
                                        </tr>
                                        <tr>
                                          <td class="style24"><font Arial, Helvetica, sans-serif>
                                            <input class="caixacontato" size=32 name=telefone />
                                          </font></td>
                                        </tr>
 <tr>
                                          <td class="style24"><font Arial, Helvetica, sans-serif>E-mail:</font></td>
                                        </tr>
                                        <tr>
                                          <td class="style24"><font Arial, Helvetica, sans-serif>
                                            <input class="caixacontato" size=40 name=email2 />
&nbsp;* </font></td>
                                        </tr>


<tr>
                                          <td class="style24"><font Arial, Helvetica, sans-serif>Assunto:</font></td>
                                        </tr>
                                        <tr>
                                          <td class="style24"><font Arial, Helvetica, sans-serif>
                                            <input class="caixacontato" size=70 name=assunto />
&nbsp;* </font></td>
                                        </tr>

                                        <tr>
                                          <td class="style24">Mensagem / Sugest&otilde;es<font Arial, Helvetica, sans-serif>:</font></td>
                                        </tr>
                                        <tr>
                                          <td class="style24"><b><b><font arial, helvetica, sans-serif>
                                            <textarea class="caixacadastroarea" name=mensagem rows=12 cols=80></textarea>
                                          </font></b></b></td>
                                        </tr>
                                        <tr>
                                          <td class="style24"><span class="style15">
                                            <input type="submit" class="texto" value="Enviar Formulário" />
&nbsp;&nbsp;
<input class="texto" type="reset" value="Limpar" />
                                          </span></td>
                                        </tr>
                                       </tbody>
                                    </table>
    </FORM></td>
                    </tr>
                       
                      </table></TD>
                    </TR></TBODY></TABLE></TD></TR>
              </TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
    <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD></TR></TBODY></TABLE>
<?php include("patrocinio.php"); ?>
<?php include("baixo.php"); ?>
</BODY></HTML>
