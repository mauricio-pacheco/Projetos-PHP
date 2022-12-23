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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>EDITAR PRODUTO</b></font></td>
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
$foto = $_POST["foto"];
$arquivo = $_POST["arquivo"];

// Validar Campo File Imagem Maior
if (empty( $_FILES['arquivo']['name'] ) ) {

$sql = mysql_query("SELECT * FROM cw_produtos WHERE id='$id'");
while($t = mysql_fetch_array($sql))
   {
$arquivo_nome = "$t[arquivo]";
}

}
else
{

$sql = mysql_query("SELECT * FROM cw_produtos WHERE id='$id'");
while($t = mysql_fetch_array($sql))
   {
$arquivoapaga = "$t[arquivo]";
unlink("ups/publicacoes/$arquivoapaga");
}

$data2 = date ("jmY");
$hora2 = date ("His");
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE; 

// Código acima... com as demais verificaçoes... 

// Diretório para onde o arquivo será movido 
$diretorio = "ups/publicacoes/"; 

// Substitui espaços por underscores no nome do arquivo 


// Todas as letras em minúsculo 
$nome = "$data2$hora2" . $arquivo["name"];

$nome = ereg_replace("[^a-zA-Z0-9_.]", "", 
strtr($nome, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", 
"aaaaeeiooouucAAAAEEIOOOUUC_"));
$nome = strtolower($nome);
$nome = utf8_decode($nome);

// Caminho completo do arquivo 
$nome = $diretorio . $nome; 

$arquivo_nome = "$data2$hora2" . $arquivo["name"];

// Verifica se o mime-type do arquivo é de imagem


// Tudo ok! Então, move o arquivo 

if(eregi(".exe$", $_FILES["arquivo"]["name"]) or eregi(".com$", $_FILES["arquivo"]["name"]) or eregi(".bat$", $_FILES["arquivo"]["name"])) {
 
    echo "<div align=center class=manchete_texto><br>EXTENSÃO NÃO PERMITIDA!</div>"; 
} 
else { 
    move_uploaded_file($arquivo['tmp_name'], $nome);
	
	
} 



}
// fim


$arquivo_nome = ereg_replace("[^a-zA-Z0-9_.]", "", 
strtr($arquivo_nome, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", 
"aaaaeeiooouucAAAAEEIOOOUUC_"));
$arquivo_nome = strtolower($arquivo_nome);
$arquivo_nome = utf8_decode($arquivo_nome);

// Validar Campo File Imagem Maior
if (empty( $_FILES['foto']['name'] ) ) {

$sql = mysql_query("SELECT * FROM cw_produtos WHERE id='$id'");
while($t = mysql_fetch_array($sql))
   {
$nome_foto0 = "$t[foto]";
}

}
else
{
	
$sql = mysql_query("SELECT * FROM cw_produtos WHERE id='$id'");
while($t = mysql_fetch_array($sql))
   {
$arquivoapaga = "$t[foto]";
unlink("ups/produtos/$arquivoapaga");
}

$arquivo0 = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x0 = 400;
$max_image_y0 = 300;
$diretorio0 = 'ups/produtos/';
if($arquivo0)
{
    $tamanho0 = getimagesize($arquivo0["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes/funcoes0.php";
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


$nome = $_POST["nome"];
$departamento = $_POST["departamento"];
$subdep = $_POST["subdep"];
$tipo = $_POST["tipo"];
$peso = $_POST["peso"];
$valor = $_POST["valor"];
$valorpx = $_POST["valorpx"];
$valorp = $_POST["valorp"];
$valortratar = $_POST["valortratar"];
$descricao = $_POST["descricao"];

$descricao = str_replace("'","",$descricao);


$sql = "UPDATE cw_produtos SET nome = '$nome', arquivo = '$arquivo_nome', departamento = '$departamento', subdep = '$subdep', tipo = '$tipo', foto = '$nome_foto0', peso = '$peso', valor = '$valor', valorpx = '$valorpx', valorp = '$valorp', valortratar = '$valortratar', descricao = '$descricao' WHERE id = '$id'";
if(mysql_query($sql)) {
echo "<div align=center><br><img src=imagens/ok.png></div><div align=center class=manchete_texto><br>O PRODUTO FOI EDITADO COM SUCESSO!!</div><br>";
}else{
echo "<div align=center class=manchete_texto><br>N&Atilde;O FOI POSS&Iacute;VEL EDITAR O PRODUTO!</div><br>";
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