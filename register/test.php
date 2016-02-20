<?php


  $myconn= new mysqli("localhost","pixelbc7","Ramsurya58$$","pixelbc7_test");

      if($myconn->connect_errno){
        die("connection error");
      }
 	$mysql = $myconn->query("insert into test_16 values('user','email','email','email','email','email','email')");
           

?>