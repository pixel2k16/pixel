jQuery(document).ready(function($){
	var sliderContainers = $('.cd-slider-wrapper');
	if( sliderContainers.length > 0 ) initBlockSlider(sliderContainers);

	function initBlockSlider(sliderContainers) {
		sliderContainers.each(function(){
			var sliderContainer = $(this),
				slides = sliderContainer.children('.cd-slider').children('li'),
				sliderPagination = createSliderPagination(sliderContainer);

			sliderPagination.on('click', function(event){
				event.preventDefault();
				var selected = $(this),
					index = selected.index();
				updateSlider(index, sliderPagination, slides);
			});

			sliderContainer.on('swipeleft', function(){
				var bool = enableSwipe(sliderContainer),
					visibleSlide = sliderContainer.find('.is-visible').last(),
					visibleSlideIndex = visibleSlide.index();
				if(!visibleSlide.is(':last-child') && bool) {updateSlider(visibleSlideIndex + 1, sliderPagination, slides);}
			});

			sliderContainer.on('swiperight', function(){
				var bool = enableSwipe(sliderContainer),
					visibleSlide = sliderContainer.find('.is-visible').last(),
					visibleSlideIndex = visibleSlide.index();
				if(!visibleSlide.is(':first-child') && bool) {updateSlider(visibleSlideIndex - 1, sliderPagination, slides);}
			});
		});
	}

	function createSliderPagination(container){
		var wrapper = $('<ol class="cd-slider-navigation wow"></ol>');
		container.children('.cd-slider').find('li').each(function(index){
			var dotWrapper = (index == 0) ? $('<li class="selected"></li>') : $('<li></li>');
			var dot = $('<a class="tooltip" ></a>').appendTo(dotWrapper);
			var ttContent = $("<span class='tooltip-content'></span>");
			ttContent.append(giveTooltipContent(index));
			ttContent.appendTo(dotWrapper);
			dotWrapper.appendTo(wrapper);
			var dotText = ( index+1 < 10 ) ? '0'+ (index+1) : index+1;
			// console.log(getIconPath(dotText));
			var bgimg = getIconPath(dotText);
			// dot.text(dotText);
			dot.css({"background-image":"url("+ bgimg +")"});
			dot.css({"background-repeat":"no-repeat"});
			dot.css({"background-size": "30px 30px"});
			dot.css({"background-position":"center"});
		});
		wrapper.appendTo(container);
		return wrapper.children('li');
	}

	function getIconPath(index){
		var path = "eventIcons/";
		switch(index){
			case "01":
				path += "ppt.png";
				break;
			case "02":
				path += "debug.png";
				break;
			case "03":
				path += "onlc.png";
				break;
			case "04":
				path += "hunt.png";
				break;
			case "05":
				path += "quiz.png";
				break;
			case "06":
				path += "vid.png";
				break;
			case "07":
				path += "poster.png";
				break;
			case "08":
				path += "phot.png";
				break;
			case "09":
				path += "lgme.png";
				break;
			case 10:
				path += "dan.png";
				break;
			default:
				path += "efut";
		}
		return path;
	}

	function giveTooltipContent(index){
		var text = "";
		switch (index){
			case 0:
				text = "Paper presentation";
				break;
			case 1:
				text = "Debugging";
				break;
			case 2:
				text = "Online Coding";
				break;
			case 3:
				text = "Treasure Hunt";
				break;
			case 4:
				text = "Technical Quiz";
				break;
			case 5:
				text = "Short Films";
				break;
			case 6:
				text = "Poster presentation";
				break;
			case 7:
				text = "Photography";
				break;
			case 8:
				text = "LAN Gaming";
				break;
			case 9:
				text = "Culturals";
				break;
			default:
				text = "Event";
				break;
		}
		return text;
	}

	function updateSlider(n, navigation, slides) {
		navigation.removeClass('selected').eq(n).addClass('selected');
		var presentslide = slides.eq(n);
		var prevslides = presentslide.prevAll('li');
		var nextslides = presentslide.nextAll('li');
		presentslide.addClass('is-visible').removeClass('covered');
		prevslides.addClass('is-visible covered animated');
		nextslides.removeClass('is-visible covered fadeIn animated');
		

		$("h3").removeClass();
		$("h2").removeClass();
		$("a.more").removeClass("animated fadeInUp");

		var lines;
		lines = $(presentslide).children().last().children().children();
		// function call to add animations to lines.  
		addanim(lines);

		//fixes a bug on Firefox with ul.cd-slider-navigation z-index
		navigation.parent('ul').addClass('slider-animating')
			.on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$(this).removeClass('slider-animating');
		});
	}

	// function to add animation to event description
	function addanim(lines){
		var found = false;
		lines.each(function(){
			var type = $(this).prop('tagName');
			if(type == "H2") {
				found = true;
				$(this).addClass("animated fadeInRight");
			}
			if(type == "H3") {
				if(!found){ $(this).addClass("animated fadeInDown"); }
				if(found){ $(this).addClass("animated fadeInUp");}
			}
		});
	}

	function enableSwipe(container) {
		return ( container.parents('.touch').length > 0 );
	}


	// Media queries like function to adjust event detail contents
	$(window).resize(function(){
		if($(window).width() <= 450){
			adjustContent();
		}else{
			applyDefault();
		}
	});

	if($(window).width() <= 450){
			adjustContent();
	}

	 // function to adjust content
	 function adjustContent(){
	 	// alert("");
	 	var styles = {"text-align":"justify","line-height":"1.4em"};
	 	$(".cd-half-block.content > div").css(styles);
	 	var eventContent = $(".cd-half-block.content > div");
	 	
	 	var newContent = eventContent;
	 	newContent.each(function(index){
			 // alert($(this).html());
			 var more_link="";
			 if($(this).has("a")){
			 	more_link = $(this).find("a");
			 	more_link.css({'display':'inline-block','text-align':'center','margin-top':'10px'
			 		,'color':'#fff','position':'relative','left':'35%','background':'#081523','padding':'2px 5px'});
			 }
			var text = $(this).text();
			
			// Check if it has Know more button and remove the text. 
			if(text.search("Know more") != -1)
				text = text.replace("Know more","");

			$(this).html("<p style='text-indent: 14px;padding: 0px;color: #fff;width: 100%;margin: 0px;font-size: 15px;'>"+ text +"</p>");
			// Add anchor link tha was saved at the beginning to bring back the know more button behaviour. 
			$(this).append(more_link);
	 	}); // For each div content. 
		
		//To remove backgrund for tooltip ( event icons )
		$(".tooltip").each(function(){
			$(this).removeAttr("style");
		});
	 }

	 function applyDefault(){
	 	$(".cd-half-block.content > div").removeAttr("style");
	 }

	 // For appropriate links to open an event page
	 $("a.more").click(function(event){
	 		// alert("Adf");
			event.preventDefault();
			// alert(this.hash);
			postwitheventname("events/index.php",this.hash);
			
	});
	function postwitheventname (to,eventname) {
	  var myForm = document.createElement("form");
	  myForm.method="post" ;
	  myForm.action = to ;
	  myForm.target = "_blank";
	    var myInput = document.createElement("input") ;
	    myInput.setAttribute("name", 'event') ;
	    myInput.setAttribute("value", eventname );
	    myForm.appendChild(myInput) ;
	    $(myForm).css("display",'none');
	  document.body.appendChild(myForm) ;
	  myForm.submit() ;
	  document.body.removeChild(myForm) ;
	}
});