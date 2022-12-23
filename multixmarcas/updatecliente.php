<?php include("meta.php"); ?>
<table width="100%" height="91" background="imagens/bloco12.jpg" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="100%" height="24" background="imagens/bloco2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("slides.php"); ?>
      <table width="1000" bgcolor="#EBEBEB" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
      <table width="1000" background="imagens/barracentro.png" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td valign="top"><table width="992" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="231" valign="top"><?php include("menulateral.php"); ?></td>
            <td width="761" valign="top"><table height="30" background="imagens/funtotabelamaior.png" bgcolor="#535353" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fontetabela5" align="right"><strong>Alterar Dados Pessoais</strong>&nbsp;&nbsp;</td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center">
                <tr>
                  <td><span class="content">
                    <?php
include "administrador/conexao.php";

$id = $_POST["id"];
$foto = $_POST["foto"];

// Validar Campo File Imagem Maior
if (empty( $_FILES['foto']['name'] ) ) {

$sql = mysql_query("SELECT * FROM cw_clientes WHERE id='$id'");
while($t = mysql_fetch_array($sql))
   {
$nome_foto0 = "$t[foto]";
}

}
else
{
	
$sql = mysql_query("SELECT * FROM cw_clientes WHERE id='$id'");
while($t = mysql_fetch_array($sql))
   {
$arquivoapaga = "$t[arquivo]";
unlink("administrador/ups/clientes/$arquivoapaga");
}

$arquivo0 = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x0 = 140;
$max_image_y0 = 105;
$diretorio0 = 'administrador/ups/clientes/';
if($arquivo0)
{
    $tamanho0 = getimagesize($arquivo0["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "administrador/funcoes/funcoes0.php";
    $err0 = FALSE;
    if(is_uploaded_file($arquivo0['tmp_name']))
    {
        if(verifica_image0($arquivo0))
        {
            $tamanho0 = getimagesize($arquivo0["tmp_name"]);
            $dimensiona0 = verifica_dimensao_image0($arquivo0, $max_image_x0, $max_image_y0);
            if($dimensiona0 != '')
            {
                if($dimensiona0 == 'altura')
                {
                        $auxImage0 = $max_image_x0;
                        $max_image_x0 = $max_image_y0;
                        $max_image_y0 = $auxImage0;
                }
            }
            else
            {
                $max_image_x0 = $tamanho0[0];
                $max_image_y0 = $tamanho0[1];
            }
            
            $nome_foto0  = ('imagemmenor0_' . time() . '.' . verifica_extensao_image0($arquivo0));// nome &Atilde;&ordm;nico para foto
            $endFoto0 = $diretorio0 . $nome_foto0;
            if(reduz_imagem0($arquivo0['tmp_name'], $max_image_x0, $max_image_y0, $endFoto0))
            {
                $err0 = TRUE;
            }  
        }
    }
}
}
// fim


$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$cliente = $_POST["cliente"];
$email = $_POST["email"];
$razaosocial = $_POST["razaosocial"];
$nomefantasia = $_POST["nomefantasia"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$cep = $_POST["cep"];
$cnpjcpf = $_POST["cnpjcpf"];
$ie = $_POST["ie"];
$rg = $_POST["rg"];
$datanasc = $_POST["datanasc"];
$telefone = $_POST["telefone"];
$fax = $_POST["fax"];
$celular = $_POST["celular"];
$homepage = $_POST["homepage"];
$observacao = $_POST["observacao"];
$data = date ("j/m/Y");
$hora = date ("H:i:s");
$senha = hash('sha512', $senha);

$sql = "UPDATE cw_clientes SET usuario = '$usuario', senha = '$senha', cliente = '$cliente', email = '$email', razaosocial = '$razaosocial', nomefantasia = '$nomefantasia', endereco = '$endereco', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', uf = '$uf', cep = '$cep', cnpjcpf = '$cnpjcpf', ie = '$ie', rg = '$rg', datanasc = '$datanasc', telefone = '$telefone', fax = '$fax', celular = '$celular', homepage = '$homepage', observacao = '$observacao', data = '$data', hora = '$hora', foto = '$nome_foto0' WHERE id = '$id'";
if(mysql_query($sql)) {
echo "<div align=center><br><img src=administrador/imagens/ok.png></div><br><div align=center class=manchete_texto9>OS DADOS FORAM ALTERADOS COM SUCESSO!!</div><br><br>";
echo "<script>alert('Dados Alterados com Sucesso!')</script>";
echo "<script>location.href='principal.php'</script>";
}else{
echo "<div align=center>NÃO FOI POSSÍVEL EDITAR!</div>";
}
 
?>
                  </span></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="12" /></td>
                </tr>
      </table></td>
          </tr>
        </table></td>
      </tr>
  </table></td>
  </tr>
</table>
<table width="100%" height="120" background="imagens/blocoabaixo.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="16" /></td>
      </tr>
    </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>