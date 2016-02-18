

<?php
require_once('conf/mysql_init.php');

$pass1 = $_REQUEST['password'];
$pass2 = $_REQUEST['repwd'];
if("$pass1"=="$pass2")
{
  $result2= "1";
}
else {
  $result2= "0";
}
echo $result2;
?>
