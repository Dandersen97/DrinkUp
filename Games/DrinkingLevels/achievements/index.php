<?php
	SESSION_START();

if(isset($_SESSION["userID"]) && isset($_SESSION["profileID"])){
	$UserID = $_SESSION["userID"];
	$profileID = $_SESSION["profileID"];
}
else {
	header("Location: ../index.php?login=invalid"); 
	exit;
}
?>

<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/navbar-fixed-top/">

    <title>Achievements</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.3.4.1.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">
<script>
var jsonString = '<?php
	error_reporting(E_ALL); ini_set('display_errors', 1);
	$_SESSION["user"] = "asdf";
	$servername = file_get_contents('..\php\SqlConn.txt');
	$username = "ReadOnly";
	$password = "3D8.5utpT9pk!1d4";
	$dbname = "DrinkingLevels";

	$profileID = 0;
	$categoryId = 0;

	if(isset($_SESSION["profileID"])){
		$profileID = $_SESSION["profileID"];
	}
	if(isset($_GET["CategoryId"])){
		$categoryId = $_GET["CategoryId"];
	}
	
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
	$sth = $conn->prepare('SELECT GROUP_CONCAT(CONCAT("{\"ObjID\":\"" , t.Position , "\",\"Title\":\"" , t.Title , "\",\"Avatar\":\"" , IFNULL(t.Avatar, "") , "\",\"Category\":\"" , t.Category , "\",\"Requirement\":\"", Requirements , "\",\"PreReq\":\"" , t.PreReq , "\",\"Image\":\"" , t.Image , "\",\"X\":" , t.X , ",\"Y\":" , t.Y , ",\"Width\":" , t.Width , ",\"Height\":" , t.Height , ",\"Claimed\":\"" , case when FIND_IN_SET(concat("{" , t.Category , ":" , t.Position , "}"),p.UnlockedTitles) > 0 THEN "TRUE" ELSE "FALSE" END , "\"}")) FROM Profiles p ,Titles t where t.Category = ? and p.ProfileID = ?');
	$sth->bind_param("ss", $categoryId, $profileID);
	
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
	//document.getElementById("svgCanvas").innerHTML += '<rect x="0" y="0" width="100%" height="100%" fill="url(#grad)"/>';
	document.getElementById("svgCanvas").innerHTML += '<image href="../images/achievements/' + jsonData[0].Category + '/background.svg" x="0" y="0" width="100%" height="100%" />';


    //Draw Main Squares
	for (let i=0; i < jsonData.length; i++){
		//var image = new Image();		
		//image.src = "../images/" + jsonData[i].Img;
		if(jsonData[i].Claimed == "FALSE"){ //jsonData[i].Claimed
		fetch('../images/achievements/' + jsonData[0].Category + '/' + jsonData[i].Image + '.svg')
			.then(response => response.text())
			.then(data => {
				
				let text = data;
				let replaceSize = data.replace('replaceData=""', ' x="' +jsonData[i].X+ '" y="'+jsonData[i].Y+'"' +
															' width="'+jsonData[i].Width+'px" height="'+jsonData[i].Height+'px"');
				let replaceClick = replaceSize.replace('<g>', '<g style="fill:#000" onclick="ClaimTitleModal(\'' + jsonData[i].Title + '\',\''+ jsonData[i].Avatar + '\',\''+ jsonData[i].Requirement + '\',\''+ jsonData[i].Category + ':' + jsonData[i].ObjID +'\');">')
				document.getElementById("svgCanvas").innerHTML += replaceClick;
			});
			//document.getElementById("svgCanvas").innerHTML += '<image id="' + jsonData[i].Category + ':' + jsonData[i].ObjID + '" href="../images/achievements/' + jsonData[0].Category + '/' + jsonData[i].Image + '-black.svg" x="' +jsonData[i].X+ '" y="'+jsonData[i].Y+'" width="'+jsonData[i].Width+'px" height="'+jsonData[i].Height+'px" onclick="ClaimTitleModal(\'' + jsonData[i].Title + '\',\''+ jsonData[i].Avatar + '\',\''+ jsonData[i].Requirement + '\',\''+ jsonData[i].Category + ':' + jsonData[i].ObjID +'\');" />';
		} else {
			fetch('../images/achievements/' + jsonData[0].Category + '/' + jsonData[i].Image + '.svg')
			.then(response => response.text())
			.then(data => {
				
				let text = data;
				let replaceSize = data.replace('replaceData=""', ' x="' +jsonData[i].X+ '" y="'+jsonData[i].Y+'"' +
															' width="'+jsonData[i].Width+'px" height="'+jsonData[i].Height+'px"');
				let replaceClick = replaceSize.replace('<g>', '<g style="opacity:0" onclick="ClaimedTitleModal(\'' + jsonData[i].Title + '\',\''+ jsonData[i].Avatar + '\',\''+ jsonData[i].Requirement +'\');">')
				document.getElementById("svgCanvas").innerHTML += replaceClick;
			});
			 //'<use xlink:href="../images/achievements/' + jsonData[0].Category + '/' + jsonData[i].Image + '.svg"></use>'
			//'<image href="../images/achievements/' + jsonData[0].Category + '/' + jsonData[i].Image + '.svg"' +
			//' x="' +jsonData[i].X+ '" y="'+jsonData[i].Y+'"' +
			//' width="'+jsonData[i].Width+'px" height="'+jsonData[i].Height+'px"' + 
			//'onclick="ClaimedTitleModal(\'' + jsonData[i].Title + '\',\''+ jsonData[i].Avatar + '\',\''+ jsonData[i].Requirement +'\');"' +
			//' />';
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
  
  <!--<style>	
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
	</style>-->
  
  </head>

  <body style="width: 1920px; height: 1080px;">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" style="position: fixed; top: 0px; width: 100vw;">
      <div>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Achievements</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse scroll">
			<div class="nav navbar-nav scrolling-wrapper">
				<div class="card"><h2 onclick="ChangeAchievement(event)" id="cat1">The Basics</h2></div>
				<div class="card"><h2 onclick="ChangeAchievement(event)" id="cat2">The Keys</h2></div>
				<div class="card"><h2 onclick="ChangeAchievement(event)" id="cat3">Shots</h2></div>
				<div class="card"><h2 onclick="ChangeAchievement(event)" id="cat4">Getting Hard</h2></div>
				<div class="card"><h2 onclick="ChangeAchievement(event)" id="cat5">Teas</h2></div>
				<div class="card"><h2 onclick="ChangeAchievement(event)" id="cat6">Christmas</h2></div>
				<div class="card"><h2>Ciders</h2></div>
				<div class="card"><h2>Beers</h2></div>
				<div class="card"><h2>Wines</h2></div>
				<div class="card"><h2>Whiskeys</h2></div>	
				<div class="card"><h2>Halloween</h2></div>
				<div class="card"><h2>Thanksgiving</h2></div>
				<div class="card"><h2>St Patties</h2></div>
				<div class="card"><h2>Store</h2></div>
				<div class="card"><h2>Placeholder1</h2></div>
				<div class="card"><h2>Placeholder2</h2></div>
				<div class="card"><h2>Placeholder3</h2></div>
				<div class="card"><h2>Placeholder4</h2></div>
				<div class="card"><h2>Place5</h2></div>
				<div class="card"><h2>Place6</h2></div>
			</div>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	

	<svg id="svgCanvas" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" >
		 <linearGradient id="grad" x1="0%" x2="0%" y1="0%" y2="100%">
  <stop offset="49%" stop-color="#3399cc"/>
  <stop offset="51%" stop-color="#66ccff"/>
 </linearGradient>
		<!--<rect x="0" y="0" width="100%" height="100%" fill="url(#grad)"/>-->
	</svg>


	<div id="modalAchievement" class="modal">
	<!-- Modal content -->
		<div class="modal-content">
			<span class="close" onclick="Close(event);" style="color: red;">&times;</span>
		    <h2>Claim Achievement?</h2>
			<p>Requirement: </p>
			<p><b id="AchReq">Requirement Here</b></p>
			<p><i>Unlock the following</i></p>
				<div id="AchUnlock">
					<div>
						<h5>New Profile Image</h5>
						<img src="..\images\avatars\Default.svg" alt="Admin" width="80" height="80px">				
					</div>
					<div>
						<h5>New Title</h5>
						<p id="AchTitle">title here</p>				
					</div>
				</div>
				
			<button onclick="ClaimAch(event);" id="ClaimButton">CLAIM</button>
		</div>
	</div>
    <div id="modalClaimedAch" class="modal">
	<!-- Modal content -->
		<div class="modal-content">
			<span class="close" onclick="Close(event);" style="color: red;">&times;</span>
		    <h2>You've already claimed this achievement.</h2>
			<p>Requirement: </p>
			<p><b id="ClmAchReq">Requirement Here</b></p>
			<p><i>Unlocked the following</i></p>
				<div id="ClmAchUnlock">
					<div>
						<h5>New Profile Image</h5>
						<img src="..\images\avatars\Default.svg" alt="Admin" width="80" height="80px">				
					</div>
					<div>
						<h5>New Title</h5>
						<p id="ClmAchTitle">title here</p>				
					</div>
				</div>
		</div>
	</div>
	
	<style>
	/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}				

.column {
  float: left;
  width: 33%;
  padding: 10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
	
	</style>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
	<script>
	function Close(ev){
		ev.srcElement.parentElement.parentElement.style.display = "none";			
	};
	function ClaimTitleModal(title, avatar, req, objid){
		document.getElementById("AchUnlock").innerHTML = "";
		console.log(avatar);
		if (avatar != "") {
			document.getElementById("AchUnlock").innerHTML += '<div><h5>New Profile Image</h5><img src=\"..\\images\\avatars\\' + avatar + '.svg" alt="Admin" width="80" height="80px"></div>'
		}
		document.getElementById("AchReq").innerHTML = req;
		document.getElementById("AchUnlock").innerHTML += '<div><h5>New Title</h5><p><b>' + title + '</b></p></div>'
		document.getElementById("ClaimButton").setAttribute('onclick', 'ClaimAch("' + objid + '");');
		var modal = document.getElementById("modalAchievement");
		var span = document.getElementsByClassName("close")[0];
		modal.style.display = "block";	
	};
	function ClaimedTitleModal(title, avatar, req){
		document.getElementById("ClmAchUnlock").innerHTML = "";
		console.log(avatar);
		if (avatar != "") {
			document.getElementById("ClmAchUnlock").innerHTML += '<div><h5>New Profile Image</h5><img src=\"..\\images\\avatars\\' + avatar + '.svg" alt="Admin" width="80" height="80px"></div>'
		}
		document.getElementById("ClmAchUnlock").innerHTML += '<div><h5>New Title</h5><p><b>' + title + '</b></p></div>'
		document.getElementById("ClmAchReq").innerHTML = req;
		var modal = document.getElementById("modalClaimedAch");
		var span = document.getElementsByClassName("close")[0];
		modal.style.display = "block";	
	};
	function ChangeAchievement(ev){
		console.log(ev);
		console.log(ev.srcElement.id);
		window.location.href =  '' + "?CategoryId=" + ev.srcElement.id.replace("cat", '') ;
	};
	function ClaimAch(ev){
		console.log(ev);
		document.body.innerHTML += '<form id="dynForm" action="claimAchievement.php" method="post">' +
				'<input type="hidden" name="claimedAch" value="' + ev + '">' +
				'</form>';
		document.getElementById("dynForm").submit();
	}
	
	</script>
  

</body></html>