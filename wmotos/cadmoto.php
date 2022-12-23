<?php require("verifica.php"); ?>
<?php
include("fckeditor/fckeditor.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE>Westphalen Motos - Concessionária Honda</TITLE><LINK href="home_arquivos/asw.css" 
type=text/css rel=stylesheet>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
<META content="MSHTML 6.00.6000.16386" name=GENERATOR>
<style type="text/css">
<!--
.style15 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #333333;
}
.style24 {color: #FEDC01}
.style16 {color: #333333}
.style17 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
</HEAD>
<BODY>
<DIV id=asw>
<DIV id=pagina>
<DIV id=topo>
<H1 id=logo>Westphalen Motos</H1>
<UL>
  <LI></LI>
  <LI></LI>
</UL>
</DIV>
<DIV id=menu>
<?php include("menuadm.php"); ?></DIV>
<P align="center" class=destaque>Setor Administrativo Westphalen Motos</P>
<P align="center" class=destaque>&nbsp;</P>
<form name="form1" action="cadproduto.php" method="post" enctype="multipart/form-data"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center">CADASTRAR MOTO</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Cidade da Loja: <span class="style24">
    <select class="caixacontato" 
                              name="cidade">
      <option value="frederico">Frederico Westphalen</option>
      <option value="palmera">Palmeira das Missões</option>
    </select>
    </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style15">Modelo: 
        <input name="modelo" type="text" size="60" />
    </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Estado: <span class="style24">
    <select class="caixacontato" 
                              name="estado">
      <option value="Nova">Nova</option>
      <option value="Semi-Nova">Semi-Nova</option>
    </select>
    <span class="style16">Ano:      </span>
    <select name="ano" id="ano" class="busca" style="font-size:13px;font-family:tahoma">
        <option value="">Ano</option>
        <option value="1980">1980</option>
        <option value="1981">1981</option>
        <option value="1982">1982</option>
        <option value="1983">1983</option>
        <option value="1984">1984</option>
        <option value="1985">1985</option>
        <option value="1986">1986</option>
        <option value="1987">1987</option>
        <option value="1988">1988</option>
        <option value="1989">1989</option>
        <option value="1990">1990</option>
        <option value="1991">1991</option>
        <option value="1992">1992</option>
        <option value="1993">1993</option>
        <option value="1994">1994</option>
        <option value="1995">1995</option>
        <option value="1996">1996</option>
        <option value="1997">1997</option>
        <option value="1998">1998</option>
        <option value="1999">1999</option>
        <option value="2000">2000</option>
        <option value="2001">2001</option>
        <option value="2002">2002</option>
        <option value="2003">2003</option>
        <option value="2004">2004</option>
        <option value="2005">2005</option>
        <option value="2006">2006</option>
        <option value="2007">2007</option>
        <option value="2008">2008</option>
        <option value="2009">2009</option>
        <option value="2010">2010</option>
        <option value="2011">2011</option>
        <option value="2012">2012</option>
      </select>
    </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style15">Cor:
        <input name="cor" type="text" size="30" />
    </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style17"><span class="style16">Foto de Apresentação: </span></span>
      <input type="file" name="fotomenor" id="fotomenor"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style17"><span class="style16">Foto 1: </span></span>
      <input type="file" name="foto1" id="foto1"/></td>
  </tr>
  <tr>
    <td><span class="style17"><span class="style16">Foto 2: </span></span>
      <input type="file" name="foto2" id="foto2"/></td>
  </tr>
  <tr>
    <td><span class="style17"><span class="style16">Foto 3: </span></span>
      <input type="file" name="foto3" id="foto3"/></td>
  </tr>
  <tr>
    <td><span class="style17"><span class="style16">Foto 4: </span></span>
      <input type="file" name="foto4" id="foto4"/></td>
  </tr>
  <tr>
    <td><span class="style17"><span class="style16">Foto 5: </span></span>
      <input type="file" name="foto5" id="foto5"/></td>
  </tr>
  <tr>
    <td><span class="style17"><span class="style16">Foto 6: </span></span>
      <input type="file" name="foto6" id="foto6"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Descricao:</td>
  </tr>
  <tr>
    <td><?php
									$editor = new FCKeditor("descricao");
									$editor->BasePath = "fckeditor/";
									$editor->Value = "";
									$editor->Width = "700";
									$editor->Height = "360";
									$editor->Create();
									?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style17">
      <input type="submit" value="Cadastrar" />
    </span></td>
  </tr>
</table>
</form>
<P align="center" class=destaque>&nbsp;</P>
</DIV>
<DIV id=rodape><br>
  <?php include("baixo.php"); ?>
</DIV>
<DIV id=fim></DIV>
</DIV></BODY></HTML>
