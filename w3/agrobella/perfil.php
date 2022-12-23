<?php include ("meta.php"); ?>
<style type="text/css">
<!--
.style3 {font-size: 12px}
-->
</style>
</HTML>
<SCRIPT src="home_arquivos/urchin.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/urchin.js" type=text/javascript></SCRIPT>
<BODY>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD>
      <DIV id=Layer1 style="Z-INDEX: 1; WIDTH: 100%; POSITION: absolute">
      <TABLE height=284 cellSpacing=0 cellPadding=0 width=770 align=center 
      border=0>
        <TBODY>
        <TR>
          <TD vAlign=bottom><SCRIPT src="carrega.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash('menu.swf','770','68'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT>            </TD></TR></TBODY></TABLE></DIV>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD class=bgCabecEsq>&nbsp;</TD></TR>
              <TR>
                <TD class=bgMenuEsq>&nbsp;</TD></TR></TBODY></TABLE></TD>
          <TD class=bgCabecDir vAlign=top width=770 bgColor=#ffffff>
            <TABLE cellSpacing=0 cellPadding=0 width=770 border=0>
              <TBODY>
              <TR>
                <TD background=home_arquivos/bg_cabec_esq.jpg>
                  <SCRIPT src="carrega2.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash('cabec.swf','770','225'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT>                </TD></TR>
              <TR>
                <TD>&nbsp;</TD></TR></TBODY></TABLE></TD>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD class=bgCabecDir>&nbsp;</TD></TR>
              <TR>
                <TD 
      class=bgMenuEsq>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD>&nbsp;</TD>
          <TD width=770>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <?php include ("menu.php"); ?>
                <TD vAlign=top width=80% bgColor=#ffffff>
                  <DIV align=center><BR>
                  </DIV>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD width=27 background=home_arquivos/bg_tit_novidades.jpg 
                      height=32><img src="fotenha.png"></TD>
                    </TR>
                    <TR>
                      <TD colSpan=2>
                        <FORM name=cadastro action=comprado.php enctype="multipart/form-data" method=post onSubmit="return validar(this)"><TABLE cellSpacing=10 cellPadding=0 width="100%" 
                        border=0>
                          <TBODY>
                          <TR>
                            <TD class=tahoma10cinza666666><table cellspacing="10" cellpadding="0" width="100%" 
                        border="0">
                              <tbody>
                                <tr>
                                  <td class="tahoma10cinza666666"><p class="spip" align="center"><br />
                                    </p>
<?php


include "conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM fotos WHERE idgaleria = ('$id') LIMIT 1");
$contar = mysql_num_rows($sql); 

while($n = mysql_fetch_array($sql))
   {

   ?><? $sql = mysql_query("SELECT * FROM galerias WHERE id = ($n[idgaleria]) LIMIT 1");
$contar = mysql_num_rows($sql); 

while($p = mysql_fetch_array($sql))
   {

   ?><p align="center"><img src="camara.gif"><br><br><font size="2"><?php echo $p["nomegaleria"]; ?></font><? } ?></p>
                                    
      <?php

include "conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM fotos WHERE idgaleria = ('$id')");
$contar = mysql_num_rows($sql); 

while($n = mysql_fetch_array($sql))
   {
   ?>
		<p align="center">
		<? echo "<img border=1 src=arquivos/". $n['idgaleria'] ."/". $n['foto1'] ." ><br><br>";
    ?><br><font size="2"><?php echo $n["comen1"]; ?></font></p>
	
	
	<? 
	}
	

}
?>

               <table width="12%" border="0" align="center">
                                    <tr>
                                      <td width="7%"><img src="setaco.jpg" width="16" height="16"></td>
                                      <td width="93%"><a href="javascript:history.go(-1)" class="link_paginas">VOLTAR</a></td>
                                    </tr>
                                  </table>                         
                                      
                                      
                                      
                               </td>
                                </tr>
                              </tbody>
                            </table>
                            </TD>
                          </TR></TBODY></TABLE></FORM></TD></TR> <TR>
                      <TD width=100% background=home_arquivos/bg_tit_novidades.jpg 
                      height=32><?php include ("rodape.php"); ?></TD>
                    </TR>
                   </TBODY></TABLE></TD>
               </TR></TBODY></TABLE></TD>
     <TD>&nbsp;</TD></TR></TBODY></TABLE>     </TD></TR></TBODY></TABLE><?php include ("abaixo.php"); ?>
</BODY>
</HTML>
