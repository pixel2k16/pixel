<?php
require_once("conf/config.inc.php");
$con = mysql_connect('localhost','root','');
if(!$con)
{
        die("Server Down".mysql_error());
}
$db_select=mysql_select_db('pixel_test',$con);
if(!$db_select)
{
die("database selction failed: ".mysql_error());
}

?>