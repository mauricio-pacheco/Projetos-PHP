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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>CADASTRAR SUB-DEPARTAMENTO DOS IMÓVEIS</b></font></td>
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
            <td><table width="100%" border="0" align="center">
              <tr>
                <td><script language="JavaScript" type="text/javascript">
function validar(form1) { 

if (document.form1.departamento.value=="") {
alert("O Campo Título do Menu não está preenchido!")
form1.departamento.focus();
return false
}

}

                        </script>
                  <form action="cadsubdepprod.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validar(this)">
                    <table width="100%" border="0" align="center">
                      <tr>
                        <td class="manchete_texto" align="left">T&iacute;tulo do Sub-Departamento: <span class="style15">
                          <input name="nomesub" type="text" class="fontetabela" size="60" />
                        </span> *</td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Selecione o Departamento: 
                          <select class="fontetabela" name="iddep">
                            <?php

include "conexao.php";

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
                          </select></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left"><span style="MARGIN: 0px">
                          <input name="submit" class="fontetabela" type="submit" style="FONT-SIZE: 10px" value="CADASTRAR SUB-DEPARTAMENTO" />
                        </span></td>
                      </tr>
                    </table>
                  </form></td>
              </tr>
            </table></td>
          </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr></tr>
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
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