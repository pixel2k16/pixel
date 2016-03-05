<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LeaderBoard</title>

<script type="text/javascript">
if (localStorage.pagecount)
  {
  localStorage.pagecount=Number(localStorage.pagecount) +1;
  }
else
  {
  localStorage.pagecount=1;
  }
document.write("Page Hits "+ localStorage.pagecount + ".");
</script>

<style>
.st
{
	font-size:60px; 
	color:white;
	/*padding:20px;*/
	text-align:center;
}
</style>
</head>
<body>
<?php
require_once('conf/mysql_init.php');

$result = mysql_query("select firstname,id,count,date,time from PIXEL_REGISTRATION order by count desc,date asc,time",$con);
$rank=0;
//echo "<h1 class='st'>Pragna LeaderBoard</h1>";
echo "<table cellspacing='0px' border='3px' bordercolor='white' align='center' >";
echo "<tr bgcolor='#A7C942'>";
echo "<th align='center' style='padding:2px 50px 2px 50px'> RANK </th>";
echo "<th align='center' style='padding:2px 50px 2px 50px'>NAME</th>";

echo "<th align='center' style='padding:2px 50px 2px 50px'>LEVEL COMPLETED</th>";
echo "<th align='center' style='padding:2px 50px 2px 50px' colspan='2'>COMPLETED LEVEL ON</th>";
echo "</tr>";

while($row=mysql_fetch_array($result))
{
	$rank++;
	if($rank%2==0)
	{
	echo "<tr bgcolor='EAF2D3'>";
	echo "<td align='center'>".$rank."</td>";
	echo "<td align='center'>".$row['firstname']."</td>";

	echo "<td align='center'>".$row['count']."</td>";
	echo "<td align='center'>".$row['date']."</td>";
	echo "<td align='center'>".$row['time']."</td>";
	echo "</tr>";
	}
	else
	{
	echo "<tr bgcolor='#FFC'>";
	echo "<td align='center'>".$rank."</td>";
	echo "<td align='center'>".$row['firstname']."</td>";

	echo "<td align='center'>".$row['count']."</td>";
	echo "<td align='center'>".$row['date']."</td>";
	echo "<td align='center'>".$row['time']."</td>";
	echo "</tr>";
	}
}


echo "</table>";

?>