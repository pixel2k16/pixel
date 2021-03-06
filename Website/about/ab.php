<!DOCTYPE html>
<html>

<head>
  <title>YourPageTitle</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<body>
	<div class="about-wrapper wow bounceInDown" data-wow-duration="1.5s" data-wow-delay="9.5s">
	<a href="#dept" class="about dept">About Dept.</a>
	<a href="#pixel" class="about pix">About Us</a>
	<a href="#col" class="about clg">About College</a>
</div>

<style type="text/css">
	/*For about Us section*/
	.about-wrapper{
		z-index: 1;
		position: absolute;
		left: 33%;
		top: 20%;
	}
	.about{
		outline: none;
		height: 100%;
		text-decoration: none;
		color: #fff;
		background: #1D293A;
		padding: 20px;
		font-family: 'Raleway','sans';
		display: inline-block;
		position: relative;
		width: 150px;
		text-align: center;
		border-radius: 5px;
	}

	.dept{
		
		left: 155px;
		transition: all 0.5s;
	}
	.pix{
		z-index: 2;
	}
	.clg{
		right: 155px;
		transition: all 0.5s;
	}
	.about-wrapper:hover {

	}
	.about-wrapper:hover > .dept {
		left: 0px;
	}
	.about-wrapper:hover > .clg {
		right: 0px;
	}

</style>


<script type="text/javascript">
	$(document).ready(function(){
		
		$(".about-wrapper").hover(function(){
			$(".pix").html("About Pixel");
		},function(){
			$(".pix").html("About Us");
		});

		$("a").click(function(event){
			event.preventDefault();
			// alert(this.hash);
			postwith("index.php",this.hash);
		});

		function postwith (to,secname) {
		  var myForm = document.createElement("form");
		  myForm.method="post" ;
		  myForm.action = to ;
		    var myInput = document.createElement("input") ;
		    myInput.setAttribute("name", 'sec') ;
		    myInput.setAttribute("value", secname );
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

