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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>EDITAR SUB-SESSÃO</b></font></td>
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

if (document.form1.nome.value=="") {
alert("O Campo Título da Sessão não está preenchido!")
form1.nome.focus();
return false
}

}

                        </script>
                  <form action="updatesubsessao.php" method="post" enctype="multipart/form-data" name="form1" id="form1" onsubmit="return validar(this)">
                    <?php

include "conexao.php";

$idnovato = $_GET['id'];
$sql = mysql_query("SELECT * FROM cw_subsessoes WHERE id='$idnovato' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&Atilde;O EXISTE SUB-SESSÃO CADASTRADO!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                    <table width="100%" border="0" align="center">
                      <tr>
                        <td class="manchete_texto" align="left">T&iacute;tulo da Sub-Sessão: <span class="style15">
                          <input name="subsessao" type="text"  value="<?php echo $n["subsessao"]; ?>" class="fontetabela" size="60" />
                        </span> *<span class="rodape">
                        <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />
                        </span></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left">Selecione a Sessão:
                          <select class="fontetabela" name="idsessao">
                            <?php

$idnovato2 = $n["idsessao"];



$sql2 = mysql_query("SELECT * FROM cw_sessoes WHERE id='$idnovato2' ORDER BY nome ASC");
$contar2 = mysql_num_rows($sql2); 

if ($contar2 < 1)  
   {echo "<div align=center class=tahomafonte><b>N&atilde;o existe sessões cadastradas!</b></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql2))
   {
   ?>
			 <option value="<?php echo $y["id"]; ?>"><?php echo $y["nome"]; ?></option>
                      <?
  }
  }
 ?>
            				
							<?php

include "conexao.php";

$sql3 = mysql_query("SELECT * FROM cw_sessoes WHERE id!='$idnovato2' ORDER BY nome ASC");
$contar3 = mysql_num_rows($sql3); 

if ($contar3 < 1)  
   {echo "<div align=center class=tahomafonte><b>N&atilde;o existe sessões cadastradas!</b></div>"; 
   }
else 
   {
while($z = mysql_fetch_array($sql3))
   {
   ?>
                            <option value="<?php echo $z["id"]; ?>"><?php echo $z["nome"]; ?></option>
                            <?
  }
  }
 ?>
                          </select></td>
                      </tr>
                      <tr>
                        <td class="manchete_texto" align="left"><span style="MARGIN: 0px">
                          <input name="submit" class="fontetabela" type="submit" style="FONT-SIZE: 10px" value="EDITAR SUB-SESSÃO" />
                        </span></td>
                      </tr>
                    </table>
                    <span style="MARGIN: 0px">
                    <?php
  }
  }
 ?>
                    </span>
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