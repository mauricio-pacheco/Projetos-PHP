<?php include("meta.php"); ?>
<table width="970" bgcolor="#FFFFFF" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<?php include("cima.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="4" /></td>
  </tr>
</table>
<table width="960" border="0" height="45" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#EE5F00"><?php include("menucima.php"); ?></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<?php include("bannermeio.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<table width="960" bgcolor="#000000" border="0" height="30" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td class="fontetitulo">&nbsp;&nbsp;<strong>CONTACTO</strong></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0" align="center" class="fonteadm">
      <tr>
        <td class="fonte" border="0"><script language="javascript" type="text/javascript">
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
          <script language="javascript" type="text/javascript">
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
          <form action="enviac.php" method="post" enctype="multipart/form-data" name="cadastro" id="cadastro" onsubmit="return validar(this)">
            <table width="100%" border="0" align="center">
              <tr>
                <td width="50%"><table width="100%" border="0">
                  <tr>
                    <td class="manchete_texto9" align="left">Preencha o formul&aacute;rio abaixo para entrar em contato conosco:</td>
                    <td class="manchete_texto9"><div align="right">* Campos Obrigat&oacute;rios</div></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table class="manchete_texto9" width="100%" align="left" border="0">
                  <tbody>
                    <tr>
                      <td width="68%" class="fontebaixo2"><div align="left">Nome Completo:</div></td>
                    </tr>
                    <tr>
                      <td><div align="left">
                        <input class="fonte" size="60" name="nome" />
                        * </div></td>
                    </tr>
                    <tr>
                      <td class="fontebaixo2"><div align="left">Cidade:</div></td>
                    </tr>
                    <tr>
                      <td><div align="left">
                        <input class="fonte" size="36" name="cidade" />
                      </div></td>
                    </tr>
                    <tr>
                      <td class="fontebaixo2"><div align="left">Telefone:</div></td>
                    </tr>
                    <tr>
                      <td><div align="left">
                        <input name="telefone" class="fonte" onkeypress="Mascara('telefone', window.event.keyCode, 'document.cadastro.telefone');" size="14" maxlength="14"  />
                        * </div></td>
                    </tr>
                    <tr>
                      <td class="fontebaixo2"><div align="left">E-mail:</div></td>
                    </tr>
                    <tr>
                      <td><div align="left">
                        <input class="fonte" size="40" name="email2" />
                        * </div></td>
                    </tr>
                    <tr>
                      <td class="fontebaixo2"><div align="left">Mensagem / Sugest&otilde;es</div></td>
                    </tr>
                    <tr>
                      <td><div align="left">
                        <textarea class="fonte" name="mensagem" rows="12" cols="80"></textarea>
                      </div></td>
                    </tr>
                    <tr>
                      <td><div align="left">
                        <input class="fonte" type="submit" value="ENVIAR DADOS" name="submit" />
                      </div></td>
                    </tr>
                  </tbody>
                </table></td>
              </tr>
            </table>
          </form></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<?php include("ft.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<?php include("pubbaixo.php"); ?>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="8" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>