<div class="login-popup">
	<div class="login-container">
		<a href="#" class="login-close"></a>
		<section class="content">
			<form id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<!--Below mentioned 'Test' is for allowing space for animation-->
				<h3 style="color: transparent;">Test</h3>
				<span class="input input--kaede">
					<input class="input__field input__field--kaede" name="pixelid" required="required" type="text" id="input-1" maxlength="30" />
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
						<a href="#"><span class="input__label-content input__label-content--kaede">Forgot Password</span></a>
					</label>
					<input class="input__field input__field--kaede" id="input-submit" type="submit" value="Login"/>
				</span>
				<span class="login">
					Not a member yet ?
					<a href="#" class="to_register">Join us</a>
				</span>
			</form>
		</section>
		<div id="on-correct">You're In</div>
	</div><!-- /container -->
</div> <!-- /Pop up -->
<script src="js/classie.js"></script>
<script>
		// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
		$("#on-correct").fadeOut();
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
							url:"check/pidcheck.php",
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
		$("#login-form").submit(function(event){
					event.preventDefault();
					// var pid = $(this);
					// alert(pid);
					$.ajax({
						method:"POST",
						url:"check/logincheck.php",
						data: $(this).serialize()
					}).done(function(result){
						// alert(result);
						if(result == "success"){
							$("section.content").removeClass("animated slideInDown").addClass("animated slideOutDown");
							$("#on-correct").fadeIn().addClass("animated slideInDown");
							$(".main-link-wrapper").html("").hide();
							setTimeout(function(){
								$(".login-popup").removeClass("animated slideInLeft").addClass("animated slideOutUp");
								var nameStyles={ 'border-radius': '10px',
												 'padding': '10px','background': '#722',
												 'position': 'fixed',
												 'color': '#fff',
												 'font-size': '1em',
												 'top': '10px',
												 'left': '10px',
												 'z-index': '5',
												 'display': 'inline-block',
												 'transform-origin':'top',
												 'animation-delay':'1s'
												};

								$("<div id='usr-name'></div>").addClass("animated flipInX")
								.css(nameStyles).html("Hi ").appendTo("body");
								location.reload();
							},2000);
						}else {
							if($("section.content").hasClass("shake")){
								$("section.content").removeClass().addClass("content animated wobble");
							}else{
								$("section.content").removeClass().addClass("content animated shake");
							}
						}
					});
				});
</script>