<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Launcher Page</title>
</head>

<body>

<h1>  This is the Launcher Page</h1>
<?php
session_start();
if(!isset($_SESSION['userid'])){
?>	
<a href="registerform1.php">Register</a>
<a href="loginform.php">Login</a>
<?php 
}else{
?>
<a href="logout.php">Sign Out</a>    
<?php  
  }
?></body>
</html>
