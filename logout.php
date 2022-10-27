<?
session_start();
$_SESSION["auth"]=false;
unset($_SESSION["user"]);
header("Location: /index.php");
?>