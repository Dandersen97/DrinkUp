<?php 
	SESSION_START();
	error_reporting(E_ALL); ini_set('display_errors', 1);
?>
<?php
	/*
	//$_SESSION['user'];
	//$_SESSION['pin'];
	$servername = file_get_contents('php\SqlConn.txt');
	$username = "ReadOnly";
	$password = "3D8.5utpT9pk!1d4";
	$dbname = "DrinkingLevels";
	$user = "default";
	$pin = "0000";
	$_SESSION["userid"] = "";

	if(isset($_POST["username"])){
		$user = $_POST["username"];
		$_SESSION['user'] = $_POST["username"];
	}
	elseif(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
	}
	if(isset($_POST["pin"])){
		$pin = $_POST["pin"];
		$_SESSION['pin'] = $_POST["pin"];
	}
	elseif(isset($_SESSION['pin'])){
		$pin = $_SESSION['pin'];
	}
	
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "Connectiong Failed" . $conn->connect_error;
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT UserId from Users where upper(username) = UPPER('" . $user . "') and pin = '" . $pin . "'";
	$result = $conn->query($sql);
	$conn->close();
	//echo "Returned rows are: " . $result -> num_rows;

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {			
			$_SESSION["userid"] = $row["UserId"];
		}
	} else {
		//header("Location: index.php?login=invalid");
	}
	*/
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Drinking Levels - Profile Select</title>



    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/product.css" rel="stylesheet">
	<link href="css/templates/Default.css" rel="stylesheet">
	
	
  </head>
  
  <body>
    
<header class="site-header sticky-top py-1">
  <nav class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="#" aria-label="Product">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24"><title>Back to Top</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
    </a>
  </nav>
</header>

<main id="main">
  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light" id="mainWelcome"></div>

  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3" id="profiles">
    
  </div>

</main>




    <script src="js/bootstrap.bundle.min.js"></script>
<script>
	console.log("script started");
		var jsonString = '<?php
			error_reporting(E_ALL); ini_set('display_errors', 1);
			$servername = file_get_contents('php\SqlConn.txt');
			$username = "ReadOnly";
			$password = "3D8.5utpT9pk!1d4";
			$dbname = "DrinkingLevels";


			if(isset($_COOKIE["userId"])){
				$user = $_COOKIE["userId"];
			}
			elseif(isset($_SESSION['userid'])){
				$user = $_SESSION['userid'];
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
			$sth = $conn->prepare('SELECT GROUP_CONCAT(CONCAT("{\"ProfileID\":\"" , p.ProfileID , "\",\"UserID\":\"" , p.UserID , "\",\"Name\":\"" , p.Name , "\",\"Level\":\"", p.Level , "\",\"Xp\":\"" , p.XP , "\",\"Desc\":\"" , p.Description , "\",\"Title\":\"" , p.Title , "\",\"Template\":\"" , p.Template , "\"}") order by p.ProfileID ASC) FROM Profile_Details p where p.UserID = ?');
			$sth->bind_param("s", $user);
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
	document.getElementById("mainWelcome").innerHTML = '<div class="col-md-5 p-lg-5 mx-auto my-5"><h1 class="display-4 fw-normal">Welcome ' + jsonData[0].Name + '</h1><p class="lead fw-normal">Select your profile and start drinking!</p><a class="btn btn-outline-secondary" onclick="CreateProfile(<?php echo $_SESSION["userid"] ?>);">New Profile</a></div><div class="product-device shadow-sm d-none d-md-block"></div><div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>';
	for (let i=0; i < jsonData.length; i++){
			document.getElementById("profiles").innerHTML += '<div class="template-' + jsonData[i].Template + ' me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden"><div class="my-3 py-3"><h2 class="display-5">' + jsonData[i].Name + ' - ' + jsonData[i].Title +'</h2><p class="lead">' + jsonData[i].Desc + '<br>Level: ' + jsonData[i].Level + '</p><a class="btn btn-primary" onclick="SelectProfile(' + jsonData[i].ProfileID + ', ' + jsonData[i].UserID + ')">SELECT</a><br><a class="btn btn-secondary" onclick="SelectProfileAddDrink(' + jsonData[i].ProfileID + ', ' + jsonData[i].UserID + ')">Add Drink</a></div><div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 200px; border-radius: 21px 21px 0 0;"></div></div>';

		
	}



	function CreateProfile(userid){
		var name;
		var desc;
		
		name = prompt("Enter New Profile Name", "");
		if(name == '' || name === null) {
			alert("Profile NOT made");
		}
		else{
			desc = prompt("Enter New Profile Description", "");
			if(desc == '' || desc === null) {
				alert("Profile NOT made");
			}
			else{
				document.body.innerHTML += '<form id="dynForm" action="php/AddProfile.php" method="post"><input type="hidden" name="name" value="' + name + '"><input type="hidden" name="desc" value="' + desc + '"><input type="hidden" name="userid" value="' + userid + '"></form>';
				document.getElementById("dynForm").submit();
			}
		}	
	}
	
	
	function SelectProfile(profileID, userID){
		setCookie("profileId",profileID,1);
		setCookie("userId",userID,1);
		//document.body.innerHTML += '<form id="dynForm" action="/profile/" method="post"><input type="hidden" name="profileID" value="' + profileID + '"><input type="hidden" name="userID" value="' + userID + '"></form>';
		//document.getElementById("dynForm").submit();
		window.location.href='../profile/'
	}
	
	function SelectProfileAddDrink(profileID, userID){
		setCookie("profileId",profileID,1);
		setCookie("userId",userID,1);
		//document.body.innerHTML += '<form id="dynForm" action="/profile/" method="post"><input type="hidden" name="profileID" value="' + profileID + '"><input type="hidden" name="userID" value="' + userID + '"></form>';
		//document.getElementById("dynForm").submit();
		window.location.href='/newDrinkForm/'
	}
	
	
	function setCookie(name,value,days) {
		var expires = "";
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days*24*60*60*1000));
			expires = "; expires=" + date.toUTCString();
		}
		document.cookie = name + "=" + (value || "")  + expires + "; path=/";
	}

	function getCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	}
	</script>
      
  </body>
</html>
