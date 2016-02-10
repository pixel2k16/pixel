jQuery(document).ready(function($){
	var	scrolling = false,
	clicked = false;
	var contentSections = $('.cd-section'),
		verticalNavigation = $('.cd-vertical-nav'),
		navigationItems = verticalNavigation.find('a'),
		navTrigger = $('.cd-nav-trigger'),
		scrollArrow = $('.cd-scroll-down');

	$(window).on('scroll', checkScroll);

	//smooth scroll to the selected section
	verticalNavigation.on('click', 'a', function(event){
        event.preventDefault();
        smoothScroll($(this.hash));
        verticalNavigation.removeClass('open');
    });

    //smooth scroll to the second section
    scrollArrow.on('click', function(event){
    	event.preventDefault();
        smoothScroll($(this.hash));
    });

	// open navigation if user clicks the .cd-nav-trigger - small devices only
    navTrigger.on('click', function(event){
    	event.preventDefault();
    	verticalNavigation.toggleClass('open');
    });

	function checkScroll() {
		if( !scrolling ) {
			scrolling = true;
			(!window.requestAnimationFrame) ? setTimeout(updateSections, 300) : window.requestAnimationFrame(updateSections);
		}
	}

	function updateSections() {
		var halfWindowHeight = $(window).height()/2,
			scrollTop = $(window).scrollTop();
		contentSections.each(function(){
			var section = $(this),
				sectionId = section.attr('id'),
				navigationItem = navigationItems.filter('[href^="#'+ sectionId +'"]');
			( (section.offset().top - halfWindowHeight < scrollTop ) && ( section.offset().top + section.height() - halfWindowHeight > scrollTop) )
				? navigationItem.addClass('active')
				: navigationItem.removeClass('active');
		});
		scrolling = false;
	}

	function smoothScroll(target) {
		// alert(target.attr("class"));
        $('body,html').animate({'scrollTop':target.offset().top},300,function(){
        	clicked = false;
        });
        target.addClass('present');
	}

	$(document).on('keydown', function(event){
			if( event.which=='40') {
				event.preventDefault();
				nextSection();
			} else if( event.which=='38') {
				event.preventDefault();
				prevSection();
			}
		});
  	

  	$(document).mousewheel(function(event, delta){
        // alert(delta);
  		event.preventDefault();
        if(delta < 0)
        	nextSection();
        if(delta > 0)
        	prevSection();
    });


	function nextSection(){
		if(clicked == true){
			return;
		}
		clicked = true;
		var prevIndex;
		contentSections.each(function(index){
			if($(this).hasClass('prev')){
				prevIndex = index;
				// alert(index);
			}
		});

		if(prevIndex == 3){
			clicked = false;
			return;
		}
		contentSections.filter('.prev').removeClass('prev');
		var present = contentSections.filter('.present'),
		next = present.next();
		present.removeClass('present').addClass('prev');
		smoothScroll(next);
	}

	function prevSection(){
		if(clicked == true){
			return;
		}
		clicked = true;
		var nextIndex;
		contentSections.each(function(index){
			if($(this).hasClass('present')){
				nextIndex = index;
				// alert(index);
			}
		});

		if(nextIndex == 0){
			clicked = false;
			return;
		}
		contentSections.filter('.present').removeClass('present');
		var previous = contentSections.filter('.prev'),
		before = previous.prev();
		previous.removeClass('prev').addClass('present');
		 before.addClass('prev');
		smoothScroll(previous);
	}

});