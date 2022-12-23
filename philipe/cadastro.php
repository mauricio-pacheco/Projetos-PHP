<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Lista Erechim</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META 
content="Descrição" 
name=description>
<META 
content="palavras, chave"><LINK media=screen href="home_arquivos/estrutura2009.css" 
type=text/css rel=stylesheet><LINK media=screen 
href="home_arquivos/interno2009.css" type=text/css rel=stylesheet><LINK 
media=screen href="home_arquivos/tooltip.css" type=text/css rel=stylesheet><LINK 
media=screen href="home_arquivos/wordcloud.css" type=text/css 
rel=stylesheet><LINK href="lupa.ico" 
rel="shortcut icon">
<LINK media=screen href="home_arquivos/MenuMatic.css" type=text/css 
charset=utf-8 rel=stylesheet><!--[if lt IE 7]>
    <link rel="stylesheet" href="home_arquivos/MenuMatic-ie6.css" type="text/css" media="screen" charset="utf-8" />
<![endif]-->
<LINK media=screen href="home_arquivos/Roar.css" type=text/css 
rel=stylesheet>
<META content="MSHTML 6.00.6001.18000" name=GENERATOR>
<script type="text/javascript" language="javascript" src="lytebox.js"></script>
<link rel="stylesheet" href="lytebox.css" type="text/css" media="screen" />
</HEAD>
<BODY><!--Inicio do cabeçalho-->
<DIV id=sf_header>
<DIV id=sf_header_pai>
<DIV id=sf_header_logo><A class=logo_site 
title="Lista Erechim" 
href="index.php"></A></DIV>
<DIV id=sf_header_banner>
  <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM banners WHERE tipo = '1' ORDER BY rand() LIMIT 1");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe banners cadastrados!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
  <a href="<?php echo $n["link"]; ?>" target=_blank><img src="administrador/banners/<?php echo $n["foto"]; ?>" border="0"></a><br>
  <?php
  }
  }
 ?>
</DIV></DIV></DIV>
<DIV class=sf_header_menu>
<table width="985" border="0" align="center">
    <tr>
      <td height="24" bordercolor="#A7D2EF" bgcolor="#8DCBFE" onClick="window.location='index.php';" onMouseOver="this.style.backgroundColor='#FCDB00'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#8DCBFE'; this.style.color='#252525';" width="11%"><div align="center"><font color="#000000"><b>Home</b></font></div></td><td height="24" bordercolor="#A7D2EF" bgcolor="#8DCBFE" onClick="window.location='cadastro.php';" onMouseOver="this.style.backgroundColor='#FCDB00'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#8DCBFE'; this.style.color='#252525';" width="11%"><div align="center"><font color="#000000"><b>Cadastrar</b></font></div></td>
      <td height="24" bordercolor="#A7D2EF" bgcolor="#FCDB00" width="70%"><table width="100%" border="0">
        <tr>
          <script language=javascript>
function validar(cadastro) { 

if (document.busca.palavra.value=="") {
alert("O Campo Pesquisar não está preenchido!")
busca.palavra.focus();
return false
}

}

