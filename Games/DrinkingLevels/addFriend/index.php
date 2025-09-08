<?php
	session_start();

if(isset($_SESSION["userID"]) && isset($_SESSION["profileID"])){
	$UserID = $_SESSION["userID"];
	$profileID = $_SESSION["profileID"];
}
else {
	header("Location: ../index.php?login=invalid"); 
	exit;
}
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
	<meta name="format-detection" content="telephone=no">
    <title>Drinking Levels - Add Friend</title>


    

    <!-- Bootstrap core CSS -->
	<link href="..\css\bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
	  
	  .modal-vis {
		  display: none;
	  }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="..\css\signin.css" rel="stylesheet">
	<link href="..\css\templates\default.css" rel="stylesheet">
  </head>
  <body class="text-center bg-dark">
<div class="container-fluid px-1 py-1 mx-auto primCont ">
	<div class="row d-flex justify-content-center">
		<div class="col-xl-5 col-lg-6 col-md-7">
		<main class="form-signin bg-light rounded">
			<button class="w-100 btn btn-lg btn-primary" onclick="SearchFriends()">Search For Friends</button>
			<h1>Your Code</h1>
			<h1><?php $val = $_SESSION["profileID"]; echo substr($val, 0, 2) . '-' . substr($val, 2, 4) . '-' . substr($val, 6, 4); ?></h1>
			<p>Give this to your friend for them to add you</p>
			<form action="addFriend.php" method="post">
				<img class="mb-4" src="..\images\friends.svg" alt="" width="100" height="100">
				<h1 class="h3 mb-3 fw-normal">Enter Friend Code</h1>
				<p>(dashes not required)</p>
				<p>you cannot remove friends... yet</p>
				<div class="form-floating">
					<input type="text" class="form-control" id="floatingPassword" placeholder="friendCode" pattern="[0-9]*" inputmode="numeric" name="friendCode">
					<label for="floatingPassword">Friend Code</label>
				</div>
				<button class="w-100 btn btn-lg btn-primary" type="submit">Add Friend</button>
				<p class="mt-5 mb-3 text-muted">&copy; 2021</p>
			</form>
			
			<p>No Friends?</p>
			<form id="dynForm" action="/profile/" method="post">
				<button class="w-100 btn btn-lg btn-secondary" type="submit">Go Back</button>
			</form>
		</main>
		</div>
	</div>
	<div class="modal-vis" id="SearchFriendModal" style="position: absolute; left: 0px; top: 0px; width: 100vw; background-color: rgba(255, 255, 255, .5); overflow-y: auto;">
		<div>
		<main class="form-signin bg-white rounded" style="height: 100vh; overflow-y: auto;">
			
			<h1>Search For Friend</h1>
			<div>
				<img class="mb-4" src="..\images\friends.svg" alt="" width="100" height="100">
				<div class="form-floating">
					<input type="text" class="form-control" id="SearchFriendInput" placeholder="friendUsername" name="friendUsername">
					<label for="friendUsername">Friend Username</label>
				</div>
				<button class="w-100 btn btn-lg btn-primary" onclick="GetSearchResults()">Search</button>
			</div>
			<div id="SearchFriendResults" style="overflow-y: auto;">
				
			</div>
			<button class="w-100 btn btn-lg btn-secondary" onclick="SearchFriends()">Close</button>
		</main>
		</div>
	</div>
</div>


	<script>
		function SearchFriends(){
			var modal = document.getElementById("SearchFriendModal");
			modal.classList.toggle("modal-vis");
			
			
			
		};
		
		function GetSearchResults(){
			var search = document.getElementById("SearchFriendInput").value;
			if (window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}
			else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			var jsonString = "";
			xmlhttp.open("GET", "../php/GetUserProfilesByUsername.php?username=" + search, false);
			xmlhttp.send();
			if(xmlhttp.status === 200){
				jsonString = xmlhttp.responseText;
			}	
			var jsonData = JSON.parse(jsonString);


			document.getElementById("SearchFriendResults").innerHTML = '<p>No Results Found</p>';
			if(jsonData.length > 0){
				document.getElementById("SearchFriendResults").innerHTML = '<p>Found ' + jsonData.length + ' Results</p><hr style="width:100%;text-align:left;margin-left:0">';
				for(i=0; i < jsonData.length; i++){
					document.getElementById("SearchFriendResults").innerHTML += '<div>' +
						'<p>' + jsonData[i].Name + ' - ' + jsonData[i].Desc + '</p>' +
						'<button class="btn btn-primary" onclick=\'AddFriendFromResult("' + jsonData[i].ProfileID + '")\'>Add Friend</button>' +
						'<hr style="width:100%;text-align:left;margin-left:0">' +
					'</div>';
				}
			}			
		}
		
		function AddFriendFromResult(profileID){
			document.getElementById("floatingPassword").value = profileID;
			SearchFriends();
		}
	</script>
  </body>
</html>
