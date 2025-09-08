<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<style>	
		body{
			position: relative;
			margin: 0px;
		}

		.Content{
			position: fixed;
			left: 0px;
			top: 0px;
			margin: 0px;
			height: 100px;
			width: 99%;
			background-color: lightgray;
			border: 2px solid black;
		}
		
		.InfoSection{
			margin-left: 5px;
			padding: 0px;
			height: 100%;
		}
		
		.InfoSection h3,h4{
			margin: 0px;
			padding: 0px;
		}
		
		#achTitle{
			float: left;
			height: 40%;
			width: 70%;
		}
		
		#achDesc{
			float: left;
			height: 60%;
			width: 70%;
		}
		
		#achClaim{
			float: right;
			height: 99%;
			width: 29%;
			background-color: lightgreen;
			text-align: center;
		}
		
		canvas {
			position: absolute; 
			left: 0; 
			top: 100px; 
			z-index: 0; 
		}
		
	</style>

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Achievements - Shots Only</title>
<script>
var jsonString = '<?php
	error_reporting(E_ALL); ini_set('display_errors', 1);
	$_SESSION["user"] = "asdf";
	$servername = file_get_contents('SqlConn.txt');
	$username = "ReadOnly";
	$password = "3D8.5utpT9pk!1d4";
	$dbname = "DrinkingLevels";

	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "Connectiong Failed" . $conn->connect_error;
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SET SESSION group_concat_max_len = 1000000";
	$result = $conn->query($sql);
	/* Execute a prepared statement */
	$sth = $conn->prepare('SELECT GROUP_CONCAT(CONCAT("{\"ObjID\":\"" , t.Position , "\",\"Title\":\"" , t.Title , "\",\"Requirement\":\"", Requirements , "\",\"PreReq\":\"" , t.PreReq , "\",\"Image\":\"" , t.Image , "\",\"X\":" , t.X , ",\"Y\":" , t.Y , ",\"Claimed\":\"" , case when FIND_IN_SET(concat("{" , t.Category , ":" , t.Position , "}"),p.UnlockedTitles) > 0 THEN "TRUE" ELSE "FALSE" END , "\"}")) FROM Profiles p ,Titles t where t.Category = 3 and p.ProfileID = 1632185629');
	
	$sth->execute();
	
	
	
	$sth->store_result();
	$sth->bind_result($rName);
	// Fetch all matching rows

	while($sth->fetch()){
		echo "[" . preg_replace('/[\t\n\r]+/i', '<br>', $rName) . "]";
	}

	$conn->close();

?>';

var jsonData = JSON.parse(jsonString);
var offset = 0;

//Prepare Background
var background = new Image();
background.src = "../images/spaceBackground2.jpg";

//Load images into array for canvas drawing;
var images = [];
var imgSize = 50;
for (let i=0; i < jsonData.length; i++){
		var image = new Image();
		image.src = "../images/" + jsonData[i].Image;
		
		images[i] = image;			
	}


window.onload = function() {
	march();
	var c = document.getElementById("canvasIcon");
	var ctx = c.getContext("2d");

	
	
	//Draw Main Squares
	for (let i=0; i < jsonData.length; i++){
		//var image = new Image();		
		//image.src = "../images/" + jsonData[i].Img;
		if(jsonData[i].Claimed == "FALSE"){ //jsonData[i].Claimed
			ctx.fillStyle = "#EEEEEE";
			ctx.fillRect(jsonData[i].X, jsonData[i].Y, imgSize, imgSize);
		} else {
			ctx.fillStyle = "#F8E62F";
			ctx.fillRect(jsonData[i].X, jsonData[i].Y, imgSize, imgSize);
		}
		ctx.drawImage(images[i], jsonData[i].X, jsonData[i].Y, imgSize, imgSize);		
		console.log("Drew " + jsonData[i].ObjID);
	}
  
  

	var canvas = document.getElementById("canvasIcon");
	canvas.addEventListener('click', function(e) {
		UpdateDetails(getActiveIcon(canvas, e))
	})
	
	
	
	
};

function getActiveIcon(canvas, event) {
    const rect = canvas.getBoundingClientRect()
    const x = event.clientX - rect.left
    const y = event.clientY - rect.top
	const effectCanvas = document.getElementById("canvasEffect");
	var ctx = effectCanvas.getContext("2d");
    console.log("x: " + x + " y: " + y)
	ctx.clearRect(0, 0, 800, 800);
	
	var selectedObj = "";
	
	for (let i=0; i < jsonData.length; i++){
		if (x >= jsonData[i].X && x <= jsonData[i].X + imgSize && y>= jsonData[i].Y && y <= jsonData[i].Y + imgSize){
			console.log("x: " + (x + imgSize) + " y: " + (y + imgSize))
			var brd = effectCanvas.getContext("2d");
			brd.beginPath();
			brd.lineWidth = "5";
			brd.strokeStyle = "red";
			brd.shadowColor="red";
			brd.shadowBlur=20;
			brd.rect(jsonData[i].X, jsonData[i].Y, imgSize, imgSize);
			brd.stroke();
			console.log(jsonData[i].ObjID);
			selectedObj = jsonData[i].ObjID;
		break;
		} else {
			selectedObj = "No Object Selected"
			console.log("No Square Selected");
		}
	}

	return selectedObj
}

function getRequiredCoordX(req, def){
	var coord = def;
	for (let i=0; i < jsonData.length; i++){
	if (req == jsonData[i].ObjID){
		coord = jsonData[i].X;
		break;
	}
}
	return coord;
}

