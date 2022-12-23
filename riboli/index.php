<?php include("meta.php"); ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="20%" background="imagens/fesquerdo.jpg">&nbsp;</td>
    <td width="60%" valign="top"><?php include("tcima.php"); ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="32" /></td>
        </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="30%" valign="top"><table width="281" background="imagens/quadrante.png" height="247" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" height="16" /></td>
                </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="4%"><img src="imagens/branco.gif" width="4" /></td>
                  <td width="95%" align="center"><img src="imagens/t1.png" /></td>
                  <td width="1%"><img src="imagens/branco.gif" width="18" /></td>
                </tr>
              </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" height="4" /></td>
                  </tr>
                </table>
               <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_links ORDER BY id DESC LIMIT 4");

while($y = mysql_fetch_array($sql))
   {
   ?> <table width="100%" height="30" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="1%"><img src="imagens/branco.gif" width="4" /></td>
                    <td width="9%" class="fonte"><img src="imagens/links.png" /></td>
                    <td width="84%" class="fonte">&nbsp;
                      <div align="justify" class="menu"><a href="<?php echo $y["link2"]; ?>" class="fonte" target="_blank"><?php echo $y["titulo"]; ?></a></div></td>
                    <td width="6%"><img src="imagens/branco.gif" width="18" /></td>
                  </tr>
                </table>
               <table width="100%" border="0">
                 <tr>
                   <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                 </tr>
               </table>
               <?php } ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="imagens/branco.gif" height="4" /></td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
          <td width="3%"><img src="imagens/branco.gif" width="44" /></td>
          <td width="30%" valign="top"><table width="281" background="imagens/quadrante.png" height="247" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" height="3" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" height="16" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="4%"><img src="imagens/branco.gif" width="4" /></td>
                  <td width="95%" align="center"><img src="imagens/t2.png" /></td>
                  <td width="1%"><img src="imagens/branco.gif" width="18" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" height="4" /></td>
                </tr>
              </table>
              <table width="100%" height="30" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="1%"><img src="imagens/branco.gif" width="4" /></td>
                  <td width="86%" class="fonte"><b>Para encaminhar uma ação são necessarios os seguintes documentos:</b><br /><br />
                    - Fotocopia da identidade e do CPF<br />
                    - Um comprovante de residencia<br />
                    - Procuração e a declaração de hipossuficiencia.<br /><br />
                    Os outros documentos de cada ação especifica acesse em documentos para visualizar.<br /><br />
                    <a href="documentos.php" class="fonte">CLIQUE AQUI PARA MAIS INFORMAÇÕES</a></td>
                  <td width="6%"><img src="imagens/branco.gif" width="18" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" height="4" /></td>
                </tr>
</table></td>
            </tr>
          </table></td>
          <td width="5%"><img src="imagens/branco.gif" width="44" /></td>
          <td width="32%" valign="top"><table width="281" background="imagens/quadrante.png" height="247" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" height="3" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" height="16" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="4%"><img src="imagens/branco.gif" width="4" /></td>
                  <td width="95%" align="center"><img src="imagens/t3.png" /></td>
                  <td width="1%"><img src="imagens/branco.gif" width="18" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" height="4" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="4%"><img src="imagens/branco.gif" width="4" /></td>
                  <td width="95%" class="fonte"><p class="fonte"><strong><font color="#B30015">STF:</font></strong> <a href="http://www.stf.jus.br" target="_blank" class="fonte">http://www.stf.jus.br</a></p>
                    <p class="fonte"><strong><font color="#B30015">STJ:</font></strong> <a href="http://www.stj.gov.br" target="_blank" class="fonte">http://www.stj.gov.br</a></p>
                    <p class="fonte"><strong><font color="#B30015">TRF4:</font></strong> <a href="http://www.trf4.jus.br" target="_blank" class="fonte">http://www.trf4.jus.br</a></p>
                    <p class="fonte"><strong><font color="#B30015">TJRS:</font></strong> <a href="http://www.tjrs.jus.br" target="_blank" class="fonte">http://www.tjrs.jus.br</a></p></td>
                  <td width="1%"><img src="imagens/branco.gif" width="18" /></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" height="4" /></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="20" /></td>
        </tr>
    </table>
      <?php include("tbaixo.php"); ?>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="12" /></td>
        </tr>
    </table></td>
    <td width="20%" background="imagens/fdireita.jpg">&nbsp;</td>
  </tr>
</table>
</body>
</html>