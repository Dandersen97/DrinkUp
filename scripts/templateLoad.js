let navbarData = `<div id="page-content-wrapper">
                    <nav class="navbar navbar-expand-lg bg-light">
					    <div class="container-fluid">
							<a class="navbar-brand" href="#" id="UsernameNavbar">
								<img src="/images/avatars/man1.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
								USERNAME
							</a>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse mw-100" id="navbarSupportedContent">
								<ul class="navbar-nav me-auto mb-2 mb-lg-0">
									<li class="nav-item">
									<a class="nav-link" data-bs-toggle="modal" data-bs-target="#ModalAddDrink">Add Drink</a>
									</li>
									<li class="nav-item">
									<a class="nav-link" data-bs-toggle="modal" data-bs-target="#settingsModal">Settings</a>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Games
										</a>
										<ul class="dropdown-menu" >
											<div id="GameRow" class="gameContainer">
											</div>
										</ul>
									</li>
									<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										Profiles
									</a>
									<ul class="dropdown-menu" id="ProfileDropdown">
									</ul>
									</li>
								</ul>
								<form class="d-flex" role="search">
									<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
									<button class="btn btn-outline-success" type="submit">Search</button>
								</form>
							</div>
					    </div>
					</nav>
            </div>`;

let modalLoginData = `<div class="modal fade" id="ModalLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Welcome to DrinkUp!</h5>
				</div>
				<div class="modal-body">
					<div class="text-center m-auto" style="max-width: 330px;">
						<div class="row">
							<img class="col-xl-4 col-xl-6 col-lg-6 col-md-3 col-sm-4 col-6 mx-auto" src="/images/logos/1.svg" alt="" width="20%">
						</div>
						<div class="row">
							<h1 class="h3 mb-3 fw-normal">Please sign in</h1>
							<h1 class="h3 mb-3 fw-normal">CURRENTLY UNDER HEAVY UPDATES - MANY FEATURES DO NOT WORK</h1>
							<h1 class="h6 mb-3 fw-normal" id="LoginMessage" style="color: red; display:none;">Invalid Username or Pin</h1> 
						</div>
						<div class="row">
							<div class="form-floating">
								<input type="text" class="form-control" id="floatingInput" placeholder="username" name="username">
								<label for="floatingInput">Username</label>
							</div>
							<div class="form-floating">
								<input type="password" class="form-control" id="floatingPassword" placeholder="pin" pattern="[0-9]*" inputmode="numeric" name="pin">
								<label for="floatingPassword">Pin</label>
							</div>
							<button class="w-100 btn btn-lg btn-primary" onclick='CheckLogin($("#floatingInput").val(),$("#floatingPassword").val())'>Sign in</button>
						</div>
						<div clas="row">
							<button class="w-50 btn btn-secondary" onclick="Register()">Register</button>
						
						</div>

					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Contine as Guest</button>
				</div>
			</div>
		</div>
	</div>`;


let modalAddDrink = `<div class="modal fade" id="ModalAddDrink" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Add Drink</h5>
				</div>
				<div class="modal-body">
					<div class="container drinkForm" id="drinkFormSize">
						<div class="row" onclick="SetDrinkSize(12)">
							<div class="col-12 g-2 border border-dark rounded">
								<div class="row  radio" >
									<div class="col">
										<img class="w-100" src="/images/icons/bottle2.svg">
									</div>
									<div class="col">
										<img class="w-100" src="/images/icons/can2.svg">
									</div>
									<div class="col">
										<img class="w-100" src="/images/icons/plasticCup2.svg">
									</div>
								</div>
								<div class="row text-center">
									<div class="col-12">
										<p class="sub-desc">BOTTLE / CAN / RED SOLO</p>
										<p>12oz</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6 g-2 border border-dark rounded"  onclick="SetDrinkSize(1)">
								<div class="row" >
									<div class="col-12">
										<img class="w-100" src="/images/icons/shot-filled.svg">
									</div>
								</div>
								<div class="row text-center">
									<div class="col-12">
										<p class="sub-desc">SHOT</p>
										<p>1oz</p>
									</div>
								</div>
							</div>
							<div class="col-6 g-2 border border-dark rounded"  onclick="SetDrinkSize(16)">
								<div class="row" >
									<div class="col-12">
										<img class="w-100 rounded-circle bg-primary" src="/images/icons/pint.svg">
									</div>
								</div>
								<div class="row text-center">
									<div class="col-12">
										<p class="sub-desc">PINT</p>
										<p>16oz</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-6 g-2 border border-dark rounded"  onclick="SetDrinkSize(5)">
								<div class="row" >
									<div class="col-12">
										<img class="w-100" src="/images/icons/wineGlass.svg">
									</div>
								</div>
								<div class="row text-center">
									<div class="col-12">
										<p class="sub-desc">WINE GLASS</p>
										<p>5oz</p>
									</div>
								</div>
							</div>
							<div class="col-6 g-2 border border-dark rounded"  onclick="SetDrinkSize(\'M\')">
								<div class="row" >
									<div class="col-12">
										<img class="w-100" src="/images/icons/drinks.svg">
									</div>
								</div>
								<div class="row text-center">
									<div class="col-12">
										<p class="sub-desc">Other</p>
										<p>(custom size)</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="container drinkForm d-none" id="drinkFormInfo">
						<div class="row">
							<div class="col-12" id="drinkFormInfoImg">
							</div>
							<div class="col-12">
								<h5 class="sub-heading mb-4">Details</h5>
							</div>
						</div>
						<div class="container row drinkInfo" id="drinkFormInfoEntry">
							<div class="container-fluid">
								<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
									<div class="offcanvas-header">
										<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Drink Maker</h5>
										<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
									</div>
									<div class="offcanvas-body">
										<div class="container">
											<div class="row">
												<div class="col-12">
													<p>Drink not already in the database? Add your drink and/or recipe and any special instructions (layers, shake don't stir, etc)</p>
												</div>
											</div>
											<div class="row">
												<div class="col-8 container">
													<div class="row justify-content-center">
														<div class="col-6">
															<button class="btn btn-primary" onclick="DrinkMixerAddItem()">Add Item</button>
														</div>
													</div>
													<div class="row justify-content-center mt-2">
														<div class="col-6">
															<button class="btn btn-primary" onclick="DrinkMixerAddNote()">Add Note</button>
														</div>
													</div>
													
												</div>
												<div class="col-4">
													<button class="btn btn-success float-end" onclick="SubmitNewDrink()">Submit New Drink</button>
												</div>
											</div>
										</div>
										<hr />
										<div class="container">
											<div class="row">
												<div class="col-12">
													<label class="form-control-label" for="drinkMixerName">Drink Name:</label>
													<input type="text" id="drinkMixerName" name="drinkMixerName" placeholder="" class="form-control" required>
												</div>
											</div>
										
										</div>
										<hr />
										<div id="DrinkMixerForm">
										
										</div>
									</div>
								</div>
							</div>
							<div class="row d-inline-block position-relative" onfocusout='console.log("focus out")'>
								<label class="form-control-label">Drink Name:</label>
								<input id="drinkInputDrinkName0" type="text" class="form-control" placeholder="Drink Name" onkeyup="doDelayedSearch(this)" onfocus="(ShowList(this.id))" autocomplete="off" >
							</div>
							<div class="row">
								<label class="form-control-label">ABV:</label>
								<input type="number" id="drinkInputABV0" name="abv" placeholder="" class="form-control" required autocomplete="off">
							</div>
							<div class="row">
								<label class="form-control-label">Recipe:</label>
								<button class="btn btn-secondary" id="btnDrinkCalculator" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">New Drink</button>
								<p id="recipe" class="text-muted"></p>
							</div>
							<div class="row">
								<span class="text-primary">Estimated XP Earned: <b id="drinkInputXp0"></b></span>
							</div>
							<datalist id="datalistDrinks">
							</datalist>
						</div>
						<button type="button" class="btn btn-primary" onclick="SetDrinkInfo()">NEXT</button>
					</div>
					<div class="container drinkForm d-none" id="drinkFormComments">
						<h5 class="sub-heading mb-4">Comments</h5>
						<div class="slidecontainer">
							<input type="range" min="1" max="10" value="1" class="slider" id="rating" oninput="UpdateSlider()">
							Rating: <label for="rating" id="ratingLabel">-</label>
						</div>
						<div class="form-group">
							<label class="form-control-label">Comment:</label>
							<input type="text" id="drinkInputComment0" name="comment" placeholder="" class="form-control" onblur="">
						</div>
						<button type="button" class="btn btn-primary" onclick="SubmitDrink()">SUBMIT</button>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary float-start" data-bs-dismiss="modal" onclick="ResetDrinkForm()">CANCEL</button>
					
				</div>
			</div>
		</div>
	</div>`;

