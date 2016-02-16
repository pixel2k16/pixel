<?php
	
	require_once 'PHPMailer/PHPMailerAutoload.php';
	
	 // New PHPMailer Instance.
	$mail = new PHPMailer;

	 //Used to tell mail to use SMTP
	$mail->isSMTP();

	/**
	* Used to enable debugging
	* 0 = off ( for production use only)
	* 1 = For Displaying the client messages
	* 2 = FOr Client and Server Messages. 
	*/
	$mail->SMTPDebug = 2;

	// Used to display Debugging messages in friendly manner.	
	$mail->Debugoutput = 'html';

	/**
	* set smtp host, port, use encryption or not, etc..,
	* for host : Host value is 'smtp.xxxxex.com'
	* for port: Port and number is 587
	* to set encryption ssl or ttl: SMTPAuth value is 'ssl' or 'tls'
	* Whether to use SMTP authentication or not: SMTPAuth value is true or false
	*/
	$mail->Host = 'mail.pixel2k16.in';
	$mail->Port = 465;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;

	/**
	* Set user name and password.
	* Username:'user@acfd.com';
	* Password:'yoursecret';
	*/

	// $mail->Username = 'pixel.jntua@gmail.com';
	// $mail->Password = 'pixel.jntu@';

	$mail->Username = 'noreply@pixel2k16.in';
	$mail->Password = 'pixel.jntu@';

	$mail->isHTML(true);
	// Set From Address. Usually as username by using setFrom(p1,p2)
	//Method from PHPMailer 
	$mail->setFrom('pixel.jntua@gmail.com','Team Pixel');

	// Set to address
	$mail->addAddress('ramanareddysane@gmail.com','rma');
	// Set Reply adderss by using addReplyTo
	$mail->addReplyTo('pixel.jntua@gmail.com','Team Pixel');

	//Set Recipient mail address
	// $mail->addBcc('swwyrik@gmail.com','Swyrik');
	// $mail->addBcc('ramanareddysane@gmail.com');

	// Add mail main contents
	$mail->Subject = 'Pixel is coming soon!!';
	
	// if($mail->addEmbeddedImage("steve.jpg","steve"))
	// 	echo " steve Image Embeded <br>";
	// else
	// 	echo "Not Embedded";

	// include("emailtest.php");
	// echo "<br> <b> Testing </b> <br>";
	// foreach ($emails as $value) {
	// 	echo $value.'<br>';
	// 	$mail->addBCC($value);
	// }

	/*echo "<br> <b> batch11 </b> <br>";
	include("batch11.php");

	foreach ($emails as $value) {
		echo $value.'<br>';
		$mail->addBCC($value);
	}*/

	/*echo "<br> <b> batch10 </b> <br>";
	include("batch10.php");

	foreach ($emails as $value) {
		echo $value.'<br>';
		$mail->addBCC($value);
	}*/

	/*echo "<br> <b> batch08 </b> <br>";
	include("batch08.php");

	foreach ($emails as $value) {
		echo $value.'<br>';
		$mail->addBCC($value);
	}
	*/
	/*echo "<br> <b> batch06 </b> <br>";
	include("batch06.php");

	foreach ($emails as $value) {
		echo $value.'<br>';
		$mail->addBCC($value);
	}*/

	/*echo "<br> <b> dileepBatch </b> <br>";
	include("dileepBatch.php");

	foreach ($emails as $value) {
		echo $value.'<br>';
		$mail->addBCC($value);
	}*/

	/*echo "<br> <b> unknownBatch </b> <br>";
	include("unknownBatch.php");

	foreach ($emails as $value) {
		echo $value.'<br>';
		$mail->addBCC($value);
	}*/

	// $mail->addBcc('ramanareddysane@gmail.com','Ram');

	// $mail->msgHTML(file_get_contents("snr.php"));
	$mail->msgHTML(file_get_contents("final.html"));

	// $mail->Body = "Hi! \n\n This is my first e-mail sent through PHPMailer.";

	$mail->AltBody = 'This is an invitation for Pixel 2k16 - Dept of CSE, JNTU Anantapur';
	echo "Sending.... <br>";


	if(!$mail->send())
		echo '<span style="color:red;">Not send: </span>'. $mail->ErrorInfo;
	else
		echo "<span style='color:green'>Message Sent </span> <br>";


?>