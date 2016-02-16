
<!-- for social networking elements -->
<div class="deck">
	<a href="https://www.youtube.com/channel/UCG-tEdg_D0d7JQZtYwrmVVw?sub_confirmation=1" 
	class="social yt wow bounceInDown" data-wow-delay="8.2s" target="_blank"></a>
	<a href="http://www.fb.com/pixel2k16" target="_blank" data-wow-delay="8.3s" class="social fb wow bounceInDown"></a>
	<a href="http://www.twitter.com/pixel_jntua" data-wow-delay="8.4s" class="social twtr wow bounceInDown" target="_blank"></a>
	<a href="mailto:pixel.jntua@gmail.com" data-wow-delay="8.5s" class="social mail wow bounceInDown" target="_blank"></a> 
</div>

<div id="my">
	<canvas id="starfield"  style="position:absolute;top:0px;left:0px;width:100%;height:100%;"></canvas>	
</div>
<!-- This is for pop up video -->
<div class="teaser">
	<div class="mask">
	</div>
	<div id="video">
		<div class="outer">
			<div class="link-container">
				<a href="#" class="close" title="close" ><img src="img/close.png"></a>
			</div>
			<div class="videowrapper">
				<iframe id="player" width="1280" height="720" src="https://www.youtube.com/embed/QtXb3UGbpOw?enablejsapi=1" 
				frameborder="0"	allowfullscreen>
				</iframe>
			</div>
		</div>
	</div>
</div>
	
<!-- Script to load Youtube api asynchronously.  -->
<script type="text/javascript">	 //This code loads the IFrame Player API code asynchronously.
	  var tag = document.createElement('script');

	  tag.src = "https://www.youtube.com/iframe_api";
	  var firstScriptTag = document.getElementsByTagName('script')[0];
	  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	  var player;
	  function onYouTubeIframeAPIReady() {
	  player = new YT.Player('player', {
	     events: {
	       'onReady': onPlayerReady
	     }
	   });
	  }

	  // 4. The API will call this function when the video player is ready.
	  function onPlayerReady(event) {
	    // event.target.playVideo();
	  }

	  function stopVideo() {
	    player.stopVideo();
	  }

	  function pauseVideo(){
	  	player.pauseVideo();
	  }
	  function playvideo(){
	  	player.playVideo();
	  }
</script>

<div class="wrapper">
	<div class="college wow fadeIn" data-wow-delay="6s" 
 		data-wow-duration="1.5s">
		<span style="position:relative;">
			<h3>JNTUACEA </h3> 
		</span>
		<span <span style="position:relative;">
			<h3>Department of CSE Presents</h3>
		</span>
	</div>
	<div id="pixel">
 		<a class="vl link link--nukun wow zoomInDown" href="#" data-wow-delay="6s"
 		data-wow-duration="2.5s">PI<span>X</span>EL</a>
	</div>
	<div class="tagline wow flipInX" data-wow-delay="7.5s">
		<span style="position:relative;left:-1%" >Pixelate Ur Excellence</span>
	</div>
	<div class="date wow fadeIn" data-wow-delay="8.5s" 
 		data-wow-duration="1.5s">
			<span style="position:relative;left:-1%">
				<h3>March 19<sup>th</sup> &amp; 20<sup>th</sup>, 2016</h3>
			</span><br>
			<span style="position:relative;left:-1%"><h3>Registrations will open soon...</h3>
			</span>
	</div>
</div>

<script>
	// For Demo purposes only (show hover effect on mobile devices)
	[].slice.call( document.querySelectorAll('.grid a') ).forEach( function(el) {
		el.onclick = function() { return false; }
	});
</script>
