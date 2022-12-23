<?
$cat_pai2 = $cat_pai;
$path_local = "libs/padrao.php";
include "libs/db.php";
?>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#E5E5E5">
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr bgcolor="#FFFFFF">
          <td width="66%" bgcolor="#FFFFFF" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr bgcolor="#1E5979">
                <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#FFFFFF">::
                  <?
//
// Inclue a classe que gera destaques.
include ("libs/classes/destaques.php");
$destaque = new destaques;
// Pega dados de destaque que possui campo id_destaque = 0 se o valor $destaque_meio não foi setado
if(!$destaque_meio){
$rdestaque = $destaque->imprime_destaque("0");
print $rdestaque[1];
} else {
$rdestaque = $destaque->imprime_destaque("$destaque_meio");
print $rdestaque[1];
}
?> </font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#FFFFFF">::</font></b></font></b></font></td>
              </tr>
            </table>
            <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000"><?
print $rdestaque[2];
?><br>
            <?
// Pega dados de destaque(produto) que possui campo promo =1
print  $destaque->imprime_destaque_produtos_mais_lateral("2");
?> </font><br>
          </td>
          <td width="34%" bgcolor="#FFFFFF" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr bgcolor="#333333">
                <td>
                  <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#FFFFFF">::
                    <?
// Pega dados de destaque que possui campo id_destaque = 1
$rdestaque = $destaque->imprime_destaque("1");
print $rdestaque[1];
?> </font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#FFFFFF">::</font></b></font></b></font></div>
                </td>
              </tr>
            </table>
            <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000"><?
// Pega dados de destaque(produto) que possui campo promo =1
print  $destaque->imprime_destaque_produtos_mais("1");
?></font></div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br>
<?php include ('rodape.php') ?>
