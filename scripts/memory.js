var FlipCount = 0;
var jsonString = `{
			"Options":[
				{"img":"3drinks.svg","drink":3},
				{"img":"beer.svg","drink":1},
				{"img":"beer2.svg","drink":2},
				{"img":"beer2pack.svg","drink":2},
				{"img":"beer3.svg","drink":1},
				{"img":"beerBarrel.svg","drink":2},
				{"img":"beerGlassAndPitcher.svg","drink":2},
				{"img":"beerStein.svg","drink":1},
				{"img":"bottle3pack.svg","drink":3},
				{"img":"bottle3pack2.svg","drink":3},
				{"img":"bottle3pack3.svg","drink":3},
				{"img":"bottle3pack4.svg","drink":3},
				{"img":"martiniGlass.svg","drink":1},
				{"img":"martiniGlasses.svg","drink":2},
				{"img":"partyChampagne.svg","drink":1},
				{"img":"pinkMargarita.svg","drink":1},
				{"img":"plasticCups.svg","drink":2},
				{"img":"tropicalDrink.svg","drink":1},
				{"img":"tropicalDrink2.svg","drink":1},
				{"img":"tropicalDrink3.svg","drink":1},
				{"img":"WhiskeyAndGlasses.svg","drink":3},
				{"img":"whiskeyGlass.svg","drink":1},
				{"img":"wineBottle.svg","drink":1},
				{"img":"wineBottleAndGlass.svg","drink":2},
				{"img":"wineBottleAndGlass2.svg","drink":2},
				{"img":"wineBottleAndGlasses.svg","drink":3},
				{"img":"wineGlass.svg","drink":1},
				{"img":"wineGlass2.svg","drink":1}
				]
			}`;
var jsonData = JSON.parse(jsonString);
	
	
	window.onload = (event) => {
		NewCard();
		
		
	}

	function AddCardListeners(){
		var slides = document.getElementsByClassName("card-front");
		for (var i = 0; i < slides.length; i++) {
			slides[i].addEventListener('transitionend', () => {
				if (FlipCount >= 2){
					FlipCheck();
					FlipCount = 0;
				}
			});
		}
	}

	function FlipCard(e){
		FlipCount += 1;
		let src = e.srcElement.closest(".card-org");
		src.children[0].classList.toggle('flippedf');	
		src.children[1].classList.toggle('flippedb');

		
		
	}
	
	function FlipCheck(){
		//let cards = document.getElementsByClassName("flippedf");
		//let cards = document.getElementsByClassName(':not(.Match)');
		let cards = document.querySelectorAll('.flippedf :not(.Match)');
			let img1 = cards[0].href.baseVal.replace('../../images/Icons/', '');
			let img2 = cards[1].href.baseVal.replace('../../images/Icons/', '');
			let drinkAmt = 0;
			for (let i = 0; i < jsonData.Options.length; i++) {
				if(jsonData.Options[i].img == img1){
					drinkAmt = jsonData.Options[i].drink;
				}
			}
			if (img1 == img2){
				//let drinkAmt = GetDrinkVal(img1, img2)
				alert('MATCH! - Give ' + drinkAmt + ' drinks');
				cards[0].closest(".card-org").classList.add('Match');
				cards[1].closest(".card-org").classList.add('Match');
				cards[0].classList.add('Match');
				cards[1].classList.add('Match');
				cards[0].closest(".card-org").removeAttribute("onclick");
				cards[1].closest(".card-org").removeAttribute("onclick");
			}
			else{
				//let drinkAmt = GetDrinkVal(img1, img2)
				cards[0].closest(".card-org").classList.add('MisMatch');
				cards[1].closest(".card-org").classList.add('MisMatch');

				FlipBack(drinkAmt);
			}
	}
	
	function GetDrinkVal(opt1, opt2){
		let val1 = 0;
		for (let i = 0; i < jsonData.Options.length; i++) {
			if(jsonData.Options[i].img == opt1){
				val1 = jsonData.Options[i].drink
			}
		}
		
		let val2 = 0;
		for (let i = 0; i < jsonData.Options.length; i++) {
			if(jsonData.Options[i].img == opt2){
				val2 = jsonData.Options[i].drink
			}
		}
	
		if (val1 >= val2){
			return val1
		}
		else{
			return val2
		}
	
		
	}
	
	function FlipBack(drinkAmt){
		alert('Mismatch - Take ' + drinkAmt + ' drinks');
		wait(500);
		const boxes = document.querySelectorAll('.MisMatch');
		boxes.forEach(box => {
			box.classList.remove('MisMatch');
			box.children[0].classList.remove('flippedf');
			box.children[1].classList.remove('flippedb');
		});
	}
		
	function NewCard(){
		const options = [];
		var repeatNum = [];
		for (var c=0; c <= 11; c++){
			let rn = RandomNum(0, jsonData.Options.length)
			options.push(jsonData.Options[rn].img);
		}
		console.log(options);
		$("#card1").attr("src","/images/Icons/" + options[0]);
		$("#card2").attr("src","/images/Icons/" + options[1]);
		$("#card3").attr("src","/images/Icons/" + options[2]);
		$("#card4").attr("src","/images/Icons/" + options[3]);
		$("#card5").attr("src","/images/Icons/" + options[4]);
		$("#card6").attr("src","/images/Icons/" + options[5]);
		$("#card7").attr("src","/images/Icons/" + options[6]);
		$("#card8").attr("src","/images/Icons/" + options[7]);
		$("#card9").attr("src","/images/Icons/" + options[8]);
		$("#card10").attr("src","/images/Icons/" + options[9]);
		$("#card11").attr("src","/images/Icons/" + options[10]);
		$("#card12").attr("src","/images/Icons/" + options[11]);
		$("#cardPrimary").attr("src","/images/Icons/" + options[RandomNum(0, options.length)]);
		
		AddCardListeners()
	}
	function RandomNum(min, max) { // min and max included 
		return Math.floor(Math.random() * (max - min) + min)
	};
	
	function wait(ms){
   var start = new Date().getTime();
   var end = start;
   while(end < start + ms) {
     end = new Date().getTime();
  }
}