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
	$sql = "SELECT Color from players";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			/* echo "<div style='border: 1px solid '" . $row["Color"] . "; color: " . $row["Color"] . ";><p>" . $row["Color"] . "Player</p><img src='https://api.qrserver.com/v1/create-qr-code/?data=http://<?php echo $_SERVER['SERVER_ADDR'] ?>/TheGameOfLife/client/?color=" . $row["Color"] ."&amp;size=100x100' alt='' title='HELLO' /></div>" */
			echo "<div style='border: 1px solid ".$row["Color"]."; color:".$row["Color"].";'><p>".$row["Color"]."</p><img src='https://api.qrserver.com/v1/create-qr-code/?data=http://". $_SERVER['SERVER_ADDR']."/TheGameOfLife/client/?color=".$row["Color"]."&amp;size=100x100'></div>";
		}
	} else {
		echo "<h1>No Players</h1>";
	}
	$conn->close();
?>
