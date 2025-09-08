<?php
	SESSION_START();

?>

<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


    <title>Bingo - Easy</title>
</head>

<body>
	<style>
	.grid-container {
		display: grid;
		grid-template-columns: 115px 115px 115px 115px 115px;
		grid-template-rows: 115px 115px 115px 115px 115px;
		padding: 10px;
	}
	.grid-item {
		background-color: #d6e9f9;
		border: 1px solid rgba(0, 0, 0, 0.8);
		padding: 20px;
		font-size: 1em;
		text-align: center;
		overflow: hidden auto;
	}
	
	.hard {
		background-color: #b9cfe2;
	}
	
	.class {
		background-color: #c0e2fe;
	}
	
	.claimed {
		background-color: rgba(100, 255, 100, 1);
	}
	/* The Modal (background) */
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content/Box */
	.modal-content {
		background-color: #fefefe;
		margin: 15% auto; /* 15% from the top and centered */
		padding: 20px;
		border: 1px solid #888;
		width: 80%; /* Could be more or less, depending on screen size */
	}

	/* The Close Button */
	.close {
		color: #aaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: black;
		text-decoration: none;
		cursor: pointer;
	}				
	</style>
	<div class="grid-container" id="bingoCard">
		<div class="grid-item" id="grid-item1" onclick="ClaimTitleModal(event)">1</div>
		<div class="grid-item" id="grid-item2" onclick="ClaimTitleModal(event)">2</div>
		<div class="grid-item" id="grid-item3" onclick="ClaimTitleModal(event)">3</div>
		<div class="grid-item" id="grid-item4" onclick="ClaimTitleModal(event)">4</div>
		<div class="grid-item" id="grid-item5" onclick="ClaimTitleModal(event)">5</div>
		<div class="grid-item" id="grid-item6" onclick="ClaimTitleModal(event)">6</div>
		<div class="grid-item" id="grid-item7" onclick="ClaimTitleModal(event)">7</div>
		<div class="grid-item" id="grid-item8" onclick="ClaimTitleModal(event)">8</div>
		<div class="grid-item" id="grid-item9" onclick="ClaimTitleModal(event)">9</div>
		<div class="grid-item" id="grid-item10" onclick="ClaimTitleModal(event)">10</div>
		<div class="grid-item" id="grid-item11" onclick="ClaimTitleModal(event)">11</div>
		<div class="grid-item" id="grid-item12" onclick="ClaimTitleModal(event)">12</div>
		<div class="grid-item" id="grid-item13" onclick="ClaimTitleModal(event)">13</div>
		<div class="grid-item" id="grid-item14" onclick="ClaimTitleModal(event)">14</div>
		<div class="grid-item" id="grid-item15" onclick="ClaimTitleModal(event)">15</div>
		<div class="grid-item" id="grid-item16" onclick="ClaimTitleModal(event)">16</div>
		<div class="grid-item" id="grid-item17" onclick="ClaimTitleModal(event)">17</div>
		<div class="grid-item" id="grid-item18" onclick="ClaimTitleModal(event)">18</div>
		<div class="grid-item" id="grid-item19" onclick="ClaimTitleModal(event)">19</div>
		<div class="grid-item" id="grid-item20" onclick="ClaimTitleModal(event)">20</div>
		<div class="grid-item" id="grid-item21" onclick="ClaimTitleModal(event)">21</div>
		<div class="grid-item" id="grid-item22" onclick="ClaimTitleModal(event)">22</div>
		<div class="grid-item" id="grid-item23" onclick="ClaimTitleModal(event)">23</div>
		<div class="grid-item" id="grid-item24" onclick="ClaimTitleModal(event)">24</div>
		<div class="grid-item" id="grid-item25" onclick="ClaimTitleModal(event)">25</div>
	</div>
	<button onclick="ClearCard();">New Card</button>
	<button onclick="GetDare();">Dare!</button>
	<div id="modalClaim" class="modal">
	<!-- Modal content -->
		<div class="modal-content">
			<span class="close" onclick="Close(event);" style="color: red;">&times;</span>
		    <h2>Claim Tile?</h2>
			<p>Requirement: </p>
			<p><b id="modReq">Requirement Here</b></p>
			<p><i>(Remember to annouce claiming)</i></p>
			<button onclick="ClaimAch(event);" id="ClaimButton">CLAIM</button>
		</div>
	</div>

	

	
	
	<script id="jsonDataText" type="text" src="jsonData.txt"></script>
	<script>
		var tmpClass = "";
		var jsonString = `{
				"Generic":{
					"Category":"Generic",
					"Tasks":[
						{"Task":"Upgrade your pipe"},
						{"Task":"Disarm a trap"},
						{"Task":"Proceed past a trap on your first try"},
						{"Task":"Buy any item worth 100+ gold"},
						{"Task":"Die and come back to life"},
						{"Task":"Fail on all rolls of an attack"},
						{"Task":"Have 51+ Luck at anytime"},
						{"Task":"Hit all 3 enemies at the same time"},
						{"Task":"End a fight at or below 10 health"},
						{"Task":"End a fight at full health WITHOUT a level up"},
						{"Task":"Tribute to a Hero"},
						{"Task":"Heal at a fountain"},
						{"Task":"Loot a dead body"},
						{"Task":"Obtain a Sactum"},
						{"Task":"Obtain a Rare Item"},
						{"Task":"Obtain a Lore Book"},
						{"Task":"Obtain an item in each inventory slot (excluding shield)"},
						{"Task":"Obtain 6+ Max Focus"},
						{"Task":"Obtain 3+ Immunities"},
						{"Task":"Use a Godsbeard"},
						{"Task":"Use a Panax to cure poison"},
						{"Task":"Use a Hermit Grass in combat"},
						{"Task":"Use a Dancing Nettle in combat"},
						{"Task":"Use a Scholars Wart to level up"},
						{"Task":"Use a Hags Bane to remove a curse"},
						{"Task":"Use an item to permanently increase any stat"},
						{"Task":"Use an orb in combat"},
						{"Task":"Consume a beverage in combat"},
						{"Task":"Experience Poisoning"},
						{"Task":"Experience Bleeding"},
						{"Task":"Experience Burning"},
						{"Task":"Experience Confused"},
						{"Task":"Experience Stunned / Dazed"},
						{"Task":"Experience Frozen"},
						{"Task":"Experience Shocked"},
						{"Task":"Experience Wet"},
						{"Task":"Inflict a status effect on an enemy"},
						{"Task":"Kill no enemies in a fight"},
						{"Task":"Kill a Skeleton"},
						{"Task":"Kill a Human"},
						{"Task":"Kill a Humanoid"},
						{"Task":"Kill an Animated Object"},
						{"Task":"Kill an Animal"},
						{"Task":"Kill an enemy with resistance of 5+"},
						{"Task":"Kill an enemy with armor of 5+"},
						{"Task":"Kill a flying or levitating enemy"},
						{"Task":"Kill an enemy with 100+ health"},
						{"Task":"Kill 2+ enemies in a fight"},
						{"Task":"Kill an enemy with 3+ immunities"},
						{"Task":"Kill an enemy on 4 legs"},
						{"Task":"Kill an enemy with both armor and resistance"},
						{"Task":"Kill an enemy that uses a ranged weapon"},
						{"Task":"Kill an enemy that uses a melee weapon"},
						{"Task":"Kill an enemy that uses a magic weapon"},
						{"Task":"Kill an enemy that killed another player"},
						{"Task":"Fight a Mimic"},
						{"Task":"Fight a Scourge"}
					]
				},
				"DARE":{
					"Category":"Dare",
					"Tasks":[
						{"Task":"Take 2 shots. 1 decided by each other player"},
						{"Task":"Do the same dare as another player (if everyone has this dare, all get a new dare)"},
						{"Task":"Take 3 drinks"},
						{"Task":"Take 5 drinks"},
						{"Task":"Take a shot"},
						{"Task":"Finish your drink"},
						{"Task":"Add a shot to your drink"},
						{"Task":"Call a friend. If they DONT answer take a shot"},
						{"Task":"Call a friend. If they DO answer take a shot"},
						{"Task":"Flip and call a coin. If wrong, take a shot"},
						{"Task":"Guess the shirt color of another player until right. Take a drink for each wrong guess"},
						{"Task":"Write down the letter A, B, or C. Take 2 drinks for each other player to guess your letter"},
						{"Task":"Take a drink and another new dare"}
					]
				}
			}`;
			
		var jsonData = JSON.parse(jsonString);
			
			
			
		function Close(ev){
			var tmpClassItems = document.getElementsByClassName(tmpClass);
			for(var i = 0; i < tmpClassItems.length; i++)
			{
				tmpClassItems[i].classList.remove(tmpClass);
			}
			ev.srcElement.parentElement.parentElement.style.display = "none";			
		};
		
		function ClaimTitleModal(ev){
			tmpClass = ev.srcElement.id;
			ev.srcElement.classList.add(tmpClass);
			
			document.getElementById("modReq").innerHTML = document.getElementsByClassName(tmpClass)[0].innerText;
			var modal = document.getElementById("modalClaim");
			modal.style.display = "block";			
		};
		
		function ClaimAch(ev){
			var tmpClassItems = document.getElementsByClassName(tmpClass);
			for(var i = 0; i < tmpClassItems.length; i++)
			{
				tmpClassItems[i].classList.add("claimed");
				localStorage.setItem("bingoCard", document.getElementById("bingoCard").innerHTML);
			}
			
			Close(ev);
		};
		
		function RandomNum(min, max) { // min and max included 
			return Math.floor(Math.random() * (max - min) + min)
		};
		
		function checkStorage() {
			let card = localStorage.getItem("bingoCard");
			if (card != "") {
				document.getElementById("bingoCard").innerHTML = card;
			} 
			else {
				console.log("missing storage card");
				CreateCard();
			}
		};
		
		function ClearCard(){
			if(confirm("Get a new card?")){
				localStorage.setItem("bingoCard", "");
				location.reload();
			}	
		};
		
		function NewClass(nClass){
			if(confirm("New Class?")){
				localStorage.setItem("bingoCard", "");
				window.location.href = "index.php?class=" + nClass;
			}	
		};
		
		function GetDare(){
			var taskCount = jsonData["DARE"].Tasks.length;
			var randNum = RandomNum(0, taskCount);
			alert(jsonData["DARE"].Tasks[randNum].Task);
		};
		
		function CreateCard(){
			console.log(jsonData);
	
			//Load Generic Tasks
			var taskCount = jsonData.Generic.Tasks.length;
			var repeatNum = [];
			for (let i=1; i <= 25; i++){
				var randNum = RandomNum(0, taskCount);
				var stopRepeat = false;
				
				while(!stopRepeat){
					if(!repeatNum.includes(randNum)){
						document.getElementById("grid-item" + i).innerHTML = jsonData.Generic.Tasks[randNum].Task;
						
						repeatNum[i] = randNum;
						stopRepeat = true;
					}
					else {
						var randNum = RandomNum(0, taskCount);
						stopRepeat = false;
					}
				}	
			}

			//Set Free Square
			//document.getElementById("grid-item13").innerHTML = "FREE";
			
			//Set Storage
			//Prevents accidental refresh from making new card
			localStorage.setItem("bingoCard", document.getElementById("bingoCard").innerHTML);
		};
		
		
		
window.onload = function() {
		//checkCookie();
		checkStorage();
		
		
		
}
	</script>
</body>
</html>