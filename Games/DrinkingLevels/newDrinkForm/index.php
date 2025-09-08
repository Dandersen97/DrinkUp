<?php
	session_start();
	
	if(isset($_COOKIE["userId"]) && isset($_COOKIE["profileId"])){
		$_SESSION['userID'] = $_COOKIE["userId"];
		$_SESSION['profileID'] = $_COOKIE["profileId"];
	}

	else{
		header("Location: ../index.php?login=invalid"); 
		exit;
	}
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Drink Form</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

		<link href="style.css" rel="stylesheet">
		
<script>
var jsonString = <?php
	error_reporting(E_ALL); ini_set('display_errors', 1);
	$servername = file_get_contents('..\php\SqlConn.txt');
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

	//$sql = "SELECT UserId from Users where upper(username) = UPPER('" . $user . "') and pin = '" . $pin . "'";
	$sqlSess = "SET SESSION group_concat_max_len = 1000000";
	$sqlSessresult = $conn->query($sqlSess);
	/* Execute a prepared statement */
	$sth = $conn->prepare('SELECT GROUP_CONCAT(CONCAT("{\"DrinkName\":\"" , DrinkName , "\",\"DrinkRecipe\":\"" , DrinkRecipe , "\",\"DrinkID\":\"" , DrinkID , "\",\"ABV\":\"" , ABV , "\",\"Type\":\"", Type , "\"}")) FROM Drinks');
	
	$sth->execute();
	
	$sth->store_result();
	$sth->bind_result($rName);
	// Fetch all matching rows

	while($sth->fetch()){
		echo "'[" . preg_replace('/[\t\n\r]+/i', '<br>', $rName) . "]'";
	}

	$conn->close();

?>;

