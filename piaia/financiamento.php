<?php include("meta.php"); ?>

<body topmargin="0" leftmargin="0">
<table width="980" height="160" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','160'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("busca.php"); ?></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0">
      <tr>
        <td class="fontetabela"><strong>PEDIDOS</strong></td>
      </tr>
    </table>
      <table width="100%" border="0">
        <tr>
          <td><table width="100%" border="0">
            <tr>
              <td align="left" class="fontetabela"><table width="100%" border="0" align="center">
                <tr>
                  <td border="0"><script language="JavaScript" type="text/javascript">
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


                        </script>
                    <script language="JavaScript" type="text/javascript">
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
                          </script>
                    <form action="enviapedido.php" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro" onSubmit="return validar(this)">
                      <table width="100%" border="0" align="center">
                        <tr>
                          <td width="50%"><table width="100%" border="0">
                            <tr>
                              <td class="fontetabela" align="left"><strong><font color="#FFFF00">Dados Pessoais:</font></strong></td>
                              <td class="manchete_texto"><div align="right" class="fontetabela">* Campos Obrigat&oacute;rios</div></td>
                              </tr>
                            </table></td>
                        </tr>
                        <tr>
                          <td><table width="100%" align="left" border="0">
                            <tbody>
                              <tr>
                                <td align="left">Nome Completo:
                                  <input class="fontetabela2" size="60" name="nome" />
                                  * </td>
                              </tr>
                              <tr>
                                <td class="manchete_texto" align="left"><img src="imagens/branco.gif" width="2" height="2" /></td>
                              </tr>
                              <tr>
                                <td align="left"><span class="manchete_texto">Cidade:</span>
                                  <input class="fontetabela2" size="36" name="cidade" />
Estado:                                  
<select class="fontetabela2" 
                              name="estado">
                                    <option value='RS - Rio Grande do Sul' selected="selected">RS - Rio Grande do Sul</option>
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
                                    <option value='SC - Santa Catarina'>SC - Santa Catarina</option>
                                    <option 
                                value='SE - Sergipe'>SE - Sergipe</option>
                                    <option value='SP - São Paulo'>SP - S&atilde;o Paulo</option>
                                    <option 
                                value='TO - Tocantins'>TO - Tocantins</option>
                                  </select></td>
                              </tr>
                              <tr>
                                <td class="manchete_texto" align="left"><img src="imagens/branco.gif" width="2" height="2" /></td>
                              </tr>
                              <tr>
                                <td align="left"><span class="manchete_texto">Telefone:</span>
                                  <input name="telefone" class="fontetabela2" onKeyPress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');" size="14" maxlength="14"  />
                                  * </td>
                              </tr>
                              <tr>
                                <td class="manchete_texto" align="left"><img src="imagens/branco.gif" width="2" height="2" /></td>
                              </tr>
                              <tr>
                                <td align="left"><span class="manchete_texto">E-mail:</span>
                                  <input class="fontetabela2" size="40" name="email2" />
                                  * </td>
                              </tr>
                              <tr>
                                <td class="manchete_texto" align="left"><img src="imagens/branco.gif" width="2" height="6" /></td>
                              </tr>
                              <tr>
                                <td class="manchete_texto" align="left"><strong><font color="#FFFF00">Veículo Desejado:</font></strong></td>
                              </tr>
                              <tr>
                                <td align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                              <tr>
                                <td align="left">Tipo:<span class="BaseCampo" style="WIDTH: 470px">
                                  <select name="vtipo" class="fontetabela2" 
