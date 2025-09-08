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
<?php
	error_reporting(E_ALL); ini_set('display_errors', 1);
	$_SESSION["user"] = "asdf";
	$servername = file_get_contents('..\php\SqlConn.txt');
	$username = "WriteOnly";
	$password = "c1f5tS5?.qq45r0B";
	$dbname = "DrinkingLevels";
	$timestamp = time();
	
	$UserID = "";
	$profileID = "";
	$friendCode = "";
	
	if((isset($_SESSION["userID"]) && !empty($_SESSION["userID"])) && (isset($_SESSION["profileID"])&& !empty($_SESSION["profileID"])) && (isset($_POST["friendCode"])&& !empty($_POST["friendCode"]))){
		$UserID = $_SESSION["userID"];
		$profileID = $_SESSION["profileID"];
		$friendCode = $_POST["friendCode"];
		
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			echo "Connectiong Failed" . $conn->connect_error;
			die("Connection failed: " . $conn->connect_error);
		}
	

		echo $profileID . " - " . $UserID . " - " . $friendCode;
		/* Execute a prepared statement */ 
		//$sthp = $conn->prepare("UPDATE Profiles set FriendProfiles = ? where UserID = ? and ProfileID = ?");	
		//$sthp = $conn->prepare("UPDATE Profiles set FriendProfiles = 123 where ProfileID = ?");		//UPDATE Profiles set FriendProfiles = 123 where UserID = 1632185629 and ProfileID = 1634159870
		//$sthp->bind_param("sss", $friendCode, ,$UserID, $profileID);
	
		if($sthp = $conn->prepare("UPDATE `Profiles` set FriendProfiles = case when FriendProfiles IS NULL then concat('{', ?, '}') else concat(FriendProfiles, ',{', ? ,'}') end where UserID = ? and ProfileID = ?")) { // assuming $mysqli is the connection
			$sthp->bind_param('ssss', $friendCode, $friendCode, $UserID, $profileID);
			$sthp->execute();
		} else {
			$error = $conn->errno . ' ' . $conn->error;
			echo $error; // 1054 Unknown column 'foo' in 'field list'
		}
	
		//$sthp->execute();

		$conn->close();
		//echo "go back to profile";
	}
	else {
		echo "invalid user or friend code...";
	}

	header("Location: /profile/");
exit();

?>

<
<body>
</body>