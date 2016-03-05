<?php

session_start();
if( isset($_SESSION['userid']) && empty($_POST['userid'])){
	$user=$_SESSION['userid'];
	if(isset($_POST['codefile']) && !empty($_POST['codefile']) && isset($_POST['day']) && !empty($_POST['day']) && isset($_POST['ctype']) && !empty($_POST['ctype'])){
		$ctype=$_POST['ctype'];
		$day=$_POST['day'];
		$code=($_POST['codefile']);
		$code=str_replace("@@",">>",$code);
		$handle=fopen('KRISPPP130570145NEC/day'.$day.'/'.$user.$ctype,'w');
		fwrite($handle,$code);
		fclose($handle);
		echo "<center><z style='color:#1abc9c'>Your answer is been successfully recieved...<br>To do manipulation to Program, You can just submit the new code in place of previous....</z><br/>";
		echo "<a href='codekshetra!.php' style=\" border: none; padding: 0.6em 1.2em; background: #1ABC9C; color: #fff; text-decoration:none; font-family: 'Lato', Calibri, Arial, sans-serif; font-size: 1em; letter-spacing: 1px; text-transform: uppercase; cursor: pointer; display: inline-block; margin: 3px 2px; border-radius: 2px;\">CodeKshetra</a><br/>";
		echo "<a href='processlogin.php' style=\" border: none; padding: 0.6em 1.2em; background: #1ABC9C; color: #fff; text-decoration:none; font-family: 'Lato', Calibri, Arial, sans-serif; font-size: 1em; letter-spacing: 1px; text-transform: uppercase; cursor: pointer; display: inline-block; margin: 3px 2px; border-radius: 2px;\">Online Events</a></center>";
	}else{
		echo "in wrong direction";
	}
}else{
	header('location: loginform.php');
}

?>