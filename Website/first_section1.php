
<div id="my">
	<canvas id="starfield"  style="background-color:#000000;position:absolute;top:0px;left:0px;width:100%;height:100%;"></canvas>	
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

<div id="pixel"> <a class="vl link link--nukun wow zoomInDown" 
			data-wow-delay="3s" data-wow-duration="2.5s" href="#">PI<span>X</span>EL</a></div>

<script>
	// For Demo purposes only (show hover effect on mobile devices)
	[].slice.call( document.querySelectorAll('.grid a') ).forEach( function(el) {
		el.onclick = function() { return false; }
	});
</script>