id="vtipo" >
                                    <option 
  selected="selected" value="">Selecione...</option>
                                    <option value="C">CARROS</option>
                                    <option value="M">MOTOS</option>
                                    <option value="P">PESADOS</option>
                                    <option 
  value="R">RARIDADES</option>
                                  </select>
                                </span></td>
                              </tr>
                                <tr>
                                <td align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                                <tr>
                                  <td align="left">Marca:
                                    <input name="vmarca" class="fontetabela2" id="vmarca" size="40" /></td>
                                </tr>
                                 <tr>
                                <td align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                               <tr>
                                  <td align="left">Modelo:
                                    <input name="vmodelo" class="fontetabela2" id="vmodelo" size="30" /></td>
                                </tr>
                                   <tr>
                                <td align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                                    <tr>
                                  <td align="left">Ano: <span class="BaseCampo" style="MARGIN-TOP: 5px; WIDTH: 300px; MARGIN-BOTTOM: 5px">
                                    <select name="vano" size="1" class="fontetabela2" id="vano" >
                                      <option 
  selected="selected" value="">--</option>
                                      <option value="2012">2012</option>
                                      <option 
  value="2011">2011</option>
                                      <option value="2010">2010</option>
                                      <option 
  value="2009">2009</option>
                                      <option value="2008">2008</option>
                                      <option 
  value="2007">2007</option>
                                      <option value="2006">2006</option>
                                      <option 
  value="2005">2005</option>
                                      <option value="2004">2004</option>
                                      <option 
  value="2003">2003</option>
                                      <option value="2002">2002</option>
                                      <option 
  value="2001">2001</option>
                                      <option value="2000">2000</option>
                                      <option 
  value="1999">1999</option>
                                      <option value="1998">1998</option>
                                      <option 
  value="1997">1997</option>
                                      <option value="1996">1996</option>
                                      <option 
  value="1995">1995</option>
                                      <option value="1994">1994</option>
                                      <option 
  value="1993">1993</option>
                                      <option value="1992">1992</option>
                                      <option 
  value="1991">1991</option>
                                      <option value="1990">1990</option>
                                      <option 
  value="1989">1989</option>
                                      <option value="1988">1988</option>
                                      <option 
  value="1987">1987</option>
                                      <option value="1986">1986</option>
                                      <option 
  value="1985">1985</option>
                                      <option value="1984">1984</option>
                                      <option 
  value="1983">1983</option>
                                      <option value="1982">1982</option>
                                      <option 
  value="1981">1981</option>
                                      <option value="1980">1980</option>
                                      <option 
  value="1979">1979</option>
                                      <option value="1978">1978</option>
                                      <option 
  value="1977">1977</option>
                                      <option value="1976">1976</option>
                                      <option 
  value="1975">1975</option>
                                      <option value="1974">1974</option>
                                      <option 
  value="1973">1973</option>
                                      <option value="1972">1972</option>
                                      <option 
  value="1971">1971</option>
                                      <option value="1970">1970</option>
                                      <option 
  value="1969">1969</option>
                                      <option value="1968">1968</option>
                                      <option 
  value="1967">1967</option>
                                      <option value="1966">1966</option>
                                      <option 
  value="1965">1965</option>
                                      <option value="1964">1964</option>
                                      <option 
  value="1963">1963</option>
                                      <option value="1962">1962</option>
                                      <option 
  value="1961">1961</option>
                                      <option value="1960">1960</option>
                                      <option 
  value="1959">1959</option>
                                      <option value="1958">1958</option>
                                      <option 
  value="1957">1957</option>
                                      <option value="1956">1956</option>
                                      <option 
  value="1955">1955</option>
                                      <option value="1954">1954</option>
                                      <option 
  value="1953">1953</option>
                                      <option value="1952">1952</option>
                                      <option 
  value="1951">1951</option>
                                      <option value="1950">1950</option>
                                      <option 
  value="1949">1949</option>
                                      <option value="1948">1948</option>
                                      <option 
  value="1947">1947</option>
                                      <option value="1946">1946</option>
                                      <option 
  value="1945">1945</option>
                                      <option value="1944">1944</option>
                                      <option 
  value="1943">1943</option>
                                      <option value="1942">1942</option>
                                      <option 
  value="1941">1941</option>
                                      <option value="1940">1940</option>
                                      <option 
  value="1939">1939</option>
                                      <option value="1938">1938</option>
                                      <option 
  value="1937">1937</option>
                                      <option value="1936">1936</option>
                                      <option 
  value="1935">1935</option>
                                      <option value="1934">1934</option>
                                      <option 
  value="1933">1933</option>
                                      <option value="1932">1932</option>
                                      <option 
  value="1931">1931</option>
                                      <option value="1930">1930</option>
                                      <option 
  value="1929">1929</option>
                                      <option value="1928">1928</option>
                                      <option 
  value="1927">1927</option>
                                      <option value="1926">1926</option>
                                      <option 
  value="1925">1925</option>
                                      <option value="1924">1924</option>
                                      <option 
  value="1923">1923</option>
                                      <option value="1922">1922</option>
                                      <option 
  value="1921">1921</option>
                                      <option value="1920">1920</option>
                                      <option 
  value="1919">1919</option>
                                      <option value="1918">1918</option>
                                      <option 
  value="1917">1917</option>
                                      <option value="1916">1916</option>
                                      <option 
  value="1915">1915</option>
                                      <option value="1914">1914</option>
                                      <option 
  value="1913">1913</option>
                                      <option value="1912">1912</option>
                                      <option 
  value="1911">1911</option>
                                      <option value="1910">1910</option>
                                      <option 
  value="1909">1909</option>
                                      <option value="1908">1908</option>
                                      <option 
  value="1907">1907</option>
                                      <option value="1906">1906</option>
                                      <option 
  value="1905">1905</option>
                                      <option value="1904">1904</option>
                                      <option 
  value="1903">1903</option>
                                      <option value="1902">1902</option>
                                      <option 
  value="1901">1901</option>
                                      <option 
