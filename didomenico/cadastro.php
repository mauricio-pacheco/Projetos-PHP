<?php include("meta.php"); ?>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<table width="978" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="309"><img src="imagens/branco.gif" width="2" height="4" /></td>
    <td width="663" bgcolor="#EC1D25"><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
  </tr>
</table>
<table bgcolor="#EC1D25" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>
<table bgcolor="#FFFFFF" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="22%" valign="top" background="imagens/tabela.png"><table class="manchete_texto9" width="208" border="0" cellspacing="0" cellpadding="0">
                    <tr>
            <td><?php include("esquerdo.php"); ?></td>
          </tr>
        </table></td>
        <td width="78%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="4" /></td>
          </tr>
        </table>
          <table height="28" width="750" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="3%" class="manchete_texto9m"><img src="imagens/casa.png" /></td>
            <td width="97%" class="manchete_texto9m">&nbsp;<strong><em>Cadastre seu Imóvel</em></strong></td>
          </tr>
        </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><img src="imagens/barra.png" /></td>
            </tr>
          </table>
          <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="98%" height="28" border="0" align="center" class="manchete_texto9">
                <tr>
                  <td><script language="JavaScript" type="text/javascript">
function validar(cadastro) { 

if (document.cadastro.proprietario.value=="") {
alert("O Campo Proprietário não está preenchido!")
cadastro.proprietario.focus();
return false
}

if (document.cadastro.telp1.value=="") {
alert("O Campo Prefixo do Telefone não está preenchido!")
cadastro.telp1.focus();
return false
}

if (document.cadastro.tel1.value=="") {
alert("O Campo Telefone não está preenchido!")
cadastro.tel1.focus();
return false
}

if (document.cadastro.endereco.value=="") {
alert("O Campo Endereço não está preenchido!")
cadastro.endereco.focus();
return false
}

if (document.cadastro.bairro.value=="") {
alert("O Campo Bairro não está preenchido!")
cadastro.bairro.focus();
return false
}

if (document.cadastro.cidade.value=="") {
alert("O Campo Cidade não está preenchido!")
cadastro.cidade.focus();
return false
}

if (document.cadastro.cep.value=="") {
alert("O Campo CEP não está preenchido!")
cadastro.cep.focus();
return false
}

if (document.cadastro.enderecoimovel.value=="") {
alert("O Campo Endereço do Imóvel não está preenchido!")
cadastro.enderecoimovel.focus();
return false
}

if (document.cadastro.bairroimovel.value=="") {
alert("O Campo Bairro do Imóvel não está preenchido!")
cadastro.bairroimovel.focus();
return false
}

if (document.cadastro.cidadeimovel.value=="") {
alert("O Campo Cidade do Imóvel não está preenchido!")
cadastro.cidadeimovel.focus();
return false
}

if (document.cadastro.cepimovel.value=="") {
alert("O Campo CEP do Imóvel não está preenchido!")
cadastro.cepimovel.focus();
return false
}


		return true;

}
 
              </script>
                    <form action="cadastrar2.php" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro" onSubmit="return validar(this)">
                      <div id="pnlCadastro">
                        <table id="Table2" cellspacing="1" cellpadding="1" 
                        width="100%" border="0">
                          <tbody>
                            <tr>
                              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><strong>DADOS 
                                    PESSOAIS</strong></td>
                                  <td align="right">* Campos Obrigat&oacute;rios</td>
                                  </tr>
                                </table></td>
                              </tr>
                            <tr>
                              <td colspan="2" height="8"><div align="left"><span class="xl24"><img height="1" 
                              src="Super%20resultados_%20Surpreenda-se_arquivos/linha_secoes_divisao.gif" 
                              width="100%" /></span></div></td>
                              </tr>
                            <tr>
                              <td width="150">Propriet&aacute;rio:</td>
                              <td><input  name="proprietario" class="manchete_texto9" style="WIDTH: 300px" />
                                *</td>
                              </tr>
                            <tr>
                              <td>E-mail:</td>
                              <td><input name="email2" class="manchete_texto9" style="WIDTH: 300px" /></td>
                              </tr>
                            <tr>
                              <td>Tel. 
                                Residencial:</td>
                              <td><input name="telp1" class="manchete_texto9" style="WIDTH: 30px" />
                                &nbsp;-
                                <input name="tel1" class="manchete_texto9" style="WIDTH: 100px" />
                                *</td>
                              </tr>
                            <tr>
                              <td>Tel. 
                                Comercial:</td>
                              <td><input name="telp2" class="manchete_texto9" style="WIDTH: 30px" />
                                &nbsp;-
                                <input name="tel2" class="manchete_texto9" style="WIDTH: 100px" /></td>
                              </tr>
                            <tr>
                              <td>Celular:</td>
                              <td><input name="telp3" class="manchete_texto9" style="WIDTH: 30px" />
                                &nbsp;-
                                <input name="tel3" class="manchete_texto9" style="WIDTH: 100px" /></td>
                              </tr>
                            <tr>
                              <td>Endere&ccedil;o:</td>
                              <td><inputname="endereco" class="manchete_texto9" style="WIDTH: 300px" />
                                *</td>
                              </tr>
                            <tr>
                              <td>Complemento:</td>
                              <td><input name="complemento" class="manchete_texto9" style="WIDTH: 300px" /></td>
                              </tr>
                            <tr>
                              <td>Bairro:</td>
                              <td><input name="bairro" class="manchete_texto9" style="WIDTH: 300px" />
                                *</td>
                              </tr>
                            <tr>
                              <td>Cidade:</td>
                              <td><input name="cidade" class="manchete_texto9" style="WIDTH: 300px" />
                                *</td>
                              </tr>
                            <tr>
                              <td>Estado:</td>
                              <td><select name="estado" class="manchete_texto9">
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option 
                                value="AP">Amap&aacute;</option>
                                <option 
                                value="AM">Amazonas</option>
                                <option 
                                value="BA">Bahia</option>
                                <option 
                                value="CE">Cear&aacute;</option>
                                <option 
                                value="DF">Distrito Federal</option>
                                <option 
                                value="ES">Esp&iacute;rito Santo</option>
                                <option 
                                value="GO">Goias</option>
                                <option 
                                value="MA">Maranh&atilde;o</option>
                                <option value="MT">Mato 
                                  Grosso</option>
                                <option value="MS">Mato Grosso do 
                                  Sul</option>
                                <option value="MG">Minas 
                                  Gerais</option>
                                <option value="PA">Para</option>
                                <option value="PB">Para&iacute;ba</option>
                                <option 
                                value="PR">Paran&aacute;</option>
                                <option 
                                value="PE">Pernambuco</option>
                                <option 
                                value="PI">Piau&iacute;</option>
                                <option value="RJ">Rio de 
                                  Janeiro</option>
                                <option value="RN">Rio Grande do 
                                  Norte</option>
                                <option value="RS"  selected="selected">Rio Grande do 
                                  Sul</option>
                                <option value="RO">Rondonia</option>
                                <option value="RR">Roraima</option>
                                <option 
                                value="SC">Santa Catarina</option>
                                <option 
                                value="SP">S&atilde;o Paulo</option>
                                <option 
                                value="SE">Sergipe</option>
                                <option 
                                value="TO">Tocantins</option>
                                </select></td>
                              </tr>
                            <tr>
                              <td>CEP:</td>
                              <td><input name="cep" class="manchete_texto9" style="WIDTH: 100px" />
                                *</td>
                              </tr>
                            <tr>
                              <td colspan="2"><br />
                                <strong>DADOS DO 
                                  IM&Oacute;VEL</strong></td>
                              </tr>
                            <tr>
                              <td colspan="2" height="8"><div align="left"><span class="xl24"><img height="1" 
                              src="Super%20resultados_%20Surpreenda-se_arquivos/linha_secoes_divisao.gif" 
                              width="100%" /></span></div></td>
                              </tr>
                            <tr>
                              <td>Tipo 
                                de Transa&ccedil;&atilde;o:</td>
                              <td><table border="0">
                                <tbody>
                                  <tr>
                                    <td><input type="radio" value="Venda" name="transacao" />
                                      Venda</td>
                                    <td><input type="radio" checked="checked" value="Locação" name="transacao" />
                                      <label 
                                for="rblTransacao_1">Loca&ccedil;&atilde;o</label></td>
                                    </tr>
                                  </tbody>
                                </table>
                                </FONT></FONT></td>
                              </tr>
                            <tr>
                              <td colspan="2" height="8"><div align="left"><span class="xl24"><img height="1" 
                              src="Super%20resultados_%20Surpreenda-se_arquivos/linha_secoes_divisao.gif" 
                              width="100%" /></span></div></td>
                              </tr>
                            <tr>
                              <td>Finalidade:</td>
                              <td><table      border="0">
                                <tbody>
                                  <tr>
                                    <td><input type="radio" checked="checked" value="Residencial" name="finalidade" />
                                      <label 
                                for="rblFinalidade_0">Residencial</label></td>
                                    <td><input type="radio" value="Comercial" name="finalidade" />
                                      <label 
                                for="rblFinalidade_1">Comercial</label></td>
                                    </tr>
                                  </tbody>
                                </table></td>
                              </tr>
                            <tr>
                              <td colspan="2" height="8"><div align="left"><span class="xl24"><img height="1" 
                              src="Super%20resultados_%20Surpreenda-se_arquivos/linha_secoes_divisao.gif" 
                              width="100%" /></span></div></td>
                              </tr>
                            <tr>
                              <td>Tipo 
                                de Imovel:</td>
                              <td><font face="verdana" color="#333333" 
                              size="1">
                                <select name="tipoimovel" class="manchete_texto9" >
                                  <option value="Apartamento" selected="selected">Apartamento 
                                    Padr&atilde;o</option>
                                  <option 
                                value="Casa/Sobrado">Casa/Sobrado</option>
                                  <option 
                                value="Chácara">Ch&aacute;cara</option>
                                  <option 
                                value="Cobertura">Cobertura</option>
                                  <option 
                                value="Duplex">Duplex</option>
                                  <option 
                                value="Fazenda">Fazenda</option>
                                  <option 
                                value="Flat">Flat</option>
                                  <option 
                                value="Kitchenett">Kitchenett</option>
                                  <option 
                                value="Loft">Loft</option>
                                  <option 
                                value="Sitio">Sitio</option>
                                  <option 
                                value="Studio">Studio</option>
                                  <option 
                                value="Terreno">Terreno</option>
                                  <option 
                                value="Triplex">Triplex</option>
                                  </select>
                                </font></td>
                              </tr>
                            <tr>
                              <td colspan="2" height="8"><div align="left"><span class="xl24">
                                <div align="left"><img height="1" 
                              src="Super%20resultados_%20Surpreenda-se_arquivos/linha_secoes_divisao.gif" 
                              width="100%" /></div>
                                </span></div></td>
                              </tr>
                            <tr>
                              <td>Foto do Im&oacute;vel:</td>
                              <td><input name="file[]" type="file" class="manchete_texto9" /></td>
                              </tr>
                            <tr>
                              <td>Endere&ccedil;o:</td>
                              <td><input name="enderecoimovel" class="manchete_texto9" style="WIDTH: 300px" />
                                *</td>
                              </tr>
                            <tr>
                              <td>Complemento:</td>
                              <td><input name="complementoimovel" class="manchete_texto9" style="WIDTH: 300px" /></td>
                              </tr>
                            <tr>
                              <td>Bairro:</td>
                              <td><input name="bairroimovel" class="manchete_texto9" style="WIDTH: 300px" />
                                *</td>
                              </tr>
                            <tr>
                              <td>Cidade:</td>
                              <td><input name="cidadeimovel" class="manchete_texto9" style="WIDTH: 300px" />
                                *</td>
                              </tr>
                            <tr>
                              <td>Estado:</td>
                              <td><font face="verdana" color="#333333" 
                              size="1">
                                <select name="estadoimovel" class="manchete_texto9" >
                                  <option value="AC">Acre</option>
                                  <option 
                                value="AL">Alagoas</option>
                                  <option 
                                value="AP">Amap&aacute;</option>
                                  <option 
                                value="AM">Amazonas</option>
                                  <option 
                                value="BA">Bahia</option>
                                  <option 
                                value="CE">Cear&aacute;</option>
                                  <option 
                                value="DF">Distrito Federal</option>
                                  <option 
                                value="ES">Esp&iacute;rito Santo</option>
                                  <option 
                                value="GO">Goias</option>
                                  <option 
                                value="MA">Maranh&atilde;o</option>
                                  <option value="MT">Mato 
                                    Grosso</option>
                                  <option value="MS">Mato Grosso do 
                                    Sul</option>
                                  <option value="MG">Minas 
                                    Gerais</option>
                                  <option value="PA">Para</option>
                                  <option value="PB">Para&iacute;ba</option>
                                  <option 
                                value="PR">Paran&aacute;</option>
                                  <option 
                                value="PE">Pernambuco</option>
                                  <option 
                                value="PI">Piau&iacute;</option>
                                  <option value="RJ">Rio de 
                                    Janeiro</option>
                                  <option value="RN">Rio Grande do 
                                    Norte</option>
                                  <option value="RS"  selected="selected">Rio Grande do 
                                    Sul</option>
                                  <option value="RO">Rondonia</option>
                                  <option value="RR">Roraima</option>
                                  <option 
                                value="SC">Santa Catarina</option>
                                  <option 
                                value="SP">S&atilde;o Paulo</option>
                                  <option 
                                value="SE">Sergipe</option>
                                  <option 
                                value="TO">Tocantins</option>
                                  </select>
                                </font></td>
                              </tr>
                            </tbody>
                          </table>
                        <span 
                        id="clInfo" designtimedragdrop="751">
                          <div id="pnlImovelID2">
                            <table class="Table_Imovel" id="Imovel_tbImovelID2" 
