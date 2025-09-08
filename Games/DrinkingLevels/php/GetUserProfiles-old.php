<?php 
	SESSION_START();
?>
<?php
	error_reporting(E_ALL); ini_set('display_errors', 1);
	$_SESSION["user"] = "asdf";
	$servername = file_get_contents('SqlConn.txt');
	$username = "RootAdmin";
	$password = "npifgf45M0huZkRDUWaH";
	$dbname = "DrinkingLevels";
	$userid = "default";

	if(isset($_GET["userid"])){
		$userid = $_GET["userid"];
	}

	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT ProfileId, Name, Description, Level from Profiles where userid = '" . $userid . "'";
	$result = $conn->query($sql);
	$conn->close();
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "ProfileId:" . $row["ProfileId"] . ",ProfileName:" . $row["Name"] . ",ProfileDesc:" . $row["Description"] . ",ProfileLevel:" . $row["Level"] . ";";
		}
	} else {
		echo "Invalid User ID";
	}

?>