<?php
function send_mail($name , $email, $pixelid, $password){
include("phpmailer/PHPMailerAutoload.php");
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'mail.pixel2k16.in';
$mail->Port = 587;
$mail->SMTPAuth = true;

$mail->Username = "pixelbc7"; // SMTP username
$mail->Password = "Ramsurya58$$"; // SMTP password
$webmaster_email = "coordinator@pixel2k16.in"; //Reply to this email ID
$mail->From = "coordinator@pixel2k16.in";
$mail->FromName = "Team Pixel";

$mail->AddReplyTo($webmaster_email,"PIXEL2K16");
$mail->WordWrap = 50; // set word wrap

$noimg = "http://avc.host-ed.me/pixel2k16seen.php?s=".$to."&sub=forgotpassword";
$mail->IsHTML(true); // send as HTML
$mail->Subject = "PIXEL - 2K16, Department of CSE - JNTUA College of Engineering, Ananthapuramu.";
$mail->Body = "<pre style='font-size:1.3em; color:#000000; font-family: calibri; '> 
	Hello ".$name.",

		Thanks for registering for PIXEL2K16. We will be in touch.

		PIXEL - 2K16 CREDENTIALS:
	            
			<b>Pixel ID :</b> ".$pixelid."            
			<b>Password </b>: ".$password."

		<a href='http://pixel2k16.in' target='_blank'>http://pixel2k16.in/login.php</a> 

		With Regards,
		Pixel - 2K16.
</pre>
	<img src='".$noimg."' height='0' width='0' alt='' />
	"; //HTML Body

$mail->AltBody = ""; //Text Body


$mail->AddAddress($email,'');
$msg = "";
if(!$mail->Send())
{
$msg = "Unable to send mail to the Email Address provided. Please try again.";
}
else
{
$msg = "your password is sent to your mail so check ur mail and/or login to continue";
}
return $msg;
}

?>