<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href='https://fonts.googleapis.com/css?family=Sintony:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  	

  	<!-- for events navigations	 -->
  	<link rel="stylesheet" href="css/resetevents.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/styleevents.css"> <!-- Resource style -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="js/jquery.mobile.custom.min.js"></script>
	<script src="js/mainevents.js"></script> <!-- Resource jQuery -->
	
	<title>Vertical Fixed Navigation #2 | CodyHouse</title>
</head>
<body>
<nav class="cd-vertical-nav">
	<ul>
		<li><a href="#section1" class="active"><span class="label">Intro</span></a></li>
		<li><a href="#section2"><span class="label">Events</span></a></li>
		<li><a href="#section3"><span class="label">Help</span></a></li>
		<li><a href="#section4"><span class="label">Share</span></a></li>
	</ul>
</nav><!-- .cd-vertical-nav -->

<button class="cd-nav-trigger cd-image-replace">Open navigation<span aria-hidden="true"></span></button>

<section id="section1" class="cd-section">
	<div class="content-wrapper">
		<h1>Vertical Fixed Navigation <b>#2</b></h1>
		<a href="#section2" class="cd-scroll-down cd-image-replace">scroll down</a>
	</div>
</section><!-- cd-section -->

<section id="section2" class="cd-section">
	<div class="content-wrapper">
		<?php include_once("events_section2.php"); ?>
	</div>
</section><!-- cd-section -->

<section id="section3" class="cd-section">
	<div class="content-wrapper">
		<h2>Help</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto numquam, totam iusto officia earum perferendis, culpa ad atque eveniet praesentium nobis expedita similique beatae tenetur. Distinctio vel tenetur, id cum.</p>
	</div>
</section><!-- cd-section -->

<section id="section4" class="cd-section">
	<div class="content-wrapper">
		<h2>Share</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto numquam, totam iusto officia earum perferendis, culpa ad atque eveniet praesentium nobis expedita similique beatae tenetur. Distinctio vel tenetur, id cum.</p>
	</div>
</section><!-- cd-section -->
	
<script src="js/jquery-2.1.4.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>