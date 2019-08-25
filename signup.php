<?php
include('connection.php');
error_reporting(1);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>signup</title>
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
				/*border: 2px solid green;*/
				margin: 50px auto;
				text-align: center;
				}
		</style>
	</head>
	<body>
			<div class="bx">
				<form action="" method="POST" id="demo">
					<p style="color: red;">UserName</p>
					<input type="text" name="name" placeholder="enter username..." id="name"><br><br>
					<p style="color: red;">Password</p>
					<input type="password" name="pass" placeholder="password" id="pass"><br><br>
					<input type="submit" name="submit" value="signUp"><br><br>
				</form>
					<p style="color: red;">already a user <a href="signIn.php" style="color: blue;">signIn</a></p>
					<p style="color: green;">First create UserName and Password</p>
		    </div>
			<?php
		       if($_POST['submit'])
		       {    
		           	$name=$_POST['name'];				           	
		       		$pass=$_POST['pass'];				       		
		       		if($name!=""&&$pass!="")
		       		{	
		       			$pass=md5($pass);
		       			$sql = "SELECT * FROM users WHERE username='$name'";
                        $result = mysqli_query($con,$sql);
                        $count=mysqli_num_rows($result);
                        if($count>0)
                        {
                        	die("There is already a user with that UserName!");
                        }
                        else
			       			$query="INSERT INTO users(username,password) VALUES('$name','$pass')";
			       			$data=mysqli_query($con,$query);
			       			$sql1 = "SELECT * FROM users WHERE username='$name'";
                        	$data1 = mysqli_query($con,$sql);
			       			$result=mysqli_fetch_assoc($data1);
			       			$i=$result['id'];
			       			if($data)
			       			{
			       				header('location:movies.php?uid='.$i);
			       			}
			       			else
			       			{
			       				echo"not inserted";
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