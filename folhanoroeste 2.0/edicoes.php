<table width="100%" border="0" cellspacing="0" height="240" cellpadding="0">
  <tr>
    <td bgcolor="#FCFCFC">
<?php

include "administrador/conexao.php";

$logado = $_COOKIE['usuario'];
$logado2 = $_COOKIE['senha'];
$logado2novo = hash('sha512', $logado2);

$sql = mysql_query("SELECT * FROM cw_clientes WHERE usuario = '$logado' AND senha = '$logado2novo' AND assinatura = '1'");
$contar = mysql_num_rows($sql); 

if ( $contar == 1 ) {

$sql = mysql_query("SELECT * FROM cw_edicoes ORDER BY id DESC LIMIT 1");

} else {

$sql = mysql_query("SELECT * FROM cw_edicoes ORDER BY id DESC LIMIT 1");

}

$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   { ?>
<table width="100%" border="0">
    <tr>
      <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><font color="#E71E26"><b>EDIÇÕES VIRTUAIS</b></font></td>
  </tr>
</table>
<table width="100" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="4" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><b><?php echo $y["edicao"]; ?></b></td>
  </tr>
</table>
</td>
    </tr>
    <tr>
    <td align="center">
       <form action="iredi.php" method="post" name="logincs" id="logincs">
    <input name="pasta" type="hidden" value="<?php echo $y["pasta"]; ?>" />
    <input name="usuario" type="hidden" value="<?php echo $logado; ?>" />
    <input name="senha" type="hidden" value="<?php echo $logado2; ?>" />
    <input name="button" type="image" src="administrador/ups/capasedicoes/<?php echo $y["foto"]; ?>" border="0" alt="Visualizar a Edição de <?php echo $y["edicao"]; ?>" title="Visualizar a Edição de <?php echo $y["edicao"]; ?>"></form></td>
      </tr></table>
    <?php } } ?>
	
    <table width="100%" border="0">
    <tr>
      <td><table width="100%" border="0">
        <tr>
          <td width="64%" align="center">
            <SELECT class=style1
      id=select11 onChange="MM_jumpMenu('parent',this,0)" name=select12>
              <OPTION selected>EDIÇÕES ANTERIORES - SELECIONE A EDIÇÃO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</OPTION>
              <?php


$logado = $_COOKIE['usuario'];
$logado2 = $_COOKIE['senha'];

$sql = mysql_query("SELECT * FROM cw_clientes WHERE usuario = '$logado' AND senha = '$logado2' AND assinatura = '1'");
$contar = mysql_num_rows($sql); 

if ( $contar == 1 ) {
	
$sql = mysql_query("SELECT * FROM cw_edicoes ORDER BY id DESC");
} else {

$sql = mysql_query("SELECT * FROM cw_edicoes ORDER BY id DESC LIMIT 555 OFFSET 1");

}

$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {
   }
else 
   {
while($y = mysql_fetch_array($sql))
   { ?>
              <OPTION 
        value="administrador/ups/edicoes/<?php echo $y["pasta"]; ?>/">            
                <?php echo $y["edicao"]; ?>
                </OPTION>
              <?php } } ?>
              </SELECT>
          </td>
        </tr>
      </table></td>
      </tr>
  </table>
  </td>
  </tr>
</table>