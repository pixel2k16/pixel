<?php
	$con = mysqli_connect("localhost","root","","pixelbc7_pixel");
	if(!$con){ echo "n";}
	$result = mysqli_query($con,"select * from images");
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			echo '<img src="data:imgage/png;base64,'.base64_encode($row['image']).'">';
		} // while
	}
?>