</SCRIPT><form name="busca" action="pesquisar.php" method="post" onSubmit="return validar(this)">
  <td width="35%"><input name="palavra" type="text" class="inputbox" id="palavra" onClick="this.value=''" value="Digite o nome para a pesquisa..." size="52"></td>
          <td width="9%"><input type="image" src="home_arquivos/botao.png" name="button" class="inputbox" id="button" alt="Pesquisar"></td></form>
          <td width="56%"><TABLE height=20 cellSpacing=0 cellPadding=0 width=468 
                  border=0>
            <TBODY>
              <TR>
                <TD class=text_medio vAlign=center align=middle width=26 
                      height=20><div align="center"><a href="numeros.php" class="link_normal" title="FILTRAR POR NUMERAL">0-9</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=a" class="link_normal" title="FILTRAR PELA LETRA ' A '">A</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=b" class="link_normal" title="FILTRAR PELA LETRA ' B '">B</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=c" class="link_normal" title="FILTRAR PELA LETRA ' C '">C</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=d" class="link_normal" title="FILTRAR PELA LETRA ' D '">D</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=e" class="link_normal" title="FILTRAR PELA LETRA ' E '">E</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=f" class="link_normal" title="FILTRAR PELA LETRA ' F '">F</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=g" class="link_normal" title="FILTRAR PELA LETRA ' G '">G</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=h" class="link_normal" title="FILTRAR PELA LETRA ' H '">H</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=i" class="link_normal" title="FILTRAR PELA LETRA ' I '">I</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=j" class="link_normal" title="FILTRAR PELA LETRA ' J '">J</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=k" class="link_normal" title="FILTRAR PELA LETRA ' K '">K</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=l" class="link_normal" title="FILTRAR PELA LETRA ' L '">L</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=m" class="link_normal" title="FILTRAR PELA LETRA ' M '">M</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=n" class="link_normal" title="FILTRAR PELA LETRA ' N '">N</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=o" class="link_normal" title="FILTRAR PELA LETRA ' O '">O</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=p" class="link_normal" title="FILTRAR PELA LETRA ' P '">P</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=q" class="link_normal" title="FILTRAR PELA LETRA ' Q '">Q</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=r" class="link_normal" title="FILTRAR PELA LETRA ' R '">R</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=s" class="link_normal" title="FILTRAR PELA LETRA ' S '">S</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=t" class="link_normal" title="FILTRAR PELA LETRA ' T '">T</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=u" class="link_normal" title="FILTRAR PELA LETRA ' U '">U</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=v" class="link_normal" title="FILTRAR PELA LETRA ' V '">V</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=w" class="link_normal" title="FILTRAR PELA LETRA ' W '">W</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio vAlign=center align=middle width=16 
                      height=20><div align="center"><a href="letras.php?letra=x" class="link_normal" title="FILTRAR PELA LETRA ' X '">X</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio vAlign=center align=middle width=16 
                      height=20><div align="center"><a href="letras.php?letra=y" class="link_normal" title="FILTRAR PELA LETRA ' Y '">Y</a></div></TD>
                <TD width=1 bgColor=#FFFF88><div align="center"></div></TD>
                <TD class=text_medio 
                      onmouseover="this.className='menu_over';" 
                      onmouseout="this.className='menu_out';" vAlign=center 
                      align=middle width=16 height=20><div align="center"><a href="letras.php?letra=z" class="link_normal" title="FILTRAR PELA LETRA ' Z '">Z</a></div></TD>
              </TR>
            </TBODY>
          </TABLE></td>
          </tr>
      </table>        
      </td>
    </tr>
  </table>
</DIV>
<DIV id=sf_center>
<DIV id=sf_center_conteudo>
<DIV id=div_conteudo>
  <table width="100%" border="0">
    <tr>
      <td width="69%" valign="top"><table width="98%" border="0" align="center">
        <tr>
          <td><div align="center">CADASTRAR N&Uacute;MERO</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="center"><font color="#FF0000">OBS: Os n&uacute;meros passar&atilde;o por uma aprova&ccedil;&atilde;o do adminsitrador para serem liberados.</font></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><script language=javascript>
function validar(cadastro) { 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome n&atilde;o est&aacute; preenchido!")
cadastro.nome.focus();
return false
}

if (document.cadastro.numero1.value=="") {
alert("O Campo Telefone 1 n&atilde;o est&aacute; preenchido!")
cadastro.numero1.focus();
return false
}

if (document.cadastro.cidade.value=="") {
alert("O Campo Cidade n&atilde;o est&aacute; preenchido!")
cadastro.cidade.focus();
return false
}

if (document.cadastro.cep.value=="") {
alert("O Campo CEP n&atilde;o est&aacute; preenchido!")
cadastro.cep.focus();
return false
}

if (document.cadastro.endereco.value=="") {
alert("O Campo Endere&ccedil;o n&atilde;o est&aacute; preenchido!")
cadastro.endereco.focus();
return false
}

