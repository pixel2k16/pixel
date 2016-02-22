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
		
		$result=mysql_query("select * from pixelbc7_pixel where pixelid='$pixelid' OR mailid='$pixelid'",$con);
		while($row=mysql_fetch_array($result)){	
	
			if(mysql_num_rows($result)==0){
				$note=1;
			}
			else {
				$names=$row['firstname'];
				$passwords=$row['password'];
				$emails=$row['mailid'];
				$flag=1;
				$pixelids = $row['pixelid'];
				
			}
		}
	
	if($flag==1)
	{
		
		
		//send mail code start
		
		include("phpmailer/PHPMailerAutoload.php");
		
		$arr = array($emails);
		
		foreach($arr as $to){
		//Create a new PHPMailer instance
		$mail = new PHPMailer;
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		//$mail->SMTPDebug = 2;
		//Ask for HTML-friendly debug output
		//$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host = 'cp-in-9.webhostbox.net';
		// use
		// $mail->Host = gethostbyname('smtp.gmail.com');
		// if your network does not support SMTP over IPv6
		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		$mail->Port = 587;
		//Set the encryption system to use - ssl (deprecated) or tls
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		
		$mail->Username = "support@pixel2k16.in"; // SMTP username
		$mail->Password = "Pixel2k16"; // SMTP password
		$webmaster_email = "support@pixel2k16.in"; //Reply to this email ID
		/*
		$email= $_POST['email'];	//"jntuaavc@gmail.com"; // Recipients email ID
		$name="AVC"; // Recipient's name
		*/
		$mail->From = "support@pixel2k16.in";
		$mail->FromName = "Team Pixel";
		
		$mail->AddReplyTo($webmaster_email,"PIXEL2K16");
		$mail->WordWrap = 50; // set word wrap
		
		$noimg = "http://avc.host-ed.me/pixel2k16seen.php?s=".$to."&sub=forgotpwd";
		$mail->IsHTML(true); // send as HTML
		$mail->Subject = "PIXEL - 2K16, Department of CSE - JNTUA College of Engineering, Ananthapuramu.";
		$mail->Body = "<pre style='font-size:1.3em; color:#000000; font-family: calibri; '> 
		Hello ".$names.",
		
		PIXEL - 2K16 CREDENTIALS:
		            
		Pixel ID : ".$pixelids."            
		Password : ".$passwords."
		
		<a href='http://pixel2k16.in/login.php' target='_blank'>http://pixel2k16.in/login.php</a> 
		
		With Regards,
		Pixel - 2K16.
		</pre>
		<img src='".$noimg."' height='0' width='0' alt='' />
		"; //HTML Body
		
		$mail->AltBody = ""; //Text Body
		
		
		$mail->AddAddress($to,'');
		
		$msg = "";
		
		if(!$mail->Send())
		{
		$msg = "Unable to send mail to the Email Address provided. Please try again.";
		}
		else
		{
		$msg = "your password is sent to your mail. Please check ur mail and/or login to continue";
		}
		
		$to = '';
		
		}
		
		//send mail code end
		
		$emailErr = $msg;		
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