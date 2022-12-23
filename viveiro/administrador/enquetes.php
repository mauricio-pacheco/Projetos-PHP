<?php include("cima.php"); ?>
<table width="100%" background="imagens/geral2.png" height="210" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','210'); 
    </SCRIPT></td>
      </tr>
    </table></td>
  </tr>
</table>
<table class="boxSombra" width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="24%" bgcolor="#F0F0F0" valign="top"><?php include("menu.php"); ?>
        
</td>
        <td width="76%" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
          </table>
          <table width="100%" border="0" align="center">
            <tr>
              <td width="11%" height="30" bgcolor="#076CA0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>CADASTRAR ENQUETE</b></font></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr></tr>
          <tr>
            <td><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td><script language=javascript>
function validar(form1) { 

if (document.form1.pergunta.value=="") {
alert("O Campo Pergunta não está preenchido!")
form1.pergunta.focus();
return false
}

}

                        </SCRIPT>
              <form name="form1" action="cadenquete.php" method="post" enctype="multipart/form-data" onSubmit="return validar(this)">
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Pergunta: 
                      <input name="pergunta" type="text" class="fontetabela" id="pergunta" size="100" />
                      *</td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Opção 1: 
                      <input name="op1" type="text" class="fontetabela" id="op1" size="70" />
                      Foto 1: 
                      <input name="foto1" type="file" class="fontetabela" /></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Opção 2: 
                      <input name="op2" type="text" class="fontetabela" id="op2" size="70" />
Foto 2:
<input name="foto2" type="file" class="fontetabela" /></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Opção 3: 
                      <input name="op3" type="text" class="fontetabela" id="op3" size="70" />
Foto 3:
<input name="foto3" type="file" class="fontetabela" /></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Opção 4: 
                      <input name="op4" type="text" class="fontetabela" id="op4" size="70" />
Foto 4:
<input name="foto4" type="file" class="fontetabela" /></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Opção 5: 
                      <input name="op5" type="text" class="fontetabela" id="op5" size="70" />
Foto 5:
<input name="foto5" type="file" class="fontetabela" /></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Opção 6: 
                      <input name="op6" type="text" class="fontetabela" id="op6" size="70" />
Foto 6:
<input name="foto6" type="file" class="fontetabela" /></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Opção 7: 
                      <input name="op7" type="text" class="fontetabela" id="op7" size="70" />
Foto 7:
<input name="foto7" type="file" class="fontetabela" /></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Opção 8: 
                      <input name="op8" type="text" class="fontetabela" id="op8" size="70" />
Foto 8:
<input name="foto8" type="file" class="fontetabela" /></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Opção 9: 
                      <input name="op9" type="text" class="fontetabela" id="op9" size="70" />
Foto 9:
<input name="foto9" type="file" class="fontetabela" /></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                
                 <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela">Opção 10: 
                      <input name="op10" type="text" class="fontetabela" id="op10" size="70" />
Foto 10:
<input name="foto10" type="file" class="fontetabela" /></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td class="fontetabela"><img src="imagens/branco.gif" width="2" height="2" /></td>
                  </tr>
                </table>
                
                <table width="100%" border="0">
                  <tr>
                  <td class="fontetabela" align="left"><input name="button" type="submit" class="fontetabela" value="Cadastrar Enquete" /></td>
                </tr>
              </table>
                <table width="100%" border="0">
                  <tr>
                  <td>   </td>
                </tr>
              </table></form></td>
              </tr>
            </table></td>
          </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr></tr>
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="2" /></td>
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
      </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>