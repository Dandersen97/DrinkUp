<?php
session_start();

if(isset($_SESSION["userID"]) && isset($_SESSION["profileID"])){
	$UserID = $_SESSION["userID"];
	$profileID = $_SESSION["profileID"];
}
else {
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
        
		<!--
		        <meta name="description" content="Preview Bootstrap snippets. profile with data and skills. Copy and paste the html, css and js code for save time, build your app faster and responsive" />
        <meta name="keywords" content="bootdey, bootstrap, theme, templates, snippets, bootstrap framework, bootstrap snippets, free items, html, css, js" />
		<link rel="canonical" href="https://www.bootdey.com/snippets/preview/profile-with-data-and-skills" itemprop="url" />
        <meta property="twitter:account_id" content="2433978487" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@bootdey" />
        <meta name="twitter:creator" content="@bootdey" />
        <meta name="twitter:title" content="Preview Bootstrap  snippets. profile with data and skills" />
        <meta name="twitter:description" content="Preview Bootstrap snippets. profile with data and skills. Copy and paste the html, css and js code for save time, build your app faster and responsive" />
        <meta name="twitter:image" content="https://www.bootdey.com/files/SnippetsImages/bootstrap-snippets-1105.png" />
        <meta name="twitter:url" content="https://www.bootdey.com/snippets/preview/profile-with-data-and-skills" />
        <meta property="og:title" content="Preview Bootstrap  snippets. profile with data and skills" />
        <meta property="og:url" content="https://www.bootdey.com/snippets/preview/profile-with-data-and-skills" />
        <meta property="og:image" content="https://www.bootdey.com/files/SnippetsImages/bootstrap-snippets-1105.png" />
        <meta property="og:description" content="Preview Bootstrap snippets. profile with data and skills. Copy and paste the html, css and js code for save time, build your app faster and responsive" />
        <link rel="alternate" type="application/rss+xml" title="Latest snippets resources templates and utilities for bootstrap from bootdey.com:" href="http://bootdey.com/rss" />
        <link rel="author" href="https://plus.google.com/u/1/106310663276114892188" />
        <link rel="publisher" href="https://plus.google.com/+Bootdey-bootstrap/posts" />
        <meta name="msvalidate.01" content="23285BE3183727A550D31CAE95A790AB" />
        <script src="/cache-js/cache-1598759682-97135bbb13d92c11d6b2a92f6a36685a.js" type="text/javascript"></script>
		
		
		
		-->
		
    </head>
    <body class="bg-dark">
        <div id="snippetContent">
            <link rel="stylesheet" href="../css/bootstrap.min.css" />
            <script src="../js/bootstrap.bundle.min.js"></script>
            <div class="container">
                <div class="main-body">
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img id="profileImg" src="..\images\avatars\avatar.svg" alt="Admin" width="150" /><!--class="rounded-circle"--> 										
                                        <div class="mt-3">
                                            <input id="profileName"></input>
                                            <p class="text-secondary mb-1" id="profileTitle">If you see this, close this tab and log back in. Data was not properly loaded</p>
											<p style="display: none;" id="profileTitleId"></p>
                                            <button class="btn btn-primary" onclick="SaveChanges();">  Save Changes  </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" onclick="History();">
                                        <h6 class="mb-0">
                                            <img src="..\images\history.svg" width="24" height= "24" alt="">
                                            History (wip)
                                        </h6>
                                        <span class="text-secondary">delete or modify history</span>
                                    </li>
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" onclick="ChangeTitle();">
                                        <h6 class="mb-0">
                                            <img src="..\images\notebook.svg" width="24" height= "24" alt="">
                                            Title
                                        </h6>
                                        <span class="text-secondary">change title</span>
                                    </li>
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" onclick="ChangeBackground();">
                                        <h6 class="mb-0">
                                            <img src="..\images\notebook.svg" width="24" height= "24" alt="">
                                            Background
                                        </h6>
                                        <span class="text-secondary">change background</span>
                                    </li>
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" onclick="ChangeProfile();">
                                        <h6 class="mb-0">
                                            <img src="..\images\notebook.svg" width="24" height= "24" alt="">
                                            Profile Pic
                                        </h6>
                                        <span class="text-secondary">change profile picture</span>
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
                                        <input id="profileDesc"></input>
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
									<div class="row">
                                        <div class="col-sm-12"><a class="btn btn-info" onclick="DeleteProfile();">Delete Profile</a></div>
                                    </div>
                                    <hr />
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
	<div id="myModal" class="modal">
	<!-- Modal content -->
		<div class="modal-content">
			<span class="close" onclick="Close(event);">&times;</span>
			<h2>Select a new background:</h2>
			<p><i>remember to save changes</i></p>
			<button onclick="listView()"><i class="fa fa-bars"></i> List</button>
			<button onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>			
			<?php 
					$path    = '..\css\templates';
					$files = scandir($path);
					$files = array_diff(scandir($path), array('.', '..'));
					$colCount = 0;
					foreach($files as $file){
							if ($colCount == 0) {
								echo '<div class="row">';
							}
		
							echo '<div class="column" onclick=\'SetBackground("' . str_replace('.css', '' , $file) . '")\' style=\'background-image: url("../images/backgrounds/' . str_replace('.css', '' , $file) . '.svg"); background-repeat: repeat;\'>';
							echo '<h2>' . str_replace('.css', '' , $file) . '</h2>';
							echo '<p>Some text..</p>';
							echo '</div>';
							if ($colCount == 2) {
								echo '</div>';
								$colCount = 0;
							}
							else{
								$colCount += 1;
							}
					}
			?>
		</div>
	</div>
	</div> <!-- ghost div? Modals aren't seperated without div here-->
	<div id="modalProfile" class="modal">
	<!-- Modal content -->
		<div class="modal-content">
		<span class="close" onclick="Close(event);">&times;</span>
		    <h2>Select a new Profile Image:</h2>
			<p><i>remember to save changes</i></p>
			<button onclick="listView()"><i class="fa fa-bars"></i> List</button>
			<button onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
			<div id="avatarOptions">
			</div>
		</div>
	</div>
	<div id="modalTitle" class="modal">
	<!-- Modal content -->
		<div class="modal-content">
		<span class="close" onclick="Close(event);">&times;</span>
		    <h2>Select a new Title:</h2>
			<p><i>remember to save changes</i></p>
			<button onclick="listView()"><i class="fa fa-bars"></i> List</button>
			<button onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
			<div id="titleOptions">
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

            <script type="text/javascript">
				function SaveChanges(){
					//get friends
					var friendDiv = document.getElementById('FriendsProgress').getElementsByTagName("a");
					var friendJson = "";
					console.log(friendDiv);
					for ( i = 0; i < friendDiv.length; i++){
						if (i == (friendDiv.length - 1)){
							friendJson += "{" + friendDiv[i].id + "}";
						}
						else{
							friendJson += "{" + friendDiv[i].id + "},";
						}
						console.log(friendDiv[i].id);	
					}
					console.log(friendJson);
					document.body.innerHTML += '<form id="dynForm" action="profileEditSaveChanges.php" method="post">' +
				'<input type="hidden" name="avatar" value="' + document.getElementById("profileImg").src.replace('http://levels.drinkup.wtf/images/avatars/', '').replace('.svg', '') + '">' +
				'<input type="hidden" name="template" value="' + document.getElementById("stylesheetTemplate").href.replace('http://levels.drinkup.wtf/css/templates/', '').replace('.css', '') + '">' +
				'<input type="hidden" name="friendList" value="' + friendJson + '">' +
				'<input type="hidden" name="userName" value="' + document.getElementById("profileName").value + '">' +
				'<input type="hidden" name="userDesc" value="' + document.getElementById("profileDesc").value + '">' +
				'<input type="hidden" name="userTitle" value="' + document.getElementById("profileTitleId").innerHTML + '">' +
				'</form>';
				document.getElementById("dynForm").submit();
					
					
				};

				function removeFriend(ev){
					if (confirm('Are you sure you want to remove this friend?')) {
						ev.srcElement.parentElement.remove();
					} else {
						console.log('Do nothing');
					}
					
				};
				
				function DeleteProfile(){
					if (confirm('Are you sure you want to delete this profile?')) {
						if(confirm('Are 100% sure? All data will be lost an cannot be recovered.')){
							if(confirm('Last warning. Data will be deleted after this.')){
								console.log('Delete profile');
							}
						}
					} else {
						console.log('Do nothing');
					}
					
				};
				
				function History(){
					document.body.innerHTML += '<form id="dynForm" action="../history/" method="post">' +
				'<input type="hidden" name="profileID" value="<?php echo $_POST["profileID"];?>"><input type="hidden" name="userID" value="<?php echo $_SESSION["userID"];?>"></form>';
				document.getElementById("dynForm").submit();
					
					
				};
				
				
				function ChangeBackground(){
					var modal = document.getElementById("myModal");
					var span = document.getElementsByClassName("close")[0];
					modal.style.display = "block";
				};
				
				function SetBackground(background){
					var stylesheet = document.getElementById("stylesheetTemplate");
					stylesheet.href='../css/templates/' + background + '.css';
				};
				
				function ChangeProfile(){
					var modal = document.getElementById("modalProfile");
					var span = document.getElementsByClassName("close")[0];
					modal.style.display = "block";	
				};
				
				function SetProfile(prof){
					var profile = document.getElementById("profileImg");
					profile.src='../images/avatars/' + prof + '.svg';
				};
				
				function ChangeTitle(){
					var modal = document.getElementById("modalTitle");
					var span = document.getElementsByClassName("close")[0];
					modal.style.display = "block";	
				};
				
				function SetTitle(title, id){
					var profile = document.getElementById("profileTitle");
					profile.innerHTML = title;
					document.getElementById("profileTitleId").innerHTML = '{' + id + '}';
				};
				
				function Close(ev){
					ev.srcElement.parentElement.parentElement.style.display = "none";
					
				}
				// Get the elements with class="column"
				var elements = document.getElementsByClassName("column");
				var i;

				// List View
				function listView() {
					for (i = 0; i < elements.length; i++) {
					elements[i].style.width = "100%";
					}
				}

// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "33%";
  }
}
				

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
			$sth = $conn->prepare('SELECT CONCAT("{\"ProfileID\":\"" , p.ProfileID , "\",\"Name\":\"" , p.Name , "\",\"Level\":\"", p.Level , "\",\"Xp\":\"" , p.XP , "\",\"Desc\":\"" , p.Description , "\",\"Title\":\"" , p.Title , "\",\"ActiveTitle\":\"" , p.ActiveTitle , "\",\"XpToLevel\":\"" , p.XpToLevel , "\",\"Template\":\"" , p.Template , "\",\"Avatar\":\"" , p.Avatar , "\"}") FROM Profile_Details p where p.ProfileID = ?');
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
	document.getElementById("profileName").value = jsonData[0].Name;
	document.getElementById("profileTitle").innerHTML = jsonData[0].Title;
	document.getElementById("profileTitleId").innerHTML = jsonData[0].ActiveTitle;
	document.getElementById("profileLevel").innerHTML = jsonData[0].Level;
	document.getElementById("profileXp").innerHTML = jsonData[0].Xp + '/' + jsonData[0].XpToLevel ;	
	document.getElementById("profileDesc").value = jsonData[0].Desc;
	document.getElementById("profileImg").src = '../images/avatars/' + jsonData[0].Avatar + '.svg';
	var link = document.createElement('link');
		link.id = "stylesheetTemplate";
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
	document.getElementById("FriendsProgress").innerHTML += '<div><a style="border: 1px solid red; color: red;" id="' + jsonDataFriends[i].ProfileID + '" onclick="removeFriend(event)">X </a><small>' + jsonDataFriends[i].Name + ' - ' + jsonDataFriends[i].Title + ' (lvl: ' + jsonDataFriends[i].Level + ')</small><div class="progress mb-3" style="height: 20px;"><div class="progress-bar bg-primary" role="progressbar" style="width: ' + percent + '%;" aria-valuenow="' + jsonDataFriends[i].Xp +'" aria-valuemin="0" aria-valuemax="' + jsonDataFriends[i].XpToLevel + '">' + jsonDataFriends[i].Xp + ' / ' + jsonDataFriends[i].XpToLevel + '</div></div></div>' 

  
  
  
  
}

