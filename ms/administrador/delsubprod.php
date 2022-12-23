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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>APAGAR SUB-DEPARTAMENTO</b></font></td>
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
            <td><?php
include "conexao.php";

$id = $_GET['id'];
$iddep = $_GET['iddep'];

$sql = "DELETE FROM cw_subdepprod WHERE id='$id'";

if(mysql_query($sql)) {
echo "<script>alert('O SUB-DEPARTAMENTO FOI APAGADO COM SUCESSO!')</script>";
echo "<script>location.href='seldepprod.php?id=$iddep'</script>";
}else{
echo "<div align=center><br><font color='#000000' >NÃO FOI POSSÍVEL APAGAR!</font></div>";
}


$sql3 = mysql_query("SELECT * FROM cw_produtos WHERE subdep='$id'");
while($y = mysql_fetch_array($sql3))
{
$idproduto = $y["id"];
$foto = $y["foto"];
unlink("ups/produtos/$foto");

}

$sql9 = mysql_query("SELECT * FROM cw_produtos WHERE subdep='$id' LIMIT 1");
while($y = mysql_fetch_array($sql9))
{
$idproduton = $y["id"];
$sql8 = mysql_query("SELECT * FROM cw_anexosprod WHERE idnot='$idproduton'");
while($u = mysql_fetch_array($sql8))
{
$fotoanexomaior = $u["fotomaior"];
$fotoanexomenor = $u["fotomenor"];
unlink("ups/fotosprodutos/g/$fotoanexomaior");
unlink("ups/fotosprodutos/p/$fotoanexomenor");
}
}



$sql99 = mysql_query("SELECT * FROM cw_produtos WHERE subdep='$id' LIMIT 1");
while($y = mysql_fetch_array($sql99))
{
$idprodutonn = $y["id"];
$sql101 = "DELETE FROM cw_anexosprod WHERE idnot='$idprodutonn'";
mysql_query($sql101);
}


$sql2 = "DELETE FROM cw_produtos WHERE subdep='$id'";
mysql_query($sql2);





?></td>
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