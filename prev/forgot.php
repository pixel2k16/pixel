<!DOCTYPE html>
<html>
<head><title>Forgot password</title>
<link rel="stylesheet" type="text/css" href="login.css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>
<body bg-color="#1abc9c">
<div class="main">
<center><h1 style="color:#1abc9c">Get the Forgotten Password</h1>
<form action="forgot.php" method="post">
  <span id="sprytextfield1">
  <label style="color:#1abc9c" for="pixelid">Enter the Pixel ID: </label>
  <input type="text" name="pixelid" id="pixelid">
  <span style="color:#1abc9c" class="textfieldRequiredMsg">A value is required.</span></span><br><br>

<input name="forgot_submit" style=" border: none; padding: 0.6em 1.2em; background: #1ABC9C; color: #fff; text-decoration:none; font-family: 'Lato', Calibri, Arial, sans-serif; font-size: 1em; letter-spacing: 1px; text-transform: uppercase; cursor: pointer; display: inline-block; margin: 3px 2px; border-radius: 2px;" type="submit" value="Get Password">
</form>
</center>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
</body>
</html>
<?php

require_once('conf/mysql_init.php');
if(isset($_POST['pixelid'])){
$pixelid=$_POST['pixelid'];
$flag=0;
$note=0;
$subject="Retreival of password";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= 'From: <support@pixelcse.org>' . "\r\n";


$result=mysql_query("select * from pixel_registration where ID='$pixelid' ",$con);
while($row=mysql_fetch_array($result)){	
	if(mysql_num_rows($result)==0){
		$note=1;
	}
	$username=$row['FIRSTNAME'];
	$password=$row['PWORD'];
	$email=$row['EMAIL'];
	$flag=1;
	$body="The password for the requested user with userid  ".$pixelid."  is  ".$password;
}
	if($flag==1)
	{
	mail($email,$subject,$body,$headers);
	echo "<center><z style='color:#1abc9c'>your password is sent to your mail so check ur mail </z>";
	echo "<a href='loginform.php' style=\" border: none; padding: 0.6em 1.2em; background: #1ABC9C; color: #fff; text-decoration:none; font-family: 'Lato', Calibri, Arial, sans-serif; font-size: 1em; letter-spacing: 1px; text-transform: uppercase; cursor: pointer; display: inline-block; margin: 3px 2px; border-radius: 2px;\">click here login</a></center>";
	}
	else{
	 if($note==1){
			echo "enter valid email id";
	  }else {echo "enter valid pixel-id";}
    }
}
?>