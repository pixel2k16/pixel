<!DOCTYPE html>
<?php
session_start();
// create connection.
require_once('conf/mysql_init.php');
$flag=0;
////////////////////// if being logged_in////////////////////////////////////////////			
if(isset($_SESSION['userid'])&&isset($_SESSION['firstname'])&&isset($_SESSION['level'])){
	$flag=2;  // user coming from page url
	
	$level=$_SESSION['level'];
	$userid=$_SESSION['userid'];// pixel id
	$firstname=$_SESSION['firstname'];
} else if(isset($_POST['pixelid']) && isset($_POST['pwd'])){
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
	echo "My friend".$firstname."<br/><br/>";
	}
}else{
	header("location:location.php");
}
if($flag==1){
$_SESSION['userid']=$userid;// pixel id
$_SESSION['firstname']=$firstname;
$_SESSION['level']=$level;
}
if($flag==1||$flag==2){
switch($level)
{
case 0: 
$try="aas.php";
$lev="LEVEL 1";
break;
case 1: 
$try="cham.php";
$lev="LEVEL 2";
break;
case 2: 
$try="erl.php";
$lev="LEVEL 3"; 
break;
case 3:
$try="gak.php";
$lev="LEVEL 4"; 
break;
case 4:
$try="irg.php";
$lev="LEVEL 5"; 
break;
case 5:
$try="kkr.php";
$lev="LEVEL 6";
break;
case 6:
$try="mad.php";
$lev="LEVEL 7";
break;
case 7:
$try="one.php";
$lev="LEVEL 8";
break;
case 8:
$try="qrc.php";
$lev="LEVEL 9";
break;
case 9:
$try="sp.php";
$lev="LEVEL 10";
break;
case 10:
$try="tha.php";
$lev="LEVEL 11";
break;
case 11:
$try="rsz.php";
$lev="LEVEL 12";
break;
case 12:
$try="pit.php";
$lev="LEVEL 13";
break;
case 13:
$try="nay.php";
$lev="LEVEL 14";
break;
case 14:
$try="lan.php";
$lev="LEVEL 15";
break;
case 15:
$try="jrb.php";
$lev="LEVEL 16";
break;
case 16:
$try="hi5.php";
$lev="LEVEL 17";
break;
case 17:
$try="fb.php";
$lev="LEVEL 18";
break;
case 18:
$try="daf.php";
$lev="LEVEL 19";
break;
case 19:
$try="bhoo.php";
$lev="LEVEL 20";
break;
case 20:
$try="xxx.php";
break;
default:
break;
}

?>

<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Online | Events</title>
		
		<meta name="keywords" content="pixel, jntua, anantapur, techfest, 2014" />
		
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/demo2.css" />
		<link rel="stylesheet" type="text/css" href="css/component2.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<div id="splitlayout" class="splitlayout">
				<div class="intro">
					<div class="side side-left">
						
						<div class="intro-content">
							<div class="profile"><img src="img/profile1.jpg" alt="profile1"></div>
							<h1><span>Code Kshetra </span><span>Online Coding</span></h1>
							<a class ="enter" style="background: #fff; color: #1ABC9C;"href="codekshetra.php">Enter</a>
						</div>
						<div class="overlay"></div>
					</div>
					<div class="side side-right">
						<div class="intro-content">
							<div class="profile"><img src="img/profile2.jpg" alt="profile2"></div>
							<h1><span>Riddle Fiddle </span><span>Online Quiz</span></h1>
							<a class="enter" href="#f<?php echo $try; ?>">Enter</a>
						</div>
						<div class="overlay"></div>
					</div>
				</div><!-- /intro -->
				<div class="page page-right">
					<div class="page-inner">
						<section>
							<h2>Mr.Riddler is always watching you</h2>
							<p>Admin never goes wrong.</p>
						</section>
						<section>
							<h2>Google is just your Dr.Watson.</h2>
							<p>So is any other website, book, or whatever.You have to be the Sherlock here.</p>
						</section><section>
							<h2>Don't waste time trying to hack.</h2>
							<p>The person who reveals the answers in discussion board won't be rewarded and might be banned.<br/> Be a gentleman.</p>
						</section>
						<section>
							<h2>One player from all Contestants.</h2>
							<p>Who tops the leaderboard on 24th March 2014 or the first one to crack all Levels</p>
						</section>
						<section>
							<h2>Writing the Right Answer in the Right Way </h2>
							<p>While typing the answers, always use lowercase letters, without spaces &amp; Symbols.</p>
							<p> Ex: if ans is Pixel 14 CSE<br>
							    Enter : pixel14cse
							</p>
						</section>
						
						<section>
							<h2>Clues are Very Precious</h2>
							<p>Clues for the levels may be found in page source, URL, cookies or Follow us in the Facebookpage ... https://www.facebook.com/Riddler.Pixel</p>
						</section>

						
					</div><!-- /page-inner -->
				</div><!-- /page-right -->
				<div class="page page-left">
					<div class="page-inner">
						
						<section>
							<h2>Description</h2>
							<p>CodeKshetra is an online coding contest for the programmers who zeal to face the new challenges. </p>
							<p>The event will be started soon....</p>
							<p>Allowed coding languages are C, C++,JAVA </p>
							<p>Everyday a question will be posted at 7:00 pm  </p>
							<p>You need to submit the answer before 7 pm of the next day after which the submissions will be closed for that particular question</p>
							<p>You can submit your answer more than once for a question but the most recently sent solution sent before 7 pm of the next day will be considered for evaluation</p>
							<p>Your answers will be evaluated and the results will be updated on the leaderboard after 10:00 am Only. </p><p>
the points awarded will be based on the number of the test cases passed by your solution( 3 given testcases and 7 testcases on server side).</p>
<p>Winner is the one who tops the leaderboard till last day of contest...</p>
<p>Happy coding ☻</p>
						</section>
					</div><!-- /page-inner -->
				</div><!-- /page-left -->
				<a href="#" class="back back-right" title="back to intro">&rarr;</a>
				<a href="#" class="back back-left" title="back to intro">&larr;</a>
			</div><!-- /splitlayout -->
		</div><!-- /container -->
		<script src="js/classie.js"></script>
		<script src="js/cbpSplitLayout.js"></script>
	</body>
</html>
<?php }else{
echo "<html><body BGCOLOR='#1abc9c'><br><br><br><br><br><br><br><br><br>";
echo "<z style=' color:white'><strong style='font-size:20px'><center><em style='font-size:25px'>". $userid ."</em>&nbsp;&nbsp;&nbsp; authentication failed <br>Please enter a valid PIXELID and password</center></strong></z>";
echo "<z style=' color: white'><br><strong style='font-size:20px'><center> Please check the values you have entered </center></strong></z>";
echo "<z style=' color: white' size:'20px'><br><br><center><a href='loginform.php' style='font-size:20px; color:white'>click here </a> for <em style='font-size:24px;color:white'> Relogin</em></center></z></body></html>";
}

?>