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
	$mail->SMTPDebug = 0;

	// Used to display Debugging messages in friendly manner.	
	$mail->Debugoutput = 'html';

	/**
	* set smtp host, port, use encryption or not, etc..,
	* for host : Host value is 'smtp.xxxxex.com'
	* for port: Port and number is 587
	* to set encryption ssl or ttl: SMTPAuth value is 'ssl' or 'tls'
	* Whether to use SMTP authentication or not: SMTPAuth value is true or false
	*/
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;

	/**
	* Set user name and password.
	* Username:'user@acfd.com';
	* Password:'yoursecret';
	*/
	$mail->Username = 'email_id';
	$mail->Password = 'passwod for email_id';

	// Set this to true if you want to send html'
	$mail->isHTML(true);
	// Set From Address. Usually as username by using setFrom(p1,p2)
	//Method from PHPMailer 
	$mail->setFrom('From Email (Basicallly your email adderess)',' Your name');
	// Set Reply adderss by using addReplyTo
	$mail->addReplyTo('email, When clik reply button mail client','Name');
	//Set Recipient mail address
	$mail->addAddress('recipientMail','Recipient name');


	// Add mail main contents
	$mail->Subject = 'Subject of the mail';
	
	// if($mail->addEmbeddedImage("steve.jpg","steve"))
	// 	echo " steve Image Embeded <br>";
	// else
	// 	echo "Not Embedded";


	$mail->msgHTML(file_get_contents("your_file.html"));
	$mail->AltBody = 'Alternate text that displays besides Subject in Gmail like clie';
	echo "Sending.... <br>";
	if(!$mail->send()){
		echo "Not send: ". $mail->ErrorInfo;
	}else{
		echo "Message Sent";
	}	

?>