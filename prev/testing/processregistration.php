<?php
require_once('conf/mysql_init.php');
 $query="SELECT COUNT( * ) as TOT FROM pixel_registration";
 $result=mysql_query($query,$con);
 if($row=mysql_fetch_array($result)){
	$tot=$row['TOT'];
 }else{
	 $tot = 1;
 }
	 /////////////////// security step of hacking///////////
if(isset($_POST['email'])){
 
 $first=clean($_POST['name']);
 $gender=clean($_POST['gender']);
 $dob=clean($_POST['dob']);
 $college=clean($_POST['college']);
 $depart=clean($_POST['dept']);
 $email=clean($_POST['email']);
 $phone=clean($_POST['phone']);
 $pwd=clean($_POST['pwd']);
 $evelist=$_POST['eve'];
 
 $all_eve="";
 foreach( $evelist as $t ){
   $all_eve=$all_eve . $t;
}

//id generation
 $id="PXL".$depart.str_pad($tot+1, 3, "0", STR_PAD_LEFT);



// inserting the participant
$sql1="INSERT INTO `pixel_cse_jntua`.`pixel_registration` (`FIRSTNAME`, `ID`, `GENDER`, `COLLEGE`, `DEPARTMENT`, `EMAIL`, `PHONE`, `PWORD`, `COUNT`, `DOB`, `date`, `time`,`EVES`) VALUES ('$first', '$id', '$gender', '$college', '$depart', '$email', '$phone', '$pwd', '0', '$dob', '0000-00-00', '00:00:00','$all_eve');";



	if( mysql_query($sql1,$con)){
	//after sucessful insertion of part
	echo "<html><body>";
	 echo "<center><h3 style=\"color:#1ABC9C; font-size:30px; margin:0px auto;\">Welcome to PIXEL.<br>sucessfully registered...... <br>Please collect your <strong>pixel-id</strong> sent to Your Mail.</h3>";
	echo "</center></body></html>";
	send_mail($first,$email,$id);
	}
	else{
	echo "<center><h3 style=\"color:#1ABC9C; font-size:30px; margin:0px auto;\">The '$email' or '$phone' has been already registered.</h3>";
	echo "<a style=\" border: none; padding: 0.6em 1.2em; background: #1ABC9C; color: #fff; text-decoration:none; font-family: 'Lato', Calibri, Arial, sans-serif; font-size: 1em; letter-spacing: 1px; text-transform: uppercase; cursor: pointer; display: inline-block; margin: 3px 2px; border-radius: 2px;\" href='location.html'> Home Page </a></center>";
	}
	
}else{header('location:index.php');
}
?>