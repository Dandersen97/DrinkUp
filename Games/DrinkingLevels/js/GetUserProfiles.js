window.onload = function(){
	var jsonString = "not this";
	var jsonData = "";
	$.post("php/GetUserProfiles.php",{ userid: "1632185629" }, function(data, status){
		console.log(data);
		jsonString = "\'" + data + "\'";
		console.log("Log: " + jsonString);
		jsonData = JSON.parse(data);
	}
	);

	document.getElementById("data").innerHTML = "test123";
	document.getElementById("data").innerHTML = jsonData.length;
	
	
	
	for (let i=0; i < jsonData.length; i++){
		document.getElementById("name").value = jsonData[i].Name;
		document.getElementById("email").value = jsonData[i].Level;
		document.getElementById("drinkDesc").innerHTML = jsonData[i].Description;
	}
};





