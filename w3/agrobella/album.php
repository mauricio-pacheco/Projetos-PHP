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
                                  <td class="tahoma10cinza666666"><p class="spip" align="center">
                                    </p>
   <?php


include "conexao.php";

$sql = mysql_query("SELECT * FROM galerias");
$contar = mysql_num_rows($sql); 

while($n = mysql_fetch_array($sql))
   {
   ?>
                                      <br />
                                      <p align="center"><a class="tahoma10preto" href="perfil.php?id=<?php echo $n["id"]; ?>"><img src="galerias/<?php echo $n["foto1"]; ?>" border="0" alt="<?php echo $n["nomegaleria"]; ?>" width="200" height="150" border="1" /></a><br> <a class="tahoma10preto" href="perfil.php?id=<?php echo $n["id"]; ?>"><img src="camara.gif" border="0"></a>&nbsp;<a class="tahoma10preto" href="perfil.php?id=<?php echo $n["id"]; ?>"><span class="style3"><?php echo $n["nomegaleria"]; ?></span></a></p><br>
                                    <?
									 if ($contar < 1)  //Mostra se h&aacute; algum registro na tabela, caso n&atilde;o houver, ele mostrar&aacute; a mensagem abaixo
   {echo "<div align=center><br><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>N&atilde;o existe galerias cadastradas!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrar&aacute; os registros. OBS: Voc&ecirc; pode mudar o modo de exibir os registros
     //mais n&atilde;o mude nenhuma vari&aacute;vel, a n&atilde;o ser que mude o script todo.
   { }}?></td>
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
