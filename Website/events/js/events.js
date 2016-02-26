$(document).ready(function(){

	$(".container").removeAttr("style").hide();
	if(evtid != " "){
		// alert(evtid);
		setTimeout(function(){$(evtid).fadeIn().addClass("present");},1000)
	}else{
		$("#ppt").fadeIn().addClass("present");
	}

	// Check for registered events to display register button or not. 
	var events = $(".container").has(".reg-wrapper");
	events.each(function(){
		var presentElement = $(this);
		id = presentElement.attr("id");
		// alert(id);
		$.ajax({
			method: "POST",
			url : "check/isreg.php",
			data : {table : id }
		}).done(function(result){
			 // alert(result);
			 if(result == "exists"){
			 	presentElement.find(".reg-wrapper").remove().end()
			 	.find(".reg-status").html("&#128515; Registered");;
			 }
		});

	});



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
		var pres = $(this);
		var parent = $(this).parent().parent();
		var eventid = parent.attr("id");
		var status = parent.children(".reg-status").hide();
		// alert($(this).text());
		pres.text("Just a sec..");		
		$.ajax({
			method: "POST",
			url: "check/eventreg.php",
			data :{ table: eventid }
		}).done(function(result){
			//alert(result);
			if(result == "yes"){
				pres.addClass("animated fadeOutUp");
				status.addClass("animated slideInLeft").html("&#128515;").fadeIn(function(){
						status.append(" Done. ").removeClass("animated slideInLeft");
						setTimeout(function(){ status.fadeOut();},1000);
						setTimeout(function(){ status.html("&#9989; successfully registered").fadeIn(); },2000);
				});
			}else if(result == "no"){
				pres.addClass("animated fadeOutUp");
				status.addClass("animated slideInLeft").html("&#128515;").fadeIn(function(){
						status.html("&#128542; Oops.. Try again.").fadeOut(function(){
							pres.removeClass("fadeOutUp").addClass("fadeInDown");
						});
				});
			}else if(result == "login"){
				status.removeClass("fadeOutUp animated");
				status.addClass("animated fadeInDown").html("&#128515;").fadeIn( "slow", function(){
				status.html("&#128544; Please log in to continue");
				setTimeout(function(){  
					status.removeClass("fadeInDown").fadeOut().addClass("fadeOutUp"); 
					},2000)
					setTimeout(function(){
						pres.text("Register");
					},2000);
				});
			} 
	});

 });

});