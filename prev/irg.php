<!DOCTYPE html>
<?php 
////////---------<<<< Four changes compulsary for the instance>>>>>----//////
session_start();
require_once('conf/mysql_init.php');
$userid=$_SESSION['userid'];
$result=mysql_query("select * from pixel_registration where ID ='$userid'",$con);
	while($row=mysql_fetch_array($result))
	{
		if(($row['ID']==$userid))
		{ $userid;
		 $level=$row['COUNT'];
		}
	}
if(($_SESSION['userid']=="")||($level!= 4)){////// 1>LEVEL NEED TO BE CHANGED/////if level 1 then write 0
head(0);
 exit;
}else{
/*echo "<br><br><br><br><br><p align='center' 'margin-left:950px'><b><a href='logout.php'>Logout</a></b></p>";*/
?>
<html>
<head>
	<title>Riddle | Fiddle</title>
	<style type="text/css">
	a{
	 
	 border: none;
	padding: 0.6em 1.2em;
	background: #1ABC9C;
	color: #fff;
	font-family: 'Lato', Calibri, Arial, sans-serif;
	font-size: 1em;
	letter-spacing: 1px;
	text-decoration:none;
	text-transform: uppercase;
	cursor: pointer;
	display: inline-block;
	margin: 3px 2px;
	border-radius: 2px;
	}
	.balloon{
	background: #fff;  
    border-radius: 20px;  
    -moz-border-radius: 20px;  
    -webkit-border-radius: 20px;  
     border:2px solid #1ABC9C;
    padding: 20px;  
    position: absolute; 
    left:200px; 
    font-size: 12px;  
    width: 360px;  
    height:500px;
    text-align: justify;  
    color: #3a3a3a;
	}
	.arrow{
	border-color: transparent #1ABC9C transparent transparent;  
    border-style: solid;  
    border-width: 20px;  
    display: block;  
    height: 0;  
    left: -40px;  
    position: absolute;  
    top: 30px;  
    width: 0; 
	}
	.balloon2{
	background: #fff;  
    border-radius: 20px;  
    -moz-border-radius: 20px;  
    -webkit-border-radius: 20px;  
     border:2px solid #1ABC9C;
    padding: 20px;  
    position: absolute; 
    right:180px; 
    top:450px;
    font-size: 12px;  
    width: 330px;  
    height:50px;
    text-align: justify;  
    color: #3a3a3a;
	}
	.arrow2{
	border-color: transparent  transparent transparent #1ABC9C;  
    border-style: solid;  
    border-width: 13px;  
    display: block;  
    height: 0;  
    right: -27px;  
    position: absolute;  
    top: 20px;  
    width: 0; 
	}
	
	</style>
</head>
<body>
<script language=JavaScript>

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



</script>
 <div class="nav" style="position:relative; left:80%;">
	<a href="leadboard.php" target= "_blank" >Leaderboard</a>
	<a href="#">Level <?php echo $level+1;?></a>
</div>
<div class="question" style="position:absolute; top:100px;">
<img src="img/riddler.png" style="float:left;">

<div class="balloon" >
	<div class="arrow" ></div>
	<img src="img/riddle/hell_5.jpg"/><!---change img--->

</div>
</div>

<div class="answer" style="position:relative; top:50%;">
	
<div class="balloon2" >
	<div class="arrow2" ></div>
    <form method="post" action="irg.php"><!---<<< 2 >>> change the action---->
	<input type="text" placeholder="your answer" name="answer" style="font-size:22px; line-height:40px;border:0px;" required> 
	<input type="submit" value="GO" style="width:60px; height:40px; border: none;
	padding: 0.6em 1.2em;
	background: #1ABC9C;
	color: #fff;
	font-family: 'Lato', Calibri, Arial, sans-serif;
	font-size: 1em;
	letter-spacing: 1px;
	text-transform: uppercase;
	cursor: pointer;
	display: inline-block;
	margin: 3px 2px;
	border-radius: 2px;">
</form>
</div>


<img src="img/answer.png" style="position:absolute; right:0px; top:400px; width:150px; height:174;">

</div>

</body>
</html>
<?php
}
///////////////////if the answer is submitted by buddy///////////////////
if(isset($_POST['answer'])){		
	$answer1=strtolower($_POST['answer']);
	if($answer1=="fastandfurious") /////////////// <<<<3>>>>CHANGE THE ANSWER FOR THE question
	{	
		$count=5;  
		$_SESSION['level']=5;	//////// change the count to relevant level
	$userid=$_SESSION['userid'];
	$dateon=date("d-m-y");
	$timeon=idate("H").":".idate("i").":".idate("s");
	mysql_query("update pixel_registration set COUNT='$count',TIME='$timeon',DATE='$dateon' where ID='$userid'",$con);
	
	
	head(1);
	}
}else{
	
	} 
	function head($addr){
	switch($addr){
		case 0:header("location:processlogin.php");
		break;
		case 1:echo '<script language="javascript">
		window.location="kkr.php";  
		</script>';    ////// ----<<<<<4>>>>>>page for the next questions------------		
		break;
	    }
	}

?>