var jsonDataDrinks = JSON.parse(jsonString);

		</script>
		<style>
			.modal-vis{
				display: none;
			}
			/*
			.slidecontainer {
			  width: 100%; /* Width of the outside container */
			}

			/* The slider itself */
			.slider {
			  -webkit-appearance: none;  /* Override default CSS styles */
			  appearance: none;
			  width: 100%; /* Full-width */
			  height: 25px; /* Specified height */
			  background: #d3d3d3; /* Grey background */
			  outline: none; /* Remove outline */
			  opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
			  -webkit-transition: .2s; /* 0.2 seconds transition on hover */
			  transition: opacity .2s;
			}

			/* Mouse-over effects */
			.slider:hover {
			  opacity: 1; /* Fully shown on mouse-over */
			}

			/* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */
			.slider::-webkit-slider-thumb {
			  -webkit-appearance: none; /* Override default look */
			  appearance: none;
			  width: 25px; /* Set a specific slider handle width */
			  height: 25px; /* Slider handle height */
			  background: #04AA6D; /* Green background */
			  cursor: pointer; /* Cursor on hover */
			}

			.slider::-moz-range-thumb {
			  width: 25px; /* Set a specific slider handle width */
			  height: 25px; /* Slider handle height */
			  background: #04AA6D; /* Green background */
			  cursor: pointer; /* Cursor on hover */
			}
			*/
		</style>
	</head>
	<body oncontextmenu="return false" class="snippet-body">
		<div class="container-fluid px-1 py-1 mx-auto primCont">
			<div class="row d-flex justify-content-center">
				<div class="col-xl-5 col-lg-6 col-md-7">
					<div class="card b-0">
						<h3 class="heading">Drink Submission</h3>
						<fieldset class="show">
							<div class="form-card">
								<h5 class="sub-heading">Drink Size</h5>
								<div class="row px-1 radio-group">
									<div class="card-block text-center radio" onclick="SelectType(event)" style="width: 95%;">
										<div class="image-icon">
											<img class="icon icon1" src="..\images\bottle.svg">
											<img class="icon icon1" src="..\images\can.svg">
											<img class="icon icon1" src="..\images\plasticCup.svg">
										</div>
										<p class="sub-desc">BOTTLE / CAN / RED SOLO</p>
										<p>12oz</p>
									</div>
									<div class="card-block text-center radio" onclick="SelectType(event)">
										<div class="image-icon"> <img class="icon icon1" src="..\images\shot.svg"> </div>
										<p class="sub-desc">SHOT</p>
										<p>1oz</p>
									</div>
									<div class="card-block text-center radio" onclick="SelectType(event)">
										<div class="image-icon"> <img class="icon icon1" src="..\images\mug.svg"></div>
										<p class="sub-desc">PINT</p>
										<p>16oz</p>
									</div>	
									<div class="card-block text-center radio" onclick="SelectType(event)">
										<div class="image-icon"> <img class="icon icon1" src="..\images\wineGlass.svg"> </div>
										<p class="sub-desc">WINE GLASS</p>
										<p>5oz</p>
									</div>									
									<div class="card-block text-center radio" onclick="SelectType(event)">
										<div class="image-icon"> <img class="icon icon1" src="..\images\mixer.svg"> </div>
										<p class="sub-desc">MIXER</p>
										<p>(drink calculator)</p>
									</div>
									
								</div> <button id="next1" class="btn-block btn-primary mt-3 mb-1 next" onclick="NextPage(event)">NEXT<span class="fa fa-long-arrow-right"></span></button>
							</div>
						</fieldset>
						<fieldset>
							<div class="form-card drinkInfo">
								<h5 class="sub-heading mb-4">Details</h5>
								
								<div class="form-group">
									<label class="form-control-label">Drink Name:</label>
									<input type="text" id="drinkName" name="drinkName" placeholder="" class="form-control" list="drinks" onchange="UpdateList(event)" required>
								</div>
								<div class="form-group">
									<label class="form-control-label">ABV:</label>
									<input type="number" id="abv" name="abv" placeholder="" class="form-control" required>
								</div>
								<div class="form-group" id="recipeDiv">
									<label class="form-control-label">Recipe:</label>
									<input type="text" id="recipe" name="recipe" placeholder="" class="form-control" required>
									<button class="btn btn-primary" onclick="ToggleCalculator()">Calculator</button>
								</div>
								<button id="next2" class="btn-block btn-primary mt-3 mb-1 next mt-4" onclick="NextPage(event)">NEXT<span class="fa fa-long-arrow-right"></span></button>
								<button class="btn-block btn-secondary mt-3 mb-1 prev" onclick="PrevPage()"><span class="fa fa-long-arrow-left"></span>BACK</button>
								<datalist id="drinks">
									<option value="Drink1"></option>
								</datalist>
							</div>
						</fieldset>
						<fieldset>
							<div class="form-card">
								<h5 class="sub-heading mb-4">Comments</h5>
								<div class="slidecontainer">
									<input type="range" min="1" max="10" value="1" class="slider" id="rating" oninput="UpdateSlider()">
									Rating: <label for="rating" id="ratingLabel">-</label>
								</div>
								<div class="form-group">
									<label class="form-control-label">Comment:</label>
									<input type="text" id="comment" name="comment" placeholder="" class="form-control" onblur="">
								</div>
								<button id="next3" class="btn-block btn-primary mt-3 mb-1 next mt-4" onclick="NextPage(event)">SUBMIT DRINK<span class="fa fa-long-arrow-right"></span></button>
								<button class="btn-block btn-secondary mt-3 mb-1 prev" onclick="PrevPage(event)"><span class="fa fa-long-arrow-left"></span>BACK</button>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
		<div id="CalculatorModal" class="modal-vis" style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%; background-color: rgba(255, 255, 255, .9); overflow-y: auto;">
			<button class="btn btn-primary" onclick="ToggleCalculator()" style="margin: 0px;">CLOSE</button>
			<iframe src="calc/index.php" title="Calculator" style="width: 100%; height: 100%;"></iframe>
		</div>

