<?php
	session_start();
	require_once('conf/mysql_init.php');
	$table = $_POST['table'];
	$pid = $_SESSION['pixelid'];

	$query = "insert into $table values()"

	mysql_query("")	

?>