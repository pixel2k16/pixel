<?php
	session_start();
	require_once('conf/mysql_init.php');
	$table = $_POST['table'];
	if(isset($_SESSION['pixelid'])){
		$pid = $_SESSION['pixelid'];
		$query = "insert into $table(pid) values('$pid')";
		
		$exists = mysql_query("select * from $table where pid = '$pid'");
		if(mysql_num_rows($exists) == 1){
			echo "exists";
		}else{
			if(mysql_query($query,$con))
				echo "yes";
			else 
				echo "no";// mysql_error($con);
		}
		
	}else {
		echo "login";
	}
	?>