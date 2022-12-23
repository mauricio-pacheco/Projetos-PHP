<HTML><HEAD><TITLE>Superlig - Clientes</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META content="MSHTML 6.00.2900.2180" name=GENERATOR><LINK 
href="default2.css" type=text/css 
rel=StyleSheet>
<script LANGUAGE="JavaScript">
<!-- Begin
function validate(){
var digits="0123456789"
var temp
if (document.testform.nome.value=="") {
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
<BODY bgcolor="#24211D" text=#000000 link=#000000 vLink=#000000 aLink=#000000>
<TABLE width="100%" border=0>
  <TBODY>
    <TR> 
      <TD width="86%"> <DIV align=center> 
          <P><br><img src="marron.jpg" width="400" height="84"> </P>
          <P><font color="#FFFFFF"><em>Servi&ccedil;o de atendimento</em></font></P>
          <P><em><font color="#FFFFFF" size="2">* Campos Obrigat&oacute;rios</font></em></P>
          <form action="enviaf.php" method="POST" name="testform" onSubmit="return validate()">
		    <table width="100%" border="0" align="left">
              <tr> 
                <td><strong><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cliente:</font></strong></td>
                <td><input name="cliente" type="radio" value="Sou cliente" checked> 
                  <strong><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">Sou 
                  cliente </font></strong> <input type="radio" name="cliente" value="Ainda não sou cliente">
                  <strong><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">Ainda 
                  n&atilde;o sou cliente *</font></strong></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td><strong><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">Op&ccedil;&atilde;o:</font></strong></td>
                <td><input name="duvida" type="radio" value="Dúvida" checked> 
                  <strong><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">D&uacute;vida</font></strong> 
                  <input type="radio" name="duvida" value="Sugestão"> 
                  <strong><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">Sugest&atilde;o</font></strong> 
                  <input type="radio" name="duvida" value="Crítica"> 
                  <strong><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cr&iacute;tica</font></strong> 
                  <input type="radio" name="duvida" value="Reclamação">
                  <strong><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">Reclama&ccedil;&atilde;o 
                  * </font></strong></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr> 
                <td><strong><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome 
                  completo:</font></strong></td>
                <td><font 
            face="Verdana, Arial, Helvetica, sans-serif" size=2> 
                  <input maxlength=50 size=56 name="hospede">
                  <font color="#FFFFFF">*</font> </font></td>
              </tr>
              <tr> 
                <td><strong><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cidade:</font></strong></td>
                <td><font 
            face="Verdana, Arial, Helvetica, sans-serif" size=2> 
                  <input maxlength=50 size=40 name="cidade">
                  </font></td>
              </tr>
              <tr> 
                <td><strong><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">Telefone:</font></strong></td>
                <td><font 
            face="Verdana, Arial, Helvetica, sans-serif" size=2> 
                  <input maxlength=32 name="telefone">
                  </font></td>
              </tr>
              <tr> 
                <td><strong><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">Empresa:</font></strong></td>
                <td><font 
            face="Verdana, Arial, Helvetica, sans-serif" size=2> 
                  <input maxlength=32 size=50 name="endereco">
                  </font></td>
              </tr>
              <tr> 
                <td><strong><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif">E-mail:</font></strong></td>
                <td><font face="Verdana, Arial, Helvetica, sans-serif" 
            size=2> 
                  <input maxlength=32 size=30 name="email">
                  <font color="#FFFFFF">*</font> </font></td>
              </tr>
            </table>
          <P align="left">&nbsp;</P>
          <P align="left">&nbsp;</P>
          <P align="left">&nbsp;</P>
          <P align="left">&nbsp;</P>
            <P align="left">&nbsp;</P>
          <P align="left"><font color="#FFFFFF" 
      size=1 face="Verdana, Arial, Helvetica, sans-serif"><strong>Mensagem:</strong></font></P>
          <p align="left"><font color="#FFFFFF" size=2 face="Verdana, Arial, Helvetica, sans-serif"> 
              <textarea name="mensagem" rows=10 cols=80></textarea>
            </font></p>
          <P align="left"> <font color="#FFFFFF">
            <input type="Submit" value="Enviar" name="Submit">
              </font> 
          </form></P>
        </DIV></TD>
    </TR>
  </TBODY>
</TABLE>
<script LANGUAGE="JavaScript">
<!-- Begin
var email = GetCookie('email_address');
if (email == null) {
email = 'your email here';
}
function getCookieVal (offset) {
var endstr = document.cookie.indexOf (";", offset);
if (endstr == -1)
endstr = document.cookie.length;
return unescape(document.cookie.substring(offset, endstr));
}
function GetCookie (name) {
var arg = name + "=";
var alen = arg.length;
var clen = document.cookie.length;
var i = 0;
while (i < clen) {
var j = i + alen;
if (document.cookie.substring(i, j) == arg)
return getCookieVal (j);
i = document.cookie.indexOf(" ", i) + 1;
if (i == 0)
break;
}
return null;
}
function SetCookie (name, value) {
var argv = SetCookie.arguments;
var argc = SetCookie.arguments.length;
var expires = (argc > 2) ? argv[2] : null;
var path = (argc > 3) ? argv[3] : null;
var domain = ".internet.com";
// (argc > 4) ? argv[4] : null;
var secure = (argc > 5) ? argv[5] : false;
document.cookie = name + "=" + escape (value) +
((expires == null) ? "" : ("; expires=" +
expires.toGMTString())) +
((path == null) ? "" : ("; path=" + path)) +
((domain == null) ? "" : ("; domain=" + domain)) +
((secure == true) ? "; secure" : "");
}
// End -->

</script> <script language="JavaScript">

<!-- Begin
function chk() {
email = document.scriptbot.email.value;
invalid = "Invalid email address.  Be sure that in your email address you included ";
invalid = invalid + "your Username, the '@' Sign, and the Domain Name.";

if (email.indexOf("@")<1 || email == "your email here" || email == "") {
alert(invalid);
return false;
}
else { 
doAd();
return true;
}
}

function doAd() {
pathname = location.pathname;
myDomain = pathname.substring(0,pathname.lastIndexOf('/')) +'/';
var largeExpDate = new Date ();
largeExpDate.setTime(largeExpDate.getTime() + (24 * 3600 * 1000));
SetCookie('email_address',email,largeExpDate,myDomain);
page = "http://javascript.internet.com/sent.html?" + email;
window.open(page, "AdWindow", "width=515,height=150");
return true;
}
// End -->

</script>
</BODY></HTML>
