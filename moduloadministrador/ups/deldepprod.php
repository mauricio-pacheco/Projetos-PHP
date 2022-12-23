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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>APAGAR DEPARTAMENTO DOS PRODUTOS</b></font></td>
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

$sql = "DELETE FROM cw_depprod WHERE id='$id'";
if(mysql_query($sql)) {
echo "<div align=center class=manchete_texto><br>O DEPARTAMENTO FOI APAGADO COM SUCESSO!!</div>";
echo "<script>alert('O DEPARTAMENTO FOI APAGADO COM SUCESSO!')</script>";
echo "<script>location.href='admdepprod.php?id=$id'</script>";
}


$sql4 = mysql_query("SELECT * FROM cw_subdepprod WHERE iddep='$id' LIMIT 1");
while($y = mysql_fetch_array($sql4))
{
$idsubdep = $y["id"];	
$sql3 = mysql_query("SELECT * FROM cw_produtos WHERE departamento='$id' AND subdep='$idsubdep'");
while($u = mysql_fetch_array($sql3))
{
$foto = $u["foto"];
unlink("ups/produtos/$foto");
}
}



$sql5 = mysql_query("SELECT * FROM cw_subdepprod WHERE iddep='$id' LIMIT 1");
while($y = mysql_fetch_array($sql5))
{
$idsubdep2 = $y["id"];	
$sql6 = "DELETE FROM cw_produtos WHERE departamento='$id' AND subdep='$idsubdep2'";
mysql_query($sql6);
}





$sql10 = mysql_query("SELECT * FROM cw_subdepprod WHERE iddep='$id' LIMIT 1");
while($y = mysql_fetch_array($sql10))
{
$idsubdep4 = $y["id"];		
$sql11 = mysql_query("SELECT * FROM cw_produtos WHERE departamento='$id' AND subdep='$idsubdep4'");
while($u = mysql_fetch_array($sql11))
{	
$idproduto3 = $u["id"];
$sql12 = mysql_query("SELECT * FROM cw_anexosprod WHERE idnot='$idproduto3'");
while($t = mysql_fetch_array($sql12))
{
$fotoanexomaior = $t["fotomaior"];
$fotoanexomenor = $t["fotomenor"];
unlink("ups/fotosprodutos/g/$fotoanexomaior");
unlink("ups/fotosprodutos/p/$fotoanexomenor");
}


}
}



$sql7 = mysql_query("SELECT * FROM cw_subdepprod WHERE iddep='$id' LIMIT 1");
while($y = mysql_fetch_array($sql7))
{
$idsubdep3 = $y["id"];		
$sql8 = mysql_query("SELECT * FROM cw_produtos WHERE departamento='$id' AND subdep='$idsubdep3'");
while($u = mysql_fetch_array($sql8))
{	
$idproduto2 = $u["id"];	
$sql9 = "DELETE FROM cw_anexosprod WHERE idnot='$idproduto2'";
mysql_query($sql9);
}
}



$sql2 = "DELETE FROM cw_subdepprod WHERE iddep='$id'";
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