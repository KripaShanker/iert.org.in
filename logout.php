<?php 
session_start();
unset($_SESSION['authenticated']);
unset($_SESSION['username']);
unset($_SESSION['password']);
echo $_GLOBALS['message']="You are logged out successfully!";
header("Location:admin.php");
?>