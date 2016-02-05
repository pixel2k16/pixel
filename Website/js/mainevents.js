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
				text = "Technical presentation";
				break;
			case 1:
				text = "Paper presentation";
				break;
			case 2:
				text = "Poster Ppt";
				break;
			case 3:
				text = "Online Quiz";
				break;
			case 4:
				text = " Debugging";
				break;
			default:
				text = "Event";
				break;
		}
		return text;
	}

	function updateName(dot,index){
		var	text = "...";
		var styles={"background-image":"url(http://www.chrlesstone.com/images/uploads/hiresimages/presentations.jpg)",
					"background-size":"contain",
					"cursor":"pointer"}
		dot.css(styles);
	}

	function updateSlider(n, navigation, slides) {
		navigation.removeClass('selected').eq(n).addClass('selected');
		slides.eq(n).addClass('is-visible').removeClass('covered').prevAll('li').addClass('is-visible covered').end().nextAll('li').removeClass('is-visible covered');

		//fixes a bug on Firefox with ul.cd-slider-navigation z-index
		navigation.parent('ul').addClass('slider-animating').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$(this).removeClass('slider-animating');
		});
	}

	function enableSwipe(container) {
		return ( container.parents('.touch').length > 0 );
	}
});