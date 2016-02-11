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

	$(document).keyup(function(e) {
    	if (e.keyCode == 27) { // escape key maps to keycode `27`
   	 	    if($(".teaser").is(':visible')){
   	 	    	$(".close").click();
   	 	    }
   		}
	});
});