<table bgcolor="#FFFFFF" width="100%" border="0">
          <tr></tr>
          <tr>
            <td>
            
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#f9f9f9" onclick="window.location='index.php';" onmouseover="this.style.backgroundColor='#f5f5f5'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="1%"><img src="imagens/casa.png" /></td>
                        <td width="100%" class="fontemenu2">&nbsp;&nbsp;<b>P&Aacute;GINA PRINCIPAL</b></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            
            
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#f9f9f9" onclick="window.location='pacotes.php';" onmouseover="this.style.backgroundColor='#f5f5f5'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="1%"><img src="imagens/iconeturismo2.png" /></td>
                        <td width="100%" class="fontemenu2">&nbsp;&nbsp;<b>PACOTES INTERNACIONAIS</b></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#f9f9f9" onclick="window.location='destaques.php';" onmouseover="this.style.backgroundColor='#f5f5f5'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="1%"><img src="imagens/iconeturismo2.png" /></td>
                        <td width="100%" class="fontemenu2">&nbsp;&nbsp;<b>PACOTES NACIONAIS</b></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#f9f9f9" onclick="window.location='agendas.php';" onmouseover="this.style.backgroundColor='#f5f5f5'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="1%"><img src="imagens/iconeturismo2.png" /></td>
                        <td width="100%" class="fontemenu2">&nbsp;&nbsp;<b>AGENDA DE VIAGENS</b></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
             
             <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_conteudo ORDER BY id ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?> 
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF" style="margin-bottom:4px">
                    <tr>
                      <td height="24" bordercolor="#A7D2EF" bgcolor="#f9f9f9" onclick="window.location='conteudo.php?id=<?php echo $y["id"]; ?>';" onmouseover="this.style.backgroundColor='#f5f5f5'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="1%"><img src="imagens/iconeturismo.png" /></td>
                          <td width="100%" class="fontemenu">&nbsp;&nbsp;<b><?php echo $y["titulo"]; ?></b></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              
        <?php
  }
  }
 ?>      
     
     
     <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#f9f9f9" onclick="window.location='localiza.php';" onmouseover="this.style.backgroundColor='#f5f5f5'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="1%"><img src="imagens/localiza.png" /></td>
                        <td width="100%" class="fontemenu2">&nbsp;&nbsp;<b>LOCALIZA&Ccedil;&Atilde;O</b></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            
            
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#f9f9f9" onclick="window.location='aereas.php';" onmouseover="this.style.backgroundColor='#f5f5f5'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="1%"><img src="imagens/plane.png" /></td>
                        <td width="100%" class="fontemenu2">&nbsp;&nbsp;<b>PASSAGENS A&Eacute;REAS</b></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="1" bordercolor="#FFFFFF" style="margin-bottom:4px">
                  <tr>
                    <td height="24" bordercolor="#A7D2EF" bgcolor="#f9f9f9" onclick="window.location='contatos.php';" onmouseover="this.style.backgroundColor='#f5f5f5'; this.style.color='#252525'; this.style.cursor='pointer'" onmouseout="this.style.backgroundColor='#f9f9f9'; this.style.color='#252525';"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="1%"><img src="imagens/cont.png" /></td>
                        <td width="100%" class="fontemenu2">&nbsp;&nbsp;<b>CONTATOS</b></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
              
              
              </td>
          </tr>
        </table>