<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/navbar-fixed-top/">

    <title>Drink Maker</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.3.4.1.css" rel="stylesheet">
	<link href="../style.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">

<style>
.absolute{
	position: absolute;
}

.drinkItem{
	
	background-color: #f5f5f5;
}

.drinkItem .del{
	color: red;
	border: 1px solid red;
	float: right;
}
</style>
  
  </head>

  <body ondragover="preventDefault(event)" ondrop="drop(event)">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" style="width: 45px;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Drink Maker</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse scroll" style="max-height: 250px">
			<div class="nav navbar-nav scrolling-wrapper">
				<div class="card" data-toggle="collapse" data-target="#navbarSHOT"><img class="img100" src="../../images/shot.svg"><h2>SHOT</h2></div>
				<div class="card" data-toggle="collapse" data-target="#navbarCAN"><img class="img100" src="../../images/can.svg"><h2>CAN</h2></div>
				<div class="card" data-toggle="collapse" data-target="#navbarBottle"><img class="img100" src="../../images/bottle.svg"><h2>BOTTLE</h2></div>
				<div class="card" data-toggle="collapse" data-target="#navbarHandle"><img class="img100" src="../../images/bottle.svg"><h2>HANDLE</h2></div>
				<div class="card" data-toggle="collapse" data-target="#navbarLiter"><img class="img100" src="../../images/bottle.svg"><h2>LITER</h2></div>
				<div class="card"><img class="img100" src="../../images/shot.svg"><h2>SHOT</h2><p><i>non-alchoholic</i></p></div>
				<div class="card"><img class="img100" src="../../images/can.svg"><h2>CAN</h2><p><i>non-alchoholic</i></p></div>
				<div class="card"><img class="img100" src="../../images/bottle.svg"><h2>BOTTLE</h2><p><i>non-alchoholic</i></p></div>
				<div class="card"><img class="img100" src="../../images/bottle.svg"><h2>HANDLE</h2><p><i>non-alchoholic</i></p></div>
				<div class="card"><img class="img100" src="../../images/bottle.svg"><h2>LITER</h2><p><i>non-alchoholic</i></p></div>
			</div>
        </div><!--/.nav-collapse -->
		
      </div>
	  <nav class="navbar-default">
      <div class="container" id="subNavs">
        <div id="navbarSHOT" class="navbar-collapse collapse scroll subnav" style="max-height: 155px">
			<div class="nav navbar-nav scrolling-wrapper">
				<ul class="list-unstyled components">
                        <li class="card" draggable="true" ondragstart="dragStart(event)" id="SelectorSingleShot"><img class="img40" src="../../images/shot.svg">Single</li>
                        <li class="card" draggable="true" ondragstart="dragStart(event)" id="SelectorDoubleShot"><img class="img40" src="../../images/shot.svg">Double</li>
                        <li class="card" draggable="true" ondragstart="dragStart(event)" id="SelectorTripleShot"><img class="img40" src="../../images/shot.svg">Triple</li>
                </li>

            </ul>
			</div>
        </div><!--/.nav-collapse -->
		<div id="navbarCAN" class="navbar-collapse collapse scroll subnav" style="max-height: 155px">
			<div class="nav navbar-nav scrolling-wrapper">
				<ul class="list-unstyled components">
                        <li class="card" draggable="true" ondragstart="dragStart(event)" id="SelectorSplashOfCan"><img class="img40" src="../../images/can.svg">Splash of...</li>
                        <li class="card" draggable="true" ondragstart="dragStart(event)" id="SelectorQuarterCan"><img class="img40" src="../../images/can.svg">Quarter Can</li>
                        <li class="card" draggable="true" ondragstart="dragStart(event)" id="SelectorHalfCan"><img class="img40" src="../../images/can.svg">Half Can</li>
						<li class="card" draggable="true" ondragstart="dragStart(event)" id="Selector34Can"><img class="img40" src="../../images/can.svg">3/4 Can</li>
						<li class="card" draggable="true" ondragstart="dragStart(event)" id="SelectorWholeCan"><img class="img40" src="../../images/can.svg">Whole Can</li>
                </li>

            </ul>
			</div>
        </div>
		<div id="navbarBottle" class="navbar-collapse collapse scroll subnav" style="max-height: 155px">
			<div class="nav navbar-nav scrolling-wrapper">
				<ul class="list-unstyled components">
                        <li class="card" draggable="true" ondragstart="dragStart(event)"><img class="img40" src="../../images/bottle.svg">Splash of...</li>
                        <li class="card" draggable="true" ondragstart="dragStart(event)"><img class="img40" src="../../images/bottle.svg">Quarter Bottle</li>
                        <li class="card" draggable="true" ondragstart="dragStart(event)"><img class="img40" src="../../images/bottle.svg">Half Bottle</li>
						<li class="card" draggable="true" ondragstart="dragStart(event)"><img class="img40" src="../../images/bottle.svg">3/4 Bottle</li>
						<li class="card" draggable="true" ondragstart="dragStart(event)"><img class="img40" src="../../images/bottle.svg">Whole Bottle</li>
                </li>

            </ul>
			</div>
        </div>
		<div id="navbarHandle" class="navbar-collapse collapse scroll subnav" style="max-height: 155px">
			<div class="nav navbar-nav scrolling-wrapper">
				<ul class="list-unstyled components">
                        <li class="card" draggable="true" ondragstart="dragStart(event)"><img class="img40" src="../../images/bottle.svg">Quarter Handle</li>
                        <li class="card" draggable="true" ondragstart="dragStart(event)"><img class="img40" src="../../images/bottle.svg">Half Handle</li>
						<li class="card" draggable="true" ondragstart="dragStart(event)"><img class="img40" src="../../images/bottle.svg">3/4 Handle</li>
						<li class="card" draggable="true" ondragstart="dragStart(event)"><img class="img40" src="../../images/bottle.svg">Whole Handle</li>
                </li>

            </ul>
			</div>
        </div>
		<div id="navbarLiter" class="navbar-collapse collapse scroll subnav" style="max-height: 155px">
			<div class="nav navbar-nav scrolling-wrapper">
				<ul class="list-unstyled components">
                        <li class="card" draggable="true" ondragstart="dragStart(event)"><img class="img40" src="../../images/bottle.svg">Quarter Liter</li>
                        <li class="card" draggable="true" ondragstart="dragStart(event)"><img class="img40" src="../../images/bottle.svg">Half Liter</li>
						<li class="card" draggable="true" ondragstart="dragStart(event)"><img class="img40" src="../../images/bottle.svg">3/4 Liter</li>
						<li class="card" draggable="true" ondragstart="dragStart(event)"><img class="img40" src="../../images/bottle.svg">Whole Liter</li>
                </li>

            </ul>
			</div>
        </div>
      </div>
	  
    </nav>
    </nav>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../js/bootstrap.min.js"></script>

