<?php
session_start();

if(isset($_COOKIE["userId"]) && isset($_COOKIE["profileId"])){
	$_SESSION['userID'] = $_COOKIE["userId"];
	$_SESSION['profileID'] = $_COOKIE["profileId"];
}
elseif(isset($_SESSION["userID"]) && isset($_SESSION["profileID"])) {
	//do nothing
}
else{
	header("Location: ../index.php?login=invalid"); 
	exit;
}
?>

<html lang="en">
    <head itemscope="" itemtype="http://schema.org/WebSite">
        <title itemprop="name">Profile</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
        <meta name="viewport" content="width=device-width" />
        
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		
        <script src="../js/bootstrap.bundle.min.js"></script>
    </head>
    <body class="bg-dark">
        <div id="snippetContent">
            <div class="container">
                <div class="main-body">
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img id="profileImg" src="..\images\avatars\avatar.svg" alt="Admin" width="150" class="rounded-circle"/><!--class="rounded-circle"--> 										
                                        <div class="mt-3">
                                            <h4 id="profileName">OOPS! SOMETHING WENT WRONG!</h4>
                                            <p class="text-secondary mb-1" id="profileTitle">If you see this, close this tab and log back in. Data was not properly loaded</p>
                                            <button class="btn btn-primary" onclick="window.location.href='../newDrinkForm/'"><!--onclick="AddDrink();"-->  Add Drink  </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" onclick="location.href = '/achievements/';">
                                        <h6 class="mb-0">
											<img src="..\images\trophy.svg" width="24" height= "24" alt="">
                                            Achievements (wip)
                                        </h6>
                                        <span class="text-secondary">[preview] view/unlock achievements</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">
                                            <img src="..\images\notebook.svg" width="24" height= "24" alt="">
                                            Menu (wip)
                                        </h6>
                                        <span class="text-secondary">[does nothing] collection of drink recipes and ratings</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" onclick="window.location.href='../history/'">
                                        <h6 class="mb-0">
                                            <img src="..\images\history.svg" width="24" height= "24" alt="">
                                            History (wip)
                                        </h6>
                                        <span class="text-secondary">history of drinks you've drank</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" onclick="window.location.href='../addFriend/'">
                                        <h6 class="mb-0">
                                            <img src="..\images\friends.svg" width="24" height= "24" alt="">
                                            Friends (wip)
                                        </h6>
                                        <span class="text-secondary">add other players and compare sizes</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3"><h6 class="mb-0">Level</h6></div>
                                        <div class="col-sm-9 text-secondary" id="profileLevel">0</div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3"><h6 class="mb-0">XP</h6></div>
                                        <div class="col-sm-9 text-secondary" id="profileXp">0/100000</div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3"><h6 class="mb-0">Description</h6></div>
                                        <div class="col-sm-9 text-secondary" id="profileDesc">abcdefghijklmnopqrstuvwxyz</div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3"><h6 class="mb-0">Placeholder</h6></div>
                                        <div class="col-sm-9 text-secondary">other details about something and such is displayed here.</div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3"><h6 class="mb-0">Another Placeholder</h6></div>
                                        <div class="col-sm-9 text-secondary">not really sure what could go here. have ideas? let me know.</div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-12"><a class="btn btn-info" href="profileEdit.php">Edit Profile (wip)</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters-sm">
                                <div class="col-sm-6 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">wip</i>Achievement Progress</h6>
                                            <small>The Basics</small>
                                            <div class="progress mb-3" style="height: 5px;"><div class="progress-bar bg-primary" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div></div>
                                            <small>Shots</small>
                                            <div class="progress mb-3" style="height: 5px;"><div class="progress-bar bg-primary" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div></div>
                                            <small>The Keys</small>
                                            <div class="progress mb-3" style="height: 5px;"><div class="progress-bar bg-primary" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div></div>
                                            <small>Mike's</small>
                                            <div class="progress mb-3" style="height: 5px;"><div class="progress-bar bg-primary" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div></div>
                                            <small>Teas</small>
                                            <div class="progress mb-3" style="height: 5px;"><div class="progress-bar bg-primary" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">wip</i>Friends</h6>
											<div id="FriendsProgress">
											</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style type="text/css">
                body {
                    margin-top: 20px;
                    color: #1a202c;
                    text-align: left;
                    
                }
                .main-body {
                    padding: 15px;
                }
                .card {
                    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
                }

                .card {
                    position: relative;
                    display: flex;
                    flex-direction: column;
                    min-width: 0;
                    word-wrap: break-word;
                    background-color: #fff;
                    background-clip: border-box;
                    border: 0 solid rgba(0, 0, 0, 0.125);
                    border-radius: 0.25rem;
                }

                .card-body {
                    flex: 1 1 auto;
                    min-height: 1px;
                    padding: 1rem;
                }

                .gutters-sm {
                    margin-right: -8px;
                    margin-left: -8px;
                }

                .gutters-sm > .col,
                .gutters-sm > [class*="col-"] {
                    padding-right: 8px;
                    padding-left: 8px;
                }
                .mb-3,
                .my-3 {
                    margin-bottom: 1rem !important;
                }

                .bg-gray-300 {
                    background-color: #e2e8f0;
                }
                .h-100 {
                    height: 100% !important;
                }
                .shadow-none {
                    box-shadow: none !important;
                }
            </style>
			<?php
	if((isset($_POST["userID"]) && isset($_POST["profileID"])) || (isset($_SESSION["userID"]) && isset($_SESSION["profileID"]))){
		$UserID = $_POST["userID"];
		$profileID = $_POST["profileID"];
	}
	else {
		//echo '<script> document.body.innerHTML += \'<form id="dynForm" action="../index.php?login=invalid" method="post"></form>\'; document.getElementById("dynForm").submit();</script>';
	}
