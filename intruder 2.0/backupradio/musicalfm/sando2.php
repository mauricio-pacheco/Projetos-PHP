
<html>
<head>
<title>Cadastro B&aacute;sico Brasil</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #E7F8F1;
}
-->
</style></head>
<LINK href="style.css" type=text/css rel=stylesheet>
<body text="#000000" link="#000000" vlink="#000000" alink="#000000">
<script language="JavaScript"><!--
////
 
function validar(Form) {


var invalid, s;
invalid = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
 
var s;
 
 
if (document.cadastro.musica1.value=="") {
alert("O Campo Música 1 não está preenchido!")
return false
}

if (document.cadastro.musica2.value=="") {
alert("O Campo Música 2 não está preenchido!")
return false
}


if (document.cadastro.musica3.value=="") {
alert("O Campo Música 3 não está preenchido!")
return false
}

if (document.cadastro.musica4.value=="") {
alert("O Campo Música 4 não está preenchido!")
return false
}

if (document.cadastro.musica5.value=="") {
alert("O Campo Música 5 não está preenchido!")
return false
}

if (document.cadastro.musica6.value=="") {
alert("O Campo Música 6 não está preenchido!")
return false
}

if (document.cadastro.musica7.value=="") {
alert("O Campo Música 7 não está preenchido!")
return false
}

if (document.cadastro.musica8.value=="") {
alert("O Campo Música 8 não está preenchido!")
return false
}

if (document.cadastro.musica9.value=="") {
alert("O Campo Música 9 não está preenchido!")
return false
}
if (document.cadastro.musica10.value=="") {
alert("O Campo Música 10 não está preenchido!")
return false
}




// inicio de verificacao de cnpj ou cpf
if (Form.cnpj.value.length == 0) {
alert("O CNPJ/CPF é um campo obrigatório !");
Form.cnpj.focus();
return false; }

s = limpa_string(Form.cnpj.value);


// checa se é cpf 
if (s.length == 11) {
if (valida_CPF(Form.cnpj.value) == false ) {
alert("O CPF não é válido !");
Form.cnpj.focus();
return false; }
}

// checa se é cgc
else if (s.length == 14) {
if (valida_CGC(Form.cnpj.value) == false ) {
alert("O CNPJ não é válido !");
Form.cnpj.focus();
return false; }
}
else {
alert("O CPF/CNPJ não é válido !");
Form.cnpj.focus();
return false;
}
 
// final da verificacao de cnpj ou cpf
 
 
// verifica o cep
// primeiro deixa somente numeros no cep
// obs.:a chamada abaixo tambem pode ser utilizada para checar telefones

s = limpa_string(Form.cep.value);
if (s.length < 8) {
alert("Digite corretamente o CEP: 99999-999 !");
Form.cep.focus();
return false; }
 
 
 
if (invalid.test(document.cadastro.email.value) == true) {
// caso o teste falhe, para mudar a cor do texto na caixa, mude na linha abaixo
document.cadastro.email.style.color = "red";

alert("Endereço de E-mail inválido !");
Form.email.focus();
return (false); }
 
return true;
}
// fim da funcao validar()
 
 
function limpa_string(S){
// Deixa so' os digitos no numero
var Digitos = "0123456789";
var temp = "";
var digito = "";
 
for (var i=0; i<S.length; i++) {
digito = S.charAt(i);
if (Digitos.indexOf(digito)>=0) {
temp=temp+digito }
} //for
 
return temp
}
// fim da funcao
 
 
function valida_CPF(s) {
var i;
s = limpa_string(s);
var c = s.substr(0,9);
var dv = s.substr(9,2);
var d1 = 0;
for (i = 0; i < 9; i++)
{
d1 += c.charAt(i)*(10-i);
}
if (d1 == 0) return false;
d1 = 11 - (d1 % 11);
if (d1 > 9) d1 = 0;
if (dv.charAt(0) != d1)
{
return false;
}
 
d1 *= 2;
for (i = 0; i < 9; i++)
{
d1 += c.charAt(i)*(11-i);
}
d1 = 11 - (d1 % 11);
if (d1 > 9) d1 = 0;
if (dv.charAt(1) != d1)
{
return false;
}
return true;
}
 
function valida_CGC(s)
{
var i;
s = limpa_string(s);
var c = s.substr(0,12);
var dv = s.substr(12,2);
var d1 = 0;
for (i = 0; i < 12; i++)
{
d1 += c.charAt(11-i)*(2+(i % 8));
}
if (d1 == 0) return false;
d1 = 11 - (d1 % 11);
if (d1 > 9) d1 = 0;
if (dv.charAt(0) != d1)
{
return false;
}
 
d1 *= 2;
for (i = 0; i < 12; i++)
{
d1 += c.charAt(11-i)*(2+((i+1) % 8));
}
d1 = 11 - (d1 % 11);
if (d1 > 9) d1 = 0;
if (dv.charAt(1) != d1)
{
return false;
}
return true;
}
 
