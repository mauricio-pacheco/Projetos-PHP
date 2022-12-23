<?php 
$numero = rand(1,3);
?>
<table width="1000" height="120" background="imagens/f<?php echo $numero; ?>.jpg" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="10%"><img src="imagens/logotipo.png" /></td>
          <td width="80%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            </tr>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="11%">&nbsp;</td>
                    <td width="40%">&nbsp;</td>
                    <td width="32%">&nbsp;</td>
                    <td width="1%">&nbsp;</td>
                    <td width="16%"><img src="imagens/fone.png" width="114" height="28" /></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="right"> <form action="buscaprodutos.php" method="post" name="form1" id="form1">
              <table width="100%" background="imagens/fundobusca.png" height="35" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="16%">&nbsp;</td>
                  <td width="66%"><input name="palavra" style="font-size:16px; height:30px; width:502px; color:#FFF; background-color:#000000" type="text" id="textfield2" onClick="this.value=''" value=" Digite o nome do produto desejado..." /></td>
                  <td width="18%" align="left"><input name="" type="image" src="imagens/pesquisa.png" /></td>
                </tr>
              </table>
            </form></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="633">
               <script language=javascript>
                function validar(cadastro) { 
				var filtro_mail = /^.+@.+\..{2,3}$/
if (!filtro_mail.test(cadastro.email.value) || cadastro.email.value=="") {
alert("Preencha o e-mail corretamente.");
cadastro.email.focus();
return false
}
}
</script>
                <form action="cadnew.php" method="post" name="cadastro" onSubmit="return validar(this)"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="10%" class="manchete_texto96" align="center"><a href="principal.php"><img src="imagens/ico_fb.png" width="44" height="38" border="0" /></a></td>
                    <td width="59%"><input name="email" style="font-size:12px; height:24px; width:330px; color:#333; background-color:#f9f9f9" type="text" onclick="this.value=''" value=" CADASTRE SEU E-MAIL E RECEBA AS NOVIDADES!" /></td>
                    <td width="30%"><input type="image" src="imagens/ok.png" width="39" height="39" /></td>
                    <td width="1%">&nbsp;</td>
                  </tr>
                </table></form></td>
                <td width="68" align="center">&nbsp;</td>
                <td width="9">&nbsp;</td>
              </tr>
            </table>
           
            </td>
        </tr>
      </table>