<!DOCTYPE html>
<html>

<head>
  <title>YourPageTitle</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
	<div class="about-wrapper wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="9.5s">
	<a href="#ppt" class="more">ppt</a>
	<a href="#poster" class="more">poster</a>
	<a href="#ppt" class="more">ppt</a>
	<a href="#poster" class="more">poster</a>
	<a href="#ppt" class="more">ppt</a>
	<a href="#poster" class="more">poster</a>
	<a href="#ppt" class="more">ppt</a>
	<a href="#poster" class="more">poster</a>
	<a href="#ppt" class="more">ppt</a>
</div>

<style type="text/css">
	/*For about Us section*/
	.about-wrapper{
		z-index: 1;
		position: absolute;
		left: 33%;
		top: 20%;
	}
	.more{
		outline: none;
		height: 100%;
		text-decoration: none;
		color: #fff;
		background: #1D293A;
		padding: 20px;
		font-family: 'Raleway','sans';
		display: inline-block;
		width: 150px;
		text-align: center;
		border-radius: 5px;
	}
</style>


<script type="text/javascript">
	$(document).ready(function(){

		$("a.more").click(function(event){
			event.preventDefault();
			// alert(this.hash);
			postwitheventname("index.php",this.hash);
		});

		function postwitheventname (to,eventname) {
		  var myForm = document.createElement("form");
		  myForm.method="post" ;
		  myForm.action = to ;
		  myForm.target = "_blank";
		    var myInput = document.createElement("input") ;
		    myInput.setAttribute("name", 'event') ;
		    myInput.setAttribute("value", eventname );
		    myForm.appendChild(myInput) ;
		    $(myForm).css("display",'none');
		  document.body.appendChild(myForm) ;
		  myForm.submit() ;
		  document.body.removeChild(myForm) ;
		}

	});
</script>

</body>
</html>

