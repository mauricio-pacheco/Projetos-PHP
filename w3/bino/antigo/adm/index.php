<?

$senha = "binoarte"; // Essa será sua senha, altere-a e o script está pronto.



if ($acao == "ok" && $password == $senha){

		setcookie ("GuilhermeSaldanha", "ok", time()+3600*24*365);

		if ($url != "")

		{ echo "<script>window.location='$url'</script>"; }

		else

		{ echo "<script>window.location='admin.php'</script>"; }

}

else {

?>

<html>

<head>

<title>&Agrave;rea Restrita</title>

<style type="text/css">
<!--
.style1 {
	font-size: 12px;
	font-weight: bold;
}
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>



<body onLoad="formulario.password.focus()">

<form method="post" action="" name="formulario">

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p align="center"><strong>&Aacute;rea Restrita:</strong></p>
  <table width="200" border="0" align="center" cellspacing="10" style="border= 1px solid black">

    <tr> 

        <td align="center"><span class="style1">SENHA:</span><br>

			<input type="hidden" name="url" value="<? echo "$pagina"; ?>">

            <input type="password" name="password"><br><br>

			<input type="hidden" name="acao" value="ok">

      <input type="submit" name="Submit" value="ENTRAR">      </td>

    </tr>

  </table>

</form>

</body>

</html>

<?

}

?>