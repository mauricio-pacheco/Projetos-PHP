<?php
session_start();
$_SESSION['teste'] = "A Sessões estão funcionando no servidor!";
?>
<?php
session_start();
echo $_SESSION['teste'];
?>