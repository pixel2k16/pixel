<?php
	session_start();
	require_once('conf/mysql_init.php');
	$username = $password = $error_message = "";
	$flag=0;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = test_input($_POST["username"]);
		$password = test_input($_POST["password"]);
	}
	function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
	}
	if(isset($_SESSION['userid'])&&isset($_SESSION['firstname'])&&isset($_SESSION['level'])){
		$userid=$_SESSION['userid'];// pixel id
		$firstname=$_SESSION['firstname'];
		//$level=$_SESSION['level'];
		$flag=2;
	}else if( $username != ""){
			$username = strtoupper($username);
			$result = mysql_query("(select * from test_16 where pixelid = '$username' and password = '$password')",$con);
			$flag=false;
				while($row=mysql_fetch_array($result))
				{
					if(($row['pixelid']==$username)&&($row['password']==$password))
					{
						$firstname = $row['firstname'];
						$flag=1;
						//$level = $row['COUNT'];
					}
				}
				if(!$result)
				{
					die("Database query failed:".mysql_error());
					echo "My friend".$name."<br/><br/>";
				}
				if(!$flag) {
					$error_message = "Invalid Username/Password";
				}

		}


///////////////// buddy recognized//////////////////////////////
	if($flag==1){
		$_SESSION['userid']=$userid;// pixel id
		$_SESSION['firstname']=$firstname;
		//$_SESSION['level']=$level;
	}
	if($flag==1||$flag==2){
		header("location:index.php");
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

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/set1.css" />
    </head>
    <body>
		<div class="bcg">
					<center><h1>Login Page</h1></center>
		</div>
		<div class="container">
			<section class="content">
				<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					<!--Below mentioned 'Test' is for allowing space for animation-->
					<h3 style="color: transparent;">Test</h3>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="username" required="required" type="text" id="input-1" maxlength="30" />
						<label class="input__label input__label--kaede" for="input-1">
							<span class="input__label-content input__label-content--kaede">Enter PixelID</span>
						</label>
					</span><span class="error_message"></span>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="password" required="required" type="password" id="input-2" maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-2">
							<span class="input__label-content input__label-content--kaede">Enter Password</span>
						</label>
					</span>
					<span class="error_message"></span>
					<?php
					if($error_message!="") {
						echo	'<span class="error_message">	'.$error_message.'</span>';
					}
					?>
					<span class="input input--kaede">
						<label class="input__label input__label--kaede">
							<a href="forgot.php"><span class="input__label-content input__label-content--kaede">Forgot Password</span></a>
						</label>
						<input class="input__field input__field--kaede" type="submit" value="Login"/>
					</span>
					<span class="login">
						Not a member yet ?
						<a href="register.php" class="to_register">Join us</a>
					</span>
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
					}else if(inp.id == "input-1"){

							$.ajax({method:"POST",
									url:"pidcheck.php",
									data:{userid: inp.value }
									}).done(function(result){
										if(result == "0"){
											$(inp).parent().next().html("Invalid PID").fadeIn();
										}else if( result == "1"){
											$(inp).parent().next().fadeOut();
										}else{
											alert(result);
										}
									});
					}
				}
			})();
		</script>
    </body>
</html>