<script>
	function moveTouch(ev) {
		disableScroll();
		var touchLocation = ev.targetTouches[0];
		ev.srcElement.parentElement.style.left = touchLocation.pageX - (ev.srcElement.width / 2) +'px';
		ev.srcElement.parentElement.style.top = touchLocation.pageY - (ev.srcElement.height / 2) + 'px';		
	}
	
	function moveTouchEnd() {
		enableScroll();
	}
	
	function moveCard(ev) {
		ev.srcElement.style.left = ev.clientX - 60;
		ev.srcElement.style.top = ev.clientY - 10;
	}
	
	function toggleNavbar(nav){
		
		var navbar = document.getElementById(nav);
		var subNavs = document.getElementsByClassName("subnav");
		for (i = 0; i < subNavs.length; i++){
			subNavs[i].classList.add("collapse");
		};
		console.log(nav);
		console.log(navbar);
		navbar.classList.toggle("collapse");
	}
	
	
//prevent scrolling when moving
var keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
  e.preventDefault();
}

function preventDefaultForScrollKeys(e) {
  if (keys[e.keyCode]) {
    preventDefault(e);
    return false;
  }
}

// modern Chrome requires { passive: false } when adding event
var supportsPassive = false;
try {
  window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
    get: function () { supportsPassive = true; } 
  }));
} catch(e) {}

var wheelOpt = supportsPassive ? { passive: false } : false;
var wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

// call this to Disable
function disableScroll() {
  window.addEventListener('DOMMouseScroll', preventDefault, false); // older FF
  window.addEventListener(wheelEvent, preventDefault, wheelOpt); // modern desktop
  window.addEventListener('touchmove', preventDefault, wheelOpt); // mobile
  window.addEventListener('keydown', preventDefaultForScrollKeys, false);
}

// call this to Enable
function enableScroll() {
  window.removeEventListener('DOMMouseScroll', preventDefault, false);
  window.removeEventListener(wheelEvent, preventDefault, wheelOpt); 
  window.removeEventListener('touchmove', preventDefault, wheelOpt);
  window.removeEventListener('keydown', preventDefaultForScrollKeys, false);
}
	

let isDragging = false;
let newItem = false;
var initX = 0;
var initY = 0;
var newX = 0;
var newY = 0;