border="0">
                              <tbody>
                                <tr>
                                  <td style="WIDTH: 150px">CEP:</td>
                                  <td><input name="cepimovel" class="manchete_texto9" style="WIDTH: 100px" />
                                    *</td>
                                  </tr>
                                <tr>
                                  <td style="WIDTH: 150px">Ocupa&ccedil;&atilde;o:</td>
                                  <td><select name="ocupacao" class="manchete_texto9">
                                    <option value="Vago" 
                                selected="selected">Vago</option>
                                    <option 
                                value="Inquilino">Inquilino</option>
                                    <option 
                                value="Proprietário:">Propriet&aacute;rio</option>
                                    </select></td>
                                  </tr>
                                <tr>
                                  <td>&Aacute;rea &Uacute;til:</td>
                                  <td><input name="areautil" class="manchete_texto9" style="WIDTH: 100px" value="0,00" /></td>
                                  </tr>
                                <tr>
                                  <td>&Aacute;rea Total:</td>
                                  <td><input name="areatotal" class="manchete_texto9" style="WIDTH: 100px" value="0,00" /></td>
                                  </tr>
                                <tr>
                                  <td>Chaves:</td>
                                  <td><select name="chaves" class="manchete_texto9">
                                    <option value="imobiliária" selected="selected">Imobili&aacute;ria</option>
                                    <option value="Portaria">Portaria</option>
                                    <option 
                                value="Vizinho">Vizinho</option>
                                    <option 
                                value="Proprietário">Propriet&aacute;rio</option>
                                    <option 
                                value="Outros">Outros</option>
                                    </select></td>
                                  </tr>
                                <tr>
                                  <td>Valor do IPTU:</td>
                                  <td><input name="iptu" class="manchete_texto9" style="WIDTH: 100px" value="0,00" /></td>
                                  </tr>
                                <tr>
                                  <td>Agendar Visita:</td>
                                  <td><table id="Imovel_AgendarVisita" border="0">
                                    <tbody>
                                      <tr>
                                        <td><input type="radio" value="Sim" name="agendarvisita" />
                                          <label 
                                for="Imovel_AgendarVisita_0">Sim</label></td>
                                        <td><input type="radio" checked="checked" value="Não" name="agendarvisita" />
                                          <label 
                                for="Imovel_AgendarVisita_1">N&atilde;o</label></td>
                                        </tr>
                                      </tbody>
                                    </table></td>
                                  </tr>
                                <tr>
                                  <td valign="top">Outras Informa&ccedil;&otilde;es:</td>
                                  <td><textarea name="informacoes" class="manchete_texto9" style="WIDTH: 350px; HEIGHT: 160px"></textarea></td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </span><span 
                        id="clInfoAdd">
                            <div id="pnlApartamentoID6"></div>
                            </span>
                        <span 
                        id="clVendaCompra">
                          <div id="pnlLocacaoID0"></div>
                          </span>
                        <div id="ValidationSummary1" 
                        style="DISPLAY: none; COLOR: red"></div>
                        <input name="submit" type="submit" class="manchete_texto9" value="Cadastrar Imóvel" />
                        
                        </div>
                      </form></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><img src="imagens/barra.png" /></td>
            </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="4" /></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table bgcolor="#EC1D25" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>