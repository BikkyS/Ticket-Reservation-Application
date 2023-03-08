<?php
session_start();
$_SESSION=array();
setcookie('number',$_SESSION["loggedin"],60);
session_destroy();
header("location:login.php")
?>