$(document).ready(function(){

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
		alert("Join Us");
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
		$.ajax({
			method: "POST",
			url: "check/getpswd.php",
			data: $(this).serialize()
			}).done(function(result){
				// alert(result);
				if(result == "sent"){
					$("#on-sent").show().removeClass().addClass('animated slideInDown');
					$("#forgot-form").removeClass().addClass("animated slideOutRight");
					setTimeout(function(){
						$("#forgot-form").hide();
						$("#on-sent").show().append("Now try again.").removeClass().addClass('animated slideOutUp').hide();
						$("#login-form").show().removeClass().addClass("animated slideInLeft");
					},3000);
				}else if (result == "notsent"){
					alert("mail not sent. Try again or contact us. :)");
				}
			});

	});


	$("a.logout").click(function(){
		 window.location.href = 'logout.php'		
	});


});