<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php


    ?>

    <form action="checkparticipants.php" method="post">
      <table cellpadding="8" align="center" border="1" class="no-border">
		<tr class="no-print">
          <td colspan="2"> Check Participants </td>
        </tr>

		<tr class="no-print">
          <td> Select Event: </td>
          <td>
            <select name="event">
            	<option value="">--select--</option>
				<option value="ppt_PPT">PPT</option>
				<option value="enigma_Treasure Hunt">Treasure Hunt</option>
				<option value="poster_Poster Presentation">Poster Presentation</option>
				<option value="hospitality_Hospitality">Hospitality</option>
				<option value="photo_Photography">Photography</option>
				<option value="short_Short Film">Short Film</option>
				<option value="workshop_Workshop">Workshop</option>
			</select>
          </td>
        </tr>

        <tr class="no-print"></tr>

        <tr class="no-print">
          <td colspan="2"> <input type="submit" name="name" value="Submit" /> </td>
        </tr>

        <tr class='no-border'>
          <td colspan="2" class='no-border'>
            <?php
				$ins = 0;
				if(!empty($_POST['event'])){
					@$con = new mysqli("localhost","pixelbc7","Ramsurya58$$","pixelbc7_pixel");
				  	if($con->connect_error)
						die("Connection Error");
					$name = explode('_',$_POST['event']);
					$sql = "SELECT * from ".$name[0]." a, registered b where a.pid=b.pixelid order by a.id asc ;";

			  		$result = $con->query($sql);
					if ( $result->num_rows > 0) {
					 	$sno = 1;
						echo "<table class='print' border=1 cellpadding=8>";
							echo "<tr><th colspan=6>".$name[1]."</th></tr>";
							echo "<tr><th style='width:10px'>No.</th><th class='pid' style='width: 40px'>Pixel ID</th><th style='width: 70px'>Name</th><th style='width: 130px'>Email</th><th style='width: 180px'>College Name</th><th style='width:250px'>Topic</th><tr>";
							while($row = $result->fetch_assoc()) {
								echo "<tr><td>".$sno."</td><td class='pid' >".$row['pid']."</td><td>".$row['firstname']."</td><td>".$row['mailid']."</td><td>".$row['colgname']."</td><td></td></tr>";
								$sno++;
							}
						echo "</table>";
					}

				}
				
             ?>
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>

<style>
	@media print {
		.no-print, .pid {display:none;}
		.no-border{ border: none;  }
	}

</style>