value="1900">1900</option>
                                    </select>
                                  </span></td>
                                </tr>
                                <tr>
                                <td align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                                                              <tr>
                                  <td align="left">Preço: <span class="BaseCampo" style="MARGIN-TOP: 5px; WIDTH: 300px; MARGIN-BOTTOM: 5px">
                                    <select name="vpreco1" size="1" class="fontetabela2" id="vpreco1" >
                                      <option 
  selected="selected" value="">--</option>
                                      <option value="500">500</option>
                                      <option 
  value="2000">2.000</option>
                                      <option value="4000">4.000</option>
                                      <option 
  value="6000">6.000</option>
                                      <option value="8000">8.000</option>
                                      <option 
  value="10000">10.000</option>
                                      <option value="15000">15.000</option>
                                      <option 
  value="20000">20.000</option>
                                      <option value="25000">25.000</option>
                                      <option 
  value="30000">30.000</option>
                                      <option value="35000">35.000</option>
                                      <option 
  value="40000">40.000</option>
                                      <option value="45000">45.000</option>
                                      <option 
  value="50000">50.000</option>
                                      <option value="60000">60.000</option>
                                      <option 
  value="70000">70.000</option>
                                      <option value="80000">80.000</option>
                                      <option 
  value="90000">90.000</option>
                                      <option value="100000">100.000</option>
                                      <option 
  value="200000">200.000</option>
                                      <option value="300000">300.000</option>
                                      <option 
  value="400000">400.000</option>
                                      <option 
value="500000">500.000</option>
                                    </select>
                                  à <span class="BaseCampo" style="MARGIN-TOP: 5px; WIDTH: 300px; MARGIN-BOTTOM: 5px">
                                  <select name="vpreco2" size="1" class="fontetabela2" 
