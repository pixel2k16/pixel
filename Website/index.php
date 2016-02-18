<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>PIXEL 2K16 | JNTU Anantapur</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Sintony:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/stars.css">
 	<script type="text/javascript" src="js/canv.js"></script>


	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

	<!-- For First Section -->
	<link rel="stylesheet" type="text/css" href="css/section1.css">
	<link rel="stylesheet" type="text/css" href="css/linkstyles.css" />
	<script type="text/javascript" src="js/video.js"></script>

	<!-- For log in pop-up -->
	<link rel="stylesheet" type="text/css" href="css/login.css" />
	<script type="text/javascript" src="js/section1.js"></script>

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

	<!-- For reach Us section -->
	<link rel="stylesheet" type="text/css" href="css/reachUs.css">
	
	<!-- For lase section -->
	<link rel="stylesheet" type="text/css" href="css/section5.css">
    	
	<script type="text/javascript" src="js/wow.min.js"></script>
	<script>
		wow = new WOW({
	      boxClass:'wow',            // default
	      animateClass:'animated',   // default   
	      offset: 0,                 // default
	      mobile: true,              // default
          live:false                 // default
       	})
 		wow.init();
 	</script>
	
	<title>Vertical Fixed Navigation #2 | CodyHouse</title>
</head>
<body onload="start()" onresize="resize()"  onmousedown="context.fillStyle='rgba(0,0,0,'+opacity+')'" 
	  onmouseup="context.fillStyle='rgb(0,0,0)'">
<!-- for loading animation -->
<div class="cssload-preloader" data-wow-duration="4s">
	<div class="cssload-preloader-box">
			<div>P</div>
			<div>I</div>
			<div>X</div>
			<div>E</div>
			<div>L</div>
			<div>1</div>
			<div>6</div>
	</div>
</div>

<nav class="cd-vertical-nav">
	<ul>
		<li><a href="#section1" class="active"><span class="label">Home</span></a></li>
		<li><a href="#section2"><span class="label">Events</span></a></li>
		<li><a href="#section3"><span class="label">Gallery</span></a></li>
		<li><a href="#section4"><span class="label">Reach Us</span></a></li>
		<li><a href="#section5"><span class="label">Contacts</span></a></li>
	</ul>
</nav><!-- .cd-vertical-nav -->

<?php include_once('login-popup.php'); ?>

<button class="cd-nav-trigger cd-image-replace">Open navigation<span aria-hidden="true"></span></button>

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
<script type="text/javascript">
</script>
</body>
</html>	