<?php
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'pixel_test');
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}

	function send_mail($first,$email,$id) {
	$name = addslashes($first);
	$tomail = $email;
	$from_mail = "support@pixelcse.org";
	$subject = "PIXEL REGISTRATION";
	$body = "Hello ".$name.",<br /><br />"
                ."Thank you for registering at PIXEL 2014. <br /><br />"
                ."PIXEL ID: ".$id."<br /> <br />"
                ."You may now login at http://www.pixelcse.org/ using the above PIXEL ID and the Password which you entered in your registration form. Your password has not been sent in this mail due to security reasons. Please keep this pixelID safe as it is useful to participate in online events as well as offline events <br /> <br />"
                ."Follow us on facebook : http://www.facebook.com/pixelcsejntu";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= 'From: <'.$from_mail.'>' . "\r\n";

	mail($tomail, $subject, $body, $headers);
	}

?>
