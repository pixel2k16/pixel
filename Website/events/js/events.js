$(document).ready(function(){
	$("li a[href^='#']").click(function(event){
		// alert("adfs");
		event.preventDefault();
		var target = $(this.hash);
		$(".present").fadeOut(function(){
			target.fadeIn().addClass("animated slideInDown present");
		});
		$(".present").removeClass("present");
	});

	// scripts for handling click events for log in button
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
				 alert(result);
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

	// Log out button
	$("a.logout").click(function(){
		 window.location.href = 'logout.php'		
	});


	//Register button
	$(".register").click(function(event){
		event.preventDefault();
		var eventid = $(this).parent().parent().attr("id");
		$.ajax({
			method: "POST",
			url: "check/eventreg.php",
			data :{ table: eventid}
		}).done(function(result){
			alert(result);
		});

		alert(eventid);
	});


});