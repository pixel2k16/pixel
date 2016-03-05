<!DOCTYPE html>
<html>
<head>
	<title>PIXEL | 2014</title>
	<link rel="stylesheet" type="text/css" href="register.css">
	<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
	<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
</head>
<body>
<?php
	session_start();
    
    if(isset($_SESSION['userid'])){
        echo "<h1> You are presently logged in .....<h1><br>";
        echo "<h2>Please <a href=\"logout.php\">signout</a><h2>";
    }else{
    
?>
<h3>Tell us more <span>about you..</span></h3>

<img src="logo.png">

<form action="processregistration.php" method="post">
	Hello Pixel,<br>
	My name is 
	<input name="name" type="text" value="" placeholder="yourname" onkeypress="this.style.width = ((this.value.length + 1) * 18) + 'px';" required>.I am a 
	<select name="gender">
	<option value="m">guy</option>
	<option value="f">gal</option>
	</select>,born on <input type="date" name="dob" required> 
    
	<br>
	I am studying <select name="dept">
		<option value="BIO">Bio Technology</option>
      <option value="CHE">Chemical Engineering</option>
      <option value="CIV">Civil Engineering</option>
      <option value="CSE">Computer Science and Engineering</option>
      <option value="EEE">Electrical Engineering</option>
      <option value="ECE">Electronics &amp; Communication</option>
      <option value="INF">Information Technology</option>
      <option value="MGT">Management</option>
      <option value="MECH">Mechnical Engineering</option>
      <option value="OTH">Others</option>
	</select>at
	<input name="college" type="text" value="" placeholder="yourcollege" onkeypress="this.style.width = ((this.value.length + 1) * 18) + 'px';" required>.<br>
	I am interested in the following events<br>
	<input type="checkbox" value="1" name="eve[]">&nbsp;Dcode D Code &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" value="2" name="eve[]">&nbsp;Riddle Fiddle
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" value="3" name="eve[]">&nbsp;Code Kshetra
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" value="4" name="eve[]">&nbsp;Tech ops<br>

	<input type="checkbox" value="5" name="eve[]">&nbsp;Carte Blanche
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" value="6" name="eve[]">&nbsp;Bill Board
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="checkbox" value="7" name="eve[]">&nbsp;Pixel Clash<br>

	You can ring me at <span id="sprytextfield1">
    <label for="phone"></label>
    <input type="text" placeholder="8978764923" name="phone" id="phone">
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span> or mail me to
<input name="email" type="email" value="" placeholder="email" onkeypress="this.style.width = ((this.value.length + 1) * 18) + 'px';">.<br>
	I would like to have my security pin as <span id="sprypassword1">
    <label for="password"></label>
    <input type="password" name="pwd" id="password">
    <span class="passwordRequiredMsg">A value is required.</span><span class="passwordMinCharsMsg">Minimum 5 characters</span><span class="passwordMaxCharsMsg">Maximum 15 characters</span><span class="passwordInvalidStrengthMsg">Minimum 1 uppercase and 1 digit</span></span>.<br>

	<input type="submit" value="Let me in">


</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "phone_number", {validateOn:["change"], format:"phone_custom", pattern:"0000000000"});
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {minChars:5, maxChars:15, minUpperAlphaChars:1, minNumbers:2, validateOn:["blur", "change"]});
</script>
<script  type="text/javascript" src="js/jquery.js" ></script>
<script  type="text/javascript" src="js/jquery-ui1.js" ></script>
<script  type="text/javascript" src="js/cust.js" ></script>
</body>
</html>
<?php

}
?>