
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
			</span>
	</div>
</div>

<?php 
	if(empty($username)){
		?>
			<div class="main-link-wrapper wow bounceIn" data-wow-duration="1.5s" data-wow-delay="0s">
				<a href="#" class=" main-link register"> Register </a>
				<a href="#" class=" main-link loginb"> Log in </a>
			</div>
		<?php
	}
?>

<?php 
	if(!empty($username)){
		?>
		<script type="text/javascript">
			var nameStyles={ 'border-radius': '10px',
							 'padding': '10px','background': '#722',
							 'position': 'fixed',
							 'color': '#fff',
							 'font-size': '1em',
							 'top': '10px',
							 'left': '10px',
							 'z-index': '5',
							 'display': 'inline-block',
							 'transform-origin':'top',
							 'animation-delay':'1s'
							};
			// alert(" "+<?php  echo "'$username'"; ?>);
			$("<div id='usr-name'></div>").addClass("animated flipInX")
			.css(nameStyles).html("hello "+<?php  echo "'$username'"; ?>).appendTo("#section1Container");
		</script>
<?php
	}
	
	if(!empty($username)){
		?>
		<a class="logout" href="#">Log out</a>
		<style type="text/css">
			/* For log out button */
			.logout{
				display: inline-block;
				position: fixed;
				top: 1vh;
				right: 3%;
				color: #FBFBFB;
				background: #071325;
				padding: 2vh;
				box-shadow: 0px 0px 1px black;
				transition: all 0.5s;
				z-index: 4;
			}

			.logout:hover{
				color: #100C0C;
				background: #fff;
				box-shadow: 0px 10px 10px black;
				top: 4vh;
			}
		</style>
		<?php
	}
?>

<script>
	// For Demo purposes only (show hover effect on mobile devices)
	[].slice.call( document.querySelectorAll('.grid a') ).forEach( function(el) {
		el.onclick = function() { return false; }
	});
</script>
