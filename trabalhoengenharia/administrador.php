<?php include ("cabecalho3.php"); ?>

<?php include ("creditos.php"); ?>
<style type="text/css">
<!--
.style15 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
}
.style17 {
	color: #000000;
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style20 {color: #000000; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style22 {font-size: 10px}
-->
</style>
 <script language=javascript>
function validar(form1) { 

if (document.form1.usuario.value=="") {
alert("O Campo Usuário não está preenchido!")
form1.usuario.focus();
return false
}

if (document.form1.password.value=="") {
alert("O Campo Senha não está preenchido!")
form1.password.focus();
return false
}

}

</SCRIPT>
<p align="center"><img src="login.jpg" width="400" height="30" /></p>
<form action="auth.php" method="post" name="form1" id="form1" onsubmit="return validar(this)">
  <p align="center"><span class="style15">* Campos Obrigat&oacute;rios</span></p>
  <div align="center" class="style20">
    <table width="17%" border="0">
      <tr>
        <td width="47"><span class="style22">Usu&aacute;rio: </span></td>
        <td width="243"><span class="style22">
          <input name="usuario" type="text" class="caixacontato" size="16" />
          *</span></td>
      </tr>
      <tr>
        <td><span class="style22">Senha:</span></td>
        <td><span class="style22">
          <input name="password" type="password" class="caixacontato" size="16" />
        </span> <span class="style22">  *</span></td>
      </tr>
    </table>
  </div>
  <p align="center" class="style17">
    <input type="submit" class="texto" value="Entrar" />
    &nbsp;&nbsp;
    <input class="texto" type="reset" value="Limpar" />
  </p>
</form>
<p align="center">&nbsp;</p>
<br>

</body>
</html>