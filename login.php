<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from userss where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Smart Psych Relief | LOGIN</title>
 	<meta content="" name="description">
	<meta content="" name="keywords">
	<!-- Favicons -->
	<link href="assets/img/fyp-favicon.svg" rel="icon">
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body {
			width: 100vw;
			height: 100vh;
			font-family: "Open Sans", sans-serif;
			background: url(./assets/img/login-bgg.PNG) no-repeat;
			background-size: cover;
			background-position: center;
			display: flex;
			flex-direction : column;
			align-items: center;
			justify-content: center;

		}

		#box {
			background: rgba(255 ,255 ,255, 0.5);
			border-radius: 10px;
			padding: 2rem 2rem;
			backdrop-filter: blur(5px);
		}

		form input {
			border: .5px solid #c4c4c4;
			border-radius: 5px;
			padding: .55rem 1rem;
			background: #fff;
		}

		form a {
			text-decoration: underline;
			color: #00f;
			font-size: .85rem;
		}

		form #button {
			color: #111;
			background-image: linear-gradient(90deg , #0FD3BC , #1FA7CB);
			margin: 1rem 0 0 0;
		}

		form select {
			padding: .55rem 1rem;
			border: .5px solid #c4c4c4;
			border-radius: 5px;
			outline: none;
		}

		form select:focus , form select:active  , form #button:focus ,form #button:active , form input:focus , form input:active {
			outline: none;
		}

		form p {
			color: #111;
			font-size: 1.50rem;
			margin: .50rem 0 1rem 0;
		}

	</style>
</head>
<body>

	<div id="box">
		
		<form method="post">
			<p>Login</p>

			<input id="text" placeholder="Enter First Name" type="text" name="user_name"><br><br>
			<input id="text" placeholder="Enter Password" type="password" name="password"><br><br>

			<input style="color: #fff;" id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><span style="margin: 0 0 0 .25rem; font-weight: 800; font-size: .90rem; color: #00f;">&#62;</span><br><br>
		</form>
	</div>
</body>
</html>