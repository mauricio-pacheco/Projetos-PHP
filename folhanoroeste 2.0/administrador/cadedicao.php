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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>CADASTRAR EDIÇÃO</b></font></td>
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

$arquivo = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x = 800;
$max_image_y = 600;
$diretorio = 'ups/capasedicoes/';
if($arquivo)
{
    $tamanho = getimagesize($arquivo["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes/funcoesgalerias.php";
    $err = FALSE;
    if(is_uploaded_file($arquivo['tmp_name']))
    {
        if(verifica_image($arquivo))
        {
            $tamanho = getimagesize($arquivo["tmp_name"]);
            $dimensiona = verifica_dimensao_image($arquivo, $max_image_x, $max_image_y);
            if($dimensiona != '')
            {
                if($dimensiona == 'altura')
                {
                        $auxImage = $max_image_x;
                        $max_image_x = $max_image_y;
                        $max_image_y = $auxImage;
                }
            }
            else
            {
                $max_image_x = $tamanho[0];
                $max_image_y = $tamanho[1];
            }
            
            $nome_foto  = ('imagem_' . time() . '.' . verifica_extensao_image($arquivo));// nome único para foto
            $endFoto = $diretorio . $nome_foto;
            if(reduz_imagem($arquivo['tmp_name'], $max_image_x, $max_image_y, $endFoto))
            {
                $err = TRUE;
            }  
        }
    }
}


$edicao = $_POST["edicao"];
$dataed = $_POST["dataed"];
$diaed = $_POST["dataed"];
$data = date ("j/m/Y");
$hora = date ("H:i:s");

$nome = ereg_replace("[^a-zA-Z0-9_.]", "", 
strtr($nome, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", 
"aaaaeeiooouucAAAAEEIOOOUUC_"));
$nome = strtolower($nome);
$nome = utf8_decode($nome);

$dataed = ereg_replace("[^a-zA-Z0-9_.]", "", 
strtr($dataed, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", 
"aaaaeeiooouucAAAAEEIOOOUUC_"));
$dataed = strtolower($dataed);
$dataed = utf8_decode($dataed);


function random_pass($numchars = 30, $specialchars = true, $extrashuffle = false)
 {
 $numchars = intval($numchars);
 $numchars = ($numchars > 60 OR $numchars < 30) ? 30 : $numchars;
 
$chars = array_merge(range('a', 'z'), range(0, 9));
 
if ($specialchars)
 {
 $chars = array_merge($chars, array('_', '-', '_', '-', '_', '-'));
 }
 shuffle($chars);
 
$pass = '';
 
for ($i = 0; $i <= $numchars; $i++)
 {
 $pass .= $chars[$i];
 }
 
if ($extrashuffle)
 {
 return str_shuffle($pass);
 }
 return $pass;
 }
 // Example, returns: 3ck#4sib2
$dataednovan = random_pass(30, true, true);
$dataednova = $dataednovan.$dataed;

mkdir("ups/edicoes/$dataednova/", 0777);
mkdir("ups/edicoes/$dataednova/files/", 0777);
mkdir("ups/edicoes/$dataednova/images/", 0777);
chmod("ups/edicoes/$dataednova/", 0777);
chmod("ups/edicoes/$dataednova/files/", 0777);
chmod("ups/edicoes/$dataednova/images/", 0777);


$sql = "INSERT INTO cw_edicoes (edicao, diaed, data, hora, pasta, foto) VALUES ('$edicao', '$diaed', '$data', '$hora', '$dataednova', '$nome_foto')";
if(mysql_query($sql)) {
echo "<div align=center><br><img src=imagens/ok.png></div><div align=center class=manchete_texto><br>A EDIÇÃO FOI CADASTRADA COM SUCESSO!!</div>";
echo "<script>location.href='encerracadedicao.php'</script>";
}else{
echo "<div align=center class=manchete_texto><br>NÃO FOI POSSÍVEL EFETUAR O CADASTRO!</div>";
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