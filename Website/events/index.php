<?php
	session_start();
	$username = "";
	$pixelid = "";
	if(!empty($_SESSION['usrname'])){
		$username = $_SESSION['usrname'];
		$pixelid = $_SESSION['pixelid'];
	}
	// echo $username;
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Events Description</title>
		<link rel="shortcut icon" href="../favicon.ico">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/style5.css" />
		<link rel="stylesheet" type="text/css" href="css/animate.css" />
		<link rel="stylesheet" type="text/css" href="../css/login.css">
		<script src="js/modernizr.custom.js"></script>
		<script type="text/javascript" src="js/events.js"></script>
	</head>


	<body>
		<?php include_once 'login-popup.php'; ?>
			<?php
				 if(!empty($username)){
				 	?>
				 		<div class="usrname">Hi <?php echo $username; ?></div>
						<a class="logout" href="#">Log out</a>
						<style type="text/css">
							/* For log out button */
							.logout{
								display: inline-block;
								position: fixed;
								top: 52px;
								right: 50px;
								color: #FBFBFB;
								background: #141E29;
								padding: 2vh;
								box-shadow: 0px 0px 1px black;
								transition: all 0.5s;
								z-index: 4;
							}

							.logout:hover{
								color: #100C0C;
								background: #fff;
								box-shadow: 0px 10px 10px black;
							}
						</style>
				 	<?php
				 }
			?>
			<?php 
				if(empty($username)){
					?> <a href="#" class="main-link loginb"> Log in </a> <?php
				}
			?>
		<div class="container present" id="ppt">
			<h1>PAPER PRESENTATION</h1>	
		    <h3>Instructions:</h3>
		 	<ol>
			 	 <li>A maximum of <b>three</b> members is allowed per team.</li>
				 <li>The registration fee is Rs 200/- per participant.</li>
				 <li>All technical topics which has the capacity to grab the listener’s attention are allowed.</li>
				 <li>Emerging technologies are mostly preferred.</li>
				 <li>Upload your abstract with the filename as your presentation topic.</li>
			</ol>
			<h3>Rules:</h3>
			<ol>
				 <li>The file must also include the names and contact numbers of all the team members.</li>
				 <li>Only .doc, .docx and .pdf filetypes are allowed.</li>
				 <li>Each selected team must submit both soft and hard copies at the time of presentation.</li>
			</ol>
			<h3>Important Dates:</h3>
			<ul>
				<li>Last date for submission of abstracts is 11<sup>th</sup> March 2016</li>
				<li>Intimation of selected abstracts will be on 14<sup>th</sup> March 2016</li>
			</ul>
			<div class="contacts">
				<h3 class="contact-header">Coordinators:</h3>
				<div class="contact left">
					<span>&#128104; D. Thanmay Yadav</span><br>
					<span>&#128241; <a href="tel:9849244683">9849244683</a></span><br>
				</div>
				<div class="contact right">
					<span>&#128104; B. Narahari </span><br>
					<span>&#128241; <a href="tel:9493445506">9493445506</a><br>
				</div> 
			</div>

	 		<!-- For registration and upload abstract forms -->
			<div class="reg-wrapper">
				<a href="#" class="register">Register</a>
			</div>
		</div> <!-- Paper Presentation -->


		<div class="container" id="debug">
			<h1>DIG 'D' BUG</h1>
			<h3>Rules & Guidelines:</h3>
			<ol>
				<li>This is a spot event.</li>
				<li>Each team must contain only two members.</li>
				<li>The registration fee is Rs 100/- per participant.</li>
				<li>The teams will be given a series of coding samples to debug.</li>
				<li>Languages used will be C, C++ and JAVA.</li>
				<li>Registration has to be done on the day of the fest.</li>				
			  <li>Other details will be disclosed on the day of the fest.</li>
			</ol>
			<div class="contacts">
				<h3 class="contact-header">Coordinators:</h3>
				<div class="contact left">
					<span>&#128104; S. Charan Teja</span><br>
					<span>&#128241; <a href="tel:8801797179">8801797179</a></span><br>
				</div>
				<div class="contact right">
					<span>&#128104; A. Janardhana </span><br>
					<span>&#128241; <a href="tel:8332052628">8332052628</a><br>
				</div>
			</div>
			<!-- For registration and upload abstract forms -->
			<div class="reg-wrapper">
				<a href="#" class="register">Register</a>
			</div>	
		</div> <!-- Debugging -->

		<div class="container" id="code">
			<h1>CODE MARATHON</h1>
			<h3>Rules & Guidelines:</h3>
			<ol>
				<li> This is an online event.</li>
				<li> There will be no registration fee.</li>
				<li> It will be a ten day marathon which begins on 7th March 2016.</li>
				<li> Each day a problem will be given to the registered members at 18:00hrs.</li>
				<li> You will have 24hrs to submit the solution.</li>
				<li> The allowed languages are C, C++ and Java.</li>
				<li> Code plagiarism is strictly prohibited.</li>
			</ol>
			<div class="contacts">
				<h3 class="contact-header">Coordinators:</h3>
				<div class="contact left">
					<span>&#128104; B.V. Siva Sai</span><br>
					<span>&#128241; <a href="tel:7382787791">7382787791</a></span><br>
				</div>
				<div class="contact right">
					<span>&#128104; P. Surya Teja </span><br>
					<span>&#128241; <a href="tel:9441339144">9441339144</a><br>
				</div>
			</div>	
		</div> <!-- Online Coding-->

		<div class="container" id="enigma">
				<h1>ENIGMA</h1>
				<h3>Rules & Guidelines:</h3>
				<ol>
				  <li> This is an online event.</li>
					<li> There will be no registration fees.</li>
					<li> This contest will begin on 7th March 2016.</li>
					<li> No rules needed, you will know when you see it.</li>
				</ol>
				<div class="contacts">
					<h3 class="contact-header">Coordinators:</h3>
					<div class="contact left">
						<span>&#128104; K.R. Bharath</span><br>
						<span>&#128241; <a href="tel:8977258572">8977258572</a></span><br>
					</div>
					<div class="contact right">
						<span>&#128104; A. Manikanta </span><br>
						<span>&#128241; <a href="tel:7674911987">7674911987</a><br>
					</div>
				</div>
			</header>		
		</div> <!-- treasure hunt -->

		<div class="container" id="quiz">
			<h1>BEAT 'D' CLOCK</h1>
			<h3>Rules & Guidelines:</h3>
			<ol>
				<li> This is a spot event.</li>
				<li> A team can contain a maximum of three members.</li>
				<li> Registration fee will be Rs 100/- for each participant.</li>
				<li> Other rules will be disclosed on the day of the fest.</li>
			</ol>
			<div class="contacts">
				<h3 class="contact-header">Coordinators:</h3>
				<div class="contact left">
					<span>&#128104; B. Lokesh</span><br>
					<span>&#128241; <a href="tel:9885718520">9885718520</a></span><br>
				</div>
				<div class="contact right">
					<span>&#128104; K. Bhanu Prasanth</span><br>
					<span>&#128241; <a href="tel:9652624780">9652624780</a><br>
				</div>
			</div>
		</div> <!-- Technical Quiz -->

		<div class="container" id="short">
			<h1>CORTOFLICKS</h1>
			<h3>Rules & Guidelines:</h3>
			<ol>
				<li> Registration fee will be Rs 100/- for each participant.</li>
				<li> The video quality must be atleast 720p.	</li>
				<li> You can either<br></li>
				<p>a) Upload your shortfilm on youtube and send the link to pixel.jntua@gmail.com.</p>
				<p>b) Directly bring the video on the day of the fest.</p>
				<li>If you follow option <b>a</b> then send the mail containing the link with subject as <b>CORTOFLICKS</b></li>
			</ol>
			<div class="contacts">
				<h3 class="contact-header">Coordinators:</h3>
				<div class="contact left">
					<span>&#128104; P. Pradeep Varma</span><br>
					<span>&#128241; <a href="tel:9440958817">9440958817</a></span><br>
				</div>
				<div class="contact right">
					<span>&#128104; V. Pavan Kumar</span><br>
					<span>&#128241; <a href="tel:7673992517">7673992517</a><br>
				</div>
			</div>
		</div> <!-- Short Films -->

		<div class="container" id="poster">
			<h1>SKETCH IT OUT</h1>
			<h3>Rules & Guidelines:</h3>
			<ol>
				<li> A maximum of two members is allowed per team.</li>
				<li> The registration fee is Rs 100/- per participant.</li>
				<li> You have to register online to participate on the day of the fest.</li>
			</ol>
			<div class="contacts">
				<h3 class="contact-header">Coordinators:</h3>
				<div class="contact left">
					<span>&#128104;  S. Bharat</span><br>
					<span>&#128241; <a href="tel:8121542025">8121542025</a></span><br>
				</div>
				<div class="contact right">
					<span>&#128104; S. Satish</span><br>
					<span>&#128241; <a href="tel:9491476038">9491476038</a><br>
				</div>
			</div>
		</div> <!-- Poster Presentation -->

		<div class="container" id="photo">
			<h1>FOTOGRAFIA</h1>
			<h3>Rules & Guidelines:</h3>
			<ol>
				<li> This is both an online and a spot event.</li>
				<li> First you have to register for this event in the website.</li>
				<li> The registration fee is Rs 100/- per participant.</li>
				<li> You have to send not more than 10 photos taken by you to pixel.jntua@gmail.com.</li>
				<li> The subject of the mail must be FOTOGRAFIA and will be rejected otherwise.</li>
				<li> They shouldn't be edited using any photo editing tools and will be disqualified on doing so.</li>
				<li> We will intimate you whether you are selected or not via email.</li>
				<li> The selected members have to present on the day of the fest for spot round.</li>
				<li> Here you will be given a theme and a time of one day.</li>
				<li> The top three photos are selected based on the photos you have taken on the day of the event.</li>
			</ol>
			<div class="contacts">
				<h3 class="contact-header">Coordinators:</h3>
				<div class="contact left">
					<span>&#128104;  K. Sameer</span><br>
					<span>&#128241; <a href="tel:8125769927">8125769927</a></span><br>
				</div>
				<div class="contact right">
					<span>&#128104; T. Swyrik</span><br>
					<span>&#128241; <a href="tel:8331889577">8331889577</a><br>
				</div>
			</div>		
		</div> <!-- Photography -->

		<div class="container" id="game">
			<h1>GAMEZONE</h1>
			<h3>Rules & Guidelines:</h3>
			<ol>
				<li> This is a spot event.</li>
				<li> Registration fee will be Rs 100/- for each participant.</li>
				<li>Other rules will be disclosed on the day of the fest.</li>
			</ol>
			<div class="contacts">
				<h3 class="contact-header">Coordinators:</h3>
				<div class="contact left">
					<span>&#128104;  T. Swyrik</span><br>
					<span>&#128241; <a href="tel:8331889577">8331889577</a></span><br>
				</div>
				<div class="contact right">
					<span>&#128104; D. Parvesh Pardha</span><br>
					<span>&#128241; <a href="tel:8985675359">8985675359</a><br>
				</div>
			</div>
		</div> <!-- Lan Gaming -->


		<nav id="bt-menu" class="bt-menu">
			<a href="#" class="bt-menu-trigger"><span>Menu</span></a>
			<ul>
				<li><a href="#ppt"><font size="2">Paper Presentation</font></a></li>
				<li><a href="#debug"><font size="2">DIG 'D' BUG</font></a></li>
				<li><a href="#code"><font size="2">CODE MARATHON</font></a></li>
				<li><a href="#enigma"><font size="2">ENIGMA</font></a></li>
				<li><a href="#quiz"><font size="2">BEAT 'D' CLOCK</font></a></li>
				<li><a href="#short"><font size="2">CORTOFLICKS</font></a></li>
				<li><a href="#poster"><font size="2">SKETCH IT OUT</font></a></li>
				<li><a href="#photo"><font size="2">FOTOGRAFIA</font></a></li>
				<li><a href="#game"><font size="2">GAMEZONE</font></a></li>
			</ul>
		</nav>





	</body>
	<script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>
</html>






