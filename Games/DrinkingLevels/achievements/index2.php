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
			height: 1080px;
			width: 1920px;
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
	</style>

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Achievements - Christmas Example</title>
<script>
var jsonString = '<?php
	error_reporting(E_ALL); ini_set('display_errors', 1);
	$_SESSION["user"] = "asdf";
	$servername = file_get_contents('..\php\SqlConn.txt');
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
	$sth = $conn->prepare('SELECT GROUP_CONCAT(CONCAT("{\"ObjID\":\"" , t.Position , "\",\"Title\":\"" , t.Title , "\",\"Requirement\":\"", Requirements , "\",\"PreReq\":\"" , t.PreReq , "\",\"Image\":\"" , t.Image , "\",\"X\":" , t.X , ",\"Y\":" , t.Y , ",\"Claimed\":\"" , case when FIND_IN_SET(concat("{" , t.Category , ":" , t.Position , "}"),p.UnlockedTitles) > 0 THEN "TRUE" ELSE "FALSE" END , "\"}")) FROM Profiles p ,Titles t where t.Category = 6 and p.ProfileID = 1632185629');
	
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




window.onload = function() {
	
	//Prepare Background
	document.getElementById("svgCanvas").innerHTML += '<rect x="0" y="0" width="100%" height="100%" fill="url(#grad)"/>';
	document.getElementById("svgCanvas").innerHTML += '<image href="../images/christmasTree.svg" x="0" y="0" height="100%" width="100%" />';


    //Draw Main Squares
	for (let i=0; i < jsonData.length; i++){
		//var image = new Image();		
		//image.src = "../images/" + jsonData[i].Img;
		if(jsonData[i].Claimed == "FALSE"){ //jsonData[i].Claimed
			document.getElementById("svgCanvas").innerHTML += '<image href="../images/baubleBlack.svg" x="' +jsonData[i].X+ '" y="'+jsonData[i].Y+'" height="50" width="50" onclick="ClaimTitle(\'' + jsonData[i].Title + '\',\''+ jsonData[i].Requirement +'\');" />';
		} else {
			//document.getElementById("svgCanvas").innerHTML += '<path d="M ' + jsonData[i].X + ','+ jsonData[i].Y +' L 30,-230" stroke="#00abcd" onclick="alert(\'You have clicked claimed '+ jsonData[i].Title +'\');" ></path>';
			document.getElementById("svgCanvas").innerHTML += '<image href="../images/'+jsonData[i].Image+'" x="' +jsonData[i].X+ '" y="'+jsonData[i].Y+'" height="50" width="50" onclick="confirm(\'You have clicked claimed '+ jsonData[i].Title +'\');" />';
		}	
		console.log("Drew " + jsonData[i].ObjID);
	}
  
	
};

function ClaimTitle(title, titleReq){
	if (confirm(title + "\n" + titleReq + "\nClaim this title?")){
		event.target.href.baseVal = "../images/bauble1.svg";
	}
	console.log(event.target.title);
	console.log(event.target.href.baseVal);
	
	console.log(event.target.href);
	console.log(event.target.innerHtml);
	//alert(event.target);
}

</script>

	



</head>

  <body class="index">
	
		
	
	<svg id="svgCanvas" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" >
<filter id="shadow" height="120%">
  <feGaussianBlur in="SourceAlpha" stdDeviation="5"/>
  <feOffset dx="0" dy="10" result="offsetblur"/>
  <feComponentTransfer>
   <feFuncA type="linear" slope="0.5"/>
  </feComponentTransfer>
  <feMerge>
   <feMergeNode/>
   <feMergeNode in="SourceGraphic"/>
  </feMerge>
 </filter>
 <linearGradient id="grad" x1="0%" x2="0%" y1="0%" y2="100%">
  <stop offset="49%" stop-color="#3399cc"/>
  <stop offset="51%" stop-color="#66ccff"/>
 </linearGradient>
 
 <linearGradient id="smallGradient" x1="0%" x2="0%" y1="0%" y2="100%" fy="90%">
      <stop offset="0%" stop-color="#000000"></stop>
      <stop offset="100%" stop-color="#f7e69a"></stop>
      <animate id="op" attributeName="y2" dur="5s" from="100%" to="0%" repeatCount="indefinite" />
	  
 </linearGradient>
 
 

 
 <line x1="-175" y1="-175" x2="225" y2="225" stroke-width="10" stroke="url(#smallGradient)"/>
 <path transform="translate(0,0)" d="M 0,0 L 0,-200" stroke-width="10" stroke-linejoin="round" stroke-linecap="round" stroke="#000000" fill="none"></path>

 
 <g id="dialog-confirm" stroke-width="10" stroke-linejoin="round" stroke-linecap="round" stroke="#00cdae" fill="url(#smallGradient)" onclick="confirm('Cool Title\nClick the moving bar.')">
   <path transform="translate(0,0)" d="M 10,0 L 10,200">
    <animate attributeType="XML" attributeName="d"
             values="M 10,0 L 10,20;
                     M 10,20 L 10,40;
                     M 10,40 L 10,60;
                     M 10,80 L 10,100;
                     M 10,100 L 10,120;"
             keyTimes="0;0.25;0.5;0.75;1"
             begin="0s" dur="4s" repeatCount="indefinite"/>
    <animate attributeType="CSS" attributeName="fy"
             values="1%;25%;50%;75%;99%"
             keyTimes="0;0.25;0.5;0.75;1"
             begin="3s" dur="4s" repeatCount="indefinite"/>
   </path>
  </g>


</svg>




	
  </body>
  
  

</html>
