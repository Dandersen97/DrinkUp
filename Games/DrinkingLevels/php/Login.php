<?php 
	SESSION_START();
?>
<?php
	error_reporting(E_ALL); ini_set('display_errors', 1);
	$_SESSION["user"] = "asdf";
	$servername = file_get_contents('SqlConn.txt');
	$username = "ReadOnly";
	$password = "3D8.5utpT9pk!1d4";
	$dbname = "DrinkingLevels";
	$user = "default";
	$pin = "0000";

	if(isset($_GET["user"])){
		$user = $_GET["user"];
	}
	if(isset($_GET["pin"])){
		$pin = $_GET["pin"];
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
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo $row["UserId"];
		}
	} else {
		echo "0";
	}


	

?>