let modalNewProfile = `<div class="modal fade" id="ModalNewProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Create New Profile</h5>
				</div>
				<div class="modal-body">
					<div class="text-center m-auto" style="max-width: 330px;">
						<div class="row">
							<img class="col-xl-4 col-xl-6 col-lg-6 col-md-3 col-sm-4 col-6 mx-auto" src="/images/logos/1.svg" alt="" width="20%">
						</div>
						<div class="row">
							<h1 class="h3 mb-3 fw-normal">WIP</h1>
						</div>
						<div class="row">
							<div class="form-floating">
								<input type="text" class="form-control" id="frmProfileName" placeholder="profileName" name="profileName">
								<label for="frmProfileName">Profile Name</label>
							</div>
							<div class="form-floating">
								<input type="text" class="form-control" id="frmLeagueCode" placeholder="leagueCode" name="leagueCode">
								<label for="frmLeagueCode">League Code</label>
							</div>
							<button class="w-100 btn btn-lg btn-primary" onclick='NewProfile($("#frmProfileName").val())'>Create Profile</button>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>`;

let modalProfile = `<div class="modal fade" id="ModalProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Profile</h5>
				</div>
				<div class="modal-body">
					<div class="text-center m-auto" style="max-width: 330px;">
						<div class="row">
							<img class="col-xl-4 col-xl-6 col-lg-6 col-md-3 col-sm-4 col-6 mx-auto" src="/images/logos/1.svg" alt="" width="20%" id="frmEditProfileImg">
						</div>
						<div class="row">
							<h1 class="h3 mb-3 fw-normal">Edit</h1>
						</div>
						<div class="row">
							<div class="form-floating">
								<input type="text" class="form-control" id="frmEditProfileName" placeholder="profileName" name="profileName">
								<label for="frmEditProfileName">Profile Name</label>
							</div>
							<div class="form-floating">
								<select class="form-select" id="frmEditProfileTitleSelect">
								</select>
								<label for="frmEditProfileTitleSelect">Title</label>
							</div>
							<div class="form-floating">
								<input type="text" class="form-control" id="frmEditProfileLeagueCode" placeholder="leagueCode" name="leagueCode">
								<label for="frmEditProfileLeagueCode">League Code</label>
							</div>
							<button class="w-100 btn btn-lg btn-success" onclick='NewProfile($("#frmEditProfileName").val())'>Save Changes</button>
						</div>
						<div class="row">
							<div class="dropdown">
								<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
								My Friend Details
								</button>
								<div class="dropdown-menu p-4">
									<p>Friend Code:</p>
									<p id="frmEditProfileId">123456789</p>
									<img id="frmEditProfileQr" src="/images/avatars/woman1.svg" >
									
								</div>
							</div>
							
						</div>
						<div class="row">
							<button class="w-100 btn btn-lg btn-primary" onclick='SetProfile($("#frmEditProfileName").val())'>Set As Active Profile</button>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>`;

let ModalSpinner = `
	<div class="modal fade" id="ModalSpinner" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Loading</h5>
				</div>
				<div class="modal-body">
					<div class="spinner-border" role="status">
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>
			</div>
		</div>
	</div>`;

let ModalGameSelect = `<div class="modal fade" id="ModalMoreInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
  <div class="modal-content">
	<div class="modal-header">
	  <h5 class="modal-title" id="ModalMoreInfoHeader">Game Name</h5>
	  <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
	</div>
	<div class="modal-body">
	  <div class="text-center m-auto" style="max-width: 330px;">
			  <div class="row">
				  <img  id="ModalMoreInfoLogo" class="col-xl-4 col-xl-6 col-lg-6 col-md-3 col-sm-4 col-6 mx-auto"  alt="" width="20%">
			  </div>
			  <div class="row" id="ModalMoreInfoSection"></div>
		  </div>
	</div>
	<div class="modal-footer">	
	  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
	  <a class="btn btn-primary btn-large w-50" id="PlayButton">PLAY</a>
	</div>
  </div>
</div>
</div>`;

