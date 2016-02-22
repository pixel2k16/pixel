<?php


  $myconn= new mysqli("localhost","root","","pixelbc7_pixel");

      if($myconn->connect_errno){
        die("connection error");
      }

      $mysel = $myconn->query("select * from registered where mailid='".$_POST['email']."'; ");
      if($mysel->num_rows>0)
      {
	  ?>
	<span style="color:red"><center>!Email-id already exists</center></span>
	  <?php
      }



?>
