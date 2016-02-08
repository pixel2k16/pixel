$(document).ready(function(){
	
	$(".vl").click(function(){
	 	$(this).fadeOut("slow",function(){
	 		$(".teaser").fadeIn(function(){
	 			playvideo();
	 		});
	 	});
	});

	$(".close").click(function(){
		pauseVideo();
		$(".teaser").fadeOut(function(){
			$(".vl").fadeIn();
		});
	});
});