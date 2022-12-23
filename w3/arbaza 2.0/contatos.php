<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE>Arbaza</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<SCRIPT src="home_arquivos/j.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/scripts.js" type=text/javascript></SCRIPT>
<LINK href="home_arquivos/estilo.css" type=text/css rel=stylesheet>
<LINK href="home_arquivos/menu.css" type=text/css rel=stylesheet>
<LINK href="home_arquivos/estilo_int.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2900.2180" name=GENERATOR>
<style type="text/css">
.style3 {font-family: Tahoma, Arial}
.style5 {
	font-family: Tahoma, Arial;
	font-size: 11px;
	color: #FFFFFF;
}
.style7 {font-family: Tahoma, Arial; font-size: 11px; color: #333333; }
.style10 {color: #333333}
#apDiv1 {
	position:absolute;
	width:146px;
	height:56px;
	z-index:3;
	left: 114px;
	top: 816px;
}
.style13 {font-size: 11px; font-family: Tahoma; }
.style15 {font-size: 12px}
.style19 {font-size: 12px; font-family: Tahoma, Arial;}
.style20 {font-family: Tahoma, Arial; font-size: 12px; color: #333333; }
.style21 {font-family: Tahoma; color: #333333; }
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style23 {
	color: #333333;
	font-size: 11px;
	font-family: Tahoma;
}
.style27 {font-family: Tahoma; color: #D81E05; font-size: 11px; }
.style24 {color: #FEDC01}
.style35 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #FFFFFF;
}
.style28 {	font-size: 10px;
	color: #FFFFFF;
}
.style29 {font-size: 10px}
.style30 {font-family: Verdana, Arial, Helvetica, sans-serif; color: #FFFFFF; }
.style31 {color: #FFCC33}
.style33 {color: #0099FF}
</style>
</HEAD>
<BODY>
<?php include("cima.php"); ?>
<script language=javascript>
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
<TABLE id=conteudo cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD id=col_esquerda>
      <?php include("menu.php"); ?></TD>
    <TD id=meio><table width="100%" border="0" align="center">
      <tr>
        <td><img src="blank.gif" width="1" height="4"></td>
      </tr>
      <tr>
        <td><table width="98%" border="0" align="center">
          <tr>
            <td width="2%"><img src="share.gif" width="16" height="16"></td>
            <td width="98%"><font size="3">Fale Conosco</font></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" align="center">
          <tr>
            <td><form action="enviandoc.php" method="post" enctype="multipart/form-data" name="cadastro" onSubmit="return validar(this)"><table align=center width=100% border=0>
                <tbody>

                  <tr>
                    <td><table width="100%" border="0">
                      <tr>
                        <td width="76%"><div align="left">Preencha o formul&aacute;rio abaixo para entrar em contato conosco: </div></td>
                        <td width="24%">&nbsp;<font size="3" color="#008000">*</font> Campos Obrigat&oacute;rios</td>
                      </tr>
                    </table></td>
                  </tr>

                  <tr>
                    <td width=68%>&nbsp;Nome Completo:</td>
                  </tr>
                  <tr>
                    <td>
                      &nbsp;<input class="menucaixa" size=60 name=nome />
                      &nbsp;<font size="3" color="#008000">*</font> </td>
                  </tr>
                  <tr>
                    <td>&nbsp;Inserir Anexo:</td>
                  </tr>
                  <tr>
                    <td class="style24"><label>
                      &nbsp;<input type=file name=file[] class="menucaixa" />
                    </label></td>
                  </tr>
                  <tr>
                    <td>&nbsp;Cidade:</td>
                  </tr>
                  <tr>
                    <td class="style24">
                      &nbsp;<input class="menucaixa" size=36 name=cidade />
                      
                      <select class="menucaixa" 
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
                      </select>                    </td>
                  </tr>
                  <tr>
                    <td>&nbsp;Telefone:</td>
                  </tr>
                  <tr>
                    <td class="style24"><font Arial, Helvetica, sans-serif>
                      &nbsp;<input class="menucaixa" size=32 name=telefone />
                    </font></td>
                  </tr>
                  <tr>
                    <td>&nbsp;E-mail:</td>
                  </tr>
                  <tr>
                    <td>
                     &nbsp;<input class="menucaixa" size=40 name=email2 />
                      &nbsp;<font size="3" color="#008000">*</font> </td>
                  </tr>
                  <tr>
                    <td>&nbsp;Assunto:</td>
                  </tr>
                  <tr>
                    <td>
                      &nbsp;<input class="menucaixa" size=70 name=assunto />
                      &nbsp;<font size="3" color="#008000">*</font> </td>
                  </tr>
                  <tr>
                    <td>&nbsp;Mensagem / Sugest&otilde;es</td>
                  </tr>
                  <tr>
                    <td>
                      &nbsp;<textarea class="menu_titulos_selected" name=mensagem rows=12 cols=80></textarea>                    </td>
                  </tr>
                  <tr>
                    <td class="style24"><span class="style15">
                      &nbsp;<input type="submit" class="texto" value="Enviar Formul&aacute;rio" />
                      &nbsp;&nbsp;
                      <input class="texto" type="reset" value="Limpar" />
                    </span></td>
                  </tr>
                </tbody>
            </table></form></td>
          </tr>
        </table></td>
      </tr>
    </table></TD>
  </TR></TBODY></TABLE>
<?php include("baixo.php"); ?>
</BODY></HTML>
