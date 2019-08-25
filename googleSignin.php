<!DOCTYPE html>
<html>
	<head>
		<title>Google Signin</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<meta name="google-signin-client_id" content="183794108273-voln3sftdntln9b4fh1sbuvm8cldrdds.apps.googleusercontent.com">
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<style>
			body{
				margin-left:0;
				margin-top: 0;
				background-color: grey;
			}
			.data{
				display:none;
			}
			.bx{
				background:black;
				width: 250px;
				height: 350px;
				/*border: 2px solid green;*/
				margin: 50px auto;
			}
			.g-signin2{
				padding-top:120px;
				padding-left:65px; 
			}
			.bx1{
				background:black;
				width: 250px;
				height: 350px;
				/*border: 2px solid green;*/
				margin: 50px auto;
				text-align: center;
			}
	    </style>
	</head>
	<body>
		<div class="g-signin2 bx" data-onsuccess="onSignIn"></div>
		<div class="data bx1">
			<p style="color: red;">Profile Details</p>
			<img id="pic" class="img-circle" width="100" height="100">
			<p style="color: red;">Email Address</p>
			<p id="email" class="alert alert-danger" style="width: 250px;height:30px;padding-top:5px;color:black;"></p>
			<button onclick="signOut()" class="btn btn-danger">SignOut</button><br><br>
			<a href="signup.php" style="color: red;">visit the website</a>
		</div>
		<script>
			function onSignIn(googleUser)
			{
				var profile=googleUser.getBasicProfile();
				$(".g-signin2").css("display","none");
				$(".data").css("display","block");
				$("#pic").attr('src',profile.getImageUrl());
				$("#email").text(profile.getEmail());
				// console.log('Email: ' + profile.getEmail());
			}
			function signOut()
			{
				var auth2=gapi.auth2. getAuthInstance();
				auth2.signOut().then(function(){
					alert("you have been signout");
					$(".g-signin2").css("display","block");
					$(".data").css("display","none");

				});
			}
		</script>
	</body>
</html>