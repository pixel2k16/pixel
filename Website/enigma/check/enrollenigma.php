<?php 
	session_start();
	require_once('conf/mysql_init.php');
	if( isset($_POST['user']) && isset($_SESSION['pixelid'])){
		$pid = $_SESSION['pixelid'];
		$is_inserted = mysql_query("insert into engctst (pid) values('$pid')");
		if($is_inserted)
			echo "enrolled";
		else
			echo "error";
	}
?>