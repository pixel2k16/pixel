<?php
if(!empty($_POST['pixelid'])  && !empty($_POST['password'])){

    $myconn= new mysqli("localhost","root","","pixelbc7_test");

      if($myconn->connect_errno){
        die("connection error");
      }

      $mysel = $myconn->query("select * from registered where pixelid='".$_POST['pixelid']."'; ");

      if($mysel->num_rows>0){
        while($row = $mysel->fetch_assoc()){
          $pixelid = $row["pixelid"];
          $password = $row["password"];
          $name=$row["firstname"];

        }

      if($_POST['pixelid']==$pixelid && $_POST['password']==$password){
        session_start();
        $_SESSION['pixelid']=$pixelid;
        $_SESSION['usrname']=$name;

        echo $_SESSION['pixelid'];
        echo "success";
		header('Location: homelogged.php');


      }
	  	else{
		?><span style="color:red;text-transform:capitalize;"><center>!Invalid details</center></span>
	   <?php

	  }
	}
      else {
    	?>
	   <span style="color:red;text-transform:capitalize;"><center>!Invalid details</center></span>
	   <?php

      }

}

else{
 ?>
  <span style="color:red;text-transform:capitalize;"><center>!Fields could not be empty</center></span>
<?php
}
?>
