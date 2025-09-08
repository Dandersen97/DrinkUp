<?php 
	SESSION_START();
?>
<?php
	error_reporting(E_ALL); ini_set('display_errors', 1);
	$_SESSION["user"] = "asdf";
	$servername = file_get_contents('..\php\SqlConn.txt');
	$username = "WriteOnly";
	$password = "c1f5tS5?.qq45r0B";
	$dbname = "DrinkingLevels";
	$timestamp = time();
	
	$UserID = "default";
	$profileID = "default";
	$drinkName = "default";
	$drinkID = "default";
	$drinkSize = "default";
	$abv = "default";
	$type = "default";
	$comment = "default";
	$rating = "default";
	$recipe = "default";
	
	if(isset($_SESSION["userID"])){
		$UserID = $_SESSION["userID"];
	}
	if(isset($_SESSION["profileID"])){
		$profileID = $_SESSION["profileID"];
	}
	if(isset($_POST["drinkName"])){
		$drinkName = $_POST["drinkName"];
	}
	if(isset($_POST["drinkID"])){
		$drinkID = $_POST["drinkID"];
	}
	if(isset($_POST["abv"])){
		$abv = $_POST["abv"];
	}
	if(isset($_POST["type"])){
		$type = $_POST["type"];
	}
	if(isset($_POST["comment"])){
		$comment = $_POST["comment"];
	}
	if(isset($_POST["rating"])){
		$rating = $_POST["rating"];
	}
	if(isset($_POST["recipe"])){
		$recipe = $_POST["recipe"];
	}
	if(isset($_POST["drinkSize"])){
		$drinkSize = $_POST["drinkSize"];
	}
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "Connectiong Failed" . $conn->connect_error;
		die("Connection failed: " . $conn->connect_error);
	}
	
	//New Drink - not already in drinks table
	if ($drinkID == 0){
		$drinkID = $timestamp;
		$newDrink = $conn->prepare("INSERT INTO `Drinks` (`DrinkID`, `DrinkName`, `DrinkRecipe`, `ABV`, `Type`) VALUES (?, ?, ?, ?, ?)");
		$newDrink->bind_param("sssss", $drinkID, $drinkName, $recipe, $abv, $type);
		$newDrink->execute();
	}
	
	echo $profileID . " - " . $UserID . " - " . $drinkName . " - " . $drinkID . " - " . $abv . " - " . $comment . " - " . $rating . " - " . $recipe . " - " . $type . " - " . $drinkSize;
	
	//Add drink to default profile
	$sthp = $conn->prepare("INSERT INTO `UserHistory` (`RowID`, `DrinkID`, `UserID`, `ProfileID`, `DrinkSize`, `Timestamp`, `Rating`, `Notes`) VALUES  (NULL, ? , ? , ?, ?, CURRENT_TIMESTAMP, ?, ?)");
	$sthp->bind_param("ssssss", $drinkID, $UserID, $UserID, $drinkSize, $rating, $comment);
	$sthp->execute();
	
	//Add drink to other profile (not default)
	if($UserID <> $profileID){
		$sthp = $conn->prepare("INSERT INTO `UserHistory` (`RowID`, `DrinkID`, `UserID`, `ProfileID`, `DrinkSize`, `Timestamp`, `Rating`, `Notes`) VALUES  (NULL, ? , ? , ?, ?, CURRENT_TIMESTAMP, ?, ?)");
		$sthp->bind_param("ssssss", $drinkID, $UserID, $profileID, $drinkSize, $rating, $comment);
		$sthp->execute();
	}


	$conn->close();
	echo "go back to profile";
	//header("Location: ..\profileSelect.php");
	
?>

<script>
	window.location.href='../profile/index.php'	
</script>
<body>

</body>