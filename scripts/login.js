/*function CheckLogin(username, pin){
	if (window.XMLHttpRequest){xmlhttp = new XMLHttpRequest();}else{xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}
	
	var loginResult = "";
	xmlhttp.open("GET", "/php/CheckLogin.php?user=" + username + "&pin=" + pin, false);
	xmlhttp.send();
	if(xmlhttp.status === 200){
		loginResult = xmlhttp.responseText;
	}
	if(loginResult != "Invalid"){
		console.log("Successful Login: " + loginResult);
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
	console.log("Set Login");
	localStorage.setItem("userId", userId);
}

function Login(userId){
	$("#ModalLogin").modal('hide');
	console.log("getting profiles for " + userId);
	console.log(GetUserProfiles(userId));

	
}

function Logout(){
	//clear local storage variables
	localStorage.removeItem("userId");
}

function InvalidUsernameOrPassword(){
	$("#floatingInput").val("");
	$("#floatingPassword").val("");
	$("#LoginMessage").show();
	$("#ModalLogin").modal('show');
}


$(document).ready(function(){
	//if sessions variable available check
	if (localStorage.getItem("userId") != null) {
		console.log("User aleady set, auto logging in");
		Login(localStorage.getItem("userId"));
	}
	else{
		$("#ModalLogin").modal('show');
	}
});

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
	let profiles = json.Parse(jsonString);
	console.log(profiles);
}
*/
