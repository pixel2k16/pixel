<?php
require_once('conf/mysql_init.php');


$idErr = $emailErr = $pixelid = $mailid = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$pixelid = test_input($_POST["pixelid"]);
	}
	function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	}
	if(!empty($pixelid)){

		$flag=0;
		$note=0;
		$subject="Retreival of password";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= 'From: <support@pixelcse.org>' . "\r\n";

		$result=mysql_query("select * from test_16 where pixelid='$pixelid' OR mailid='$pixelid'",$con);
		while($row=mysql_fetch_array($result)){
			if(mysql_num_rows($result)==0){
				$note=1;
			}
			else {
				$username=$row['firstname'];
				$password=$row['password'];
				$email=$row['mailid'];
				$flag=1;
				$body="The password for the requested user with userid  ".$pixelid."  is  ".$password;
			}
		}
	if($flag==1)
	{
		send_mail($username,$email,$pixelid);
		$emailErr = "your password is sent to your mail so check ur mail and/or login to continue";
	}
	else{
	 if($note==1){
			$emailErr = "enter valid email id";
	  }else {
			$emailErr = "enter valid pixelid/emailid";
		  }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot password</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/set1.css" />
</head>
<body>
	<div class="bcg">
					<center><h1>Get the forgotten password</h1></center>
		</div>
	<div class="container">
			<section class="content">
				<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					<!--Below mentioned 'Test' is for allowing space for animation-->
					<h3 style="color: transparent;">Test</h3>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="pixelid" required="required" type="text" id="input-1" maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-1">
							<span class="input__label-content input__label-content--kaede">PixelID/MailID</span>
						</label>
					</span>
					<?php
					if($emailErr!="") {
						echo	'<span class="error_message">

										'.$emailErr.'

								</span><br>';
					}
					?>
					<span id="input-forgot">
							<input class="input-submit" type="submit" value="Get Password"/>
							<a class="input-login" href="login.php">Login here</a>
					</span>

				</form>
			</section>
	</div>
	<script src="js/classie.js"></script>
		<script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>
</body>
</html>
