<?php
include("connection.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>signin</title>
		<style>
			body{
				margin-left:0;
				margin-top: 0;
				background-color: grey;
				}
			.bx{
				background:black;
				width: 250px;
				height: 350px;
				margin: 50px auto;
				text-align: center;
				}
		</style>
	</head>
	<body>
		<div class="bx">
			<form action="" method="POST" id="demo">

				<p style="color: red;">UserName</p>
				<input type="text" name="name" placeholder="enter username..." id="name">
				<p style="color: red;">Password</p>
				<input type="password" name="pass" placeholder="password"><br><br>
				<input type="submit" name="submit" value="signIn"><br><br>
				<p style="color: red;">don't have an account <a href="signUp.php" style="color: blue;">signUp</a></p>
			</form>
		</div>
		<?php
	       if(isset($_POST['submit']))
	       {    
	           	$name=$_POST['name'];
	       		$pass=$_POST['pass'];
	       		if($name!=""&&$pass!="")
	       		{	
	       			$password=md5($pass);
	       			echo $password;
	       			$query= "SELECT * FROM users WHERE username='$name' AND password='$password'";		       			
                    $data = mysqli_query($con,$query);	                   
                    $result=mysqli_fetch_assoc($data);	                    
                    $count=mysqli_num_rows($data);	                    	                    
                    $i=$result['id'];
                    $j=$result['username'];                     	                    
                    if($count>0)
                    {
                    	 header('location:movies.php?uid='.$i);
                    }
                    else
                    {
                    	echo"there is no user with that username or password!";
                    }	                  
	       		}
	       		else
	       		{
	       			echo "there must be an empty data field!";
	       		}
	       }
		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
				$(document).ready(function(){ 
			    				$("#name").val(''); 
				});

		</script>
	</body>
</html>
