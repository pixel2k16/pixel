<?php 

session_start();
require_once('conf/mysql_init.php');
$userid=$_SESSION['userid'];
$result=mysql_query("select * from PIXEL_REGISTRATION where ID ='$userid'",$con);
while($row=mysql_fetch_array($result))
{
	if(($row['ID']==$userid))
	{echo $userid;
	echo $level=$row['COUNT'];
	}
}
if(($_SESSION['userid']=="")||($level!=0))
{
head(0);
exit;

}
else
{
/*echo "<br><br><br><br><br><p align='center' 'margin-left:950px'><b><a href='logout.php'>Logout</a></b></p>";*/
?>
<html>
<head>
<title>MeDhA</title>
</head>
<body background="images/bg.png">
<script language=JavaScript>
<!--
//Disable right mouse click Script

var message="Function Disabled!";

///////////////////////////////////
function clickIE4(){
if (event.button==2){
alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("return false")

// --> 

</script>
<img src="images/medha.PNG" width="500" height="200" style="position:absolute; left: 42px; top: 4px;" alt="medha">
<form action="fs.php" method="post"><br>
<p style="position:absolute; font-size:36px; top:316px; left:89px; color:#FFF; width: 655px;">what is a cat. what has 3 kittens. What is the mother's name? </p>

 <z style="position:absolute; top:481px; left:660px;"> <T style=" color:#999"></T><input type="text" value="" name="answer"  /> <br> 
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type="submit" name="submit" value="SUBMIT" /></center></z>
<p style="position: absolute ; right: 50px; top:200px;"> 
<img src="images/style.gif" height="144" width="170"  /><br />
<img src="images/level1.png" width="172"  /></p>

<div style="position: absolute; right: 80px; top:381px; background: #333"> <a href="https://www.facebook.com/notes/mrchanakya/pragna-level-1-discussion-forum/214035128732808" target="_blank"style="position:absolute; left: -140px; top: 18px; font-size:20px; color:#FFFFFF; width: 155px;">Discussion forum</a><br>
<a href="led.php" target="_blank" style="position:absolute; left: -140px; top: 50px; font-size:20px; color:#FFFFFF; width: 155px;">Leader Board</a>
<a href="logout.php" style="position:absolute; left: -143px; top: -212px; font-size:20px; color:#FFFFFF">Logout</a>
</div>
</form>
</body>
</html>
<?php
}
///////////////////if the answer is submitted by buddy///////////////////
if(isset($_POST['answer'])){		
	$answer1=$_POST['answer'];
	if($answer1=="what")
	{
	$count=1;
	$name=$_SESSION['name'];
	$dateon=date("d-m-y");
	$timeon=idate("H").":".idate("i").":".idate("s");
	mysql_query("update PIXEL_REGISTRATION set COUNT='$count',TIME='$timeon',DATE='$dateon' where ID='$userid'",$con);
	
	//echo "<p align='center'>your answer is correct.<br/><a href='q2.php'><input type='button' name='button' value='goto next question' /></a></p>";
	head(1);
	}
}else{
	
	} 
	function head($addr){
	switch($addr){
		case 0:header("location:processlogin.php");
		break;
		case 1:echo '<script language="javascript">
		window.location="sd.php";
		</script>';
		break;
	    }
	}

?>