var packagesString = GetFile("packages/PackageDetails.json");
	var packages = JSON.parse(packagesString);
	var packageData = [];
	var packageDataLoad = localStorage.getItem("packageData");
	var playerData = [];
	var playerDataLoad = localStorage.getItem("playerData");
	var inputPlayer = document.getElementById("EnterName");
	var turnOrder = 0;
	var taskId = RandomNum(0, packageData.length);
	var pointsToWin = 21;
	var points = [];
var players = [];	
	
	window.onload = (event) => {
		//Load existing players
		if(playerDataLoad){
			var pd = playerDataLoad.split(',');
			for(i=0;i<pd.length;i++){
				players.push(pd[i]);
			}
		}
		UpdatePlayerList();
		
		//Set points
		document.getElementById("pointSlider").value = pointsToWin;
		
		//Select existing packages
		LoadPackageOptions();
		
	};
	
	function LoadPackageOptions(){
		var pd = [];
		if(packageDataLoad){
			pd = packageDataLoad.split(',');
		}
	
		console.log(pd);
		var PackageSelection = document.getElementById("PackageSelection");
		for(var i = 0; i < packages.Packages.length; i++){
			var chk = ""
			
			if(pd.includes(i.toString())){ chk = ' checked '}
			PackageSelection.innerHTML += 	`<div class="row">
												<div class="form-check form-switch">
													<label class="form-check-label">` + packages.Packages[i].PackageInfo.Name + `</label>
													<input type="checkbox" class="form-check-input" role="switch"` + chk + ` id="pckId` + i + `">
													<button class="btn btn-sm btn-secondary float-end" onclick='MoreInfo("` + i + `")'>More Info</button>
												</div>
											</div>`;
		}
	}
	
	function MoreInfo(pkgId){
		var pkgId2 = pkgId.replace("pckId", "");
		$("#ModalPackagesMoreInfoName").html(packages.Packages[pkgId2].PackageInfo.Name);
		$("#ModalPackagesMoreInfoDesc").html(packages.Packages[pkgId2].PackageInfo.Desc);
		$("#ModalPackagesMoreInfo").modal('show');
	}
	
	function LoadPackageData(pkgSrc){
		var pkg = GetFile(pkgSrc);
		var pkgJson = JSON.parse(pkg);
		var tmpArr = pkgJson.Tasks
		packageData = packageData.concat(tmpArr);

	}
	
	function LoadPlayerData(){
		playerData = players;
		for (i = 0; i < players.length; i++) {
			points.push(0);
		}
		localStorage.setItem("playerData", playerData);
	}
	
	function GetFile(url){	
		if (window.XMLHttpRequest){
					xmlhttp = new XMLHttpRequest();
				}
				else{
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				var res = "";
				xmlhttp.open("GET", url, false);
				xmlhttp.send();
				if(xmlhttp.status === 200){
					res = xmlhttp.responseText;
				}		
		return res;
	}
	
	function PlayGame(){
		LoadPlayerData()
		SetScoreboard();
		pointsToWin = document.getElementById("pointSlider").value;
		
		$("#MainMenu").addClass("d-none");
		$("#PlayScreen").removeClass("d-none");
		var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')
		var checkedBoxes = [];
		for (var i = 0; i < checkboxes.length; i++) {
			var pkgId = checkboxes[i].id.replace("pckId", "");
			LoadPackageData("packages/" + packages.Packages[pkgId].PackageInfo.FileName);
			checkedBoxes.push(pkgId);
			//var pkgdata = GetFile();
		}	
		localStorage.setItem("packageData", checkedBoxes);
		NextTurn(turnOrder);
	}
	
	function UpdatePlayerList(){
		$("#MainMenuPlayerList").html("");
		$("#ConfigPlayerList").html("");
		for(i=0; i<players.length; i++){
			//Set main menu list
			$("#MainMenuPlayerList").append(`<div class="row"><h3 class="text-capitalize">` + players[i] + `</h3></div>`);
			
			
			//Set Player Config
			$("#ConfigPlayerList").append(`<div class="row mb-2 player"><div><h3 class="d-inline text-capitalize">` + players[i] +`</h3><button class="btn btn-secondary float-end" onclick=\'RemovePlayer(event)\'>remove</button></div></div>`);
		}
		console.log(players);
	}
	
	function AddPlayer(){
		let name = document.getElementById("EnterName").value;
		if(name){
			players.push(name);
			document.getElementById("EnterName").value = "";
			UpdatePlayerList();
		}
	}

	function RemovePlayer(e){
		$(e.target).closest(".player").addClass("removePlayer");
		let p2 = $("#ConfigPlayerList");
		for(p=0; p< p2[0].children.length; p++){
			if($(p2[0].children[p]).hasClass("removePlayer")){
				console.log(players[p]);
				players.splice(p, 1)
			}
		}
		UpdatePlayerList();
	}
	

	
	
	inputPlayer.addEventListener("keypress", function(event) {
		if (event.key === "Enter") {
			AddPlayer();
		}
	});
	
	
	function NextTurn(d){
		console.log(playerData);
		//Set Current players score
		if(d == 'DO'){
			points[turnOrder-1] = Number(points[turnOrder-1]) + Number(packageData[taskId].Point);
		}
		else if(d == 'DRINK'){
			let p = Math.floor(Number(packageData[taskId].Point) / 2);
			//Give at least 1 point
			/*if (p <= 0){
				p = 1;
			}*/
			points[turnOrder-1] = Number(points[turnOrder-1]) + p;
			//miniwheel
			var count = packageData[taskId].Drink.length;
			var svg = document.getElementById("MisfortuneModalMiniWheel").parentElement;
			svg.style.display = "block";
		
		
		
		var startPoint = '0 0'; //translate(50,50)
		
		var radius = 250;
		var fPointX = radius;
		var fPointY = 0;
		var fPoint = fPointX + ' ' + fPointY; //very first point always radius,0

		
		var qPointX = Math.ceil(radius * Math.sin(360/count * Math.PI / 180.0));
		var qPointY = Math.ceil(radius * Math.cos(360/count * Math.PI / 180.0));
		var qPointX2 = Math.ceil((radius * .8) * Math.sin(360/count * Math.PI / 180.0));
		var qPointY2 = Math.ceil((radius * .8) * Math.cos(360/count * Math.PI / 180.0));
		var qPoint = qPointY + ' ' + qPointX;
		
		var qArcX = qPointX;
		var qArcY = fPointY;
		var qArc = qArcX + ' ' + qArcY;

		var segWidth = Math.sqrt(Math.pow(qPointY2 - (radius * .8) ,2) + Math.pow(qPointX2 - fPointY ,2))
		document.getElementById("MisfortuneModalMiniWheel").innerHTML = "";
		for(var i = 0; i < count; i++){
			var rotate = (360/count) * i;
			
			var imgSize = segWidth / 2;
			var imgX = (qPointY - ((qPointY2 - (radius * .8)) / 2)) - (imgSize / 2);
			var imgY = (qPointX - ((qPointX2 - fPointY) / 2)) - (imgSize / 2);
			//svg.innerHTML += '<path d="M ' + startPoint + ' L ' + fPoint + ' Q ' + qArc + ' ' + qPoint + ' L ' + startPoint + '" fill="blue" stroke="blue" stroke-width="1"/>'; //curved arc
			document.getElementById("MisfortuneModalMiniWheel").innerHTML += '<g transform="translate(' + radius + ',' + radius + ') rotate(' + rotate + ')">' + 
							'<path d="M ' + startPoint + ' L ' + fPoint + ' L ' + qPoint + ' L ' + startPoint + '" fill="' + "#86e98f" + '" stroke="black" stroke-width="1" />' +							
							'<image x="' + (imgX - (imgSize /2)) + '" y="' + (imgY - (imgSize /2)) + '" width="' + imgSize + 'px" height="' + imgSize + 'px" xlink:href="../../images/numbers/' + packageData[taskId].Drink[i] + '.svg" style="transform-box: fill-box; transform-origin: center; transform: rotate(108deg);"></image>' +
							//'<circle cx="' + imgX + '" cy="' + imgY + '" r="5" fill="red"/>' +
							'</g>'; //straight line
			

		}

			$("#ModalMiniWheel").modal('show');
			//ToggleModal("modalMiniWheel");
			var spinPower = Math.trunc((Math.random() * 720) + 720);
			var spinSec = spinPower * 5;

			var r = document.querySelector(':root');
			r.style.setProperty('--spinMax', (spinPower * -1) + 'deg');
			r.style.setProperty('--spinSec', spinSec + 'ms');
		}
	
	
		console.log(playerData[turnOrder-1] + ' has ' + points[turnOrder-1] + ' points');
	
	
		//Set next players action
		if(turnOrder >= playerData.length){
			turnOrder = 0;
		};
	
		taskId = RandomNum(0, packageData.length);
		document.getElementById("PlayScreenTask").innerHTML = '<h1>' + ReplaceVar(packageData[taskId].Do) + '</h1>';
		$("#PlayScreenDoPoints").text("(" + packageData[taskId].Point + " points)");
		$("#PlayScreenDrinkPoints").text("(" + Math.floor(Number(packageData[taskId].Point) / 2) + " points)");
		//document.getElementById("PlayScreenPoints").innerHTML = '<h3>For ' + packageData[taskId].Point + ' points</h3>';
		document.getElementById("PlayerTurn").innerHTML = '<h1>' + playerData[turnOrder] + '</h1>';
		turnOrder += 1;
		
		UpdateScoreboard();
	}
	
	function RandomNum(min, max) { // min and max included 
			return Math.floor(Math.random() * (max - min) + min)
		};
		
	function ReplaceVar(task){
		var repPlayers = playerData.slice();
		repPlayers.push("another player of your choice");
		while(task.includes('@p')){
			task = task.replace(/@p/, repPlayers[RandomNum(0, repPlayers.length)]);
		}
		var directions = ["to your left", "to your right", "across from you"];
		while(task.includes('@d')){
			task = task.replace(/@d/, directions[RandomNum(0, directions.length)]);
		}

		
		
		return task;
	}
	
	function FlipCard(e){
		let src = e.srcElement.closest(".card-org");
		src.children[0].classList.add('flippedb');	
		src.children[1].classList.add('flippedf');	
	}
	
	function FlipBack(e){
		let src = e.srcElement.closest(".card-org");
		src.children[0].classList.remove('flippedb');	
		src.children[1].classList.remove('flippedf');	
	}
	
	function toggleSpin(){
		var spinner = document.getElementById("tire");
		spinner.classList.add("startSpin");
		spinner.classList.remove("postSpin");
		var spinPower = Math.trunc((Math.random() * 720) + 720);
		var spinSec = spinPower * 5;

		var r = document.querySelector(':root');
		r.style.setProperty('--spinMax', (spinPower * -1) + 'deg');
		r.style.setProperty('--spinSec', spinSec + 'ms');
		
		//spinner.style= 'transform: rotate(' + spinPower + 'deg); transform-origin: 50% 50%;';
	}
	
	function UpdateSlider(){
		var sliderVal = document.getElementById("pointSlider").value;
		document.getElementById("pointDisplay").innerText = 'First to ' + sliderVal + ' points';
	}
	/*
	function UpdateScoreboard(){
		var scoreboard = document.getElementById('ScoreBoard');
		let scoreHTML = "";
		for(let i=0; i < points.length; i++){
			let percent = Math.floor((points[i] / pointsToWin) * 100);
			console.log(percent);
			scoreHTML += 	'<small>' + playerData[i] + '</small>' +
							'<div class="progress mb-3" style="height: 20px;">' +
								'<div class="progress-bar bg-primary" role="progressbar" style="width: ' + percent + '%;" aria-valuenow="' + points[i] +'" aria-valuemin="0" aria-valuemax="' + pointsToWin + '">' + points[i] + '</div>' +
							'</div>';
		}
		
		
		scoreboard.innerHTML = scoreHTML;
	}*/
	
	function SetScoreboard(){
		let scoreHTML = "";
		for(let i=0; i < points.length; i++){
			scoreHTML += 	'<small>' + playerData[i] + '</small>' +
							'<div class="progress mb-3" style="height: 20px;">' +
								'<div id="scoreboard' + i + '" class="progress-bar bg-primary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="' + pointsToWin + '">' + points[i] + '</div>' +
							'</div>';
		}
		$("#ScoreBoard").html(scoreHTML);
	}
	
	function UpdateScoreboard(){
		var scoreboard = document.getElementById('ScoreBoard');
		
		for(let i=0; i < points.length; i++){
			let percent = Math.floor((points[i] / pointsToWin) * 100);
			console.log(percent);
			$("#scoreboard" + i).attr("aria-valuenow", points[i]);
			$("#scoreboard" + i).attr("style", "width: "+ percent + "%");
			$("#scoreboard" + i).text(points[i]);
			/*scoreHTML += 	'<small>' + playerData[i] + '</small>' +
							'<div class="progress mb-3" style="height: 20px;">' +
								'<div class="progress-bar bg-primary" role="progressbar" style="width: ' + percent + '%;" aria-valuenow="' + points[i] +'" aria-valuemin="0" aria-valuemax="' + pointsToWin + '">' + points[i] + '</div>' +
							'</div>';*/
		}
		
		
		scoreboard.innerHTML = scoreHTML;
	}

	