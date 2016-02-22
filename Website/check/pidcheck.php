<?php
	require_once('conf/mysql_init.php');

	$name = $_REQUEST['userid'];
	// echo $mail ."<br>";
	$q = "select pixelid from registered where pixelid = '$name'";
	// echo "$q";
	$result = mysql_query($q,$con);
	echo mysql_num_rows($result);
?>
