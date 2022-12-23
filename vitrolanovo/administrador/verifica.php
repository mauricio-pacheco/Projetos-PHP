<? 
session_start();

if ($validacao == "1")
{
?>
<?
}
else
{
?>

<script type="text/javascript">
alert("Login ou senha incorreta")
</script>

<?
echo "<script>location.href='administrador.php'</script>";
}
ob_end_flush();  
?>
