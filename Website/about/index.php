<script type="text/javascript">
	var asec, secid;
</script>
<?php
	if (isset($_POST['sec'])){
	$which = $_POST['sec'];
	?>
		<script type="text/javascript">
			 secid = <?php echo "'$which'"; ?>;
			 asec = "a[href='"+secid+"']";
		</script>
	<?php
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Pixel 2k16 | About</title>
		<link rel="icon" type="image/png" href="img/favi.png" />
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="about.css" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	</head>
	<body style="font-family:'raleway','sans'" class="about-body">
			<nav>
				<img class="pilogo wow fadeInDown" data-wow-delay="1s" src="pixel.png" />
				<h2>About</h2>
				<ul>
					<li><a href="#dept">Department</a></li>
					<li><a href="#pixel">Pixel</a></li>
					<li><a href="#col">College</a></li>
				</ul>			
			</nav>
		</header>
		<div id="wrapper">
			<section class="about" id="col">
				<!-- <h3>About Pixel</h3> -->
				<p>
					JNTUA College of Engineering, Ananthapuramu stands aloft on a solid foundation of past glory and prestige. This college was started in the year 1946, under the post war reconstruction program and functioned at Guindy campus, Madras for two years and was shifted to Anantapur in 1948. It was in the year 1958 that the college was shifted to the present permanent buildings accommodating the Administrative block, Laboratories, the Engineering Departments, Library and the Hostel blocks. During the first 25 years of its existence, it was affiliated to the Madras and S V University and produced distinguished alumni, who are holding high positions, in India and abroad. It has great tradition to be proud of. Fortified with traditional values and dedicated spirit of the staff and the students, it would rise up to any occasion or meet any challenge confidently.
				</p>
				<p>
					The college became a constituent college of the formed Jawaharlal Nehru Technological University, Hyderabad in 1972 and presently it is a constituent college of newly formed JNT University Anantapur, Anantapur since August 2008. This college has vast campus sprawling over an area of 185 acres, in a peaceful atmosphere, away from the dust and din of the town. With this a new era was ushered in Technical Education. Consequently there was an impetus to the academic activity of this college. Thought the College was initially established to provide basic technical education, with the passage of time, it emerged out, as one of the colleges to fulfill the technical need of our fast developing India with highly professional and well trained graduates.
				</p>
			</section>

			<section class="about" id="pixel">
				<!-- <h3>About Pixel</h3> -->
				<p>
					<span class="special">Pixel</span> is a National Level Technical Symposium for undergrads and postgrads organised by Department of Computer Science and Engineering, JNTUA College of Engineering, Ananthapuramu. Since its inception in 2005, Pixel has been innovating itself at each and every edition and now we are very proud to say that we are at the tenth one.
				</p>
				<p>
					The Symposium serves as a platform in tapping the immense potential, and unleashing the genius of students across the country by which unparalleled communication skills and public speaking comes to them with ease. The fest is a high profile event which will lure the students from all the colleges in and around the state to unleash and showcase their all-round expertise by competing emulously on a large scale that paves a way for all-round development of a budding professional.
				</p>
			</section>

			<section class="about" id="dept">
				<!-- <h3>About Pixel</h3> -->
				<p>
					The department of Computer Science Engineering has started offering B.Tech programme since 1989 with an intake of 15 students. The present intake for the Bachelor’s course is 60 and is accredited by NBA. For the last two decades the department has an enormous growth in student strength, infrastructure facilities number of courses being offered. Currently, The department is offering B.Tech, M.C.A, and three M.Tech programmes. M.C.A was started in the year 1996 with an intake of 30 and now it has been increased to 60. M.Tech in Computer Science was started in 2000, M.Tech in Software Engineering in 2001 and M.Tech in Artificial Intelligence in 2011. The intake to all these programmes is 25. The department is also having state of the art facilities for carrying out research Department is equipped with three laboratories, One lab is dedicated for B.Tech students, one for Master’s programmes, and one lab for the research to carry out their research.
				</p>
				<p>
					The research lab is unique in the department with Sun Solaris systems i and a high and server. Apart from this, The department maintains a central computing center with over 200 systems where, The 1st year students of all the branches are accessing Computing facilities within and beyond working hours. The entire campus is networked with 1 Gbps internet connectivity so as to enable the students to browse the internet. The department also possesses a library with over 1300 text books, 10 journals and around 45 e-learning resources. The department possesses two sponsored projects.
 
					(1)UGC-MRP – Cloud Computing framework for rural health care in Indian scenario.
					(2)AICTE-RPS – Secure and Usable Authentication to Common People in Secure Systems.
				</p>
			</section>
			<!-- <footer>
				<a href="http://twitter.com/nickrp"><img src="img/twitter-wrap.png" alt="twitter logo" class="social-icon"></a>
				<a href="http://facebook.com/suryatejaparnam"><img src="img/facebook-wrap.png" alt="facebook logo" class="social-icon"></a>
				<address>&copy; 2016 | Surya Teja.</address>
			</footer> -->
		</div>
	</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){

		$("a[href='#pixel']").addClass("selected");
		$("#pixel").show();

		if(asec != undefined){
			$("a").removeClass("selected");
			$(asec).addClass("selected");
			$(secid).fadeIn();
		}

		$("a").click(function(event){
			event.preventDefault();
			// alert(this.hash);
			$("a").removeClass();
			$(this).addClass("selected");
			$(".about").hide();
			$(this.hash).fadeIn();
		});
	});
</script>