function getRequiredCoordY(req, def){
	var coord = def;
	for (let i=0; i < jsonData.length; i++){
	if (req == jsonData[i].ObjID){
		coord = jsonData[i].Y;
		break;
	}
}
	return coord;
}	
	
function draw() {
	var c = document.getElementById("canvasEffect");
	var ctx = c.getContext("2d");
	
	//Draw Background
	ctx.drawImage(background, 0, 0, 1920, 1080);
	//Draw Lines
	for (let i=0; i < jsonData.length; i++){
		var gradient = ctx.createLinearGradient(jsonData[i].X, jsonData[i].Y, getRequiredCoordX(jsonData[i].PreReq, jsonData[i].X), getRequiredCoordY(jsonData[i].PreReq, jsonData[i].Y));
			
			var red = 0;
			var green = 100;
			var blue = 255;
			var rgb = UpdateColor(red, green, blue, offset, 10);
			gradient.addColorStop("0", rgb);
			
			rgb = UpdateColor(red, green, blue, offset, 9);
			gradient.addColorStop("0.1", rgb);
			
			rgb = UpdateColor(red, green, blue, offset, 8);
			gradient.addColorStop("0.2", rgb);
			
			rgb = UpdateColor(red, green, blue, offset, 7);
			gradient.addColorStop("0.3", rgb);
			
			rgb = UpdateColor(red, green, blue, offset, 6);
			gradient.addColorStop("0.4", rgb);
			
			rgb = UpdateColor(red, green, blue, offset, 5);
			gradient.addColorStop("0.5", rgb);
			
			rgb = UpdateColor(red, green, blue, offset, 4);
			gradient.addColorStop("0.6", rgb);
			
			rgb = UpdateColor(red, green, blue, offset, 3);
			gradient.addColorStop("0.7", rgb);
			
			rgb = UpdateColor(red, green, blue, offset, 2);
			gradient.addColorStop("0.7", rgb);
			
			rgb = UpdateColor(red, green, blue, offset, 1);
			gradient.addColorStop("0.9", rgb);
			
			rgb = UpdateColor(red, green, blue, offset, 0);
			gradient.addColorStop("1.0", rgb);
		ctx.beginPath(); 
		ctx.lineWidth="5";
		
		ctx.shadowBlur=0;
		//Plus 25 (+25) to center in 50x50px img
		ctx.strokeStyle=gradient;
		if(jsonData[i].Claimed == "FALSE"){ //jsonData[i].Claimed
			ctx.strokeStyle=gradient;
		} else {
			ctx.strokeStyle="blue";
		}
		//console.log("Line From " + (jsonData[i].X + 25) + "," + (jsonData[i].Y + 25) + " TO " + (getRequiredCoordX(jsonData[i].PreReq) + 25) + "," + (getRequiredCoordY(jsonData[i].PreReq) + 25) );
		ctx.moveTo(jsonData[i].X + (imgSize / 2),jsonData[i].Y + (imgSize / 2));
		ctx.lineTo(getRequiredCoordX(jsonData[i].PreReq, jsonData[i].X) + (imgSize / 2), getRequiredCoordY(jsonData[i].PreReq, jsonData[i].Y) + (imgSize / 2));
		ctx.stroke();  
	}
	
	//Draw Claimed Squares
	//for (let i=0; i < jsonData.length; i++){
	//	if (jsonData[i].Claimed == "TRUE"){
	//		//AnimateClaimed(ctx, jsonData[i].X, jsonData[i].Y, offset);
	//	}
	//}
	
}

function march() {
  offset++;
  if (offset > 9) {
    offset = 0;
  }
  draw();
  setTimeout(march, 100);
}

function UpdateColor(red, green, blue, frame, pos){
	var diff = Math.abs(frame-pos-10);	
	if(frame == pos){
		red = red + 50;
		green = green + 50;
		blue = blue + 50;
	} else {
		red = red - (diff * 5);
		green = green - (diff * 5);
		blue = blue - (diff * 5);
	}	
	return "rgb(" + red + ", " + green + ", " + blue + ")";
}
	
function AnimateClaimed(ctx, x, y, offset){
	ctx.beginPath();
			ctx.lineWidth = "5";
			ctx.strokeStyle = "red";
			ctx.shadowColor="red";
			ctx.shadowBlur=offset;
			ctx.rect(x, y, imgSize, imgSize);
			ctx.stroke();
}	
	
function UpdateDetails(objid){
	for (let i=0; i < jsonData.length; i++){
		if(jsonData[i].ObjID == objid){
			document.getElementById("achTitle").innerHTML = jsonData[i].Title;
			document.getElementById("achDesc").innerHTML = jsonData[i].Requirement;
			break;
		} else {
			document.getElementById("achTitle").innerHTML = "Select Achievement";
			document.getElementById("achDesc").innerHTML = "Click an icon to learn more";
		}			
	}
	
	
}










	
</script>




</head>

  <body class="index">
	
		
	
	<canvas id="canvasEffect" width="1920" height="1080" ></canvas>
	<canvas id="canvasIcon" width="1920" height="1080" ></canvas>

		<div class="Content">
			<div class="InfoSection">
				<h4 id="achClaim">CLAIM</h4>
				<h3 id="achTitle">Title</h3>
				<h4 id="achDesc">Desc</h4>
				
			</div>
		</div>


	
  </body>
  
  

</html>
