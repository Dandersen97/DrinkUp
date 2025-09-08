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
	$claimedAch = "{}";
	$category = 0;
	
	if(isset($_SESSION["profileID"])){
		$profileID = $_SESSION["profileID"];
	}
	if(isset($_POST["claimedAch"])){
		$claimedAch = $_POST["claimedAch"];
		$category = substr($claimedAch, 0, strpos($claimedAch, ':'));
	}

	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "Connectiong Failed" . $conn->connect_error;
		die("Connection failed: " . $conn->connect_error);
	}

	
	/* Execute a prepared statement */ 
	if($sthp = $conn->prepare("UPDATE `Profiles` set UnlockedTitles = case when UnlockedTitles IS NULL then concat('{', ?, '}') else concat(UnlockedTitles, ',{', ? ,'}') end where ProfileID = ?")) { // assuming $mysqli is the connection
			$sthp->bind_param('sss', $claimedAch, $claimedAch, $profileID);
			$sthp->execute();
		} else {
			$error = $conn->errno . ' ' . $conn->error;
			echo $error; // 1054 Unknown column 'foo' in 'field list'
		}
	

	
	
	//$sth->store_result();
	//$sth->bind_result($rName);
	// Fetch all matching rows

	//while($sth->fetch()){
	//	echo "[" . preg_replace('/[\t\n\r]+/i', '<br>', $rName) . "]";
	//}

	$conn->close();
	//echo "go back to profile";

	echo '-' . $category;
	header("Location: index.php?CategoryId=" . $category);
?>

