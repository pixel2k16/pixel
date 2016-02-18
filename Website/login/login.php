<!DOCTYPE html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/login.css" />
    </head>
    <body>
    <div class="login-popup">
		<div class="login-container">
			<a href="#" class="login-close"></a>
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
