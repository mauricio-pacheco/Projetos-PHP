<?php include ("meta.php"); ?>
<style type="text/css">
<!--
.style1 {color: #808080}
-->
</style>
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
    </SCRIPT>
            </TD></TR></TBODY></TABLE></DIV>
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
    </SCRIPT>
                </TD></TR>
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
                      height=32><img src="cotacao.png"></TD>
                    </TR>
                    <TR>
                      <TD colSpan=2>
                        <TABLE cellSpacing=10 cellPadding=0 width="100%" 
                        border=0>
                          <TBODY>
                          <TR>
                            <TD class=tahoma10cinza666666><table width="98%" border="0">
                              <tr>
                                <td width="19%"><span class="tahoma10preto"><strong>Nome</strong></span></td>
                                <td width="19%"><span class="tahoma10preto"><strong>Preço</strong></span></td>
                                <td width="19%"><span class="tahoma10preto"><strong>Vencimento</strong></span></td>
                                <td width="19%"><span class="tahoma10preto"><strong>Atualizado em</strong></span></td>
                              </tr>
                            </table>
                              <?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM produtos ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  //Mostra se há algum registro na tabela, caso não houver, ele mostrará a mensagem abaixo
   {echo "<div align=center><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe produtos cadastrados!</b></font></div>"; 
   }
else //Caso tiver resgistro na tabela, ele mostrará os registros. OBS: Você pode mudar o modo de exibir os registros
     //mais não mude nenhuma variável, a não ser que mude o script todo.
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                              <table width="98%" border="0">
                                <tr>
                                  <td width="19%"><span class="tahoma10preto"><?php echo $n["nome"]; ?></span></td>
                                  <td width="19%"><span class="tahoma10preto">R$ <?php echo $n["preco"]; ?></span></td>
                                  <td width="19%"><span class="tahoma10preto"><?php echo $n["vencimento"]; ?></span></td>
                                  <td width="19%"><span class="tahoma10preto"><?php echo $n["data"]; ?> - <?php echo $n["hora"]; ?></span></td>
                                </tr>
                              </table>
                              <?
  }
  }
 ?></TD>
                          </TR></TBODY></TABLE></TD></TR> <TR>
                      <TD width=100% background=home_arquivos/bg_tit_novidades.jpg 
                      height=32><?php include ("rodape.php"); ?></TD>
                    </TR>
                   </TBODY></TABLE></TD>
               </TR></TBODY></TABLE></TD>
          <TD>&nbsp;</TD></TR></TBODY></TABLE>
    </TD></TR></TBODY></TABLE><?php include ("abaixo.php"); ?>
</BODY></HTML>
