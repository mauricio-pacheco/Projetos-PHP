<?php include("cimaind.php"); ?>
<table width="100%" background="imagens/geral2.png" height="210" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/principal.swf','980','210'); 
    </SCRIPT></td>
      </tr>
    </table></td>
  </tr>
</table>
<table class="boxSombra" width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="76%" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>&nbsp;</td>
              </tr>
            </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><script language="JavaScript" type="text/javascript">
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

                        </script>
              <form action="auth.php" method="post" name="form1" id="form2" onsubmit="return validar(this)">
                <br /><p align="center">&nbsp;</p>
                <p align="center">&nbsp;</p>
<p align="center"><img src="imagens/login.jpg" /></p>
                <p align="center" class="fontetabela"><strong>&Aacute;REA RESTRITA</strong></p><br />
                <p align="center" class="fontetabela">Digite o Usu&aacute;rio e a Senha para acessar o M&oacute;dulo Administrativo</p><p align="center" class="fontetabela">&nbsp;</p>
                <div align="center">
                  <table width="19%" border="0">
                    <tr>
                      <td width="47" class="fontetabela" align="right">Usu&aacute;rio: </td>
                      <td width="243"><span class="fontetabela">
                        <input name="usuario" type="text" class="fontetabela" size="16" />
                        *</span></td>
                    </tr>
                    <tr>
                      <td class="fontetabela" align="right">Senha:</td>
                      <td><span class="fontetabela">
                        <input name="password" type="password" class="fontetabela" size="16" />
                        *</span></td>
                    </tr>
                  </table>
                </div>
                <p align="center" class="manchete_texto"> <span class="fontetabela">
                  <input type="submit" class="fontetabela" value="&nbsp;ENTRAR&nbsp;" />
                  &nbsp;&nbsp;
                  <input class="fontetabela" type="reset" value="&nbsp;LIMPAR&nbsp;" /><br /><br />
                </span><span class="fontetabela">* Campos Obrigat&oacute;rios</span></p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
<p>&nbsp;</p>
                <p><br />
                </p>
              </form></td>
                </tr>
              </table></td>
              </tr>
            </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
            <td>&nbsp;</td>
          </tr>
          </table></td>
        </tr>
    </table>
    </td>
  </tr>
</table>
<table width="100%" background="imagens/rodape.png" height="104" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="8" /></td>
      </tr>
    </table>
      <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="22" /></td>
        </tr>
      </table><?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>