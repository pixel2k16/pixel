<?php
require_once("conf/config.inc.php");
$con = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
if(!$con)
{
        die("Server Down".mysql_error());
}
$db_select=mysql_select_db(DB_DATABASE,$con);
if(!$db_select)
{
die("database selction failed: ".mysql_error());
}

?>