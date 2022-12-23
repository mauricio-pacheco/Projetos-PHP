<?
$msg .= "Nome completo:\t$hospede\n";
$msg .= "Cidade:\t$cidade\n";
$msg .= "Telefone:\t$telefone\n";
$msg .= "Empresa:\t$endereco\n";
$msg .= "E-mail:\t$email\n";
$msg .= "Mensagem:\t$mensagem\n";

$cabecalho = "Para: Atua Net";

mail("rferigollo@hotmail.com", "Formulário de Contatos da ATUA NET", $msg, $cabecalho);
?>
<HTML><HEAD><TITLE>Atua Net - Provedor de Internet</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META 
content="Provedor de Internet Wireless e Hospedagem de sites php5, perl, mysql, em servidores LINUX." 
name=DESCRIPTION>
<META 
content="hospedagem de sites, hospedagem de site, hospedagem site, hospedagem, hospedagem grátis, hospedagem de sites grátis, hosting, hospedagem de páginas, hospedagem, asp.net, asp.net 2.0, framework, asp, php, php5, xml, mysql, sqlserver, internet, e-mail, painel de controle, hosting, datacenter, webdesign, hospedagem, linux, fedora, core, webmail, ajax, tableless" 
name=KEYWORDS>
<META content=PT-BR name=LANGUAGE>
<META content=2 name=REVISIT-AFTER>
<META content="INDEX, FOLLOW" name=ROBOTS>
<META content="INDEX, FOLLOW" name=GOOGLEBOT>
<META content=all name=audience>
<META content=www.iphotel.com.br name=AUTHOR>
<META content="Internet" name=SUBJECT><LINK 
href="home_arquivos/css1.css" type=text/css rel=stylesheet>
<SCRIPT src="js.js"></SCRIPT>
<SCRIPT src="lado.js"></SCRIPT>
<META content="MSHTML 6.00.2900.2912" name=GENERATOR><style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
.style5 {color: #595959; }
.style6 {font-size: 10}
-->
</style>
<script LANGUAGE="JavaScript">
<!-- Begin
function validate(){
var digits="0123456789"
var temp
if (document.testform.hospede.value=="") {
alert("O Campo nome não está preenchido!")
return false
}
if (document.testform.email.value=="" || document.testform.email.value.indexOf('@')==-1 || document.testform.email.value.indexOf('.')==-1 ) {
alert("O Campo e-mail não é um e-mail válido!")
return false
}
if (document.testform.age.value=="") {
alert("O campo idade, deve ser preenchido apenas com números!")
return false
}
for (var i=0;i<document.testform.age.value.length;i++){
temp=document.testform.age.value.substring(i,i+1)
if (digits.indexOf(temp)==-1){
alert("O campo idade, deve ser preenchido apenas com números!")
return false
      }
   }
return true
}
// End -->
</script>
</HEAD>
<BODY leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
<TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD vAlign=top>
      <TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD>&nbsp;</TD>
              <TD vAlign=top width=770 bgColor=#ffffff> 
                <TABLE cellSpacing=0 cellPadding=0 width="100%" align=center 
            border=0>
                  <TBODY>
                    <TR bgColor=#ffffff> 
                      <TD width="770"><div align="center"> 
                          <script language=javascript>
     carregaFlash('parado.swf','770','220'); // Depois só descrever o caminho, largura, altura do SWF.
    </script>
                        </div></TD>
                    </TR>
                  </TBODY>
                </TABLE>
                <TABLE height=255 cellSpacing=0 cellPadding=0 width="100%" 
            align=center border=0>
              <TBODY>
              <TR>
                <TD vAlign=top width=770 height=15>
                  <TABLE height=260 cellSpacing=0 cellPadding=0 width="100%" 
                  bgColor=#ffffff border=0>
                          <TBODY>
                            <TR> 
                              <TD vAlign=top align=middle width=100%> <table width="100%" border="0">
                                  <tr>
                                    <td width="24%"><table width="100%" border="0">
                                        <TR> 
                                        <?php include("esquerda.php"); ?>  
                                        </tr>
                                      </table></td>
                                    <td width="51%"><table width="100%" height="100%" border="0">
                                        <tr> 
                                          <td><div align="center"><br>
                                          </div></td>
                                        </tr>
                                        <tr> 
                                          <td><table width="98%" border="0" align="center">
                                              <tr> 
                                                <td width="9%"><div align="center"><img src="iconecont.gif" width="40" height="50"></div></td>
                                                <td width="91%"> <div align="center"><strong><font color="#D13B00" size="2">Contatos</font></strong></div></td>
                                              </tr>
                                            </table></td>
                                        </tr>
                                        <tr>
                                          <td><table width="98%" border="0" align="center">
                                            <tr>
                                              <td><div align="justify">
                                                  <TABLE width="242" border=0 align="center">
                                                    <TBODY>
                                                      <TR>
                                                        <TD width="86%"><DIV align=center>
                                                            <P class="style5"><br>
                                                                <img src="logo.jpg" width="200" height="189"></P>
                                                            <P class="style5">&nbsp;</P>
                                                            <P class="style5"><em>FORMUL&Aacute;RIO ENVIADO COM SUCESSO!</em></P>
                                                            <P class="style5"><em>Em breve estaremos entrando em contato! </em></P>
                                                            <P class="style5 style6">&nbsp;</P>
                                                          </P>
                                                        </DIV></TD>
                                                      </TR>
                                                    </TBODY>
                                                  </TABLE>
                                                  <p>&nbsp;</p>
                                                </div></td>
                                            </tr>
                                          </table></td>
                                        </tr>
                                      </table></td>
                                    <?php include("direito.php"); ?>
                                  </tr>
                                </table></TD>
                            </TR>
                          </TBODY>
                        </TABLE>
                      </TD>
                    </TR></TBODY></TABLE></TD>
          <TD>&nbsp;</TD></TR></TBODY></TABLE></TD></TR>
  <TR>
      <TD vAlign=top height=75> 
        <?php include("baixo.php"); ?>
      <SCRIPT src="home_arquivos/urchin.js" type=text/javascript>
</SCRIPT>

      <SCRIPT type=text/javascript>
_uacct = "UA-332685-2";
urchinTracker();
</SCRIPT>
</TD></TR></TBODY></TABLE></BODY></HTML>
