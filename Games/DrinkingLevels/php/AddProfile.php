<?php 
	SESSION_START();
?>
<?php
	error_reporting(E_ALL); ini_set('display_errors', 1);
	$_SESSION["user"] = "asdf";
	$servername = file_get_contents('SqlConn.txt');
	$username = "WriteOnly";
	$password = "c1f5tS5?.qq45r0B";
	$dbname = "DrinkingLevels";
	$user = "default";
	$name = "default";
	$desc = "default";
	$timestamp = time();
	
	if(isset($_POST["userid"])){
		$user = $_POST["userid"];
	}
	if(isset($_POST["name"])){
		$name = $_POST["name"];
	}
	if(isset($_POST["desc"])){
		$desc = $_POST["desc"];
	}
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		echo "Connectiong Failed" . $conn->connect_error;
		die("Connection failed: " . $conn->connect_error);
	}


	echo $timestamp;
	/* Execute a prepared statement */ 
	$sthp = $conn->prepare("INSERT INTO `Profiles` (`ProfileID`, `UserID`, `Name`, `Description`, `ActiveTitle`) VALUES (?, ? , ? , ?, '{0:0}')");
	$sthp->bind_param("ssss", $timestamp, $user, $name, $desc);
	
	$sthp->execute();
	
	
	//$sth->store_result();
	//$sth->bind_result($rName);
	// Fetch all matching rows

	//while($sth->fetch()){
	//	echo "[" . preg_replace('/[\t\n\r]+/i', '<br>', $rName) . "]";
	//}

	$conn->close();
?>
<script>
	document.body.innerHTML += '<form id="dynForm" action="/profile/" method="post"><input type="hidden" name="profileID" value="' + <?php echo $_POST["profileID"]; ?> + '"><input type="hidden" name="userID" value="' + <?php echo $_POST["userID"]; ?> + '"></form>';
	document.getElementById("dynForm").submit();
		
</script>
<body>

</body>