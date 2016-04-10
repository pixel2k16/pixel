<?php
	session_start();
	require_once('conf/mysql_init.php');
	$table = $_POST['table'];
	$pid = $_SESSION['pixelid'];

	$exists = mysql_query("select * from $table where pid = '$pid'");
	if(mysql_num_rows($exists) == 1){
		echo "exists";
	}else {
		echo "nope";
	}
?>