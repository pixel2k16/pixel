<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="tem.css">
</head>
<body>
<div class="Upload" role="button" aria-label="Upload file"></div>

<form id="upload_form" enctype="multipart/form-data" method="post">
  <input type="file" name="file1" id="file1" onchange="updateName(this.value)">
  <div class="choose">Choose</div><span class="filename"></span><br/>
  <input id="upload" type="button" value="Upload File" onclick="uploadFile()">
  <h3 id="status"></h3>
  <br/>
  <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
 
</form>
</body>
</html>
<script>
$("#progressBar").css("opacity","0");
function updateName(val){
	var name = val.substring(val.lastIndexOf('\\')+1); 
	// alert(name);
	$(".filename").html(name);
}

/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var file = _("file1").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "file_upload_parser.php");
	ajax.send(formdata);
}
function progressHandler(event){
	$("#progressBar").css("opacity","1");
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"%";
}
function completeHandler(event){
	$("#progressBar").css("opacity","0");
	var responsetext =  event.target.responseText;
	// alert(responsetext);
	if(responsetext == "done"){
		$("#status").fadeOut(function(){
			$(this).html("Done..").fadeIn();
			setTimeout(function(){$("#status").html("");},2000);
		});
	}else if(responsetext == "nope"){
		$("#status").fadeOut(function(){
			$(this).css("color","tomato").html("Not Uploaded. Try again").fadeIn();
			setTimeout(function(){$("#status").css("color","#fff").html("");},2000);
		});
	}else {
		$("#status").fadeOut(function(){
			$(this).css("color","tomato").html("Error occured. Try again").fadeIn();
			setTimeout(function(){$("#status").css("color","#fff").html("");},2000);
		});
	}
	_("progressBar").value = 0;
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
	setTimeout(function(){
		$("#status").fadeOut().html("Error Occurred").fadeIn();
	},2000);
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
</script>