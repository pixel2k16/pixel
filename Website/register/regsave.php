<?php

if(!empty($_POST['username']) && !empty($_POST['emailid'])&& !empty($_POST['pass1'])&& !empty($_POST['pass2']) && !empty($_POST['contactno']) && !empty($_POST['colgname']) ){
  if($_POST['pass1']==$_POST['pass2'])
  {
  $myconn= new mysqli("localhost","root","","pixel_test");

      if($myconn->connect_errno){
        die("connection error");
      }
      if (!filter_var($_POST['emailid'], FILTER_VALIDATE_EMAIL)) {
        ?>
			  <span style="color:red"><center>!Invalid EmailID</center></span><?php
			}
      else {
          $mysel = $myconn->query("select * from test_16 where mailid='".$_POST['emailid']."'; ");
          if($mysel->num_rows>0) {
              echo "!Email-id already exists";
          } else {
              $mysel = $myconn->query("select count( * ) as TOT FROM test_16");
              if($mysel->num_rows>0){
                while($row = $mysel->fetch_assoc()){
                  $tot=$row['TOT'];
                }
                // echo "$tot";
              }
           		else{
           			$tot = 1;
           		}
              $pixelid="PID".str_pad($tot+1, 3, "0", STR_PAD_LEFT);
             $quer = "insert into test_16 VALUES('".$_POST['username']."','$pixelid','".$_POST['pass1']."','".$_POST['emailid']."','".$_POST['contactno']."','".$_POST['colgname']."','0');";
                // echo "$quer";
                $mysql = $myconn->query($quer);
                if($mysql == true){
                  session_start();
                  $_SESSION['emailid']=$_POST['emailid'];
                  $_SESSION['usrname']=$_POST['username'];
                  $_SESSION['pixelid']=$pixelid;

                  $mail_status = send_mail($_POST['username'], $_POST['emailid'], $pixelid, $_POST['pass1']);

                    if($mail_status == "sent"){
                      echo "yess";
                    }else if($mail_status == "notsent"){
                      echo "yesn";
                    }

                  // echo $_SESSION['emailid'].$_SESSION['usrname'].$_SESSION['pixelid'];
                }else {
                  echo "no";
                }
          }
      }
}
else 
  echo "!Passwords didnot match";
}
else
  echo "!Fields could not be empty";

// function to send email 
function send_mail($name , $email, $pixelid, $password){
      include("phpmailer/PHPMailerAutoload.php");
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

          Thanks for registering for PIXEL2K16. We will be in touch.

          PIXEL - 2K16 CREDENTIALS:
                    
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
