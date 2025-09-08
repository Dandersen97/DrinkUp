<?php
	error_reporting(E_ALL); ini_set('display_errors', 1);
	$_SESSION["user"] = "asdf";
	$servername = file_get_contents('SqlConn.txt');
	$username = "ReadOnly";
	$password = "3D8.5utpT9pk!1d4";
	$dbname = "DrinkingLevels";


	if(isset($_GET["username"])){
		$user = $_GET["username"];
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
	$sth = $conn->prepare('SELECT GROUP_CONCAT(
	CONCAT(
		"{\"ProfileID\":\"" , p.ProfileID 
		, "\",\"Name\":\"" , p.Name 
		, "\",\"Level\":\"", p.Level 
		, "\",\"Xp\":\"" , p.XP 
		, "\",\"Desc\":\"" , p.Description 

		, "\",\"Title\":\"" , p.Title , "\"}")) 

FROM Profile_Details p

where UPPER(p.Username) = UPPER(?)');
	$sth->bind_param("s", $user);
	$sth->execute();
	
	
	
	$sth->store_result();
	$sth->bind_result($rName);
	// Fetch all matching rows

	while($sth->fetch()){
		echo "[" . preg_replace('/[\t\n\r]+/i', '<br>', $rName) . "]";
	}

	$conn->close();

?>