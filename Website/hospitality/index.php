<script> var islg; </script>
<?php 
	session_start();
	if(isset($_SESSION['pixelid'])){
		 $pid =  $_SESSION['pixelid'];
		 $username = $_SESSION['usrname'];
		 ?>
		 	<script> var islg = true; </script>
		 <?php
	}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>PIXEL2K16 | Hospitality</title>
		<link rel="shortcut icon" href="http://www.pixel2k16.in/favi.png">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" type="text/css" href="css/hospital.css" />
		
		<!-- For login popup.php -->
		<link rel="stylesheet" type="text/css" href="http://www.pixel2k16.in/css/animate.css">
		<link rel="stylesheet" type="text/css" href="../css/login.css">

		<script type="text/javascript" src="js/hosp.js"></script>
	</head>
	<body>
		<?php include_once '../events/login-popup.php'; ?>
		<?php
				 if(!empty($username)){
				 	?>
				 		<div class="usrname">Hi <?php echo $username; ?></div>
						<a id="lgout" class="logout" href="#">Log out</a>
						<style type="text/css">
							/* For log out button */
							.logout{
								display: inline-block;
								position: fixed;
								top: 0px;
								right: 50px;
								color: #FBFBFB;
								background: #141E29;
								padding: 2vh;
								box-shadow: 0px 0px 1px black;
								transition: all 0.5s;
								z-index: 4;
								border-radius: 0px 0px 10px 10px;
							}

							.logout:hover{
								color: #100C0C;
								background: #fff;
								box-shadow: 0px 10px 10px black;
							}
						</style>
				 	<?php
				 }else { // That means user is not logged in so display log in button. 
				 	?> <a  href="#" class="main-link loginb"> Log in </a> <?php
				 }
			?>
		<div id="body">
			<h1>Hospitality</h1>
			<div class="all">
				<h2>Instructions:</h2>
				<div class="matter" id="instruct">
					<ul>
						<li>➩ All members of a team should register for accommodation individually.</li>
						<li>➩ Accommodation will be provided on a sharing basis. However, large teams or teams from the same college may be put up in the same rooms.</li>
						<li>➩ It is mandatory to bring your college ID card and a printed copy of any photo identity card as you arrive JNTUA college of Engineering, Ananthapuramu.</li>
						<li>➩ Accommodation charge will be Rs 100/- per day per person(24 hour stay basis i.e. if you stay from today 5:00 PM to tomorrow 5:00 PM, it will be counted as one day.)</li>
						<li>➩ Accommodation will start only from 18th of March 2016, 6:00PM and all students should vacate the rooms before 9:00PM of 20<sup>th</sup> March 2016.</li>
					</ul>
				</div>  <!-- Matter  -->

				<h2>Rules:</h2>
				<div class="matter" id="rule">
					<ul>
						<li>➩ No matter how short the duration of stay is, he/she will be charged a minimum of Rs 100/-, equivalent of a day’s stay.</li>
						<li>➩ It is not advisable to keep valuable items along with the luggage in the room. PIXEL-2K16 will not be responsible for any loss or damage of your property.</li>
						<li>➩ The Organisation will not take responsibility for any form of damage to person or property during the course of PIXEL-2K16</li>
						<li>➩ In case of any discrepancy, the decision of PIXEL-2K16 team is final.</li>
					</ul>
				</div>  <!-- Matter  -->

				<h2>Frequently Asked Questions:</h2>
				<div class="matter" id="faq">
					<ul>
						<li id="q">&#128587; From when can I avail my allotted accommodation? </li>
						<li id="a"> &#187;  From 18<sup>th</sup> March 2016, 5.00PM onwards.</li>
						<li id="q">&#128587; Does the accommodation charge include food?</li>
						<li id="a"> &#187; Yes. You can also make use of college canteen and hotels nearby.</li>
						<li id="q">&#128587; What are the charges?</li>
						<li id="a"> &#187;  Accommodaton charges: Its Rs 100/- per person per day.</li>
						<li id="q">&#128587; Can I vacate earlier or cancel the accommodation?</li>
						<li id="a"> &#187;  Yes, but the money will not be refunded.</li>
						<li id="q">&#128587; On what basis will accommodation be allotted?</li>
						<li id="a"> &#187;  Accommodation is provided based on first come first serve basis.</li>
					</ul>
				</div> <!-- Matter  -->


				<h2>Reach Us</h2>
				<div class="matter" id="reach">
					<ul>
						<li>➩ JNTU College of Engineering is located about 6 km from both Ananthapuramu Railway Station/A.P.R.T.C Bus stand.</li>
						<li>➩ Ananthapuramu is connected by road to all major towns in South India by regular bus services.</li>
						<li>➩ The simplest and most economical way to reach JNTUA College of Engineering from either the Bus Stand or the Railway station is by sharing an auto which are always available.</li>
					</ul>
				</div> <!-- Matter  -->

				<h2>Contacts:</h2>
				<div class="matter" id="contact">
					<div class="contacts">
						<div class="contact">
							<span>&#128104; K. Sameer</span><br>
							<span>&#128241; <a href="tel:8125769927">8125769927</a></span><br>
						</div>
						<div class="contact">
							<span>&#128104; V. Pavan Kumar</span><br>
							<span>&#128241; <a href="tel:7673992517">7673992517</a></span><br>
						</div>
					</div> <!-- contacts -->
				</div> <!-- Matter  -->

			<!-- For Register button and registration forms -->
			<form id="hspreg" method="post" action="#">
				<label> Select your gender:</label>
				<input type="radio" id="radio01" name="gender" value="M" />
				<label for="radio01"><span>&#x1f474;</span>Male</label>

				<input type="radio" id="radio02" name="gender" value="F" />
				<label for="radio02"><span>&#x1f471;</span>Female</label>

				<input type="submit" value="Let Me In" />
	 		</form>

	 		<div class="status"></div>
	 		<br/>
	 		<br/>
			</div> <!-- All   -->

		</div>  <!-- End of div#body tag  -->

		 	
	</body>
</html>