<script type="text/javascript">
function NextPage(event){
	var nextId = event.srcElement.id;
	var proceed= false;
	if(nextId == "next1"){
		SelectData();
		proceed = true;
	}
	else if(nextId == "next2"){
		console.log(event.target.closest("fieldset"));
		proceed = CheckRequired(event.target.closest("fieldset"));
	}
	else if(nextId == "next3"){
		console.log(event.target.closest("fieldset"));
		proceed = CheckRequired(event.target.closest("fieldset"));
		console.log(proceed);
		
		var selected = document.getElementsByClassName("selected");
		console.log(selected[0].querySelectorAll("p"));
		var drinkID = 0;
		var name = document.getElementById("drinkName").value;
		var abv = document.getElementById("abv").value
		var comment = document.getElementById("comment").value;
		var rating = document.getElementById("ratingLabel").innerText.replace('-', '0');
		var recipe = document.getElementById("recipe").value;
		var drinkSize = selected[0].querySelectorAll("p")[1].innerText.replace('oz', '');
		
		
		
		var type = selected[0].querySelector("p").innerText;
		
		
		
		for (let i=0; i < jsonDataDrinks.length; i++){
			if(jsonDataDrinks[i].DrinkName == document.getElementById("drinkName").value){
				drinkID = jsonDataDrinks[i].DrinkID;
			}
		}	
		
		
		document.body.innerHTML += '<form id="dynForm" action="submitDrink.php" method="post">' +
			'<input type="hidden" name="drinkName" value="' + name + '">' +
			'<input type="hidden" name="drinkID" value="' + drinkID + '">' +
			'<input type="hidden" name="abv" value="' + abv + '">' +
			'<input type="hidden" name="type" value="' + type + '">' +
			'<input type="hidden" name="comment" value="' + comment + '">' +
			'<input type="hidden" name="rating" value="' + rating + '">' +
			'<input type="hidden" name="recipe" value="' + recipe + '">' +
			'<input type="hidden" name="drinkSize" value="' + drinkSize + '">' +

			'</form>';
		document.getElementById("dynForm").submit();
	}
	
	
	
	if(proceed){	
		current_fs = document.getElementsByClassName("show");
		next_fs = current_fs[0].nextElementSibling;
		current_fs[0].classList.remove("show");
		next_fs.classList.add("show");
	}
}

function PrevPage(){
	current_fs = document.getElementsByClassName("show");
	prev_fs = current_fs[0].previousElementSibling;
	current_fs[0].classList.remove("show");
	prev_fs.classList.add("show");
}

function SelectData(){
	var selected = document.getElementsByClassName("selected");
	var selectedVal = selected[0].querySelector("p").innerText;
	SetDataOptions(selectedVal);
	if(selectedVal == "MIXER"){
		console.log("Show recipe and make required");
		document.getElementById("recipeDiv").style.display = "block";
		document.getElementById("recipe").required = true;
		document.getElementById("recipe").disabled = false;
		document.getElementById("recipe").classList.add("form-control");
	}
	else{
		console.log("hide recipe and make disabled");
		document.getElementById("recipeDiv").style.display = "none";
		document.getElementById("recipe").required = false;
		document.getElementById("recipe").disabled = true;
		document.getElementById("recipe").classList.remove("form-control");
	}
}


function SelectType(ev){
	var options = document.getElementsByClassName("radio");
	for(i = 0; i < options.length; i++){
		options[i].classList.remove("selected");
	}
	ev.target.closest(".radio").classList.add("selected");
}

function CheckRequired(fs){
	var inputs = fs.getElementsByTagName("input");
	for(i=0; i < inputs.length; i++){
		if(inputs[i].required == true){
			if(!inputs[i].value){
				return false;
			}
		}
	}
	
	
	return true;
}


function UpdateList(ev){
	console.log("updating drinks");
	console.log(ev.srcElement.value);
	for (let i=0; i < jsonDataDrinks.length; i++){
		if(jsonDataDrinks[i].DrinkName == ev.srcElement.value){
			document.getElementById("abv").value = jsonDataDrinks[i].ABV;
			document.getElementById("recipe").value = jsonDataDrinks[i].DrinkRecipe;
		}
	}
}

function SetDataOptions(type){
var datalist = document.getElementById("drinks");
var drinkOptions = "";
for (let i=0; i < jsonDataDrinks.length; i++){
	//if(jsonDataDrinks[i].Type.toUpperCase() == type.toUpperCase()){
		drinkOptions = drinkOptions + "<option value='" + jsonDataDrinks[i].DrinkName + "'>" + jsonDataDrinks[i].DrinkName + "</option>";
	//}
	
    
}

datalist.innerHTML = drinkOptions;
}

	
	
function ToggleCalculator(){
	var modal = document.getElementById("CalculatorModal");
	modal.classList.toggle("modal-vis");
	
}

function UpdateSlider(){
	var sliderVal = document.getElementById("rating").value;
	document.getElementById("ratingLabel").innerText = sliderVal;
}


</script>
                                
                            </body></html>