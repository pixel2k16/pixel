<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Leaderboard</title>
    <link rel="stylesheet" type="text/css" href="css/leader.css" />
  </head>
  <body>
  <div class="cover"></div>
  <div class="total">
  	  	<h1>These be t' captains who tried t' found t' treaaye</h1>
	    <?php		
			$ins = 0;
	     	$con = new mysqli("localhost","root","","pixelbc7_pixel");
			if($con->connect_error){ die("Connection Error"); }
			$sql = "SELECT * from engctst join registered on engctst.pid  = registered.pixelid  order by engctst.pixlevel desc, engctst.timestamp asc ;";

		  	$result = $con->query($sql);
		  	if ( $result->num_rows > 0) {
			 $sno = 1;
		  	?>
		  	<div class="board">
	  			<table cellpadding=8>
		  		<tr><th>Rank</th><th>name</th><th>Points</th><tr>	
		  		<?php
		 	 	while($row = $result->fetch_assoc()) {
			 	 	if($row['pixlevel'] >1){
						?>	
						<tr>
							<td><?php echo $sno; ?></td>
							<td><?php echo  $row['firstname']; ?></td>
							<td><?php echo  $row['pixlevel']-1; ?></td>
						</tr>
						<?php
			    	}// If 
		  		$sno++;
		  		}// While loop
				?>
				</table>
		  	</div>
		<?php } ?>
  </div>
  </body>
</html>