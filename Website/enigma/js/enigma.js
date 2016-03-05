$(document).ready(function(){

	// script for handling enroll button
	$(".enroll-wrapper > a").click(function(event){
		event.preventDefault();
		var enrollwrapper = $(".enroll-wrapper"),
			enrollsuccess = $("#enroll-success"),
			 enrollerror  = $("#enroll-error"); 

		// alert(this.hash);
		$.ajax({
			method:"post",
			url:"check/enrollenigma.php",
			data: {user : 'new'}
		}).done(function(result){
			// alert(result);
			if(result == "enrolled"){
				enrollwrapper.addClass("animated fadeOutUp");
				enrollsuccess.show().addClass("animated fadeInUp");
				setTimeout(function(){ location.reload(); },1000);
			}else if(result == "error"){
				enrollwrapper.addClass("animated fadeOutUp");
				enrollerror.html("&#128542;  Something went wrong. Please try again.").show()
				.removeClass("animated fadeOutDown").addClass("animated fadeInUp");
				setTimeout(function(){
					enrollwrapper.removeClass().addClass("enroll-wrapper animated fadeInDown");
					enrollerror.removeClass("animated fadeInUp").addClass("animated fadeOutDown");
				},1000);
			}else{
				enrollwrapper.addClass("animated fadeOutUp");
				enrollerror.html("&#128542;  Oops.. It's not your fault. Please Intimate us as soon as possible. Okay.").show()
				.removeClass("animated fadeOutDown").addClass("animated fadeInUp");
				setTimeout(function(){
					enrollwrapper.removeClass().addClass("enroll-wrapper animated fadeInDown");
					enrollerror.removeClass("animated fadeInUp").addClass("animated fadeOutDown");
				},1000);		
			}
		});
	});


	// scripts for handling click events ie., show login popup for log in button
	$("a.main-link.loginb").click(function(event){
		event.preventDefault();
		// alert("afd");
		$("#on-correct").fadeOut();
		$("section.content").removeClass().addClass("content animated fadeIn");
		$(".login-popup").show().removeClass().addClass(" login-popup animated slideInLeft");
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



	// For answer form 
	$("#ansform").submit(function(event){
		event.preventDefault();
		var data =$(this).serialize();
		var level = $("input[name='level']").val();
		var pid = $("input[name='pid']").val();
		var form = $("#ansform");
		var submitBtn = $("input[type='submit']"); 
		var ansfield = $("#ansform input[type='text']");
		var equalstatus = $("#equal");
		var updatestatus = $("#updated");
		$.ajax({
			method:'post',
			url:'check/checkans.php',
			data: data
		}).done(function(result){
			// alert(result);
			if(result == "equal"){
				// update user level and refresh the page
				form.removeClass().addClass("animated fadeOutUp");
				equalstatus.show().addClass("animated fadeInUp");
				$.ajax({
					method:'post',
					url : 'check/updatelevel.php',
					data : { level: level}
				}).done(function(result){
					// alert(result);
					if(result == "updated"){
						//Level is updated successfully. so, Refresah the page. Take user to new level.
						setTimeout(function(){
							equalstatus.removeClass().addClass("status animated fadeOutUp");
							updatestatus.show().addClass("status animated fadeInUp");
							setTimeout(function(){location.reload();},1000)
						},1000);
					}else if(result == "error"){
						//Error occures while updating 
						alert("Error occures while updating level. Please refresh page to take effect"); 
					}
				});

			}else if(result == "notequal"){
				// Notify the user that he entered wrong answer
				// alert("Nope");
					form.removeClass();
					submitBtn.removeClass();
					ansfield.css({"margin-bottom":"5vh"});
					setTimeout(function(){ form.addClass("animated wobble");submitBtn.addClass("animated wobble");},100);
					submitBtn.css({'background':'#fff','color':'red'});
					setTimeout(function(){submitBtn.val("nope. Try again");},400);
					setTimeout(function(){submitBtn.removeAttr("style").val("Is it..?"); ansfield.removeAttr("style");},1500);
			}else{
				// Error occurred and act accordingly. 
				alert("Error occured. Intimate Us Immediately");
			}
		});

	});



});