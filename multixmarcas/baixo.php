<table width="1000" height="350" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top"><table width="98%" height="240" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td valign="top"><table width="99%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="30%" valign="top" class="manchete_texto9m"><br /><br /><a href="ccompra.php" class="manchete_texto9m">&nbsp; &bull; &nbsp;Condições de Compra</a><br /><br /><a href="tgarantia.php" class="manchete_texto9m">&nbsp; &bull; &nbsp;Termos de Garantia</a><br /> <br />                 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><img src="imagens/termo.png" /></td>
                  </tr>
                </table>                <br /></td>
                <td align="center" width="40%"><table width="99%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center"><img src="imagens/blindado.png" width="220" height="56" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center"><img src="imagens/pagse.png" width="165" height="139" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
                <td width="30%" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><img src="imagens/branco.gif" width="1" height="20" /></td>
                  </tr>
                </table>
                  <table width="99%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="manchete_texto9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="14%"><img src="imagens/news.png" width="34" height="30" /></td>
                        <td width="86%"><strong>NEWSLETTER</strong></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                  
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                    </tr>
                  </table>
                  <table width="96%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="manchete_texto9">Cadastre-se e receba novidades da Multix Shop em seu e-mail:</td>
                    </tr>
                </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                  <script language="JavaScript" type="text/javascript">
function validarnews(formnews) { 

if (document.formnews.nome.value=="") {
alert("O Campo Nome não está preenchido!")
formnews.nome.focus();
return false
}

if (document.formnews.email.value=="") {
alert("O Campo E-mail não está preenchido!")
formnews.email.focus();
return false
}

}

                        </script>
          <form action="cadnew.php" method="post" name="formnews" onsubmit="return validarnews(this)">
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="manchete_texto9">Nome:
                      <input name="nome" type="text" style="width:210px" class="manchete_texto9" size="36" />
                      *</td>
                    </tr>
                </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                    </tr>
                    <tr>
                      <td><span class="manchete_texto9">E-mail:
                        <input name="email" type="text" style="width:209px" class="manchete_texto9" size="36" />
                      *</span></td>
                    </tr>
                </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                    </tr>
                </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><input type="submit" name="cadastrar" class="manchete_texto9" style="FONT-SIZE: 10px" value="CADASTRAR" /></td>
                    </tr>
                </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                    </tr>
                  </table>
                            </form>
                            <script language="JavaScript" type="text/javascript">
function removenews(rnews) { 

if (document.rnews.email.value=="") {
alert("O Campo E-mail não está preenchido!")
rnews.email.focus();
return false
}


}

                        </script>
          <form action="apaganew.php" method="post" name="rnews" onsubmit="return removenews(this)">
                            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                              </tr>
                              <tr>
                                <td><span class="manchete_texto9">E-mail:
                                  <input name="email" type="text" style="width:209px" class="manchete_texto9" size="36" />
                                  *</span></td>
                              </tr>
                            </table>
                            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                              </tr>
                            </table>
                            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><input type="submit" name="remover" class="manchete_texto9" style="FONT-SIZE: 10px" value="REMOVER" /></td>
                    </tr>
                  </table></form>
                </td>
              </tr>
            </table></td>
          </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="2" /></td>
            </tr>
          </table>
          <table width="98%" border="0" height="42" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="84%"><img src="imagens/cartoes.jpg" width="791" height="30" /></td>
                  <td width="16%"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                     
                      <td width="43%" align="center"><a href="https://www.facebook.com/MultixShop" target="_blank"><img src="imagens/facebook.png" border="0" alt="Acesse Nossa Página no FaceBook" title="Acesse Nossa Página no FaceBook"  /></a></td>
                      <td width="36%" align="center"><a href="callto:atendimento@multixshop.com.br"><img src="imagens/skype.png" border="0" alt="Adicione Nosso Contato no Skype" title="Adicione Nosso Contato no Skype" /></a></td>
                      <td width="11%" align="right">&nbsp;</td>
                      <td width="5%" align="right">&nbsp;</td>
                       <td width="5%" align="right">&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="14" /></td>
            </tr>
          </table>
          <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" class="fonteadm">Preços e condições estão sujeitos à alteração sem aviso prévio e são válidos apenas para compras pela internet, nesta data ou enquanto houver estoque na Loja Virtual. Vendas sujeitas à análise e confirmação. As imagens dos produtos são meramente ilustrativas. Parcela mínima de R$ 5,00.</td>
          </tr>
        </table></td>
       
      </tr>
    </table>
