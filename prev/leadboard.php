
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Participants</title>
		<meta name="description" content="participants of the pixel" />
		<meta name="keywords" content="jntua , pixel, riddle, fiddle, " />
		
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo1.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
	<?php
require_once('conf/mysql_init.php');
$rank=1;
$result = mysql_query("select firstname,id,count,date,time from pixel_registration order by count desc, date asc,time",$con);
?>
		<div class="container">
			
			<header>
				<h1> LeadBoard of <em>Riddle Fiddle</em></h1>	
				
			</header>
			<div class="component">
				
				<table>
					<thead>
						<tr>
							<th>Rank</th>
							<th>Pixelid</th>
							<th>Name</th>
							<th>Level</th>
							<th>Completed ON</th>
						</tr>
					</thead>
					<tbody>
					<?php while($row=mysql_fetch_array($result)){?>
						<tr><td class="user-name"><?php echo $rank++; ?></td><td class="user-email"><?php echo $row['id'];?></td><td class="user-phone"><?php echo $row['firstname'];?></td><td class="user-mobile"><?php echo $row['count'];?></td><td class="user-email"><?php echo $row['date']." &nbsp;&nbsp;&nbsp;  ".$row['time'];?></td></tr>
					<?php }?>
					</tbody>
				</table>
				
			</div>
		</div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
		<script src="js/jquery.stickyheader.js"></script>
	</body>
</html>