//Load Unlocked Title and Avatar options
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
	$sth = $conn->prepare('SELECT GROUP_CONCAT(CONCAT("{\"ObjID\":\"" , t.Position , "\",\"Title\":\"" , t.Title , "\",\"Category\":\"" , t.Category , "\",\"Avatar\":\"" , IFNULL(t.Avatar, "") , "\",\"Requirement\":\"", Requirements , "\",\"PreReq\":\"" , t.PreReq , "\",\"Image\":\"" , t.Image , "\",\"X\":" , t.X , ",\"Y\":" , t.Y , ",\"Claimed\":\"" , case when FIND_IN_SET(concat("{" , t.Category , ":" , t.Position , "}"),p.UnlockedTitles) > 0 THEN "TRUE" ELSE "FALSE" END , "\"}") order by t.Category, t.Position) FROM Profiles p ,Titles t where p.ProfileID = ? and case when FIND_IN_SET(concat("{" , t.Category , ":" , t.Position , "}"),p.UnlockedTitles) > 0 THEN "TRUE" ELSE "FALSE" END = "TRUE"');
	$sth->bind_param("s", $profileID);
	
	$sth->execute();
	
	
	
	$sth->store_result();
	$sth->bind_result($rName);
	// Fetch all matching rows

	while($sth->fetch()){
		echo "[" . preg_replace('/[\t\n\r]+/i', '<br>', $rName) . "]";
	}

	$conn->close();

