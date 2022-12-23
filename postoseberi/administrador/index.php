<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML lang=pt-BR xml:lang="pt-BR" 
xmlns="http://www.w3.org/1999/xhtml"><HEAD><TITLE>Posto Seberi</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<META content=pt-BR http-equiv=Content-language>
<META name=description 
content="Descrição">
<META name=keywords 
content="palavras, chave"><LINK rel="Shortcut icon" type=image/x-icon 
href="home_arquivos/favicon.ico">

<STYLE type=text/css>@import url( home_arquivos/default.css );
@import url( home_arquivos/pais.css );
</STYLE>

<META name=GENERATOR content="MSHTML 8.00.6001.18702"></HEAD>
<BODY>
<DIV id=layout>
<DIV id=topo>
<DIV id=topo-mg>
  <table width="100%" border="0">
    <tr>
      <td width="41%" valign="top"><img src="home_arquivos/logotipo.png"></td>
      <td width="23%">&nbsp;</td>
      <td width="36%"><img src="adm.png" width="300" height="80"></td>
    </tr>
  </table>
</DIV>
<table width="98%" border="0">
  <tr>
    <td><img src="home_arquivos/branco.gif" width="2" height="20"></td>
  </tr>
</table>

<table width="950" align="left" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</DIV></DIV>
</DIV>
</DIV>
<DIV id=rodape>

<table width="976" background="home_arquivos/fundo.jpg" border="0" align="center">
  <tr>
    <td valign="top"><table width="99%" border="0" align="center">
      <tr>
        <td width="21%" valign="top">
        <?php include("menu.php"); ?>
       </td>
        <td width="79%" valign="top"><table width="100%" border="0">
          <tr>
            <td><table width="100%" border="0">
              <tr>
                <td width="1%"><img src="barra1.jpg" width="30" height="38"></td>
                <td width="99%" align="left" background="barra11.jpg">&nbsp;&nbsp;&nbsp;<b>Administrador</b></td>
                </tr>
              </table>
              <table width="100%" border="0">
                <tr>
                  <td width="1%" valign="top"><table width="100%" border="0">
                    <tr>
                      <td width="6" background="traco.jpg">&nbsp;</td>
                      <td width="770">
                        <table width="96%" border="0" align="center">
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

                        </SCRIPT>
                              <form action="auth.php" method="post" name="form1" id="form2" onSubmit="return validar(this)">
                                <p align="center">&nbsp;</p>
                                <p align="center"><img src="acd.jpg"></p>
                                <p align="center">ÁREA RESTRITA</p>
                                <p align="center">Digite o Usuário e a Senha para acessar o Módulo Administrativo</p>
                                <p align="center">* Campos Obrigat&oacute;rios</p>
                                <div align="center">
                                  <table width="27%" border="0">
                                    <tr>
                                      <td width="47">Usu&aacute;rio: </td>
                                      <td width="243"><span class="style15">
                                        <input name="usuario" type="text" class="texto" size="16" />
                                        <span class="style9"> *</span></span></td>
                                    </tr>
                                    <tr>
                                      <td>Senha:</td>
                                      <td><span class="style15">
                                        <input name="password" type="password" class="texto" size="16" />
                                      </span> <span class="style15"> <span class="style9"> *</span></span></td>
                                    </tr>
                                  </table>
                                </div>
                                <p align="center" class="style15">
                                  <input type="submit" class="texto" value="Entrar" />
                                  &nbsp;&nbsp;
                                  <input class="texto" type="reset" value="Limpar" />
                                </p>
                              </form></td>
                          </tr>
                        </table>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p></td>
                      </tr>
                    </table>                   </td>
                  </tr>
                </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<DIV id=rodape-baixo>
  <DIV class=conteudo>
  <DIV id=direitos>
 <?php include("baixo.php"); ?><BR class=clr></DIV></DIV></DIV></DIV></BODY></HTML>