// -->
</script>
<form action="sando.php" method="post">
  <p align="center">&nbsp;</p>
  <TABLE width="555" border="0" align="center" cellPadding=0 cellSpacing=0 bgcolor="#E7F8F1">
    <TBODY>
      <TR> 
        <TD width=20>&nbsp;</TD>
        <TD width="515"><TABLE cellSpacing=0 cellPadding=0 width="98%" align=center  border=0>
            <TBODY>
              <TR> 
                <TD><TABLE cellSpacing=0 cellPadding=0 width="505" 
border=0>
                    <TBODY>
                      <TR> 
                        <TD width=20>&nbsp;</TD>
                        <TD width="465"><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                            <TBODY>
                              <TR> 
                                <TD height="24" colSpan=2><div align="center"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=2><STRONG>Top 10 Musical </STRONG></FONT><br>
                                </div></TD>
                              </TR>
                              <TR>
                                <TD>&nbsp;</TD>
                                <TD>&nbsp;</TD>
                              </TR>
                              <TR> 
                                <TD width="27%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 1:</FONT></TD>
                                <TD width="73%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <INPUT 
                                class=camposformularios id="musica1" 
                                size=50 name="musica1" value="<? echo $dados['musica1']; ?>">
                                  <font color="#FF0000">*</font> </FONT></TD>
                              </TR>
                              <TR> 
                                <TD><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 2 :</font></TD>
                                <TD><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <input 
                                class=camposformularios size=50 id="musica2" name="musica2" value="<? echo $dados['musica2']; ?>">
                                  </font></TD>
                              </TR>
                              <TR> 
                                <TD width="27%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 3 :</FONT></TD>
                                <TD width="73%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <INPUT 
                                class=camposformularios id="musica3" size=50 name="musica3" value="<? echo $dados['musica3']; ?>">
                                  <font color="#FF0000">*</font> </FONT></TD>
                              </TR>
                              <TR> 
                                <TD width="27%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 4 :</FONT></TD>
                                <TD width="73%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <INPUT 
                                class=camposformularios id="musica4" size=50 name="musica4" value="<? echo $dados['musica4']; ?>">
                                  <font color="#FF0000">*</font> </FONT></TD>
                              </TR>
                              <TR> 
                                <TD><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 5 :</font></TD>
                                <TD><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <INPUT size="50"
                                class=camposformularios id="musica5" name="musica5" value="<? echo $dados['musica5']; ?>">
                                  <font color="#FF0000">*</font> </FONT></TD>
                              </TR>
                              <TR> 
                                <TD><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 6 :</font></TD>
                                <TD><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>
                                  <input 
                                class=camposformularios id="musica6" name="musica6" size="50" value="<? echo $dados['musica6']; ?>">
                                <font color="#FF0000">*</font> </FONT></TD>
                              </TR>
                              <TR> 
                                <TD width="27%"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 7 :</font></TD>
                                <TD width="73%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <INPUT 
                                class=camposformularios id="musica7" name="musica7" size="50" value="<? echo $dados['musica7']; ?>">
                                  <font color="#FF0000">*</font> </FONT></TD>
                              </TR>
                              <TR> 
                                <TD width="27%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 8 :</FONT></TD>
                                <TD width="73%"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <INPUT 
                                class=camposformularioscomuns id="musica8" size=50 name="musica8" value="<? echo $dados['musica8']; ?>">
                                  <font color="#FF0000">*</font> </FONT></TD>
                              </TR>
                              <TR> 
                                <TD><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 9 :</font></TD>
                                <TD><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <input 
                                class=camposformulariosminusculo id="musica9" 
                                size=50 name="musica9" value="<? echo $dados['musica9']; ?>">
                                  <font color="#FF0000">*</font></font></TD>
                              </TR>
                              <TR> 
                                <TD><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>M&uacute;sica 10 :</FONT></TD>
                                <TD><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1> 
                                  <input class=camposformularioscomuns id="musica10" size=50 name="musica10" value="<? echo $dados['musica10']; ?>">
                                  <font color="#FF0000">*</font></font></TD>
                              </TR>
                              <TR> 
                                <TD width="27%">&nbsp;</TD>
                                <TD width="73%"><div align="right"><FONT 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color=#000000 size=1>&nbsp; <font color="#FF0000">*</font> 
                                    Campos Obrigat&oacute;rios</FONT></div></TD>
                              </TR>
                            </TBODY>
                          </TABLE></TD>
                        <TD width=20>&nbsp;</TD>
                      </TR>
                      <TR> 
                        <TD width=20>&nbsp;</TD>
                        <TD width="465">&nbsp;</TD>
                        <TD width=20>&nbsp;</TD>
                      </TR>
                    </TBODY>
                  </TABLE></TD>
              </TR>
              <TR> 
                <TD><div align="center">
                    <INPUT class=botoes type=submit value="ATUALIZAR TOP 10 MUSICAL" name=Submit>
                  </div></TD>
              </TR>
            </TBODY>
          </TABLE></TD>
        <TD width=20>&nbsp;</TD>
      </TR>
      <TR> 
        <TD width=20>&nbsp; </TD>
        <TD width="515">&nbsp;</TD>
        <TD width=20>&nbsp; </TD>
      </TR>
    </TBODY>
  </TABLE>
</form>
</body>
</html>
