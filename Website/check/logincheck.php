<?php
if(!empty($_POST['pixelid'])  && !empty($_POST['password'])){

    $myconn= new mysqli("localhost","root","","pixel_test");

      if($myconn->connect_errno){
        die("connection error");
      }

      $mysel = $myconn->query("select * from test_16 where pixelid='".$_POST['pixelid']."'; ");

      if($mysel->num_rows>0){
        while($row = $mysel->fetch_assoc()){
          $pixelid = $row["pixelid"];
          $password = $row["password"];
        }

      if((strcasecmp($_POST['pixelid'], $pixelid) == 0) && $_POST['password']==$password){
        session_start();
        $_SESSION['pixelid']=$pixelid;
        echo "success";
      }
	  	else{
	      echo "!Invalid details"; 
	  }
	}
  else {
    	echo "!Invalid details";
  }

}

else{
echo "!Fields could not be empty";
}
?>