id="vpreco2" >
                                    <option selected="selected" 
  value="">--</option>
                                    <option value="2000">2.000</option>
                                    <option 
  value="4000">4.000</option>
                                    <option value="6000">6.000</option>
                                    <option 
  value="8000">8.000</option>
                                    <option value="10000">10.000</option>
                                    <option 
  value="15000">15.000</option>
                                    <option value="20000">20.000</option>
                                    <option 
  value="25000">25.000</option>
                                    <option value="30000">30.000</option>
                                    <option 
  value="35000">35.000</option>
                                    <option value="40000">40.000</option>
                                    <option 
  value="45000">45.000</option>
                                    <option value="50000">50.000</option>
                                    <option 
  value="60000">60.000</option>
                                    <option value="70000">70.000</option>
                                    <option 
  value="80000">80.000</option>
                                    <option value="90000">90.000</option>
                                    <option 
  value="100000">100.000</option>
                                    <option value="200000">200.000</option>
                                    <option 
  value="300000">300.000</option>
                                    <option value="400000">400.000</option>
                                    <option 
  value="500000">500.000</option>
                                    <option value="9900000">+ 500.000</option>
                                  </select>
                                  </span></span></td>
                                </tr>
                                    <tr>
                                <td align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                              
                                    <tr>
                                                                <td align="left">Cor:<span class="BaseCampo" style="WIDTH: 470px">
                                                                  <select name="vcor" size="1" class="fontetabela2" id="vcor" >
                                                                    <option value="Todas" value="Todas" selected="selected">Todas</option>
                                                                    <option value="AMARELO">AMARELO</option>
                                                                    <option value="AZUL">AZUL</option>
                                                                    <option value="BEGE">BEGE</option>
                                                                    <option value="BORDO">BORDO</option>
                                                                    <option value="BRANCO">BRANCO</option>
                                                                    <option value="CINZA">CINZA</option>
                                                                    <option value="DOURADO">DOURADO</option>
                                                                    <option value="LARANJA">LARANJA</option>
                                                                    <option value="MARRON">MARROM</option>
                                                                    <option value="METALICO">METALICO</option>
                                                                    <option value="PEROLA">PEROLA</option>
                                                                    <option value="PEROLIZADO">PEROLIZADO</option>
                                                                    <option value="PRATA">PRATA</option>
                                                                    <option value="PRETO">PRETO</option>
                                                                    <option value="ROSA">ROSA</option>
                                                                    <option value="ROXO">ROXO</option>
                                                                    <option value="SOLIDO">SOLIDO</option>
                                                                    <option value="VERDE">VERDE</option>
                                                                    <option value="VERMELHO">VERMELHO</option>
                                                                    <option value="VINHO">VINHO</option>
                                                                    <option value="VÁRIAS">VÁRIAS</option>
                                                                  </select>
                                                                </span></td>
                                    </tr>
                                     <tr>
                                <td align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                              
                                    <tr>
                                      <td align="left">Observações:</td>
                                    </tr>
                                    <tr>
                                                                <td align="left"><textarea name="vobs" cols="60" rows="8" class="fontetabela2" id="vobs"></textarea></td>
                                    </tr>
                                      <tr>
                                <td align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                                    <tr>
                                      <td align="left"><strong><font color="#FFFF00">Possue Veículo na Troca:</font></strong></td>
                                    </tr>
                                      <tr>
                                <td align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                                    <tr>
                                        <td align="left">Marca:
                                        <input name="pmarca" class="fontetabela2" id="pmarca" size="40" /></td>
                                    </tr>
                                     <tr>
                                <td align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                                                                  <tr>
                                                                    <td align="left">Modelo:
                                                                    <input name="pmodelo" class="fontetabela2" id="pmodelo" size="30" /></td>
                                                                  </tr>
                                                                   <tr>
                                <td align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                              
                                                                  <tr>
                                                                     <td align="left">Cor: <span class="BaseCampo" style="WIDTH: 470px">
                                                                     <select name="pcor" size="1" class="fontetabela2" id="pcor" >
                                                                       <option value="Todas" value="Todas" selected="selected">Todas</option>
                                                                       <option value="AMARELO">AMARELO</option>
                                                                       <option value="AZUL">AZUL</option>
                                                                       <option value="BEGE">BEGE</option>
                                                                       <option value="BORDO">BORDO</option>
                                                                       <option value="BRANCO">BRANCO</option>
                                                                       <option value="CINZA">CINZA</option>
                                                                       <option value="DOURADO">DOURADO</option>
                                                                       <option value="LARANJA">LARANJA</option>
                                                                       <option value="MARRON">MARROM</option>
                                                                       <option value="METALICO">METALICO</option>
                                                                       <option value="PEROLA">PEROLA</option>
                                                                       <option value="PEROLIZADO">PEROLIZADO</option>
                                                                       <option value="PRATA">PRATA</option>
                                                                       <option value="PRETO">PRETO</option>
                                                                       <option value="ROSA">ROSA</option>
                                                                       <option value="ROXO">ROXO</option>
                                                                       <option value="SOLIDO">SOLIDO</option>
                                                                       <option value="VERDE">VERDE</option>
                                                                       <option value="VERMELHO">VERMELHO</option>
                                                                       <option value="VINHO">VINHO</option>
                                                                       <option value="VÁRIAS">VÁRIAS</option>
                                                                     </select>
                                                                     </span></td>
                                    </tr>
                                                                <tr>
                                <td align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                                                                  <tr>
                                      <td align="left">Ano: <span class="BaseCampo" style="MARGIN-TOP: 5px; WIDTH: 300px; MARGIN-BOTTOM: 5px">
                                      <select name="pano" size="1" class="fontetabela2" id="pano" >
                                        <option 
  selected="selected" value="">--</option>
                                        <option value="2012">2012</option>
                                        <option 
  value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option 
  value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option 
  value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option 
  value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option 
  value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option 
  value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option 
  value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option 
  value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option 
  value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option 
  value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option 
  value="1991">1991</option>
                                        <option value="1990">1990</option>
                                        <option 
  value="1989">1989</option>
                                        <option value="1988">1988</option>
                                        <option 
  value="1987">1987</option>
                                        <option value="1986">1986</option>
                                        <option 
  value="1985">1985</option>
                                        <option value="1984">1984</option>
                                        <option 
  value="1983">1983</option>
                                        <option value="1982">1982</option>
                                        <option 
  value="1981">1981</option>
                                        <option value="1980">1980</option>
                                        <option 
  value="1979">1979</option>
                                        <option value="1978">1978</option>
                                        <option 
  value="1977">1977</option>
                                        <option value="1976">1976</option>
                                        <option 
  value="1975">1975</option>
                                        <option value="1974">1974</option>
                                        <option 
  value="1973">1973</option>
                                        <option value="1972">1972</option>
                                        <option 
  value="1971">1971</option>
                                        <option value="1970">1970</option>
                                        <option 
  value="1969">1969</option>
                                        <option value="1968">1968</option>
                                        <option 
  value="1967">1967</option>
                                        <option value="1966">1966</option>
                                        <option 
  value="1965">1965</option>
                                        <option value="1964">1964</option>
                                        <option 
  value="1963">1963</option>
                                        <option value="1962">1962</option>
                                        <option 
  value="1961">1961</option>
                                        <option value="1960">1960</option>
                                        <option 
  value="1959">1959</option>
                                        <option value="1958">1958</option>
                                        <option 
  value="1957">1957</option>
                                        <option value="1956">1956</option>
                                        <option 
  value="1955">1955</option>
                                        <option value="1954">1954</option>
                                        <option 
  value="1953">1953</option>
                                        <option value="1952">1952</option>
                                        <option 
  value="1951">1951</option>
                                        <option value="1950">1950</option>
                                        <option 
  value="1949">1949</option>
                                        <option value="1948">1948</option>
                                        <option 
  value="1947">1947</option>
                                        <option value="1946">1946</option>
                                        <option 
  value="1945">1945</option>
                                        <option value="1944">1944</option>
                                        <option 
  value="1943">1943</option>
                                        <option value="1942">1942</option>
                                        <option 
  value="1941">1941</option>
                                        <option value="1940">1940</option>
                                        <option 
  value="1939">1939</option>
                                        <option value="1938">1938</option>
                                        <option 
  value="1937">1937</option>
                                        <option value="1936">1936</option>
                                        <option 
  value="1935">1935</option>
                                        <option value="1934">1934</option>
                                        <option 
  value="1933">1933</option>
                                        <option value="1932">1932</option>
                                        <option 
  value="1931">1931</option>
                                        <option value="1930">1930</option>
                                        <option 
  value="1929">1929</option>
                                        <option value="1928">1928</option>
                                        <option 
  value="1927">1927</option>
                                        <option value="1926">1926</option>
                                        <option 
  value="1925">1925</option>
                                        <option value="1924">1924</option>
                                        <option 
  value="1923">1923</option>
                                        <option value="1922">1922</option>
                                        <option 
  value="1921">1921</option>
                                        <option value="1920">1920</option>
                                        <option 
  value="1919">1919</option>
                                        <option value="1918">1918</option>
                                        <option 
  value="1917">1917</option>
                                        <option value="1916">1916</option>
                                        <option 
  value="1915">1915</option>
                                        <option value="1914">1914</option>
                                        <option 
  value="1913">1913</option>
                                        <option value="1912">1912</option>
                                        <option 
  value="1911">1911</option>
                                        <option value="1910">1910</option>
                                        <option 
  value="1909">1909</option>
                                        <option value="1908">1908</option>
                                        <option 
  value="1907">1907</option>
                                        <option value="1906">1906</option>
                                        <option 
  value="1905">1905</option>
                                        <option value="1904">1904</option>
                                        <option 
  value="1903">1903</option>
                                        <option value="1902">1902</option>
                                        <option 
  value="1901">1901</option>
                                        <option 
value="1900">1900</option>
                                      </select>
                                      </span></td>
                                    </tr>
                                    <tr>
                                <td align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                              
                                    <tr>
                                                                    <td align="left">Preço:
                                                                      <input name="ppreco" class="fontetabela2" id="ppreco" size="30" /></td>
                                    </tr>
                                  <tr>
                                <td align="left"><img src="imagens/branco.gif" width="2" height="4" /></td>
                              </tr>
                              
                              <tr>
                                <td align="left"><input class="fontegrana" type="submit" value="SOLICITAR PEDIDO" name="submit" /></td>
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
    </table>
      <table width="100%" border="0">
        <tr>
          <td>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>