<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
<table width="99%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="29%" bgcolor="#E6E6E6" valign="top"><table width="33%" border="0" cellspacing="0" cellpadding="0" class="fonte">
      <tr>
        <td valign="top"><?php

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
              <td align="center">
              
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center" bgcolor="#E71E26" class="edicao"><b><font color="#FFFFFF"><?php echo $y["edicao"]; ?></font></b></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td align="center"><form action="iredi.php" method="post" name="logincs" id="logincs">
                <input name="pasta" type="hidden" value="<?php echo $y["pasta"]; ?>" />
                <input name="usuario" type="hidden" value="<?php echo $logado; ?>" />
                <input name="senha" type="hidden" value="<?php echo $logado2; ?>" />
                <input name="button" type="image" src="administrador/ups/capasedicoes/<?php echo $y["foto"]; ?>" border="0" alt="Visualizar a Edição de <?php echo $y["edicao"]; ?>" title="Visualizar a Edição de <?php echo $y["edicao"]; ?>" width="218" height="300" />
              </form></td>
            </tr>
          </table>
          <?php } } ?>
          <table width="100%" border="0">
            <tr>
              <td><table width="100%" border="0">
                <tr>
                  <td width="64%" align="center"><select class="fonte" style=" height:30px"
      id="select11" onchange="MM_jumpMenu('parent',this,0)" name="select12">
                    <option selected="selected">EDIÇÕES ANTERIORES - SELECIONE A EDIÇÃO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
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
                    <option 
        value="administrador/ups/edicoes/<?php echo $y["pasta"]; ?>/"> <?php echo $y["edicao"]; ?> </option>
                    <?php } } ?>
                  </select></td>
                </tr>
              </table></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
    <td width="71%">&nbsp;</td>
  </tr>
</table>
