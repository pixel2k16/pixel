<html>
<head>
<style>
.font
{
	color:#F00;
}

</style>
</head>
<?php
session_start();
// create connection.
require_once('conf/mysql_init.php');
$flag=0;
////////////////////// if being logged_in////////////////////////////////////////////			
if(isset($_SESSION['userid'])&&isset($_SESSION['firstname'])&&isset($_SESSION['level'])){
	$userid=$_SESSION['userid'];// pixel id
	$firstname=$_SESSION['firstname'];
	$level=$_SESSION['level'];
	$flag=2;
}else if(isset($_POST['pixelid']) && isset($_POST['pwd'])){
	$userid = strtoupper(clean($_POST['pixelid']));
	$password = clean($_POST['pwd']);
	$result = mysql_query("select * from pixel_registration where ID = '$userid' and (PWORD = '$password')",$con);
	$flag=false;
	while($row=mysql_fetch_array($result))
	{
		if(($row['ID']==$userid)&&($row['PWORD']==$password))
		{
		$firstname = $row['FIRSTNAME'];	
		$flag=1;
		$level = $row['COUNT'];
		}
	}
	if(!$result)
	{
	die("Database query failed:".mysql_error());
	echo "My friend".$name."<br/><br/>";
	}
}else{header("location:index.php");
}
///////////////// buddy recognized//////////////////////////////

if($flag==1){
$_SESSION['userid']=$userid;// pixel id
$_SESSION['firstname']=$firstname;
$_SESSION['level']=$level;
}
if($flag==1||$flag==2){
echo "<body background='images/bg.png' style='width:100%; height:100%;overflow: scroll'><br><br>";
echo "<br><p align='center' style='margin-left:950px '><b><a href='logout.php' style='color:white;'>Logout</a></b></p>";
echo "<z style=' color: white;'><br><br><center><em style='font-size:24px;#230700'>Welcome ".$firstname."(".$_SESSION['userid'].")</em><br><br><br><strong style='font-size:21px'>You are suceessfully logged into Online Events<br><br></z>";
echo "<h1>We will Riddle you Online soon...<h1>";


switch($level)
{
case 0: 
$try="fs.php";
$lev="LEVEL 1";
break;
case 1: 
$try="sd.php";
$lev="LEVEL 2";
break;
case 2: 
$try="tr.php";
$lev="LEVEL 3"; 
break;
case 3:
$try="fr.php";
$lev="LEVEL 4"; 
break;
case 4:
$try="ff.php";
$lev="LEVEL 5"; 
break;
case 5:
$try="sx.php";
$lev="LEVEL 6";
break;
case 6:
$try="st.php";
$lev="LEVEL 7";
break;
case 7:
$try="et.php";
$lev="LEVEL 8";
break;
case 8:
$try="nt.php";
$lev="LEVEL 9";
break;
case 9:
$try="tt.php";
$lev="LEVEL 10";
break;
case 10:
$try="el.php";
$lev="LEVEL 11";
break;
case 11:
$try="tw.php";
$lev="LEVEL 12";
break;
case 12:
$try="thr.php";
$lev="LEVEL 13";
break;
case 13:
$try="frt.php";
$lev="LEVEL 14";
break;
case 14:
$try="fif.php";
$lev="LEVEL 15";
break;
case 15:
$try="sxt.php";
$lev="LEVEL 16";
break;
case 16:
$try="seventeenth.php";
$lev="LEVEL 17";
break;
case 17:
$try="eighteenth.php";
$lev="LEVEL 18";
break;
case 18:
$try="nineteenth.php";
$lev="LEVEL 19";
break;
case 19:
$try="twentyth.php";
$lev="LEVEL 20";
break;
case 20:
$try="congrats.php";
break;
default:
break;
}


echo "</center>";

}
if($flag==0)
{
echo "<body background='images/bg.png'><br><br><br><br><br><br><br><br><br>";
echo "<z style=' color:white'><strong style='font-size:20px'><center><em style='font-size:25px'>". $userid ."</em>&nbsp;&nbsp;&nbsp; authentication failed <br>Please enter a valid PIXELID and password</center></strong></z>";
echo "<z style=' color: white'><br><strong style='font-size:20px'><center> Please check the values you have entered </center></strong></z>";
echo "<z style=' color: white' size:'20px'><br><br><center><a href='loginform.php' style='font-size:20px; color:white'>click here </a> for <em style='font-size:24px;color:white'> Relogin</em></center></z>";
}
?>
</html>
