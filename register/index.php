<?php
	require_once('conf/mysql_init.php');

	 $query="SELECT count( * ) as TOT FROM test_16";
	 $result=mysql_query($query,$con);
		if($row=mysql_fetch_array($result)){
			$tot=$row['TOT'];
		}
		else{
			$tot = 1;
		}
		$nameErr = $emailErr = $pwdErr = $repwdErr = $emailAlreadyErr = $contactnoErr = $colgErr = "";
		$name = $email = $password = $repwd = $contactno = $colg = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["usernamesignup"])) {
			$nameErr = "Name is required";
		  } else {
			$name = test_input($_POST["usernamesignup"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			  $nameErr = "Only letters and white space allowed";
			}
		  }

		  if (empty($_POST["emailsignup"])) {
			$emailErr = "Email is required";
		  } else {
			$email = test_input($_POST["emailsignup"]);
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  $emailErr = "Invalid email format";
			}
		  }

		  if (empty($_POST["passwordsignup"]) && empty($_POST["passwordsignup_confirm"]) ) {
			$pwdErr = "Password is required";
			$repwdErr = "Password is required";
		  } else {
			$password = test_input($_POST["passwordsignup"]);
			$repwd = test_input($_POST["passwordsignup_confirm"]);
			// check if password meets the requirements
			}

		  if($password != $repwd) {
			  $repwdErr = "Both Password's must match";
		  }
		  if (empty($_POST["contactnosignup"])) {
			$contactnoErr = "Contact.no required";
		  } else {
			$contactno = test_input($_POST["contactnosignup"]);
			  }
			  if (empty($_POST["colgsignup"])) {
			$colgErr = "College name required";
		  } else {
			$colg = test_input($_POST["colgsignup"]);
			  }
		}
	function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	}
	if($_SERVER["REQUEST_METHOD"] == "POST" &&(empty($nameErr)) && (empty($emailErr)) && (empty($pwdErr)) && (empty($repwdErr)) && (empty($contactnoErr))  && (empty($colgErr)) ) {

		//$username=$name;
		//$gender=clean($_POST['gender']);
		//$dob=clean($_POST['dob']);
		//$college=clean($_POST['college']);
		//$depart=clean($_POST['dept']);
		//$email=$email;
		//$phone=clean($_POST['phone']);
		//$pwd=$password;
		//$evelist=$_POST['eve'];

		/*$all_eve="";
		foreach( $evelist as $t ){
		$all_eve=$all_eve . $t;
		}*/

		//id generation
		$id="PID".str_pad($tot+1, 3, "0", STR_PAD_LEFT);
		// inserting the participant
		$emailErr = "shit";
		$sql1="INSERT INTO `pixelbc7_test`.`test_16` (`firstname`, `pixelid`, `password`, `mailid`, `contactno`,`colg`,`count`) VALUES ('$name', '$id', '$password', '$email','$contactno','$colg','0');";



		if( mysql_query($sql1,$con)){
		
					//send mail code start
			include("phpmailer/PHPMailerAutoload.php");
			
			$arr = array($email);
			
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
			
			//$email= $_POST['email'];	//"jntuaavc@gmail.com"; // Recipients email ID
			//$name="AVC"; // Recipient's name
			
			$mail->From = "support@pixel2k16.in";
			$mail->FromName = "Team Pixel";
			
			$mail->AddReplyTo($webmaster_email,"PIXEL2K16");
			$mail->WordWrap = 50; // set word wrap
			
			$noimg = "http://avc.host-ed.me/pixel2k16seen.php?s=".$to."&sub=signup";
			$mail->IsHTML(true); // send as HTML
			$mail->Subject = "PIXEL - 2K16, Department of CSE - JNTUA College of Engineering, Ananthapuramu.";
			$mail->Body = "<pre style='font-size:1.3em; color:#000000; font-family: calibri; '> 
			Hello ".$name.",
			
			PIXEL - 2K16 CREDENTIALS:
			            
			Pixel ID : ".$id."            
			Password : ".$password."
			
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
			$emailErr = "Unable to send mail to the Email Address provided. Please try again.";
			}
			else
			{
			$emailErr = "your password is sent to your mail. Please check ur mail and/or login to continue";
			}
			
			$to = '';

			}
	
			
			//send mail code end
	

			header('location:index.php');
		}
		else {
			$emailErr = "Email Already Registered";
		}

	}
	else{

	}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/set1.css" />
    </head>
    <body>
		<div class="bcg">
					<center><h1>Registration Page</h1></center>
		</div>
		<div class="container">
			<section class="content">
				<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					<!--Below mentioned 'Test' is for allowing space for animation-->
					<h3 style="color: transparent;">Registration Page</h3>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" type="text" name="usernamesignup" required="required" id="input-1" maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-1">
							<span class="input__label-content input__label-content--kaede">Enter Name</span>
						</label>
					</span>
					<?php
					if($nameErr!="") {
						echo	'<span class="error_message">'.$nameErr.'</span>';
					}
					?>


					</script>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="emailsignup" required="required" type="email" id="input-2"  maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-2">
							<span class="input__label-content input__label-content--kaede">Enter MailID</span>
						</label>
					</span>
					<span class="error_message"></span>
					<?php
					if($emailErr!="") {
						echo	'<span class="error_message">'.$emailErr.'</span>';
					}
					?>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="passwordsignup" required="required" type="password" id="input-3" maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-3">
							<span class="input__label-content input__label-content--kaede">Enter Password</span>
						</label>
					</span>


					<?php
					if($pwdErr!="") {
						echo	'<span class="error_message">'.$pwdErr.'</span>';
					}
					?>
					<div id="other">
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="passwordsignup_confirm" required="required" type="password" id="input-4" maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-4">
							<span class="input__label-content input__label-content--kaede">Re-Enter Password</span>
						</label>
					</span>
					<span class="error_message"></span>
					<?php
					if($repwdErr!="") {
						echo	'<span class="error_message">'.$repwdErr.'</span>';
					}
					?>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="contactnosignup" required="required" type="text" id="input-5" maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-5">
							<span class="input__label-content input__label-content--kaede">Contact.no</span>
						</label>
					</span>

					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="colgsignup" required="required" type="text" id="input-6" maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-6">
							<span class="input__label-content input__label-content--kaede">College Name</span>
						</label>
					</span>
					<span class="input input--kaede">
						<input id="input-no-focus" class="input__field input__field--kaede" type="submit" value="Sign Up"/>
						<label id="label-no-focus" class="input__label input__label--kaede">
							<a href="login.php" class="to_register">
								<span class="input__label-content input__label-content--kaede">Login here</span>
							</a>
						</label>
					</span>
				</div>
				</form>
			</section>

		</div><!-- /container -->
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
					var inp = ev.target;
					if( inp.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}else if(inp.id == "input-2"){

							$.ajax({method:"POST",
									url:"mailcheck.php",
									data:{email: inp.value }
									}).done(function(result){
										if(result == "1"){
											$(inp).parent().next().html("Email already Registered").fadeIn();
										}else if( result == "0"){
											$(inp).parent().next().fadeOut();
										}else{
											alert(result);
										}
									});
					}
					else if(inp.id == "input-4"){
					if($('#input-3').val()!=$('#input-4').val())
					{
						$(inp).parent().next().html("Passwords did not match").fadeIn();
					}
					else {
						$(inp).parent().next().fadeOut();
					}

					}

				}

			})();
		</script>
		<script>

		</script>
    </body>
</html>