?>';
var jsonDataUnlocked = JSON.parse(jsonString);
var colCountAvater = 1;
var colCountTitle = 1;
var avatarContent = "";
var titleContent = "";
for (var i = 0; i < jsonDataUnlocked.length; i++){
	//Only add if avatar is unlocked
	if(jsonDataUnlocked[i].Avatar != ""){
		if (colCountAvater == 1) {
			avatarContent += '<div class="row">';
		}
		avatarContent += '<div class="column" onclick=\'SetProfile("' + jsonDataUnlocked[i].Avatar +  '")\'>' +
		'<img src="..\\images\\avatars\\' + jsonDataUnlocked[i].Avatar + '.svg" alt="Admin" width="80" height="80px">' +
		'<p>' + jsonDataUnlocked[i].Avatar + '</p>' +
		'</div>';
		if (colCountAvater == 3) {
			avatarContent += '</div>';
			colCountAvater = 0;
		}
		colCountAvater += 1;
	}

	//All achievements have title so add all titles
	if (colCountTitle == 1) {
		titleContent += '<div class="row">';
	}
	titleContent += '<div class="column" onclick=\'SetTitle("' + jsonDataUnlocked[i].Title +  '", "' + jsonDataUnlocked[i].Category + ':' + jsonDataUnlocked[i].ObjID + '")\'>' +
		'<h2>' + jsonDataUnlocked[i].Title + '</h2>' +
		'<p>' + jsonDataUnlocked[i].Requirement + '</p>' +
		'</div>';
	if (colCountTitle == 3) {
			titleContent += '</div>';
			colCountTitle = 0;
		}
	colCountTitle += 1;
};
document.getElementById("avatarOptions").innerHTML = avatarContent;
document.getElementById("titleOptions").innerHTML = titleContent;



function GetPercent(numerator, denominator) {
  if (denominator == 0 || isNaN(denominator)) {
        return 0;
  }
  else {
        return Math.trunc((numerator / denominator) * 100);
  }
}

			</script>

    </body>
</html>