var jsonDataDrinks = "";
var newDrinkSize = 0;
var newDrinkName = "";
var newDrinkABV = "";
var jsonDataProfiles;
const GameData = {
	"Games":[
		 {
			 "GameInfo":{
				 "Name":"Drinking Levels",
				 "Link":"/games/DrinkingLevels/",
				 "Img":"/images/Logos/drinking_levels.svg",
				 "Desc":"<p>Ever feel like your drinks should matter for something? Really enjoy RPG games? Turn those drinks into XP! In this \"game\" you create a profile (you can create multiple profiles for multiple events) and whenever you finish a drink, submit that drink and get XP for it by ABV. So your 5% ABV beer gives you 5xp, that 18% ABV shot of rum gives 18xp. Like mixers? We (will) have an easy calculator to determin ABV</p> <br> <p>This game is in beta status. The core features are done but still needs more content. Bugs and glitches are less likely but can occur, please report any if found. I can't fix what I don't know is broke.</p>",
				 "Active":true
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Wheel of Misfortune",
				 "Link":"/games/wheelofmisfortune/",
				 "Img":"/images/Logos/wheel_of_misfortune.svg",
				 "Desc":"<p>A fun beginning of the night game. As its name suggests, you spin a wheel and enjoy the misfortune. You may have to drink, give a drink, take a dare, the possibilities are near endless as you can use our defaults or (eventually) enter your own wheel challenges.<br><br>Now with 50+ options!</p>",
				 "Active":true
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Drunk Artist",
				 "Link":"/games/drunkartist/",
				 "Img":"/images/Logos/drunk_artist.svg",
				 "Desc":"<p>Ever wonder if you have a hidden talent that only comes out when drunk? Well find out if it is art here! 1 person is given an image and must tell all other players how to draw it. Catch is the artists can't see their art, they must remember what they drew and where. Drinking comes into play when guessing their art. Always fun to compare art to eachother and the original piece.</p>",
				 "Active":true
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"DrinkUp TV",
				 "Link":"/tv/",
				 "Img":"/images/Logos/tv.svg",
				 "Desc":"<p>Secondary hub for multiplayer DrinkUp games. A host on the tv and all other players join on their own phone. Similiar to how the Jackbox Party Pack games work.</p>",
				 "Active":true
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Memory",
				 "Link":"/games/memory/",
				 "Img":"/images/Logos/memory.svg",
				 "Desc":"<p>Just like the childrens game but with alcohol. A grid is layed before you of facedown cards. You must pick 2 cards and if they match remove them from the game and give a the drink the match says, and go again. If they differ, take the drink, turn them back face down, and it's the next players turn to pick. Sometimes there's multiple matches for a set of cards.</p>",
				 "Active":true
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Memory2",
				 "Link":"/games/memory2/",
				 "Img":"/images/Logos/memory2.svg",
				 "Desc":"<p>An alternate form of Memory. 12 cards will be shown to you. You have 5 seconds to memorize them before being flipped over. Then, the center large card will be revealed. It is your job to flip over the matching tile.</p>",
				 "Active":true
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Scratch N Drink",
				 "Link":"/games/scratchndrink/",
				 "Img":"/images/Logos/scratch_n_drink.svg",
				 "Desc":"<p>Best played with 2-3 people and a shot. A grid of covered tiles is layed before you, each player takes a turn and scratches off a tile to reveal what is underneath. Based upon the revealed tile, that player may have to drink 1, 2, go again, or be safe (do nothing). BUT, theres the crossbones. The player that reveals that has to take the shot and a new game can be started with a new shot. When playing with more than 2 people it is recomended to incease the crossbone count so when one player scratches it off the others can keep going on the same game.</p>",
				 "Active":true
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Campfire Stories",
				 "Link":"/games/CampfireStories/",
				 "Img":"/images/Logos/campfire_stories.svg",
				 "Desc":"<p>Inspired by Comedy Central's Drunk History, you're given a random topic and a few key facts. Your job is to tell the history of this event. For Example, you may have</p><p>Tell the history of the First Person in Space</p><ul><li>Yuri Gagarin was the first person is space</li><li>Occured April 12, 1961</li><li>Rocket was called Vostok 1</li><li>Mission successful after an 89 minute run</li></ul><p>You fill in the rest from there, probably very innacurate. (Don't forget the intro) \"Hello, I'm Hugh Jass and today we'll be discussing the first person in space. Yuri Gagarin was born in 1947 to Phil and Mary Gagarin somewhere in Sweden (not true). As a young boy Yuri was fasinated with space (possibly true) and would grow up to be the first person in space (true)...\" Let your imagination run free, nobody is fact checking you on this. This game is best played later in the night when more people are already drunk. Not recomended to play with actual historians.</p>",
				 "Active":false
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Do or Drink / Kwitter",
				 "Link":"/games/doordrink/",
				 "Img":"/images/Logos/5.svg",
				 "Desc":"<p>A simple game for anytime in the party. Similiar to truth or dare but just dares. When it's your turn you'll be given a task. You can choose to do this task or not do it and take the drink punishment. In general, the more embarassing or risky of task the higher the drink punishment is. For example you can 1. Turn your shirt inside out the rest of the night or 2. Take 1 drink. This isn't very bad hence a low punishment. Likewise your task could be 1. Let the person to your right sharpie whatever they want to your face or 2. Take 5 drinks. This could be very severe, especially if there is trust issues, hence a larger punishment. But don't assume easy equals safe, if a task is so simple and easy you may have to drink much more because it's just so easy. Like Say the word 'cheese' or take 10 drinks. There is an optional point system to play with to determine a winner and losers.</p>",
				 "Active":true
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Shot Roulette",
				 "Link":"/games/ShotRoulette/",
				 "Img":"/images/Logos/shot_roulette.svg",
				 "Desc":"<p>We recomend the use of a <b><u>TOY</u></b> gun but if you don't have one you can simply put the phone to your head and tap the gun to shoot. The rules are simple, if you get shot take a shot. Custom settings allow to change your six shooter to any number to increase/decrease shot chances. Optional rule to increase bullet count after each round or shot. Optional complicated rules include once per game, pass your turn to another player, place bets if people get shot, add/remove a bullet for a single turn, and more ridiculous things.</p><br><p>This game is not reccomended for light weights and should be paced slowly. You can easily end up taking 5+ shots in mere minutes. For slower, safer fun you can make your own drink rules such as take a drink when shot.</p>",
				 "Active":false
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Jeoparty",
				 "Link":"/games/Jeoparty",
				 "Img":"/images/Logos/jeoparty.svg",
				 "Desc":"<p>Drinking and trivia just go hand in hand. Just like the game show it's named after you'll be playing jeopardy for drinks. There's multiple categories with the questions getting harder the more they're worth. Rather than first to answer, when it's your turn you pick your question. If you get it right, you give out that many drinks and go again, you get it wrong you take them and your turn is over.</p>",
				 "Active":true
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Shot Potato",
				 "Link":"/games/ShotPotato/",
				 "Img":"/images/logos/shot_potato.svg",
				 "Desc":"<p>A card game that revolves around not taking a shot. Play cards with random costs/actions to pass the potato (shot) to someone else. First player with the potato and unable to pass takes the shot.</p>",
				 "Active":true
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Nario Party",
				 "Link":"/games/NarioParty/",
				 "Img":"/images/Logos/9.svg",
				 "Desc":"<p>A jumble of all games provided. Basically every players turn is a turn off another game. Your turn may be Wheel of Misfortune but the next player does Shot Roulette, the next does Do or Drink, etc...</p>",
				 "Active":false
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Smarty Pants",
				 "Link":"/games/SmartyPants/",
				 "Img":"/images/Logos/1.svg",
				 "Desc":"<p>One person asks a trivia style question. If anyone else can answer it the asker drinks and goes again. If nobody knows everyone else drinks and the next person becomes the asker. After the answer is said, people can challenge with a fact check and lookup the answer. If the answer is different than the asker then the asker takes a shot for being wrong. If the answer was right, the challenger takes the shot. Personal and opinion style questions are prohibitted. That means no questions like \"what's my favorite color?\" or \"who is the best actor?\".</p>",
				 "Active":false
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"In Between",
				 "Link":"/games/InBetween/",
				 "Img":"/images/Logos/2.svg",
				 "Desc":"<p>Recomended to play with actual deck of cards but available here if you don't have one. 2 cards are played. For each player they must determine if the next card will be higher, lower, or between. If correct they choose someone else to drink. If wrong, they drink.</p>",
				 "Active":false
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"High Low Smoke Fire",
				 "Link":"/games/HighLowSmokeFire/",
				 "Img":"/images/Logos/3.svg",
				 "Desc":"<p>Recomended to play with actual deck of cards but available here if you don't have one. Flip a card face up. The player must choose if the next card will be higher or lower and smoke (black) or fire (red). The player drinks for every wrong option and must get 3 perfect in a row for the next players turn. This means if the face up card is the 5 of hearts and the player says high smoke. The next card flipped is the 9 of diamonds. This is higher, but is a fire (red) so the player drinks 1 and goes again.</p>",
				 "Active":false
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Quarters",
				 "Link":"/games/Quarters/",
				 "Img":"/images/Logos/5.svg",
				 "Desc":"<p>Some type of pokemon go or golf with friends style power bar way of tossing a quarter or ball into a cup?</p>",
				 "Active":false
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"AORB",
				 "Link":"/games/AorB/",
				 "Img":"/images/Logos/6.svg",
				 "Desc":"<p>You are presented with a question or statement and 2 options. You have to decide if it's A or B and as always, losers drink. An example would be \"This celebrity has \"suck it!\" tattooed on their lip. A: Kesha or B: Justin Beiber?\"</p>",
				 "Active":false
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"A Dozen Seconds",
				 "Link":"/games/ADozenSeconds",
				 "Img":"/images/Logos/7.svg",
				 "Desc":"<p>Similiar to \"Do or Drink\" but it's no longer an option. You're given a task and a punishment. You have 12 seconds to finish this task, if you fail or take too long you have to take your punishment. If you refuse to do a task it's triple punishment. So just grow a pair, don't think, and do the damn task. This game is designed to make you look like a fool so just embrace it and have fun.</p>",
				 "Active":false
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Drink Lotto",
				 "Link":"/games/lotto/",
				 "Img":"/images/Logos/2.svg",
				 "Desc":"<p>Different types of scratch off loto tickets. Currently undecided play style. Thinking theres different tickets with different odds. You first drink to buy the ticket, scratch, and depending upon scratches give drinks. So a 1 drink buy ticket may have rewards of give 1-5 drinks. A 2 drink buy ticket may have rewards of give 2-8 drinks. A 5 drink ticket may have rewards of give a shot. And of course tickets can reward nothing so drink and buy again. 3x3 grid, scratch off 3 and drink based on combo? 3 rows of 3, scratch all but need 3 of a kind of some type otherwise drink?</p>",
				 "Active":false
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"D&D (Drinking and Dragons)",
				 "Link":"/games/DrinkingAndDragons/",
				 "Img":"/images/Logos/3.svg",
				 "Desc":"<p>An RPG choose your own adventure style game. A simple 2 option format to explore and drink to fight and survive. An example would be \"You approach the river and find the bridge broken. Do you A: Swim Across or B: Look for another path. If you swim across you may get something like \"The current is very strong, do you A: Drink 4 and make it across or B: Drink 0 but take 3 damag?\" OR if you chose to look for another path you could get \"While walking a bear attacks, do you A: Drink 3 and deal 3 damage or B: Drink 5 and deal 5 damage?\" Ideally every player would participate on their own device. For now, one player hosts and everyone drinks as a team. Drink sizes increase for players. So if 2 people are playing it may be \"Drink 5 for 3 damage\" but if 5 people are playing it may be \"Drink 10 for 3 damage\"</p>",
				 "Active":false
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Drinko Plinko",
				 "Link":"/games/plinko/",
				 "Img":"/images/Logos/4.svg",
				 "Desc":"<p>For the indecisive people. Load a list of items and drop a plinko down to choose. Can load up with a menu of drink options or other standard tasks like take 1, 2, 3 drinks, etc.</p>",
				 "Active":false
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Um, Actually",
				 "Link":"/games/UmActually/",
				 "Img":"/images/Logos/5.svg",
				 "Desc":"<p>You are given a bad piece of information and must correct it, starting your answer with um, actually. If another player gives a bad answer, you can also um actually their um actually. Multiple answers can be accepted. For example, 2 - 2 = 4. You can say um actually, 2 + 2 = 4, or 2 * 2 = 4 or 2squared = 4, or 6 - 2 = 4. All would be acceptable. If you can say an accurate um actually give a drink. If you can't come up with anything without repeating another player, take a drink.</p>",
				 "Active":false
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Chances",
				 "Link":"/games/Chances/",
				 "Img":"/images/Logos/1.svg",
				 "Desc":"<p>A create your own type of Wheel of Misfortune game. After each spin, the spinner gets to choose of 3 random options that can increase, decrease, add, or remove the chances of landing on certain spins.</p>",
				 "Active":false
			 }
		 },
		 {
			 "GameInfo":{
				 "Name":"Rules",
				 "Link":"/games/Rules/",
				 "Img":"/images/Logos/8.svg",
				 "Desc":"<p>Not a game but a collection of common rules you can reference as a Karen. For example, \"Any spilt drink party foul results in a shot taken by the spiller\" or \"There can only be one Question Master at a time, a new question master removes the old one\". Remember, house rules ALWAYS override any of these rules when stated in advance. And a house rule made AFTER an event does not apply to that event. That means should a 2nd person become question master and everyone complains there can only be 1, from that point on there can only be 1 but until then there are 2. Once a 3rd person gets question master, it will remove that from both old masters.</p>",
				 "Active":false
			 }
		 }
	 ]
 };
 
