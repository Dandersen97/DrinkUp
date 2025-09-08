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


	error_reporting(E_ALL); ini_set('display_errors', 1);
	$_SESSION["user"] = "asdf";
	$servername = file_get_contents('..\php\SqlConn.txt');
	$username = "WriteOnly";
	$password = "c1f5tS5?.qq45r0B";
	$dbname = "DrinkingLevels";
	$timestamp = time();
	
	$userName = "Default";
	$profileID = "default";
	$avatar = "Default";
	$template = "Default";
	$friendList = "{}";
	$userDesc = "Default";
	$userTitle = "{0:0}";
	
	if(isset($_SESSION["profileID"])){
		$profileID = $_SESSION["profileID"];
	}
	if(isset($_POST["avatar"])){
		$avatar = $_POST["avatar"];
	}
	if(isset($_POST["template"])){
		$template = $_POST["template"];
	}
	if(isset($_POST["friendList"])){
		$friendList = $_POST["friendList"];
	}
	if(isset($_POST["userName"])){
		$userName = $_POST["userName"];
	}
	if(isset($_POST["userDesc"])){
		$userDesc = $_POST["userDesc"];
	}
	if(isset($_POST["userTitle"])){
		$userTitle = $_POST["userTitle"];
	}
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "Connectiong Failed" . $conn->connect_error;
		die("Connection failed: " . $conn->connect_error);
	}

	
	/* Execute a prepared statement */ 
	$sthp = $conn->prepare("UPDATE `Profiles` SET `Avatar` = ?, `Template` = ?, `FriendProfiles` = ?, `Name` = ?, `Description` = ?, `ActiveTitle` = ? WHERE `Profiles`.`ProfileID` = ?;");
	$sthp->bind_param("sssssss", $avatar, $template, $friendList, $userName, $userDesc, $userTitle, $profileID);
	
	$sthp->execute();
	
	
	//$sth->store_result();
	//$sth->bind_result($rName);
	// Fetch all matching rows

	//while($sth->fetch()){
	//	echo "[" . preg_replace('/[\t\n\r]+/i', '<br>', $rName) . "]";
	//}

	$conn->close();
	//echo "go back to profile";
	echo $_POST["avatar"] . '</br>' . $_POST["template"]. '</br>' .  $_SESSION["userID"]. '</br>'. $_SESSION["profileID"];
	
	header("Location: index.php");
?>

