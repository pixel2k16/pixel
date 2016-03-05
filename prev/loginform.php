<!DOCTYPE html>
<?php session_start();
    	if( isset($_SESSION['userid']) && !empty($_SESSION['userid'])){
        header('Location: location.php');
        }else{
    
?>
 
<html>
<head>
	<title>Login | Pixel</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div class="main">
	<center><img src="logo.png" width="150px;" height="100px;" ></center><br>

	
	<form method="post" id="login" action="processlogin.php">
		<input type="text" name="pixelid" placeholder="PIXELID" required><br>
		<input type="password" name="pwd" placeholder="Password" required><br>
		<button type="submit">Log In</button><br>
	<a style="color:#1abc9c; margin:10px; "href="forgot.php">Forgot Password</a>
	</form>
	
</div>
</body>
</html>
<?php }
?>