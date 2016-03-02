<?php
	session_start();
	require_once('conf/mysql_init.php');
	$pid = $_SESSION['pixelid'];

	$exists = mysql_query("select * from hospitality where pid = '$pid'");
	if(mysql_num_rows($exists) == 1){
		echo "exists";
	}else {
		echo "nope";
	}
?>