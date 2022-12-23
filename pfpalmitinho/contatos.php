<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>LJ - Assessoria &amp; Consultoria</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META content="Lima" name=description>
<META content="palavras, chave" name=keywords>
<META content=General name=rating>
<META content=index,follow name=robots>
<LINK href="home_arquivos/site.css" type=text/css rel=stylesheet>
<LINK href="favicon.ico" type=image/x-icon rel="shortcut icon">
<META content="MSHTML 6.00.2900.3243" name=GENERATOR>
<style type="text/css">
<!--
body {
	background-image: url(home_arquivos/bg.jpg);
}
.style22 {color: #3c3c3c; font-size: 11px; }
.style24 {font-size: 10px; color: #FFFFFF}
.style25 {color: #333333}
.style26 {font-size: 10px}
.style27 {color: #3c3c3c; font-size: 10px; }
-->
</style>
</HEAD>
<BODY topmargin="0" leftmargin="0"><SCRIPT src="carregador.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash("cima.swf","780","151"); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT>
<table width="780" border="0">
  <tr>
    <td><font color="#f6f6f6"><script language="JavaScript" type="text/javascript">
var datahora,xhora,xdia,dia,mes,ano,txtsaudacao;
datahora = new Date();
xhora = datahora.getHours();
if (xhora >= 0 && xhora < 12) {txtsaudacao = "Bom Dia,"}
if (xhora >= 12 && xhora < 18) {txtsaudacao = "Boa Tarde,"}
if (xhora >= 18 && xhora <= 23) {txtsaudacao = "Boa Noite,"}
xdia = datahora.getDay();
diasemana = new Array(7);
diasemana[0] = "Domingo";
diasemana[1] = "Segunda Feira";
diasemana[2] = "Terça Feira";
diasemana[3] = "Quarta Feira";
diasemana[4] = "Quinta Feira";
diasemana[5] = "Sexta Feira";
diasemana[6] = "Sábado";
dia = datahora.getDate();
mes = datahora.getMonth();
mesdoano = new Array(12);
mesdoano[0] = "01";
mesdoano[1] = "02";
mesdoano[2] = "03";
mesdoano[3] = "04";
mesdoano[4] = "05";
mesdoano[5] = "06";
mesdoano[6] = "07";
mesdoano[7] = "08";
mesdoano[8] = "09";
mesdoano[9] = "10";
mesdoano[10] = "11";
mesdoano[11] = "12";
ano = datahora.getFullYear();
document.write(txtsaudacao + " Frederico Westphalen/RS, " + diasemana[xdia] + ", " + dia + "/" + mesdoano[mes] + "/" + ano);
</script></font></td>
  </tr>
</table>
<table width="780" border="0">
  <tr>
    <td width="17" bgcolor="#FFFFFF"><?php include("direito.php"); ?></td>
    <td width="753" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0">
      <tr>
        <td><div align="center"><img src="fale.jpg" width="600" height="16"></div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
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
    <form action="enviandoc.php" method="post" enctype="multipart/form-data" name="cadastro" class="style24 style25 style26" onSubmit="return validar(this)"><TABLE width=600 border=0 align="center" 
                              cellPadding=0 cellSpacing=0 class=texto_1_10px>
          <TBODY>
            <TR>
              <TD class=link3 vAlign=top><p align="center" class="style25">FORMUL&Aacute;RIO DE CONTATO</p>
                  <p align="center" class="style25">Preencha o formul&aacute;rio abaixo para entrar em contato conosco:</p>
                <table width="80%" border="0" align="center">
                    <tr>
                      <td><span class="style22">Setor:</span></td>
                      <td><span class="style24">
                        <select class="texto" 
                              name=estado2>
                          <option value="Informa&ccedil;&atilde;o Produtos e Servi&ccedil;os">Informa&ccedil;&atilde;o Produtos e Servi&ccedil;os</option>
                          <option value="Administra&ccedil;&atilde;o">Administra&ccedil;&atilde;o</option>
                          <option value="Cursos e Treinamento">Cursos e Treinamento</option>
                          <option value="Or&ccedil;amentos">Or&ccedil;amentos</option>
                                                </select>
                      </span></td>
                    </tr>
                    <tr>
                      <td><span class="style22">Nome:</span></td>
                      <td><font color="#000000" size=2 
            face="Verdana, Arial, Helvetica, sans-serif">
                        <input name="nome" class="texto" size=56 maxlength=50>
                      </font></td>
                    </tr>
                    <tr>
                      <td><span class="style22">Cidade:</span></td>
                      <td><font color="#000000" size=2 
            face="Verdana, Arial, Helvetica, sans-serif">
                        <input name="cidade" class="texto" size=40 maxlength=50>
                      </font></td>
                    </tr>
                    <tr>
                      <td><span class="style22">Estado:</span></td>
                      <td><span class="style24">
                        <select class="texto" 
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
                        </select>
                      </span></td>
                    </tr>
                    <tr>
                      <td><span class="style22">CEP:</span></td>
                      <td><font color="#000000" size=2 
            face="Verdana, Arial, Helvetica, sans-serif">
                        <input name="cep" class="texto" size=30 maxlength=32>
                      </font></td>
                    </tr>
                    <tr>
                      <td><span class="style22">Telefone:</span></td>
                      <td><font color="#000000" size=2 
            face="Verdana, Arial, Helvetica, sans-serif">
                        <input name="telefone" class="texto" maxlength=32>
                      </font></td>
                    </tr>
                    <tr>
                      <td><span class="style22">Endere&ccedil;o:</span></td>
                      <td><font color="#000000" size=2 
            face="Verdana, Arial, Helvetica, sans-serif">
                        <input name="endereco" class="texto" size=50 maxlength=32>
                      </font></td>
                    </tr>
                    <tr>
                      <td><span class="style22">E-mail:</span></td>
                      <td><font color="#000000" 
            size=2 face="Verdana, Arial, Helvetica, sans-serif">
                        <input name="email" class="texto" size=30 maxlength=32>
                      </font></td>
                    </tr>
                  </table>
                <table width="80%" border="0" align="center">

                  <tr>
                    <td><span class="style22">Mensagem / Observa&ccedil;&atilde;o:</span></td>
                  </tr>
                  <tr>
                    <td><font color="#000000" size=2 face="Verdana, Arial, Helvetica, sans-serif">
                      <textarea name="mensagem2" cols=70 rows=10 class="texto"></textarea>
                    </font></td>
                  </tr>
                  <tr>
                    <td><font color="#000000">
                      <input name="Submit" type="Submit" class="texto" value="Enviar Formulário">
                    </font><font color="#000000">
                    <input name="Submit2" type="Reset" class="texto" value="Limpar Formul&aacute;rio">
                    </font></td>
                  </tr>
                </table>
               
                </TD>
            </TR>
            <TR>
              <TD class=link3 vAlign=top><TABLE class=texto_1_10px cellSpacing=0 
                                cellPadding=0 width="100%" border=0>
                  <TBODY>
                  </TBODY>
              </TABLE></TD>
            </TR>
          </TBODY>
        </TABLE></form></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div align="center"><img src="destque2.jpg" width="600" height="6"></div></td>
      </tr>
    </table>
  </td>
  </tr>
</table>
<?php include("baixo.php"); ?></BODY></HTML>
