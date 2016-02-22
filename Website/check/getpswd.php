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

		$flag=0;
		$note=0;
		$subject="Retreival of password";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$headers .= 'From: <support@pixelcse.org>' . "\r\n";

		$result=mysql_query("select * from registered where pixelid='$pixelid' OR mailid='$pixelid'",$con);
		while($row=mysql_fetch_array($result)){
			if(mysql_num_rows($result)==0){
				$note=1;
			}
			else {
				$username = $row['firstname'];
				$email = $row['mailid'];
				$password = $row['password'];
				$pixelid = $row['pixelid'];
				$flag=1;
				$body="The password for the requested user with userid  ".$pixelid."  is  ".$password;
			}
		}
	if($flag==1) {
		echo send_mail_pswd($username,$email,$pixelid,$password);
		// echo " Username: ".$username. " email:". $email." pixelid: ". $password ;
		$emailErr = "your password is sent to your mail so check ur mail and/or login to continue";
	}
	else{
	 if($note==1){
			$emailErr = "enter valid email id";
	  }else {
			$emailErr = "enter valid pixelid/emailid";
		  }
    }
}

// for sending mail
function send_mail_pswd($name , $email, $pixelid, $password){
      include("../register/phpmailer/PHPMailerAutoload.php");
      $mail = new PHPMailer;
      $mail->isSMTP();
      $mail->Host = 'mail.pixel2k16.in';
      $mail->Port = 587;
      $mail->SMTPAuth = true;
      // $mail->SMTPDebug = 2;

      $mail->Username = "pixelbc7"; // SMTP username
      $mail->Password = "Ramsurya58$$"; // SMTP password
      $webmaster_email = "coordinator@pixel2k16.in"; //Reply to this email ID
      $mail->From = "coordinator@pixel2k16.in";
      $mail->FromName = "Team Pixel";

      $mail->AddReplyTo($webmaster_email,"PIXEL2K16");
      $mail->WordWrap = 50; // set word wrap

      // $noimg = "http://avc.host-ed.me/pixel2k16seen.php?s=".$to."&sub=forgotpassword";
      $mail->IsHTML(true); // send as HTML
      $mail->Subject = "PIXEL - 2K16, Department of CSE - JNTUA College of Engineering, Ananthapuramu.";
      $mail->Body = "<pre style='font-size:1.3em; color:#000000; font-family: calibri; '> 
        Hello ".$name.",

          PIXEL - 2K16 CREDENTIALS:
                    
            <b>email :</b> ".$email."            
            <b>Pixel ID :</b> ".$pixelid."            
            <b>Password </b>: ".$password."

          <a href='http://pixel2k16.in' target='_blank'>http://pixel2k16.in</a> 

          With Regards,
          Pixel - 2K16.
      </pre>
       
        "; //HTML Body

      $mail->AltBody = "Registration details for PIXEL2K16"; //Text Body


      $mail->AddAddress($email,'');
      $msg = "";
      if(!$mail->Send())
      {
      $msg = "notsent";
      }
      else
      {
      $msg = "sent";
      }
      return $msg;
      }


?>