$(function(){
	//Add navbar
	$("body").prepend(navbarData);
	//Add Modals
	$("body").append(modalLoginData);
	$("body").append(modalAddDrink);
	$("body").append(modalNewProfile);
	$("body").append(modalProfile);
	$("body").append(ModalSpinner);
	$("body").append(ModalGameSelect);
	$('head').append(`<style>
	.gameContainer {
		width: 100%;
		position: relative;
		display: flex;
		align-items: stretch;
		gap: 1rem;
		transition: all 400ms;
		overflow-y: scroll;
		background: linear-gradient(.56deg, rgba(123, 157, 156, .25) 35%, rgba(123, 157, 156, 0));
	}

	.card2 {
		flex: 1;
		width: 100%;
		min-width: 100px;
		transition: all 400ms;
		cursor: pointer;
	}



	.gameContainer:hover >
	.card2:not(:hover) {
		filter: grayscale(100%);
	}
	/*
	.card2:hover, .card2:active{
		flex: 3;
	   min-width: 200px;
	   border: 1px solid black;
	}

	.active{
		flex: 3;
	   min-width: 200px;
	   border: 1px solid black;
	}*/
		</style>`);


	//Add External CSS - Bootstrap CSS 5.3 (alpha)
	//$("head").append('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">');
    //$("head").append('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">');


	//Add external JS - JQuery and Boostrap JS 5.2.1 and 5.3 (5.3 alpha currently missing main features
	//$("body").append('<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>');

	//$("body").append('<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>');
	//$("body").append('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>');
})

