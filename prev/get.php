<?php
require_once('conf/mysql_init.php');

$result = mysql_query("select firstname,id, college, phone from pixel_registration order by id",$con);
while($row=mysql_fetch_array($result))
{ echo $row['phone']." ".$row['firstname']." ".$row['id']." ".$row['college']."<br>";
}
?>