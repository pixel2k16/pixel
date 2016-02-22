<?php
	require_once('conf/mysql_init.php');

	$mail = $_REQUEST['email'];
	// echo $mail ."<br>";
	$q = "select mailid from registered where mailid = '$mail'";
	// echo "$q";
	$result = mysql_query($q,$con);
	echo mysql_num_rows($result);
?>
