<?php include("meta.php"); ?>
<BODY class=wide bgcolor="#3C7FAF">
<DIV id=reporting><IMG id=ctag height=1 alt="" src="home_arquivos/c.gif" 
width=1>
<DIV id=omni>
<NOSCRIPT>
<DIV><IMG height=1 alt="" src="home_arquivos/r.gif" 
width=1></DIV></NOSCRIPT></DIV></DIV>
<DIV class="page6 region9" id=wrapper>
<DIV id=page>
<?php include("cabecalho.php"); ?>
  <DIV style="BORDER-TOP: #E1E1E1 1px solid; WIDTH: 972px">
    <?php include("busca.php"); ?>
  </DIV>
<DIV style="BORDER-TOP: #E1E1E1 1px solid; WIDTH: 972px">
<?php include("login.php"); ?>
</DIV>
<DIV id=nav>
<DIV class="parent chrome6 single1">
<DIV class="child c1 first">
<DIV class="nav3 cf">
  <DIV style="BORDER-TOP: #E1E1E1 1px solid; WIDTH: 972px">
    <DIV align=center>
      <?php include("menu.php"); ?>
    </DIV>
  </DIV>
</DIV></DIV></DIV></DIV>
<DIV id=content>
<DIV class=ca id=subhead></DIV>
<DIV id=mediapage2>
<DIV id=infopanerow>
<DIV class="ca mpreg5" id=infotop>
<?php include("notgeral.php"); ?></DIV>
<DIV class="ca mpreg4" id=mainadtop><!---->
<DIV class="parent chrome29  advertisement customcontainer blue">
<DIV class="heading alignright"><!----></DIV>
<DIV class=content>
<DIV class=adcenter>
  <DIV class=advertisement>
  <?php include("edicoes.php"); ?>
    
</DIV></DIV></DIV></DIV></DIV></DIV>
<DIV class=ca id=subfoot><?php include("fotos.php"); ?></DIV>
<DIV id=mediapage2column1and2>
<DIV class="ca mpreg3" id=area4></DIV>
<DIV class="ca mpreg1 largetitle blackheading" id=area1>
  <DIV class="parent chrome23 single1 customcontainer blue">
    <DIV class="heading" style="BACKGROUND: #E71C24"><SPAN class=text 
style="COLOR: #ffffff">Assinatura Online</SPAN></span></DIV>
    <DIV class=content>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
              <td><strong><a href="cadastro.php"><font color="#333333">Efetuar Cadastro de Assinante</font></a></strong></td>
            </tr>
             <tr>
              <td><img src="imagens/branco.gif" width="2" height="4"></td>
            </tr>
            <tr>
              <td><strong><a href="resenha.php"><font color="#333333">Esqueceu a Senha?</font></a></strong></td>
            </tr>
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="8"></td>
            </tr>
          </table></form>
<?php } ?>
          </td>
        </tr>
      </table>
     
    </DIV>
  </DIV>
</DIV>
 
 
 
<DIV class="ca mpreg4" id=area2><!---->
<?php include("enquete.php"); ?>
<?php include("tempo.php"); ?>
<?php include("lateral.php"); ?>
  
  </DIV>
<DIV class="ca mpreg3" id=area5><!----></DIV></DIV></DIV>
<DIV class=ca id=subfoot>
<?php include("videos.php"); ?>
<?php include("baixo.php"); ?>
<?php include("rodape.php"); ?>
</DIV></DIV></DIV>
<DIV id=foot>
<DIV class="parent chrome6 single1">
<DIV class="child c1 first">
</DIV></DIV></DIV></DIV>
</BODY></HTML>
