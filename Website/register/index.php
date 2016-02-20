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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/set1.css" />
		<link rel="stylesheet" type="text/css" href="../css/animate.css">


		<script type="text/javascript" src="../js/wow.min.js"></script>
		<script>
			wow = new WOW({
		      boxClass:'wow',            // default
		      animateClass:'animated',   // default   
		      offset: 0,                 // default
		      mobile: true,              // default
	          live:false                 // default
	       	})
	 		wow.init();
 	</script>
 	<style type="text/css">
 	::-webkit-scrollbar  {display: none;}
 	</style>
    </head>
    <body>
		<div class="bcg">
		<img class="pilogo wow fadeInDown" data-wow-delay="2s" style="display: none;" src="img/pixel.png" />
			<center><h1 class="wow slideInRight" data-wow-delay="2s">Registration</h1></center>
		</div>
		<div class="container">
			<section class="content wow fadeInUp" data-wow-delay="2s" style="display: none;">
				<form id="reg-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					<!--Below mentioned 'Test' is for allowing space for animation-->
					<h3  style="color: transparent;">Registration</h3>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" type="text" name="username" required="required" id="input-1" maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-1">
							<span class="input__label-content input__label-content--kaede">Enter Name</span>
						</label>
					</span>


					</script>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="emailid" required="required" type="email" id="input-2"  maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-2">
							<span class="input__label-content input__label-content--kaede">Enter MailID</span>
						</label>
					</span>
					<span class="error_message"></span>
				
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="pass1" required="required" type="password" id="input-3" maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-3">
							<span class="input__label-content input__label-content--kaede">Enter Password</span>
						</label>
					</span>

					<div id="other">
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="pass2" required="required" type="password" id="input-4" maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-4">
							<span class="input__label-content input__label-content--kaede">Re-Enter Password</span>
						</label>
					</span>
					<span class="error_message"></span>
		
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="contactno" required="required" type="text" id="input-5" maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-5">
							<span class="input__label-content input__label-content--kaede">Contact.no</span>
						</label>
					</span>

					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="colgname" required="required" type="text" id="input-6" maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-6">
							<span class="input__label-content input__label-content--kaede">College Name</span>
						</label>
					</span>
					<span class="input input--kaede">
						<input id="input-no-focus" class="input__field input__field--kaede" type="submit" value="Sign Up"/>
						<label id="label-no-focus" class="input__label input__label--kaede">
							<a href="../" class="to_register">
								<span class="input__label-content input__label-content--kaede">Login here</span>
							</a>
						</label>
					</span>
				</div>
				</form>
			</section>
			<div class="on-success"> <span style="display: block;" >Okay. Got it</span> </div>
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script>
			//show registraion form and logo
			$(".pilogo").removeAttr("style");
			$(".content").removeAttr("style");
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
				var inpt = ev.target;
				classie.add( ev.target.parentNode, 'input--filled' );
				if(inpt.id == "input-4"){
					$(inpt).parent().next().html("").fadeOut();
				}
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
					// console.log('input-4');
					if($('#input-3').val()!=$('#input-4').val())
						$(inp).parent().next().html("Passwords did not match").fadeIn();
					else 
						$(inp).parent().next().fadeOut();
				}
			}

			$("#reg-form").submit(function(event){
				event.preventDefault();
				var sub_btn = $(this).find("input[type='submit']");
				sub_btn.val("We are on it...");;
				// alert("Not yet");
				$.ajax({
						method:"POST",
						url:"regsave.php",
						data: $(this).serialize()
				}).done(function(result){
					// alert(result);
					if(result == "yess"){
						// alert("success");
						sub_btn.val("done");
						$("section.content").fadeOut("fast",function(){
							$(".on-success").append("Log in credentials were sent to yor mail."
								+" We will be in touch.").fadeIn("slow",function(){
									setTimeout(function(){
										window.location.href = "../";
									},3000);
								});
						});

					}else if (result == "yesn"){
						// alert("Yes No");
						$(".on-success").append("We cannot send log in credentials to your mail. "
								+"Please contact us as soon as possible.").fadeIn("slow",function(){
									setTimeout(function(){
										window.location.href = "../";
									},5000);
						});
					}else if (result == "no"){
						// alert("Nope");
						sub_btn.val("OOps");
					}else{
						alert(result);
					}
				});
			});
		</script>
    </body>
</html>