function newItemStart(ev) {
		disableScroll();
		var touchLocation = ev.targetTouches[0];
		initX = touchLocation.pageX;
		initY = touchLocation.pageY;
		isDragging = true;		
}
	
function newItemMove(ev) {
	newItem = false;
		if (isDragging === true){
			disableScroll();
			var touchLocation = ev.targetTouches[0];
			console.log(touchLocation.pageY);
			if(((initY - touchLocation.pageY) < -75)){
				
				newItem = true;
				newX = touchLocation.pageX;
				newY = touchLocation.pageY;
			}
			//src1.style.left = touchLocation.pageX - (src1.width / 2) +'px';
			//src1.style.top = touchLocation.pageY - (src1.height / 2) + 'px';
		}
	}

function newItemStop(ev, label, imgSrc) {
	isDragging = false;
		if (newItem === true){
			var width = 50;
			var height = 50;
			var left = newX - (width / 2);
			var top = newY - (height / 2);
			var htmlItem = '<img class="img50" src="../../images/' + imgSrc + '" id="source1" ontouchmove="moveTouch(event)" ontouchend="moveTouchEnd(event)"><p>' + label + '</p><input type="text" name="fname"><p class="del" onclick="deleteItem(event)">X</p>';
			console.log(htmlItem);
			var div = document.createElement("DIV");
			div.innerHTML = htmlItem.trim();
			div.style.left = left;
			div.style.top = top;
			div.className= "absolute drinkItem card";
			//div.setAttribute('ontouchmove', 'moveTouch(event)');
			//div.setAttribute('ontouchend', 'moveTouchEnd(event)');
			//ev.srcElement.style.left = touchLocation.pageX - (ev.srcElement.width / 2) +'px';
			//ev.srcElement.style.top = touchLocation.pageY - (ev.srcElement.height / 2) + 'px';
			document.body.appendChild(div);
		}	
	enableScroll();
}

function deleteItem(ev) {
	ev.srcElement.parentElement.remove();
}


function toggleSubnav(ev){
	var toggle = ev.srcElement.parentElement.innerText;
	var matchId = "navbar" + toggle;
	console.log(toggle);

	var childDivs = document.getElementById('subNavs').getElementsByTagName('div');
	for( i=0; i< childDivs.length; i++ )
	{
		var childDiv = childDivs[i];
		childDiv.classList.remove("in");
		if(childDiv.id === matchId){
			console.log("match");
			childDiv.classList.add("in");
		}
	}
}


function dragStart(event) {
	event.dataTransfer.setData("selector", event.target.closest("li").id);
	disableScroll();

}

function dragging(event) {
  document.getElementById("demo").innerHTML = "The p element is being dragged";
}

function allowDrop(event) {
  event.preventDefault();
}

function drop(event) {
	event.preventDefault();
	enableScroll();
	console.log(event);
	const data = event.dataTransfer.getData("selector");
	console.log(data);
	if (data){
		console.log("yes data: " + data);
		var width = 50;
		var height = 50;
		var left = event.clientX - (width / 2);
		var top = event.clientY - (height / 2);
		var cardData = '<div class="absolute drinkItem card" style="left: ' + left + 'px; top: ' + top + 'px;" draggable="true" ondrag="moveCard(event)" onfocus="SetFocus(event)" onblur="LoseFocus(event)">';
		switch (data) {
			case 'SelectorSingleShot':
				cardData += '<img class="img50" src="../../images/shot.svg" ontouchmove="moveTouch(event)" ontouchend="moveTouchEnd(event)"><p>Single Shot</p><input type="text" name="fname" onfocus="SetFocus(event)" onblur="LoseFocus(event)">';
				break;
			case 'SelectorDoubleShot':
				cardData += '<img class="img50" src="../../images/shot.svg" ontouchmove="moveTouch(event)" ontouchend="moveTouchEnd(event)"><p>Double Shot</p><input type="text" name="fname" onfocus="SetFocus(event)" onblur="LoseFocus(event)">';
				break;
			case 'SelectorTripleShot':
				cardData += '<img class="img50" src="../../images/shot.svg" ontouchmove="moveTouch(event)" ontouchend="moveTouchEnd(event)"><p>Triple Shot</p><input type="text" name="fname" onfocus="SetFocus(event)" onblur="LoseFocus(event)">';
				break;
			
		}
		cardData += '<button class="btn btn-danger" onclick="deleteItem(event)">X</button></div>';
		

		document.body.innerHTML += cardData;
	}
	
	
	
}

function SetFocus(ev){
	ev.target.closest("div").style.zIndex = "2";
}

function LoseFocus(ev){
	ev.target.closest("div").style.zIndex = "0";
}

</script>

</body>
</html>