<script> var islg; </script>
<?php 
	session_start();
	$con = mysqli_connect("localhost","root","","pixelbc7_pixel");
		 if(!$con){ exit(0);}
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
		<title>PIXEL2K16 | Enigma Contest</title>
		<link rel="shortcut icon" href="http://www.pixel2k16.in/favi.png">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" type="text/css" href="css/enigma.css" />

		<!-- For login popup.php -->
		<link rel="stylesheet" type="text/css" href="http://www.pixel2k16.in/css/animate.css">
		<link rel="stylesheet" type="text/css" href="../css/login.css">

		<script type="text/javascript" src="js/enigma.js"></script>
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
					  $result = mysqli_query($con,"select * from engctst where pid='$pid'");
						 $rows = mysqli_num_rows($result);
						 if($rows != 1){
						 	if($rows == 0){
						 		?>
						 		<div class="not-enroll">
						 			<div class="enroll-wrapper">
						 				<h1> You are not enrolled in this contest. </h1>
						 				<a class="enroll" href="#">Enroll</a>
						 			</div>
						 			<div id="enroll-success" class="enroll-status"> Get ready for the enigma. &#x1f64c;</div>
							 		<div id="enroll-error" class="enroll-status"> </div>
						 		</div>
						 		<?php
						 		exit(0);
						 	}
						 	echo "<h1> Some error occurred. Please intimate us as soon as possible</h1>";
						 	exit(0);
						 }while ($row = mysqli_fetch_assoc($result)) {
						 	 $level = $row['pixlevel'];
						 } // pixlevel - while
					 if($level >= 4){
				 	 	?><h1>Congratulations. You've Unlocked The Treasure.<br>
				 	 	 Let's check your position among other's. </h1>
				 	 	<style>
				 	 	h1{
				 	 		padding: 10%;
						    border: 2px solid green;
						    width: 80%;
						    color: green;
						    margin: 10% auto;
						    font-weight: bold;
						    text-align: center;
						    max-width: 800px;
				 	 	}
				 	 	</style>
					 	<?php
					 	exit(0);
					 }?>
					<div class="total">
					<?php
					// For displaying image with respect to level 
	 				$result = mysqli_query($con,"select * from images where pixlevel = '$level'");
					if($result){
						while($row = mysqli_fetch_assoc($result)){
							?>
							<div class="riddle">
							  <?php echo '<img class="image" src="data:imgage/png;base64,'.base64_encode($row['image']).'">'; ?>
							  <div class="cover"></div>
							</div>
							<?php
						} // while
					}
					// End of displaying image  wrt to level 
				   ?>
				   <div class="form-container">
					   <form id="ansform" method="post" action="#" >
					   		<input type="text" name="answer" required autocomplete="off" autofocus/>
					   		<input type="hidden" name="pid" value="<?php echo $pid ?>"/>
					   		<input type="hidden" name="level" value="<?php echo $level ?>"/>
					   		<div class="sub-wrapper"><input type="submit" value="Is it..?"/></div>
					   </form>
					   <div id="equal" class="status"> Congrats. You cracked it.</div>
					   <div id="updated" class="status"> You will be taken to next level (if any).</div>
				   </div>
			 	</div>
				 	<?php
				 }else { // That means user is not logged in so display log in button. 
				 	?> <a  href="#" class="main-link loginb"> Log in </a> <?php
				 }?>
	</body>
</html>