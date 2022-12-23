<?php include ("meta.php"); ?>
<style type="text/css">
<!--
.style2 {font-size: 9px}
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
                      height=32><img src="pesquisado.png"></TD>
                    </TR>
                    <TR>
                      <TD colSpan=2>
                        <TABLE cellSpacing=10 cellPadding=0 width="100%" 
                        border=0>
                          <TBODY>
                          <TR>
                            <TD class=tahoma10cinza666666><table cellspacing="10" cellpadding="0" width="100%" 
                        border="0">
                              <tbody>
                                <tr>
                                  <td class="tahoma10cinza666666"><?php
								  
								  include "conectado.php";

if(!empty($HTTP_POST_VARS["palavra"])) {

        $palavra = str_replace(" ", "%", $HTTP_POST_VARS[palavra]);

        /* Altera os espaços adicionando no lugar o simbolo % */
        
      $qr = "SELECT * FROM buscador WHERE nome LIKE '%".$palavra."%'";
        
        // Executa a query no Banco de Dados
        $sql = mysql_query($qr);
        
        // Conta o total ded resultados encontrados
        $total = mysql_num_rows($sql);

        echo "<div align=\"center\" class=\"texto\" style=\"font-size: 12\">Sua busca retornou <font color\"#2C9955\">' $total ' </font> resultados.</div><br>";
			// Gera o Loop com os resultados
        while($r = mysql_fetch_array($sql)) {
		
 ?>
                                      <a class=tahoma10preto href='<?php echo $r["link"]; ?>'><img src='mapinha.gif' border='0'>&nbsp;&nbsp;<?php echo $r["nome"]; ?></a><br><br>
                                    <? }
 
  }
 
 
  
 ?></td>
                                </tr>
                              </tbody>
                            </table></TD>
                          </TR></TBODY></TABLE></TD></TR> <TR>
                      <TD width=100% background=home_arquivos/bg_tit_novidades.jpg 
                      height=32><?php include ("rodape.php"); ?></TD>
                    </TR>
                   </TBODY></TABLE></TD>
               </TR></TBODY></TABLE></TD>
          <TD>&nbsp;</TD></TR></TBODY></TABLE>
    </TD></TR></TBODY></TABLE><?php include ("abaixo.php"); ?>
</BODY></HTML>
