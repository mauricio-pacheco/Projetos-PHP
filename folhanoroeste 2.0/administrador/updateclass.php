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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>EDITAR CLASSIFICADO</b></font></td>
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
            <td><span class="rodape">
              <?php
include "conexao.php";

$id = $_POST["id"];
$codigo = $_POST["codigo"];
$foto = $_POST["foto"];
$foto2 = $_POST["foto2"];
$foto3 = $_POST["foto3"];

// Validar Campo File Imagem Maior
if (empty( $_FILES['foto']['name'] ) ) {

$sql = mysql_query("SELECT * FROM cw_class WHERE id='$id'");
while($t = mysql_fetch_array($sql))
   {
$nome_foto14 = "$t[foto]";
}

}
else
{
	
$sql = mysql_query("SELECT * FROM cw_class WHERE id='$id'");
while($t = mysql_fetch_array($sql))
   {
$arquivoapaga = "$t[foto]";
unlink("ups/capasclass/$arquivoapaga");
}

$arquivo14 = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x14 = 800;
$max_image_y14 = 600;
$diretorio14 = 'ups/capasclass/';
if($arquivo14)
{
    $tamanho14 = getimagesize($arquivo14["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes/funcoesclass1.php";
    $err14 = FALSE;
    if(is_uploaded_file($arquivo14['tmp_name']))
    {
        if(verifica_image14($arquivo14))
        {
            $tamanho14 = getimagesize($arquivo14["tmp_name"]);
            $dimensiona14 = verifica_dimensao_image14($arquivo14, $max_image_x14, $max_image_y14);
            if($dimensiona14 != '')
            {
                if($dimensiona14 == 'altura')
                {
                        $auxImage14 = $max_image_x14;
                        $max_image_x14 = $max_image_y14;
                        $max_image_y14 = $auxImage14;
                }
            }
            else
            {
                $max_image_x14 = $tamanho14[0];
                $max_image_y14 = $tamanho14[1];
            }
            
            $nome_foto14  = ('imagemmenor14_' . time() . '.' . verifica_extensao_image14($arquivo14));// nome &Atilde;&ordm;nico para foto
            $endFoto14 = $diretorio14 . $nome_foto14;
            if(reduz_imagem14($arquivo14['tmp_name'], $max_image_x14, $max_image_y14, $endFoto14))
            {
                $err14 = TRUE;
            }  
        }
    }
}
}
// fim








// Validar Campo File Imagem Maior
if (empty( $_FILES['foto2']['name'] ) ) {

$sql = mysql_query("SELECT * FROM cw_class WHERE id='$id'");
while($t = mysql_fetch_array($sql))
   {
$nome_foto15 = "$t[foto2]";
}

}
else
{
	
$sql = mysql_query("SELECT * FROM cw_class WHERE id='$id'");
while($t = mysql_fetch_array($sql))
   {
$arquivoapaga = "$t[foto2]";
unlink("ups/capasclass/$arquivoapaga");
}

$arquivo15 = isset($_FILES["foto2"]) ? $_FILES["foto2"] : FALSE;
$max_image_x15 = 800;
$max_image_y15 = 600;
$diretorio15 = 'ups/capasclass/';
if($arquivo15)
{
    $tamanho15 = getimagesize($arquivo15["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes/funcoesclass2.php";
    $err15 = FALSE;
    if(is_uploaded_file($arquivo15['tmp_name']))
    {
        if(verifica_image15($arquivo15))
        {
            $tamanho15 = getimagesize($arquivo15["tmp_name"]);
            $dimensiona15 = verifica_dimensao_image15($arquivo15, $max_image_x15, $max_image_y15);
            if($dimensiona15 != '')
            {
                if($dimensiona15 == 'altura')
                {
                        $auxImage15 = $max_image_x15;
                        $max_image_x15 = $max_image_y15;
                        $max_image_y15 = $auxImage15;
                }
            }
            else
            {
                $max_image_x15 = $tamanho15[0];
                $max_image_y15 = $tamanho15[1];
            }
            
            $nome_foto15  = ('imagemmenor15_' . time() . '.' . verifica_extensao_image15($arquivo15));// nome &Atilde;&ordm;nico para foto
            $endFoto15 = $diretorio15 . $nome_foto15;
            if(reduz_imagem15($arquivo15['tmp_name'], $max_image_x15, $max_image_y15, $endFoto15))
            {
                $err15 = TRUE;
            }  
        }
    }
}
}
// fim




// Validar Campo File Imagem Maior
if (empty( $_FILES['foto3']['name'] ) ) {

$sql = mysql_query("SELECT * FROM cw_class WHERE id='$id'");
while($t = mysql_fetch_array($sql))
   {
$nome_foto16 = "$t[foto3]";
}

}
else
{
	
$sql = mysql_query("SELECT * FROM cw_class WHERE id='$id'");
while($t = mysql_fetch_array($sql))
   {
$arquivoapaga = "$t[foto3]";
unlink("ups/capasclass/$arquivoapaga");
}

$arquivo16 = isset($_FILES["foto3"]) ? $_FILES["foto3"] : FALSE;
$max_image_x16 = 800;
$max_image_y16 = 600;
$diretorio16 = 'ups/capasclass/';
if($arquivo16)
{
    $tamanho16 = getimagesize($arquivo16["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes/funcoesclass3.php";
    $err16 = FALSE;
    if(is_uploaded_file($arquivo16['tmp_name']))
    {
        if(verifica_image16($arquivo16))
        {
            $tamanho16 = getimagesize($arquivo16["tmp_name"]);
            $dimensiona16 = verifica_dimensao_image16($arquivo16, $max_image_x16, $max_image_y16);
            if($dimensiona16 != '')
            {
                if($dimensiona16 == 'altura')
                {
                        $auxImage16 = $max_image_x16;
                        $max_image_x16 = $max_image_y16;
                        $max_image_y16 = $auxImage16;
                }
            }
            else
            {
                $max_image_x16 = $tamanho16[0];
                $max_image_y16 = $tamanho16[1];
            }
            
            $nome_foto16  = ('imagemmenor16_' . time() . '.' . verifica_extensao_image16($arquivo16));// nome &Atilde;&ordm;nico para foto
            $endFoto16 = $diretorio16 . $nome_foto16;
            if(reduz_imagem16($arquivo16['tmp_name'], $max_image_x16, $max_image_y16, $endFoto16))
            {
                $err16 = TRUE;
            }  
        }
    }
}
}
// fim


$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$titulo = $_POST["titulo"];
$iddep = $_POST["iddep"];
$texto = $_POST["texto"];
$data = date ("j/m/Y");
$hora = date ("H:i:s");


$texto = str_replace("'","",$texto);


$sql = "UPDATE cw_class SET nome = '$nome', email = '$email', telefone = '$telefone', titulo = '$titulo', iddep = '$iddep', foto = '$nome_foto14', foto2 = '$nome_foto15',  foto3 = '$nome_foto16', data = '$data', hora = '$hora', texto = '$texto', codigo = '$codigo', status = '1' WHERE id = '$id'";
if(mysql_query($sql)) {
echo "<div align=center><br><img src=imagens/ok.png></div><div align=center class=manchete_texto><br>O CLASSIFICADO FOI EDITADO COM SUCESSO!!</div><br>";
}else{
echo "<div align=center class=manchete_texto><br>N&Atilde;O FOI POSS&Iacute;VEL EDITAR A NOT&Iacute;CIA!</div><br>";
}
 
?>
            </span></td>
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