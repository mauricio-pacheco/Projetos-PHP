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
          <td><?php
include "administrador/conexao.php";

$arquivo = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x = 640;
$max_image_y = 480;
$diretorio = 'administrador/fotos/';
if($arquivo)
{
    $tamanho = getimagesize($arquivo["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "administrador/funcoesgalerias.php";
    $err = FALSE;
    if(is_uploaded_file($arquivo['tmp_name']))
    {
        if(verifica_image($arquivo))
        {
            $tamanho = getimagesize($arquivo["tmp_name"]);
            $dimensiona = verifica_dimensao_image($arquivo, $max_image_x, $max_image_y);
            if($dimensiona != '')
            {
                if($dimensiona == 'altura')
                {
                        $auxImage = $max_image_x;
                        $max_image_x = $max_image_y;
                        $max_image_y = $auxImage;
                }
            }
            else
            {
                $max_image_x = $tamanho[0];
                $max_image_y = $tamanho[1];
            }
            
            $nome_foto  = ('imagem_' . time() . '.' . verifica_extensao_image($arquivo));// nome &uacute;nico para foto
            $endFoto = $diretorio . $nome_foto;
            if(reduz_imagem($arquivo['tmp_name'], $max_image_x, $max_image_y, $endFoto))
            {
                $err = TRUE;
            }  
        }
    }
}



$nome = $_POST["nome"];
$numero1 = $_POST["numero1"];
$numero2 = $_POST["numero2"];
$celular1 = $_POST["celular1"];
$celular2 = $_POST["celular2"];
$cidade = $_POST["cidade"];
$cep = $_POST["cep"];
$estado = $_POST["estado"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$informacoes = $_POST["informacoes"];
$data = date ("j/m/Y");
$hora = date ("H:i:s");


$sql = "INSERT INTO telefones (nome, foto, numero1, numero2, celular1, celular2, cidade, cep, estado, endereco, numero, complemento, bairro, informacoes, data, hora, status) VALUES ('$nome', '$nome_foto', '$numero1', '$numero2', '$celular1', '$celular2', '$cidade', '$cep', '$estado', '$endereco', '$numero', '$complemento', '$bairro', '$informacoes', '$data', '$hora', '1')";
if(mysql_query($sql)) {
echo "<div align=center><br>O N&uacute;mero foi cadastrado com sucesso!!</div>";
}else{
echo "<div align=center><br>N&atilde;o foi possivel efetuar o seu cadastro!</div>";
}
 
?></td>
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
                    </SCRIPT></td>
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
