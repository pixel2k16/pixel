<?php 
	session_start();
	require_once('conf/mysql_init.php');
	if(isset($_POST['level']) && isset($_SESSION['pixelid']) ) {
		 $level = $_POST['level'];
		 $pid = $_SESSION['pixelid'];

		$result = mysql_query("select * from engctst where pid = '$pid'");
		if(!$result || (mysql_num_rows($result) !=1)){ echo "error"; exit(0);}
		if(mysql_num_rows($result) == 1){
			while ($row = mysql_fetch_assoc($result)) {
				$levelfromdb = $row['pixlevel'];
			} // End of while
			if($levelfromdb != $level){ echo "error"; exit(0);}
			// Update ie increase level in engctst table
			$new_level = $level + 1 ;
			$updated = mysql_query("update engctst set pixlevel='$new_level' where pid = '$pid'");
			if(!$updated){ echo "error"; exit(0); }
			//Level is updated successfully 
			echo "updated";
		}
	}
?>