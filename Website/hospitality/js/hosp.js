$(document).ready(function(){

	// scripts for handling click events ie., show login popup for log in button
	$("a.main-link.loginb").click(function(event){
		event.preventDefault();
		// alert("afd");
		$("#on-correct").fadeOut();
		$("section.content").removeClass().addClass("content animated fadeIn");
		$(".login-popup").show().removeClass().addClass(" login-popup animated slideInLeft");
	});

	// To check whether user has already registered or not. 
	$.ajax({
			method: "POST",
			url : "check/isreg.php"
		}).done(function(result){
			 // alert(result);
			 if(result == "exists"){
			 	$("#hspreg").remove();
				$(".status").css("background","rgb(48, 105, 36)").show().html("&#128524; Your accomodation was conformed")
				.addClass("animated fadeInUp");	
			 }
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
	$(document).keydown(function(event){
		// alert(event.which);
		if(event.which == 27){
			if($(".login-popup").hasClass("slideInLeft")){ $("a.login-close").click(); }
		}
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
	// Log out button
	$("a.logout").click(function(){
		 window.location.href = 'logout.php'		
	});
	// End of scripts for handling login-popup functions.




	// For registration form 
	$("#hspreg").submit(function(event){
		event.preventDefault();
		var data =$(this).serialize();

		// First check whethe user is already logged in or not. 
		if(islg === undefined){
				$("#hspreg").addClass("animated fadeOutUp");
				$(".status").show().removeClass().html("")
					.html("&#128524; you are not logged in").addClass("status animated fadeInUp");
				setTimeout(function(){ 
					$("#hspreg").removeClass().addClass("animated fadeInDown");
					$(".status").show().removeClass().addClass("status animated fadeOutDown");
				},2000);
				return;
			}

		if(data == ""){
			$("#hspreg").addClass("animated fadeOutUp");
			$(".status").show().removeClass().html("")
				.html("&#128524; Are you Male or Female ?").addClass(" status animated fadeInUp");
			setTimeout(function(){ 
				$("#hspreg").removeClass().addClass("animated fadeInDown");
				$(".status").show().removeClass().addClass("status animated fadeOutDown");
			},2000);
			return;
		} else {
			// alert($(this).serialize());
			 $.ajax({
			 	method: "POST",
			 	url   : "check/save.php",
			 	data  : data
			 }).done(function(result){
			 	 alert(result);
			 	if(result == "yes"){
			 		$("#hspreg").addClass("animated fadeOutUp");
					$(".status").show().removeClass().html("").css("background","rgb(48, 105, 36)")
						.html("&#128524; You're In.").addClass("status animated fadeInUp");

			 	}else {
			 		$("#hspreg").addClass("animated fadeOutUp");
					$(".status").show().removeClass().html("")
						.html("&#128524; Some error occured. Try again, or contact us").addClass(" status animated fadeInUp");
					setTimeout(function(){ 
						$("#hspreg").removeClass().addClass("animated fadeInDown");
						$(".status").show().removeClass().addClass("status animated fadeOutDown");
					},2000);
				}
			 }); // ENd of ajax request. 
		} // main else part
	});



});