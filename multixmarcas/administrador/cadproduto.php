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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>CADASTRAR PRODUTO</b></font></td>
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
            <td> <?php
include "conexao.php";


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

$arquivo_nome = ereg_replace("[^a-zA-Z0-9_.]", "", 
strtr($arquivo_nome, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", 
"aaaaeeiooouucAAAAEEIOOOUUC_"));
$arquivo_nome = strtolower($arquivo_nome);
$arquivo_nome = utf8_decode($arquivo_nome);


$arquivo = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
$max_image_x = 400;
$max_image_y = 300;
$diretorio = 'ups/produtos/';
if($arquivo)
{
    $tamanho = getimagesize($arquivo["tmp_name"]);
    ini_set ("max_execution_time", 3600); // uma hora
    require_once "funcoes/funcoesnoticia.php";
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


$sql = "INSERT INTO cw_produtos (nome, arquivo, departamento, subdep, tipo, foto, peso, valor, valorpx, valorp, valortratar, descricao) VALUES ('$nome', '$arquivo_nome', '$departamento', '$subdep', '$tipo', '$nome_foto', '$peso', '$valor', '$valorpx', '$valorp', '$valortratar', '$descricao')";
if(mysql_query($sql)) {
echo "<div align=center><br><img src=imagens/ok.png></div><div align=center class=manchete_texto><br>O CADASTRO DO PRODUTO FOI EFETUADO COM SUCESSO!!</div><br>";
}else{
echo "<div align=center class=manchete_texto><br>N&Atilde;O FOI POSS&Iacute;VEL EFETUAR O CADASTRO!</div><br>";
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