<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow" />
<?php include("meta.php"); ?>
<title>Jornal Frederiquense</title>
<link href="imagens/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="classes/import.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="geral"> 
<div class="topo"><?php include("cima.php"); ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr><td width="83%"><SCRIPT src="flash/carrega.js"></SCRIPT>
              <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','831','180'); 
    </SCRIPT></td><td width="17%" valign="bottom" align="right"><!-- Inicio Banner Tempo Agora - http://www.tempoagora.com.br -->
<iframe src="http://tempoagora.uol.com.br/selos/custom/selo_3dias.php?cid=FredericoWestphalen-RS,&height=155&cor=3aa564" name="tempoagora_custom_3dias" width="149" marginwidth="0" height="155" marginheight="0" scrolling="No" frameborder="0" id="tempoagora_custom_3dias"></iframe>
<!--Fim Banner Tempo Agora - http://www.tempoagora.com.br --></td>
      </tr>
    </table>
</div><hr class="dn">
<div class="corpo">
<?php include("menu.php"); ?>
            
<div class="coluna_direita">
<div class="caixa_conteudo" id=texto>
<div class="item_de_conteudo">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="82%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/barrafale.png" /></td>
        </tr>
        <tr>
          <td><table bgcolor="#f9f9f9" width="539" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td><br /><table width="99%" border="0" align="center">
                <tr>
                  <td class="titulonoticia"><strong>Para entrar em contato conosco, preencha o formulário abaixo:</strong></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
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
                <table width="98%" border="0" align="center">
                <tr>
                  <td><table width="100%" align="left" border="0">
                    <tbody>
                      <tr>
                        <td width="68%" class="fontegeral" align="left">Nome Completo:</td>
                      </tr>
                      <tr>
                        <td align="left"><span class="fontegeral">
                          <input class="texto" size="60" name="nome" />
                          * </span></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left"><span class="fontegeral">Cidade:</span></td>
                      </tr>
                      <tr>
                        <td align="left"><span class="fontegeral">
                          <input class="texto" size="36" name="cidade" />
                          <select class="texto" 
                              name="estado">
                            <option value='MS - Mato Grosso do Sul' selected="selected">MS - Mato Grosso do Sul</option>
                            <option 
                                value='AC - Acre'>AC - Acre</option>
                            <option value='AL - Alagoas'>AL - Alagoas</option>
                            <option 
                                value='AM - Amazonas'>AM - Amazonas</option>
                            <option value='AP - Amapá'>AP - Amap&aacute;</option>
                            <option 
                                value='BA - Bahia'>BA - Bahia</option>
                            <option value='CE - Ceará'>CE - Cear&aacute;</option>
                            <option 
                                value='DF - Distrito Federal'>DF - Distrito Federal</option>
                            <option value='ES - Espírito Santo'>ES - Esp&iacute;rito Santo</option>
                            <option 
                                value='GO - Goiás'>GO - Goi&aacute;s</option>
                            <option value='MA - Maranhão'>MA - Maranh&atilde;o</option>
                            <option 
                                value='MG - Minas Gerais'>MG - Minas Gerais</option>
                             <option value='MS - Mato Grosso do Sul'>MS - Mato Grosso do Sul</option>
                           
                            <option 
                                value='MT - Mato Grosso'>MT - Mato Grosso</option>
                            
                            <option value='PA - Pará'>PA - Par&aacute;</option>
                            <option 
                                value='PB - Paraíba'>PB - Para&iacute;ba</option>
                            <option value='PE - Pernambuco'>PE - Pernambuco</option>
                            <option 
                                value='PI - Piauí'>PI - Piau&iacute;</option>
                            <option value='PR - Paraná'>PR - Paran&aacute;</option>
                            <option 
                                value='RJ - Rio de Janeiro'>RJ - Rio de Janeiro</option>
                            <option value='RN - Rio Grande do Norte'>RN - Rio Grande do Norte</option>
                            <option 
                                value='RO - Roraima'>RO - Roraima</option>
                            <option value='RR - Roraima'>RR - Roraima</option>
                            <option value='RS - Rio Grande do Sul'  selected="selected" >RS - Rio Grande do Sul</option>
                            <option value='SC - Santa Catarina'>SC - Santa Catarina</option>
                            <option 
                                value='SE - Sergipe'>SE - Sergipe</option>
                            <option value='SP - São Paulo'>SP - S&atilde;o Paulo</option>
                            <option 
                                value='TO - Tocantins'>TO - Tocantins</option>
                          </select>
                        </span></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left"><span class="fontegeral">Telefone:</span></td>
                      </tr>
                      <tr>
                        <td align="left"><span class="fontegeral">
                          <input name="telefone" class="texto" onkeypress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');" size="14" maxlength="14"  />
                          * </span></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left"><span class="fontegeral">E-mail:</span></td>
                      </tr>
                      <tr>
                        <td align="left"><span class="fontegeral">
                          <input class="texto" size="40" name="email2" />
                          * </span></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left"><span class="fontegeral">Mensagem:</span></td>
                      </tr>
                      <tr>
                        <td align="left"><span class="fontegeral">
                          <textarea class="texto" name="mensagem" rows="6" cols="60"></textarea>
                        </span></td>
                      </tr>
                      <tr>
                        <td align="left"><span class="fontegeral">
                          <input class="texto" type="submit" value="&nbsp;ENVIAR DADOS&nbsp;" name="submit" />
                        </span></td>
                      </tr>
                    </tbody>
                  </table></td>
                </tr>
              </table></form>
                <p>&nbsp;</p>
                <p align="center">&nbsp;</p>
<p>&nbsp;</p></td>
            </tr>
           </table></td>
        </tr>
        <tr>
          <td><img src="imagens/barrabaixo.png" width="539" height="12" /></td>
        </tr>
      </table></td>
      <td width="18%" valign="top"><?php include("direito.php"); ?></td>
    </tr>
  </table>
</div>
</div>
</div>    
<br clear="all" />
<div class="corpo_rodape"></div>
</div>
<hr class="dn">
<div class="rodape">
<p> &copy;
<?php   
setlocale(LC_ALL, 'portuguese', 'pt_BR', 'pt_br', 'ptb_BRA');   
echo strftime("%Y");   
// Uma saída esperada é: terça-feira 29 de janeiro de 2008   
?>
&nbsp;<strong>Jornal Frederiquense</strong>. Todos os direitos reservados.</span></p>
<ul>       
<li>
<a href="http://www.casadaweb.net" class="topo" target=_blank>Casa da Web</a>
</li>
<li>
</li>
</ul>
</div>
</div>
</body>
</html>