$(document).ready(function(){
	//if sessions variable available check
	if (localStorage.getItem("userId") != null) {
		Login(localStorage.getItem("userId"));
	}
	else{
		$("#ModalLogin").modal('show');
	}


	$.each(GameData.Games, function(i, item) {
        $('#GameRow').append(`
                <div class="card2" onclick="SetActive(` + i + `)" >
                    <img src={{site.base_url}}"` + GameData.Games[i].GameInfo.Img + `" style="float: left; transform-box: fill-box; transform-origin: center; " >
                </div>`); 
    });

});

function CheckLogin(username, pin){
	if (window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
	
	var loginResult = "";
	xmlhttp.open("GET", "/php/CheckLogin.php?user=" + username + "&pin=" + pin, false);
	xmlhttp.send();
	if(xmlhttp.status === 200){
		loginResult = xmlhttp.responseText;
	}
	if(loginResult != "Invalid"){
		console.log("Successful Login");
		SetLogin(loginResult);
		Login(loginResult);
		return true;
	}
	else {
		console.log("Invalid Username or Pin");
		InvalidUsernameOrPassword();
		return false;
	}
}

function SetLogin(userId){
	//set local storage variables
	localStorage.setItem("userId", userId);
}

function SetProfile(profileId){
	//set local storage variables
	localStorage.setItem("profileId", profileId);
}

function Login(userId){
	$("#ModalLogin").modal('hide');
	SetUserProfileDropdown(GetUserProfiles(userId));
}

function Logout(){
	//clear local storage variables
	localStorage.removeItem("userId");
	localStorage.removeItem("profileId");
}

function SetProfileModalDetails(profileIndex){
	$('#frmEditProfileName').val(jsonDataProfiles[profileIndex].Name);
	GetUnlockedAchievements(jsonDataProfiles[profileIndex].ProfileID, jsonDataProfiles[profileIndex].ActiveTitle);
	$('#frmEditProfileLeagueCode').val("COMING SOON");
	$('#frmEditProfileImg').attr('src', '/images/avatars/' + jsonDataProfiles[profileIndex].Avatar + '.svg');
	$('#frmEditProfileId').text(jsonDataProfiles[profileIndex].ProfileID);
	let qrsrc = 'https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl='+ jsonDataProfiles[profileIndex].ProfileID + '&choe=UTF-8';
	console.log(qrsrc);
	$('#frmEditProfileQr').attr('src', 'https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl='+ jsonDataProfiles[profileIndex].ProfileID + '&choe=UTF-8');
}

function GetUnlockedAchievements(profileId, activeTitle){
	$.post( "/php/GetUnlockedAchievements.php", { profileID: profileId })
		.done(function( data ) {
			console.log(data);
			let options = JSON.parse(data);
			console.log(options);
			$("#frmEditProfileTitleSelect").empty();
			for(let i = 0; i < options.length; i++){
				$("#frmEditProfileTitleSelect").append('<option value="' + options[i].TitleId + '">' + options[i].Title + '</option>');
				//$("#frmEditProfileTitlesDataList").append('<option value="' + options[i].Title + '">' + options[i].TitleId + '</option>');
			}
			$('#frmEditProfileTitleSelect').val(activeTitle).change();
	});
	
	
}

function InvalidUsernameOrPassword(){
	$("#floatingInput").val("");
	$("#floatingPassword").val("");
	$("#LoginMessage").show();
	$("#ModalLogin").modal('show');
}

function GetUserProfiles(userId){
	if (window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
	
	var loginResult = "";
	xmlhttp.open("GET", "/php/GetUserProfiles.php?user=" + userId, false);
	xmlhttp.send();
	if(xmlhttp.status === 200){
		loginResult = xmlhttp.responseText;
		return loginResult;
	}
	else{
		return "Invalid User"
	}
	
}

function SetUserProfileDropdown(jsonString){
	let profiles = JSON.parse(jsonString);
	jsonDataProfiles = profiles;
	console.log(profiles);
	for(let p = 0; p < profiles.length; p++){
		$("#ProfileDropdown").append('<li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalProfile" onclick="SetProfileModalDetails(' + p + ')">' + profiles[p].Name + ' - ' + profiles[p].Title + ' (lvl:' + profiles[p].Level + ')</a></li>');
	}
	$("#ProfileDropdown").append('<li><button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalNewProfile">New Profile</button></li>');
	SetProfile(profiles[0].ProfileID); //Default to first profile returned. Profile order set in PHP query
	$("#UsernameNavbar").html('<img src="/images/avatars/' + profiles[0].Avatar + '.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">' + profiles[0].Name);
}

function SetDrinkSize(ds){
	//Set Info Image
	newDrinkSize = ds;
	switch(newDrinkSize){
		case 12: $('#drinkFormInfoImg').html(`<div class="row" ><div class="col"><img class="w-100" src="/images/icons/bottle2.svg"></div><div class="col"><img class="w-100" src="/images/icons/can2.svg"></div><div class="col"><img class="w-100" src="/images/icons/plasticCup2.svg"></div></div>`); break;
		case 1: $('#drinkFormInfoImg').html(`<div class="col-12"><img class="w-100" src="/images/icons/shot-filled.svg"></div>`); break;
		case 5: $('#drinkFormInfoImg').html(`<div class="col-12"><img class="w-100" src="/images/icons/wineGlass.svg"></div>`); break;
		case 16: $('#drinkFormInfoImg').html(`<div class="col-12"><img class="w-100" src="/images/icons/pint.svg"></div>`); break;
		case 'M': $('#drinkFormInfoImg').html(`<div class="col-12"><img class="w-100" src="/images/icons/drinks.svg"></div>`); break;
	}
		
	//Go to drink info
	$('#drinkFormSize').addClass('d-none');
	$('#drinkFormInfo').removeClass('d-none');
	
	/*jsonDataDrinks = JSON.parse(GetDrinks());


	//Clear options before adding
	$('#datalistDrinks').html('');
	$.each(jsonDataDrinks, function() {
		$('#datalistDrinks').append('<option value="' + this.DrinkName + '">' + this.DrinkName + '</option>');
	});*/
}

function SetDrinkInfo(){
	//Check if new mixer, recipe is entered
	
	//Go to drink comments
	$('#drinkFormInfo').addClass('d-none');
	$('#drinkFormComments').removeClass('d-none');
}

function SubmitDrink(){
	//Set post variables
	let drinkID = 0;
	for (let i=0; i < jsonDataDrinks.length; i++){
			if(jsonDataDrinks[i].DrinkName == $('#drinkName').val()){
				drinkID = jsonDataDrinks[i].DrinkID;
			}
		}	
	let comment = $('#drinkInputComment0').val();
	let abv = $('#drinkInputABV0').val();
	console.log(drinkID);
	
	
	$.post( "/php/SubmitDrink.php", { userID: localStorage.getItem("userId")
									, profileID: localStorage.getItem("profileId")
									, drinkName: "TEST"
									, drinkID: drinkID
									, abv: abv
									, type: "Beer"
									, comment: comment
									, rating: "5"
									, recipe: "no recipe"
									, drinkSize: newDrinkSize})
		.done(function( data ) {
			if (data === 'drink sucessfully entered'){
				//Hide Modal and Reset Form
				$('#ModalAddDrink').modal('hide');
				ResetDrinkForm();
			}
		console.log(data);
	});
}

function SubmitNewDrink(){
	let recipeConcat = '';
	let volume = 0;
	let totalVolume = 0;
	let abv = 0;
	//Add Notes
	$("#DrinkMixerForm .drinkMixer-note").each(function(){
		let frmId = this.id.substring(this.id.search(/\d/));
		console.log($('#drinkInputDrinkNote' + frmId).text())
		recipeConcat += $('#drinkInputDrinkNote' + frmId).val();
	})
	
	//Add Drink Items
	$("#DrinkMixerForm .drinkMixer-item").each(function(){
		let frmId = this.id.substring(this.id.search(/\d/));
		if(DrinkExists($('#drinkInputDrinkName0' + frmId).val())){
			console.log($('#drinkInputDrinkName0' + frmId).val() + " already exists");
		}
		else{
			//Submit as new drink
				console.log("Create new drink for " + $('#drinkInputDrinkName' + frmId).val());
				$.post( "/php/SubmitNewDrink.php", { drinkName: $('#drinkInputDrinkName' + frmId).val()
												, abv: $('#drinkInputABV' + frmId).val()
												, recipe: $('#drinkInputDrinkName' + frmId).val()
												, profileID: localStorage.getItem("profileId")
												})
					.done(function( data ) {
						console.log(data);
						if (data === 'drink created'){
							//Success
							console.log("new drink created");
						}
					})
					
		}
		recipeConcat +=  $('#drinkInputDrinkDesc' + frmId).text();
		abv += $('#drinkInputABV' + frmId).val() * ($('#drinkInputDrinkSize' + frmId).val() * $('#drinkInputDrinkSizeFraction' + frmId).val());
		volume += $('#drinkInputDrinkSize' + frmId).val() * $('#drinkInputDrinkSizeFraction' + frmId).val();
		
		console.log(abv);
		console.log(volume);
	})
	
	console.log("total abv: " + (abv / volume));
	
	
	console.log(recipeConcat);
}

function GetDrinks(){
	if (window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
	
	var res = "";
	xmlhttp.open("GET", "/php/GetDrinks.php", false);
	xmlhttp.send();
	if(xmlhttp.status === 200){
		res = xmlhttp.responseText;
	}
	
	return res;
	
}

function ResetDrinkForm(){
	//Reset all variables and display
	$('#drinkFormSize').removeClass('d-none');
	$('#drinkFormInfo').addClass('d-none');
	$('#drinkFormComments').addClass('d-none');
	$('#drinkInputDrinkName0').val('');
	$('#drinkInputABV0').val('');
	$('#drinkInputComment0').val('');
	$('#drinkInputRecipe0').text('');
	$('#drinkInputXp0').text('');
	$('#DrinkMixerForm').html('');
}

function UpdateList(ev){
	console.log("updating drinks");
	console.log(ev.srcElement.value);
	for (let i=0; i < jsonDataDrinks.length; i++){
		if(jsonDataDrinks[i].DrinkName == ev.srcElement.value){
			document.getElementById("abv").value = jsonDataDrinks[i].ABV;
			$('#recipe').html(jsonDataDrinks[i].DrinkRecipe);
			
			$('#drinkInputXp0').text((jsonDataDrinks[i].ABV * (newDrinkSize /100)) * 100);
			break;
		}
		else{
			document.getElementById("abv").value = "";
			$('#recipe').html("");
		}
	}
}

function DrinkMixerAddItem(){
	let ts = event.timeStamp.toFixed();
	console.log(ts);
	let frmTemplate = 	`
						<div class="card container drinkMixer-item" id="frmDrink` + ts + `">
							<div class="row justify-content-end">
								<button type="button" class="btn-close" aria-label="Close" onclick="DrinkMixerRemoveItem('` + ts + `')"></button>
							</div>
							<div class="row">
								<div class="col-3">
									<img src="/images/icons/shot-filled.svg" width="100%" height="100%" class="float-start" id="drinkInputImg` + ts + `">
								</div>
								<div class="col-9">
									<div class="row d-inline-block position-relative" onfocusout='console.log("focus out")'>
										<label class="form-control-label">Drink Name:</label>
										<input id="drinkInputDrinkName` + ts + `" type="text" class="form-control" placeholder="Drink Name" onkeyup="doDelayedSearch(this)" onfocus="(ShowList(this.id))" autocomplete="off" >
									</div>
									<!--
									<div class="form-floating">
										<input type="text" class="form-control" id="drinkInputDrinkName` + ts + `" placeholder="drinkName" name="drinkName" list="datalistDrinks" onchange="UpdateABV('` + ts + `')" required>
										<label for="drinkInputDrinkName">Drink Name:</label>
									</div>
									-->
									<div class="form-floating">
										<input type="text" class="form-control" id="drinkInputABV` + ts + `" placeholder="abv" name="abv" required>
										<label for="drinkInputABV">ABV:</label>
									</div>
								</div>
							</div>
							
							<div class="dropdown">
								<a class="btn btn-secondary dropdown-toggle float-end" href="#" role="button" id="dropdownDrinkSizeLink` + ts + `" data-bs-toggle="dropdown" aria-expanded="false">Drink Size:</a>
								<ul class="dropdown-menu" aria-labelledby="dropdownDrinkSizeLink` + ts + `">
									<li>
										<div class="dropdown-item">
											<div class="slidecontainer">
												<div class="container">
													<div class="row">
														<div class="col-12">
															<p id="drinkInputDrinkSizeText` + ts + `">Drink Size: 1oz</p>
														</div>
													</div>
													<div class="row">
														<div class="col-4">
															<p>Size</p>
														</div>
														<div class="col-8">
															<select class="form-select" id="drinkInputDrinkSize` + ts + `" onchange="UpdateMixerDrinkSize(event)">>
																<option value="0">< 1oz (tiny amount)</option>
																<option value="1" selected>1oz (shot)</option>
																<option value="2">2oz (double)</option>
																<option value="3">3oz (triple)</option>
																<option value="8">8oz (small can)</option>
																<option value="12">12oz (can)</option>
																<option value="16">16oz (pint)</option>
																<option value="32">32oz (quart)</option>
																<option value="34">34oz (liter)</option>
																<option value="60">60oz (1.75L / handle)</option>
																<option value="68">68oz (2 liter)</option>
																<option value="128">128oz (gallon)</option>
															</select>
														</div>
													</div>
													<div class="row">
														<div class="col-4">
															<p>Amount</p>
														</div>
														<div class="col-8">
															<select class="form-select" id="drinkInputDrinkSizeFraction` + ts + `" onchange="UpdateMixerDrinkSize(event)">>
																<option value=".25">1/4</option>
																<option value=".33">1/3</option>
																<option value=".5">1/2</option>
																<option value=".66">2/3</option>
																<option value=".75">3/4</option>
																<option value="1" selected>Entire</option>
															</select>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
							
							
							
							
							
							<div>
								<p id="drinkInputDrinkDesc` + ts + `" class="drinkInputRecipeItemTxt"></p>
							</div>
							
						</div>
						`;
	
	$('#DrinkMixerForm').append(frmTemplate);
	UpdateMixerDrinkLabel(ts);
}

function DrinkMixerRemoveItem(frmId){
	$('#frmDrink' + frmId).remove();
}

function DrinkMixerAddNote(){
	let ts = event.timeStamp.toFixed();
	console.log(ts);
	let frmTemplate = 	`
						<div class="card container drinkMixer-note" id="frmDrink` + ts + `">
							<div class="row justify-content-end">
								<button type="button" class="btn-close" aria-label="Close" onclick="DrinkMixerRemoveItem('` + ts + `')"></button>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="drinkInputDrinkNote` + ts + `">Notes:</label>
										<textarea class="form-control" id="drinkInputDrinkNote` + ts + `" rows="3"></textarea>
									</div>
								</div>
							</div>
						</div>
						`;
	
	$('#DrinkMixerForm').append(frmTemplate);
	UpdateMixerDrinkLabel(ts);
}

function UpdateABV(frmId){
	for (let i=0; i < jsonDataDrinks.length; i++){
		if(jsonDataDrinks[i].DrinkName == $('#drinkInputDrinkName' + frmId).val()){
			$('#drinkInputABV' + frmId).val(jsonDataDrinks[i].ABV);
			break;
		}
		else{
			$('#drinkInputABV' + frmId).val();
		}
	}
	UpdateMixerDrinkLabel(frmId);
}

function UpdateMixerDrinkSize(e){
	let frmId = e.srcElement.id.substring(e.srcElement.id.search(/\d/));

	let drinksize = parseFloat($("#drinkInputDrinkSize" + frmId).val());
	let drinkAmt = parseFloat($("#drinkInputDrinkSizeFraction" + frmId).val());
	let drinkSum = drinksize * drinkAmt;

	$('#drinkInputDrinkSizeText' + frmId).text('Drink Size: ' + drinkSum + 'oz');
	UpdateMixerDrinkLabel(frmId);
}

function UpdateMixerDrinkLabel(frmId){
	//Get form size and amt
	let drinkAmtTxt = '';
	switch ($("#drinkInputDrinkSizeFraction" + frmId).val()){
		case '.25':
			drinkAmtTxt = '1/4';
			break;
		case '.33':
			drinkAmtTxt = '1/4';
			break;
		case '.5':
			drinkAmtTxt = '1/2';
			break;
		case '.66':
			drinkAmtTxt = '2/3';
			break;
		case '.75':
			drinkAmtTxt = '3/4';
			break;
		case '1':
			//drinkAmtTxt = 'An entire';
			break;
		default:
			drinkAmtTxt = 'error';;
	}
	
	let drinkSizeTxt = '';
	switch ($("#drinkInputDrinkSize" + frmId).val()){
		case '0':
			drinkSizeTxt = 'a splash';
			$('#drinkInputImg' + frmId).attr('src', '/images/icons/app.svg');
			break;
		case '1':
			drinkSizeTxt = 'a shot';
			$('#drinkInputImg' + frmId).attr('src', '/images/icons/shot-filled.svg');
			break;
		case '2':
			drinkSizeTxt = 'a double shot';
			$('#drinkInputImg' + frmId).attr('src', '/images/icons/shot-filled.svg');
			break;
		case '3':
			drinkSizeTxt = 'a triple shot';
			$('#drinkInputImg' + frmId).attr('src', '/images/icons/shot-filled.svg');
			break;
		case '8':
			drinkSizeTxt = 'a small can';
			$('#drinkInputImg' + frmId).attr('src', '/images/icons/can.svg');
			break;
		case '12':
			drinkSizeTxt = 'a can';
			$('#drinkInputImg' + frmId).attr('src', '/images/icons/can2.svg');
			break;
		case '16':
			drinkSizeTxt = 'a pint';
			$('#drinkInputImg' + frmId).attr('src', '/images/icons/pint.svg');
			break;
		case '32':
			drinkSizeTxt = 'a quart';
			$('#drinkInputImg' + frmId).attr('src', '/images/icons/taco.svg');
			break;
		case '34':
			drinkSizeTxt = 'liter';
			$('#drinkInputImg' + frmId).attr('src', '/images/icons/taco.svg');
			break;
		case '60':
			drinkSizeTxt = 'a handle';
			$('#drinkInputImg' + frmId).attr('src', '/images/icons/taco.svg');
			break;
		case '2':
			drinkSizeTxt = '2 liter';
			$('#drinkInputImg' + frmId).attr('src', '/images/icons/taco.svg');
			break;
		case '2':
			drinkSizeTxt = 'a gallon';
			$('#drinkInputImg' + frmId).attr('src', '/images/icons/taco.svg');
			break;
		default:
			drinkSizeTxt = 'error';
			$('#drinkInputImg' + frmId).attr('src', '/images/icons/taco.svg');
	}
	
	//Get Drink name
	let drinkNameTxt = $('#drinkInputDrinkName' + frmId).val();
	
	$('#drinkInputDrinkDesc' + frmId).text(drinkAmtTxt + " " + drinkSizeTxt + " of " + drinkNameTxt);
}

function ValidateMixerCard(cardId){
	$("#drinkInputDrinkSizeFraction" + frmId).val()
}

function DrinkExists(drinkName){
	let exists = false;
	for (let i=0; i < jsonDataDrinks.length; i++){
		if(jsonDataDrinks[i].DrinkName == drinkName){
			//Drink exists
			exists = true;
			break;
		}
	}
	
	return exists;
}


var timeout = null;

function doDelayedSearch(input) {
  if (timeout) {  
    clearTimeout(timeout);
  }
  timeout = setTimeout(function() {
	 $("#ModalSpinner").modal('show');
     doSearch(input); //this is your existing function
  }, 1000);
}

function doSearch(input){
	console.log(input);
	$.post( "/php/GetDrinksSearch.php", { search: $('#' + input.id).val()})
		.done(function( data ) {
			console.log("got new drinks");
			jsonDataDrinks = JSON.parse(data);
			console.log(jsonDataDrinks);
			let arr = [];
			let dropdown = '';
			$.each(jsonDataDrinks, function() {
				arr.push(this.DrinkName);
			});
			console.log(arr);
							//let input = $('#myInput');
							
			var a, b, i, val =  $('#' + input.id).val();
			console.log(val);
			console.log(input);
			/*close any already open lists of autocompleted values*/
			ClearList(input.id + "autocomplete-list");
			//closeAllLists();
			currentFocus = -1;
			/*create a DIV element that will contain the items (values):*/
			dropdown += `<div id="` + input.id + `autocomplete-list" class="autocomplete-items overflow-scroll position-absolute border border-dark bg-light" style='max-height: 100px; z-index: 2000'>`;
			for (i = 0; i < arr.length; i++) {
				console.log(boldMatchCharacters({sentence: arr[i], characters: val}));
				dropdown += `<div>
								<p onclick='DropDownSelect("` + input.id.substring(input.id.search(/\d/)) + `","` + input.id + `", "` + arr[i] + `")'>` + boldMatchCharacters({sentence: arr[i], characters: val}) + `</p>
							</div>`;
			}
			dropdown += `</div>`;
			$('#' + input.id).after(dropdown);
			console.log("hide modal");
			$("#ModalSpinner").modal('hide');
			console.log("show dropdown");
			$('#' + input.id).focus();
		})
}

function DropDownSelect(target, src, val){
	console.log(target);
	for (let i=0; i < jsonDataDrinks.length; i++){
		if(jsonDataDrinks[i].DrinkName == val){
			UpdateTargetValue('drinkInputDrinkName' + target, jsonDataDrinks[i].DrinkName)		
			UpdateTargetValue('drinkInputABV' + target, jsonDataDrinks[i].ABV);   				
			UpdateTargetText('recipe' + target, jsonDataDrinks[i].DrinkRecipe);
			UpdateTargetText('drinkInputXp' + target, (jsonDataDrinks[i].ABV * (newDrinkSize /12)).toFixed(2));
			if(target > 0){
				UpdateMixerDrinkLabel(target);
			}
			break;
		}
		else{
			UpdateTargetValue('drinkName' + target, '')
			UpdateTargetValue('abv' + target, '');
			UpdateTargetText('recipe' + target, '');
			UpdateTargetText('drinkInputXp' + target, '');
			if(target > 0){
				UpdateMixerDrinkLabel(target);
			}
		}
	}
	HideList(src); //Update to dynamic list name
}

function UpdateTargetText(target, text){
	$('#' + target).text(text);
}

function UpdateTargetValue(target, value){
	$('#' + target).val(value);
}

function UpdateDrinkName(drinkName, target){
	$('#' + target).val(drinkName);
}

function UpdateABV(drinkName, target){
	for (let i=0; i < jsonDataDrinks.length; i++){
		if(jsonDataDrinks[i].DrinkName == drinkName){
			$('#' + target).val(jsonDataDrinks[i].ABV);
			break;
		}
		else{
			$('#' + target).val();
		}
	}
}




function ShowList(lstId){
	console.log("Show");
	$('#' + lstId + "autocomplete-list").removeClass('d-none');
}

function HideList(lstId){
	console.log("Hide");
	$('#' + lstId + "autocomplete-list").addClass('d-none');
}

function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
	console.log("close");
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] /*&& elmnt != inp*/) {
			console.log(x[i]);
			console.log(x[i].id);
			$('#' + x[i].id).addClass('d-none');
		//x[i].parentNode.removeChild(x[i]);
    }
  }
}

