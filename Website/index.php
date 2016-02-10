<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Sintony:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/stars.css">

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

	<!-- For First Section -->
	<link rel="stylesheet" type="text/css" href="css/section1.css">
	<link rel="stylesheet" type="text/css" href="css/linkstyles.css" />
	<script type="text/javascript" src="js/video.js"></script>

	<!-- If you'd like to support IE8 -->  	
  	<!-- for events navigations	 -->
  	<link rel="stylesheet" href="css/resetevents.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/styleevents.css"> <!-- Resource style -->
	<script src="js/jquery.mobile.custom.min.js"></script>
	<script src="js/mainevents.js"></script> <!-- Resource jQuery -->

	<!-- for Gallery -->
	<link rel="stylesheet" type="text/css" href="css/gallery.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<script type="text/javascript" src="js/gallery.js"></script>

	<script type="text/javascript" src="js/wow.min.js"></script>
	<script>
 		new WOW().init();
 	</script>
	
	<title>Vertical Fixed Navigation #2 | CodyHouse</title>
</head>
<body>
<nav class="cd-vertical-nav">
	<ul>
		<li><a href="#section1" class="active"><span class="label">Intro</span></a></li>
		<li><a href="#section2"><span class="label">Events</span></a></li>
		<li><a href="#section3"><span class="label">Gallery</span></a></li>
		<li><a href="#section4"><span class="label">Share</span></a></li>
		<li><a href="#section5"><span class="label">Extras</span></a></li>
	</ul>
</nav><!-- .cd-vertical-nav -->

<button class="cd-nav-trigger cd-image-replace">Open navigation<span aria-hidden="true"></span></button>

<!-- for social networking elements -->
<div class="deck">
	<a href="https://www.youtube.com/channel/UCG-tEdg_D0d7JQZtYwrmVVw?sub_confirmation=1" 
	class="social yt wow bounceInDown" data-wow-delay="0.2s" target="_blank"></a>
	<a href="http://www.fb.com/pixel2k16" target="_blank" data-wow-delay="0.3s" class="social fb wow bounceInDown"></a>
	<a href="http://www.twitter.com/pixel_jntua" data-wow-delay="0.4s" class="social twtr wow bounceInDown" target="_blank"></a>
	<a href="mailto:pixel.jntua@gmail.com" data-wow-delay="0.5s" class="social mail wow bounceInDown" target="_blank"></a> 
</div>
<!-- Hamberger menu -->
<div class="hmenu">
	<div class="line wow jello" data-wow-delay="1.5s"> </div>
	<div class="line wow rollIn" data-wow-delay="1s"></div>
	<div class="line wow jello"  data-wow-delay="1.5s"></div>
</div>

</div>
<section id="section1" class="cd-section present">
	<div class="content-wrapper" id ="section1Container">
		<?php include_once("first_section1.php"); ?>
		<a href="#section2" class="cd-scroll-down cd-image-replace">scroll down</a>
	</div>
</section><!-- cd-section -->

<section id="section2" class="cd-section">
	<div class="content-wrapper">
		<?php include_once("events_section2.php"); ?>
	</div>
</section><!-- cd-section -->

<section id="section3" class="cd-section">
	<div class="content-wrapper gallery"  style="position:relative">
		<?php include_once("gallery_section3.php") ?>
	</div>
</section><!-- cd-section -->

<section id="section4" class="cd-section">
	<div class="content-wrapper">
		<?php include_once("section4.php"); ?>
	</div>
</section><!-- cd-section -->

<section id="section5" class="cd-section">
	<div class = "content-wrapper">
		<?php include_once("section5.php"); ?>
	</div>
</section>
	
<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>