<?php
	session_start();
	require_once('conf/mysql_init.php');
	$pid = $_SESSION['pixelid'];
	$gender = $_REQUEST['gender'];

	// $result = mysql_query("select * from hospitality where pid = ".$pid."")

	// Get name and phone number from registered table
	$q = "select firstname, contactno from registered where pixelid = '$pid' ";
	if($result = mysql_query($q,$con)){
		mysql_num_rows($result); 
		if(mysql_num_rows($result) > 0){
			while ($row = mysql_fetch_assoc($result)) {
				$name = $row['firstname'];
				$phno = $row['contactno'];
				 // Now insert gender info to hospitality. 
				 $query = "INSERT INTO hospitality (`pid`,`gen`) VALUES ('$pid','".$gender."')";
				 if(mysql_query($query, $con)){
				   $id = mysql_insert_id($con);
				   // Update the phone number and names in hospitality values to hospitality table.
				   $query = "UPDATE hospitality set name = '".$name."', phno = '".$phno."' where id = '$id'";
				   if(mysql_query($query,$con))
				   		echo "yes";
					else 
						echo "error";//mysql_error($con);
				 }else 
				 	  echo "error"; //mysql_error($con);
			} // While loop
		} else { // Error while There are no rows with pixel id
			echo "error"; //mysql_error($con);
		}
	}else { //error while fetching details from registered table by using pixel id
 		echo "error"; //mysql_error($con);
	}

 ?>