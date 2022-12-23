<?php include("meta.php"); ?>
<table width="100%" height="91" background="imagens/bloco12.jpg" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="100%" height="24" background="imagens/bloco2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("slides.php"); ?>
      <table width="1000" bgcolor="#EBEBEB" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
      <table width="1000" background="imagens/barracentro.png" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td valign="top"><table width="992" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="231" valign="top"><?php include("menulateral.php"); ?></td>
            <td width="761" valign="top"><table height="30" background="imagens/funtotabelamaior.png" bgcolor="#535353" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fontetabela5" align="right"><strong>Cadastro</strong>&nbsp;&nbsp;</td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="16" /></td>
                </tr>
              </table>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><table bgcolor="#FBFBFB" width="600" border="0" align="center">
                    <tr>
                      <td bgcolor="#FBFBFB" width="48%" valign="top"><table width="100%" height="30" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td align="center" bgcolor="#FBFBFB" class="fontetitulo5">Já sou cliente!</td>
                        </tr>
                      </table>
                        <table width="100%" height="20" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="manchete_texto9m" align="center">Para pessoas já cadastradas no site.</td>
                          </tr>
                        </table>
                        <script language="javascript" type="text/javascript">
function validarlogin2(formlogin2) { 

if (document.formlogin2.usuario.value=="") {
alert("O Campo Usuário não está preenchido!")
formlogin2.usuario.focus();
return false
}

if (document.formlogin2.senha.value=="") {
alert("O Campo Senha não está preenchido!")
formlogin.senha2.focus();
return false
}

}

                        </script>
                        <form action="autoriza.php" method="post" name="formlogin2" id="formlogin2" onsubmit="return validarlogin2(this)">
                          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td class="manchete_texto9">E-mail:
                                <input type="text" name="email" />
                                *</td>
                            </tr>
                            <tr>
                              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                            </tr>
                            <tr>
                              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                            </tr>
                            <tr>
                              <td class="manchete_texto9">Senha:
                                <input type="password" name="senha" />
                                *</td>
                            </tr>
                            <tr>
                              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                            </tr>
                            <tr>
                              <td class="manchete_texto9"><a href="esenha.php" class="manchete_texto9">Esqueci minha senha</a></td>
                            </tr>
                            <tr>
                              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                            </tr>
                            <tr>
                              <td class="manchete_texto9"><input name="button" type="submit" class="manchete_texto9m" value="Continuar" /></td>
                            </tr>
                          </table>
                        </form></td>
                      <td width="4%">&nbsp;</td>
                      <td bgcolor="#FBFBFB" width="48%" valign="top"><table width="100%" height="30" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="fontetitulo5" bgcolor="#FBFBFB" align="center">Primeira Compra?</td>
                        </tr>
                      </table>
                        <table width="100%" height="20" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="manchete_texto9m" align="center">Para pessoas não cadastradas.</td>
                          </tr>
                        </table>
                        <form action="vaicep.php" method="post" name="formcep" id="formcep">
                        <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                         
                          <tr>
                            <td class="manchete_texto9">CEP:                              <input name="cep" type="text" size="12" /></td>
                          </tr>
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                          </tr>
                                                   <tr>
                            <td class="manchete_texto9">Pessoa:</td>
                          </tr>
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                          </tr>
                          <tr>
                            <td class="manchete_texto9"><input name="pessoa" type="radio" id="radio" value="Física" checked="checked" />
                              Física
                              <input type="radio" name="pessoa" id="radio" value="Jurídica" />
                              Jurídica </td>
                          </tr>
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                          </tr>
                          <tr>
                            <td class="manchete_texto9"><input name="button2" type="submit" class="manchete_texto9m" value="Continuar" /></td>
                          </tr>
                        </table></form></td>
                    </tr>
                  </table>
                    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td bgcolor="#FBFBFB"><img src="imagens/branco.gif" width="1" height="8" /></td>
                      </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
                    <table width="70%" height="80" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td class="manchete_texto9" align="center">Aqui temos sigilo e respeito com suas informações.<br />
                        Seus dados são utilizados somente para emissão da nota fiscal e simplificar  compras futuras.</td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="12" /></td>
                </tr>
</table></td>
          </tr>
        </table></td>
      </tr>
  </table></td>
  </tr>
</table>
<table width="100%" height="120" background="imagens/blocoabaixo.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="16" /></td>
      </tr>
    </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>