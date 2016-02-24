<?php
if(!empty($_POST['pixelid'])  && !empty($_POST['password'])){

    // $myconn= new mysqli("localhost","root","","pixelbc7_pixel");
    $myconn= new mysqli("localhost","pixelbc7","Ramsurya58$$","pixelbc7_pixel");

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

      if(strcasecmp($_POST['pixelid'],$pixelid) == 0 && strcasecmp($_POST['password'],$password) == 0){
        session_start();
        $_SESSION['pixelid']=$pixelid;
        $_SESSION['usrname']=ucfirst(strtolower($name));

        // echo $_SESSION['pixelid'];
        echo "success";
    // header('Location: homelogged.php');
      }
      else{
        echo "Invalid details";
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
