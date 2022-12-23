<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<SCRIPT src="home_arquivos/jquery-1.3.2.min.js" type=text/javascript></SCRIPT>
<META http-equiv=X-UA-Compatible content=IE=7>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="classes/estilos.css">
<META 
content="Descrição" 
name=description>
<META 
content="Palavras, Chave" 
name=keywords>
<title>Folha do Noroeste</title>
</head>

<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1" bgcolor="#CCCCCC"><img src="imagens/branco.gif" width="1" height="1" /></td>
    <td width="978" bgcolor="#FFFFFF">
   
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("cabecalho(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("busca(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("login(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("menu(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>

<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>  
  
  

<table width="100%" align="center" background="btabela2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="280" valign="top">
     <?php include("esquerdo(1).php"); ?> </td>
    <td width="700" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>
         <table width="100%" border="0" height="30" cellspacing="0" cellpadding="0">
           <tr>
             <td align="left" bgcolor="#E71C24" class="fontemaior">&nbsp;&nbsp;<strong>Contatos</strong></td>
           </tr>
         </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="78%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="legenda"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="100%" border="0" align="center">
        <tr>
          <td border="0"><script language=javascript>
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
                 </SCRIPT>
            <FORM action="enviac.php" method="post" enctype="multipart/form-data" name="cadastro" onSubmit="return validar(this)">
              <table width="100%" border="0" align="center">
                <tr>
                  <td><table width="100%" border="0">
                    <tr>
                      <td width="6%"><img src="imagens/telephone.png"></td>
                      <td width="94%" class="fontebaixo2">Telefone: (0xx55) 3744 - 7080</td>
                    </tr>
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="4"></td>
                      <td><img src="imagens/branco.gif" width="1" height="4"></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td width="50%"><table width="100%" border="0">
                    <tr>
                      <td class="fontebaixo2">Preencha o formul&aacute;rio abaixo para entrar em contato conosco:</td>
                      <td class="fontebaixo2"><div align="right">* Campos Obrigat&oacute;rios</div></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td><table width="100%" align="left" border="0">
                    <tbody>
                      <tr>
                        <td width="68%" class="fontebaixo2">Nome Completo:</td>
                      </tr>
                      <tr>
                        <td><input class="fontebaixo2" size="60" name="nome" />
                          * </td>
                      </tr>
                      <tr>
                        <td class="fontebaixo2">Cidade:</td>
                      </tr>
                      <tr>
                        <td><input class="fontebaixo2" size="36" name="cidade" />
                          <select class="fontebaixo2" 
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
                          </select></td>
                      </tr>
                      <tr>
                        <td class="fontebaixo2">Telefone:</td>
                      </tr>
                      <tr>
                        <td><input name="telefone" class="fontebaixo2" onKeyPress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');" size="14" maxlength="14"  />
                          * </td>
                      </tr>
                      <tr>
                        <td class="fontebaixo2">E-mail:</td>
                      </tr>
                      <tr>
                        <td><input class="fontebaixo2" size="40" name="email2" />
                          * </td>
                      </tr>
                      <tr>
                        <td class="fontebaixo2">Mensagem / Sugest&otilde;es</td>
                      </tr>
                      <tr>
                        <td><textarea class="fontebaixo2" name="mensagem" rows="12" cols="80"></textarea></td>
                      </tr>
                      <tr>
                        <td><input class="fontebaixo2" type="submit" value="ENVIAR DADOS" name="submit" /></td>
                      </tr>
                    </tbody>
                  </table></td>
                </tr>
              </table>
            </form></td>
        </tr>
      </table></td>
                  </tr>
                </table></td>
                </tr>
          </table></td>
        </tr>
</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="4" /></td>
              </tr>
          </table></td>
    
  </tr>
</table>

<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table> 
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("baixo(1).php"); ?></td>
  </tr>
</table>

    
    
    </td>
    <td width="1" bgcolor="#CCCCCC"><img src="imagens/branco.gif" width="1" height="1" /></td>
  </tr>
</table>
</body>
</html>