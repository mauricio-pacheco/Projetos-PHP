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
                  Downloads </font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#FFFFFF">::</font></b></font></b></font></td>
              </tr>
            </table>
            <p><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><br>
              <b>Abaixo voc&ecirc; confere os arquivos de downloads que podem
              ser baixados no site:</b></font></p>
            <p><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>PHP
              PHPLojaFacil 0.1.4</b> (22/11/2002)<br>
              O release atual do projeto.<br>
              Este release possui algumas modifica&ccedil;&otilde;es de segurança, correção de bugs
              reportados por usuários através do site do projeto, entre outras melhorias. <br>
              <b>Necess&aacute;rio:</b><br>
              - Mesmas configura&ccedil;&otilde;es do 0.1.3<br>
              <a href="http://www.phpbrasil.com/scripts/script.php/id/303">DOWNLOAD</a> </font></p>
            <p><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b>PHP
              PHPLojaFacil 0.1.3</b> (02/07/2002)<br>
              Primeiro release seguro do projeto.<br>
              <b>Necess&aacute;rio:</b><br>
              - PHP 4.0 ou maior com suporte as seguintes fun&ccedil;&otilde;es:<br>
              - ftp<br>
              - sessions<br>
              - cookies<br>
              - acesso ao MySQL(Claro:P)<br>
              - MySQL 3.23 ou maior.<br>
              <br>
              Antes deste release(0.1.3), dois j&aacute; tinham sido lan&ccedil;ados
              com o nome de PHPBrazillianMerchant, por&eacute;m por motivos de seguran&ccedil;a resolvi remov&ecirc;-los
              definitivamente do site.<br>
              <a href="http://www.phpbrasil.com/scripts/script.php/id/303">DOWNLOAD</a> </font></p>
            </td>
          <td width="34%" bgcolor="#FFFFFF" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr bgcolor="#333333">
                <td>
                  <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#FFFFFF">::
                    <?
// Inclui a classe que gera destaques.
include ("libs/classes/destaques.php");
$destaque = new destaques;
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
