<?php include ("meta.php"); ?>
<?php


$racao = utf8_decode($_POST["racao"]);
$quantidade = utf8_decode($_POST['quantidade']);
$racao2 = utf8_decode($_POST["racao2"]);
$quantidade2 = utf8_decode($_POST['quantidade2']);
$racao3 = utf8_decode($_POST["racao3"]);
$quantidade3 = utf8_decode($_POST['quantidade3']);
$racao4 = utf8_decode($_POST["racao4"]);
$quantidade4 = utf8_decode($_POST['quantidade4']);
$racao5 = utf8_decode($_POST["racao5"]);
$quantidade5 = utf8_decode($_POST['quantidade5']);
$nome = utf8_decode($_POST['nome']);
$email = utf8_decode($_POST['email']);
$telefone = utf8_decode($_POST['telefone']);
$fax = utf8_decode($_POST['fax']);
$endereco = utf8_decode($_POST['endereco']);
$complemento = utf8_decode($_POST['complemento']);
$bairro = utf8_decode($_POST['bairro']);
$cidade = utf8_decode($_POST['cidade']);
$cep = utf8_decode($_POST['cep']);
$estado = utf8_decode($_POST['estado']);
$msg = utf8_decode($_POST['msg']);
$end = utf8_decode('Endereço:');

$mensagem  = "<b>DADOS DOS PRODUTOS COMPRADOS:</b><br><br>";
$mensagem .= "<b>Nome do Produto:</b> \t$racao<BR>";
$mensagem .= "<b>Quantidade:</b> \t$quantidade<BR><br>";
$mensagem .= "<b>Nome do Produto:</b> \t$racao2<BR>";
$mensagem .= "<b>Quantidade:</b> \t$quantidade2<BR><br>";
$mensagem .= "<b>Nome do Produto:</b> \t$racao3<BR>";
$mensagem .= "<b>Quantidade:</b> \t$quantidade3<BR><br>";
$mensagem .= "<b>Nome do Produto:</b> \t$racao4<BR>";
$mensagem .= "<b>Quantidade:</b> \t$quantidade4<BR><br>";
$mensagem .= "<b>Nome do Produto:</b> \t$racao5<BR>";
$mensagem .= "<b>Quantidade:</b> \t$quantidade5<BR><br>";
$mensagem .= "<b>DADOS DO CLIENTE:</b><br><br>";
$mensagem .= "<b>Nome:</b> \t$nome<BR>";
$mensagem .= "<b>E-mail:</b> \t$email<BR>";
$mensagem .= "<b>Telefone:</b> \t$telefone<BR>";
$mensagem .= "<b>FAX:</b> \t$fax<BR>";
$mensagem .= "<b>$end</b> \t$endereco<BR>";
$mensagem .= "<b>Complemento:</b> \t$complemento<BR>";
$mensagem .= "<b>Bairro:</b> \t$bairro<BR>";
$mensagem .= "<b>Cidade:</b> \t$cidade<BR>";
$mensagem .= "<b>Cep:</b> \t$cep<BR>";
$mensagem .= "<b>Estado:</b> \t$estado<BR>";
$mensagem .= "<b>Mensagem:</b> \t$msg<BR>";
 
//$mensagem = "$msg";
$remetente = "$email";
$destinatario = "contabilidade@agrobellaalimentos.com.br";
$assunto = utf8_decode("FORMULÁRIO DE COMPRA AGROBELLA");
$headers = "From: ".$remetente."\nContent-type: text/html"; # o &lsquo;text/html&rsquo; &eacute; o tipo mime da mensagem
 
if(!mail($destinatario,$assunto,$mensagem,$headers)){
 
header('Location: erro.php');
 
}
?><style type="text/css">
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
                      height=32><img src="comprado.png"></TD>
                    </TR>
                    <TR>
                      <TD colSpan=2>
                        <FORM name=cadastro action=comprado.php enctype="multipart/form-data" method=post onSubmit="return validar(this)">
                          <table cellspacing="10" cellpadding="0" width="100%" 
                        border="0">
                            <tbody>
                              <tr>
                                <td class="tahoma10cinza666666"><table cellspacing="1" cellpadding="3" width="100%" 
                        align="center" border="0">
                                    <tbody>
                                      <tr>
                                        <td width="72%" colspan="2" 
                            bgcolor="#ffffff" 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif"><div class="back" align="center"> <span class="tahoma10preto"></span>
                                                <div align="center"><img src="logocolorido.jpg" /></div><br><br>
                                                <div align="center"><img src="comprado.gif" /></div>
                                        </div></td>
                                      </tr>
                                    </tbody>
                                    <tr>
                                      <td 
                            style="FONT-SIZE: 9px; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif" 
                            bgcolor="#ffffff" colspan="2">
                                          <br><p align="center" class="style3">Produto Comprado com Sucesso! </p>
                                        <p align="center" class="style3">Em Breve estaremos entrando em contato.</p></td>
                                    </tr>
                                </table></td>
                              </tr>
                            </tbody>
                          </table>
                        </FORM></TD></TR> <TR>
                      <TD width=100% background=home_arquivos/bg_tit_novidades.jpg 
                      height=32><?php include ("rodape.php"); ?></TD>
                    </TR>
                   </TBODY></TABLE></TD>
               </TR></TBODY></TABLE></TD>
     <TD>&nbsp;</TD></TR></TBODY></TABLE>     </TD></TR></TBODY></TABLE><?php include ("abaixo.php"); ?>
</BODY>
</HTML>
