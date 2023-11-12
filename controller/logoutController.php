<?php 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

header("LOCATION: ../view/login.php");
exit;
?>