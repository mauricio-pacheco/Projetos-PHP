<?php
setcookie("email", "", time()-3600); 
setcookie("senha", "", time()-3600); 
setcookie("idrecebedor", "", time()-3600); 
header("Location:home.php");
?> 