<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Leaderboard</title>
  </head>
  <body>
    <?php		
		$ins = 0;

		  $con = new mysqli("localhost","root","","pixelbc7_pixel");
		  if($con->connect_error){ die("Connection Error"); }
		$sql = "SELECT * from engctst order by pixlevel desc, timestamp asc ;";

	  $result = $con->query($sql);
	  if ( $result->num_rows > 0) {
	  $sno = 1;
	  ?>
			<table border=1 cellpadding=8>
			<tr><th colspan=4 style='text-align'>Online Treasure Hunt</th></tr>
			<tr><th>Rank</th><th>Pixel ID</th><th>Level</th><th>Time</th><tr>
			
	<?php
	while($row = $result->fetch_assoc()) {
	?>
			
		<tr>
			<td>
				<?php echo $sno; ?>
			</td>
			<td>
				<?php echo $row['pid']; ?>					
			</td>
			<td>
				<?php echo  $row['pixlevel']; ?>					
			</td>
			<td>
				<?php echo  date("Y-m-d h:i:sa",strtotime('+5 hour +30 minutes',strtotime($row['timestamp']))); ?>					
			</td>
		</tr>
	<?php
	$sno++;
	}
	?>
			</table>
	<?php }      ?>

  </body>
</html>