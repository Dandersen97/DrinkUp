<?php
	session_start();

?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<link href="..\css\bootstrap.min.css" rel="stylesheet" />
		<link href="..\css\signin.css" rel="stylesheet">
		<style>
		body{
			display: block;
			padding-top: 0px;
		}
		body #sidebar-wrapper{
			margin-top: -16rem;			
		}
		
		body.sb-sidenav-toggled #sidebar-wrapper{
			margin-top: 0rem;
		}

		.collapsible {
			background-color: #eee;
			color: #444;
			cursor: pointer;
			width: 100%;
			border: none;
			text-align: left;
			outline: none;
			font-size: 15px;
		}

		.active, .collapsible:hover {
			background-color: #ccc;
		}
		
		.content {
			padding: 0 18px;
			background-color: white;
			max-height: 0;
			overflow: hidden;
			transition: max-height 0.2s ease-out;
		}
		</style>
	</head>
	<body class="bg-dark text-center">
		
		
		<!-- TOP SEARCH BAR-->
		<div id="sidebar-wrapper">
			<form class="form-signin rounded-bottom bg-light">
				<fieldset>
					<legend>SEARCH DRINKS</legend>
				</fieldset>
			<div>
				<div>
					<select id="drinkType">
						<option placeholder="">All Drinks</option>
						<option>CANS</option>
						<option>BOTTLES</option>
						<option>SHOTS</option>
						<option>MIXERS</option>
					</select>
				</div>
				<div>
					<label for="dateFrom">Date From</label>
					<input class="md-form md-outline form-control" id="dateFrom" type="date" placeholder="Until" />
				</div>
				<div>
					<label for="dateUntil">Date Until</label>
					<input class="md-form md-outline form-control" id="dateUntil" type="date" placeholder="Until" />
				</div>
			
				<div>
					<button class="btn btn-primary" type="button">SEARCH</button>
				</div>
			</div>
			</form>
		</div>

		<div>
			<button class="btn btn-primary rounded-bottom" id="searchToggle">&#8681;</button>
		</div>
		
		<div class="container-fluid px-1 py-1 mx-auto">
			<div class="m-auto w-95">
				<div>
				<main class="bg-light rounded">
					<h1>DRINK HISTORY</h1>
						<div class="text-start" id="HistoryLog">
							
						</div>

				</main>
				</div>
			</div>
		</div>
	



	</body>
			<?php
	if(isset($_SESSION["userID"]) && isset($_SESSION["profileID"])){
		$UserID = $_SESSION["userID"];
		$profileID = $_SESSION["profileID"];
	}
	else {
		echo '<script> document.body.innerHTML += \'<form id="dynForm" action="../index.php?login=invalid" method="post"></form>\'; document.getElementById("dynForm").submit();</script>';
	}
?>

<script>
	var jsonString = '<?php
			error_reporting(E_ALL); ini_set('display_errors', 1);
			$profileID = "0";
			$servername = file_get_contents('..\php\SqlConn.txt');
			$username = "ReadOnly";
			$password = "3D8.5utpT9pk!1d4";
			$dbname = "DrinkingLevels";


			if(isset($_SESSION["profileID"])){
				$profileID = $_SESSION["profileID"];
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
			$sth = $conn->prepare('SELECT GROUP_CONCAT(CONCAT("{\"DrinkName\":\"" , DrinkName , "\",\"DrinkRecipe\":\"" , DrinkRecipe , "\",\"RowID\":\"" , RowID , "\",\"DrinkID\":\"" , DrinkID , "\",\"Type\":\"", Type , "\",\"ABV\":\"" , ABV , "\",\"Rating\":\"" , Rating , "\",\"Notes\":\"" , Notes , "\",\"Timestamp\":\"" , Timestamp_Date , "\"}") ORDER BY Timestamp desc) from Profile_History where ProfileID = ?');
			$sth->bind_param("s", $profileID);
			$sth->execute();

	
			$sth->store_result();
			$sth->bind_result($rName);
			// Fetch all matching rows

			while($sth->fetch()){
				echo "[" . $rName . "]";
			}

			$conn->close();
		?>';

	console.log(jsonString);
	var jsonData = JSON.parse(jsonString);
	
	for (var i = 0; i < jsonData.length; i++){
	  document.getElementById("HistoryLog").innerHTML += '<div class="card mb-3 mx-2 p-1"><div><img class="icon icon1" src="..\\images\\' + jsonData[i].Type + '.svg" width="64" height= "64" style="float: left;"><div style="float: left; margin-left: 10px;"><h3> ' + jsonData[i].Timestamp + '</h3><h3> ' + jsonData[i].DrinkName + '</h3></div><div><button type="button" class="collapsible">See More...</button><div class="content"><p>You gave this drink a ' + jsonData[i].Rating + '/10</p><p>Recipe as follows</p><p>' + jsonData[i].DrinkRecipe + '<p>' + 
	  '<form id="' + jsonData[i].RowID +'" action="..\\newDrinkForm\\submitDrink.php" method="post">' +
'<input type="hidden" name="drinkName" value="' + jsonData[i].DrinkName + '">' +
'<input type="hidden" name="drinkID" value="' + jsonData[i].DrinkID + '">' +
'<input type="hidden" name="abv" value="' + jsonData[i].ABV + '">' +
'<input type="hidden" name="type" value="' + jsonData[i].Type + '">' +
'<input type="hidden" name="rating" value="' + jsonData[i].Rating + '">' +
'<input type="hidden" name="comment" value="' + jsonData[i].Notes + '">' +
'<input type="hidden" name="recipe" value="' + jsonData[i].DrinkRecipe + '"></form><button type="submit" form="' + jsonData[i].RowID +'" class="btn btn-primary">Submit Again</button></div></div>'
	}
			window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const searchToggle = document.body.querySelector('#searchToggle');
    if (searchToggle) {
        searchToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
				if(searchToggle.innerText == '\u21E9'){
					searchToggle.innerText = '\u21E7';
				} else {
					searchToggle.innerText = '\u21E9';
				}
        });
    }

	});
	
	var coll = document.getElementsByClassName("collapsible");
	var i;

	for (i = 0; i < coll.length; i++) {
		coll[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var content = this.nextElementSibling;
			if (content.style.maxHeight){
			content.style.maxHeight = null;
			} else {
			content.style.maxHeight = content.scrollHeight + "px";
			}
		});
	}
	
	
	
	
	
	
	
	
	
	
	</script>
</html>
