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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>APAGAR EDIÇÃO</b></font></td>
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
                <td><?php
include "conexao.php";


function removeTree($rootDir)

{
    if (!is_dir($rootDir))
    {
        return false;
    }

    if (!preg_match("/\\/$/", $rootDir))
    {
        $rootDir .= '/';
    }


    $stack = array($rootDir);

    while (count($stack) > 0)
    {
        $hasDir = false;
        $dir    = end($stack);
        $dh     = opendir($dir);

        while (($file = readdir($dh)) !== false)
        {
            if ($file == '.'  ||  $file == '..')
            {
                continue;
            }

            if (is_dir($dir . $file))
            {
                $hasDir = true;
                array_push($stack, $dir . $file . '/');
            }

            else if (is_file($dir . $file))
            {
                unlink($dir . $file);
            }
        }

        closedir($dh);

        if ($hasDir == false)
        {
            array_pop($stack);
            rmdir($dir);
        }
    }

    return true;
}



$id = $_GET['id'];
$pasta = $_GET['pasta'];
$foto = $_GET['foto'];

$sql = "DELETE FROM cw_edicoes WHERE id='$id'";
unlink("ups/capasedicoes/$foto");
$dir = "ups/edicoes/$pasta";
removeTree($dir); 


if(mysql_query($sql)) {
echo "<div align=center class=fontetabela><br>A EDIÇÃO FOI APAGADA COM SUCESSO!!</div>";
echo "<script>alert('A EDIÇÃO FOI APAGADA COM SUCESSO!')</script>";
echo "<script>location.href='admedicoes.php'</script>";
}else{
echo "<div align=center><br><font color='#000000' >NÃO FOI POSSÍVEL APAGAR!</font></div>";
}
 
?></td>
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