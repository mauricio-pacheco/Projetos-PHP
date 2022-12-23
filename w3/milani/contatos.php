<?php include("meta.php"); ?>
<?php include("head.php"); ?>
<BODY class="auto fs3" id=bd>
<TABLE border=0 cellSpacing=0 cellPadding=0 align=center>
  <TBODY>
    <TR>
      <TD>
     <?php include("cabecalho.php"); ?>
      <TABLE border=0 cellSpacing=0 cellPadding=0 width=100% 
              align=center>
        <TBODY>
          <TR>
            <TD bgColor=#ffffff align=middle>
             <?php include("cima.php"); ?></TD>
          </TR>
        </TBODY>
      </TABLE>
      <?php include("menu.php"); ?>
        <TABLE id=tabela border=0 cellSpacing=0 cellPadding=0 width=760 
      align=center>
          <TBODY>
            <TR>
              <TD id=header_td bgColor=#ffffff colSpan=2><?php include("banner.php"); ?></TD>
            </TR>
            <TR>
              <TD bgColor=#ffffff height=8 colSpan=2></TD>
            </TR>
            <TR>
              <TD background="imagens/fundotabela.jpg" vAlign=top width=200><?php include("esquerdo.php"); ?> <TD style="PADDING-LEFT: 8px; PADDING-RIGHT: 8px" id=main_td 
          bgColor=#ffffff vAlign=top width=544><DIV id=div-main>
                <CENTER>
                  <DIV style="Z-INDEX: 666" id=flash1>
                    <table background="imagens/barra1.jpg" height="40" width="100%" border="0">
                      <tr>
                        <td class="manchete_texto"><b>Fale Conosco</b></td>
                      </tr>
                    </table>
                    <table width="100%" border="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="2"></td>
                      </tr>
                    </table>
                    <table cellpadding="0" cellspacing="0" width="100%" border="0">
                     <tr>
                        <td align="center"><table width="100%" border="0" align="center">
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
                                        <td width="6%" align="left"><img src="imagens/email.jpg"></td>
                                        <td width="94%" class="manchete_texto" align="left">Telefone: (0xx55) 3744 - 3322</td>
                                      </tr>
                                      <tr>
                                        <td><img src="imagens/branco.gif" width="1" height="4"></td>
                                        <td><img src="imagens/branco.gif" width="1" height="4"></td>
                                      </tr>
                                    </table>
                                      <table width="100%" border="0">
                                        <tr>
                                          <td width="6%" align="left"><img src="imagens/email.jpg"></td>
                                          <td width="94%" class="manchete_texto2" align="left"><a href="mailto:construtoramilani@construtoramilani.com.br" class="manchete_texto4">construtoramilani@construtoramilani.com.br</a></td>
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
                                        <td class="manchete_texto" align="left">Preencha o formul&aacute;rio abaixo para entrar em contato conosco:</td>
                                        <td class="manchete_texto"><div align="right">* Campos Obrigat&oacute;rios</div></td>
                                      </tr>
                                    </table></td>
                                  </tr>
                                  <tr>
                                    <td><table width="100%" align="left" border="0">
                                      <tbody>
                                        <tr>
                                          <td width="68%" class="manchete_texto" align="left">Nome Completo:</td>
                                        </tr>
                                        <tr>
                                          <td align="left"><input class="manchete_texto" size="60" name="nome" />
                                            * </td>
                                        </tr>
                                        <tr>
                                          <td class="manchete_texto" align="left">Cidade:</td>
                                        </tr>
                                        <tr>
                                          <td align="left"><input class="manchete_texto" size="36" name="cidade2" />
                                            <select class="manchete_texto" 
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
                                          <td class="manchete_texto" align="left">Telefone:</td>
                                        </tr>
                                        <tr>
                                          <td align="left"><input name="telefone" class="manchete_texto" onKeyPress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');" size="14" maxlength="14"  />
                                            * </td>
                                        </tr>
                                        <tr>
                                          <td class="manchete_texto" align="left">E-mail:</td>
                                        </tr>
                                        <tr>
                                          <td align="left"><input class="manchete_texto" size="40" name="email2" />
                                            * </td>
                                        </tr>
                                        <tr>
                                          <td class="manchete_texto" align="left">Mensagem / Sugest&otilde;es</td>
                                        </tr>
                                        <tr>
                                          <td align="left"><textarea class="manchete_texto" name="mensagem" rows="12" cols="80"></textarea></td>
                                        </tr>
                                        <tr>
                                          <td align="left"><input class="manchete_texto" type="submit" value="ENVIAR DADOS" name="submit" /></td>
                                        </tr>
                                      </tbody>
                                    </table></td>
                                  </tr>
                                </table>
                              </form></td>
                          </tr>
                          <tr>
                            <td border="0">&nbsp;</td>
                          </tr>
                        </table></td>
                      </tr>
                    <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                    <table width="100%" border="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="2"></td>
                      </tr>
                    </table>
                    
                    
                    
                  </DIV>
                </CENTER>
              </DIV></TD>
            </TR>
        </TABLE></TD>
      <TD width=1>&nbsp;</TD>
      <TD vAlign=top></TD>
    </TR>
  </TBODY>
</TABLE>
<DIV id=barra_login>
<DIV style="BACKGROUND-COLOR: #FF7800" id=cabecalho2>
<TABLE border=0 cellSpacing=0 cellPadding=0 width=740 align=center>
  <TBODY>
  <TR>
    
    <TD vAlign=center width=408 align=left>
      <TABLE border=0 cellSpacing=0 cellPadding=0 width=467>
        <TBODY>
        <TR>
          <TD vAlign=center width=202 align=left>&nbsp;</TD>
          <TD vAlign=center width=180 align=left>&nbsp;</TD>
          <TD vAlign=center width=85 align=left>&nbsp;</TD></TR></TBODY></TABLE></TD>
<TD vAlign=center width=332 align=right>&nbsp;</TD></TR></TBODY></TABLE></DIV></DIV>
<DIV id=bottom>
  <table width="100%" height="120" border="0" align="center" background="imagens/baixo.gif">
    <tr>
      <td valign="top"><?php include("rodape.php"); ?></td>
    </tr>
  </table>
<DIV style="BACKGROUND-COLOR: #FF7800"></DIV></DIV>
<SCRIPT type=text/javascript>
    <!--
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    -->	
    </SCRIPT>

<SCRIPT type=text/javascript>
    <!--
        try {
            var pageTracker = _gat._getTracker("UA-5629445-1");
            pageTracker._trackPageview();
        } catch(err) {}
    -->
    </SCRIPT>
</BODY></HTML>
