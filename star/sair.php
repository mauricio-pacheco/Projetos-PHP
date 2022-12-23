<? 
setcookie("nodstrumCalendarV2", "nada", time()-3600*24*30);

//REDIRECIONA PARA A TELA DE LOGIN 
echo "<script>location.href='agenda.php'</script>";
Header("Location: agenda.php"); 
?>