<?php
require_once('conf/mysql_init.php');

$result = mysql_query("select firstname,id, college, department from pixel_registration order by id",$con);

echo "<table cellspacing='0px' border='3px' bordercolor='white' align='center' >";
echo "<tr bgcolor='#A7C942'>";
echo "<th align='center' style='padding:2px 50px 2px 50px'> FirstName </th>";
echo "<th align='center' style='padding:2px 50px 2px 50px'>ID</th>";

echo "<th align='center' style='padding:2px 50px 2px 50px'>College</th>";
echo "<th align='center' style='padding:2px 50px 2px 50px' colspan='2'>Department</th>";
echo "</tr>";
$rank=0;
while($row=mysql_fetch_array($result))
{
	$rank++;
	if($rank%2==0)
	{
	echo "<tr bgcolor='EAF2D3'>";
	
	echo "<td align='center'>".$row['firstname']."</td>";

	echo "<td align='center'>".$row['id']."</td>";
	echo "<td align='center'>".strtoupper($row['college'])."</td>";
	echo "<td align='center'>".$row['department']."</td>";
	echo "</tr>";
	}
	else
	{
	echo "<tr bgcolor='#FFC'>";
	echo "<td align='center'>".$row['firstname']."</td>";

	echo "<td align='center'>".$row['id']."</td>";
	echo "<td align='center'>".strtoupper($row['college'])."</td>";
	echo "<td align='center'>".$row['department']."</td>";
	echo "</tr>";
	}
}


echo "</table>";
?>