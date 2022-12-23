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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>CADASTRAR BANNER</b></font></td>
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

$data2 = date ("jmY");
$hora2 = date ("His");
$arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE; 

// Código acima... com as demais verificaçoes... 

// Diretório para onde o arquivo será movido 
$diretorio = "ups/publicidades/"; 

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

$titulo = $_POST["titulo"];
$local = $_POST["local"];
$tipo = $_POST["tipo"];
$link = $_POST["link"];
$descricao = $_POST["descricao"];
$dataexpira = $_POST["dataexpira"];
$datacad = date ("j/m/Y");
$f1 = $_POST["f1"];
$f2 = $_POST["f2"];


$sql = "INSERT INTO cw_publicidades (titulo, local, tipo, link, descricao, dataexpira, datacad, arquivo, status, f1, f2) VALUES ('$titulo', '$local', '$tipo', '$link', '$descricao', '$dataexpira', '$datacad', '$arquivo_nome', '0', '$f1', '$f2')";
if(mysql_query($sql)) {
echo "<div align=center><br><img src=imagens/ok.png></div><div align=center class=manchete_texto><br>O BANNER FOI CADASTRADO COM SUCESSO!!</div>";
}else{
echo "<div align=center class=manchete_texto><br>NÃO FOI POSSÍVEL EFETUAR O CADASTRO!</div>";
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