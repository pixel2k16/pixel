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
		 dot.text(dotText);
		updateName(dot,index);
		});
		wrapper.appendTo(container);
		return wrapper.children('li');
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
				text = "TECHNICAL QUIZ";
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

	function updateName(dot,index){
		var	text = "...";
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
	 	var styles = {"text-align":"left","line-height":"1.6em"};
	 	$(".cd-half-block.content > div").css(styles);
	 	var eventContent = $(".cd-half-block.content > div");
	 	
	 	var newContent = eventContent;
	 	newContent.each(function(index){
			 // alert($(this).html());
			var text = $(this).text();
			$(this).text(" ").html(text);
			 // alert($(this).html());
	 	});
	 }

	 function applyDefault(){
	 	$(".cd-half-block.content > div").removeAttr("style");
	 }

});