<?php
	$conn = mysqli_connect("localhost","root","","pixelbc7_pixel");
	if(!$conn){
		echo "Database not connected".mysqli_connect_error();
		exit(0);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Slected presentations.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="temp.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="http://www.pixel2k16.in/js/wow.min.js"></script>
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
</head>
<body>
	<div class="img-wrapper">
		<img src="http://www.pixel2k16.in/register/img/pixel.png">	
	</div>
	<!-- HTML form to enter mail ids to check whether they are selected or not.-->
	 <form  data-wow-duration='0.5s' method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	 	<input name='email' placeholder="enter your email id" type='email' autofocus />
	 	<input name="submit" type="submit" value="check"/>
	 </form>
	
	<?php
		if(isset($_POST['submit'])){
			$result = mysqli_query($conn, "SELECT * FROM selectedppt where email = '".$_POST['email']."'");
			if(mysqli_num_rows($result) > 0){ //ie., email is present in the database so disp;ay the image.
				while ($row = mysqli_fetch_assoc($result)) {
					 ?>
					 	<div class="status found wow fadeIn" data-wow-duration='0.5s' >
					 		<div style="text-align: left;">
					 			<table border="0">
						 			<tr><span > Congratulations. Your ppt has been selected.</span></tr>
						 			<tr>
						 				<td><b>PID's:</b></td>
						 				<td><?php echo $row['pids'];?></td>
						 			</tr>

						 			<tr>
							 			<td><b>participants:</b></td>
							 			<td><?php echo $row['names']; ?> </td>
							 		</tr>
							 		<tr>
							 			<td><b>topic:</b></td>
							 			<td> <?php echo $row['topic'];?></td>
							 		</tr>
							 		<tr>
							 			<td><b>email:</b></td>
							 			<td><?php echo $row['email']; ?> </tr>
							 		</tr>
					 			</table>
					 		</div>
					 	</div>
					 <?php
				}
			}else { // ie., email is not present in the database.
				?>
					<div class="status not-found wow fadeIn" data-wow-duration='0.5s'>
						<div style="text-align:left;">We are very sorry to inform you that your abstract has been registered. 
						<br/> Or you may entered your mail incorrectly. </div> 
					</div>
				<?php
			}
		} // If isset($_POST['submit']){}
	?>

</body>
</html>