?>
            <script type="text/javascript">
			/*
				function AddDrink(){
					document.body.innerHTML += '<form id="dynForm" action="../newDrinkForm/" method="post">' +
				'<input type="hidden" name="profileID" value="<?php echo $_POST["profileID"];?>"><input type="hidden" name="userID" value="<?php echo $_POST["userID"];?>"></form>';
				document.getElementById("dynForm").submit();
					
					
				};

				function AddFriend(){
					document.body.innerHTML += '<form id="dynForm" action="../addFriend/" method="post">' +
				'<input type="hidden" name="profileID" value="<?php echo $_POST["profileID"];?>"><input type="hidden" name="userID" value="<?php echo $_POST["userID"];?>"></form>';
				document.getElementById("dynForm").submit();
					
					
				};
				
				function History(){
					document.body.innerHTML += '<form id="dynForm" action="../history/" method="post">' +
				'<input type="hidden" name="profileID" value="<?php echo $_POST["profileID"];?>"><input type="hidden" name="userID" value="<?php echo $_POST["userID"];?>"></form>';
				document.getElementById("dynForm").submit();
					
					
				};
			*/
		var jsonString = '<?php
			error_reporting(E_ALL); ini_set('display_errors', 1);
			$profileID = "0";
			$servername = file_get_contents('..\php\SqlConn.txt');
			$username = "ReadOnly";
			$password = "3D8.5utpT9pk!1d4";
			$dbname = "DrinkingLevels";


			if(isset($_SESSION["profileID"])){
				$profileID = $_SESSION["profileID"];
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
			$sth = $conn->prepare('SELECT CONCAT("{\"ProfileID\":\"" , p.ProfileID , "\",\"Name\":\"" , p.Name , "\",\"Level\":\"", p.Level , "\",\"Xp\":\"" , p.XP , "\",\"Desc\":\"" , p.Description , "\",\"Title\":\"" , p.Title ,  "\",\"XpToLevel\":\"" , p.XpToLevel , "\",\"Template\":\"" , p.Template , "\",\"Avatar\":\"" , p.Avatar ,"\"}") FROM Profile_Details p where p.ProfileID = ?');
			$sth->bind_param("s", $profileID);
			$sth->execute();

	
			$sth->store_result();
			$sth->bind_result($rName);
			// Fetch all matching rows

			while($sth->fetch()){
				echo "[" . $rName . "]";
			}

			$conn->close();
		?>';
console.log(jsonString);
var jsonData = JSON.parse(jsonString);
	
	console.log(jsonData);
	//Welcome based on default profile
	document.getElementById("profileName").innerHTML = jsonData[0].Name;
	document.getElementById("profileTitle").innerHTML = jsonData[0].Title;
	document.getElementById("profileLevel").innerHTML = jsonData[0].Level;
	document.getElementById("profileXp").innerHTML = jsonData[0].Xp + '/' + jsonData[0].XpToLevel ;	
	document.getElementById("profileDesc").innerHTML = jsonData[0].Desc;
	document.getElementById("profileImg").src='../images/avatars/' + jsonData[0].Avatar + '.svg';
	var link = document.createElement('link');
		link.rel = 'stylesheet';
		link.href = '../css/templates/' + jsonData[0].Template + '.css';
    document.head.appendChild(link);
	


jsonString = '<?php
			error_reporting(E_ALL); ini_set('display_errors', 1);
			$profileID = "0";
			$servername = file_get_contents('..\php\SqlConn.txt');
			$username = "ReadOnly";
			$password = "3D8.5utpT9pk!1d4";
			$dbname = "DrinkingLevels";


			if(isset($_SESSION["profileID"])){
				$profileID = $_SESSION["profileID"];
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
			$sth = $conn->prepare('SELECT GROUP_CONCAT(CONCAT("{\"ProfileID\":\"" , f.ProfileID , "\",\"Name\":\"" , f.Name , "\",\"Level\":\"", f.Level , "\",\"Xp\":\"" , f.XP , "\",\"XpToLevel\":\"" , f.XpToLevel , "\",\"Desc\":\"" , f.Description , "\",\"Title\":\"" , f.Title ,"\"}") ORDER BY f.Actual_Total_Xp desc) from Profiles p, Profile_Details f where (FIND_IN_SET(Concat("{" , f.ProfileID , "}"), p.FriendProfiles) > 0 or p.ProfileID = f.ProfileID)and p.ProfileID = ?');
			$sth->bind_param("s", $profileID);
			$sth->execute();

	
			$sth->store_result();
			$sth->bind_result($rName);
			// Fetch all matching rows

			while($sth->fetch()){
				echo "[" . $rName . "]";
			}

			$conn->close();
		?>';
var jsonDataFriends = JSON.parse(jsonString);

for (var i = 0; i < jsonDataFriends.length; i++){	
  var percent = GetPercent(jsonDataFriends[i].Xp, jsonDataFriends[i].XpToLevel);
  
  if (jsonData[0].Name == jsonDataFriends[i].Name){
	  document.getElementById("FriendsProgress").innerHTML += '<small>You - ' + jsonDataFriends[i].Title + ' (lvl: ' + jsonDataFriends[i].Level + ')</small><div class="progress mb-3" style="height: 20px;"><div class="progress-bar" role="progressbar" style="width: ' + percent + '%; background-color: LightSkyBlue;" aria-valuenow="' + jsonDataFriends[i].Xp +'" aria-valuemin="0" aria-valuemax="' + jsonDataFriends[i].XpToLevel + '">' + jsonDataFriends[i].Xp + ' / ' + jsonDataFriends[i].XpToLevel + '</div></div>'
  }
  else{
	 document.getElementById("FriendsProgress").innerHTML += '<small>' + jsonDataFriends[i].Name + ' - ' + jsonDataFriends[i].Title + ' (lvl: ' + jsonDataFriends[i].Level + ')</small><div class="progress mb-3" style="height: 20px;"><div class="progress-bar bg-primary" role="progressbar" style="width: ' + percent + '%;" aria-valuenow="' + jsonDataFriends[i].Xp +'" aria-valuemin="0" aria-valuemax="' + jsonDataFriends[i].XpToLevel + '">' + jsonDataFriends[i].Xp + ' / ' + jsonDataFriends[i].XpToLevel + '</div></div>' 
  }
  
  
  
  
}


function GetPercent(numerator, denominator) {
	console.log(numerator + "  " + denominator);
  if (denominator == 0 || isNaN(denominator)) {
        return 0;
  }
  else {
        return Math.trunc((numerator / denominator) * 100);
  }
}




			</script>
        </div>
    </body>
</html>
