var socket = io('ws://68.171.183.131:49258');


socket.on("connect", () => {
	//alert("Sucessful connection to game server");
	console.log("Connected: " + socket.id);
});
	
socket.on("disconnect", () => {
	//alert("Disconncected from game server");
	
	
	//socket.emit("ClientLost", {socket.id});
	console.log("Connection Lost: " + socket.connected);
	console.log(socket);
	});
	
socket.on("connect_error", () => {
	//alert("Unable to connect to game server");
	console.log("Connection Error: " + socket.connected);
});

socket.on("reconnect", function() {
  // do not rejoin from here, since the socket.id token and/or rooms are still
  // not available.
  console.log("Reconnecting");
});
		
	//send event that user has joined room
	//socket.emit("join room", {username : userName, roomName : room, gameType : game,});

	//receive data from server.
socket.on('send data',(data)=>{
	ID = data.id; //ID will be used later
	console.log(" my ID:" + ID);
})
	  
//socket.on("chat message", (data) => {
//	console.log(data.data.user + ": " + data.id);
//	displayMessage(data);
//	decodeMessage(data);
//});
	
socket.on("dataToHost", (data) => {
	console.log(data.data.user + ": " + data.id);
	if(data.data.msgType == "drawUpdate"){
		UpdateClientImage(data);
	}
})

//function displayMessage(data) {
//		console.log("Incoming Message:");
//		console.log(data);
//    }

;