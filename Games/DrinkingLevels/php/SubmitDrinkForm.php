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
	$sql = $sql = "select group_concat(json_object(\'UserID\',UserID,\'Username\',Username,\'Pin\',Pin)) as UserJson from Users";
	$result = $conn->query($sql);
	$conn->close();
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "var JsonData = = JSON.parse(\'[" . $row["UserJson"] . "]\')";
		}
	} else {
		echo "0 Records Returned";
	}

?>