$(document).ready(function(){

	// script for handling click events for register 
	$("a.main-link.register").click(function(event){
		event.preventDefault();
		// alert("register");
		// window.location.href="http://www.google.com";
	});

	// script for handling click events for log in button
	$("a.main-link.login").click(function(event){
		event.preventDefault();
		alert("log in");
	});
});