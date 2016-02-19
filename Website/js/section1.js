$(document).ready(function(){

	// script for handling click events for register 
	$("a.main-link.register").click(function(event){
		event.preventDefault();
		// alert("register");
		// window.location.href="http://www.google.com";
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

	$("a.logout").click(function(){
		// $(this).cs
		 window.location.href = 'logout.php'		
	});


});