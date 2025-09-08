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
	$pin = "0000";
	$timestamp = time();
	
	if(isset($_POST["username"])){
		$user = $_POST["username"];
	}
	if(isset($_POST["pin"])){
		$pin = $_POST["pin"];
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
	$sth = $conn->prepare("INSERT INTO Users (`UserID`, `Username`, `Pin`) VALUES (?, ?, ?)"); 
	$sthp = $conn->prepare("INSERT INTO `Profiles` (`ProfileID`, `UserID`, `Name`, `Description`, `ActiveTitle`) VALUES (?, ? , ? , 'Everyday All Day', '{0:0}')");
	$sth->bind_param("sss", $timestamp, $user, $pin);
	$sthp->bind_param("sss", $timestamp, $timestamp, $user);
	
	$sth->execute();
	$sthp->execute();
	
	
	//$sth->store_result();
	//$sth->bind_result($rName);
	// Fetch all matching rows

	//while($sth->fetch()){
	//	echo "[" . preg_replace('/[\t\n\r]+/i', '<br>', $rName) . "]";
	//}

	$conn->close();
	
	//header("Location: ..\index.php?login=registered");
?>
<head>
<script>
window.onload = function() {
	document.body.innerHTML = '<form id="dynForm" action="../ProfileSelect.php" method="post"><input type="hidden" name="username" value="<?php echo $_POST["username"] ?>"><input type="hidden" name="pin" value="<?php echo $_POST["pin"] ?>"></form>';
		document.getElementById("dynForm").submit();
	};
	



</script>

</head>
<body>

</body>
