<?php
	error_reporting(E_ALL); ini_set('display_errors', 1);
	$_SESSION["user"] = "asdf";
	$servername = file_get_contents('SqlConn.txt');
	$username = "ReadOnly";
	$password = "3D8.5utpT9pk!1d4";
	$dbname = "DrinkingLevels";

	
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
	$sth = $conn->prepare('SELECT GROUP_CONCAT(CONCAT("{\"ObjID\":\"" , Position , "\",\"Title\":\"" , Title , "\",\"Requirement\":\"", Requirements , "\",\"PreReq\":\"" , PreReq , "\",\"Image\":\"" , Image , "\",\"X\":\"" , X , "\",\"Y\":\"" , Y , "\"}")) FROM DrinkingLevels.Titles where Category = 3');
	
	$sth->execute();
	
	
	
	$sth->store_result();
	$sth->bind_result($rName);
	// Fetch all matching rows

	while($sth->fetch()){
		echo "[" . preg_replace('/[\t\n\r]+/i', '<br>', $rName) . "]";
	}

	$conn->close();

?>