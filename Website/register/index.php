<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Forgot Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../favi.png">
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
		<img class="pilogo wow fadeInDown" data-wow-delay="1s" style="display: none;" src="img/pixel.png" />
		<center><h1 class="wow slideInRight" data-wow-delay="1s">Get the forgotten password</h1></center>
		</div>
	<div class="container">			
			<section class="content wow fadeInUp" data-wow-delay="1s" style="display: none;">
				<form id="forgot-form"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
					<!--Below mentioned 'Test' is for allowing space for animation-->
					<h3 style="color: transparent;">Test</h3>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="pixelid" required="required" type="text" id="input-1" maxlength="30"/>
						<label class="input__label input__label--kaede" for="input-1">
							<span class="input__label-content input__label-content--kaede">Mail ID</span>
						</label>
					</span>
					<span class="error_message"></span><br>
					
					<span id="input-forgot">
							<input class="input-submit" type="submit" value="Get Password"/>							
							<a class="input-login" href="login.php">Login here</a>						
					</span>
					
				</form>
			</section>
			<div class="on-success"> <span style="display: block;" > </span> </div>			
	</div>
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
				classie.add( ev.target.parentNode, 'input--filled' );
			}

			function onInputBlur( ev ) {
				if( ev.target.value.trim() === '' ) {
					classie.remove( ev.target.parentNode, 'input--filled' );
				}
			}
			
		    $("#forgot-form").submit(function(event){
			event.preventDefault();
			var sub_btn = $(this).find("input[type='submit']");
			sub_btn.val("We are on it...");;
			// alert("Not yet");
			$.ajax({
					method:"POST",
					url:"fgtpwd.php",
					data: $(this).serialize()
			}).done(function(result){
				 //alert(result);
				if(result=="sent"){
					sub_btn.val("done");
					$("section.content").fadeOut("fast",function(){
						$(".on-success").html("Okay. Got it. Log in credentials are sent to your mail."
							+" We will be in touch.").fadeIn("slow",function(){
								setTimeout(function(){
									window.location.href = "http://www.pixel2k16.in/register/login";
								},3000);
						});
					});
				}else if(result=="notsent"){
					sub_btn.val("done");
					$("section.content").fadeOut("fast",function(){
						$(".on-success").html("<b>Oops</b>.<br> There seems to be an error. Plese try again.").fadeIn("slow",function(){
								setTimeout(function(){
									window.location.href = "http://www.pixel2k16.in/register/forgot";
								},3000);
						});
					});		
					
				}else if(result=="invalid"){
					sub_btn.val("done");
					$("section.content").fadeOut("fast",function(){
						$(".on-success").html("This email does't seems to be a registered one.").fadeIn("slow",function(){
								setTimeout(function(){
									sub_btn.val("Get password");
									$(".on-success").fadeOut("fast",function(){
										$("section.content").fadeIn("fast");
									});
																		
								},3000);
						});
					});
				}
				
			});
		});
			
		</script>       
</body>
</html>