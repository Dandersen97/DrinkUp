<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "life";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT Money from players where color = UPPER('" . $_GET["COLOR"] . "')";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo number_format($row["Money"]);
		}
	} else {
		echo "NO MONEY";
	}
	$conn->close();
?>