function ClearList(lstId) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
	console.log("clear");
	$('.autocomplete-items').each(function (){
		console.log(this);
		this.remove();
		//if (lstId != x[i] /*&& elmnt != inp*/) {
		//x[i].parentNode.removeChild(x[i]);
		//}
	})
}

  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }

const boldMatchCharacters = ({ sentence = "", characters = "" }) => {
    const regEx = new RegExp(characters, 'gi');
    return sentence.replace(regEx, '<strong>$&</strong>')
}

function ToggleModal(mod){
	$(mod).modal('show');
}

function SetActive(c)
    {	$( "#GameRow .card2:nth-child(" + (c + 1)+")" ).addClass("active");
		$( "#GameRow *:not(.card2:nth-child(" + (c + 1)+"))" ).removeClass("active");
		//var header = document.getElementById("ModalMoreInfoHeader");
		//var section = document.getElementById("ModalMoreInfoSection");
		//var logo = document.getElementById("ModalMoreInfoLogo");
		//var playButton = document.getElementById("PlayButton");
		//header.innerHTML = jsonData.Games[jsonID].GameInfo.Name;
		//section.innerHTML = jsonData.Games[jsonID].GameInfo.Desc;
		//logo.src = jsonData.Games[jsonID].GameInfo.Img;
		//playButton.setAttribute('onclick', 'PlayGame("' + c + '")');
		//playButton.setAttribute('href', GameData.Games[c].GameInfo.Link);
		//console.log(playButton);
		ToggleModal("#ModalMoreInfo")
		$('#ModalMoreInfoHeader').html(GameData.Games[c].GameInfo.Name);
		$('#ModalMoreInfoSection').html(GameData.Games[c].GameInfo.Desc);
		$('#ModalMoreInfoLogo').attr('src', GameData.Games[c].GameInfo.Img);
		$('#PlayButton').attr('onclick', 'PlayGame("' + c + '")');
		$('#PlayButton').attr('href', GameData.Games[c].GameInfo.Link);
	//$('.container2').animate({scrollLeft: $( ".container2 .card2:nth-child(" + (c + 1)+")" ).position().left}, 500);
	//$( ".container2").scrollLeft($( ".container2 .card2:nth-child(" + (c + 1)+")" ).position().left)
	};
