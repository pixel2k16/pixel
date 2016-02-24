<?php

require_once('conf/mysql_init.php');
		
$idErr = $emailErr = $pixelid = $mailid = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pixelid = test_input($_POST["pixelid"]);
}
function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
}
if(!empty($pixelid)){
	$subject="pixel2k16 password recovery";
	$q = "select * from registered where pixelid='$pixelid' OR mailid='$pixelid'";
	$result=mysql_query($q,$con);
	mysql_num_rows($result);	
	if(mysql_num_rows($result)==0){
		echo "invalid";
	}
	while($row=mysql_fetch_assoc($result)){
		$name=$row['firstname'];
		$password=$row['password'];
		$email=$row['mailid'];
		$flag=1;
		$pixelid = $row['pixelid'];	
	
		
		include("phpmailer/PHPMailerAutoload.php");
	
	$arr = array('surya.teja@outlook.in');
	
	foreach($arr as $to){
			$mail = new PHPMailer;
			$mail->isMail();
			$mail->SMTPDebug = 2;
			$mail->Debugoutput = 'html';
			$mail->Host = 'mail.pixel2k16.in';
			
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			
			$mail->Username = "support@pixel2k16.in"; // SMTP username
			$mail->Password = "ramsupport"; // SMTP password
			$mail->From = "support@pixel2k16.in";
			$mail->FromName = "Team Pixel";
			$mail->AddReplyTo("support@pixel2k16.in","PIXEL2K16");
			$mail->WordWrap = 50; // set word wrap
			
			$noimg = "http://avc.host-ed.me/pixel2k16seen.php?s=".$to."&sub=main";
			$mail->IsHTML(true); 
			$mail->Subject = "PIXEL-2K16 password recovery";
			$mail->Body = "<pre style='font-size:1.1em; color:#000000; font-family: calibri; '> 
Hello ".$name.",

	Here are the details you needed for your login.

	Your PIXEL - 2K16 Login Credentials:
            
		<b>Pixel ID :</b> ".$pixelid."            
		<b>Password </b>: ".$password."
	
	<a href='http://pixel2k16.in/register/login.php' target='_blank'>click here to login</a> 

With Regards,
Pixel - 2K16.
</pre>
			"; //HTML Body
			$mail->AltBody = "This is the body when user views in plain text format"; //Text Body
			
			$mail->AddAddress($email,$name);
			
			if($mail->Send())
			  echo "sent";
			else
			  echo "notsent";	
		} 
	
	}
		
	
}

?>