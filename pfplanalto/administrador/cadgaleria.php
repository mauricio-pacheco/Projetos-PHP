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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>CADASTRAR EVENTO</b></font></td>
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

$arquivo = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x = 150;
$max_image_y = 113;
$diretorio = 'ups/galerias/';
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
            
            $nome_foto  = ('imagem_' . time() . '.' . verifica_extensao_image($arquivo));// nome ??nico para foto
            $endFoto = $diretorio . $nome_foto;
            if(reduz_imagem($arquivo['tmp_name'], $max_image_x, $max_image_y, $endFoto))
            {
                $err = TRUE;
            }  
        }
    }
}



$nomegaleria = $_POST["nomegaleria"];
$dataevento = $_POST["dataevento"];
$comentario = $_POST["comentario"];
$data = date ("j/m/Y");
$hora = date ("H:i:s");


$sql = "INSERT INTO cw_galeria (nomegaleria, foto, dataevento, comentario, data, hora) VALUES ('$nomegaleria', '$nome_foto', '$dataevento', '$comentario', '$data', '$hora')";
if(mysql_query($sql)) {
echo "<div align=center><br><img src=imagens/ok.png></div><div align=center class=manchete_texto><br>A GALERIA FOI CADASTRADA COM SUCESSO!!</div>";
}else{
echo "<div align=center class=manchete_texto><br>N??O FOI POSS??VEL EFETUAR O CADASTRO!</div>";
}
 
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