<? 
setcookie("usuario", "nada", time()-3600*24*30);
setcookie("senha", "nada", time()-3600*24*30);

//REDIRECIONA PARA A TELA DE LOGIN 
echo "<script>location.href='index.php'</script>";
Header("Location: index.php"); 
?>