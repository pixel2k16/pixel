<?php 
	session_start();
	require_once('conf/mysql_init.php');
	if(isset($_POST['answer'])) {
		$answer =  $_POST['answer'];
		$pid = $_POST['pid'];
		$level = $_POST['level'];
		$result = mysql_query("select ans from images where pixlevel = '$level'");
		if(!$result || (mysql_num_rows($result) != 1) ){ echo "error"; exit(0); }
		while ($row = mysql_fetch_assoc($result)) {
			$hash = $row['ans'];
			if(strcmp(md5($answer), $hash) == 0) 
				echo "equal";
			else
				echo "notequal";
		}

	}
?>