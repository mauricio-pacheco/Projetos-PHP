<?php
session_start();

if ($_SESSION[validacao] == "1")
{
?>
<?php
}
else
{
?>

<script type="text/javascript">
alert("Login ou senha incorreta")
</script>

<?php
echo "<script>location.href='index.php'</script>";
}
ob_end_flush();  
?>
