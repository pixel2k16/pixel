$(document).ready(function(){

	setTimeout(function(){
		$(".cd-scroll-down").fadeIn("slow");
	},9500);
	// script for handling click events for register 
	$("a.main-link.register").click(function(event){
		event.preventDefault();
		// alert("register");
		 window.location.href="/pixel/Website/register";
	});

	// script for handling click events for log in button
	$("a.main-link.loginb").click(function(event){
		event.preventDefault();
		// alert("afd");
		$("#on-correct").fadeOut();
		$("section.content").removeClass().addClass("content animated fadeIn");
		$(".login-popup").show().removeClass().addClass(" login-popup animated slideInLeft");
	});

	$("a.login-close").click(function(event){
		event.preventDefault();
		// alert("afd");
		$(".login-popup").removeClass().addClass(" login-popup animated slideOutRight");
	});

	$(".to_register").click(function(event){
		event.preventDefault();
		// alert("Join Us");
		window.location.href="/pixel/Website/register";

	});

	$(".frgt-pswd").click(function(event){
		event.preventDefault();
		// alert("Forgot");
		$("#login-form").removeClass().addClass("animated slideOutRight").fadeOut(function(){
			$("#forgot-form").show().removeClass().addClass("animated slideInLeft");
		});
	});

	
	$(".input-login").click(function(event){
		event.preventDefault();
		// alert("Inp log in");
		$("#forgot-form").removeClass().addClass("animated slideOutRight").fadeOut(function(){
			$("#login-form").show().removeClass().addClass("animated slideInLeft");
		});	
	});


	$("#forgot-form").submit(function(event){
		event.preventDefault();
		// alert($(this).serialize());
		var submitBtn = $(this).find("input[type='submit']");
		submitBtn.val("Right away..");
		$.ajax({
			method: "POST",
			url: "check/getpswd.php",
			data: $(this).serialize()
			}).done(function(result){
				// alert(result);
				if(result == "sent"){
					submitBtn.val("Got it");
					$("#on-sent").show().removeClass().addClass('animated slideInDown');
					$("#forgot-form").removeClass().addClass("animated slideOutRight");
					setTimeout(function(){
						submitBtn.val("Get Password");
						$("#forgot-form").hide();
						$("#on-sent").show().append("Now try again.").removeClass().addClass('animated slideOutUp');
						$("#login-form").show().removeClass().addClass("animated slideInLeft");
					},3000);
				}else if (result == "notsent"){
					alert("mail not sent. Try again or contact us. :)");
				}else{
					// alert("adf");
					submitBtn.val("Try again");
					setTimeout(function(){
						submitBtn.val("Get Password");
					},1000)
				}
			});

	});


	$("a.logout").click(function(){
		 window.location.href = 'logout.php'		
	});


	// For About section
	$(".about-wrapper").hover(function(){
			$(".pix").html("About Pixel");
		},function(){
			$(".pix").html("About Us");
		});

		$(".about").click(function(event){
			event.preventDefault();
			// alert(this.hash);
			postwith("about/",this.hash);
		});

		function postwith (to,secname) {
		  var myForm = document.createElement("form");
		  myForm.method="post" ;
		  myForm.action = to ;
		  myForm.target="_blank";
		    var myInput = document.createElement("input") ;
		    myInput.setAttribute("name", 'sec') ;
		    myInput.setAttribute("value", secname );
		    myForm.appendChild(myInput) ;
		    $(myForm).css("display",'none');
		  document.body.appendChild(myForm) ;
		  myForm.submit();
		  document.body.removeChild(myForm) ;
		}

});