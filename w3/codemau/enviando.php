<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<LINK REL="StyleSheet" HREF="themes/Helius/style/style.css" TYPE="text/css">
<title>Untitled Document</title>
</head>

<body>
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
    <form method="post" name="cadastro" action="enviandoc.php" enctype="multipart/form-data" onSubmit="return validar(this)"><table align=center width=100% border=0>
                                      <tbody>
                                        <tr>
                                          <td width=68%><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000 size=1>Nome Completo:</font></td>
                                        </tr>
                                        <tr>
                                          <td><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000 size=1>
                                            <input class=texto size=60 name=nome />&nbsp;*
                                          </font></td>
                                        </tr>

                                        <tr>
                                          <td><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000 size=1>Inserir Anexo:</font></td>
                                        </tr>
                                        <tr>
                                          <td><label>
                                            <input type=file name=file[] class=texto />
                                          </label></td>
                                        </tr>
                                        <tr>
                                          <td><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000 size=1>Cidade:</font></td>
                                        </tr>
                                        <tr>
                                          <td><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#ffffff size=1><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000 size=1>
                                          <input class=texto size=36 name=cidade />
                                          </font><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#ffffff size=1><font color=#000000>
                                          <select class=texto2 
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
                                          </td>
                                        </tr>
                                                                                <tr>
                                          <td><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000 size=1>Telefone:</font></td>
                                        </tr>
                                        <tr>
                                          <td><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000 size=1>
                                            <input class=texto size=32 name=telefone />
                                          </font></td>
                                        </tr>
 <tr>
                                          <td><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000 size=1>E-mail:</font></td>
                                        </tr>
                                        <tr>
                                          <td><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000 size=1>
                                            <input class=texto size=40 name=email2 />&nbsp;*
                                          </font></td>
                                        </tr>

<tr>
                                          <td><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000 size=1>Destinatário:</font></td>
                                        </tr>
                                        <tr>
                                          <td><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000 size=1>
                                           <select class=texto2 
                              name=destinatario>
                            <option value='codemau@codemau.org.br'>codemau@codemau.org.br</option>
                                                    </select>
                                          </font></td>
                                        </tr>


<tr>
                                          <td><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000 size=1>Assunto:</font></td>
                                        </tr>
                                        <tr>
                                          <td><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000 size=1>
                                            <input class=texto size=70 name=assunto />&nbsp;*
                                          </font></td>
                                        </tr>

                                        <tr>
                                          <td><font size=1>MENSAGEM / SUGEST&Otilde;ES<font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000>:</font></font></td>
                                        </tr>
                                        <tr>
                                          <td><font color=#000000><b><b><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              size=1>
                                            <textarea class=texto name=mensagem rows=12 cols=80></textarea>
                                          </font></b></b></font><font 
                              face=Verdana, Arial, Helvetica, sans-serif 
                              color=#000000 size=1>&nbsp; </font></td>
                                        </tr>
                                        <tr>
                                          <td><table width=71% border=0>
                                          </table></td>
                                        </tr>
                                      </tbody>
                                    </table><P><INPUT TYPE="submit" NAME="submit" VALUE="Enviar Formul�rio"></p></FORM>
	


</body>
</html>