if (document.cadastro.numero.value=="") {
alert("O Campo N&uacute;mero n&atilde;o est&aacute; preenchido!")
cadastro.numero.focus();
return false
}


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

// telefone 1
if (formato=='numero1'){
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

// telefone 2
if (formato=='numero2'){
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


// celular 1
if (formato=='celular1'){
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

// celular 2
if (formato=='celular2'){
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
            <form name="cadastro" action="cadnumero.php" method="post" enctype="multipart/form-data" onSubmit="return validar(this)">
              <table width="80%" border="0" align="center">
                <tr>
                  <td>* Campos Obrigat&oacute;rios</td>
                </tr>
                <tr>
                  <td width="20%">Nome:
                    <input name="nome" type="text" id="nome" size="90">
                    *</td>
                </tr>
                <tr>
                  <td>Foto:
                    <input type="file" name="foto" id="foto"></td>
                </tr>
                <tr>
                  <td>Telefone 1:
                    <input name="numero1" type="text" id="numero1" onKeyPress="Mascara('numero1', window.event.keyCode, 'document.cadastro.numero1');" size="30" maxlength="14" >
                    *</td>
                </tr>
                <tr>
                  <td>Telefone 2:
                    <input name="numero2" type="text" id="numero2" onKeyPress="Mascara('numero2', window.event.keyCode, 'document.cadastro.numero2');" size="30" maxlength="14" ></td>
                </tr>
                <tr>
                  <td>Celular 1:
                    <input name="celular1" type="text" id="celular1" onKeyPress="Mascara('celular1', window.event.keyCode, 'document.cadastro.celular1');" size="30" maxlength="14" ></td>
                </tr>
                <tr>
                  <td>Celular 2:
                    <input name="celular2" type="text" id="celular2" onKeyPress="Mascara('celular2', window.event.keyCode, 'document.cadastro.celular2');" size="30" maxlength="14" ></td>
                </tr>
                <tr>
                  <td>Cidade:
                    <input name="cidade" type="text" id="cidade" size="50">
                    * CEP:
                    <input name="cep" type="text" onKeyPress="Mascara('cep', window.event.keyCode, 'document.cadastro.cep');" id="cep" size="20" maxlength="9">
                    *</td>
                </tr>
                <tr>
                  <td>Estado:
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
                    </select></td>
                </tr>
                <tr>
                  <td>Endere&ccedil;o:
                    <input name="endereco" type="text" id="endereco" size="70">
                    *</td>
                </tr>
                <tr>
                  <td>N&uacute;mero:
                    <input name="numero" type="text" id="numero" size="14">
                    *
                    Complemento:
                    <input name="complemento" type="text" id="complemento" size="30"></td>
                </tr>
                <tr>
                  <td>Bairro:
                    <input name="bairro" type="text" id="bairro" size="30">
                    *</td>
                </tr>
                <tr>
                  <td>Informa&ccedil;&otilde;es:</td>
                </tr>
                <tr>
                  <td><textarea name="informacoes" id="informacoes" cols="120" rows="20"></textarea></td>
                </tr>
                <tr>
                  <td><input type="submit" name="button2" id="button2" value="Cadastrar N&uacute;mero"></td>
                </tr>
              </table>
            </form></td>
        </tr>
      </table>        </td>
    </tr>
  </table>
  <DIV class=pisos id=piso4><!-- TWITTER -->
  <DIV style="CLEAR: both"></DIV></DIV></DIV></DIV></DIV><!--fim do centro--><!--Inicio do rodape-->
<DIV style="CLEAR: both"></DIV>
<DIV id=sf_footer>
<DIV id=rodape_centro>
  <DIV class=assinatura><A class=scriptfacil title=" Casa da Web - Soluções em Marketing Digital " 
style="FONT-SIZE: 10px; COLOR: #ffffff; TEXT-DECORATION: none" 
href="http://www.casadaweb.net" target=_blank>Desenvolvido por Casa da Web</A> 
  
</DIV></DIV></DIV><!--fim do rodape --><!-- Analytics -->
</BODY></HTML>
