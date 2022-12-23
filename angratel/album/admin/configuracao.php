<html>

<head>
<meta http-equiv="Content-Language" content="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>X-Album - Configurações</title>
</head>
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
include "acesso.php";
if ( $contagem == 1 ) {
//aqui deixe aberto, pois iremos fechar somente no final da página
include "../config.php";
$sql3 = mysql_query("SELECT * FROM `$tabela2`", $db3);
while($campo = mysql_fetch_array($sql3)) {
$calc = $campo[6] / 1024;
?>

<body bgcolor="#f5f5f5" topmargin="0" leftmargin="0">
<script>
<!--
function cor(v) {
//if (v.value.substring((parseInt(v.value.length)-1),parseInt(v.value.length)) > 'f') alert('O caractere que você digitou não é aceito em html');
if (v.value.length == 6) { v.style.backgroundColor='#'+v.value;
if (parseInt(v.value.substring(0,1)) < 9) v.style.color='white';
else v.style.color='black';
} else {
	v.style.backgroundColor='#FFFFFF';
	v.style.color='black';
}
}
-->
</script>
<p align="center"><font face="Verdana" size="3"><b>Configurações</b></font></p>
<form method="POST" action="acao.php?acao=configurar">
<center><table border="2" cellpadding="0" width="419" bordercolor="#FFFFFF">
    <tr>
      <td width="549" colspan="2"><font face="Verdana" size="2" color="A6E900"><b>Configurações Pessoais</b></font></td>
    </tr>
    <tr>
      <td width="549"><font face="Verdana" size="1">Nome:</font> </td>
      <td width="356"><input type="text" name="camponome" style="border: 1 solid #000000" value="<? echo $campo[1]; ?>" size="20"></td>
    </tr>
    <tr>
      <td width="549" colspan="2"><font face="Verdana" size="2" color="A6E900"><b>Configuração do Album</b></font></td>
    </tr>
     <tr>
      <td width="549" colspan="2"><font face="Verdana" size="2" color="A6E900">&nbsp;&nbsp;&nbsp;&nbsp;¤ Configuração do adicionamento de Imagens</font></td>
    </tr>
    <tr>
      <td width="549"><font face="Verdana" size="1">Tamanho da Imagem: (largura)</font></td>
      <td width="356"><input type="text" name="campolargura" style="border: 1 solid #000000" value="<? echo $campo[4]; ?>" size="6"></td>
    </tr>
    <tr>
      <td width="549"><font face="Verdana" size="1">Tamanho da Imagem: (altura)</font></td>
      <td width="356"><input type="text" name="campoaltura" style="border: 1 solid #000000" value="<? echo $campo[5]; ?>" size="6"></td>
    </tr>
    <tr>
      <td width="549"><font face="Verdana" size="1">Tamanho Maximo em KiloBytes: (kb)</font></td>
      <td width="356"><input type="text" name="campokb" style="border: 1 solid #000000" value="<? echo $calc; ?>" size="6"><font face="Verdana" size="2">KB</font></td>
    </tr>
         <tr>
         <tr>
      <td width="549" colspan="2"><font face="Verdana" size="2" color="A6E900">&nbsp;&nbsp;&nbsp;&nbsp;¤ Cores</font></td>
    </tr>
    <tr>
      <td width="549"><font face="Verdana" size="1">Cor do Fundo</font></td>
      <td width="356">#<input type="text" name="campocorfundo" style="border: 1 solid #000000" onkeyup="cor(this)" value="<? echo $campo[7]; ?>" size="6"></td>
    </tr>
        <tr>
      <td width="549"><font face="Verdana" size="1">Cor do Titulo das Fotos:</font></td>
      <td width="356">#<input type="text" name="campocortitulo" style="border: 1 solid #000000" onkeyup="cor(this)" value="<? echo $campo[8]; ?>" size="6"></td>
    </tr>
        <tr>
      <td width="549"><font face="Verdana" size="1">Cor da Data das Fotos:</font></td>
      <td width="356">#<input type="text" name="campocordata" style="border: 1 solid #000000" onkeyup="cor(this)" value="<? echo $campo[9]; ?>" size="6"></td>
    </tr>
        <tr>
      <td width="549"><font face="Verdana" size="1">Cor do Comentario:</font></td>
      <td width="356">#<input type="text" name="campocorcoments" style="border: 1 solid #000000" onkeyup="cor(this)" value="<? echo $campo[10]; ?>" size="6"></td>
    </tr>
            <tr>
      <td width="549"><font face="Verdana" size="1">Cor do Comentario do Publico:</font></td>
      <td width="356">#<input type="text" name="campocorcomentspub" style="border: 1 solid #000000" onkeyup="cor(this)" value="<? echo $campo[13]; ?>" size="6"></td>
    </tr>
      <td width="549" colspan="2"><font face="Verdana" size="2" color="A6E900">&nbsp;&nbsp;&nbsp;&nbsp;¤ Configuração Gerais</font></td>
    </tr>
        <tr>
      <td width="549"><font face="Verdana" size="1">Ativar Comentarios Publicos: </font></td>
      <td width="356"><select size="1" style="border: 1 solid #000000" name="campocomentariopub">
<? if($campo[14] == 'Ativo') { echo "<option selected>Sim</option><option>Não</option>"; } else { echo "<option selected>Não</option><option>Sim</option>"; } ?>
  </select></td>
    </tr>
        <tr>
      <td width="549"><font face="Verdana" size="1">Ativar Emotions nas mensagens: </font></td>
      <td width="356"><select size="1" style="border: 1 solid #000000" name="campoemotion">
<? if($campo[11] == 'Ativo') { echo "<option selected>Sim</option><option>Não</option>"; } else { echo "<option selected>Não</option><option>Sim</option>"; } ?>
  </select></td>
    </tr>
            <tr>
      <td width="549"><font face="Verdana" size="1">Ativar controle de palavrao nos comentarios publicos:</font></td>
      <td width="356"><select size="1" style="border: 1 solid #000000" name="campopalavrao">
<? if($campo[12] == 'Ativo') { echo "<option selected>Sim</option><option>Não</option>"; } else { echo "<option selected>Não</option><option>Sim</option>"; } ?>
  </select></td>
    </tr>
                <tr>
      <td width="549"><font face="Verdana" size="1">Ativar ampliação da imagem:</font></td>
      <td width="356"><select size="1" style="border: 1 solid #000000" name="campoampliar">
<? if($campo[15] == 'Ativo') { echo "<option selected>Sim</option><option>Não</option>"; } else { echo "<option selected>Não</option><option>Sim</option>"; } ?>
  </select></td>
    </tr>
    
    <tr>
      <td width="549">&nbsp;</td>
      <td width="356">&nbsp;</td>
    </tr>
    <tr>
      <td width="905" colspan="2">
        <p align="center"><input type="submit" value="Atualizar" style="background-color: #F5F5F5; border: 1 solid #A6E900" name="B1"></td>
    </tr>
  </table></center>
</form>
<?
include "button.php";
}
  } else {
echo "Você não está logado.<a href=index.php>Logar</a>";
  include "button.php";
}
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
?>
</body>

</html>

