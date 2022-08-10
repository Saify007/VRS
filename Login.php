
<?php

session_start();

	include("Model/connection.php");
	include("Model/function.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			//read from database
			$query = "select * from registration where user_name = '$user_name' limit  1";

			$result = mysqli_query($con,$query);

			if($result)
			{
				if($result && mysqli_num_rows($result)>0)
				{
					$user_data = mysqli_fetch_assoc($result);
					if($user_data['password'] === $password)
					{
						$_SESSION['u_id'] = $user_data['u_id'];
						header("Location: admin.php");
						die;
					}
				}
			}
			echo "Wrong username or password!";
			
		}
		else
		{
			echo "Please enter some valid information!";
		}
	}
  ?>

  <?php include('Controller/navbar.php');?><br><br>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <style type="text/css">
 	#text{
 		height: 25px;
 		border-radius: 5px;
 		padding: 4px;
 		border: solid thin #aaa;
 		width: 100%;
 	}
 	#button{
 		padding:10px;
 		width: 100px;
 		color: white;
 		background-color: #1E74FF;
 		border: none; 
 	}

 	#box{
		background: rgb(2,0,36);
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
  margin: auto;
  height: 40%;
  width: 40%;
  padding: 20px;
  box-shadow: 10px 10px 5px #aaaaaa;
  position: fixed;
  top: 20%;
  left: 30%;
  margin-top: -30px;
  margin-left: -30px;
  color: white;
 	}
 </style>
 <div id="box">
 	<form method="post">
 		<div style="font-size: 20px; margin: 10px; color: white">Log In</div>
 		<label>User Name</label>
 		<input id="text" type="text" name="user_name"><br><br>
 		<label>Password</label>
 		<input id="text" type="password" name="password"><br><br>
 		<input id="button" type="submit" name="Login" value="Log In"><br><br>
 		Don't have an account?<a href="Registration.php">Click here</a>
 	</form>
 </div>
 <div>
 	
 </div>
 </body>
 </html>