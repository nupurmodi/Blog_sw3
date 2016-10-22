<?php
session_start();
if(!isset($_SESSION["user"])){
echo '<script>alert("YOU ARE NOT LOGGED IN....\nYOU HAVE TO LOGIN AGAIN");</script>';
header("refresh:0;url=login.php");
exit(); }
?>
