<?php include("meta.php"); ?>
<table width="100%" height="158" background="imagens/cabecalho.png" border="0" cellspacing="0" cellpadding="0">
<tr></tr>
<tr>
  <td valign="top"><table width="100%" background="imagens/fundotabela.jpg" height="120" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="top"><?php include("cima.php"); ?></td>
    </tr>
  </table>
    <?php include("menu.php"); ?></td>
</tr>
</table>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="2" valign="top" bgcolor="#D62718"><img src="imagens/branco.gif" width="1" height="1" /></td>
    <td width="996" valign="top"><?php include("slides.php"); ?></td>
    <td width="2" valign="top" bgcolor="#D62718"><img src="imagens/branco.gif" width="1" height="1" /></td>
  </tr>
</table>
<table width="1000" align="center" bgcolor="#D62718" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="2" /></td>
  </tr>
</table>
<table width="1000" border="0" background="imagens/fundogeral2.png" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="2" valign="top" bgcolor="#D62718"><img src="imagens/branco.gif" width="1" height="1" /></td>
    <td width="996" valign="top" background="imagens/prin.jpg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="6" /></td>
          </tr>
        </table>
          <table width="98%" border="0" height="210" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="top" width="34%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
                <table width="420" background="imagens/ft.png" height="180" border="1" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td valign="top"> <form action="buscaprodutos.php" method="post" name="form1" id="form1">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="40" /></td>
                    </tr>
                  </table>
                  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="manchete_texto9" align="center"><strong class="manchete_texto99">Pesquisar Produtos</strong></td>
                      </tr>
                    </table>
                  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                      </tr>
                    </table>
                  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="manchete_texto9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="11%" class="manchete_texto99">Modelo:</td>
                          <td width="89%"><input name="palavra" style="font-size:12px; height:24px; width:350px; color:#333; background-color:#f9f9f9" type="text" onclick="this.value=''" value=" DIGITE O NOME DO PRODUTO DESEJADO!" /></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                      </tr>
                    </table>
                  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="manchete_texto9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="12%" class="manchete_texto99">Categoria:</td>
                          <td width="2%">&nbsp;</td>
                          <td width="8%"><span class="manchete_texto">
                            <select class="manchete_texto9" name="iddep" style="font-size:12px; height:24px; width:243px; color:#333; background-color:#f9f9f9">
                              <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_depprod ORDER BY nome ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center class=tahomafonte><b>N&atilde;o existe departamentos cadastrados!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                              <option value="<?php echo $n["id"]; ?>"><?php echo $n["nome"]; ?></option>
                              <?
  }
  }
 ?>
                            </select>
                          </span></td>
                          <td width="78%"><input name="input" type="image" src="imagens/pesquisar2.png" /></td>
                          </tr>
                        </table></td>
                      </tr>
                    </table>
                  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                      </tr>
                    </table>
                  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                      </tr>
              </table></form></td>
                </tr>
            </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
              <td valign="top" width="33%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
                <table width="420" height="180" background="imagens/ft.png" border="1" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td valign="top">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="1" height="40" /></td>
                        </tr>
                      </table>
                      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td class="manchete_texto9" align="center"><strong class="manchete_texto99">Newsletter</strong></td>
                        </tr>
                      </table>
                      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                        </tr>
                      </table>
                      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td class="manchete_texto9"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td class="manchete_texto9"><span class="manchete_texto99">Cadastre seu e-mail e receba as novidades da Polaco Motos:</span><br /></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table>
                      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                        </tr>
                      </table>
                      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td class="manchete_texto9"><script language=javascript>
                function validar(cadastro) { 
				var filtro_mail = /^.+@.+\..{2,3}$/
if (!filtro_mail.test(cadastro.email.value) || cadastro.email.value=="") {
alert("Preencha o e-mail corretamente.");
cadastro.email.focus();
return false
}
}
</script>
                <form action="cadnew.php" method="post" name="cadastro" onSubmit="return validar(this)"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="58%"><span class="manchete_texto9">
                      <input name="email" style="font-size:12px; height:24px; width:280px; color:#333; background-color:#f9f9f9" type="text" onclick="this.value=''" value=" DIGITE SEU E-MAIL!" />
                    </span></td>
                    <td width="42%"><input name="input" type="image" src="imagens/cadastrar.png" /></td>
                  </tr>
                </table></form></td>
                    </tr>
                  </table>
                      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                        </tr>
                      </table>
                      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                        </tr>
                      </table>
                </form></td>
                  </tr>
          </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="6" /></td>
            </tr>
      </table></td>
      </tr>
    </table></td>
    <td width="2" valign="top" bgcolor="#D62718"><img src="imagens/branco.gif" width="1" height="1" /></td>
  </tr>
</table>
<table width="100%" bgcolor="#D62718" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="1" height="2" /></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>