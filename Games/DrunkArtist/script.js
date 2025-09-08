// Get a regular interval for drawing to the screen
	/*
	window.requestAnimFrame = (function (callback) {
		return window.requestAnimationFrame || 
					window.webkitRequestAnimationFrame ||
					window.mozRequestAnimationFrame ||
					window.oRequestAnimationFrame ||
					window.msRequestAnimaitonFrame ||
					function (callback) {
					 	window.setTimeout(callback, 1000/60);
					};
	})();
*/
	// Set up the canvas
	var canvas = document.getElementById("sig-canvas");
	var canvas2 = document.getElementById("sig-canvas2");
	var canvasSize = screen.width * .9;
	canvas.width = canvasSize;
	canvas.height = canvasSize;
	canvas2.width = canvasSize;
	canvas2.height = canvasSize;
	
	
	var ctx = canvas.getContext("2d");
	var ctx2 = canvas2.getContext("2d");
	//ctx.strokeStyle = "#ff0000";
	ctx.strokeStyle = "rgb(255, 255, 255)";
	ctx.lineWith = 4;
	ctx2.strokeStyle = "rgb(120, 50, 190)";
	ctx2.lineWith = 4;

	// Set up the UI
	var sigText = document.getElementById("sig-dataUrl");
	var sigImage = document.getElementById("sig-image");
	
	function Clear(){
		clearCanvas();
		sigText.innerHTML = "Data URL for your signature will go here!";
		sigImage.setAttribute("src", "");
	
	}
	
	function Submit(){
		var dataUrl = canvas2.toDataURL();
		//sigText.innerHTML = dataUrl; //potentially use for later gameplay with socket session style
		sigImage.setAttribute("src", dataUrl);
		ToggleModal("ModalImageResult");
	}



	// Set up mouse events for drawing
	var drawing = false;
	var mousePos = { x:0, y:0 };
	var lastPos = mousePos;
	canvas.addEventListener("mousedown", function (e) {
		drawing = true;
		lastPos = getMousePos(canvas, e);
		renderCanvas();
	}, false);
	canvas.addEventListener("mouseup", function (e) {
		drawing = false;
	}, false);
	canvas.addEventListener("mousemove", function (e) {
		mousePos = getMousePos(canvas, e);
		renderCanvas();
	}, false);

	// Set up touch events for mobile, etc
	canvas.addEventListener("touchstart", function (e) {
		disableScroll();
		mousePos = getTouchPos(canvas, e);
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousedown", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		canvas.dispatchEvent(mouseEvent);
		renderCanvas();
	}, false);
	canvas.addEventListener("touchend", function (e) {
		enableScroll();
		var mouseEvent = new MouseEvent("mouseup", {});
		canvas.dispatchEvent(mouseEvent);
	}, false);
	canvas.addEventListener("touchmove", function (e) {
		disableScroll();
		mousePos = getTouchPos(canvas, e);
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousemove", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		canvas.dispatchEvent(mouseEvent);
		renderCanvas();
	}, false);

	// Prevent scrolling when touching the canvas
	/*
	document.body.addEventListener("touchstart", function (e) {
		if (e.target == canvas) {
			disableScroll();
		}
	}, false);
	document.body.addEventListener("touchend", function (e) {
		if (e.target == canvas) {
			enableScroll();
		}
	}, false);
	document.body.addEventListener("touchmove", function (e) {
		if (e.target == canvas) {
			disableScroll();
		}
	}, false);
	document.ontouchmove = function(event){
		disableScroll();
	}*/


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
	
	// Get the position of the mouse relative to the canvas
	function getMousePos(canvasDom, mouseEvent) {
		var rect = canvasDom.getBoundingClientRect();
		return {
			x: mouseEvent.clientX - rect.left,
			y: mouseEvent.clientY - rect.top
		};
	}

	// Get the position of a touch relative to the canvas
	function getTouchPos(canvasDom, touchEvent) {
		var rect = canvasDom.getBoundingClientRect();
		return {
			x: touchEvent.touches[0].clientX - rect.left,
			y: touchEvent.touches[0].clientY - rect.top
		};
	}

	// Draw to the canvas
	function renderCanvas() {
		if (drawing) {
			ctx.moveTo(lastPos.x, lastPos.y);
			ctx.lineTo(mousePos.x, mousePos.y);
			ctx.stroke();
			ctx2.moveTo(lastPos.x, lastPos.y);
			ctx2.lineTo(mousePos.x, mousePos.y);
			ctx2.stroke();
			lastPos = mousePos;
		}
	}

	function clearCanvas() {
		canvas.width = canvas.width;
	}
	
function ToggleModal(mod){
			var togMod = document.getElementById(mod);
			togMod.classList.toggle("modal-vis");
		
		}
		
function GetImage(){
	var img = document.getElementById("ImageDraw");
	
	if (window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}
			else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			var phpResult = "";
			xmlhttp.open("GET", "GetRandomImage.php", false);
			xmlhttp.send();
			if(xmlhttp.status === 200){
				phpResult = xmlhttp.responseText;
			}	
	
	img.innerHTML = phpResult;
}