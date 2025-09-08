<?php
session_start();
if(isset($_SESSION['user']) && isset($_SESSION['pin'])){
	//header("Location: profileSelect.php"); 
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Drinking Levels - Sign In</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
	<link href="css\bootstrap.min.css" rel="stylesheet">
<link href="css/templates/Default.css" rel="stylesheet">

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
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css\signin.css" rel="stylesheet">
</head>
<body class="text-center">  
	<main class="form-signin">
		<div >
			<img class="mb-4" src="images\LOGO.svg" alt="" width="100%">
			<h1 class="h3 mb-3 fw-normal">Please sign in</h1>
			<h1 class="h3 mb-3 fw-normal">CURRENTLY UNDER HEAVY UPDATES - MANY FEATURES DO NOT WORK</h1>
			<h1 class="h6 mb-3 fw-normal" id="LoginMessage" style="color: red; display:none;">Invalid Username or Pin</h1> 

			<div class="form-floating">
				<input type="text" class="form-control" id="floatingInput" placeholder="username" name="username">
				<label for="floatingInput">Username</label>
			</div>
			<div class="form-floating">
				<input type="password" class="form-control" id="floatingPassword" placeholder="pin" pattern="[0-9]*" inputmode="numeric" name="pin">
				<label for="floatingPassword">Pin</label>
			</div>
			<button class="w-100 btn btn-lg btn-primary" onclick="Login()">Sign in</button>
			<p class="mt-5 mb-3 text-muted">&copy; 2022</p>
		</div>
	  
		<button class="w-50 btn btn-secondary" onclick="Register()">Register</button>
	</main>
	
	
	
	<script>
		function Register(){
			location.href = "register.php";
		};
	
		function Login(){
			//Check if login is valid
			if (window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}
			else{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			var loginResult = "";
			var username = document.getElementById("floatingInput").value;
			var pin = document.getElementById("floatingPassword").value;
			xmlhttp.open("GET", "php/CheckLogin.php?user=" + username + "&pin=" + pin, false);
			xmlhttp.send();
			if(xmlhttp.status === 200){
				loginResult = xmlhttp.responseText;
			}
			if(loginResult === "Valid"){
				console.log(loginResult);
				console.log(xmlhttp);
				document.body.innerHTML = '<form id="dynForm" action="profileSelect.php" method="post">' +
				'<input type="hidden" name="username" value="' + username + '">' +
				'<input type="hidden" name="pin" value="' + pin + '">' +
				'</form>';
				//document.getElementById("dynForm").submit();
				window.location.href='profileSelect.php'
			}
			else {
				document.getElementById("LoginMessage").style.display = "block";
			}
			console.log(username + '  ' + '  ' + pin + '  ' + loginResult);
			
		};
	</script>
</body>
</html>
