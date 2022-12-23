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
.style16 {color: #333333}
.style17 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style26 {font-size: 12px}
.style27 {BORDER-TOP: #EF2F72 0px solid; FONT-SIZE: 11px; MARGIN: 1px; BORDER-LEFT: #EF2F72 0px solid; BORDER-BOTTOM: #EF2F72 1px solid; HEIGHT: 20px; BACKGROUND-COLOR: #ffffff; border-right: #EF2F72 0px solid;}
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
<table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center">LOGIN</div></td>
  </tr>
  <tr>
    <td><span class="style16"></span></td>
  </tr>
  <tr>
    <td><script language=javascript>
function validar(form1) { 

if (document.form1.usuario.value=="") {
alert("O Campo Usuário não está preenchido!")
form1.usuario.focus();
return false
}

if (document.form1.password.value=="") {
alert("O Campo Senha não está preenchido!")
form1.password.focus();
return false
}

}

</SCRIPT><form action="auth.php" method="post" name="form1" class="style16" id="form1" onSubmit="return validar(this)">
      <p align="center"><span class="style26">* Campos Obrigat&oacute;rios</span></p>
      <div align="center">
        <table width="23%" border="0">
          <tr>
            <td width="47"><span class="style17"><span class="style26">Usuário: </span></span></td>
            <td width="243"><span class="style17">
              <input name="usuario" type="text" size="16" />
               *</span></td>
          </tr>
          <tr>
            <td><span class="style17"><span class="style26">Senha:</span></span></td>
            <td><span class="style17">
              <input name="password" type="password" size="16" />
            </span> <span class="style17">  *</span></td>
          </tr>
        </table>
      </div>
      <p align="center" class="style17">
        <input type="submit" class="texto" value="Entrar" />
        &nbsp;&nbsp;
        <input class="texto" type="reset" value="Limpar" />
      </p>
    </form></td>
  </tr>
  <tr>
    <td><span class="style16"></span></td>
  </tr>
</table>
<P align="center" class=destaque>&nbsp;</P>
</DIV>
<DIV id=rodape><br>
  <?php include("baixo.php"); ?>
</DIV>
<DIV id=fim></DIV>
</DIV></BODY></HTML>
