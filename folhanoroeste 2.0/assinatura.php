<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<SCRIPT src="home_arquivos/jquery-1.3.2.min.js" type=text/javascript></SCRIPT>
<META http-equiv=X-UA-Compatible content=IE=7>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="classes/estilos.css">
<META 
content="Descrição" 
name=description>
<META 
content="Palavras, Chave" 
name=keywords>
<title>Folha do Noroeste</title>
</head>

<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1" bgcolor="#CCCCCC"><img src="imagens/branco.gif" width="1" height="1" /></td>
    <td width="978" bgcolor="#FFFFFF">
   
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("cabecalho(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("busca(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("login(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("menu(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>

<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>  
  
  

<table width="100%" align="center" background="btabela2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="280" valign="top">
     <?php include("esquerdo(1).php"); ?> </td>
    <td width="700" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>
         <table width="100%" border="0" height="30" cellspacing="0" cellpadding="0">
           <tr>
             <td align="left" bgcolor="#E71C24" class="fontemaior">&nbsp;&nbsp;<strong>Assinatura Online</strong></td>
           </tr>
         </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="78%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="fonte"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td> <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left">
                <?php
include "administrador/conexao.php";
$logado = $_COOKIE['usuario'];
$logado2 = $_COOKIE['senha'];
$logado2novo = hash('sha512', $logado2);

$sql = mysql_query("SELECT * FROM cw_clientes WHERE usuario = '$logado' AND senha = '$logado2novo'");
$contar = mysql_num_rows($sql); 

if ( $contar == 1 ) {
	
?>     
<?php
while($y = mysql_fetch_array($sql))
   {
?>
<input type="hidden" name="usuario" value="<?php echo $y["usuario"]; ?>" />
<input type="hidden" name="id" value="<?php echo $y["id"]; ?>" />
<table width="100%" border="0" align="center" class="fontetabela">
  <tr>
    <td width="82%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="6%" valign="top"><span class="rodape"><img src="administrador/ups/clientes/<?php echo $y["foto"]; ?>" /></span></td>
        <td width="94%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;<strong>Nome:</strong> <?php echo $y["cliente"]; ?>&nbsp;<strong>E-mail:</strong> <?php echo $y["email"]; ?> &nbsp;<strong>Home-Page:</strong> <?php echo $y["homepage"]; ?></td>
          </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="4"></td>
          </tr>
          <tr>
            <td>&nbsp;<strong>Cidade:</strong> <?php echo $y["cidade"]; ?> <strong>Estado:</strong> <?php echo $y["uf"]; ?> <strong>CEP:</strong> <?php echo $y["cep"]; ?></td>
          </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="4"></td>
          </tr>
          <tr>
            <td>&nbsp;<strong>Endereço:</strong> <?php echo $y["endereco"]; ?>&nbsp;&nbsp;<strong>N&uacute;mero:</strong> <?php echo $y["numero"]; ?> <strong>Bairro:</strong> <?php echo $y["bairro"]; ?> <strong>Complemento:</strong> <?php echo $y["complemento"]; ?></td>
          </tr>
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="4"></td>
          </tr>
          <tr>
            <td>&nbsp;<strong>Telefone:</strong> <?php echo $y["telefone"]; ?> <strong>FAX:</strong> <?php echo $y["fax"]; ?> <strong>Celular:</strong> <?php echo $y["celular"]; ?></td>
          </tr>
        </table>
      </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="6"></td>
  </tr>
 <tr>
   <td><strong> Assinaturas Efetuadas</strong></td>
 </tr>

  <tr>
    <td><?php echo $y["impresso"]; ?> - <?php echo $y["online"]; ?></td>
  </tr>
</table>

           <?php } ?>
<?php
} else {
?> 
          <script language="JavaScript" type="text/javascript">
function validar(login) { 

if (document.login.usuario.value=="") {
alert("O Campo Usuário não está preenchido!")
login.usuario.focus();
return false
}

if (document.login.senha.value=="") {
alert("O Campo Senha não está preenchido!")
login.senha.focus();
return false
}

}

                        </script>
              <form action="autoriza.php" method="post" name="login" id="login" onSubmit="return validar(this)">
          <table width="36%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td><b>Área Exclusiva Para Assinantes Online</b></td>
            </tr>
            <tr>
              <td><table width="88%" border="0">
                <tr>
                  <td width="10%">Login:&nbsp;&nbsp;</td>
                  <td width="90%"><input name="usuario" type="text" class="texto" size="20">
                    *</td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td><table width="88%" border="0">
                <tr>
                  <td width="10%">Senha:</td>
                  <td width="65%"><input name="senha" type="password" class="texto" size="15">
                    *</td>
                  <td width="25%"><input name="buttons" type="image" class="texto" src="imagens/chave.png" alt="Efetuar Login" title="Efetuar Login"></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="4"></td>
            </tr>
            <tr>
              <td class="fonte"><strong><a href="cadastro.php" class="fonte">Efetuar Cadastro de Assinante</a></strong></td>
            </tr>
             <tr>
              <td><img src="imagens/branco.gif" width="2" height="4"></td>
            </tr>
            <tr>
              <td class="fonte"><strong><a href="resenha.php" class="fonte">Esqueceu a Senha?</a></strong></td>
            </tr>
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="8"></td>
            </tr>
          </table></form>
<?php } ?>
          </td>
        </tr>
      </table></td>
                  </tr>
                </table></td>
                </tr>
          </table></td>
        </tr>
</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="4" /></td>
              </tr>
          </table></td>
    
  </tr>
</table>

<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table> 
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("baixo(1).php"); ?></td>
  </tr>
</table>

    
    
    </td>
    <td width="1" bgcolor="#CCCCCC"><img src="imagens/branco.gif" width="1" height="1" /></td>
  </tr>
</table>
</body>
</html>